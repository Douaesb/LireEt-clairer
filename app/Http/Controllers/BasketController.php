<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Services\PayPalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

class BasketController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $basket = $user->panier;
        $articles = $basket->articles()->get();
        return view('basket.index', ['basket' => $basket, 'articles' => $articles]);
    }


    public function add(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the basket.');
        }
        $basket = $user->panier;
        if (!$basket) {
            $basket = new Panier();
            $basket->user_id = $user->id;
            $basket->date_creation = Carbon::now();
            $basket->save();
        }
        $articleId = $request->input('article_id');
        $quantity = $request->input('quantity', 1);
        $commande = $basket->commandes()->where('article_id', $articleId)->where('etat','Pending')->first();
// dd($commande);
        if ($commande) {
            $commande->quantity += $quantity;
            $commande->save();
        } else {
            $basket->articles()->attach($articleId, ['quantity' => $quantity]);
        }
        return redirect()->back()->with('success', 'added to card successfully');
    }

    public function update(Request $request)
    {
        try{

        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to update the basket.'], 401);
        }
        $basket = $user->panier;
        if (!$basket) {
            return response()->json(['error' => 'Basket not found.'], 404);
        }
        $articleId = $request->input('article_id');
        $commandeId = $request->input('commande_id');
        $newQuantity = $request->input('quantity');
        if (!is_numeric($newQuantity) || $newQuantity < 0 || $newQuantity > 10) {
            return response()->json(['error' => 'Invalid quantity.'], 400);
        }
        $articleInBasket = $basket->articles()->where('commandes.id', $commandeId)->where('etat','Pending')->first();

        if (!$articleInBasket) {
            return response()->json(['error' => 'Article not found in basket.'], 404);
        }
        if ($newQuantity == 0) {
            DB::table('commandes')->where('id', $commandeId)->delete();
        } else {
            $updatedRows = DB::table('commandes')
            ->where('id', $commandeId)
            ->update(['quantity' => $newQuantity]);        }
        return response()->json(['success' => true, 'new_quantity' => $newQuantity, 'commande_id' => $commandeId]);
    }catch(\Exception $e){
        return response()->json(['error' => 'update panier error: ' . $e->getMessage()], 500);

    }

    }


    public function remove(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to remove items from the basket.'], 401);
        }
        $basket = $user->panier;
        if (!$basket) {
            return response()->json(['error' => 'Basket not found.'], 404);
        }
        $articleId = $request->input('article_id');
        $commandeId = $request->input('commande_id');

        $articleInBasket = $basket->articles()->where('commandes.id', $commandeId)->first();
        if (!$articleInBasket) {
            return response()->json(['error' => 'Article not found in basket.'], 404);
        }
        DB::table('commandes')->where('id', $commandeId)->delete();
        return response()->json(['success' => true]);
    }


    public function checkout()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to checkout.'], 401);
        }

        $basket = $user->panier;
        if (!$basket) {
            return response()->json(['error' => 'Basket not found.'], 404);
        }

        $articles = $basket->articles;
        if ($articles->isEmpty()) {
            return response()->json(['error' => 'Your basket is empty.'], 400);
        }

        $totalCost = 0;
        foreach ($articles as $article) {
            $totalCost += $article->pivot->quantity * $article->price;
        }
        return response()->json([
            'success' => true,
            'articles' => $articles,
            'totalCost' => $totalCost
        ]);
    }

    public function emptyBasket()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'You must be logged in to empty the basket.'], 401);
        }
        $basket = $user->panier;
        if (!$basket) {
            return response()->json(['error' => 'Basket not found.'], 404);
        }
        $basket->articles()->detach();
        return response()->json(['success' => true, 'message' => 'The basket has been emptied successfully.']);
    }

    protected $payPalService;

    public function __construct(PayPalService $payPalService)
    {
        $this->payPalService = $payPalService;
    }


    public function initializePayment(Request $request)
    {
        $user = auth()->user();
        $basket = $user->panier;
        $totalCost = 0;
        foreach ($basket->articles as $article) {
            $totalCost += $article->pivot->quantity * $article->price;
        }
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($totalCost);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Payment for your order')
            ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.response'))
            ->setCancelUrl(route('payment.cancel'));
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction])
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->payPalService->getApiContext());
            $approvalUrl = $payment->getApprovalLink();

            return response()->json(['success' => true, 'paypal_approval_url' => $approvalUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment error: ' . $e->getMessage()], 500);
        }
    }
    public function handlePaymentResponse(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $payment = Payment::get($paymentId, $this->payPalService->getApiContext());
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $payment->execute($execution, $this->payPalService->getApiContext());
            $paymentState = $payment->getState();

            if ($paymentState == 'approved') {
                $user = auth()->user();
                $basket = $user->panier;
                foreach ($basket->articles as $article) {
                    $command = $article->pivot;
                    $command->etat = 'Finalized';
                    $command->save();
                }
                return redirect()->route('order.success')->with('success', 'Payment successful. Your order has been finalized.');
            } else {
                return redirect()->back()->withErrors(['error' => 'Payment not approved']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Payment error: ' . $e->getMessage()]);
        }
    }
    public function paymentCancel()
    {
        return redirect()->route('welcome')->with('error', 'Payment was cancelled.');
    }
}

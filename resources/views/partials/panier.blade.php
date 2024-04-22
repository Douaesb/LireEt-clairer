<div id="panier" class="hidden relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!--
  Background backdrop, show/hide based on slide-over state.

  Entering: "ease-in-out duration-500"
    From: "opacity-0"
    To: "opacity-100"
  Leaving: "ease-in-out duration-500"
    From: "opacity-100"
    To: "opacity-0"
-->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <!--
        Slide-over panel, show/hide based on slide-over state.

        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    Shopping cart</h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button id="panierBtn" type="button"
                                        class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    @if (isset($articles))
                                        @if ($articles->isEmpty())
                                            <p>Your basket is empty.</p>
                                        @else
                                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                @foreach ($articles as $article)
                                                    <li class="flex py-6" data-article-id="{{ $article->id }}">

                                                        <div
                                                            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                            @if ($article->photo && filter_var($article->photo, FILTER_VALIDATE_URL))
                                                                <img src="{{ $article->photo }}" alt="article Image"
                                                                    class="h-full w-full object-cover object-center">
                                                            @elseif($article->photo && !filter_var($article->photo, FILTER_VALIDATE_URL))
                                                                <img src="{{ asset('storage/' . $article->photo) }}"
                                                                    alt="article Image"
                                                                    class="h-full w-full object-cover object-center">
                                                            @else
                                                                <p>No Image Available</p>
                                                            @endif

                                                        </div>

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                            <div>
                                                                <div
                                                                    class="flex justify-between text-base font-medium text-gray-900">
                                                                    <h3>
                                                                        <a
                                                                            href="#">{{ substr($article->titre, 0, 25) }}</a>
                                                                    </h3>
                                                                    <p class="ml-4 ">
                                                                        <span
                                                                            class="total-quantity">{{ $article->pivot->quantity * $article->price }}</span>
                                                                    </p>
                                                                </div>
                                                                <p class="mt-1 text-sm text-gray-500 ">price per piece :
                                                                    <span class="article-price">
                                                                        {{ $article->price }}</span>$
                                                                </p>
                                                            </div>
                                                            <div class="flex items-center">
                                                                <button class="quantity-decrease text-gray-500"
                                                                    type="button">-</button>
                                                                <span
                                                                    class="quantity-value mx-2">{{ $article->pivot->quantity }}</span>
                                                                <button class="quantity-increase text-gray-500"
                                                                    type="button">+</button>
                                                            </div>
                                                            <div class="flex justify-end">
                                                                <button type="button"
                                                                    class="removeArticle font-medium text-yellow-600">Remove</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Total</p>
                                <p><span class="total-cost">{{ $totalCost }}</span> </p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at
                                checkout.</p>
                            <div class="mt-6">
                                <a href="#"
                                data-modal-target="default-modal" data-modal-toggle="default-modal"
                                    class=" checkoutButton flex items-center justify-center rounded-md border border-transparent bg-yellow-900 px-6 py-3 text-base font-medium text-white shadow-sm ">Checkout</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    or
                                    <a href="" class="font-medium text-yellow-600 ">
                                        Continue Shopping
                                        <span aria-hidden="true"> &rarr;</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  
  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
          <div class="  relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                     Checkout 
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <div id="orderSummaryBody" class="modal-body">
                <!-- Order summary details will be populated here -->
            </div>
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button onclick="Swal.fire({
                    icon: 'success',
                    title: 'Commande finalisée',
                    showConfirmButton: false,
                    timer: 1500
                  });" type="button" class="finalize text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Finaliser ma commande</button>
            </div>
          </div>
      </div>
  </div>

<script>
    const panier = document.getElementById('panier');
    const panierBtn = document.getElementById('panierBtn');

    panierBtn.addEventListener('click', function() {
        panier.classList.add('hidden');
    })
    basket.addEventListener('click', function() {
        panier.classList.remove('hidden');
    })
    const articlesCountElement = document.querySelector('.articlesCount');

    let articlesCount = document.querySelector('.articlesCount').innerText;
    console.log('articles Count at first', articlesCount)

    function updateTotalAndTotalCost() {
        let totalCost = 0;
        document.querySelectorAll('#panier li').forEach(listItem => {
            const quantitySpan = listItem.querySelector('.quantity-value');
            const pricePerPieceSpan = listItem.querySelector('.article-price');
            if (!quantitySpan || !pricePerPieceSpan) {
                console.error('Missing quantity or price element in list item.');
                return;
            }
            const quantity = parseInt(quantitySpan.textContent, 10);
            const pricePerPiece = parseFloat(pricePerPieceSpan.textContent.trim().replace('$', ''));
            console.log(quantity);
            console.log(pricePerPiece);

            if (isNaN(quantity) || isNaN(pricePerPiece)) {
                console.error('Invalid quantity or price value in list item.');
                return;
            }
            const totalForArticle = quantity * pricePerPiece;
            console.log(totalForArticle);
            listItem.querySelector('.total-quantity').textContent = `Total: ${totalForArticle.toFixed(2)} $`;
            totalCost += totalForArticle;
            console.log(totalCost);

        });
        document.querySelector('.total-cost').textContent = `${totalCost.toFixed(2)}$`;
    }
    document.querySelectorAll('.quantity-increase, .quantity-decrease').forEach(button => {
        button.addEventListener('click', function() {
            const listItem = this.closest('li');
            const articleId = listItem.getAttribute('data-article-id');
            const quantitySpan = listItem.querySelector('.quantity-value');
            let quantity = parseInt(quantitySpan.textContent);
            if (this.classList.contains('quantity-increase')) {
                if (quantity < 10) {
                    quantity++;
                }
            } else if (this.classList.contains('quantity-decrease')) {
                quantity--;
                if (quantity === 0) {
                    listItem.remove();
                    articlesCount--;
                    articlesCountElement.textContent = articlesCount;
                    console.log('articles Count after --0', articlesCount)

                }
            }
            quantitySpan.textContent = quantity;
            fetch('/basket/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        article_id: articleId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateTotalAndTotalCost();
                    } else {
                        console.error('Error updating quantity:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
    updateTotalAndTotalCost();

    document.querySelectorAll('.removeArticle').forEach(button => {
        button.addEventListener('click', function() {
            event.preventDefault();
            const listItem = this.closest('li');
            const articleId = listItem.getAttribute('data-article-id');
            fetch('/basket/remove', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        article_id: articleId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        listItem.remove();
                        articlesCount--;
                        articlesCountElement.textContent = articlesCount;
                        console.log('articles Count after remove', articlesCount)

                        updateTotalAndTotalCost();
                    } else {
                        console.error('Error removing article:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

document.querySelector('.checkoutButton').addEventListener('click', function(event) {
    event.preventDefault();
    
    // Get the order summary body element
    const orderSummaryBody = document.getElementById('orderSummaryBody');
    
    if (orderSummaryBody) {
        // Element exists, continue with the function
        const articles = document.querySelectorAll('#panier li');
        let orderSummaryHTML = '';
        let totalCost = 0;

        articles.forEach(article => {
            const articleTitle = article.querySelector('h3 a').textContent;
            const articleQuantity = parseInt(article.querySelector('.quantity-value').textContent);
            const articlePrice = parseFloat(article.querySelector('.article-price').textContent.trim().replace('$', ''));
            const articleTotal = articleQuantity * articlePrice;
            totalCost += articleTotal;

            orderSummaryHTML += `
                <div>
                    <p>Title: ${articleTitle}</p>
                    <p>Quantity: ${articleQuantity}</p>
                    <p>Price per piece: $${articlePrice.toFixed(2)}</p>
                    <p>Total: $${articleTotal.toFixed(2)}</p>
                </div>
            `;
        });

        orderSummaryHTML += `
            <div>
                <h3>Total Cost: $${totalCost.toFixed(2)}</h3>
            </div>
        `;
        orderSummaryBody.innerHTML = orderSummaryHTML;
    } else {
        console.error('Error: Could not find orderSummaryBody element in the DOM.');
    }
});

document.querySelector('.finalize').addEventListener('click', function(event) {
    event.preventDefault(); 
    // console.log('hey')
    fetch('/basket/empty', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            // alert('Your basket has been emptied successfully.');
            const modal = document.querySelector('#default-modal');
            if (modal) {
                modal.classList.add('hidden');
            }
            location.reload();
        } else {
            console.error('Error emptying the basket:', data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


</script>

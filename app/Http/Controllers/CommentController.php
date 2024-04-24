<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Exception;

class CommentController extends Controller
{
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'rating' => 'required|integer', 
        ]);
    
        $user = auth()->user();
        $article = Article::findOrFail($id);
    
        $comment = new Comment();
        $comment->description = $request->input('description');
        $comment->rating = $request->input('rating');
        $comment->user_id = $user->id;
        $comment->article_id = $article->id;
    
        $comment->save();
    
        return redirect()->route('article.comments', $id)
                         ->with('success', 'Comment and rating added successfully.');
    }
    

    public function updateComment(Request $request, $commentId)
    {
        try {
            $request->validate([
                'description' => 'required',
            ]);

            $comment = Comment::findOrFail($commentId);
            $comment->description = $request->input('description');

            $comment->save();

            return redirect()->route('article.comments', $comment->article_id)
                ->with('success', 'Comment updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteComment($commentId)
    {
        try {
            $comment = Comment::findOrFail($commentId);
            $articleId = $comment->article_id;

            $comment->delete();

            return redirect()->route('article.comments', $articleId)
                ->with('success', 'Comment deleted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function showComments($articleId)
    {
        try {
            $article = Article::findOrFail($articleId);
            $comments = $article->comments()->with('user')->get();
            return view('article.comments', compact('comments', 'article'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

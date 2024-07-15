<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request, $articleId) {
        $request->validate([
            'content' => 'required|string'
        ]);

        $comment = new Commentaire();

        $comment->contenu = $request->input('content');
        $comment->utilisateur_id = session('userId');
        $comment->article_id = $articleId;
        $comment->date_publication = now();
        $comment->save();

        return redirect()->back()->with('success', 'Comment created successfully');
    }
}

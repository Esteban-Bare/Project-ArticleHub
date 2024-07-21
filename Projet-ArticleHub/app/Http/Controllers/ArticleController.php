<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticle($id){
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function like($id)
    {
        $article = Article::findOrFail($id);
        $userId = session('userId');

        if ($userId) {
            if ($article->likes()->where('utilisateur_id', $userId)->exists()) {
            
            $article->likes()->where('utilisateur_id', $userId)->delete();
            return response()->json(['status' => 'unliked']);
        } else {
            $article->likes()->create(['utilisateur_id' => $userId]);
            return response()->json(['status' => 'liked']);
        }
        } else {
            return response()->json(['status' => 'unliked']);
        }
 
        
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $articles = Article::where('titre', 'LIKE', "%{$query}%")->get();
            return response()->json($articles);
        }

        return response()->json([]);
    }
}

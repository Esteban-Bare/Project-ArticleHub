<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function showAllArticlesView() {
        $articles = Article::all();
        return view('articles.index')->with('articles', $articles);
    }

    public function showCreateArticleView() {
        $categories = Category::all();

        return view('articles.createArticle')->with('categories', $categories);
    }

    public function createArticle(Request $request) {

        $request->validate([
            'titre' => 'required|unique:articles,titre',
            'contenu' => 'required',
            'small_description' => 'nullable|string|max:255',
            'categories' => 'required|array',
            'categories,*' => 'exists:categories,id',
            'utilisateur_id' => 'required|exists:users,id',
        ]);

        $article = Article::create($request->only(['titre','contenu','small_description','utilisateur_id', 'date_publication8']));

        $article->categories()->attach($request->categories);

        return redirect()->route('articles')->with('success', 'Article created successfully.');
    }
}

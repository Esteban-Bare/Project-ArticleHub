<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function showAllArticlesView(Request $request)
    {
        $query = Article::query();

        if ($request->has('category')) {
            $category = Category::where('nom', $request->category)->first();
            if ($category) {
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('category_id', $category->id);
                });
            }
        }

        $sort = $request->query('sort');
        switch ($sort) {
            case 'oldest':
                $query->orderBy('date_publication', 'asc');
                break;
            case 'most-liked':
                $query->withCount('likes')->orderByDesc('likes_count');
                break;
            default:
                $query->orderBy('date_publication', 'desc'); 
                break;
        }

        $articles = $query->paginate(12);

        $categories = Category::all();

        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'selectedCategory' => $request->category ?? null,
            'sort' => $sort,
        ]);
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

        $article = Article::create($request->only(['titre','contenu','small_description','utilisateur_id', 'date_publication']));

        $article->categories()->attach($request->categories);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome() {
        // Fetch 5 random articles
        $randomArticles = Article::inRandomOrder()->take(5)->get();

        // Fetch a random category
        $category = Category::inRandomOrder()->first();

        if ($category) {
            // Fetch 5 articles from the random category
            $categoryArticles = $category->articles()->take(5)->get();
        } else {
            $categoryArticles = collect(); // Empty collection if no category found
        }

        // Fetch 5 newest articles
        $newestArticles = Article::orderBy('created_at', 'asc')->take(5)->get();

        return view('home', compact('randomArticles', 'category', 'categoryArticles', 'newestArticles'));
    }

    public function viewTry() {
        $items = ['Item 1', 'Item 2', 'Item 3'];
        return view('try')->with('item', $items);
    }
}

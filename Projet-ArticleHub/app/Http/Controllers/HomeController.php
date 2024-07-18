<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome() {
        $randomArticles = Article::inRandomOrder()->take(5)->get();
       
        $category = Category::inRandomOrder()->first();

        if ($category) {
           
            $categoryArticles = $category->articles()->take(5)->get();
        } else {
            $categoryArticles = collect(); 
        }

        $newestArticles = Article::orderBy('date_publication', 'desc')->take(5)->get();

        return view('home', compact('randomArticles', 'category', 'categoryArticles', 'newestArticles'));
    }

    public function viewTry() {
        $items = ['Item 1', 'Item 2', 'Item 3'];
        return view('try')->with('item', $items);
    }
}

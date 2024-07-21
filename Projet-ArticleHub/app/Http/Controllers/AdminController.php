<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdminView() {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        if ($user->role !== "admin") {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        return view('admin.index');
    }

    public function showUsers() {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        if ($user->role !== "admin") {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function showArticles() {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        if ($user->role !== "admin") {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        $articles = Article::all();
        return view('admin.articles', compact('articles'));
    }

    public function deleteArticle($id) {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('admin.articles')->with('success', 'Article deleted successfully');
    }

    public function deleteUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}

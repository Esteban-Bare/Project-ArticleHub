<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfileView()
    {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        return view('profile')->with('user', $user);
    }

    public function showLikedArticles()
    {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        $likedArticleIds = $user->likes()->pluck('article_id'); // Get only the IDs of liked articles
        $likedArticles = Article::whereIn('id', $likedArticleIds)->paginate(10); // Fetch full articles based on IDs

        return view('liked', compact('likedArticles'));
    }

    public function showUserArticles()
    {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        $createdArticles = $user->createdArticles()->paginate(10); // Assuming user has a relationship method `articles`
        return view('made', compact('createdArticles'));
    }

    public function deleteUserArticle($id)
    {
        $userId = session('userId');

        if (!$userId) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to view this page.');
        }

        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
        $article = Article::findOrFail($id);

        // Check if the article belongs to the authenticated user
        if ($article->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the article
        $article->delete();

        return redirect()->route('profile.articles')->with('success', 'Article deleted successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $userId = session('userId');
  
        $user = User::find($userId);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password changed successfully.');
    }
}
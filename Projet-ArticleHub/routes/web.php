<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'viewHome'])->name('home');

Route::get('profile',[ProfileController::class, 'showProfileView'])->name('profile');

Route::get('profile/liked', [ProfileController::class, 'showLikedArticles'])->name('profile.liked');
Route::get('profile/articles', [ProfileController::class, 'showUserArticles'])->name('profile.articles');
Route::delete('profile/articles/{id}', [ProfileController::class, 'deleteUserArticle'])->name('profile.articles.delete');

Route::post('/profile/password/change', [ProfileController::class, 'changePassword'])->name('password.update');

Route::get('/admin', [AdminController::class, 'showAdminView'])->name('admin.view');
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
Route::get('/admin/articles', [AdminController::class, 'showArticles'])->name('admin.articles');
Route::delete('/admin/articles/{id}', [AdminController::class, 'deleteArticle'])->name('admin.deleteArticle');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

Route::resource('auth', RegistrationController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

Route::get('articles' , [ArticlesController::class, 'showAllArticlesView'])->name('articles.index');

Route::get('/articles/category/{category}', [ArticleController::class, 'showAllArticlesView'])->name('articles.category');

Route::get('articles/create' , [ArticlesController::class, 'showCreateArticleView'])->name('articleCreate');

Route::post('articles/create', [ArticlesController::class , 'createArticle'])->name('createArticle');

Route::get('article/{id}', [ArticleController::class, 'showArticle'])->name('article.show');

Route::post('/article/{id}/like', [ArticleController::class, 'like'])->name('article.like');

Route::post('/article/{id}/comments', [CommentController::class, 'createComment'])->name('article.comment');

Route::get('/search', [ArticleController::class, 'search'])->name('articles.search');
<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'viewHome'])->name('home');

Route::get('profile',[ProfileController::class, 'showProfileView']);

Route::resource('auth', RegistrationController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout' , [AuthController::class, 'logout'])->name('logout');

Route::get('articles' , [ArticlesController::class, 'showAllArticlesView'])->name('articles');

Route::get('articles/create' , [ArticlesController::class, 'showCreateArticleView'])->name('articleCreate');

Route::post('articles/create', [ArticlesController::class , 'createArticle'])->name('createArticle');

Route::get('article/{id}', [ArticleController::class, 'showArticle'])->name('article.show');
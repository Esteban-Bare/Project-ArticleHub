<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome() {
        return view('home');
    }

    public function viewTry() {
        $items = ['Item 1', 'Item 2', 'Item 3'];
        return view('try')->with('item', $items);
    }
}

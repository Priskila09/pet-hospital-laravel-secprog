<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.homepage', [
            'title' => 'Home',
            'products' => Product::latest()->limit(4)->get()
        ]);
    }

    public function about()
    {
        return view('pages.home.about-us', ['title' => 'About Us']);
    }
}

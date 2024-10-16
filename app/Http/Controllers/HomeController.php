<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.homepage', [
            'title' => 'Home',
        ]);
    }

    public function about()
    {
        return view('pages.home.about-us', ['title' => 'About Us']);
    }
}

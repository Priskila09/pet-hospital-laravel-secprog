<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        return view('pages.home.shop.index', [
            'title' => 'Shop',
            'products' => Product::all()
        ]);
    }

    public function detail($id)
    {
        $product = Product::with('images')->find($id);
        return view('pages.home.shop.detail', [
            'title' => 'Detail Produk',
            'product' => $product
        ]);
    }
}

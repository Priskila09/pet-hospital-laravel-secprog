<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.admin.products.index', [
            'title' => 'Produk',
            'products' => Product::paginate(10)
        ]);
    }

    public function create()
    {
        return view('pages.admin.products.create', [
            'title' => 'Tambah Produk Baru',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $product = Product::create($data);
        $product_slug = Str::slug($product->name);
        foreach ($request->file('images') as $key => $image) {
            // $image_path = $image->store('products', 'public');
            $image_path = $image->storeAs('products', 'produk-' . $product_slug . '-' . date('d-m-y-h-i-s') . '-' . ++$key . '.jpg', 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $image_path
            ]);
        }

        return redirect()->route('produk.index')->with('success', 'Successfully added product');
    }

    public function edit($id)
    {
        return view('pages.admin.products.edit', [
            'title' => 'Edit Produk',
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $product = Product::find($id)->update($data); // UPDATE products SET .......... WHERE id=$id
        $product_slug = Str::slug($request->name);
        if ($request->images != null) {
            foreach ($request->file('images') as $key => $image) {
                // $image_path = $image->store('products', 'public');
                $image_path = $image->storeAs('products', 'produk-' . $product_slug . '-' . date('d-m-y-h-i-s') . '-' . ++$key . '.jpg', 'public');
                ProductImage::create([
                    'product_id' => $id,
                    'image' => $image_path
                ]);
            }
        }


        return redirect()->route('produk.index', $id)->with('success', 'Successfully edited product');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('produk.index')->with('success', 'Successfully delete product');
    }

    public function destroy_image($id)
    {
        ProductImage::find($id)->delete();
        return redirect()->back();
    }
}

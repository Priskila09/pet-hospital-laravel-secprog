<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function cart()
    {
        $cart = Order::where('user_id', Auth::user()->id)
            ->where('status', 'Keranjang')->first();

        return view('pages.home.shop.cart', [
            'title' => 'Keranjang',
            'cart' => $cart
        ]);
    }

    public function confirm()
    {
        $cart = Order::where('user_id', Auth::user()->id)->where('status', 'Keranjang')->first();

        return view('pages.home.shop.confirm', [
            'title' => 'Konfirmasi Pesanan',
            'cart' => $cart
        ]);
    }

    public function confirmStore(Request $request)
    {
        $cart = Order::where('user_id', Auth::user()->id)->where('status', 'Keranjang')->first();

        foreach ($cart->details as $item) {
            $product = Product::find($item->product_id);
            $product->stock -= $item->quantity;
            $product->save();
        }

        $user = User::find(Auth::user()->id);
        $user->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        $cart->update([
            'status' => 'Cek Pembayaran',
            'address' => $request->address,
            'total_amount' => $request->total,
            'notes' => $request->notes,
            'proof_payment' => $request->proof_payment->storeAs('proof-payment', 'pesanan-' . $cart->id . '-' . date('d-m-y-h-i-s') . '.jpg', 'public')
        ]);
        session()->flash('success', 'Your order has been made successfully!');
        return redirect()->route('home.order.history');
    }

    public function history()
    {
        return view('pages.home.shop.history', [
            'title' => 'Order History',
            'orders' => Order::where('user_id', Auth::user()->id)->where('status', '!=', 'Keranjang')->get()
        ]);
    }
}

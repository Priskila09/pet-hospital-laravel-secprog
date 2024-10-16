<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;
    public $qty = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $cart = Order::where('user_id', Auth::user()->id)
            ->where('status', 'Keranjang')->first();

        if ($cart == null) {
            $cart = Order::Create(
                [
                    'user_id' => Auth::user()->id,
                    'status' => 'Keranjang'
                ]
            );

            OrderDetail::create([
                'order_id' => $cart->id,
                'product_id' => $this->product->id,
                'quantity' => $this->qty,
                'price' => $this->product->discount > 0 ? $this->product->discount : $this->product->price
            ]);
        } else {
            $cartDetail = OrderDetail::where('product_id', $this->product->id)->where('order_id', $cart->id)->first();

            if ($cartDetail != null) {
                $sumQuantity = $cartDetail->quantity + $this->qty;
                if ($sumQuantity > $this->product->stock) {
                    $cartDetail->update(['quantity' => $this->product->stock]);
                } else {
                    $cartDetail->update(['quantity' => $this->qty + $cartDetail->quantity]);
                }
            } else {
                OrderDetail::create([
                    'order_id' => $cart->id,
                    'product_id' => $this->product->id,
                    'quantity' => $this->qty,
                    'price' => $this->product->discount > 0 ? $this->product->discount : $this->product->price
                ]);
            }
        }
        session()->flash('status', 'Succesfully added to your cart!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}

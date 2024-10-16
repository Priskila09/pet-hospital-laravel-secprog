<?php

namespace App\Livewire;

use App\Models\OrderDetail;
use Livewire\Component;

class Cart extends Component
{
    public $cart, $subtotal;

    public function increment($id)
    {
        $orderDetail = OrderDetail::find($id);
        if ($orderDetail->quantity < $orderDetail->product->stock) {
            $orderDetail->quantity += 1;
            $orderDetail->save();
            $this->mount($this->cart);
        }
    }

    public function decrement($id)
    {
        $orderDetail = OrderDetail::find($id);
        if ($orderDetail->quantity > 1) {
            $orderDetail->quantity -= 1;
            $orderDetail->save();
            $this->mount($this->cart);
        }
    }

    public function destroy($id)
    {
        OrderDetail::destroy($id);
        $this->mount($this->cart);
    }

    public function mount($cart)
    {


        $this->cart = $cart;
        if ($this->cart == null) {
            $this->subtotal = 0;
        } else {
            $this->subtotal = OrderDetail::where('order_id', $this->cart->id)->get()->sum(function ($item) {
                return $item->quantity * $item->price;
            });
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}

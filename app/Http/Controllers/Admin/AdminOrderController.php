<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('pages.admin.orders.index', [
            'orders' => Order::where('status', '!=', 'Keranjang')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        Order::find($id)->update($request->all());
        return redirect()->back()->with('success', 'Order has been changed to ' . $request->status);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'Order Deleted');
    }
}

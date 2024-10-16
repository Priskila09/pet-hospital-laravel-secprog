<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        // Fetch total products
        $totalProducts = Product::count();

        // Fetch total customers
        $totalCustomers = User::count();

        // Fetch scheduled reservations
        $totalReservations = Reservation::count();

        // Calculate total income (assuming you have a field 'total_amount' in your Order model)
        $totalIncome = Order::where('status', 'Selesai')->sum('total_amount');

        return view('pages.admin.dashboard', compact('totalProducts', 'totalCustomers', 'totalReservations', 'totalIncome'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function index()
    {
        $totalCustomers = User::count();

        // Fetch scheduled reservations
        $totalReservations = Reservation::count();

        // Calculate total income (assuming you have a field 'total_amount' in your Order model)

        return view('pages.admin.dashboard', compact('totalCustomers', 'totalReservations'));
    }
}

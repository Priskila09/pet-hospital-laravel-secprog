<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Menampilkan halamannya
    public function index()
    {
        $doctors = Doctor::all(); // SELECT * FROM doctors
        return view('pages.home.reservation', [
            'doctors' => $doctors,
            'title' => 'Reservation'
        ]);
    }

    // Aksi-nya
    public function store(Request $request)
    {
        // Validate with custom error messages
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'customer_name' => 'required|string|max:255',
            'date_of_reservation' => 'required|date',
            'time_of_reservation' => 'required|date_format:H:i',
            'doctor_id' => 'required|exists:doctors,id',
            'messages' => 'nullable|string|max:500',
        ], [
            'user_id.required' => 'You are required to fill this section!',
            'customer_name.required' => 'You are required to fill this section!',
            'date_of_reservation.required' => 'You are required to fill this section!',
            'time_of_reservation.required' => 'You are required to fill this section!',
            'doctor_id.required' => 'You are required to fill this section!',
        ]);

        // Create the reservation
        Reservation::create($validated);

        // Flash success message and redirect
        session()->flash('success', 'Your reservation has been made successfully!');
        return redirect('reservation');
    }
}

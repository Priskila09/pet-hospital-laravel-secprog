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
        $data = $request->all();
        Reservation::create($data); // INSERT INTO reservations ............

        return redirect('reservation');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('pages.admin.reservation', [
            'title' => 'Reservasi',
            'reservations' => Reservation::all() // User::where('')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Reservation::find($id)->update($data);
        return redirect()->back()->with('success', 'Reservasi berhasil/selesai');
    }

    public function destroy($id)
    {
        Reservation::find($id)->delete();
        return redirect()->back()->with('success', 'Reservasi berhasil dihapus');
    }
}

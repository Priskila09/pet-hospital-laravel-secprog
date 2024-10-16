<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'DESC')->paginate(10);
        return view('pages.admin.doctors.index', [
            'title' => 'Doctors',
            'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.doctors.create', ['title' => 'Create New Doctor']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'specialist' => 'required',
            'address' => 'required',
        ]);

        Doctor::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Doctor has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.doctors.edit', [
            'title' => 'Edit Doctor',
            'doctor' => Doctor::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Doctor::find($id)->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Doctor has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Doctor::find($id)->delete(); // DELETE FROM doctors WHERE id = $id
        return redirect()->back()->with('success', 'Doctor has been deleted!');
    }
}

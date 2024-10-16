<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    // store, update, delete
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        Pet::create($data);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        Pet::find($id)->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Pet::find($id)->delete();
        return redirect()->back();
    }
}

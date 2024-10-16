<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.home.profile', [
            'title' => 'Edit Profile'
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        User::find($id)->update($data);
        return redirect()->back();
    }
}

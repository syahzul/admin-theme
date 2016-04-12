<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'confirmed|min:6'
        ];

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        if ($request->has('password')) {
            $input['password'] = bcrypt($input['password']);
        }

        Auth::user()->update($input);

        return redirect()->back();
    }
}

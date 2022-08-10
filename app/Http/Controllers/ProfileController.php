<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {

        return view('public.user.index');
    }

    public function edit($id)
    {
        return view('public.user.edit');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.auth()->id().'|email',
            'password' => 'nullable|min:6|confirmed',
            'address'=>"required",
        ]);


        $user = User::find(auth()->id());

        if($request->password)
            $user->update($request->only('name', 'email', 'password', 'address', 'phone_number'));
        else
            $user->update($request->only('name', 'email', 'address', 'phone_number'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        //
    }
}
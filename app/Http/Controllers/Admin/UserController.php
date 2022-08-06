<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $data = User::paginate(10);
        return view('admin.user.index',compact('data'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(UserRequest $request)
    {

        User::create($request->only('name', 'email', 'password', 'phone_number'));

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی دروستکرا']);
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.user.edit', compact('data'));
    }


    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->password)
            $user->update($request->only('name', 'email', 'password', 'phone_number'));
        else
            $user->update($request->only('name', 'email', 'phone_number'));

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی تازەکرایەوە']);

    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('user.index');
    }
}

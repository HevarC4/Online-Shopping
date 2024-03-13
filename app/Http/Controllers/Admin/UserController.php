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
        $datas = User::paginate();
        return view('admin.user.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->only('name', 'email', 'password', 'phoneNumber','address'));
        return redirect()->back()->with(['msg' => 'بەسەرکەوتوی دروستکرا']);
    }

    public function edit(string $id)
    {
        $datas = User::findOrFail($id);
        return view('admin.user.edit',compact('datas'));
    }

    public function update(UserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        if($request->password)
            $user->update($request->only('name', 'email', 'password', 'phoneNumber','address'));
        else
            $user->update($request->only('name', 'email', 'phoneNumber','address'));

            return redirect()->route('user.index')->with(['msg' => 'بەسەرکەوتوی تازەکرایەوە']);
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }
}

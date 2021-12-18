<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'User updated successfully.');

        return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();

        session()->flash('success', 'User made admin successfully.');

        return redirect()->route('users.index');
    }
}

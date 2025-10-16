<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function create(Request $request)
    {
        $users = User::all();
        return view('user.create', compact('users'));
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        session()->flash('success', 'Usuario creado exitosamente');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        session()->flash('success', 'Usuario actualizado exitosamente');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Usuario eliminado exitosamente');
        return redirect()->route('users.index');
    }
}

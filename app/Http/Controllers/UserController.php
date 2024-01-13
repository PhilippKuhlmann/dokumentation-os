<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{


    // ADMIN Bereich
    public function index()
    {
        $users = User::paginate(20);
        $usersCount = User::all()->count();
        $userLastAdded = User::latest('created_at')->first();

        return view('admin.user.index', compact('users', 'usersCount', 'userLastAdded'));
    }

    public function create()
    {
        $roles = Role::all();
        $customers = Customer::all();

        return view('admin.user.create', compact('roles', 'customers'));
    }

    public function store(UserRequest $request)
    {
        $user = $request->validated();
        $user['password'] = Hash::make($request->password);

        User::create($user);

        return redirect(route('admin.user.index'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $customers = Customer::all();

        return view('admin.user.edit', compact('user', 'roles', 'customers'));
    }

    public function update(User $user, UserRequest $request)
    {
        $userData = $request->validated();

        if (!empty($userData['password'])) {
            $userData['password'] = Hash::make($request->password);
        } else {
            unset($userData['password']);
        }

        $user->update($userData);

        return redirect(route('admin.user.index', $user));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('admin.user.index'));
    }
}

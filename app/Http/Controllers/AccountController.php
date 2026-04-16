<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'nullable',
            'status' => 'nullable',
            'password' => 'min:8|confirmed'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        if ($request->filled('role')) {
            $data['role'] = $request->role;
        }

        if ($request->filled('status')) {
            $data['status'] = $request->status;
        }

        User::create($data);

        return to_route('accounts')->with('success', "User Created Successfully");
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'nullable',
            'status' => 'nullable',
            'password' => 'nullable|min:8'
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'confirmed',
            ]);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($request->filled('role')) {
            $data['role'] = $request->role;
        }
        if ($request->filled('status')) {
            $data['status'] = $request->status;
        }
        $user->update($data);
        return to_route('accounts')->with('success', "User Updated Successfully");
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return to_route('accounts')->with('success', "User Deleted Successfully");
    }
}

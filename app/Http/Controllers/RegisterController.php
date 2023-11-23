<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);

        // Validate
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|email|unique:users,email|max:100', // unique:table,column
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,doctor,nurse,secretary,patient'
        ], [
            'role.in' => 'El campo de rol debe de ser: admin, médico, enfermera, secretaria, paciente.'
        ]);


        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        // Authenticate User
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);


        // Redirect
        return redirect()->route('register');
    }
}

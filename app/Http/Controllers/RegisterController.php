<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        // Check if the user is an admin
        if (Auth::user()->role != 'Admin') {
            return redirect()->back()->with('error', 'Solo los administradores pueden crear nuevos usuarios.');
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Check if the user is an admin
        if (Auth::user()->role != 'Admin') {
            return redirect()->back()->with('error', 'Solo los administradores pueden crear nuevos usuarios.');
        }

        // Validate
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|email|unique:users,email|max:100', // unique:table,column
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:Admin,Medico,Enfermero(a),Secretario(a)'
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

        // Redirect
        return redirect()->route('register');
    }
}

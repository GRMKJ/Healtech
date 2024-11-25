<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class PacienteController extends Controller
{
    // Show the form to create a new paciente
    public function create()
    {
        return view('pacientes.create');
    }

    // Store the new paciente in the database
    public function registerPaciente(Request $request)
    {
        $request->validate([
            // User validations
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'role' => 'required|integer',

            // Paciente validations
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'required|string|max:200',
        ]);

        // Create User
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        // Create Paciente
        Paciente::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('success.page')->with('message', 'Paciente registered successfully!');
    }
}

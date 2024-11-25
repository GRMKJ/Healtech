<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;


class PacienteController extends Controller
{
    // Show the form to create a new paciente
    public function create()
    {
        return view('auth.register');
    }

    public function show($id)
    {
        // Buscar el paciente por su ID
        $paciente = Paciente::findOrFail($id);

        // Retornar la información del paciente
        return response()->json($paciente);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerPaciente(Request $request): RedirectResponse
    {
        $request->validate([
            // User validations
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed:password_confirmation', Rules\Password::defaults()],
            'phone' => 'required|string',

            // Paciente validations
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'string|max:200',
        ]);

        // Create User
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => '3',
        ]);

        event(new Registered($user));

        // Create Paciente
        $paciente= Paciente::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        event(new Registered($paciente));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}

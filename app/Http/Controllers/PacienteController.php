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
    public function createSelf()
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

    public function index()
    {
        $pacientes = Paciente::with('user')->get(); // Asegúrate de tener la relación con el modelo User configurada
        return view('pacientes.index', compact('pacientes'));
    }

    // Muestra el formulario para crear un paciente
    public function create()
    {
        return view('pacientes.create');
    }

    // Registra un paciente y su usuario
    public function store(Request $request)
    {
        $request->validate([
            // Validaciones del usuario
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required|string',

            // Validaciones del paciente
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Crear usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 3,
        ]);

        // Crear paciente
        $paciente = Paciente::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente registrado exitosamente.');
    }

    // Muestra el formulario para editar un paciente
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', data: compact(var_name: 'paciente'));
    }

    // Actualiza un paciente y su usuario
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $paciente->userID,
            'phone' => 'required|string',
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Actualizar usuario
        $user = $paciente->user;
        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Actualizar paciente
        $paciente->update([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    // Elimina un paciente y su usuario asociado
    public function destroy(Paciente $paciente)
    {
        $paciente->user->delete(); // Elimina el usuario relacionado
        $paciente->delete(); // Elimina el registro del paciente

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
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

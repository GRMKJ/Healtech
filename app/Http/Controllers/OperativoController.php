<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class OperativoController extends Controller
{
    // Mostrar el formulario para crear un nuevo operativo
    public function createSelf()
    {
        return view('auth.register');
    }

    public function show($id)
    {
        // Buscar al operativo por su ID
        $operativo = Operativo::findOrFail($id);

        // Retornar la información del operativo
        return response()->json($operativo);
    }

    public function index()
    {
        $operativos = Operativo::with('user')->get();
        return view('operativos.index', compact('operativos'));
    }

    // Muestra el formulario para crear un operativo
    public function create()
    {
        return view('operativos.create');
    }

    // Registra un operativo y su usuario
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required|string',
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Crear usuario
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 2, // Suponiendo que 2 es el rol de operativo
        ]);

        // Crear operativo
        $operativo = Operativo::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('operativos.index')->with('success', 'Operativo registrado exitosamente.');
    }

    // Muestra el formulario para editar un operativo
    public function edit(Operativo $operativo)
    {
        return view('operativos.edit', compact('operativo'));
    }

    // Actualiza un operativo y su usuario
    public function update(Request $request, Operativo $operativo)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $operativo->userID,
            'phone' => 'required|string',
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Actualizar usuario
        $user = $operativo->user;
        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Actualizar operativo
        $operativo->update([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('operativos.index')->with('success', 'Operativo actualizado exitosamente.');
    }

    // Elimina un operativo y su usuario asociado
    public function destroy(Operativo $operativo)
    {
        $operativo->user->delete(); // Elimina el usuario relacionado
        $operativo->delete(); // Elimina el registro del operativo

        return redirect()->route('operativos.index')->with('success', 'Operativo eliminado exitosamente.');
    }
}

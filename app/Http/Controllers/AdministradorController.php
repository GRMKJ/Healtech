<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AdministradorController extends Controller
{
    // Mostrar el formulario para crear un nuevo administrador
    public function createSelf()
    {
        return view('auth.register');
    }

    public function show($id)
    {
        // Buscar al administrador por su ID
        $administrador = Administrador::findOrFail($id);

        // Retornar la información del administrador
        return view('administradors.show', compact('administrador'));
    }

    public function index(Request $request)
    {
        $search = $request->get('search'); // Obtiene el término de búsqueda

        // Realiza la búsqueda de pacientes si se pasa un término de búsqueda
        $administradors = Administrador::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', "%{$search}%")
                         ->orWhere('apaterno', 'like', "%{$search}%")
                         ->orWhere('amaterno', 'like', "%{$search}%")
                         ->orWhereHas('user', function ($query) use ($search) {
                             $query->where('email', 'like', "%{$search}%")
                                   ->orWhere('phone', 'like', "%{$search}%");
                         });
        })->paginate(10);

        return view('administradors.index', compact('administradors'));
    }
    // Muestra el formulario para crear un administrador
    public function create()
    {
        return view('administradors.create');
    }

    // Registra un administrador y su usuario
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
            'role' => 1, // Suponiendo que 1 es el rol de administrador
        ]);

        // Crear administrador
        $administrador = Administrador::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('administradors.index')->with('success', 'Administrador registrado exitosamente.');
    }

    // Muestra el formulario para editar un administrador
    public function edit(Administrador $administrador)
    {
        return view('administradors.edit', compact('administrador'));
    }

    // Actualiza un administrador y su usuario
    public function update(Request $request, Administrador $administrador)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $administrador->userID,
            'phone' => 'required|string',
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Actualizar usuario
        $user = $administrador->user;
        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Actualizar administrador
        $administrador->update([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('administradors.index')->with('success', 'Administrador actualizado exitosamente.');
    }

    // Elimina un administrador y su usuario asociado
    public function destroy(Administrador $administrador)
    {
        $administrador->user->delete(); // Elimina el usuario relacionado
        $administrador->delete(); // Elimina el registro del administrador

        return redirect()->route('administradors.index')->with('success', 'Administrador eliminado exitosamente.');
    }
}

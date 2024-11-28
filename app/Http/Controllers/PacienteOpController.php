<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pacienteop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;


class PacienteopController extends Controller
{

    public function show($id)
    {
        // Buscar el paciente por su ID
        $pacienteop = Pacienteop::findOrFail($id);

        // Retornar la información del paciente
        return view('pacienteops.show', compact('pacienteop'));
    }


    public function index(Request $request)
{
    $search = $request->get('search'); // Obtiene el término de búsqueda

    // Realiza la búsqueda de pacientes si se pasa un término de búsqueda
    $pacienteops = Pacienteop::when($search, function ($query, $search) {
        return $query->where('nombre', 'like', "%{$search}%")
                     ->orWhere('apaterno', 'like', "%{$search}%")
                     ->orWhere('amaterno', 'like', "%{$search}%")
                     ->orWhereHas('user', function ($query) use ($search) {
                         $query->where('email', 'like', "%{$search}%")
                               ->orWhere('phone', 'like', "%{$search}%");
                     });
    })->paginate(10);

    return view('pacienteops.index', compact('pacienteops'));
}



    // Muestra el formulario para crear un paciente
    public function create()
    {
        return view('pacienteops.create');
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
            'role' => '3',
        ]);

        // Crear paciente
        $pacienteop = Pacienteop::create([
            'userID' => $user->id,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('pacienteops.index')->with('success', 'Paciente registrado exitosamente.');
    }

    // Muestra el formulario para editar un paciente
    public function edit(Pacienteop $pacienteop)
    {
        return view('pacienteops.edit', data: compact(var_name: 'pacienteop'));
    }


    // Actualiza un paciente y su usuario
    public function update(Request $request, Pacienteop $pacienteop)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $pacienteop->userID,
            'phone' => 'required|string',
            'nombre' => 'required|string|max:200',
            'apaterno' => 'required|string|max:200',
            'amaterno' => 'nullable|string|max:200',
        ]);

        // Actualizar usuario
        $user = $pacienteop->user;
        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Actualizar paciente
        $pacienteop->update([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
        ]);

        return redirect()->route('pacienteops.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    // Elimina un paciente y su usuario asociado
    public function destroy(Pacienteop $pacienteop)
    {
        $pacienteop->user->delete(); // Elimina el usuario relacionado
        $pacienteop->delete(); // Elimina el registro del paciente

        return redirect()->route('pacienteops.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}


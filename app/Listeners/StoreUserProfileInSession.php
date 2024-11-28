<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;
use App\Models\Administrador;
use App\Models\Operativo;
use App\Models\Paciente;

class StoreUserProfileInSession
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event): void
    {
        // Obtener el usuario autenticado
        $user = $event->user;

        if ($user->role == 1) {
            // Consultar el perfil del usuario (Administrador)
            $profile = Administrador::where('userID', $user->id)->first();

            // Guardar el perfil en la sesión
            if ($profile) {
                Session::put('user_profile', $profile);
            }
        }

        if ($user->role == 2) {
            // Consultar el perfil del usuario (Operativo)
            $profile = Operativo::where('userID', $user->id)->first();

            // Guardar el perfil en la sesión
            if ($profile) {
                Session::put('user_profile', $profile);
            }
        }

        if ($user->role == 3) {
            // Consultar el perfil del usuario (Paciente)
            $profile = Paciente::where('userID', $user->id)->first();

            // Guardar el perfil en la sesión
            if ($profile) {
                Session::put('user_profile', $profile);
            }
        }
    }
}

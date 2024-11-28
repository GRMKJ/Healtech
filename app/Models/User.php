<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'role',
    ];

    const ROLE_ADMIN = 1;
    const ROLE_OPERATIVO = 2;
    const ROLE_PACIENTE = 3;

    // Check if user has a specific role
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function administrador(): HasOne
    {
        return $this->hasOne(Administrador::class, 'userID');
    }

    public function paciente(): HasOne
    {
        return $this->hasOne(Paciente::class, 'userID');
    }

    public function pacienteop(): HasOne
    {
        return $this->hasOne(Pacienteop::class, 'userID');
    }

    public function operativo(): HasOne
    {
        return $this->hasOne(Operativo::class, 'userID');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pacienteop extends Model
{
    use HasFactory;

    // Set the table name (if it's not pluralized correctly by Laravel)
    protected $table = 'paciente';

    // Specify the primary key (since Laravel by default assumes an auto-incrementing 'id' field)
    protected $primaryKey = 'pacienteID';

    // Specify that the primary key is not an incrementing integer (since it's just an ID)
    public $incrementing = true;

    // Set the fillable attributes (mass assignable)
    protected $fillable = [
        'userID',
        'nombre',
        'apaterno',
        'amaterno',
    ];

    // Define the relationship to the User model (since userID is a foreign key to the users table)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID');
    }

}

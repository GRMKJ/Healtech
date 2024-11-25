<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operativo extends Model
{
    use HasFactory;

    // Set the table name (if it's not pluralized correctly by Laravel)
    protected $table = 'operativo';

    // Specify the primary key (since Laravel by default assumes an auto-incrementing 'id' field)
    protected $primaryKey = 'operativoID';

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
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }


}

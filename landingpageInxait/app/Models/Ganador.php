<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganador extends Model
{
    use HasFactory;

    protected $table = 'ganadores';
    public $timestamps = true;
    protected $fillable = ['cliente_id', 'fecha_ganado'];
}

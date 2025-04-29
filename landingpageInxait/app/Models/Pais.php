<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    use HasFactory;

    protected $table = 'pais';

    protected $primaryKey='idPais';

    public $timestamps=true;

    protected $fillable =[
        'nombre',
        'descripcion'

    ];
    public $incrementing = true;
    protected $keyType = 'int';
}

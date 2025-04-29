<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudad';

    protected $primaryKey='idCiudad';

    public $timestamps=true;

    protected $fillable =[
     'nombre',
     'DepartamentoId',
     'estado'
    ];
    public $incrementing = true;
    protected $keyType = 'int';
}

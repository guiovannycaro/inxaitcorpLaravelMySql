<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey='idCliente';

    public $timestamps=true;

    protected $fillable =[
		'nombre',
		'apellido',
		'tipoDocumento_id',
		'numeroDocumento',
		'ciudadId',
		'telefono',
		'correo',
		'fechaCreacion',
		'habeasData'
    ];
    public $incrementing = true;
    protected $keyType = 'int';
}

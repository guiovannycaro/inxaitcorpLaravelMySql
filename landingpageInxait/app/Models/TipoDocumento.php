<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipodocumento';

    protected $primaryKey='idTipodocumento';

    public $timestamps=true;

    protected $fillable =[
        'descripcion',
        'estado'

    ];
    public $incrementing = true;
    protected $keyType = 'int';
}

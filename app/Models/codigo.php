<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class codigo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'codigo_web',
        'verificacion_web',
        'codigo_movil',
        'verificacion_movil'
    ];

}

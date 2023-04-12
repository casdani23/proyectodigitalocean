<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = "productos";

    protected $fillable=[
        'nombre',
        'cantidad',
        'precio',
        'calzado',
        'marca',
        'status'
    ];
}

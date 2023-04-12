<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
  
    public $timestamps=false;
    protected $table = "roles";

    protected $fillable = [
        'nombre_rol',
        'status'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}

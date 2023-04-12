<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\roles;

class rol extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol =[
            
         [

            
            'id' => 1,
            'nombre_rol' => 'cliente',
            'user_id' => 1,
            'status'=> true
            
            ],

            [
                'id' => 2,
                'nombre_rol' => 'supervisor',
                'user_id' => 2,
                'status'=> true
            ],
            [
                'id' => 3,
                'nombre_rol' => 'administrador',
                'user_id' => 3,
                'status'=> true
            ]
            ];
        
        
        DB::table('roles')->insert($rol);

    }
}

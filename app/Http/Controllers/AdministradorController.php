<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        $productos = Productos::all();


        return view('administrador', compact('users','productos'));

    }
    
    public function create()
    {
        //
    }

    

    public function store(Request $request)
    {
        //
    }

   

    public function show(string $id)
    {
        //
    }

    

    public function edit(string $id)
    {
        //
    }

   

    public function update(Request $request, string $id)
    {
        //
    }

 

    public function destroy(string $id)
    {
        //
    }
}

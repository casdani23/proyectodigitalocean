<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Codigoverificacionemail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Codigo;
use Illuminate\Support\Facades\Hash;


class supervisorController extends Controller
{
    public function index()
    {
        $users = User::all();
        $productos = Productos::all();


        return view('supervisor', compact('users','productos'));
    }
     /**
     * Show the form for creating a new resource.
     */
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(){
        $encryption_key = env('CRYPT_KEY');
        $codigoLogin = strval(mt_rand(100000, 999999));
        $codigoVerificación = strval(mt_rand(100000, 999999));

        $has_code = Codigo::where('user_id', Auth::user()->id)
            ->where('status',true)
            ->get();
            if(count($has_code)==0){
                $code_gen = new Codigo();
                $code_gen->user_id = Auth::user()->id;
                $code_gen->codigo_web = Hash::make($codigoLogin);
                $code_gen->verificacion_web = Crypt::encryptString($codigoLogin, $encryption_key);
                $code_gen->codigo_movil = Hash::make($codigoVerificación);
                $code_gen->codigo_Verificacion_movil = Crypt::encryptString($codigoVerificación, $encryption_key);
                $code_gen->save();
        
                $signed_url = URL::temporarySignedRoute(
                    'enviar', now()->addMinutes(30), Auth::user()->id
                );
                $mail= new Codigoverificacionemail($signed_url);
                Mail::to(Auth::user()->email)->send($mail);
            }

            return view('layouts.Envio_Codigo');
    }


    public function correoTokenSupervisor(Request $request){

        $signed_url = URL::temporarySignedRoute(
            'codigosupervisor', now()->addMinutes(30),
        );

             $email = $request->input('email');
              Mail::to($email)->send(new Codigoverificacionemail($signed_url));
        
     

        return redirect('supervisor');
    }


    



    /**
     * Display the specified resource.
     */
   
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }





    public function correoToken(){
            
        $signed_url = URL::temporarySignedRoute(
         'correoToken', now()->addMinutes(30),  );

          $mail= new Codigoverificacionemail($signed_url);
          Mail::to('hosstin12@gmail.com')->send($mail);

           $productos = Productos::all();
           return dd($productos);    
         
         }

}

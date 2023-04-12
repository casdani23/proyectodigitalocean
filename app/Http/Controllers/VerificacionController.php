<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\codigo;
use Illuminate\Support\Facades\URL;
use App\Mail\Codigoverificacionemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class VerificacionController extends Controller
{

    

    public function store(){
        $encryption_key = env('CRYPT_KEY');
        $codigoLogin = strval(mt_rand(100000, 999999));
        $codigoVerificación = strval(mt_rand(100000, 999999));
        $has_code = codigo::where('user_id', Auth::user()->id)
            ->where('status',true)->get();


            if(count($has_code)==0){
                $code_gen = new codigo();
                $code_gen->user_id = Auth::user()->id;
                $code_gen->codigo_web = Hash::make($codigoLogin);
                $code_gen->verificacion_web = Crypt::encryptString($codigoLogin, $encryption_key);
                $code_gen->codigo_movil = Hash::make($codigoVerificación);
                $code_gen->verificacion_movil = Crypt::encryptString($codigoVerificación, $encryption_key);
                    

                $code_gen->save();
        
                $signed_url = URL::temporarySignedRoute(
                    'html', now()->addMinutes(50), Auth::user()->id
                );


                $mail= new Codigoverificacionemail($signed_url);
                Mail::to(Auth::user()->email)->send($mail);

                 
            }

            return view('layouts.verificacionCodigo');


    }

    public function show()
    {   
       
            $encryption_key = env('CRYPT_KEY');
            $code = codigo::where('user_id', Auth::user()->id)->where('status',true)->first();
            return view('mostrarcodigoruta',['code'=>Crypt::decryptString($code->verificacion_web, $encryption_key)]);
        
    }

   
    
    
    public function validarcodigoapp(Request $request)
    {
        $encryption_key = env('CRYPT_KEY');
        $input_codigo_app = $request->input('input_codigo');
        $usuarios = codigo::where('status', true)->get();
        
        foreach ($usuarios as $codes) {
            if(Hash::check($input_codigo_app, $codes->codigo_web)){
                return response()->json([
                    'codigoL'=> Crypt::decryptString($codes->verificacion_movil, $encryption_key)
                ],201);
            }
        }
        return response()->json([
            'codigoL'=> Crypt::decryptString($codes->verificacion_movil, $encryption_key)
        ],201);
    }
  
    public function validarcodigologin(Request $request)
    {
        $login_code = $request->input('inputLogin');
        $user_codes = codigo::where('user_id', Auth::user()->id) ->where('status',true)->get();
        foreach ($user_codes as $codes) {
            if(Hash::check($login_code, $codes->codigo_movil)){
                $trust_code = codigo::find($codes->id);
                $trust_code->status = false;
                $trust_code->save();
                Session::put('code', $codes->codigo_web);
                return redirect('dashboard');
            }{
                return view('layouts.verificacionCodigo');

            }
        }

    }
    
   
}

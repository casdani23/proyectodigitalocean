<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use Illuminate\Support\Facades\Crypt;
use App\Models\codigo;
use Illuminate\Support\Facades\URL;
use App\Mail\Codigoverificacionemail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class ClienteController extends Controller
{
    
                public function index()
                {
                    $tokenValido = false; 
                    $productos = DB::table('productos')->orderBy('id')->get();
                    return view('dashboard', compact('productos','tokenValido'));
                }

            
                public function create()
                {
                    //
                }

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
            
            
                public function show(string $id)
                {
                    //
                }

   
            public function edit(int $id)
            {
                $producto = Productos::find($id);
                return view('vistainsertarProducto.viewInsertar', compact('producto'));
            }

   
            public function update(Request $request, string $id)
            {
                    $tokenValido = false;    
                    $producto = Productos::findOrFail($id);
                    $producto->nombre = $request->input('nombre');
                    $producto->cantidad = $request->input('cantidad');
                    $producto->precio = $request->input('precio');
                    $producto->calzado = $request->input('calzado');
                    $producto->marca = $request->input('marca');
                    $producto->save();

                    $productos = Productos::all();
                    return view('dashboard', compact('productos','tokenValido'));
                    }

    
                public function destroy(string $id)
                {
                    //
                }



                    public function activarProducto($id)
                    {
                        $producto = Productos::find($id);
                        $producto->status = 1;
                        $producto->save();
                        return redirect()->back();
                    }
        
                    public function desactivarProducto($id)
                    {
                        $producto = Productos::find($id);
                        $producto->status = 0;
                        $producto->save();
                        return redirect()->back();
                    }

                    public function correoToken(){
                        $tokenValido = false; 

                        $signed_url = URL::temporarySignedRoute(
                        'productos.correoToken', now()->addMinutes(30),  );

                        $supervisors = DB::table('users')
                        ->join('roles', 'users.id', '=', 'roles.user_id')
                        ->where('roles.nombre_rol', 'supervisor')
                        ->get();
        

            
                         $mail= new Codigoverificacionemail($signed_url);
                        Mail::to($supervisors)->send($mail); 
            
                        $productos = Productos::all();
                        return view('dashboard', compact('productos','tokenValido'));
                        
                        }

                        public function showtoken(Request $request)
                        {
                    
                            $userId= Auth::user()->id;
                            echo $userId;
                    
                                $codigoTokenModificarCliente = sprintf('%d-%s', rand(1, 100), 'ABCDEF123');
                                $token = new Token();
                                $token->token = $codigoTokenModificarCliente;
                                $token->user_id = $userId;
                                $token->status = true;
                                $token->save();
                
                            
                            
                                return view('vistaTokenClienteUPD', compact('codigoTokenModificarCliente'));  
                            
                            }


                            public function verificarToken(Request $request)
                            {
                                $tokenValido = false; 
                                $token = $request->input('token');
                                $userId = Auth::user()->id;
                                $tokenEncontrado = Token::where('user_id', $userId)
                                ->where('token', $token)
                                ->where('status', true)
                                ->first();
                                                            
                                if ($tokenEncontrado) {
                                    $tokenValido = true;
                                } else {
                                    $tokenValido = false;
                                }
                                $productos = Productos::all();
                                return view('dashboard', compact('productos'));
                            } 
                


            

             
}

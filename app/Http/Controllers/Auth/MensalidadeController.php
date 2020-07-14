<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Mene;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Controllers\MensalidadesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MensalidadeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
 */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nome do Cliente' => ['requerid', 'string', 'max:255'],
            'Data de entrega' => ['required', 'date'],
            'Ponto de partida' => ['required', 'string', 'max:255'],
            'Ponto de destino' => ['required', 'string', 'max:255'],
            //'filtro'  => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Mene
     */
    protected function create(array $data)
    {
        
        
        

      
    }

    public function entregas(Request $request)
    {
        
$data = $request->only('NomedoCliente', 'Datadeentrega', 'Pontodepartida', 'Pontodedestino');

      DB::table('entregas')->insert($data);
//return dd($data);
        return redirect()->route('login');
    }


}
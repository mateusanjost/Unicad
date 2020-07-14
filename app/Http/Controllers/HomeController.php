<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Mene;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class HomeController extends Controller
{
    use Notifiable;
    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $objMensalidades;

    public function __construct()
    {
        $this->middleware('auth');
        $this->objMensalidades= new Mene();
       
    }

    


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data =  $_COOKIE['email'];
        
        //$campos = Mene::all()->where('filtro', $data);
        $campos = Mene::all();
        $dados = Mene::select('entregas'); 
        
    //return dd($campos);
       return view('home', compact('campos', 'data'));

        
    }
 
    public function show() {
        
        
      
        return view('home');
         }

}

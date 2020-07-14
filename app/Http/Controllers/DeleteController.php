<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Mene;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class DeleteController extends Controller
{
    use Notifiable;
    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

   

    public function __construct()
    {
        $this->middleware('auth');
        //$this->objMensalidades= new Mene();
       
    }

    


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $data =  $_COOKIE['email'];
        
        $campos = Mene::where('id', $id)->delete ();
        
    
        //return dd($campos);
       //return "Deletado com sucesso";
       return redirect()->route('login');
        
    }
 

}

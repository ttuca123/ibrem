<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function list()
    {
        $usuarios = DB::table('users')->paginate(15);

        return view('usuarios', ['usuarios' => $usuarios]);
        ;

        //return view('usuarios')->with('contas_pagar', $contas_pagar);
    }


    protected function prepareUpdate($id)
    {
        $user = User::where('id', $id)->get();

        return view('usuarios')->with('user', $user);
        
    }
    
}

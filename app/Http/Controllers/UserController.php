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

    public function editar(Request $req) {
        $user = User::find ($req->id);
        $user->name = $req->nome;
        $user->email = $req->email;
        $user->save();

        return response()->json($user);
    }
  

    protected function list()
    {
        $usuarios = DB::table('users')->paginate(15);

        return view('usuarios', ['usuarios' => $usuarios]);
        ;       
    }

    public function remover(Request $req) {
        $user = User::find ($req->id);       
        $user->delete();

        return response()->json();
    }   
}

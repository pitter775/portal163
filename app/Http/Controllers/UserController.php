<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;



class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(User $model){
       // return view('users.index', ['users' => $model->paginate(15)]);
       $usuarios = User::all(); 
       return view("pages.usuarios", compact('usuarios'));

    }
    public function create(){
      return view('pages.usuarios_cadastro');         
    } 
    public function store(Request $request){
      $id_usuario = $request->input('id_usuario');
      $tem = DB::table('users')->where('email', $request->input('email'))->get();      
      $password = $request->input('password');
      
      if($id_usuario == ''){
        // CADASTRA
        if(!count($tem) == 0){
          return 'erro, Já existe o email cadastrado no sistema.';
        }
        $dados = new User();
      }else{
        // ATUALIZA
        $dados = User::find($id_usuario);
      }
        $dados->name = $request->input('name');
        $dados->telefone = $request->input('telefone');
        $dados->email = $request->input('email');
        if(isset($password)){
          $dados->password = Hash::make($request->input('password')); 
        }
        //$dados->password = Hash::make($request->input('password')); 
        $dados->save();            
        return $dados->id;
    }
    public function edit($id){
      $dados_geral = User::find($id);

      return view('pages.usuarios_cadastro', compact('dados_geral'));     
    }


    public function destroy_user($id){
      $dados = User::find($id);
      if(isset($dados)){
          try {
              $dados->delete();
              Session::put('message', 'Removido com sucesso!');
              return redirect("/usuarios");                
          }catch (PDOException $e) {
              if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                  Session::put('message', 'Erro, esse <b>Usuário</b> esta em uso em outro relacionamento.');
                  return redirect("/usuarios");
              }
          }
      }
    }
}

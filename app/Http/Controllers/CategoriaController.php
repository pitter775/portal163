<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $dados_geral = DB::table('categorias')->get();
        return view("pages.categorias", compact('dados_geral'));       
    }

    public function create(){
        return view('pages.categorias_cadastro');         
    } 

    public function store(Request $request){
 
        $categorias = $request->input('id_categoria');
        
        if($categorias == ''){
            // CADASTRA
            $dados = new Categoria();
        }else{
            // ATUALIZA
            $dados = Categoria::find($categorias);
        }
            $dados->nome = $request->input('nome');
            $dados->save();            
            return $dados->id;
    }

    public function edit($id){
        $dados_geral = Categoria::find($id);
  
        return view('pages.categorias_cadastro', compact('dados_geral'));     
      }

    public function destroy($id){
        $dados = Categoria::find($id);
        if(isset($dados)){
            try {
                $dados->delete();
                Session::put('message', 'Removido com sucesso!');
                return redirect("/categorias");                
            }catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    Session::put('message', 'Erro, essa <b>Categoria</b> esta em uso em outro relacionamento.');
                    return redirect("/categorias");
                }
            }
        }
    }
}

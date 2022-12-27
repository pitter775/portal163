<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Noticia_categoria;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

class NoticiaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $dados_geral = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->select('*','noticias.id As id')
        ->get();

       
        return view("pages.noticias", compact('dados_geral'));       
    }
    public function create(){
        $categorias = Categoria::all();
        return view('pages.noticias_cadastro', compact('categorias'));   
    } 
    public function store(Request $request){
 
        $noiticia = $request->input('id_noticia');

        $idscategoria = $request->input('id_categorias');
        $idscategoria = explode(",", $idscategoria);
        
               
        if($noiticia == ''){
            // CADASTRA
            $dados = new Noticia();
            
        }else{
            // ATUALIZA
            $dados = Noticia::find($noiticia);
            Noticia_categoria::where('noticias_id', $noiticia)->delete();

            foreach($idscategoria as $val){
                if($val != ''){
                    $dados_cat = new Noticia_categoria();
                    $dados_cat->noticias_id = $noiticia;
                    $dados_cat->categorias_id = $val;
                    $dados_cat->save(); 
                }           
            }
        }
            $dados->titulo = $request->input('titulo');
            $dados->users_id = Auth::user()->id;
            $dados->status = $request->input('status');
            $dados->resumo = $request->input('resumo');
            $dados->img_url = $request->input('img_url');
            $dados->destaque = $request->input('destaque');
            $dados->banner = $request->input('banner');
            $dados->texto = $request->input('descricao');
            $dados->save();  
            Noticia_categoria::where('noticias_id', $dados->id)->delete();

            foreach($idscategoria as $val){
                if($val != ''){
                    $dados_cat = new Noticia_categoria();
                    $dados_cat->noticias_id = $dados->id;
                    $dados_cat->categorias_id = $val;
                    $dados_cat->save(); 
                }           
            }          
            return $dados->id;
    }
    
    public function edit($id){
      $dados_geral = Noticia::find($id);
      $categorias = Categoria::all();
      return view('pages.noticias_cadastro', compact('dados_geral','categorias'));     
    }



    public function getidgategorias($id){
        $dados_geral = Noticia_categoria::where('noticias_id', $id)->get();
        $ids = '';
        foreach ($dados_geral as $value){
            $ids .= $value->categorias_id.',';
        }
        return $ids;
    }


    public function destroy($id){
      $dados = Noticia::find($id);
      if(isset($dados)){
          try {
              $dados->delete();
              Session::put('message', 'Removido com sucesso!');
              return redirect("/noticias");                
          }catch (PDOException $e) {
              if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                  Session::put('message', 'Erro, essa <b>Notícia</b> esta em uso em outro relacionamento.');
                  return redirect("/noticias");
              }
          }
      }
    }
}

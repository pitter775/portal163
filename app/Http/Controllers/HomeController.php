<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Filtro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Local;
use App\Models\Aditivo;
use App\Models\Municipio;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $noticias = DB::table('noticias')
        // ->join('users', 'users.id', '=', 'noticias.users_id')
        // ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        // ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        // ->select('*','noticias.id As id', 'categorias.nome As cnome')
        // ->orderBy('noticias.id', 'desc')
        // ->get();

        $patrocinio = DB::table('banners')
        ->orderBy('banners.posicao', 'asc')
        ->get();

        

        $noticias = DB::table('noticia_categorias')
        ->join('noticias', 'noticias.id', '=', 'noticia_categorias.noticias_id')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        // ->where("categorias.nome", $id)  
        ->orderBy('noticias.id', 'desc')
        ->get();

        $banner = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        ->where("noticias.banner", '1')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->orderBy('noticias.id', 'desc')
        ->get();

        $destaque = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        ->where("noticias.destaque", '1')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->orderBy('noticias.id', 'desc')
        ->get();

        $menu = DB::table('noticia_categorias')
        ->join('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        ->select('*','categorias.id As id')
        ->groupBy('categorias.nome')
        ->orderBy('categorias.nome', 'desc')
        ->get();
        $elementActive = 'HOME';       
        return view("pages.home", compact('noticias' , 'menu', 'elementActive', 'banner', 'destaque', 'patrocinio'));
    }

    public function show($id){
        $patrocinio = DB::table('banners')
        ->orderBy('banners.posicao', 'asc')
        ->get();

        $destaque = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        ->where("noticias.destaque", '1')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->orderBy('noticias.id', 'desc')
        ->get();

        $menu = DB::table('noticia_categorias')
        ->join('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        ->select('*','categorias.id As id')
        ->groupBy('categorias.nome')
        ->orderBy('categorias.nome', 'desc')
        ->get();

        $elementActive = 'Noticia';  

        $dados_geral = Noticia::find($id);
        return view('pages.noticias_show', compact('dados_geral','destaque','menu','elementActive', 'patrocinio'));  

    }

    public function tipo($id)
    {

        $patrocinio = DB::table('banners')
        ->orderBy('banners.posicao', 'asc')
        ->get();
  
        // $noticias = DB::table('noticias')
        // ->join('users', 'users.id', '=', 'noticias.users_id')
        // ->join('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        // ->leftjoin('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        // ->select('*','noticias.id As id', 'categorias.nome As cnome')
        // // ->where("categorias.nome", $id)
        // ->orderBy('noticias.id', 'desc')
        // ->get();
        // // echo '<script>console.log('.$id.')</script>';
        // // echo '<script>console.log('.$noticias.')</script>';


        $noticias = DB::table('noticia_categorias')
        ->join('noticias', 'noticias.id', '=', 'noticia_categorias.noticias_id')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->where("categorias.nome", $id)
        ->orderBy('noticias.id', 'desc')
        ->get();

        // print_r($noticias);

        $banner = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        ->where("noticias.banner", '1')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->orderBy('noticias.id', 'desc')
        ->get();

        $destaque = DB::table('noticias')
        ->join('users', 'users.id', '=', 'noticias.users_id')
        ->leftjoin('noticia_categorias', 'noticia_categorias.id', '=', 'noticias.id')
        ->leftjoin('categorias', 'categorias.id', '=', 'noticias.categorias_id')
        ->where("noticias.destaque", '1')
        ->select('*','noticias.id As id', 'categorias.nome As cnome')
        ->orderBy('noticias.id', 'desc')
        ->get();

        $menu = DB::table('noticia_categorias')
        ->join('categorias', 'categorias.id', '=', 'noticia_categorias.categorias_id')
        ->select('*','categorias.id As id')
        ->groupBy('categorias.nome')
        ->orderBy('categorias.nome', 'desc')
        ->get();
        $elementActive = $id;       
        return view("pages.home", compact('noticias' , 'menu', 'elementActive', 'banner', 'destaque' ,'patrocinio'));
    }

}

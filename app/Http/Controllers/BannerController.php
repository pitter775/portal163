<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados_geral = DB::table('banners')->get();
        return view("pages.banners", compact('dados_geral'));          
    }


    public function store(Request $request){
 
        $banner = $request->input('banners_id');
        
        if($banner == ''){
            // CADASTRA
            $dados = new Banner();
        }else{
            // ATUALIZA
            $dados = Banner::find($banner);
        }
            $dados->titulo = $request->input('titulo');
            $dados->link = $request->input('link');
            $dados->area = $request->input('area');
            $dados->posicao = $request->input('posicao');
            $dados->url_img = $request->input('url_img');
            $dados->save();  
            if($request->input('link') == ''){
                $dados->delete();
            }else{
                return $dados->id;
            }       
            
    }

}

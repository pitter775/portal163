<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Servico_tipo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDOException;

class Servico_tipoController extends Controller 
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
       
        $dados_geral = Servico_tipo::all();
        return view("pages.servico_tipos", compact('dados_geral'));
    }
    public function create(){
        
        return view('pages.servico_tipos_cadastro');        
    }
    public function store(Request $request){
        $id_servico = $request->input('id_servico');
        $tem = DB::table('servico_tipos')->where('nome', $request->input('nome'))->get();        

        if($id_servico == ''){
            // CADASTRA
            if(!count($tem) == 0){
                return 'erro, Já existe o serviço cadastrado no sistema.';
            }
            $dados = new Servico_tipo();
        }else{
            // ATUALIZA
            $dados = Servico_tipo::find($id_servico);
        }
        $dados->nome = $request->input('nome');
        $dados->save();            
        return $dados->id;
    }
    public function edit($id){

        $dados_geral = Servico_tipo::find($id);
        return view('pages.servico_tipos_cadastro', compact('dados_geral'));    
    }    
    public function destroy($id){
        $dados = Servico_tipo::find($id);
        if(isset($dados)){
            try {
                $dados->delete();
                Session::put('message', 'Removido com sucesso!');
                return redirect("/servico_tipos");                
            }catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    Session::put('message', 'Erro, esse <b>Serviço</b> esta em uso em outro relacionamento.');
                    return redirect("/servico_tipos");
                }
            }
        }  
     }
}

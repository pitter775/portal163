<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Municipio;
use App\Models\Regiao;
use App\Models\Filtro;
use App\Models\Gerenciadora;
use App\Models\Valida_cnpj_cpf;
use Illuminate\Support\Facades\Session;
use PDOException;

class ClienteController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $filtro = new Filtro();
        $clientes = $filtro->sql_filtros_clientes('clientes.nome','*, clientes.id As id, clientes.nome As nome, clientes.cnpj As cnpj, clientes.email As email, clientes.telefone As telefone');       
        $regiao = Regiao::all();
        $gerenciadora = Gerenciadora::all();
        return view('pages.clientes', compact('clientes', 'regiao', 'gerenciadora'));
    }
    public function create()
    {
        $municipios = Municipio::all();
        return view('pages.clientes_cadastro', compact('municipios'));        
    }
    public function store(Request $request)
    {
        $valida = new Valida_cnpj_cpf();
        if(! $valida->valida_cnpj($request->input('cnpj'))){
            return 'erro, CNPJ invalido.';
        }

        $id_cliente = $request->input('id_cliente');
        if($id_cliente == ''){
            $tem = DB::table('clientes')->where('cnpj', $request->input('cnpj'))->get();
            // CADASTRA
            if(count($tem) == 0){
                $cliente = new Cliente();
                $cliente->nome_abrev = $request->input('nome_abrev');
                $cliente->nome = $request->input('nome');
                $cliente->cnpj = $request->input('cnpj');
                $cliente->celular = $request->input('celular');
                $cliente->telefone = $request->input('telefone');
                $cliente->email = $request->input('email');
                $cliente->status = $request->input('status');
                $cliente->observacao = $request->input('observacao');
                $cliente->save();
                return $cliente->id;
            }else{
                return 'erro, Já existe o CNPJ cadastrado no sistema.';
            }
            
        }else{
            // ATUALIZA
            $clienteup = Cliente::find($id_cliente);
            if(isset($id_cliente)){
                $clienteup->nome_abrev = $request->input('nome_abrev');
                $clienteup->nome = $request->input('nome');
                $clienteup->cnpj = $request->input('cnpj');
                $clienteup->celular = $request->input('celular');
                $clienteup->telefone = $request->input('telefone');
                $clienteup->email = $request->input('email');
                $clienteup->status = $request->input('status');
                $clienteup->observacao = $request->input('observacao');
                $clienteup->cep = $request->input('cep');
                $clienteup->endereco = $request->input('endereco');
                $clienteup->numero = $request->input('numero');
                $clienteup->complemento = $request->input('complemento');
                $clienteup->bairro = $request->input('bairro');
                $clienteup->cidade = $request->input('cidade');
                $clienteup->estado = 'São Paulo';
                $clienteup->save();                
            }            
        }
    }
    public function edit($id)
    {
        $clientes = Cliente::find($id);
        $municipios = Municipio::all();
        return view('pages.clientes_cadastro', compact('municipios','clientes'));     
    }
    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        if(isset($clientes)){
            try {
                $clientes->delete();
                Session::put('message', 'Removido com sucesso!');
                return redirect("/clientes");
            }catch (PDOException $e) {
                if (isset($e->errorInfo[1]) && $e->errorInfo[1] == '1451') {
                    Session::put('message', 'Erro, esse <b>Cliente</b> esta em uso em outro relacionamento.');
                    return redirect("/clientes");
                }
            }
        }
    }
    public function getVerContratos($id){
        $clientes = Cliente::find($id);
        $contratos_mod = DB::table('contratos AS ct')
        ->join('clientes', 'clientes.id', '=', 'ct.clientes_id')
        ->where([
            ['ct.clientes_id', $id]
        ])
        ->select('*', 'ct.id AS ct','ct.nome AS ctnome')
        ->get();
        return  view('pages.clientes_modal_vercontratos', compact('contratos_mod','clientes'));       
    }
}

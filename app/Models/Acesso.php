<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Session;
use PDOException;

use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    public function perfil_acesso(){
        $filtro = '';
        $and = '';
        if(Auth::user()->acesso == 'Consulta'){
            if(Auth::user()->tipo_consulta == 'Cliente'){
                $id_cliente = Auth::user()->clientes_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' clientes.id = '.$id_cliente;               
            }
            if(Auth::user()->tipo_consulta == 'Região'){
                $regiaos_id = Auth::user()->regiaos_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' regiaos.id = '.$regiaos_id;
            }
            if(Auth::user()->tipo_consulta == 'Gerenciadora'){
                $gerenciadoras_id = Auth::user()->gerenciadoras_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' gerenciadoras.id = '.$gerenciadoras_id;
            }
        }

        if(Auth::user()->acesso == 'Operacional'){
            if(Auth::user()->tipo_gestor == 'CDHU'){
                $areas_id = Auth::user()->areas_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' areas.id = '.$areas_id;
            }
        }
        if(Auth::user()->acesso == 'Operacional'){
            if(Auth::user()->tipo_gestor == 'Gestor'){
                $regiaos_id = Auth::user()->regiaos_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' regiaos.id = '.$regiaos_id;
            }
        }
        if(Auth::user()->acesso == 'Operacional'){
            if(Auth::user()->tipo_gestor == 'Técnico'){
                $regiaos_id = Auth::user()->regiaos_id;
                if($filtro != null){ $and = ' AND';}
                if($filtro == null){ $where = ' WHERE';}else{$where = ''; }
                $filtro .= $and.$where.' regiaos.id = '.$regiaos_id;
            }
        }
        return $filtro;
    }
}
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'usuarios'
])

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>@if(isset($dados_geral->id)) Editar @else Cadastrar @endif Usuários</h5>
                        @if(isset($dados_geral->id))<h6 class="btn btn-primary btn-round">{{$dados_geral->name ?? ''}}</h6>@endif
                    </div>
                    <div class="card-body">                    
                            
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul id="tabs" class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">INFORMAÇÕES</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="my-tab-content" class="tab-content text-left">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                    <form name="form_informacoes" id="form_informacoes" novalidate>
                                        <input type="hidden" id="id_usuario" name="id_usuario" value="{{$dados_geral->id ?? ''}}">
                                        <p class="card-category">CADASTRAR USUÁRIO</p>                                    
                                        <div class="row">                                            
                                            <div class="col-md-9">
                                                <label>Nome</label>
                                                <div class="form-group">
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome do Usuário" value="{{$dados_geral->name ?? ''}}" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Login</label>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{$dados_geral->email ?? ''}}" required>
                                                </div>
                                            </div>
                                            @if(!isset($dados_geral))
                                            <div class="col-md-3">
                                                <label>Senha</label>
                                                <div class="form-group">
                                                    <input type="text" name="password" id="password" class="form-control" placeholder="Senha" value="">
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="footerint">
                                            <button type="submit" class="btn btn-outline-primary btn-round btn-sm"><i class="fa fa-cloud-upload"></i> Gravar Dados</button>
                                            <a href="/usuarios" class="btn btn-outline-info btn-round btn-sm"><i class="nc-icon nc-minimal-left"></i> Voltar</a>                                            
                                        </div>                                  
                                    </form>
                                </div>
                            </div>
                        
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    var appUrl ="{{env('APP_URL')}}";
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  

    $("#form_informacoes").submit(function(e) {           
        e.preventDefault();
        console.log('form_informacoes');
        if(validarform()){     
            let form = $(this);
            let id_usuario = $('#id_usuario').val(); 
            // console.log(form.serialize());
            $.ajax({
                type: "POST",
                url: appUrl+'/usuarios/cadastro',
                data: form.serialize(), 
                success: function(data)
                {
                    var result = data.split(',');
                    if(result[0] == 'erro'){
                        demo.showNotification('top','center', 'danger', result[1]);
                    }else{
                        if(id_usuario == ''){
                            demo.showNotification('top','center', 'success', 'Cadastro concluido com sucesso ');
                            $('#id_usuario').val(data);  
                            $('#id_usuario2').val(data); 
                            window.location.href = appUrl+'/usuarios';
                        }else{
                            demo.showNotification('top','center', 'info', 'Atualizado com sucesso ');
                        }
                    }
                    
                }
            });
        }
    });

    function validarform(){
        let validar = 'true';
        if($('#email').val().trim().length < 9) {
            demo.showNotification('top','center', 'danger', 'Email, invalido.');
            validar =  false;
        }
        if($('#password').val())
        {
            if($('#password').val().trim().length < 3) {
                demo.showNotification('top','center', 'danger', 'Senha, invalida.');
                validar =  false;
            }
        }       

        return validar;
    }

    </script>
@endpush
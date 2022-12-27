@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'categorias'
])

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>@if(isset($dados_geral->id)) Editar @else Cadastrar @endif  Categoria</h5>
                    </div>
                    <div class="card-body">

                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">INFORMAÇÕES</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content text-left">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                <p class="card-category">CADASTRAR CATEGORIA</p>   
                                <form name="form_informacoes" id="form_informacoes">
                                    <input type="hidden" id="id_categoria" name="id_categoria" value="{{$dados_geral->id ?? ''}}">
                                    <div class="row">   
                                        <div class="col-md-5">
                                            <label>Nome Categoria</label>
                                            <div class="form-group">
                                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da Categoria" value="{{$dados_geral->nome ?? ''}}">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="footerint">
                                        <button type="submit" class="btn btn-outline-primary btn-round btn-sm" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar Categoria</button>
                                        <a href="/categorias" class="btn btn-outline-info btn-round btn-sm"><i class="nc-icon nc-minimal-left"></i> Voltar</a>
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
    $("#telefone").mask("(99) 9999-9999");
    $("#cep").mask("99999-999");    

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        }
    });

    $("#form_informacoes").submit(function(e) {           
        e.preventDefault(); 
        let form = $(this);
        let id_categoria = $('#id_categoria').val(); 
            dados_serealize =  form.serializeArray();
        $.ajax({
            type: "POST",
            url: appUrl+'/categorias/cadastro',
            data: dados_serealize, 
            success: function(data)
            {
                if(id_categoria == ''){
                    demo.showNotification('top','center', 'success', 'Cadastro concluido com sucesso ');
                    $('#id_categoria').val(data);  
                    window.location.href = appUrl+'/categorias';
                }else{
                    demo.showNotification('top','center', 'info', 'Atualizado com sucesso ');
                }                
            }
        });
    });

</script>
@endpush
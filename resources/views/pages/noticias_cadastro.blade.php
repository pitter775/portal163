@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'noticias'
])

@section('content')
<style>
    .badge-info{ background-color: #777 !important; border: #777 !important; cursor: pointer; margin-left: 20px;}
    .badge-success{ cursor: pointer; margin-left: 20px;}
</style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>@if(isset($dados_geral->id)) Editar @else Cadastrar @endif  Notícia</h5>
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
                                <p class="card-category">CADASTRAR NOVA NOTÍCIA</p>   
                                <form name="form_informacoes" id="form_informacoes">
                                    <input type="hidden" id="id_noticia" name="id_noticia" value="{{$dados_geral->id ?? ''}}">
                                    <input type="hidden" id="id_categorias" name="id_categorias" value="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Selecione as Categorias</label><br style="clear: both;">
                                            <div style="margin-bottom: 20PX; margin-left: -20px">
                                            @foreach($categorias as $key => $value)
                                                <span class="badge badge-pill badge-info btcategorias" data-id="{{$value->id}}">{{$value->nome}}</span>
                                            @endforeach 
                                            </div>   
                                        </div>   
                                                                     
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-10">
                                            <label>Título</label>
                                            <div class="form-group">
                                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da Notícia" value="{{$dados_geral->titulo ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Status</label>
                                            <div class="form-group">
                                                <select class="table-group-action-input form-control" name="status"  required>
                                                    @if(isset($dados_geral))
                                                        @if($dados_geral->status == 'Ativo') <option selected>Ativo</option> @else <option>Ativo</option> @endif
                                                        @if($dados_geral->status == 'Inativo') <option selected>Inativo</option> @else <option>Inativo</option> @endif  
                                                    @else                                                            
                                    
                                                    <option data-select="status" selected>Ativo</option>
                                                    <option data-select="status" >Inativo</option>
                                                    @endif 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Resumo</label>
                                            <div class="form-group">
                                                <input type="text" name="resumo" id="resumo" class="form-control" placeholder="Resumo da Notícia" value="{{$dados_geral->resumo ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label>Endereço da Imagem de Destaque</label>
                                            <div class="form-group">
                                                <input type="text" name="img_url" id="img_url" class="form-control" placeholder="Endereço da Imagem de Destaque" value="{{$dados_geral->img_url ?? ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Configurar Posições</label><br style="clear: both;">
                                            <div style="margin-bottom: 20PX; margin-top: 7px; margin-left: -20px">
                                                <?php if(isset($dados_geral)){ ?>
                                                    <span class="badge badge-pill {{ $dados_geral->banner == '1' ? 'badge-success' : 'badge-info' }} btposicao" data-posicao="banner">Banner </span> 
                                                    <span class="badge badge-pill {{ $dados_geral->destaque == '1' ? 'badge-success' : 'badge-info' }} btposicao" data-posicao="destaque">Destaque </span> 
                                                <?php  }else{?>
                                                    <span class="badge badge-pill badge-info btposicao" data-posicao="banner">Banner </span> 
                                                    <span class="badge badge-pill badge-info btposicao" data-posicao="destaque">Destaque </span> 
                                                <?php } ?>
                                             

                                                <input type="hidden" id="banner" name="banner" value="{!!$dados_geral->banner ?? '' !!}">
                                                <input type="hidden" id="destaque" name="destaque" value="{!!$dados_geral->destaque ?? '' !!}">
                                            </div>   
                                        </div> 

                                        <div class="col-md-12">
                                            <label>Corpo da notícia</label>
                                            <textarea class="form-control" id="texto" name="texto">{!!$dados_geral->texto ?? '' !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="footerint">
                                        <button type="submit" class="btn btn-outline-primary btn-round btn-sm" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar Notícia</button>
                                        <a href="/noticias" class="btn btn-outline-info btn-round btn-sm"><i class="nc-icon nc-minimal-left"></i> Voltar</a>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'texto', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
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

    id_noticia = $('#id_noticia').val();
    if(id_noticia){
        $.get(appUrl+'/noticias/getidgategorias/'+id_noticia, function(data){     
            $('#id_categorias').val(data);
            var arrayid = $('#id_categorias').val().split(',');

            $('.btcategorias').each(function(i, obj) {
               for(var i=0; i<arrayid.length; i++) {
                    if(arrayid[i] == $(this).data('id')){
                        console.log('entrou');
                        $(this).addClass( 'badge-success' );
                        $(this).removeClass( 'badge-info' );  
                    }
                }

            });
            
        });
    }

    $('.btposicao').click(function(event ){
        event.preventDefault(); 
        let posicao = $(this).data('posicao');
        if(posicao == 'banner'){
            if($('#banner').val() == 1){
                $('#banner').val('0');
            }else{
                $('#banner').val('1'); 
            }
        }
        if(posicao == 'destaque'){
            if($('#destaque').val() == 1){
                $('#destaque').val('0');
            }else{
                $('#destaque').val('1'); 
            }
        }
       
        if($(this).hasClass('badge-info')){
            className1 = 'badge-success';
            className2 = 'badge-info';
        }else{
            className2 = 'badge-success';
            className1 = 'badge-info';
        }
        $(this).addClass( className1 );
        $(this).removeClass( className2 );        
    }); 

    $('.btcategorias').click(function(event ){
        event.preventDefault(); 
        let id = $(this).data('id');
        var idatual = id + ',';
        let id_categorias = $('#id_categorias').val()
        let temid = false;
        var arrayid = $('#id_categorias').val().split(',');
        arrayid.forEach(function(el, i){
            if(el === id.toString()) {
                temid = true
            }
        });
        if(!temid){
            let valor = id_categorias + idatual;            
            $('#id_categorias').val(valor);
        }else{         
            $('#id_categorias').val(id_categorias.replace(idatual, '')); 
        }        
        if($(this).hasClass('badge-info')){
            className1 = 'badge-success';
            className2 = 'badge-info';
        }else{
            className2 = 'badge-success';
            className1 = 'badge-info';
        }
        $(this).addClass( className1 );
        $(this).removeClass( className2 );        
    }); 

    $("#form_informacoes").submit(function(e) {           
        e.preventDefault(); 
        let form = $(this);
        let id_noticia = $('#id_noticia').val(); 
        let editorData = CKEDITOR.instances.texto.getData();;
        var dados_serealize = [];
            dados_serealize =  form.serializeArray();
            dados_serealize.push({name: "descricao", value: editorData});
            console.log(dados_serealize);
        $.ajax({
            type: "POST",
            url: appUrl+'/noticias/cadastro',
            data: dados_serealize, 
            success: function(data)
            {
                if(id_noticia == ''){
                    demo.showNotification('top','center', 'success', 'Cadastro concluido com sucesso ');
                    $('#id_noticia').val(data);  
                }else{
                    demo.showNotification('top','center', 'info', 'Atualizado com sucesso ');
                }                
            }
        });
    });

</script>
@endpush
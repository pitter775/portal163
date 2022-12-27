@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'banners'
])

@section('content')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="retorno_modal"></div>
    </div>
</div>

<style>
      .rowdivsao{ margin-bottom: 40px; background-color: #eee; padding: 10px 0; }
</style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Banners</h5>
                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-bottom: 30px;">
                            <div class="col-md-6" style="padding-top: 18px">
                                <img src="{{ asset('paper') }}/img/img-banner.png">
                            </div>

                            <div class="col-md-6">
                                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                                    <h4 class="card-title">Posições dos Banners</h4>                                    
                                        <div class="card card-plain">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                    <b>Banner 1</b>
                                                    <i class="nc-icon nc-minimal-down"></i>
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" >
                                                <div class="card-body">
                                                    @php
                                                        $cont = 0;
                                                    @endphp
                                                    @if(isset($dados_geral))
                                                    @foreach($dados_geral as $key => $value)
                                                        @if($value->area == '1')
                                                        <form name="form1{{ $value->id ?? '' }}" id="form1{{ $value->id ?? '' }}">
                                                            <input type="hidden" name="area" value="1">    
                                                            <input type="hidden" name="banners_id" id="banners1{{ $value->id ?? '' }}" value="{{ $value->id ?? '' }}">  
                                                            <div class="row rowdivsao">                                                                                                            
                                                                <div class="col-md-10">
                                                                    <label>Titulo</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="{{ $value->titulo ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Posição</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="posicao" class="form-control" placeholder="1" value="{{ $value->posicao ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="{{ $value->url_img ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-12">
                                                                    <label>link</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="{{ $value->link ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form1" data-banner="banners1" data-id="{{ $value->id ?? '' }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                </div>                                                                                                                   
                                                            </div>
                                                        </form>
                                                        @php  $cont = $cont + 1; @endphp
                                                        @endif                                                       
                                                    @endforeach 
                                                    @endif

                                                    @php  $cont = $cont + 1; @endphp
                                                    @for ($i = $cont; $i < 5; $i++)
                                                        <form name="form1{{ $i }}" id="form1{{ $i }}">
                                                            <input type="hidden" name="area" value="1">    
                                                            <input type="hidden" name="banners_id" id="banners1{{ $i }}" value="">  
                                                            <div class="row rowdivsao">                                                                                                            
                                                                <div class="col-md-10">
                                                                    <label>Titulo</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Posição</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="posicao" class="form-control" placeholder="1" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="">
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-12">
                                                                    <label>link</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form1" data-banner="banners1" data-id="{{ $i }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                </div>                                                                                                                   
                                                            </div>
                                                        </form>
                                                    @endfor                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-plain">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <b>Banner 2</b>
                                                    <i class="nc-icon nc-minimal-down"></i>
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="card-body">
                                                    @php
                                                        $cont2 = 0;
                                                    @endphp
                                                    @if(isset($dados_geral))
                                                    @foreach($dados_geral as $key => $value)
                                                        @if($value->area == '2')
                                                        <form name="form2{{ $value->id ?? '' }}" id="form2{{ $value->id ?? '' }}">
                                                            <input type="hidden" name="area" value="2">    
                                                            <input type="hidden" name="banners_id" id="banners2{{ $value->id ?? '' }}" value="{{ $value->id ?? '' }}">  
                                                            <div class="row rowdivsao">                                                                                                            
                                                                <div class="col-md-10">
                                                                    <label>Titulo</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="{{ $value->titulo ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Posição</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="posicao" class="form-control" placeholder="1" value="{{ $value->posicao ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="{{ $value->url_img ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-12">
                                                                    <label>link</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="{{ $value->link ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form2" data-banner="banners2" data-id="{{ $value->id ?? '' }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                </div>                                                                                                                   
                                                            </div>
                                                        </form>
                                                            @php $cont2 = $cont2 + 1; @endphp
                                                        @endif
                                                        
                                                    @endforeach 
                                                    @endif
                                                    @php  $cont2 = $cont2 + 1; @endphp
                                                    @for ($i = $cont2; $i < 5; $i++)
                                                        <form name="form2{{ $i }}" id="form2{{ $i }}">
                                                            <input type="hidden" name="area" value="2">    
                                                            <input type="hidden" name="banners_id" id="banners2{{ $i }}" value="">  
                                                            <div class="row rowdivsao">                                                                                                            
                                                                <div class="col-md-10">
                                                                    <label>Titulo</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Posição</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="posicao" class="form-control" placeholder="1" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="">
                                                                        </div>
                                                                    </div>
                                                                <div class="col-md-12">
                                                                    <label>link</label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form2" data-banner="banners2" data-id="{{ $i }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                </div>                                                                                                                   
                                                            </div>
                                                        </form>
                                                    @endfor                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-plain">
                                            <div class="card-header" role="tab" id="heading5">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                                    <b>Banner 3</b>
                                                    <i class="nc-icon nc-minimal-down"></i>
                                                </a>
                                            </div>
                                            <div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5">
                                                <div class="card-body">
                                                    @php
                                                        $cont3 = 0;
                                                    @endphp
                                                    @if(isset($dados_geral))
                                                    @foreach($dados_geral as $key => $value)
                                                        @if($value->area == '3')
                                                            <form name="form3{{ $value->id ?? '' }}" id="form3{{ $value->id ?? '' }}">
                                                                <input type="hidden" name="area" value="3">    
                                                                <input type="hidden" name="banners_id" id="banners3{{ $value->id ?? '' }}" value="{{ $value->id ?? '' }}">  
                                                                <div class="row rowdivsao">                                                                                                            
                                                                    <div class="col-md-10">
                                                                        <label>Titulo</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="{{ $value->titulo ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Posição</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="posicao" class="form-control" placeholder="1" value="{{ $value->posicao ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="{{ $value->url_img ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>link</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="{{ $value->link ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form3" data-banner="banners3" data-id="{{ $value->id ?? '' }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                    </div>                                                                                                                   
                                                                </div>
                                                            </form>
                                                            @php $cont3 = $cont3 + 1; @endphp
                                                        @endif
                                                        
                                                    @endforeach 
                                                    @endif
                                                    @php  $cont3 = $cont3 + 1; @endphp
                                                    @for ($i = $cont3; $i < 5; $i++)
                                                            <form name="form3{{ $i }}" id="form3{{ $i }}">
                                                                <input type="hidden" name="area" value="3">    
                                                                <input type="hidden" name="banners_id" id="banners3{{ $i }}" value="">  
                                                                <div class="row rowdivsao">                                                                                                            
                                                                    <div class="col-md-10">
                                                                        <label>Titulo</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Posição</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="posicao" class="form-control" placeholder="1" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>link</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form3" data-banner="banners3" data-id="{{ $i }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                    </div>                                                                                                                   
                                                                </div>
                                                            </form>
                                                        @endfor
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="card card-plain">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <b>Banner 4</b>
                                                    <i class="nc-icon nc-minimal-down"></i>
                                                </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="card-body">
                                                        @php
                                                            $cont4 = 0;
                                                        @endphp
                                                        @if(isset($dados_geral))
                                                        @foreach($dados_geral as $key => $value)
                                                            @if($value->area == '4')
                                                            <form name="form4{{ $value->id ?? '' }}" id="form4{{ $value->id ?? '' }}">
                                                                <input type="hidden" name="area" value="4">    
                                                                <input type="hidden" name="banners_id" id="banners4{{ $value->id ?? '' }}" value="{{ $value->id ?? '' }}">  
                                                                <div class="row rowdivsao">                                                                                                            
                                                                    <div class="col-md-10">
                                                                        <label>Titulo</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="{{ $value->titulo ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Posição</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="posicao" class="form-control" placeholder="1" value="{{ $value->posicao ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="{{ $value->url_img ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>link</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="{{ $value->link ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form4" data-banner="banners4" data-id="{{ $value->id ?? '' }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                    </div>                                                                                                                   
                                                                </div>
                                                            </form>
                                                            @php $cont4 = $cont4 + 1; @endphp
                                                            @endif
                                                            
                                                        @endforeach 
                                                        @endif
                                                        @php  $cont4 = $cont4 + 1; @endphp
                                                        @for ($i = $cont4; $i < 5; $i++)
                                                            <form name="form4{{ $i }}" id="form4{{ $i }}">
                                                                <input type="hidden" name="area" value="4">    
                                                                <input type="hidden" name="banners_id" id="banners4{{ $i }}" value="">  
                                                                <div class="row rowdivsao">                                                                                                            
                                                                    <div class="col-md-10">
                                                                        <label>Titulo</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="titulo"  class="form-control" placeholder="Titulo" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Posição</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="posicao" class="form-control" placeholder="1" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Endereço da Imagem</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="url_img" class="form-control" placeholder="Endereço da Imagem" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>link</label>
                                                                        <div class="form-group">
                                                                            <input type="text" name="link" class="form-control" placeholder="Endereço do link" value="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <button type="buttom" class="btn btn-outline-primary btn-round btn-sm btsubmit" data-form="form4" data-banner="banners4" data-id="{{ $i }}" id='btfiltrar'><i class="fa fa-cloud-upload"></i> Salvar</button>     
                                                                    </div>                                                                                                                   
                                                                </div>
                                                            </form>
                                                        @endfor                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ asset('paper') }}/img/banner1.png">
                                <img src="{{ asset('paper') }}/img/banner2.png">
                                <img src="{{ asset('paper') }}/img/banner3.png">
                                <img src="{{ asset('paper') }}/img/banner4.png">
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

    $('.btsubmit').click(function(event ){
        event.preventDefault(); 
        let id = $(this).data('id');
        let pos = $(this).data('form'); 
        let ban = $(this).data('banner');
        let form_id = '#'+pos+id;
        let banner_id = '#'+ban+id;


        let form = $(form_id);
        console.log(form_id);
     
        dados_serealize =  form.serializeArray();
        console.log(dados_serealize);
        $.ajax({
            type: "POST",
            url: appUrl+'/banners/cadastro',
            data: dados_serealize, 
            success: function(data)
            {
                if($(banner_id).val() == ''){
                    demo.showNotification('top','center', 'success', 'Cadastro concluido com sucesso ');
                    $(banner_id).val(data);
                }else{
                    demo.showNotification('top','center', 'info', 'Atualizado com sucesso ');
                }                
            }
        });
    });

    </script>
@endpush
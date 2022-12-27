@extends('layouts.app_news_not', ['class' => '','backgroundImagePath' => 'img/bg/fabio-mangione.jpg'])
 
@section('content')

<style>
    .radious4{-webkit-border-radius: 6px;  -moz-border-radius: 6px; border-radius: 6px;}
    .sombra2{-webkit-box-shadow: 0px 2px 2px 0px rgba(80, 80, 80, .3);       -moz-box-shadow: 0px 2px 2px 0px rgba(80, 80, 80, .3);            box-shadow: 0px 2px 2px 0px rgba(80, 80, 80, .3);}
    .link:hover{    text-decoration: none; color: #000;          -webkit-filter: contrast(1.3);    filter: contrast(1.3);          -webkit-transition: all .2s ease-in-out;    -moz-transition: all .2s ease-in-out;    -o-transition: all .2s ease-in-out;    transition: all .2s ease-in-out;}
    .notsele{ background-color: #fff;}
    .notsele:hover{ -webkit-box-shadow: 0px 4px 6px 0px rgba(80, 80, 80, .6);       -moz-box-shadow: 0px 4px 6px 0px rgba(80, 80, 80, .6);            box-shadow: 0px 4px 6px 0px rgba(80, 80, 80, .6); }            div {    margin: 0;    padding: 0;    border: 0;    font-size: 100%;    font: inherit;    vertical-align: baseline;    font-style: normal;}
    a{ text-decoration: none; color: #555}
    a:hover{ text-decoration: none; color: #000; -webkit-transition: all .2s ease-in-out;    -moz-transition: all .2s ease-in-out;    -o-transition: all .2s ease-in-out;    transition: all .2s ease-in-out;}
    a:after{ text-decoration: none; color: #000}
    a:active { text-decoration: none; color: #000;  }
    h1 { font-family:Montserrat,Helvetica Neue,Arial,sans-serif;  text-transform: uppercase; font-size: 20px; font-weight: 800; }
    img.left{ padding:10px; float: left; width: 60%; height: auto; background-color: #fff; border: solid 1px #ddd; margin-right: 10px; margin-bottom: 10px;  -webkit-border-radius: 6px;
    -moz-border-radius: 6px;box-shadow:none !important;
    border-radius: 6px;}
    img.right{ padding:10px; float: right; width: 60%; height: auto; background-color: #fff; border: solid 1px #ddd; margin-left: 10px; margin-bottom: 10px; -webkit-border-radius: 6px;
    -moz-border-radius: 6px; box-shadow:none !important;
    border-radius: 6px;}
    .conteudos img{-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px; box-shadow: 0px 10px 25px 0px rgba(0, 0, 0, 0.3);}
    .editor{ font-weight: bold; font-size: 12px; margin-top: -10px;}
    .editortime{ margin-top: -15px; font-size: 12px;}
    .btsocial{ background-color: none; width: 30px; border-radius: 15px; transition: transform .2s; /* Animation */ }
    .btsocial:hover{ transform: scale(1.5); }
    .abtsocial{float: right;  margin-left: 10px; }
    .abtsocial2{ margin-left: 10px; }
    
@media screen and (max-width: 700px) {

    img.left{width: 100%;}
  .login-page .content {
    padding-top: 10vh; } }

    
    </style>

<div class="container" >
    <div class="row" style="margin-top: 20px">
      
        <div class="col-md-8">
            <div class="row" style="margin-top: 20px;">   
                <div class="col-md-12 conteudonot">
                    <h1>{{$dados_geral->titulo ?? ''}}</h1>     
                    <div class="row">
                        <div class="col-6">
                            <p class="editor"> Por: portal163 </p> 
                            <p class="editortime">{{ date( 'd/m/Y' , strtotime($dados_geral->created_at))}} às  {{ date( 'H:i' , strtotime($dados_geral->created_at))}} </p>
                        </div>
                        <div class="col-6 text-right ">     
                            <div style="margin-top: -8px">
                                <a href="javascript:void(0)"  data-link="/noticias/show/{{$dados_geral->id ?? ''}}" onclick="share()" class="abtsocial"><img  class="btsocial" src="https://ayltoninacio.com.br/img/s/21w50.jpg" alt=""></a>                                                              
                                <a href="https://api.whatsapp.com/send?text=🧑‍🎤 Portal 163:  {{$dados_geral->resumo ?? ''}}  https://portal163.com.br/noticias/show/<?php echo $dados_geral->id ?>" class="abtsocial" id="zap"><img src="{{ asset('paper') }}/img/ico-zap.png" class="btsocial" ></a> 
                                <a href="" class="abtsocial" id="face"><img src="{{ asset('paper') }}/img/ico-face.png" class="btsocial" ></a>   
                            </div>                            
                        </div>             
                    
                    <div class="conteudos">
                        {!!$dados_geral->texto ?? ''!!}
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center " style="padding: 20px;">     
                            <div style="margin-top: -8px">
                                <a href="javascript:void(0)"  data-link="/noticias/show/{{$dados_geral->id ?? ''}}" onclick="share()" class="abtsocial2"><img  class="btsocial" src="https://ayltoninacio.com.br/img/s/21w50.jpg" alt=""></a>                                                              
                                <!-- <a href="https://api.whatsapp.com/send?text=https://portal163.com.br/noticias/show/<?php echo $dados_geral->id ?>" class="abtsocial2" id="zap"><img src="{{ asset('paper') }}/img/ico-zap.png" class="btsocial" ></a>  -->
                                <a href="https://api.whatsapp.com/send?text=🧑‍🎤 Progresso News:  {{$dados_geral->resumo ?? ''}}  https://portal163.com.br/noticias/show/<?php echo $dados_geral->id ?>" class="abtsocial2" id="zap"><img src="{{ asset('paper') }}/img/ico-zap.png" class="btsocial" ></a> 
                                <a href="" class="abtsocial2" id="face"><img src="{{ asset('paper') }}/img/ico-face.png" class="btsocial" ></a>   
                            </div>                            
                        </div>
                    </div>                    
                </div>  
                
                               

            </div>
        </div>

        <div class="col-md-4">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="background: none; margin: 20px 0px 0px 0">
                <div class="carousel-inner">
                    <?php $cont = 0 ?>
                    @foreach($patrocinio as $key => $value)
                        @if($value->area == 2 )
                            <div class="carousel-item {{ $cont == 0 ? 'active' : '' }}">
                                <a href="{{$value->link}}"><img class="d-block w-100 active" src="{{$value->url_img}}" data-holder-rendered="true"></a>
                            </div>                        
                            <?php $cont = $cont + 1 ?>
                        @endif
                    @endforeach 
                </div>
            </div>

            <div class="card" style="margin-top: 20px; padding: 20px">
                <div class="timeline-heading" style="margin-bottom: 20px;">
                    <span class="badge badge-pill badge-success">Destaque</span>
                </div>

                @foreach($destaque as $key => $value)

                    <div style="padding:10px">
                        <a href="/noticias/show/{{$value->id}}" >
                            <div class="row ">                 
                                <div class=" col-4 radious4" style="  height: 90px; background: url('{{$value->img_url}}')center center no-repeat; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
                                <div class=" col-8">
                                    <div style="display: table-cell; vertical-align: middle; height: 90px; font-weight:  bold">{{$value->titulo ?? ''}}</div>
                                </div>                
                            </div>
                        </a>
                    </div> 

                @endforeach               
           
            </div>
        </div>
              
    </div>
</div>

    
@endsection

@push('scripts')

<script>
    $('.carousel').carousel({
        interval: 10000
    })

//Constrói a URL depois que o DOM estiver pronto
document.addEventListener("DOMContentLoaded", function() {            
    //altera a URL do botão
    document.getElementById("face").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
}, false);

    function share(){
	if (navigator.share !== undefined) {
		navigator.share({
			title: '<?php echo $dados_geral->titulo ?>',
			text: '<?php echo $dados_geral->resumo ?>',
			url: 'https://portal163.com.br/noticias/show/<?php echo $dados_geral->id ?>',
		})
		.then(() => console.log('Successful share'))
		.catch((error) => console.log('Error sharing', error));
	}
}
</script>

@endpush
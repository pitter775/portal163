@extends('layouts.app_news', ['class' => '','backgroundImagePath' => 'img/bg/fabio-mangione.jpg'])
 
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
</style>

<div class="container" >
    <div class="row" style="margin-top: 20px;">
      
        <div class="col-md-8">
            <div class="bd-example" style="margin-bottom: 40px;" >
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background: none">
                    <ol class="carousel-indicators">
                        <?php $cont = 0 ?> 
                        @foreach($banner as $key => $value)
                            <li data-target="#carouselExampleCaptions" data-slide-to="{{ $cont }}" class="{{ $cont == 0 ? 'active' : '' }}"></li>
                            <?php $cont = $cont + 1 ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">

                    <?php $cont = 0 ?>
                    @foreach($banner as $key => $value)
                        <div class="carousel-item {{ $cont == 0 ? 'active' : '' }} radious4" style=" height: 500px; background: url('{{$value->img_url}}')center center no-repeat; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
                            <a href="/noticias/show/{{$value->id}}">
                                <div class="carousel-caption d-none d-md-block">
                                <h5><span style="background-color: #000; padding: 5px">{{$value->titulo ?? ''}}</span></h5>
                                <p><span style="background-color: #000;  padding: 5px">{{$value->resumo ?? ''}}</span></p>
                                </div>
                            </a> 
                        </div>
                        <?php $cont = $cont + 1 ?>
                    @endforeach 
                    </div>


                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
                <div class="row">
                <?php $contn = 1 ?>
                @foreach($noticias as $key => $value)
                <div class="col-md-6" >
                        <div style="padding:10px">
                            <a href="/noticias/show/{{$value->id}}" >
                                <div class="row radious4 sombra2 anima link notsele">                 
                                    <div class=" col-5 radious4" style="  height: 90px; background: url('{{$value->img_url ?? ''}}')center center no-repeat; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
                                    <div class=" col-7">
                                        <div style="display: table-cell; vertical-align: middle; height: 90px; font-weight:  bold">{{$value->titulo ?? ''}}</div>
                                    </div>                
                                </div>
                                <p style="position: absolute; bottom: 0px; right: 15px; font-size: 11px; line-height:5px; color: #ce0f17">{{$value->cnome ?? ''}}</p>
                            </a>
                        </div>                        
                    </div>


                    @if($contn == 4)
                    <div class="col-md-12" >
                        <div id="carouselExampleSlidesOnly4" class="carousel slide" data-ride="carousel" style="background: none; margin: 20px 0">
                            <div class="carousel-inner">
                                <?php $cont5 = 0 ?>
                                @foreach($patrocinio as $key => $value)
                                    @if($value->area == 3 )
                                        <div class="carousel-item {{ $cont5 == 0 ? 'active' : '' }}" >
                                            <a href="{{$value->link}}"><img class="d-block w-100 active" src="{{$value->url_img ?? ''}}" data-holder-rendered="true"></a>
                                        </div>                        
                                        <?php $cont5 = $cont5 + 1 ?>
                                    @endif
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    @endif                


                    
                    <?php $contn = $contn + 1 ?>
                @endforeach
                </div>
        </div>
        <div class="col-md-4" style="height: 1000px;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="background: none; margin: 0px 0px 0px 0">
                <div class="carousel-inner">
                    <?php $cont = 0 ?>
                    @foreach($patrocinio as $key => $value)
                        @if($value->area == 2 )
                            <div class="carousel-item {{ $cont == 0 ? 'active' : '' }}">
                                <a href="{{$value->link}}"><img class="d-block w-100 active" src="{{$value->url_img ?? ''}}" data-holder-rendered="true"></a>
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
                <?php $contn1 = 0 ?>
                @foreach($destaque as $key => $value)

                    <div style="padding:10px">
                        <a href="/noticias/show/{{$value->id}}" >
                            <div class="row ">                 
                                <div class=" col-4 radious4" style="  height: 90px; background: url('{{$value->img_url ?? ''}}')center center no-repeat; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"></div>
                                <div class=" col-8">
                                    <div style="display: table-cell; vertical-align: middle; height: 90px; font-weight:  bold">{{$value->titulo ?? ''}}</div>
                                </div>                
                            </div>
                        </a>
                    </div>

                    @if($contn1 == 5)
                    <div class="col-md-12" >
                        <div id="carouselExampleSlidesOnly4" class="carousel slide" data-ride="carousel" style="background: none; margin: 0px 0px 0px 0">
                            <div class="carousel-inner">
                                <?php $cont6 = 0 ?>
                                @foreach($patrocinio as $key => $value)
                                    @if($value->area == 4 )
                                        <div class="carousel-item {{ $cont6 == 0 ? 'active' : '' }}">
                                            <a href="{{$value->link}}"><img class="d-block w-100 active" src="{{$value->url_img ?? ''}}" data-holder-rendered="true"></a>
                                        </div>                        
                                        <?php $cont6 = $cont6 + 1 ?>
                                    @endif
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    @endif 
                    <?php $contn1 = $contn1 + 1 ?>
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
</script>

@endpush
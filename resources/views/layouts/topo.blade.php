<style>
    .titulo{
        font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
        font-weight: bold;
        font-size: 20px;
        text-transform: uppercase;
        -webkit-font-smoothing: antialiased;
    }
    .itemmenu{ text-transform: uppercase;  font-size: 15px; font-weight: bold; font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif; float: left; margin-right: 20PX; color: #888; }
    .ativo{ color: #941c1e !important; }
    h2{font-size: 1.5em !important}

    .sobranone{box-shadow:none !important}

    .logotop{padding-left: 0;}
    .logoto img{padding-top: 20px; margin-left: 20px }

        
@media screen and (max-width: 700px) {
.logotop img{ text-align: center;}
.logotop { text-align: center;}
.logotop a { text-align: center;}
img.left{width: 100%;}
.login-page .content { padding-top: 10vh; } 
}
</style>
<div class="container" >
    <div class="row">
        <div class="col-md-4 logotop" >
            <a href="/"><img src="{{ asset('paper') }}/img/logo.png" height="120px" style="padding-top: 20px;" ></a>
        </div>
        <div class="col-md-8" style="padding-right: 0;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="background: none; margin: 30px 15px 0px 0">
                <div class="carousel-inner">
                    <?php $cont = 0 ?>
                    @foreach($patrocinio as $key => $value)
                        
                        @if($value->area == 1 )
                        <script>
                            console.log('entrou')
                        </script>
                            <div class="carousel-item {{ $cont == 0 ? 'active' : '' }}">
                                <a href="{{$value->link}}"><img class="d-block w-100 active" src="{{$value->url_img}}" data-holder-rendered="true"></a>
                            </div>                        
                            <?php $cont = $cont + 1 ?>
                        @endif
                    @endforeach 
                </div>
            </div>
        </div>
        <div class="col-md-12" style=" margin-top: 20px; padding-top: 10px; padding-bottom: 10px; border-bottom: solid 2px #941c1e;">
        <div class="itemmenu {{ $elementActive == 'HOME' ? 'ativo' : '' }}" ><a href="/" class="{{ $elementActive == 'HOME' ? 'ativo' : '' }}">HOME</a></div>
        @foreach($menu as $key => $value)
            <?php
                $ativo = '';
                if($elementActive == $value->nome){
                    $ativo = 'ativo';
                }
            ?>
            <div class="itemmenu {{ $ativo }}" data-id="{{$value->id}}"><a href="/tipo/{{$value->nome}}" class="{{$ativo}}">{{$value->nome}}</a></div>
        @endforeach            
        </div>
    </div>
</div>
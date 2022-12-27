<div class="sidebar"> 
  
    <div class="divfiltro anima"> </div>
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <img class="avatar border-gray" src="{{ asset('avatar.jpg') }}" alt="...">
        </a>
        <a href="" class="simple-text logo-normal">{{ __(auth()->user()->name)}}</a>
       
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">          
            <li class="{{ $elementActive == 'home' ? 'active' : '' }}">
                <a href="/home">
                    <i class="nc-icon nc-bank" style="color:#fff !important"></i>
                    <p>{{ __('Home - Site') }}</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'noticias' ? 'active' : '' }}">
                <a href="/noticias">
                    <i class="nc-icon nc-paper" style="color:#fff !important"></i>
                    <p>{{ __('Notícias') }}</p>
                </a>
            </li>  

            <li class="{{ $elementActive == 'categorias' ? 'active' : '' }}">
                <a href="/categorias">
                    <i class="nc-icon nc-tile-56" style="color:#fff !important"></i>
                    <p>{{ __('Categorias') }}</p>
                </a>
            </li>    
            <li class="{{ $elementActive == 'banners' ? 'active' : '' }}">
                <a href="/banners">
                    <i class="nc-icon nc-app" style="color:#fff !important"></i>
                    <p>{{ __('Banners') }}</p>
                </a>
            </li>         
            
            <li class="{{ $elementActive == 'usuarios' ? 'active' : '' }}">
                <a href="{{ route('usuarios') }}">
                    <i class="nc-icon nc-single-02" style="color:#fff !important"></i>
                    <p>{{ __('Usuários') }}</p>
                </a>
            </li>
        </ul>        
    </div>
    
</div>


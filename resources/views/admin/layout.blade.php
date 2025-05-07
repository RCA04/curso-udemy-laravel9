<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--Tailwind-->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>    
  <ul id='dropdown1' class='dropdown-content'>
    @foreach ($categoriasMenu as $categoriaM )
    <li><a href={{route('site.categoria', $categoriaM->id) }}>{{$categoriaM->name}}</a></li>
    @endforeach
  </ul>
    
        <!-- Dropdown Structure -->
        <ul id='dropdown2' class='dropdown-content'>     
            <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{ route('profile.view')}}">Perfil</a></li>
            <li><a href="{{ route('login.logout')}}">Sair</a></li> 
          </ul>
      
      
          <nav class="red">
              <div class="nav-wrapper container ">
                 <a class="center brand-logo " href="{{route('site.index')}}"><img src="{{asset('img/logo.png')}}"></a>          
                <ul class="right ">                                 
                    <li class="hide-on-med-and-down"><a href="#" onclick="fullScreen()"><i class="material-icons">settings_overscan</i> </a> </li>
                    <li><a href="#" class="dropdown-trigger" data-target='dropdown2'>Olá {{Str::limit(auth()->user()->name, 32)}}<i class="material-icons right">expand_more</i> </a></li>     
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger left  show-on-large"><i class="material-icons">menu</i></a>
                <ul>
                <li><a class='dropdown-trigger' href='' data-target='dropdown1'>Categorias<i class="material-icons right">expand_more</i></a></li>
                <li><a href="{{ route('site.carrinho') }}">Carrinho<span class='new badge blue' data-badge-caption=''>{{\Cart::getContent()->count()}}</span> </a></li>
               </ul>
              </div>
            </nav>
          
            <ul>
  
          <ul id="slide-out" class="sidenav " >
            <li><div class="user-view">
              <div class="background red ">
               <img src="{{asset('img/office.jpg')}}" style="opacity: 0.5"> 
              </div>
                <a href="{{ route('profile.view') }}"><img class="circle" src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://img.icons8.com/fluency-systems-filled/48/user.png'}}"></a>
                <p class="white-text name">{{auth()->user()->name}}</p>
                <span class="white-text email">{{auth()->user()->email}}</span>
             </div></li> 
              <li><a href="{{ route('admin.dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
              <li><a href="{{ route('admin.produtos') }}"><i class="material-icons">playlist_add_circle</i>Produtos</a></li>
              <li><a href="{{ route('site.carrinho') }}"><i class="material-icons">shopping_cart</i>Pedidos</a></li>
              <li><a href="#!"><i class="material-icons">bookmarks</i>Categorias</a></li>
              <li><a href="#!"><i class="material-icons">people</i>Usuários</a></li>
          </ul>


      
    
    @yield('conteudo')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{asset('js/chart.js')}}" ></script>
    <script src="{{asset('js/main.js')}}"></script>

    @stack('graficos')
</body>
</html>
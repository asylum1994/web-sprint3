<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles -->
  <link rel="stylesheet" href="/css_provi/welcome.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <title>Welcome</title>
</head>
<body class="body_welcome">
   <header class="web_header movil_header">
     <!-- logo -->
    <a href="#" class="logo"><span>@devKantuta</span></a>
    
    <nav class="nav_container">
      <ul class="nav_items">
        <li class="nav_links">
          <a  class="link active_link"  onclick="getData()" >Home</a>
          <a href="{{route('crearJuego.index')}}" class="link">Jugar</a>
        </li>
      </ul>
    </nav>
    <!-- boton de login -->
    <button class="btn btn_nav" id="logOut">LogOut</button>
  </header>
  <!-- contenido del boby-->
  
 
  <main class="content_body">
    <div class="container">
      <h2>Pendiente</h2>
      <div class="container_card">
         @foreach ($data as $juego)
         @if($juego['estado_juego']=='pendiente') 
         <section class="card">
          <a href="{{ route('crearJuego.pendiente', ['id' => $juego['id']]) }}">
            <h3>{{$juego['nombre']}}</h3>
            <p><span>Monto :</span>{{$juego['monto']}} Bs</p>
            <p><span>Inicio :</span>{{$juego['fecha_inicio']}}</p>
          </a>
        </section>
       @endif
       @endforeach
      </div>
    </div>

    <div class="container">
      <h2>Iniciado</h2>
      <div class="container_card">
      @foreach ($data as $juego)
         @if($juego['estado_juego']=='iniciado') 
        <section class="card card_verde">
          <h3>{{$juego['nombre']}}</h3>
          <p><span>Monto :</span>{{$juego['monto']}} Bs</p>
          <p><span>Inicio :</span>{{$juego['fecha_inicio']}}</p>
        </section>
        @endif
        @endforeach
      </div>
    </div>

    <div class="container">
      <h2>Finalizado</h2>
      <div class="container_card">
      @foreach ($data as $juego)
         @if($juego['estado_juego']=='finalizado') 
        <section class="card card_rojo">
          <h3>{{$juego['nombre']}}</h3>
          <p><span>Monto :</span>{{$juego['monto']}} Bs</p>
          <p><span>Inicio :</span>{{$juego['fecha_inicio']}}</p>
        </section> 
        @endif
        @endforeach
      </div>
    </div>
    

  </main>


  <script>

  
   
  </script>
</body>
</html>
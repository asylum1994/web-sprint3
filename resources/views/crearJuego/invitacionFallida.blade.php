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
    <h2 class="fallidos">Invitaciones Fallidas</h2>  
    <table>
    <thead>
      <tr>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Operación</th>
      </tr>
    </thead>
     <tbody>
      @foreach($data as $juego)
     <tr>
        <td>{{$juego['telefono']}}</td>
        <td>{{$juego['email']}}</td>
        <td><button  class="button_fallido" >Reenviar</button></td>
      </tr>
     @endforeach
      
     
     
     </tbody>

    </table>

  </main>


  <script>

  
   
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="/css_provi/pendientes.css">
</head>
<body>
<form id="mi_formulario" method="POST" action="{{ route('empezar', ['id' =>$data[0]['id_juego']]) }}">
       @method('PUT')  
       @csrf      
  <div class="container">
    <div class="content">
      <h2>Pendiente</h2>
      <div class="pending">
        <label for="fecha">Editar Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <button type="submit" id="iniciar">Iniciar</button>
      </div>
      <div class="search">
        <label for="telefono">Buscar número de teléfono:</label>
        <input type="text" id="telefono" name="telefono" placeholder="Ingresa el número...">
        <button   id="buscar">Buscar</button>
      </div>
      </form>
      <div class="table">
        <div class="row header">
          <div>Teléfono</div>
          <div>Email</div>
          <div>Invitación</div>
        </div>
         @foreach($data as $value)
        <div class="row">
          <div>{{$value['telefono']}}</div>
          <div>{{$value['email']}}</div>
          @if($value['estado_participa']=='pendiente')
          <div class="invitacion pendiente">Pendiente</div>
          @elseif($value['estado_participa']=='aceptado')
          <div class="invitacion aceptado">Aceptado</div>
          @else 
          <div class="invitacion rechazado">Rechazado</div>
          @endif
        </div>
        @endforeach

      </div>
    </div>
  </div>
</body>
</html>

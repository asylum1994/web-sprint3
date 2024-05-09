<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CRUD Home</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2> <b>Crear Juego</b> </h2>
					</div>

				</div>
			</div>
            
            
             
    <form id="mi_formulario" method="POST" action="{{ route('crear_juego') }}">  
       @csrf      
        <div class="container">
             <div class="form-group">
             <label> <b>Nombre</b>  </label>
             <input type="text" name="nombre" maxlength="200" class="form-control&quot;" required id="id_nombre" oninput="validarNombre()">
             <span id="mensajeNombre" style="color: red;"></span>
             </div>

            <div class="form-group">
             <label> <b>Monto</b></label>
             <input type="number" name="monto" maxlength="200" class="form-control&quot;" required id="id_monto" oninput="validarMonto()">
             <span id="mensajeMonto" style="color: red;"></span>
            </div>
            
            <div class="form-group">
              <label for="id_periodo"><b>Periodo</b></label>
                 <select name="periodo" id="id_periodo" class="form-control" required>
                    <option value="">Elije una opción</option>
                    <option value="diario">Diario</option>
                    <option value="semanal">Semanal</option>
                    <option value="mensual">Mensual</option>
                 </select>
            </div>

            <div class="form-group">
             <label> <b>Fecha Inicio</b></label>
             <input type="date" name="fecha_inicio" maxlength="200" class="form-control&quot;" required  id="id_fecha_inicio" oninput="validarFecha()">
              <span id = "mensajeFecha" style="color: red;"></span>
            </div>
        </div>

        <div class="form-group">
             <label><b>Descripcion</b></label>
             <input type="text" name="descripcion" maxlength="200" class="form-control&quot;" required id="id_descripcion">
        </div>
         
        <input type="hidden" id="usuario" name="usuario" value="{{ Auth::user()->email }}">
        <input type="hidden" id="lista_objetos" name="lista_objetos">
         
		<div class="container">
        <h2><b>Invitados</b></h2>

		    <div class="col-sm-6">
				<a id="btn-abrir-modal" class="btn btn-success text-white"  ><i class="material-icons">&#xE147;</i> <span>agregar</span>  </a>
				<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
		    </div> 

		</div>
		    <br>
            <!-- tabla valores -->
			<table id="tablaDatos" class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>id</th>
			            <th>Phone</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				
					<!--<tr>
                        <td>1</td>
						<td></td>
						<td></td>
						<td>
							<a href="./create.html" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="./delete.html" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>-->
					</tr>
				

				</tbody>
			</table>  
		</div>

        
	</div>  
        <div class="col-sm-12 text-center">
				  <a class="btn btn-primary text-white" onclick="enviarDatos()" > <span>Crear Juego</span>  </a>
				  <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
		    </div>  
</div>
</form>

<!-- CODIGO VENTANA MODAL AGREGAR INVITADOS -->
<dialog id="modal" >
	<div>
         
	     <h2> <b>Invitado </b></h2>

		<div class="form-group">
             <label> <b>Phone</b>  </label>
             <input type="number" name="phone" maxlength="200" class="form-control&quot;" required id="id_phone">
        </div>
		
		<div class="form-group">
             <label> <b>Email</b>  </label>
             <input type="email" name="email" maxlength="200" class="form-control&quot;" required id="id_email">
             </div>

	     <div class="container">

		     <div class="col-sm-6">
				<a class="btn btn-success" onclick="guardarDatos()" ><i class="material-icons">&#xE147;</i> <span>guardar</span>  </a>
				<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
		     </div> 

			<div class="col-sm-6">
				<a id="btn-cerrar-modal" class="btn btn-danger" title="Close"  ><i class="material-icons">&#xE147;</i> <span>cancelar</span>  </a>
				<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
		    </div> 

		 </div>		 

	</div>
</dialog>

<!--------------------------------------------------------------------------------------------->

</body>
<script>
   
   const btnAbrirModal = document.querySelector('#btn-abrir-modal'); 
   const btnCerrarModal = document.querySelector('#btn-cerrar-modal'); 
   const modal = document.querySelector("#modal");
   
   btnAbrirModal.addEventListener("click",()=>{
	  modal.showModal(); 
   });

   btnCerrarModal.addEventListener("click",()=>{
	modal.close();
   });



   var cont = 1;
   var listaObjetos = [];
   function guardarDatos(){
	  var telefono = document.getElementById("id_phone").value;
     var email = document.getElementById("id_email").value; 
	  listaObjetos.push({id:cont, telefono:telefono,email:email});
      cont++; 
	  mostrarEnTabla();
	  modal.close();
	  document.getElementById("id_phone").value = "";
    document.getElementById("id_email").value = "";
   }

   
 function mostrarEnTabla() {
  var tabla = document.getElementById("tablaDatos").getElementsByTagName('tbody')[0];
  // Limpiar la tabla antes de agregar nuevas filas
  tabla.innerHTML = "";

  // Recorrer la lista de objetos
  listaObjetos.forEach(function(objeto) {
    // Crear una nueva fila
    var nuevaFila = tabla.insertRow(tabla.rows.length);

    // Insertar celdas con los valores del objeto
	var celdaId = nuevaFila.insertCell(0); 
    var celdaPhone = nuevaFila.insertCell(1);
    var celdaEmail = nuevaFila.insertCell(2);
	celdaId.innerHTML = objeto.id;
    celdaPhone.innerHTML = objeto.telefono;
    celdaEmail.innerHTML = objeto.email;
  });
}
    

function enviarDatos() {
        var listaSerializada = JSON.stringify(listaObjetos);
        document.getElementById("lista_objetos").value = listaSerializada;
        document.getElementById("mi_formulario").submit();
    }
////////////////////////// VALIDACIONES 


function validarNombre() {
    var nombreInput = document.getElementById("id_nombre");
    var mensajeNombre = document.getElementById("mensajeNombre");
    var nombre = nombreInput.value.trim(); // Obtener el valor del campo de entrada y eliminar espacios en blanco al inicio y al final

    if (nombre === "") {
        mensajeNombre.textContent = "El nombre no puede estar vacío";
        nombreInput.classList.add("invalid"); // Opcional: añadir una clase CSS para resaltar el campo
    } else {
        mensajeNombre.textContent = "";
        nombreInput.classList.remove("invalid"); // Opcional: eliminar la clase CSS si el campo es válido
    }
}

function validarMonto() {
    var montoInput = document.getElementById("id_monto");
    var mensajeMonto = document.getElementById("mensajeMonto");
    var monto = montoInput.value.trim(); // Obtener el valor del campo de entrada y eliminar espacios en blanco al inicio y al final

    if (monto === "") {
        mensajeMonto.textContent = "El monto no puede estar vacío";
        montoInput.classList.add("invalid"); // Opcional: añadir una clase CSS para resaltar el campo
    } else if(monto<1000 || monto > 20000){
        mensajeMonto.textContent = "solo puede ingresar montos entre 1000 Bs y 20.000 Bs";
        montoInput.classList.add("invalid");
    }else{
        mensajeMonto.textContent = "";
        montoInput.classList.remove("invalid");
    }
}


function validarFecha() {
    var fechaInput = document.getElementById("id_fecha_inicio");
    var mensajeFecha = document.getElementById("mensajeFecha");
    var fecha = new Date(fechaInput.value); 
    var fechaActual = new Date(); 
    var fechaPosterior=fechaActual.setDate(fechaActual.getDate() );
    console.log(fecha); 
    if (fechaInput.value === "") {
        mensajeFecha.textContent = "la fecha no puede estar vacío";
        fechaInput.classList.add("invalid"); 
    } else if(fecha>=fechaActual.getDate()){
        mensajeFecha.textContent = "";
        fechaInput.classList.remove("invalid");
    }else{
        mensajeFecha.textContent = "La fecha ingresada debe ser mayor o igual";
         fechaInput.classList.add("invalid");  
    }
}



</script>


</html>
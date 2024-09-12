<div class="containerAddProducts">
    <div class="titleContainer">
      <p>Agregar Modelo</p>
    </div>
  
    <div class="formularioContainer">
      <form id="miFormulario" class="miFormulario">
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" id="name" name="name" required>
      </div>
  
      <div class="form-group">
          <label for="code">Código:</label>
          <input type="text" id="code" name="code" required>
      </div>
  
      <div class="form-group">
          <label for="count">Cantidad:</label>
          <input type="number" id="count" name="count" required>
      </div>
  
      <div class="form-group">
          <label for="inventorie">Inventario:</label>
          <input type="number" id="inventorie" name="inventorie" required>
      </div>
  
      <div class="form-group divRow">
        <div class="form-group"> 
            <label for="opcionesProvedores">Provedores:</label>
            <select id="opcionesProvedores" class="select-wrapper">
            </select>
          </div>
          <div class="addProvedorBtn" id="addProvedorBtn">Nuevo proveedor</div>
      </div>

      
  
      <button type="button" id="btnGuardarModel" class="btn-enviar">Enviar</button>
  
      </form>
    </div>
  
  
  

  </div>
  
      <!-- Modal -->
      <div id="modalProveedor" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Agregar Nuevo Proveedor</h2>
            <form id="formNuevoProveedor" method="post" action="{{ 'http://127.0.0.1:8000/add/addProveedor' }}" > 
              @csrf
                <div class="form-group">
                    <label for="newProveedorName">Nombre del Proveedor:</label>
                    <input type="text" id="newProveedorName" name="newProveedorName" required>
                </div>
                <div class="form-group">
                    <label for="newProveedorContacto">Numero telefonico:</label>
                    <input type="number" id="newProveedorNumero" name="newProveedorNumero" required>
                </div>
                <div class="form-group">
                    <label for="newProveedorEmail">Direccion:</label>
                    <input type="text" id="newProveedorDireccion" name="newProveedorDireccion" required>
                </div>
                <button type="button" id="btnGuardar" class="btn-enviar">Guardar</button>
              </div>
            </form>
     </div>
  
  <script>
  
  
  // Obtener elementos del DOM
  const modal = document.getElementById("modalProveedor");
  const btn = document.getElementById("addProvedorBtn");
  const span = document.getElementById("closeModal");

  var provedores = [{id: 00, name: "wito"}]
  
  // Abrir el modal cuando se hace clic en el botón "Nuevo proveedor"
  btn.onclick = function() {
      modal.style.display = "block";
  }
  
  // Cerrar el modal cuando se hace clic en la "X"
  span.onclick = function() {
      modal.style.display = "none";
  }
  
  document.getElementById('btnGuardar').addEventListener('click', function() {
   
            var newProveedorName = $('#newProveedorName').val()
            var newProveedorNumero = $('#newProveedorNumero').val()
            var newProveedorDireccion = $('#newProveedorDireccion').val()
    
    $.ajax({
              url: '/admin/addProvedor',
              type: 'POST',
              data: {
                  _token: "{{ csrf_token() }}",
                  name: newProveedorName,
                  number: newProveedorNumero,
                  address: newProveedorDireccion

              },
              success: function(response) {
                console.log("Registro exitoso antes", provedores);

                provedores.unshift({id: response.IDProvedor, name: response.name })
                console.log("Registro exitoso", provedores);

                alert("Registro Exitoso ")
                modal.style.display = "none";
                //Aqui agregar nombre de provedor
                $('#opcionesProvedores').empty();
                
                // Agregar opción por defecto
                $('#opcionesProvedores').append('<option value="">Seleccione un proveedor</option>');
                
                // Recorrer los proveedores y llenar el select con nuevas opciones
                provedores.forEach(function(proveedor) {
                    $('#opcionesProvedores').append('<option value="' + proveedor.id + '">' + proveedor.name + '</option>');
                });

                 // downloadCotizacion(id)
              },
              error: function(xhr, status, error) {
                  alert("Error, ", error)
                  modal.style.display = "none";
              }
          });
  
  
      });
 document.getElementById('btnGuardarModel').addEventListener('click', function() {
   
    const provedorId = document.getElementById('opcionesProvedores');
    const valorSeleccionado = provedorId.value;
    var codeID = $('#code').val()
    var name = $('#name').val()

   $.ajax({
        url: '/admin/Model',
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            inventorieID: valorSeleccionado,
            codeID: codeID,
            name: name

        },
        success: function(response) {
            console.log("Registro exitoso", response);
            
          alert("Registro Exitoso ", response.IDProvedor)
            // downloadCotizacion(id)
        },
        error: function(xhr, status, error) {
            alert("Error, ", error)

        }
    });


});


  
      
  
  </script>
  
  
  <style>
      .containerAddProducts {
      display: flex;
      flex-direction: column;
      align-content: center;
      background-color: #f5f1f7;
     
      height: auto;
      margin-block: 10px;
      margin-inline: 10px;
      width: auto;
      
    }
    .titleContainer {
      background-color: #4CAF50; /* Color de fondo */
      color: white; /* Color del texto */
      padding: 20px; /* Espaciado interno */
      border-radius: 10px; /* Bordes redondeados */
      text-align: left; /* Centra el texto horizontalmente */
      margin-bottom: 20px; /* Espaciado inferior */
  }
  .titleContainer p {
      font-size: 24px; /* Tamaño de fuente del título */
      font-weight: bold; /* Negrita */
      margin: 0; /* Elimina el margen por defecto del párrafo */
  }
    .formularioContainer {
      display: flex;
      padding-top: 50px;
      padding-bottom: 50px;
      padding-left: 20px;
      width: 100%;
      background-color: #2abf16;
  
    }
    .miFormulario {
      width: 400px
    }
    .form-group {
      margin-bottom: 15px;
  }
  .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
  }
  .form-group input {
      width: 100%;
      padding: 8px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
  }
  
  
  .divRow {
      display: flex;
      align-items: center;
      justify-content: space-between;
  }
  
  
    .addProvedorBtn {
      display: inline-block;
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      text-align: center;
      border-radius: 5px;
      cursor: pointer;
      user-select: none; /* Evita la selección de texto */
      font-size: 13px;
      transition: background-color 0.3s ease;
      width: 150px; /* Define un ancho específico */
      height: 30px; /* Define una altura específica */
      margin-inline: 10px;
      text-align: center;
  }
  
  
  .addProvedorBtn:hover {
      background-color: #45a049;
  }
  
  .addProvedorBtn:active {
      background-color: #3e8e41;
  }
  
  .btn-enviar {
      background-color: #4CAF50; /* Color de fondo */
      color: white; /* Color del texto */
      padding: 12px 24px; /* Espaciado interno */
      font-size: 16px; /* Tamaño de la fuente */
      border: none; /* Sin bordes */
      border-radius: 5px; /* Bordes redondeados */
      cursor: pointer; /* Cambia el cursor al pasar por encima */
      text-transform: uppercase; /* Texto en mayúsculas */
      transition: background-color 0.3s ease, transform 0.3s ease; /* Transiciones suaves */
  }
  
  .btn-enviar:hover {
      background-color: #45a049; /* Color al pasar el mouse */
      transform: scale(1.05); /* Efecto de agrandamiento */
  }
  
  .btn-enviar:active {
      background-color: #3e8e41; /* Color al presionar */
      transform: scale(1); /* Vuelve al tamaño original */
  }
  
  .btn-enviar:focus {
      outline: none; /* Elimina el contorno predeterminado al hacer clic */
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Sombra para indicar enfoque */
  }
  
  /* Estilos para el modal */
  .modal {
      display: none; /* Escondido por defecto */
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro */
  }
  
  .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      border-radius: 10px;
      width: 80%;
      max-width: 500px;
  }
  
  .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
  }
  
  .close:hover,
  .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
  }
  </style>
  
  
  
<div class="containerAddProducts">


  <div class="titleContainer">
    <p>Agregar Producto</p>
  </div>

  <div class="formularioContainer">

    <form id="miFormulario" class="miFormulario">

      <div class="form-group">
        <label for="name">Nombre de Producto: *</label>
        <input type="text" id="nameProduct" name="nameProduct"  required>
      </div>

      <div class="form-group"> 
        <label for="opcionesModelosProduct">Elige un Modelo: *</label>
        <select id="opcionesModelosProduct" class="select-wrapper">
        </select>
      </div>

    <div class="form-group">
        <label for="name">Code Model: *</label>
        <input type="text" id="codeModel" name="codeModel"  required>
    </div>

    <div class="form-group">
      <label for="opcionesProvedor">Provedor :</label>
      <div id="ProvedorToProduct" >
        <select id="opcionesProvedor" class="select-wrapper">
        </select>
      </div>
    </div>
      
      <div class="form-group">
        <label for="marcaInput">Marca : *</label>
        <input type="text" id="marcaInput" name="marcaInput" required><br><br>
      </div>

      <div class="form-group">
        <label for="edad">Genero: *</label>
        <select id="opcionesGenero" class="select-wrapper">
          <option value="U">Unisex</option>
          <option value="H">Hombre</option>
          <option value="M">Mujer</option>
         

        </select>
      </div>

      <button type="button" id="btnGuardarProduct">Enviar form</button>

    </form>

    <div class="AddTallas">
      <div class="containerCard">
        <div class="titleContainerTallas" >
          <p>Agregar tallas</p>
        </div>

        <div class="containerTallas">
          <div class="containerRowElementos" id="containerRowElementos">

          </div>


          <div class="containerMediasTallas">
            <div class="titleContainerTallas" >
              <p>Agregar Medias</p>
            </div>
            <div class="iconContainer" id="iconContainer">
              <img class="iconClose" src="{{ asset('storage/closeBack.png') }}" alt="Mi imagen">
            </div>
            <div class="contenedorGridMedias" id="contenedorGridMedias" >
              <div class="elementoMedias" data-index="0">9/11</div>
              <div class="elementoMedias" data-index="1">12/14</div>
              <div class="elementoMedias" data-index="2">15/17</div>
              <div class="elementoMedias" data-index="3">18/21</div>
              <div class="elementoMedias" data-index="4">22/24</div>
              <div class="elementoMedias" data-index="5">25/28</div>
            </div>




            <div class="SelectorTallas" id="SelectorTallas" >
              <div class="form-group">
                <label for="name">Precio</label>
                <input type="number" id="price" name="price" required>
              </div>

              <div class="form-group">
                <label for="priceBuyed">Precio de compra</label>
                <input type="text" id="priceBuyed" name="priceBuyed" required>
              </div>

              <div class="contenedorGridTallas" id="contenedorGridTallas">
              </div>
            </div>


          </div>
  
        </div>
      </div>


    </div>

  </div>

</div>



<!-- Modal para seleccionar color -->
<div class="colorModal" id="colorModal" >
  <div class="modal-dialog">
    <div class="modalColor-content">

      <span class="close" id="closeColorModal">&times;</span>

      <div class="modal-header">
        <h5 class="modal-title" id="colorModalLabel">Seleccionar Color</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Paleta de colores en tonos de gris -->
        <div id="colorPalette" class="d-flex flex-wrap">
          <!-- Agregar botones o divs para los tonos de gris -->

        </div>
      </div>

    </div>
  </div>
</div>










<script>

  


document.addEventListener('DOMContentLoaded', function () {
  getColor()

})




// Obtener elementos del DOM

const iconContainer = document.getElementById('iconContainer');
const contenedorGridMediasElem = document.getElementById('contenedorGridMedias');
const contenedorGridTallasElem = document.getElementById('SelectorTallas');
// Añadir evento de click a cada celda de tallas
const tallasCells = document.querySelectorAll('.elementoTallas');
const colorModal = document.getElementById("colorModal");
const spanColor = document.getElementById("closeColorModal");
const btnGuardarProduct = document.getElementById('btnGuardarProduct');
const selectModel = document.getElementById('opcionesModelosProduct');


let itemsSeleccionados = [];
let modelos = [];
let provedoresResponse = [];
let coloresArr = [];


 // Cerrar el modal cuando se hace clic en la "X"
 spanColor.onclick = function() {
  colorModal.style.display = "none";
  }


iconContainer.style.display = 'none'; 
document.getElementById('iconContainer').addEventListener('click', function() {
       contenedorGridTallasElem.style.display =  'none';
        contenedorGridMediasElem.style.display = 'grid';
        iconContainer.style.display = 'none'; 
        
        
});

       // Selecciona todos los elementos del grid y agrega el event listener
document.querySelectorAll('.elementoMedias').forEach(item => {
      item.addEventListener('click', handleClick);
});

function handleClick(event) {

  
  iconContainer.style.display = 'block';  // Muestra la imagen

   const TallasArray9 = ["9", "9.5", "10", "10.5", "11", "11.5"];
   const TallasArray12 = ["12", "12.5", "13", "13.5", "14", "14.5"];
   const TallasArray15 = ["15", "15.5", "16", "16.5", "17", "17.5"];
   const TallasArray18 = ["18", "18.5", "19", "19.5", "20", "20.5"];
   const TallasArray21 = ["21", "21.5", "22", "22.5", "23", "23.5", "24"];
   const TallasArray25 = ["25", "25.5", "26", "26.5", "27", "27.5","28", "28.5","29", "29.5"];

   const stringArray = [TallasArray9, TallasArray12,TallasArray15,TallasArray18,TallasArray21 ,TallasArray25];

  const index = parseInt(event.target.getAttribute('data-index'), 10);
  console.log("indice tocado", event)
               $('#contenedorGridTallas').empty();
               const value = stringArray[index];
                
                // Ejecuta la lógica deseada con el valor
              
                contenedorGridMediasElem.style.display = 'none';
                
                //mandar a llamar funcion que agregue los elementos al grid
                contenedorGridTallasElem.style.display =  'grid';
                
                value.forEach(tallas => {
                   console.log("ejecutandose for", tallas)
                   $('#contenedorGridTallas').append(renderizarTallasCells(tallas));
                })

  if (index >= 0 && index < stringArray.length) {
                // Obtén el valor del arreglo usando el índice

               

            } else {
                console.error('Índice fuera de rango');
            }
}

function renderizarTallasCells(item) {
        return `
      
        <div class="elementoTallas" data-valor="${item}">${item}</div>
    `;
    }
function contarTallas() {
    const cantidadTallas = itemsSeleccionados.length;
    console.log('Cantidad de tallas agregadas:', itemsSeleccionados);
    return cantidadTallas;
}


// Listener de elegit tallas
    let index = 0;
    $('#contenedorGridTallas').on('click', '.elementoTallas', function() {
    const valorTocado = $(this).data('valor');  // Obtener el valor del atributo data-valor
    const price =  $('#price').val()
    const priceGot = $('#priceBuyed').val()
    console.log('Se tocó el item:', valorTocado);

    var colorTocado = 0
     index += 1 
    itemsSeleccionados.push({ index: index, talla: valorTocado, color: colorTocado , price: price, priceBuyed: priceGot });
    contarTallas()
    // Aquí agregar views al contenedor containerRowElementos
    $('#containerRowElementos').append(`
        <div class="elementoOvalado" data-id="${index}">
            <span class="textoCentral"> Talla: ${valorTocado}</span>
            <button class="botonOvaladoColor" data-id="${index}">Color</button>
            <button class="botonOvalado">X</button>
        </div>
    `);
});

// Delegar evento de click en el botón "X" para eliminar el elemento de la vista
$('#containerRowElementos').on('click', '.botonOvalado', function() {
    const divElemento = $(this).closest('.elementoOvalado');
    const id = divElemento.data('id')
    itemsSeleccionados = itemsSeleccionados.filter(item => item.index !== id);

    contarTallas();
    divElemento.remove();
});


// Delegar evento de click en el botón "Color" para mostrar el modal de selección de color
$('#containerRowElementos').on('click', '.botonOvaladoColor', function() {
    const divElemento = $(this).closest('.elementoOvalado');
    const id = divElemento.data('id');

    // Almacenar el id del elemento en un atributo data en el modal para referencia
    $('#colorModal').data('element-id', id);
    console.log("Elemento cambio de color", id)
    // Mostrar el modal
    colorModal.style.display = "block";
});

    // Manejar la selección de color desde la paleta
    $('#colorPalette').on('click', '.color-option', function() {
        const nuevoColor = $(this).data('color');
        const id = $('#colorModal').data('element-id');

        // Ejecutar una función personalizada con el color seleccionado
        ejecutarFuncionConColor(nuevoColor, id);

        // Cerrar el modal
        colorModal.style.display = "none";

    });

function ejecutarFuncionConColor(color, id) {
    console.log('Color seleccionado:', color);
    console.log('ID del elemento:', id);

    // Aquí puedes actualizar el color en la vista o en el arreglo itemsSeleccionados
    $('.botonOvaladoColor[data-id="' + id + '"]').css('background-color', coloresArr[color - 1].color);

    // Actualizar el color en el arreglo itemsSeleccionados
    itemsSeleccionados = itemsSeleccionados.map(item =>
        item.index === id ? { ...item, color: color } : item
    );

    console.log('Elementos seleccionados después de actualizar color:', itemsSeleccionados);
}

selectModel.addEventListener('click', function() {
  $.ajax({
        url: '/modelos',
        type: 'GET',
        data: {
            _token: "{{ csrf_token() }}"

        },
        success: function(response) {
            console.log("get modelos Exitoso", response.data);


            modelos = response.data

            $('#opcionesModelosProduct').empty();
                
            // Agregar opción por defecto
            $('#opcionesModelosProduct').append('<option value="">Seleccione un Modelo</option>');
                
            // Recorrer los proveedores y llenar el select con nuevas opciones
            modelos.forEach(function(modelo) {
                $('#opcionesModelosProduct').append('<option value="' + modelo.id + '">' + modelo.name + '</option>');
            });
         
            
          
        },
        error: function(xhr, status, error) {
            alert("Error, ", error)
        }
    });

})

document.getElementById('opcionesModelosProduct').addEventListener('change', function() {
    var selectedValue = this.value;
    console.log('Seleccionaste valor: ' + selectedValue);
    var modelCurrent = modelos.find(item => item.id == selectedValue);
    
    // Aquí puedes hacer algo con el valor seleccionado
    document.getElementById('codeModel').value =  modelCurrent.codeID
    getProvedores(modelCurrent.id)
  });


btnGuardarProduct.addEventListener('click', function(){

  const model = document.getElementById('opcionesModelosProduct');
  const genero = document.getElementById('opcionesGenero');
  const marca =  $('#marcaInput').val()
  const price =  $('#price').val()
  const priceGot = $('#priceBuyed').val()
  const nameProduct = $('#nameProduct').val()
  var provedorName = ''
  if (provedoresResponse === 0) {
     provedorName = $('#opcionesProvedorInput').val()
  } else {
     provedorName = document.getElementById('opcionesProvedor').value;

  }

 let modelValue = model.value;
 let generoValue = genero.value;
 let arrElemet = itemsSeleccionados;

 console.log('Enviar formulario', arrElemet)




  $.ajax({
        url: '/products',
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            nameProduct: nameProduct,
            marca: marca,
            price: price,
            priceBuyed: priceGot,
            modelValue : modelValue,
            generoValue: generoValue,
            elements: arrElemet,
            nameProvedor :  provedorName 
           

        },
        success: function(response) {
            console.log("Registro exitoso", response);
            
          alert("Registro Exitoso ")
          location.reload();
          
        },
        error: function(xhr, status, error) {
            alert("Error, ", error)
        }
    });

})

function getProvedores(id) {
  $.ajax({
        url: '/provedores/' + id,
        type: 'GET',
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            console.log("Registro exitoso", response);
            provedoresResponse = response.data
            let componente = document.getElementById('ProvedorToProduct');
            if (provedoresResponse.length === 0 ){
              
              componente.innerHTML = '<input type="text" id="opcionesProvedorInput" placeholder="Introduce un valor" class="input-wrapper">';


            } else {
              componente.innerHTML =  '<select id="opcionesProvedor" class="select-wrapper"> </select>'
              $('#opcionesProvedor').empty();
    
              // Agregar opción por defecto
              $('#opcionesProvedor').append('<option value="">Seleccione un Provedor</option>');

              // Recorrer los proveedores y llenar el select con nuevas opciones
              provedoresResponse.forEach(function(provedor) {
              $('#opcionesProvedor').append('<option value="' + provedor.name + '">' + provedor.name + '</option>');
               })
          }
        } ,error: function(xhr, status, error) {
            alert("Error, ", error)
        }
        

    });
}

function getColor() {
  $.ajax({
        url: '/colores',
        type: 'GET',
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {

          coloresArr = response.data
          console.log('Colores', coloresArr)
          $('#colorPalette').empty();
    
    
          // Recorrer los proveedores y llenar el select con nuevas opciones
          coloresArr.forEach(function(color) {
         // $('#colorPalette').append('<div class="color-option" data-color="' +color.id +' " style="background-color: '+ color.color+ ';">  </div> ');
         $('#colorPalette').append(
          '<div class="color-option" data-color="' + color.id + '">' +
        '<div class="color-circle" style="width: 50px; height: 50px; border-radius: 50%; background-color: ' + color.color + ';"></div>' +
        '<span class="color-name">' + color.nombre + '</span>' +
    '</div>'
         )
          
});


        } ,error: function(xhr, status, error) {
            alert("Error, ", error)
        }
        

    });
}


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
    background-color: #f9f1f1;

  }
  .miFormulario {
    width: 400px;
    background-color: #dbeee0;
    padding: 20px;
    border-radius: 10px
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
    border: 1px solid #f8f5f5;
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
.colorModal {
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

.modalColor-content {
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

    /* Personalizar la flecha */
    .select-wrapper {
      position: relative;
      width: 200px;
    }

    .select-wrapper::after {
      content: '\25BC';
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
    }

    select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-color: #f1f1f1;
      border: 2px solid #ccc;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      width: 200px;
      cursor: pointer;
    }

    select:focus {
      outline: none;
      border-color: #6c63ff;
    }

    .AddTallas {

      display: flex;
      justify-content: center; /* Centrar horizontalmente */
      align-items: center; /* Centrar verticalmente */
      background-color: #ffffff;
      width: 100%;
      border-radius: 10px;

    }
    .containerCard {

      display: flex;
      flex-direction: column;
      background-color: #fdfdfd;
      padding-inline: 10px;
      margin-inline: 10px;
      margin-top: 20px;
      margin-bottom: 0px;
      height: 100%;
      width: 100%;

    }
    .titleContainerTallas {
      background-color: #e4f6e5; /* Color de fondo */
    color: rgb(11, 1, 1); /* Color del texto */
    padding: 5px; /* Espaciado interno */
    border-radius: 0px; /* Bordes redondeados */
    text-align: left; /* Centra el texto horizontalmente */
    }

    .containerTallas {

      display: flex;
      flex-direction: row;
      background-color: #4689e7;
      height: 100%;
      width: 100%;
    }

    .containerRowElementos {
      flex: 2;
      background-color: #f8f8fa;
      height: 100%;
      padding: 10px

    }
    .containerMediasTallas {
      flex: 1;
      background-color: #eaeaea;
      height: 100%;
      margin: 0px;
     padding: 20px

    }

    .contenedorGridMedias {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 columnas de igual tamaño */
      gap: 3px; /* Espacio entre los elementos */
      padding: 10px;
    }

    .elementoMedias {
      background-color: #6c63ff;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 18px;
      border-radius: 10px; /* Bordes redondeados */

    }

    .contenedorGridTallas {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 columnas de igual tamaño */
      gap: 3px; /* Espacio entre los elementos */
      padding: 20px;
      background-color: #13f3d5
    }

    .elementoTallas {
      background-color: #6c63ff;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 18px;
      border-radius: 10px; /* Bordes redondeados */

    }
    .continerIcon {
  
      text-align: right; /* Mueve el contenido a la derecha */
      padding: 10px;
    }
    .iconClose {
      width: 24px; /* Tamaño del ícono */
      height: 24px;
    }
    .SelectorTallas {

      display: none;
      flex-direction: column;


    }

    #containerRowElementos {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Espacio entre los elementos */
  }

  .elementoOvalado {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%; /* Se ajusta al ancho del contenedor */
    height: 30px; 
    background-color: #f1f1f1;
    border-radius: 15px; /* Bordes redondeados para forma ovalada */
    padding: 0 10px; /* Espaciado interno */
    box-sizing: border-box;
  }

  .textoCentral {
    flex-grow: 1; /* Ocupa el espacio central */
    text-align: center;
    font-size: 14px;
  }

  .botonOvalado {
    background-color: #ff6666;
    border: none;
    color: white;
    padding: 4px 8px;
    border-radius: 8px; /* Botón ovalado */
    cursor: pointer;
  }
  .botonOvaladoColor {
    background-color: #f0ff66;
    border: none;
    color: white;
    padding: 4px 8px;
    border-radius: 8px; /* Botón ovalado */
    cursor: pointer;
  }

  .botonOvalado:hover {
    background-color: #ff4d4d; /* Efecto hover para el botón */
  }


  #colorPalette {
  display: flex;
  flex-wrap: wrap;
}

.color-option {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 10px;
}

.color-option:hover {
  border: 0.5px solid #acaaaa;
  border-radius: 5px;
  
}



.color-name {
    margin-top: 5px;
    font-size: 14px;
    color: #333;
}

</style>



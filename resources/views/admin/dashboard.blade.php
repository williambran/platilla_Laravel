<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style >
      .body-bg {
        background-color: #9921e8;
        background-image: linear-gradient(315deg,#9921e8 0%, #5f72be 74%);
      }
    </style>
  </head>

  <body class="body-bg min-h-screen pt-10 md:pt-20 pb-6 px-10  " style="font-family:'Lato',sans-serif;" >
    <h1>Menu</h1>
    <main class="bg-white  px-10 pt-12  pb-6  rounded-xl shadow-2xl">

      <div class="headerMenu">
        <div id="ventasItem" class="itemMenu">
          <p>Vender</p>
        </div>

        <div id="buscarItem" class="itemMenu">
          <p>Buscar</p>
        </div>

        <div id="AddModelItem" class="itemMenu">
          <p>Agregar modelos</p>
        </div>

        <div id="AddProducsItem" class="itemMenu">
          <p>Agregar Productos</p>
        </div>

        <div id="ImprimirItem" class="itemMenu">
          <p>Imprimir tickets</p>
        </div>

        <div id="GenerateBCItem" class="itemMenu">
          <p>Generar BarCode</p>
        </div>
      </div>

      <div id="containerMenu" class="containerMenu">

        <div id="ventasView" class="view" style="display: block;">
          @include('admin.navigationMenu.ventasView')
       </div>

       <div id="buscarView" class="view" style="display: none;">
        @include('admin.navigationMenu.BuscarProduct')
       </div>

       <div id="printBarcodesView" class="view" style="display: none;">
        @include('admin.navigationMenu.PrintBarCodes')
       </div>

       <div id="GenerateBCodeView" class="view" style="display: none;">
        @include('admin.navigationMenu.GenerateBarCode')
       </div>

       <div id="addModelView" class="view" style="display: none;">
        @include('admin.navigationMenu.AddModel')
       </div>

       <div id="addProductView" class="view" style="display: none;">
        @include('admin.navigationMenu.addProducts')
       </div>

      </div>

      <script>
        // Obtener el elemento
        const ventasHeader = document.getElementById('ventasItem');
        const buscarHeader = document.getElementById('buscarItem');
        const addModelHeader = document.getElementById('AddModelItem');
        const addProductHeader = document.getElementById('AddProducsItem');
        const printerHeader = document.getElementById('ImprimirItem');
        const GenerateBCHeader = document.getElementById('GenerateBCItem');


        ventasHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('ventasView').style.display = 'block'; // Muestra la vista de Agregar Productos
        })

        buscarHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('buscarView').style.display = 'block'; // Muestra la vista de Agregar Productos
        }); 

        addModelHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('addModelView').style.display = 'block'; // Muestra la vista de Agregar Productos
        });  

        printerHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('printBarcodesView').style.display = 'block'; // Muestra la vista de Agregar Productos
       
        }) ;
        GenerateBCHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('GenerateBCodeView').style.display = 'block'; // Muestra la vista de Agregar Productos
        });  

        addProductHeader.addEventListener('click', function() {
          hiddenViews();
          document.getElementById('addProductView').style.display = 'block'; // Muestra la vista de Agregar Productos
        });  
        

        function renderizarDetallesMaquinaAditamento() {
        return `
        <div class="card" data-id="1">
            <div class="card-body">
                <h5 class="card-title">wito</h5>
                <p class="card-text">Modelo: </p>
                <p class="card-text">Marca: wito marca </p>
                <p class="card-text">Costo: wito costo </p>
                <p class="card-text">Precio: </p>
                <p class="card-text">Total Jiménez: wito total</p>

            </div>
        </div>`;
        }
        function hiddenViews() {
          let views = document.querySelectorAll('.view');
          views.forEach(function(view) {
          view.style.display = 'none';
    });
        }
    </script>

    


  </body>

<style>
  .headerMenu {
    width: 100%;
    height: auto; /* Ajusta la altura según sea necesario */
    background-color: #f02525;
  }
  .itemMenu {
    display: inline-block;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-inline: 40px;
    border: 1px;
    background-color: #9ae389;

  }
  .containerMenu {
    display: flex;
    flex-direction: column;
    width: auto;
    min-height: 500px;
    background-color: #25ba66;
    justify-items: center;
    justify-content: center;
  }

  .view {
    display: flex;
    width: 100%;
    height: auto;
    justify-items: center;
    justify-content: center;
    background-color: #f5f6f4;


  }
  
</style>
</html>

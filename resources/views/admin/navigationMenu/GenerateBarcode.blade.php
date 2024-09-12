<div class="containerGenerateBarCode">
    
    <div class="generateBarcode">
        <button type="button" onclick="generateBCode()"> Generar Codigo de barras </button>

        <div id="barcode-images" class="contentBARCODE"></div>

        <table id="barcode-table">
            <thead>
                <tr>
                    <th>Imagen</th> <!-- Encabezado de la columna de imágenes -->
                </tr>
            </thead>
            <tbody>
                <!-- Las filas se añadirán aquí -->
            </tbody>
        </table>
    
    </div>
    


    
    
</div>


<script>

    function generateBCode() {
        $.ajax({
                    url: '/barCodeProduct', // Usa el helper route para generar la URL
                    method: 'get',
                    data: {
                        codeID: 'CUXI12',
                        _token: '{{ csrf_token() }}' // Incluir el token CSRF para seguridad
                    },
                    success: function(response) {

                       if (response.success) {
                           console.error("Error al eliminar el aditamento:", response.message);
                           $('#barcode-images').empty();
                           var data =  response.message

                                               // Divide los códigos en filas de 4 columnas
                    for (let i = 0; i < data.length; i += 4) {
                        let row = $('<tr>'); // Crea una nueva fila
                        for (let j = 0; j < 4; j++) {
                            let cell = $('<td>'); // Crea una nueva celda
                            if (i + j < data.length) {
                                let img = $('<img>').attr('src', data[i + j]).attr('alt', 'Código de Barras'); // Crea la imagen
                                cell.append(img); // Añade la imagen a la celda
                            }
                            row.append(cell); // Añade la celda a la fila
                        }
                        $('#barcode-table tbody').append(row); // Añade la fila al cuerpo de la tabla
                    }


                        } else {
                            console.error("Error al eliminar el aditamento:", response.message);
                            alert("Eliminado Correctamente ");

                        }
                        
                    },
                    error: function(xhr, status, error) {
                        // Manejar errores
                        console.error("Error al eliminar el aditamento:", error);


                        alert("No se pudo eliminar el aditamento", error)  
                    }
                });
    }
</script>

<style>
    .containerGenerateBarCode {
    display: flex;
    background-color: #e48aea;
    width: 100%;
    height: auto;
    margin-block: 10px;
    margin-inline: 10px;
    
  }

  .generateBarcode {
    display: flex;
    flex-direction: column;
    padding-top: 50px;
    padding-bottom: 50px;
    padding-left: 20px;
    width: 100%;
    background-color: #d8ea8a;

  }

        table {
            width: 100%; /* Ajusta el ancho de la tabla al contenedor */
            border-collapse: collapse; /* Opcional: para unir bordes de celdas */
        }
        th, td {
            border: 1px solid #ccc; /* Bordes de celdas */
            padding: 10px; /* Espaciado interno de celdas */
            text-align: center; /* Centra el contenido en las celdas */
        }

  #barcode-images {
            width: 145px; /* O cualquier ancho que desees */
            max-width: 300px; /* Opcional: Establece un ancho máximo */
            height: 50px;
            border: 1px solid #ccc; /* Opcional: Añade un borde para visualizar el contenedor */
            padding: 1px; /* Opcional: Espaciado interno */
            box-sizing: border-box; /* Incluye el padding en el ancho total */
        }

        #barcode-images img {
            width: 100%; /* Ajusta la imagen al ancho del contenedor */
            height: 100%; /* Mantiene la proporción de la imagen */
        }
</style>
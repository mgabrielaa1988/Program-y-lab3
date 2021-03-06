<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="scriptCamisetas.js"></script>
    <script src="funciones.js"></script>
    <title>Listado de Camisetas</title>
  </head>
  <body>
    <div class="container-fluid" id="laTabla">
      <h2 class="display-4 text-center">Listado de Camisetas</h2>
      <div class="row justify-content-center mb-3">
        <button type="button" onclick="Test.Manejadora.LimpiarForm()" class="btn btn-success" data-toggle="modal" data-target="#formulario">Agregar</button>
        <a href="./listaEmpleados.php"><button type="button" class="btn btn-warning">Ver lista Empleados</button></a>
        <button type="button" class="btn btn-danger" onclick="Test.Manejadora.Deslogear()">Deslogearse</button>
      </div>
    <!-- Modal -->
        <div class="modal fade" id="formulario" tabindex="-1" role="dialog" aria-labelledby="formularioLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formularioLabel">Agregar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row" id="divId">
                  <label for="id" class="col-sm-2 col-form-label">Id</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" placeholder="Id">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="marca" placeholder="marca">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="color" class="col-sm-2 col-form-label">Color</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="color" placeholder="color">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="talle" class="col-sm-2 col-form-label">Talle</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="talle" placeholder="talle">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="precio" placeholder="precio">
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="boton-agregar" onclick="Test.Manejadora.AgregarObj()">Cargar</button>
                <button type="button" class="btn btn-warning" id="boton-modificar" onclick="Test.Manejadora.ModificarObj()" hidden=true>Modificar</button>
                <button type="button" class="btn btn-danger" id="boton-borrar" onclick="Test.Manejadora.BorrarObj()" hidden=true>Borrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Ends -->
    <!-- Button trigger modal -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>

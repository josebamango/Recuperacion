<!doctype html>
<html lang="en">
<head>
    <title>Libros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="text-center text-danger">INSERTE LOS DATOS DEL LIBRO</h1>
            <form class="" method="post" action="libros_guardar.php">
                <div class="form-group">
                    <label for="titulo">Titulo:*</label>
                    <input type="text" class="form-control" name="titulo">
                </div>
                <div class="form-group">
                    <label for="añoEdicion">Año de edicion:*</label>
                    <input type="number" class="form-control" name="anio">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:*</label>
                    <input type="number" class="form-control" name="precio" step="any">
                </div>
                <div class="form-group">
                    <label for="fechaAdquisicion">Fecha de adquisición:*</label>
                    <input type="date" class="form-control" name="fecha">
                </div>
                <input type="submit" name="guardar" class="btn btn-primary d-inline" value="Guardar datos del libro">
            </form>
            <a href="libros_datos.php">
                <button class="btn btn-success mt-2 d-inline">MOSTRAR DATOS DE LIBROS</button>
            </a>
            <a href="libros_borrar.php">
                <button class="btn btn-danger mt-2 d-inline">Borrar Libros</button>
            </a>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="jumbotron">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-6">
            <?php 
                require('server/show_data.php');
                while($row = mysqli_fetch_array($result)) {
            ?>
                <div class="card">
                    <div class="card-header">
                        <p class="text-center">Registro: <?php echo $row['id_register'] ?></p>
                        <a href="server/slopes/add.php?ID=<?php echo $row['id_register']; ?>" class="btn btn-success">Agregar a completados</a>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre del trabajo</strong> : <?php echo $row['name_job'] ?></p>
                        <p><strong>Nombre del cliente</strong> : <?php echo $row['name_service'] ?></p>
                        <p><strong>Telefono celular</strong> : <?php echo $row['phone'] ?></p>
                        <p><strong>Dirección del cliente</strong> : <?php echo $row['place_delivery'] ?></p>
                        <p><strong>Anticipo</strong> : <?php echo $row['anticipo'] ?></p>
                        <p><strong>Especificaciones</strong> : <?php echo $row['especi'] ?></p>
                        <p><strong>Fecha de registro</strong> : <?php echo $row['fecha_registro'] ?></p>
                    </div>
                    <div class="card-body">
                        <a type="submit" class="btn btn-primary" href="home.php" >Volver</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
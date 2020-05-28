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
                        <button class="btn btn-success">Agregar a completados</button>
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
                        <button type="submit" class="btn btn-danger">Borrar</button>
                        <a type="submit" class="btn btn-warning" href="show.php?id=<?php echo $row['id_register']; ?>" >Editar</a>
                        <a type="submit" class="btn btn-primary" href="index.php" >Volver</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
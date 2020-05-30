<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Aluminios Soberanis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Pendientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entregados</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <h1>Aluminios Soberanis </h1>
                <h3>Pendientes</h3>
                <h6>Tabla de trabajos pendientes</h6>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del trabajo</th>
                            <th>Nombre del cliente</th>
                            <th>Fecha de registro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php
                        include('server/slopes/show.php');
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_register']; ?></td>
                            <td><?php echo $row['name_job']; ?></td>
                            <td><?php echo $row['name_service']; ?></td>
                            <td><?php echo $row['fecha_registro']; ?></td>
                            <td>
                                <a href="show.php?id=<?php echo $row['id_register']; ?>" class="btn btn-warning">Revisar</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="server/slopes/Slopes.js"></script>
</body>
</html>
<?php include('../auth/auth_session.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Fontawesome-->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <title>Presupuestos</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Aluminios Soberanis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../home.php">Registros</a>               
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Pendientes</a>               
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Presupuesto <span class="sr-only">(current)</span> </a>
                </li>
            </ul>
        </div>
        <div class="form-inline my-2 my-lg-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="settings/page_setup.php">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth/logout.php" >Cerrar sesion</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="form-group mr-sm-2">
                <p class="mt-3"><strong>Usuario</strong> : <?php echo $_SESSION['email']; ?> </p>
            </div>
        </div>

    </nav>
    <div class="jumbotron">
        <h4>Presupuestos</h4>
        <p class="lead">Tal vez  nuestro problema está en que pemsamos una cosa, sentimos otra y terminamos diciendo al que ni pensamos ni sentimos</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <form action="queries/insert.php" method="POST" class="card">
                    <input type="hidden" id="datoID">
                    <div class="card-header">Nuevo Registro</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Fecha de registro :</label>
                            <input type="date" name="date_register" class="form-control">
                        </div>
                        <div class="form-group">
                            <h5>Datos del cliente</h5>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Nombre del cliente :</label>
                                    <input type="text" name="name" class="form-control" placeholder="Texto aquí">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Telefono :</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Texto aquí">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Direccion :</label>
                                    <input type="text" name="direction" class="form-control" placeholder="Texto aquí">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Datos del Trabajo</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Tipo de trabajo :</label>
                                    <input type="text" name="type_job" class="form-control" placeholder="Texto aquí">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Precio total :</label>
                                    <input type="text" name="price" class="form-control" placeholder="Texto aquí">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Especificciones :</label>
                                    <textarea class="form-control" name="especi" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresa el texto aqui"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="reg_form" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-sm-7">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre del Cliente</th>
                            <th>Tipo de trabajo</th>
                            <th>Precio total</th>
                            <th>Fecha de registro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include('queries/view_budget.php');
                            while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['type_job']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['date_register']; ?></td>
                            <td>
                                <a href="budget.php?ID=<?php echo $row['id_budget']; ?>" type="button" data-toggle="modal" data-target="#exampleModal"><img src="svg/circle.svg" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php 
                    include('queries/database.php');
                    $id = $_GET['ID'];
                    $query = "SELECT * FROM budget WHERE id_budget = '$id'";
                    $result = mysqli_query($db, $query);

                    while($row = mysqli_fetch_array($result)) {
                ?>

            <div class="modal-body">
                
                <div class="form-group">
                    <p><strong>Nombre del cliente: </strong> <?php echo $row['name']; ?></p>
                    <p><strong>Telefono: </strong> <?php echo $row['phone']; ?></p>
                    <p><strong>Direccion: </strong> <?php echo $row['direction']; ?></p>
                    <p><strong>Tipo de trabajo: </strong> <?php echo $row['type_job']; ?></p>
                    <p><strong>Precio: </strong> <?php echo $row['price']; ?></p>
                    <p><strong>Especificaciones: </strong> <?php echo $row['especi']; ?></p>
                    <p><strong>Fecha de Registro: </strong> <?php echo $row['date_register']; ?></p>
                </div>

                <?php } ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
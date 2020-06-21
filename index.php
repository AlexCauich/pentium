<?php include('auth/auth_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://scontent.fmid2-1.fna.fbcdn.net/v/t1.0-9/90115929_136732171196292_3441089044065288192_n.png?_nc_cat=100&_nc_sid=85a577&_nc_eui2=AeHhuXmDw2rKIynPrEFqIK0-4HBH6HtMkJLgcEfoe0yQkrS1RNbe8z_HwnS6sHFqVmlVdBOnBpypidflaK1jy1QF&_nc_oc=AQmO2LFNttOYnyxFi5uvmWpP9UulESPNXJTVTTWHbj3q-no4NbXKA15075A-fUGKik74f7rV_fzZsgVi304n3uL_&_nc_ht=scontent.fmid2-1.fna&oh=7da262354344cae9e501c261846bb394&oe=5EFA8D95">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/ope.css">
    <title>Pentium</title>
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
                    <a class="nav-link" href="home.php">Registros</a>               
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pendientes <span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="budget/budget.php">Presupuestos</a>               
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
        <div id="App" class="row">
            <div class="col-md-12 col-sm-12">
                <div class="tra_reg">
                    <h2>Trabajos Pendientes</h2>
                    <button type="button" class="btn btn-primary mt-2 mb-2 ml-2" data-toggle="modal" data-target="#exampleModal">
                        Nuevo registro
                    </button>
                      
                    <!-- Modal Register -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="register-form" class="modal-content">
                                <input type="hidden" id="datoID">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Nombre del trabajo :</label>
                                        <input type="text" class="form-control" id="name_job" placeholder="Nombre del trabajo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre del solicitante del servicio</label>
                                        <input type="text" class="form-control" id="name_service" placeholder="Nombre de cliente">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono celular</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de entrega :</label>
                                        <input type="text" class="form-control" id="place_delivery" placeholder="Lugar de entrega">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Anticipo :</label>
                                        <input type="text" class="form-control" id="anticipo" placeholder="Anticipo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha de registro :</label>
                                        <input type="date" class="form-control" id="fecha" placeholder="Fecha">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Especificaciones :</label>
                                        <textarea class="form-control" id="especi" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresa el texto aqui"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre del trabajo</th>
                                    <th>Nombre del cliente</th>
                                    <th>Telefono</th>
                                    <th>Direccion del cliente</th>
                                    <th>Anticipo</th>
                                    <th>Especificaciones</th>
                                    <th>Fecha de registro</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="list">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="Api.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
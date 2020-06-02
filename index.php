<?php include('auth/auth_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/ope.css">
    <title>Pentium</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Aluminios Soberanis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pendientes <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="auth/logout.php">Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron">
        <div id="App" class="row">
            <div class="col-md-12 col-sm-12">
                <div class="tra_reg">
                    <h5> <strong>Usuraio</strong> : <?php echo $_SESSION['email']; ?></h5>
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
                                        <label for="">Anticipo :</label>
                                        <input type="date" id="data" class="form-control">
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
    <script src="Application.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
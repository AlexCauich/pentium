<?php include('auth/auth_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://scontent.fmid2-1.fna.fbcdn.net/v/t1.0-9/90115929_136732171196292_3441089044065288192_n.png?_nc_cat=100&_nc_sid=85a577&_nc_eui2=AeHhuXmDw2rKIynPrEFqIK0-4HBH6HtMkJLgcEfoe0yQkrS1RNbe8z_HwnS6sHFqVmlVdBOnBpypidflaK1jy1QF&_nc_oc=AQmO2LFNttOYnyxFi5uvmWpP9UulESPNXJTVTTWHbj3q-no4NbXKA15075A-fUGKik74f7rV_fzZsgVi304n3uL_&_nc_ht=scontent.fmid2-1.fna&oh=7da262354344cae9e501c261846bb394&oe=5EFA8D95">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Aluminios Soberanis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Pendientes</a>
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
                            <a class="dropdown-item" href="#">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item active" href="auth/logout.php" >Cerrar sesion</a>
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
        <h1>Aluminios Soberanis </h1>
        <div class="row">
            <div class="col-md-7 col-sm-8">
                <h3>Pendientes</h3>
                <h6>Tabla de trabajos pendientes</h6>

                <table class="table table-dark table-hover">
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

            <div class="col-md-5 col-sm-5">
                <div id="target-content" >
                    <strong>loading...</strong>
                </div>

                <?php
                    include('server/database.php'); 
                    $limit = 5;
                    $sql = "SELECT COUNT(id_delivered) FROM delivered";  
                    $rs_result = mysqli_query($db, $sql);  
                    $row = mysqli_fetch_row($rs_result);  
                    $total_records = $row[0];  
                    $total_pages = ceil($total_records / $limit); 
                ?>
                <div class="justify_content-center">
                    <div class="pagination btn-group mr-2" id="pagination" role="group" aria-label="Second group">
                        <?php 
                            if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                            if($i == 1):
                            ?>

                            <li class='active' id="<?php echo $i;?>">
                                <a class="btn btn-secondary" href='server/slopes/view_slopes.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                            </li> 
                            <?php else:?>
                                <li id="<?php echo $i;?>">
                                    <a class="btn btn-secondary" href='server/slopes/view_slopes.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                                </li>
                            <?php endif;?>			
                        <?php endfor;endif;?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#target-content").load("server/slopes/view_slopes.php?page=1");
                $("#pagination li").on('click',function(e){
                e.preventDefault();
                    $("#target-content").html('loading...');
                    $("#pagination li").removeClass('active');
                    $(this).addClass('active');
                    var pageNum = this.id;
                    $("#target-content").load("server/slopes/view_slopes.php?page=" + pageNum);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
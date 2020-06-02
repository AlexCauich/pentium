<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
                    <a class="nav-link" href="index.php">Pendientes</a>
                </li>
            </ul>
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
</body>
</html>
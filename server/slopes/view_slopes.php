<?php
include('database.php');
 
$limit = 5;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM delivered ORDER BY id_delivered DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql);  
?>
<h3>Realizados</h3>
<h6>Tabla de trabajos realizados</h6>
<table class="table bg-info table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Nombre del trabajo</th>
            <th>Nombre del cliente</th>
            <th>Fecha de registro</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($data = mysqli_fetch_array($rs_result)) {
        ?>
        <tr>
            <td><?php echo $data['name_job']; ?></td>
            <td><?php echo $data['name_service']; ?></td>
            <td><?php echo $data['fecha_registro']; ?></td>
            <td>
                <a name="view_delivered" href="server/slopes/view_register.php?id=<?php echo $data['id_delivered']; ?>" class="btn btn-success">
                    <img src="Budget/svg/check-square.svg" title="revisar" alt="">
                </a>
            </td>
        </tr>
    </tbody>
    <?php } ?>
</table>
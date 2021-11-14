<?php


if(isset($_POST['cedula'])){
    $activar="si";
    $cedula = $_POST['cedula'];
    include("php/conexion.php");
    $usuario = "SELECT nombre,apellido,email,fecha_cita,consultorio_cita,hora FROM cita where id=$cedula";
}
else{
    $activar="no";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="librearias/bootstrap/css/bootstrap.min.css">
    <title>Consultar cita</title>
</head>
<body>
    <header class="titulo">
        <div class="nombre">
            <h2>Hospital Gran Sanación</h2>
        </div>
        <div class="boton">
            <a href="index.html"><buttom class="btn btn-primary"> Salir </buttom></a>
        </div>
    </header>
    <main>
        <div class="tabla-buscar">
            <div class="col-md-5 table-responsive"> 
            <form action="mirarcita.php" method="post">
            <table class="table table-striped table-info md-10">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2"><center><strong><h3>Buscar información de cita</h3></strong></center> </th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td>Digite su cédula</td>
                        <td><input type="number" id="cedula" name="cedula" require=""></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="buscar" class="btn btn-primary">
                        </td>
                    </tr>                
                </tbody>
                <tfoot>
                    <?php 
                    if($activar=="si")
                    {
                        $resultado = mysqli_query($conn,$usuario);
                        while($row=mysqli_fetch_assoc($resultado))
                        {
                        ?>
                        <tr>
                            <td colspan="2" >Nombre : <?php echo $row['nombre'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" >Apellido : <?php echo $row['apellido'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" >Email : <?php echo $row['email'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" >fecha de la cita : <?php echo $row['fecha_cita'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" >Consultorio de la cita : <?php echo $row['consultorio_cita'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" >Hora de la cita : <?php echo $row['hora'] ?></td>
                        </tr>
                        <?php
                        }
                    }
                        ?>
                                            
                </tfoot>
            </table>
            </form>
            </div>
        </div>
    </main>    
</body>
</html>
<?php

include("conexion.php");

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$edad = $_POST["edad"];
$fecha = $_POST["fecha"];
$consultorio = $_POST["consultorio"];
$hora = $_POST["hora"];


$usuario = "SELECT id FROM cita where id=$cedula";

$resultado = mysqli_query($conn,$usuario);
$id ="";
while($row=mysqli_fetch_assoc($resultado))
{
    $id= $row['id'];
}

if($id!=$cedula)
{
    $insertar = "INSERT INTO cita(id,nombre,apellido,email,telefono,edad,fecha_cita,consultorio_cita,hora) VALUES ($cedula,'$nombre','$apellido','$email',$telefono,$edad,'$fecha',$consultorio,'$hora')";

    $resultado = mysqli_query($conn,$insertar);

    if($resultado){
        echo "<script> window.alert('Se ha registrado la cita con éxito, puede consultar su cita');
        window.location='../consultarcita.php'</script>";
        echo $cedula;
    }
    else
    { 
        echo "<script>alert('No se pudo registrar la cita')</script>";
    }

}
else if($id==$cedula)
{
    echo "<script>alert('El usuario ya tiene una cita, por favor, busque su cita digitando su cédula');
    window.location='../consultarcita.php'</script>";
}


?>
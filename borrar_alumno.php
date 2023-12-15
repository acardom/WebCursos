<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$alumno_borrar = $_GET['usuario'];;

try{
    $mysql ="mysql:host=localhost;dbname=proyecto_fct;charset=UTF8";
    $user = "root";
    $password = "";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password);
}catch (PDOException $e){
    echo "<p>" .$e->getMessage()."</p>";
    exit();
}

try {
    $consulta = $conexion->prepare("DELETE FROM usuarios WHERE usuario = :idusuario");
    $consulta->bindParam(':idusuario', $alumno_borrar);
    $consulta->execute();
} catch (PDOException $e) {
    echo "Error al intentar borrar el registro: " . $e->getMessage();
}

header("Location: listado_alumnos.php");

?>
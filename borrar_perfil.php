<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];

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
                                
    $stmt = $conexion->prepare('DELETE FROM usuarios WHERE usuario = :usuario');
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    header("Location: logout.php");
    exit();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
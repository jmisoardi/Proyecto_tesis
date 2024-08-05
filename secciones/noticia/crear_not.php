<?php 
    include ("../../bd.php");
    print_r($_POST);

    $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"]: "";
    $cuerpo = (isset($_POST["cuerpo"])) ? $_POST["cuerpo"]: "";

    //Preparamos la insercción de los datos.
    $sentencia = $conexion->prepare("INSERT INTO 
    `tbl_noticia`(`id`, `titulo`, `cuerpo`) 
    VALUES (null, :titulo, :cuerpo )");

?>
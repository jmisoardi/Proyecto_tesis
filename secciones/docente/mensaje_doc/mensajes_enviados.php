
<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    
    $usuario = $_SESSION['usuario'];
    
    /* $sentencia = $conexion->prepare("SELECT * FROM `tbl_mensaje`");
    $sentencia->execute();
    $lista_tbl_mensaje = $sentencia->fetchAll(PDO::FETCH_ASSOC); */

    $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    $id_usuario = $resultado['id'];


    if (isset($_GET['txtID'])) {
        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] :"";

        $sentencia = $conexion->prepare ( "DELETE FROM tbl_mensaje WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();

        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Mensaje Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }
    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.

    $sentencia = $conexion->prepare("
    SELECT 
        tbl_mensaje.id, 
        remitente.nombre AS remitente_nombre, 
        destinatario.nombre AS destinatario_nombre, 
        tbl_mensaje.asunto, 
        tbl_mensaje.cuerpo, 
        tbl_mensaje.fecha_envio 
    FROM 
        tbl_mensaje
    JOIN 
        tbl_persona AS remitente ON tbl_mensaje.id_remitente = remitente.id
    JOIN 
        tbl_persona AS destinatario ON tbl_mensaje.destinatario_nombre = destinatario.id
    WHERE 
        tbl_mensaje.id_remitente = :id_usuario; ");
        
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();
    $lista_tbl_mensaje = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<br>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Noticias</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body>
        <!-- <div style="margin-bottom: 10px;">
            <button onclick="window.location.href='mensajes_enviados.php'">Ver Mensajes Enviados</button>
            <button onclick="window.location.href='mensajes_recibidos.php'">Ver Mensajes Recibidos</button>
        </div> -->
        <!--Estilo para el titulo Personal-->
        <style> 
            h1,h2 {
                    text-align: center; font-family: Georgia, sans-serif;
                    }
        </style>

        <div class="card">
            <div class="card-header" style="background-color:bisque"></div>  
            <!--Header y button primary-->
            <div class="card-body-xl" style="background-color:azure">
                
                <div class="table-responsive">
                <!--Usamos el id "tabla_id" para que tengan los estilos de busquedas, el script se encuentra en el footer-->
                    <table class="table" id="tabla_id">
                        <thead>
                            <tr>
                                <!--Alineación central del ID, Nombre/Rol, Acciones-->
                                <style> 
                                th {
                                    text-align: center; font-family: Georgia, sans-serif;
                                    }
                                </style>
                                    <!-- <th scope="col" style="background-color:azure"><u></u></th> -->
                                    <th scope="col" style="background-color:azure"><u>Remitente</u></th>
                                    <th scope="col" style="background-color:azure"><u>Destinatario</u></th> 
                                    <th scope="col" style="background-color:azure"><u>Asunto</u></th>
                                    <th scope="col" style="background-color:azure"><u>Cuerpo</u></th>
                                    <th scope="col" style="background-color:azure"><u>Fecha</u></th>
                                    
                                    <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                            <?php foreach ($lista_tbl_mensaje as $registro) {?>     
                                
                                <!--Alineación central style-->
                                <tr class="">
                                    <td scope="row"><?php echo $registro['remitente_nombre'];?></td>
                                    <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                                
                                        <td> <?php echo $registro['destinatario_nombre']; ?></td>
                                        <td> <?php echo $registro['asunto']; ?> </td>
                                        <td> <?php echo $registro['cuerpo']; ?></td> 
                                        <td> <?php echo $fecha_formateada = date('d/m/Y H:i:s', strtotime($registro['fecha_envio'])); ?></td> 
                                                
                                                <!--Etiqueta de botones Editar y Eliminar-->
                                                <td>
                                                    <!--El signo sirve para pasar parametros por URL.-->
                                                    <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button" >Eliminar</a >   
                                                </td>                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card-footer text-muted" style="background-color:bisque"></div>
        </div>
        <div class="text-center">
            <a name="" id="" class="btn btn-info" href="index.php" role="button">
                <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
            </a>
        </div>
    </body>
</html>
<br>

<br><br>
<?php include("../templates_doc/footer_doc.php")?>



    

<<<<<<< HEAD
    <?php 
=======
<?php 
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    
    $usuario = $_SESSION['usuario'];
<<<<<<< HEAD
     //Verificamos si se envío txtID por el metodo GET (enviar).    
    if (isset($_GET['txtID'])) {
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        $sentencia = $conexion->prepare ( "DELETE FROM `tbl_mensaje` WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        
        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }
    
    // Obtenemos el id del usuario en sesión;
=======
    
    // Obtener el ID del usuario en sesión
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
    $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
    $sentencia->bindParam(':usuario', $usuario);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    $id_usuario = $resultado['id'];

<<<<<<< HEAD
    // Obtenemos los mensajes recibidos junto con la información del remitente
    $sentencia = $conexion->prepare("
        SELECT p.nombre, p.apellido, m.asunto, m.cuerpo, m.fecha_envio
        FROM tbl_mensaje m
        INNER JOIN tbl_persona p ON m.id_remitente = p.id
        WHERE m.id_destinatario = :id_usuario
    ");
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();
    $mensajes_recibidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
=======
    // Eliminar mensaje si se ha solicitado
    if (isset($_GET['txtID'])) {
        $txtID = $_GET['txtID'];

        $sentencia = $conexion->prepare("DELETE FROM tbl_mensaje WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        $mensaje = "Mensaje Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    // Obtener los mensajes recibidos por el usuario en sesión
    $sentencia = $conexion->prepare("
    SELECT 
        tbl_mensaje.nombre_correo AS remitente_correo, 
        remitente.nombre AS remitente_nombre, 
        tbl_mensaje.asunto, 
        tbl_mensaje.cuerpo, 
        tbl_mensaje.fecha_envio 
    FROM 
        tbl_mensaje
    JOIN 
        tbl_persona AS remitente ON tbl_mensaje.id_remitente = remitente.id
    WHERE 
        tbl_mensaje.destinatario_nombre = :id_usuario;
");


    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();
    $lista_mensajes_recibidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($lista_mensajes_recibidos); // Puedes descomentar esto para verificar los datos obtenidos
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mensajes Recibidos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body>
<<<<<<< HEAD
        <br>
        <br>
        <div class="card">
            <div class="card-header" style="background-color:bisque">
                <a name="" id="" class="btn btn-primary" href="crear_mensaje.php" role="button" >Crear Mensaje</a>
                <a name="" id="" class="btn btn-info" href="mensajes_enviados.php" role="button" >Ver Mensajes Enviados</a>
            </div>
=======
        <style> 
            h1,h2 {
                text-align: center; 
                font-family: Georgia, sans-serif;
            }
        </style>

        <div class="card">
            <div class="card-header" style="background-color:bisque">   
                <a name="" id="" class="btn btn-primary" href="crear_mensaje.php" role="button">Crear Mensaje</a>
                <a name="" id="" class="btn btn-info" href="mensajes_enviados.php" role="button">Ver Enviados</a>
            </div> 
            
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
            <div class="card-body-xl" style="background-color:azure">
                <div class="table-responsive">
                    <table class="table" id="tabla_id">
                        <thead>
                            <tr>
<<<<<<< HEAD
                                <th scope="col" style="background-color:azure"><u>Remitente</u></th>
                                <th scope="col" style="background-color:azure"><u>Asunto</u></th> 
                                <th scope="col" style="background-color:azure"><u>Cuerpo</u></th>
                                <th scope="col" style="background-color:azure"><u>Fecha de Envío</u></th>
=======
                                <th scope="col" style="background-color:azure"><u>Correo</u></th>
                                <th scope="col" style="background-color:azure"><u>Remitente</u></th>
                                <th scope="col" style="background-color:azure"><u>Asunto</u></th>
                                <th scope="col" style="background-color:azure"><u>Cuerpo</u></th>
                                <th scope="col" style="background-color:azure"><u>Fecha</u></th>
                                <th scope="col" style="background-color:azure"><u>Acciones</u></th>
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                            <!-- Recorremos el arreglo de mensajes recibidos -->
                            <?php foreach ($mensajes_recibidos as $mensaje) { ?>
                                <tr>
                                    <td><?php echo $mensaje['nombre'] . ' ' . $mensaje['apellido']; ?></td>
                                    <td><?php echo $mensaje['asunto']; ?></td>
                                    <td><?php echo $mensaje['cuerpo']; ?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($mensaje['fecha_envio'])); ?></td>
=======
                            <?php foreach ($lista_mensajes_recibidos as $registro) { ?>     
                                <tr>
                                    <td scope="row"><?php echo $registro['remitente_correo']; ?></td>
                                    <td><?php echo $registro['remitente_nombre']; ?></td>        
                                    <td><?php echo $registro['asunto']; ?></td>
                                    <td><?php echo $registro['cuerpo']; ?></td> 
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($registro['fecha_envio'])); ?></td>
                                    <td>
                                        <a class="btn btn-info" href="ver_mensaje.php?txtID=<?php echo $registro['id']; ?>" role="button">Ver</a>
                                        <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button">Eliminar</a>
                                    </td>
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card-footer text-muted" style="background-color:bisque"></div>
        </div>
    </body>
</html>
<<<<<<< HEAD
<br>
<br>
=======
>>>>>>> 0bd9d8891b7296d7cf2caef20ed73f855eef683f
<?php include("../templates_doc/footer_doc.php") ?>

<?php 
    
    session_start();
    include("../../../bd.php");

    $usuario_doc = $_SESSION['usuario'];
    /* $_SESSION['usuario'] = $usuario_doc; */
    //Verificamos si se envío txtID por el metodo GET (enviar).    
    if (isset($_GET['txtID'])) {
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        $sentencia = $conexion->prepare ( "DELETE FROM `tbl_mensaje` WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        
        /* //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);   */  
    }
    // Asegúrate de que la variable $usuario_doc esté definida
    /* if (isset($_SESSION['usuario'])) {
        $usuario_doc = $_SESSION['usuario'];

        // Obtenemos el id del usuario en sesión;
        $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario LIMIT 1");
        $sentencia->bindParam(':usuario', $usuario_doc);
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            $id_usuario = $resultado['id']; // Guardamos el ID en una variable
        } else {
            // Manejar el caso en que no se encuentre el usuario
            $_SESSION['error_message'] = "Usuario no encontrado.";
            header("Location: " . $url_base . "index.php");
            exit();
        }
    } else {
        // Manejar el caso en que no hay usuario en sesión
        $_SESSION['error_message'] = "No se ha iniciado sesión.";
        header("Location: " . $url_base . "index.php");
        exit();
    } */
    // Obtenemos el id del usuario en sesión;
    $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
    $sentencia->bindParam(':usuario', $usuario_doc);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado) {
        $id_usuario = $resultado['id']; // Guardamos el ID en una variable
    } else {
        // Manejar el caso en que no se encuentre el usuario
        $_SESSION['error_message'] = "Usuario no encontrado.";
        header("Location: " . $url_base . "index.php");
        exit();
    }
    
    $id_usuario = $resultado['id'];

    // Obtenemos los mensajes recibidos junto con la información del remitente
    $sentencia = $conexion->prepare("
    SELECT p.nombre, p.apellido, m.id, m.email, m.subject, m.message, m.fecha_envio
    FROM tbl_mensaje m
    INNER JOIN tbl_persona p ON m.id_destinatario = p.id
    WHERE m.id_remitente = :id_usuario
    ");
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();
    $mensajes_recibidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    
    include("../templates_doc/header_doc.php");
?>

<br>
<!-- <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Mensajes Recibidos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    <body> -->
        <br>
        <br>
        <div class="card">
            <div class="card-header" style="background-color:bisque">
                <a name="" id="" class="btn btn-primary" href="crear_men.php" role="button" >Crear Mensaje</a>
            </div>
            <div class="card-body-xl" style="background-color:azure">
                <div class="table-responsive">
                    <table class="table" id="tabla_id">
                        <thead>
                            <tr>
                                <th scope="col" style="background-color:azure"><u>Remitente</u></th>
                                <th scope="col" style="background-color:azure"><u>Destinatario</u></th>
                                <th scope="col" style="background-color:azure"><u>email</u></th> 
                                <th scope="col" style="background-color:azure"><u>subject</u></th> 
                                <th scope="col" style="background-color:azure"><u>message</u></th>
                                <th scope="col" style="background-color:azure"><u>Fecha de Envío</u></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Recorremos el arreglo de mensajes recibidos -->
                            <?php foreach ($mensajes_recibidos as $mensaje) { ?>
                                <tr>
                                    <td><?php echo $_SESSION['usuario']; ?></td>
                                    <td><?php echo $mensaje['nombre'] . ' ' . $mensaje['apellido']; ?></td>
                                    <td><?php echo $mensaje['email']; ?></td>
                                    <td><?php echo $mensaje['subject']; ?></td>
                                    <td><?php echo $mensaje['message']; ?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($mensaje['fecha_envio'])); ?></td>
                                    <td>
                                        <!--Utilizamos bs5-button-a seguido de la línea de código para obtener el ID y que nos elimine la fila. -->
                                        <!--El signo sirve para pasar parametros por URL.-->
                                        <a class="btn btn-danger" href="javascript:borrar(<?php echo $mensaje['id']; ?>);" role="button" >Eliminar</a >   
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
    <!-- </body> -->
    <br>
    <br>
    <!-- <div class="text-center">
        <a name="" id="" class="btn btn-info" href="index.php" role="button">
            <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
        </a>
    </div> -->
    <br>
    <br>
    <?php include("../templates_doc/footer_doc.php") ?>
</html>


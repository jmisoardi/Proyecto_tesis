<?php 
    session_start();
    
    // Incluimos la base de datos. 
    include("../../../bd.php");

    $usuario_ad = $_SESSION['usuario'];

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
    $sentencia = $conexion->prepare("SELECT id FROM tbl_persona WHERE usuario = :usuario limit 1");
    $sentencia->bindParam(':usuario', $usuario_ad);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
    
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
?>

<?php include ("../templates/header.php");?>
<br>
    <body>
        <div class="card-header" style="background-color:bisque">    
            <h1 style="text-align: center; font-family: Georgia, sans-serif;">-Correos Enviados-</h1>
        </div>
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
                                <th scope="col" style="background-color:azure"><u>Email</u></th> 
                                <th scope="col" style="background-color:azure"><u>Asunto</u></th> 
                                <th scope="col" style="background-color:azure"><u>Mensaje</u></th>
                                <th scope="col" style="background-color:azure"><u>Fecha de Envío</u></th>
                                <th scope="col" style="background-color:azure"><u>Acciones</u></th>
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
    </body>
    <br>
    <br>
    <?php include("../templates/footer.php") ?>
</html>


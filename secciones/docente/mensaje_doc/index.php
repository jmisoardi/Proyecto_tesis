
<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    
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
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_mensaje`");
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
            <!--Header y button primary-->
            <div class="card-header" style="background-color:bisque">   
                <a name="" id="" class="btn btn-primary" href="crear_mensaje.php" role="button" >Crear Mensaje</a>
                <a name="" id="" class="btn btn-primary" href="mensajes_enviados.php" role="button" >Ver Enviados</a>
                <a name="" id="" class="btn btn-primary" href="mensajes_recibidos.php" role="button" >Ver Recibidos</a>
            </div> 
            
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
                                    <th scope="col" style="background-color:azure"><u></u></th>
                                    <th scope="col" style="background-color:azure"><u>Remitente</u></th>
                                    <th scope="col" style="background-color:azure"><u>Destinatario</u></th> 
                                    <th scope="col" style="background-color:azure"><u>Asunto</u></th>
                                    <th scope="col" style="background-color:azure"><u>Cuerpo</u></th>
                                    <th scope="col" style="background-color:azure"><u>Fecha</u></th>
                                    <th scope="col" style="background-color:azure"><u>leido</u></th>
                                    <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                            <?php foreach ($lista_tbl_mensaje as $registro) {?>     
                                
                                <!--Alineación central style-->
                                <tr class="">
                                    <td scope="row"><?php echo $registro['id'];?></td>
                                    <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                                
                                        <td> <?php echo $registro['id_remitente']; ?></td>
                                        <td> <?php echo $registro['id_destinatario']; ?> </td>
                                        <td> <?php echo $registro['asunto']; ?></td> 
                                        <td> <?php echo $registro['cuerpo']; ?></td> 
                                        <td> <?php echo $fecha_formateada = date('d/m/Y H:i:s', strtotime($registro['fecha_envio'])); ?></td> 
                                                <td> <?php echo $registro['leido']; ?></td> 
                                                <!--Etiqueta de botones Editar y Eliminar-->
                                                <td>
                                                    <!--Utilizamos bs5-button-a seguido de la línea de código para editar el ID de la fila. -->
                                                    <a class="btn btn-info" href="ver_mensaje.php?txtID=<?php echo $registro['id']; ?>); " role="button"> ver </a >
                                                    <!--Utilizamos bs5-button-a seguido de la línea de código para obtener el ID y que nos elimine la fila. -->
                                                    <!--El signo sirve para pasar parametros por URL.-->
                                                    <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>); " role="button" >Eliminar</a >   
                                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted" style="background-color:bisque"></div>
        </div>
    </body>
</html>
<br><br>
<?php include("../templates_doc/footer_doc.php")?>
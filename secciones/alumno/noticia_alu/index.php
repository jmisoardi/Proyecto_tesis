<?php 
    include("../../../bd.php");
    include("../templates_alu/header_alu.php");
    /* include("../noticia/index.php"); */
    
    if (isset($_GET['txtID'])) {
        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] :"";

        $sentencia = $conexion->prepare ( "DELETE FROM tbl_noticia WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();

        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Mensaje Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }
    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_noticia`");
    $sentencia->execute();
    $lista_tbl_noticia = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
            <!--Estilo para el titulo-->
            <style> 
                h1,h2,table {
                    text-align: center; font-family: Georgia, sans-serif;
                    
                    }
            </style>
            <div class="card">
                <!--Header y button primary-->
                <label class="card" style="background-color:gold"><h1>Noticias</h1></label>
                <div class="card-header" style="background-color:silver"></div>
                <br>
                <div class="card-body-lg" style="background-color:azure">
            
                    <div class="table-responsive">
                    <!--Usamos el id "tabla_id" para que tengan los estilos de busquedas, el script se encuentra en el footer-->
                        <table class="table" id="tabla_id">
                            <thead>
                                <tr>
                                    <!--Alineación central del Fecha, Nombre, Titulo, Cuerpo, Acciones-->
                                    <style> 
                                    th {
                                        text-align: center; font-family: Georgia, sans-serif;
                                        }
                                    </style>

                                        <!-- <th scope="col" style="background-color:azure"><u>ID</u></th> -->
                                        <th scope="col" style="background-color:azure"><u>Fecha</u></th>
                                        <th scope="col" style="background-color:azure"><u>Titulo</u></th>
                                        <th scope="col" style="background-color:azure"><u>Cuerpo</u></th> 
                                        <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                                </tr>
                            </thead>
                            <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                                <?php foreach ($lista_tbl_noticia as $registro) {?>  
                                    <tr class="">
                                        <td scope="row"><?php echo $fecha_formateada = date('d/m/Y H:i:s', strtotime($registro['fecha'])); ?></td>
                                        <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                                    <td> <?php echo $registro['titulo']; ?> </td>
                                                    <td> <?php echo $registro['cuerpo']; ?></td> 
                                                    <!--Etiqueta de botones Editar y Eliminar-->
                                                    <td>
                                                        <!--Utilizamos bs5-button-a seguido de la línea de código para editar el ID de la fila. -->
                                                        <a class="btn btn-info" href="vista_alu.php?txtID=<?php echo $registro['id']; ?>" role="button" >Ver</a >
                                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <br>
                <div class="card-footer text-muted" style="background-color:silver"></div>
            </div>
        </body>
</html>
<br><br>
<?php include("../templates_alu/footer_alu.php")?>
<?php 
    include("../../bd.php");
    
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

<?php include("../../templates/header.php");?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <!--Estilo para el titulo Personal-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
            }
        h2 {
            text-align: center; font-family: Georgia, sans-serif;
        }
    </style>

<div class="card">
    <!--Header y button primary-->
    <div class="card-header" style="background-color:bisque">   
        <a name="" id="" class="btn btn-primary" href="crear_not.php" role="button" >Agregar Noticia</a>
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
                            <th scope="col" style="background-color:azure"><u>ID</u></th>
                            <th scope="col" style="background-color:azure"><u>Titulo</u></th>
                            <th scope="col" style="background-color:azure"><u>Cuerpo</u></th>
                            
                            <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                    </tr>
                </thead>
                
                <tbody>
                <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                    <?php foreach ($lista_tbl_noticia as $registro) {?>     
                        
                        <!--Alineación central style-->
                        
                        <tr class="">
                            <td scope="row"><?php echo $registro['id'];?></td>
                            <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                        
                                        <td> <?php echo $registro['titulo']; ?> </td>
                                        <td> <?php echo $registro['cuerpo']; ?></td> 
                                        <!--Etiqueta de botones Editar y Eliminar-->
                                        <td>
                                            <!--Utilizamos bs5-button-a seguido de la línea de código para editar el ID de la fila. -->
                                            <a class="btn btn-info" href="editar_not.php?txtID=<?php echo $registro['id']; ?>" role="button" >Editar</a >
                                            <!--Utilizamos bs5-button-a seguido de la línea de código para obtener el ID y que nos elimine la fila. -->
                                            <!--El signo sirve para pasar parametros por URL.-->
                                            <a class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button" >Eliminar</a >   
                                        </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>


    
    <!-- <div class="container mt-5" style="background-color:azure">
        <h1>Enviar Noticia</h1>
            <form action="send_news.php" method="post">
        
                <label for="titulo" class="form-label"><h3>Título:</h3></label>
                    <input type="text" id="titulo" name="titulo" required><br>
                
                <label for="cuerpo" class="form-label"><h3>Mensaje:</h3></label>
                    <textarea class="form-control"id="cuerpo" name="cuerpo" rows="10" cols="50" required></textarea><br>
            
                <input type="submit" value="Enviar Noticia">
            </form>    
    </div> -->
</body>
</html>

<?php include("../../templates/footer.php");?>

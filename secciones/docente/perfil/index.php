<?php 
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");
    // Verifica si la sesión de usuario está establecida
    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit(); // Detiene la ejecución del script después de redirigir
    } else {
        
        }
    //Verificamos si se envío txtID por el metodo GET (enviar).    
    /* if (isset($_GET['txtID'])) { */
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        /* $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :""; */
        //Preparamos la conexion de Borrado.
        /* $sentencia = $conexion->prepare ( "DELETE FROM tbl_persona WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje); */
    /* } */
    

    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una consulta seguido de una subconsulta para obtener tbl_rol.id =tbl_persona.idrol. Nombre del Rol, con obtención de un dato (as idrol) acto seguido las filas devuelvan un array asociativo.
   /*  $sentencia = $conexion->prepare("SELECT * ,
    (SELECT nombredelrol 
    FROM tbl_rol 
    WHERE tbl_rol.id =tbl_persona.idrol limit 1) as idrol 
    FROM `tbl_persona` 
    WHERE usuario = :usuario LIMIT 1");

    $sentencia->bindParam(':usuario', $_SESSION['usuario']);
    $sentencia->execute();
    $lista_tbl_persona = $sentencia->fetch(PDO::FETCH_ASSOC);  */
$usuario_doc = $_SESSION['usuario'];

$sentencia = $conexion->prepare("SELECT * FROM tbl_persona WHERE usuario = :usuario LIMIT 1");
$sentencia->bindParam(':usuario', $usuario_doc); 
$sentencia->execute();
$usuario_doc = $sentencia->fetch(PDO::FETCH_ASSOC);

print_r($usuario_doc);




?>

<?php 
/* include("../templates_doc/header_doc.php") */
?>
<br>
<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Unidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head> -->
    <!-- <body> -->
        
            <!-- <div class="p-5 mb-4 bg-light rounded-3">  -->   
                <div class="card">
                <!--Header y button primary-->
                <!-- <div class="card-header" style="background-color:bisque">   
                    <a name="" id="" class="btn btn-primary" href="crear.php" role="button" >Agregar Registro</a>
                </div>  -->
                        <!-- <div class="container mt-5" style="background-color:azure"> -->
                        <div class="card-body" style="background-color:azure">
                        
                            <div class="table-responsive-sm">
                            <!--Usamos el id "tabla_id" para que tengan los estilos de busquedas, el script se encuentra en el footer-->
                                <table class="table" id="tabla_id">
                                    <!-- <thead> -->
                                        <tr>
                                            <!--Alineación central del ID, Nombre/Rol, Acciones-->
                                            <style> 
                                            th {
                                                text-align: center; font-family: Georgia, sans-serif;
                                                }
                                            </style>
                                                <th scope="col" style="background-color:azure"><u>ID</u></th>
                                                <th scope="col" style="background-color:azure"><u>N/Apellido</u></th>
                                                <th scope="col" style="background-color:azure"><u>Dni</u></th>
                                                <th scope="col" style="background-color:azure"><u>F/Nacimiento</u></th>
                                                <th scope="col" style="background-color:azure"><u>Email</u></th>
                                                <th scope="col" style="background-color:azure"><u>Telefono</u></th>
                                                <th scope="col" style="background-color:azure"><u>Rol</u></th>
                                                <th scope="col" style="background-color:azure"><u>F/Ingreso</u></th>
                                                <th scope="col" style="background-color:azure"><u>Usuario</u></th>
                                                <th scope="col" style="background-color:azure"><u>Contraseña</u></th>
                                                <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                                        </tr>
                                    <!-- </thead> -->
                                    
                                    <tbody>
                                    <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                                        <?php if ($usuario_doc) {?>     
                                            <!--Alineación central style-->
                                            <style>
                                                    td  {
                                                        text-align: center; font-family: Georgia, sans-serif;
                                                        }   
                                            </style>
                                            <tr class="">
                                                <td scope="row"><?php echo $usuario_doc['id'];?></td>
                                                <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                                            <td>
                                                                <?php echo $usuario_doc['nombre'] . ' ' . $usuario_doc['apellido']; ; ?> 
                                                            </td>
                                                            <td> <?php echo $usuario_doc['dni']; ?> </td>
                                                            <td> <?php echo $usuario_doc['fechanacimiento']; ?></td> 
                                                            <td> <?php echo $usuario_doc['email']; ?></td>
                                                            <td> <?php echo $usuario_doc['telefono']; ?></td>
                                                            <td> <?php echo $usuario_doc['idrol']; ?></td>
                                                            <td> <?php echo $usuario_doc['fechaingreso']; ?></td>
                                                            <td> <?php echo $usuario_doc['usuario']; ?></td>
                                                            <td> <?php echo $usuario_doc['password']; ?></td>
                                                            <!--Etiqueta de botones Editar y Eliminar-->
                                                            <td>
                                                                <!--Utilizamos bs5-button-a seguido de la línea de código para editar el ID de la fila. -->
                                                                <a class="btn btn-info" href="editar_doc.php?txtID=<?php echo $registro['id']; ?>" role="button" >Editar</a >    
                                                            </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            <!-- </div> -->
        
<!--     </body>
</html> -->
<br><br>
<?php include("../templates_doc/footer_doc.php")?>
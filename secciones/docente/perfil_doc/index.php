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
    
$usuario_doc = $_SESSION['usuario'];

$sentencia = $conexion->prepare("SELECT * FROM tbl_persona WHERE usuario = :usuario LIMIT 1");
$sentencia->bindParam(':usuario', $usuario_doc); 
$sentencia->execute();
$usuario_doc = $sentencia->fetch(PDO::FETCH_ASSOC);
/* print_r($usuario_doc); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/styles.css">
</head>

</html>   

<br>
    <div class="card">
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
                                <th scope="col" style="background-color:azure"><u></u></th>
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
                                <td scope="row"><?php $usuario_doc['id'];?></td>
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
                                                <a class="btn btn-info" href="editar_doc.php?txtID=<?php echo $usuario_doc['id']; ?>" role="button" >Editar</a >    
                                            </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<br><br>
<?php include("../templates_doc/footer_doc.php")?>
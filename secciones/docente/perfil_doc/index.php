<?php 
    session_start();
    include("../../../bd.php");
    
    $usuario_doc = $_SESSION['usuario'];
    // Verifica si la sesión de usuario está establecida
    $url_base = "http://localhost/Proyecto_tesis/";
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit(); // Detiene la ejecución del script después de redirigir
    } else {
        
    }
    
    
    
    /* Seleccionamos datos de la table Persona */
    
   // Preparar la consulta SQL
$sentencia = $conexion->prepare("SELECT `id`, `nombre`, `apellido`, `dni`, `fechanacimiento`, `email`, `telefono`, `idrol`, `fechaingreso`, `usuario`, `password` FROM `tbl_persona` WHERE `usuario` = :usuario");
// Vincular el parámetro `:usuario` con la variable `$usuario_doc`
$sentencia->bindParam(':usuario', $usuario_doc);
// Ejecutar la consulta
$sentencia->execute();
// Obtener todos los registros coincidentes
$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

   /*  print_r($usuario_doc); */



/* <!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Perfil Docente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
    </html>   -->  */
include("../templates_doc/header_doc.php");?>
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
                                <th scope="col" style="background-color:azure"><u>id</u></th>
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
                        <?php foreach ($usuarios as $datos_perfil) {?>     
                            <!--Alineación central style-->
                            <!-- <style>
                                    td  {
                                        text-align: center; font-family: Georgia, sans-serif;
                                        }   
                            </style> -->
                            <tr class="">
                                <td scope="row"><?php echo $datos_perfil['id']; ?></td>
                                <td><?php echo $datos_perfil['nombre'] . ' ' . $datos_perfil['apellido']; ?></td>
                                <td><?php echo $datos_perfil['dni']; ?></td>
                                <td><?php echo $datos_perfil['fechanacimiento']; ?></td>
                                <td><?php echo $datos_perfil['email']; ?></td>
                                <td><?php echo $datos_perfil['telefono']; ?></td>
                                <td><?php echo $datos_perfil['idrol']; ?></td>
                                <td><?php echo $datos_perfil['fechaingreso']; ?></td>
                                <td><?php echo $datos_perfil['usuario']; ?></td>
                                <td><?php echo $datos_perfil['password']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="editar_doc.php?txtID=<?php echo $datos_perfil['id']; ?>" role="button">
                                        <img src="../../../css/imagen_tesis/icons/icon_editar.png" style="width: 32px; height: 32px; vertical-align: middle;">
                                    </a>
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
<?php 
    // Incluimos la base de datos.
    include("../../../bd.php");

    //Verificamos si se envío txtID por el metodo GET (enviar).    
    if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        //Preparamos la conexion de Borrado.
        $sentencia = $conexion->prepare ( "DELETE FROM tbl_persona WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
    }

    $sentencia = $conexion->prepare("
    SELECT 
        p.*, 
        (SELECT nombredelrol FROM tbl_rol WHERE tbl_rol.id = p.idrol LIMIT 1) AS idrol,
        n.nombre_nivel
    FROM tbl_persona p
    LEFT JOIN tbl_nivel n ON p.nivel_asignado = n.id
");
$sentencia->execute();
$lista_tbl_persona = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../templates/header.php");?>
<br/>
    <!--Estilo para el titulo Personal-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
        }
    </style>
        <h1>Personal</h1> 

        <div class="card">
            <!--Header y button primary-->
            <div class="card-header" style="background-color:bisque">   
                <a name="" id="" href="crear.php" role="button" >
                    <img src="../../../css/imagen_tesis/icons/icon_agregar.png" style="width: 48px; height: 48px; vertical-align: middle;">
                </a>
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
                                    <th scope="col" style="background-color:azure"><u>N/Apellido</u></th>
                                    <th scope="col" style="background-color:azure"><u>Dni</u></th>
                                    <th scope="col" style="background-color:azure"><u>F/Nacimiento</u></th>
                                    <th scope="col" style="background-color:azure"><u>Email</u></th>
                                    <th scope="col" style="background-color:azure"><u>Telefono</u></th>
                                    <th scope="col" style="background-color:azure"><u>Rol</u></th>
                                    <th scope="col" style="background-color:azure"><u>Nivel</u></th>
                                    <th scope="col" style="background-color:azure"><u>F/Ingreso</u></th>
                                    <th scope="col" style="background-color:azure"><u>Usuario</u></th>
                                    <th scope="col" style="background-color:azure"><u>Password</u></th>

                                    <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                            </tr>
                        </thead>
                        <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                            <?php foreach ($lista_tbl_persona as $registro) {?>     
                                
                                <!--Alineación central style-->
                                <style>
                                        td  {
                                            text-align: center; font-family: Georgia, sans-serif;
                                            }   
                                </style>
                                <tr class="">
                                    <td scope="row"><?php echo $registro['id'];?></td>
                                    <!--La etiqueta <td> podemos agrupar datos en una sola casilla-->
                                                <td>
                                                    <?php echo $registro['nombre'] . ' ' . $registro['apellido']; ; ?> 
                                                </td>
                                                <td> <?php echo $registro['dni']; ?> </td>
                                                <td> <?php echo $registro['fechanacimiento']; ?></td> 
                                                <td> <?php echo $registro['email']; ?></td>
                                                <td> <?php echo $registro['telefono']; ?></td>
                                                <td> <?php echo $registro['idrol']; ?></td>
                                                <td> <?php echo $registro['nombre_nivel']; ?></td>
                                                <td> <?php echo $registro['fechaingreso']; ?></td>
                                                <td> <?php echo $registro['usuario']; ?></td>
                                                <td> <?php echo $registro['password']; ?></td>
                                                <!--Etiqueta de botones Editar y Eliminar-->
                                                <td>
                                                    <!--Utilizamos bs5-button-a seguido de la línea de código para editar el ID de la fila. -->
                                                    <a  href="editar.php?txtID=<?php echo $registro['id']; ?>" role="button" >
                                                        <img src="../../../css/imagen_tesis/icons/icon_editar.png" alt="Editar" style="width: 48px; height: 48px; vertical-align: middle;">                                            
                                                    </a >
                                                    <!--Utilizamos bs5-button-a seguido de la línea de código para obtener el ID y que nos elimine la fila. -->
                                                    <!--El signo sirve para pasar parametros por URL.-->
                                                    <a  href="javascript:borrar(<?php echo $registro['id']; ?>);" role="button" >
                                                        <img src="../../../css/imagen_tesis/icons/icon_eliminar.png" alt="Eliminar" style="width: 48px; height: 48px; vertical-align: middle;">                                            
                                                    </a >
                                                        
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
<br>
<br>
<?php include("../templates/footer.php");?>
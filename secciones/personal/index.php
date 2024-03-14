<?php 
    include("../../bd.php");



    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_persona`");
    $sentencia->execute();
    $lista_tbl_persona = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<?php include("../../templates/header.php");?>

<br/>
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
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button" >Agregar Registro</a>
    </div> 
    
    <div class="card-body" style="background-color:azure">
        
        <div
            class="table-responsive-md">
            <table
                class="table">
                <thead>
                    <tr>
                        <th scope="col" style="background-color:azure"><u>Nombre</u></th>
                        <th scope="col" style="background-color:azure"><u>Apellido</u></th>
                        <th scope="col" style="background-color:azure"><u>Dni</u></th>
                        <th scope="col" style="background-color:azure"><u>Email</u></th>
                        <th scope="col" style="background-color:azure"><u>Teléfono</u></th>
                        <th scope="col" style="background-color:azure"><u>Fecha/Ingreso</u></th>
                        <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                    </tr>
                </thead>
                <tbody>
                
                <?php foreach ($lista_tbl_persona as $registro) {?>     
                    <tr class="">
                        <td scope="row">Jair </td>
                        <td><?php echo $registro['nombre']; ?></td> 
                        <td><?php echo $registro['apellido']; ?> </td>
                        <td><?php echo $registro['dni']; ?> </td>
                        <td><?php echo $registro['fechanacimiento']; ?></td> 
                        <td> <?php echo $registro['email']; ?></td>
                        <td> <?php echo $registro['telefono']; ?></td>
                        <td> <?php echo $registro['idrol']; ?></td>
                        <td> <?php echo $registro['fechaingreso']; ?></td>
                        <!--Etiqueta de botones Editar y Eliminar-->
                        <td><a name="" id="" class="btn btn-info" href="#" role="button">Editar</a> |
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>


<?php include("../../templates/footer.php");?>
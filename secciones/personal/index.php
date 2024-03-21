<?php 
    include("../../bd.php");



    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una consulta seguido de una subconsulta para obtener tbl_rol.id =tbl_persona.idrol. Nombre del Rol, con obtención de un dato (as idrol) acto seguido las filas devuelvan un array asociativo.
    $sentencia = $conexion->prepare("SELECT * ,
     (SELECT nombredelrol 
    FROM tbl_rol 
    WHERE tbl_rol.id =tbl_persona.idrol limit 1) as idrol 
    FROM `tbl_persona`");
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
                        <style> 
                            th {
                                text-align: center; font-family: Georgia, sans-serif;
                                }
                        </style>
                        <th scope="col" style="background-color:azure"><u>ID</u></th>
                        <th scope="col" style="background-color:azure"><u>Nombre/Apellido</u></th>
                        <th scope="col" style="background-color:azure"><u>Dni</u></th>
                        <th scope="col" style="background-color:azure"><u>Fecha/Nacimiento</u></th>
                        <th scope="col" style="background-color:azure"><u>Email</u></th>
                        <th scope="col" style="background-color:azure"><u>Telefono</u></th>
                        <th scope="col" style="background-color:azure"><u>Rol</u></th>
                        <th scope="col" style="background-color:azure"><u>Fecha/Ingreso</u></th>
                        <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($lista_tbl_persona as $registro) {?>     
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
                                        <!--<td><?php echo $registro['apellido'];?></td>-->
                                        <td> <?php echo $registro['dni']; ?> </td>
                                        <td> <?php echo $registro['fechanacimiento']; ?></td> 
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
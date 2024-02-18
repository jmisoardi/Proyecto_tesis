<?php 
// Incluimos la base de datos
    include("../../bd.php");
//Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las dilas se devuelvan como un array asociativo.
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_rol`");
    $sentencia->execute();
    $lista_tbl_rol = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//Utilizamos el print_r para saber que estamos consultando los registros de la base de datos de la tabla de rol.
    print_r($lista_tbl_rol);
?>


<?php include("../../templates/header.php");?>
<br>
<br>

<style> 
    h1 { 
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h1>Rol</h1> 
<div class="card">
    
    <!--Header y button primary-->
        <div class="card-header" style="background-color:bisque">   
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button" >Agregar Registro</a>
        </div> 
    
        <div class="card-body" style="background-color:azure">
    
            <div class="table-responsive-sm">
                <table
                    class="table">
                    <thead>
                        <tr>
                        <!--Alineación central del ID, Nombre/Rol, Acciones-->
                        <style> 
                            th {
                                text-align: center; font-family: Georgia, sans-serif;
                                }
                        </style>
                            <th scope="col" style="background-color:azure"><u>ID</u></th>
                            <th scope="col" style="background-color:azure"><u>Nombre/Rol</u></th>
                            <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Alineación central style-->
                        <style>
                            td  {
                                text-align: center; font-family: Georgia, sans-serif;
                                }   
                        </style>
                            <!--Usamos el foreach para recorrer el arreglo de la lista de rol y asignarlo a la variable $registro-->  
                            <?php foreach ($lista_tbl_rol as $registro) {?>     
                                <tr class="">
                            <!--Utilizamos php echo $registro['id'] para mostrar el dato de la base de datos-->
                                    <td scope="row"><?php echo $registro['id']?></td>
                                    <td><?php echo $registro['nombredelrol']?></td>
                                    
                                    <td>
                                        <input name="btneditar" id="btneditar" class="btn btn-info" type="button" value="Editar"/> |
                                        
                                        <input name="btnborrar" id="btnborrar" class="btn btn-danger" type="button" value="Eliminar"/>
                                        
                                    </td>
                                    
                                </tr>
                            <?php }?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    
    <div class="card-footer text-muted" style="background-color:bisque"></div>
</div>
        


<?php include("../../templates/footer.php");?>
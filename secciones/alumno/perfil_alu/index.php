<?php 
    session_start();
    include("../../../bd.php");
    
    $usuario_alu = $_SESSION['usuario'];
    
    /* Obtenemos datos de la tabla persona */
    $sentencia = $conexion->prepare("SELECT * FROM tbl_persona WHERE usuario = :usuario LIMIT 1");
    $sentencia->bindParam(':usuario', $usuario_alu); 
    $sentencia->execute();
    $usuario_alu = $sentencia->fetch(PDO::FETCH_ASSOC);
    /* print_r($usuario_alu); */
    ?>

<!--Estilo para Alumnos header-->
<?php include("../templates_alu/header_alu.php");?>
<br>
    <body>
        <div class="card">
        <div class="card-header" style="background-color:bisque">    
            <style> h1 { text-align: center; font-family: Georgia, sans-serif; } </style>
            <h1>-Mi perfil- <br></h1>
        </div>
            <!-- <div class="card-body-xl" style="background-color:azure"> -->
                <!--Usamos el id "tabla_id" para que tengan los estilos de busquedas, el script se encuentra en el footer-->
                <div class="table-responsive"> 
                    <!-- <br>    -->
                    <table class="table" id="tabla_id">
                        
                            <tr>
                                <!--Alineación central del ID, Nombre/Rol, Acciones-->
                                <style> 
                                th {
                                    text-align: center; font-family: Georgia, sans-serif;
                                    }
                                </style>
                                    <th scope="col" style="background-color:azure"><u>N/Apellido</u></th>
                                    <th scope="col" style="background-color:azure"><u>Dni</u></th>
                                    <th scope="col" style="background-color:azure"><u>F/Nacimiento</u></th>
                                    <th scope="col" style="background-color:azure"><u>Email</u></th>
                                    <th scope="col" style="background-color:azure"><u>Telefono</u></th>
                                    <th scope="col" style="background-color:azure"><u>Idrol</u></th>
                                    <th scope="col" style="background-color:azure"><u>Usuario</u></th>
                                    <th scope="col" style="background-color:azure"><u>Password</u></th>
                                    <!-- <th scope="col" style="background-color:azure"><u></u></th>
                                    <th scope="col" style="background-color:azure"><u></u></th> -->
                                    <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                            </tr>
                        <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                            <?php if ($usuario_alu) {?>     
                                <style> td {text-align: center; font-family: Georgia, sans-serif; } </style>
                                
                                <tr class="">
                                    <td scope="row"><?php echo $usuario_alu['nombre'] . ' ' . $usuario_alu['apellido'] ; ?></td>
                                    <td><?php echo $usuario_alu['dni']; ?></td>
                                    <td><?php echo $usuario_alu['fechanacimiento']; ?></td>
                                    <td><?php echo $usuario_alu['email']; ?></td>
                                    <td><?php echo $usuario_alu['telefono']; ?></td>
                                    <td><?php  echo $usuario_alu['idrol'];?></td>
                                    <!-- <td> echo $usuario_alu['fechaingreso']; </td> -->
                                    <td><?php  echo $usuario_alu['usuario'];?> </td>
                                    <td><?php echo str_repeat('*', strlen($usuario_alu['password'])); ?> </td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="editar_alu.php?txtID=<?php echo $usuario_alu['id']; ?>" role="button">
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
    </body>
<br><br>
<?php include("../templates_alu/footer_alu.php")?>
</html>
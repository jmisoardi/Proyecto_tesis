<?php 
    session_start();
   /*  print_r($_SESSION); */ 
    include("../../../bd.php");

    $usuario_doc = $_SESSION['usuario'];
    
    /* Seleccionamos datos de la table Persona */
    $sentencia = $conexion->prepare("SELECT * FROM tbl_persona WHERE usuario = :usuario LIMIT 1");
    $sentencia->bindParam(':usuario', $usuario_doc); 
    $sentencia->execute();
    $usuario_doc = $sentencia->fetch(PDO::FETCH_ASSOC);
    
?>
<?php include("../templates_doc/header_doc.php");?>    
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
                                    <th scope="col" style="background-color:azure"><u>Usuario</u></th>
                                    <th scope="col" style="background-color:azure"><u>Password</u></th>
                                    <!-- <th scope="col" style="background-color:azure"><u></u></th>
                                    <th scope="col" style="background-color:azure"><u></u></th> -->
                                    <th scope="col" style="background-color:azure"><u>Acciones</u></th>
                            </tr>
                        <tbody>
                        <!--Usamos el foreach para recorrer el arreglo de la lista de persona y asignarlo a la variable $registro-->  
                            <?php if ($usuario_doc) {?>     
                                <style> td {text-align: center; font-family: Georgia, sans-serif; } </style>
                                
                                <tr class="">
                                    <td scope="row"><?php echo $usuario_doc['nombre'] . ' ' . $usuario_doc['apellido'] ; ?></td>
                                    <td>
                                        <?php echo $usuario_doc['dni']; ?>
                                    </td>
                                    <td><?php echo $usuario_doc['fechanacimiento']; ?></td>
                                    <td><?php echo $usuario_doc['email']; ?></td>
                                    <td><?php echo $usuario_doc['telefono']; ?></td>
                                    <!-- <td> echo $usuario_doc['idrol'];</td> -->
                                    <!-- <td> echo $usuario_doc['fechaingreso']; </td> -->
                                    <td><?php  echo $usuario_doc['usuario'];?> </td>
                                    <td><?php echo str_repeat('*', strlen($usuario_doc['password'])); ?> </td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="editar_doc.php?txtID=<?php echo $usuario_doc['id']; ?>" role="button">
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
<?php include("../templates_doc/footer_doc.php")?>
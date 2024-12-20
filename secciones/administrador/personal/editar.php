<?php 
    // Incluimos la base de datos.
    include("../../../bd.php");
    
    //Recepción del envío txtID.    
    if (isset($_GET['txtID'])) {
        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
        
        //Preparamos la conexion de Editar.
        $sentencia = $conexion->prepare ( "SELECT * FROM tbl_persona WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        
        //Utilizamos el FETCH_LAZY para que cargue solo un registro.
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
            $nombre = $registro["nombre"]; 
            $apellido = $registro["apellido"]; 
            $dni = $registro["dni"]; 
            $fechanacimiento = $registro["fechanacimiento"]; 
            $email = $registro["email"]; 
            $telefono = $registro["telefono"]; 
            $idrol = $registro["idrol"];
            $nivel_asignado = $registro["nivel_asignado"];
            $fechaingreso = $registro["fechaingreso"];
            $usuario = $registro["usuario"];
            $password = $registro["password"];
        
        //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
        $sentencia = $conexion->prepare("SELECT * FROM `tbl_rol`");
        $sentencia->execute();
        $lista_tbl_rol = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $sentencia = $conexion->prepare("SELECT * FROM tbl_nivel");
        $sentencia->execute();
        $lista_tbl_nivel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    //Verificamos si existe una peticion $_POST, validamos si ese if isset sucedio, lo vamos igualar a ese valor, de lo contrario no sucedio
    if ($_POST){
        /* print_r($_POST);     */
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"]: "";
        $apellido = (isset($_POST["apellido"])) ? $_POST["apellido"]: "";
        $dni = (isset($_POST["dni"])) ? $_POST["dni"]: "";
        $fechanacimiento = (isset($_POST["fechanacimiento"])) ? $_POST["fechanacimiento"]: "";
        $email = (isset($_POST["email"])) ? $_POST["email"]: "";        
        $telefono = (isset($_POST["telefono"])) ? $_POST["telefono"]: "";
        $idrol = (isset($_POST["idrol"])) ? $_POST["idrol"]: "";
        $nivel_asignado = (isset($_POST["nivel_asignado"])) ? $_POST["nivel_asignado"]: "";
        $fechaingreso = (isset($_POST["fechaingreso"])) ? $_POST["fechaingreso"]: "";
        $usuario = (isset($_POST["usuario"])) ? $_POST["usuario"]: "";
        $password = (isset($_POST["password"])) ? $_POST["password"]: "";
        
        // Verificamos si el usuario ya existe para otro registro
        $consultaUsuario = $conexion->prepare("SELECT COUNT(*) AS total FROM tbl_persona WHERE usuario = :usuario AND id != :id");
        $consultaUsuario->bindParam(":usuario", $usuario);
        $consultaUsuario->bindParam(":id", $txtID);
        $consultaUsuario->execute();
        $resultado = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

        if ($resultado['total'] > 0) {
            // Si el usuario ya existe, mostramos un mensaje y no realizamos la actualización
            $mensaje = "Error: El usuario '$usuario' ya está en uso. Por favor, elija otro.";
            header("Location:index.php?mensaje=".urlencode($mensaje));
            exit;
        }

        //Preparamos la insercción de los datos.
        $sentencia = $conexion->prepare("
        UPDATE tbl_persona 
        SET
            nombre=:nombre,
            apellido=:apellido,
            dni=:dni,
            fechanacimiento=:fechanacimiento,
            email=:email,
            telefono=:telefono,
            idrol=:idrol,
            nivel_asignado=:nivel_asignado,
            fechaingreso=:fechaingreso,
            usuario=:usuario,
            password=:password
        WHERE id=:id ");
        
        //Asignando los valores que vienen del  método POST (Los que vienen del formulario).
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":apellido",$apellido);
        $sentencia->bindParam(":dni",$dni);
        $sentencia->bindParam(":fechanacimiento",$fechanacimiento);
        $sentencia->bindParam(":email",$email);
        $sentencia->bindParam(":telefono",$telefono);
        $sentencia->bindParam(":idrol",$idrol);
        $sentencia->bindParam(":nivel_asignado",$nivel_asignado);
        $sentencia->bindParam(":fechaingreso",$fechaingreso);
        $sentencia->bindParam(":usuario" ,$usuario);
        $sentencia->bindParam(":password" ,$password);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        //Mensaje de Registro Actualizado (Sweet alert).
        $mensaje="Registro Actualizado";
        header("Location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../templates/header.php");?>
<!--Estilo para Datos Personales-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
        }
    </style>
        <h1>Datos Personales</h1> 
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header" style="background-color:bisque">Ingrese los datos para el registro</div>
            <div class="card-body">
                
            <!--Formulario para cargar los datos, con style de color-->   
                <form  action="" method="post" enctype="multipart/form-data" style="background-color:azure">
                    <div class="mb-3">
                        <label for="txtID" class="form-label">ID:</label>
                        <input type="text" 
                            value= "<?php echo $txtID; ?>"
                            class="form-control w-auto" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />    
                    </div>        
                    <div class="mb-3">
                        <label for="nombre" class="form-label"><u>Nombre:</u></label>
                        <input type="text" 
                            value= "<?php echo $nombre; ?>"
                            class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese Nombre"/>
                    </div>
                    <div class="mb-3"> 
                        <label for="apellido" class="form-label"><u>Apellido:</u></label>
                        <input type="text" 
                            value= "<?php echo $apellido; ?>"
                            class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Ingrese Apellido"/>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label"><u>Dni:</u></label>
                        <input type="number" 
                            value= "<?php echo $dni; ?>"
                            class="form-control w-auto" name="dni" id="dni" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
                    </div>
                    <div class="mb-3">
                        <label for="fechanacimiento" class="form-label"><u>Fecha/Nacimiento:</u></label>
                        <input type="date" 
                            value= "<?php echo $fechanacimiento; ?>"
                            class="form-control w-auto" name="fechanacimiento" id="fechanacimiento" aria-describedby="helpId" placeholder="Ingrese Dni"/>            
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><u>Email:</u></label>
                        <input type="email"
                            value= "<?php echo $email; ?>" 
                            class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder=" Por ejemplo: abc@mail.com"/> 
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label"><u>Teléfono:</u></label>
                        <input type="number" 
                            value= "<?php echo $telefono; ?>"
                            class="form-control w-auto" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese Teléfono"/>            
                                <small id="helpId" class="form-text text-muted"> sin (0) y sin (15)</small>
                    </div>
                    <div class="mb-3">
                        <label for="idrol" class="form-label"><u>Rol:</u></label>
                            <select
                                class="form-select w-auto form-select-ms" name="idrol" id="idrol">
                                <?php foreach ($lista_tbl_rol as $registro) {?>      
                                    <option <?php echo ($idrol== $registro['id'])? "selected" : ""; ?> value ="<?php echo $registro['id']?>">
                                                    <?php echo $registro['nombredelrol']?>
                                    </option>
                                <?php }?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="nivel_asignado" class="form-label"><u>Nivel:</u></label>
                            <select
                                class="form-select w-auto form-select-ms" name="nivel_asignado" id="nivel_asignado">
                                <?php foreach ($lista_tbl_nivel as $registro) {?>      
                                    <option <?php echo ($nivel_asignado== $registro['id'])? "selected" : ""; ?> value ="<?php echo $registro['id']?>">
                                                    <?php echo $registro['nombre_nivel']?>
                                    </option>
                                <?php }?>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="fechaingreso" class="form-label"><u>Fecha/Ingreso:</u></label>
                        <input type="date" 
                            value= "<?php echo $fechaingreso; ?>"
                            class="form-control w-auto" name="fechaingreso" id="fechaingreso" aria-describedby="helpId" placeholder="Ingrese Fecha"/>
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label"><u>Usuario:</u></label>
                        <input type="text" 
                            value= "<?php echo $usuario; ?>"
                            class="form-control w-auto" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><u>Password:</u></label>
                        <input type="text" 
                            value= "<?php echo $password; ?>"
                            class="form-control w-auto" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña"/>
                    </div>
                    
                    <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                </form>
            </div>
        </div>
<?php include("../templates/footer.php"); ?>
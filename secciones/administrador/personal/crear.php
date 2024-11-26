<?php 
    // Incluimos la base de datos.
    include("../../../bd.php");
    
    if ($_POST){
        /* print_r($_POST); */
        
        //Verificamos si existe una peticion $_POST, validamos si ese if isset sucedio, lo vamos igualar a ese valor, de lo contrario no sucedio
        //Lo verificamos a este valor $_POST["usuario"] lo comparamos con la llave de pregunta (?) $_POST["usuario"] si sucedio, de lo contrario va a quedar vacío.
        $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"]: "";
        $apellido = (isset($_POST["apellido"])) ? $_POST["apellido"]: "";
        $dni = (isset($_POST["dni"])) ? $_POST["dni"]: "";
        $fechanacimiento = (isset($_POST["fechanacimiento"])) ? $_POST["fechanacimiento"]: "";
        $email = (isset($_POST["email"])) ? $_POST["email"]: "";        
        $telefono = (isset($_POST["telefono"])) ? $_POST["telefono"]: "";
        $idrol = (isset($_POST["idrol"])) ? $_POST["idrol"]: "";
        $nivel = (isset($_POST["nivel"])) ? $_POST["nivel"]: "";
        $fechaingreso = (isset($_POST["fechaingreso"])) ? $_POST["fechaingreso"]: "";
        $usuario = (isset($_POST["usuario"])) ? $_POST["usuario"]: "";
        $password = (isset($_POST["password"])) ? $_POST["password"]: "";

        //Preparamos la insercción de los datos.
        $sentencia = $conexion->prepare("INSERT INTO 
        `tbl_persona`(`id`, `nombre`, `apellido`, `dni`, `fechanacimiento`, `email`, `telefono`, `idrol`, `nivel_asignado`,`fechaingreso`, `usuario`, `password` ) 
        VALUES (null, :nombre, :apellido, :dni, :fechanacimiento, :email, :telefono, :idrol, :nivel, :fechaingreso, :usuario, :password)");
        
        //Asignando los valores que vienen del  método POST (Los que vienen del formulario).
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":apellido",$apellido);
        $sentencia->bindParam(":dni",$dni);
        $sentencia->bindParam(":fechanacimiento",$fechanacimiento);
        $sentencia->bindParam(":email",$email);
        $sentencia->bindParam(":telefono",$telefono);
        $sentencia->bindParam(":idrol",$idrol);
        $sentencia->bindParam(":nivel",$nivel);
        $sentencia->bindParam(":fechaingreso",$fechaingreso);
        $sentencia->bindParam(":usuario",$usuario);
        $sentencia->bindParam(":password",$password);
        $sentencia->execute();
        //Mensaje de Registro Agregado (Sweet alert).
        $mensaje="Registro Agregado";
        header("Location:index.php?mensaje=".$mensaje);
        
    }
    //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_rol`");
    $sentencia->execute();
    $lista_tbl_rol = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_nivel`");
    $sentencia->execute();
    $lista_tbl_nivel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>
<?php include("../templates/header.php");?>
<br>
<br>
<!--Estilo para Datos Personales-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
        }
        input:invalid:focus{
            border: 2px solid red;
            background-color: #ffdddd;  
        }
    </style>
    
        <h1>Datos Personales</h1> 
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card">
                <div class="card-header" style="background-color:bisque">Ingrese los datos para el registro</div>
                <div class="card-body">
            <!--Formulario ingreso de datos de la persona, con style de color-->   
                <form  action="" method="post" enctype="multipart/form-data" style="background-color:azure">
                    <div class="mb-3">
                        <label for="nombre" class="form-label"><u>Nombre:</u></label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Ingrese Nombre" required/>
                    </div>
                    <div class="mb-3"> 
                        <label for="apellido" class="form-label"><u>Apellido:</u></label>
                        <input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="Ingrese Apellido" required/>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label"><u>Dni:</u></label>
                        <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" placeholder="Ingrese Dni" required/>            
                    </div>
                    <div class="mb-3">
                        <label for="fechanacimiento" class="form-label"><u>Fecha/Nacimiento:</u></label>
                        <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" aria-describedby="helpId"/>            
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><u>Email:</u></label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder=" Por ejemplo: abc@mail.com" /> 
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label"><u>Teléfono:</u></label>
                        <input type="number" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Ingrese Teléfono" />            
                        <small id="helpId" class="form-text text-muted"> sin (0) y sin (15)</small>
                    </div>
                    <div class="mb-3">
                        <label for="idrol" class="form-label"><u>Rol:</u></label>
                        <select
                            class="form-select form-select-ms" name="idrol" id="idrol" required>
                            <?php foreach ($lista_tbl_rol as $registro) {?>      
                                <option value ="<?php echo $registro['id']?>">
                                                <?php echo $registro['nombredelrol']?>
                                </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nivel" class="form-label"><u>Nivel:</u></label>
                        <select
                            class="form-select form-select-ms" name="nivel" id="nivel" required>
                            <?php foreach ($lista_tbl_nivel as $registro_nivel) {?>      
                                <option value ="<?php echo $registro_nivel['id']?>">
                                                <?php echo $registro_nivel['nombre_nivel']?>
                                </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fechaingreso" class="form-label"><u>Fecha/Ingreso:</u></label>
                        <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" aria-describedby="helpId" placeholder="Ingrese Fecha" />
                        
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="form-label"><u>Usuario:</u></label>
                        <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario" required/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><u>Password:</u></label>
                        <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password" required/>
                    </div>
        
                    <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                </form>
            </div>
        </div>
    </div>
<br>
<?php include("../templates/footer.php");?>
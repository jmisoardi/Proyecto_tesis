<?php 
    include("../../../bd.php");
    include("../templates_alu/header_alu.php");
    
    //Recepción del envío txtID.    
    if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
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
            $fechaingreso = $registro["fechaingreso"];
            $usuario = $registro["usuario"];
            $password = $registro["password"];
        
        //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
        $sentencia = $conexion->prepare("SELECT * FROM `tbl_rol`");
        $sentencia->execute();
        $lista_tbl_rol = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    if ($_POST){
        /* print_r($_POST); */
        
        //Verificamos si existe una peticion $_POST, validamos si ese if isset sucedio, lo vamos igualar a ese valor, de lo contrario no sucedio
        //Lo verificamos a este valor $_POST["usuario"] lo comparamos con la llave de pregunta (?) $_POST["usuario"] si sucedio, de lo contrario va a quedar vacío.
        /* $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : ""; */
        $nombre = (isset($_POST["nombre"])) ? $_POST["nombre"]: "";
        $apellido = (isset($_POST["apellido"])) ? $_POST["apellido"]: "";
        $dni = (isset($_POST["dni"])) ? $_POST["dni"]: "";
        $fechanacimiento = (isset($_POST["fechanacimiento"])) ? $_POST["fechanacimiento"]: "";
        $email = (isset($_POST["email"])) ? $_POST["email"]: "";        
        $telefono = (isset($_POST["telefono"])) ? $_POST["telefono"]: "";
        $usuario = (isset($_POST["usuario"])) ? $_POST["usuario"]: "";
        $password = (isset($_POST["password"])) ? $_POST["password"]: "";

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
        $sentencia->bindParam(":usuario",$usuario);
        $sentencia->bindParam(":password",$password);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        //Mensaje de Registro Actualizado (Sweet alert).
        $mensaje="Registro Actualizado";
        header("Location:index.php?mensaje=".$mensaje);
        /* print_r($usuario_alu); */
    }
?>

<?php 
/* include("../templates_alu/header_alu.php"); */?>
<!--Estilo para Datos Personales-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/styles.css">
    </head>
<style> 
    h4 {
        text-align: center; font-family: Georgia, sans-serif;
    }
</style>
    <h4>Datos Personales</h4> 

<div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header" style="background-color:bisque">Ingrese los datos para el registro</div>
        
            <div class="card-body">
        <!--Formulario para cargar los datos, con style de color-->   
            <form  action="" method="post" enctype="multipart/form-data" style="background-color:azure">
                

                    <!-- <label for="txtID" class="form-label"></label> -->
                    <!-- En este input se encuentra el readonly es que un atributo de lectura solamente, el usuario no puede modificar el valor -->
                    <!-- <input type="text"  -->
                        <!-- value= " --><?php  /* $txtID; */ ?>
                        <!-- class="form-control w-auto" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="" />     -->
                <!-- </div>  -->
                
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
                    <input type="text" class="form-control w-auto" id="idrol" disabled name="idrol" 
                        <?php foreach($lista_tbl_rol as $registro){
                                        if($idrol == $registro['id']) { ?> 
                                        value="<?php echo $registro['nombredelrol']?>"
                                        <?php }
                        }?> 
                        aria-describedby="helpId" placeholder="" />
                </div>
                    
                <div class="mb-3">
                    <label for="fechaingreso" class="form-label"><u>Fecha/Ingreso:</u></label>
                    <input type="date" 
                        value= "<?php echo $fechaingreso; ?>"
                        class="form-control w-auto"  disabled name="fechaingreso" id="fechaingreso" aria-describedby="helpId" placeholder="Ingrese Fecha"/>
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label"><u>Usuario:</u></label>
                    <input type="text" 
                        value= "<?php echo $usuario; ?>"
                        class="form-control w-auto" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Ingrese Usuario"/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><u>Password:</u></label>
                    <input type="text" 
                        value= "<?php echo $password; ?>"
                        class="form-control w-auto" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese password"/>
                </div>
                    
                <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                <button type="submit" class="btn btn">
                    <img src="../../../css/imagen_tesis/icons/aceptar.png" style="width: 30px; height: 30px; vertical-align: middle;">
                </button>
                <a name="" id="" class="btn btn" href="index.php" role="button" >
                    <img src="../../../css/imagen_tesis/icons/cancelar.png" style="width: 30px; height: 30px; vertical-align: middle;">
                </a>
            </form>
        </div>
    </div>
<br>
<?php include("../templates_alu/footer_alu.php")?>
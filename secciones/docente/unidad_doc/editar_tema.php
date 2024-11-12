<?php 
    session_start();
    // Incluimos la base de datos.
    include("../../../bd.php");
    //Recepción del envío txtID.    
    
    if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
        
        //Preparamos la conexion de Editar.
        $sentencia = $conexion->prepare ( "SELECT * FROM tbl_tema WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        
        //Utilizamos el FETCH_LAZY para que cargue solo un registro.
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
            $titulo = $registro["titulo"]; 
            $subtitulo = $registro["subtitulo"]; 
            $archivo = $registro["archivo"]; 
            
            $nivel_id = $registro["nivel_id"];
            
        
        //Preparamos la sentencia de $conexion y ejecutamos, seguido creamos una lista_tbl_rol, que las filas se devuelvan como un array asociativo.
        $sentencia = $conexion->prepare("SELECT * FROM `tbl_nivel`");
        $sentencia->execute();
        $lista_tbl_nivel = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    if ($_POST){
        print_r($_POST);
        
        //Verificamos si existe una peticion $_POST, validamos si ese if isset sucedio, lo vamos igualar a ese valor, de lo contrario no sucedio
        //Lo verificamos a este valor $_POST["usuario"] lo comparamos con la llave de pregunta (?) $_POST["usuario"] si sucedio, de lo contrario va a quedar vacío.
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
        
        $titulo = (isset($_POST["titulo"])) ? $_POST["titulo"]: "";
        $subtitulo = (isset($_POST["subtitulo"])) ? $_POST["subtitulo"]: "";
        $archivo = (isset($_POST["archivo"])) ? $_POST["archivo"]: "";
        
        $nivel_id = (isset($_POST["nivel_id"])) ? $_POST["nivel_id"]: "";
            
        //Preparamos la insercción de los datos.
        $sentencia = $conexion->prepare("
        UPDATE tbl_tema
        SET
            titulo=:titulo,
            subtitulo=:subtitulo,
            archivo=:archivo,
            nivel_id=:nivel_id
        WHERE id=:id ");
        
        //Asignando los valores que vienen del  método POST (Los que vienen del formulario).
        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":subtitulo",$subtitulo);
        $sentencia->bindParam(":archivo",$archivo);
        
        
        $sentencia->bindParam(":nivel_id",$nivel_id);
        
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        //Mensaje de Registro Actualizado (Sweet alert).
        $mensaje="Registro Actualizado";
        header("Location:index.php?mensaje=".$mensaje);
    }
?>
<?php include("../templates_doc/header_doc.php");?>
<!--Estilo para Datos Personales-->
    <style> 
        h1 {
            text-align: center; font-family: Georgia, sans-serif;
        }
    </style>
        <h1>Materiales</h1> 
        <div class="card mx-auto" style="max-width: 900px;">
            <div class="card-header" style="background-color:bisque">Ingrese los datos para Actualizar</div>
            <div class="card-body">
                
            <!--Formulario para cargar los datos, con style de color-->   
                <form  action="" method="post" enctype="multipart/form-data" style="background-color:azure">
                    <div class="mb-3">
                        <label for="txtID" class="form-label">ID:</label>
                        <!--En este input se encuentra el readonly es que un atributo de lectura solamente, el usuario no puede modificar el valor-->
                        <input type="text" 
                            value= "<?php echo $txtID; ?>"
                            class="form-control w-auto" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />    
                    </div>        
                    <div class="mb-3">
                        <label for="titulo" class="form-label"><u>titulo:</u></label>
                        <input type="text" 
                            value= "<?php echo $titulo; ?>"
                            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Ingrese titulo"/>
                    </div>
                    <div class="mb-3"> 
                        <label for="subtitulo" class="form-label"><u>subtitulo:</u></label>
                        <input type="text" 
                            value= "<?php echo $subtitulo; ?>"
                            class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Ingrese subtitulo"/>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label"><u>archivo:</u></label>
                        <input type="number" 
                            value= "<?php echo $archivo; ?>"
                            class="form-control w-auto" name="archivo" id="archivo" aria-describedby="helpId" placeholder="Ingrese archivo"/>            
                    </div>
                    <div class="mb-3">
                        <label for="nivel_id" class="form-label"><u>Nivel:</u></label>
                            <select
                                class="form-select w-auto form-select-ms" name="nivel_id" id="nivel_id">
                                <?php foreach ($lista_tbl_nivel as $registro) {?>      
                                    <option <?php echo ($nivel_id== $registro['id'])? "selected" : ""; ?> value ="<?php echo $registro['id']?>">
                                                                                                                <?php echo $registro['nombre_nivel']?>
                                    </option>
                                <?php }?>
                            </select>
                    </div>

                    <!--Button bs5-button-default y bs5-button-a (sirve para direccionar) -->
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a name="" id="" class="btn btn-primary" href="index.php" role="button" >Cancelar</a>
                </form>
            </div>
        </div>
        <?php include("../templates_doc/footer_doc.php"); ?>
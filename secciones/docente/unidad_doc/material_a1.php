<?php 
    session_start();
    include("../../../bd.php");
    
    if (isset($_GET['txtID'])) {
        // Verificamos si está presente en la URL txtID, asignamos el valor en $_GET['txtID']
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        
        // Preparamos la consulta para obtener el nombre del archivo antes de eliminarlo
        $sentencia = $conexion->prepare("SELECT archivo FROM tbl_material WHERE id = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $material = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        // Si se encontró el archivo, lo eliminamos del sistema de archivos
        if ($material) {
            $archivo = $material['archivo'];
            $rutaArchivo = "../unidad_doc/img_temp/" . $archivo;
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo); // Elimina el archivo físicamente
            }
        }
    
        // Preparamos la conexión de borrado en la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_material WHERE id=:id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        
        // Mensaje de Registro Eliminado
        $mensaje = "Registro Eliminado";
        header("Location: index.php?mensaje=" . $mensaje);
        exit();
    }
    if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        //Preparamos la conexion de Borrado.
        $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        }
    // Consulta para obtener los archivos disponibles
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_material`");
    $sentencia->execute();
    $lista_tbl_material = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include("../templates_doc/header_doc.php");?>
<br><br>
    <link rel="stylesheet" href="../../../css/styles_material.css">
    <link rel="stylesheet" href="../../../css/styles_checkbox.css">
    <!-- <link rel="stylesheet" href="../../../css/styles_index.css"> -->
        <body>
            <!-- Tabla para mostrar archivos subidos -->
            <div class="unidad">
                <!-- <div class="text-center">
                    <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                        <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                    </a>
                </div> -->
                <h1>Materiales disponibles</h1>
                <div class="card-header" style="background-color:bisque">   
                    <!-- </div>  -->
                    <style> input  { text-align: center;/*  font-family: Georgia, sans-serif; */ } </style>
                    
                    <!-- Para tener en cuenta a la hora de subir material a la plataforma -->
                    <!-- <div class="mb-3">
                        <label for="unidad_1" class="form-label"><u>Unidad</u></label>
                        <input type="text" class="form-control w-auto " name="unidad_1" id="unidad_1"  placeholder=" Grammar"/> 
                    </div> -->
                    
                    <table><br>
                    <!-- Seccion Nº-1 -->
                        <details id="section1"><br>
                            <summary><h2>Hello! 
                                        <label class="switch">
                                            <input type="checkbox" id="enableSection1" onclick="toggleSection('section1', 'enableSection1')">
                                            <span class="slider round"></span>
                                        </label>
                                    </h2>
                            </summary>
                            <details id="grammarSection"><br>
                                <summary>
                                        <h2>Grammar 
                                            <label class="switch">
                                                <input type="checkbox" id="enableGrammar" onclick="toggleSection('grammarSection', 'enableGrammar')" disabled>
                                                <span class="slider round"></span>
                                            </label>
                                        </h2>
                                </summary>
                                
                                <ul>
                                        <li><h3>-Possessive adjectives-</h3>
                                            <br>
                                                <h5>Material Predeterminado</h5>
                                        <!-- <div class="mb-3">
                                            <label for="" class="form-label">Material Predeterminado</label>
                                            <input type="text"class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                                            <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div> -->
                                        
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                            <br>
                                            <br>   
                                        </li><li><h3>-verb to be-</h3></li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Material Predeterminado</label>
                                                    <!-- <input type="text"class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/> -->
                                                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                                </div>
                                                <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                    <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                </a>
                                        <li><h3>-this / that / these / those-</h3></li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Material Predeterminado</label>
                                                    <input type="text"class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                                                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                                </div>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-singular / plural nouns-</h3></li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Material Predeterminado</label>
                                                    <input type="text"class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                                                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                                                </div>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Countries and nationalities</h3> </li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Favourite things</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details> 
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Greetings</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details><br>
                        </details>
                    
                    <!-- Seccion Nº-2 -->
                        <details><br>
                        <summary><h2>People</h2></summary>
                            <details><br>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Possessive 's:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Have got:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Objects:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Family:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Appearence adjective:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Describing people:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Skills: Cool People:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Study Skill: Reading:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <br>        
                        </details>
                    
                    <!-- Seccion Nº-3 -->
                        <details><br>
                        <summary><h2>Homes</h2></summary>
                            <details><br>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-There is / there are + some / any:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Prepositions of place:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Imperatives:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                                    
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Forniture:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Rooms:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Giving instructions:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Culture: Homes</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Project: My Home</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>      
                            <br>
                        </details>
                        
                    <!-- Seccion Nº-4 -->
                        <details><br>
                        <summary><h2>Animals</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Can /Can't (ability):</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Anilmals:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Body parts:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Action verbs:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Asking for and giving permission:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Skill: Water Wonders</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Study Skill: Listening</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details> 
                        </details>
                            
                    <!-- Seccion Nº-5 -->
                        <details><br>
                        <summary><h2>My Life</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Present Simple:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Affirmative, Negative, Questions:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Routine verbs:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Transport:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Telling the time:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover culture: UK Meals</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Project: My Meals</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details> 
                        </details>

                    <!-- Seccion Nº-6 -->
                            <details><br>
                            <summary><h2>Sport</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Question words:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Like / Love / Hate + -ing:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Object pronoums; in /on /at</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Sports:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Seasons and times of day:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Making suggestions:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Skills: Holiday Fun!</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Study Skill: Speaking</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>

                    <!-- Seccion Nº-7 -->
                        <details><br>
                        <summary><h2>Detectives</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Present Continuos:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Affirmative, Negative, Questions:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Clothes:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Pleace in town:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Giving directions:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Culture: Spies and Detectives!</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Project: A Famous Spy</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>

                    <!-- Seccion Nº-8 -->
                        <details><br>
                        <summary><h2>Celebrations</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Frecuency adverbs:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Present Simple and Present Continuous:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Dates:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-The weather:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Talking about the weather:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Skills: Festivals</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Study Skill: Writng</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>

                    <!-- Seccion Nº-9 -->
                        <details><br>
                        <summary><h2>School</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Was / Were:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Past Simple regular:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Affirmative, Negative, Questions:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-School Subjects:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Feelings:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Time Expressions:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Talking about feelings:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Culture: School</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Project: My School</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>

                    <!-- Seccion Nº-10 -->
                        <details><br>
                        <summary><h2>Entertainment</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Past Simple irregular:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Affirmative, Negative, Questions:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Sequencers:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Entertainment:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Opinion adjectives:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Ordering events:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Skills: Star Report</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Study Skill: Remembering Words</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>

                    <!-- Seccion Nº-11 -->
                        <details><br>
                        <summary><h2>Adventure</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                    <ul>
                                        <li><h3>-Revision of tenses:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Want to:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                    <ul>
                                        <li><h3>-Places and activities:</h3></li>  
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Camping Equipment:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                    <ul>
                                        <li><h3>-Expressing Preferences:</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </ul>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                    <ul>
                                        <li><h3>-Discover Culture: Captain Cook</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        <li><h3>-Project: Explorers</h3></li>
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                    </ul>
                            </details>    
                        </details>
                    
                    </table>
                </div>
            </div>
        </body>
        <br>
        <div class="text-center">
            <a name="" id="" class="btn btn-info" href="index.php" role="button">
                <img src="../../../css/imagen_tesis/icons/atras.png" style="width: 30px; height: 30px; vertical-align: middle;">
            </a>
        </div>
       <!--  <script>
        function toggleSection(sectionId, toggleId) {
        const section = document.getElementById(sectionId);
        const toggle = document.getElementById(toggleId);

        if (sectionId === 'section1') {
            // Cuando se habilita/deshabilita la sección principal ("Hello")
            const grammarToggle = document.getElementById('enableGrammar');
            if (toggle.checked) {
            section.open = true; // Abre la sección
            grammarToggle.disabled = false; // Habilita el switch de "Grammar"
            } else {
            section.open = false; // Cierra la sección
            grammarToggle.disabled = true; // Deshabilita el switch de "Grammar"
            document.getElementById('grammarSection').open = false; // Asegura que "Grammar" también se cierre
            }
        } else {
            // Habilitación/deshabilitación de subsecciones (como "Grammar")
            if (toggle.checked) {
            section.open = true; // Abre la subsección
            } else {
            section.open = false; // Cierra la subsección
            }
        }
        }
    </script> -->
<?php include("../templates_doc/footer_doc.php"); ?>

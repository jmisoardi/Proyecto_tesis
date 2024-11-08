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
    <link rel="stylesheet" href="../../../css/styles_material_vista.css">
    <link rel="stylesheet" href="../../../css/styles_checkbox.css">
        <body>
            <!-- Tabla para mostrar archivos subidos -->
            <div class="unidad">
                
                <h1>Materiales disponibles</h1>
                <div class="card-header" style="background-color:bisque">   
                    <!-- </div>  -->
                    <!-- <style> input  { text-align: center;/*  font-family: Georgia, sans-serif; */ } </style> -->
                    <table><br>
                    
                    <!-- Seccion Nº-1 -->
                        <details id="section1"><br>
                            <summary><h2>Hello!</h2></summary>
                            
                        <details id="grammarSection"><br>
                            <summary><h2>Grammar </h2></summary>
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>-Possessive adjectives-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-verb to be-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-this / that / these / those-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-singular / plural nouns-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>                                   
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>-Countries and nationalities</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-Favourite things-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>                                   
                                </dl>
                            </details> 
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>-Greetings</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                        </details>
                    <!-- Seccion Nº-2 -->
                        <details><br>
                        <summary><h2>People</h2></summary>
                            <details><br>
                                <summary><h2>Grammar</h2></summary>    
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>-Possessive 's:</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-Have got:</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                        </details>
                        <details>
                                    <summary><h2>Vocabulary</h2></summary>
                                    <dl class="dictionary">
                                        <div class="term">
                                            <dt>
                                                <span>-Objects-</span><br><br>Elementary
                                                <br>
                                                <br>
                                                <!-- Revisar el href "es bajar material" -->
                                                <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                    <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                </a>
                                            </dt>
                                        </div>
                                        <div class="term">
                                            <dt>
                                                <span>-Family-</span><br><br>Elementary
                                                <br>
                                                <br>
                                                <!-- Revisar el href "es bajar material" -->
                                                <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                    <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                </a>
                                            </dt>
                                        </div>
                                        <div class="term">
                                            <dt>
                                                <span>-Appearence adjective-</span><br><br>Elementary
                                                <br>
                                                <br>
                                                <!-- Revisar el href "es bajar material" -->
                                                <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                    <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                </a>
                                            </dt>
                                        </div>
                                    </dl>
                                </details>        
                                <details>
                                    <summary><h2>Funtions</h2></summary>
                                    <dl class="dictionary">
                                        <div class="term">
                                            <dt>
                                                <span>-Describing people-</span><br><br>Elementary
                                                <br>
                                                <br>
                                                <!-- Revisar el href "es bajar material" -->
                                                <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                    <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                </a>
                                            </dt>
                                        </div>
                                    </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>-Discover Skills: Cool People:-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>-Describing people-</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>       
                        </details>
                        <br>        
                        </details>
                    
                    <!-- Seccion Nº-3 -->
                        <details><br>
                        <summary><h2>Homes</h2></summary>
                            <details><br>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>There is / there are + some / any</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>Prepositions of place</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>                                   
                                    <div class="term">
                                        <dt>
                                            <span>Imperatives</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>                                   
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>                                    
                                <dl class="dictionary">
                                    <div class="term">
                                        <dt>
                                            <span>Forniture</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>    
                                    </div>
                                    <div class="term">
                                        <dt>
                                            <span>Rooms</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary">
                                    <div class="term" >
                                        <dt>
                                        <span>Giving instructions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary">
                                    <div class="term" >
                                        <dt>
                                        <span>Discover Culture: Homes</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                        <span>Project: My Home</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>      
                            <br>
                        </details>
                        
                    <!-- Seccion Nº-4 -->
                        <details><br>
                        <summary><h2>Animals</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary">
                                    <div class="term" >
                                        <dt>
                                        <span>Can /Can't (ability)</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary">
                                    <div class="term" >
                                        <dt>
                                        <span>Anilmals</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                        <span>Body parts</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                        <span>Action verbs</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Asking for and giving permission</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Skill: Water Wonders</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Study Skill: Listening</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                            </details> 
                        </details>
                            
                    <!-- Seccion Nº-5 -->
                        <details><br>
                        <summary><h2>My Life</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Present Simple</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Affirmative, Negative, Questions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Routine verbs</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Transport</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Telling the time</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover culture: UK Meals</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Project: My Meals</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details> 
                        </details>

                    <!-- Seccion Nº-6 -->
                            <details><br>
                            <summary><h2>Sport</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Question words</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Like / Love / Hate + -ing</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Object pronoums; in /on /at</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Sports</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Seasons and times of day</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Making suggestions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Skills: Holiday Fun!</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                            </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Study Skill: Speaking</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>    
                        </details>

                    <!-- Seccion Nº-7 -->
                        <details><br>
                        <summary><h2>Detectives</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Present Continuos</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Affirmative, Negative, Questions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Clothes</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Pleace in town</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Giving directions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Culture: Spies and Detectives!</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Project: A Famous Spy</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>    
                        </details>

                    <!-- Seccion Nº-8 -->
                        <details><br>
                        <summary><h2>Celebrations</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Frecuency adverbs</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Present Simple and Present Continuous</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Dates</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>The weather</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Talking about the weather</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Skills: Festivals</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Study Skill: Writng</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>    
                        </details>

                    <!-- Seccion Nº-9 -->
                        <details><br>
                        <summary><h2>School</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Was / Were</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Past Simple regular</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Affirmative, Negative, Questions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>School Subjects</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Feelings</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Time Expressions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Talking about feelings</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Culture: School</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Project: My School</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                            </details>    
                        </details>

                    <!-- Seccion Nº-10 -->
                        <details><br>
                        <summary><h2>Entertainment</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Past Simple irregular</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Affirmative, Negative, Questions</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Sequencers</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Entertainment</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Opinion adjectives</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Ordering events</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Skills: Star Report</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Study Skill: Remembering Words</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>
                            </details>    
                        </details>

                    <!-- Seccion Nº-11 -->
                        <details><br>
                        <summary><h2>Adventure</h2></summary>
                            <details>
                                <summary><h2>Grammar</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Revision of tenses</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Want to</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>    
                            </details>
                            <details>
                                <summary><h2>Vocabulary</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Places and activities</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Camping Equipment</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>        
                            </details>        
                            <details>
                                <summary><h2>Funtions</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Expressing Preferences</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>        
                            </details>        
                            <details>
                                <summary><h2>Skills</h2></summary>
                                <dl class="dictionary" >
                                    <div class="term" >
                                        <dt>
                                            <span>Discover Culture: Captain Cook</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                    <div class="term" >
                                        <dt>
                                            <span>Project: Explorers</span><br><br>Elementary
                                            <br>
                                            <br>
                                            <!-- Revisar el href "es bajar material" -->
                                            <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                <img src="../../../css/imagen_tesis/icons/pdf_bajar1.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                            </a>
                                        </dt>
                                    </div>
                                </dl>        
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

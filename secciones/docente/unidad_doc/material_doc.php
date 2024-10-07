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
                <!-- <style> h2 { text-align: center; font-family: Georgia, sans-serif; } </style> -->
                
                <!-- Para tener en cuenta a la hora de subir material a la plataforma -->
                <!-- <div class="mb-3">
                    <label for="unidad_1" class="form-label"><u>Unidad</u></label>
                    <input type="text" class="form-control w-auto " name="unidad_1" id="unidad_1"  placeholder=" Grammar"/> 
                </div> -->
                
                <table>
                    <details><br>
                        <summary><h2>Hello!</h2></summary>
                        <details><br>
                            <summary><h2>Grammar</h2>
                            </summary>
                            <ul>
                                <li>-Possessive adjectives:</li>  <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                                                                        <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                                                    </a>
                                                                   
                                                                
                                <li>-verb to be:</li>
                                <li>-this / that / these / those:</li>
                                <li>singular / plural nouns:</li>
                            </ul>
                        </details>
                        <details>
                            <summary><h2>Vocabulary</h2></summary>
                                <ul>
                                    <li>-Countries and nationalities</li>
                                    <li>-Favourite things</li>
                                    <!-- <li>Exercises</li> -->
                                </ul>
                        </details> 
                        <details>
                            <summary><h2>Funtions</h2></summary>
                                <ul>
                                    <li>-Greetings</li>
                                    <li></li>
                                    <!-- <li>Exercises</li> -->
                                </ul>
                        </details>
                    </details>
                    <details><br>
                        <summary><h2>People</h2></summary>
                        <details><br>
                            <summary><h2> </label> </h2></summary>
                            <ul>
                                <li>-Possessive 's:</li>
                                <li>-Have got:</li>
                            </ul>
                        </details>
                        <details>
                            <summary><h2>Vocabulary</h2></summary>
                                <ul>
                                    <li>-Objects</li>
                                    <li>-Family</li>
                                    <li>-Appearence adjective</li>
                                </ul>
                        </details>        
                        <details>
                            <summary><h2>Funtions</h2></summary>
                                <ul>
                                    <li>-Describing people</li>
                                    <li></li>
                                    <!-- <li>Exercises</li> -->
                                </ul>
                        </details>        
                        <details>
                            <summary><h2>Skills</h2></summary>
                                <ul>
                                    <li>-Discover Skills: Cool People</li>
                                    <li>-Study Skill: Reading</li>
                                    <!-- <li>Exercises</li> -->
                                </ul>
                        </details>        
                        <details>
                            <summary><h2>Revision</h2></summary>
                                <ul>
                                    <li>-Let´s Revise!</li>
                                    <li>-Promunciation: /h/</li>
                                    <!-- <li>Exercises</li> -->
                                </ul>
                        </details>        
                    </details>
                    
                    <!-- <details>
                        <summary><h1>People</h1></summary>
                        <details>
                            <summary><h2>Grammar</h2></summary>
                            <ul>
                                <li>Possessive adjectives; to be, this / that / these / those, singular / plural nouns</li>
                                <li>Topic 2</li>
                                <li>Topic 3</li>
                            </ul>
                            <details>
                                <summary><h4>Possessive adjectives</h4></summary>
                                <ul>
                                    <li>Definition</li>
                                    <li>Examples</li>
                                    <li>Exercises</li>
                                </ul>
                            </details>
                        </details>
                    </details> -->
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

<!-- <br><br> -->
<?php include("../templates_doc/footer_doc.php"); ?>

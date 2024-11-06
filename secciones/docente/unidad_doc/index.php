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
    /*  if (isset($_GET['txtID'])) {
        //Verificamos si está presente en la URL txtID, asignamos el valor en  $_GET['txtID'] de lo contrario no se asigna ningún valor con :"" .
        $txtID = (isset ($_GET['txtID'])) ? $_GET['txtID'] :"";
        //Preparamos la conexion de Borrado.
        $sentencia = $conexion->prepare ( "DELETE FROM tbl_material WHERE id=:id" );
        $sentencia->bindParam( ":id" ,$txtID );
        $sentencia->execute();
        //Mensaje de Registro Eliminado (Sweet alert).
        $mensaje="Registro Eliminado";
        header("Location:index.php?mensaje=".$mensaje);
        } */
    // Consulta para obtener los archivos disponibles
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_material`");
    $sentencia->execute();
    $lista_tbl_material = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("../templates_doc/header_doc.php");?>
<link rel="stylesheet" href="../../../css/styles_index.css">
    <!-- <link rel="stylesheet" href="../../../css/styles_material.css"> -->
        <body>
            <!-- Tabla para mostrar archivos subidos -->
            <div class="unidad">
                <h3>Contents</h3>
                <div class="text-center">
                    <!-- <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                        <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                    </a> -->
                </div>
                <!-- <h2>Contenidos</h2> -->
                <!-- <br> -->
                <div class="card-header" style="background-color:bisque">   
                    <h1>
                        <span></span><br>Contenidos esenciales para cada nivel de Inglés.
                    </h1>
                    
                    <dl class="dictionary">
                        
                        <div class="term">
                            <dt>
                                <span>A0-A1</span><br><br>Elementary
                            </dt>
                            <dd>En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_a1.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                        
                        <div class="term">
                            <dt>
                                <span>A2</span><br><br>Pre-Intermediate
                            </dt>
                            <dd>En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_a2.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                        
                        <div class="term">
                            <dt>
                                <span>B1</span><br><br>Intermediate
                            </dt>
                            <dd> En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_b1.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                        
                        <div class="term">
                            <dt>
                                <span>B2</span><br><br>Upper Intermediate
                            </dt>
                            <dd>En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_b2.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                        
                        <div class="term">
                            <dt>
                                <span>C1</span><br><br>Advanced
                            </dt>
                            <dd>En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_c1.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                        
                        <div class="term">
                            <dt>
                                <span>C2</span><br><br>Proficient
                            </dt>
                            <dd>En este nivel, los estudiantes aprenderán cómo presentarse a sí mismos y a otras personas. Además, los estudiantes serán capaces de utilizar expresiones cotidianas y frases para necesidades inmediatas, así como también, preguntas y responder sobre información personal.</dd>
                            <div class="text-center">
                                <a name="" id="" class="btn btn-info" href="material_c2.php" role="button">
                                    <img src="../../../css/imagen_tesis/icons/ver.png" style="width: 30px; height: 30px; vertical-align: middle;">
                                </a>
                            </div>
                        </div>
                            
                        <!-- <div class="term">
                            <dt>
                            <span>Sajaegi</span> 사재기 sah·jeh·kee
                            </dt>
                            <dd>A method of manipulating chart rankings by a group’s own agency bulk-buying their albums. Literally “<a href="http://endic.naver.com/krenEntry.nhn?sLn=en&entryId=2ea42459322a44e1889ea0480713178b&query=%EC%82%AC%EC%9E%AC%EA%B8%B0">stockpiling</a>”
                        </div>
                        
                        <div class="term">
                            <dt>
                            <span>Sasaeng</span> 사생 sah·seng
                            </dt>
                            <dd>Stalker fan, <em>not</em> in a cute “stan” way. 사 sah “<a href="http://endic.naver.com/enkrEntry.nhn?sLn=en&entryId=5d76e60c545b419798d447c5ca6e7d01&query=private">private</a>” 생 saeng “<a href="http://endic.naver.com/krenEntry.nhn?sLn=en&entryId=3c483a1f3deb495b877ad48835482e29&query=%EC%83%9D">life</a>” — referencing the fan’s invasion of an idol’s private life
                        </div>
                        
                        <div class="term">
                            <dt>
                            <span>Sub-unit</span>
                            </dt>
                            <dd>A smaller group within a larger group. Sub-units have their own name and concept, typically exploring a different genre than the main group focuses on</dd>
                        </div> -->
                    </dl>
                </div>
            </div> 
        </body>
<br>
<?php include("../templates_doc/footer_doc.php"); ?>

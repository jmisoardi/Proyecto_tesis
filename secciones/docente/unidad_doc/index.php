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
                <div class="text-center">
                    <a name="" id="" class="btn btn-info" href="subir_m.php" role="button">
                        <img src="../../../css/imagen_tesis/icons/pdf_subir.png" style="width: 30px; height: 30px; vertical-align: middle;">
                    </a>
                </div>
                <h2>Materiales disponibles</h2>
                <div class="card-header" style="background-color:bisque">   
                <!-- </div>  -->
                    
                <!-- </div> -->
                <h1>
                    <span>K-pop fandom dictionary</span>
                </h1>

                <dl class="dictionary">
                    
                    <div class="term">
                        <dt>
                            <span>Daesang</span> 대상 deh·sahng
                        </dt>
                        
                    </div>
                    
                    <div class="term">
                        <dt>
                            <span>I-Fan</spna>
                        </dt>
                        <dd>International fan. A kpop fan who doesn’t live in Korea. Kpop fans are all over the world, so don’t assume all non-Korean fans are Western/American fans!</dd>
                    </div>
                    
                    <div class="term">
                        <dt>
                        <span>_____-line</span>
                        </dt>
                        <dd>The term for grouping idols — think of it as the Western slang equivalent of "squad" or "crew". You’ll usually see this referred to as [year of birth]-line, [position]-line, etc.</dd>
                    </div>
                    
                    <div class="term">
                        <dt>
                        <span>Netizen/knetz</spna>
                        </dt>
                        <dd>Portmanteau for “internet citizen.” Korean netizens are notoriously toxic in their critiques of idols (especially appearance) and blowing scandals out of proportion</dd>
                    </div>
                    
                    <div class="term">
                        <dt>
                        <span>Point choreography</span>
                        </dt>
                        <dd>The point dance or point choreography is the key memorable move of a song’s choreography, often featured in the chorus or bridge
                    </div>
                    
                    <div class="term">
                        <dt>
                        <span>Project group</span>
                        </dt>
                        <dd>
                        A temporary group, ususally formed from a survival TV show (such as PD101 or The Unit) or made of idols from other groups (such as Cosmic Girls and Weki Meki forming WJMK)</dd>
                    </div>
                        
                    <div class="term">
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
                    </div>
                </dl>
            </div>
            <!-- </div>  -->
        </body>
<br>
<?php include("../templates_doc/footer_doc.php"); ?>

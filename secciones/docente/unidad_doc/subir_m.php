<?php
    include("../../../bd.php");
    include("../templates_doc/header_doc.php");

    $url_base = "http://localhost/Proyecto_tesis/";

    if (!isset($_SESSION['usuario'])) {
        header("Location: " . $url_base . "login.php");
        exit();
    }
?>



<?php include("../templates_doc/footer_doc.php"); ?>

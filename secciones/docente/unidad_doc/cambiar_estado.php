<?php
include("../../../bd.php");

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'] ?? null;
    $habilitado = $data['habilitado'] ?? null;

    if ($id !== null && $habilitado !== null) {
        $sentencia = $conexion->prepare("UPDATE tbl_tema SET habilitado = :habilitado WHERE id = :id");
        $sentencia->bindParam(":habilitado", $habilitado, PDO::PARAM_INT);
        $sentencia->bindParam(":id", $id, PDO::PARAM_INT);

        if ($sentencia->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el estado']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
exit;
?>

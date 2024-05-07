<?php
require_once '../database/database.php';

if(isset($_GET['val_id'])) {
    $val_id = $_GET['val_id'];
   

    $result = mysqli_query($conn, "DELETE FROM VALORACIÓN WHERE val_id = $val_id");

    if($result) {

        $response = array('status' => 'success');
    } else {

        $response = array('status' => 'error', 'message' => 'Error al eliminar la valoración');
    }
} else {

    $response = array('status' => 'error', 'message' => 'Se requiere el parámetro val_id');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
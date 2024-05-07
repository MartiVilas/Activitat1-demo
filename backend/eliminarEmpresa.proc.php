<?php
require_once '../database/database.php';


if(isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];

    $result = mysqli_query($conn, "DELETE FROM EMPRESA WHERE emp_id = $emp_id");

    if($result) {

        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al eliminar la empresa');
    }
} else {

    $response = array('status' => 'error', 'message' => 'Se requiere el parámetro emp_id');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
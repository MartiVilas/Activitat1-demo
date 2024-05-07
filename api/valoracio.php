<?php
require_once '../database/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['emp_id'])) {
    $result = mysqli_query($conn, "SELECT * FROM valoracio ORDER BY val_data DESC");
    $valoraciones = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $valoraciones[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($valoraciones);
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_id']) ) {
    $id = $_GET['emp_id'];
    $result = mysqli_query($conn, "SELECT * FROM valoracio WHERE emp_id=$id ORDER BY val_data DESC");
    $valoraciones = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $valoraciones[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($valoraciones);
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['emp_id']) && $_GET['option'] == 'average') {
    $id = $_GET['emp_id'];
    $result = mysqli_query($conn, "SELECT AVG(val_puntuacio) AS avg_puntuacio FROM valoracio WHERE emp_id=$id");
    $row = mysqli_fetch_assoc($result);
    $average = $row['avg_puntuacio'];
    $response = array('average' => $average);
    header('Content-Type: application/json');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['emp_id'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    $emp_id = $_GET['emp_id'];
    $usu_mail = $data['usu_mail'];
    $val_puntuacio = $data['val_puntuacio'];
    $val_comentari = $data['val_comentari'];

    $result = mysqli_query($conn, "INSERT INTO valoracio (emp_id, usu_mail, val_puntuacio, val_comentari) VALUES ('$emp_id', '$usu_mail', '$val_puntuacio', '$val_comentari')");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['val_id'])) {
    $id = $_GET['val_id'];
    $result = mysqli_query($conn, "DELETE FROM valoracio WHERE val_id=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
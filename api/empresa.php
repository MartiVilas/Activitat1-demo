<?php
require_once '../database/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['max'])) {
    $result = mysqli_query($conn, "SELECT * FROM empresa ORDER BY emp_nom ASC");
    $empresas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $empresas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($empresas);
}


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['max'])) {
    $max = $_GET['max'];
    $result = mysqli_query($conn, "SELECT empresa.*, AVG(valoracio.val_puntuacio) AS avg_puntuacio FROM empresa LEFT JOIN valoracio ON empresa.emp_id = valoracio.emp_id GROUP BY empresa.emp_id ORDER BY avg_puntuacio DESC LIMIT $max");
    $empresas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $empresas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($empresas);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nom = $data['emp_nom'];
    $ubicacio = $data['emp_ubicacio'];
    $sector = $data['emp_sector'];
    $descripcio = $data['emp_descripcio'];
    $result = mysqli_query($conn, "INSERT INTO empresa (emp_nom, emp_ubicacio, emp_sector, emp_descripcio) VALUES ('$nom', '$ubicacio', '$sector', '$descripcio')");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nom = $data['emp_nom'];
    $ubicacio = $data['emp_ubicacio'];
    $sector = $data['emp_sector'];
    $descripcio = $data['emp_descripcio'];
    $result = mysqli_query($conn, "UPDATE empresa SET emp_nom='$nom', emp_ubicacio='$ubicacio', emp_sector='$sector', emp_descripcio='$descripcio' WHERE emp_id=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];

    mysqli_query($conn, "DELETE FROM valoracio WHERE emp_id=$id");

    $result = mysqli_query($conn, "DELETE FROM empresa WHERE emp_id=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
<?php
include_once __DIR__ . '/database.php';

$data = array(
    'status'  => 'Error',
    'message' => 'La consulta falló'
);

if(isset($_POST['region_id'])){
    $id = $_POST['region_id'];

    $sql = "SELECT * FROM region where id = {$id} AND eliminado=0";

    if($result = $conexion->query($sql)){
        $rows = $result->fetch_array(MYSQLI_ASSOC);

        if (!is_null($rows)) {
            foreach ($rows as $key => $value) {
                $data[$key] = utf8_encode($value);
            }
        }
        $result->free();
        $data['status'] = 'OK';
        $data['message'] = 'Query hecho!';
    }
    $conexion->close();

    echo json_encode($data, JSON_PRETTY_PRINT);
}
if(isset($_POST['genero_id'])){
    $id = $_POST['genero_id'];

    $sql = "SELECT * FROM genero where id = {$id} AND eliminado=0";

    if($result = $conexion->query($sql)){
        $rows = $result->fetch_array(MYSQLI_ASSOC);

        if (!is_null($rows)) {
            foreach ($rows as $key => $value) {
                $data[$key] = $value;
            }
        }
        $result->free();
        $data['status'] = 'OK';
        $data['message'] = 'Query hecho!';
    }
    $conexion->close();

    echo json_encode($data, JSON_PRETTY_PRINT);
}
if(isset($_POST['classi_id'])){
    $id = $_POST['classi_id'];

    $sql = "SELECT * FROM clasificacion where id = {$id} AND eliminado=0";

    if($result = $conexion->query($sql)){
        $rows = $result->fetch_array(MYSQLI_ASSOC);

        if (!is_null($rows)) {
            foreach ($rows as $key => $value) {
                $data[$key] = utf8_encode($value);
            }
        }
        $result->free();
        $data['status'] = 'OK';
        $data['message'] = 'Query hecho!';
    }
    $conexion->close();

    echo json_encode($data, JSON_PRETTY_PRINT);
}

?>
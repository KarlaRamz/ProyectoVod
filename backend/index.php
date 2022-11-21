<?php
include_once __DIR__ . "/database.php";

$data = array(
    'status'  => 'Error',
    'message' => 'La consulta falló'
);

if(isset($_POST['serie_id'])){
    $id = $_POST['serie_id'];

    $sql = "SELECT * FROM serie where id = {$id} AND eliminado=0";

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

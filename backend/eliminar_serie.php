<?php

include_once __DIR__."/database.php";


//Se crea el arreglo en forma de json que se regresara al cliente
$data = array(
    'status'  => 'Error',
    'message' => 'La consulta falló'
);


//Si esta definido el id de la serie
if( isset($_POST['id']) ) {
    $serie_id = $_POST['id'];

    //Se realiza la query de busqueda y al mismo tiempo se valida si hubo resultados
    $sql = "UPDATE Serie SET eliminado = '1' WHERE id = {$serie_id}";
    if ( $conexion->query($sql) ) {
        $data['status'] =  "success";
        $data['message'] =  "La serie se eliminó correctamente";
    } else {
        $data['message'] = "No se puedo eliminar la serie. ERROR: $sql. " . mysqli_error($conexion);
    }
    $conexion->close();
} 

//Se hace la conversion de array a JSON
echo json_encode($data, JSON_PRETTY_PRINT);
//

?>
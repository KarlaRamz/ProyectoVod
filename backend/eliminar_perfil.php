<?php

include_once __DIR__."/database.php";


//Se crea el arreglo en forma de json que se regresara al cliente
$data = array(
    'status'  => 'Error',
    'message' => 'La consulta falló'
);


//Si esta definido el id de la cuenta 
if( isset($_POST['id']) ) {
    $perfil_id = $_POST['id'];
    $cuenta_id = $_POST['cuenta_id'];
    //Se realiza la query de busqueda y al mismo tiempo se valida si hubo resultados
    $sql = "UPDATE perfil SET eliminado=1 WHERE id = {$perfil_id} AND Cuenta_id = {$cuenta_id}";
    if ( $conexion->query($sql) ) {
        $data['status'] =  "success";
        $data['message'] =  "Perfil eliminado";
    } else {
        $data['message'] = "No se puedo eliminar el perfil. ERROR: $sql. " . mysqli_error($conexion);
    }
    $conexion->close();
} 

//Se hace la conversion de array a JSON
echo json_encode($data, JSON_PRETTY_PRINT);
//

?>
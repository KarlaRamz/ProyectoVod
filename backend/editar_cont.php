<?php

include_once __DIR__."/database.php";


//Se crea el arreglo en forma de json que se regresara al cliente
$data = array(
    'status'  => 'Error',
    'message' => 'La consulta falló'
);


//Si esta definido el id de la cuenta 
if( isset($_POST['nombre_perfil']) ) {
    $nombre_perfil = $_POST['nombre_perfil'];
    $idioma_perfil = $_POST['idioma_perfil'];
    $clasificacion_perfil = $_POST['clasificacion_perfil'];
    $edad_perfil = $_POST['edad_perfil'];
    $rutaImagen_perfil = $_POST['rutaImagen_perfil'];
    //Se realiza la query de busqueda y al mismo tiempo se valida si hubo resultados
    
    $sql = "UPDATE `perfil` SET `usuario` = '{$nombre_perfil}', `idioma` = '{$idioma_perfil}', `rutaImagen` = '{$rutaImagen_perfil}' 
    WHERE `perfil`.`id` = 1 AND `perfil`.`Cuenta_id` = 1";
    
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
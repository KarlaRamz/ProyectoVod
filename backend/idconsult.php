<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array(
        'status'  => 'Error',
        'message' => 'La consulta Fallo'
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) 
    { 
        $id = $_POST['id'];
        $sql = "SELECT * from perfil where Cuenta_id = '{$id}' AND eliminado = 0";
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query($sql) ) 
        {
            $rows = $result->fetch_array(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                foreach ($rows as $key => $value) {
                    $data[$key] = utf8_encode($value);
                }
            }
            $result->free();
            $data['status'] = 'OK';
            $data['message'] = 'Query hecho!';
        }//FIN IF
         
		$conexion->close();
    } 
    echo json_encode($data, JSON_PRETTY_PRINT);
?>


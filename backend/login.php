<?php
include_once __DIR__ . "/database.php";

$data = array(
    'status'  => 'Error',
    'message' => 'Login Fallo'
);

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ( $result = $conexion->query("SELECT * FROM cuenta INNER JOIN usuario ON (cuenta.id = usuario.Cuenta_id AND cuenta.correo = '{$email}' and usuario.pass = '{$pass}')")) 
    {
        $rows = $result->fetch_array(MYSQLI_ASSOC);

        if( !is_null($rows) ) 
        {
            $data['status'] = "OK";
            $data['message'] = "LOGIN EXITOSO";
            foreach($rows as $key => $value) {
                $data[$key] = utf8_encode($value);
            }
        }
        $result->free();
    }
    
    $conexion->close();
    echo json_encode($data, JSON_PRETTY_PRINT);
}
else if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ( $result = $conexion->query("SELECT * FROM usuario WHERE (user = '{$user}' AND pass = '{$pass}')")) 
    {
        $rows = $result->fetch_array(MYSQLI_ASSOC);

        if( !is_null($rows) ) 
        {
            $data['status'] = "OK";
            $data['message'] = "LOGIN EXITOSO";
            foreach($rows as $key => $value) {
                $data[$key] = utf8_encode($value);
            }
        }
        $result->free();
    }
    $conexion->close();
    echo json_encode($data, JSON_PRETTY_PRINT);
}

?>
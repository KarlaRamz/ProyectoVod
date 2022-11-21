<?php

use LDAP\Result;

    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array(
        'status'  => 'Error',
        'message' => 'La Insercion Fallo',
    );
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['nombre']) ) 
    { 
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['email'];
        $pais = $_POST['pais'];
        $suscripcion = $_POST['suscripcion'];
        $tarjeta = $_POST['tarjeta'];
        // $datetime = date_create()->format('Y-m-d H:i:s');

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];
        $nivel = 1;
        $eliminado = 0;
        $pago = $_POST['pago'];  
        $date = date('y-m-d');

        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM cuenta WHERE correo = '{$correo}'") ) 
        {
            $resultUser = $conexion->query("SELECT * FROM usuario WHERE user = '{$usuario}'");
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            
            $rowsUser = $resultUser->fetch_all(MYSQLI_ASSOC);
            
            if( (sizeof($rows) > 0 ) || (sizeof($rowsUser) > 0) )  //    $result->num_rows > 0 tambien?
            {
                $data['status'] = "Error";
                $data['message'] = "Ya existe una cuenta con ese correo y/o cuenta";
            } 
            else {
                $sql = "INSERT INTO `cuenta` (`id`, `nombre`, `apellidos`, `correo`, `tipo`, `pais`, `numTarjeta`, `periodicidad`, `fechaCreacion`, `eliminado`) 
                VALUES (NULL, '{$nombre}', '{$apellidos}', '{$correo}', '{$suscripcion}', '{$pais}', '{$tarjeta}', '{$pago}', '{$date}', '0')";
                
                $condicional;

                if($conexion->query($sql))
                {
                    $condicional = true;
                }

                $sqlgetId = $conexion->query("SELECT id FROM cuenta WHERE correo = '{$correo}'");
                $aux;
                $rows = $sqlgetId->fetch_array(MYSQLI_ASSOC);
                foreach($rows as $key => $col) { 
                       $aux[$key] = utf8_encode($col);
                }

                $id_cuenta = $aux["id"];
                $sqluser = "INSERT INTO `usuario` (`id`, `user`, `pass`, `nivel`, `eliminado`, `Cuenta_id` )
                VALUES (NULL, '{$usuario}', '{$contrasena}', '1', '0', '{$id_cuenta}')";
                //$sqluser = "INSERT INTO `usuario` (`id`, `user`, `pass`, `nivel`, `eliminado`, `Cuenta_id` )
                //VALUES (NULL, '{$usuario}', '{$contrasena}', '0', '0', '{$id_cuenta}' ) ";
                $resul = $conexion->query($sqluser);
               
                if( $condicional == true ) 
                {
                    $data['status'] =  "success";
                    $data['message'] =  "Cuenta creada Exitosamente";
                } 
                else { 
                    $data['message'] = "ERROR: No se ejecuto " . $sql . mysqli_error($conexion);
                    
                }
            }//FIN ELSE
        }//FIN IF
         
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
    //echo json_encode($id_cuenta. "fue el id de cuwenta");
    //echo json_encode(sizeof($rows) );
?>
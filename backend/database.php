<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root', //Nombre de Usuario de db
        '', //Contraseña de usuario
        'Videoku' //Nombre de db
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('Error, la db no conectó!');
    }
?>
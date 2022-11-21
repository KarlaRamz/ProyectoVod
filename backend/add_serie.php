<?php
    include_once __DIR__."/database.php";

    $data = array(
        'status'  => 'Error',
        'message' => 'La Insercion Fallo'
    );
    
    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $numTemp = $_POST['numTemporadas'];
        $numCap = $_POST['totalCapitulos'];
        $descripcion = $_POST['descripcion'];
        $rutaPortada = $_POST['rutaPortada'];
        $idioma = $_POST['idioma'];
        $Genero_id = $_POST['Genero_id'];
        $Clasificacion_id = $_POST['Clasificacion_id'];
        $Region_id = $_POST['Region_id'];
    
        $sql = "INSERT INTO Serie VALUES (NULL, '{$titulo}', '{$numTemp}', '{$numCap}', '{$descripcion}', '{$rutaPortada}', '0', '0', '{$idioma}', '{$Genero_id}', '{$Clasificacion_id}', '{$Region_id}' , '0','0')";
        
        if($conexion->query($sql)){
            $data['status'] =  "success";
            $data['message'] =  "La serie se agreg� correctamente";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
        }
    
        // Cierra la conexion
        $conexion->close();
    }

    // echo json_encode($data, JSON_PRETTY_PRINT);
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
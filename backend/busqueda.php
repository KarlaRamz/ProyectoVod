<?php
    include_once __DIR__."/database.php";


    //Se crea el arreglo en forma de json que se regresara al cliente
    $data = array();

    if( isset($_GET['search']) ) {
        $search = $_GET['search'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        $sql = "SELECT s.id, s.titulo, s.rutaPortada, s.descripcion, 'tabla1' FROM Serie as s WHERE s.titulo LIKE '%{$search}%' OR s.descripcion LIKE '%{$search}%' AND eliminado = 0 UNION SELECT p.id, p.titulo, p.rutaPortada, p.descripcion, 'tabla2' FROM Pelicula as p WHERE p.titulo LIKE '%{$search}%' OR p.descripcion LIKE '%{$search}%' AND eliminado = 0";
        //"SELECT s.id, s.titulo FROM Serie as s WHERE s.titulo LIKE '%{$search}%' UNION SELECT p.id, p.titulo FROM Pelicula as p WHERE p.titulo LIKE '%{$search}%'";
        //"SELECT s.id, s.titulo s.rutaPortada FROM Serie as s WHERE s.titulo LIKE '%{$search}%' OR s.descripcion LIKE '%{$search}%' UNION SELECT p.id, p.titulo FROM Pelicula as p WHERE p.titulo LIKE '%{$search}%' OR p.descripcion LIKE '%{$search}%' AND eliminado = 0";
        //"SELECT * FROM Serie WHERE (titulo LIKE '%{$search}%' OR descripcion LIKE '%{$search}%' OR Genero_id LIKE '%{$search}%') AND eliminado = 0";
        //"SELECT * FROM Serie WHERE (titulo LIKE '%{$search}%' OR descripcion LIKE '%{$search}%' OR Genero_id LIKE '%{$search}%') AND eliminado = 0; SELECT * FROM Pelicula WHERE (titulo LIKE '%{$search}%' or descripcion LIKE '%{$search}%' or Genero_id LIKE '%{$search}%') and eliminado = 0";

        if ( $result = $conexion->query($sql) ) {
            // SE OBTIENEN LOS RESULTADOS
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $data[$num][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
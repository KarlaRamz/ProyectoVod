<?php

    include_once __DIR__.'/database.php';

        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
        $data = array(
            'status'  => 'Error',
            'message' => 'La Insercion Fallo',
            'contenido' => ''
        );

        //$cuenta_id = $_POST['cuenta_id'];
        $cuenta_id = $_POST["cuenta_id"];

        // SE VERIFICA HABER RECIBIDO EL ID
        if( isset($_POST['cuenta_id']) )
        { 
            $sql = "SELECT usuario, rutaImagen, id FROM perfil WHERE Cuenta_id = '{$cuenta_id}' AND eliminado='0'";
            if ( $result = $conexion->query($sql) ) 
            {       
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $data['message'] = $rows;
                $data['message'] = $result->num_rows;
                if( $result->num_rows == 0 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "No Existe 1 perfil";
                }
                
                if( $result->num_rows == 1 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 1 perfil";
                    
                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_id1 = $data["0"]["id"];

                    $data['contenido'] = '<div class="col-12" align="center">
                    <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                    <img src="' . $src_imagen1 . '" class="perfil">
                    </a>
                    <p>' . $src_nombre1 . '</p>
                    </div>';
                }

                if( $result->num_rows == 2 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 2 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];

                    //Cadena que obtentra el html para sustituir su contenido 
                    $data['contenido'] = '<div class="row">
                        <div class="col-6" align="center">
                        <a href="index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                            <img src="' . $src_imagen1 . '" class="perfil">
                        </a>    
                            <p>' . $src_nombre1 . '</p>
                        </div>
                        <div class="col-6" align="center">
                        <a href="index.html" id="imagen2" onclick="redirigir(' . $src_id2 .', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                        </a>    
                            <p>' . $src_nombre2 .'</p>
                        </div>
                        </div>';    
                }
                if( $result->num_rows == 3 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 3 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_imagen3 = $data["2"]["rutaImagen"];
                    $src_nombre3 = $data["2"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];
                    $src_id3 = $data["2"]["id"];
                    
                    //Cadena que obtentra el html para sustituir su contenido 
                    $data['contenido'] = '<div class="row">
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                            <img src="' . $src_imagen1 . '" class="perfil">
                        </a>    
                            <p>' . $src_nombre1 . '</p>
                        </div>
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen2" onclick="redirigir(\'' . $src_id2 .'\', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre2 .'</p>
                        </div>
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen3" onclick="redirigir(' . $src_id3 .', \'' . $src_imagen3 . '\' , \'' . $src_nombre3 . ' \')"> 
                            <img src="' . $src_imagen3 . '" class="perfil">
                        </a>    
                            <p>' . $src_nombre3 .'</p>
                        </div>
                        </div>';    
                }
                if(  $result->num_rows == 4 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 4 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_imagen3 = $data["2"]["rutaImagen"];
                    $src_nombre3 = $data["2"]["usuario"];
                    $src_imagen4 = $data["3"]["rutaImagen"];
                    $src_nombre4 = $data["3"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];
                    $src_id3 = $data["2"]["id"];
                    $src_id4 = $data["3"]["id"];
                    
                    //Cadena que obtentra el html para sustituir su contenido 
                    $data['contenido'] = '<div class="row">
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                            <img src="' . $src_imagen1 . '" class="perfil">
                        </a>    
                            <p>' . $src_nombre1 . '</p>
                        </div>
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen2" onclick="redirigir(' . $src_id2 .', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre2 .'</p>
                            </div>
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen3" onclick="redirigir(' . $src_id3 .', \'' . $src_imagen3 . '\' , \'' . $src_nombre3 . ' \')">  
                            <img src="' . $src_imagen3 . '" class="perfil">
                        </a>    
                        <p>' . $src_nombre3 .'</p>
                        </div>
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen4" onclick="redirigir(' . $src_id4 .', \'' . $src_imagen4 . '\' , \'' . $src_nombre4 . '\' )">
                            <img src="' . $src_imagen4 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre4 .'</p>
                        </div>
                        </div>';    
                }
                if( $result->num_rows == 5 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 5 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_imagen3 = $data["2"]["rutaImagen"];
                    $src_nombre3 = $data["2"]["usuario"];
                    $src_imagen4 = $data["3"]["rutaImagen"];
                    $src_nombre4 = $data["3"]["usuario"];
                    $src_imagen5 = $data["4"]["rutaImagen"];
                    $src_nombre5 = $data["4"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];
                    $src_id3 = $data["2"]["id"];
                    $src_id4 = $data["3"]["id"];
                    $src_id5 = $data["4"]["id"];
                    
                    //Cadena que obtentra el html para sustituir su contenido 
                    $data['contenido'] = '<div class="row">
                        <div class="col-1" align="center">
                        </div>
                        <div class="col-2" align="center">
                        <a href="index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                            <img src="' . $src_imagen1 . '" class="perfil">
                            </a>
                            <p>' . $src_nombre1 . '</p>
                        </div>
                        <div class="col-2" align="center">
                        <a href="index.html" id="imagen2" onclick="redirigir(' . $src_id2 .', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                            <img src="' . $src_imagen2 . '" class="perfil">
                            </a>
                            <p>' . $src_nombre2 .'</p>
                        </div>
                        <div class="col-2" align="center">
                        <a href="index.html" id="imagen3" onclick="redirigir(' . $src_id3 .', ' . $src_imagen3 . ' , ' . $src_nombre3 . ' )">
                            <img src="' . $src_imagen3 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre3 .'</p>
                        </div>
                        <div class="col-2" align="center">
                        <a href="index.html" id="imagen4" onclick="redirigir(' . $src_id4 .', \'' . $src_imagen4 . '\' , \'' . $src_nombre4 . '\' )">
                            <img src="' . $src_imagen4 . '" class="perfil">
                            </a>
                            <p>' . $src_nombre4 .'</p>
                        </div>
                        <div class="col-2" align="center">
                        <a href="index.html" id="imagen5" onclick="redirigir(' . $src_id5 .', \'' . $src_imagen5 . '\' , \'' . $src_nombre5 . '\' )">
                            <img src="' . $src_imagen5 . '" class="perfil">
                            </a>
                            <p>' . $src_nombre5 .'</p>
                        </div>
                        <div class="col-1" align="center">
                        </div>
                        </div>';
                }
                if( $result->num_rows == 6 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 6 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_imagen3 = $data["2"]["rutaImagen"];
                    $src_nombre3 = $data["2"]["usuario"];
                    $src_imagen4 = $data["3"]["rutaImagen"];
                    $src_nombre4 = $data["3"]["usuario"];
                    $src_imagen5 = $data["4"]["rutaImagen"];
                    $src_nombre5 = $data["4"]["usuario"];
                    $src_imagen6 = $data["5"]["rutaImagen"];
                    $src_nombre6 = $data["5"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];
                    $src_id3 = $data["2"]["id"];
                    $src_id4 = $data["3"]["id"];
                    $src_id5 = $data["4"]["id"];
                    $src_id6 = $data["5"]["id"];
                    
                    $data['contenido'] =  '<div class="col-2" align="center">
                        <a href="index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                        <img src="' . $src_imagen1 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre1 . '</p>
                    </div>
                    <div class="col-2" align="center">
                        <a href="index.html" id="imagen2" onclick="redirigir(' . $src_id2 .', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                        <img src="' . $src_imagen2 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre2 . '</p>
                    </div>
                    <div class="col-2" align="center">
                        <a href="index.html" id="imagen3" onclick="redirigir(' . $src_id3 .', ' . $src_imagen3 . ' , ' . $src_nombre3 . ' )">
                        <img src="' . $src_imagen3 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre3  . '</p>
                    </div>
                    <div class="col-2" align="center">
                        <a href="index.html" id="imagen4" onclick="redirigir(' . $src_id4 .', \'' . $src_imagen4 . '\' , \'' . $src_nombre4 . '\' )">
                        <img src="' . $src_imagen4 . '"  class="perfil">
                        </a>
                        <p>' . $src_nombre4 . '</p>
                    </div>
                    <div class="col-2" align="center">
                        <a href="index.html" id="imagen5" onclick="redirigir(' . $src_id5 .', \'' . $src_imagen5 . '\' , \'' . $src_nombre5 . '\' )">
                        <img src="'. $src_imagen5 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre5 .  '</p>
                    </div>
                    <div class="col-2" align="center">
                        <a href="index.html" id="imagen6" onclick="redirigir(' . $src_id6 .', \'' . $src_imagen6 . '\', \'' . $src_nombre6 . '\' )">
                        <img src="' . $src_imagen6 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre6 .'</p>
                    </div>';
                }
                if( sizeof($rows) == 7 )  //$result->num_rows > 0 tambien?
                {
                    $data['status'] = "success";
                    $data['message'] = "Existe 7 perfiles";

                    foreach($rows as $key => $col) {
                        foreach($col as $key2 => $value) { 
                                $data[$key][$key2] = utf8_encode($value);       
                        }
                    }
                    $src_imagen1 = $data["0"]["rutaImagen"];
                    $src_nombre1 = $data["0"]["usuario"];
                    $src_imagen2 = $data["1"]["rutaImagen"];
                    $src_nombre2 = $data["1"]["usuario"];
                    $src_imagen3 = $data["2"]["rutaImagen"];
                    $src_nombre3 = $data["2"]["usuario"];
                    $src_imagen4 = $data["3"]["rutaImagen"];
                    $src_nombre4 = $data["3"]["usuario"];
                    $src_imagen5 = $data["4"]["rutaImagen"];
                    $src_nombre5 = $data["4"]["usuario"];
                    $src_imagen6 = $data["5"]["rutaImagen"];
                    $src_nombre6 = $data["5"]["usuario"];
                    $src_imagen7 = $data["6"]["rutaImagen"];
                    $src_nombre7 = $data["6"]["usuario"];
                    $src_id1 = $data["0"]["id"];
                    $src_id2 = $data["1"]["id"];
                    $src_id3 = $data["2"]["id"];
                    $src_id4 = $data["3"]["id"];
                    $src_id5 = $data["4"]["id"];
                    $src_id6 = $data["5"]["id"];
                    $src_id7 = $data["6"]["id"];


                    $data['contenido'] = '<div class="col-3" align="center">
                        <a href="#index.html" id="imagen1" <a href="index.html" id="imagen1" onclick="redirigir(' . $src_id1 .', \'' . $src_imagen1 . '\', \'' . $src_nombre1 . '\' )">
                        <img src="' . $src_imagen1 . '" class="perfil">
                        </a>
                        <p>' . $src_nombre1 . '</p>
                        </div>
                        <div class="col-3" align="center">
                            <a href="index.html" id="imagen2" onclick="redirigir(' . $src_id2 .', \'' . $src_imagen2 . '\' , \'' . $src_nombre2 . '\' )">
                            <img src="' . $src_imagen2 . '" class="perfil">
                            <img src="' . $src_imagen2 . '" class="perfil">
                            </a>
                            <p>' . $src_nombre2 . '</p>
                        </div>
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen3" onclick="redirigir(' . $src_id3 .', ' . $src_imagen3 . ' , ' . $src_nombre3 . ' )">
                            <img src="' . $src_imagen3 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre3 . '</p>
                        </div>
                        <div class="col-3" align="center">
                        <a href="index.html" id="imagen4" onclick="redirigir(' . $src_id4 .', \'' . $src_imagen4 . '\' , \'' . $src_nombre4 . '\' )">
                            <img src="' . $src_imagen4 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre4 . '</p>
                        </div>
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen5" onclick="redirigir(' . $src_id5 .', \'' . $src_imagen5 . '\' , \'' . $src_nombre5 . '\' )">
                            <img src="' . $src_imagen5 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre5 . '</p>
                        </div>
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen6" onclick="redirigir(' . $src_id6 .', \'' . $src_imagen6 . '\', \'' . $src_nombre6 . '\' )">
                            <img src="' . $src_imagen6 . '" class="perfil">
                        </a>
                            <p>' . $src_nombre6 . '</p>
                            </div>
                        <div class="col-4" align="center">
                        <a href="index.html" id="imagen7" onclick="redirigir(' . $src_id7 .', ' . $src_imagen7 . ' , ' . $src_nombre7 . ' )">
                            <img src="' . $src_imagen7 . '" class="perfil">
                        </a>   
                            <p>' . $src_nombre7 . '</p>
                        </div>';
                }
            }
        }
echo json_encode($data, JSON_PRETTY_PRINT);
?>
<?php
    $phpFileUploadErrors = array(
        1 => 'El fichero subido excede la directiva upload_max_filesize de php.ini.',
        2 => 'El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.',
        3 => 'El fichero fue sólo parcialmente subido.',
        4 => 'No se subió ningún fichero.',
        6 => 'Falta la carpeta temporal.',
        7 => 'No se pudo escribir el fichero en el disco.',
        8 => 'Una extensión de PHP detuvo la subida de ficheros. PHP no proporciona una forma de determinar la extensión que causó la parada de la subida de ficheros; el examen de la lista de extensiones cargadas con phpinfo() puede ayudar.',
    );
    require "../model/Peliculas.php";
    session_start();
    $peli = new Peliculas();

    
    switch($_REQUEST["op"]){
        case 'listar_peliculas':
            $data = $peli->listarPeliculas();
            $list = Array();
            for ($i=0; $i<count($data); $i++){
                $list[] = array(
                    "0" => $data[$i]["id"],
                    "1" => $data[$i]["titulo"],
                    "2" => $data[$i]["precio"],
                    "3" => $data[$i]["fechas"],
                    "4" => '<button class="btn btn-sm btn-outline-dark" onClick="obtProductoPorId('.$data[$i]["id"].')" data-toggle="modal" data-target="#modal_editarPelicula"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger" onClick="obtProductoPorId('.$data[$i]["id"].')" data-toggle="modal" data-target="#modal_eliminarPelicula"><i class="fa-solid fa-trash-can"></i></button>'
                );
            }
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );
            
            echo json_encode($resultados);
            break;

        case 'obtProductoPorId':
            if(isset($_POST['id'])){
                $pelicula = $peli->obtProductoPorId($_POST['id']);
                $data[]=array(
                    'id'=>$pelicula[0]['id'],
                    'portada'=>$pelicula[0]['portada'],
                    'titulo'=>$pelicula[0]['titulo'],
                    'director'=>$pelicula[0]['director'],
                    'reparto'=>$pelicula[0]['reparto'],
                    'duracion'=>$pelicula[0]['duracion'],
                    'sinopsis'=>$pelicula[0]['sinopsis'],
                    'fechas'=>$pelicula[0]['fechas'],
                    'precio'=>$pelicula[0]['precio'],
                    'asientos'=>$pelicula[0]['asientos'],
                );
                echo json_encode($data);
            }
            break;

        case 'agregarPelicula':
            if (!empty($_FILES['portada']) && !empty($_POST['titulo']) && !empty($_POST['director']) && !empty($_POST['reparto']) && !empty($_POST['sinopsis']) && !empty($_POST['duracion']) && !empty($_POST['fecha']) && !empty($_POST['precio'])){
                $img_name = $_FILES["portada"]["name"];
                $tmp_name = $_FILES["portada"]["tmp_name"];
                $img_size = $_FILES["portada"]["size"];
                $error = $_FILES["portada"]["error"];
                if ($error === 0){
                    if ($img_size > 1000000){
                        $em = "El archivo es muy grande";
                    } else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png");
                        if (in_array($img_ex_lc, $allowed_exs)){
                            $img_path = "img/".$img_name;
                            $titulo = $_POST['titulo'];
                            $director = $_POST['director'];
                            $reparto = $_POST['reparto'];
                            $sinopsis = $_POST['sinopsis'];
                            $duracion = $_POST['duracion'];
                            $fechas = $_POST['fecha'];
                            $precio = $_POST['precio'];
                            $asientos = "0,0,0,0,0,0,0,0,0,0,0,
                                        0,0,0,0,0,0,0,0,0,0,0,
                                        0,0,0,0,0,0,0,0,0,0,0,
                                        0,0,0,0,0,0,0,0,0,0,0,
                                        0,0,0,0,0,0,0,0,0,0,0,
                                        0,0,0,0,0,0,0,0,0,0,0";
                            $peli->agregar($img_path, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio, $asientos);
                            move_uploaded_file($tmp_name, '../'.$img_path);
                            echo 1;
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    }
                } else {
                    echo $phpFileError[$error];
                }
            } 
            break;
        
        case 'editarPelicula':
            if(isset($_POST['id'])){
                if (!empty($_POST['titulo']) && !empty($_POST['director']) && !empty($_POST['reparto']) && !empty($_POST['sinopsis']) && !empty($_POST['duracion']) && !empty($_POST['fecha']) && !empty($_POST['precio'])){
                    $id = $_POST['id'];
                    $titulo = $_POST['titulo'];
                    $director = $_POST['director'];
                    $reparto = $_POST['reparto'];
                    $sinopsis = $_POST['sinopsis'];
                    $duracion = $_POST['duracion'];
                    $fechas = $_POST['fecha'];
                    $precio = $_POST['precio'];
                    if ($_FILES['portada']['error'] != 4) { //Si no se cambia la portada
                        $img_name = $_FILES["portada"]["name"];
                        $tmp_name = $_FILES["portada"]["tmp_name"];
                        $img_size = $_FILES["portada"]["size"];
                        $error = $_FILES["portada"]["error"];
                        if ($error === 0){
                            if ($img_size > 1000000){
                                $em = "El archivo es muy grande";
                                echo $em;
                            } else {
                                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ex_lc = strtolower($img_ex);
        
                                $allowed_exs = array("jpg", "jpeg", "png");
                                if (in_array($img_ex_lc, $allowed_exs)){
                                    $img_path = "img/".$img_name;
                                    
                                    $peli->editarConPortada($id, $img_path, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio);
                                    echo 1;
                                } else {
                                    echo "El archivo no es una imagen";
                                    echo $em;
                                }
                            }
                        } else {
                            $em = $phpFileError[$error];
                            echo $em;
                        }
                    } else {
                        $peli->editarSinPortada($id, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio);
                        echo 1;
                    }
                }
            } else {
                $em = "Error en la base de datos al editar pelicula";
                echo $em;
            };
            break;

        case 'eliminarPelicula':
            if(isset($_POST['id'])){
                $peli->eliminar($_POST['id']);
                echo 1;
            }
            else{
                echo 0;
            }
            
            break;

        case 'actualizarAsientos':
            if(isset($_POST['id'])){
                $asientos = implode(",", $_POST['asientos']);
                $peli->actualizarAsientos($_POST['id'], $asientos);
                echo 1;
            }
            else{
                echo 0;
            }
            break;
    }
?>
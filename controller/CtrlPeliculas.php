<?php
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
                    "4" => '<button class="btn btn-sm btn-outline-dark"><i class="fa-solid fa-pen-to-square"></i></button>
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
                            $pelicula = $peli->agregar($img_path, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio, $asientos);
                            if($pelicula){
                                echo 1;
                                move_uploaded_file($tmp_name, '../'.$img_path);
                            }else{
                                echo "Error en la base de datos al agregar pelicula";
                            }
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    }
                } 
            } 
            break;

        case 'eliminarPelicula':
            if(isset($_POST['id'])){
                $pelicula = $peli->eliminar($_POST['id']);
                echo '1';
            }
            else{
                echo '0';
            }
            
            break;
    }
?>
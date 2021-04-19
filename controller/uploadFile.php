<?php

use function PHPSTORM_META\type;

require_once "../model/files.php";

session_start();
$upload=new files();



if(isset($_POST['hidden']))
{
    $name=htmlspecialchars($_POST['name']);
    $description=htmlspecialchars($_POST['description']);
    //ruta del archivo temporal
    $archivo=$_FILES['file']['tmp_name'];
    //tamaño del archivo
    $tamaño=$_FILES['file']['size'];
    //tipo de archivo
    $tipo=$_FILES['file']['type'];
    //nombre del archivo
    $nameFile=$_FILES['file']['name'];
    //fecha

    
    $fecha=Date("y/m/d");
    
    if($archivo != "none")
    {
        //creamos un archivo
        //$fp=fopen($archivo,"rb");
        //$contenido=fread($fp,$tamaño);
        //$contenido=addslashes($contenido);
        //fclose($fp);

        if(!empty($name) && !empty($description))
        {
            $registro=['name'=>$name, 'description'=>$description, 'path'=>$archivo,'type'=>$tipo,'nameFile'=>$nameFile ,'date'=>$fecha];

            $upload->insert($registro);

            $id=$upload->consult($registro);
            $idUser=$_SESSION['usuario_login']['id'];
            

            //para insertar en la tabla relacionada
            $upload->insertID($idUser,$id['id']);

            $_SESSION['file_uploaded']="Archivo subido";

            header("Location: ../view/sistema.php");
            
        }else
        {
            $_SESSION['error_file']="error al cargar file";
            header('Location: ../view/sistema.php');
        }
    }
}

?>
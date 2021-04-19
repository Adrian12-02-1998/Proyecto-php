<?php

require_once "../model/donwload.php";

$con=new controllerListar();

if(isset($_POST['hiddenDownload']))
{
    $id=$_POST['id'];
    $con->listar($id);
}

class controllerListar
{

    public function listar($id)
    {
        $downloadFile=new download();
        $row=array();
        $row=$downloadFile->consult($id);
        
        require_once "../view/sistema.php";

    }

}



?>
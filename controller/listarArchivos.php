<?php

require_once "../model/selectArchivos.php";

//corregir

if(isset($_POST['hidden']))
{
    session_start();
    $archivos=new obtenerArchibos();
    
    $documentos=array();

    $credenciales=array();
    $credenciales['id']=$_SESSION['usuario_login']['id'];

    $documentos=$archivos->consult($credenciales);

    require_once "../view/sistema.php";

}



//$documentos=$archivos->consult($credenciales);






?>
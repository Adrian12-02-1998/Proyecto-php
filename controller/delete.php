<?php
require_once "../model/files.php";
if(isset($_POST['hidden']))
{
    $id=$_POST['id'];
    $delete=new eliminar();

    $delete->remover($id);
}


class eliminar 
{

    public function remover($id)
    {
        $accion=0;
        $del=new files();
        $del->delete($accion,$id);

        require_once "../view/sistema.php";
    }

}


?>
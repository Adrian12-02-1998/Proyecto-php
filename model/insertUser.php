<?php

require_once "../assets/DB/DB.php";


class user extends DB
{


    public function __construct()
    {
        
    }

    #crud
    public function insert($registro)
    {
        $conecion=parent::conectar();
        try
        {
            $sql='insert into usuario(name,lastname,email,password) values(:name,:lastname,:email,:password)';
            $stmt=$conecion->prepare($sql);
            $stmt->execute($registro);

            

        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
        $conexion=null;
    }
    public function consult($registro)
    {
        $conecion=parent::conectar();
        try
        {
            $sql='select * from usuario where email='.'"'.$registro.'";';
            

            return  $conecion->query($sql)->fetch();

            

        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
    }




    protected function update($registro){}
    protected function delete($accion, $eliminar){}
}

?>
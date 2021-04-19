<?php

require_once "../assets/DB/DB.php";


class files extends DB
{
    public function insert($registro)
    {
        $conexion=parent::conectar();

        try
        {
            $sql="insert into documento(name,description,path,type,nameFile,date) values(:name,:description,:path,:type,:nameFile,:date)";

            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(':name',$registro['name']);
            $stmt->bindParam(':description',$registro['description']);
            $stmt->bindParam(':path',$registro['path']);
            $stmt->bindParam(':type',$registro['type']);
            $stmt->bindParam(':nameFile',$registro['nameFile']);
            $stmt->bindParam(':date',$registro['date']);

            $stmt->execute();

            $conexion=null;

        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
        $conexion=null;
    }
    public function consult($registro)
    {
        $conexion = parent::conectar();
        try
        {
            $sql='select id from documento where name=:name and description=:description';

            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(":name",$registro['name']);
            $stmt->bindParam(":description",$registro['description']);
            $stmt->execute();      
            $id=$stmt->fetch();

            $conexion=null;

            return $id;


        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
    }

    public function insertID($idUser,$idDocumento)
    {
        $conexion=parent::conectar();
        try
        {   

            $sql="insert into usuario_documento(id_usuario,id_documento) values(:idUser,:idDocumento)";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(':idUser',$idUser);
            $stmt->bindParam(':idDocumento',$idDocumento);
            $stmt->execute();

            $conexion=null;


        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
    }

    public function update($registro)
    {

    }
    public function delete($accion, $eliminar)
    {
        $conexion=parent::conectar();
        try
        {
            $sql="delete from documento where id=?";
            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(1,$eliminar);
            $stmt->execute();
            $conexion=null;
            
        }catch(PDOException $e)
        {

        }
    }
}


?>
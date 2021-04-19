<?php

require_once "../assets/DB/DB.php";

class download extends DB
{
    public function insert($registro){}
    public function consult($registro)
    {
        $conecion=parent::conectar();
        try
        {
            $archivo=array();
            $sql="select * from documento where id=?";

            $stmt=$conecion->prepare($sql);
            $stmt->bindParam(1,$registro);
            $stmt->execute();

            $stmt->bindColumn(1,$blob,PDO::PARAM_BOOL);
            $row=$stmt->fetch();

            header('Content-Type: '.$row["path"]);
            
            return $row;

        }catch(PDOException $e)
        {
            exit("error ".$e->getMessage());
        }
    }
    public function update($registro){}
    public function delete($accion, $eliminar){}

}

?>
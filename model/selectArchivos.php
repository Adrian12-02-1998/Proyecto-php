<?php

require_once "../assets/DB/DB.php";


class obtenerArchibos extends DB
{



    public function insert($registro)
    {
        
    }
    public function download()
    {
        
    }
    public function consult($registro)
    {
        $conexion=parent::conectar();
        try
        {
            /*
            $sql="select id,name,description,date from documento where ";

            $stmt=$conexion->prepare($sql);
            $stmt->execute(array(":id"=>$registro));

            $stmt->bindColumn(1,$id);
            $stmt->bindColumn(2,$name);
            $stmt->bindColumn(3,$path, PDO::PARAM_LOB);

            $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $stmt;
            */
            /*crear consulta con inner join para obtener solo sus documentos*/
            $sql="SELECT documento.id,documento.name,documento.description,documento.date 
            from documento INNER JOIN usuario_documento on documento.id=usuario_documento.id_documento INNER JOIN usuario on 
            usuario.id=usuario_documento.id_usuario where usuario.id=?";

            $stmt=$conexion->prepare($sql);
            $stmt->bindParam(1,$registro['id']);
            $stmt->execute();
            return $stmt->fetchAll();
            

        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
    }
    public function update($registro){

    }
    public function delete($accion, $eliminar)
    {

    }
    
}


?>
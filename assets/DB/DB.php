<?php

const BD='mysql';
const BD_SERVIDOR="localhost";
const BD_CHARSET='utf8';

abstract class DB
{
    //variable del usuario de la base de dato
    private static $db_usuario="root";
    private static $db_pass="";
    private static $db_servidor=BD_SERVIDOR;
    private static $db_nombre='archivo';
    private static $db_charset = BD_CHARSET;
    private $conexion;

    //funcion para conectar  a la base de datos

    public function conectar()
    {
        try
        {
            $dns="mysql:host=".self::$db_servidor.";dbname=".self::$db_nombre;

            $pdo=new PDO($dns, self::$db_usuario, self::$db_pass);

            $pdo->exec("SET CHARACTER SET".self::$db_charset);

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

            return $pdo;

        }catch(PDOException $e)
        {
            exit("error".$e->getMessage());
        }
    }

    #crud
    abstract protected function insert($registro);
    abstract protected function consult($registro);
    abstract protected function update($registro);
    abstract protected function delete($accion, $eliminar);
}

?>
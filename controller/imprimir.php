<?php


$db_nombre="archivo";
$db_servidor="localhost";
$db_usuario="root";
$db_pass="";
$db_charset="utf8";

$dns="mysql:host=".$db_servidor.";dbname=".$db_nombre;


$pdo=new PDO($dns, $db_usuario, $db_pass);

$pdo->exec("SET CHARACTER SET".$db_charset);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

$id=isset($_GET['id'])? $_GET['id']:" ";

$stmt=$pdo->prepare("select * from documento where id=?");

$stmt->bindParam(1,$id);

$stmt->execute();


$row=$stmt->fetch();
header("Content-Type:".$row['type']);
echo $row['path'];






?>
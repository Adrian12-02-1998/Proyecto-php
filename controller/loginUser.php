<?php

session_start();

require_once "../model/insertUser.php";

$user=new User();

if(isset($_POST['hidden']))
{
    $email=htmlspecialchars(trim($_POST['email']));
    $password=$_POST['password'];


    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $email_validate=true;
    }else
    {

    }

    if(!empty($password))
    {
        $password_valitade=true;
    }

    if($email_validate && $password)
    {
        $resultado=$user->consult($email);

        if($resultado['email']==$email && password_verify($password,$resultado['password']))
        {
            
            //guardamos los datos del usuario
            $_SESSION['usuario_login']=$resultado;
            header("Location: ../view/sistema.php");
        }
        else
        {
            $_SESSION['errorLogin']="error en la contraseña o email";
            header("Location: ../view/login.php");
        }
    }


}


?>
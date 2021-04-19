<?php

require_once '../model/insertUser.php';

session_start();

$newUser=new user();

$errores=array();

if(isset($_POST['hidden']))
{
    $name=htmlspecialchars($_POST['name']);
    $lastname=htmlspecialchars($_POST['lastname']);
    $email=htmlspecialchars(trim($_POST['email']));
    $password=$_POST['password'];

    if(!empty($name) && !is_numeric($name) && !preg_match('/[0-9]/',$name))
    {
        $name_validate=true;
    }else
    {
        $errores['name']="The name has some problems";
    }

    if(!empty($lastname) && !is_numeric($lastname) && !preg_match('/[0-9]/',$name))
    {
        $lastname_validate=true;
    }else
    {
        $errores['lastname']="The lastname has some problems";
    }

    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        
        $email_validate=true;

    }else
    {
        $errores['email']="The email has some problems";
    }
    
    if(!empty($password) && strlen($password)>8)
    {
        $password_validate=true;
    }else
    {
        $errores['password']="The password has some problems";
    }

    if($name_validate && $lastname_validate && $email_validate && $password_validate)
    {
        //cifrar la contraseña
        $password_segura=password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
        //desifrar devuelve true
        #var_dump(password_verify($password,$password_segura));

        $user=['name'=>$name,'lastname'=>$lastname,'email'=>$email,'password'=>$password_segura];
        
        $newUser->insert($user);
        $_SESSION['registro']="registro exitoso";
        header('Location: ../index.php');

    }else
    {
        $_SESSION['errores']=$errores;
        header('Location: ');
    }

}

?>
<?php

if(isset($_SESSION['usuario_login']))
{
    session_destroy();
}

header('Location: ../view/login.php');


?>
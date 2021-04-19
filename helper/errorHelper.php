<?php

session_start();

function mostrarErrores($errores, $campo)
{
    $alerta = '';

    if(isset($errores[$campo]) && !empty($campo))
    {
        $alerta = "<div class='alerta'>".$errores[$campo].'</div>';
    }
    return $alerta;
}

function borrarErrores()
{
    if(isset($_SESSION['errores']))
    {
        $_SESSION['errores']=null;
        $borrado = session_unset($_SESSION['errores']);
        
        return $borrado;
    }else
    {
        
    }
    
}

?>
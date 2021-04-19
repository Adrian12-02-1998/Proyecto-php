<?php

require_once "../helper/errorHelper.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        :root
        {

        }
        *,*::before,*::after
        {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .header
        {
            width: 100%;
            height: 80px;
            background-color: hsla(270, 100%, 50%, 1);
        }
        .title
        {
            text-align: center;
            padding-top: 20px;
        }
        .div-main
        {
            width: 50vw;
            height: 500px;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: hsla(45, 100%, 50%, 1);
        }
        .form
        {
            width: 400px;
            height: 300px;
            margin-top: 35px;
            margin-left: auto;
            margin-right: auto;
            background-color:hsla(270, 100%, 50%, 1);
            border-radius: 10px;
            box-shadow: 0 0 10px hsla(270, 100%, 50%, 1);
        }
        .input
        {
            width: 300px;
            height: 25px;
            display: block;
            margin-top: 15px;
            margin-left: auto;
            margin-right: auto;
        }
        .input[type="submit"]
        {
            padding: 0;
            margin-left: 50px;
            width: 120px;
            height: 35px;
            border-radius: 5px;
            background-color: hsla(110, 100%, 40%, 1);
            color: #fff;
            font-size: 16px;
        }
        .input[type="submit"]:hover
        {
            padding: 0;
            margin-left: 50px;
            width: 120px;
            height: 35px;
            border-radius: 5px;
            background-color: hsla(45, 100%, 45%, 1);
            color: #000;
            font-size: 16px;
        }
        .header a
        {
            display: block;
            position: absolute;
            top:40px;
            right: 10px;
            width: 120px;
            height: 30px;
            text-align: center;
            background-color: hsla(45, 100%, 55%, 1);
            color:#fff;
            text-decoration: none;
            font-size: 1.5rem;
            border-radius: 5px;
        }        
    </style>
</head>
<body>
<div class="container">
        <!--header of the page-->
        <div class="div-header">
            <header class="header">
                <h1 class="title">Sistema de archivos</h1>
                <a href="../index.php">Register</a>
            </header>
        </div>
        
        <div class="div-main">
            <main>
                <?php echo $_SESSION['errorLogin'] ? mostrarErrores($_SESSION['errorLogin'],'errorLogin'):' '; ?>
                <form action="../controller/loginUser.php" method="POST" class="form">

                    <label for="email" class="input">Email</label>
                    <input type="email" name="email" class="input">
                    <label for="password" class="input">Password</label>
                    <input type="password" name="password" class="input">
                    
                    <input type="hidden" name="hidden">

                    <input type="submit" value="login" class="input">
                </form>
            </main>
        </div>
    </div>
</body>
</html>
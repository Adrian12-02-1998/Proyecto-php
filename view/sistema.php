<?php
session_start();

require_once "../controller/listarArchivos.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            position: relative;
            width: 100%;
            height: 80px;
            background-color: hsla(270, 100%, 50%, 1);
            
        }
        .header h1
        {
            text-align: center;
            color:#fff;
        }
        .header p
        {
            font-size: 1.5rem;
            color:#fff;
        }
        .header a
        {
            width: 150px;
            height: 30px;
            position: absolute;
            left: 85%;
            text-align: center;
            border-radius: 5px;
            top:25px;
            text-decoration: none;
            color:#fff;
            font-size: 1.5rem;
            background-color: hsla(55, 100%, 50%, 1);
        }
        .aside
        {
            width: 400px;
            height: 81%;
            background-color: hsla(120, 100%, 45%, 1);
            position: absolute;
            right: 0;
        }
        .form
        {
            margin-top: 20px;
        }
        .section
        {
            width: 966px;
            height: max-content;
            padding: 10px;
            background-color: hsla(60, 100%, 55%, 1);
        }
        .form2 [type="submit"]
        {
            width: 150px;
            margin-bottom: 15px;
            height: 30px;
            border-radius: 5px;
            background-color: hsla(270, 100%, 50%, 1);
            color:#fff;
        }
        .tabla
        {
            width: 800px;
            height: 40px;
        }
    </style>
</head>
<body>
    
    <div class="container">

        <header class="header">
            <h1>Sistema de archivos</h1>
            <p><?php echo $_SESSION['usuario_login']['name']?></p>
            <a href="../helper/cerrar.php">Cerrar sesión</a>
        </header>

        <aside class="aside">

            <?php echo $_SESSION['file_uploaded'] ? $_SESSION['file_uploaded'] :' ';?>
            <?php echo $_SESSION['error_file'] ? $_SESSION['error_file'] :' ';?>


            <form action="../controller/uploadFile.php" method="POST" enctype="multipart/form-data" class="form">
                <label for="name">NameFile</label>
                <input type="text" name="name" class="input">

                <label for="description">Description</label>
                <input type="text" name="description" class="input">

                <input type="file" name="file">

                <input type="hidden" name="hidden">
                <input type="submit" value="upload">
            </form>
        </aside>

        <section class="section">
            <article>
            

            <form action="../controller/listarArchivos.php" method="POST" class="form2">
                <input type="hidden" name="hidden">
                <input type="submit" value="listar">
            </form>

            <table border="1" class="tabla">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>descripcion</th>
                        <th>fecha</th>
                    </tr>
                    <?php
                        if(!empty($documentos))
                        {
                            foreach($documentos as $key=>$value)
                            {
                                echo"<tr>";
                                echo "<td>".$value['id']."</td>";
                                echo "<td>".$value['name']."</td>";
                                echo "<td>".$value['description']."</td>";
                                echo "<td>".$value['date']."</td>";
                                echo "</tr>";
                            }
                        }else
                        {
                            
                        }

                    ?>
            </table>
            </article>

            <article>
                    <h3>descargar documento</h3>
                    <p>selecciona el id del documento a descargar</p>
                    <form action="../controller/fileDonwload.php" method="POST" class="form2">
                        <label form="id">ID</label>
                        <input type="number" name="id" class="input">

                        <input type="hidden" name="hiddenDownload">
                        <input type="submit" value="bring">
                        
                    </form>

                    <table border="1" class="tabla">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>descripcion</th>
                            <th>path</th>
                            <th>fecha</th>
                        </tr>
                        <?php
                            
                            if($row)
                            {
                                
                                echo "<tr>";
                                echo '<td>'.$row['id'].'</td>';
                                echo '<td>'.$row['name'].'</td>';
                                echo '<td>'.$row['description'].'</td>';
                                echo '<td>'."<li>"."<a target='_blank' href=".'../controller/imprimir.php?id='.$row['id'].">".$row['name'].'</a>'.'<br>'.
                               "<embed src='data':".$row['path'].";base64,".base64_encode($row['path'])." width='200'/>"."</li>".'</td>';
                                echo '<td>'.$row['date'].'</td>';
                                echo "</tr>";
                                
                            }else
                            {
                                echo "vacio";
                            }
                        ?>
                    </table>
            </article>
            <article>
                    <h3>Eliminar documento</h3>
                    <form action="../controller/delete.php" method="POST">
                        <label form="id">ID</label>
                        <input type="number" name="id" class="input">

                        <input type="hidden" name="hidden">
                        <input type="submit" value="bring">
                        
                    </form>

            </article>
        </section>

    </div>

</body>
</html>
<?php
include ("includes/abrirbd.php");
$show_error= valid_nombre($_GET['nombre']);
$sql = "SELECT * FROM productos WHERE nombre ='{$_GET['nombre']}'";
//$sql = mysqli_real_escape_string("SELECT * FROM productos WHERE nombre ='{$_GET['nombre']}'");
if (!$resultado = mysqli_query($link, $sql)) {
    header("Location:error.html");
    exit;
}

function valid_nombre($val)
{
    if (preg_match("/(\s*[aA-zZ0-9_,-]+$)/", $_GET['nombre'], $matches))
    {
        return false;
    }else{
        return true;
    }
}
?>
<html>
    <head> 
        <title> Ver Productos </title>
        <meta charset="UTF-8">
    </head>
    <body>
    <center>
        <?php
        if($show_error){
            echo "<h1>Nombre de producto incorrecto</h1>";
        }else if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            while ($prod = mysqli_fetch_assoc($resultado)) {
                echo "<tr><td><img src='Imagenes/{$prod['imagen']}.jpg' width=100 height=200></td>";
                echo "<td> precio={$prod['precio']}<br>talla={$prod['talla']}</td></tr>";
            }
            echo "</table>";
        }else {
            echo ("No existe el producto");
        }

        mysqli_close($link);
        ?>
    </body>
</html>
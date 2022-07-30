<?php
include ("includes/abrirbd.php");

$conexion=new mysqli('localhost', 'prod', 'Wz7mfCW7nHKX1Uxj','tienda');
$sentencia = $conexion->prepare("SELECT * FROM productos WHERE nombre =? ");
$sentencia->bind_param('s', $_GET['nombre']);
$sentencia->execute();
$resultado=$sentencia->get_result();

//$sql = "SELECT * FROM productos WHERE nombre ='{$_GET['nombre']}'";
//if (!$resultado = mysqli_query($link, $sql)) {
  //  header("Location:error.html");
//    exit;
//}
?>
<html>
    <head> 
        <title> Ver Productos </title>
        <meta charset="UTF-8">
    </head>
    <body>
    <center>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            while ($prod = mysqli_fetch_assoc($resultado)) {
                echo "<tr><td><img src='Imagenes/{$prod['imagen']}.jpg' width=100 height=200></td>";
                echo "<td> precio={$prod['precio']}<br>talla={$prod['talla']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo ("No existe el producto");
        }

        mysqli_close($link);
        ?>
    </body>
</html>
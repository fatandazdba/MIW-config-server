<?php
session_start();
if (isset($_POST['registro'])) {
    header("Location: registro.php");
    exit;
}
if (isset($_POST['login'])) {
    include ("includes/abrirbd.php");
    $hash = md5($_POST['clave']);
    $sql = "SELECT * FROM clientes WHERE user ='{$_POST['nombre']}' AND password ='{$hash}'";
    $resultado = mysqli_query($link, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $_SESSION['autenticado'] = 'correcto';
        header("Location:productos.php");
    } else {
        header("Location: NoAuth.php");
    }
    mysqli_close($link);
    exit;
}
?>
<html>
    <head>
        <title> Login </title>
        <meta charset="UTF-8">
    </head>
    <body>	
        <br><br><br>
    <center>
        <img src="logo.png" width= 120 height= 60>
        <br><br><br>
        <form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = post>
            <table bgcolor = 'lightgrey'> 
                <tr>
                    <td width= 100> Usuario: </td> 
                    <td> <input type = text name ='nombre'></td>
                </tr>
                <tr>
                    <td width= 100> Password: </td> 
                    <td> <input type="password" name ='clave'></td>
                </tr>
            </table><br>
            <input type=submit name = 'login' value = "LOGIN"><br><br><br>
            <input type=submit name = 'registro' value = "REGISTRAR USUARIO">
        </form>
    </body>
</html>
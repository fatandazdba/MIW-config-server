<?php
session_start();$captcha=true;
if (isset($_POST['registro'])) {
    header("Location: registro.php");
    exit;
}
if (isset($_POST['login'])) {
    if (($_SESSION['CAPTCHA'] == $_POST['captcha'])) {
        include("includes/abrirbd.php");
        $sql = "SELECT * FROM usuarios WHERE user ='{$_POST['user']}'";
        $resultado = mysqli_query($link, $sql);

        if (mysqli_num_rows($resultado) == 1) {
            $usuario = mysqli_fetch_assoc($resultado);
            $hash = hash("sha256", $_POST['passwd'] . $usuario['salt'], false);
            if (($usuario['user'] == $_POST['user']) && $usuario['password'] == $hash) {
                $_SESSION['autenticado'] = 'correcto';
                $_SESSION['permisos'] = str_split($usuario['permisos']);
                $_SESSION['user'] = $usuario['user'];
                header("Location:MasterWeb.php");
            } else {
                $_SESSION['autenticado'] = 'incorrecto';
                header("Location: NoAuth.php");
            }
        } else {
            $_SESSION['autenticado'] = 'incorrecto';
            header("Location: NoAuth.php");
        }
        mysqli_close($link);
        exit;
    }else{
        $captcha=false;
        $mensajeCaptcha='Los valores ingresados en el captha no son validos';
    }
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
                    <td> <input type = text name ='user'></td>
                </tr>
                <tr>
                    <td width= 100> Password: </td> 
                    <td> <input type = password name ='passwd'></td>
                </tr>
            </table><br>
            <img src=captcha.php alt="captchat-image">
            <input type='text' name='captcha'><br>
            <a href="logincert.php">Autenticación con certificado</a><br>
            <div style="color: red"><?php if (!$captcha) echo $mensajeCaptcha; ?></div><br>
            <input type=submit name = 'login' value = "LOGIN"><br><br><br>
            <input type=submit name = 'registro' value = "REGISTRAR USUARIO"> 
        </form>
    </center>
</body>
</html>


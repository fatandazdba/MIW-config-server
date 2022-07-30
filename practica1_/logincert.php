<?php

    session_start();
    $usuario = $_SERVER['SSL_CLIENT_S_DN_CN'];
    include("includes/abrirbd.php");

    $sql = "SELECT * FROM usuarios WHERE user ='{$usuario}'";

    $resultado_query = mysqli_query($link, $sql);

    if (mysqli_num_rows($resultado_query) == 1) {
        $_SESSION['autenticado'] = 'correcto';
        header("Location:MasterWeb.php");
    } else {
        $_SESSION['autenticado'] = 'incorrecto';
        header("Location: NoAuth.php");
    }
    mysqli_close($link);

exit;
<?php

if (!isset($_SESSION['autenticado']) ||
        ($_SESSION['autenticado'] != 'correcto' )) {
    header("Location:login.php");
    exit;
}
?>
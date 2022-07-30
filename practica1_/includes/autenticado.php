<?php
    session_start();
    if ($_SESSION ["autenticado"] == "correcto"){
        echo " ";
    } else {
        header("location: ./NoAuth.php");
        exit();
    }
?>
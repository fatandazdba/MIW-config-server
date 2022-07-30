<!doctype html>
<html dir="ltr" lang="es">
<head>
    <meta charset="utf8">
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: fatan
 * Date: 25/01/2019
 * Time: 21:38
 */

$key = "ae90e9a414cba62ac06dc8724fcd9601"; // Meta aquí la clave robada en el apartado 6.
$tarjeta= "U0upaDz4eTeuvv5eLnAN2IU+fbvhjpd6pqaso5ZMcOc="; // Meta aquí el número de tarjeta de crédito del usuario.
$iv = "abcd12344321dcba"; // Meta aquí el vector de inicialización CBC para el usuario.
$cipher = "AES-128-CBC";
$tarjetaDecodificada = base64_decode($tarjeta);
$tarjetaClaro = openssl_decrypt($tarjetaDecodificada, $cipher, $key, OPENSSL_RAW_DATA, $iv);

echo 'Usuario alberto $tarjetaClaro: '. $tarjetaClaro;


$keyAdmin = "204d2d5fdb4f3debd702fbc93cdd1ea1"; // Meta aquí la clave robada en el apartado 6.
$tarjetaAdmin= "MTIzNCA1Njc4IDkwMTIgMzQ1Ng=="; // Meta aquí el número de tarjeta de crédito del usuario.
$ivAdmin = ""; // Meta aquí el vector de inicialización CBC para el usuario.
$cipherAdmin = "AES-128-CBC";
$tarjetaDecodificadaAdmin = base64_decode($tarjeta);
$tarjetaClaroAdmin = openssl_decrypt($tarjetaDecodificadaAdmin, $cipherAdmin, $keyAdmin, OPENSSL_RAW_DATA, $ivAdmin);

echo '<br>Usuario admin $tarjetaClaro: '. $tarjetaClaroAdmin;

?>
</body>
</html>

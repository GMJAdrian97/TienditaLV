<?php 
    require_once 'phpqrcode/qrlib.php';
    // Bariable con la unicacion de la carpeta para guarda los codigo qr 
    $dir = '../Images/qr/';

    // Si la carpeta qr no existe la crea 
    if (!file_exists($dir)) {
        mkdir($dir);
    }

    $filename = $dir.'qr_testf.png';

    $tamanio = 10;
    $level = 'H';
    $frameSize = 3;
    $contenido = "Te amo chula hermosa de mi corazon <3";

    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

    echo '<img src="'.$filename.'" />
    ?>
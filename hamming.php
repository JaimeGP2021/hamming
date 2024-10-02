<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hammerizado</title>
</head>

<body>
    <?php
    require 'auxiliar.php';

    $errores = [];

    $cad1 = comprobar_primera_cadena($errores);
    $cad2 = comprobar_segunda_cadena($errores);

    if (hay_errores($errores)) {
        mostrar_mensajes_error($errores);
    } else {
        $res = distancia_hamming($cad1, $cad2);
        mostrar_resultado($cad1, $cad2, $res);
    }
    ?>
    <a href="index.html"><button>Volver</button></a>
</body>

</html>

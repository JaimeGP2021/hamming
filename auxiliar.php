<?php

function agregar_error($par, $mensaje, &$errores)
{
    if (!isset($errores[$par])) {
        $errores[$par] = [];
    }
    $errores[$par][] = $mensaje;
}

function obtener_parametro($par, $mensaje, &$errores)
{
    if (!isset($_GET[$par])) {
        agregar_error($par, $mensaje, $errores);
        return null;
    }

    return trim($_GET[$par]);

}

function comprobar_no_vacio($cadena, $par, $mensaje, &$errores)
{
    if ($cadena == '') {
        agregar_error($par, $mensaje, $errores);
    }
}

function comprobar_letras($texto, $par, $mensaje, &$errores)
{
    if (ctype_alpha($texto)) {
        agregar_error($par, $mensaje, $errores);
    }
}

function hay_errores($errores)
{
    return !empty($errores);
}

function no_hay_errores($errores, $par)
{
    return !isset($errores[$par]) || empty($errores[$par]);
}

function comprobar_primera_cadena(&$errores)
{
    $cad1 = obtener_parametro('cad1', 'Falta la primera cadena.', $errores);
    if (no_hay_errores($errores, 'cad1')) {
        comprobar_no_vacio($cad1, 'cad1', 'La primera cadena es obligatoria.', $errores);
        if (no_hay_errores($errores, 'cad1')) {
            comprobar_letras($cad1, 'cad1', 'La primera cadena solo puede contener caracteres alfabéticos.', $errores);
        }
    }

    return $cad1;
}

function comprobar_segunda_cadena(&$errores)
{
    $cad2 = obtener_parametro('cad2', 'Falta la segunda cadena.', $errores);
    if (no_hay_errores($errores, 'cad2')) {
        comprobar_no_vacio($cad2, 'cad2', 'La segunda cadena es obligatoria.', $errores);
        if (no_hay_errores($errores, 'cad2')) {
            comprobar_letras($cad2, 'cad2', 'La segunda cadena solo puede contener caracteres alfabéticos.', $errores);
        }
    }

    return $cad2;
}

function mostrar_mensajes_error($errores)
{
    foreach ($errores as $mensajes) {
        foreach ($mensajes as $mensaje) { ?>
            <h3><?= $mensaje ?></h3><?php
        }
    }
}

//
//
function distancia_hamming(string $cad1, string $cad2): int
{
    $longitud = mb_strlen($cad1);

    return $longitud;
}
//
//

function mostrar_resultado($cad1, $cad2, $res)
{ ?>
    <p>La distancia Hamming entre la cadena "<?= $cad1 ?>" y "<?= $cad2 ?>" es de <?= $res ?></p><?php

}

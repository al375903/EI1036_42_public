<?php

function autentificar_usuario()
{
    global $pdo;

    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion o mostar error

    $_SESSION["usuario"] = role
    $_SESSION["usuario_id"] = client_id
    */
    $query = "SELECT * FROM $t_cliente WHERE nombre = ? AND passwd = ?";
    print $_POST;
    $rows=ejecutarSQL($query, [$login[0], $login[1]]);
    if (is_array($rows)) {
        $_SESSION["usuario_id"] = $rows[1][0];
        $_SESSION["usuario"] = $rows[1][3];
    } else {
        print "No registrado";
    }
}

?>
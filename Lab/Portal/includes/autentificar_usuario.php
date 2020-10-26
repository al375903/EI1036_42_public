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
    $nombre_usuario = $_REQUEST["nombre"];
    $passwd_usuario = $_REQUEST["passwd"];
    $query = "SELECT * FROM clientes WHERE name = '$nombre_usuario' AND passwd = '$passwd_usuario'";
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    if (is_array($rows)) {
        $_SESSION["usuario_id"] = array_values(array_values($rows)[0])[0];
        $_SESSION["usuario"] = array_values(array_values($rows)[0])[3];
        print "Success";
    } else {
        print "No registrado";
    }
}

?>
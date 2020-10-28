<?php
    //view_form.php

/**
 * * Descripción: Ejemplo de proyecto
 * *
 * * 
 * *
 * * @author  Rafael Berlanga
 * * @copyright 2020 Rafa B.
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */

session_start();

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/tabla_usuarios.php");

include(dirname(__FILE__)."/includes/ver_cesta.php");

include(dirname(__FILE__)."/includes/registrar_producto.php");

// Descomentar para reiniciar
//include(dirname(__FILE__)."/includes/sqlite_test.php");

if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";
$central = "Partials/centro.php";

switch ($action) {
    case "home":
        $central = "/partials/centro.php";
        break;
    case "ver_usuarios":
        $central = tabla_usuarios();
        break;
    case "login": 
        $central = "/partials/login.php"; //formulario login 
        break;
    case "do_login":
        $central = autentificar_usuario(); //fijar $_SESSION["usuario"]
        $_SESSION["cesta"] = array();
        break;
    case "registrar_usuario":
        $central = "/partials/registro_usuario.php"; //formulario usuarios
        break;
    case "insertar_usuario":
        $central = registrar_usuario("usuarios"); //tabla usuarios
        break;
    case "listar_productos":
        $central = table2html("productos"); //tabla productos
        break;
    case "registrar_producto":
        $central = "/partials/registro_producto.php"; //formulario producto
        break;
    case "insertar_producto":
        $central = registrar_producto("productos"); //tabla productos
        break;
    case "ver_cesta": //falta delete y parece funcionar
        $central = ver_cesta(); //cesta en $_SESSION["cesta"]
        break;
    case "add":
        array_push($_SESSION["cesta"], $_GET["product"]);
        $central = ver_cesta();
        break;
    case "delete":
        if (($key = array_search($_GET["item_id"], $_SESSION["cesta"])) !== false) {
            unset($_SESSION["cesta"][$key]);
        }
        $central = ver_cesta();
        break;
    case "encestar":
        $central = "<p>Todavía no puedo encestar</p>"; //tabla compras
        break;
    case "realizar_compra": //falta
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //cesta en $_SESSION["cesta"]
        break;
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>
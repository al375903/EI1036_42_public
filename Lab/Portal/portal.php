<?php
    //view_form.php

/**
 * * Descripción: Proyecto portal web
 * *
 * * 
 * *
 * * @author  Enrique Gimeno & Edgar Heredia
 * * @copyright 2020 Rafa B.
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */

session_start();

// Descomentar para reiniciar
//include(dirname(__FILE__)."/includes/sqlite_test.php");

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");
include(dirname(__FILE__)."/includes/tabla_productos.php");

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/tabla_usuarios.php");

include(dirname(__FILE__)."/includes/ver_cesta.php");
include(dirname(__FILE__)."/includes/ver_compras.php");

include(dirname(__FILE__)."/includes/registrar_producto.php");
include(dirname(__FILE__)."/includes/registrar_compra.php");


if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";
$central = "Partials/centro.php";
echo "<script>cargarCesta();</script>";

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
    case "ver_productos":
        $central = tabla_productos("productos"); //tabla productos
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
    case "ver_cesta":
        $central = ver_cesta(); //cesta en $_SESSION["cesta"]
        break;
    case "add": //encestar
        //array_push($_SESSION["cesta"], $_GET["product"]);
        echo "<script>anyadirProducto('" . $_GET["product"] . "'); guardarCesta();</script>"; //Comprobar
        $central = table2html("productos");
        break;
    case "comprar":
        $usuario_id = $_SESSION["usuario_id"];
        $productos = $_GET["productos"]; 
        $productos = explode(",", $productos);
        echo "<script>borrarCesta();</script>";
        foreach($productos as $item){
            registrar_compra("compras", $usuario_id, $item);
        }
        $central = "/partials/centro.php";
        break;
    case "delete":
        if (($key = array_search($_GET["item_id"], $_SESSION["cesta"])) !== false) {
            unset($_SESSION["cesta"][$key]);
        }
        $central = ver_cesta();
        break;
    case "realizar_compra":
        $item_id = $_GET["item_id"];
        $usuario_id = $_SESSION["usuario_id"];
        if (($key = array_search($item_id, $_SESSION["cesta"])) !== false) {
            unset($_SESSION["cesta"][$key]);
        }
        $central = registrar_compra("compras", $usuario_id, $item_id); //cesta en $_SESSION["cesta"]
        break;
    case "compras":
        $central = ver_compras();
        break;

    case "upload":
        $target_path = "img/";
        $target_path = $target_path . basename($_FILES["tmp_file"]["name"]);
        move_uploaded_file($_FILES["tmp_file"]["tmp_name"], $target_path);
        $central = "/partials/registro_producto.php"; //redirecciona al formulario
        break;

    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>
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


if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

$central = "Partials/centro.php";

switch ($action) {
    case "home":
        //print $_GET(POST);
        $central = "/partials/centro.php";
        break;
    case "login": 
        $central = "/partials/login.php"; //formulario login 
        break;
    case "do_login": //falta
        $central = autentificar_usuario(); //fijar $_SESSION["usuario"]
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
    case "registrar_producto": //falta
        $central = "/partials/registro_producto.php"; //formulario producto
        break;
    case "insertar_producto": //falta
        $central = registrar_producto("productos"); //tabla productos
        break;
    case "ver_cesta": //falta comprobar
        $central = "<p>Todavia no puedo ver la cesta</p>"; //cesta en $_SESSION["cesta"]
        
        $cesta=$_SESSION["cesta"];
        echo "<ul>";
            foreach($cesta as $k => $v)
                if(0 < strlen($v)){
                    $link = '?action=delete&item_id=' .$k;
                    echo "<li> $v <button href = $link class='boton'>Eliminar</button> </li>";
                } else {
                    echo "Cesta vacía.";
                } 
        echo "</ul>";

        break;
    case "encestar": //falta comprobar
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //tabla compras
        
        $client_id=$_SESSION["usuario_id"];
        $query = "SELECT     * FROM       $t_producto ";
        $rows=ejecutarSQL($query,NULL);
        if (is_array($rows)) {
            print '<table><thead>';
            foreach ( array_keys($rows[0]) as $key) {
                echo "<th>", $key,"</th>";
            }
            echo "<th> Encestar </th>";
            print "</thead>";
            foreach ($rows as $row) {
                print "<tr>";
                foreach ($row as $key => $val) {
                    echo "<td>", "<button href = $link class='boton'>Eliminar</button>", "</td>";
                }
                $link = '?action=add&client_id=' .$client_id .'&product=' .$key;
                echo "<td>", $link, "</td>";
                print "</tr>";
            }
            print "</table>";
        }

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
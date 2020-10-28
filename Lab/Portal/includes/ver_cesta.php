<?php

function ver_cesta()
{
    if(0 >= count($_SESSION["cesta"])){
        echo "Cesta Vacía";
    } else {
        echo "<ul>";
            foreach($_SESSION["cesta"] as $k => $v)
                if(0 < strlen($v)){
                    $link = '?action=delete&item_id=' .$v;
                    echo "<li> $v <a href = $link>Eliminar</a> </li>";
                } else {
                    echo "Cesta vacía.";
                } 
        echo "</ul>";
    }
}

?>
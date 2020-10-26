<?php

function cesta()
{
    if(0 >= count($_SESSION["cesta"])){
        echo "Cesta Vacía";
    } else {
        echo "<ul>";
            foreach($_SESSION["cesta"] as $k => $v)
                if(0 < strlen($v)){
                    $link = '?action=delete&item_id=' .$k;
                    echo "<li> $v <button href = $link class='boton'>Eliminar</button> </li>";
                } else {
                    echo "Cesta vacía.";
                } 
        echo "</ul>";
    }
}

?>
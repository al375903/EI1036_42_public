<?php
global $pdo;
header('Content-type: application/json');
include(dirname(__FILE__)."/includes/conector_BD.php");
$productos=explode(",", $_REQUEST["productos"]);
if (sizeof($productos) == 0) $vacia=true;
else $vacia=false;

$table = 'compras';
$usuario_id = 1;
$fecha = date("Y-m-d");
$query = "INSERT INTO $table (client_id, product_id, date)
                          VALUES (?, ?, ?)";

if($vacia){
    $res = array("resultado" => "KO");
    echo json_encode($res);
} else {
    try{
        foreach($productos as $item_id){
            $consult = $pdo -> prepare($query);
            $a = $consult->execute(array($usuario_id, $item_id, $fecha));
        }
        if (1>$a) $res = array("resultado" => "KO"); //print "<h1> Compra fallida </h1>";
        else $res = array("resultado" => "OK"); //print "<h1> Compra realizada! </h1>";
        echo json_encode($res);
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}
?>
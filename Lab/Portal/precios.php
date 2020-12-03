<?php
global $pdo;
header('Content-type: application/json');
include(dirname(__FILE__)."/includes/conector_BD.php");

if (isset($_REQUEST['min'])) $precioMin = $_REQUEST["min"];
else $precioMin = "0";

if (isset($_REQUEST['max']) && $_REQUEST['max']>=0){
    $precioMax = $_REQUEST["max"];
    $result = $pdo -> prepare("SELECT * FROM productos where price between $precioMin and $precioMax");
} else {
    $result = $pdo -> prepare("SELECT * FROM productos where price > $precioMin");
}

$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos); 
?>
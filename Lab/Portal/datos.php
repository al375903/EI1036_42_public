<?php
global $pdo;
header('Content-type: application/json');
include(dirname(__FILE__)."/includes/conector_BD.php");
$result = $pdo -> prepare("SELECT * FROM productos");
$result->execute();
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos); 
?>
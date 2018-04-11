<?php
require_once 'conn.php ';
// Script abaixo verifica quantos usuarios online no sistema
$num_online = null;
$sql="select COUNT(*) as num_online from log where data_fim is null;";
$stmt = $pdo->prepare($sql); 
$stmt -> execute(array($num_online));
$num_online = $stmt->fetchColumn();
echo "Seu sistema está com ".$num_online." usuarios online";

?>


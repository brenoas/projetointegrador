<?php
session_start();
$_SESSION['data_inicio'] = date('Y-m-d h:i:s');

//Script abaixo coleta o ip do usuario e armazena na tabela de log.
$ip = $_SERVER["REMOTE_ADDR"];
$sqlLog = $pdo->prepare("INSERT INTO log SET ip=:ip, data_inicio=:data_inicio, data_fim=:data_fim, id_empresa=:idemp, idUsuario=:idUsuario ;"); //pdo ja foi iniciado no conexao.php
        $sqlLog -> bindValue(":ip", $ip);
		$sqlLog -> bindValue(":data_inicio", $_SESSION['data_inicio']);
		$sqlLog -> bindValue(":data_fim", NULL);
		$sqlLog -> bindValue(":idemp", $_SESSION['loginEmp']);
		$sqlLog -> bindValue(":idUsuario", NULL);
		$sqlLog -> execute();		

?>
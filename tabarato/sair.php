<?php
session_start(); //inicia sessão
require_once 'conn.php';
		$sqlSair = $pdo->prepare("SELECT * FROM log WHERE id_empresa=:idemp && data_inicio=:data_inicio");
        $sqlSair -> bindValue(":idemp", $_SESSION['loginEmp']);
		$sqlSair -> bindValue(":data_inicio", $_SESSION['data_inicio']);
        $sqlSair -> execute();
		$res = array();
        //verificar se achou retorno
        if($sqlSair -> rowCount() > 0){
            $res = $sqlSair->fetch();//pegando os dados
        }
		$sqlSair = $pdo->prepare("UPDATE log SET data_fim = NOW() WHERE id=:idLog;");
        $sqlSair -> bindValue(":idLog", $res['id']);
        $sqlSair -> execute();
unset($_SESSION['loginEmp']); //desloga o id logado
header("Location: login.php");
exit; //fecha conexão da pagina atual com bd 

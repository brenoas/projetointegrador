<?php

// Script abaixo pega as informações do formulário para o arquivo set.php
if(isset($_POST['rsocial']) && empty($_POST['rsocial']) == false)	{
	$rsocial = addslashes(ucwords($_POST['rsocial']));
    $nfantasia = addslashes(ucwords($_POST['nfantasia']));
    $cnpj = addslashes($_POST['cnpj']);
    $estado = addslashes($_POST['estado']);
    $cidade = addslashes($_POST['cidade']);
    $bairro = addslashes($_POST['bairro']);
	$rua = addslashes(ucwords($_POST['rua']));
    $cep = addslashes($_POST['cep']);
    $num = addslashes($_POST['num']);
    $comp = addslashes($_POST['comp']);
	$ref = addslashes($_POST['ref']);
	
	//Inicio do script para verificar qual tipo de endereço o usuario inseriu em seu cadastro
	if(isset($_POST['tipocob']) && !isset($_POST['tipocom'])){
		$tipoend = $_POST['tipocob'];	//se apenas o endereço de cobrança
	}
	if(isset($_POST['tipocom']) && !isset($_POST['tipocob'])){
		$tipoend = $_POST['tipocom']; // se apenas endereço comercial
	}
	if (isset($_POST['tipocom']) && isset($_POST['tipocob'])){
		$tipoend = 3; // se endereço comercial e cobrança ao mesmo tempo
	}
	//Fim do script para verificar qual tipo de endereço o usuario inseriu em seu cadastro
	
	$telcom = addslashes($_POST['telcom']);
	$celcom = addslashes($_POST['celcom']);
	$site = addslashes($_POST['site']);
	$resp = addslashes(ucwords($_POST['resp']));
	$cpf = addslashes($_POST['cpf']);
	$cargo = addslashes(ucwords($_POST['cargo']));
	$celresp = addslashes($_POST['celresp']);
    $email = addslashes($_POST['email']);
	$senha = addslashes(md5($_POST['senha']));
    $tipo = addslashes($_POST['tipo']);
    $num = addslashes($_POST['num']);	
	
}

   ?>
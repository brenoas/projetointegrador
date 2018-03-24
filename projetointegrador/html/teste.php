<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"/>
	<meta charset="UTF-8"/>
	<title>Curso de PHP</title>
	<style>
		div {
			margin-left: 25%;
			width: 500px;
			border: 1px solid;
		}

		input {
			margin-bottom: 10px;	
		}
	</style>
</head>
<body>
<div>
	<?php
		$resp = isset($_GET["responsavel"])?$_GET["responsavel"]:"[nao informado]";
		$name = isset($_GET["nome"])?$_GET["nome"]:"[nao informado]";
		$nomf = isset($_GET["nomeFantasia"])?$_GET["nomeFantasia"]:"[nao informado]";
		$cnpj = isset($_GET["cnpj"])?$_GET["cnpj"]:"[nao informado]";
		$cep = isset($_GET["cep"])?$_GET["cep"]:"[nao informado]";
		$end = isset($_GET["endereco"])?$_GET["endereco"]:"[nao informado]";
		$bairro = isset($_GET["bairro"])?$_GET["bairro"]:"[nao informado]";
		$cid = isset($_GET["cidade"])?$_GET["cidade"]:"[nao informado]";
		$uf = isset($_GET["uf"])?$_GET["uf"]:"[nao informado]";
		$tel = isset($_GET["telefone"])?$_GET["telefone"]:"[nao informado]";
		$ref = isset($_GET["referencial"])?$_GET["referencial"]:"[nao informado]";
		$web = isset($_GET["website"])?$_GET["website"]:"[nao informado]";
		$email = isset($_GET["email"])?$_GET["email"]:"[nao informado]";
		
		
		echo "$resp <br/><br/>
			  $name <br/><br/>
			  $nomf <br/><br/>
			  $cnpj <br/><br/>
			  $cep <br/><br/>
			  $end <br/><br/>
			  $bairro <br/><br/>
			  $cid <br/><br/>
			  $uf <br/><br/>
			  $tel <br/><br/>
			  $ref <br/><br/>
			  $web <br/><br/>
			  $email";
		
	?>
	
</div>
<a href="cadastroloja.php">Voltar</a>
</body>
</html>
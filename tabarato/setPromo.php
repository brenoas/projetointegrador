<?php 
//script abaixo insere as informações no banco
if(isset($_POST['nome']) && empty($_POST['nome']) == false){

		
		if($arquivo){
				//Script abaixo insere informações coletadas através do arquivo setPromo.php na tabela PRODUTO
				$sql = $pdo->prepare("INSERT INTO produto SET nome=:nome, descricao=:desc, categoria_id=:categoria, ativo=1, sob=:sobrescrever"); //pdo ja foi iniciado no conexao.php
				$sql -> bindValue(":nome", $nome);
				$sql -> bindValue(":desc", $desc);
				$sql -> bindValue(":categoria", $categoria);
				$sql -> bindValue(":sobrescrever", $sobrescrever);
				$sql -> execute();	
				$idProduto = $pdo->lastInsertId();//pegando id do produto		
				
				
				//Script abaixo insere informações coletadas através do arquivo setPromo.php na tabela EMPRESA_PRODUTO
				$sqlEmpProd = $pdo->prepare("INSERT INTO empresa_produto SET empresa_id=:id, produto_id=:idProduto, data_inicio=:data_inicio, data_fim=:data_fim, valor=:valor"); //pdo ja foi iniciado no conexao.php
				$sqlEmpProd -> bindValue(":id", $id);
				$sqlEmpProd -> bindValue(":idProduto", $idProduto);
				$sqlEmpProd -> bindValue(":data_inicio", $data_inicio);
				$sqlEmpProd -> bindValue(":data_fim", $data_fim);
				$sqlEmpProd -> bindValue(":valor", $valor);
				$sqlEmpProd -> execute();
				
				
				$sqlImg = $pdo->prepare("INSERT INTO imagem SET nome=:nomeArq, idProduto=:idProduto");
				$sqlImg -> bindValue(":nomeArq", $nomeArq);
				$sqlImg -> bindValue(":idProduto",$idProduto);
				$sqlImg -> execute();
				
				
				
		}
		
		//mensagem de erro
}
//mensagem de erro

?>
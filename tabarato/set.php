<?php
//http://www.linhadecodigo.com.br/artigo/244/upload-de-arquivos-em-php.aspx
//script abaixo insere na tabela empresa as informações pegas no arquivo get.php
//http://www.consultarcep.com.br/resultados.html?q=20960160
if(isset($_POST['rsocial']) && empty($_POST['rsocial']) == false){
	
		$sql = $pdo->prepare("INSERT INTO empresa SET razao_social=:rsocial, fantasia=:nfantasia, cnpj=:cnpj, senha=:senha, email=:email, telcom=:telcom, celcom=:celcom, site=:site, nome_responsavel=:resp, cpf=:cpf, cargo=:cargo, celresp=:celresp ;"); //pdo ja foi iniciado no conexao.php
        $sql -> bindValue(":rsocial", $rsocial);
		$sql -> bindValue(":nfantasia", $nfantasia);
		$sql -> bindValue(":cnpj", $cnpj);
		$sql -> bindValue(":senha", $senha);
		$sql -> bindValue(":email", $email);
		$sql -> bindValue(":telcom", $telcom);
		$sql -> bindValue(":celcom", $celcom);
		$sql -> bindValue(":site", $site);
		$sql -> bindValue(":resp", $resp);
		$sql -> bindValue(":cpf", $cpf);
		$sql -> bindValue(":cargo", $cargo);
		$sql -> bindValue(":celresp", $celresp);
		$sql -> execute();
		$idEmpresa -> $pdo->lastInsertId();
			
			
		//script abaixo insere na tabela logradouro algumas informações a respeito do endereço do usuario pegas no arquivo get.php
			
			$sqlBairro = $pdo->prepare("INSERT INTO logradouro SET idBairro=:idBairro, idTipo=:tipoend, nome=:rua, cep=:cep, cidade_id=:cidade_id;"); //pdo ja foi iniciado no conexao.php
			$sqlBairro -> bindValue(":idBairro", $bairro);
			$sqlBairro -> bindValue(":tipoend", $tipoend); //verificar 
			$sqlBairro -> bindValue(":rua", $rua);
			$sqlBairro -> bindValue(":cep", $cep);
			$sqlBairro -> bindValue(":cidade_id", $cidade);
			$sqlBairro -> execute();
			$idLogradouro -> $pdo->lastInsertId();
		
		//script abaixo insere na tabela arquivo os documentos de razão social da empresa matriz pegas no arquivo tratarArquivo.php
		if($arquivo){
			$sqlArquivo = $pdo->prepare("INSERT INTO arquivo SET nome=:nomeArq, tipo=:tipoArq, razao_social=:rsocial;"); //pdo ja foi iniciado no conexao.php
			$sqlArquivo -> bindValue(":nomeArq", $nomeArq);
			$sqlArquivo -> bindValue(":tipoArq", $tipoArq);
			$sqlArquivo -> bindValue(":rsocial", $rsocial);
			$sqlArquivo -> execute();
		}
		
		$sqlLogradouro = $pdo->prepare("INSERT INTO usuario_empresa_logradouro SET usuario_publico_id = null, empresa_id =:idEmpresa, logradouro_id=:idLogradouro, numero=:num, complemento=:comp, referencia=:ref");
		$sqlLogradouro -> bindValue(":idEmpresa", $idEmpresa);
		$sqlLogradouro -> bindValue(":idLogradouro", $idLogradouro);
		$sqlLogradouro -> bindValue(":num", $num);
		$sqlLogradouro -> bindValue(":comp", $comp);
		$sqlLogradouro -> bindValue(":ref", $ref);
}

?>

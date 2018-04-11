<?php 
//Script abaixo pega o arquivo para armazenar no banco e no servidor
	$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE; //operador ternário: a variavel arquivo vai armazenar o arquivo se foi configurado e se nao foi vai armazenar o valor false
	if($arquivo){
		//Pegando as informações importantes para inserir no banco
		$tipoArq = addslashes($arquivo["type"]);
		
		// Tamanho máximo do arquivo em bytes
		$maximo = 40000000; //= 40MB
		
		// Verificação
		if($arquivo["size"] > $maximo){
			echo "Erro! O arquivo enviado por você ultrapassa o "; 
			echo "limite máximo de " . $maximo . " bytes! Envie outro arquivo";
			exit;
		}
		// Tamanho ultrapassa o MAX_FILE_SIZE do formulario
		if($arquivo["error"] == UPLOAD_ERR_FORM_SIZE){
			
			echo "O tamanho de seu arquivo ultrapassa o limite dado! Envie outro arquivo";
			exit;
			
		}
		
		// Tamanho ultrapassa o limite da configuração upload_max_filesize do php.ini 
		if($arquivo["error"] == UPLOAD_ERR_INI_SIZE){
			echo "O tamanho de seu arquivo ultrapassa o limite de tamanho de arquivo do PHP! "; 
			echo "Envie outro arquivo";    
			exit;

		}
		
		//diretorio do arquivo
		$diretorio = "arquivos/";
		
		// Substitui espaços por underscores no nome do arquivo 
		$nome = str_replace(" ", "_", $rsocial."-".$arquivo["name"]); 
		
		// Todas as letras em minúsculo 
		$nome = strtolower($nome);
		
		//nome para colocar no banco
		$nomeArq = addslashes(strtolower($nome));
		
		// Caminho completo do arquivo 
		$nome = $diretorio . $nome;
		
		// Verifica se o arquivo existe no diretório dado 
		if(file_exists($nome)) { 
			echo "Esta Razão social ja consta em nosso sistema! Envie outro arquivo!"; 
			exit; 
		}
		
		// Tudo ok! Então, move o arquivo 
		if(move_uploaded_file($arquivo["tmp_name"], $nome)) { 
			echo "Arquivo Enviado com sucesso!"; //fazer um script para exibir uma mensagem no else
		}

	}	

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"/>
	<meta charset="UTF-8"/>
	<title>Curso de PHP</title>
	<style>
		.forma {
			margin-left: 25%;
			width: 500px;
		}
		fieldset {
			margin-bottom: 25px;
		}
		input {
			margin-bottom: 10px;	
		}

	</style>
</head>
<body>
<div class="forma">
	<form method="get" action="teste.php">
		<fieldset>
		<legend>Dados da Empresa</legend>
		<label for="responsavel">Responsável:</label><br/>
		<input type="text" name="responsavel" size="50" maxlength="255" placeholder="Inserir responsável"  /><br/>
		<legend for="nome">Razão Social:</legend>
		<input type="text" name="nome" size="50" maxlength="255" placeholder="Inserir razão social" /><br/>
		<legend for="nomeFantasia">Nome Fantasia:</label></br>
		<input type="text" name="nomeFantasia" size="50" maxlength="255" placeholder="Inserir nome fantasia"/><br/>
		<label for="cnpj">CNPJ:</label><br/>
		<input type="number" name="cnpj" maxlength="18" placeholder="Inserir CNPJ" /><br/>
		</fieldset>
		
		<fieldset>
		<legend>Localidade</legend>
		<label for="cep">CEP:</label></br>
		<input type="number" name="cep" placeholder="Inserir cep" /></br>
		<label for="endereco">Endereço:</label><br/>
		<input type="text" name="endereco" maxlength="150" placeholder="Inserir endereco" /></br>
		<label for="bairro">Bairro:</label><br/>
		<input type="text" name="bairro" size="30" maxlength="45" placeholder="Inserir bairro" /></br>
		<label for="cidade">Cidade:</label></br>
		<input type="text" name="cidade" size="20" placeholder="Inserir cidade" /><br/>
		<label for="uf">UF:</label></br>
		<select name="uf">
			<option>AC</option>
			<option>AL</option>
			<option>AM</option>
			<option>AP</option>
			<option>BA</option>
			<option>CE</option>
			<option>DF</option>
			<option>ES</option>
			<option>GO</option>
			<option>MA</option>
			<option>MG</option>
			<option>MS</option>
			<option>MT</option>
			<option>PA</option>
			<option>PB</option>
			<option>PE</option>
			<option>PI</option>
			<option>PR</option>
			<option selected>RJ</option>
			<option>RN</option>
			<option>RO</option>
			<option>RR</option>
			<option>RS</option>
			<option>SC</option>
			<option>SE</option>
			<option>SP</option>
			<option>TO</option>
		</select><br/><br/>
		</fieldset>
		
		<fieldset>
		<legend>Contato</legend>
		<label for="telefone">Telefone:</label></br>
		<input type="number" name="telefone" maxlength="20" placeholder="Inserir telefone" /><br/>		
		<label for="referencial">Referencial:</label></br>
		<input type="text" name="referencial" size="50" maxlength="255" placeholder="Inserir referencial" /><br/>
		<label for="website">Website:</label></br>
		<input type="text" name="website" size="50" maxlength="100" placeholder="Inserir website"/><br/>
		<label for="email">Email:</label></br>
		<input type="email" name="email" size="50" maxlength="100" placeholder="Inserir email" /><br/>
		</fieldset>
	
		<input type="submit" value="Cadastrar"/>
		
				
	</form>
</div>
</body>
</html>
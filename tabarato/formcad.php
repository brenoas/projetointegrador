<?php
require_once 'conn.php';
require_once 'get.php';
require_once 'tratarArquivo.php';
require_once 'set.php';
//https://pt.stackoverflow.com/questions/99107/listar-estados-cidades-e-bairros-em-formul%C3%A1rio-de-cadastro
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
    $('#estado').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'consulta.php',
            dataType: 'html',
            data: {'estado': $('#estado').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#cidade').attr('disabled', 'disabled');
                $('#cidade').html('<option value="">Carregando...</option>');

                $('#bairro').html('<option value="">Selecione uma cidade</option>');
                $('#bairro').attr('disabled', 'disabled');
            },
            // Após carregar, coloca a lista dentro do select de cidades.
            success: function(data) {
                if ($('#estado').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
                    $('#cidade').html('<option value="">Selecione</option>');
                    $('#cidade').append(data);
                    $('#cidade').removeAttr('disabled').focus();
                } else {
                    $('#cidade').html('<option value="">Selecione um estado</option>');
                    $('#cidade').attr('disabled', 'disabled');

                    $('#bairro').html('<option value="">Selecione uma cidade</option>');
                    $('#bairro').attr('disabled', 'disabled');
                }
            }
        });
    });

    $('#cidade').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'lista_bairros.php',
            dataType: 'html',
            data: {'cidade': $('#cidade').val()},
            // Antes de carregar os registros, mostra para o usuário que está
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#bairro').attr('disabled', 'disabled');
                $('#bairro').html('<option value="">Carregando...</option>');
            },
            // Após carregar, coloca a lista dentro do select de bairros.
            success: function(data) {
                if ($('#cidade').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
                    $('#bairro').html('<option value="">Selecione</option>');
                    $('#bairro').append(data);
                    $('#bairro').removeAttr('disabled').focus();
                } else {
                    $('#bairro').html('<option value="">Selecione uma cidade</option>');
                    $('#bairro').attr('disabled', 'disabled');
                }
            }
        });
    });
});</script>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            Razão Social: 
            <input type="text" name="rsocial" /><br/>
            Nome Fantasia:
            <input type="text" name="nfantasia" /><br/>
            CNPJ:
            <input type="text" name="cnpj" /><br/>
            Estado:
            <select id="estado" name="estado">
                <option>Selecione...</option>
                <?php
				//Script abaixo pega os dados da tabela ESTADO e mostra no campo select para o usuário.
                 $sql = "SELECT * FROM estado";
                 $sql = $pdo->query($sql);
                 if($sql->rowCount() > 0){
                    
                    foreach($sql->fetchAll() as $estado){ //fazendo loop e colocando as informações na variavel usuario
                        echo "<option value=".$estado["id"].">".$estado["nome"]."</option>";
                    }
                }
                
                ?>
                
            </select><br/>
            <label for="cidade">Cidade:</label>
            <select name="cidade" id="cidade" disabled required>
                <option value="">Selecione uma cidade</option>
            </select><br>
			<label for="bairo">Bairro:</label>
            <select name="bairro" id="bairro" required title="Caso seu bairro não esteja aqui, entre em contato conosco.">
                <option value="">Selecione um Bairro</option>
            </select><br>
            <label for="rua">Rua:</label>
            <input type="text" name="rua" id="rua" /><br/>
			
			<label for="cep">CEP:</label></label>
            <input type="text" name="cep" id="cep" /><br/>
			
            <label for="num">Número:</label>
            <input type="text" name="num" id="num"/><br/>
			
            <label for="comp">Complemento:</label>
            <input type="text" name="comp" id="comp"/><br/>
			
			<label for="ref">Referência:</label>
            <input type="text" name="ref" id="ref"/><br/>
			
			<input type="checkbox" value="1" name="tipocom" id="tipocom"><label for="tipocom">Comercial<label>		
			<br>
			<input type="checkbox" value="2" name="tipocob" id="tipocob"><label for="tipocob">Cobrança<label>		
			<br>
			<label for="telcom">Telefone Comercial:</label>
            <input type="text" name="telcom" id="telcom" /><br/>
			
			<label for="celcom">Celular:</label>
            <input type="text" name="celcom" id="celcom" /><br/>
			
			<label for="site">Site:</label>
            <input type="text" name="site" id="site" /><br/>
			
            <label for="resp">Responsavel:</label>
            <input type="text" name="resp" id="resp"/><br/>
			
			<label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" /><br/>
			
			<label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo" required/><br/>
			
			<label for="celresp">Celular:</label>
            <input type="text" name="celresp" id="celresp" /><br/>
			
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email"/><br/>
			
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha"/><br/>
			
            <br/><!--Os campos matriz e filial devem estar bem separados -->
            <label for="matriz">Matriz<input type="radio" id="matriz" name="tipo" value="1"></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label for="filial">Filial<input type="radio" id="filial" name="tipo" value="2"></label>
            <br/><!--O campo arquivo deve possuir uma regra para apenas ser exibido quando usuário clicar em matriz-->
			<input type="hidden" name="MAX_FILE_SIZE" value="40000000">
            <input type="file" name="arquivo"/><br/><br/><br/>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>

<?php
session_start();

if (isset($_SESSION['loginEmp']) && empty($_SESSION['loginEmp']) == false) {//se estiver uma sesssao banco logada e se nao estiver em branco
    //tem pessoa logada
	$id = $_SESSION['loginEmp'];
	

} else {
    header("Location: sair.php");
    
}
require_once 'conn.php';
require_once 'getPromo.php';
require_once 'tratarImagem.php';
require_once 'setPromo.php';

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimun-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--Compatibilidade com Edge-->
        <meta charset="UTF-8">
        <title>Sistema de Vales</title>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="js/data.js" type="text/javascript"></script>
        <meta name="description" content="Ganhe tempo e agilidade com o Sistema de Controle de Vales online do Vlademir"/>
        <meta name="keywords" content="Sistema, Controle Vales, Financeiro, Controle, Vale"/>
        <meta name="robots" content="noindex, nofollow"> <!-- orienta os buscadores a n�o indexar o conte�do da p�gina e impede-a de seguir os links para descobrir novas p�ginas-->
        <meta name="author" content="Vlademir Junior">
		<link rel="stylesheet" type="text/css" href="bootstrap.min"/>
        <link rel="shortcut icon" href="_assets/_img/icon.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="_assets/_css/bootstrap.min.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">TÁ BARATO </a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">PROMOÇÃO</a></li>
                        <li><a href="consulta.php">CONSULTA</a></li>
                        <li><a href="relatorio.php">AVALIAÇÕES</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
						<li><a style="color: #fff;"><?php echo "Bem-Vindo(a), ".$_SESSION['respEmp'];?></i></a></li>
                        <li><a class="btn" href="sair.php" >Sair <i class="glyphicon glyphicon-off"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <form method="POST" class="form-group"  enctype="multipart/form-data">
				
                    <label for="sim"><input type="radio" name="sobrescrever" id="sim" value="1" checked> Sim, matriz pode sobrescrever o valor</label><br>
                    <label for="nao"><input type="radio" name="sobrescrever" id="nao" value="0"> Não, matriz não pode sobrescrever o valor</label><br/>
                    <label for="valor">Valor do Produto:</label>
                    <input type="text" maxlength="15" name="valor"  placeholder="R$ 0.00" id="valor" class="form-control" autofocus />
                    <script type="text/javascript">
                        $(function () {
                            $("#valor").maskMoney();
                        })
                    </script>
                    <label for="nome">Nome do Produto: </label>
                    <input type="text" name="nome" id="nome" required title="Apenas Letras!" class="form-control"/>
					<br/>
					<input type="hidden" name="MAX_FILE_SIZE" value="40000000">
					<input type="file" class="form-control" name="arquivo"/><br/><br/><br/>
					
					<label for="categoria">Categoria</label>
					<select id="categoria" name="categoria" class="form-control">
						<option>Selecione...</option>
						<?php
						//Script abaixo pega os dados da tabela ESTADO e mostra no campo select para o usuário.
						 $sql = "SELECT * FROM categoria WHERE ativo = 1";
						 $sql = $pdo->query($sql);
						 if($sql->rowCount() > 0){
							
							foreach($sql->fetchAll() as $categoria){ //fazendo loop e colocando as informações na variavel usuario
								echo "<option value=".$categoria["id"].">".$categoria["nome"]."</option>";
							}
						}
						
						?>
						
					</select><br/>           
					
                    <label for="data_inicio">Início da promoção: </label><br/>
                    <input type="date" name="data_inicio" required class="form-control" id="data_inicio" onChange="valida()"/>
					<input type="time" name="time_inicio" required class="form-control" id="time_inicio" onChange="valida()"/>
					<br/>
					<label for="data_fim">Fim da promoção: </label><br/>
                    <input type="date" name="data_fim" onChange="valida()" required class="form-control" id="data_fim"/>
					<input type="time" name="time_fim" onChange="valida()" required class="form-control" id="time_fim"/>
                    <br/><br/>
					<div class="alert alert-danger" role="alert" id="aviso" style="display: none;">
						
					</div>
					<textarea name="desc" maxlength="255" class="form-control" rows="3" cols="20" id="textarea" placeholder="Descrição desta promoção aqui"></textarea>
					<br/><br/>
                    <input type="submit" class="btn btn-primary" value="LANÇAR PROMOÇÃO" />
                </form>
            </div>
        </section>


    </body>
</html>

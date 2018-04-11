<?php
session_start();
date_default_timezone_set('America/Sao_Paulo'); //definindo timezone para que pegue data e hora correta
require 'conn.php';
    if(isset($_SESSION['loginEmp']) && empty($_SESSION['loginEmp']) == false){
        header("Location: painelmercado.php");//se usuario tiver logado
        exit; //para que todo o codigo abaixo nao seja executado
    }

    if(isset($_POST['email']) && empty($_POST['email']) == FALSE){ // verificando
            
        $email = addslashes($_POST['email']);
        
        $senha = addslashes($_POST['senha']);

        
        
        $sql = $pdo->prepare("SELECT * FROM empresa WHERE email = :email && senha = :senha && status=2");
        $sql -> bindValue(":email", $email);
        $sql -> bindValue(":senha", md5($senha));
        $sql -> execute();
        //verificar se achou retorno
        if($sql -> rowCount() > 0){
            $sql = $sql->fetch();//pegando os dados
            $_SESSION['loginEmp'] = $sql['id'];
			$_SESSION['respEmp'] = $sql['nome_responsavel'];
			require_once 'log.php';			
            header("Location: painelmercado.php");
            exit; //para que todo o codigo abaixo nao seja executado
        } else {
            echo "<script type='text/javascript'>alert('Usuário ou Senha Incorretos.')</script>";
        }
        
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimun-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--Compatibilidade com Edge-->
        <meta charset="UTF-8">
        <title>Login Tabarato</title>
        <script src="_assets/_js/jquery-1.8.2.js"></script>
        <script src="_assets/_js/bootstrap.min.js"></script>

        <meta name="description" content="Ganhe tempo e agilidade com o Sistema de Lançamento de Promoções online do Tá Barato"/>
        <meta name="keywords" content="Promoções, Mercado, Super Mercado, Promoção, Barato, Tempo"/>
        <meta name="robots" content="index, follow"> <!-- orienta os buscadores a n�o indexar o conte�do da p�gina e impede-a de seguir os links para descobrir novas p�ginas-->
        <meta name="author" content="Senac 2019">

        <link rel="shortcut icon" href="_assets/_img/icon.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="_assets/_css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="login.css" type="text/css">
        
    </head>
    <body>
        <div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="POST" role="login">
          <img src="_assets/_img/pd.jpg" class="img-responsive img-circle" alt="" />
          <input type="text" name="email" placeholder="Usuário" required class="form-control input-lg"  />
          
          <input type="password" name="senha" class="form-control input-lg" id="password" placeholder="Senha" required="" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Entrar</button>
          <div>
            <a href="login.php">Área Restrita</a>
          </div>
          
        </form>
        
        <div class="form-links">
          <a href="login.php">www.tabarato.com</a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
  
  <p>
    <a href="restrito.php" target="_blank"><small>Vlademir Junior</small></a>
    <br>
    <br>
    
  </p>     
  
  
</div>
    </body>
</html>
<?php 
//script abaixo pega as informações para o cadastro de promoções
if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $sobrescrever = $_POST['sobrescrever'];
	$valor = addslashes($_POST['valor']);
	$nome = addslashes(ucwords($_POST['nome']));
    $categoria = $_POST['categoria'];
    $data_inicio = $_POST['data_inicio']." ".$_POST['time_inicio'];
	$data_fim = $_POST['data_fim']." ".$_POST['time_fim'];
    $desc = addslashes($_POST['desc']);

}
?>
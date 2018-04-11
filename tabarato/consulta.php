<?php
require_once 'conn.php';
// Uma forma de obter $_POST['estado'] mais segura
$estado_id = filter_input(INPUT_POST, 'estado', FILTER_VALIDATE_INT);

$sqlCidade = 'SELECT * FROM cidade WHERE estado_id = :estado_id ORDER BY nome ASC';
$resCidade = $pdo->prepare($sqlCidade);
$resCidade->execute(array(
    ':estado_id' => $estado_id
));
$cidades = $resCidade->fetchAll();
?>


<?php foreach ($cidades as $cidade) { ?>
    <option value="<?php echo $cidade['id'] ?>"><?php echo $cidade['nome'] ?></option>
<?php } ?>
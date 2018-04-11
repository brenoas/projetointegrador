<?php
require_once 'conn.php';
// Uma forma de obter $_POST['estado'] mais segura
$cidade_id = filter_input(INPUT_POST, 'cidade', FILTER_VALIDATE_INT);

$sqlBairro = 'SELECT * FROM bairro WHERE cidade_id = :cidade_id ORDER BY nome ASC';
$resBairro = $pdo->prepare($sqlBairro);
$resBairro->execute(array(
    ':cidade_id' => $cidade_id
));
$bairros = $resBairro->fetchAll();
?>


<?php foreach ($bairros as $bairro) { ?>
    <option value="<?php echo $bairro['id'] ?>"><?php echo $bairro['nome'] ?></option>
<?php } ?>
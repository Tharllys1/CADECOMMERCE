<?php
include_once('controller/conexao.php');

$categotia     = $_POST['categoria'];
$marca         = $_POST['marca'];
$nome_produto  = $_POST['nome'];
$descricao     = $_POST['descricao'];
$estoque       = $_POST['estoque'];
$preco         = $_POST['preco'];

$grava_produto = "INSERT INTO produtos(IDCATEGORIA, IDMARCA, NOME, DESCRICAO, ESTOQUE, PRECO) VALUES ('$categotia', '$marca', '$nome_produto', '$descricao', '$estoque', '$preco')";

$result_gravacao = mysqli_query($mysqli, $grava_produto);

if(mysqli_affected_rows($mysqli) != 0){
    echo "
        <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=produtos.php'>
        <script type=\"text/javascript\">
            alert('Produto cadastrado com sucesso');
        </script>

    ";
}else{
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = 'O; URL=produtos.php'>
    <script type=\"text/javascript\">
        alert('Produto não cadastrado');
    </script>
    ";
}
?>
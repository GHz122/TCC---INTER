<?php 
    include("../../estrutura/conexao.php");
    $marca = $_POST['txMarca'];

    try {
        $stmt = $pdo->prepare("insert into marcas values (default,'$marca'); ");
        $stmt->execute();

        header("Location: ../inserirProduto.php");

    }catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

?>
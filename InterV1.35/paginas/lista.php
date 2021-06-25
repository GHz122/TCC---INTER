<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
    if($_SESSION['Status'] != 1) {
        header("Location: ../index.php");
    }
?>
/*Exibindo os Produtos*/
<br><br><br>
<div class="blocoProdutos-alterar">
    <?php 
        try{
            $stmtProd = $pdo->prepare("select * from Produtos");
            $stmtProd->execute();

            while ($row = $stmtProd->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <!-- /*Exibir*/ -->
        <div class="Produto-alterar">
            <div class="imgProduto-alterar">
                <img src="../img/imgShop/<?php echo $row['p_adressImage']; ?>" alt="">
            </div>
            <div class="nomeProduto-alterar">
                <h3><?php echo $row['p_nome']; ?></h3>
            </div>
            <div class="valProduto-alterar">
                <h3>R$ <?php echo $row['p_val']; ?></h3>
            </div>
            <div class="btnProduto-alterar">
                <a href="alterarProduto.php?id=<?php echo $row['p_ID']; ?>&categoria=<?php echo $row['p_categoria']; ?>&marca=<?php echo $row['p_marca']; ?>&sexo=<?php echo $row['p_sexo']; ?>"> <button class="btn1-alterar" >&#x270E;   Alterar</button></a>
                <a href="alteracaoBD/excluirProdutoPHP.php?id=<?php echo $row['p_ID']; ?>"><button class="btn2-alterar" >&#x2718;   Excluir </button></a>
            </div>
        </div> 
    
    <?php 
            }

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    ?>
</div>
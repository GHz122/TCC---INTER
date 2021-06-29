<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
    if($_SESSION['Status'] != 1) {
        header("Location: ../index.php");
    }
?>
/*Exibindo os Usuarios*/
<br><br><br>
<div class="blocoProdutos-alterar">
    <?php 
        try{
            $stmt = $pdo->prepare("select * from usuario");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {  
    ?>
    <!-- /*Exibir*/ -->
        <div class="Produto-alterar">
            <div class="imgProduto-alterar">
                <img src="../img/perfil/<?php echo $row['U_img']; ?>" alt="Imagem do Usuário">
            </div>
            <div class="nomeProduto-alterar">
                <h3><?php echo $row['U_nome']; ?></h3>
            </div>
            <div class="valProduto-alterar">
                <h3>Status: <?php echo $row['U_status']; ?></h3>
            </div>
            <div class="btnProduto-alterar">
                <a href="alterarUsuario.php?id=<?php echo $row['U_id']; ?>&estado=<?php echo $row['U_estado'] ?>"><button class="btn1-alterar" >&#x270E;  Alterar</button></a>
                <a href="alteracaoBD/excluirUsuarioPHP.php?id=<?php echo $row['U_id']; ?>"><button class="btn2-alterar">&#x2718;   Excluir</button></a>
            </div>
        </div> 
    
    <?php 
            }

        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    ?>
</div>
<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    if($_SESSION['Status'] != 1) {
        header("Location: ../index.php");
    }
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
?>

<div class="maincontainer-adm">
    <div class="containerFunc-adm">
        <div class="texto-adm">
            <h1>ÁREA ADMINISTRATIVA</h1>
        </div>
        <div class="containerbtn-adm">
            <div class="blocoBtn-adm">
                <a href="inserirProduto.php"><button class="btn1-adm" > INSERIR PRODUTO </button></a>
            </div>
            <div class="blocoBtn-adm">
                <button class="btn2-adm" > ALTERAR USUÁRIOS </button>
            </div>
            <div class="blocoBtn-adm">
                <button class="btn3-adm" > ALTERAR PRODUTO </button>
            </div>
            <div class="blocoBtn-adm">
                <button class="btn4-adm" > VENDAS </button>
            </div>
            <div class="blocoBtn-adm">
                <button class="btn5-adm" > Adicionar ADM </button>
            </div>
        </div>
    </div>
</div>



<?php require("../estrutura/footer.php"); ?>
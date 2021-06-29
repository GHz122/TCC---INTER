<?php 
    session_start();
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
?>
<br><br><br>
    <div class="bloco-erro">
        <div class="texto-erro"><h2>ERRO AO REALIZAR O LOGIN/CADASTRO</h2></div>
        <div class="btnErro">
            <a href="logPage.php"><button>Tente Novamente!</button></a>
            <a href="logPage.php">Ainda não sou cadastrado</a>
        </div>
    </div>

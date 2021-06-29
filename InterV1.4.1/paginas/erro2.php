<?php 
    session_start();
    include("../estrutura/conexao.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
?>
<br><br><br>
    <div class="bloco-erro">
        <div class="texto-erro"><h2>ERRO AO ALTERAR O PERFIL!</h2></div>
        <div class="btnErro">
            <a href="profile.php"><button>Tente Novamente!</button></a>
        </div>
    </div>

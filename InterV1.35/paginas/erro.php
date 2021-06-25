<?php 
    session_start();
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
?>
    <section>
        <div class=""><h2>ERRO AO REALIZAR O LOGIN</h2></div>
        <div class="">
            <a href="logPage.php"><button>Tente Novamente!</button></a>
            <a href="logPage">Ainda não sou cadastrado</a>
        </div>
    </section>

<?php 
    require("../estrutura/footer.php");
?>
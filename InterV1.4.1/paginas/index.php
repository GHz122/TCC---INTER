<?php require("../estrutura/header.php");
    session_start();
    include("../estrutura/conexao.php");

?>
    <div class="cidx">
        <?php require("../estrutura/nav.php");?>
        <div class="cblock1">
            <div class="tidx1">
                <p>Coleções com até 30% OFF</p>
                <h1>ESCOLHA O SEU ESTILO FAVORITO</h1>
                <p>Vá direto para as compras ou faça<br> login para que possamos conhece-lo melhor.</p>
            </div>
            <div class="cbtnidx">
                <a href="#linkprodutoidx"><button class="btnidx1">PRODUTOS</button></a>
                <a href="profile.php"><button class="btnidx1">CONTA</button></a>
            </div>
        </div>

    </div>
    <!----------------parte 2 ------------------->
    <div class="cidx2">
        <h1 id="linkprodutoidx">ESCOLHA O SEU TIPO</h1>

        <div class="cEidx">
            <div class="col">
                <div class="estilo">
                    <a href="../paginas/shop.php?categoria=&sexo=3">
                        <img src="../img/sport1.png" alt="">
                        <h2>Acessórios</h2>
                    </a>    
                </div>
            </div>
            <div class="col">
                <div class="estilo">
                    <a href="../paginas/shop.php?categoria=&sexo=1">
                        <img src="../img/casual2.png" alt="">
                        <h2>Feminino</h2>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="estilo">
                    <a href="../paginas/shop.php?categoria=&sexo=2">
                        <img src="../img/social3.png" alt="">
                        <h2>Masculino</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
    <?php require("../estrutura/footer.php") ?>

<script> 
    
</script>

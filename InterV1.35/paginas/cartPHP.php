<?php 
    require('../estrutura/header.php');
    include('../estrutura/conexao.php');
    require("../estrutura/verificacao-sessao-usuario.php");
    require('../estrutura/nav.php');
?>
<br><br><br>
<h2>Carrinho de Compras</h2>

<div class="container-cart">
    <div class="blocoProdutos-cart">
        <div class="">
            <h1>Produtos</h1>
        </div>

<?php 
    if (!empty($_GET['id'])) {
        $idProd = $_GET['id'];

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
        
        if (!isset($_SESSION['carrinho'][$idProd])) {
            $_SESSION['carrinho'][$idProd] = 1;
        }
        else{
            $_SESSION['carrinho'][$idProd] += 1;
        }

        include("carrinho.php");

    }else {
        include("carrinho.php");
    }
?>
    </div>
    
    
    <div class="bloco-final-cart">
        <div class="blocoFinalizarCompras-cart">
            <div class="div">
                <h2>FINALIZAR COMPRA</h2>
            </div>
            <div class="info-finalizar-cart">
                <div class="f-cart">
                    <p>Total: </p> 
                    <span>R$ <?php echo $total; ?></span>
                </div>
                <div class="f-cart">
                    <p>Frete: </p>
                    <span>$00,00</span>
                </div>
            </div>
            <div class="btn-cart">
                <?php if(count($_SESSION['carrinho']) > 0 ) {?>
                    <a href="finalizarCompraPHP.php"><button class="btn2-carrinho" >Finalizar</button></a>
                <?php }?>
                <a href="shop.php?categoria=&sexo="><button class="btn1-carrinho" >Continuar Comprando</button></a>
            </div>

        </div>
        <div class="blocoFinalizarCompras-cart">
            <div class="input-desconto-cart">
                <input type="text" name="" id="" placeholder="Código de Desconto:">
            </div>
        </div>      
    </div>
</div>


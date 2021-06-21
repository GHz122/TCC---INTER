<?php require('../estrutura/header.php');
    include('../estrutura/conexao.php');
    require('../estrutura/nav.php');
?>
<br><br><br>

<h2>Carrinho de Compras</h2>

<div class="container-cart">
    <div class="blocoProdutos-cart">
        <div class="">
            <h1>(2) Produtos</h1>
        </div>
        <div class="Produtos-cart">
            <div class="d-cart">
                <div class="img-cart">
                    <img src="../img/imgShop/camisa/Polar_Team_Preto.jpg" alt="">
                </div>
                <div class="info-produtos-cart">
                    <h3>Nome Produto</h3>
                    <p>Cor</p>
                    <p>Tamanho</p>
                </div>
                <div class="price-produtos-cart">
                    <div class="">
                        <label for=""><span>Quantidade</span></label>
                        <input type="number" name="" id="">
                    </div>
                    <div class="">
                        <p>R$ 00,00</p>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="d-cart">
                <div class="img-cart">
                    <img src="../img/imgShop/camisa/Polar_Team_Preto.jpg" alt="">
                </div>
                <div class="info-produtos-cart">
                    <h3>Nome Produto</h3>
                    <p>Cor</p>
                    <p>Tamanho</p>
                </div>
                <div class="price-produtos-cart">
                    <div class="">
                        <label for=""><span>Quantidade</span></label>
                        <input type="number" name="" id="">
                    </div>
                    <div class="">
                        <p>R$ 00,00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bloco-final-cart">
        <div class="blocoFinalizarCompras-cart">
            <div class="div">
                <h2>FINALIZAR COMPRA</h2>
            </div>
            <div class="info-finalizar-cart">
                <div class="f-cart">
                    <p>Total: </p> 
                    <span>R$00,00</span>
                </div>
                <div class="f-cart">
                    <p>Frete: </p>
                    <span>$00,00</span>
                </div>
            </div>
            <div class="btn-cart">
                <button onclick="apagar()">Comprar</button>
            </div>

        </div>
        <div class="blocoFinalizarCompras-cart">
            <div class="input-desconto-cart">
                <input type="text" name="" id="" placeholder="Código de Desconto:">
            </div>
        </div>      
    </div>
</div>

<?php require("../estrutura/footer.php");?>

<script>
    function apagar() {
        localStorage.setItem('itens_sacola', 0);
        document.querySelector('.idxli span').textContent = 0;
        alert('Compra realizada com sucesso!');
        window.location.reload(1);
        
    }
</script>
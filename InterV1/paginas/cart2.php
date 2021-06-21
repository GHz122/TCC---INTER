<?php require('../estrutura/header.php');
    include('../estrutura/conexao.php');
    require('../estrutura/nav.php');
?>
<br><br><br>

<?php 
    $id = $_GET['id'];

    try{
        $stmt = $pdo->prepare("select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
        join Marcas as m
        on p.p_marca = m.m_ID
        where p.p_ID='$id';");
        
        $stmt->execute();

        while($rowProd = $stmt->fetch(PDO::FETCH_BOTH)){
?>

<h2>Carrinho de Compras</h2>

<div class="container-cart">
    <div class="blocoProdutos-cart">
        <div class="">
            <h1>(2) Produtos</h1>
        </div>
        <div class="Produtos-cart">
            <div class="d-cart">
                <div class="img-cart">
                    <img src="../img/imgShop/<?php echo $rowProd['p_adressImage']; ?>" alt="">
                </div>
                <div class="info-produtos-cart">
                    <h3><?php echo $rowProd['p_nome']; ?></h3>
                    <p><?php echo $rowProd['m_nome']; ?></p>
                    <p>Tamanho</p>
                </div>
                <div class="price-produtos-cart">
                    <div class="">
                        <label for=""><span>Quantidade</span></label>
                        <input type="number" name="" id="">
                    </div>
                    <div class="">
                        <p>R$ <?php echo $rowProd['p_val']; ?></p>
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

<?php require("../estrutura/footer.php");

}
}
catch(PDOException $e){
    echo $e->getMessage();
}

?>

<script>
    function apagar() {
        localStorage.setItem('itens_sacola', 0);
        document.querySelector('.idxli span').textContent = 0;
        alert('Compra realizada com sucesso!');
        window.location.reload(1);
        
    }
</script>
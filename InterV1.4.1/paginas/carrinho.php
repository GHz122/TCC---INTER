<?php 
    $total = null;
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    foreach ($_SESSION['carrinho'] as $cd => $qnt) {
        try{
            $stmtCart = $pdo->prepare("select * from produtos where p_ID = '$cd'");
            $stmtCart->execute();

            while ($rowCart = $stmtCart->fetch(PDO::FETCH_ASSOC)) {
                $produto = $rowCart['p_nome'];
                $preco = number_format(($rowCart['p_val']),2,',','.');
                $total += $rowCart['p_val'] * $qnt;
?>

        <div class="Produtos-cart">
            <div class="d-cart">
                <div class="img-cart">
                    <a href="./view_product.php?idProd=<?php echo $cd; ?>"><img src="../img/imgShop/<?php echo $rowCart['p_adressImage']; ?>" alt=""></a>
                </div>
                <div class="info-produtos-cart">
                    <h3><?php echo $produto; ?></h3>
                </div>
                <div class="price-produtos-cart">
                    <div class="contQntProd-cart">
                        <!-- <label for=""><span>Quantidade</span></label>
                        <input type="number" name="" id=""> -->
                        <h4><?php echo $qnt; ?></h4>
                    </div>
                    <div class="contValorProd-cart">
                        <p>R$ <?php echo $rowCart['p_val'] ?></p>
                    </div>
                </div>
                <div class="btnExcluir-cart">
                    <a href="DAO/removerProdutoPHP.php?id=<?php echo $cd?>"><button class="btn2-cart" >&#x2718;   Excluir </button></a>
                </div>
            </div>
        </div>
<?php 
    }
                
    }catch(PDOException $e){
        echo "Erro: " . $e->getMessage();
    }    
}
?>
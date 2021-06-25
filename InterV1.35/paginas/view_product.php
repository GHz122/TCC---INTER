<?php 
    session_start();
    require("../estrutura/header.php"); 
    include("../estrutura/conexao.php");
    require("../estrutura/nav.php");

?>
<br><br><br>
<?php
    $id = $_GET['idProd'];

    try{
        $stmt = $pdo->prepare("select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
        join Marcas as m
        on p.p_marca = m.m_ID
        where p.p_ID='$id';");
        
        $stmt->execute();

        while($rowProd = $stmt->fetch(PDO::FETCH_BOTH)){

        
?>
<div class="cInfo-vw">
    <div class="cimg-vw">
        <div class="">
            <img src="../img/imgShop/<?php echo $rowProd['p_adressImage']; ?>" alt="">
        </div>
    </div>

    <div class="cText-vw">
        <div class="title-vw">
            <h1><?php echo $rowProd['p_nome']; ?></h1>
        </div>
        <div class="content-vw">
            <div class="cPrice-vw">
                <h1><span>R$</span><?php echo $rowProd['p_val']; ?></h1>
                <p>6x sem juros ou 1x no boleto.</p>
            </div>

            <div class="cTamanho-vw">
                <div class="">
                    <h1>Tamanho</h1>
                </div>
                <div class="cBtnTamanhos-vw">
                    <button id="btn" onclick="mudarFundo(this.id)">PP</button>
                    <button id="btn" onclick="mudarFundo(this.id)">P</button>
                    <button id="btn" onclick="mudarFundo(this.id)">M</button>
                    <button id="btn" onclick="mudarFundo(this.id)">G</button>
                    <button id="btn" onclick="mudarFundo(this.id)">GG</button>
                </div>
            </div>

            <div class="cComprar-vw">
                <!-- <div class="labelQNT-vw">
                    <label for=""><span>Quantidade</span></label>

                    <input type="number" name="" id="">
                </div> -->
                <div class="cBtnComprar-vw">
                    <a href="cartPHP.php?id=<?php echo $rowProd["p_ID"];?>"><button>Comprar</button></a>
                </div>
            </div>

            <div class="cFrete-vw">
                <div class="">
                    <h1>CALCULAR FRETE:</h1>
                </div>
                <div class="">
                    <form id="formDestino" action="frete.php" method="POST">
                        <input type="text" name="sCepDestino" id="" placeholder="00000-000">
                        <!-- <select name="nCdServico" id="">
                                <option value="04014">Sedex</option>
                                <option value="04510">PAC</option>
                        </select> -->
                        <button type="submit" id="calcular">Calcular </button>
                    </form>  
                    <div class="" id="resultado"></div>               
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cDescProduto-vw">
    <div class="titleDesc-vw">
        <h1>Descrição</h1>
    </div>
    <p class="pDesc-vw">Camiseta manga curta, 100% algodão. Regular fit, com estampa em SCREEN PRINT.</p>
</div>


<?php require("../estrutura/footer.php"); 

        }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

?>

<!-- Deixar o botão tamanha marcado:  -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
<script>  
    $(document).ready(function(){
    $(".cBtnTamanhos-vw button").click(function(){
      $(".cBtnTamanhos-vw button").removeClass("buttonClicked");
      $(this).addClass("buttonClicked");
  });
});
</script>

<!-- FRETE -->
<script>
    // $('#calcular').click(function() {
    //     let formSerialized = $('#formDestino').serialize();
    //     $.post('frete.php', formSerialized, function(resultado) {
    //         resultado = JSON.parse(resultado);
    //             let valorFrete = resultado.preco;
    //             let prazoEntrega = resultado.prazo;
    //             $('#resultado').html(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`);
    //     });
    // });

    // jQuery('#calcular').click(function(){
    //     var dados = {
    //         'cep':jQuery('#sCepDestino').val()
    //     }

    //     pageurl = "frete.php";
    //     jQuery.ajax({
    //         url:pageurl,
    //         data:dados,
    //         type:'POST',
    //     });
    //     $.post('frete.php', dados, function(resultado) {
    //             resultado = JSON.parse(resultado);
    //             let valorFrete = resultado.preco;
    //             let prazoEntrega = resultado.prazo;
    //             $('#resultado').html(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`);
    //     });

    // });
</script>
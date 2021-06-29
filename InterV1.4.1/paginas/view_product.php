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
            $imgProd = $rowProd['p_adressImage'];
            $nomeProd = $rowProd['p_nome'];
            $valorProd = $rowProd['p_val'];
            $idProd = $rowProd['p_ID'];
            $categoriaProd = $rowProd['p_categoria'];
        }
    }catch(PDOException $g) {
        echo $g->getMessage();
    }
        
    

        
?>
<div class="cInfo-vw">
    <div class="cimg-vw">
        <div class="">
            <img src="../img/imgShop/<?php echo $imgProd; ?>" alt="">
        </div>
    </div>

    <div class="cText-vw">
        <div class="title-vw">
            <h1><?php echo $nomeProd; ?></h1>
        </div>
        <div class="content-vw">
            <div class="cPrice-vw">
                <h1><span>R$</span><?php echo $valorProd; ?></h1>
                <p>6x sem juros ou 1x no boleto.</p>
            </div>
            
            <?php 
                if ($categoriaProd <=3 ) {
                    ?>
                <div class="cTamanho-vw">
                    <div class="">
                        <h1>Tamanho</h1>
                    </div>
                    <div class="cBtnTamanhos-vw">
                        <button id="btn1" onclick="mudarFundo(this.id)">PP</button>
                        <button id="btn2" onclick="mudarFundo(this.id)">P</button>
                        <button id="btn3" onclick="mudarFundo(this.id)">M</button>
                        <button id="btn4" onclick="mudarFundo(this.id)">G</button>
                        <button id="btn5" onclick="mudarFundo(this.id)">GG</button>
                    </div>
                    <table id="tableSize1" class="SizeTable hidden">
                    <?php 
                        try {
                            $stmtTam = $pdo->prepare("select d.d_id, d.p_ID, d.d_Tamanho, d.d_comprimento, d.d_largura, d.d_tipoT, d.d_caimento, d.d_argola, p.p_ID from Desc_prod as d
                            join produtos as p
                            on d.p_ID = p.p_ID
                            where d.d_Tamanho = 1 and d.p_ID = '$id';");
                            $stmtTam->execute();
                    
                            while($rowTam = $stmtTam->fetch(PDO::FETCH_ASSOC)) {
                                $comprimento1 = $rowTam['d_comprimento']; 
                                $largura1 = $rowTam['d_largura'];
                                $tipoT1 = $rowTam['d_tipoT'];
                                $caimento1 = $rowTam['d_caimento'];
                                $argola1 = $rowTam['d_argola'];
                                
                            }
                        }catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                    ?>
                    <thead>
                            <tr>
                                <th>Especificação</th>
                                <th>Informações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Comprimento</td><td><?php echo $comprimento1; ?></td>
                            </tr>
                            <tr>
                                <td>Largura</td><td><?php echo $largura1;?></td>
                            </tr>
                            <tr>
                                <td>Tipo de Tecido / Material</td><td><?php echo $tipoT1; ?></td>
                            </tr>
                            <tr>
                                <td>Caimento</td><td><?php echo $caimento1; ?></td>
                            </tr>
                            <tr>
                                <td>Tipo da Argola (Camisetas)</td><td><?php echo $argola1; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div>
                        <table id="tableSize2" class="SizeTable hidden">
                        <?php 
                            try {
                                $stmtTam = $pdo->prepare("select d.d_id, d.p_ID, d.d_Tamanho, d.d_comprimento, d.d_largura, d.d_tipoT, d.d_caimento, d.d_argola, p.p_ID from Desc_prod as d
                                join Produtos as p
                                on d.p_ID = p.p_ID
                                where d.d_Tamanho = 2 and d.p_ID = '$id';");
                                $stmtTam->execute();
                        
                                while($rowTam = $stmtTam->fetch(PDO::FETCH_ASSOC)) {
                                    $comprimento2 = $rowTam['d_comprimento']; 
                                    $largura2 = $rowTam['d_largura'];
                                    $tipoT2 = $rowTam['d_tipoT'];
                                    $caimento2 = $rowTam['d_caimento'];
                                    $argola2 = $rowTam['d_argola'];
                                    
                                }
                            }catch(PDOException $h) {
                                echo $h->getMessage();
                            }
                        ?>
                    <thead>
                            <tr>
                                <th>Especificação</th>
                                <th>Informações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Comprimento</td><td><?php echo $comprimento2; ?></td>
                            </tr>
                            <tr>
                                <td>Largura</td><td><?php echo $largura2;?></td>
                            </tr>
                            <tr>
                                <td>Tipo de Tecido / Material</td><td><?php echo $tipoT2; ?></td>
                            </tr>
                            <tr>
                                <td>Caimento</td><td><?php echo $caimento2; ?></td>
                            </tr>
                            <tr>
                                <td>Tipo da Argola (Camisetas)</td><td><?php echo $argola2; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="tableSize3" class="SizeTable hidden">
                        <?php 
                            try {
                                $stmtTam = $pdo->prepare("select d.d_id, d.p_ID, d.d_Tamanho, d.d_comprimento, d.d_largura, d.d_tipoT, d.d_caimento, d.d_argola, p.p_ID from Desc_prod as d
                                join Produtos as p
                                on d.p_ID = p.p_ID
                                where d.d_Tamanho = 3 and d.p_ID = '$id';");
                                $stmtTam->execute();
                        
                                while($rowTam = $stmtTam->fetch(PDO::FETCH_ASSOC)) {
                                    $comprimento3 = $rowTam['d_comprimento']; 
                                    $largura3 = $rowTam['d_largura'];
                                    $tipoT3 = $rowTam['d_tipoT'];
                                    $caimento3 = $rowTam['d_caimento'];
                                    $argola3 = $rowTam['d_argola'];
                                    
                                }
                            }catch(PDOException $c) {
                                echo $c->getMessage();
                            }
                        ?>
                    <thead>
                            <tr>
                                <th>Especificação</th>
                                <th>Informações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Comprimento</td><td><?php echo $comprimento3; ?></td>
                            </tr>
                            <tr>
                                <td>Largura</td><td><?php echo $largura3;?></td>
                            </tr>
                            <tr>
                                <td>Tipo de Tecido / Material</td><td><?php echo $tipoT3; ?></td>
                            </tr>
                            <tr>
                                <td>Caimento</td><td><?php echo $caimento3; ?></td>
                            </tr>
                            <tr>
                                <td>Tipo da Argola (Camisetas)</td><td><?php echo $argola3; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="tableSize4" class="SizeTable hidden">
                        <?php 
                            try {
                                $stmtTam = $pdo->prepare("select d.d_id, d.p_ID, d.d_Tamanho, d.d_comprimento, d.d_largura, d.d_tipoT, d.d_caimento, d.d_argola, p.p_ID from Desc_prod as d
                                join Produtos as p
                                on d.p_ID = p.p_ID
                                where d.d_Tamanho = 4 and d.p_ID = '$id';");
                                $stmtTam->execute();
                        
                                while($rowTam = $stmtTam->fetch(PDO::FETCH_ASSOC)) {
                                    $comprimento4 = $rowTam['d_comprimento']; 
                                    $largura4 = $rowTam['d_largura'];
                                    $tipoT4 = $rowTam['d_tipoT'];
                                    $caimento4 = $rowTam['d_caimento'];
                                    $argola4 = $rowTam['d_argola'];
                                    
                                }
                            }catch(PDOException $n) {
                                echo $n->getMessage();
                            }
                        ?>
                    <thead>
                            <tr>
                                <th>Especificação</th>
                                <th>Informações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Comprimento</td><td><?php echo $comprimento4; ?></td>
                            </tr>
                            <tr>
                                <td>Largura</td><td><?php echo $largura4;?></td>
                            </tr>
                            <tr>
                                <td>Tipo de Tecido / Material</td><td><?php echo $tipoT4; ?></td>
                            </tr>
                            <tr>
                                <td>Caimento</td><td><?php echo $caimento4; ?></td>
                            </tr>
                            <tr>
                                <td>Tipo da Argola (Camisetas)</td><td><?php echo $argola4; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table id="tableSize5" class="SizeTable hidden">
                        <?php 
                            try {
                                $stmtTam = $pdo->prepare("select d.d_id, d.p_ID, d.d_Tamanho, d.d_comprimento, d.d_largura, d.d_tipoT, d.d_caimento, d.d_argola, p.p_ID from Desc_prod as d
                                join Produtos as p
                                on d.p_ID = p.p_ID
                                where d.d_Tamanho = 5 and d.p_ID = '$id';");
                                $stmtTam->execute();
                        
                                while($rowTam = $stmtTam->fetch(PDO::FETCH_ASSOC)) {
                                    $comprimento5 = $rowTam['d_comprimento']; 
                                    $largura5 = $rowTam['d_largura'];
                                    $tipoT5 = $rowTam['d_tipoT'];
                                    $caimento5 = $rowTam['d_caimento'];
                                    $argola5 = $rowTam['d_argola'];
                                    
                                }
                            }catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                        ?>
                        <thead>
                                <tr>
                                    <th>Especificação</th>
                                    <th>Informações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Comprimento</td><td><?php echo $comprimento5; ?></td>
                                </tr>
                                <tr>
                                    <td>Largura</td><td><?php echo $largura5;?></td>
                                </tr>
                                <tr>
                                    <td>Tipo de Tecido / Material</td><td><?php echo $tipoT5; ?></td>
                                </tr>
                                <tr>
                                    <td>Caimento</td><td><?php echo $caimento5; ?></td>
                                </tr>
                                <tr>
                                    <td>Tipo da Argola (Camisetas)</td><td><?php echo $argola5; ?></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                    <?php 
                }
            ?>
            

            <div class="cComprar-vw">
                <!-- <div class="labelQNT-vw">
                    <label for=""><span>Quantidade</span></label>

                    <input type="number" name="" id="">
                </div> -->
                <div class="cBtnComprar-vw">
                    <a href="cartPHP.php?id=<?php echo $idProd;?>"><button>Comprar</button></a>
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
</div>


<?php require("../estrutura/footer.php"); 



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


    $(document).ready(function(){
            const btn1 = document.querySelector('#btn1')
            const btn2 = document.querySelector('#btn2')
            const btn3 = document.querySelector('#btn3')
            const btn4 = document.querySelector('#btn4')
            const btn5 = document.querySelector('#btn5')

            const table1 = document.querySelector('#tableSize1')
            const table2 = document.querySelector('#tableSize2')
            const table3 = document.querySelector('#tableSize3')
            const table4 = document.querySelector('#tableSize4')
            const table5 = document.querySelector('#tableSize5')

        
            btn1.addEventListener('click', function(){
                document.querySelector('#tableSize1').classList.remove('hidden')
                document.querySelector('#tableSize2').classList.add('hidden')
                document.querySelector('#tableSize3').classList.add('hidden')
                document.querySelector('#tableSize4').classList.add('hidden')
                document.querySelector('#tableSize5').classList.add('hidden')
            })

            btn2.addEventListener('click', function(){
                document.querySelector('#tableSize1').classList.add('hidden')
                document.querySelector('#tableSize2').classList.remove('hidden')
                document.querySelector('#tableSize3').classList.add('hidden')
                document.querySelector('#tableSize4').classList.add('hidden')
                document.querySelector('#tableSize5').classList.add('hidden')
            })

            btn3.addEventListener('click', function(){
                document.querySelector('#tableSize1').classList.add('hidden')
                document.querySelector('#tableSize2').classList.add('hidden')
                document.querySelector('#tableSize3').classList.remove('hidden')
                document.querySelector('#tableSize4').classList.add('hidden')
                document.querySelector('#tableSize5').classList.add('hidden')
            })

            btn4.addEventListener('click', function(){
                document.querySelector('#tableSize1').classList.add('hidden')
                document.querySelector('#tableSize2').classList.add('hidden')
                document.querySelector('#tableSize3').classList.add('hidden')
                document.querySelector('#tableSize4').classList.remove('hidden')
                document.querySelector('#tableSize5').classList.add('hidden')
            })

            btn5.addEventListener('click', function(){
                document.querySelector('#tableSize1').classList.add('hidden')
                document.querySelector('#tableSize2').classList.add('hidden')
                document.querySelector('#tableSize3').classList.add('hidden')
                document.querySelector('#tableSize4').classList.add('hidden')
                document.querySelector('#tableSize5').classList.remove('hidden')
            })
        
    
    });
</script>


<?php
    session_start(); 
    require("../estrutura/header.php"); 
    include("../estrutura/conexao.php");
    require("../estrutura/nav.php");
?>

        </header>
    </div>
<!-- Bugado a DIV abaixo -->
<!-- Remover o br -->
<br>
<br>
<br>
    <div class="text-shop">
        <h1>Tipo de Roupa</h1>
    </div>
    <!-- Produtos:  -->
    <div class="containerMainShop">
        <main class="main-shop">
            <!-- Order by -->
            <div class="orderby-shop">
                <div class="caixa-shop">
                    <select>
                        <option id="opcao" name="opcao" value="op1">Mais caro</option>
                        <option id="opcao" name="opcao" value="op2">Mais Barato</option>
                        <option id="opcao" name="opcao" value="op3">Relevante</option>
                        <option id="opcao" name="opcao" value="op4">Novos</option>
                    </select>
                </div>
            </div>
            <div id='div-result'>
                <div class="cAllproducts-shop">
                <!-- Trazendo os produtos do Banco de Dados: -->
                <?php
                    $categoria = $_GET['categoria'];
                    $sexo = $_GET['sexo'];
                    if (!empty($categoria) and !empty($sexo)) {
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_categoria = '$categoria' and p.p_sexo = '$sexo'
                        order by m.m_nome";
                    }
                    else if (!empty($categoria and empty($sexo))) {
                        $sexo = "";
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_categoria = '$categoria'
                        order by m.m_nome";
                    }
                    else if (!empty($sexo and empty($categoria))) {
                        $categoria = "";
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_sexo = '$sexo'
                        order by m.m_nome";
                    }
                    else {
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        order by m.m_nome";
                    }
                    try{
                        $stmt = $pdo->prepare($prepare);
                        $stmt ->execute();

                        while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                            $items = array(
                                [
                                    'id'=>$row['p_ID'],
                                    'nome'=>$row['p_nome'],
                                    'preco'=>$row['p_val']
                                ]); 
                            foreach ($items as $key => $value) {
                                                          
                ?>
                    <figure class="figure-shop">
                        <a href="./view_product.php?idProd=<?php echo $row['p_ID']; ?>">
                            <div class="">
                                <img src="../img/imgShop/<?php echo $row["p_adressImage"]; ?>" alt="">
                            </div>
                        </a>
                        <figcaption>
                            <h4><?php echo mb_strimwidth($row["p_nome"],0,35,'...'); ?></h4>
                            <p><?php echo $row["p_val"]; ?></p>
                            <p><span>
                            <?php echo $row["m_nome"]; ?>
                            </span></p>
                            <div class="btnCarrinho-shop">
                                <!-- Problema no  echo $key -->
                                <a class="linkCarrinho-shop" href="cartPHP.php?id=<?php echo $row['p_ID'];?>"><button>Carrinho<span style="display: none;"><?php echo $row['p_nome'];?></span></button></a>
                            </div> 
                        </figcaption>
                    </figure>
                <?php 
                            }
                        }
                        }catch(PDOException $e){
                        echo "Erro: ". $e->getMessage();
                        }           
                ?>
                    
                </div>
            </div>
        </main>    

        <!-- Filtro:  -->

        <aside class="aside-shop">
            <div class="cfiltro-shop">
                <form>
                    <!-- ---------- Tamanho ------------->
                    <!-- <div class="title-filter-shop">TAMANHO</div>
                    <div class="content-filter-shop">
                        
                        <label class="label-shop" for="PP">PP
                            <input class="checkmark-shop" type="checkbox" name="PP" id="PP" value="PP">
                            <span class="checkmark-shop"></span>
                        </label>
                        
                        
                        <label class="label-shop" for="P">P
                            <input class="checkmark-shop" type="checkbox" name="P" id="P" value="P">
                            <span class="checkmark-shop"></span>
                        </label>
                        
                        <label class="label-shop" for="M">M
                            <input class="checkmark-shop" type="checkbox" name="M" id="M" value="M">
                            <span class="checkmark-shop"></span>
                        </label>
                        
                        
                        <label class="label-shop" for="G">G
                            <input class="checkmark-shop" type="checkbox" name="G" id="G" value="G">
                            <span class="checkmark-shop"></span>
                        </label>
                        
                        
                        <label class="label-shop" for="GG">GG
                            <input class="checkmark-shop" type="checkbox" name="GG" id="GG" value="GG">
                            <span class="checkmark-shop"></span>
                        </label>
                    </div> -->

                    <!-- ---------- MARCA ------------->

                    <div class="title-filter-shop">MARCA</div>
                    <div class="content-filter-shop">

                        <?php 
                            try{
                                $stmt2 = $pdo->prepare("select * from Marcas");
                                $stmt2->execute();

                                while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
                                
                        ?>
                        <label class="label-shop"for="<?php echo $row2["m_ID"];?>"> <?php echo $row2["m_nome"];?>
                            <input class="checkmark-shop" type="checkbox" name="txMarca" id="<?php echo $row2["m_ID"];?>" value="<?php echo $row2["m_ID"];?>">
                            <span class="checkmark-shop"></span>
                        </label>

                        <?php 

                                $forAndid = "";
                              }
                            }catch(PDOException $e){
                                echo "Erro no filtro: ". $e->getMessage();
                            }
                        ?>
                    </div>

                    <!-- ---------- PREÇO ------------->

                    <div class="title-filter-shop">PREÇO</div>
                    <div class="content-filterprice-shop">
                        <div class="divfilter-price-shop">
                            <label class="label-price-shop" for="min">Valor de:</label>
                            <input class="input-price-shop" type="number" name="min" id="preco" placeholder="$  MIN">
                        </div>
                        <div class="divfilter-price-shop">
                            <label class="label-price-shop" for="max">Valor até:</label>
                            <input class="input-price-shop" type="number" name="max" id="preco" placeholder="$  MAX">
                        </div>
                    </div>
                    <button class="btnSubmitFiltrar-shop" type="submit">Filtrar</button>
                </form>
            </div>
        </aside>
        
    </div>
        
    <?php require("../estrutura/footer.php"); ?>

<script>
	$(document).ready(function(){		
		$(":checkbox").click(function(){	 	
			$('form').submit(function(){
                var dados = $(this).serialize();
				$.ajax({
					url:'processa.php',
					type: 'POST',
					dataType: 'html',
					data: dados,
					success:function(data){
						$('#div-result').empty().html(data);
                        $(data).show();                       
					}					
				});
				return false;
			});
        });
        $("#preco").click(function(){	 	
			$('form').submit(function(){
                var dados = $(this).serialize();
				$.ajax({
					url:'processa.php',
					type: 'POST',
					dataType: 'html',
					data: dados,
					success:function(data){
						$('#div-result').empty().html(data);
                        $(data).show();                        
					}					
				});
				return false;
			});
        });		
	});
</script>

<div style="display: none;" id="dadosjson"> <?php echo '{"categoria":'. json_encode($array,JSON_UNESCAPED_UNICODE) . '}';?> </div>
<script src="../JS/cart-main.js"></script>



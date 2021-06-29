<?php 
	/*
		$tamanho = isset($_POST['tama']) ? $_POST['tama'] : null;

	if(isset($_POST['preco'])){
		$get = "and p_tamanho =";
	}
	elseif(isset($_POST['marca'])){
		$get = "and p_tamanho =";
	}
	else{
		$get = "where p_tamanho =";
	}

	if($tamanho != null){
		$a = count($tamanho);
			switch ($a) {
				case $a < 2:
					$get = $get . $tamanho[0];
					break;
				case $a == 2:
					$get = $get . $tamanho[0] . " and " . $tamanho[1];
					break;
				case $a == 3:
					$get = $get . $tamanho[0];
					$get = $get . " and " . $tamanho[1];
					$get = $get . " and " . $tamanho[2];
					break;
				case $a == 4:
					$get = $get . $tamanho[0];
					$get = $get . " and " . $tamanho[1];
					$get = $get . " and " . $tamanho[2];
					$get = $get . " and " . $tamanho[3];
					break;
				case $a == 5:
					$get = $get . $tamanho[0];
					$get = $get . " and " . $tamanho[1];
					$get = $get . " and " . $tamanho[2];
					$get = $get . " and " . $tamanho[3];
					$get = $get . " and " . $tamanho[4];
					break;
				default:
				   echo "i is not equal to 0, 1 or 2";
			};
		
	}
	*/
	include("../estrutura/conexao.php");

	$min = isset($_POST['min']) ? $_POST['min'] : null;
	$max = isset($_POST['max']) ? $_POST['max'] : null;
	
	$valormin = "and p_val >= ";
	$valormax = "and p_val <= ";	
	
	if($min != null && $max != null){
		$valormin = $valormin . $min;
		$valormax = $valormax . $max;
	}
	elseif($min != null){
		$valormax = null;
		$valormin = $valormin . $min;
	}
	elseif($max != null){
		$valormin = null;
		$valormax = $valormax . $max;
	}
	else{
		$valormax = null;
		$valormin = null;
	}
	

	$marca = isset($_POST['txMarca']) ? $_POST['txMarca'] : null;

	if($marca == null){
		$post = null;
	}
	else{
		$post = "and m.m_ID in(";
	}
	
	if($marca != null){
		$i = count($marca);
			switch ($i) {
				case $i < 2:
					$post = $post . $marca[0] . ")";
					break;
				case $i == 2:
					$post = $post . $marca[0] . "," . $marca[1] . ")";
					break;
				case $i == 3:
					$post = $post . $marca[0];
					$post = $post . "," . $marca[1];
					$post = $post . "," . $marca[2] . ")";
					break;
				case $i == 4:
					$post = $post . $marca[0];
					$post = $post . "," . $marca[1];
					$post = $post . "," . $marca[2];
					$post = $post . "," . $marca[3] . ")";
					break;
				case $i == 5:
					$post = $post . $marca[0];
					$post = $post . "," . $marca[1];
					$post = $post . "," . $marca[2];
					$post = $post . "," . $marca[3];
					$post = $post . "," . $marca[4] . ")";
					break;
				case $i == 6:
					$post = $post . $marca[0];
					$post = $post . "," . $marca[1];
					$post = $post . "," . $marca[2];
					$post = $post . "," . $marca[3];
					$post = $post . "," . $marca[4];
					$post = $post . "," . $marca[5] . ")";
					break;
				case $i == 7:
					$post = $post . $marca[0];
					$post = $post . "," . $marca[1];
					$post = $post . "," . $marca[2];
					$post = $post . "," . $marca[3];
					$post = $post . "," . $marca[4];
					$post = $post . "," . $marca[5];
					$post = $post . "," . $marca[6] . ")";
					break;
				default:
				   echo "i is not equal to 0, 1 or 2";
			};
	}

	$categoria = isset($_POST['cate']) ? $_POST['cate'] : null;
	$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
	
?>	
<div class="div-result">	
			<div class="cAllproducts-shop">
                <!-- Trazendo os produtos do Banco de Dados: -->
                <?php
                    if (!empty($categoria) and !empty($sexo)) {
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_categoria = '$categoria' and p.p_sexo = '$sexo'
						$post $valormin $valormax
                        order by m.m_nome";
                    }
                    else if (!empty($categoria and empty($sexo))) {
                        $sexo = ""; 
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_categoria = '$categoria'
						$post $valormin $valormax
                        order by m.m_nome";
                    }
                    else if (!empty($sexo and empty($categoria))) {
                        $categoria = "";
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
                        where p.p_sexo = '$sexo'
						$post $valormin $valormax
                        order by m.m_nome";
                    }
                    else {
                        $prepare = "select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome from Produtos as p
                        join Marcas as m
                        on p.p_marca = m.m_ID
						$post $valormin $valormax
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

<script src="../JS/cart-main.js"></script>
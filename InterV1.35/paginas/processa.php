<?php 
	/*
	$min = $_POST['min'];
	$max = $_POST['max'];
<div class="preco-result">
	<?php 
	   $con = new mysqli("localhost", "root", "","bdinter_dataBase" ) or die (mysql_error());
	   $query = $con->query("SELECT p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome
	   						 from Produtos as p join Marcas as m on p.p_marca = m.m_ID
	   						 where p_val <= '. $max .' and p_val >= '. $min .' order by m.m_nome;");
	   while($reg = $query->fetch_array()) {										 
	   }
	?>
	if(isset($_POST['marca']))
	{
		switch ($marca) {
		case "1":
			$post = "where p_categoria = $marca"
			break;
		case "1&2":
			$post = "where p_categoria = 1 & 2"
			break;
		case 2:
			echo "i equals 2";
			break;
		default:
		   $post = "'$marca'"
		}
	}
	else{
		
	}	
</div>
	*/
	include("../estrutura/conexao.php");

	$min = isset($_POST['min']) ? $_POST['min'] : null;
	$max = isset($_POST['max']) ? $_POST['max'] : null;

	if(isset($_POST['marca'])){
		$valormin = "and p_val >= ";
		$valormax = "and p_val <= ";
	}
	elseif(isset($_POST['tama'])){
		$valormin = "and p_val >= ";
		$valormax = "and p_val <= ";
	}
	else{
		$valormin = "where p_val >= ";
		$valormax = "and p_val <= ";
	}
	
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
	

	$marca = isset($_POST['marca']) ? $_POST['marca'] : null;

	if($marca == null){
		$post = null;
	}
	else{
		$post = "where p_categoria =";
	}
	
	if($marca != null){
		$i = count($marca);
			switch ($i) {
				case $i < 2:
					$post = $post . $marca[0];
					break;
				case $i == 2:
					$post = $post . $marca[0] . " and " . $marca[1];
					break;
				case $i == 3:
					$post = $post . $marca[0];
					$post = $post . " and " . $marca[1];
					$post = $post . " and " . $marca[2];
					break;
				default:
				   echo "i is not equal to 0, 1 or 2";
			};
		
	}

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

?>	
<div class="div-result">	
			<div class="cAllproducts-shop">
			<?php 
				try{
					$stmt = $pdo->prepare("select p.p_ID, p.p_nome, p.p_adressImage, p.p_val, p.p_categoria, m.m_nome 
										from Produtos as p
										join Marcas as m
										on p.p_marca = m.m_ID
										$post $valormin $valormax order by m.m_nome");
					$stmt ->execute();

					while($row = $stmt->fetch(PDO::FETCH_BOTH)){
					       
			?>
				</p>
				<figure class="figure-shop">
					<a href="./view_product.php">
						<div class="">
							<img src="../img/imgShop/camisa/<?php echo $row["p_adressImage"]; ?>" alt="">
						</div>
					</a>
					<figcaption>
						<h4><?php echo $row["p_nome"]; ?></h4>
						<p><?php echo $row["p_val"]; ?></p>
						<p><span>
						<?php echo $row["m_nome"]; ?>
						</span></p>
						<div class="btnCarrinho-shop">
							<a class="linkCarrinho-shop" href="#"><button>Carrinho</button></a>
						</div> 
					</figcaption>
				</figure>
			<?php 
					}
				}catch(PDOException $e){
					echo "Erro: ". $e->getMessage();
				}
			?>
			</div>
</div>		

<script src="../JS/cart-main.js"></script>
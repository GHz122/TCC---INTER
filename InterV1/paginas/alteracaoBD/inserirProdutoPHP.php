<?php 
    include("../../estrutura/conexao.php");
    $Produto = $_POST['txProduto'];
    $Valor = $_POST['txValor'];
    $Cat = $_POST['opCat'];
    $Marca = $_POST['opMarca'];
    $Sexo = $_POST['opSexo'];
    $recebe_foto = $_FILES['txFoto'];

    try{
            $stmt2 = $pdo->prepare("select * from Categoria where idCategoria = '$Cat'");
            $stmt2 ->execute();    
           
            while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $nomeCat = $row['nomeCat'];
            }
    
        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage(); 
        }

    $destino = "../../img/imgShop/".$nomeCat."/";
    preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto['name'],$extensao1);
    $img_nome1 = md5(uniqid(time())).".".$extensao1[1];
    $imgFinal = $nomeCat.'/'.$img_nome1;
    $sql = "insert into produtos values (default,'$Produto','$imgFinal','$Valor','$Cat','$Marca','$Sexo')";

    try{
        $stmt = $pdo->prepare($sql);
        $stmt ->execute();

        move_uploaded_file($recebe_foto['tmp_name'], $destino.$img_nome1);
        header("Location: ../inserirProduto.php");
    }catch(PDOException $e){
        echo "Erro: " . $e->getMessage(); 
    }

?>
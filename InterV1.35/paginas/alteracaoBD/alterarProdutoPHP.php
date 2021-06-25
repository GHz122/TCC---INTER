<?php 
    include("../../estrutura/conexao.php");
    // require("../../estrutura/verificacao-sessao-usuario.php");
    // if($_SESSION['Status'] != 1) {
    //     header("Location: ../index.php");
    // }
?>
<?php
    $id = $_GET['id'];

    $Produto = $_POST['txProduto'];
    $Valor = $_POST['txValor'];
    $Cat = $_POST['opCat'];
    $Marca = $_POST['opMarca'];
    $Sexo = $_POST['opSexo'];
    $recebe_foto = $_FILES['txFoto'];

    try{
        $stmtProd = $pdo->prepare("select * from Produtos where p_ID='$id'");
        $stmtProd->execute();

        while ($row = $stmtProd->fetch(PDO::FETCH_ASSOC)) {   
            $img = $row['p_adressImage'];
        }

    }catch(PDOException $e){
        echo "Erro e: " . $e->getMessage();
    }
    
    try{
        $stmtCat = $pdo->prepare("select * from categoria where idCategoria='$Cat'");
        $stmtCat->execute();

        while ($rowCat = $stmtCat->fetch(PDO::FETCH_ASSOC)) {   
            $nomeCat = $rowCat['nomeCat'];
        }

    }catch(PDOException $g){
        echo "Erro: g " . $g->getMessage();
    }

    // echo $Produto. "<br>".$Valor. "<br>".$Cat. "<br>".$Marca. "<br>".$Sexo. "<br>".$recebe_foto['name']. "<br>".$img. "<br>".$nomeCat;

    $destino = "../../img/imgShop/".$nomeCat."/";

    if (!empty($recebe_foto['name'])) {    
        preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto['name'],$extensao1);
        $img_nome1 = md5(uniqid(time())).".".$extensao1[1];
        $imgFinal = $nomeCat.'/'.$img_nome1;

        $upload = 1;
    }
    else{
        $imgFinal = $img;
        
        $upload = 2;
    }

    try{    
        $stmtInsert = $pdo->prepare("update produtos set
        p_nome= '$Produto',
        p_adressImage = '$imgFinal',
        p_val = '$Valor',
        p_categoria = '$Cat',
        p_marca = '$Marca',
        p_sexo = '$Sexo'
        where p_ID = '$id'
        ");

        $stmtInsert->execute();

        if ($upload == 1) {
           move_uploaded_file($recebe_foto['tmp_name'], $destino.$img_nome1);
        }
        header("location: ../lista.php");

    }catch(PDOException $f) {
        echo "Erro: f". $f->getMessage();
    }


    

?>
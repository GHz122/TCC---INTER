<?php 
    include("../../estrutura/conexao.php");
    $id = $_GET['id'];

    $pasta = "img/imgShop/";

    try{
        $stmt = $pdo->prepare("select * from produtos where p_ID = '$id'");
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $img = $row['p_adressImage'];
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    try{
        $stmtDel = $pdo->prepare("delete from produtos where p_ID = '$id'");
        $stmtDel->execute();

        if ($img !="") {
            unlink($pasta.$img);
        }

        header("Location: ../lista.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    // Nao está excluindo a foto -> video 51


?>
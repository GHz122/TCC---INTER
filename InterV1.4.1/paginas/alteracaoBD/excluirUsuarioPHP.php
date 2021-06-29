<?php 
    include("../../estrutura/conexao.php");
    $id = $_GET['id'];

    $pasta = "img/perfil/";

    try{
        $stmt = $pdo->prepare("select * from usuario where U_id = '$id'");
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $img = $row['U_img'];
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    try{
        $stmtDel = $pdo->prepare("delete from usuario where U_id = '$id'");
        $stmtDel->execute();

        if ($img !="") {
            unlink($pasta.$img);
        }

        header("Location: ../listaUsuario.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    // Nao está excluindo a foto -> video 51


?>
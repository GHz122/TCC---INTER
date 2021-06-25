<?php 
    include("../../estrutura/conexao.php");
    require("../../estrutura/verificacao-sessao-usuario.php");
    
    $img = $_FILES['UploadImg'];



    $destino = "../../img/perfil/";
    preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$img['name'],$extensao1);
    $img_profile = md5(uniqid(time())).".".$extensao1[1];
    try{
        $stmt = $pdo->prepare("update usuario
        set U_img = '$img_profile' where U_id = '$_SESSION[ID]'");
        $stmt ->execute();

        move_uploaded_file($img['tmp_name'], $destino.$img_profile);
        header("Location: ../profile.php");
    }catch(PDOException $e){
        echo "Erro: " . $e->getMessage(); 
    }

?>
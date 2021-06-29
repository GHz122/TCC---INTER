<?php 
    include("../../estrutura/conexao.php");
?>
<?php
    $id = $_GET['id'];
    $nome = $_POST['txNome'];
    $status = $_POST['opStatus'];
    $estado = $_POST['opEstado'];
    $recebe_foto = $_FILES['txFoto'];

    try{
        $stmt = $pdo->prepare("select * from usuario where U_id='$id'");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {   
            $img = $row['U_img'];
        }

    }catch(PDOException $e){
        echo "Erro e: " . $e->getMessage();
    }

    $destino = "../../img/perfil/";

    if (!empty($recebe_foto['name'])) {    
        preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto['name'],$extensao1);
        $img_nome1 = md5(uniqid(time())).".".$extensao1[1];
        $upload = 1;
    }
    else{
        $img_nome1 = $img;
        
        $upload = 2;
    }

    try{    
        $stmtInsert = $pdo->prepare("update usuario set
        U_nome= '$nome',
        U_img = '$img_nome1',
        U_status = '$status',
        U_estado = '$estado'
        where U_id = '$id'
        ");

        $stmtInsert->execute();

        if ($upload == 1) {
           move_uploaded_file($recebe_foto['tmp_name'], $destino.$img_nome1);
        }
        header("location: ../listaUsuario.php");

    }catch(PDOException $f) {
        echo "Erro: f". $f->getMessage();
    }


    

?>
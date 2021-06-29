<?php 
    include("../../estrutura/conexao.php");
    
    $id = $_GET['id'];
    $nome = $_POST['txNome'];
    $email = $_POST['txEmail'];
    $estado = $_POST['opEstado'];
    $senha = $_POST['txNovaSenha'];
    $senhaConfirmar = $_POST['txSenha'];
    $cep = $_POST['txCep'];
    $data = $_POST['txData'];

    try {  
        $stmtConsulta = $pdo->prepare("select * from usuario where U_id = '$id'");
        $stmtConsulta->execute();

        while($row = $stmtConsulta->fetch(PDO::FETCH_ASSOC)) {
            $imgBanco = $row['U_img'];
            $senhaBanco = $row['U_senha'];
        }


    }catch(PDOException $e) {
        echo $e->getMessage();
    }

    if ($senhaConfirmar == $senhaBanco) {
        if (empty($senha)) {
            $sql = "update usuario set
            U_nome = '$nome',
            U_email = '$email',
            U_estado = '$estado',
            U_senha = '$senhaBanco',
            U_cep = '$cep',
            U_nasc = '$data'
            where U_id = '$id'; 
            ";
        }
        else {
            $sql = "update usuario set
            U_nome = '$nome',
            U_email = '$email',
            U_estado = '$estado',
            U_senha = '$senha',
            U_cep = '$cep',
            U_nasc = '$data'
            where U_id = '$id'; 
            ";
        }
    
        try {  
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            header("Location: ../profile.php");
    
        }catch(PDOException $f) {
            echo $f->getMessage();
        }
    }
    else {
        header("Location: ../erro2.php");
    }
?>
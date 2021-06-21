<?php 
    include('../../estrutura/conexao.php');

    session_start();

    $variavel_email = $_POST['txEmail'];
    $variavel_senha = $_POST['txSenha'];

    $emailBanco = "";
    $senhaBanco = "";

    try{
        $stmt = $pdo->prepare("select U_id, U_nome, U_email, U_senha, U_status 
        from usuario 
        where U_email = '$variavel_email' and U_senha = '$variavel_senha'");
        $stmt ->execute();
        
        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $senhaBanco = $row['U_senha'];
            $emailBanco = $row['U_email'];
            $statusBanco = $row['U_status'];
            $idBanco = $row['U_id'];
            
        }
    }catch(PDOException $e){
        echo "Erro: " . $e->getMessage(); 
    }

    if($variavel_senha == $senhaBanco && $variavel_email == $emailBanco) {
      if ($statusBanco == 0) {
        $_SESSION['ID'] = $idBanco;
        $_SESSION['Status'] = 0;
        header("Location: ../index.php");
      }
      else{
        $_SESSION['ID'] = $idBanco;
        $_SESSION['Status'] = 1;
        header("Location: ../index.php");
      }
    }
    else {
        header("Location:erro.php");
    }

?>
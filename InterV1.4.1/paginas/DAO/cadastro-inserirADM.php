<?php
    session_start();
    include("../../estrutura/conexao.php");
    $nome = $_POST['CadastroNome'];
    $email = $_POST['CadastroEmail'];
    $senha = $_POST['CadastroSenha'];
    $data = $_POST['CadastroData'];
    $cep = $_POST['CadastroCEP'];
    $estado = $_POST['CadastroEstado'];
    // $img = $_POST['fImage'];

    // $destino = "../../img/perfil";
    // preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$img['name'],$extensao1);
    // $img_profile = md5(uniqid(time())).".".$extensao1[1];

    try {
        $stmt = $pdo->prepare("select U_email from usuario where U_email = '$email'");
        $stmt -> execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $resultado = $stmt->rowCount();
        }
        if ($resultado == 1) {
            header("Location: ../erro.php");
        }else {
            try{
                $stmt2 = $pdo->prepare("insert into usuario values (default,'$nome','$email','$senha',1,'$estado','$cep','$data','')");
                $stmt2->execute();

                // move_uploaded_file($img['tmp_name'], $destino.$img_profile);

                header("Location: ../adm.php");
            }catch(PDOException $f){
                echo $f->getMessage();
            }
        }
    }catch(PDOException $e){
        echo "Erro 1 : " . $e->getMessage();
    }


?>
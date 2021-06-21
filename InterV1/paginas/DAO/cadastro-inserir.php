<?php
    session_start();
    include("../../estrutura/conexao.php");
    $nome = $_POST['CadastroNome'];
    $email = $_POST['CadastroEmail'];
    $senha = $_POST['CadastroSenha'];
    $data = $_POST['CadastroData'];
    $cep = $_POST['CadastroCEP'];
    $estado = $_POST['CadastroEstado'];
    $recebe_foto = $_FILES['fImage'];


    try{
        $stmt = $pdo->prepare("select U_id, u_email, U_senha from usuario where U_email = '$email'");
        $stmt ->execute();

        echo "aqui";

        while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            if ($stmt->rowCount() == 1) {
                header("Location: ../erro.php");
            }
            else {
                $destinoProfile = "../../img/perfil/";
                preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto['name'],$extensao);
                $img_nome = md5(uniqid(time())).".".$extensao[1];
        
                $sql2 = "insert into usuario values(default,'$nome','$email','$senha','0','$estado','$cep','$data','$img_nome');";
        
                try{
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2 ->execute();
                    
                    move_uploaded_file($recebe_foto2['tmp_name'],$destinoProfile.$img_nome);
                    header("Location: ../logPage.php");                
                }catch(PDOException $e){
                    echo "Erro: " . $e->getMessage(); 
                }
                }
            }
        
        }catch(PDOException $f){
        echo "Erro: " . $f->getMessage(); 
        }


?>
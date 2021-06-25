<?php 
    session_start();

    include("../estrutura/conexao.php");

    $data = date('Y-m-d');
    $ticket = uniqid();
    $idUser = $_SESSION['ID'];

    foreach ($_SESSION['carrinho'] as $cd => $qnt) {
        try{
            $stmt = $pdo->prepare("select p_val from produtos where p_ID = '$cd'");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $preco = $row['p_val'];
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        /*Insert*/
        try{
            $stmt2 = $pdo->prepare("insert into vendas
            (no_ticket, U_id, p_ID, qnt_prod, val_item, data_venda)
            values
            ('$ticket','$idUser','$cd','$qnt','$preco','$data');
            ");
            $stmt2->execute();

        }catch(PDOException $f){
            echo $f->getMessage();
        }
    }
    include("fim.php");

?>
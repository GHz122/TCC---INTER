<?php 
    require("../estrutura/verificacao-sessao-usuario.php");
    include("../estrutura/conexao.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");

    $ticket_compra = $_GET['ticket'];
    $total = 0;
?>
<br><br><br>

<div class="text-ticket">
    <h1>Compra: <?php echo $ticket_compra;?></h1>
</div>
<div class="container-ticket">
    <table class="tabela-profile">
        <thead class="thead-profile">
            <tr>
                <th>DATA</th>
                <th>PRODUTO</th>
                <th>QUANTIDADE</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody class="tbody-profile">
            <?php 
                try {
                    $stmt = $pdo->prepare("select * from vw_Vendas where no_ticket = '$ticket_compra'");
                    $stmt->execute();
            
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $total += $row['val_item'];
                            
            ?>
            <tr>
                <td><?php echo date('d/m/y',strtotime($row['data_venda'])); ?></td>
                <td><?php echo $row['p_nome']; ?></td>
                <td><?php echo $row['qnt_prod']; ?></td>
                <td>R$ <?php echo $row['val_item']; ?></td>
            </tr>
            <?php
        }

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
?>  

        </tbody>
    </table>

</div>
<div class="info-ticket">
    <h1>Total: R$ <?php echo $total;?></h1>
    <a href="profile.php"><button> &#x2938; VOLTAR</button></a>
</div>


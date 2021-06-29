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
    <h1> VENDAS </h1>
</div>



<div class="container-ticket">
    <table class="tabela-profile">
        <thead class="thead-profile">
            <tr>
                <th>DATA</th>
                <th>TICKET</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody class="tbody-profile">
            <?php 
                try {
                    $stmt = $pdo->prepare("select u.U_nome, v.data_venda, v.val_total, v.no_ticket from vendas as v 
                    join usuario as u
                    on v.U_id = u.U_id");
                    $stmt->execute();
            
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $total += $row['val_total'];
                            
            ?>
            <tr>
                <td><?php echo date('d/m/y',strtotime($row['data_venda'])); ?></td>
                <td><?php echo $row['U_nome']; ?></td>
                <td><a href="ticket.php?ticket=<?php echo $row['no_ticket']; ?>"><?php echo $row['no_ticket']; ?></a></td>
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
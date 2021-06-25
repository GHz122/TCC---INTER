<?php 
    include("../estrutura/conexao.php");
    include("../estrutura/verificacao-sessao-usuario.php");
    require('../estrutura/header.php');
    include("../estrutura/nav.php");

   
?>
    
    <br><br><br>
    <?php 
        try{
            $stmt = $pdo->prepare("select U_cep, U_nome, U_email, U_estado, U_img 
            from usuario 
            where u_id = '$_SESSION[ID]'");
            $stmt ->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                $nomeBanco = $row['U_nome'];
                $emailBanco = $row['U_email'];
                $estadoBanco = $row['U_estado'];
                $imgBanco = $row['U_img'];
                $cepBanco = $row['U_cep'];

    ?>
   <div class="tudo-profile">
   <div class="pfcontainer">
        <div class="profile-header">
            <div class="profile-img">
                <img src="../img/perfil/<?php echo $imgBanco?>" width="200" alt="">                
            </div>
            <div class="profile-nav-info">
                    <h3 class=""><?php echo $nomeBanco; ?></h3>
                    <div class="adress">
                        <p class="state"><?php echo $estadoBanco; ?></span></p>
                    </div>
                
                <div class="profile-option">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <span class="alert-message">1</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-bd">
            <div class="left-side">
                 <div class="profile-side">
                    <p class="user-mail"><i class="">&#x2709;  <?php  echo $emailBanco; ?></i></p>
                    <p class="user-mail"><i class="">CEP:  <?php  echo $cepBanco; ?></i></p>
                    <p class="user-mail"><i class="">
                        <form action="DAO/alterarImgUser.php" method="POST" enctype="multipart/form-data" >
                            <label class="labelInput-img" for = "UploadImg">Selecionar</label>
                            <input class = "uparImagem-profile"type="file" name="UploadImg" id="UploadImg">
                            <button type="submit" class="btnAtualizar-img-profile">Alterar Foto</button>
                        </form>
                       </i>
                    </p>

                        
                            <?php if ($_SESSION['Status'] == 1) {?>
                                <div class="profile-btn">
                                    <a href="../paginas/adm.php"><button class="createbtn"><i class="fa fa-plus"> Criar</i></button></a>
                                </div>
                            <?php }?>

                    </div>
                </div>
            <div class="right-side">
                <div class="nav">
                <ul>
                    <li onclick="tabs(0)" class="user-post active">
                    Histórico
                    </li>
                    <li onclick="tabs(2)" class="user-setting">
                    Configurações
                    </li>
                </ul>
            </div>
            <div class="profile-body">
                <div class="profile-posts tab">
                    <h1>Histórico de Produtos</h1>
                    
                    <div class="">
                        <table class="tabela-profile">
                            <thead class="thead-profile">
                                <tr>
                                    <th>TICKET</th>
                                    <th>DATA</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-profile">
                                <?php 
                                    try{
                                        $stmthist = $pdo->prepare("select * from vw_Vendas where U_id = '$_SESSION[ID]' group by no_ticket");
                                        $stmthist->execute();

                                        while($rowhist = $stmthist->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td><a href="ticket.php?ticket=<?php echo $rowhist['no_ticket']; ?>"><?php echo $rowhist['no_ticket']; ?></a></td>
                                    <td><?php echo date('d/m/y',strtotime($rowhist['data_venda'])); ?></td>
                                </tr>
                                

                                <?php
                                        }

                                    }catch(PDOException $h){
                                        echo $h->getMessage();
                                    }
                                ?>    


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="profile-setting tab">
                    <h1>Configuração da conta</h1>
                </div>
            </div>
        </div>
    </div>
</div>
   </div>

<?php 
    }
}catch(PDOException $e){
    echo "Erro: " . $e->getMessage(); 
}

?>



<script src="../jquery/jquery-3.6.0.min.js"></script>
<script src="../jquery/jquery.js"></script>
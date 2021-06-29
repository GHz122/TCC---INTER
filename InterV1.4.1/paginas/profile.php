<?php 
    include("../estrutura/conexao.php");
    include("../estrutura/verificacao-sessao-usuario.php");
    require('../estrutura/header.php');
    include("../estrutura/nav.php");

   
?>
    
    <br><br><br>
    <?php 
        try{
            $stmt = $pdo->prepare("select U_id,U_nasc ,U_cep, U_nome, U_email, U_estado, U_img 
            from usuario 
            where u_id = '$_SESSION[ID]'");
            $stmt ->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                $idBanco = $row['U_id'];
                $nomeBanco = $row['U_nome'];
                $emailBanco = $row['U_email'];
                $estadoBanco = $row['U_estado'];
                $imgBanco = $row['U_img'];
                $cepBanco = $row['U_cep'];
                $dataBanco = $row['U_nasc'];

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
                    <li onclick="tabs(1)" class="user-setting">
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
                    <div class="blocoForm-perfil">
                        <form action="alteracaoBD/alterarPerfilPHP.php?id=<?php echo $idBanco; ?>" method="POST">
                            <div class="blocoInserir-profile">
                                <div class="inputProfile-profile">
                                    <input type="text" name="txNome" id="" value="<?php echo $nomeBanco; ?>" placeholder="Nome:">
                                </div>
                                <div class="inputProfile-profile">
                                    <input type="email" name="txEmail" id="" value="<?php echo $emailBanco; ?>" placeholder="E-mail:">
                                </div>
                                <div class="inputProfile-profile">
                                    <select name="opEstado" id="">
                                        <option value="<?php echo $estadoBanco;?>"><?php echo $estadoBanco;?></option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="inputProfile-profile">
                                    <input type="password" name="txNovaSenha" id="" placeholder="Nova Senha: ">
                                </div>
                                <div class="inputProfile-profile">
                                    <input type="text" name="txCep" id="" value="<?php echo $cepBanco; ?>">
                                </div>
                                <div class="inputProfile-profile">
                                    <input type="date" name="txData" id="" >
                                </div>
                            </div>
                            <div class="blocoConfirmar-profile">
                                <h4>Coloque a senha atual para alterar:</h4>
                                <div class="inputProfile-profile">
                                    <input type="password" name="txSenha" id="" placeholder="Senha:">
                                </div>
                                <div class="inputProfile-profile">
                                    <button class="inputSubmit-profile" type="submit">Alterar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
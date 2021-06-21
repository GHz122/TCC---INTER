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
                <img src="../img/perfil/09870914704ef68a134b9b6820ae96c5.jpg" width="200" alt="">
                <button>ALTERAR FOTO</button>
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
                    <!-- <p class="mobile-no"><i class=" fa fa-phone"> +55 (11) xxxxx-xxxx</i></p> -->
                    <p class="user-mail"><i class="fa fa-envelope">  <?php  echo $emailBanco; ?></i></p>
                    <p class="user-mail"><i class="">CEP:  <?php  echo $cepBanco; ?></i></p>
                        <!-- <div class="user-bio">
                            <h3>Bio</h3>
                            <p class="bio"> lorem ipsum dolor sit amet consectetur adipiscing elit posuere et ridiculus netus odio 
                                    nisl auctor libero justo aptent at porttitor natoque fusce proin himenaeos vulputate scelerisque 
                                    unc nibh interdum cursus phasellus vestibulum litora rutrum fermentum montes blandit suscipit malesuada ac per massa commodo penatibuse
                                    uismod pellentesque in conubia magnis</p> -->
                        
                            <?php if ($_SESSION['Status'] == 1) {?>
                                <div class="profile-btn">
                                    <button class="createbtn"><i class="fa fa-plus"> Criar</i></button>
                                </div>
                            <?php }?>
                            <!-- <div class="user-rating">
                                <h3 class="rating">4.5</h3>
                                <div class="rate">
                                    <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    </div>
                                    <span class="no-user"><span>123</span>&nbsp;&nbsp; reviews</span>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            <div class="right-side">
                <div class="nav">
                <ul>
                    <li onclick="tabs(0)" class="user-post active">
                    Histórico
                    </li>
                    <!-- <li onclick="tabs(1)" class="user-review">
                    REVIEWS
                    </li> -->
                    <li onclick="tabs(2)" class="user-setting">
                    Configurações
                    </li>
                </ul>
            </div>
            <div class="profile-body">
                <div class="profile-posts tab">
                    <h1>Histórico de Produtos</h1>
                </div>
                <!-- <div class="profile-review tab">
                    <h1>Usuário</h1>
                    <p>lorem ipsum dolor sit amet consectetur adipiscing elit posuere et ridiculus netus odio nisl auctor libero justo aptent at porttitor natoque fusce proin himenaeos vulputate scelerisque tempor nunc nibh interdum cursus phasellus vestibulum litora rutrum fermentum montes blandit suscipit malesuada ac per massa commodo penatibus euismod pellentesque in conubia magnis</p>
                </div> -->
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
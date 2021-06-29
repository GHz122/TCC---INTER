
<nav>
    <div class="wrapper">
      <img src="../img/Inter2.png" height="50px" width="120px" href="index.php" alt="">
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
        <li><a href="index.php">Home</a></li>
        <li>
          <a href="#" class="desktop-item">Sobre nós</a>
          <input type="checkbox" id="showDrop">
          <label for="showDrop" class="mobile-item">Sobre nós</label>
          <ul class="drop-menu">
            <li><a target="_blank" href="contato.php">Perguntas Frequentes</a></li>
            <li><a target="_blank" href="contato.php">Contato</a></li>
            <li><a href="#">Opções de Pagamento</a></li>
          </ul>
        </li>
        <li>
          <a href="../paginas/shop.php?categoria=&sexo=" class="desktop-item">Shop</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Shop</label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img>
              </div>
              <div class="row">
                <header>Masculino</header>
                <ul class="mega-links">
                    <li><a href="../paginas/shop.php?categoria=1&sexo=2">Camisas</a></li>
                    <li><a href="../paginas/shop.php?categoria=2&sexo=2">Jaquetas & Moletons</a></li>
                    <li><a href="../paginas/shop.php?categoria=3&sexo=2">Calças</a></li>
                    <li><a href="../paginas/shop.php?categoria=4&sexo=2">Tênis</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Feminino</header>
                <ul class="mega-links">
                    <li><a href="../paginas/shop.php?categoria=1&sexo=1">Camisas</a></li>
                    <li><a href="../paginas/shop.php?categoria=2&sexo=1">Jaquetas & Moletons</a></li>
                    <li><a href="../paginas/shop.php?categoria=3&sexo=1">Calças</a></li>
                    <li><a href="../paginas/shop.php?categoria=4&sexo=1">Tênis</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Outros</header>
                <ul class="mega-links">
                  <li><a href="../paginas/shop.php?categoria=5&sexo=3">Relógios</a></li>
                  <li><a href="../paginas/shop.php?categoria=6&sexo=3">Colares</a></li>
                  <li><a href="../paginas/shop.php?categoria=7&sexo=3">Brincos</a></li>
                  <li><a href="../paginas/shop.php?categoria=8&sexo=3">Anéis</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>

        <!-- <li class="idxli"><a class="indexA" href="../paginas/cartPHP.php"><img src="../img/4.png" width="40px" height="40px"></a>
        </li> -->
        <li>
          <a href="../paginas/cartPHP.php"> Cart</a>
        </li>

        <?php 
          if(empty($_SESSION['ID'])) {
        
        ?>

        
        <li>
          <a href="logPage.php" class="desktop-item">ENTRAR</i></a>
          <input type="checkbox" id="showDrop2">
          <label for="showDrop2" class="mobile-item">Perfil</label>
          <ul class="drop-menu">
            <li><a href="profile.php">Meu Perfil</a></li>
            <li><a target="_blank" href="contato.php">Ajuda</a></li>
            <li><a href="logPage.php">Login</a></li>
          </ul>
        </li>
        <?php
          }
          else{
            try{
              $stmt = $pdo->prepare("select U_nome, U_status 
              from usuario 
              where U_id = '$_SESSION[ID]'");
              $stmt ->execute();
              
              while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                  $senhaBanco = $row['U_nome'];
                  $statusBanco = $row['U_status'];
                  
              
        ?>
        <!-- <img src="../img/nav-perfil/icone-perfil.png" class="nav-pf-img" alt=""> -->
        <li>
          <a href="profile.php" class="desktop-item"><?php echo $row['U_nome'];?></i></a>
          <input type="checkbox" id="showDrop2">
          <label for="showDrop2" class="mobile-item"><?php echo $row['U_nome'];?></label>
          <ul class="drop-menu">
            <li><a href="profile.php">Meu Perfil</a></li>
            <li><a target="_blank" href="contato.php">Ajuda</a></li>
            <?php if ($_SESSION['Status'] == 1) {?>
            <li><a href="../paginas/adm.php">Administrador</a></li>
            <?php }?>
            <li><a href="../paginas/DAO/sair.php">Logout</a></li>
          </ul>
        </li>

        <?php 
          }
        }catch(PDOException $e){
            echo "Erro: " . $e->getMessage(); 
        }  
        
        }
        ?>


      </ul>
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>

        

<script src="../JS/cart-main.js"></script>
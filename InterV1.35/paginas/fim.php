<?php 
    require('../estrutura/header.php');
    require('../estrutura/nav.php');

?>
<div class="container-fim">
    <div class="divh2P-fim">
        <h2>Compra efetuada com sucesso!! Seu número de recibo é: <?php echo $ticket; ?></h2>
    </div>
    <div class="btn-fim">
        <a href="index.php">
            <button> &#x2938; VOLTAR</button>
        </a>
    </div>
</div>

<?php 
    unset($_SESSION['carrinho']);
?>
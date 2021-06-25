<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
    if($_SESSION['Status'] != 1) {
        header("Location: ../index.php");
    }

    $id = $_GET['id'];
    $idMarca = $_GET['marca'];
    $idCat = $_GET['categoria'];
    $idSexo = $_GET['sexo'];

?>




<div class="container1-include">
    <div class="container2-include">
        <div class="inserirProduto-include">
            <div class="textheader-include">
                <h1>ALTERAR PRODUTO</h1>
            </div>
            <?php 

                try{
                    $stmtAlterar = $pdo->prepare("select * from produtos where p_ID = '$id' ");
                    $stmtAlterar->execute();

                    while($rowAlterar = $stmtAlterar->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <form action="alteracaoBD/alterarProdutoPHP.php?id=<?php echo $rowAlterar['p_ID'];?>" method="POST" enctype="multipart/form-data">
                    <div class="inserir-include">
                        <input type="text" placeholder="Produto:" name="txProduto" value="<?php echo $rowAlterar['p_nome']; ?>">
                    </div>
                    <div class="inserir-include">
                        <input type="file" name="txFoto" id="" accept="image/*">
                        <img src="../img/imgShop/<?php echo $rowAlterar['p_adressImage'];?>" width="150px" height="150px" alt="">
                    </div>
                    <div class="inserir-include">
                        <input type="text" placeholder="R$00.00" name="txValor" value="<?php echo $rowAlterar['p_val']; ?>" >
                    </div>
                    <div class="inserir-include">
                        <select name="opCat" id="">
                        <?php 
                            try{
                                $stmtCat = $pdo->prepare("select * from categoria where idCategoria = '$idCat' union select * from categoria");
                                $stmtCat ->execute();
                                while($rowCat = $stmtCat->fetch(PDO::FETCH_ASSOC)){ ?>
                            <!-- Categoria do Banco -->
                                <option value="<?php echo $rowCat['idCategoria']; ?>"><?php echo $rowCat['nomeCat']; ?></option>
                            <?php }
                                }catch(PDOException $e){
                                    echo "Erro: " . $e->getMessage(); 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="inserir-include">
                            <select name="opMarca" id="">
                            <?php 
                                try{
                                    $stmtMarca = $pdo->prepare("select * from Marcas where m_ID='$idMarca' union select * from marcas");
                                    $stmtMarca ->execute();
                                    while($rowMarca = $stmtMarca->fetch(PDO::FETCH_ASSOC)){

                            ?>
                                <option value="<?php echo $rowMarca['m_ID']; ?>"> <?php  echo $rowMarca['m_nome']; ?> </option>

                            <?php 
                                    }
                                }catch(PDOException $f){
                                    echo $f->getMessage();
                                }
                            ?>
                            </select>
                    </div>
                    <div class="inserir-include">
                        <select name="opSexo" id="">
                            <option value="<?php echo $rowAlterar['p_sexo'];?>">Não Alterar Sexo</option>
                            <option value="1">Feminino</option>
                            <option value="2">Masculino</option>
                            <option value="3">Unissex</option>
                        </select>
                    </div>
                    <div class="inserirBtn-include">
                        <input type="submit" value="Alterar">
                    </div>
                </form>
                <?php
                        }
                    }catch(PDOException $g){
                        echo $g->getMessage();
                    }

                ?>
        </div>
        <div class="voltar-include">
            <a href="adm.php">
                <button> &#x2938; VOLTAR</button>
            </a>
        </div>
    </div>
</div>
<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");
    if($_SESSION['Status'] != 1) {
        header("Location: ../index.php");
    }

    $id = $_GET['id'];
    $estado = $_GET['estado'];
?>




<div class="container1-include">
    <div class="container2-include">
        <div class="inserirProduto-include">
            <div class="textheader-include">
                <h1>ALTERAR PRODUTO</h1>
            </div>
            <?php 

                try{
                    $stmtAlterar = $pdo->prepare("select * from usuario where U_id = '$id' ");
                    $stmtAlterar->execute();

                    while($rowAlterar = $stmtAlterar->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <form action="alteracaoBD/alterarUsuarioPHP.php?id=<?php echo $rowAlterar['U_id'];?>" method="POST" enctype="multipart/form-data">
                    <div class="inserir-include">
                        <input type="text" placeholder="Produto:" name="txNome" value="<?php echo $rowAlterar['U_nome']; ?>">
                    </div>
                    <div class="inserir-include">
                        <input type="file" name="txFoto" id="" accept="image/*">
                        <img src="../img/perfil/<?php echo $rowAlterar['U_img'];?>" width="150px" height="150px" alt="">
                    </div>
                    <div class="inserir-include">
                        <select name="opStatus" id="">
                            <option value="" selected disabled hidden>Status</option>
                            <option value="1">ADM</option>
                            <option value="0">Comum</option>
                        </select>
                    </div>
                    <div class="inserir-include">
                        <select name="opEstado" id="">
                        <?php 
                            try{
                                $stmtCat = $pdo->prepare("select * from usuario where U_estado = '$estado'");
                                $stmtCat ->execute();
                                while($rowCat = $stmtCat->fetch(PDO::FETCH_ASSOC)){ 
                                    $estadoBanco = $rowCat['U_estado'];
                                }
                            }catch(PDOException $e){
                                echo "Erro: " . $e->getMessage(); 
                            }
                        ?>
                            <!-- Estados do Banco -->
                                <option value="<?php echo $estadoBanco; ?>"><?php echo $estadoBanco; ?></option>
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
                    <div class="inserir-include">

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
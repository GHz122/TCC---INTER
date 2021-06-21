<?php 
    include("../estrutura/conexao.php");
    require("../estrutura/verificacao-sessao-usuario.php");
    require("../estrutura/header.php");
    require("../estrutura/nav.php");

?>
<!-- Puxando a categoria do banco -->
<?php 
    try{
        $stmtCat = $pdo->prepare("select * from categoria");
        $stmtCat ->execute();
          

?>

<div class="container1-include">
    <div class="container2-include">
        <div class="inserirProduto-include">
            <div class="textheader-include">
                <h1>INSERIR PRODUTO</h1>
            </div>
            <form action="alteracaoBD/inserirProdutoPHP.php" method="POST" enctype="multipart/form-data">
                <div class="inserir-include">
                    <input type="text" placeholder="Produto:" name="txProduto">
                </div>
                <div class="inserir-include">
                    <input type="file" name="txFoto" id="" accept="image/*">
                </div>
                <div class="inserir-include">
                    <input type="text" placeholder="R$00.00" name="txValor">
                </div>
                <div class="inserir-include">
                    <select name="opCat" id="">
                        <?php while($rowCat = $stmtCat->fetch(PDO::FETCH_ASSOC)){ ?>
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
                                $stmtMarca = $pdo->prepare("select * from Marcas");
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
                        <option value="1">Feminino</option>
                        <option value="2">Masculino</option>
                        <option value="3">Unissex</option>
                    </select>
                </div>
                <div class="inserirBtn-include">
                    <input type="submit" value="Salvar">
                </div>
            </form>
        </div>
        <div class="inserirMarca-include">
            <div class="textheader-include">
                <h1>INSERIR MARCA </h1>
            </div>
            <div class="">
                <form action="inserirMarcaPHP.php" method="POST">
                    <div class="inserir-include">
                        <input type="text" name="" id="" placeholder="Marca:">
                    </div>
                    <div class="inserirBtn-include">
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
        <div class="voltar-include">
            <a href="adm.php">
                <button> &#x2938; VOLTAR</button>
            </a>
        </div>
    </div>
</div>
        
<?php 
    session_start();
    include("../estrutura/conexao.php");
    require('../estrutura/header.php'); 
    require("../estrutura/nav.php");
    // if ($_SESSION['status']==0) {
    //     header("Location: index.php");
    // }
?>
<section>

        <div class="log-Container">
    <!--Formulario do Login-->


        <div class="user signinBx">
                
                    <div class="formBx">
                        <form id="register"action="DAO/cadastro-inserirADM.php" method="post"  enctype="multipart/form-data">
                                <h2>ADICIONE UM ADM</h2>
                                    <input type="text" class="" placeholder="Nome Completo: " name="CadastroNome">
                                    <input type="email" class="" placeholder="E-mail: " name="CadastroEmail">
                                    <input type="password" class="" id="senhaCadastro" placeholder="Senha: " name="CadastroSenha" required>
                                    <input type="date" class="" placeholder="Data de Nascimento " name="CadastroData">
                                    <input type="text" id="cep" placeholder="CEP: " name="CadastroCEP">
                                    <input list="estados" id="estado" class="" placeholder="Estado: " name="CadastroEstado">
                                    <datalist id="estados" order="name" name="estados"> 
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
                                    </datalist>
                                    <input type="submit" value="Criar">
                        </form>
                    </div>
                    <div class="imgBx">
                    <img src="../img/imgLog/ldoor.jpg"  height="560px" width="400px" alt=""> 
                </div>
            </div>
        </div>
    </section>
<?php 
    //include("../estrutura/conexao.php");
    require('../estrutura/header.php'); 
?>
    <section>

        <div class="log-Container">
    <!--Formulario do Login-->

            <div class="user signinBx">
                <div class="imgBx"><img src="../img/imgLog/rfashion.jpg"  height="560px" width="400px" alt=""> </div>
                    <div class="formBx">
                        <form id="login" action="DAO/login-consulta.php" method="post">
                            <h2>Login</h2>
                            <input type="email" class="" placeholder="E-mail: " name="txEmail">
                            <input type="password" class="" id="senhaLogin" placeholder="Senha: " name="txSenha">
                            <input name="entra" type="submit" value="Entrar">
                            <p class="signup">Não tem uma conta? <a href="#" onclick="toogleForm();">Cadastre-se aqui</a></p>
                        </form>    
                </div>
            </div>


        <div class="user signupBx">
                
                    <div class="formBx">
                        <form id="register"action="DAO/cadastro-inserir.php" method="post"  enctype="multipart/form-data">
                                <h2>Crie sua Conta</h2>
                                <div class="max-width">
                                    <div class="imageContainer">
                                        <img src="../img/nav-perfil/icone-perfil.png" alt="Selecione uma imagem" id="imgPhoto">
                                    </div>
                                </div>

                                    <input class="inputFile-logPage" type="file" id="flImage" name="fImage" accept="image/*">
                                    
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
                                    <input name="ok" type="submit" value="Criar">
                                    <p class="signup"> Já é um usuário?<a href="#" onclick="toogleForm();"> Login</a></p>
                        </form>
                    </div>
                    <div class="imgBx">
                    <img src="../img/imgLog/ldoor.jpg"  height="560px" width="400px" alt=""> 
                </div>
            </div>
        </div>
    </section>

    
    <script>

    function toogleForm(){
        section = document.querySelector('section');
        container = document.querySelector('.log-Container');
        container.classList.toggle('active');
        section.classList.toggle('active');
    }


    let photo = document.getElementById('imgPhoto');
let file = document.getElementById('flImage');

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', () => {

    if (file.files.length <= 0) {
        return;
    }

    let reader = new FileReader();

    reader.onload = () => {
        photo.src = reader.result;
    }

    reader.readAsDataURL(file.files[0]);
});

    </script>
</body>
</html>

<script src="../jquery/jquery.mask.js"></script>

<script>
    $(document).ready(function() {
        $('#cep').mask("00000-000");
    });
</script>


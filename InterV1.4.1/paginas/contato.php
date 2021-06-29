<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleContato.css">
    <!--Fonte Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goblin+One&family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <title>INTER - Fale Conosco</title>
</head>
<body>
    <!-- ------------------------Barra de pesquisa e título----------->
    <header class="header">
        <div class="headerText-contato">
        <p>CENTRAL DE AJUDA</p>
        </div>
        <div class="headerSearch-contato">
            <input type="text" placeholder="Pesquisar: ">
            <a href=""><img src="../img/imgContato/lupa.png" alt="Pesquisa"></a>
        </div>
    </header>

<!----------------Perguntas prontas---------------->
    <main class="mainContent">
        <div id="perguntas" class="ctituloPerguntasFreq">
            <h1>PERGUNTAS FREQUENTES</h1>
            <p>Encontre as respostas para as perguntas mais frequentes</p>
        </div>
        <div class="boxPergunta1">
            <div class="tituloBoxPergunta">
                <h3>Entrega</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Como identificar a melhor opção de frete?</a>
                <a href="">É possível alterar o endereço após confirmação do pagamento?</a>
                <a href="">Entregas em outros países</a>
            </div>
        </div>

        <div class="boxPergunta2">
            <div class="tituloBoxPergunta">
                <h3>Produtos</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Produtos Originais?</a>
                <a href="">Como encontrar o produto que estou procurando?</a>
                <a href="">Como procurar através de marcas</a>
                <a href="">O que fazer caso o produto aparenta defeito</a>
            </div>
        </div>

        <div class="boxPergunta3">
            <div class="tituloBoxPergunta">
                <h3>Pedidos</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Posso alterar o pedido após o pagamento?</a>
                <a href="">Como cancelar a compra?</a>
                <a href="">Como acessar a nota fiscal?</a>
            </div>
        </div>

        <div class="boxPergunta4">
            <div class="tituloBoxPergunta">
                <h3>Pagamentos</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Quais são as opções de pagamento?</a>
                <a href="">Como pagar através do boleto?</a>
                <a href="">Boleto venceu?</a>
            </div>
        </div>

        <div class="boxPergunta5">
            <div class="tituloBoxPergunta">
                <h3>Escolha seu tamanho</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Como utilizar nossa ferramenta para escolher o seu tamanho?</a>
            </div>
        </div>

        <div class="boxPergunta6">
            <div class="tituloBoxPergunta">
                <h3>Política de Privacidade</h3>
            </div>
            <div class="conteudoPergunta">
                <a href="">Política de privacidade</a>
            </div>
        </div>
    </main>
<!--Formumário de perguntas e informações de contato-->

    <div class="hero">
        <h3 id="contato" class="h3hero">AINDA COM DÚVIDA?</h3>
        <div class="contact-box">
            <div class="contact-left">
                <h3>Envie sua Pergunta</h3>
                <form>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Nome</label>
                            <input type="name" placeholder="Ex: João Amoedo">
                        </div>
                        <div class="input-group">
                            <label>Telefone</label>
                            <input type="number" placeholder="Ex: (11) 97670-9018">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" placeholder="Ex: JoãoAmoedo@gmail.com">
                        </div>
                        <div class="input-group">
                            <label>Assunto</label>
                            <input type="message" placeholder="Ex: Sugestões, Critícas, etc...">
                        </div>
                    </div>
                        <label>Mensagem</label>
                        <textarea rows="5" placeholder="Sua mensagem"></textarea>

                        <button class="btn" type="submit">Enviar</button>
                </form>
            </div>

            <div class="contact-right">
                <h3>FALE CONOSCO</h3>
                <table> 
                    <tr>
                        <td>Email: </td>
                        <td>InterCorp@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Telefone: </td>
                        <td>+55 (11) 9xxxxx-xxxx</td>
                    </tr>
                    <tr>
                        <td>Endereço: </td>
                        <td>Av xxxxxx, xx</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    // $variaveis_extras = http_build_query($_POST);
    // $variaveis_extras = $_POST['sCepDestino'];
    // $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=01311000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3&sCepDestino='.$variaveis_extras;

    // $xml = file_get_contents('http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=01311000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3&sCepDestino=03936040');
    // echo $xml;

    $teste = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=01311000&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=04510&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3&sCepDestino=03572000";
    $pegar = simplexml_load_file($teste);
    $result = $pegar->cServico->Valor;
    echo $result;
    // $unparsedResult = file_get_contents($url);
    // echo $unparsedResult;
    // $parsedResult = simplexml_load_string($unparsedResult);

//     $retorno = array(
//     'preco' => strval($parsedResult->cServico->Valor),
//     'prazo' => strval($parsedResult->cServico->PrazoEntrega)
//     );
// die(json_encode($retorno));
?>  
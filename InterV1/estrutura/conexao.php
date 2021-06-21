<?php

    //dados para acesso ao banco de dados
    $servidor = "localhost";
    $banco = "Inter_DataBase";
    $usuario = "root";
    $senha = "";

    $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
?>
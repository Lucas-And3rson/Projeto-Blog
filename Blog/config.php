<?php
    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'syscomentario';

    $conexao = new mysqli($dbHost,$dbUsername, $dbPassword, $dbName);

   /* TESTANDO CONEXÃO!
   if($conexao->connect_errno)
    {
        echo "Erro";
    } 
    else {
        echo "Conecão OK!";
    }
   */
?>
<?php

 $aluno       = trim($conexao->escape_string($_POST['nome-aluno']));
 $matricula   = trim($conexao->escape_string($_POST['matricula']));
 
 $sql = "SELECT * FROM $nomeDaTabela1 WHERE matricula = '$matricula'";
 $conexao->query($sql) or die($conexao->error);

 if($conexao->affected_rows == 0)
 {
    $sql = "INSERT $nomeDaTabela1 VALUES(
        '$aluno',
        '$matricula')";

    $conexao->query($sql) OR $conexao->error;
    echo "<p> Dados do(a) aluno(a) cadastrados com sucesso. </p>";
 }
 else
 {
    exit("<p> ERRO: a matrícula fornecida já encontra-se cadastrada no sistema. </p>
          <a href='./../html/atividade3.html'> Voltar ao início </a>");
 }

 
 

 
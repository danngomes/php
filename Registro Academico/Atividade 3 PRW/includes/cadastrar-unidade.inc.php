<?php

 $unidade        = trim($conexao->escape_string($_POST['nome-unidade']));
 $codigo         = trim($conexao->escape_string($_POST['codigo-unidade']));
 $matriculaAluno = trim($conexao->escape_string($_POST['aluno-matriculado']));

 $sql = "SELECT * FROM $nomeDaTabela1 WHERE matricula = '$matriculaAluno'";
 $conexao->query($sql) or die($conexao->error);

 if($conexao->affected_rows == 0)
  {
  exit("<p> ERRO: a matrícula fornecida é inválida. Tente novamente! </p>
        <a href='./../html/atividade3.html'> Voltar ao início </a>");
  }
 
 $sql = "SELECT * FROM $nomeDaTabela2 WHERE codigo = '$codigo'";
 $resultado = $conexao->query($sql) or die($conexao->error);

 if($conexao->affected_rows == 0)
 {
      $sql = "SELECT * FROM $nomeDaTabela2 WHERE unidade_curricular = '$unidade'";
      $resultado2 = $conexao->query($sql) or die($conexao->error);

      if($conexao->affected_rows != 0)
      {
            exit("<p> ERRO: o nome informado já corresponde a uma unidade curricular cadastrada. Tente novamente! </p>
                  <a href='./../html/atividade3.html'> Voltar ao início </a>");
      }      
      
      $sql = "INSERT $nomeDaTabela2 VALUES(
             NULL,                   
            '$unidade',
            '$codigo',
            '$matriculaAluno')";

      $conexao->query($sql) OR die($conexao->error);
 }
 
 else
 {
      $vetorRegistro = $resultado->fetch_array();
      $nomeUnidade   = $vetorRegistro[1];
      $codigoUnidade = $vetorRegistro[2];      

      $sql = "SELECT unidade_curricular FROM $nomeDaTabela2 WHERE codigo = '$codigoUnidade'";
      $resultado2 = $conexao->query($sql) or die($conexao->error);

      $vetorRegistro2 = $resultado2->fetch_array();
      $nomeUnidade2 = $vetorRegistro2[0];

      if($nomeUnidade2 != $unidade)
      {
            exit("<p> ERRO: o nome preenchido não corresponde ao código informado. Tente novamente! </p>
                  <a href='./../html/atividade3.html'> Voltar ao início </a>");
      }

      //tentamos abaixo criar uma restrição de duplicidade de matrícula por unidade, mas sem sucesso
      
      /*$sql = "SELECT matricula_aluno FROM $nomeDaTabela2 WHERE codigo = '$codigoUnidade'";
      $resultado3 = $conexao->query($sql) or die($conexao->error);

      if($conexao->affected_rows != 0)
      {
            exit("<p> ERRO: a matrícula informada já consta neste unidade curricular! </p>
                  <a href='./../html/atividade3.html'> Voltar ao início </a>");
      }*/

      else
      {
            $sql = "INSERT $nomeDaTabela2 VALUES(
                  NULL,                   
                 '$nomeUnidade',
                 '$codigoUnidade',
                 '$matriculaAluno')";
     
           $conexao->query($sql) OR die($conexao->error);   
      }
     
 }

 echo "<p> Dados da unidade curricular cadastrados com sucesso. </p>";
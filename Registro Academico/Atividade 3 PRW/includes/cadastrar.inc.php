<?php
 //operações de cadastro dos alunos no banco de dados
 $matric = $_POST['matric'];
 $aluno  = $_POST['aluno'];
 $media  = $_POST['media'];

 //CUIDADO: sempre que a nossa aplicação for cadastrar dados no banco de dados, devemos nos preocupar com o ataque do tipo Injeção de SQL. O PHP contorna este problema por meio do comando abaixo
 $matric = $conexao->escape_string($matric);
 $aluno  = $conexao->escape_string($aluno);
 $media  = $conexao->escape_string($media);

 //agora, com os dados seguros, eles estão prontos para serem enviados ao banco de dados
 $sql = "INSERT $nomeDaTabela VALUES(
                   '$matric',
                   '$aluno', 
                   $media)";

 //execução da consulta no banco de dados
 $conexao->query($sql) OR $conexao->error;

 echo "<p> Dados do aluno cadastrados com sucesso no banco de dados. </p>";
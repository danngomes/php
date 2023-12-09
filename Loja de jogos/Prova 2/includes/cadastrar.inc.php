<?php
 $nome         = $conexao->escape_string(trim($_POST['nome']));
 $preco        = $conexao->escape_string(trim($_POST['preco'])); 

 if($preco>500)
 {
      exit("<p> ERRO! O preço informado excede o limite permitido de R$ 500,00 </p>
      <a href='./../html/prova2.html'> Voltar ao início </a>");
 }

 else
 {
      $sql = "INSERT $nomeDaTabela VALUES(
         NULL,
         '$nome',
         $preco)";

      $conexao->query($sql) OR $conexao->error;

      echo "<p> Dados do jogo cadastrados com sucesso. </p>";
 }

 
<?php

 $alunoPesquisado = trim($conexao->escape_string($_POST['pesquisa-nome-aluno']));

 $sql = "SELECT matricula FROM $nomeDaTabela1 WHERE aluno LIKE '%$alunoPesquisado%'";

 $resultado = $conexao->query($sql) OR die($conexao->error);

 if($conexao->affected_rows == 0)
  {
  exit("<p> ERRO: o nome do(a) aluno(a) fornecido não foi encontrado no banco de dados. Tente novamente. </p>
        <a href='./../html/atividade3.html'> Voltar ao início </a>");
  }

  if($conexao->affected_rows > 1)
  {
  exit("<p> ERRO: mais de um registro encontrado no banco de dados. Favor informar o nome completo do(a) aluno(a). </p>
        <a href='./../html/atividade3.html'> Voltar ao início </a>");
  }

 $registro = $resultado->fetch_array();
 $matricEncontrada = $registro[0];

 $sql = "SELECT * FROM $nomeDaTabela2 WHERE matricula_aluno = '$matricEncontrada'";

 $resultado = $conexao->query($sql) or die($conexao->error);

 if($conexao->affected_rows == 0)
  {
  exit("<p> O(A) aluno(a) pesquisado(a) não está matriculado(a) em nenhuma unidade curricular. </p>
        <a href='./../html/atividade3.html'> Voltar ao início </a>");
  }

 $sql = "SELECT aluno FROM $nomeDaTabela1 WHERE aluno LIKE '%$alunoPesquisado%'";
 $resultado2 = $conexao->query($sql) or die($conexao->error);
 $vetorResultado = $resultado2->fetch_array();
 $nomeAluno = $vetorResultado[0];

 echo "<table>
        <caption> Relação de unidades curriculares cursadas por 
        <span> $nomeAluno </span>,  matrícula <span> '$matricEncontrada' </caption>
        <tr>
         <th> Código </th>
         <th> Unidade Curricular </th>         
        </tr>";

 while($vetorRegistro = $resultado->fetch_array())
  {
  $codigo  = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
  $unidade = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");  

  echo "<tr>
         <td> $codigo </td>
         <td> $unidade </td>        
        </tr>";  
  }
echo "</table>";


 



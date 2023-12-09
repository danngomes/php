<?php
 
 $sql = "SELECT AVG(preco) FROM $nomeDaTabela";

 $resultado = $conexao->query($sql) OR die($conexao->error);
 $registro = $resultado->fetch_array();
 $precoMedio = $registro[0];

 $precoMedio2 =  number_format($precoMedio, 2, ',', '.');

 echo "<p> Preço médio dos jogos cadastrados: R$$precoMedio2</p>"; 
 
 $sql = "SELECT * FROM $nomeDaTabela WHERE preco < $precoMedio";

 $resultado = $conexao->query($sql) OR die($conexao->error);

 echo "<table>
        <caption> Relação de jogos com preço <b>abaixo</b> da média </caption>
        <tr>
         <th> ID </th>
         <th> Nome </th>
         <th> Preço </th>         
        </tr>";

 while($registro = $resultado->fetch_array())
  {
  $id    = htmlentities($registro[0], ENT_QUOTES, "UTF-8");
  $nome  = htmlentities($registro[1], ENT_QUOTES, "UTF-8");
  $preco = htmlentities($registro[2], ENT_QUOTES, "UTF-8");
  
  echo "<tr>
         <td> $id </td>
         <td> $nome </td>
         <td> $preco </td>         
        </tr>";
  }
  echo "</table>";
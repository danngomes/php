<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Banco de dados com PHP - Prova 2 </title> 
  <link rel="stylesheet" href="./../css/formata-banco.css">
</head> 

<body> 
 <h1> PHP Games </h1>

 <?php
  require "./../includes/dados-conexao.inc.php";
  require "./../includes/conectar.inc.php";
  require "./../includes/criar-banco.inc.php";
  require "./../includes/abrir-banco.inc.php";
  require "./../includes/definir-charset.inc.php";
  require "./../includes/criar-tabela.inc.php";

  if(isset($_POST['cadastrar']))
   {
    require "./../includes/cadastrar.inc.php";
   }

  if(isset($_POST['executar-operacao']))
   {    
    require "./../includes/tabular-dados.inc.php";
   }
   
  require "./../includes/desconectar.inc.php";
 ?>
 <a href="./../html/prova2.html"> Voltar ao início </a>    
</body> 
</html> 
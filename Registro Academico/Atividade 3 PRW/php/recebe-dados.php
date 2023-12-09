<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Banco de dados com PHP </title> 
  <link rel="stylesheet" href="./../css/formata-banco.css">
</head> 

<body> 
 <h1> Banco de Dados MySQL com PHP - Curso AAA </h1>

 <?php
  require "./../includes/dados-conexao.inc.php";
  require "./../includes/conectar.inc.php";
  require "./../includes/criar-banco.inc.php";
  require "./../includes/abrir-banco.inc.php";
  require "./../includes/definir-charset.inc.php";
  require "./../includes/criar-tabelas.inc.php";

  if(isset($_POST['cadastrar-aluno']))
   {
   require "./../includes/cadastrar-aluno.inc.php";
   }

  if(isset($_POST['cadastrar-unidade']))
   {
   require "./../includes/cadastrar-unidade.inc.php";
   }

  if(isset($_POST['pesquisa-aluno']))
   {
   require "./../includes/pesquisa.inc.php";
   }


  require "./../includes/desconectar.inc.php";
 ?>
 <a href="./../html/atividade3.html"> Voltar ao início </a>    
</body> 
</html> 
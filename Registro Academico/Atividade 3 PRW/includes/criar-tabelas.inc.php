<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela1(           
           aluno VARCHAR(300),
           matricula VARCHAR(20) PRIMARY KEY) ENGINE=innoDB"; 
 
 $conexao->query($sql) OR die($conexao->error);

 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela2(
           id_registro INT PRIMARY KEY AUTO_INCREMENT,           
           unidade_curricular VARCHAR(300),
           codigo VARCHAR(20),
           matricula_aluno VARCHAR(20),
           
           FOREIGN KEY (matricula_aluno)
           REFERENCES $nomeDaTabela1 (matricula)) ENGINE=innoDB";

$conexao->query($sql) OR die($conexao->error);
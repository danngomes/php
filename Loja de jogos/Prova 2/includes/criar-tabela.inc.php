<?php
 $sql = "CREATE TABLE IF NOT EXISTS $nomeDaTabela(
          ID INT PRIMARY KEY AUTO_INCREMENT,
          nome VARCHAR(500),
          preco DECIMAL(6,2)) ENGINE=innoDB"; 
 
 $conexao->query($sql) OR die($conexao->error);
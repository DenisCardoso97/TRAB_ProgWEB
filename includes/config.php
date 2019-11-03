<?php
  // Tenta habilitar mensagens de erros no PHP
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  // Configura banco de dados SQLite
  $db = new SQLite3('website.db');
  
  $db->exec("CREATE TABLE IF NOT EXISTS `usuarios` (
    `email` VARCHAR NOT NULL UNIQUE,
    `cpf` VARCHAR(15) NOT NULL,
    `name` VARCHAR NOT NULL,
    `password` VARCHAR NOT NULL,
    `birthdate` VARCHAR(10),
    `phone` VARCHAR(16),
    PRIMARY KEY (`cpf`)
  );");

//Tabelas a serem resolvidas
/*$db->exec("CREATE TABLE IF NOT EXISTS `admin` (
  `cpfAdm` VARCHAR(15) NOT NULL,
  FOREIGN KEY (cpfAdm) REFERENCES usuarios(cpf),
  PRIMARY KEY (`cpfAdm`)
);");

$db->exec("CREATE TABLE IF NOT EXISTS `passagens` (
  `valor` DOUBLE NOT NULL,
  `idPassgem` INTEGER AUTOINCREMENT NOT NULL,
  `origem` VARCHAR NOT NULL,
  `destino` VARCHAR NOT NULL,
  `dataSaida` VARCHAR(10),
  `dataChegada` VARCHAR(16),
  `cpfDono` VARCHAR (15),
  `classe` VARCHAR (10) NOT NULL,
  FOREIGN KEY(cpfDono) REFERENCES usuarios(cpf),
  PRIMARY KEY (`idPassagem`)
);");*/
  $db->enableExceptions(true);
?>
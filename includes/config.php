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
    `admin` BOOLEAN DEFAULT false,
    `phone` VARCHAR(16),
    PRIMARY KEY (`cpf`)
  );");

//Tabelas a serem resolvidas
/*$db->exec("CREATE TABLE IF NOT EXISTS `admin` (
  `cpfAdm` VARCHAR(15) NOT NULL,
  FOREIGN KEY (cpfAdm) REFERENCES usuarios(cpf),
  PRIMARY KEY (`cpfAdm`)
);");*/

$db->exec("CREATE TABLE IF NOT EXISTS `passagens` (
  `valor` NUMERIC NOT NULL,
  `idPassagem` INTEGER PRIMARY KEY AUTOINCREMENT,
  `origem` VARCHAR NOT NULL,
  `destino` VARCHAR NOT NULL,
  `dataSaida` VARCHAR(10) NOT NULL,
  `horarioSaida` VARCHAR(5) NOT NULL,
  `horarioChegada` VARCHAR(5) NOT NULL,
  `cpfDono` VARCHAR (15),
  `classe` VARCHAR (10) NOT NULL,
  FOREIGN KEY(`cpfDono`) REFERENCES usuarios(`cpf`),
  UNIQUE(dataSaida, horarioSaida, origem)
);");

  $db->enableExceptions(true);  
?>
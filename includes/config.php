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

$db->exec("CREATE TABLE IF NOT EXISTS `passagens` (
  `valor` NUMERIC NOT NULL,
  `idPassagem` INTEGER PRIMARY KEY AUTOINCREMENT,
  `origem` VARCHAR NOT NULL,
  `destino` VARCHAR NOT NULL,
  `dataSaida` VARCHAR(10) NOT NULL,
  `horarioSaida` VARCHAR(5) NOT NULL,
  `horarioChegada` VARCHAR(5) NOT NULL,
  `classe` VARCHAR (10) NOT NULL,
  UNIQUE(dataSaida, horarioSaida, origem)
);");

$db->exec("CREATE TABLE IF NOT EXISTS `usuariosPassagens` (
  `idPassagem` INTEGER,
  `cpfDono` VARCHAR (15),
  FOREIGN KEY(`idPassagem`) REFERENCES passagens(`idPassagem`),
  FOREIGN KEY(`cpfDono`) REFERENCES usuarios(`cpf`),
  PRIMARY KEY(`idPassagem`, `cpfDono`)
)");

  $db->enableExceptions(true);  
?>
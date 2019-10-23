<?php
  // Tenta habilitar mensagens de erros no PHP
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // Configura banco de dados SQLite
  $db = new SQLite3('website.db');
  $db->exec("CREATE TABLE IF NOT EXISTS `Usuarios` (
    `email` VARCHAR NOT NULL UNIQUE,
    `cpf` VARCHAR(15) NOT NULL,
    `name` VARCHAR NOT NULL,
    `password` VARCHAR NOT NULL,
    `birthdate` VARCHAR(10),
    `phone` VARCHAR(16),
    PRIMARY KEY (`cpf`)
  );");
  $db->enableExceptions(true);
?>
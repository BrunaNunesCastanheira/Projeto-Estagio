
DROP DATABASE IF EXISTS aeb_user;
CREATE DATABASE aeb_user;
USE aeb_user;

CREATE TABLE `usuarios` (
  `idUsuario` int(16) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
);
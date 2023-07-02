# Projeto Final do Módulo III em Desenvolvimento de Sistemas

O projeto utiliza o padrão MVC (Model-View-Controller ou Modelo-Visão-Controle) e PHP Orientado a Objetos. A arquitetura de camadas MVC possibilita a integração e a divisão de tarefas entre equipes, facilita o reaproveitamento de códigos e mantém a codificação limpa, diminuindo a complexidade do sistema. Assim, as alterações realizadas em uma das camadas não interferem nas demais, facilitando a alteração nas regras de negócio, a atualização de layouts e a adição de novos recursos.

## Banco de Dados
```sql
CREATE DATABASE  IF NOT EXISTS `projeto_final`;
USE `projeto_final`;

CREATE TABLE `administrador` (
  `idadministrador` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `experienciaprofissional` (
  `idexperienciaprofissional` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idexperienciaprofissional`),
  KEY `idUser_idx` (`idusuario`),
  CONSTRAINT `idUser` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `formacaoacademica` (
  `idformacaoAcademica` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idformacaoAcademica`),
  KEY `IDUSUARIO_idx` (`idusuario`),
  CONSTRAINT `IDUSUARIO` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `outrasformacoes` (
  `idoutrasformacoes` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idoutrasformacoes`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
```

## Imagens

![Página de Login](Img/login.png)

![Página Principal](Img/principal.png)

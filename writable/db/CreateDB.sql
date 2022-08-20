/*Cria o banco de dados*/
CREATE DATABASE `db_alunos` /*!40100 COLLATE 'utf8_general_ci' */

/*Cria a tabela alunos*/
CREATE TABLE `alunos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`chave` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`nome` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`rua` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`bairro` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`cidade` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`path` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`created_at` DATETIME NULL DEFAULT NULL,
	`updated_at` DATETIME NULL DEFAULT NULL,
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT1;

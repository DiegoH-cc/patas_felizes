create database Patas_Felizes;
use Patas_Felizes;
drop TABLE usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
    telefone varchar (30) not null unique,
    senha VARCHAR(100) NOT NULL unique,
	idAnimais int,
    foreign key (idAnimais) references animais(id)
);

select*from usuarios;


CREATE TABLE animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomePessoa VARCHAR(80),
    Contato VARCHAR(35),
    nomeAnimal VARCHAR(80),
    especie VARCHAR(50),
    sexo VARCHAR(10),
    porte VARCHAR(20),
    descricao varchar (80),
    imagem VARCHAR(255),
    dataCadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
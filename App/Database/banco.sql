create database honorioburguer;
use honorioburguer;

create table usuario(
	id_user int auto_increment primary key,
    email varchar(150) unique,
    senha varchar(255),
    instagram varchar(150),
    endereco varchar(255),
    horario time
);


insert into usuario(email, senha, instagram, endereco, horario) value("honorioburguer@gmail.com", "$2y$12$aAL5dgqOsdfiHzJ7ZRXcjujK6l27lyT6So4bYwfmvne9/Q60/1OI6", "@honorioburguer", "sdfhgjdfgjdfgdfgdfgdfg", "19:30:00");
-- a senha e Honorio@1122
create table burguer(
	id_burguer int auto_increment primary key,
    src_imagem varchar(255),
    nome varchar(150),
    descricao varchar(200),
    preco varchar(7)
);
create database myapp;
use myapp;

create table user(
	id int not null auto_increment primary key,
	fullname varchar(500) not null,
	username varchar(100) not null unique,
	email varchar(255) not null unique,
	password varchar(255) not null,
	created_at datetime not null
);

create table cartas(
	id int not null auto_increment primary key,
	nombre_carta varchar(80) not null,
	imagen varchar(150) not null,
	usuario varchar(80),
	precio numeric(18,2) not null,
	agregado datetime not null
);
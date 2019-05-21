/*Criando o banco da aplica��o*/
create database site_IMC
GO

/*acessando o banco*/
use site_IMC
GO

/* Criando a tabela usuario */
create table usuario(
	id_usuario int primary key identity,
	nome_usuario varchar(200) NOT NULL,
	email_usuario varchar(50) NOT NULL unique,
	senha_usuario varchar(50) NOT NULL,
)
GO

/* inserindo dados para teste do admin@imc.com | senha:123 */
insert into usuario (nome_usuario, email_usuario, senha_usuario)
values('Admin','admin@imc.com','202cb962ac59075b964b07152d234b70')
GO

/*criando a tabela historico_imc*/
Create table historico_imc(
	id_historico int primary key identity,
	id_usuario int not null,
	imc_registro decimal(5,2),
	data_registro date,
	hora_registro time,

	constraint FK_historico_usuario foreign key (id_usuario) references usuario(id_usuario),
)
GO

/*inserindo dados para teste*/
insert into historico_imc (id_usuario,imc_registro,data_registro, hora_registro )
values(1,24.13,'2019-05-21','12:00:00')
GO



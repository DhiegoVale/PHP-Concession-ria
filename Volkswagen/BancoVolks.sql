CREATE DATABASE carro;
USE carro;
CREATE TABLE carro(
	id_carro INT PRIMARY KEY AUTO_INCREMENT,
    modelo_carro VARCHAR(100),
    cor_carro VARCHAR(100),
    valor FLOAT,
    ano CHAR(4) 
);
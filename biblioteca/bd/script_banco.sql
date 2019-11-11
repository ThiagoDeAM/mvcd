DROP DATABASE mvcd;
CREATE DATABASE mvcd;

USE mvcd;

CREATE TABLE IF NOT EXISTS usuario (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  papel VARCHAR(40) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS categoria(
    idcategoria BIGINT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(30) NOT NULL,
    PRIMARY KEY(idcategoria)
);

CREATE TABLE IF NOT EXISTS produto(
    idproduto BIGINT(11) NOT NULL AUTO_INCREMENT,
    idcategoria BIGINT(11) NOT NULL,
    nomeproduto VARCHAR(60) NOT NULL,
    preco VARCHAR(60) NOT NULL,
    descricao VARCHAR(800) NOT NULL,
    imagem VARCHAR(200) NOT NULL,
    estoque_minimo INT(11) NOT NULL,
    estoque_maximo INT(11) NOT NULL,
    PRIMARY KEY(idproduto),
    FOREIGN KEY(idcategoria) REFERENCES categoria(idcategoria) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO categoria VALUES(NULL, 'smartphone');

INSERT INTO produto VALUES(NULL, 1, 'Moto G', '4.0', 'bonito', 'motog.png', '1', '3');

INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('admin', '123', 'admin@admin', 'admin');
INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('usuario', '123', 'usuario@usuario', 'usuario');
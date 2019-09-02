DROP DATABASE mvcd;
CREATE DATABASE mvcd;

USE mvcd;

CREATE TABLE IF NOT EXISTS usuario (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS categoria(
    idcategoria BIGINT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(30) NOT NULL,
    PRIMARY KEY(idCategoria)
);

CREATE TABLE IF NOT EXISTS produto(
    idproduto BIGINT(11) NOT NULL AUTO_INCREMENT,
    idcategoria BIGINT(11) NOT NULL,
    nomeproduto VARCHAR(30) NOT NULL,
    preco DOUBLE NOT NULL,
    descricao VARCHAR(800) NOT NULL,
    estoque_minimo BIGINT(11) NOT NULL,
    estoque_maximo BIGINT(11) NOT NULL,
    PRIMARY KEY(idproduto),
    FOREIGN KEY(idcategoria) REFERENCES categoria(idcategoria) ON DELETE CASCADE ON UPDATE CASCADE
);

ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8

INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('admin', '123', 'admin@admin', 'admin');
INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('usuario', '123', 'usuario@usuario', 'usuario');
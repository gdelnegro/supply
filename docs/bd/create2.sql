-- MySQL Script generated by MySQL Workbench
-- Mon 05 May 2014 08:13:27 PM BRT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema osuply_app
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `osuply_app` ;
CREATE SCHEMA IF NOT EXISTS `osuply_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `osuply_app` ;

-- -----------------------------------------------------
-- Table `osuply_app`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`grupo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `descricao`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`tipos` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `status` INT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`categoria` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `status` INT NULL,
  `descricao` VARCHAR(45) NULL,
  `tipo` INT(12) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_categoria_tipo_idx` (`tipo` ASC),
  CONSTRAINT `fk_categoria_tipo`
    FOREIGN KEY (`tipo`)
    REFERENCES `osuply_app`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`subCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`subCategoria` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `categoria` INT(12) NOT NULL,
  `status` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `descricao`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `pesquisa` (`descricao` ASC, `categoria` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  INDEX `auditoria` (`dtAlteracao` ASC, `dtCriacao` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  INDEX `usuario` USING BTREE (`usrCriou` ASC, `usrAlterou` ASC),
  INDEX `data` USING BTREE (`dtAlteracao` ASC, `dtCriacao` ASC),
  INDEX `fk_subCategoria_categoria_idx` (`categoria` ASC),
  UNIQUE INDEX `unico` (`id` ASC, `categoria` ASC),
  CONSTRAINT `fk_subCategoria_categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`status` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`produto` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `categoria` INT(12) NOT NULL,
  `status` INT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `descricao`, `categoria`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `categoria` USING BTREE (`categoria` ASC),
  INDEX `auditoria` USING BTREE (`dtAlteracao` ASC, `dtCriacao` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  INDEX `pesquisa` USING BTREE (`descricao` ASC, `categoria` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  INDEX `fk_produto_status_idx` (`status` ASC),
  CONSTRAINT `fk_produto_subcategoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`subCategoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_status`
    FOREIGN KEY (`status`)
    REFERENCES `osuply_app`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`tipoPessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`tipoPessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`pessoa` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `emailContato` VARCHAR(45) NOT NULL,
  `telefonePrincipal` VARCHAR(14) NOT NULL,
  `senha` VARCHAR(45) NULL,
  `grupo` INT NULL,
  `tipoPessoa` INT NULL,
  `status` INT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `nome`, `emailContato`),
  INDEX `fk_pessoa_grupo_idx` (`grupo` ASC),
  INDEX `fk_pessoa_tipoPessoa_idx` (`tipoPessoa` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_pessoa_status_idx` (`status` ASC),
  CONSTRAINT `fk_pessoa_grupo`
    FOREIGN KEY (`grupo`)
    REFERENCES `osuply_app`.`grupo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_tipoPessoa`
    FOREIGN KEY (`tipoPessoa`)
    REFERENCES `osuply_app`.`tipoPessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_status`
    FOREIGN KEY (`status`)
    REFERENCES `osuply_app`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`pessoaFisica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`pessoaFisica` (
  `idPessoa` INT(12) NOT NULL,
  `CPF` VARCHAR(11) NOT NULL,
  `dtNascimento` DATE NULL,
  `RG` VARCHAR(45) NULL,
  `nomeMae` VARCHAR(45) NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE INDEX `idPessoa_UNIQUE` (`idPessoa` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC),
  CONSTRAINT `fk_pessoaFisica_pessoa`
    FOREIGN KEY (`idPessoa`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`endereco` (
  `idEndereco` INT(12) NOT NULL AUTO_INCREMENT,
  `CEP` VARCHAR(45) NULL,
  `logradouro` VARCHAR(45) NULL,
  `complemento` VARCHAR(45) NULL,
  `numero` INT(12) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`idEndereco`),
  UNIQUE INDEX `idEndereco_UNIQUE` (`idEndereco` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`tipoEndereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`tipoEndereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`pessoaEndereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`pessoaEndereco` (
  `pessoa` INT(12) NOT NULL,
  `endereco` INT(12) NOT NULL,
  `tipoEndereco` INT NOT NULL COMMENT 'Se endereço �' /* comment truncated */ /*:
Entrega,
Cobrança*/,
  `apelido` VARCHAR(45) NULL,
  PRIMARY KEY (`pessoa`, `endereco`),
  INDEX `fk_pessoaEndereço_Endereco_idx` (`endereco` ASC),
  INDEX `fk_pessoaEndereco_tipoEndereço_idx` (`tipoEndereco` ASC),
  CONSTRAINT `fk_pessoaEndereço_Pessoa`
    FOREIGN KEY (`pessoa`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoaEndereço_Endereco`
    FOREIGN KEY (`endereco`)
    REFERENCES `osuply_app`.`endereco` (`idEndereco`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pessoaEndereco_tipoEndereço`
    FOREIGN KEY (`tipoEndereco`)
    REFERENCES `osuply_app`.`tipoEndereco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`pessoaJuridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`pessoaJuridica` (
  `idPessoa` INT(12) NOT NULL,
  `CNPJ` INT(13) NOT NULL,
  `dtFundacao` DATE NULL,
  `logo` VARCHAR(45) NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE INDEX `idPessoa_UNIQUE` (`idPessoa` ASC),
  UNIQUE INDEX `CNPJ_UNIQUE` (`CNPJ` ASC),
  CONSTRAINT `fk_pessoaJuridica_pessoa`
    FOREIGN KEY (`idPessoa`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`fornecedorProduto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`fornecedorProduto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produto` INT(12) NOT NULL,
  `quantidade` INT(10) NULL,
  `precoItem` INT(6) NOT NULL,
  `fornecedor` INT(12) NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `fornecedor`, `codigo`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_fornecedorProduto_Produto_idx` (`produto` ASC),
  INDEX `fk_fornecedorProduto_Fornecedor_idx` (`fornecedor` ASC),
  CONSTRAINT `fk_fornecedorProduto_Produto`
    FOREIGN KEY (`produto`)
    REFERENCES `osuply_app`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fornecedorProduto_Fornecedor`
    FOREIGN KEY (`fornecedor`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`compradorProduto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`compradorProduto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produto` INT(12) NOT NULL,
  `quantidade` INT(10) NULL,
  `comprador` INT(12) NOT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `comprador`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_fornecedorProduto_Produto_idx` (`produto` ASC),
  INDEX `fk_fornecedorProduto_Fornecedor_idx` (`comprador` ASC),
  CONSTRAINT `fk_fornecedorProduto_Produto0`
    FOREIGN KEY (`produto`)
    REFERENCES `osuply_app`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fornecedorProduto_Fornecedor0`
    FOREIGN KEY (`comprador`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`orcamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`orcamento` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `comprador` INT(12) NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `comprador`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_orcamento_comprador_idx` (`comprador` ASC),
  CONSTRAINT `fk_orcamento_comprador`
    FOREIGN KEY (`comprador`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`propostas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`propostas` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `orcamento` INT(12) NOT NULL,
  `descricao` VARCHAR(45) NULL,
  `valor` INT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `orcamento`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_propostas_orcamento_idx` (`orcamento` ASC),
  CONSTRAINT `fk_propostas_orcamento`
    FOREIGN KEY (`orcamento`)
    REFERENCES `osuply_app`.`orcamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`imagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`imagem` (
  `id` INT(13) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `titulo` VARCHAR(45) NULL,
  `descricao` VARCHAR(45) NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`produtoImagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`produtoImagem` (
  `produto` INT(12) NOT NULL,
  `imagem` INT(13) NULL,
  PRIMARY KEY (`produto`),
  INDEX `fk_produtoImagem_imagem_idx` (`imagem` ASC),
  CONSTRAINT `fk_produtoImagem_produto`
    FOREIGN KEY (`produto`)
    REFERENCES `osuply_app`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtoImagem_imagem`
    FOREIGN KEY (`imagem`)
    REFERENCES `osuply_app`.`imagem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`orcamentoProduto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`orcamentoProduto` (
  `orcamento` INT(12) NOT NULL,
  `produto` INT(12) NOT NULL,
  `quantidade` INT(9) NOT NULL,
  PRIMARY KEY (`orcamento`, `produto`),
  INDEX `fk_orcamentoProduto_produto_idx` (`produto` ASC),
  CONSTRAINT `fk_orcamentoProduto_orcamento`
    FOREIGN KEY (`orcamento`)
    REFERENCES `osuply_app`.`orcamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orcamentoProduto_produto`
    FOREIGN KEY (`produto`)
    REFERENCES `osuply_app`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`preferenciasCompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`preferenciasCompra` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `pessoa` INT(12) NOT NULL,
  `tipo` INT(12) NULL,
  `categoria` INT(12) NULL,
  `subcategoria` INT(12) NULL,
  PRIMARY KEY (`id`, `pessoa`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_preferencias_pessoa_idx` (`pessoa` ASC),
  INDEX `fk_preferencias_categoria_idx` (`categoria` ASC),
  INDEX `fk_preferencias_tipo_idx` (`tipo` ASC),
  INDEX `fk_preferencias_subcategoria_idx` (`subcategoria` ASC),
  UNIQUE INDEX `unico` (`pessoa` ASC, `tipo` ASC, `categoria` ASC, `subcategoria` ASC),
  CONSTRAINT `fk_preferencias_pessoa`
    FOREIGN KEY (`pessoa`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_tipo`
    FOREIGN KEY (`tipo`)
    REFERENCES `osuply_app`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_subcategoria`
    FOREIGN KEY (`subcategoria`)
    REFERENCES `osuply_app`.`subCategoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`preferenciasVenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`preferenciasVenda` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `pessoa` INT(12) NOT NULL,
  `categoria` INT(12) NULL,
  `tipo` INT(12) NULL,
  `subcategoria` INT(12) NULL,
  PRIMARY KEY (`id`, `pessoa`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_preferencias_pessoa_idx` (`pessoa` ASC),
  INDEX `fk_preferencias_categoria_idx` (`categoria` ASC),
  INDEX `fk_preferencias_tipo_idx` (`tipo` ASC),
  INDEX `fk_preferencias_subcategoria_idx` (`subcategoria` ASC),
  UNIQUE INDEX `unico` (`pessoa` ASC, `categoria` ASC, `tipo` ASC, `subcategoria` ASC),
  CONSTRAINT `fk_preferencias_pessoa0`
    FOREIGN KEY (`pessoa`)
    REFERENCES `osuply_app`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_categoria0`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_tipo0`
    FOREIGN KEY (`tipo`)
    REFERENCES `osuply_app`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preferencias_subcategoria0`
    FOREIGN KEY (`subcategoria`)
    REFERENCES `osuply_app`.`subCategoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `osuply_app` ;

-- -----------------------------------------------------
-- Placeholder table for view `osuply_app`.`preferenciasDeVenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`preferenciasDeVenda` (`pessoa` INT, `'Categoria'` INT, `'Tipo'` INT, `'SubCategoria'` INT);

-- -----------------------------------------------------
-- Placeholder table for view `osuply_app`.`preferenciasDeCompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`preferenciasDeCompra` (`pessoa` INT, `'Categoria'` INT, `'Tipo'` INT, `'SubCategoria'` INT);

-- -----------------------------------------------------
-- View `osuply_app`.`preferenciasDeVenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `osuply_app`.`preferenciasDeVenda`;
USE `osuply_app`;
CREATE  OR REPLACE VIEW `preferenciasDeVenda` AS

SELECT preferenciasVenda.pessoa, categoria.descricao as 'Categoria', tipos.descricao as 'Tipo', subCategoria.descricao as 'SubCategoria'
FROM preferenciasVenda
INNER JOIN categoria ON categoria.id = preferenciasVenda.categoria
INNER JOIN tipos ON tipos.id = preferenciasVenda.tipo
INNER JOIN subCategoria ON subCategoria.id = preferenciasVenda.subcategoria;


-- -----------------------------------------------------
-- View `osuply_app`.`preferenciasDeCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `osuply_app`.`preferenciasDeCompra`;
USE `osuply_app`;
CREATE  OR REPLACE VIEW `preferenciasDeCompra` AS

SELECT preferenciasCompra.pessoa, categoria.descricao as 'Categoria', tipos.descricao as 'Tipo', subCategoria.descricao as 'SubCategoria'
FROM preferenciasCompra
INNER JOIN categoria ON categoria.id = preferenciasCompra.categoria
INNER JOIN tipos ON tipos.id = preferenciasCompra.tipo
INNER JOIN subCategoria ON subCategoria.id = preferenciasCompra.subcategoria;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

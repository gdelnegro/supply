SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

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
-- Table `osuply_app`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`categoria` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`subCategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`subCategoria` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `categoria` INT(12) NOT NULL,
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
  CONSTRAINT `fk_subCategoria_categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`produto` (
  `id` INT(12) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `categoria` INT(12) NOT NULL,
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `descricao`, `categoria`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `categoria` USING BTREE (`categoria` ASC),
  INDEX `auditoria` USING BTREE (`dtAlteracao` ASC, `dtCriacao` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  INDEX `pesquisa` USING BTREE (`descricao` ASC, `categoria` ASC, `usrCriou` ASC, `usrAlterou` ASC),
  CONSTRAINT `fk_produto_subcategoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `osuply_app`.`subCategoria` (`id`)
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
  `dtAlteracao` DATE NULL,
  `dtCriacao` DATE NULL,
  `usrCriou` INT NULL,
  `usrAlterou` INT NULL,
  PRIMARY KEY (`id`, `nome`, `emailContato`),
  INDEX `fk_pessoa_grupo_idx` (`grupo` ASC),
  INDEX `fk_pessoa_tipoPessoa_idx` (`tipoPessoa` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_pessoa_grupo`
    FOREIGN KEY (`grupo`)
    REFERENCES `osuply_app`.`grupo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_tipoPessoa`
    FOREIGN KEY (`tipoPessoa`)
    REFERENCES `osuply_app`.`tipoPessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `osuply_app`.`pessoaFisica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `osuply_app`.`pessoaFisica` (
  `idPessoa` INT NOT NULL,
  `CPF` INT NOT NULL,
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
  `tipoEndereco` INT NOT NULL COMMENT 'Se endereço é:\nEntreg' /* comment truncated */ /*,
Cobrança*/,
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
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
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
  `idPessoa` INT NOT NULL,
  `CNPJ` INT(13) NOT NULL,
  `dtFundacao` DATE NULL,
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
  `precoItem` VARCHAR(45) NOT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `osuply_app`.`grupo`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`grupo` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (1, 'Administrador sistema', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `osuply_app`.`tipoPessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`tipoPessoa` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (1, 'Administrador', NULL, NULL, NULL, NULL);
INSERT INTO `osuply_app`.`tipoPessoa` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (2, 'Física', NULL, NULL, NULL, NULL);
INSERT INTO `osuply_app`.`tipoPessoa` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (3, 'Jurídica', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `osuply_app`.`pessoa`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`pessoa` (`id`, `nome`, `emailContato`, `telefonePrincipal`, `senha`, `grupo`, `tipoPessoa`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (1, 'Gustavo', 'gustavo@gustavo.com.br', '(11)98286-3430', 'gustavo', 1, 1, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `osuply_app`.`endereco`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`endereco` (`idEndereco`, `CEP`, `logradouro`, `complemento`, `numero`, `cidade`, `estado`, `pais`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (1, '83035-190', 'Travessa Venezuela', 'Casa 2', 23, 'São José dos Pinhais', 'Paraná', 'Brasil', '2014-04-19', '2014-04-19', 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `osuply_app`.`tipoEndereco`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`tipoEndereco` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (1, 'Residencial', NULL, NULL, NULL, NULL);
INSERT INTO `osuply_app`.`tipoEndereco` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (2, 'Comercial', NULL, NULL, NULL, NULL);
INSERT INTO `osuply_app`.`tipoEndereco` (`id`, `descricao`, `dtAlteracao`, `dtCriacao`, `usrCriou`, `usrAlterou`) VALUES (3, 'Cobrança', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `osuply_app`.`pessoaEndereco`
-- -----------------------------------------------------
START TRANSACTION;
USE `osuply_app`;
INSERT INTO `osuply_app`.`pessoaEndereco` (`pessoa`, `endereco`, `tipoEndereco`) VALUES (1, 1, 1);

COMMIT;


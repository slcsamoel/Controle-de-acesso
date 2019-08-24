SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tb_condominio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_condominio` (
  `id_cond` INT NOT NULL AUTO_INCREMENT ,
  `nome_cond` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_cond`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_nivel_acesso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_nivel_acesso` (
  `id_nivel_acesso` INT NOT NULL ,
  `nivel_acesso` INT(1) NOT NULL ,
  PRIMARY KEY (`id_nivel_acesso`, `nivel_acesso`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id_usuario` INT NOT NULL ,
  `senha` VARCHAR(45) NOT NULL ,
  `tb_nivel_acesso_id_nivel_acesso` INT NOT NULL ,
  `tb_nivel_acesso_nivel_acesso` INT(1) NOT NULL ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_usuario_tb_nivel_acesso1_idx` (`tb_nivel_acesso_id_nivel_acesso` ASC, `tb_nivel_acesso_nivel_acesso` ASC) ,
  CONSTRAINT `fk_usuario_tb_nivel_acesso1`
    FOREIGN KEY (`tb_nivel_acesso_id_nivel_acesso` , `tb_nivel_acesso_nivel_acesso` )
    REFERENCES `mydb`.`tb_nivel_acesso` (`id_nivel_acesso` , `nivel_acesso` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_funcionario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_funcionario` (
  `id_func` INT NOT NULL ,
  `cpf` VARCHAR(11) NOT NULL ,
  `nome_fun` VARCHAR(100) NOT NULL ,
  `rg_func` INT NOT NULL ,
  `turno` VARCHAR(10) NULL ,
  `tb_condominio_id_cond` INT NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  `usuario_id_usuario1` INT NOT NULL ,
  `sexo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_func`, `cpf`) ,
  INDEX `fk_tb_funcionario_tb_condominio_idx` (`tb_condominio_id_cond` ASC) ,
  INDEX `fk_tb_funcionario_usuario1_idx` (`usuario_id_usuario` ASC) ,
  INDEX `fk_tb_funcionario_usuario2_idx` (`usuario_id_usuario1` ASC) ,
  CONSTRAINT `fk_tb_funcionario_tb_condominio`
    FOREIGN KEY (`tb_condominio_id_cond` )
    REFERENCES `mydb`.`tb_condominio` (`id_cond` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_funcionario_usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_funcionario_usuario2`
    FOREIGN KEY (`usuario_id_usuario1` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_Bloco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_Bloco` (
  `id_Bloco` INT NOT NULL ,
  `nome_Bloco` VARCHAR(45) NULL ,
  `tb_condominio_id_cond` INT NOT NULL ,
  PRIMARY KEY (`id_Bloco`) ,
  INDEX `fk_tb_Bloco_tb_condominio1_idx` (`tb_condominio_id_cond` ASC) ,
  CONSTRAINT `fk_tb_Bloco_tb_condominio1`
    FOREIGN KEY (`tb_condominio_id_cond` )
    REFERENCES `mydb`.`tb_condominio` (`id_cond` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_status_morador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_status_morador` (
  `id_status_morador` INT NOT NULL ,
  `status_morador` VARCHAR(45) NOT NULL ,
  `dt_entrada` DATETIME NOT NULL ,
  `dt_saida` DATETIME NOT NULL ,
  `situação` VARCHAR(7) NULL ,
  PRIMARY KEY (`id_status_morador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_veiculos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_veiculos` (
  `placa` VARCHAR(8) NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  PRIMARY KEY (`placa`) ,
  INDEX `fk_tb_veiculos_usuario1_idx` (`usuario_id_usuario` ASC) ,
  CONSTRAINT `fk_tb_veiculos_usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_morador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_morador` (
  `id_morador` INT NOT NULL ,
  `nome_morador` VARCHAR(100) NOT NULL ,
  `cpf_morador` VARCHAR(11) NOT NULL ,
  `rg_morador` INT NOT NULL ,
  `dt_nacimento` DATE NOT NULL ,
  `dt_cadastro` DATETIME NOT NULL ,
  `tb_tipo_morador_id_tipo_morador` INT NOT NULL ,
  `tb_status_morador_id_status_morador` INT NOT NULL ,
  `tb_veiculos_placa` VARCHAR(8) NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  `tipo_morador` VARCHAR(45) NOT NULL ,
  `sexo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_morador`) ,
  INDEX `fk_tb_morador_tb_status_morador1_idx` (`tb_status_morador_id_status_morador` ASC) ,
  INDEX `fk_tb_morador_tb_veiculos1_idx` (`tb_veiculos_placa` ASC) ,
  INDEX `fk_tb_morador_usuario1_idx` (`usuario_id_usuario` ASC) ,
  CONSTRAINT `fk_tb_morador_tb_status_morador1`
    FOREIGN KEY (`tb_status_morador_id_status_morador` )
    REFERENCES `mydb`.`tb_status_morador` (`id_status_morador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_morador_tb_veiculos1`
    FOREIGN KEY (`tb_veiculos_placa` )
    REFERENCES `mydb`.`tb_veiculos` (`placa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_morador_usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_apartamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_apartamento` (
  `id_apartamento` INT NOT NULL AUTO_INCREMENT ,
  `num_apartamento` INT NOT NULL ,
  `tb_Bloco_id_Bloco` INT NOT NULL ,
  `tb_morador_id_morador` INT NOT NULL ,
  `num_vaga` INT NULL ,
  PRIMARY KEY (`id_apartamento`, `num_apartamento`) ,
  INDEX `fk_tb_apartamento_tb_Bloco1_idx` (`tb_Bloco_id_Bloco` ASC) ,
  INDEX `fk_tb_apartamento_tb_morador1_idx` (`tb_morador_id_morador` ASC) ,
  CONSTRAINT `fk_tb_apartamento_tb_Bloco1`
    FOREIGN KEY (`tb_Bloco_id_Bloco` )
    REFERENCES `mydb`.`tb_Bloco` (`id_Bloco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_apartamento_tb_morador1`
    FOREIGN KEY (`tb_morador_id_morador` )
    REFERENCES `mydb`.`tb_morador` (`id_morador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_tipo_visitante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_tipo_visitante` (
  `idtb_tipo_visita` INT NOT NULL ,
  `tipo_visita` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtb_tipo_visita`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_status_visitante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_status_visitante` (
  `idtb_status_visitante` INT NOT NULL ,
  `status_visitante` VARCHAR(45) NOT NULL ,
  `dt_entrada` DATETIME NOT NULL ,
  `dt_saida` DATETIME NOT NULL ,
  PRIMARY KEY (`idtb_status_visitante`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_visitante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_visitante` (
  `id_visitante` INT NOT NULL ,
  `nome_visitante` VARCHAR(100) NOT NULL ,
  `cpf_visitante` VARCHAR(11) NOT NULL ,
  `rg_visitante` INT NOT NULL ,
  `acomp_visitante` VARCHAR(200) NULL ,
  `tb_tipo_visitante_idtb_tipo_visita` INT NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  `tb_status_visitante_idtb_status_visitante` INT NOT NULL ,
  `sexo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_visitante`, `cpf_visitante`) ,
  INDEX `fk_tb_visitante_tb_tipo_visitante1_idx` (`tb_tipo_visitante_idtb_tipo_visita` ASC) ,
  INDEX `fk_tb_visitante_usuario1_idx` (`usuario_id_usuario` ASC) ,
  INDEX `fk_tb_visitante_tb_status_visitante1_idx` (`tb_status_visitante_idtb_status_visitante` ASC) ,
  CONSTRAINT `fk_tb_visitante_tb_tipo_visitante1`
    FOREIGN KEY (`tb_tipo_visitante_idtb_tipo_visita` )
    REFERENCES `mydb`.`tb_tipo_visitante` (`idtb_tipo_visita` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_visitante_usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_visitante_tb_status_visitante1`
    FOREIGN KEY (`tb_status_visitante_idtb_status_visitante` )
    REFERENCES `mydb`.`tb_status_visitante` (`idtb_status_visitante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_espaco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_espaco` (
  `id_espaco` INT NOT NULL ,
  `nome_espaco` VARCHAR(45) NOT NULL ,
  `tb_Bloco_id_Bloco` INT NOT NULL ,
  PRIMARY KEY (`id_espaco`) ,
  INDEX `fk_tb_espaco_tb_Bloco1_idx` (`tb_Bloco_id_Bloco` ASC) ,
  CONSTRAINT `fk_tb_espaco_tb_Bloco1`
    FOREIGN KEY (`tb_Bloco_id_Bloco` )
    REFERENCES `mydb`.`tb_Bloco` (`id_Bloco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_reserva`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_reserva` (
  `idtb_reserva` INT NOT NULL ,
  `dt_reserva` DATETIME NULL ,
  `tb_espaco_id_espaco` INT NOT NULL ,
  `tb_morador_id_morador` INT NOT NULL ,
  `usuario_id_usuario` INT NOT NULL ,
  PRIMARY KEY (`idtb_reserva`) ,
  INDEX `fk_tb_reserva_tb_espaco1_idx` (`tb_espaco_id_espaco` ASC) ,
  INDEX `fk_tb_reserva_tb_morador1_idx` (`tb_morador_id_morador` ASC) ,
  INDEX `fk_tb_reserva_usuario1_idx` (`usuario_id_usuario` ASC) ,
  CONSTRAINT `fk_tb_reserva_tb_espaco1`
    FOREIGN KEY (`tb_espaco_id_espaco` )
    REFERENCES `mydb`.`tb_espaco` (`id_espaco` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_reserva_tb_morador1`
    FOREIGN KEY (`tb_morador_id_morador` )
    REFERENCES `mydb`.`tb_morador` (`id_morador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_reserva_usuario1`
    FOREIGN KEY (`usuario_id_usuario` )
    REFERENCES `mydb`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tb_visita_morador`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tb_visita_morador` (
  `tb_morador_id_morador` INT NOT NULL ,
  `tb_visitante_id_visitante` INT NOT NULL ,
  `tb_visitante_cpf_visitante` VARCHAR(11) NOT NULL ,
  `tb_morador_id_morador1` INT NOT NULL ,
  PRIMARY KEY (`tb_morador_id_morador`) ,
  INDEX `fk_tb_visita_morador_tb_visitante1_idx` (`tb_visitante_id_visitante` ASC, `tb_visitante_cpf_visitante` ASC) ,
  INDEX `fk_tb_visita_morador_tb_morador1_idx` (`tb_morador_id_morador1` ASC) ,
  CONSTRAINT `fk_tb_visita_morador_tb_visitante1`
    FOREIGN KEY (`tb_visitante_id_visitante` , `tb_visitante_cpf_visitante` )
    REFERENCES `mydb`.`tb_visitante` (`id_visitante` , `cpf_visitante` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_visita_morador_tb_morador1`
    FOREIGN KEY (`tb_morador_id_morador1` )
    REFERENCES `mydb`.`tb_morador` (`id_morador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

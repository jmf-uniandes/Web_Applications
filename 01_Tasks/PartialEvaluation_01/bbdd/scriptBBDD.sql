-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ProjectManagement
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ProjectManagement
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ProjectManagement` DEFAULT CHARACTER SET utf8 ;
USE `ProjectManagement` ;

-- -----------------------------------------------------
-- Table `ProjectManagement`.`Proyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectManagement`.`Proyectos` (
  `proyecto_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del Proyecto',
  `descripcion` TEXT NOT NULL COMMENT 'Descripcion del proyecto a desarrollarse, el nombre debe ser descriptivo y facil de entender\n',
  `fecha_inicio` DATE NOT NULL COMMENT 'Fecha de inicio del proyecto\n',
  `fecha_fin` DATE NOT NULL COMMENT 'Fecha de finalizacion del proyecto\n',
  PRIMARY KEY (`proyecto_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectManagement`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectManagement`.`Empleados` (
  `empleado_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombres completos del empleado\n',
  `apellido` VARCHAR(45) NOT NULL COMMENT 'Apellidos del empleado',
  `email` VARCHAR(45) NOT NULL COMMENT 'correo institucional del empleado',
  `posicion` VARCHAR(45) NOT NULL COMMENT 'Cargo actual del empleado\n',
  PRIMARY KEY (`empleado_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectManagement`.`StatusProyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectManagement`.`StatusProyectos` (
  `idStatusProyecto` INT NOT NULL AUTO_INCREMENT,
  `StatusProyecto` NVARCHAR(20) NOT NULL COMMENT 'Planeado\nEnDesarrollo\nFinalizado',
  PRIMARY KEY (`idStatusProyecto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectManagement`.`AsignacionProyectos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectManagement`.`AsignacionProyectos` (
  `idProyectosCurso` INT NOT NULL AUTO_INCREMENT COMMENT 'Define el status del proyecto:\nPlaneado\nEnDesarrollo\nFinalizado\n',
  `proyecto_id` VARCHAR(45) NOT NULL,
  `empleado_id` VARCHAR(45) NOT NULL,
  `idStatusProyecto` VARCHAR(45) NOT NULL COMMENT 'Identifica el status en el que se encuentra el proyecto o proyectos asignados\n\nPlaneado\nEnDesarrollo\nFinalizado',
  `Proyectos_proyecto_id` INT NOT NULL,
  `Empleados_empleado_id` INT NOT NULL,
  `StatusProyectos_idStatusProyecto` INT NOT NULL,
  PRIMARY KEY (`idProyectosCurso`),
  INDEX `fk_AsignacionProyectos_Proyectos_idx` (`Proyectos_proyecto_id` ASC) ,
  INDEX `fk_AsignacionProyectos_Empleados1_idx` (`Empleados_empleado_id` ASC) ,
  INDEX `fk_AsignacionProyectos_StatusProyectos1_idx` (`StatusProyectos_idStatusProyecto` ASC) ,
  CONSTRAINT `fk_AsignacionProyectos_Proyectos`
    FOREIGN KEY (`Proyectos_proyecto_id`)
    REFERENCES `ProjectManagement`.`Proyectos` (`proyecto_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsignacionProyectos_Empleados1`
    FOREIGN KEY (`Empleados_empleado_id`)
    REFERENCES `ProjectManagement`.`Empleados` (`empleado_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AsignacionProyectos_StatusProyectos1`
    FOREIGN KEY (`StatusProyectos_idStatusProyecto`)
    REFERENCES `ProjectManagement`.`StatusProyectos` (`idStatusProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

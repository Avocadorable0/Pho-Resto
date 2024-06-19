-- MySQL database dump

-- Dumped from PostgreSQL 14.9

-- Start of SQL commands for MySQL
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';



-- Table structure for table `ingredients`
CREATE TABLE `ingredients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ingredientNom` varchar(255) NOT NULL,
  `ingredientImg` varchar(255) NOT NULL,
  `ingredientPrixGramme` double NOT NULL,
  `ingredientCalorieGramme` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `plats`
CREATE TABLE `plats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `platNom` varchar(255) NOT NULL,
  `platImg` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `plats__ingredients_plats`
CREATE TABLE `plats__ingredients_plats` (
  `ingredientsPlatsId` int NOT NULL,
  `ingredientsId` int NOT NULL,
  `ingredientGramme` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `plats_compose`
CREATE TABLE `plats_compose` (
  `id` int NOT NULL AUTO_INCREMENT,
  `platComposeNom` varchar(255) NOT NULL,
  `platComposeImg` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `plats_compose_ingredient`
CREATE TABLE `plats_compose_ingredient` (
  `platComposeId` int NOT NULL,
  `ingredientId` int NOT NULL,
  `ingredientGramme` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `plats_compose_plat`
CREATE TABLE `plats_compose_plat` (
  `platComposeId` int NOT NULL,
  `platId` int NOT NULL,
  `quantite` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Table structure for table `menu`
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menuNom` varchar(255) NOT NULL,
  `menuDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `menu_plat`
CREATE TABLE `menu_plat` (
  `menuId` int NOT NULL,
  `platId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menuId`, `platId`),
  CONSTRAINT `fk_menu`
    FOREIGN KEY (`menuId`) 
    REFERENCES `menu` (`id`) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE,
  CONSTRAINT `fk_plat`
    FOREIGN KEY (`platId`) 
    REFERENCES `plats` (`id`) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `menu_plat_compose`
CREATE TABLE `menu_plat_compose` (
  `menuId` int NOT NULL,
  `platComposeId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  FOREIGN KEY (`menuId`) REFERENCES `menu` (`id`),
  FOREIGN KEY (`platComposeId`) REFERENCES `plats_compose` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Creating views
CREATE VIEW `ingredients_plats_view` AS
SELECT p.id,
       p.platNom,
       p.platImg,
       pip.ingredientsId,
       i.ingredientNom,
       pip.ingredientGramme AS quantite,
       (i.ingredientPrixGramme * pip.ingredientGramme) AS prix,
       (i.ingredientCalorieGramme * pip.ingredientGramme) AS calorie,
       (SELECT SUM(i3.ingredientCalorieGramme * pip3.ingredientGramme) 
        FROM plats__ingredients_plats pip3
        JOIN ingredients i3 ON i3.id = pip3.ingredientsId 
        WHERE pip3.ingredientsPlatsId = p.id) AS totalcalorie,
       (SELECT SUM(i2.ingredientPrixGramme * pip2.ingredientGramme) 
        FROM plats__ingredients_plats pip2
        JOIN ingredients i2 ON i2.id = pip2.ingredientsId 
        WHERE pip2.ingredientsPlatsId = p.id) AS totalprix
FROM plats__ingredients_plats pip
JOIN plats p ON p.id = pip.ingredientsPlatsId
JOIN ingredients i ON i.id = pip.ingredientsId
GROUP BY p.id, p.platNom, pip.ingredientsId, i.ingredientNom, pip.ingredientGramme, i.ingredientPrixGramme, i.ingredientCalorieGramme;

CREATE VIEW `v_menu_plat` AS
SELECT mp.menuId,
       ipv.id,
       ipv.platNom,
       ipv.totalcalorie,
       ipv.totalprix
FROM menu_plat mp
JOIN ingredients_plats_view ipv ON ipv.id = mp.platId
GROUP BY mp.menuId, ipv.id, ipv.platNom, ipv.totalcalorie, ipv.totalprix;

CREATE VIEW `v_plat_compose` AS
SELECT pc.id,
       pc.platComposeNom,
       pc.platComposeImg,
       SUM((v_plat.totalcalorie * pcp.quantite) + 
           (SELECT SUM(i2.ingredientCalorieGramme * pi2.ingredientGramme) 
            FROM plats_compose_ingredient pi2
            JOIN ingredients i2 ON i2.id = pi2.ingredientId 
            WHERE pi2.platComposeId = pc.id)) AS calorietotal,
       SUM((v_plat.totalprix * pcp.quantite) + 
           (SELECT SUM(i1.ingredientPrixGramme * pi1.ingredientGramme) 
            FROM plats_compose_ingredient pi1
            JOIN ingredients i1 ON i1.id = pi1.ingredientId 
            WHERE pi1.platComposeId = pc.id)) AS prixplatcompose
FROM plats_compose pc
JOIN plats_compose_plat pcp ON pcp.platComposeId = pc.id
JOIN ingredients_plats_view v_plat ON v_plat.id = pcp.platId
GROUP BY pc.id, pc.platComposeNom, pc.platComposeImg;

CREATE VIEW `v_menu_plat_compose` AS
SELECT mp.menuId,
       vpc.id,
       vpc.platComposeNom,
       vpc.calorietotal,
       vpc.prixplatcompose
FROM menu_plat_compose mp
JOIN v_plat_compose vpc ON vpc.id = mp.platComposeId;

CREATE VIEW `v_plat_compositions` AS
SELECT pcp.platComposeId,
       pcp.ingredientId,
       p.ingredientNom,
       pcp.ingredientGramme
FROM plats_compose_ingredient pcp
JOIN ingredients p ON p.id = pcp.ingredientId
GROUP BY pcp.platComposeId, pcp.ingredientId, p.ingredientNom,pcp.ingredientGramme;

CREATE VIEW `v_plat_composition` AS
SELECT pcp.platComposeId,
       pcp.platId,
       p.platNom,
       pcp.quantite
FROM plats_compose_plat pcp
JOIN plats p ON p.id = pcp.platId
GROUP BY pcp.platComposeId, pcp.platId, p.platNom,pcp.quantite;


-- End of SQL commands for MySQL

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

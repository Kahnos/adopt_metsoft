/*
SQLyog Community v12.18 (64 bit)
MySQL - 5.6.21 : Database - adopcion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`adopcion` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `adopcion`;

/*Table structure for table `mascota` */

DROP TABLE IF EXISTS `mascota`;

CREATE TABLE `mascota` (
  `ID_Mascota` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Raza` varchar(30) DEFAULT 'No especificado',
  `Vacuna` enum('1','0','No especificado') DEFAULT '0',
  `Edad` varchar(30) DEFAULT 'No especificado',
  `Sexo` enum('M','F','No especificado') DEFAULT 'No especificado',
  `Adoptada` tinyint(1) NOT NULL DEFAULT '0',
  `Ubicacion` varchar(25) NOT NULL DEFAULT 'No especificado',
  `id_tweet` varchar(1000) DEFAULT NULL,
  `usuario_tw` char(250) DEFAULT NULL,
  `correo` char(250) DEFAULT 'No especificado',
  `telefono` varchar(40) DEFAULT 'No especificado',
  `castrado` enum('1','0','No especificado') DEFAULT 'No especificado',
  PRIMARY KEY (`ID_Mascota`),
  KEY `IX_Relationship9` (`Raza`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `mascota` */

insert  into `mascota`(`ID_Mascota`,`Raza`,`Vacuna`,`Edad`,`Sexo`,`Adoptada`,`Ubicacion`,`id_tweet`,`usuario_tw`,`correo`,`telefono`,`castrado`) values 
(1,'chow','0','0','No especificado',0,'','691328839834824705','redmascotera','0','0','0'),
(2,'0','0','0','No especificado',0,'','691329694755639296','LaMunheca','0','0','0'),
(3,'carlino','0','0','No especificado',0,'','691330222000513024','biomuseo','0','0','0'),
(4,'0','0','0','No especificado',0,'','691330567472832513','Sima_Garcia','0','0','0'),
(5,'0','0','0','No especificado',0,'','691330922290024448','LaMunheca','0','0','0'),
(6,'0','0','0','No especificado',0,'','691331067589042177','aide_tarrio','0','0','0'),
(7,'0','0','5 meses','No especificado',0,'','691332033772130304','tefimaldonado','0','0','0'),
(8,'0','0','0','No especificado',0,'','691333433054883840','Silviapazyfe','0','0','1'),
(9,'0','0','0','No especificado',0,'','691333498196639745','BritoYess_','0','0','0'),
(10,'chow','0','0','No especificado',0,'','691333905392230400','JLLMEJIAS','0','0','1'),
(11,'chow','0','0','No especificado',0,'','691334614535835649','MirisPined9','0','0','0'),
(12,'chow','0','0','No especificado',0,'','691334746761269248','elbrotemoderno','0','0','0'),
(13,'0','0','0','No especificado',0,'','691334941511176192','VozAnimalCol','0','0','0'),
(14,'0','0','0','No especificado',0,'','691334966144307200','ActuaAnimalista','0','0','1'),
(15,'chow','0','0','No especificado',0,'','691335676428689408','Angeles00764703','0','0','0'),
(16,'chow','0','0','No especificado',0,'','691335759006146562','novadominguez0','0','0','0'),
(17,'0','0','0','No especificado',0,'','691336478153117696','PPPenAdopcion','0','0','0'),
(18,'0','0','10 meses','No especificado',0,'','691337136587542528','LASAnimal','0','0','0'),
(19,'0','0','0','No especificado',0,'','691337165540855809','RobaMorena','0','0','0'),
(20,'0','0','0','No especificado',0,'','691337182963961856','PPPenAdopcion','0','0','0'),
(21,'chow','0','0','No especificado',0,'','691337319304056833','EDITORIALSIRIO','0','0','0'),
(22,'0','0','0','No especificado',0,'','691337533628747777','Dani_Opps','0','0','0'),
(23,'shar pei','0','0','No especificado',0,'','691337971182780416','Arquipets','0','0','0'),
(24,'chow','0','0','No especificado',0,'','691338855618846720','AbortoDeMonox','0','0','0'),
(25,'0','0','0','No especificado',0,'','691339697633636352','notimerica','0','0','0'),
(26,'0','0','0','No especificado',0,'','691340317052792833','YolandaC4','0','0','0'),
(27,'collie','0','0','No especificado',0,'','691341861714300928','sosgatosmurcia','0','0','0'),
(28,'0','0','0','No especificado',0,'','691342364930097154','BigoteDeGat','0','0','0'),
(29,'poodle','0','0','No especificado',0,'','691342916351102976','LasttPenguin','0','0','0'),
(30,'chow','0','13 años','No especificado',0,'','691344785026764806','DifundeMadrid','0','0','0'),
(31,'0','0','0','No especificado',0,'','691345120952750080','Carl0_5','0','0','0'),
(32,'0','0','0','No especificado',0,'','691345811641335810','Lalysole','0','0','0'),
(33,'0','0','0','No especificado',0,'Corrientes, Argentina','691346408021061632','BrizuGomez','0','0','0'),
(34,'chow','0','0','No especificado',0,'','691346472126799873','Lalysole','0','0','0'),
(35,'0','0','5 meses','No especificado',0,'','691346981030084608','astrixp','0','0','0'),
(36,'basset','0','0','No especificado',0,'','691349502595305474','waverproud','0','0','0'),
(37,'chow','0','0','No especificado',0,'','691349812281643008','CanalRCN','0','0','0'),
(38,'0','0','0','No especificado',0,'','691349821609803776','ComOrganica','0','0','0'),
(39,'0','0','0','No especificado',0,'','691350276809347072','manimatorstudio','0','0','0'),
(40,'chow','0','0','No especificado',0,'','691350288284782592','TiempoDeZapopan','0','0','0'),
(41,'0','0','0','No especificado',0,'','691350457499947009','redmascotera','0','0','0'),
(42,'0','0','0','No especificado',0,'','691350526777102337','_miguelaviles_','0','0','0'),
(43,'0','0','0','No especificado',0,'','691350635371978752','BostonMAPuppies','0','0','0'),
(44,'0','0','0','No especificado',0,'','691351072712060929','Teffy_Petunia','0','0','0'),
(45,'chow','0','0','No especificado',0,'','691351997958610945','ManuelCruzGT','0','0','0'),
(46,'chow','0','0','No especificado',0,'','691352139252273152','redmascotera','0','0','0'),
(47,'0','0','0','No especificado',0,'','691352177940566016','perritosenapuro','0','0','0'),
(48,'0','0','0','No especificado',0,'','691352424699813889','fundarcanoe','0','0','0'),
(49,'0','0','0','No especificado',0,'','691352902246494208','fundasis','0','0','1'),
(50,'chow','0','0','No especificado',0,'','691353323916640257','luwalcineytv','0','0','0'),
(51,'0','0','0','No especificado',0,'','691353455135440896','PerezOsa71','0','0','0'),
(52,'chow','0','0','No especificado',0,'','691353472776683520','LuisferGanoza','0','0','0');

/*Table structure for table `publica` */

DROP TABLE IF EXISTS `publica`;

CREATE TABLE `publica` (
  `ID_Mascota` int(10) unsigned NOT NULL,
  `ID_Usuario` int(10) unsigned DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Mascota`),
  KEY `IX_Relationship7` (`ID_Usuario`),
  KEY `IX_Relationship8` (`Username`),
  CONSTRAINT `Relationship6` FOREIGN KEY (`ID_Mascota`) REFERENCES `mascota` (`ID_Mascota`),
  CONSTRAINT `Relationship7` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `Relationship8` FOREIGN KEY (`Username`) REFERENCES `usr_red_social` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `publica` */

/*Table structure for table `tweet_imagen` */

DROP TABLE IF EXISTS `tweet_imagen`;

CREATE TABLE `tweet_imagen` (
  `id_tweet` varchar(200) NOT NULL,
  `url_imagen` varchar(500) NOT NULL,
  PRIMARY KEY (`id_tweet`,`url_imagen`),
  CONSTRAINT `id_tweet` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id_tweet`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tweet_imagen` */

insert  into `tweet_imagen`(`id_tweet`,`url_imagen`) values 
('691328839834824705','http://pbs.twimg.com/media/CZgX6rnW0AElqpM.jpg'),
('691329694755639296','http://pbs.twimg.com/media/CZgYsbkWEAAOSrF.jpg'),
('691330222000513024','http://pbs.twimg.com/media/CZgZLIfUUAA-2V9.jpg'),
('691330567472832513','http://pbs.twimg.com/media/CZgZcwHWEAEMoML.jpg'),
('691330922290024448','http://pbs.twimg.com/media/CZgZz5TWwAA-ZeG.jpg'),
('691331067589042177','http://pbs.twimg.com/media/CZgZ7xDWEAEeffE.jpg'),
('691332033772130304','http://pbs.twimg.com/media/CZga0JcW0AUXw9J.jpg'),
('691333433054883840','http://pbs.twimg.com/media/CZgcFrQWAAQ2Dgi.jpg'),
('691333498196639745','http://pbs.twimg.com/media/CZgcJ1QWYAAu28R.jpg'),
('691333905392230400','http://pbs.twimg.com/media/CZgchOpW0AEN9s4.jpg'),
('691334614535835649','http://pbs.twimg.com/ext_tw_video_thumb/691333641394331648/pu/img/Ak31bjYfWZusqPuu.jpg'),
('691334746761269248','http://pbs.twimg.com/media/CUq0zOkWwAAG2xS.jpg'),
('691334941511176192','http://pbs.twimg.com/media/CZgddyPWcAAz2m0.jpg'),
('691334966144307200','http://pbs.twimg.com/media/CZgdfRdXEAA1wPQ.jpg'),
('691335676428689408','http://pbs.twimg.com/media/CZgeIEiXEAAlVrF.jpg'),
('691335759006146562','http://pbs.twimg.com/media/CZgd9zBWEAExco6.jpg'),
('691336478153117696','http://pbs.twimg.com/media/CZge3RBWAAEO4rl.jpg'),
('691337136587542528','http://pbs.twimg.com/ext_tw_video_thumb/691336937102315520/pu/img/9_oldyL_wnSPtTPw.jpg'),
('691337165540855809','http://pbs.twimg.com/media/CZgfe39WYAArG2G.jpg'),
('691337182963961856','http://pbs.twimg.com/media/CZgfgSTWwAEEDeF.jpg'),
('691337319304056833','http://pbs.twimg.com/media/CZgfoOVVAAA8w0O.jpg'),
('691337533628747777','http://pbs.twimg.com/media/CZgf0ufXEAAhYit.jpg'),
('691337971182780416','http://pbs.twimg.com/media/CHOy0reWgAAdojp.jpg'),
('691338855618846720','http://pbs.twimg.com/media/CZghAVhW0AAxS2w.jpg'),
('691339697633636352','http://pbs.twimg.com/media/CZgQSHZWEAAp0Mk.jpg'),
('691340317052792833','http://pbs.twimg.com/media/CZgiV8RWAAAunzC.jpg'),
('691341861714300928','http://pbs.twimg.com/media/CZgjwk_WQAE7tGs.jpg'),
('691342364930097154','http://pbs.twimg.com/media/CZgkNMkXEAAY5Zh.jpg'),
('691342916351102976','http://pbs.twimg.com/media/CZgkt8aWQAAGOaP.png'),
('691344785026764806','http://pbs.twimg.com/media/CZgmaztWAAA2pEv.jpg'),
('691345120952750080','http://pbs.twimg.com/media/CZgmuEhWEAEMjcD.jpg'),
('691345811641335810','http://pbs.twimg.com/media/CZgnVxrWIAAaGnF.jpg'),
('691346408021061632','http://pbs.twimg.com/media/CZgnrXdWIAAUYE2.jpg'),
('691346472126799873','http://pbs.twimg.com/media/CZgn8SYWEAEszhV.jpg'),
('691346981030084608','http://pbs.twimg.com/media/CZgoZ7UXEAA4PeA.jpg'),
('691349502595305474','http://pbs.twimg.com/media/CZgqscjWAAEQo5f.jpg'),
('691349812281643008','http://pbs.twimg.com/media/CZWS7OwXEAACW7U.jpg'),
('691349821609803776','http://pbs.twimg.com/media/CZbZyDBWYAEeSOR.jpg'),
('691350276809347072','http://pbs.twimg.com/media/CZgraamVAAA8caR.jpg'),
('691350288284782592','http://pbs.twimg.com/media/CZgrbIvUMAA94L5.jpg'),
('691350457499947009','http://pbs.twimg.com/media/CZgrk_yWcAAU4b_.jpg'),
('691350526777102337','http://pbs.twimg.com/media/CZgrpBzUEAA47wD.jpg'),
('691350635371978752','http://pbs.twimg.com/media/CZgrvWSWkAEwnHp.jpg'),
('691351072712060929','http://pbs.twimg.com/media/CZgsIzdWAAIzyce.jpg'),
('691351997958610945','http://pbs.twimg.com/media/CTFOatdWIAEvPtG.jpg'),
('691352139252273152','http://pbs.twimg.com/media/CZgtG4nWcAAsZ-r.jpg'),
('691352177940566016','http://pbs.twimg.com/media/CZgtIPWWkAAifxX.jpg'),
('691352424699813889','http://pbs.twimg.com/media/CZgtXgIWcAAr1vk.jpg'),
('691352902246494208','http://pbs.twimg.com/media/CZgtya3WQAQQP9P.jpg'),
('691353323916640257','http://pbs.twimg.com/media/CZWS7OwXEAACW7U.jpg'),
('691353455135440896','http://pbs.twimg.com/media/CZguTYnWcAAl1SN.jpg'),
('691353472776683520','http://pbs.twimg.com/media/CZguUJqWcAAgUdv.jpg');

/*Table structure for table `tweets` */

DROP TABLE IF EXISTS `tweets`;

CREATE TABLE `tweets` (
  `id_tweet` varchar(200) NOT NULL,
  `tweet` varchar(150) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `url_imagen_perfil` varchar(500) DEFAULT NULL,
  `ubicacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tweet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tweets` */

insert  into `tweets`(`id_tweet`,`tweet`,`fecha_publicacion`,`usuario`,`url_imagen_perfil`,`ubicacion`) values 
('691328839834824705','En Adopcion esta mascota: https://t.co/o90TEF3NF6 https://t.co/FKZeNEMwqZ','2016-01-24','redmascotera','http://pbs.twimg.com/profile_images/2328599356/86psplaman5dj3rb6w31_normal.jpeg',''),
('691329694755639296','#Orion mestizo #Australianterrier mediano en Adopción 1añoymedio Info 412.2050805/416.622.00.00 #Ccs @AmorAnimalVzla https://t.co/7IHJ8dqLSv','2016-01-24','LaMunheca','http://pbs.twimg.com/profile_images/634659596620197888/2_WN7JBV_normal.jpg',''),
('691330222000513024','Hermosa gata calico en adopcion. Feria yo. Me reciclo https://t.co/7ESpsp16HY','2016-01-24','biomuseo','http://pbs.twimg.com/profile_images/609370973574316032/idV4UHhr_normal.png',''),
('691330567472832513','Lo he recogido hoy de la carretera. Se busca adopción urgente!!! @Antoniasanjua ???? https://t.co/bEOYOx2Z22','2016-01-24','Sima_Garcia','http://pbs.twimg.com/profile_images/689170804140019712/g8IM2pDq_normal.jpg',''),
('691330922290024448','#Orion mestizo #Australianterrier mediano en Adopción 1añoymedio Info 412.2050805/416.622.00.00 #Ccs @vanecristovao https://t.co/zcMzCiEpdT','2016-01-24','LaMunheca','http://pbs.twimg.com/profile_images/634659596620197888/2_WN7JBV_normal.jpg',''),
('691331067589042177','Se hace grande esperando 1 flia...#Adopción responsable! @adriasalgueiro @candetinelli @karinakgb1 @mcg1465 @MyRy56 https://t.co/u2OUR8gNUe','2016-01-24','aide_tarrio','http://pbs.twimg.com/profile_images/679025987036803072/yJ7x1NiY_normal.jpg',''),
('691332033772130304','URGENTE ADOPCIÓN!!! Gata de 5 meses aprox. Necesita un hogar responsable. Yo no la puedo tener, es muy buena! Difund https://t.co/XkNXNHpAaJ','2016-01-24','tefimaldonado','http://pbs.twimg.com/profile_images/671534463738896385/4AeOnnaI_normal.jpg',''),
('691333433054883840','@LiliamVeronica @Marydyosa\n#AdoptaNoCompres\n#Adopta un perro adulto?\nT2MerecenAmor\n#NoAlMaltratoAnimal\n#NOalAbandono https://t.co/iGPDd1X5I8','2016-01-24','Silviapazyfe','http://pbs.twimg.com/profile_images/683263977183383553/d36VcEA0_normal.jpg',''),
('691333498196639745','Caso EXTERNO: Gatito en adopción!\nInfo: 0997065084\n\n#AdoptaUnGatito #hogartemporal #rescataungato #catlovers #catso… https://t.co/pFvoR9Qb77','2016-01-24','BritoYess_','http://pbs.twimg.com/profile_images/687437971784519680/bBr2HMG-_normal.jpg',''),
('691333905392230400','Esta pequeña cachorra hermosa en adopción en Caracas, se entrega con compromiso de esterilización y muchas gracias! https://t.co/mHbbhcWU6e','2016-01-24','JLLMEJIAS','http://pbs.twimg.com/profile_images/654666517708050432/YQVFRMp5_normal.jpg',''),
('691334614535835649','Ayuda por favor alguien que lopueda adoptar aun es un bb. Lo encontre tirado https://t.co/b3gP5uPWtG','2016-01-24','MirisPined9','http://pbs.twimg.com/profile_images/680907127326699520/hkNpfEn__normal.jpg',''),
('691334746761269248','PERÚQUIERE ADOPTAR EL MODELO DE CHILE PARA LA PRODUCCIÓN DE FRAMBUESA https://t.co/zQxV0hzi4I  https://t.co/iqbgWLbDRj','2016-01-24','elbrotemoderno','http://pbs.twimg.com/profile_images/378800000469160257/24e4afbbcf992c6398e1476d8a849a1b_normal.jpeg',''),
('691334941511176192','Zarita tiene tan sólo un añito y esta buscando un lindo y amoroso hogar! Aplica para su adopción o comparte su foto! https://t.co/Nmi1m6sSnO','2016-01-24','VozAnimalCol','http://pbs.twimg.com/profile_images/627170902250246146/4aOSg7Mz_normal.jpg',''),
('691334966144307200','Sunny fue encontrado vagando cerca de un bar. Como veis es precioso! Ayúdanos a encontrarle una familia!! #Adopta https://t.co/9OOlJtKkjz','2016-01-24','ActuaAnimalista','http://pbs.twimg.com/profile_images/683015798261182465/X-VpylhM_normal.png',''),
('691335676428689408','En Adopcion......porfa sufrio mucho en Oviedo https://t.co/O9jGTweunE','2016-01-24','Angeles00764703','http://pbs.twimg.com/profile_images/447804884826738689/FhlTK9To_normal.jpeg',''),
('691335759006146562','Me llamo chimuelo soy un conejito enano, tengo 5meses de edad, quien me adopta? https://t.co/tTUXcL89sO','2016-01-24','novadominguez0','http://pbs.twimg.com/profile_images/599402851023085568/5Z-NQjkn_normal.jpg',''),
('691336478153117696','URGENTE #ACOGIDA #ADOPCION https://t.co/Aety59nTjb','2016-01-24','PPPenAdopcion','http://pbs.twimg.com/profile_images/522156341838614528/KE1e8IL3_normal.jpeg',''),
('691337136587542528','Rescatado #TANO 10 meses, con terrible herida en la cabeza y más por las orejas, URGENTE ACOGIDA O ADOPCIÓN!! https://t.co/X0LXchAJ1V','2016-01-24','LASAnimal','http://pbs.twimg.com/profile_images/691348440341745664/h3U1Wsx-_normal.jpg',''),
('691337165540855809','Una hermosa en adopción, Becky @corazonconhuell #YoMeReciclo @Biomuseo https://t.co/JopfS5PgAu','2016-01-24','RobaMorena','http://pbs.twimg.com/profile_images/516334426721386496/otwBaO71_normal.jpeg',''),
('691337182963961856','URGENTE #ACOGE #ADOPTA #APADRINA https://t.co/6mTArMn8m7','2016-01-24','PPPenAdopcion','http://pbs.twimg.com/profile_images/522156341838614528/KE1e8IL3_normal.jpeg',''),
('691337319304056833','Las nuevas reglas de la salud: Adopta una mascota. #BestSeller en NY Times https://t.co/sAJyuo7NpI #tendencia https://t.co/bvVIWcpbNZ','2016-01-24','EDITORIALSIRIO','http://pbs.twimg.com/profile_images/661463063225348096/EkWl2c0u_normal.jpg',''),
('691337533628747777','Caso EXTERNO: Gatito en adopción!\nInfo: 0997065084\n\n#AdoptaUnGatito #hogartemporal #rescataungato #catlovers #catso… https://t.co/qIc2Niidip','2016-01-24','Dani_Opps','http://pbs.twimg.com/profile_images/687058071487549440/IuXzjR-1_normal.jpg',''),
('691337971182780416','5 razones para adoptar una #mascota ¿Vos cuáles sumarías? https://t.co/8ebTcxqIYL https://t.co/4ZhRhpAqVe','2016-01-24','Arquipets','http://pbs.twimg.com/profile_images/489075168585588737/QR1r3rnJ_normal.png',''),
('691338855618846720','Papá de Sofía me querés adoptar? https://t.co/opH8e2pVwr','2016-01-24','AbortoDeMonox','http://pbs.twimg.com/profile_images/688876079625449473/5HGmEZY1_normal.jpg',''),
('691339697633636352','Brasil adopta medidas especiales para el control del #Zika de cara a los JJOO. https://t.co/6k7pip7xff https://t.co/9zbv02Hy0U','2016-01-24','notimerica','http://pbs.twimg.com/profile_images/518020770664943617/PzpMzrub_normal.jpeg',''),
('691340317052792833','Bimbo en #adopción responsable https://t.co/hCfSGCOf5T','2016-01-24','YolandaC4','http://pbs.twimg.com/profile_images/2759660847/1fa14f8799760b8a116170d275fd86ba_normal.jpeg',''),
('691341861714300928','Maggie vivía mendigando en la calle y prometimos darle una vida mejor.No pararemos hasta lograr #adopción para ella! https://t.co/Q6tBOFPUaV','2016-01-24','sosgatosmurcia','http://pbs.twimg.com/profile_images/654675664415551488/MtqoKkF3_normal.jpg',''),
('691342364930097154','Lenin busca un hogar para compartir su vida! Serás tú el afortunado?\n#Adopta https://t.co/xYVvacLjYV','2016-01-24','BigoteDeGat','http://pbs.twimg.com/profile_images/685218252121862144/KY8P5Msm_normal.jpg',''),
('691342916351102976','#APP La APP de Club Penguin actualiza a la versión 1.6.14, con novedades como poder adoptar DINOPUFFLES. https://t.co/IT6fpCRHWY','2016-01-24','LasttPenguin','http://pbs.twimg.com/profile_images/690608176803266560/JZLr1JUm_normal.png',''),
('691344785026764806','BASILIO, abuelito de 13 años, necesita #acogida o #adopción en #Madrid. #Perros @APAMasVida https://t.co/EnQd2zWDXF','2016-01-24','DifundeMadrid','http://pbs.twimg.com/profile_images/1776186195/PERRO_ABANDONADO_normal.jpg',''),
('691345120952750080','La campos y bigote van a adoptar a los super single y formarán una familia pasando de terelu https://t.co/gi2IGrDO95','2016-01-24','Carl0_5','http://pbs.twimg.com/profile_images/626404181289639936/OLhF8duZ_normal.jpg',''),
('691345811641335810','Miren esa cara..No puede seguir esperando en el refugio..#adopción @aloe1949 @LizSolariOfcl @JuanaRepetto @guspavan https://t.co/c1GQ1Dmxhi','2016-01-24','Lalysole','http://pbs.twimg.com/profile_images/527890811703160832/AGGLxJxa_normal.jpeg',''),
('691346408021061632','Me encontré unas chicas en Itu, me las quiero adoptar \nBrisa y Zulma https://t.co/e05Nl7x4ZL','2016-01-24','BrizuGomez','http://pbs.twimg.com/profile_images/690363952749002753/d-X_2r_f_normal.jpg','Corrientes, Argentina'),
('691346472126799873','Este bb NO puede seguir espera en el refugio #Adopción @flor_vier @chipyguaw @Gise_Nadia @Fabiana59790465 @silitur https://t.co/Wq6xWRXESg','2016-01-24','Lalysole','http://pbs.twimg.com/profile_images/527890811703160832/AGGLxJxa_normal.jpeg',''),
('691346981030084608','Luna con 5 meses, fue abandonada y ahora está en ADOPCIÓN súper responsable (Córdoba-Carlos paz) ???????????? @lizytagliani https://t.co/1CrFPo3ZuD','2016-01-24','astrixp','http://pbs.twimg.com/profile_images/690726731653763072/CAGRkYyr_normal.jpg',''),
('691349502595305474','Miren lo que son, voy a llorar. Los quiero adoptar basta https://t.co/8Z2JUvoR4X','2016-01-24','waverproud','http://pbs.twimg.com/profile_images/689535590677749761/r7byWtzp_normal.jpg',''),
('691349812281643008','Adopta Un Amigo @MBDRCN : Estos peludos están sin hogar   y esperan por ti https://t.co/1E5fJGwQlQ https://t.co/EgjxAM57LZ','2016-01-24','CanalRCN','http://pbs.twimg.com/profile_images/547166560154968064/yWP5lsq4_normal.png',''),
('691349821609803776','Te compartimos los hábitos saludables que debes adoptar https://t.co/pjj5iFOmg7 https://t.co/rmPEaDk4uq','2016-01-24','ComOrganica','http://pbs.twimg.com/profile_images/662038672812826624/YW2vNETL_normal.png',''),
('691350276809347072','#LaBandaDigital se completa con un nuevo integrante. \n¡Apoyamos la adopción! https://t.co/KP8RkjmCIO','2016-01-24','manimatorstudio','http://pbs.twimg.com/profile_images/625685227134976000/X6u9eeWK_normal.png',''),
('691350288284782592','EXTRA A.C. dará en adopción 150 mil árboles en 2016 https://t.co/bvecJmpiSW https://t.co/zU76sHLVpo','2016-01-24','TiempoDeZapopan','http://pbs.twimg.com/profile_images/496712130066780161/fJmcnEVn_normal.jpeg',''),
('691350457499947009','En Adopcion esta mascota: https://t.co/aFkXAGgq35 https://t.co/z8cUtmyvJX','2016-01-24','redmascotera','http://pbs.twimg.com/profile_images/2328599356/86psplaman5dj3rb6w31_normal.jpeg',''),
('691350526777102337','HACHE Busca UNA FAMILIA QUE LE ADOPTE!!! #Adopta en @NuevaVidaAdop Es un gatito amoroso y cariñoso, de...… #Madrid… https://t.co/kfdvDgdhKO','2016-01-24','_miguelaviles_','http://pbs.twimg.com/profile_images/636463768839581696/QgHf60UG_normal.png',''),
('691350635371978752','Amer/staff Mix Great With People Kids  Good With Dogs ( C Rescue) ?? https://t.co/oGQ4YvolyQ ?? #DogFinder #AdoptA… https://t.co/JlmDoAJFDK','2016-01-24','BostonMAPuppies','http://pbs.twimg.com/profile_images/604037793967263745/aavxU9-m_normal.jpg',''),
('691351072712060929','PORFAAA quien quiera adoptar... https://t.co/C2qhay7Yut','2016-01-24','Teffy_Petunia','http://pbs.twimg.com/profile_images/676628137971687424/v8MSkGmK_normal.jpg',''),
('691351997958610945','Parejas homosexuales podrán adoptar niños en Colombia. LEER MAS; https://t.co/TnBgyEcwne https://t.co/6b56d1mWD3','2016-01-24','ManuelCruzGT','http://pbs.twimg.com/profile_images/626615408422813696/qUmvmqs-_normal.jpg',''),
('691352139252273152','En Adopcion esta mascota: https://t.co/MOoxkb2zob https://t.co/Jw74mwJiUr','2016-01-24','redmascotera','http://pbs.twimg.com/profile_images/2328599356/86psplaman5dj3rb6w31_normal.jpeg',''),
('691352177940566016','#lahorachachi18 venga amigos! Quien se anima a acoger/adoptar al pequeño Edison? Os está esperando @LaHoraChaChiOfi https://t.co/PZr8g1OrIC','2016-01-24','perritosenapuro','http://pbs.twimg.com/profile_images/476849485134696449/eFWfeayG_normal.jpeg',''),
('691352424699813889','Adopta a este gatito!! Heli Arca https://t.co/qFO3FmcMcf https://t.co/OOmgm83pFp','2016-01-24','fundarcanoe','http://pbs.twimg.com/profile_images/535448087503048704/BL2LvIK0_normal.jpeg',''),
('691352902246494208','Remo con su nueva familia, ahora a su nueva casa! #adopta #esteriliza #colabora #comparte #separtedelcambio https://t.co/mPzlpeRTLJ','2016-01-24','fundasis','http://pbs.twimg.com/profile_images/651127674996285440/AcstNz9k_normal.jpg',''),
('691353323916640257','Adopta Un Amigo MBDRCN : Estos peludos están sin hogar   y esperan por ti https://t.co/lf9PH5RJER https://t.co/5sqCTTJfwW','2016-01-24','luwalcineytv','http://pbs.twimg.com/profile_images/668824245099737088/CxuqmQ2d_normal.jpg',''),
('691353455135440896','Perrita preciosa necesita adopcion o vuelve a la perrera !!! https://t.co/9rIDhI4U5d','2016-01-24','PerezOsa71','http://pbs.twimg.com/profile_images/3645817168/71c87304b32e1592fea8db03f259182e_normal.jpeg',''),
('691353472776683520','Adopta un caracol? Adóptame esta pxl https://t.co/Xyv2VhosUG','2016-01-24','LuisferGanoza','http://pbs.twimg.com/profile_images/687817051528949764/ubfX2wJS_normal.jpg','');

/*Table structure for table `usr_red_social` */

DROP TABLE IF EXISTS `usr_red_social`;

CREATE TABLE `usr_red_social` (
  `Username` varchar(20) NOT NULL,
  `Red` enum('Instagram','Twitter') NOT NULL,
  `ID_Usuario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`Username`),
  KEY `IX_Relationship9` (`ID_Usuario`),
  CONSTRAINT `Posee` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usr_red_social` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `ID_Usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Contrasena` varchar(15) NOT NULL,
  `Telefono` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

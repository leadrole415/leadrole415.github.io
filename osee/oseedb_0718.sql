/*
SQLyog Community v12.09 (64 bit)
MySQL - 10.1.13-MariaDB : Database - oseedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`oseedb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `oseedb`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `MEM_ID` varchar(20) NOT NULL,
  `GOODS_ID` varchar(20) NOT NULL,
  `GOODS_NM` varchar(100) NOT NULL,
  `GOODS_PRICE` int(11) NOT NULL,
  `GOODS_CNT` int(11) NOT NULL,
  `TOTAL_PRICE` int(11) NOT NULL,
  `GOODS_IMG1` varchar(20) NOT NULL,
  `REG_DT` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MEM_ID`,`GOODS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cart` */

insert  into `cart`(`MEM_ID`,`GOODS_ID`,`GOODS_NM`,`GOODS_PRICE`,`GOODS_CNT`,`TOTAL_PRICE`,`GOODS_IMG1`,`REG_DT`) values ('jadejuyoun','t0001','로고플레이 시리즈 티셔츠_SEEOSEE_바이올렛',43500,1,0,'t0001_img1.jpg','2018-07-17 19:25:56'),('jadejuyoun','t0002','로고플레이 시리즈 티셔츠_SEEOSEE_화이트',43500,1,0,'t0002_img1.jpg','2018-07-17 19:25:59');

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `GOODS_ID` varchar(20) NOT NULL,
  `GOODS_NM` varchar(100) NOT NULL,
  `GOODS_PRICE` int(11) NOT NULL,
  `GOODS_DESC1` varchar(500) DEFAULT NULL,
  `GOODS_DESC2` varchar(500) DEFAULT NULL,
  `GOODS_DESC3` varchar(500) DEFAULT NULL,
  `GOODS_DESC4` varchar(500) DEFAULT NULL,
  `GOODS_IMG1` varchar(20) NOT NULL,
  `GOODS_IMG2` varchar(20) DEFAULT NULL,
  `GOODS_IMG3` varchar(20) DEFAULT NULL,
  `GOODS_IMG4` varchar(20) DEFAULT NULL,
  `GOODS_IMG5` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`GOODS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `goods` */

insert  into `goods`(`GOODS_ID`,`GOODS_NM`,`GOODS_PRICE`,`GOODS_DESC1`,`GOODS_DESC2`,`GOODS_DESC3`,`GOODS_DESC4`,`GOODS_IMG1`,`GOODS_IMG2`,`GOODS_IMG3`,`GOODS_IMG4`,`GOODS_IMG5`) values ('t0001','로고플레이 시리즈 티셔츠_SEEOSEE_바이올렛',43500,NULL,NULL,NULL,NULL,'t0001_img1.jpg','t0001_img2.jpg','t0001_img3.jpg','t0001_img4.jpg','t0001_img5.jpg'),('t0002','로고플레이 시리즈 티셔츠_SEEOSEE_화이트',43500,NULL,NULL,NULL,NULL,'t0002_img1.jpg','t0002_img2.jpg','t0002_img3.jpg','t0002_img4.jpg','t0002_img5.jpg'),('t0003','로고플레이 시리즈 티셔츠_DIDYOU',43500,NULL,NULL,NULL,NULL,'t0003_img1.jpg','t0003_img2.jpg','t0003_img3.jpg','t0003_img4.jpg','t0003_img5.jpg'),('t0004','로고플레이 시리즈 티셔츠_OSEE',43500,NULL,NULL,NULL,NULL,'t0004_img1.jpg','t0004_img2.jpg','t0004_img3.jpg','t0004_img4.jpg','t0004_img5.jpg'),('t0005','로고플레이 시리즈 티셔츠_NEON_화이트',43500,NULL,NULL,NULL,NULL,'t0005_img1.jpg','t0005_img2.jpg','t0005_img3.jpg','t0005_img4.jpg','t0005_img5.jpg'),('t0006','로고플레이 시리즈 티셔츠_NEON_베이지',43500,NULL,NULL,NULL,NULL,'t0006_img1.jpg','t0006_img2.jpg','t0006_img3.jpg','t0006_img4.jpg','t0006_img5.jpg'),('t0007','솔리드 스트라이프 티셔츠',43500,'',NULL,NULL,NULL,'t0007_img1.jpg','t0007_img2.jpg','t0007_img3.jpg','t0007_img4.jpg','t0007_img5.jpg'),('t0008','져지 프린트 스트라이프 티셔츠',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,'면 100%','FREE(모델착용)-어깨너비 46cm/가슴둘레 112cm/총기장 63cm/소매길이 27cm','t0008_img1.jpg','t0008_img2.jpg','t0008_img3.jpg','t0008_img4.jpg','t0008_img5.jpg'),('t0009','유니버스 프린트 티셔츠',43500,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.','\'유니버스 프린트 티셔츠\'는 디자이너가 최근 감명깊게 들은 음악과 관련된 아트웍입니다. 밴드 비틀즈의 \'luck in the sky with diamonds\'라는 곡을 듣고 깊게 영감을 받아 제작한 아트웍입니다. 이 곡은 굉장히 몽환적인 곡으로 비틀즈의 존 레넌이 자신의 아들의 그림과 소설 이상한 나라 앨리스에서 영감을 받아 제작한 곡으로 알려져 있습니다. 모든 것이 연결되있는 느낌과 그 이상에 도달하는 초월적인 느낌에 집중하였습니다. 차세대 프린팅 기법으로 고급스러운 옷의 감성을 느낄 수 있습니다. ','면 100% (실크터치)-모소가공(실크터치)/수세가공 2회(세탁 후 수축방지)/열가공 2회(세탁 후 뒤틀림 방지)','FREE(모델착용)-어깨너비 42cm/가슴둘레 114cm/총기장 69cm/소매길이 26.5cm','t0009_img1.jpg','t0009_img2.jpg','t0009_img3.jpg','t0009_img4.jpg','t0009_img5.jpg'),('t0010','백 프린팅 시리즈 티셔츠_ATM',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0010_img1.jpg','t0010_img2.jpg','t0010_img3.jpg','t0010_img4.jpg','t0010_img5.jpg'),('t0011','백 프린팅 시리즈 티셔츠_POP',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0011_img1.jpg','t0011_img2.jpg','t0011_img3.jpg','t0011_img4.jpg','t0011_img5.jpg'),('t0012','백 프린팅 시리즈 티셔츠_WTF',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0012_img1.jpg','t0012_img2.jpg','t0012_img3.jpg','t0012_img4.jpg','t0012_img5.jpg'),('t0013','백 프린팅 시리즈 티셔츠_HBD',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0013_img1.jpg','t0013_img2.jpg','t0013_img3.jpg','t0013_img4.jpg','t0013_img5.jpg'),('t0014','백 프린팅 시리즈 티셔츠_VTM',59000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단과 세탁후 찢어지는 스티커 방식의 프린트가 아닌, 원단에 직접 안료를 프린트하여 염색하는 차세대 프린팅 기법으로 모양만 이쁜 옷이 아닌, 고객의 만족도를 우선으로 하는 최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0014_img1.jpg','t0014_img2.jpg','t0014_img3.jpg','t0014_img4.jpg','t0014_img5.jpg'),('t0015','솔리드 티셔츠 라일락',35000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단으로  최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0015_img1.jpg','t0015_img2.jpg','t0015_img3.jpg','t0015_img4.jpg','t0015_img5.jpg'),('t0016','솔리드 티셔츠 초코',35000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단으로  최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0016_img1.jpg','t0016_img2.jpg','t0016_img3.jpg','t0016_img4.jpg','t0016_img5.jpg'),('t0017','솔리드 티셔츠 화이트',35000,'OSEE 2018 SUMMER의 모든 티셔츠는 타 업체에 비해 원가가 월등히 높은 원단으로  최고의 퀄리티를 판매합니다.',NULL,NULL,NULL,'t0017_img1.jpg','t0017_img2.jpg','t0017_img3.jpg','t0017_img4.jpg','t0017_img5.jpg');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `MEM_ID` varchar(20) NOT NULL,
  `MEM_NM` varchar(20) NOT NULL,
  `MEM_PW` varchar(20) NOT NULL,
  `MEM_EMAIL` varchar(200) NOT NULL,
  `MEM_TEL1` varchar(20) NOT NULL,
  `MEM_TEL2` varchar(20) DEFAULT NULL,
  `MEM_ADD1` varchar(500) NOT NULL,
  `MEM_ADD2` varchar(500) DEFAULT NULL,
  `MEM_ADD3` varchar(500) DEFAULT NULL,
  `REG_DT` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MEM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `member` */

insert  into `member`(`MEM_ID`,`MEM_NM`,`MEM_PW`,`MEM_EMAIL`,`MEM_TEL1`,`MEM_TEL2`,`MEM_ADD1`,`MEM_ADD2`,`MEM_ADD3`,`REG_DT`) values ('aaaa111','정해인','222222','','010--',NULL,'',NULL,NULL,'2018-07-13 13:31:41'),('jadejuyoun','김주연','111111','mirar83@naver.com','010-8181-8114',NULL,'16998경기 용인시 기흥구 동백8로 27호수마을어울림아파트',NULL,NULL,'2018-07-06 12:51:10');

/*Table structure for table `order_detail` */

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `ORDER_ID` varchar(20) NOT NULL,
  `GOODS_ID` varchar(100) NOT NULL,
  `GOODS_NM` varchar(20) DEFAULT NULL,
  `GOODS_PRICE` int(11) DEFAULT NULL,
  `GOODS_CNT` int(11) DEFAULT NULL,
  `GOODS_IMG1` varchar(20) DEFAULT NULL,
  `reg_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ORDER_ID`,`GOODS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order_detail` */

insert  into `order_detail`(`ORDER_ID`,`GOODS_ID`,`GOODS_NM`,`GOODS_PRICE`,`GOODS_CNT`,`GOODS_IMG1`,`reg_dt`) values ('90','t0015','솔리드 티셔츠 라일락',35000,1,'t0015_img1.jpg','2018-07-17 15:57:10'),('90','t0016','솔리드 티셔츠 초코',35000,1,'t0016_img1.jpg','2018-07-17 15:57:10'),('91','t0008','져지 프린트 스트라이프 티셔츠',59000,1,'t0008_img1.jpg','2018-07-17 15:59:20'),('91','t0016','솔리드 티셔츠 초코',35000,1,'t0016_img1.jpg','2018-07-17 15:59:20'),('92','t0003','로고플레이 시리즈 티셔츠_DIDYOU',43500,1,'t0003_img1.jpg','2018-07-17 19:26:05');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEM_ID` varchar(20) DEFAULT NULL,
  `MEM_NM` varchar(100) DEFAULT NULL,
  `MEM_TEL1` varchar(20) DEFAULT NULL,
  `MEM_TEL2` varchar(20) DEFAULT NULL,
  `MEM_ADD1` varchar(500) DEFAULT NULL,
  `MEM_ADD2` varchar(500) DEFAULT NULL,
  `MEM_ADD3` varchar(500) DEFAULT NULL,
  `REG_DT` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ORDER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

/*Data for the table `orders` */

insert  into `orders`(`ORDER_ID`,`MEM_ID`,`MEM_NM`,`MEM_TEL1`,`MEM_TEL2`,`MEM_ADD1`,`MEM_ADD2`,`MEM_ADD3`,`REG_DT`) values (90,'jadejuyoun','김주연','010-8181-8114','','16998경기 용인시 기흥구 동백8로 27호수마을어울림아파트','','','2018-07-17 15:57:10'),(91,'jadejuyoun','김주연','010-8181-8114','','16998경기 용인시 기흥구 동백8로 27호수마을어울림아파트','','','2018-07-17 15:59:20'),(92,'jadejuyoun','김주연','010-8181-8114','','16998경기 용인시 기흥구 동백8로 27호수마을어울림아파트','','','2018-07-17 19:26:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

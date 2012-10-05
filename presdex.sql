/*
SQLyog Ultimate v9.60 
MySQL - 5.5.16 : Database - presdex
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`presdex` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `presdex`;

/*Table structure for table `compare_term` */

DROP TABLE IF EXISTS `compare_term`;

CREATE TABLE `compare_term` (
  `ct_id` int(11) NOT NULL AUTO_INCREMENT,
  `ct_query` varchar(255) NOT NULL,
  `ct_name` varchar(255) NOT NULL,
  `ct_racer` int(11) DEFAULT NULL,
  `ct_last_query_date` datetime DEFAULT NULL,
  `ct_max_id` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `compare_term` */

insert  into `compare_term`(`ct_id`,`ct_query`,`ct_name`,`ct_racer`,`ct_last_query_date`,`ct_max_id`) values (1,'Romney','Romney',2,'2012-10-01 16:22:57','252775553143300096'),(3,'Obama','Obama',1,'2012-10-01 16:23:00','252775562127491073');

/*Table structure for table `racer` */

DROP TABLE IF EXISTS `racer`;

CREATE TABLE `racer` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(255) DEFAULT NULL,
  `r_img` varchar(255) DEFAULT NULL,
  `r_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `racer` */

insert  into `racer`(`r_id`,`r_name`,`r_img`,`r_desc`) values (1,'Barak Obama',NULL,NULL),(2,'Mitt Romney',NULL,NULL);

/*Table structure for table `tweet` */

DROP TABLE IF EXISTS `tweet`;

CREATE TABLE `tweet` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_date` datetime NOT NULL,
  `t_user` varchar(255) NOT NULL,
  `t_user_id` int(11) DEFAULT NULL,
  `t_user_name` varchar(255) DEFAULT NULL,
  `t_geo` varchar(255) DEFAULT NULL,
  `t_id_str` varchar(255) DEFAULT NULL,
  `t_profile_img_url` text,
  `t_text` text NOT NULL,
  `t_sentiment` enum('positive','negative','neutral') DEFAULT NULL,
  `t_term` int(5) NOT NULL,
  `t_processed` tinyint(4) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `tweet` */

insert  into `tweet`(`t_id`,`t_date`,`t_user`,`t_user_id`,`t_user_name`,`t_geo`,`t_id_str`,`t_profile_img_url`,`t_text`,`t_sentiment`,`t_term`,`t_processed`) values (1,'2012-10-01 10:22:42','kooleyCobain',100069902,'caine lawson.',NULL,'252775553143300096','http://a0.twimg.com/profile_images/2586997465/kooleyCobain_normal.jpg','It\'s ppl deployed with me well below the poverty line living off a drill check voting for Romney. And you can\'t tell em he\'s not for them.','positive',1,0),(2,'2012-10-01 10:22:42','ugotGod',79838661,'Original got God?®',NULL,'252775551146799105','http://a0.twimg.com/profile_images/1616190438/737c5f5a-134d-4fcc-b9f0-0589ffa299d8_normal.JPG','RT @PPact: RT @PPact: MT @aishatyler: #Romney talks about things he would get rid of, but what are his solutions? #AskMitt where he stands: http:// ...','neutral',1,0),(3,'2012-10-01 10:22:40','PurlMaster55',45493902,'Persa Verance',NULL,'252775543169245184','http://a0.twimg.com/profile_images/272320788/grrr_normal.jpg','RT @thedailybeast: RT @thedailybeast: Why Mitt Romney is trapped by his negativity narrative, and how that could help him in November http://t.co/RW8E2TWi','positive',1,0),(4,'2012-10-01 10:22:40','davidcolunga',17184884,'David Colunga',NULL,'252775541931900928','http://a0.twimg.com/profile_images/1285148307/Picture0030_normal.jpg','\"@BuzzFeedAndrew: Mitt Romney asking for likes on Facebook. http://t.co/M1R4Rm1M\" those are some hairy arms...','positive',1,0),(5,'2012-10-01 10:22:38','roginkim',17315451,'Rogin Kim',NULL,'252775535862755329','http://a0.twimg.com/profile_images/1750262453/384106_274533275940545_100001516258462_732637_2066590884_n_normal.jpg','Mitt Romney has gone from Michael to Gob to Buster on the Arrested Development Character Scale in less than one year.','negative',1,0),(6,'2012-10-01 10:22:35','linoge_wotc',17325048,'Linoge',NULL,'252775522570993665','http://a0.twimg.com/profile_images/2041793349/HDR3Mantiuk06-001_normal.jpg','.@sairakh And yes, both Obama and Romney support #guncontrol. That\'s one of the reasons I\'m voting for neither.','positive',1,0),(7,'2012-10-01 10:22:35','Morning_Energy',575712418,'Morning Energy',NULL,'252775520226394112','http://a0.twimg.com/profile_images/2205211316/MorningEnergy_normal.JPG','Energy, climate and the presidential debates - More reaction to Obama\'s China-wind decision - NYT on Romney and ener... http://t.co/xzAvMPs2','negative',1,0),(8,'2012-10-01 10:22:34','politiciansrch',275689184,'Politician Search',NULL,'252775519244918785','http://a0.twimg.com/profile_images/1296387056/PoliticianSearch_normal.png','Obama Team Studies Romney Tapes as Debate Camp Begins http://t.co/Wv1ul9k5','neutral',1,0),(9,'2012-10-01 10:22:34','dondanl',131499459,'dan',NULL,'252775517957283841','http://a0.twimg.com/profile_images/2586261739/xdlpf2h454ktac7xrl89_normal.jpeg','RT @LipstickLibShow: RT @LipstickLibShow: \'Real Problem With Romney\'s Offshore Investments\'- His $$ tax better vacations than 995 of us do! http://t.co/029cExuN','negative',1,0),(10,'2012-10-01 10:22:31','SilverJingles',24578723,'Lester  Sheets',NULL,'252775504090918913','http://a0.twimg.com/profile_images/2170590446/LTSPictures_001_normal.jpg','EXPERT DEALING WITH FOREIGN NATIONS,  SUCCESSFUL WORLD WIDE BUSINESS MAN, BALANCED MS STATE BUDGET, RESCUED OLYMPICS, ROMNEY BEST 4 THE JOB','positive',1,0),(11,'2012-10-01 10:22:30','phoebeplagens',18142266,'phoebe',NULL,'252775502690009089','http://a0.twimg.com/profile_images/2631668061/acdf6e00cd71543afa7768b6d9b7db3d_normal.jpeg','RT @RollingStone: RT @RollingStone: If you want to understand Mitt Romney\'s game plan, just look at what Republicans have been doing in Congress: http://t ...','positive',1,0),(12,'2012-10-01 10:22:30','Truthbuster',124898913,'AMC',NULL,'252775499414269952','http://a0.twimg.com/profile_images/1307230772/5dc61ca4-4c71-46a6-9675-3e0b7490f633_normal.png','RT @owillis: RT @owillis: ann romney, is having a party with miriam adelson. this is hard. http://t.co/rRkG9oVx','neutral',1,0),(13,'2012-10-01 10:22:29','PhillipNLegg',142388057,'Phillip N. Legg',NULL,'252775497891733504','http://a0.twimg.com/profile_images/2481214988/b5bpy3rlvar4xo925b10_normal.jpeg','Romney slams Obama over Middle East and throwing Israel \'under the bus\' calls for new course - Yahoo!  http://t.co/g4w0GUAq #RomneyRyan2012','negative',1,0),(14,'2012-10-01 10:22:28','46an2',323272913,'Evolve',NULL,'252775493416402944','http://a0.twimg.com/profile_images/2236812190/si33QBEm_normal','RT @DemocratWire: RT @DemocratWire: New DNC Video Sets Romney up to Fail in First Presidential Debate - Red Alert Politics (blog) http://t.co/JWdfm0Wt','negative',1,0),(15,'2012-10-01 10:22:45','britroseee',384304729,'Brittany Rose ',NULL,'252775562127491073','http://a0.twimg.com/profile_images/2525122591/image_normal.jpg','RT @tqueencatlady: RT @tqueencatlady: Obama is trying to pass The Dream Act where illegal immigrants get free college. FUCK THAAT','negative',3,0),(16,'2012-10-01 10:22:44','MartinChurch3',838855718,'Blue Musky',NULL,'252775561921961984','http://a0.twimg.com/profile_images/2655527859/d17457d5d0219a37fc0a8f6efcee4ff5_normal.jpeg','RT @IngrahamAngle: RT @IngrahamAngle: Media double standard is staggering, says @JonahNRO: you\'d go crazy wondering how they would cover every Obama misste ...','negative',3,0),(17,'2012-10-01 10:22:44','charruss',40273022,'Charlotte Russell',NULL,'252775561586425856','http://a0.twimg.com/profile_images/1934308341/tw_14119033_1332463540_normal.jpg','RT @LauraFlyMe: RT @LauraFlyMe: Susan Rice ? Maybe we should call for her boss President Valerie Jarrett &amp; puppet Barack Obama\'s resignations','negative',3,0),(18,'2012-10-01 10:22:44','VegasJessie',65293006,'Teaparty Crasher ',NULL,'252775560105848834','http://a0.twimg.com/profile_images/2285795463/ProfilePhoto_normal.png','\"If support Obama you just want free stuff and handouts\". #Romneyslogans Looting war veterans!!','positive',3,0),(19,'2012-10-01 10:22:44','NicNicinGA',146852990,'Nic TM',NULL,'252775558503600128','http://a0.twimg.com/profile_images/2611609107/a10a7b7e-0798-4a26-bed3-369adf23081a_normal.png','RT @geoff9cow: RT @geoff9cow: Obama Beats Romney as Better for Middle-Income Americans http://t.co/aGXeHYM1 @PaddyK @GottaLaff #p2 #tcot','positive',3,0),(20,'2012-10-01 10:22:43','erin_maureen',300473640,'Erin Curry',NULL,'252775557371162624','http://a0.twimg.com/profile_images/2132585733/spoon_normal.jpg','RT @LUDudeProblems: RT @LUDudeProblems: Will today be a \"heart for missions,\" \"Obama sucks,\" or \"make the most of college\" convo? #LibertyConvo #LUDudeProblems','negative',3,0),(21,'2012-10-01 10:22:43','Kayayaye',572698885,'callmekay. ',NULL,'252775557190791170','http://a0.twimg.com/profile_images/2667567085/d1b77ddd07cb516242f3eb1048223d75_normal.jpeg','RT @obama_countdown: RT @obama_countdown: 3 months, 2 weeks, 4 days, 16 hours, 59 minutes, and 58 seconds  until #Obama leaves office.','neutral',3,0),(22,'2012-10-01 10:22:43','a_true_gemi',431192811,'Such A GEM',NULL,'252775556452589568','http://a0.twimg.com/profile_images/2650134776/6c508f0da946ac42eb71f5d9fba35805_normal.jpeg','RT @_OhSoLightskin: RT @_OhSoLightskin: I support my president Barack Obama. He tryna cut college tuition in half.. Romney tryna cut the Federal Pell  Grant ...','positive',3,0),(23,'2012-10-01 10:22:42','kerryc33',55911087,'Kerry Cardwell',NULL,'252775551075508224','http://a0.twimg.com/profile_images/1567894228/tumblr_lr1v94rn3K1qeuobqo1_1280_normal.jpg','RT @jimgeraghty: RT @jimgeraghty: Every Obama-ite currently \"lowering expectations\" will express the same opinion afterwards, that their guy defied expec ...','negative',3,0),(24,'2012-10-01 10:22:41','streaker917',599331925,'Charlie Streaker',NULL,'252775546264645632','http://a0.twimg.com/profile_images/2284683543/v9fcw1f5iblv14fuhfmf_normal.jpeg','RT @MsMaryPotts: RT @MsMaryPotts: Chavez endorsed Obama, when\'s Mahmoud coming out in favor of O? RT if U don\'t want a pres endorsed by these crazies #tc ...','positive',3,0),(25,'2012-10-01 10:22:41','kbowne11',599304496,'Kelly B',NULL,'252775546218487809','http://a0.twimg.com/profile_images/2278113017/daisy_normal.jpg','RT @MsMaryPotts: RT @MsMaryPotts: Chavez endorsed Obama, when\'s Mahmoud coming out in favor of O? RT if U don\'t want a pres endorsed by these crazies #tc ...','positive',3,0),(26,'2012-10-01 10:22:41','ashleyportero',30665373,'Ashley Portero',NULL,'252775545710972928','http://a0.twimg.com/profile_images/2563222714/8n6q7s44q8n97f0aczov_normal.jpeg','New poll from @thehill finds majority of voters expect Obama to win second term\nhttp://t.co/YYrAugdO','positive',3,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

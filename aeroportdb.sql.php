-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `avion`;
CREATE TABLE `avion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacite` int(11) NOT NULL,
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `avion` (`id`, `modele`, `capacite`, `compagnie`) VALUES
(1,	'TX900',	2,	'bozzo_air_lines');

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `pilote_id` int(11) DEFAULT NULL,
  `gestionnaire_id` int(11) DEFAULT NULL,
  `responsable_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  UNIQUE KEY `UNIQ_957A6479F510AAE9` (`pilote_id`),
  UNIQUE KEY `UNIQ_957A64796885AC1B` (`gestionnaire_id`),
  UNIQUE KEY `UNIQ_957A647953C59D72` (`responsable_id`),
  CONSTRAINT `FK_957A647953C59D72` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`id`),
  CONSTRAINT `FK_957A64796885AC1B` FOREIGN KEY (`gestionnaire_id`) REFERENCES `gestionnaire` (`id`),
  CONSTRAINT `FK_957A6479F510AAE9` FOREIGN KEY (`pilote_id`) REFERENCES `pilote` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `pilote_id`, `gestionnaire_id`, `responsable_id`) VALUES
(1,	'Responsable',	'responsable',	'responsable@fr',	'responsable@fr',	1,	NULL,	'$2y$13$0JYzZEMWmPTGSkvGsvB6kuTEx3.Qgvuh3TKWyD2W16e02QaHxdsu2',	NULL,	NULL,	NULL,	'a:0:{}',	2,	NULL,	NULL),
(2,	'Admin',	'admin',	'admin@fr',	'admin@fr',	1,	NULL,	'$2y$13$2JLt.CLcUSttyf2NTaYJKu5Zaco8bwAbXoGcn8iafuRHqXTzC6l62',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(3,	'Gestionnaire',	'gestionnaire',	'gestio@fr',	'gestio@fr',	1,	NULL,	'$2y$13$/xEHyaN7FMZs58TuG53AZ.I8Ndyd/en35L6BCmeSXnYk6H9KmBAcW',	NULL,	NULL,	NULL,	'a:0:{}',	3,	NULL,	NULL),
(5,	'frederik',	'frederik',	'kev.cheriz@gmail.com',	'kev.cheriz@gmail.com',	1,	NULL,	'$2y$13$VhHq/buF9eyFJ1DEhp19/ewlqb3o8lMHaPC.ZNLPI0XMY5aMCZXGS',	'2019-03-28 14:24:24',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(6,	'kevin',	'kevin',	'kev@mail.fr',	'kev@mail.fr',	1,	NULL,	'$2y$13$j0tfuirixuDsElQ/6jouNuemRu2ONmFBL4dREHmzzG51vqGMVUdL2',	'2019-04-03 12:09:00',	NULL,	NULL,	'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}',	NULL,	NULL,	NULL),
(7,	'utilisateurtest',	'utilisateurtest',	'goku@gmail.com',	'goku@gmail.com',	1,	NULL,	'$2y$13$sUEmyZbaTjElczxTFq8jgux7ZRa5rxWZuDMVUzGRerBtT7ej1fVTK',	'2019-03-30 12:11:21',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(8,	'vegeto',	'vegeto',	'gokublack@gmail.com',	'gokublack@gmail.com',	1,	NULL,	'$2y$13$O8.SGsosWaV9N1Rqqp8He.l6SE/cPi58ufdeOBw1LIW7mpy0XvBoi',	'2019-03-30 12:37:27',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(9,	'LOLI',	'loli',	'LOLI',	'loli',	1,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	8,	NULL,	NULL),
(10,	'GILBERT',	'gilbert',	'GILBERT',	'gilbert',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	5,	NULL),
(11,	'Chaft',	'chaft',	'Chaft',	'chaft',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	6,	NULL),
(12,	'lopm',	'lopm',	'lopm',	'lopm',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	9,	NULL,	NULL),
(13,	'cheri',	'cheri',	'cheri',	'cheri',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	7,	NULL),
(14,	'jupiter',	'jupiter',	'kiol@gmail.com',	'kiol@gmail.com',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	3),
(15,	'Pikachu',	'pikachu',	'alors@gmail.fr',	'alors@gmail.fr',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:0:{}',	NULL,	8,	NULL),
(16,	'WASHINGTON',	'washington',	'kingsize@gmail.fr',	'kingsize@gmail.fr',	1,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:16:\"ROLE_RESPONSABLE\";}',	NULL,	NULL,	4),
(17,	'Certitude',	'certitude',	'labra@gmail.fr',	'labra@gmail.fr',	1,	NULL,	'$2y$13$HW6r/YuXHPfF3dxp4oe6quAxaOh3smPDuJdi7fXi7blxKlzQJv.s6',	'2019-03-31 23:37:34',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(18,	'Abou',	'abou',	'aladin@gmail.fr',	'aladin@gmail.fr',	1,	NULL,	'$2y$13$ltOG2HqWIjLHOaRZ1DykZevIfFdM7UCvdL/psY5p0H..8PP8mpvAi',	'2019-03-31 23:48:19',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(19,	'Superman',	'superman',	'super@gmail.com',	'super@gmail.com',	1,	NULL,	'$2y$13$1XO6pelojRCzsslQwJsFTeABrkUkeSRutFGqblY.IupzmJ4nSPase',	'2019-03-31 23:50:12',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(20,	'Lader',	'lader',	'indes@gmail.com',	'indes@gmail.com',	1,	NULL,	'$2y$13$bVSckms3rsqqJaSMPzx.f.wFe/EOTgWK.mM9wqBCQXfWZB8djiEBG',	'2019-03-31 23:51:31',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(21,	'Dentiste',	'dentiste',	'passager@gmail.fr',	'passager@gmail.fr',	1,	NULL,	'$2y$13$GojPdQ1PROBzU6JiAf4q4uyYrcMUrtHxqxtQNXY/fHeSJPZAAMHdS',	'2019-03-31 23:55:27',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(22,	'Binaire',	'binaire',	'djoparasite@gmail.com',	'djoparasite@gmail.com',	1,	NULL,	'$2y$13$w.PQtFYR86kuvOPijyY48upcozqU9mjmk7xLK0FoizO.y3luxOQMu',	'2019-03-31 23:56:55',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(23,	'Nazareth',	'nazareth',	'dieu@gmail.fr',	'dieu@gmail.fr',	1,	NULL,	'$2y$13$YIsXZfPeNvuVmYwoslPhEutTpcli8ByY7gDOZT/jR8.bz0ZKhEWty',	'2019-03-31 23:58:56',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(24,	'Symfony',	'symfony',	'google@gmail.com',	'google@gmail.com',	1,	NULL,	'$2y$13$CquRy8y.PDvoAsIRLryvV.4w4oXFRKq7GJu.zbXKex4OQaOP3AQBO',	'2019-04-01 00:04:54',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(25,	'Python',	'python',	'aime@gmail.com',	'aime@gmail.com',	1,	NULL,	'$2y$13$m/6Mw7vJot23mQWwMRhfq.qoPIaa1hv9Z7fWaADQSU168MxF/adOG',	'2019-04-01 00:14:24',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(26,	'Infamous',	'infamous',	'underground@gmail.com',	'underground@gmail.com',	1,	NULL,	'$2y$13$PREejvDPcMpuJdwp.e0LU.hXYBKKt2ezZbgWOBR14GoglgPE8kezS',	'2019-04-01 00:18:07',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(27,	'Fourmi',	'fourmi',	'anti@gmail.com',	'anti@gmail.com',	1,	NULL,	'$2y$13$ZDtXLRk4V22JdQtUMxZ/O.d9RRUtSNJJnIO.ZgykLg.COgExnwq3y',	'2019-04-01 00:20:23',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(28,	'labonne',	'labonne',	'courage@gmail.com',	'courage@gmail.com',	1,	NULL,	'$2y$13$mjeoXAM.VIR4lWTOu38AMOylJYUgPvupMQSlKVZ6Kpp1W9jM04XcW',	'2019-04-01 00:22:17',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(29,	'DrHouse',	'drhouse',	'house@gmail.com',	'house@gmail.com',	1,	NULL,	'$2y$13$HEx0/ovBcP.iiCfKWq9x5.SZwJQ/QSsJOnrhOixF23ywWYxEsNRMS',	'2019-04-01 00:27:00',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(31,	'Batman',	'batman',	'amant@gmail.fr',	'amant@gmail.fr',	1,	NULL,	'$2y$13$GdB5SD4tIrDZOa2gbcnzn.NN50epx8QSo1CWxWA7ElyNnYbZyV4mK',	'2019-04-01 00:43:35',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(32,	'TRISTESSE',	'tristesse',	'triste@gmail.fr',	'triste@gmail.fr',	1,	NULL,	'$2y$13$lV2Qnrt3pIZ4h24mh/W9MeBP6WogMNt4yD0cfvVx5MZYvU6vVV9dy',	'2019-04-01 00:45:37',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(34,	'salam',	'salam',	'salam@gmail.fr',	'salam@gmail.fr',	1,	NULL,	'$2y$13$Q/1wKFvtz3KgCZobbAGE7e4eRMe4GaCpx5BS1DH1quWbCgHeGOuTS',	'2019-04-01 01:25:01',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(36,	'belzebuth',	'belzebuth',	'belzebuth',	'belzebuth',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:11:\"ROLE_PILOTE\";}',	10,	NULL,	NULL),
(37,	'Makota',	'makota',	'yann@gmail.com',	'yann@gmail.com',	1,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:11:\"ROLE_PILOTE\";}',	11,	NULL,	NULL),
(38,	'bulbi',	'bulbi',	'bulbi@gmail.fr',	'bulbi@gmail.fr',	1,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',	NULL,	9,	NULL),
(40,	'lkoij',	'lkoij',	'juh@gmail.fr',	'juh@gmail.fr',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:16:\"ROLE_RESPONSABLE\";}',	NULL,	NULL,	7),
(41,	'Luffy',	'luffy',	'luffy@gmail.fr',	'luffy@gmail.fr',	1,	NULL,	'$2y$13$TovEt1C0f7KOLWLzJd9/deUgQRyTwJYzpe4EVq39rtnIPOWGRYxNa',	'2019-04-01 08:53:43',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(43,	'roronoa',	'roronoa',	'bakuga@gmail.fr',	'bakuga@gmail.fr',	1,	NULL,	'$2y$13$.lz4Ksk.OxYix7weCrDiIO1/o2NFJyXKLOLjLbXQRewfxEqaWlLne',	'2019-04-01 08:57:45',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(44,	'albinos',	'albinos',	'leloup@gmail.fr',	'leloup@gmail.fr',	0,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(45,	'usopp',	'usopp',	'ert@gmail.fr',	'ert@gmail.fr',	1,	NULL,	'$2y$13$Z45YW.vamidvi7tdyHa/jO9bWZ65i9Vt3MFLFYloD6ReRk/RzuQ8m',	'2019-04-01 09:18:02',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(46,	'nami',	'nami',	'usopp@gmail.fr',	'usopp@gmail.fr',	1,	NULL,	'azerty',	NULL,	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(47,	'Papier',	'papier',	'floyalys@gmail.fr',	'floyalys@gmail.fr',	1,	NULL,	'$2y$13$kP9s990Znoj9yAHQImgE5eNlLsGra0gzVZPzAVyWSXvtK8j7cCc8K',	'2019-04-01 09:30:49',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(48,	'People',	'people',	'kikou@gmail.fr',	'kikou@gmail.fr',	1,	NULL,	'$2y$13$Ef.eYRA44bkT/YLFskguTuqpIOWMSn7/8Ucpp62JxOlYDEjk.fk7u',	'2019-04-01 19:53:55',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(49,	'carlouille',	'carlouille',	'carla@gmail.fr',	'carla@gmail.fr',	1,	NULL,	'$2y$13$WPblsTVxyZ5mXroLLCRn2utWhPEP48Zlm2T0cSOPV5eLEH5yTHmPq',	'2019-04-01 19:56:20',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(50,	'Regiscouille',	'regiscouille',	'regis@gmail.fr',	'regis@gmail.fr',	1,	NULL,	'$2y$13$hthcWqwh5MZzAeN0xmWHbu55o2mKz3cLFVB11ArvtXHJ3QpKkSDQq',	'2019-04-01 19:57:27',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(51,	'aa',	'aa',	'aa@aa.aa',	'aa@aa.aa',	1,	NULL,	'$2y$13$k1Hza.GH6uC.QxaiGdzUHO3S67io0PlrW0VQo7O24bc95Fh0QSnA6',	'2019-04-01 20:06:44',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(53,	'erwser',	'erwser',	'kint@gmail.fr',	'kint@gmail.fr',	1,	NULL,	'$2y$13$DJVNR7ouapsWOnQMMmnwH.6n78/tRIgsyeP5Zw0AvqB.HjaUv.NLy',	'2019-04-01 20:17:28',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(54,	'zferf',	'zferf',	'zffe@zqe.ezf',	'zffe@zqe.ezf',	1,	NULL,	'$2y$13$LwZrqsgfJweGO6gKg4c.HutCYxCdTUUl1bfs2MhwqTg8BgeN1DV0e',	'2019-04-01 20:20:33',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(55,	'natsu',	'natsu',	'fairy@gmail.fr',	'fairy@gmail.fr',	1,	NULL,	'$2y$13$v/Y0Sn0RA1jFEKLeDD8l4.dUSmc2.O5tfwJPOU4YL3YPOg2xFp.hK',	'2019-04-01 21:06:54',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(57,	'BELZEBUTHA',	'belzebutha',	'ang@gmail.fr',	'ang@gmail.fr',	1,	NULL,	'kLduQqtI0nAVKxNlFxt5KFTmr0GsgdNy/RMQrhZWHiFXJo6z1kniVjmRC9fHK/wU1oQ1V81vDF7vOE/5t52QUQ==',	NULL,	NULL,	NULL,	'a:1:{i:0;s:16:\"ROLE_RESPONSABLE\";}',	NULL,	NULL,	9),
(58,	'tonbouktou',	'tonbouktou',	'charles@mail.fr',	'charles@mail.fr',	0,	NULL,	'root',	NULL,	NULL,	NULL,	'a:1:{i:0;s:11:\"ROLE_PILOTE\";}',	12,	NULL,	NULL),
(59,	'Legrinch',	'legrinch',	'stich@gmail.fr',	'stich@gmail.fr',	1,	NULL,	'$2y$13$XOwBfLH4tlGpkEeoo50U2uJWJcaFaAn2KbkzKx8upRlukxjzq7lgW',	'2019-04-03 10:15:56',	NULL,	NULL,	'a:1:{i:0;s:16:\"ROLE_RESPONSABLE\";}',	NULL,	NULL,	17),
(60,	'baumghartnger',	'baumghartnger',	'gui@gmail.fr',	'gui@gmail.fr',	1,	NULL,	'$2y$13$LwqBpcrbaB3D9y7qXSFRUuvAxNGGQeX0iLRgckV5K9oSS3wnOqfY6',	'2019-04-03 10:58:58',	NULL,	NULL,	'a:1:{i:0;s:11:\"ROLE_PILOTE\";}',	13,	NULL,	NULL),
(61,	'JAN',	'jan',	'bob@gmail.fr',	'bob@gmail.fr',	1,	NULL,	'$2y$13$9uTMQGiQDIwHoO5jIkh0oOuTZaWRwCG2pQ3gM99eHZZVtK5YIEyca',	'2019-04-02 12:07:57',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(62,	'Popcaan972',	'popcaan972',	'popcaan@gmail.fr',	'popcaan@gmail.fr',	1,	NULL,	'$2y$13$JKSwMEDjrf1I5evyBshVIe9PE5o0WrkBNUgbEXv86r6YFZHe97DDK',	'2019-04-02 12:13:17',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(63,	'Kalash972',	'kalash972',	'kalash@gmail.fr',	'kalash@gmail.fr',	1,	NULL,	'$2y$13$bZVYpxpU.a2LMuSDhRLueOyseBgLnAWMsJ3DDpa5TNn10xGvhddx2',	'2019-04-02 12:16:23',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(65,	'LABITE',	'labite',	'deoizjd@gmail.fr',	'deoizjd@gmail.fr',	1,	NULL,	'$2y$13$Aio5ZBenaXBAQnhAGD5KjOj0dv5SYJpCMzH2MJSP3RY3f3vR2zu9C',	'2019-04-02 12:18:26',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(66,	'tristepin',	'tristepin',	'pinpin@gmail.fr',	'pinpin@gmail.fr',	1,	NULL,	'$2y$13$F6SXINx0.AnpPS9J97r8neEf5yvMzJfSSj/FBCO9xhlHub2t4VBxO',	'2019-04-02 12:23:14',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(67,	'Sangoku',	'sangoku',	'Riz@gmail.com',	'riz@gmail.com',	1,	NULL,	'$2y$13$p15xhl.R1xI1aZT12JcJPuq9iA8JX15vSKyst8pUFzzgEE2BYcz.i',	'2019-04-02 12:24:44',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(68,	'yo',	'yo',	'black@black.com',	'black@black.com',	0,	NULL,	'$2y$13$1uN.GmczRuEtxZHHHMweFObzZsggMEa6onT9x4YzFphbjzyPMQ7v.',	NULL,	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(69,	'Vegeta',	'vegeta',	'vege@gmail.fr',	'vege@gmail.fr',	1,	NULL,	'$2y$13$TWQQF2mgEMe9VyuStg1BGuVZSExNa.DuC8NOThFvRyxX5ngKzo1hq',	'2019-04-02 12:58:42',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(71,	'Crach',	'crach',	'kiki@gmail.fr',	'kiki@gmail.fr',	1,	NULL,	'$2y$13$cIZSXhKKAAyrK3UIMmFOZe1VjxSt28JI0MNGw8S61tEIdH2lMSNby',	'2019-04-02 13:03:14',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(73,	'Antman',	'antman',	'iphone@gmail.fr',	'iphone@gmail.fr',	1,	NULL,	'$2y$13$hOquoFyYG5ecQ7THGwLDxOdfmZr361bv53WWHYQ0v1fZz53SH84QW',	'2019-04-02 13:05:35',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(74,	'alfa',	'alfa',	'ouioui@gmail.fr',	'ouioui@gmail.fr',	1,	NULL,	'$2y$13$O2WxVmF298exRh25ZfWLvubQ2dLSM7EltSu7.RREEhMJXY2.fuQES',	'2019-04-02 13:13:10',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(75,	'GANDALF',	'gandalf',	'legris@gmail.fr',	'legris@gmail.fr',	1,	NULL,	'$2y$13$OapId62LOazMH7EUeb2sr..di59qn3etyYBIbiH035d3T0MNF.cbG',	'2019-04-03 09:16:28',	NULL,	NULL,	'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',	NULL,	10,	NULL),
(77,	'GANDALFO',	'gandalfo',	'legrise@gmail.fr',	'legrise@gmail.fr',	0,	NULL,	'$2y$13$iQDifCXFe16Z0bG.Q9oWler0OZs9Yd4OqmXkMzOnVN2nkY40d9ijq',	NULL,	NULL,	NULL,	'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',	NULL,	12,	NULL),
(78,	'Grosfallus',	'grosfallus',	'fallus@gmail.fr',	'fallus@gmail.fr',	1,	NULL,	'$2y$13$eOIXE7zrzaS9YRUJl8dhDuYAQGYgzz1lkVf0gkw0kmmS3HEWIh2kq',	'2019-04-02 14:49:58',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(79,	'bouboucar',	'bouboucar',	'ipssi@gmail.fr',	'ipssi@gmail.fr',	1,	NULL,	'$2y$13$gv/0yy24qK2OTdbRKiJE1OHhtsxQm/fH8bjSQkwKJhitdCXVqe.6q',	'2019-04-02 14:59:54',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(80,	'TEST',	'test',	'ipssi2@gmail.fr',	'ipssi2@gmail.fr',	1,	NULL,	'$2y$13$05o/bit4BoIl./ZXz6T75emVvZI8ysFy1IDiA97l5uAWIGMKhZtPa',	'2019-04-02 15:15:32',	NULL,	NULL,	'a:0:{}',	NULL,	NULL,	NULL),
(81,	'SUPERGIRL',	'supergirl',	'supergirl@gmail.fr',	'supergirl@gmail.fr',	1,	NULL,	'$2y$13$LH4mq6wkbjJBJTe1/bP6MunqMq7PYFY8pyXIEnVX6qS1uTbT5Uj06',	'2019-04-02 15:32:04',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(82,	'gold',	'gold',	'gold@gmail.fr',	'gold@gmail.fr',	1,	NULL,	'$2y$13$jbu5Siq9kAqa7WtrXrjZ5uGuNyBBVsGXX8u1HXpdHKTJeioaQgZvq',	'2019-04-02 15:32:39',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(83,	'fromage',	'fromage',	'fromage@gmail.fr',	'fromage@gmail.fr',	1,	NULL,	'$2y$13$WUFjT.jMenk71kklKcHoOOhrVxrY5hBwZMqCxRoeyAe4QXB7ziIZi',	'2019-04-02 15:35:25',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(84,	'Fanfan',	'fanfan',	'franciane@gmail.fr',	'franciane@gmail.fr',	1,	NULL,	'$2y$13$a/4ibRoGSsoq7x1kVEAHBuDCyLXlHjtgCjS3R7RKKlu9P4pmMZwj.',	'2019-04-03 09:19:19',	NULL,	NULL,	'a:1:{i:0;s:13:\"ROLE_PASSAGER\";}',	NULL,	NULL,	NULL),
(85,	'Onareussi',	'onareussi',	'its@gmail.fr',	'its@gmail.fr',	1,	NULL,	'$2y$13$opoDOhO7o09VJgfhaWDNs.qB6dmGl47BUTANbw4LTZ5xIRMY33fhu',	'2019-04-03 10:10:32',	NULL,	NULL,	'a:1:{i:0;s:17:\"ROLE_GESTIONNAIRE\";}',	NULL,	13,	NULL);

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE `gestionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gestionnaire` (`id`, `nom`, `prenom`, `email`) VALUES
(1,	'ABOUBACAR',	'george',	NULL),
(2,	'GILBERT',	'Floupe',	NULL),
(3,	'GILBERT',	'Floupe',	NULL),
(4,	'GILBERT',	'Floupe',	NULL),
(5,	'GILBERT',	'Floupe',	NULL),
(6,	'Chaft',	'loik',	NULL),
(7,	'cheri',	'keke',	'kei@gmail.fr'),
(8,	'Pikachu',	'Sacha',	'alors@gmail.fr'),
(9,	'bulbi',	'zarre',	'bulbi@gmail.fr'),
(10,	'GANDALF',	'legris',	'legris@gmail.fr'),
(11,	'GANDALF',	'legris',	'legris@gmail.fr'),
(12,	'GANDALFO',	'legriser',	'legrise@gmail.fr'),
(13,	'Onareussi',	'itsgood',	'its@gmail.fr');

DROP TABLE IF EXISTS `passager`;
CREATE TABLE `passager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BFF42EE9A76ED395` (`user_id`),
  CONSTRAINT `FK_BFF42EE9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `passager` (`id`, `nom`, `prenom`, `pays`, `user_id`, `email`) VALUES
(1,	'AGELUS',	'Christ',	'Congolais',	NULL,	NULL),
(2,	'LUPON',	'Balboa',	'Marocain',	NULL,	NULL),
(3,	'jkjkj',	'jkj',	'kj',	NULL,	NULL),
(4,	'jkjkj',	'jkj',	'kj',	NULL,	NULL),
(5,	'jkjkj',	'jkj',	'kj',	NULL,	NULL),
(6,	'jhjhhj',	'gffgfg',	'dfdfg',	8,	NULL),
(7,	'ALBERT',	'Kévin',	'france',	17,	NULL),
(10,	'banane',	'grappe',	'allemagne',	18,	NULL),
(12,	'Bruce',	'Wayne',	'USA',	19,	NULL),
(13,	'laderniere',	'Lebon',	'royaume',	20,	NULL),
(14,	'Matrix',	'Neo',	'Finlande',	21,	NULL),
(15,	'Deleray',	'Jonathan',	'Guadeloupe',	22,	NULL),
(17,	'Jesus',	'Mickael',	'Israel',	24,	NULL),
(19,	'Salameche',	'pika',	'italie',	25,	NULL),
(22,	'Majinta',	'severine',	'martinique',	26,	NULL),
(23,	'bitou',	'razzz',	'france',	27,	NULL),
(25,	'Labonne',	'yeah',	'USA',	28,	NULL),
(26,	'Joseph',	'kevin',	'france',	29,	'house@gmail.com'),
(27,	'salm',	'salam',	'france',	34,	'salam@gmail.fr'),
(28,	'bonobo',	'luffysans',	'france',	41,	'luffy@gmail.fr'),
(30,	'albinos',	'stephen',	'france',	44,	'leloup@gmail.fr'),
(31,	'nami',	'franky',	'irlande',	46,	'usopp@gmail.fr'),
(32,	'Afrique',	'kirikou',	'afghan',	47,	NULL),
(34,	'Jeancy',	'lkj',	'france',	48,	NULL),
(36,	'quimber',	'carla',	'Guadeloupe',	49,	NULL),
(37,	'boamah',	'regis',	'mozambique',	50,	NULL),
(39,	'aa',	'aa',	'aa',	51,	NULL),
(40,	'qsdrfgt',	'dsdfg',	'qsdf',	53,	NULL),
(41,	'efzsdwx',	'dswf',	'dfswe',	54,	NULL),
(42,	'dragnil',	'lucy',	'france',	55,	NULL),
(43,	'JAN',	'paul',	'france',	NULL,	NULL),
(44,	'JAN',	'paul',	'france',	NULL,	NULL),
(45,	'JAN',	'paul',	'france',	NULL,	NULL),
(46,	'JAN',	'paul',	'france',	NULL,	NULL),
(47,	'JAN',	'paul',	'france',	NULL,	NULL),
(48,	'Albasouf',	'kira',	'afghan',	NULL,	NULL),
(49,	'Albasouf',	'kira',	'afghan',	NULL,	NULL),
(50,	'boum',	'kevin',	'france',	NULL,	'kalash@gmail.fr'),
(51,	'refvsf',	'fvdst',	'tefg',	NULL,	NULL),
(52,	'laboulaison',	'laison',	'lapipe',	NULL,	NULL),
(53,	'black',	'goku',	'frnce',	NULL,	'Riz@gmail.fr'),
(54,	'yo',	'yo',	'uo',	68,	'yi@hj.com'),
(55,	'chichi',	'lapin',	'france',	NULL,	'vege@gmail.fr'),
(56,	'chichi',	'lapin',	'france',	NULL,	'vege@gmail.fr'),
(57,	'loby',	'coby',	'pilo',	NULL,	'kiki@gmail.fr'),
(58,	'wayne',	'bruce',	'island',	NULL,	NULL),
(59,	'wayne',	'bruce',	'island',	NULL,	NULL),
(60,	'pussy',	'cate',	'pouile',	NULL,	NULL),
(61,	'pinou',	'pinette',	'laboue',	NULL,	NULL),
(62,	'bouboucar',	'pisse',	'ecosse',	79,	NULL),
(63,	'clayne',	'clara',	'france',	81,	NULL),
(64,	'Or',	'argent',	'fromage',	82,	'gold@gmail.fr'),
(65,	'roblochon',	'chevre',	'ethiopie',	83,	'fromage@gmail.fr'),
(66,	'Elimra',	'Franciane',	'France',	84,	'franciane@gmail.fr');

DROP TABLE IF EXISTS `passager_vol`;
CREATE TABLE `passager_vol` (
  `passager_id` int(11) NOT NULL,
  `vol_id` int(11) NOT NULL,
  PRIMARY KEY (`passager_id`,`vol_id`),
  KEY `IDX_F69D61ED71A51189` (`passager_id`),
  KEY `IDX_F69D61ED9F2BFB7A` (`vol_id`),
  CONSTRAINT `FK_F69D61ED71A51189` FOREIGN KEY (`passager_id`) REFERENCES `passager` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F69D61ED9F2BFB7A` FOREIGN KEY (`vol_id`) REFERENCES `vol` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pilote`;
CREATE TABLE `pilote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pilote` (`id`, `nom`, `prenom`, `email`) VALUES
(1,	'NAZARETH',	'Jesus',	NULL),
(2,	'HHH',	'HHH',	NULL),
(3,	'mabite',	'loli',	NULL),
(4,	'LUPON',	'Presley',	NULL),
(5,	'DUKOBU',	'Mazouth',	NULL),
(6,	'LOLI',	'lezard',	NULL),
(7,	'LOLI',	'lezard',	'loli@gmail.fr'),
(8,	'LOLI',	'lezard',	'loli@gmail.fr'),
(9,	'lopm',	'lok',	'lok@gmail.fr'),
(10,	'belzebuth',	'angelus',	'angel@gmail.com'),
(11,	'Makota',	'yann',	'yann@gmail.com'),
(12,	'tonbouktou',	'charles',	'charles@mail.fr'),
(13,	'baumghartnger',	'guillaume',	'gui@gmail.fr');

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `email`) VALUES
(1,	'CHANEK',	'carla',	'aer@gmail.com'),
(2,	'CHANEK',	'carla',	'aer@gmail.com'),
(3,	'jupiter',	'loki',	'kiol@gmail.com'),
(4,	'WASHINGTON',	'Presley',	'kingsize@gmail.fr'),
(5,	'Cheri',	'klod',	'klod@gmail.fr'),
(6,	'Pikachu',	'Mew',	'mew@gmail.fr'),
(7,	'lkoij',	'hbuhg',	'juh@gmail.fr'),
(8,	'BELZEBUTH',	'Angelus',	'ang@gmail.fr'),
(9,	'BELZEBUTHA',	'Angelus',	'ang@gmail.fr'),
(10,	'MACRON',	'Lionel',	'lio@gmail.fr'),
(11,	'MACRON',	'Lionel',	'lio@gmail.fr'),
(12,	'MACRON',	'Lionel',	'lio@gmail.fr'),
(13,	'MACRON',	'Lionel',	'lio@gmail.fr'),
(14,	'MACRON',	'Lionel',	'lio@gmail.fr'),
(15,	'mickael',	'mickathe',	'mika@gmail.fr'),
(16,	'mickael',	'mickathe',	'mika@gmail.fr'),
(17,	'Legrinch',	'stich',	'stich@gmail.fr');

DROP TABLE IF EXISTS `vol`;
CREATE TABLE `vol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gestionnaire_id` int(11) DEFAULT NULL,
  `avion_id` int(11) DEFAULT NULL,
  `pilote_id` int(11) DEFAULT NULL,
  `passager_id` int(11) DEFAULT NULL,
  `date_depart` datetime NOT NULL,
  `date_arrivee` datetime NOT NULL,
  `ville_depart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_arrivee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95C97EB6885AC1B` (`gestionnaire_id`),
  KEY `IDX_95C97EB80BBB841` (`avion_id`),
  KEY `IDX_95C97EBF510AAE9` (`pilote_id`),
  KEY `IDX_95C97EB71A51189` (`passager_id`),
  CONSTRAINT `FK_95C97EB6885AC1B` FOREIGN KEY (`gestionnaire_id`) REFERENCES `gestionnaire` (`id`),
  CONSTRAINT `FK_95C97EB71A51189` FOREIGN KEY (`passager_id`) REFERENCES `passager` (`id`),
  CONSTRAINT `FK_95C97EB80BBB841` FOREIGN KEY (`avion_id`) REFERENCES `avion` (`id`),
  CONSTRAINT `FK_95C97EBF510AAE9` FOREIGN KEY (`pilote_id`) REFERENCES `pilote` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `vol` (`id`, `gestionnaire_id`, `avion_id`, `pilote_id`, `passager_id`, `date_depart`, `date_arrivee`, `ville_depart`, `ville_arrivee`) VALUES
(2,	1,	1,	1,	66,	'2014-01-01 00:00:00',	'2014-01-01 00:00:00',	'Paris',	'Madrid'),
(3,	1,	1,	1,	66,	'2014-01-01 00:00:00',	'2014-01-01 00:00:00',	'judas',	'australie'),
(4,	NULL,	1,	13,	66,	'2017-03-04 07:08:00',	'2018-08-08 08:10:00',	'Birmanie',	'Autruche');

-- 2019-04-03 12:35:13

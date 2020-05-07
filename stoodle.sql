-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: mai 07, 2020 la 11:42 PM
-- Versiune server: 5.6.42-84.2
-- Versiune PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `r43949el_Stoodle`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `validator` text,
  `selector` text,
  `userid` int(11) DEFAULT NULL,
  `data` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `auth`
--

INSERT INTO `auth` (`id`, `validator`, `selector`, `userid`, `data`) VALUES
(1, '$2y$10$rbcScoyEbNBEowPr28S3DuBYgdMrt/ClQheK0nVvWRLrvWgBFwb9m', '409cd1463c8cd52d35c8242742fd84b434bfd3762ed1371b', 0, 1590944748),
(5, '$2y$10$qZFyTeHPN2bVXV9mnbH8WejhzmqQHd27OHDXQpr9R7BmKLDiH3J4G', 'af340feaf43d1adc68d29e905712ce81bdf348b0bbd14d64', 1, 1591113640),
(13, '$2y$10$Ux2344qvwqBLeLfWuLILROLq/7NW4Yubra7EXb68zxxIJy0QOPSFK', '814700bb80e7773dd4b93066cb74549e6584b8e25b8d4dba', 6, 1591280346);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `facultati`
--

CREATE TABLE `facultati` (
  `Indexf` int(11) NOT NULL,
  `Numef` text,
  `Judet` tinytext,
  `Examenadmi` tinyint(1) DEFAULT NULL,
  `Universitatea` varchar(256) DEFAULT NULL,
  `Profil` text,
  `Poza` text,
  `job` int(1) DEFAULT NULL,
  `pasiune_facultati` varchar(64) NOT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `link_facultate` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `facultati`
--

INSERT INTO `facultati` (`Indexf`, `Numef`, `Judet`, `Examenadmi`, `Universitatea`, `Profil`, `Poza`, `job`, `pasiune_facultati`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`, `link_facultate`) VALUES
(1, 'Facultatea de Teologie Ortodoxa UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Teologic', 'teologiccluj.jpg', 1, 'Religie', 'Religie', 'Istorie', 'Muzica', 'Religie', 1, '0', 0, 'http://ot.ubbcluj.ro/'),
(2, 'Facultatea de Automatica si Calculatoare                                                                                                                  ', 'Bucuresti', 1, 'Universitatea Politehnica din Bucuresti', 'Mate-info', 'ACcluj.jpg', 0, 'Programare/Calculatoare', 'Informatica', 'Matematica', 'Fizica', 'Tehnica si tehnologie', 0, '0', 1, 'https://acs.pub.ro/'),
(3, 'Facultatea de Psihologie si Stiinte ale Educatiei UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'Pshihologiecluj.jpg', 1, 'Psihologie', 'Psihologie', 'Limba si literatura romana', 'Sociologie', 'Psihologie', 1, '0', 0, 'https://psiedu.ubbcluj.ro/'),
(4, 'Facultatea de Biologie si Geologie UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'biologiecluj.jpg', 1, 'Biologie', 'Biologie', 'Chimie', 'Fizica', 'Enciclopedii', 0, '0', 0, 'http://bioge.ubbcluj.ro/'),
(5, 'Facultatea de Chimie si Inginerie Chimica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'chimiecluj.jpg', 0, 'Chimie', 'Chimmie', 'Fizica', 'Matematica', 'Stiinte exacte', 0, '0', 1, 'http://chem.ubbcluj.ro/'),
(7, 'Facultatea de Medicina', 'Iasi', 1, 'Universitatea de Medicina si Farmacie \"Grigore T. Popa\", Iasi', 'Stiinte ale naturii', 'default.jpg', 0, 'Medicina', 'Matematica', 'Chimie', 'Biologie', 'Medicina', 1, '1', 1, 'http://www.umfiasi.ro/'),
(8, 'Facultatea de Fizica', 'Bucuresti', 1, 'Universitatea din Bucuresti', 'Mate-info', 'default.jpg', 0, 'Fizica', 'Matematica', 'Fizica', 'Chimie', 'Stiinte exacte', 0, '0', 0, 'http://www.fizica.unibuc.ro/Fizica/Main.php'),
(9, 'Facultatea de Istorie', 'Bucuresti', 1, 'Universitatea din Bucuresti', 'Filologie', 'default.jpg', 1, 'Istorie', 'Istorie', 'Educatie civica', 'Geografie', 'Istorie', 0, '0', 0, 'https://istorie.unibuc.ro/admitere2019/admitere-master/'),
(10, 'Facultatea de Jurnalism si Stiintele Comunicarii UniBuc', 'Bucuresti', 1, 'Universitatea din Bucuresti', 'Stiinte-sociale', 'default.jpg', 1, 'Jurnalism', 'Limba si literatura romana', 'Educatie civica', 'Engleza', 'Stiinte sociale,politica', 1, '1', 0, 'http://www.fjsc.unibuc.ro/%27'),
(11, 'Facultatea de Limbi si Literaturi Straine UniBuc ', 'Bucuresti', 1, 'Universitatea din Bucuresti', 'Filologie', 'default.jpg', 1, 'Limbi straine', 'Engleza', 'Franceza', 'Germana', 'Limbi straine', 1, '0', 0, 'http://lls.unibuc.ro/%27'),
(12, 'Facultatea de litere UniBuc', 'Bucuresti', 0, 'Universitatea din Bucuresti', 'Filologie', 'default.jpg', 1, 'Literatura', 'Limba si literatura romana', 'Engleza', 'Franceza', 'Poezie/Literatura', 1, '0', 1, 'https://unibuc.ro/studii/facultati/facultatea-de-litere/%27'),
(13, 'Facultatea de Matematica si Informatica UniBuc', 'Bucuresti', 1, 'Universitatea din Bucuresti', 'Mate-info', 'default.jpg', 0, 'Matematica', 'Matematica', 'Informatica', 'TIC', 'Stiinte exacte', 0, '0', 1, 'http://fmi.unibuc.ro/'),
(14, 'Facultatea de Farmacie', 'Iasi', 1, 'Universitatea de Medicina si Farmacie \"Grigore T. Popa\", Iasi', 'Stiinte ale naturii', NULL, 0, 'Medicina', 'Chimie', 'Biologie', 'Fizica', 'Medicina', 1, '0', 0, 'http://www.umfiasi.ro/ro'),
(15, 'Facultatea de Bioinginerie Medicala', 'Iasi', 1, 'Universitatea de Medicina si Farmacie \"Grigore T. Popa\", Iasi', 'Stiinte ale naturii', NULL, 0, 'Inginerie electrica', 'Fizica', 'Chimie', 'Biologie', 'Tehnica si tehnologie', 0, '0', 0, 'http://www.umfiasi.ro'),
(16, 'Facultatea de Stiinte Socio-Umane si Educatie Fizica si Sport', 'Arad', 1, 'Universitatea de Vest \"Vasile Goldis\"', 'Sportiv', NULL, 1, 'Sport', 'Limba si literatura romana', 'Istorie', 'Educatie fizica', 'Lifestyle,sport', 1, '1', 0, 'www.socioumaneefs.uvvg.ro'),
(17, 'Facultatea de Stiinte Economice, Informatica si Inginerie', 'Arad', 1, 'Universitatea de Vest \"Vasile Goldis\"', 'Mate-info', NULL, 0, 'Programare/Calculatoare', 'Informatica', 'Matematica', 'Fizica', 'Tehnica si tehnologie', 1, '0', 1, 'https://www.uvvg.ro/site/admitere/ ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `Indexf` int(11) DEFAULT NULL,
  `tip` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `favorite`
--

INSERT INTO `favorite` (`id`, `idUser`, `Indexf`, `tip`) VALUES
(23, 7, 9, 'normal'),
(24, 7, 1, 'normal'),
(25, 11, 1, 'normal');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `resetare`
--

CREATE TABLE `resetare` (
  `idReset` int(11) NOT NULL,
  `mailReset` text NOT NULL,
  `selectReset` longtext NOT NULL,
  `tokenReset` longtext NOT NULL,
  `expireReset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `resetare`
--

INSERT INTO `resetare` (`idReset`, `mailReset`, `selectReset`, `tokenReset`, `expireReset`) VALUES
(20, 'grigorescu.aleex@gmail.com', '682e2a1c52992c8b4500f181', '$2y$10$/VWAiciy/80EYcJo4VR5tuxCLfCiL.SLq5WWy8qM9Wqpp.ViDBUJy', '1588596326'),
(30, 'robertplaiasu03@gmail.com', 'f984b3005830fdea6ce39066', '$2y$10$CxQNlvOnP4BOjeDyZmr1WO1mt9FSNI3fE3TLd6B7uxjepTpTDAW1G', '1588696889');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `Nume` text NOT NULL,
  `Prenume` text NOT NULL,
  `mailUser` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `Profil` text,
  `Domeniu` text,
  `domeniu_intensitate` int(1) DEFAULT NULL,
  `job` int(1) DEFAULT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `Judet` text,
  `PozaUser` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`idUser`, `Nume`, `Prenume`, `mailUser`, `pwdUsers`, `Profil`, `Domeniu`, `domeniu_intensitate`, `job`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`, `Judet`, `PozaUser`) VALUES
(1, 'Grigorescu', 'Alexandru', 'grigorescu.aleex@gmail.com', '$2y$10$I6urXCEv4Klu7uMza1J9vejKMVVSJcoqZdFXTPRaFLfuTANTbZNZm', 'Teologic', 'Medicina', 1, 0, 'Limba si literatura romana', 'Desen', 'Istorie', 'Culinare', 1, '1', 1, 'Alba', 'UserDefault.jpg'),
(6, 'Nume', 'Robert', 'robertplaiasu03@gmail.com', '$2y$10$P.M6VW5XCJMaLV3yTp7McuaLEZeT2Kg8aiVyawud.BDPSAOoKjLUC', 'Teologic', 'Filozofie', 1, 0, 'Limba si literatura romana', 'Niciuna din cele de mai jos', 'Niciuna din cele de mai jos', 'Culinare', 1, '1', 1, 'Alba', 'UserDefault.jpg'),
(7, 'Popescu', 'Ion', 'grigo13@yahoo.com', '$2y$10$radIuWj6AHArKv9k6A.tD.O12dlGDV/hfXK308JHEHCz1KrUHhgOW', 'Teologic', 'Medicina', 1, 0, 'Limba si literatura romana', 'Religie', 'Matematica', 'Culinare', 1, '1', 1, 'Alba', NULL),
(8, 'Predoiu', 'Alexandru', 'agpredoiu@gmail.com', '$2y$10$K7dn18DqqNmrP384OoGjuOJcTovMhYgbLm4ApEcVWvY7SpSS4L8Pa', 'Teologic', 'Matematica', 4, 0, 'Engleza', 'Franceza', 'Germana', 'Biografii,memorii', 1, '1', 1, 'Prahova', NULL),
(9, 'Kish', 'AndreiCezar', 'andreikish35@gmail.com', '$2y$10$jvLgE4VocAk0dhIMBsINcOPhfpfMi3pEsKMH82619iYKDas/hjsdu', 'Mate-info', 'Programare/Calculatoare', 3, 0, 'Limba si literatura romana', 'Engleza', 'Matematica', 'Business si economie', 1, '1', 1, 'Prahova', NULL),
(10, 'Gheorghe', 'Stefania', 'stefaniaa.gheorghe2003@yahoo.com', '$2y$10$C3Htv2ajXlasA0f6h7tGLehRq92ND94duZsPBIYfLce4obfzqiW1W', 'Stiinte ale naturii', 'Drept', 4, 0, 'Istorie', 'Psihologie', 'Engleza', 'Fictine', 1, '0', 1, 'Prahova', NULL),
(11, 'Vadim', 'Tudor', 'robert.mihai.colca@gmail.com', '$2y$10$QVsQtxRkqonOF/CgfoLQ9eXBYC.HTUx5eYftyZDHPjVPz5LxOiQk2', 'Teologic', 'Religie', 5, 0, 'Religie', 'Educatie fizica', 'Economie', 'Religie', 0, '0', 1, 'Teleorman', NULL),
(12, 'Stoicescu', 'Stefan', 'dandrei0456@gmail.com', '$2y$10$CHYG.gV9XHMHy8pF7plJBOjNnPmZvv3ryC9T43abJHPViOxzFnDt2', 'Teologic', 'Design', 4, 0, 'Franceza', 'Germana', 'Istorie', 'Lingvistica', 1, '1', 1, 'Bihor', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users_gmail`
--

CREATE TABLE `users_gmail` (
  `idGmail` int(11) NOT NULL,
  `numeGmail` text NOT NULL,
  `prenumeGmail` text NOT NULL,
  `mailGmail` text NOT NULL,
  `Profil` text NOT NULL,
  `Domeniu` text NOT NULL,
  `domeniu_intensitate` int(1) NOT NULL,
  `job` int(1) NOT NULL,
  `materie1` text NOT NULL,
  `materie2` text NOT NULL,
  `materie3` text NOT NULL,
  `carti` text NOT NULL,
  `sociabil` int(1) NOT NULL,
  `sport` int(1) NOT NULL,
  `stres` int(1) NOT NULL,
  `Judet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users_gmail`
--

INSERT INTO `users_gmail` (`idGmail`, `numeGmail`, `prenumeGmail`, `mailGmail`, `Profil`, `Domeniu`, `domeniu_intensitate`, `job`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`, `Judet`) VALUES
(1, 'Grigorescu', 'Alexandru', 'grigorescu.aleex@gmail.com', 'Teologic', 'Medicina', 1, 0, 'Istorie', 'Geografie', 'Educatie civica', 'Culinare', 0, 0, 0, 'Alba'),
(2, '', 'Grigo', 'xalexmcx@gmail.com', '', '', 0, 0, '', '', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users_verificare`
--

CREATE TABLE `users_verificare` (
  `idVerificare` int(11) NOT NULL,
  `numeVerificare` tinytext NOT NULL,
  `prenumeVerificare` varchar(64) NOT NULL,
  `mailVerificare` text NOT NULL,
  `parolaVerificare` longtext NOT NULL,
  `selectVerificare` longtext NOT NULL,
  `tokenVerificare` longtext NOT NULL,
  `expireVerificare` int(32) NOT NULL,
  `verificare` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users_verificare`
--

INSERT INTO `users_verificare` (`idVerificare`, `numeVerificare`, `prenumeVerificare`, `mailVerificare`, `parolaVerificare`, `selectVerificare`, `tokenVerificare`, `expireVerificare`, `verificare`) VALUES
(1, 'Nume', 'Robert', 'robertplaiasu03@gmail.com', '$2y$10$uJ2AnpXLNXq3Uenquyf3DurigB7ISuaGjWsaxdIlGrvN3OIoXAKpG', '3ff6a069d63330bfe06cacba', '$2y$10$tZs06egu/bbkBQ2dmFvhT.fSDA9RWBm6wcafRTxqPPhosZrYSI8PG', 1586774491, NULL),
(8, 'Palamaru', 'Bianca', 'palamarubianca@yahoo.com', '$2y$10$BTGPtZH3BO.U4HIrxBIl2ucgakhJEwe/tJ6/GJl9vawseU7xaal2e', '350d65cc824ade6b09771474', '$2y$10$CNgdH/5sEExzAbm9r7qrf.KfC8O.9N2rQbVJKv2f4dIhbWi5be//u', 1588629527, NULL),
(13, 'Groparu', 'Valentin', 'valentintinu123@gmail.com', '$2y$10$/ToaHQTQ88aISawKlc/Muu.sIw6XFo6td9PhQEogd3ptAgWS/cT4e', 'd56f9ca6c928f5bd3c442d39', '$2y$10$etyiYNEEUE6gTTgXZV1TTu6rp015TJLI4u6h10Ma7WJEDVUhOybLq', 1588668575, NULL),
(16, 'Stoica', 'Simona', 'simona.stoica.1315@gmail.com', '$2y$10$CixOc/47xzmrBYudT0PT3.hcVUmWgsJ64/FgfZW3C5IcljpddGvhu', '2f2448b01f2b3b8c763e38e2', '$2y$10$zDmRppHgNJuU/FqyG2J9mudhGHdJQ2u0deOHOE4ifBeubpDi1in62', 1588675785, NULL),
(17, 'Stoica', 'Georgiana', 'anteco_mobila@yahoo.com', '$2y$10$kK9AlsBve6ZBGdUk.HSBUeP4vCKCiiCfvwugkvBXvFl/I22HUS89O', 'b00a232e7b9e0b89e702ab83', '$2y$10$1Jvvxq13rO4nZvf0I.fBC.GdEetAO03zIOTcxK68zh2d3q3BCizH2', 1588677235, NULL),
(19, 'Radu', 'Denisa', 'denisaradu@yahoo.com', '$2y$10$kiPueiJi18bzJKgAOME.IeOcR8ogPrfaeYM5qPpue44txOq6pZvH.', 'f0a52170b5967545902e7d06', '$2y$10$WFDTYzEnB6A7WkCHwkUE8OOfvUM1q5jQLRPj3y2Q7pLeSZLlqqa2O', 1588687510, NULL),
(20, 'Nume', 'Robert', 'vasileplaiasu@yahoo.com', '$2y$10$97/7mEmsXzc58Nxflb9ko.8K5CWBWRonPRdwK8hMBK8j.MQ3HwgjK', '43a7fa5a11f973de28e4beeb', '$2y$10$ejCLQz/BoPm3By0gb14msuND8IpmvOiC1z4.Px0Pi0wKZFpPt4D2i', 1588768519, NULL),
(21, 'Nume', 'Robert', 'vasileplaiasu@yahoo.com', '$2y$10$exWk4lZYN9hZ3syo.JvhWu./OxD9.E8hb2Xhp.01VFxhLBHO2WObu', '99fbd7d3f476d403830fbc41', '$2y$10$uyBgLV7hD/SFY8c56uf9we3aEOaAETXcX2b6Nm6nDJ/.idgc6kVYS', 1588768519, NULL),
(23, 'Gheorge', 'Fhyg', 'nn@gmail.com', '$2y$10$Cs59v9yVIUzYCacbvBV2B.lGn8jlQpvroSF6btWrLbxEAC328ADlW', 'dc9f5b529db81bc1f878cd5e', '$2y$10$snZUGvQDmcwewhEEZj1M1.cMkUOPHvI4Na7HZrUmraztr1LF6d0mC', 1588774181, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `facultati`
--
ALTER TABLE `facultati`
  ADD PRIMARY KEY (`Indexf`);

--
-- Indexuri pentru tabele `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `resetare`
--
ALTER TABLE `resetare`
  ADD PRIMARY KEY (`idReset`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexuri pentru tabele `users_gmail`
--
ALTER TABLE `users_gmail`
  ADD PRIMARY KEY (`idGmail`);

--
-- Indexuri pentru tabele `users_verificare`
--
ALTER TABLE `users_verificare`
  ADD PRIMARY KEY (`idVerificare`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `facultati`
--
ALTER TABLE `facultati`
  MODIFY `Indexf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `resetare`
--
ALTER TABLE `resetare`
  MODIFY `idReset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `users_gmail`
--
ALTER TABLE `users_gmail`
  MODIFY `idGmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `users_verificare`
--
ALTER TABLE `users_verificare`
  MODIFY `idVerificare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

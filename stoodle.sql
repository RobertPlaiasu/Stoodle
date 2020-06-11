-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 15, 2020 la 02:28 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `stoodle`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `validator` text DEFAULT NULL,
  `selector` text DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `data` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `auth`
--

INSERT INTO `auth` (`id`, `validator`, `selector`, `userid`, `data`) VALUES
(1, '$2y$10$rbcScoyEbNBEowPr28S3DuBYgdMrt/ClQheK0nVvWRLrvWgBFwb9m', '409cd1463c8cd52d35c8242742fd84b434bfd3762ed1371b', 0, 1590944748),
(6, '$2y$10$UTS9/fDhJm1ZS8CNeNdbWeG2xHpis./jeZL3/icFfmqA7TaByzS1W', '78bd49e45a1b9f1c57583946b62a2814b62d46a4ef758377', 6, 1591209471);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `college`
--

CREATE TABLE `college` (
  `index_college` int(11) NOT NULL,
  `name_college` text DEFAULT NULL,
  `county_college` text DEFAULT NULL,
  `admittance_college` tinyint(1) DEFAULT NULL,
  `university_college` varchar(256) DEFAULT NULL,
  `profil_college` text DEFAULT NULL,
  `picture_college` text NOT NULL DEFAULT '\'default.jpg\'',
  `job_college` int(1) DEFAULT NULL,
  `passion_college` varchar(64) NOT NULL,
  `subject1_college` varchar(64) DEFAULT NULL,
  `subject2_college` varchar(64) DEFAULT NULL,
  `subject3_college` varchar(64) DEFAULT NULL,
  `books_college` varchar(64) DEFAULT NULL,
  `soccial_college` int(1) DEFAULT NULL,
  `sport_college` varchar(64) DEFAULT NULL,
  `stress_college` int(1) DEFAULT NULL,
  `link_college` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `college`
--

INSERT INTO `college` (`index_college`, `name_college`, `county_college`, `admittance_college`, `university_college`, `profil_college`, `picture_college`, `job_college`, `passion_college`, `subject1_college`, `subject2_college`, `subject3_college`, `books_college`, `soccial_college`, `sport_college`, `stress_college`, `link_college`) VALUES
(1, 'Facultatea de Teologie Ortodoxa UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Teologic', 'teologiccluj.jpg', 1, 'Religie', 'Religie', 'Istorie', 'Muzica', 'Religie', 1, '0', 0, 'http://ot.ubbcluj.ro/'),
(2, 'Facultatea de Automatica si Calculatoare                                                                                                                  ', 'Cluj', 1, 'Universitatea Tehnica Cluj', 'Mate-info', 'ACcluj.jpg', 0, 'Programare/Calculatoare', 'Informatica', 'Matematica', 'Fizica', 'Tehnica si tehnologie', 0, '0', 1, 'https://acs.pub.ro/'),
(3, 'Facultatea de Psihologie si Stiinte ale Educatiei UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Filologie', 'Pshihologiecluj.jpg', 1, 'Psihologie', 'Psihologie', 'Limba si literatura romana', 'Sociologie', 'Psihologie', 1, '0', 0, 'https://psiedu.ubbcluj.ro/'),
(4, 'Facultatea de Biologie si Geologie UBB', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'biologiecluj.jpg', 1, 'Biologie', 'Biologie', 'Chimie', 'Fizica', 'Enciclopedii', 0, '0', 0, 'http://bioge.ubbcluj.ro/'),
(5, 'Facultatea de Chimie si Inginerie Chimica', 'Cluj', 1, 'Universitatea Babes-Bolyai', 'Stiinte ale naturii', 'chimiecluj.jpg', 0, 'Chimie', 'Chimmie', 'Fizica', 'Matematica', 'Stiinte exacte', 0, '0', 1, 'http://chem.ubbcluj.ro/'),
(6, 'Faculatatea de Istorie UniBuc ', 'Bucuresti', 1, 'UniBuc', 'Filologie', 'default.jpg', 1, 'Istorie', 'Istorie', 'Religie', 'Geografie', 'Istorie', 0, '0', 0, 'https://istorie.unibuc.ro/'),
(8, 'Facultatea de Jurnalism si Stiintele Comunicarii UniBuc', 'Bucuresti', 1, 'UniBuc', 'Stiinte-sociale', 'default.jpg', 1, 'Jurnalism', 'Limba si literatura romana', 'Educatie civica', 'Engleza', 'Stiinte sociale,politica', 1, '1', 0, 'http://www.fjsc.unibuc.ro/'),
(9, 'Facultatea de Limbi si Literaturi Straine UniBuc ', 'Bucuresti', 1, 'Unibuc', 'Filologie', 'default.jpg', 1, 'Limbi straine', 'Engleza', 'Franceza', 'Germana', 'Limbi straine', 1, '0', 0, 'http://lls.unibuc.ro/'),
(10, 'Facultatea de litere UniBuc', 'Bucuresti', 0, 'UniBuc', 'Filologie', 'default.jpg', 1, 'Literatura', 'Limba si literatura romana', 'Engleza', 'Franceza', 'Poezie/Literatura', 1, '0', 1, 'https://unibuc.ro/studii/facultati/facultatea-de-litere/'),
(11, 'Facultatea de Matematica si Informatica UniBuc', 'Bucuresti', 1, 'UniBuc', 'Mate-info', 'default.jpg', 0, 'Matematica', 'Matematica', 'Informatica', 'TIC', 'Stiinte exacte', 0, '0', 1, 'http://fmi.unibuc.ro/ro/'),
(14, 'Facultatea de Farmacie', 'Iasi', 1, 'Universitatea de Medicina si Farmacie \"Grigore T. Popa\", Iasi', 'Stiinte ale naturii', '', 0, 'Medicina', 'Chimie', 'Biologie', 'Fizica', 'Medicina', 1, '0', 0, 'http://www.umfiasi.ro/ro'),
(15, 'Facultatea de Bioinginerie Medicala', 'Iasi', 1, 'Universitatea de Medicina si Farmacie \"Grigore T. Popa\", Iasi', 'Stiinte ale naturii', '', 0, 'Inginerie electrica', 'Fizica', 'Chimie', 'Biologie', 'Tehnica si tehnologie', 0, '0', 0, 'http://www.umfiasi.ro'),
(16, 'Facultatea de Stiinte Socio-Umane si Educatie Fizica si Sport', 'Arad', 1, 'Universitatea de Vest \"Vasile Goldis\"', 'Sportiv', '', 1, 'Sport', 'Limba si literatura romana', 'Biologie', 'Educatie fizica', 'Lifestyle,sport', 1, '1', 0, 'www.socioumaneefs.uvvg.ro'),
(17, 'Facultatea de Stiinte Economice, Informatica si Inginerie', 'Arad', 1, 'Universitatea de Vest \"Vasile Goldis\"', 'Mate-info', '', 0, 'Programare/Calculatoare', 'Informatica', 'Matematica', 'Fizica', 'Tehnica si tehnologie', 1, '0', 1, 'https://www.uvvg.ro/site/admitere/ '),
(18, 'Facultatea de Administratie si Afaceri UniBuc ', 'Bucuresti', 0, 'UniBuc', 'Mate-info', 'default.jpg', 1, 'Business', 'Matematica', 'ATP', 'Economie', 'Business si economie', 1, '0', 1, 'http://faa.ro/index.php'),
(19, 'Facultatea de Drept UniBuc', 'Bucuresti', 1, 'UniBuc', 'Stiinte-sociale', 'default.jpg', 0, 'Drept', 'Educatie civica', 'Limba si literatura romana', 'Sociologie', 'Drept', 1, '0', 1, 'https://drept.unibuc.ro/'),
(20, 'Facultatea de Filozofie UniBuc', 'Bucuresti', 0, 'UniBuc', 'Filologie', 'default.jpg', 1, 'Filozofie', 'Limba si literatura romana', 'Psihologie', 'Istorie', 'Filozofie', 1, '0', 0, 'https://filosofie.unibuc.ro/'),
(21, 'Facultatea de Agricultura USAMV', 'Bucuresti', 0, 'USAMV', 'Stiinte ale naturii', 'default.jpg', 1, 'Agricultura', 'Biologie', 'Chimie', 'Fizica', 'Natura si mediu', 0, '1', 0, 'http://agro-bucuresti.ro/'),
(22, 'Facultatea de Medicina Veterinara USAMV', 'Bucuresti', 1, 'USAMV', 'Stiinte ale naturii', 'default.jpg', 1, 'Animale', 'Biologie', 'Chimie', 'Fizica', 'Biologie', 1, '0', 0, 'http://www.fmvb.ro/'),
(23, 'Facultatea de Inginerie Aerospatiala UPB', 'Bucuresti', 1, 'Universitea Politehnica Bucuresti', 'Mate-info', 'default.jpg', 0, 'Inginerie Aerospatila', 'Matematica', 'Fizica', 'Engleza', 'Limbi straine', 1, '1', 1, 'http://www.aero.pub.ro/wordpress/index.php/ro/acasa/'),
(24, 'Facultatea de Electronica,Telecomunicatii si Tehnologia Informatiei UPB', 'Bucuresti', 1, 'Universitatea Politehnica Bucuresti', 'Mate-info', 'default.jpg', 1, 'Electronica', 'Fizica', 'Informatica', 'TIC', 'Tehnica si tehnologie', 0, '0', 1, 'http://www.electronica.pub.ro/'),
(25, 'Facultatea de Arhitectura UAUIM', 'Bucuresti', 1, 'Universitatea de Arhitectura si Urbanism \"Ion Mincu\"', 'Arhitectura', 'default.jpg', 0, 'Arhitectura', 'Matematica', 'Desen', 'Fizica', 'Arte,tehnica', 0, '0', 1, 'https://www.uauim.ro/facultati/arhitectura/'),
(26, 'Facultatea de Teatru UNATC', 'Bucuresti', 1, 'Universitatea Nationala de Arta Teatrala si Cinematografica \"I.L. Caragiale\"', 'Actorie', 'default.jpg', 1, 'Actorie', 'Limba si literatura romana', 'Psihologie', 'Sociologie', 'Teatru', 1, '1', 0, 'https://www.unatc.ro/teatru/index.php'),
(27, 'Facultatea de Film-Regie UNATC', 'Bucuresti', 0, 'Universitatea Nationala de Arta Teatrala si Cinematografica \"I.L. Caragiale\"', 'Actorie', 'default.jpg', 1, 'Regie', 'Limba si literatura romana', 'Psihologie', 'Sociologie', 'Arte,tehnica', 1, '0', 1, 'https://www.unatc.ro/prezentare/index.php'),
(28, 'Facultatea de Film-Multimedia UNATC', 'Bucuresti', 0, 'Universitatea Nationala de Arta Teatrala si Cinematografica \"I.L. Caragiale\"', 'Mate-info', 'default.jpg', 1, 'Editare video/sunet', 'TIC', 'Psihologie', 'Sociologie', 'Tehnica si tehnologie', 1, '0', 0, 'https://www.unatc.ro/prezentare/index.php'),
(29, 'Facultatea de Film-Animatie UNATC', 'Bucuresti', 0, 'Universitatea Nationala de Arta Teatrala si Cinematografica \"I.L. Caragiale\"', 'Filologie', 'default.jpg', 1, 'Desen', 'Desen', 'Psihologie', 'Sociologie', 'Arte,tehnica', 0, '0', 0, 'https://www.unatc.ro/prezentare/index.php');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite`
--

CREATE TABLE `favorite` (
  `id_favorite` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `index_college` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `favorite`
--

INSERT INTO `favorite` (`id_favorite`, `id_user`, `index_college`) VALUES
(1, 1, 3),
(23, 2, 9),
(24, 2, 1),
(25, 2, 8),
(26, 2, 2),
(27, 2, 11),
(30, 6, 8);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `reset`
--

CREATE TABLE `reset` (
  `id_reset` int(11) NOT NULL,
  `mail_reset` text NOT NULL,
  `select_reset` longtext NOT NULL,
  `token_reset` longtext NOT NULL,
  `expire_reset` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `reset`
--

INSERT INTO `reset` (`id_reset`, `mail_reset`, `select_reset`, `token_reset`, `expire_reset`) VALUES
(4, 'robertplaiasu03@gmail.com', '3b08216cabac5c34a62c5bf8', '$2y$10$18LiMEINSxpAf9wui0MAN.0RplSf19suOgp58Asi8yNG8ok3Fhk9O', '1588684994');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` text NOT NULL,
  `first_name_user` text NOT NULL,
  `mail_user` text NOT NULL,
  `type_user` text DEFAULT NULL,
  `pwd_user` longtext DEFAULT NULL,
  `profil_user` text DEFAULT NULL,
  `passion_user` text DEFAULT NULL,
  `passion_intensity_user` int(1) DEFAULT NULL,
  `job_user` int(1) DEFAULT NULL,
  `subject1_user` varchar(64) DEFAULT NULL,
  `subject2_user` varchar(64) DEFAULT NULL,
  `subject3_user` varchar(64) DEFAULT NULL,
  `books_user` varchar(64) DEFAULT NULL,
  `social_user` int(1) DEFAULT NULL,
  `sport_user` int(1) DEFAULT NULL,
  `stress_user` int(1) DEFAULT NULL,
  `county_user` text DEFAULT NULL,
  `picture_user` text DEFAULT '\'UserDefault.jpg\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `first_name_user`, `mail_user`, `type_user`, `pwd_user`, `profil_user`, `passion_user`, `passion_intensity_user`, `job_user`, `subject1_user`, `subject2_user`, `subject3_user`, `books_user`, `social_user`, `sport_user`, `stress_user`, `county_user`, `picture_user`) VALUES
(1, 'Grigorescu', 'Alexandru', 'grigorescu.aleex@gmail.com', '', '$2y$10$I6urXCEv4Klu7uMza1J9vejKMVVSJcoqZdFXTPRaFLfuTANTbZNZm', 'Mate-info', 'Programare/Calculatoare', 5, 0, 'Matematica', 'Fizica', 'TIC', 'Psihologie', 0, 0, 0, 'Prahova', 'UserDefault.jpg'),
(6, 'Nume', 'Robert', 'robertplaiasu03@gmail.com', '', '$2y$10$uJ2AnpXLNXq3Uenquyf3DurigB7ISuaGjWsaxdIlGrvN3OIoXAKpG', 'Teologic', 'Religie', 5, 1, 'Religie', 'Muzica', 'Istorie', 'Religie', 1, 0, 0, 'Cluj', 'UserDefault.jpg'),
(7, 'Nume', 'Robert', 'vasileplaiasu@yahoo.com', '', '$2y$10$9EgfbaDnHicSnfAGUmET/Ol2YnVtB1WkOZNMJRD0.3w0ALvm09T22', 'Mate-info', 'Programare/Calculatoare', 5, 0, 'Matematica', 'Informatica', 'TIC', 'Istorie', 1, 0, 1, 'Prahova', 'UserDefault.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users_verification`
--

CREATE TABLE `users_verification` (
  `id_verification` int(11) NOT NULL,
  `name_verification` text NOT NULL,
  `first_name_verification` varchar(64) NOT NULL,
  `mail_verification` text NOT NULL,
  `pwd_verification` longtext NOT NULL,
  `select_verification` longtext NOT NULL,
  `token_verification` longtext NOT NULL,
  `expire_verification` int(32) NOT NULL,
  `verificare` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users_verification`
--

INSERT INTO `users_verification` (`id_verification`, `name_verification`, `first_name_verification`, `mail_verification`, `pwd_verification`, `select_verification`, `token_verification`, `expire_verification`, `verificare`) VALUES
(1, 'Nume', 'Robert', 'robertplaiasu03@gmail.com', '$2y$10$uJ2AnpXLNXq3Uenquyf3DurigB7ISuaGjWsaxdIlGrvN3OIoXAKpG', '3ff6a069d63330bfe06cacba', '$2y$10$tZs06egu/bbkBQ2dmFvhT.fSDA9RWBm6wcafRTxqPPhosZrYSI8PG', 1586774491, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`index_college`);

--
-- Indexuri pentru tabele `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_favorite`);

--
-- Indexuri pentru tabele `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`id_reset`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexuri pentru tabele `users_verification`
--
ALTER TABLE `users_verification`
  ADD PRIMARY KEY (`id_verification`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `college`
--
ALTER TABLE `college`
  MODIFY `index_college` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pentru tabele `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_favorite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pentru tabele `reset`
--
ALTER TABLE `reset`
  MODIFY `id_reset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `users_verification`
--
ALTER TABLE `users_verification`
  MODIFY `id_verification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

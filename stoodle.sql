-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 03, 2020 la 07:01 PM
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
(2, '$2y$10$NQxxNvU3ulkF7TT1XqdUr.931btky4ezf0vArnh.IGoposrajjwv2', '06c939c57218bf2aedf542c95a5ba3f4776b000c1922873d', 6, 1590968644),
(5, '$2y$10$qZFyTeHPN2bVXV9mnbH8WejhzmqQHd27OHDXQpr9R7BmKLDiH3J4G', 'af340feaf43d1adc68d29e905712ce81bdf348b0bbd14d64', 1, 1591113640);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `facultati`
--

CREATE TABLE `facultati` (
  `Indexf` int(11) NOT NULL,
  `Numef` text DEFAULT NULL,
  `Judet` tinytext DEFAULT NULL,
  `Examenadmi` tinyint(1) DEFAULT NULL,
  `Universitatea` varchar(256) DEFAULT NULL,
  `Profil` text DEFAULT NULL,
  `Poza` text DEFAULT NULL,
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
(7, 'Facultatea de Medicină', 'Iasi', 1, 'Universitatea de Medicină și Farmacie \"Grigore T. Popa\", Iași', 'Stiinte ale naturii', 'default.jpg', 0, 'Medicina', 'Matematica', 'Chimie', 'Biologie', 'Medicina', 1, '1', 1, 'http://www.umfiasi.ro/'),
(8, 'Facultatea de Fizică', 'Bucuresti', 1, 'Universitatea din București', 'Mate-info', 'default.jpg', 0, 'Fizica', 'Matematica', 'Fizica', 'Chimie', 'Stiinte exacte', 0, '0', 0, 'http://www.fizica.unibuc.ro/Fizica/Main.php'),
(9, 'Facultatea de Istorie', 'Bucuresti', 1, 'Universitatea din București', 'Filologie', 'default.jpg', 1, 'Istorie', 'Istorie', 'Educatie civica', 'Geografie', 'Istorie', 0, '0', 0, 'https://istorie.unibuc.ro/admitere2019/admitere-master/');

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
(1, 1, 3, 'normal');

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
  `Profil` text DEFAULT NULL,
  `Domeniu` text DEFAULT NULL,
  `domeniu_intensitate` int(1) DEFAULT NULL,
  `job` int(1) DEFAULT NULL,
  `materie1` varchar(64) DEFAULT NULL,
  `materie2` varchar(64) DEFAULT NULL,
  `materie3` varchar(64) DEFAULT NULL,
  `carti` varchar(64) DEFAULT NULL,
  `sociabil` int(1) DEFAULT NULL,
  `sport` varchar(64) DEFAULT NULL,
  `stres` int(1) DEFAULT NULL,
  `Judet` text DEFAULT NULL,
  `PozaUser` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`idUser`, `Nume`, `Prenume`, `mailUser`, `pwdUsers`, `Profil`, `Domeniu`, `domeniu_intensitate`, `job`, `materie1`, `materie2`, `materie3`, `carti`, `sociabil`, `sport`, `stres`, `Judet`, `PozaUser`) VALUES
(1, 'Grigorescu', 'Alexandru', 'grigorescu.aleex@gmail.com', '$2y$10$I6urXCEv4Klu7uMza1J9vejKMVVSJcoqZdFXTPRaFLfuTANTbZNZm', 'Mate-info', 'Programare/Calculatoare', 5, 0, 'Matematica', 'Fizica', 'TIC', 'Psihologie', 0, 'Da', 0, 'Prahova', 'UserDefault.jpg'),
(6, 'Nume', 'Robert', 'robertplaiasu03@gmail.com', '$2y$10$uJ2AnpXLNXq3Uenquyf3DurigB7ISuaGjWsaxdIlGrvN3OIoXAKpG', 'Filologie', 'Drept', 4, 0, 'Muzica', 'Economie', 'Educatie civica', 'Psihologie', 0, 'Nu', 0, 'Dambovita', 'UserDefault.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `facultati`
--
ALTER TABLE `facultati`
  MODIFY `Indexf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `resetare`
--
ALTER TABLE `resetare`
  MODIFY `idReset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `users_gmail`
--
ALTER TABLE `users_gmail`
  MODIFY `idGmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `users_verificare`
--
ALTER TABLE `users_verificare`
  MODIFY `idVerificare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

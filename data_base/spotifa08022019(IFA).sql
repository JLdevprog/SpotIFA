-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 fév. 2019 à 07:36
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `spotifa`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `release_date` date NOT NULL,
  `id_artist` int(11) NOT NULL,
  PRIMARY KEY (`id_album`),
  KEY `IDARTISTALBUM` (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id_album`, `name`, `release_date`, `id_artist`) VALUES
(2, 'Nothing but the Beat', '2011-08-26', 9),
(3, 'True', '2016-09-16', 10),
(4, 'Bylaw', '2018-10-19', 11),
(5, '7', '2018-09-14', 9);

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id_artist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` date NOT NULL,
  PRIMARY KEY (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id_artist`, `name`, `gender`, `age`) VALUES
(9, 'David Guetta', 'Male', '1967-11-07'),
(10, 'Avicii', 'Male', '1989-09-08'),
(11, 'Martin Garrix', 'Male', '1996-05-14'),
(12, 'Miss K8', 'Female', '2000-01-01'),
(13, 'Frankie Wilde', 'Male', '1980-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `creation_date` date NOT NULL,
  `#ref_user` int(11) NOT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `REFUSER` (`#ref_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `playlist_content`
--

DROP TABLE IF EXISTS `playlist_content`;
CREATE TABLE IF NOT EXISTS `playlist_content` (
  `#id_playlist` int(11) NOT NULL,
  `#id_song` int(11) NOT NULL,
  KEY `IDPLAYLIST` (`#id_playlist`),
  KEY `IDSONG` (`#id_song`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id_song` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `release_date` date NOT NULL,
  `id_artist` int(11) DEFAULT NULL,
  `id_album` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_song`),
  KEY `IDALBUM` (`id_album`),
  KEY `IDARTIST` (`id_artist`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id_song`, `name`, `release_date`, `id_artist`, `id_album`) VALUES
(2, 'Turn me On', '2011-12-14', 9, 2),
(3, '2 U', '2017-06-09', 9, 5),
(4, 'Bad', '2014-03-17', 9, NULL),
(5, 'Wake me up!', '2016-09-16', 10, 3),
(6, 'You Make me', '2016-09-16', 10, 3),
(7, 'Hey Brother', '2016-09-16', 10, 3),
(8, 'Addicted to you', '2016-09-16', 10, 3),
(9, 'Dear Boy', '2016-09-16', 10, 3),
(10, 'Liar liar', '2016-09-16', 10, 3),
(11, 'Shame on me', '2016-09-16', 10, 3),
(12, 'Lay me down', '2016-09-16', 10, 3),
(13, 'Hope there\'s Someone', '2016-09-16', 10, 3),
(14, 'Heart upon my sleeve', '2016-09-16', 10, 3),
(15, 'All you need is Love', '2016-09-16', 10, 3),
(16, 'Always on the run', '2016-09-16', 10, 3),
(17, 'Canyons', '2016-09-16', 10, 3),
(18, 'Edom', '2016-09-16', 10, 3),
(19, 'Long Road to Hell', '2016-09-16', 10, 3),
(20, 'Levels', '2016-09-16', 10, 3),
(21, 'Flames', '2019-02-05', 9, NULL),
(22, 'Where them girls at', '2011-05-02', 9, 2),
(23, 'Little Bad girl', '2011-06-27', 9, 2),
(24, 'Sweat', '2011-03-04', 9, 2),
(25, 'Without You', '2011-09-27', 9, 2),
(26, 'Nothing really matters', '2011-06-12', 9, 2),
(27, 'I can only Imagine', '2011-05-04', 9, 2),
(28, 'Crank it up', '2011-06-12', 9, 2),
(29, 'I just Wanna F***', '2011-06-12', 9, 2),
(30, 'Night of your Life', '2011-06-12', 9, 2),
(31, 'Repeat', '2011-06-12', 9, 2),
(32, 'Titanium', '2011-12-09', 9, 2),
(33, 'Halucin8', '2012-05-07', 12, NULL),
(34, 'Animals', '2013-06-01', 11, NULL),
(35, 'Breach', '2018-10-15', 11, 4),
(36, 'Yottabyte', '2018-10-16', 11, 4),
(37, 'Latency', '2018-10-17', 11, 4),
(38, 'Access', '2018-10-18', 11, 4),
(39, 'Waiting For Tomorrow', '2018-10-19', 11, 4),
(40, 'Don\'t Leave me alone', '2018-09-14', 9, 5),
(41, 'Battle ', '2018-09-14', 9, 5),
(42, '	Flames ', '2018-09-14', 9, 5),
(43, 'Blame It on Love', '2018-09-14', 9, 5),
(44, 'Say My Name', '2018-09-14', 9, 5),
(45, 'Goodbye', '2018-09-14', 9, 5),
(46, 'I\'m That Bitch', '2018-09-14', 9, 5),
(47, 'Like I do', '2018-09-14', 9, 5),
(48, 'She Knows How to Love Me ', '2018-09-14', 9, 5),
(49, 'Motto ', '2018-09-14', 9, 5),
(50, 'Drive  ', '2018-09-14', 9, 5),
(51, 'Para Que Te Quedes', '2018-09-14', 9, 5),
(52, 'Let It Be Me', '2018-09-14', 9, 5),
(53, 'Light Headed ', '2018-09-14', 9, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ref_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`ref_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ref_user`, `username`, `mail`, `address`, `phone`, `password`) VALUES
(1, 'Admin', 'Admin@mail.com', '1 Worlwide Street, Earth', '102030405', 'Admin.123'),
(2, 'User', 'user@mail.com', '123 street, World', '102030405', '123'),
(3, 'User1', 'user@mail.com', '123 street, World', '102030405', '12345'),
(4, 'J.L.devprog', 'J.L.devprog@gmail.com', 'Street, 57000 Metz', '102030405', 'Admin.123'),
(5, 'Try', '@', 'Str', '1', '123'),
(6, 'Other', '@', '1', '2', '3'),
(7, '1', '2', '3', '4', '5'),
(8, 'O', '@', '1', '2', '3'),
(9, 'A', 'b@', 'c', '0', '1'),
(10, 'User', 'user@mail.com', '123, street', '908070605', '456'),
(11, 'test', '@', '1', '2', '3'),
(12, '', '', '', '', ''),
(13, '', '', '', '', ''),
(14, '', '', '', '', ''),
(15, '1', '2', '3', '4', '5'),
(16, 'John', 'Legend@mail.com', 'USA', '0908070605', '789');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `IDARTISTALBUM` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id_artist`);

--
-- Contraintes pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `REFUSER` FOREIGN KEY (`#ref_user`) REFERENCES `users` (`ref_user`);

--
-- Contraintes pour la table `playlist_content`
--
ALTER TABLE `playlist_content`
  ADD CONSTRAINT `IDPLAYLIST` FOREIGN KEY (`#id_playlist`) REFERENCES `playlists` (`id_playlist`),
  ADD CONSTRAINT `IDSONG` FOREIGN KEY (`#id_song`) REFERENCES `playlists` (`id_playlist`);

--
-- Contraintes pour la table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `IDALBUM` FOREIGN KEY (`id_album`) REFERENCES `albums` (`id_album`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 fév. 2019 à 15:49
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
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id_artist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` date NOT NULL,
  PRIMARY KEY (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id_artist`, `name`, `gender`, `age`) VALUES
(9, 'David Guetta', 'Male', '1967-11-07'),
(10, 'Avicii', 'Male', '1989-09-08');

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
  `id_artist` int(11) NOT NULL,
  PRIMARY KEY (`id_song`),
  KEY `IDARTIST` (`id_artist`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id_song`, `name`, `release_date`, `id_artist`) VALUES
(2, 'Turn me On', '2011-12-14', 9),
(3, '2 U', '2017-06-09', 9),
(4, 'Bad', '2014-03-17', 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ref_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(80) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`ref_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

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
  ADD CONSTRAINT `IDARTIST` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id_artist`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

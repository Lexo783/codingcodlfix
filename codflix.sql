-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 juil. 2020 à 15:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `codflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `genre_name`) VALUES
(1, 'Horreur'),
(2, 'Humour'),
(3, 'Animation'),
(4, 'suspense');

-- --------------------------------------------------------

--
-- Structure de la table `historic`
--

DROP TABLE IF EXISTS `historic`;
CREATE TABLE IF NOT EXISTS `historic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `finish_date` date NOT NULL,
  `watch_duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historic_media_movie`
--

DROP TABLE IF EXISTS `historic_media_movie`;
CREATE TABLE IF NOT EXISTS `historic_media_movie` (
  `historic_id` int(11) NOT NULL,
  `media_movie_id` int(11) NOT NULL,
  PRIMARY KEY (`historic_id`,`media_movie_id`),
  KEY `IDX_937B1F6352F34864` (`historic_id`),
  KEY `IDX_937B1F6380F2984E` (`media_movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historic_users`
--

DROP TABLE IF EXISTS `historic_users`;
CREATE TABLE IF NOT EXISTS `historic_users` (
  `historic_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`historic_id`,`users_id`),
  KEY `IDX_5E4CFB8B52F34864` (`historic_id`),
  KEY `IDX_5E4CFB8B67B3B43D` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_movie`
--

DROP TABLE IF EXISTS `media_movie`;
CREATE TABLE IF NOT EXISTS `media_movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_movie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watch_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_movie`
--

INSERT INTO `media_movie` (`id`, `title`, `status`, `release_date`, `summary`, `trailer_url`, `short_summary`, `id_movie`, `watch_duration`) VALUES
(1, 'Les Indestructibles', 'publié', '2015-12-04', 'Bob Paar était jadis l\'un des plus grands super-héros de la planète. Tout le monde connaissait \"Mr. Indestructible\", le héros qui, chaque jour, sauvait des centaines de vies et combattait le mal. Mais aujourd\'hui, Mr. Indestructible est un petit expert en assurances qui n\'affronte plus que l\'ennui et un tour de taille en constante augmentation.\r\nContraint de raccrocher son super costume quinze ans plus tôt à la suite d\'une série de\r\nlois ineptes, Bob et sa femme, Hélène, ex-Elastigirl, sont rentrés dans le rang et s\'efforcent de mener une vie normale avec leurs trois enfants.\r\nRongeant son frein, rêvant de repasser à l\'action, Bob bondit sur l\'occasion lorsqu\'une mystérieuse convocation l\'appelle sur une île lointaine pour une mission top-secret. Il va découvrir que derrière cette alléchante proposition, se cache un génie malfaisant avide de\r\nvengeance et de destruction.', 'https://www.youtube-nocookie.com/embed/Bq6NGtlHdb4', 'Bob Paar était jadis l\'un des plus grands super-héros de la planète. Tout le monde connaissait \"Mr. Indestructible\"', 'Bq6NGtlHdb4', '00:00.43'),
(2, 'Les Indestructibles 2', 'publié', '2018-04-13', 'Cet été, il est temps de se remettre au boulot ! Découvrez la bande-annonce officielle du film Les Indestructibles 2 !', 'https://www.youtube-nocookie.com/embed/sXsr_7Una_A', 'Cet été, il est temps de se remettre au boulot ! Découvrez la bande-annonce officielle du film Les Indestructibles 2 !', 'sXsr_7Una_A', '00:02:18');

-- --------------------------------------------------------

--
-- Structure de la table `media_movie_genre`
--

DROP TABLE IF EXISTS `media_movie_genre`;
CREATE TABLE IF NOT EXISTS `media_movie_genre` (
  `media_movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`media_movie_id`,`genre_id`),
  KEY `IDX_A7A5BF780F2984E` (`media_movie_id`),
  KEY `IDX_A7A5BF74296D31F` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_movie_genre`
--

INSERT INTO `media_movie_genre` (`media_movie_id`, `genre_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `media_series`
--

DROP TABLE IF EXISTS `media_series`;
CREATE TABLE IF NOT EXISTS `media_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `short_summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watch_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_86699BF34EC001D1` (`season_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media_series`
--

INSERT INTO `media_series` (`id`, `season_id`, `title`, `number`, `media_url`, `release_date`, `short_summary`, `id_series`, `watch_duration`, `summary`) VALUES
(1, 1, 'HAZBIN HOTEL (PILOT) - FRENCH DUB', 1, 'https://www.youtube-nocookie.com/embed/jFPYDneq29g', '2020-05-08', '\r\nSuivez Charlie, la Princesse de l\'Enfer', '1', '00:31:53', 'Suivez Charlie, la Princesse de l\'Enfer, alors qu\'elle poursuit son rêve impossible d\'offrir aux démons la possibilité de se repentir afin de réduire la surpopulation de son royaume pacifiquement.'),
(2, 2, 'LE DÉPARTEMENT #1 Se présenter', 1, 'https://www.youtube-nocookie.com/embed/3b_vTuxEL-I', '2016-07-22', 'LE DÉPARTEMENT décline toute responsabilité en cas de digestion douloureuse lors du visionnage de cet épisode, et vous invite à prendre rendez vous avec votre téléviseur, tous les dimanches sur CANAL+ à 12h20. \r\n', '2', '00:02:31', 'LE DÉPARTEMENT décline toute responsabilité en cas de digestion douloureuse lors du visionnage de cet épisode, et vous invite à prendre rendez vous avec votre téléviseur, tous les dimanches sur CANAL+ à 12h20. '),
(7, 2, 'LE DÉPARTEMENT #2 Faire des cafés', 2, 'https://www.youtube-nocookie.com/embed/BwTFGgHI0tw', '2016-07-29', 'LE DÉPARTEMENT s\'engage à photocopier tous vos cafés allongés en  format A4 recto verso. \r\n\r\nÀ TOUS NOS ABONNÉS, nous savons que cette vidéo reste un re-upload de la saison dernière. Et nous tenons à nous récurer d\'avance pour la graine occasionnée. ', '2', '00:02:18', 'LE DÉPARTEMENT s\'engage à photocopier tous vos cafés allongés en  format A4 recto verso. \r\n\r\nÀ TOUS NOS ABONNÉS, nous savons que cette vidéo reste un re-upload de la saison dernière. Et nous tenons à nous récurer d\'avance pour la graine occasionnée. '),
(8, 2, 'LE DÉPARTEMENT #3 Aider un collègue (feat Kemar)', 3, 'https://www.youtube-nocookie.com/embed/KqkuOqRQ-4g', '2016-08-06', 'Attention, cette vidéo donne le vertige et le... AAAAAAaaaaaaaa\r\n\r\nÀ TOUS NOS ABONNÉS, nous savons que cette vidéo reste un re-upload de la saison dernière. Et nous tenons à nous récurer d\'avance pour la graine occasionnée. ', '2', '00:02:20', 'LE DÉPARTEMENT s\'engage à photocopier tous vos cafés allongés en  format A4 recto verso. \r\n\r\nÀ TOUS NOS ABONNÉS, nous savons que cette vidéo reste un re-upload de la saison dernière. Et nous tenons à nous récurer d\'avance pour la graine occasionnée. '),
(9, 3, 'NOOB : MAKING OF JEU VIDÉO - part 1 - Zoom sur le studio Blackpixel', 1, 'https://www.youtube-nocookie.com/embed/03Qk5Vm56PU', '2019-09-19', 'Voici la 1ere partie du making of du jeu vidéo NOOB ! Merci à Pierre Zecchini pour le montage, à l\'équipe du studio Blackpixel pour sa disponibilité et à l\'école Créajeux pour son accueil toujours au top !', '3', '00:07:35', 'Voici la 1ere partie du making of du jeu vidéo NOOB ! Merci à Pierre Zecchini pour le montage, à l\'équipe du studio Blackpixel pour sa disponibilité et à l\'école Créajeux pour son accueil toujours au top !'),
(10, 3, 'NOOB : MAKING OF JEU VIDÉO - part 2 - Pixellisation du monde d\'Olydri', 2, 'https://www.youtube-nocookie.com/embed/VBidPcUlzuM', '2019-09-19', 'Voici la 1ere partie du making of du jeu vidéo NOOB ! Merci à Pierre Zecchini pour le montage, à l\'équipe du studio Blackpixel pour sa disponibilité et à l\'école Créajeux pour son accueil toujours au top !', '3', '00:06:26', 'Voici la 1ere partie du making of du jeu vidéo NOOB ! Merci à Pierre Zecchini pour le montage, à l\'équipe du studio Blackpixel pour sa disponibilité et à l\'école Créajeux pour son accueil toujours au top !');

-- --------------------------------------------------------

--
-- Structure de la table `media_series_genre`
--

DROP TABLE IF EXISTS `media_series_genre`;
CREATE TABLE IF NOT EXISTS `media_series_genre` (
  `media_series_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`media_series_id`,`genre_id`),
  KEY `IDX_9F2E7D6977188212` (`media_series_id`),
  KEY `IDX_9F2E7D694296D31F` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200623113424', '2020-07-08 14:24:33'),
('20200623115325', '2020-07-08 14:24:33'),
('20200623140736', '2020-07-08 14:24:33'),
('20200623213232', '2020-07-08 14:24:33'),
('20200623214925', '2020-07-08 14:24:33'),
('20200623215132', '2020-07-08 14:24:33'),
('20200623215512', '2020-07-08 14:24:34'),
('20200623215807', '2020-07-08 14:24:34'),
('20200623215938', '2020-07-08 14:24:34'),
('20200623220259', '2020-07-08 14:24:34'),
('20200623220757', '2020-07-08 14:24:34'),
('20200623221501', '2020-07-08 14:24:34'),
('20200623222159', '2020-07-08 14:24:34'),
('20200623222558', '2020-07-08 14:24:35'),
('20200623222857', '2020-07-08 14:24:35'),
('20200623223207', '2020-07-08 14:24:35'),
('20200624113244', '2020-07-08 14:24:35'),
('20200624160043', '2020-07-08 14:24:35'),
('20200624161256', '2020-07-08 14:24:35'),
('20200624161535', '2020-07-08 14:24:35'),
('20200625061307', '2020-07-08 14:24:35'),
('20200625065308', '2020-07-08 14:24:35'),
('20200625161145', '2020-07-08 14:24:35'),
('20200625161609', '2020-07-08 14:24:35'),
('20200625161714', '2020-07-08 14:24:35'),
('20200625165632', '2020-07-08 14:24:35'),
('20200625172307', '2020-07-08 14:24:35'),
('20200625173437', '2020-07-08 14:24:35'),
('20200625173940', '2020-07-08 14:24:36');

-- --------------------------------------------------------

--
-- Structure de la table `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `series_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F0E45BA95278319C` (`series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `season`
--

INSERT INTO `season` (`id`, `series_id`, `number`, `release_date`, `title`) VALUES
(1, 1, 1, '2020-05-08', 'Hazbin Hotel'),
(2, 2, 1, '2016-09-22', 'Le département saison 1'),
(3, 3, 1, '2019-01-31', 'NOOB : MAKING OF JEU VIDÉO - part 1 - Zoom sur le studio Blackpixel');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `idimg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `title`, `summary`, `status`, `release_date`, `idimg`, `short_summary`) VALUES
(1, 'Hazbin Hotel', 'LE PILOTE D\'HAZBIN HOTEL DÉBARQUE EN FRANÇAIS !\r\n\r\nSuivez Charlie, la Princesse de l\'Enfer, alors qu\'elle poursuit son rêve impossible d\'offrir aux démons la possibilité de se repentir afin de réduire la surpopulation de son royaume pacifiquement. Après une purge annuelle imposée par les Anges, elle ouvre son hôtel dans l\'espoir que ses résidents y trouvent le chemin du paradis. Tandis que la majorité de l\'enfer se moque d\'elle, sa partenaire dévouée Vaggie et leur premier cobaye, la star du film pour adultes Angel Dust, se tiennent à ses côtés pour soutenir son projet. Lorsqu\'une puissante entité connue sous le nom du \"Démon de la Radio\" vient à la rencontre de Charlie pour lui proposer son aide, elle y voit la chance de réaliser son rêve fou.\r\n\r\nBien que cartoonesque, ce dessin animé ne s’adresse pas aux jeunes enfants. Vous êtes prévenus !\r\n\r\nNous tenons à remercier Vivziepop et son équipe pour leur aide, pour nous avoir permis de doubler Hazbin Hotel et de publier la version francophone sur sa chaîne.\r\n\r\nNous remercions toute notre équipe, nos comédiens, chanteurs, aides à la gestion, sound-designers et illustratrices. Merci infiniment pour votre investissement, votre motivation et votre énergie dans cette aventure. Nous sommes fiers de vous ! Merci d\'avoir rendu ce projet possible ! Nous vous faisons de gros câlins de la part de la directrice et de la co-directrice du projet.\r\n\r\nEt enfin, un IMMENSE merci à vous tous, chers fans d\'Hazbin Hotel, francophones ou non, de nous avoir suivi, soutenu, ou de tout simplement nous laisser la chance de vous faire découvrir notre travail.', 'publié', '2020-05-08', 'jFPYDneq29g', 'Suivez Charlie, la Princesse de l\'Enfer, alors qu\'elle poursuit son rêve impossible d\'offrir aux démons la possibilité de se repentir'),
(2, 'Le département', 'LE DÉPARTEMENT décline toute responsabilité en cas de digestion douloureuse lors du visionnage de cet épisode, et vous invite à prendre rendez vous avec votre téléviseur, tous les dimanches sur CANAL+ à 12h20. \r\n\r\nOYÉ OYÉ ! Pour ceux qui auraient suivi LE DÉPARTEMENT la saison dernière, pas de panique, les épisodes inédits commencent à partir du #4 !\r\n\r\nINERNET est une chaîne youtube absurde contenant des vidéos à l’humour absurde et à forte tendance WTF et surtout absurde et WTF et chaîne youtube.', 'publié', '2016-09-22', '3b_vTuxEL-I', 'LE DÉPARTEMENT décline toute responsabilité en cas de digestion douloureuse'),
(3, 'NOOB : MAKING OF JEU VIDÉO - part 1 - Zoom sur le studio Blackpixel', 'Voici la 1ere partie du making of du jeu vidéo NOOB ! Merci à Pierre Zecchini pour le montage, à l\'équipe du studio Blackpixel', 'publié', '2019-01-31', 'wXARUONG7hg', 'Voici la 1ere partie du making of du jeu vidéo NOOB !');

-- --------------------------------------------------------

--
-- Structure de la table `series_genre`
--

DROP TABLE IF EXISTS `series_genre`;
CREATE TABLE IF NOT EXISTS `series_genre` (
  `series_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`series_id`,`genre_id`),
  KEY `IDX_F6DFD7E55278319C` (`series_id`),
  KEY `IDX_F6DFD7E54296D31F` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series_genre`
--

INSERT INTO `series_genre` (`series_id`, `genre_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
(1, 'coding@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$QzRUU3gyUEQyekZqQkRhVQ$9ngzZLVKPNeSyD64ixrJYwsWXcYKTL3uPPn/C3X6czo', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historic_media_movie`
--
ALTER TABLE `historic_media_movie`
  ADD CONSTRAINT `FK_937B1F6352F34864` FOREIGN KEY (`historic_id`) REFERENCES `historic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_937B1F6380F2984E` FOREIGN KEY (`media_movie_id`) REFERENCES `media_movie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historic_users`
--
ALTER TABLE `historic_users`
  ADD CONSTRAINT `FK_5E4CFB8B52F34864` FOREIGN KEY (`historic_id`) REFERENCES `historic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5E4CFB8B67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `media_movie_genre`
--
ALTER TABLE `media_movie_genre`
  ADD CONSTRAINT `FK_A7A5BF74296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A7A5BF780F2984E` FOREIGN KEY (`media_movie_id`) REFERENCES `media_movie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `media_series`
--
ALTER TABLE `media_series`
  ADD CONSTRAINT `FK_86699BF34EC001D1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);

--
-- Contraintes pour la table `media_series_genre`
--
ALTER TABLE `media_series_genre`
  ADD CONSTRAINT `FK_9F2E7D694296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9F2E7D6977188212` FOREIGN KEY (`media_series_id`) REFERENCES `media_series` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `FK_F0E45BA95278319C` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`);

--
-- Contraintes pour la table `series_genre`
--
ALTER TABLE `series_genre`
  ADD CONSTRAINT `FK_F6DFD7E54296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F6DFD7E55278319C` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

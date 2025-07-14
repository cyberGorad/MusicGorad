-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 02:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(6) UNSIGNED NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `commentaire`, `date`) VALUES
(82, 'alifera', '', '2024-05-07 10:33:38'),
(83, 'alifera', 'test', '2024-05-07 10:33:46');

-- --------------------------------------------------------

--
-- Structure de la table `images_files`
--

CREATE TABLE `images_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images_files`
--

INSERT INTO `images_files` (`id`, `file_name`, `file_path`) VALUES
(1, 'courbe.jpg', 'upload/courbe.jpg'),
(2, 'matrix.jpg', 'upload/matrix.jpg'),
(3, 'virus.png', 'upload/virus.png'),
(4, 'multi-screen.jpg', 'upload/multi-screen.jpg'),
(5, 'i_can.jpg', 'upload/i_can.jpg'),
(6, 'masque.jpg', 'upload/masque.jpg'),
(7, 'kali.jpg', 'upload/kali.jpg'),
(8, 'failure.png', 'upload/failure.png');

-- --------------------------------------------------------

--
-- Structure de la table `mp3_files`
--

CREATE TABLE `mp3_files` (
  `id` int(6) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mp3_files`
--

INSERT INTO `mp3_files` (`id`, `file_name`, `file_path`) VALUES
(1, 'alan_walker_sabrina_carpenter_amp_farruko_on_my_way_mp3_10973.mp3', 'upload/alan_walker_sabrina_carpenter_amp_farruko_on_my_way_mp3_10973.mp3'),
(2, 'alan_walker_ruben_heading_home_official_music_video_mp3_67638.mp3', 'upload/alan_walker_ruben_heading_home_official_music_video_mp3_67638.mp3'),
(3, 'illenium_and_tori_kelly_blame_myself_official_audio_mp3_69292.mp3', 'upload/illenium_and_tori_kelly_blame_myself_official_audio_mp3_69292.mp3'),
(4, 'porter_robinson_musician_official_music_video_mp3_70251.mp3', 'upload/porter_robinson_musician_official_music_video_mp3_70251.mp3'),
(5, 'alan_walker_sing_me_to_sleep_mp3_65605.mp3', 'upload/alan_walker_sing_me_to_sleep_mp3_65605.mp3'),
(6, 'alan_walker_whisper_new_song_2020_mp3_72754.mp3', 'upload/alan_walker_whisper_new_song_2020_mp3_72754.mp3'),
(8, 'martin_garrix_bebe_rexha_in_the_name_of_love_official_video_mp3_68190.mp3', 'upload/martin_garrix_bebe_rexha_in_the_name_of_love_official_video_mp3_68190.mp3'),
(9, 'powfu_death_bed_lyrics_mp3_59379.mp3', 'upload/powfu_death_bed_lyrics_mp3_59379.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(6) UNSIGNED NOT NULL,
  `nom_utilisateurs` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateurs`, `email`, `mot_de_passe`) VALUES
(7, 'admin', 'admin@gmail.com', '4de93544234adffbb681ed60ffcfb941');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images_files`
--
ALTER TABLE `images_files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mp3_files`
--
ALTER TABLE `mp3_files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `images_files`
--
ALTER TABLE `images_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `mp3_files`
--
ALTER TABLE `mp3_files`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

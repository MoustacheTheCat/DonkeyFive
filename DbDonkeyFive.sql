-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 27 nov. 2023 à 16:35
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `donkeyFive`
--
CREATE DATABASE IF NOT EXISTS `donkeyFive` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `donkeyFive`;

-- --------------------------------------------------------

--
-- Structure de la table `centers`
--

CREATE TABLE `centers` (
  `centerId` int(11) NOT NULL,
  `centerName` varchar(100) DEFAULT NULL,
  `centerCity` varchar(100) DEFAULT NULL,
  `centerAdress` varchar(100) DEFAULT NULL,
  `centerZip` varchar(10) DEFAULT NULL,
  `centerCountry` varchar(100) DEFAULT NULL,
  `centerNumber` varchar(100) DEFAULT NULL,
  `centerEmail` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp(),
  `centerInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `centers`
--

INSERT INTO `centers` (`centerId`, `centerName`, `centerCity`, `centerAdress`, `centerZip`, `centerCountry`, `centerNumber`, `centerEmail`, `createdAt`, `updatedAt`, `centerInfo`) VALUES
(1, 'Donkey Five Paris', 'Paris', '123 Rue de Paris', '75001', 'France', '0123456789', 'contact@paris.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(2, 'Donkey Five Lyon', 'Lyon', '456 Rue de Lyon', '69002', 'France', '0123456790', 'contact@lyon.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(3, 'Donkey Five Marseille', 'Marseille', '789 Rue de Marseille', '13003', 'France', '0123456791', 'contact@marseille.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(4, 'Donkey Five Bordeaux', 'Bordeaux', '101 Rue de Bordeaux', '33004', 'France', '0123456792', 'contact@bordeaux.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(5, 'Donkey Five Toulouse', 'Toulouse', '102 Rue de Toulouse', '31005', 'France', '0123456793', 'contact@toulouse.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(6, 'Donkey Five Nice', 'Nice', '103 Rue de Nice', '06006', 'France', '0123456794', 'contact@nice.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(7, 'Donkey Five Nantes', 'Nantes', '104 Rue de Nantes', '44007', 'France', '0123456795', 'contact@nantes.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(8, 'Donkey Five Strasbourg', 'Strasbourg', '105 Rue de Strasbourg', '67008', 'France', '0123456796', 'contact@strasbourg.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(9, 'Donkey Five Montpellier', 'Montpellier', '106 Rue de Montpellier', '34009', 'France', '0123456797', 'contact@montpellier.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(10, 'Donkey Five Lille', 'Lille', '107 Rue de Lille', '59010', 'France', '0123456798', 'contact@lille.fr', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(11, 'Donkey Five London', 'London', '108 London Road', 'L1 1LL', 'United Kingdom', '0201234567', 'contact@london.uk', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(12, 'Donkey Five Berlin', 'Berlin', '109 Berliner Strasse', '10115', 'Germany', '0301234567', 'contact@berlin.de', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(13, 'Donkey Five Madrid', 'Madrid', '110 Calle de Madrid', '28001', 'Spain', '910123456', 'contact@madrid.es', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(14, 'Donkey Five Rome', 'Rome', '111 Via Roma', '00118', 'Italy', '0612345678', 'contact@rome.it', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.'),
(15, 'Donkey Five Amsterdam', 'Amsterdam', '112 Amsterdam Avenue', '1012', 'Netherlands', '0201234567', 'contact@amsterdam.nl', '2023-11-27 11:30:18', '2023-11-27 11:30:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Iaculis eu non diam phasellus. Vel fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Donec et odio pellentesque diam. Aliquam id diam maecenas ultricies mi eget. Accumsan tortor posuere ac ut consequat semper viverra nam libero. In iaculis nunc sed augue. Velit aliquet sagittis id consectetur purus ut faucibus. Nulla porttitor massa id neque aliquam.');

-- --------------------------------------------------------

--
-- Structure de la table `fields`
--

CREATE TABLE `fields` (
  `fieldId` int(11) NOT NULL,
  `fieldName` varchar(100) DEFAULT NULL,
  `fieldTarifHourHT` float DEFAULT NULL,
  `fieldTarifDayHT` float DEFAULT NULL,
  `fieldPicture` varchar(255) DEFAULT 'field-img-default.jpg',
  `centerId` int(11) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fields`
--

INSERT INTO `fields` (`fieldId`, `fieldName`, `fieldTarifHourHT`, `fieldTarifDayHT`, `fieldPicture`, `centerId`, `createdAt`, `updatedAt`) VALUES
(1, 'Field 1 center 1', 10, 50, 'field-img-default.jpg', 1, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(2, 'Field 2 center 1', 12, 60, 'field-img-default.jpg', 1, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(3, 'Field 3 center 1', 15, 70, 'field-img-default.jpg', 1, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(4, 'Field 1 center 2', 10, 50, 'field-img-default.jpg', 2, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(5, 'Field 2 center 2', 12, 60, 'field-img-default.jpg', 2, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(6, 'Field 3 center 2', 15, 70, 'field-img-default.jpg', 2, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(7, 'Field 1 center 3', 10, 50, 'field-img-default.jpg', 3, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(8, 'Field 2 center 3', 12, 60, 'field-img-default.jpg', 3, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(9, 'Field 3 center 3', 15, 70, 'field-img-default.jpg', 3, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(10, 'Field 1 center 4', 10, 50, 'field-img-default.jpg', 4, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(11, 'Field 2 center 4', 12, 60, 'field-img-default.jpg', 4, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(12, 'Field 3 center 4', 15, 70, 'field-img-default.jpg', 4, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(13, 'Field 1 center 5', 10, 50, 'field-img-default.jpg', 5, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(14, 'Field 2 center 5', 12, 60, 'field-img-default.jpg', 5, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(15, 'Field 3 center 5', 15, 70, 'field-img-default.jpg', 5, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(16, 'Field 1 center 6', 10, 50, 'field-img-default.jpg', 6, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(17, 'Field 2 center 6', 12, 60, 'field-img-default.jpg', 6, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(18, 'Field 3 center 6', 15, 70, 'field-img-default.jpg', 6, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(19, 'Field 1 center 7', 10, 50, 'field-img-default.jpg', 7, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(20, 'Field 2 center 7', 12, 60, 'field-img-default.jpg', 7, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(21, 'Field 3 center 7', 15, 70, 'field-img-default.jpg', 7, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(22, 'Field 1 center 8', 10, 50, 'field-img-default.jpg', 8, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(23, 'Field 2 center 8', 12, 60, 'field-img-default.jpg', 8, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(24, 'Field 3 center 8', 15, 70, 'field-img-default.jpg', 8, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(25, 'Field 1 center 9', 10, 50, 'field-img-default.jpg', 9, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(26, 'Field 2 center 9', 12, 60, 'field-img-default.jpg', 9, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(27, 'Field 3 center 9', 15, 70, 'field-img-default.jpg', 9, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(28, 'Field 1 center 10', 10, 50, 'field-img-default.jpg', 10, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(29, 'Field 2 center 10', 12, 60, 'field-img-default.jpg', 10, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(30, 'Field 3 center 10', 15, 70, 'field-img-default.jpg', 10, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(31, 'Field 1 center 11', 10, 50, 'field-img-default.jpg', 11, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(32, 'Field 2 center 11', 12, 60, 'field-img-default.jpg', 11, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(33, 'Field 3 center 11', 15, 70, 'field-img-default.jpg', 11, '2023-11-27 11:30:32', '2023-11-27 11:30:32'),
(34, 'Field 1 center 1', 10, 50, 'field-img-default.jpg', 1, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(35, 'Field 2 center 1', 12, 60, 'field-img-default.jpg', 1, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(36, 'Field 3 center 1', 15, 70, 'field-img-default.jpg', 1, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(37, 'Field 1 center 2', 10, 50, 'field-img-default.jpg', 2, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(38, 'Field 2 center 2', 12, 60, 'field-img-default.jpg', 2, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(39, 'Field 3 center 2', 15, 70, 'field-img-default.jpg', 2, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(40, 'Field 1 center 3', 10, 50, 'field-img-default.jpg', 3, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(41, 'Field 2 center 3', 12, 60, 'field-img-default.jpg', 3, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(42, 'Field 3 center 3', 15, 70, 'field-img-default.jpg', 3, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(43, 'Field 1 center 4', 10, 50, 'field-img-default.jpg', 4, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(44, 'Field 2 center 4', 12, 60, 'field-img-default.jpg', 4, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(45, 'Field 3 center 4', 15, 70, 'field-img-default.jpg', 4, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(46, 'Field 1 center 5', 10, 50, 'field-img-default.jpg', 5, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(47, 'Field 2 center 5', 12, 60, 'field-img-default.jpg', 5, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(48, 'Field 3 center 5', 15, 70, 'field-img-default.jpg', 5, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(49, 'Field 1 center 6', 10, 50, 'field-img-default.jpg', 6, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(50, 'Field 2 center 6', 12, 60, 'field-img-default.jpg', 6, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(51, 'Field 3 center 6', 15, 70, 'field-img-default.jpg', 6, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(52, 'Field 1 center 7', 10, 50, 'field-img-default.jpg', 7, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(53, 'Field 2 center 7', 12, 60, 'field-img-default.jpg', 7, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(54, 'Field 3 center 7', 15, 70, 'field-img-default.jpg', 7, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(55, 'Field 1 center 8', 10, 50, 'field-img-default.jpg', 8, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(56, 'Field 2 center 8', 12, 60, 'field-img-default.jpg', 8, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(57, 'Field 3 center 8', 15, 70, 'field-img-default.jpg', 8, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(58, 'Field 1 center 9', 10, 50, 'field-img-default.jpg', 9, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(59, 'Field 2 center 9', 12, 60, 'field-img-default.jpg', 9, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(60, 'Field 3 center 9', 15, 70, 'field-img-default.jpg', 9, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(61, 'Field 1 center 10', 10, 50, 'field-img-default.jpg', 10, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(62, 'Field 2 center 10', 12, 60, 'field-img-default.jpg', 10, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(63, 'Field 3 center 10', 15, 70, 'field-img-default.jpg', 10, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(64, 'Field 1 center 11', 10, 50, 'field-img-default.jpg', 11, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(65, 'Field 2 center 11', 12, 60, 'field-img-default.jpg', 11, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(66, 'Field 3 center 11', 15, 70, 'field-img-default.jpg', 11, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(67, 'Field 1 center 12', 10, 50, 'field-img-default.jpg', 12, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(68, 'Field 2 center 12', 12, 60, 'field-img-default.jpg', 12, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(69, 'Field 3 center 12', 15, 70, 'field-img-default.jpg', 12, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(70, 'Field 1 center 13', 10, 50, 'field-img-default.jpg', 13, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(71, 'Field 2 center 13', 12, 60, 'field-img-default.jpg', 13, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(72, 'Field 3 center 13', 15, 70, 'field-img-default.jpg', 13, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(73, 'Field 1 center 14', 10, 50, 'field-img-default.jpg', 14, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(74, 'Field 2 center 14', 12, 60, 'field-img-default.jpg', 14, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(75, 'Field 3 center 14', 15, 70, 'field-img-default.jpg', 14, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(76, 'Field 1 center 15', 10, 50, 'field-img-default.jpg', 15, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(77, 'Field 2 center 15', 12, 60, 'field-img-default.jpg', 15, '2023-11-27 11:31:01', '2023-11-27 11:31:01'),
(78, 'Field 3 center 15', 15, 70, 'field-img-default.jpg', 15, '2023-11-27 11:31:01', '2023-11-27 11:31:01');

-- --------------------------------------------------------

--
-- Structure de la table `fieldsOptions`
--

CREATE TABLE `fieldsOptions` (
  `optionId` int(11) NOT NULL,
  `fieldId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fieldsOptions`
--

INSERT INTO `fieldsOptions` (`optionId`, `fieldId`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(1, 9),
(2, 9),
(3, 9),
(4, 9),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9),
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(6, 11),
(7, 11),
(8, 11),
(9, 11),
(10, 11),
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 12),
(6, 12),
(7, 12),
(8, 12),
(9, 12),
(10, 12),
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(8, 13),
(9, 13),
(10, 13),
(1, 14),
(2, 14),
(3, 14),
(4, 14),
(5, 14),
(6, 14),
(7, 14),
(8, 14),
(9, 14),
(10, 14),
(1, 15),
(2, 15),
(3, 15),
(4, 15),
(5, 15),
(6, 15),
(7, 15),
(8, 15),
(9, 15),
(10, 15),
(1, 16),
(2, 16),
(3, 16),
(4, 16),
(5, 16),
(6, 16),
(7, 16),
(8, 16),
(9, 16),
(10, 16),
(1, 17),
(2, 17),
(3, 17),
(4, 17),
(5, 17),
(6, 17),
(7, 17),
(8, 17),
(9, 17),
(10, 17),
(1, 18),
(2, 18),
(3, 18),
(4, 18),
(5, 18),
(6, 18),
(7, 18),
(8, 18),
(9, 18),
(10, 18),
(1, 19),
(2, 19),
(3, 19),
(4, 19),
(5, 19),
(6, 19),
(7, 19),
(8, 19),
(9, 19),
(10, 19),
(1, 20),
(2, 20),
(3, 20),
(4, 20),
(5, 20),
(6, 20),
(7, 20),
(8, 20),
(9, 20),
(10, 20),
(1, 21),
(2, 21),
(3, 21),
(4, 21),
(5, 21),
(6, 21),
(7, 21),
(8, 21),
(9, 21),
(10, 21),
(1, 22),
(2, 22),
(3, 22),
(4, 22),
(5, 22),
(6, 22),
(7, 22),
(8, 22),
(9, 22),
(10, 22),
(1, 23),
(2, 23),
(3, 23),
(4, 23),
(5, 23),
(6, 23),
(7, 23),
(8, 23),
(9, 23),
(10, 23),
(1, 24),
(2, 24),
(3, 24),
(4, 24),
(5, 24),
(6, 24),
(7, 24),
(8, 24),
(9, 24),
(10, 24),
(1, 25),
(2, 25),
(3, 25),
(4, 25),
(5, 25),
(6, 25),
(7, 25),
(8, 25),
(9, 25),
(10, 25),
(1, 26),
(2, 26),
(3, 26),
(4, 26),
(5, 26),
(6, 26),
(7, 26),
(8, 26),
(9, 26),
(10, 26),
(1, 27),
(2, 27),
(3, 27),
(4, 27),
(5, 27),
(6, 27),
(7, 27),
(8, 27),
(9, 27),
(10, 27),
(1, 28),
(2, 28),
(3, 28),
(4, 28),
(5, 28),
(6, 28),
(7, 28),
(8, 28),
(9, 28),
(10, 28),
(1, 29),
(2, 29),
(3, 29),
(4, 29),
(5, 29),
(6, 29),
(7, 29),
(8, 29),
(9, 29),
(10, 29),
(1, 30),
(2, 30),
(3, 30),
(4, 30),
(5, 30),
(6, 30),
(7, 30),
(8, 30),
(9, 30),
(10, 30),
(1, 31),
(2, 31),
(3, 31),
(4, 31),
(5, 31),
(6, 31),
(7, 31),
(8, 31),
(9, 31),
(10, 31),
(1, 32),
(2, 32),
(3, 32),
(4, 32),
(5, 32),
(6, 32),
(7, 32),
(8, 32),
(9, 32),
(10, 32),
(1, 33),
(2, 33),
(3, 33),
(4, 33),
(5, 33),
(6, 33),
(7, 33),
(8, 33),
(9, 33),
(10, 33),
(1, 34),
(2, 34),
(3, 34),
(4, 34),
(5, 34),
(6, 34),
(7, 34),
(8, 34),
(9, 34),
(10, 34),
(1, 35),
(2, 35),
(3, 35),
(4, 35),
(5, 35),
(6, 35),
(7, 35),
(8, 35),
(9, 35),
(10, 35),
(1, 36),
(2, 36),
(3, 36),
(4, 36),
(5, 36),
(6, 36),
(7, 36),
(8, 36),
(9, 36),
(10, 36),
(1, 37),
(2, 37),
(3, 37),
(4, 37),
(5, 37),
(6, 37),
(7, 37),
(8, 37),
(9, 37),
(10, 37),
(1, 38),
(2, 38),
(3, 38),
(4, 38),
(5, 38),
(6, 38),
(7, 38),
(8, 38),
(9, 38),
(10, 38),
(1, 39),
(2, 39),
(3, 39),
(4, 39),
(5, 39),
(6, 39),
(7, 39),
(8, 39),
(9, 39),
(10, 39),
(1, 40),
(2, 40),
(3, 40),
(4, 40),
(5, 40),
(6, 40),
(7, 40),
(8, 40),
(9, 40),
(10, 40),
(1, 41),
(2, 41),
(3, 41),
(4, 41),
(5, 41),
(6, 41),
(7, 41),
(8, 41),
(9, 41),
(10, 41),
(1, 42),
(2, 42),
(3, 42),
(4, 42),
(5, 42),
(6, 42),
(7, 42),
(8, 42),
(9, 42),
(10, 42),
(1, 43),
(2, 43),
(3, 43),
(4, 43),
(5, 43),
(6, 43),
(7, 43),
(8, 43),
(9, 43),
(10, 43),
(1, 44),
(2, 44),
(3, 44),
(4, 44),
(5, 44),
(6, 44),
(7, 44),
(8, 44),
(9, 44),
(10, 44),
(1, 45),
(2, 45),
(3, 45),
(4, 45),
(5, 45),
(6, 45),
(7, 45),
(8, 45),
(9, 45),
(10, 45),
(1, 46),
(2, 46),
(3, 46),
(4, 46),
(5, 46),
(6, 46),
(7, 46),
(8, 46),
(9, 46),
(10, 46),
(1, 47),
(2, 47),
(3, 47),
(4, 47),
(5, 47),
(6, 47),
(7, 47),
(8, 47),
(9, 47),
(10, 47),
(1, 48),
(2, 48),
(3, 48),
(4, 48),
(5, 48),
(6, 48),
(7, 48),
(8, 48),
(9, 48),
(10, 48),
(1, 49),
(2, 49),
(3, 49),
(4, 49),
(5, 49),
(6, 49),
(7, 49),
(8, 49),
(9, 49),
(10, 49),
(1, 50),
(2, 50),
(3, 50),
(4, 50),
(5, 50),
(6, 50),
(7, 50),
(8, 50),
(9, 50),
(10, 50),
(1, 51),
(2, 51),
(3, 51),
(4, 51),
(5, 51),
(6, 51),
(7, 51),
(8, 51),
(9, 51),
(10, 51),
(1, 52),
(2, 52),
(3, 52),
(4, 52),
(5, 52),
(6, 52),
(7, 52),
(8, 52),
(9, 52),
(10, 52),
(1, 53),
(2, 53),
(3, 53),
(4, 53),
(5, 53),
(6, 53),
(7, 53),
(8, 53),
(9, 53),
(10, 53),
(1, 54),
(2, 54),
(3, 54),
(4, 54),
(5, 54),
(6, 54),
(7, 54),
(8, 54),
(9, 54),
(10, 54),
(1, 55),
(2, 55),
(3, 55),
(4, 55),
(5, 55),
(6, 55),
(7, 55),
(8, 55),
(9, 55),
(10, 55),
(1, 56),
(2, 56),
(3, 56),
(4, 56),
(5, 56),
(6, 56),
(7, 56),
(8, 56),
(9, 56),
(10, 56),
(1, 57),
(2, 57),
(3, 57),
(4, 57),
(5, 57),
(6, 57),
(7, 57),
(8, 57),
(9, 57),
(10, 57),
(1, 58),
(2, 58),
(3, 58),
(4, 58),
(5, 58),
(6, 58),
(7, 58),
(8, 58),
(9, 58),
(10, 58),
(1, 59),
(2, 59),
(3, 59),
(4, 59),
(5, 59),
(6, 59),
(7, 59),
(8, 59),
(9, 59),
(10, 59),
(1, 60),
(2, 60),
(3, 60),
(4, 60),
(5, 60),
(6, 60),
(7, 60),
(8, 60),
(9, 60),
(10, 60),
(1, 61),
(2, 61),
(3, 61),
(4, 61),
(5, 61),
(6, 61),
(7, 61),
(8, 61),
(9, 61),
(10, 61),
(1, 62),
(2, 62),
(3, 62),
(4, 62),
(5, 62),
(6, 62),
(7, 62),
(8, 62),
(9, 62),
(10, 62),
(1, 63),
(2, 63),
(3, 63),
(4, 63),
(5, 63),
(6, 63),
(7, 63),
(8, 63),
(9, 63),
(10, 63),
(1, 64),
(2, 64),
(3, 64),
(4, 64),
(5, 64),
(6, 64),
(7, 64),
(8, 64),
(9, 64),
(10, 64),
(1, 65),
(2, 65),
(3, 65),
(4, 65),
(5, 65),
(6, 65),
(7, 65),
(8, 65),
(9, 65),
(10, 65),
(1, 66),
(2, 66),
(3, 66),
(4, 66),
(5, 66),
(6, 66),
(7, 66),
(8, 66),
(9, 66),
(10, 66),
(1, 67),
(2, 67),
(3, 67),
(4, 67),
(5, 67),
(6, 67),
(7, 67),
(8, 67),
(9, 67),
(10, 67),
(1, 68),
(2, 68),
(3, 68),
(4, 68),
(5, 68),
(6, 68),
(7, 68),
(8, 68),
(9, 68),
(10, 68),
(1, 69),
(2, 69),
(3, 69),
(4, 69),
(5, 69),
(6, 69),
(7, 69),
(8, 69),
(9, 69),
(10, 69),
(1, 70),
(2, 70),
(3, 70),
(4, 70),
(5, 70),
(6, 70),
(7, 70),
(8, 70),
(9, 70),
(10, 70),
(1, 71),
(2, 71),
(3, 71),
(4, 71),
(5, 71),
(6, 71),
(7, 71),
(8, 71),
(9, 71),
(10, 71),
(1, 72),
(2, 72),
(3, 72),
(4, 72),
(5, 72),
(6, 72),
(7, 72),
(8, 72),
(9, 72),
(10, 72),
(1, 73),
(2, 73),
(3, 73),
(4, 73),
(5, 73),
(6, 73),
(7, 73),
(8, 73),
(9, 73),
(10, 73),
(1, 74),
(2, 74),
(3, 74),
(4, 74),
(5, 74),
(6, 74),
(7, 74),
(8, 74),
(9, 74),
(10, 74),
(1, 75),
(2, 75),
(3, 75),
(4, 75),
(5, 75),
(6, 75),
(7, 75),
(8, 75),
(9, 75),
(10, 75),
(1, 76),
(2, 76),
(3, 76),
(4, 76),
(5, 76),
(6, 76),
(7, 76),
(8, 76),
(9, 76),
(10, 76),
(1, 77),
(2, 77),
(3, 77),
(4, 77),
(5, 77),
(6, 77),
(7, 77),
(8, 77),
(9, 77),
(10, 77),
(1, 78),
(2, 78),
(3, 78),
(4, 78),
(5, 78),
(6, 78),
(7, 78),
(8, 78),
(9, 78),
(10, 78);

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `optionId` int(11) NOT NULL,
  `optionName` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp(),
  `optionCostHT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`optionId`, `optionName`, `createdAt`, `updatedAt`, `optionCostHT`) VALUES
(1, 'Éclairage nocturne', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 20),
(2, 'rental de ballons', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 5),
(3, 'Marquage personnalisé', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 15),
(4, 'Accès aux vestiaires', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 10),
(5, 'Utilisation de buts mobiles', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 8),
(6, 'Service Arbitrage', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 30),
(7, 'Equipement de sécurité', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 12),
(8, 'Service de restauration', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 25),
(9, 'Coaching personnel', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 40),
(10, 'Enregistrement vidéo du match', '2023-11-27 11:35:28', '2023-11-27 11:35:28', 35);

-- --------------------------------------------------------

--
-- Structure de la table `rentals`
--

CREATE TABLE `rentals` (
  `rentalId` int(11) NOT NULL,
  `rentalNumber` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `rentalCostOfTVA` float DEFAULT NULL,
  `rentalTotalHT` float DEFAULT NULL,
  `rentalTotalTTC` float DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp(),
  `rentalStatus` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rentalsCenters`
--

CREATE TABLE `rentalsCenters` (
  `rentalId` int(11) DEFAULT NULL,
  `centerId` int(11) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rentalsFields`
--

CREATE TABLE `rentalsFields` (
  `rentalsFieldsId` int(11) NOT NULL,
  `fieldId` int(11) DEFAULT NULL,
  `rentalId` int(11) DEFAULT NULL,
  `rentalsFieldsType` varchar(100) DEFAULT NULL,
  `rentalsfieldsNbDays` int(11) DEFAULT NULL,
  `rentalsFieldsNbHours` int(11) DEFAULT NULL,
  `rentalsFieldsDateEnd` date DEFAULT NULL,
  `rentalfielHourStart` varchar(10) DEFAULT NULL,
  `rentalsfieldsDateStart` date DEFAULT NULL,
  `rentalsFieldsHourEnd` varchar(10) DEFAULT NULL,
  `rentalFielCostHT` float DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userFirstName` varchar(100) NOT NULL,
  `userLastName` varchar(100) NOT NULL,
  `userBirthDay` date NOT NULL,
  `userAddress` varchar(100) DEFAULT NULL,
  `userZip` int(11) DEFAULT NULL,
  `userCity` varchar(100) DEFAULT NULL,
  `userCountry` varchar(10) DEFAULT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userNumber` int(11) NOT NULL,
  `userPicture` varchar(100) DEFAULT 'user-default.png',
  `userRole` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `userFirstName`, `userLastName`, `userBirthDay`, `userAddress`, `userZip`, `userCity`, `userCountry`, `userPassword`, `userEmail`, `userNumber`, `userPicture`, `userRole`, `createdAt`, `updatedAt`) VALUES
(1, 'John', 'Doe', '1990-01-01', NULL, NULL, NULL, NULL, 'password', 'john@donkeyfive.com', 648152556, 'user-default.png', 1, '2023-11-27 11:49:24', '2023-11-27 11:49:24');

-- --------------------------------------------------------

--
-- Structure de la table `usersCenters`
--

CREATE TABLE `usersCenters` (
  `userId` int(11) DEFAULT NULL,
  `centerId` int(11) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='link user center if user is Admin role';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`centerId`);

--
-- Index pour la table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`fieldId`),
  ADD KEY `centers_fields_FK` (`centerId`);

--
-- Index pour la table `fieldsOptions`
--
ALTER TABLE `fieldsOptions`
  ADD KEY `options_fields_FK` (`optionId`),
  ADD KEY `fields_options_FK` (`fieldId`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionId`);

--
-- Index pour la table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rentalId`),
  ADD KEY `users_rentals_FK` (`userId`) USING BTREE;

--
-- Index pour la table `rentalsCenters`
--
ALTER TABLE `rentalsCenters`
  ADD KEY `rentals_centers_FK` (`rentalId`),
  ADD KEY `centers_rentals_FK` (`centerId`);

--
-- Index pour la table `rentalsFields`
--
ALTER TABLE `rentalsFields`
  ADD PRIMARY KEY (`rentalsFieldsId`),
  ADD KEY `fields_rentals_FK` (`fieldId`) USING BTREE,
  ADD KEY `rentals_fields_FK` (`rentalId`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Index pour la table `usersCenters`
--
ALTER TABLE `usersCenters`
  ADD KEY `users_centers_FK` (`userId`) USING BTREE,
  ADD KEY `centers_users_FK` (`centerId`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centers`
--
ALTER TABLE `centers`
  MODIFY `centerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `fields`
--
ALTER TABLE `fields`
  MODIFY `fieldId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `fieldsOptions`
--
ALTER TABLE `fieldsOptions`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rentalsFields`
--
ALTER TABLE `rentalsFields`
  MODIFY `rentalsFieldsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `centers_fields_FK` FOREIGN KEY (`centerId`) REFERENCES `centers` (`centerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fieldsOptions`
--
ALTER TABLE `fieldsOptions`
  ADD CONSTRAINT `fields_options_FK` FOREIGN KEY (`fieldId`) REFERENCES `fields` (`fieldId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `options_fields_FK` FOREIGN KEY (`optionId`) REFERENCES `options` (`optionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `users_rentals_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rentalsCenters`
--
ALTER TABLE `rentalsCenters`
  ADD CONSTRAINT `centers_rentals_FK` FOREIGN KEY (`centerId`) REFERENCES `centers` (`centerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_centers_FK` FOREIGN KEY (`rentalId`) REFERENCES `rentals` (`rentalId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rentalsFields`
--
ALTER TABLE `rentalsFields`
  ADD CONSTRAINT `fields_rentals_FK` FOREIGN KEY (`fieldId`) REFERENCES `fields` (`fieldId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_fields_FK` FOREIGN KEY (`rentalId`) REFERENCES `rentals` (`rentalId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `usersCenters`
--
ALTER TABLE `usersCenters`
  ADD CONSTRAINT `centers_users_FK` FOREIGN KEY (`centerId`) REFERENCES `centers` (`centerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_centers_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
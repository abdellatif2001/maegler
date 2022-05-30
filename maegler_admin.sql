-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 12:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maegler_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `appartement_reviews`
--

CREATE TABLE `appartement_reviews` (
  `idappartement` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `nb_chambre` int(2) DEFAULT NULL,
  `nb_salle_bain` int(2) DEFAULT NULL,
  `nb_sallon` int(2) DEFAULT NULL,
  `surface` varchar(10) DEFAULT NULL,
  `etage` varchar(2) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appartement_reviews`
--

INSERT INTO `appartement_reviews` (`idappartement`, `title`, `descrip`, `price`, `nb_chambre`, `nb_salle_bain`, `nb_sallon`, `surface`, `etage`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'appartement', 'appartement 140m²', '500000', 4, 1, 1, '140', '5', 5, 'img/download.jpg', 'Rabat', 0, 'Approved'),
(2, 'HBAKppartmenet 1', 'Appart', '2333', 2, 1, 1, '220', '1', 5, 'img/', 'Abadou', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `bike_reviews`
--

CREATE TABLE `bike_reviews` (
  `idb` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `marque` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike_reviews`
--

INSERT INTO `bike_reviews` (`idb`, `title`, `descrip`, `price`, `marque`, `etat`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'bike', 'bike like new', '2000', 'between', 'like new', 5, 'img/bike.jpg', 'Rabat', 0, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `cars_reviews`
--

CREATE TABLE `cars_reviews` (
  `idcar` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `modele` varchar(20) DEFAULT NULL,
  `ann_mod` int(5) DEFAULT NULL,
  `klm` varchar(10) DEFAULT NULL,
  `carburant` varchar(10) DEFAULT NULL,
  `puss` varchar(5) DEFAULT NULL,
  `boite` varchar(10) DEFAULT NULL,
  `nb_porte` int(1) DEFAULT NULL,
  `origine` varchar(10) DEFAULT NULL,
  `pr_main` varchar(3) NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars_reviews`
--

INSERT INTO `cars_reviews` (`idcar`, `title`, `descrip`, `price`, `marque`, `modele`, `ann_mod`, `klm`, `carburant`, `puss`, `boite`, `nb_porte`, `origine`, `pr_main`, `etat`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'Mercedes-Benz 220 classe C', 'je met en vente ma voiture Mercedes-Benz 220 classe C modèle 2015 dédouanée en 2018, tout option en excellente état.', '297000', '44', ' - C220', 2015, '140 000 - ', '1', '9', 'Automatiqu', 5, 'Dédouanée', 'Non', 'Excellent', 5, 'img/10065267782.jfif,img/10065267798.jfif', 'Marrakech', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `clothe_reviews`
--

CREATE TABLE `clothe_reviews` (
  `idclothe` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothe_reviews`
--

INSERT INTO `clothe_reviews` (`idclothe`, `title`, `descrip`, `price`, `etat`, `gender`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'T-shirt', 'new t-shirt', '250', 'new', 'male', 5, 'img/download.jpg', 'Rabat', 0, 'Removed');

-- --------------------------------------------------------

--
-- Table structure for table `gadget_reviews`
--

CREATE TABLE `gadget_reviews` (
  `idg` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `etat` varchar(20) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maison_reviews`
--

CREATE TABLE `maison_reviews` (
  `idmaison` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `nb_chambre` int(2) DEFAULT NULL,
  `nb_salle_bain` int(2) DEFAULT NULL,
  `nb_sallon` int(2) DEFAULT NULL,
  `surface` varchar(10) DEFAULT NULL,
  `nb_etage` varchar(2) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maison_reviews`
--

INSERT INTO `maison_reviews` (`idmaison`, `title`, `descrip`, `price`, `nb_chambre`, `nb_salle_bain`, `nb_sallon`, `surface`, `nb_etage`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'house', 'maison', '2500000', 2, 2, 1, '80', '5', 5, 'img/maison.jpg', 'Rabat', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `moto_reviews`
--

CREATE TABLE `moto_reviews` (
  `idm` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `ann_mod` int(5) DEFAULT NULL,
  `klm` varchar(10) DEFAULT NULL,
  `cyln` varchar(10) DEFAULT NULL,
  `nb_whell` varchar(5) DEFAULT NULL,
  `origine` varchar(10) DEFAULT NULL,
  `pr_main` varchar(3) NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `session` char(100) NOT NULL DEFAULT '',
  `ip` text NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pc_reviews`
--

CREATE TABLE `pc_reviews` (
  `idpc` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `proce` varchar(20) DEFAULT NULL,
  `graphics` varchar(20) NOT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `ram` varchar(10) DEFAULT NULL,
  `capacity` varchar(5) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc_reviews`
--

INSERT INTO `pc_reviews` (`idpc`, `title`, `descrip`, `price`, `marque`, `proce`, `graphics`, `etat`, `ram`, `capacity`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'pc', 'pc i5 like new\r\n', '3000', 'HP', 'i5', 'Intel', 'like new', '0', '1', 5, 'img/pc.jpg', 'Agadir', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pets_reviews`
--

CREATE TABLE `pets_reviews` (
  `idpets` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets_reviews`
--

INSERT INTO `pets_reviews` (`idpets`, `title`, `descrip`, `price`, `etat`, `gender`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'cat', '', '300', 'cat', 'on', 5, 'img/pets.jpg', 'Rabat', 0, 'Rejected'),
(2, 'cat', 'cute cat', '400', 'cat', 'on', 5, 'img/pets.jpg', 'Rabat', 0, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `phone_tab_reviews`
--

CREATE TABLE `phone_tab_reviews` (
  `idp` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `modele` varchar(20) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `capacity` varchar(5) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_tab_reviews`
--

INSERT INTO `phone_tab_reviews` (`idp`, `title`, `descrip`, `price`, `marque`, `modele`, `etat`, `capacity`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'samsung', 'telephone 64 gb', '2000', 'Samsung', 'A51', 'new', '', 5, 'img/phone_tab.jpg', 'Rabat', 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `shoes_reviews`
--

CREATE TABLE `shoes_reviews` (
  `idshoes` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `taille` varchar(10) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoes_reviews`
--

INSERT INTO `shoes_reviews` (`idshoes`, `title`, `descrip`, `price`, `etat`, `taille`, `gender`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'shoes', 'new shoes 44', '500', 'new', '', 'male', 1, 'img/shoes.jpg', '', 0, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tele_reviews`
--

CREATE TABLE `tele_reviews` (
  `idt` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `nb_pouce` int(3) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tele_reviews`
--

INSERT INTO `tele_reviews` (`idt`, `title`, `descrip`, `price`, `etat`, `nb_pouce`, `id`, `image`, `location`, `likes`, `status`) VALUES
(1, 'telephone', 'like new', '2000', 'like new', 6, 5, 'img/tele.jpg', 'Rabat', 0, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'nafi', 'abdellatif', 'nafi7457@gmail.com', 'Nafi%%2001');

-- --------------------------------------------------------

--
-- Table structure for table `watches_reviews`
--

CREATE TABLE `watches_reviews` (
  `idw` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `etat` varchar(10) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `id` int(7) NOT NULL,
  `image` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watches_reviews`
--

INSERT INTO `watches_reviews` (`idw`, `title`, `descrip`, `price`, `etat`, `gender`, `id`, `image`, `location`, `likes`, `status`) VALUES
(2, 'Swiss luxury', 'Swiss luxury new', '3000', 'new', 'male', 5, 'img/watches.jpg', 'Rabat', 0, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appartement_reviews`
--
ALTER TABLE `appartement_reviews`
  ADD PRIMARY KEY (`idappartement`),
  ADD KEY `fk20` (`id`);

--
-- Indexes for table `bike_reviews`
--
ALTER TABLE `bike_reviews`
  ADD PRIMARY KEY (`idb`),
  ADD KEY `fk19` (`id`);

--
-- Indexes for table `cars_reviews`
--
ALTER TABLE `cars_reviews`
  ADD PRIMARY KEY (`idcar`),
  ADD KEY `fk17` (`id`);

--
-- Indexes for table `clothe_reviews`
--
ALTER TABLE `clothe_reviews`
  ADD PRIMARY KEY (`idclothe`),
  ADD KEY `fk22` (`id`);

--
-- Indexes for table `gadget_reviews`
--
ALTER TABLE `gadget_reviews`
  ADD PRIMARY KEY (`idg`),
  ADD KEY `fk35` (`id`);

--
-- Indexes for table `maison_reviews`
--
ALTER TABLE `maison_reviews`
  ADD PRIMARY KEY (`idmaison`),
  ADD KEY `fk21` (`id`);

--
-- Indexes for table `moto_reviews`
--
ALTER TABLE `moto_reviews`
  ADD PRIMARY KEY (`idm`),
  ADD KEY `fk18` (`id`);

--
-- Indexes for table `pc_reviews`
--
ALTER TABLE `pc_reviews`
  ADD PRIMARY KEY (`idpc`),
  ADD KEY `fk16` (`id`);

--
-- Indexes for table `pets_reviews`
--
ALTER TABLE `pets_reviews`
  ADD PRIMARY KEY (`idpets`),
  ADD KEY `fk25` (`id`);

--
-- Indexes for table `phone_tab_reviews`
--
ALTER TABLE `phone_tab_reviews`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `fk14` (`id`);

--
-- Indexes for table `shoes_reviews`
--
ALTER TABLE `shoes_reviews`
  ADD PRIMARY KEY (`idshoes`),
  ADD KEY `fk23` (`id`);

--
-- Indexes for table `tele_reviews`
--
ALTER TABLE `tele_reviews`
  ADD PRIMARY KEY (`idt`),
  ADD KEY `fk15` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watches_reviews`
--
ALTER TABLE `watches_reviews`
  ADD PRIMARY KEY (`idw`),
  ADD KEY `fk24` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appartement_reviews`
--
ALTER TABLE `appartement_reviews`
  MODIFY `idappartement` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bike_reviews`
--
ALTER TABLE `bike_reviews`
  MODIFY `idb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars_reviews`
--
ALTER TABLE `cars_reviews`
  MODIFY `idcar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clothe_reviews`
--
ALTER TABLE `clothe_reviews`
  MODIFY `idclothe` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gadget_reviews`
--
ALTER TABLE `gadget_reviews`
  MODIFY `idg` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maison_reviews`
--
ALTER TABLE `maison_reviews`
  MODIFY `idmaison` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `moto_reviews`
--
ALTER TABLE `moto_reviews`
  MODIFY `idm` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc_reviews`
--
ALTER TABLE `pc_reviews`
  MODIFY `idpc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pets_reviews`
--
ALTER TABLE `pets_reviews`
  MODIFY `idpets` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_tab_reviews`
--
ALTER TABLE `phone_tab_reviews`
  MODIFY `idp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoes_reviews`
--
ALTER TABLE `shoes_reviews`
  MODIFY `idshoes` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tele_reviews`
--
ALTER TABLE `tele_reviews`
  MODIFY `idt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `watches_reviews`
--
ALTER TABLE `watches_reviews`
  MODIFY `idw` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartement_reviews`
--
ALTER TABLE `appartement_reviews`
  ADD CONSTRAINT `fk20` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `bike_reviews`
--
ALTER TABLE `bike_reviews`
  ADD CONSTRAINT `fk19` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `cars_reviews`
--
ALTER TABLE `cars_reviews`
  ADD CONSTRAINT `fk17` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `clothe_reviews`
--
ALTER TABLE `clothe_reviews`
  ADD CONSTRAINT `fk22` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `gadget_reviews`
--
ALTER TABLE `gadget_reviews`
  ADD CONSTRAINT `fk35` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `maison_reviews`
--
ALTER TABLE `maison_reviews`
  ADD CONSTRAINT `fk21` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `moto_reviews`
--
ALTER TABLE `moto_reviews`
  ADD CONSTRAINT `fk18` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `pc_reviews`
--
ALTER TABLE `pc_reviews`
  ADD CONSTRAINT `fk16` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `pets_reviews`
--
ALTER TABLE `pets_reviews`
  ADD CONSTRAINT `fk25` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `phone_tab_reviews`
--
ALTER TABLE `phone_tab_reviews`
  ADD CONSTRAINT `fk14` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `shoes_reviews`
--
ALTER TABLE `shoes_reviews`
  ADD CONSTRAINT `fk23` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `tele_reviews`
--
ALTER TABLE `tele_reviews`
  ADD CONSTRAINT `fk15` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);

--
-- Constraints for table `watches_reviews`
--
ALTER TABLE `watches_reviews`
  ADD CONSTRAINT `fk24` FOREIGN KEY (`id`) REFERENCES `maegler`.`users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 07:43 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` bigint(20) NOT NULL,
  `pmodel` varchar(50) NOT NULL,
  `pbrand` varchar(20) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `pyear` int(4) NOT NULL,
  `pimgurl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pmodel`, `pbrand`, `pprice`, `ptype`, `pdesc`, `pyear`, `pimgurl`) VALUES
(1, 'S521', 'Ibanez', '41990.00', 'Electric Guitar', 'One of the most affordable electric guitars. Plays a wide range of genres from Metal to Blues.  ', 2008, 'ibanezs521'),
(2, 'RG350QM', 'Ibanez', '45000.00', 'Electric Guitar', 'Sharktooth frets and Infinity Stock pickups make it a Maple Body guitar everyone wants own. A beast.', 2012, 'ibanez350qm'),
(3, 'Les Paul', 'Gibson', '67000.00', 'Electric Guitar', 'A versatile Rock instrument from Gibson himself. ', 2004, 'gibsonlespaul'),
(4, 'Hummingbird', 'Gibson', '86000.00', 'Acoustic Guitar', 'Ever Heard of AC/DC? Yes, this guitar comes in red Hot Devil Gibson. From Young brothers.', 2012, 'gibsonhummingbird'),
(5, 'JEM', 'Ibanez', '108000.00', 'Electric Guitar', 'Steve Vai signature series. Screams and drills like he does.', 2009, 'ibanezjem'),
(6, 'SAG200', 'GB&A', '13000.00', 'Acoustic Guitar', 'A Wonderful Acoustic guitar for beginners.', 2004, 'acoustic200'),
(7, 'RetroSlide', 'Ariana', '30000.00', 'Acoustic Guitar', 'Great for clapping and Lap guitar exercises. Slides like a country fool.', 2010, 'acousticlap'),
(8, 'Soprano', 'Gibson', '20000.00', 'Acoustic Guitar', 'A Soprano Guitar for medium size lovers.', 2009, 'acousticsoprano\r\n'),
(9, 'JS Belt', 'D\'Addario', '1400.00', 'Belt', 'Guitar Strap', 2000, 'belt1'),
(10, 'Golden Belt', 'D\'Addario', '1000.00', 'Belt', 'Guitar Strap', 2010, 'belt2'),
(11, 'Telecaster', 'Fender', '78000.00', 'Electric Guitar', 'Original series. Best Single Coil.', 2000, 'fendertelecaster'),
(12, 'Stratocaster', 'Fender', '120000.00', 'Electric Guitar', 'The original STRAT of all mankind. ', 2003, 'fenderstart'),
(13, 'Twin Reverb', 'Fender', '300000.00', 'Amplifier', 'A Combo Amp worth having.', 2010, 'fendertwinreverb'),
(14, 'AR', 'Ibanez', '30000.00', 'Electric Guitar', 'A lil brother to the superstrats, this packs a punch!', 2001, 'ibanezar'),
(15, 'GIO', 'Ibanez', '17000.00', 'Electric Guitar', 'Affordability at its best.', 2000, 'ibanezgio'),
(16, 'LA10', 'Laney', '8000.00', 'Amplifier', 'A Nice room combo amp for the low headbangers.', 2010, 'laneyla10'),
(17, 'Pick O\'5', 'Alice', '200.00', 'Plectrums', '5 Picks for all your needs.', 2000, 'plectrums1'),
(18, 'Set Of 20', 'Jones', '1000.00', 'Plectrums', 'All mm you need! Let\'s rock!', 2000, 'plectrums2'),
(19, 'Prestige SA', 'Jackson', '20000.00', 'Electric Guitar', 'The Metalhead you will not disappoint. ', 2003, 'jacksonprestige'),
(20, 'YA90', 'Yamaha', '10000.00', 'Amplifier', 'A learner\'s amp. Will rock anyway.', 2005, 'yamahaamp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

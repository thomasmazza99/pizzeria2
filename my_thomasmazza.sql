-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 alle 17:24
-- Versione del server: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bibite`
--

CREATE TABLE IF NOT EXISTS `Bibite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bibite` varchar(255) NOT NULL,
  `dimensione` float NOT NULL,
  `Prezzo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `bibite`
--

INSERT INTO `Bibite` (`id`, `nome_bibite`, `dimensione`, `Prezzo`) VALUES
(1, 'coca-cola ', 33, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `bibite_ordini`
--

CREATE TABLE IF NOT EXISTS `bibite_ordini` (
  `id_bibite` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  PRIMARY KEY (`id_bibite`,`id_ordine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `insalate`
--

CREATE TABLE IF NOT EXISTS `Insalate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_insalate` varchar(255) NOT NULL,
  `ingredienti` varchar(1024) NOT NULL,
  `prezzo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `insalate`
--

INSERT INTO `Insalate` (`id`, `nome_insalate`, `ingredienti`, `prezzo`) VALUES
(1, 'Tris Griglia', 'melanzane, radicchio, zucchine', 5.5),
(2, 'sk', 'dmk', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `insalate_ordine`
--

CREATE TABLE IF NOT EXISTS `insalate_ordine` (
  `id_insalate` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  PRIMARY KEY (`id_insalate`,`id_ordine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Ordine`
--

CREATE TABLE IF NOT EXISTS `Ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `nome_cognome_cliente` varchar(1024) DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `Ordine`
--

INSERT INTO `Ordine` (`id`, `data`, `nome_cognome_cliente`, `telefono`) VALUES
(1, '2018-03-04 00:54:00', 'Thomas Mazza', '3334988149');

-- --------------------------------------------------------

--
-- Struttura della tabella `Panini`
--

CREATE TABLE IF NOT EXISTS `Panini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_panino` varchar(255) NOT NULL,
  `ingredienti` varchar(1024) NOT NULL,
  `prezzo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `Panini`
--

INSERT INTO `Panini` (`id`, `nome_panino`, `ingredienti`, `prezzo`) VALUES
(1, '01', 'mozzarella, cotto', 4.5),
(2, '03', 'Verdure', 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `panini_ordini`
--

CREATE TABLE IF NOT EXISTS `panini_ordini` (
  `id_panini` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  PRIMARY KEY (`id_panini`,`id_ordine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `Pizze`
--

CREATE TABLE IF NOT EXISTS `Pizze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pizza` varchar(255) NOT NULL,
  `ingredienti` varchar(1024) NOT NULL,
  `prezzo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dump dei dati per la tabella `Pizze`
--

INSERT INTO `Pizze` (`id`, `nome_pizza`, `ingredienti`, `prezzo`) VALUES
(1, 'Marinara', 'pomodoro, origano, aglio', 3.3),
(2, 'Margherita', 'pomodoro, mozzarella', 3.7),
(3, 'Funghi', 'pomodoro, mozzarella, funghi', 4.7),
(4, 'Napoli ', 'Pomodoro, mozzarella, origano, acciughe', 4.7),
(5, 'Rucola', 'Pomodoro, mozzarella, rucola ', 4.7),
(6, 'Wurstel ', 'Pomodoro, mozzarella, wurstel ', 4.7),
(7, 'Carciofi', 'Pomodoro, mozzarella, Carciofi', 4.7),
(8, 'Salsiccia', 'Pomodoro, mozzarella, Salsiccia ', 4.7),
(9, 'Pugliese', 'Pomodoro, mozzarella, Cipolla, olive ', 4.7),
(10, 'Cotto', 'Pomodoro, mozzarella, Cotto', 4.7),
(11, 'Gorgonzola ', 'Pomodoro, mozzarella, Gorgonzola ', 5),
(12, 'Romana', 'Pomodoro, mozzarella, Capperi, acciughe, origano ', 5.5),
(13, 'Tonno', 'Pomodoro, mozzarella, tonno', 5),
(14, 'Siciliana ', 'Pomodoro, mozzarella,Capperi, acciughe, olive', 5.5),
(18, 'Peperoni ', 'Pomodoro, mozzarella, Peperoni ', 5),
(15, 'Melanzane ', 'Pomodoro, mozzarella, Melanzane ', 5),
(16, 'Patata', 'Pomodoro, mozzarella, Patate, grana grattugiata ', 5),
(17, 'Diavola', 'Pomodoro, mozzarella, Salame, olive', 5.5),
(19, '4 stagioni ', 'Pomodoro, mozzarella, Cotto, salsiccia, carciofi, funghi', 5.5),
(20, '4 formaggi', 'Pomodoro, mozzarella, Formaggi misti', 5.5),
(21, 'Luigi', 'Pomodoro, mozzarella, Melanzane, grana\r\n', 5.5),
(22, 'Crudo ', 'Pomodoro, mozzarella, Prosciutto crudo ', 5.5),
(23, 'Speck', 'Pomodoro, mozzarella, Speck', 5.5),
(24, 'Affumicata ', 'Pomodoro, mozzarella, Cotto, salsiccia, funghi, carciofi, scamorza ', 5.7),
(29, 'ciao', 'CIAO', 6),
(30, 'ciao', 'cao', 6),
(31, 'Marinarnhxj', 'pomodoro, origano, aglio.', 3.3),
(32, 'PAPpa', 'dsadsa', 60),
(33, 'Verdure Miste', 'pomodoro, mozzarella, verdure miste grigliate', 6),
(34, 'Verdir', 'dsadsa gfh', 10),
(35, 'Verdir mod', 'dsadsa gfh', 10),
(36, 'Verdir mod 1', 'dsadsa gfh', 10),
(37, 'Verdir mod 2', 'dsadsa gfh', 10),
(38, 'Verdir mod 4', 'dsadsa gfh', 10),
(40, 'SDJK', 'ppp', 6),
(41, '03', 'Verdure', 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `pizze_ordini`
--

CREATE TABLE IF NOT EXISTS `pizze_ordini` (
  `id_ordine` int(11) NOT NULL,
  `id_pizza` int(11) NOT NULL,
  PRIMARY KEY (`id_ordine`,`id_pizza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `bibite_ordini`
  ADD CONSTRAINT `fk_bibite_ordini_ordini` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`) ON DELETE CASCADE;
ALTER TABLE `bibite_ordini`
  ADD CONSTRAINT `fk_bibite_ordini_bibite` FOREIGN KEY (`id_bibite`) REFERENCES `bibite` (`id`) ON DELETE CASCADE;

ALTER TABLE `insalate_ordine`
  ADD CONSTRAINT `fk_insalate_ordine_ordini` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`) ON DELETE CASCADE;
ALTER TABLE `insalate_ordine`
  ADD CONSTRAINT `fk_insalate_ordine_insalate` FOREIGN KEY (`id_insalate`) REFERENCES `insalate` (`id`) ON DELETE CASCADE;

ALTER TABLE `panini_ordini`
  ADD CONSTRAINT `fk_panini_ordini_ordini` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`) ON DELETE CASCADE;
ALTER TABLE `panini_ordini`
  ADD CONSTRAINT `fk_panini_ordini_panini` FOREIGN KEY (`id_panini`) REFERENCES `panini` (`id`) ON DELETE CASCADE;

ALTER TABLE `pizze_ordini`
  ADD CONSTRAINT `fk_pizze_ordini_ordini` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`) ON DELETE CASCADE;
ALTER TABLE `pizze_ordini`
  ADD CONSTRAINT `fk_pizze_ordini_pizze` FOREIGN KEY (`id_pizza`) REFERENCES `pizze` (`id`) ON DELETE CASCADE;


  CREATE TABLE IF NOT EXISTS `utenti` (
  `username` varchar(255) NOT NULL,
  `paswword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
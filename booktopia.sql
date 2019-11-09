-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.4
-- Timp de generare: nov. 09, 2019 la 04:38 PM
-- Versiune server: 10.4.6-MariaDB
-- Versiune PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `booktopia`
--

DELIMITER $$
--
-- Funcții
--
CREATE DEFINER=`root`@`localhost` FUNCTION `F` (`var` INT) RETURNS INT(11) NO SQL
RETURN POWER(2,3)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `books`
--

CREATE TABLE `books` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishing_house` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(101) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `ISBN` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inShop` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(12, 'Arme Matematice de Distrugere', 'CATHY O\'NEIL', 'Nemira', 'Nominalizata la National Book Award\n\nModelele matematice care ne reglementeaza viata sunt opace si incontestabile, chiar daca gresesc, avertizeaza Cathy O’Neil, fosta jurnalista la Wall Street Journal. Si, mai rau, alimenteaza discriminarea intr-un „cocktail toxic pentru democratie“.\n\nIntr-o epoca in care cele mai multe aspecte din existenta noastra cad sub incidenta datelor analizate automat, e necesar sa le intelegem mecanismele si sa chestionam modelele. Descoperiti latura intunecata a Big Data!\n\n„Autoarea cunoaste puterea si riscurile modelelor matematice, dar are si darul analogiei, ceea ce o face una dintre cele mai competente comentatoare a folosirii datelor ca arme.“', '12.jpg', 29.99, NULL, 1),
(117, 'The Hunger Games', 'Suzanne Collins', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '117.jpg', 430.01, NULL, 1),
(118, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '118.jpg', 572.20, NULL, 1),
(119, 'Twilight', 'Stephenie Meyer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '119.jpg', 477.35, NULL, 1),
(120, 'To Kill a Mockingbird', 'Harper Lee', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '120.jpg', 982.01, NULL, 1),
(121, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '121.jpg', 397.46, NULL, 1),
(122, 'The Fault in Our Stars', 'John Green', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '122.jpg', 789.86, NULL, 1),
(123, 'The Hobbit or There and Back Again', 'J.R.R. Tolkien', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '123.jpg', 270.66, NULL, 1),
(124, 'The Catcher in the Rye', 'J.D. Salinger', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '124.jpg', 775.33, NULL, 1),
(125, 'Angels & Demons', 'Dan Brown', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '125.jpg', 148.35, NULL, 1),
(126, 'Pride and Prejudice', 'Jane Austen', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '126.jpg', 398.67, NULL, 1),
(127, 'The Kite Runner ', 'Khaled Hosseini', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '127.jpg', 221.60, NULL, 1),
(128, 'Divergent', 'Veronica Roth', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '128.jpg', 785.43, NULL, 1),
(129, 'Nineteen Eighty-Four', 'George Orwell, Erich Fromm, Celâl Üster', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '129.jpg', 679.05, NULL, 1),
(130, 'Animal Farm: A Fairy Story', 'George Orwell', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '130.jpg', 108.58, NULL, 1),
(131, 'Het Achterhuis: Dagboekbrieven 14 juni 1942 - 1 augustus 1944', 'Anne Frank, Eleanor Roosevelt, B.M. Mooyaart-Doubleday', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '131.jpg', 577.42, NULL, 1),
(132, 'Män som hatar kvinnor', 'Stieg Larsson, Reg Keeland', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '132.jpg', 649.01, NULL, 1),
(133, 'Catching Fire', 'Suzanne Collins', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '133.jpg', 33.50, NULL, 1),
(134, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling, Mary GrandPré, Rufus Beck', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '134.jpg', 135.95, NULL, 1),
(135, ' The Fellowship of the Ring', 'J.R.R. Tolkien', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '135.jpg', 223.70, NULL, 1),
(136, 'Mockingjay', 'Suzanne Collins', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '136.jpg', 542.13, NULL, 1),
(137, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '137.jpg', 598.44, NULL, 1),
(138, 'The Lovely Bones', 'Alice Sebold', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '138.jpg', 121.47, NULL, 1),
(139, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '139.jpg', 371.75, NULL, 1),
(140, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '140.jpg', 506.79, NULL, 1),
(141, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '141.jpg', 225.45, NULL, 1),
(142, 'The Da Vinci Code', 'Dan Brown', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '142.jpg', 788.71, NULL, 1),
(143, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '143.jpg', 546.50, NULL, 1),
(144, 'Lord of the Flies ', 'William Golding', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '144.jpg', 40.14, NULL, 1),
(145, 'An Excellent conceited Tragedie of Romeo and Juliet', 'William Shakespeare, Robert           Jackson', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '145.jpg', 237.22, NULL, 1),
(146, 'Gone Girl', 'Gillian Flynn', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '146.jpg', 2.52, NULL, 1),
(147, 'The Help', 'Kathryn Stockett', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '147.jpg', 871.24, NULL, 1),
(148, 'Of Mice and Men ', 'John Steinbeck', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '148.jpg', 679.69, NULL, 1),
(149, 'Memoirs of a Geisha', 'Arthur Golden', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '149.png', 649.56, NULL, 1),
(150, 'Fifty Shades of Grey', 'E.L. James', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '150.jpg', 839.66, NULL, 1),
(151, 'O Alquimista', 'Paulo Coelho, Alan R. Clarke', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '151.jpg', 693.77, NULL, 1),
(152, 'The Giver', 'Lois Lowry', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '152.jpg', 551.61, NULL, 1),
(153, 'The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '153.jpg', 853.61, NULL, 1),
(154, 'The Time Traveler\'s Wife', 'Audrey Niffenegger', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '154.jpg', 976.92, NULL, 1),
(155, 'A Game of Thrones', 'George R.R. Martin', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '155.jpg', 530.23, NULL, 1),
(156, 'Eat, pray, love: one woman\'s search for everything across Italy, India and Indonesia', 'Elizabeth Gilbert', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '156.jpg', 552.34, NULL, 1),
(157, 'The Lightning Thief', 'Rick Riordan', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '157.jpg', 349.29, NULL, 1),
(158, 'Little Women', 'Louisa May Alcott', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '158.png', 612.45, NULL, 1),
(159, 'Jane Eyre', 'Charlotte Brontë, Michael Mason', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '159.jpg', 788.26, NULL, 1),
(160, 'The Notebook', 'Nicholas Sparks', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '160.jpg', 378.96, NULL, 1),
(161, 'Life of Pi', 'Yann Martel', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '161.jpg', 21.55, NULL, 1),
(162, 'Water for Elephants', 'Sara Gruen', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '162.jpg', 678.22, NULL, 1),
(163, 'The Book Thief', 'Markus Zusak', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '163.jpg', 540.34, NULL, 1),
(164, 'Fahrenheit 451', 'Ray Bradbury', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '164.jpg', 405.45, NULL, 1),
(165, 'New Moon (Twilight, #2)', 'Stephenie Meyer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '165.jpg', 810.97, NULL, 1),
(166, 'Where the Sidewalk Ends: The Poems and Drawings of Shel Silverstein', 'Shel Silverstein', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '166.jpg', 706.44, NULL, 1),
(167, 'City of Bones', 'Cassandra Clare', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '167.jpg', 97.82, NULL, 1),
(168, 'Eclipse', 'Stephenie Meyer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '168.jpg', 181.70, NULL, 1),
(169, 'Eragon', 'Christopher Paolini', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '169.jpg', 715.58, NULL, 1),
(170, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '170.jpg', 583.12, NULL, 1),
(171, 'Brave New World', 'Aldous Huxley', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '171.jpg', 561.33, NULL, 1),
(172, 'Breaking Dawn', 'Stephenie Meyer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '172.jpg', 689.47, NULL, 1),
(173, 'The Secret Life of Bees', 'Sue Monk Kidd', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '173.jpg', 736.86, NULL, 1),
(174, 'The Adventures of Huckleberry Finn', 'Mark Twain, John Seelye, Guy Cardwell', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '174.jpg', 356.80, NULL, 1),
(175, 'Charlotte\'s Web', 'E.B. White, Garth Williams, Rosemary Wells', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '175.jpg', 907.99, NULL, 1),
(176, 'The Curious Incident of the Dog in the Night-Time', 'Mark Haddon', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '176.jpg', 460.15, NULL, 1),
(177, 'The Girl on the Train', 'Paula Hawkins', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '177.jpg', 290.96, NULL, 1),
(178, 'Northern Lights', 'Philip Pullman', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '178.jpg', 731.69, NULL, 1),
(179, 'Wuthering Heights', 'Emily Brontë, Richard J. Dunn', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '179.png', 654.64, NULL, 1),
(180, 'My Sister\'s Keeper', 'Jodi Picoult', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '180.jpg', 986.57, NULL, 1),
(181, 'Slaughterhouse-Five, or The Children\'s Crusade: A Duty-Dance with Death ', 'Kurt Vonnegut Jr.', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '181.jpg', 211.69, NULL, 1),
(182, 'Gone with the Wind', 'Margaret Mitchell', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '182.jpg', 2.00, NULL, 1),
(183, 'A Thousand Splendid Suns', 'Khaled Hosseini', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '183.jpg', 871.27, NULL, 1),
(184, 'The Perks of Being a Wallflower', 'Stephen Chbosky', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '184.jpg', 293.34, NULL, 1);
INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(185, 'Insurgent', 'Veronica Roth', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '185.jpg', 88.38, NULL, 1),
(186, 'Ender\'s Game', 'Orson Scott Card', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '186.jpg', 157.39, NULL, 1),
(187, 'Frankenstein; or, The Modern Prometheus', 'Mary Wollstonecraft Shelley, Percy Bysshe Shelley, Maurice Hindle', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '187.jpg', 157.47, NULL, 1),
(188, 'The Shining', 'Stephen King', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '188.jpg', 999.95, NULL, 1),
(189, 'The Host', 'Stephenie Meyer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '189.jpg', 713.09, NULL, 1),
(190, 'Looking for Alaska', 'John Green', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '190.jpg', 918.78, NULL, 1),
(192, 'Sense and Sensibility', 'Jane Austen, Tony Tanner, Ros Ballaster', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '192.jpg', 136.33, NULL, 1),
(193, 'Holes', 'Louis Sachar, Louis Sachar', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '193.jpg', 836.17, NULL, 1),
(194, 'The Devil Wears Prada', 'Lauren Weisberger', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '194.png', 222.93, NULL, 1),
(195, 'Ὀδύσσεια', 'Homer, Robert Fagles, E.V. Rieu, Frédéric Mugler, Bernard Knox', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '195.jpg', 472.20, NULL, 1),
(196, 'Le Petit Prince', 'Antoine de Saint-Exupéry, Richard Howard, Dom Marcos Barbosa, Melina Karakosta', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '196.jpg', 218.62, NULL, 1),
(197, 'The Glass Castle', 'Jeannette Walls', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '197.jpg', 633.60, NULL, 1),
(198, 'Into the Wild', 'Jon Krakauer', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '198.jpg', 949.01, NULL, 1),
(199, 'A Tale of Two Cities', 'Charles Dickens, Richard Maxwell, Hablot Knight Browne', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '199.jpg', 886.59, NULL, 1),
(200, 'Jurassic Park', 'Michael Crichton', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '200.png', 381.76, NULL, 1),
(201, 'The Giving Tree', 'Shel Silverstein', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '201.jpg', 480.66, NULL, 1),
(202, 'A Time to Kill', 'John Grisham', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '202.png', 43.50, NULL, 1),
(203, 'Un di Velt Hot Geshvign', 'Elie Wiesel, Marion Wiesel', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '203.jpg', 303.72, NULL, 1),
(204, 'Paper Towns', 'John Green', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '204.jpg', 738.59, NULL, 1),
(205, 'The Princess Bride', 'William Goldman', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '205.jpg', 224.80, NULL, 1),
(206, 'The Outsiders', 'S.E. Hinton', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '206.jpg', 839.74, NULL, 1),
(207, 'The Maze Runner', 'James Dashner', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '207.jpg', 505.48, NULL, 1),
(208, 'Freakonomics: A Rogue Economist Explores the Hidden Side of Everything', 'Steven D. Levitt, Stephen J. Dubner', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '208.jpg', 108.97, NULL, 1),
(209, 'The Secret Garden', 'Frances Hodgson Burnett', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '209.jpg', 421.19, NULL, 1),
(210, 'Cien años de soledad', 'Gabriel García Márquez, Gregory Rabassa', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '210.jpg', 266.23, NULL, 1),
(211, 'The Picture of Dorian Gray', 'Oscar Wilde, Jeffrey Eugenides', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '211.jpg', 80.70, NULL, 1),
(212, 'Fifty Shades Freed', 'E.L. James', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '212.jpg', 177.04, NULL, 1),
(213, 'Dracula', 'Bram Stoker, Nina Auerbach, David J. Skal', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '213.jpg', 583.19, NULL, 1),
(214, 'Flickan som lekte med elden', 'Stieg Larsson, Reg Keeland', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '214.jpg', 530.60, NULL, 1),
(215, 'Fifty Shades Darker', 'E.L. James', 'Unknown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci aperiam, architecto\n                                  consequatur cupiditate dolorem dolores ducimus eligendi esse eveniet id incidunt natus\n                                  perferendis reprehenderit rerum saepe, sequi? Accusamus,\n                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum\n                                  enim nemo officia tempora! Culpa dicta ipsa maiores maxime perspiciatis vel!\n                                  Accusantium aperiam expedita facilis in optio quasi quo ratione rerum?', '215.jpg', 37.06, NULL, 1),
(217, 'cartepartener', 'cartepartener', 'cartepartener', 'cartepartenercartepartenercartepartenercartepartenercartepartenercartepartener', NULL, 122.00, NULL, 1),
(218, 'cartepartener2', 'cartepartener2', 'cartepartener2', 'cartepartener2cartepartener2cartepartener2cartepartener2cartepartener2cartepartener2', NULL, 121212.00, NULL, 1),
(219, 'carte1partener2', 'carte1partener2', 'carte1partener2', 'carte1partener2carte1partener2carte1partener2carte1partener2carte1partener2carte1partener2', NULL, 123.00, NULL, 0),
(220, 'Mountain View', 'Nicholas Perry', 'Arcadia Publishing', 'Mountain View earned its name for its scenic vantage point between the Santa Cruz and Diablo ranges. Founded as a stagecoach stop along the El Camino Real in 1852, Mountain View became a diverse and bountiful agricultural community in the \"Valley of Heart\'s Delight.\" During the depths of the Depression, Bay Area citizens raised almost half a million dollars to purchase land north of town that was offered to the navy. The gamble paid off with the opening of Moffett Naval Air Station in 1933, inaugurating Mountain View\'s turn toward commercial and residential development.', '220.jpg', 456.89, '0738531367', 1);
INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(431, 'Catomaniacs', 'Unknown', 'Unknown', '/9j/4AAQSkZJRgABAQEBLAEsAAD/2wBDAA4KCw0LCQ4NDA0QDw4RFiQXFhQUFiwgIRokNC43NjMuMjI6QVNGOj1OPjIySGJJTlZYXV5dOEVmbWVabFNbXVn/2wBDAQ8QEBYTFioXFypZOzI7WVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVn/wAARCAJYAyADAREAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAMEBQIBBgf/xABBEAACAgEDAQYDBgYBBAIBAwUBAgADEQQSITEFEyJBUWFxgZEUMqGxwdEGI0JS4fBiFSQz8UNyUyaCkrI0RNKi/8QAGQEBAQEBAQEAAAAAAAAAAAAAAAECAwQF/8QAKBEBAQEAAwACAgIDAQEAAwEAAAERAiExEkEDUWFxBCIyE0IzgZGx/9oADAMBAAIRAxEAPwD9JgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB5kZ6wPYCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBDqbhTVuPyktxZNYb6m6y8+LYc8Tl8rXXJFqvWWp4WcMfLJ6x8ql4xd0+sFgG/AJOMjpNzn+2bx/S11m2HsBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBA5LqucsBjrAi+0ozbayHOccdIEw94HsBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQMbte7+Z3WeMZInPl66cZ0yGd1YFVZ+OR+oMw6YnpY2I3fAKvkxOMR/aWfpKloBIW4Af1b8bW/aOhqUakqPF09jn6SzljNmrtVqWoHrYMp8xOsuudmO5UICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIEdtyVKS5AxM3lIslrI1faxAK18N/bnn/ABOd52us4RjXal1bc1i5PVQc/MzDccUdovVaCnCjzMstniXjL6+u0OoGpoFi8Cd5djhZlWZUICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB8x2q5/wCoO3pwDnHH6zjy9duPiKhQwKjaBjd/xA9TDSz3dYw1ljk9AAMfQSdHaRaqVP3OPPkmVO6itamsbt7Vc8HYfxkuLlW9Hq0G6xMYJ5Zfukyy53GLPqtaqxbUDKes6y652Y7lQgICAgICAgICAgICAgICAgICAgICAgICAgICAgeQK+q1denQlmA8pi8mpx1hanV3X1NZTUUU9LbgcfEL+WZjK69RmJob7QW77IJyTggfUGT4tbELaWmpv/O7k9Urz1/+xjIduS9aJgaVjk/12E5+mI2GPpf4a1BtosRgoKnovQTfCuX5I3J0cyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfK9snZqrcZ5PlOPL134eGm+4oYlV8gCSWPoD5w0n4Fu1Tlh5LwB8TJ9n0lUFhlshB1OPyjER27WXalS8eTcmTVk/apXpNjFkcrZnJ2Hn6YiRbV7Q60rYyBvEB4lPr646iWXHPlG5W4dc9D6TtLrlZjuVCAgICAgICAgICAgICAgICAgICAgICAgICAgedIFHW6tkqY1BSFHUnic7W+MfPazvbXFmo1K0Z4RSu6wj/iucD4zN/l1n8RENQunbai2l8eJ73DuffHSZvLPGvjr3v1suBcM5x97I4/aPkfHIlvVNVU1YKs+OG6Z+nWa9ZnXbAsJrfJr2WA7WXPB+Uw6Y+h/hO/OqtTjxL5DE3wvbl+SdPrZ2cCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfN9rOKta52q3ThhOPK5XfhNitVrF78cEsSFGPIegMz8u3T4dLlDBuK1Cjz4xmWX9M2Z6ssAq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', NULL, 431.31, NULL, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `books_categories`
--

CREATE TABLE `books_categories` (
  `book_category_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `books_categories`
--

INSERT INTO `books_categories` (`book_category_id`, `book_id`, `category_id`) VALUES
(51, 117, 2),
(52, 117, 3),
(53, 117, 9),
(54, 117, 12),
(57, 118, 3),
(58, 118, 9),
(59, 118, 12),
(61, 119, 2),
(62, 119, 3),
(64, 119, 12),
(67, 120, 3),
(69, 120, 12),
(72, 121, 3),
(74, 121, 12),
(76, 125, 2),
(77, 125, 3),
(79, 125, 12),
(80, 125, 13),
(82, 123, 3),
(84, 123, 12),
(85, 123, 13),
(87, 142, 3),
(89, 142, 12),
(91, 143, 2),
(92, 143, 3),
(93, 143, 9),
(94, 143, 12),
(95, 143, 13),
(96, 152, 2),
(97, 152, 3),
(98, 152, 9),
(99, 152, 12),
(106, 164, 2),
(107, 164, 3),
(108, 164, 9),
(109, 164, 12),
(111, 213, 2),
(112, 213, 3),
(114, 213, 12),
(116, 175, 2),
(117, 175, 3),
(118, 175, 9),
(119, 175, 12),
(121, 185, 2),
(122, 185, 3),
(123, 185, 9),
(124, 185, 12),
(126, 184, 2),
(127, 184, 3),
(128, 184, 9),
(129, 184, 12),
(132, 195, 3),
(134, 195, 12),
(136, 12, 2),
(137, 12, 3),
(138, 12, 9),
(139, 12, 12),
(143, 218, 2),
(144, 218, 9),
(145, 218, 12),
(148, 220, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `books_comments`
--

CREATE TABLE `books_comments` (
  `book_comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `approvals` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `books_comments`
--

INSERT INTO `books_comments` (`book_comment_id`, `user_id`, `book_id`, `approvals`, `text`, `date`) VALUES
(1, 2, 220, 1, 'Comentariu clientnouu', '2019-06-25'),
(3, 5, 12, 0, 'a treia e cu nororcs\n\n\nÎ\n\nș', '2019-05-27'),
(4, 5, 12, 0, 'qwertyuiopq', '2019-05-27'),
(5, 5, 12, 0, 'ă î â ș țqqqqqq', '2019-05-27'),
(8, 5, 12, 1, 'ceva', '2019-05-27'),
(9, 6, 12, 1, 'comentariu de la client', '2019-05-31'),
(10, 9, 161, 2, 'My first comment on this book. ^_^', '2019-06-02'),
(11, 9, 164, 1, 'Primul comentariu de la cartea cu id 164', '2019-06-02'),
(12, 9, 152, 0, 'primul comentariu Daniel', '2019-06-13');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `buys`
--

CREATE TABLE `buys` (
  `buy_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `buys`
--

INSERT INTO `buys` (`buy_id`, `book_id`, `user_id`, `invoice_id`, `quantity`) VALUES
(1, 142, 9, 1, 4),
(2, 220, 9, 2, 1),
(3, 182, 3, 3, 2),
(4, 182, 3, 4, 3),
(5, 182, 9, 5, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(2, 'Thriller'),
(3, 'Nou'),
(9, 'Mystery'),
(12, 'Love'),
(13, 'Sci Fi');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `billing_address` varchar(201) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(201) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withPoints` tinyint(4) NOT NULL,
  `step` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `date`, `billing_address`, `delivery_address`, `withPoints`, `step`) VALUES
(1, '2019-06-22 17:25:56', 'Str Lorem Ipsum Nr 6', 'Str Lorem Ipsum Nr 6', 0, 'registered'),
(2, '2019-06-22 18:03:02', 'Str Lorem Ipsum Nr 6', 'Str Lorem Ipsum Nr 6', 0, 'registered'),
(3, '2019-06-26 09:42:43', 'abc', 'abc', 0, 'registered'),
(4, '2019-06-26 09:43:10', 'abc', 'abc', 0, 'registered'),
(5, '2019-06-26 09:47:12', 'Str Lorem IpNr 6', 'Str Lorem IpNr 6', 0, 'registered');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_30_112859_create_roles_table', 1),
(4, '2018_11_30_120556_create_users_roles_table', 1),
(5, '2018_11_30_153546_create_profiles_table', 1),
(6, '2018_11_30_153755_create_books_table', 1),
(7, '2018_11_30_153838_create_categories_table', 1),
(8, '2018_11_30_154336_create_ratings_table', 1),
(9, '2018_11_30_154922_create_stocks_table', 1),
(10, '2018_11_30_155416_create_requirements_table', 1),
(11, '2018_11_30_155645_create_books_categories_table', 1),
(12, '2018_11_30_155726_create_books_comments_table', 1),
(13, '2018_12_06_072535_create_invoices_table', 1),
(14, '2018_12_06_073552_create_buys_table', 1),
(15, '2019_01_13_161421_create_stats_table', 1),
(16, '2019_03_26_095721_create_offers_table', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` int(11) DEFAULT NULL,
  `wishlist` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `profiles`
--

INSERT INTO `profiles` (`profile_id`, `first_name`, `last_name`, `phone`, `adress`, `photo`, `wallet`, `wishlist`, `user_id`) VALUES
(1, 'Pîrvu', 'Daniel', NULL, NULL, NULL, 0, NULL, 5),
(2, 'client', NULL, NULL, NULL, NULL, 1, NULL, 3),
(4, 'client', NULL, NULL, NULL, NULL, 0, '117, 12, 118', 6),
(5, 'Daniel Cătălin', 'Pîrvu', '0722222222', 'Str Lorem Ipsum Nr 6', NULL, 147, '12, 142, 196, 117, 220', 9),
(6, 'Partner', NULL, NULL, NULL, NULL, 0, NULL, 7),
(7, 'Example', 'Client', NULL, NULL, NULL, 0, NULL, 12),
(8, 'Danut', 'Pirvu', NULL, NULL, NULL, NULL, NULL, 11),
(9, 'Daniel', NULL, NULL, NULL, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `book_id`, `value`) VALUES
(1, 5, 12, 5),
(2, 5, 117, 2),
(3, 9, 12, 5),
(4, 9, 196, 5),
(5, 9, 152, 5),
(6, 9, 123, 5),
(7, 9, 213, 2),
(8, 9, 220, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `requirements`
--

CREATE TABLE `requirements` (
  `requirement_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `increment` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Neutral 1 = Accepted -1 = Denied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `user_id`, `book_id`, `increment`, `status`) VALUES
(3, 7, 217, 0, 1),
(4, 7, 217, 4, -1),
(5, 7, 218, 0, 1),
(6, 7, 218, -1, 0),
(7, 10, 219, 0, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'Client'),
(2, 'Partener'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `stats`
--

CREATE TABLE `stats` (
  `stat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `stocks`
--

INSERT INTO `stocks` (`stock_id`, `book_id`, `amount`) VALUES
(2, 12, 101),
(3, 117, 101),
(4, 118, 101),
(5, 119, 101),
(6, 120, 101),
(7, 121, 101),
(8, 122, 101),
(9, 123, 101),
(10, 124, 101),
(11, 125, 101),
(12, 126, 101),
(13, 127, 101),
(14, 128, 101),
(15, 129, 101),
(16, 130, 101),
(17, 131, 101),
(18, 132, 101),
(19, 133, 101),
(20, 134, 101),
(21, 135, 101),
(22, 136, 101),
(23, 137, 101),
(24, 138, 101),
(25, 139, 101),
(26, 140, 101),
(27, 141, 101),
(28, 142, 97),
(29, 143, 101),
(30, 144, 101),
(31, 145, 101),
(32, 146, 101),
(33, 147, 101),
(34, 148, 101),
(35, 149, 101),
(36, 150, 101),
(37, 151, 101),
(38, 152, 101),
(39, 153, 101),
(40, 154, 101),
(41, 155, 101),
(42, 156, 101),
(43, 157, 101),
(44, 158, 101),
(45, 159, 101),
(46, 160, 101),
(47, 161, 101),
(48, 162, 101),
(49, 163, 101),
(50, 164, 101),
(51, 165, 101),
(52, 166, 101),
(53, 167, 101),
(54, 168, 101),
(55, 169, 101),
(56, 170, 101),
(57, 171, 101),
(58, 172, 101),
(59, 173, 101),
(60, 174, 101),
(61, 175, 101),
(62, 176, 101),
(63, 177, 101),
(64, 178, 101),
(65, 179, 101),
(66, 180, 101),
(67, 181, 101),
(68, 182, 0),
(69, 183, 101),
(70, 184, 101),
(71, 185, 101),
(72, 186, 101),
(73, 187, 101),
(74, 188, 101),
(75, 189, 101),
(76, 190, 101),
(78, 192, 101),
(79, 193, 101),
(80, 194, 101),
(81, 195, 101),
(82, 196, 101),
(83, 197, 101),
(84, 198, 101),
(85, 199, 101),
(86, 200, 101),
(87, 201, 101),
(88, 202, 101),
(89, 203, 101),
(90, 204, 101),
(91, 205, 101),
(92, 206, 101),
(93, 207, 101),
(94, 208, 101),
(95, 209, 101),
(96, 210, 101),
(97, 211, 101),
(98, 212, 101),
(99, 213, 101),
(100, 214, 101),
(101, 215, 102),
(103, 217, 101),
(104, 218, 101),
(105, 219, 101),
(106, 220, 100);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Client', 'clientnou@booktopia.com', '$2y$10$xNVfoZhfjCVSENmbUmi.RORzZR3MogFUeu3lJG9u1zTa8jo5Pa93O', '0xD9ovrbMcFto8fnOU174NJDI06gC3ziYdlQBJD9q66AP8ncPaQqUbasSClB', '2019-06-25 15:16:28', '2019-06-25 15:16:28'),
(3, 'client', 'clientnou1@gmail.com', '$2y$10$PEJp5.e7vtTv61gpnfQd4u8sDYYl8NKXxa0fkEsYMwbNFbaMP.Eg2', '8xebyrMkanwgiYmQVe1EJUhNNzKPo21gYfK6FPv9sHugZAWOHI247vX3aOdE', '2019-06-26 06:41:35', '2019-06-26 06:41:35'),
(5, 'admin', 'admin@booktopia.com', '$2y$10$tss7iI3ft65SgRCxCmtdsOfdbdckRlOyN2.ESSm38LwoFKQ1kRUQS', 'aoAbT31unfyb0LjdmYLbPqy5uVuBsn4Jwu1KEXUpHrui2oaZjnWESDX3ZuIH', '2018-12-24 11:11:46', '2018-12-24 11:11:46'),
(6, 'client', 'client@booktopia.com', '$2y$10$7yIInx6lz3684ZvgmPdAnu6Sw6IaELZW9vzS7Cnh9QbHb6B6OWWlK', '7Z4fhEcoy2LoiCC0Brk5aYByoMrHpl2oO5NVVGy4L2zfFUwd1uBJI2QSHeeO', '2018-12-28 16:24:06', '2018-12-28 16:24:06'),
(7, 'Partner', 'partener@booktopia.com', '$2y$10$X0hn3FO8LiJFCH3BoXmhHuSjifaK6u0HeAsw9oSZQHeGRMHs2jQQe', 'XVC2W3ICy82lIDwJ7p2oFvLHZWYvQYlyrgBOLYWVzMB7c7Ea4AhsZZ6GFI5e', '2019-01-13 09:21:20', '2019-01-13 09:21:20'),
(9, 'Daniel', 'daniel.catalin.pirvu@gmail.com', '$2y$10$wdMgpY33XXV/KoRrQ44fgeXE2/PFH.ofkacsNRfCDHkA1xqGYYPaW', 'Wf64qw771LpEzOWZW6uQUpPOueNUd3nXWkdhJhh4nUEgatPKMeDhfA3vbDO4', '2019-05-31 15:26:31', '2019-10-27 14:49:12'),
(10, 'Partener2', 'partener2@booktopia.com', '$2y$10$KtYv22ZzgUXQXT9wizV1g.fmlTyWDwGEDwJmqFn18KWJOO6v/oFA6', 'GFPyjDA47Xfmf2LnaGg4nXJvlzl1A6AoxkBiPXhMXytQXA2wDeTg4NuGmSdj', '2019-06-03 07:16:19', '2019-06-03 07:16:19'),
(11, 'Danut', 'danut_pirvu2008@yahoo.com', '$2y$10$//H32nPBfan.ZNMVJRBbMOMSMn2cukx0oWLh00ho.m3/molSwMcom', 'ywnfUW8X2Sfznf2Tb2EWB7WYgYEg80WekApOe0c5kCxk6TspGxCGwmCuNZi2', '2019-06-04 01:41:08', '2019-10-12 04:23:54'),
(12, 'ExampleClient', 'example@domain.com', '$2y$10$rlo6z6pUDSBrpHVAR76l..wP7Yl1XUBZQ0mFuhW2fMI0yqJijZXr2', 'oNoQJS9ZkvHODUoEjd2qJc1CoF1r9vbg6EaQwYNyHn2td60Sis2RIibaj0kZ', '2019-06-10 10:32:10', '2019-06-10 10:32:10'),
(13, 'DanielAdmin', 'daniel-catalin.pirvu@my.fmi.unibuc.ro', '$2y$10$gsckr6I0Ve93c0sqh7OPBuXPih3exIx23wmQ7YcZRL9JJZcpjnmZS', 'PrcAN8OpdZAKDRtSVzppj4OK8vxP2mQtfzCoAQmhI2kl2RDPafs9uFZdA3AE', '2019-10-27 10:41:11', '2019-10-27 10:41:11'),
(469, 'Radu', 'pp89@gmail.com', '$2y$10$QnmkqcKONwaalAoksjh6BegMn9XnQEW3XJcvSFVJf4jX3647Utdyy', NULL, '2019-01-20 12:08:06', '2019-01-20 12:08:06');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users_roles`
--

CREATE TABLE `users_roles` (
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `users_roles`
--

INSERT INTO `users_roles` (`user_role_id`, `role_id`, `user_id`) VALUES
(3, 2, 2),
(4, 1, 3),
(37, 1, 6),
(51, 3, 5),
(54, 2, 7),
(57, 3, 9),
(63, 2, 10),
(64, 2, 11),
(68, 1, 12),
(69, 1, 13),
(70, 1, 469);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexuri pentru tabele `books_categories`
--
ALTER TABLE `books_categories`
  ADD PRIMARY KEY (`book_category_id`),
  ADD KEY `books_categories_book_id_foreign` (`book_id`),
  ADD KEY `books_categories_category_id_foreign` (`category_id`);

--
-- Indexuri pentru tabele `books_comments`
--
ALTER TABLE `books_comments`
  ADD PRIMARY KEY (`book_comment_id`),
  ADD KEY `books_comments_user_id_foreign` (`user_id`),
  ADD KEY `books_comments_book_id_foreign` (`book_id`);

--
-- Indexuri pentru tabele `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `buys_book_id_foreign` (`book_id`),
  ADD KEY `buys_user_id_foreign` (`user_id`),
  ADD KEY `buys_invoice_id_foreign` (`invoice_id`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexuri pentru tabele `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `offers_book_id_foreign` (`book_id`);

--
-- Indexuri pentru tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexuri pentru tabele `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexuri pentru tabele `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_book_id_foreign` (`book_id`);

--
-- Indexuri pentru tabele `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirement_id`),
  ADD KEY `requirements_user_id_foreign` (`user_id`),
  ADD KEY `requirements_book_id_foreign` (`book_id`);

--
-- Indexuri pentru tabele `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexuri pentru tabele `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexuri pentru tabele `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stocks_book_id_foreign` (`book_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexuri pentru tabele `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`),
  ADD KEY `users_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT pentru tabele `books_categories`
--
ALTER TABLE `books_categories`
  MODIFY `book_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT pentru tabele `books_comments`
--
ALTER TABLE `books_comments`
  MODIFY `book_comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `buys`
--
ALTER TABLE `buys`
  MODIFY `buy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pentru tabele `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `stats`
--
ALTER TABLE `stats`
  MODIFY `stat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT pentru tabele `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `user_role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `books_comments`
--
ALTER TABLE `books_comments`
  ADD CONSTRAINT `books_comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `buys_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `requirements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: oct. 12, 2019 la 09:18 AM
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
(8, 5, 12, 0, 'ceva', '2019-05-27'),
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

--
-- Eliminarea datelor din tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('danut_pirvu2008@yahoo.com', '$2y$10$QMsy7keDb/QWHfqHm1EopukcO6UnIUMRXfeaJvQoLvOQZqrJQB6q2', '2018-12-07 06:13:12');

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
(7, 'Example', 'Client', NULL, NULL, NULL, 0, NULL, 12);

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
(9, 'Daniel', 'daniel.catalin.pirvu@gmail.com', '$2y$10$ORK2l/TwoDqfE7x1iTERgOsgnGLgWSzHD3G1EQP1LR6YsjwswQwZ2', 'ciz3PHj5kho0oFxhwQBoHUdBbKySMZGorz65wMOL4PAFBME9oUrqtC9ZCACT', '2019-05-31 15:26:31', '2019-05-31 15:26:31'),
(10, 'Partener2', 'partener2@booktopia.com', '$2y$10$KtYv22ZzgUXQXT9wizV1g.fmlTyWDwGEDwJmqFn18KWJOO6v/oFA6', 'GFPyjDA47Xfmf2LnaGg4nXJvlzl1A6AoxkBiPXhMXytQXA2wDeTg4NuGmSdj', '2019-06-03 07:16:19', '2019-06-03 07:16:19'),
(11, 'Danut', 'danut_pirvu2008@yahoo.com', '$2y$10$9vcFOFMH7TjXaHZFiefkEednUbEqbXX0jXgnObV46pYl9ghCtUWT2', 'SXK5lguYUtZZlh9C0QB0TBLu6TCCFe2zRpFrQ97kut628l44rgtDsunv62rA', '2019-06-04 01:41:08', '2019-06-04 01:41:08'),
(12, 'ExampleClient', 'example@domain.com', '$2y$10$rlo6z6pUDSBrpHVAR76l..wP7Yl1XUBZQ0mFuhW2fMI0yqJijZXr2', 'oNoQJS9ZkvHODUoEjd2qJc1CoF1r9vbg6EaQwYNyHn2td60Sis2RIibaj0kZ', '2019-06-10 10:32:10', '2019-06-10 10:32:10');

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
(68, 1, 12);

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
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

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
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `user_role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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

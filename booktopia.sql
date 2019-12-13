-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.4
-- Generation Time: Dec 13, 2019 at 04:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booktopia`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `F` (`var` INT) RETURNS VARCHAR(30) CHARSET latin1 NO SQL
RETURN TO_BASE64("@booktopia.com")$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
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
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(12, 'Arme Matematice de Distrugere', 'CATHY O\'NEIL', 'Nemira', 'Nominalizata la National Book Award\n\nModelele matematice care ne reglementeaza viata sunt opace si incontestabile, chiar daca gresesc, avertizeaza Cathy O’Neil, fosta jurnalista la Wall Street Journal. Si, mai rau, alimenteaza discriminarea intr-un „cocktail toxic pentru democratie“.\n\nIntr-o epoca in care cele mai multe aspecte din existenta noastra cad sub incidenta datelor analizate automat, e necesar sa le intelegem mecanismele si sa chestionam modelele. Descoperiti latura intunecata a Big Data!\n\n„Autoarea cunoaste puterea si riscurile modelelor matematice, dar are si darul analogiei, ceea ce o face una dintre cele mai competente comentatoare a folosirii datelor ca arme.“', '12.jpg', 29.99, NULL, 1),
(117, 'The Hunger Games', 'Suzanne Collins', 'Unknown', 'Winning means fame and fortune. Losing means certain death. The Hunger Games have begun. . . .\n\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.\n\nSixteen-year-old Katniss Everdeen regards it as a death sentence when she steps forward to take her sister\'s place in the Games. But Katniss has been close to dead before-and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weigh survival against humanity and life against love.', '117.jpg', 430.01, NULL, 1),
(118, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling, Mary GrandPré', 'Unknown', ' Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!\n\nThese new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It\'s time to PASS THE MAGIC ON.', '118.jpg', 572.20, NULL, 1),
(119, 'Twilight', 'Stephenie Meyer', 'Unknown', 'Isabella Swan\'s move to Forks, a small, perpetually rainy town in Washington, could have been the most boring move she ever made. But once she meets the mysterious and alluring Edward Cullen, Isabella\'s life takes a thrilling and terrifying turn.\n\nUp until now, Edward has managed to keep his vampire identity a secret in the small community he lives in, but now nobody is safe, especially Isabella, the person Edward holds most dear. The lovers find themselves balanced precariously on the point of a knife-between desire and danger.\n\nDeeply romantic and extraordinarily suspenseful, Twilightcaptures the struggle between defying our instincts and satisfying our desires. This is a love story with bite.', '119.jpg', 477.35, NULL, 1),
(120, 'To Kill a Mockingbird', 'Harper Lee', 'Unknown', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\n\nCompassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', '120.jpg', 982.01, NULL, 1),
(121, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Unknown', 'In The Great Gatsby, F. Scott Fitzgerald captures the flamboyance, the carelessness and the cruelty of the wealthy during America\'s Jazz Age. The Great Gatsby lives mysteriously in a luxurious Long Island mansion, playing lavish host to hundreds of people. And yet no one seems to know him or how he became so rich. He is rumoured to be everything from a German spy to a war hero. People clamour for invitations to his wild parties. But Jay Gatsby doesn\'t heed them. He cares for one person alone - Daisy Buchanan, the woman he has waited for all his life. Little does he know that his infatuation will lead to tragedy and end in murder. This beautiful Macmillan Collector\'s Library edition of The Great Gatsby features an afterword by David Stuart Davies. Designed to appeal to the booklover, the Macmillan Collector\'s Library is a series of beautiful gift editions of much loved classic titles. Macmillan Collector\'s Library are books to love and treasure.', '121.jpg', 397.46, NULL, 1),
(122, 'The Fault in Our Stars', 'John Green', 'Unknown', 'Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel\'s story is about to be completely rewritten.\n\nInsightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Green\'s most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love.', '122.jpg', 789.86, NULL, 1),
(123, 'The Hobbit or There and Back Again', 'J.R.R. Tolkien', 'Unknown', 'Written for J.R.R. Tolkien’s own children, The Hobbit met with instant critical acclaim when it was first published in 1937. Now recognized as a timeless classic, this introduction to the hobbit Bilbo Baggins, the wizard Gandalf, Gollum, and the spectacular world of Middle-earth recounts of the adventures of a reluctant hero, a powerful and dangerous ring, and the cruel dragon Smaug the Magnificent. The text in this 372-page paperback edition is based on that first published in Great Britain by Collins Modern Classics (1998), and includes a note on the text by Douglas A. Anderson (2001). Unforgettable!', '123.jpg', 270.66, NULL, 1),
(124, 'The Catcher in the Rye', 'J.D. Salinger', 'Unknown', 'The hero-narrator of The Catcher in the Rye is an ancient child of sixteen, a native New Yorker named Holden Caulfield. Through circumstances that tend to preclude adult, secondhand description, he leaves his prep school in Pennsylvania and goes underground in New York City for three days. The boy himself is at once too simple and too complex for us to make any final comment about him or his story. Perhaps the safest thing we can say about Holden is that he was born in the world not just strongly attracted to beauty but, almost, hopelessly impaled on it. There are many voices in this novel: children\'s voices, adult voices, underground voices-but Holden\'s voice is the most eloquent of all. Transcending his own vernacular, yet remaining marvelously faithful to it, he issues a perfectly articulated cry of mixed pain and pleasure. However, like most lovers and clowns and poets of the higher orders, he keeps most of the pain to, and for, himself. The pleasure he gives away, or sets aside, with all his heart. It is there for the reader who can handle it to keep.', '124.jpg', 775.33, NULL, 1),
(125, 'Angels & Demons', 'Dan Brown', 'Unknown', 'World-renowned Harvard symbologist Robert Langdon is summoned to a Swiss research facility to analyze a cryptic symbol seared into the chest of a murdered physicist. What he discovers is unimaginable: a deadly vendetta against the Catholic Church by a centuries-old underground organization -- the Illuminati. In a desperate race to save the Vatican from a powerful time bomb, Langdon joins forces in Rome with the beautiful and mysterious scientist Vittoria Vetra. Together they embark on a frantic hunt through sealed crypts, dangerous catacombs, and deserted cathedrals, and into the depths of the most secretive vault on earth...the long-forgotten Illuminati lair.', '125.jpg', 148.35, NULL, 1),
(126, 'Pride and Prejudice', 'Jane Austen', 'Unknown', 'Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work \"her own darling child\" and its vivacious heroine, Elizabeth Bennet, \"as delightful a creature as ever appeared in print.\" The romantic clash between the opinionated Elizabeth and her proud beau, Mr. Darcy, is a splendid performance of civilized sparring. And Jane Austen\'s radiant wit sparkles as her characters dance a delicate quadrille of flirtation and intrigue, making this book the most superb comedy of manners of Regency England.', '126.jpg', 398.67, NULL, 1),
(127, 'The Kite Runner ', 'Khaled Hosseini', 'Unknown', 'Amir is the son of a wealthy Kabul merchant, a member of the ruling caste of Pashtuns. Hassan, his servant and constant companion, is a Hazara, a despised and impoverished caste. Their uncommon bond is torn by Amir\'s choice to abandon his friend amidst the increasing ethnic, religious, and political tensions of the dying years of the Afghan monarchy, wrenching them far apart. But so strong is the bond between the two boys that Amir journeys back to a distant world, to try to right past wrongs against the only true friend he ever had.\n\nThe unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about the power of reading, the price of betrayal, and the possibility of redemption; and an exploration of the power of fathers over sons—their love, their sacrifices, their lies.', '127.jpg', 221.60, NULL, 1),
(128, 'Divergent', 'Veronica Roth', 'Unknown', 'In Beatrice Prior\'s dystopian Chicago world, society is divided into five factions, each dedicated to the cultivation of a particular virtue—Candor (the honest), Abnegation (the selfless), Dauntless (the brave), Amity (the peaceful), and Erudite (the intelligent). On an appointed day of every year, all sixteen-year-olds must select the faction to which they will devote the rest of their lives. For Beatrice, the decision is between staying with her family and being who she really is—she can\'t have both. So she makes a choice that surprises everyone, including herself.\n\nDuring the highly competitive initiation that follows, Beatrice renames herself Tris and struggles alongside her fellow initiates to live out the choice they have made. Together they must undergo extreme physical tests of endurance and intense psychological simulations, some with devastating consequences. As initiation transforms them all, Tris must determine who her friends really are—and where, exactly, a romance with a sometimes fascinating, sometimes exasperating boy fits into the life she\'s chosen. But Tris also has a secret, one she\'s kept hidden from everyone because she\'s been warned it can mean death. And as she discovers unrest and growing conflict that threaten to unravel her seemingly perfect society, she also learns that her secret might help her save those she loves . . . or it might destroy her.', '128.jpg', 785.43, NULL, 1),
(129, 'Nineteen Eighty-Four', 'George Orwell, Erich Fromm, Celâl Üster', 'Unknown', 'Insight Study Guides are written by experts and cover a range of popular literature, plays and films. Designed to provide insight and an overview about each text for students and teachers, these guides endeavor to develop knowledge and understanding rather than just provide answers and summaries.', '129.jpg', 679.05, NULL, 1),
(130, 'Animal Farm: A Fairy Story', 'George Orwell', 'Unknown', 'George Orwell\'s timeless and timely allegorical novel—a scathing satire on a downtrodden society’s blind march towards totalitarianism.\n\n“All animals are equal, but some animals are more equal than others.”\n\nA farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned—a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.\n\nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.', '130.jpg', 108.58, NULL, 1),
(131, 'Het Achterhuis: Dagboekbrieven 14 juni 1942 - 1 augustus 1944', 'Anne Frank, Eleanor Roosevelt, B.M. Mooyaart-Doubleday', 'Unknown', 'Anne Frank hield van 12 juni 1942 tot 1 augustus 1944 een dagboek bij. Ze schreef haar brieven alleen voor zichzelf, tot ze in de lente van 1944 op de radio de minister van Onderwijs in ballingschap, Bolkestein, hoorde spreken. Hij zei dat na de oorlog alle getuigenissen van het lijden van het Nederlandse volk onder de Duitse bezetting verzameld en openbaar moesten worden gemaakt. Als voorbeeld noemde hij onder meer dagboeken. Onder de indruk van deze redevoering besloot Anne Frank na de oorlog een boek te publiceren. Haar dagboek zou daarvoor als basis dienen.\n\nIn maart 1945 stierf Anne Frank op vijftienjarige leeftijd in het concentratiekamp Bergen-Belsen. De enige overlevende van de familie, Otto Frank, zorgde ervoor dat het dagboek van zijn dochter toch gepubliceerd werd. In 1947 verscheen Het Achterhuis.', '131.jpg', 577.42, NULL, 1),
(132, 'Män som hatar kvinnor', 'Stieg Larsson, Reg Keeland', 'Unknown', 'Källa: Wikipedia. Sidor: 48. Kapitlen: Män som hatar kvinnor, Jägarna, Sigillet, Flickan som lekte med elden, Luftslottet som sprängdes, Sista dansen, Gula divisionen, I lagens namn, Van Veeteren - Carambole, Svart Lucia, Johan Falk - Gruppen för särskilda insatser, Den tredje vägen, Vendetta, Thriller - en grym film, Van Veeteren - Moreno och tystnaden, Roseanna, Skenbart - en film om tåg, Den 5:e kvinnan, Van Veeteren - Fallet G, Sommarmord, Van Veeteren - Borkmanns punkt, Van Veeteren - Svalan, Katten, Rosen, Döden, \"Harry Lund\" lägger näsan i blöt , Sista kontraktet, Wallander - Innan frosten, Varg Veum - Bittra blomster, Wallander - Hämnden, Mannen som blev miljonär, Hamilton, Kraftverk 3714, Den gula bilen, Hundarna i Riga, Händerna, Dödlig drift, Flygnivå 450, Täcknamn Coq Rouge, Storm, Wallander - Byfånen, Spring för livet, Hassel - Terrorns finger, Hassel - Utpressarna, Wallander - Jokern, Van Veeteren - Münsters fall, Noll tolerans, Wallander - Mastermind, Wallander - Mörkret, Ögat, Johan Falk - Leo Gaut, Wallander - Kuriren, Wallander - Cellisten, Hemligheten, Den demokratiske terroristen, Den vita lejoninnan, Wallander - Hemligheten, Tatuerad torso, Johan Falk - National Target, Steget efter, Hassel - Svarta banken, Hassel - Säkra papper, Damen i svart, Tusenbröder - Återkomsten, Wallander - Vittnet, Jägarna 2, Johan Falk - De fredlösa, Wallander - Afrikanen, Wallander - Skulden, Johan Falk - Vapenbröder, Hassel - Slavhandlarna, Wallander - Tjuven, Farligt löfte, Hurvamorden, Hassel - De giriga, Råttornas vinter, Wallander - Prästen, Johan Falk - Operation Näktergal, Järngänget, Falsk som vatten, Wallander - Bröderna, Wallander - Indrivaren, Hassel - Offren, Wallander - Luftslottet, Wallander - Skytten, Moln över Hellesta, Wallander - Dödsängeln, Dykaren, Passageraren, Pyramiden, Den osynlige, Wallander - Vålnaden, Exit, Wallander - Den svaga punkten, Blå måndag, Hassel - Förgörarna, Wallander - Täckmanteln, Farligt förflutet, Villospår, Apan, Sjön, ... ', '132.jpg', 649.01, NULL, 1),
(133, 'Catching Fire', 'Suzanne Collins', 'Unknown', 'Against all odds, Katniss has won the Hunger Games. She and fellow District 12 tribute Peeta Mellark are miraculously still alive. Katniss should be relieved, happy even. After all, she has returned to her family and her longtime friend, Gale. Yet nothing is the way Katniss wishes it to be. Gale holds her at an icy distance. Peeta has turned his back on her completely. And there are whispers of a rebellion against the Capitol - a rebellion that Katniss and Peeta may have helped create.\n\nMuch to her shock, Katniss has fueled an unrest she\'s afraid she cannot stop. And what scares her even more is that she\'s not entirely convinced she should try. As time draws near for Katniss and Peeta to visit the districts on the Capitol\'s cruel Victory Tour, the stakes are higher than ever. If they can\'t prove, without a shadow of a doubt, that they are lost in their love for each other, the consequences will be horrifying.\n\nIn Catching Fire, the second novel in the Hunger Games trilogy, Suzanne Collins continues the story of Katniss Everdeen, testing her more than ever before...and surprising readers at every turn.', '133.jpg', 33.50, NULL, 1),
(134, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling, Mary GrandPré, Rufus Beck', 'Unknown', 'Harry Potter\'s third year at Hogwarts is full of new dangers. A convicted murderer, Sirius Black, has broken out of Azkaban prison, and it seems he\'s after Harry. Now Hogwarts is being patrolled by the dementors, the Azkaban guards who are hunting Sirius. But Harry can\'t imagine that Sirius or, for that matter, the evil Lord Voldemort could be more frightening than the dementors themselves, who have the terrible power to fill anyone they come across with aching loneliness and despair. Meanwhile, life continues as usual at Hogwarts. A top-of-the-line broom takes Harry\'s success at Quidditch, the sport of the Wizarding world, to new heights. A cute fourth-year student catches his eye. And he becomes close with the new Defense of the Dark Arts teacher, who was a childhood friend of his father. Yet despite the relative safety of life at Hogwarts and the best efforts of the dementors, the threat of Sirius Black grows ever closer. But if Harry has learned anything from his education in wizardry, it is that things are often not what they seem. Tragic revelations, heartwarming surprises, and high-stakes magical adventures await the boy wizard in this funny and poignant third installment of the beloved series.', '134.jpg', 135.95, NULL, 1),
(135, ' The Fellowship of the Ring', 'J.R.R. Tolkien', 'Unknown', 'One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkeness bind them\n\nIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, The Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell into the hands of Bilbo Baggins, as told in The Hobbit.\n\nIn a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as his elderly cousin Bilbo entrusts the Ring to his care. Frodo must leave his home and make a perilous journey across Middle-earth to the Cracks of Doom, there to destroy the Ring and foil the Dark Lord in his evil purpose.', '135.jpg', 223.70, NULL, 1),
(136, 'Mockingjay', 'Suzanne Collins', 'Unknown', 'Katniss Everdeen, girl on fire, has survived, even though her home has been destroyed. Gale has escaped. Katniss\'s family is safe. Peeta has been captured by the Capitol. District 13 really does exist. There are rebels. There are new leaders. A revolution is unfolding.\n\nIt is by design that Katniss was rescued from the arena in the cruel and haunting Quarter Quell, and it is by design that she has long been part of the revolution without knowing it. District 13 has come out of the shadows and is plotting to overthrow the Capitol. Everyone, it seems, has had a hand in the carefully laid plans--except Katniss.\n\nThe success of the rebellion hinges on Katniss\'s willingness to be a pawn, to accept responsibility for countless lives, and to change the course of the future of Panem. To do this, she must put aside her feelings of anger and distrust. She must become the rebels\' Mockingjay--no matter what the personal cost.', '136.jpg', 542.13, NULL, 1),
(137, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'There is a door at the end of a silent corridor. And it’s haunting Harry Pottter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?\n\nHarry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams. But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named---a threat that neither the magical government nor the authorities at Hogwarts can stop.\n\nAs the grasp of darkness tightens, Harry must discover the true depth and strength of his friends, the importance of boundless loyalty, and the shocking price of unbearable sacrifice.\n\nHis fate depends on them all.', '137.jpg', 598.44, NULL, 1),
(138, 'The Lovely Bones', 'Alice Sebold', 'Unknown', 'The Lovely Bones is the story of a family devastated by a gruesome murder -- a murder recounted by the teenage victim. Upsetting, you say? Remarkably, first-time novelist Alice Sebold takes this difficult material and delivers a compelling and accomplished exploration of a fractured family\'s need for peace and closure.\n\nThe details of the crime are laid out in the first few pages: from her vantage point in heaven, Susie Salmon describes how she was confronted by the murderer one December afternoon on her way home from school. Lured into an underground hiding place, she was raped and killed. But what the reader knows, her family does not. Anxiously, we keep vigil with Susie, aching for her grieving family, desperate for the killer to be found and punished.\n\nSebold creates a heaven that\'s calm and comforting, a place whose residents can have whatever they enjoyed when they were alive -- and then some. But Susie isn\'t ready to release her hold on life just yet, and she intensely watches her family and friends as they struggle to cope with a reality in which she is no longer a part. To her great credit, Sebold has shaped one of the most loving and sympathetic fathers in contemporary literature.', '138.jpg', 121.47, NULL, 1),
(139, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he\'s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike\n\nAnd strike it does. For in Harry\'s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls\' bathroom, and the unwanted attentions of Ron Weasley\'s younger sister, Ginny.\n\nBut each of these seem minor annoyances when the real trouble begins, and someone -- or something -- starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects . . . Harry Potter himself?', '139.jpg', 371.75, NULL, 1),
(140, 'Harry Potter and the Goblet of Fire', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that\'s supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn\'t happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he\'s not normal - even by wizarding standards. And in his case, different can be deadly.', '140.jpg', 506.79, NULL, 1),
(141, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'Harry Potter is leaving Privet Drive for the last time. But as he climbs into the sidecar of Hagrid’s motorbike and they take to the skies, he knows Lord Voldemort and the Death Eaters will not be far behind.\n\nThe protective charm that has kept him safe until now is broken. But the Dark Lord is breathing fear into everything he loves. And he knows he can’t keep hiding.\n\nTo stop Voldemort, Harry knows he must find the remaining Horcruxes and destroy them.\n\nHe will have to face his enemy in one final battle.', '141.jpg', 225.45, NULL, 1),
(142, 'The Da Vinci Code', 'Dan Brown', 'Unknown', 'While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling symbols. As Langdon and gifted French cryptologist Sophie Neveu sort through the bizarre riddles, they are stunned to discover a trail of clues hidden in the works of Leonardo da Vinci—clues visible for all to see and yet ingeniously disguised by the painter.\n\nEven more startling, the late curator was involved in the Priory of Sion—a secret society whose members included Sir Isaac Newton, Victor Hugo, and Da Vinci—and he guarded a breathtaking historical secret. Unless Langdon and Neveu can decipher the labyrinthine puzzle—while avoiding the faceless adversary who shadows their every move—the explosive, ancient truth will be lost forever. ', '142.jpg', 788.71, NULL, 1),
(143, 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling, Mary GrandPré', 'Unknown', 'When Harry Potter and the Half-Blood Prince opens, the war against Voldemort has begun. The Wizarding world has split down the middle, and as the casualties mount, the effects even spill over onto the Muggles. Dumbledore is away from Hogwarts for long periods, and the Order of the Phoenix has suffered grievous losses. And yet, as in all wars, life goes on.\n\nHarry, Ron, and Hermione, having passed their O.W.L. level exams, start on their specialist N.E.W.T. courses. Sixth-year students learn to Apparate, losing a few eyebrows in the process. Teenagers flirt and fight and fall in love. Harry becomes captain of the Gryffindor Quidditch team, while Draco Malfoy pursues his own dark ends. And classes are as fascinating and confounding as ever, as Harry receives some extraordinary help in Potions from the mysterious Half-Blood Prince.\n\nMost importantly, Dumbledore and Harry work together to uncover the full and complex story of a boy once named Tom Riddle—the boy who became Lord Voldemort. Like Harry, he was the son of one Muggle-born and one Wizarding parent, raised unloved, and a speaker of Parseltongue. But the similarities end there, as the teenaged Riddle became deeply interested in the Dark objects known as Horcruxes: objects in which a wizard can hide part of his soul, if he dares splinter that soul through murder.\n\nHarry must use all the tools at his disposal to draw a final secret out of one of Riddle’s teachers, the sly Potions professor Horace Slughorn. Finally Harry and Dumbledore hold the key to the Dark Lord’s weaknesses... until a shocking reversal exposes Dumbledore’s own vulnerabilities, and casts Harry’s—and Hogwarts’s—future in shadow.', '143.jpg', 546.50, NULL, 1),
(144, 'Lord of the Flies ', 'William Golding', 'Unknown', 'At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate; this far from civilization the boys can do anything they want. Anything. They attempt to forge their own society, failing, however, in the face of terror, sin and evil. And as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far from reality as the hope of being rescued. Labeled a parable, an allegory, a myth, a morality tale, a parody, a political treatise, even a vision of the apocalypse, Lord of the Flies is perhaps our most memorable novel about “the end of innocence, the darkness of man’s heart.”', '144.jpg', 40.14, NULL, 1),
(145, 'An Excellent conceited Tragedie of Romeo and Juliet', 'William Shakespeare, Robert           Jackson', 'Unknown', 'The Shakespearean Originals series aims to provide readers of modern drama with 16th- and 17th-century playtexts which have been treated as historical documents, and are reproduced as closely to their original printed forms as the conditions of modern publication will permit. Each volume in the series comprises a general series introduction, an introduction to the play, the original text, a select bibliography, full annotations and some sample facsimile pages from the text itself.', '145.jpg', 237.22, NULL, 1),
(146, 'Gone Girl', 'Gillian Flynn', 'Unknown', 'Marriage can be a real killer.\n\nOn a warm summer morning in North Carthage, Missouri, it is Nick and Amy Dunne’s fifth wedding anniversary. Presents are being wrapped and reservations are being made when Nick’s clever and beautiful wife disappears from their rented McMansion on the Mississippi River. Husband-of-the-Year Nick isn’t doing himself any favors with cringe-worthy daydreams about the slope and shape of his wife’s head, but passages from Amy\'s diary reveal the alpha-girl perfectionist could have put anyone dangerously on edge. Under mounting pressure from the police and the media—as well as Amy’s fiercely doting parents—the town golden boy parades an endless series of lies, deceits, and inappropriate behavior. Nick is oddly evasive, and he’s definitely bitter—but is he really a killer?\n\nAs the cops close in, every couple in town is soon wondering how well they know the one that they love. With his twin sister, Margo, at his side, Nick stands by his innocence. Trouble is, if Nick didn’t do it, where is that beautiful wife? And what was in that silvery gift box hidden in the back of her bedroom closet?\n\nWith her razor-sharp writing and trademark psychological insight, Gillian Flynn delivers a fast-paced, devilishly dark, and ingeniously plotted thriller that confirms her status as one of the hottest writers around.\n\nOne of the most critically acclaimed suspense writers of our time, New York Times bestseller Gillian Flynn takes that statement to its darkest place in this unputdownable masterpiece about a marriage gone terribly, terribly wrong. The Chicago Tribune proclaimed that her work “draws you in and keeps you reading with the force of a pure but nasty addiction.” Gone Girl’s toxic mix of sharp-edged wit and deliciously chilling prose creates a nerve-fraying thriller that confounds you at every turn.', '146.jpg', 2.52, NULL, 1),
(147, 'The Help', 'Kathryn Stockett', 'Unknown', 'Three ordinary women are about to take one extraordinary step.\n\nTwenty-two-year-old Skeeter has just returned home after graduating from Ole Miss. She may have a degree, but it is 1962, Mississippi, and her mother will not be happy till Skeeter has a ring on her finger. Skeeter would normally find solace with her beloved maid Constantine, the woman who raised her, but Constantine has disappeared and no one will tell Skeeter where she has gone.\n\nAibileen is a black maid, a wise, regal woman raising her seventeenth white child. Something has shifted inside her after the loss of her own son, who died while his bosses looked the other way. She is devoted to the little girl she looks after, though she knows both their hearts may be broken.\n\nMinny, Aibileen\'s best friend, is short, fat, and perhaps the sassiest woman in Mississippi. She can cook like nobody\'s business, but she can\'t mind her tongue, so she\'s lost yet another job. Minny finally finds a position working for someone too new to town to know her reputation. But her new boss has secrets of her own.\n\nSeemingly as different from one another as can be, these women will nonetheless come together for a clandestine project that will put them all at risk. And why? Because they are suffocating within the lines that define their town and their times. And sometimes lines are made to be crossed.\n\nIn pitch-perfect voices, Kathryn Stockett creates three extraordinary women whose determination to start a movement of their own forever changes a town, and the way women, mothers, daughters, caregivers, friends, view one another. A deeply moving novel filled with poignancy, humor, and hope, The Help is a timeless and universal story about the lines we abide by, and the ones we don\'t. ', '147.jpg', 871.24, NULL, 1),
(148, 'Of Mice and Men ', 'John Steinbeck', 'Unknown', 'The compelling story of two outsiders striving to find their place in an unforgiving world. Drifters in search of work, George and his simple-minded friend Lennie have nothing in the world except each other and a dream--a dream that one day they will have some land of their own. Eventually they find work on a ranch in California’s Salinas Valley, but their hopes are doomed as Lennie, struggling against extreme cruelty, misunderstanding and feelings of jealousy, becomes a victim of his own strength. Tackling universal themes such as the friendship of a shared vision, and giving voice to America’s lonely and dispossessed, Of Mice and Men has proved one of Steinbeck’s most popular works, achieving success as a novel, a Broadway play and three acclaimed films. ', '148.jpg', 679.69, NULL, 1),
(149, 'Memoirs of a Geisha', 'Arthur Golden', 'Unknown', 'A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite lyricism the true confessions of one of Japan\'s most celebrated geisha.\n\nIn Memoirs of a Geisha, we enter a world where appearances are paramount; where a girl\'s virginity is auctioned to the highest bidder; where women are trained to beguile the most powerful men; and where love is scorned as illusion. It is a unique and triumphant work of fiction - at once romantic, erotic, suspenseful - and completely unforgettable.', '149.png', 649.56, NULL, 1),
(150, 'Fifty Shades of Grey', 'E.L. James', 'Unknown', 'When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him. Unable to resist Ana’s quiet beauty, wit, and independent spirit, Grey admits he wants her, too—but on his own terms.\n\nShocked yet thrilled by Grey’s singular erotic tastes, Ana hesitates. For all the trappings of success—his multinational businesses, his vast wealth, his loving family—Grey is a man tormented by demons and consumed by the need to control. When the couple embarks on a daring, passionately physical affair, Ana discovers Christian Grey’s secrets and explores her own dark desires.\n\nErotic, amusing, and deeply moving, the Fifty Shades Trilogy is a tale that will obsess you, possess you, and stay with you forever.', '150.jpg', 839.66, NULL, 1),
(151, 'O Alquimista', 'Paulo Coelho, Alan R. Clarke', 'Unknown', 'O Alquimista é a história de um jovem que tem um sonho repetido com um tesouro oculto guardado perto das pirâmides do Egipto. Este resolve seguir o seu sonho, enfrenta as maiores dificuldades, atravessa desertos e defronta-se com os grandes mistérios que acompanham o Homem desde o começo dos tempos: os sinais de Deus, a Lenda Pessoal que cada um de nós tem que viver, a misteriosa Alma do Mundo, onde qualquer pessoa pode penetrar se ouvir a voz do seu coração.', '151.jpg', 693.77, NULL, 1),
(152, 'The Giver', 'Lois Lowry', 'Unknown', 'Twelve-year-old Jonas lives in a seemingly ideal world. Not until he is given his life assignment as the Receiver does he begin to understand the dark secrets behind this fragile community.', '152.jpg', 551.61, NULL, 1),
(153, 'The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'Unknown', 'There are a thousand stories in the land of Narnia, and the first is about to be told in an extraordinary motion picture, The Chronicles of Narnia: The Lion, the Witch and the Wardrobe, from Walt Disney Pictures and Walden Media.\n\nIn the never-ending war between good and evil, The Chronicles of Narnia set the stage for battles of epic proportions. Some take place in vast fields, where the forces of light and darkness clash. But other battles occur within the small chambers of the heart and are equally decisive.\n\nJourneys to the ends of the world, fantastic creatures, betrayals, heroic deeds and friendships won and lost -- all come together in an unforgettable world of magic. So join the battle to end all battles.\n\nThe second volume in\n\nThe Chronicles of Narnia®\n\nThe Lion, the Witch and the Wardrobe\n\nNarnia .... a land frozen in eternal winter ... a country waiting to be set free.\n\nFour adventurers step through a wardrobe door and into the land of Narnia -- a land enslaved by the power of the White Witch. But when almost all hope is lost, the return of the Great Lion, Aslan, signals a great change ... and a great sacrifice.', '153.jpg', 853.61, NULL, 1),
(154, 'The Time Traveler\'s Wife', 'Audrey Niffenegger', 'Unknown', 'A funny, often poignant tale of boy meets girl with a twist: what if one of them couldn\'t stop slipping in and out of time? Highly original and imaginative, this debut novel raises questions about life, love, and the effects of time on relationships.\n\nAudrey Niffenegger’s innovative debut, The Time Traveler’s Wife, is the story of Clare, a beautiful art student, and Henry, an adventuresome librarian, who have known each other since Clare was six and Henry was thirty-six, and were married when Clare was twenty-three and Henry thirty-one. Impossible but true, because Henry is one of the first people diagnosed with Chrono-Displacement Disorder: periodically his genetic clock resets and he finds himself misplaced in time, pulled to moments of emotional gravity in his life, past and future. His disappearances are spontaneous, his experiences unpredictable, alternately harrowing and amusing.\n\nThe Time Traveler’s Wife depicts the effects of time travel on Henry and Clare’s marriage and their passionate love for each other as the story unfolds from both points of view. Clare and Henry attempt to live normal lives, pursuing familiar goals—steady jobs, good friends, children of their own. All of this is threatened by something they can neither prevent nor control, making their story intensely moving and entirely unforgettable.', '154.jpg', 976.92, NULL, 1),
(155, 'A Game of Thrones', 'George R.R. Martin', 'Unknown', 'Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.\n\nA GAME OF THRONES\n\nLong ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens.\n\nHere an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.', '155.jpg', 530.23, NULL, 1),
(156, 'Eat, pray, love: one woman\'s search for everything across Italy, India and Indonesia', 'Elizabeth Gilbert', 'Unknown', 'Eat, Pray, Love: One Woman\'s Search for Everything Across Italy, India, and Indonesia Study Guide consists of approx. 57 pages of summaries and analysis on Eat, Pray, Love: One Woman\'s Search for Everything Across Italy, India, and Indonesia by Elizabeth Gilbert.', '156.jpg', 552.34, NULL, 1),
(157, 'The Lightning Thief', 'Rick Riordan', 'Unknown', 'Percy Jackson is a good kid, but he can\'t seem to focus on his schoolwork or control his temper. And lately, being away at boarding school is only getting worse - Percy could have sworn his pre-algebra teacher turned into a monster and tried to kill him. When Percy\'s mom finds out, she knows it\'s time that he knew the truth about where he came from, and that he go to the one place he\'ll be safe. She sends Percy to Camp Half Blood, a summer camp for demigods (on Long Island), where he learns that the father he never knew is Poseidon, God of the Sea. Soon a mystery unfolds and together with his friends—one a satyr and the other the demigod daughter of Athena - Percy sets out on a quest across the United States to reach the gates of the Underworld (located in a recording studio in Hollywood) and prevent a catastrophic war between the gods.', '157.jpg', 349.29, NULL, 1),
(158, 'Little Women', 'Louisa May Alcott', 'Unknown', 'Generations of readers young and old, male and female, have fallen in love with the March sisters of Louisa May Alcott’s most popular and enduring novel, Little Women. Here are talented tomboy and author-to-be Jo, tragically frail Beth, beautiful Meg, and romantic, spoiled Amy, united in their devotion to each other and their struggles to survive in New England during the Civil War.\n\nIt is no secret that Alcott based Little Women on her own early life. While her father, the freethinking reformer and abolitionist Bronson Alcott, hobnobbed with such eminent male authors as Emerson, Thoreau, and Hawthorne, Louisa supported herself and her sisters with \"woman’s work,” including sewing, doing laundry, and acting as a domestic servant. But she soon discovered she could make more money writing. Little Women brought her lasting fame and fortune, and far from being the \"girl’s book” her publisher requested, it explores such timeless themes as love and death, war and peace, the conflict between personal ambition and family responsibilities, and the clash of cultures between Europe and America.', '158.png', 612.45, NULL, 1),
(159, 'Jane Eyre', 'Charlotte Brontë, Michael Mason', 'Unknown', 'Orphaned as a child, Jane has felt an outcast her whole young life. Her courage is tested once again when she arrives at Thornfield Hall, where she has been hired by the brooding, proud Edward Rochester to care for his ward Adèle. Jane finds herself drawn to his troubled yet kind spirit. She falls in love. Hard.\n\nBut there is a terrifying secret inside the gloomy, forbidding Thornfield Hall. Is Rochester hiding from Jane? Will Jane be left heartbroken and exiled once again?', '159.jpg', 788.26, NULL, 1),
(160, 'The Notebook', 'Nicholas Sparks', 'Unknown', 'Set amid the austere beauty of the North Carolina coast, The Notebook begins with the story of Noah Calhoun, a rural Southerner recently returned from the Second World War. Noah is restoring a plantation home to its former glory, and he is haunted by images of the beautiful girl he met fourteen years earlier, a girl he loved like no other. Unable to find her, yet unwilling to forget the summer they spent together, Noah is content to live with only memories...until she unexpectedly returns to his town to see him once again.\n\nLike a puzzle within a puzzle, the story of Noah and Allie is just the beginning. As it unfolds, their tale miraculously becomes something different, with much higher stakes. The result is a deeply moving portrait of love itself, the tender moments and the fundamental changes that affect us all. It is a story of miracles and emotions that will stay with you forever.', '160.jpg', 378.96, NULL, 1),
(161, 'Life of Pi', 'Yann Martel', 'Unknown', 'Life of Pi is a fantasy adventure novel by Yann Martel published in 2001. The protagonist, Piscine Molitor \"Pi\" Patel, a Tamil boy from Pondicherry, explores issues of spirituality and practicality from an early age. He survives 227 days after a shipwreck while stranded on a boat in the Pacific Ocean with a Bengal tiger named Richard Parker.', '161.jpg', 21.55, NULL, 1),
(162, 'Water for Elephants', 'Sara Gruen', 'Unknown', 'An atmospheric, gritty, and compelling novel of star-crossed lovers, set in the circus world circa 1932, by the bestselling author of Riding Lessons.\n\nWhen Jacob Jankowski, recently orphaned and suddenly adrift, jumps onto a passing train, he enters a world of freaks, drifters, and misfits, a second-rate circus struggling to survive during the Great Depression, making one-night stands in town after endless town. A veterinary student who almost earned his degree, Jacob is put in charge of caring for the circus menagerie. It is there that he meets Marlena, the beautiful young star of the equestrian act, who is married to August, the charismatic but twisted animal trainer. He also meets Rosie, an elephant who seems untrainable until he discovers a way to reach her.\n\nBeautifully written, Water for Elephants is illuminated by a wonderful sense of time and place. It tells a story of a love between two people that overcomes incredible odds in a world in which even love is a luxury that few can afford.', '162.jpg', 678.22, NULL, 1),
(163, 'The Book Thief', 'Markus Zusak', 'Unknown', 'It is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will be busier still.\n\nBy her brother\'s graveside, Liesel\'s life is changed when she picks up a single object, partially hidden in the snow. It is The Gravedigger\'s Handbook, left behind there by accident, and it is her first act of book thievery. So begins a love affair with books and words, as Liesel, with the help of her accordian-playing foster father, learns to read. Soon she is stealing books from Nazi book-burnings, the mayor\'s wife\'s library, wherever there are books to be found.\n\nBut these are dangerous times. When Liesel\'s foster family hides a Jew in their basement, Liesel\'s world is both opened up, and closed down.\n\nIn superbly crafted writing that burns with intensity, award-winning author Markus Zusak has given us one of the most enduring stories of our time.', '163.jpg', 540.34, NULL, 1),
(164, 'Fahrenheit 451', 'Ray Bradbury', 'Unknown', 'Guy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden.\n\nMontag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television \'family\'. But then he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people did not live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television.\n\nWhen Mildred attempts suicide and Clarisse suddenly disappears, Montag begins to question everything he has ever known.', '164.jpg', 405.45, NULL, 1),
(165, 'New Moon (Twilight, #2)', 'Stephenie Meyer', 'Unknown', 'I knew we were both in mortal danger. Still, in that instant, I felt well. Whole. I could feel my heart racing in my chest, the blood pulsing hot and fast through my veins again. My lungs filled deep with the sweet scent that came off his skin. It was like there had never been any hole in my chest. I was perfect - not healed, but as if there had never been a wound in the first place.\n\nFor Bella Swan, there is one thing more important than life itself: Edward Cullen. But being in love with a vampire is even more dangerous than Bella could ever have imagined. Edward has already rescued Bella from the clutches of one evil vampire, but now, as their daring relationship threatens all that is near and dear to them, they realize their troubles may be just beginning...', '165.jpg', 810.97, NULL, 1);
INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(166, 'Where the Sidewalk Ends: The Poems and Drawings of Shel Silverstein', 'Shel Silverstein', 'Unknown', 'Shel Silverstein shook the staid world of children\'s poetry in 1974 with the publication of this collection, and things haven\'t been the same since. More than four and a half million copies of Where the Sidewalk Ends have been sold, making it the bestselling children\'s poetry book ever. With this and his other poetry collections (A Light in the Attic and Falling Up), Silverstein reveals his genius for reaching kids with silly words and simple pen-and-ink drawings. What child can resist a poem called \"Dancing Pants\" or \"The Dirtiest Man in the World\"? Each of the 130 poems is funny in a different way, or touching ... or both. Some approach naughtiness or are a bit disgusting to squeamish grown-ups, but that\'s exactly what kids like best about Silverstein\'s work. Jim Trelease, author of The New Read-Aloud Handbook, calls this book \"without question, the best-loved collection of poetry for children.\" (Ages 4 to 10) ', '166.jpg', 706.44, NULL, 1),
(167, 'City of Bones', 'Cassandra Clare', 'Unknown', 'When fifteen-year-old Clary Fray heads out to the Pandemonium Club in New York City, she hardly expects to witness a murder― much less a murder committed by three teenagers covered with strange tattoos and brandishing bizarre weapons. Then the body disappears into thin air. It\'s hard to call the police when the murderers are invisible to everyone else and when there is nothing―not even a smear of blood―to show that a boy has died. Or was he a boy?\n\nThis is Clary\'s first meeting with the Shadowhunters, warriors dedicated to ridding the earth of demons. It\'s also her first encounter with Jace, a Shadowhunter who looks a little like an angel and acts a lot like a jerk. Within twenty-four hours Clary is pulled into Jace\'s world with a vengeance when her mother disappears and Clary herself is attacked by a demon. But why would demons be interested in ordinary mundanes like Clary and her mother? And how did Clary suddenly get the Sight? The Shadowhunters would like to know...', '167.jpg', 97.82, NULL, 1),
(168, 'Eclipse', 'Stephenie Meyer', 'Unknown', 'As Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge, Bella once again finds herself surrounded by danger. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob - knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf. With her graduation quickly approaching, Bella has one more decision to make: life or death. But which is which?', '168.jpg', 181.70, NULL, 1),
(169, 'Eragon', 'Christopher Paolini', 'Unknown', 'One boy...\nOne dragon...\nA world of adventure.\n\nWhen Eragon finds a polished blue stone in the forest, he thinks it is the lucky discovery of a poor farm boy; perhaps it will buy his family meat for the winter. But when the stone brings a dragon hatchling, Eragon soon realizes he has stumbled upon a legacy nearly as old as the Empire itself.\n\nOvernight his simple life is shattered, and he is thrust into a perilous new world of destiny, magic, and power. With only an ancient sword and tge advice of an old storyteller for guidance, Eragon and the fledgling dragon must navigate the dangerous terrain and dark enemies of an Empire ruled by a king whose evil knows no bounds.\n\nCan Eragon take up the mantle of the legendary Dragon Riders? The fate of the Empire may rest in his hands.', '169.jpg', 715.58, NULL, 1),
(170, 'The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 'Unknown', 'Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker\'s Guide to the Galaxy who, for the last fifteen years, has been posing as an out-of-work actor.\n\nTogether this dynamic pair begin a journey through space aided by quotes from The Hitchhiker\'s Guide (\"A towel is about the most massively useful thing an interstellar hitchhiker can have\") and a galaxy-full of fellow travelers: Zaphod Beeblebrox—the two-headed, three-armed ex-hippie and totally out-to-lunch president of the galaxy; Trillian, Zaphod\'s girlfriend (formally Tricia McMillan), whom Arthur tried to pick up at a cocktail party once upon a time zone; Marvin, a paranoid, brilliant, and chronically depressed robot; Veet Voojagig, a former graduate student who is obsessed with the disappearance of all the ballpoint pens he bought over the years.', '170.jpg', 583.12, NULL, 1),
(171, 'Brave New World', 'Aldous Huxley', 'Unknown', 'Brave New World is a dystopian novel by English author Aldous Huxley, written in 1931 and published in 1932. Largely set in a futuristic World State, inhabited by genetically modified citizens and an intelligence-based social hierarchy, the novel anticipates huge scientific advancements in reproductive technology, sleep-learning, psychological manipulation and classical conditioning that are combined to make a dystopian society which is challenged by only a single individual: the story\'s protagonist.', '171.jpg', 561.33, NULL, 1),
(172, 'Breaking Dawn', 'Stephenie Meyer', 'Unknown', 'To be irrevocably in love with a vampire is both fantasy and nightmare woven into a dangerously heightened reality for Bella Swan. Pulled in one direction by her intense passion for Edward Cullen, and in another by her profound connection to werewolf Jacob Black, she has endured a tumultuous year of temptation, loss, and strife to reach the ultimate turning point. Her imminent choice to either join the dark but seductive world of immortals or to pursue a fully human life has become the thread from which the fates of two tribes hangs.\n\nNow that Bella has made her decision, a startling chain of unprecedented events is about to unfold with potentially devastating and unfathomable, consequences. Just when the frayed strands of Bella\'s life - first discovered in Twilight, then scattered and torn in New Moon and Eclipse - seem ready to heal and knit together, could they be destroyed... forever?', '172.jpg', 689.47, NULL, 1),
(173, 'The Secret Life of Bees', 'Sue Monk Kidd', 'Unknown', 'Set in South Carolina in 1964, The Secret Life of Bees tells the story of Lily Owens, whose life has been shaped around the blurred memory of the afternoon her mother was killed. When Lily\'s fierce-hearted black \"stand-in mother,\" Rosaleen, insults three of the deepest racists in town, Lily decides to spring them both free. They escape to Tiburon, South Carolina--a town that holds the secret to her mother\'s past. Taken in by an eccentric trio of black beekeeping sisters, Lily is introduced to their mesmerizing world of bees and honey, and the Black Madonna. This is a remarkable novel about divine female power, a story women will share and pass on to their daughters for years to come.', '173.jpg', 736.86, NULL, 1),
(174, 'The Adventures of Huckleberry Finn', 'Mark Twain, John Seelye, Guy Cardwell', 'Unknown', 'A nineteenth-century boy from a Mississippi River town recounts his adventures as he travels down the river with a runaway slave, encountering a family involved in a feud, two scoundrels pretending to be royalty, and Tom Sawyer\'s aunt who mistakes him for Tom.', '174.jpg', 356.80, NULL, 1),
(175, 'Charlotte\'s Web', 'E.B. White, Garth Williams, Rosemary Wells', 'Unknown', 'This beloved book by E. B. White, author of Stuart Little and The Trumpet of the Swan, is a classic of children\'s literature that is \"just about perfect.\" This high-quality paperback features vibrant illustrations colorized by Rosemary Wells!\n\nSome Pig. Humble. Radiant. These are the words in Charlotte\'s Web, high up in Zuckerman\'s barn. Charlotte\'s spiderweb tells of her feelings for a little pig named Wilbur, who simply wants a friend. They also express the love of a girl named Fern, who saved Wilbur\'s life when he was born the runt of his litter.\n\nE. B. White\'s Newbery Honor Book is a tender novel of friendship, love, life, and death that will continue to be enjoyed by generations to come. This edition contains newly color illustrations by Garth Williams, the acclaimed illustrator of E. B. White\'s Stuart Little and Laura Ingalls Wilder\'s Little House series, among many other books.', '175.jpg', 907.99, NULL, 1),
(176, 'The Curious Incident of the Dog in the Night-Time', 'Mark Haddon', 'Unknown', 'Christopher John Francis Boone knows all the countries of the world and their capitals and every prime number up to 7,057. He relates well to animals but has no understanding of human emotions. He cannot stand to be touched. And he detests the color yellow.\n\nAlthough gifted with a superbly logical brain, for fifteen-year-old Christopher everyday interactions and admonishments have little meaning. He lives on patterns, rules, and a diagram kept in his pocket. Then one day, a neighbor\'s dog, Wellington, is killed and his carefully constructive universe is threatened. Christopher sets out to solve the murder in the style of his favourite (logical) detective, Sherlock Holmes. What follows makes for a novel that is funny, poignant and fascinating in its portrayal of a person whose curse and blessing are a mind that perceives the world entirely literally.', '176.jpg', 460.15, NULL, 1),
(177, 'The Girl on the Train', 'Paula Hawkins', 'Unknown', 'Rachel catches the same commuter train every morning. She knows it will wait at the same signal each time, overlooking a row of back gardens. She’s even started to feel like she knows the people who live in one of the houses. “Jess and Jason,” she calls them. Their life—as she sees it—is perfect. If only Rachel could be that happy. And then she sees something shocking. It’s only a minute until the train moves on, but it’s enough. Now everything’s changed. Now Rachel has a chance to become a part of the lives she’s only watched from afar. Now they’ll see; she’s much more than just the girl on the train...', '177.jpg', 290.96, NULL, 1),
(178, 'The Golden Compass', 'Philip Pullman', 'Unknown', 'Lyra is rushing to the cold, far North, where witch clans and armored bears rule. North, where the Gobblers take the children they steal--including her friend Roger. North, where her fearsome uncle Asriel is trying to build a bridge to a parallel world.\n\nCan one small girl make a difference in such great and terrible endeavors? This is Lyra: a savage, a schemer, a liar, and as fierce and true a champion as Roger or Asriel could want--but what Lyra doesn\'t know is that to help one of them will be to betray the other.', '178.jpg', 731.69, NULL, 1),
(179, 'Wuthering Heights', 'Emily Brontë, Richard J. Dunn', 'Unknown', 'This best-selling Norton Critical Edition is based on the 1847 first edition of the novel. For the Fourth Edition, the editor has collated the 1847 text with several modern editions and has corrected a number of variants, including accidentals. The text is accompanied by entirely new explanatory annotations.\n\nNew to the fourth Edition are twelve of Emily Bronte\'s letters regarding the publication of the 1847 edition of Wuthering Heights as well as the evolution of the 1850 edition, prose and poetry selections by the author, four reviews of the novel, and poetry selections by the author, four reviews of the novel, and Edward Chitham\'s insightful and informative chronology of the creative process behind the beloved work.\n\nFive major critical interpretations of Wuthering Heights are included, three of them new to the Fourth Edition. A Stuart Daley considers the importance of chronology in the novel. J. Hillis Miller examines Wuthering Heights\'s problems of genre and critical reputation. Sandra M. Gilbert assesses the role of Victorian Christianity plays in the novel, while Martha Nussbaum traces the novel\'s romanticism. Finally, Lin Haire-Sargeant scrutinizes the role of Heathcliff in film adaptations of Wuthering Heights. ', '179.png', 654.64, NULL, 1),
(180, 'My Sister\'s Keeper', 'Jodi Picoult', 'Unknown', 'Anna is not sick, but she might as well be. By age thirteen, she has undergone countless surgeries, transfusions, and shots so that her older sister, Kate, can somehow fight the leukemia that has plagued her since childhood. The product of preimplantation genetic diagnosis, Anna was conceived as a bone marrow match for Kate—a life and a role that she has never challenged... until now. Like most teenagers, Anna is beginning to question who she truly is. But unlike most teenagers, she has always been defined in terms of her sister—and so Anna makes a decision that for most would be unthinkable, a decision that will tear her family apart and have perhaps fatal consequences for the sister she loves.\n\nA provocative novel that raises some important ethical issues, My Sister\'s Keeper is the story of one family\'s struggle for survival at all human costs and a stunning parable for all time.', '180.jpg', 986.57, NULL, 1),
(181, 'Slaughterhouse-Five, or The Children\'s Crusade: A Duty-Dance with Death ', 'Kurt Vonnegut Jr.', 'Unknown', 'Kurt Vonnegut\'s absurdist classic Slaughterhouse-Five introduces us to Billy Pilgrim, a man who becomes unstuck in time after he is abducted by aliens from the planet Tralfamadore. In a plot-scrambling display of virtuosity, we follow Pilgrim simultaneously through all phases of his life, concentrating on his (and Vonnegut\'s) shattering experience as an American prisoner of war who witnesses the firebombing of Dresden.\n\nSlaughterhouse-Five is not only Vonnegut\'s most powerful book, it is as important as any written since 1945. Like Catch- 22, it fashions the author\'s experiences in the Second World War into an eloquent and deeply funny plea against butchery in the service of authority. Slaughterhouse-Five boasts the same imagination, humanity, and gleeful appreciation of the absurd found in Vonnegut\'s other works, but the book\'s basis in rock-hard, tragic fact gives it a unique poignancy--and humor.', '181.jpg', 211.69, NULL, 1),
(182, 'Gone with the Wind', 'Margaret Mitchell', 'Unknown', 'Margaret Mitchell\'s monumental epic of the South won a Pulitzer Prize, gave rise to the most popular motion picture of our time, and inspired a sequel that became the fastest selling novel of the century. It is one of the most popular books ever written: more than 28 million copies of the book have been sold in more than 37 countries. Today, more than 60 years after its initial publication, its achievements are unparalleled, and it remains the most revered American saga and the most beloved work by an American writer...', '182.jpg', 2.00, NULL, 1),
(183, 'A Thousand Splendid Suns', 'Khaled Hosseini', 'Unknown', 'A Thousand Splendid Suns is a breathtaking story set against the volatile events of Afghanistan\'s last thirty years—from the Soviet invasion to the reign of the Taliban to post-Taliban rebuilding—that puts the violence, fear, hope, and faith of this country in intimate, human terms. It is a tale of two generations of characters brought jarringly together by the tragic sweep of war, where personal lives—the struggle to survive, raise a family, find happiness—are inextricable from the history playing out around them.\n\nPropelled by the same storytelling instinct that made The Kite Runner a beloved classic, A Thousand Splendid Suns is at once a remarkable chronicle of three decades of Afghan history and a deeply moving account of family and friendship. It is a striking, heart-wrenching novel of an unforgiving time, an unlikely friendship, and an indestructible love—a stunning accomplishment.', '183.jpg', 871.27, NULL, 1),
(184, 'The Perks of Being a Wallflower', 'Stephen Chbosky', 'Unknown', 'Now in a special edition to mark the twentieth anniversary of a beloved cult classic! Read the #1 New York Times bestselling coming-of-age story that takes a sometimes heartbreaking, often hysterical, and always honest look at high school in all its glory. Also a major motion picture starring Logan Lerman and Emma Watson, The Perks of Being a Wallflower is a funny, touching, and haunting modern classic.\n\nThe critically acclaimed debut novel from Stephen Chbosky follows observant “wallflower” Charlie as he charts a course through the strange world between adolescence and adulthood. First dates, family drama, and new friends. Sex, drugs, and The Rocky Horror Picture Show. Devastating loss, young love, and life on the fringes. Caught between trying to live his life and trying to run from it, Charlie must learn to navigate those wild and poignant roller-coaster days known as growing up.\n\nA #1 New York Times best seller for more than a year, an American Library Association Best Book for Young Adults (2000) and Best Book for Reluctant Readers (2000), and with millions of copies in print, this novel for teen readers (or “wallflowers” of more-advanced age) will make you laugh, cry, and perhaps feel nostalgic for those moments when you, too, tiptoed onto the dance floor of life. ', '184.jpg', 293.34, NULL, 1),
(185, 'Insurgent', 'Veronica Roth', 'Unknown', 'One choice can transform you—or it can destroy you. But every choice has consequences, and as unrest surges in the factions all around her, Tris Prior must continue trying to save those she loves—and herself—while grappling with haunting questions of grief and forgiveness, identity and loyalty, politics and love.\n\nTris\'s initiation day should have been marked by celebration and victory with her chosen faction; instead, the day ended with unspeakable horrors. War now looms as conflict between the factions and their ideologies grows. And in times of war, sides must be chosen, secrets will emerge, and choices will become even more irrevocable—and even more powerful. Transformed by her own decisions but also by haunting grief and guilt, radical new discoveries, and shifting relationships, Tris must fully embrace her Divergence, even if she does not know what she may lose by doing so.\n\nNew York Times bestselling author Veronica Roth\'s much-anticipated second book of the dystopian DIVERGENT series is another intoxicating thrill ride of a story, rich with hallmark twists, heartbreaks, romance, and powerful insights about human nature.', '185.jpg', 88.38, NULL, 1),
(186, 'Ender\'s Game', 'Orson Scott Card', 'Unknown', 'Andrew \"Ender\" Wiggin thinks he is playing computer simulated war games; he is, in fact, engaged in something far more desperate. The result of genetic experimentation, Ender may be the military genius Earth desperately needs in a war against an alien enemy seeking to destroy all human life. The only way to find out is to throw Ender into ever harsher training, to chip away and find the diamond inside, or destroy him utterly. Ender Wiggin is six years old when it begins. He will grow up fast.\n\nBut Ender is not the only result of the experiment. The war with the Buggers has been raging for a hundred years, and the quest for the perfect general has been underway almost as long. Ender\'s two older siblings, Peter and Valentine, are every bit as unusual as he is, but in very different ways. While Peter was too uncontrollably violent, Valentine very nearly lacks the capability for violence altogether. Neither was found suitable for the military\'s purpose. But they are driven by their jealousy of Ender, and by their inbred drive for power. Peter seeks to control the political process, to become a ruler. Valentine\'s abilities turn more toward the subtle control of the beliefs of commoner and elite alike, through powerfully convincing essays. Hiding their youth and identities behind the anonymity of the computer networks, these two begin working together to shape the destiny of Earth-an Earth that has no future at all if their brother Ender fails.', '186.jpg', 157.39, NULL, 1),
(187, 'Frankenstein; or, The Modern Prometheus', 'Mary Wollstonecraft Shelley, Percy Bysshe Shelley, Maurice Hindle', 'Unknown', 'Frankenstein; or, The Modern Prometheus is a novel written by English author Mary Shelley (1797–1851) that tells the story of Victor Frankenstein, a young scientist who creates a hideous sapient creature in an unorthodox scientific experiment. Shelley started writing the story when she was 18, and the first edition was published anonymously in London on 1 January 1818, when she was 20.[2] Her name first appeared on the second edition, published in 1823. ', '187.jpg', 157.47, NULL, 1),
(188, 'The Shining', 'Stephen King', 'Unknown', 'Jack Torrance\'s new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he\'ll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote...and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old.', '188.jpg', 999.95, NULL, 1),
(189, 'The Host', 'Stephenie Meyer', 'Unknown', 'Melanie Stryder refuses to fade away. The earth has been invaded by a species that take over the minds of human hosts while leaving their bodies intact. Wanderer, the invading \"soul\" who has been given Melanie\'s body, didn\'t expect to find its former tenant refusing to relinquish possession of her mind.\n\nAs Melanie fills Wanderer\'s thoughts with visions of Jared, a human who still lives in hiding, Wanderer begins to yearn for a man she\'s never met. Reluctant allies, Wanderer and Melanie set off to search for the man they both love.', '189.jpg', 713.09, NULL, 1),
(190, 'Looking for Alaska', 'John Green', 'Unknown', 'Before. Miles “Pudge” Halter is done with his safe life at home. His whole life has been one big non-event, and his obsession with famous last words has only made him crave “the Great Perhaps” even more (Francois Rabelais, poet). He heads off to the sometimes crazy and anything-but-boring world of Culver Creek Boarding School, and his life becomes the opposite of safe. Because down the hall is Alaska Young. The gorgeous, clever, funny, sexy, self-destructive, screwed up, and utterly fascinating Alaska Young. She is an event unto herself. She pulls Pudge into her world, launches him into the Great Perhaps, and steals his heart. Then. . . . ', '190.jpg', 918.78, NULL, 1),
(192, 'Sense and Sensibility', 'Jane Austen, Tony Tanner, Ros Ballaster', 'Unknown', '\'The more I know of the world, the more am I convinced that I shall never see a man whom I can really love. I require so much!\'\n\nMarianne Dashwood wears her heart on her sleeve, and when she falls in love with the dashing but unsuitable John Willoughby she ignores her sister Elinor\'s warning that her impulsive behaviour leaves her open to gossip and innuendo. Meanwhile Elinor, always sensitive to social convention, is struggling to conceal her own romantic disappointment, even from those closest to her. Through their parallel experience of love—and its threatened loss—the sisters learn that sense must mix with sensibility if they are to find personal happiness in a society where status and money govern the rules of love.\n\nThis edition includes explanatory notes, textual variants between the first and second editions, and Tony Tanner\'s introduction to the original Penguin Classic edition. ', '192.jpg', 136.33, NULL, 1),
(193, 'Holes', 'Louis Sachar, Louis Sachar', 'Unknown', 'Stanley tries to dig up the truth in this inventive and darkly humorous tale of crime and punishment—and redemption.\n\nStanley Yelnats is under a curse. A curse that began with his no-good-dirty-rotten- pig-stealing-great-great-grandfather and has since followed generations of Yelnats. Now Stanley has been unjustly sent to a boys\' detention center, Camp Green Lake, where the warden makes the boys \"build character\" by spending all day, every day, digging holes: five feet wide and five feet deep. It doesn\'t take long for Stanley to realize there\'s more than character improvement going on at Camp Green Lake. The boys are digging holes because the warden is looking for something. Stanley tries to dig up the truth in this inventive and darkly humorous tale of crime and punishment—and redemption.', '193.jpg', 836.17, NULL, 1),
(194, 'The Devil Wears Prada', 'Lauren Weisberger', 'Unknown', 'A delightfully dishy novel about the all-time most impossible boss in the history of impossible bosses.\nAndrea Sachs, a small-town girl fresh out of college, lands the job “a million girls would die for.” Hired as the assistant to Miranda Priestly, the high-profile, fabulously successful editor of \"Runway \"magazine, Andrea finds herself in an office that shouts \"Prada! Armani! Versace!\" at every turn, a world populated by impossibly thin, heart-wrenchingly stylish women and beautiful men clad in fine-ribbed turtlenecks and tight leather pants that show off their lifelong dedication to the gym. With breathtaking ease, Miranda can turn each and every one of these hip sophisticates into a scared, whimpering child.\nTHE DEVIL WEARS PRADA gives a rich and hilarious new meaning to complaints about “The Boss from Hell.” Narrated in Andrea’s smart, refreshingly disarming voice, it traces a deep, dark, devilish view of life at the top only hinted at in gossip columns and over Cosmopolitans at the trendiest cocktail parties. From sending the latest, not-yet-in-stores Harry Potter to Miranda’s children in Paris by private jet, to locating an unnamed antique store where Miranda had at some point admired a vintage dresser, to serving lattes to Miranda at precisely the piping hot temperature she prefers, Andrea is sorely tested each and every day—and often late into the night with orders barked over the phone. She puts up with it all by keeping her eyes on the prize: a recommendation from Miranda that will get Andrea a top job at any magazine of her choosing. As things escalate from the merely unacceptable to the downright outrageous, however, Andrea begins to realize that the job a million girls would die for may just kill her. And even if she survives, she has to decide whether or not the job is worth the price of her soul. ', '194.png', 222.93, NULL, 1),
(195, 'The Odyssey', 'Homer, Robert Fagles, E.V. Rieu, Frédéric Mugler, Bernard Knox', 'Unknown', 'Sing to me of the man, Muse, the man of twists and turns driven time and again off course, once he had plundered the hallowed heights of Troy.\n\nSo begins Robert Fagles\' magnificent translation of the Odyssey, which Jasper Griffin in The New York Times Review of Books hails as \"a distinguished achievement.\"\n\nIf the Iliad is the world\'s greatest war epic, then the Odyssey is literature\'s grandest evocation of everyman\'s journey though life. Odysseus\' reliance on his wit and wiliness for survival in his encounters with divine and natural forces, during his ten-year voyage home to Ithaca after the Trojan War, is at once a timeless human story and an individual test of moral endurance.\n\nIn the myths and legends that are retold here, Fagles has captured the energy and poetry of Homer\'s original in a bold, contemporary idiom, and given us an Odyssey to read aloud, to savor, and to treasure for its sheer lyrical mastery.\n\nRenowned classicist Bernard Knox\'s superb Introduction and textual commentary provide new insights and background information for the general reader and scholar alike, intensifying the strength of Fagles\' translation.\n\nThis is an Odyssey to delight both the classicist and the public at large, and to captivate a new generation of Homer\'s students.', '195.jpg', 472.20, NULL, 1),
(196, 'Le Petit Prince', 'Antoine de Saint-Exupéry, Richard Howard, Dom Marcos Barbosa, Melina Karakosta', 'Unknown', 'À LÉON WERTH\nJe demande pardon aux enfants d’avoir dédié ce livre à une grande personne. J’ai une excuse sérieuse : cette grande personne est le meilleur ami que j’ai au monde. J’ai une autre excuse : cette grande personne peut tout comprendre, même les livres pour enfants. J’ai une troisième excuse : cette grande personne habite la France où elle a faim et froid. Elle a bien besoin d’être consolée. Si toutes ces excuses ne suffisent pas, je veux bien dédier ce livre à l’enfant qu’a été autrefois cette grande personne. Toutes les grandes personnes ont d’abord été des enfants. (Mais peu d’entre elles s’en souviennent.) Je corrige donc ma dédicace :\nÀ LÉON WERTH\nQUAND IL ÉTAIT PETIT GARÇON', '196.jpg', 218.62, NULL, 1),
(197, 'The Glass Castle', 'Jeannette Walls', 'Unknown', 'A tender, moving tale of unconditional love in a family that, despite its profound flaws, gave the author the fiery determination to carve out a successful life on her own terms.\n\nJeannette Walls grew up with parents whose ideals and stubborn nonconformity were both their curse and their salvation. Rex and Rose Mary Walls had four children. In the beginning, they lived like nomads, moving among Southwest desert towns, camping in the mountains. Rex was a charismatic, brilliant man who, when sober, captured his children\'s imagination, teaching them physics, geology, and above all, how to embrace life fearlessly. Rose Mary, who painted and wrote and couldn\'t stand the responsibility of providing for her family, called herself an \"excitement addict.\" Cooking a meal that would be consumed in fifteen minutes had no appeal when she could make a painting that might last forever.\n\nLater, when the money ran out, or the romance of the wandering life faded, the Walls retreated to the dismal West Virginia mining town -- and the family -- Rex Walls had done everything he could to escape. He drank. He stole the grocery money and disappeared for days. As the dysfunction of the family escalated, Jeannette and her brother and sisters had to fend for themselves, supporting one another as they weathered their parents\' betrayals and, finally, found the resources and will to leave home.\n\nWhat is so astonishing about Jeannette Walls is not just that she had the guts and tenacity and intelligence to get out, but that she describes her parents with such deep affection and generosity. Hers is a story of triumph against all odds, but also a tender, moving tale of unconditional love in a family that despite its profound flaws gave her the fiery determination to carve out a successful life on her own terms.\n\nFor two decades, Jeannette Walls hid her roots. Now she tells her own story.', '197.jpg', 633.60, NULL, 1),
(198, 'Into the Wild', 'Jon Krakauer', 'Unknown', 'In April, 1992, a young man from a well-to-do family hitchhiked to Alaska and walked alone into the wilderness north of Mt. McKinley. His name was Christopher Johnson McCandless. He had given $25,000 in savings to charity, abandoned his car and most of his possessions, burned all the cash in his wallet, and invented a new life for himself. Four months later, a party of moose hunters found his decomposed body. How McCandless came to die is the unforgettable story of Into the Wild.\n\nImmediately after graduating from college in 1991, McCandless had roamed through the West and Southwest on a vision quest like those made by his heroes Jack London and John Muir. In the Mojave Desert he abandoned his car, stripped it of its license plates, and burned all of his cash. He would give himself a new name, Alexander Supertramp, and, unencumbered by money and belongings, he would be free to wallow in the raw, unfiltered experiences that nature presented. Craving a blank spot on the map, McCandless simply threw away the maps. Leaving behind his desperate parents and sister, he vanished into the wild.', '198.jpg', 949.01, NULL, 1),
(199, 'A Tale of Two Cities', 'Charles Dickens, Richard Maxwell, Hablot Knight Browne', 'Unknown', 'After eighteen years as a political prisoner in the Bastille, the ageing Doctor Manette is finally released and reunited with his daughter in England. There the lives of two very different men, Charles Darnay, an exiled French aristocrat, and Sydney Carton, a disreputable but brilliant English lawyer, become enmeshed through their love for Lucie Manette. From the tranquil roads of London, they are drawn against their will to the vengeful, bloodstained streets of Paris at the height of the Reign of Terror, and they soon fall under the lethal shadow of La Guillotine.', '199.jpg', 886.59, NULL, 1),
(200, 'Jurassic Park', 'Michael Crichton', 'Unknown', 'An astonishing technique for recovering and cloning dinosaur DNA has been discovered. Now humankind’s most thrilling fantasies have come true. Creatures extinct for eons roam Jurassic Park with their awesome presence and profound mystery, and all the world can visit them—for a price.\n\nUntil something goes wrong. . . .\n\nIn Jurassic Park, Michael Crichton taps all his mesmerizing talent and scientific brilliance to create his most electrifying technothriller.', '200.png', 381.76, NULL, 1),
(201, 'The Giving Tree', 'Shel Silverstein', 'Unknown', '\"Once there was a tree...and she loved a little boy.\"\n\nSo begins a story of unforgettable perception, beautifully written and illustrated by the gifted and versatile Shel Silverstein.\n\nEvery day the boy would come to the tree to eat her apples, swing from her branches, or slide down her trunk...and the tree was happy. But as the boy grew older he began to want more from the tree, and the tree gave and gave and gave.\n\nThis is a tender story, touched with sadness, aglow with consolation. Shel Silverstein has created a moving parable for readers of all ages that offers an affecting interpretation of the gift of giving and a serene acceptance of another\'s capacity to love in return.', '201.jpg', 480.66, NULL, 1),
(202, 'A Time to Kill', 'John Grisham', 'Unknown', 'Before The Firm and The Pelican Brief made him a superstar, John Grisham wrote this riveting story of retribution and justice. In this searing courtroom drama, best-selling author John Grisham probes the savage depths of racial violence...as he delivers a compelling tale of uncertain justice in a small southern town...Clanton, Mississippi.\n\nThe life of a ten-year-old girl is shattered by two drunken and remorseless young men. The mostly white town reacts with shock and horror at the inhuman crime. Until her black father acquires an assault rifle and takes matters into his hands.\n\nFor ten days, as burning crosses and the crack of sniper fire spread through the streets of Clanton, the nation sits spellbound as young defense attorney Jake Brigance struggles to save his client\'s life...and then his own.', '202.png', 43.50, NULL, 1),
(203, 'Un di Velt Hot Geshvign', 'Elie Wiesel, Marion Wiesel', 'Unknown', '\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto consectetur ducimus eius expedita, maxime minima molestias nostrum officia omnis quae qui quidem quo reiciendis rem ullam unde ut vero.\nLorem ipsum dolor sit amet, consectetur adipisicing elit. A alias, aliquam consequuntur culpa debitis dicta ea enim est ex exercitationem impedit ipsam itaque, magni officiis quas, quo sit ullam unde?', '203.jpg', 303.72, NULL, 1),
(204, 'Paper Towns', 'John Green', 'Unknown', 'Who is the real Margo?\n\nQuentin Jacobsen has spent a lifetime loving the magnificently adventurous Margo Roth Spiegelman from afar. So when she cracks open a window and climbs into his life—dressed like a ninja and summoning him for an ingenious campaign of revenge—he follows. After their all-nighter ends, and a new day breaks, Q arrives at school to discover that Margo, always an enigma, has now become a mystery. But Q soon learns that there are clues—and they\'re for him. Urged down a disconnected path, the closer he gets, the less Q sees the girl he thought he knew...', '204.jpg', 738.59, NULL, 1),
(205, 'The Princess Bride', 'William Goldman', 'Unknown', 'What happens when the most beautiful girl in the world marries the handsomest prince of all time and he turns out to be...well...a lot less than the man of her dreams?\n\nAs a boy, William Goldman claims, he loved to hear his father read the S. Morgenstern classic, The Princess Bride. But as a grown-up he discovered that the boring parts were left out of good old Dad\'s recitation, and only the \"good parts\" reached his ears.\n\nNow Goldman does Dad one better. He\'s reconstructed the \"Good Parts Version\" to delight wise kids and wide-eyed grownups everywhere.\n\nWhat\'s it about? Fencing. Fighting. True Love. Strong Hate. Harsh Revenge. A Few Giants. Lots of Bad Men. Lots of Good Men. Five or Six Beautiful Women. Beasties Monstrous and Gentle. Some Swell Escapes and Captures. Death, Lies, Truth, Miracles, and a Little Sex.\n\nIn short, it\'s about everything.', '205.jpg', 224.80, NULL, 1),
(206, 'The Outsiders', 'S.E. Hinton', 'Unknown', 'The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he\'s always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc. The murder gets under Ponyboy\'s skin, causing his bifurcated world to crumble and teaching him that pain feels the same whether a soc or a greaser.', '206.jpg', 839.74, NULL, 1),
(207, 'The Maze Runner', 'James Dashner', 'Unknown', 'If you ain’t scared, you ain’t human.\n\nWhen Thomas wakes up in the lift, the only thing he can remember is his name. He’s surrounded by strangers—boys whose memories are also gone.\n\nNice to meet ya, shank. Welcome to the Glade.\n\nOutside the towering stone walls that surround the Glade is a limitless, ever-changing maze. It’s the only way out—and no one’s ever made it through alive.\n\nEverything is going to change.\n\nThen a girl arrives. The first girl ever. And the message she delivers is terrifying.\n\nRemember. Survive. Run.', '207.jpg', 505.48, NULL, 1),
(208, 'Freakonomics: A Rogue Economist Explores the Hidden Side of Everything', 'Steven D. Levitt, Stephen J. Dubner', 'Unknown', 'Which is more dangerous, a gun or a swimming pool? What do schoolteachers and sumo wrestlers have in common? Why do drug dealers still live with their moms? How much do parents really matter? What kind of impact did Roe v. Wade have on violent crime? Freakonomics will literally redefine the way we view the modern world.\n\nThese may not sound like typical questions for an economist to ask. But Steven D. Levitt is not a typical economist. He is a much heralded scholar who studies the stuff and riddles of everyday life -- from cheating and crime to sports and child rearing -- and whose conclusions regularly turn the conventional wisdom on its head. He usually begins with a mountain of data and a simple, unasked question. Some of these questions concern life-and-death issues; others have an admittedly freakish quality. Thus the new field of study contained in this book: freakonomics.\n\nThrough forceful storytelling and wry insight, Levitt and co-author Stephen J. Dubner show that economics is, at root, the study of incentives -- how people get what they want, or need, especially when other people want or need the same thing. In Freakonomics, they set out to explore the hidden side of ... well, everything. The inner workings of a crack gang. The truth about real-estate agents. The myths of campaign finance. The telltale marks of a cheating schoolteacher. The secrets of the Ku Klux Klan.\n\nWhat unites all these stories is a belief that the modern world, despite a surfeit of obfuscation, complication, and downright deceit, is not impenetrable, is not unknowable, and -- if the right questions are asked -- is even more intriguing than we think. All it takes is a new way of looking. Steven Levitt, through devilishly clever and clear-eyed thinking, shows how to see through all the clutter.\n\nFreakonomics establishes this unconventional premise: If morality represents how we would like the world to work, then economics represents how it actually does work. It is true that readers of this book will be armed with enough riddles and stories to last a thousand cocktail parties. But Freakonomics can provide more than that. It will literally redefine the way we view the modern world.', '208.jpg', 108.97, NULL, 1),
(209, 'The Secret Garden', 'Frances Hodgson Burnett', 'Unknown', '\"One of the most delightful and enduring classics of children\'s literature, The Secret Garden by Victorian author Frances Hodgson Burnett has remained a firm favorite with children the world over ever since it made its first appearance. Initially published as a serial story in 1910 in The American Magazine, it was brought out in novel form in 1911.\n\nThe plot centers round Mary Lennox, a young English girl who returns to England from India, having suffered the immense trauma by losing both her parents in a cholera epidemic. However, her memories of her parents are not pleasant, as they were a selfish, neglectful and pleasure-seeking couple. Mary is given to the care of her uncle Archibald Craven, whom she has never met. She travels to his home, Misselthwaite Manor located in the gloomy Yorkshire, a vast change from the sunny and warm climate she was used to. When she arrives, she is a rude, stubborn and given to stormy temper tantrums. However, her nature undergoes a gradual transformation when she learns of the tragedies that have befallen her strict and disciplinarian uncle whom she earlier feared and despised. Once when he\'s away from home, Mary discovers a charming walled garden which is always kept locked. The mystery deepens when she hears sounds of sobbing from somewhere within her uncle\'s vast mansion. The kindly servants ignore her queries or pretend they haven\'t heard, spiking Mary\'s curiosity.\n\nThe Secret Garden appeals to both young and old alike. It has wonderful elements of mystery, spirituality, charming characters and an authentic rendering of childhood emotions and experiences. Commonsense, truth and kindness, compassion and a belief in the essential goodness of human beings lie at the heart of this unforgettable story. It is the best known of Frances Hodgson Burnett\'s works, though most of us have definitely heard of, if not read, her other novel Little Lord Fauntleroy. \"', '209.jpg', 421.19, NULL, 1),
(210, 'Cien años de soledad', 'Gabriel García Márquez, Gregory Rabassa', 'Unknown', 'Cien años de soledad CD FRAGMENTOS. La historia se centra en la familia Buendía, durante seis generaciones, desde José Arcadio Buendía y su mujer Úrsula, pertenecientes a una de las familias fundadoras del pueblo donde se desarrolla la trama-Macondo- hasta la sexta, Aureliano Babilonia. Se encuentra enmarcada en el principio del Siglo XX y se puede apreciar la guerra entre liberales y conservadores en la que se ve envuelto el Coronel Aureliano Buendía, perteneciente a la segunda generación, así como la llegada de los americanos a Macondo que instalan una bananera.', '210.jpg', 266.23, NULL, 1),
(211, 'The Picture of Dorian Gray', 'Oscar Wilde, Jeffrey Eugenides', 'Unknown', 'Written in his distinctively dazzling manner, Oscar Wilde’s story of a fashionable young man who sells his soul for eternal youth and beauty is the author’s most popular work. The tale of Dorian Gray’s moral disintegration caused a scandal when it ﬁrst appeared in 1890, but though Wilde was attacked for the novel’s corrupting inﬂuence, he responded that there is, in fact, “a terrible moral in Dorian Gray.” Just a few years later, the book and the aesthetic/moral dilemma it presented became issues in the trials occasioned by Wilde’s homosexual liaisons, which resulted in his imprisonment. Of Dorian Gray’s relationship to autobiography, Wilde noted in a letter, “Basil Hallward is what I think I am: Lord Henry what the world thinks me: Dorian what I would like to be—in other ages, perhaps.', '211.jpg', 80.70, NULL, 1),
(212, 'Fifty Shades Freed', 'E.L. James', 'Unknown', 'When unworldly student Anastasia Steele first encountered the driven and dazzling young entrepreneur Christian Grey it sparked a sensual affair that changed both of their lives irrevocably. Shocked, intrigued, and, ultimately, repelled by Christian’s singular erotic tastes, Ana demands a deeper commitment. Determined to keep her, Christian agrees.\n\nNow, Ana and Christian have it all—love, passion, intimacy, wealth, and a world of possibilities for their future. But Ana knows that loving her Fifty Shades will not be easy, and that being together will pose challenges that neither of them would anticipate. Ana must somehow learn to share Christian’s opulent lifestyle without sacrificing her own identity. And Christian must overcome his compulsion to control as he wrestles with the demons of a tormented past.\n\nJust when it seems that their strength together will eclipse any obstacle, misfortune, malice, and fate conspire to make Ana’s deepest fears turn to reality.', '212.jpg', 177.04, NULL, 1),
(213, 'Dracula', 'Bram Stoker, Nina Auerbach, David J. Skal', 'Unknown', 'A rich selection of background and source materials is provided in three areas: Contexts includes probable inspirations for Dracula in the earlier works of James Malcolm Rymer and Emily Gerard. Also included are a discussion of Stoker\'s working notes for the novel and \"Dracula\'s Guest,\" the original opening chapter to Dracula. Reviews and Reactions reprints five early reviews of the novel. \"Dramatic and Film Variations\" focuses on theater and film adaptations of Dracula, two indications of the novel\'s unwavering appeal. David J. Skal, Gregory A. Waller, and Nina Auerbach offer their varied perspectives. Checklists of both dramatic and film adaptations are included.\n\nCriticism collects seven theoretical interpretations of Dracula by Phyllis A. Roth, Carol A. Senf, Franco Moretti, Christopher Craft, Bram Dijkstra, Stephen D. Arata, and Talia Schaffer.', '213.jpg', 583.19, NULL, 1),
(214, 'Flickan som lekte med elden', 'Stieg Larsson, Reg Keeland', 'Unknown', 'Utsedd till årets bästa deckare på svenska av Svenska Deckarakademin\n\nI uppföljaren till Män som hatar kvinnor är det Lisbeth Salander som står i centrum. Hon blir anklagad för trippelmord och dras in i en härva som leder tillbaka till hennes mörka förflutna.\n\nLisbeth Salander återkommer till Sverige efter en längre tids vistelse utomlands. Tack vare finansmannen Wennerströms pengar har hon det bättre ställt än någonsin, men hon återvänder till ett Stockholm där hon inte längre har familj eller vänner. Lisbeth är helt ensam i världen. En rad dramatiska händelser inträffar som får Lisbeths mörka förflutna att göra sig påmint, och när hon dras in i en mördarjakt där hon själv är villebråd bestämmer hon sig för att göra upp med det förgångna en gång för alla. Hon ska straffa dem som förtjänar att straffas.\n\nSamtidigt har Mikael Blomkvist på Millennium fått korn på hett nyhetsstoff. Journalisten Dag Svensson och hans sambo Mia Bergman kan visa avslöjande fakta om en omfattande sexhandel mellan Östeuropa och Sverige. Många av de personer som utpekas i traffickinghärvan har högt uppsatta positioner i samhället.\nNär Dag och Mia blir brutalt mördade och misstankarna riktas mot Salander bestämmer sig Mikael Blomkvist för att driva sin egen utredning. Han upptäcker snart ett samband mellan morden och traffickingtemat. Den fruktade Zala, vars namn ständigt förekommer i utredningen, visar sig dessutom ha kopplingar till en viss Lisbeth Salander...\nDet är dags för Blomkvist och Salander att mötas igen.', '214.jpg', 530.60, NULL, 1),
(215, 'Fifty Shades Darker', 'E.L. James', 'Unknown', 'Daunted by the singular sexual tastes and dark secrets of the beautiful, tormented young entrepreneur Christian Grey, Anastasia Steele has broken off their relationship to start a new career with a Seattle publishing house. But desire for Christian still dominates her every waking thought, and when he proposes a new arrangement, Anastasia cannot resist. They rekindle their searing sensual affair, and Anastasia learns more about the harrowing past of her damaged, driven, and demanding Fifty Shades. While Christian wrestles with his inner demons, Anastasia must confront her anger and envy of the women who came before her and make the most important decision of her life. Erotic, sparkling and suspenseful, Fifty Shades Darker is the irresistibly addictive second part of the Fifty Shades trilogy.', '215.jpg', 37.06, NULL, 1),
(217, 'cartepartener', 'cartepartener', 'cartepartener', 'cartepartenercartepartenercartepartenercartepartenercartepartenercartepartener', NULL, 122.00, NULL, 1),
(218, 'cartepartener2', 'cartepartener2', 'cartepartener2', 'cartepartener2cartepartener2cartepartener2cartepartener2cartepartener2cartepartener2', NULL, 121212.00, NULL, 1),
(219, 'carte1partener2', 'carte1partener2', 'carte1partener2', 'carte1partener2carte1partener2carte1partener2carte1partener2carte1partener2carte1partener2', NULL, 123.00, NULL, 0);
INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(220, 'Mountain View', 'Nicholas Perry', 'Arcadia Publishing', 'Mountain View earned its name for its scenic vantage point between the Santa Cruz and Diablo ranges. Founded as a stagecoach stop along the El Camino Real in 1852, Mountain View became a diverse and bountiful agricultural community in the \"Valley of Heart\'s Delight.\" During the depths of the Depression, Bay Area citizens raised almost half a million dollars to purchase land north of town that was offered to the navy. The gamble paid off with the opening of Moffett Naval Air Station in 1933, inaugurating Mountain View\'s turn toward commercial and residential development.', '220.jpg', 456.89, '0738531367', 1);
INSERT INTO `books` (`book_id`, `title`, `author`, `publishing_house`, `description`, `photo`, `price`, `ISBN`, `inShop`) VALUES
(431, 'Catomaniacs', 'Unknown', 'Unknown', '/9j/4AAQSkZJRgABAQEBLAEsAAD/2wBDAA4KCw0LCQ4NDA0QDw4RFiQXFhQUFiwgIRokNC43NjMuMjI6QVNGOj1OPjIySGJJTlZYXV5dOEVmbWVabFNbXVn/2wBDAQ8QEBYTFioXFypZOzI7WVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVlZWVn/wAARCAJYAyADAREAAhEBAxEB/8QAGwABAAMBAQEBAAAAAAAAAAAAAAMEBQIBBgf/xABBEAACAgEDAQYDBgYBBAIBAwUBAgADEQQSITEFEyJBUWFxgZEUMqGxwdEGI0JS4fBiFSQz8UNyUyaCkrI0RNKi/8QAGQEBAQEBAQEAAAAAAAAAAAAAAAECAwQF/8QAKBEBAQEAAwACAgIDAQEAAwEAAAERAiExEkEDUWFxBCIyE0IzgZGx/9oADAMBAAIRAxEAPwD9JgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB5kZ6wPYCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBDqbhTVuPyktxZNYb6m6y8+LYc8Tl8rXXJFqvWWp4WcMfLJ6x8ql4xd0+sFgG/AJOMjpNzn+2bx/S11m2HsBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBA5LqucsBjrAi+0ozbayHOccdIEw94HsBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQMbte7+Z3WeMZInPl66cZ0yGd1YFVZ+OR+oMw6YnpY2I3fAKvkxOMR/aWfpKloBIW4Af1b8bW/aOhqUakqPF09jn6SzljNmrtVqWoHrYMp8xOsuudmO5UICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIEdtyVKS5AxM3lIslrI1faxAK18N/bnn/ABOd52us4RjXal1bc1i5PVQc/MzDccUdovVaCnCjzMstniXjL6+u0OoGpoFi8Cd5djhZlWZUICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB8x2q5/wCoO3pwDnHH6zjy9duPiKhQwKjaBjd/xA9TDSz3dYw1ljk9AAMfQSdHaRaqVP3OPPkmVO6itamsbt7Vc8HYfxkuLlW9Hq0G6xMYJ5Zfukyy53GLPqtaqxbUDKes6y652Y7lQgICAgICAgICAgICAgICAgICAgICAgICAgICAgeQK+q1denQlmA8pi8mpx1hanV3X1NZTUUU9LbgcfEL+WZjK69RmJob7QW77IJyTggfUGT4tbELaWmpv/O7k9Urz1/+xjIduS9aJgaVjk/12E5+mI2GPpf4a1BtosRgoKnovQTfCuX5I3J0cyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfK9snZqrcZ5PlOPL134eGm+4oYlV8gCSWPoD5w0n4Fu1Tlh5LwB8TJ9n0lUFhlshB1OPyjER27WXalS8eTcmTVk/apXpNjFkcrZnJ2Hn6YiRbV7Q60rYyBvEB4lPr646iWXHPlG5W4dc9D6TtLrlZjuVCAgICAgICAgICAgICAgICAgICAgICAgICAgedIFHW6tkqY1BSFHUnic7W+MfPazvbXFmo1K0Z4RSu6wj/iucD4zN/l1n8RENQunbai2l8eJ73DuffHSZvLPGvjr3v1suBcM5x97I4/aPkfHIlvVNVU1YKs+OG6Z+nWa9ZnXbAsJrfJr2WA7WXPB+Uw6Y+h/hO/OqtTjxL5DE3wvbl+SdPrZ2cCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfN9rOKta52q3ThhOPK5XfhNitVrF78cEsSFGPIegMz8u3T4dLlDBuK1Cjz4xmWX9M2Z6ssAq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', NULL, 431.31, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books_categories`
--

CREATE TABLE `books_categories` (
  `book_category_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books_categories`
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
-- Table structure for table `books_comments`
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
-- Dumping data for table `books_comments`
--

INSERT INTO `books_comments` (`book_comment_id`, `user_id`, `book_id`, `approvals`, `text`, `date`) VALUES
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
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `buy_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`buy_id`, `book_id`, `user_id`, `invoice_id`, `quantity`) VALUES
(1, 142, 9, 1, 4),
(2, 220, 9, 2, 1),
(5, 182, 9, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(2, 'Thriller'),
(3, 'Nou'),
(9, 'Mystery'),
(12, 'Love'),
(13, 'Sci Fi');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
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
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `date`, `billing_address`, `delivery_address`, `withPoints`, `step`) VALUES
(1, '2019-06-22 17:25:56', 'Str Lorem Ipsum Nr 6', 'Str Lorem Ipsum Nr 6', 0, 'registered'),
(2, '2019-06-22 18:03:02', 'Str Lorem Ipsum Nr 6', 'Str Lorem Ipsum Nr 6', 0, 'registered'),
(3, '2019-06-26 09:42:43', 'abc', 'abc', 0, 'registered'),
(4, '2019-06-26 09:43:10', 'abc', 'abc', 0, 'registered'),
(5, '2019-06-26 09:47:12', 'Str Lorem IpNr 6', 'Str Lorem IpNr 6', 0, 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
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
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `first_name`, `last_name`, `phone`, `adress`, `photo`, `wallet`, `wishlist`, `user_id`) VALUES
(1, 'Daniel', 'Pirvu', '0711111111', 'Str. Independentei Nr.7', NULL, 0, NULL, 5),
(4, 'Client', NULL, NULL, NULL, NULL, 0, '117, 12, 118', 6),
(5, 'Daniel', 'Pîrvu', '0722222222', 'Str Dunarii Nr 6', NULL, 147, '12, 142, 196, 117, 220', 9),
(6, 'Partner', NULL, NULL, NULL, NULL, 0, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
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
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `requirement_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `increment` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Neutral 1 = Accepted -1 = Denied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `user_id`, `book_id`, `increment`, `status`) VALUES
(3, 7, 217, 0, 1),
(4, 7, 217, 4, -1),
(5, 7, 218, 0, 1),
(6, 7, 218, -1, 0),
(7, 10, 219, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'Client'),
(2, 'Partener'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@booktopia.com', '$2a$07$lxvHXkvew3Y9mosQIdrJDuey0mRlF.UxbPsJd5y.WvpduyLijmYua', 'A3MP8yoSlLaG3WUvNBhwXB1W6uFcoUPzAqnM8Buqj2VZTVcfEAtOIFVbSQA0', '2018-12-24 11:11:46', '2018-12-24 11:11:46'),
(6, 'Client', 'client@booktopia.com', '$2a$07$FP3Ua55RvWdXLMqUEgJENeoRGtFQK5hZsLN8qFIxqY6QkIeVgM25m', '7Z4fhEcoy2LoiCC0Brk5aYByoMrHpl2oO5NVVGy4L2zfFUwd1uBJI2QSHeeO', '2018-12-28 16:24:06', '2018-12-28 16:24:06'),
(7, 'Partner', 'partener@booktopia.com', '$2a$07$m2OevQrVgP88pc5gkkICbu3BtSF8skxCsSpcz4XbQ6TF1W1l4hUvC', 'XVC2W3ICy82lIDwJ7p2oFvLHZWYvQYlyrgBOLYWVzMB7c7Ea4AhsZZ6GFI5e', '2019-01-13 09:21:20', '2019-01-13 09:21:20'),
(9, 'Daniel', 'daniel.catalin.pirvu@gmail.com', '$2a$07$4nZnXcHXJYBTavLHPVr3h.JQw3Z0152O0NCytGftbDVHN5eL1J1Fq', '3ZlP6MZRf34IZ3fact34Sb3f2FpCEKUhlhOdp4sAY20Atq5e5bTWYjIDY1JJ', '2019-05-31 15:26:31', '2019-10-27 14:49:12'),
(10, 'Partener2', 'partener2@booktopia.com', '$2a$07$gmrO56g9Xmy2okH2QqlIMetJ/QXg5brEqi8hzSZki4T4oKU7EThn6', 'GFPyjDA47Xfmf2LnaGg4nXJvlzl1A6AoxkBiPXhMXytQXA2wDeTg4NuGmSdj', '2019-06-03 07:16:19', '2019-06-03 07:16:19'),
(469, 'Radu', 'pp89@gmail.com', '$2a$07$i6wJAvTBUmlVM8LNY7KlWuAB3G.ANlqfiVuUSAfBCoP22UugVdyK2', NULL, '2019-01-20 12:08:06', '2019-01-20 12:08:06'),
(470, 'User_Nou', 'usernou@booktopia.com', '$2a$07$4Ztgvp0ElobTq2JGbTXzDOm9fH0BupxmIuZaWcjnR2nt11Y5WA4rS', 'I080bn5uPfaFtK14l1ZaqWFBzHesKjsd2UHioL56SAWqZhxbtqBb92J7dSAo', '2019-11-30 15:41:25', '2019-11-30 15:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_role_id`, `role_id`, `user_id`) VALUES
(37, 1, 6),
(51, 3, 5),
(54, 2, 7),
(57, 3, 9),
(63, 2, 10),
(70, 1, 469),
(71, 1, 470);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD PRIMARY KEY (`book_category_id`),
  ADD KEY `books_categories_book_id_foreign` (`book_id`),
  ADD KEY `books_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `books_comments`
--
ALTER TABLE `books_comments`
  ADD PRIMARY KEY (`book_comment_id`),
  ADD KEY `books_comments_user_id_foreign` (`user_id`),
  ADD KEY `books_comments_book_id_foreign` (`book_id`);

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD PRIMARY KEY (`buy_id`),
  ADD KEY `buys_book_id_foreign` (`book_id`),
  ADD KEY `buys_user_id_foreign` (`user_id`),
  ADD KEY `buys_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `offers_book_id_foreign` (`book_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_book_id_foreign` (`book_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`requirement_id`),
  ADD KEY `requirements_user_id_foreign` (`user_id`),
  ADD KEY `requirements_book_id_foreign` (`book_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stocks_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`),
  ADD KEY `users_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `books_categories`
--
ALTER TABLE `books_categories`
  MODIFY `book_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `books_comments`
--
ALTER TABLE `books_comments`
  MODIFY `book_comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `buy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `requirement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `user_role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_categories`
--
ALTER TABLE `books_categories`
  ADD CONSTRAINT `books_categories_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `books_comments`
--
ALTER TABLE `books_comments`
  ADD CONSTRAINT `books_comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `buys_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `buys_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `requirements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

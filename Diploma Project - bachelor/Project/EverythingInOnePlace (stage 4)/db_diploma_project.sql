-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 12 септ 2022 в 19:49
-- Версия на сървъра: 10.4.16-MariaDB
-- Версия на PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `db_diploma_project`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Header_ID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Header_ID`) VALUES
(1, 'Movies', 1),
(2, 'Series', 2),
(3, 'Games', 3),
(4, 'Books', 4),
(5, 'Technologies', 5);

-- --------------------------------------------------------

--
-- Структура на таблица `header`
--

CREATE TABLE `header` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Image_Directory` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `header`
--

INSERT INTO `header` (`ID`, `Image_Directory`, `Name`) VALUES
(1, '', 'All Movies'),
(2, '', 'All Series'),
(3, '', 'All Games'),
(4, '', 'All Books'),
(5, '', 'All Technologies'),
(6, '', 'Sci-fi'),
(7, '', 'Fantasy'),
(8, '', 'Adventure'),
(9, '', 'Action'),
(10, '', 'Criminal'),
(11, '', 'Romantic'),
(12, '', 'Drama'),
(13, '', 'Comedy'),
(14, '', 'Mystery'),
(15, '', 'Thriller'),
(16, '', 'Horror'),
(17, '', 'Spiritual'),
(18, '', 'RPG(Role-Play)'),
(19, '', 'MMORPG'),
(20, '', 'Strategy'),
(21, '', 'PC'),
(22, '', 'Laptop'),
(23, '', 'Tablet'),
(24, '', 'Textbook'),
(25, '', 'Smartphone'),
(26, '', 'IPhone'),
(27, '', 'IPad'),
(28, '', 'Playstation'),
(29, '', 'Xbox');

-- --------------------------------------------------------

--
-- Структура на таблица `other_data`
--

CREATE TABLE `other_data` (
  `ID` bigint(20) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `other_data`
--

INSERT INTO `other_data` (`ID`, `Name`) VALUES
(1, '© Copyright 2022 Ivelin Karayanev. All rights reserved.'),
(2, '<h1> About The Website </h1>\r\n    <b><i><p> Welcome users to \'Everything in one place\'. Here you will find whatever you need, without wondering where to look next to search your desirable information about different categories such as movies, series, games, books and technologies.  Each of them have a subcategory and when you select the specific genre or type for your liking, you can search it within the page or with the search engine if you don\'t find it there. Once you have selected it, you can see their plot, parameters and characteristics (for books and tech) and trailers if the category is a movie or series or game.  In the end, there will be hyperlinks to open and send you to their downloadable file, online store or website for free watching.\r\nIn the future there will be more categories, subcategories and functionalities added.  \r\nThe website is free to use for everyone. Hope you enjoy! </p></i></b>'),
(3, 'Welcome to the \'Everything in one place\' site. Here you will find everything you need, without wondering where to look next to find your desirable information about movies, series, games, books, technologies and even more categories which can be added in the future.\r\nSo let me to explain: each of these categories have a genre and when you select the specific genre for your liking, you can search for your movie or game and etc. within the page or with the search engine if you don\'t find it there. Once you have selected it, you can see their ratings with stars according to each of categories, also their plot, parameters and characteristics (for books and tech) \r\nand trailer if its a movie, series or game. You can also change the theme to light or dark and change the language as you choose. In the end, there will be a hyperlink to open and send you to their downloadable file. This site is free for use so hope you enjoy!');

-- --------------------------------------------------------

--
-- Структура на таблица `products`
--

CREATE TABLE `products` (
  `ID` bigint(20) NOT NULL,
  `Category_ID` bigint(20) UNSIGNED NOT NULL,
  `Image_Directory` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Header_Image` varchar(255) NOT NULL,
  `Year` year(4) NOT NULL,
  `Creator` text NOT NULL,
  `IMDb Rating` text NOT NULL,
  `Description` text NOT NULL,
  `Trailers` text NOT NULL,
  `Links` text NOT NULL,
  `Performance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`ID`, `Category_ID`, `Image_Directory`, `Name`, `Header_Image`, `Year`, `Creator`, `IMDb Rating`, `Description`, `Trailers`, `Links`, `Performance`) VALUES
(1, 1, '../Main/Images/LOTR The Fellowship of the Ring.jpg', 'The Lord of the Rings: The Fellowship of the Ring', './Headers/LOTR The Fellowship of the Ring Header.jpg', 2001, 'Peter Jackson', '<span class=\"imdbRatingPlugin\" data-user=\"ur137372291\" data-title=\"tt0120737\" data-style=\"p3\"><a href=\"https://www.imdb.com/title/tt0120737/?ref_=plg_rt_1\"><img src=\"https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/images/imdb_37x18.png\" alt=\" The Lord of the Rings: The Fellowship of the Ring(2001) on IMDb\"/></a></span> 	 <script>(function(d,s,id){var js,stags=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return;}js=d.createElement(s);js.id=id;js.src=\"https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js\";stags.parentNode.insertBefore(js,stags);})(document,\"script\",\"imdb-rating-api\");</script>', 'The Lord of the Rings: The Fellowship of the Ring is a 2001 epic fantasy adventure film directed by Peter Jackson, based on the 1954 novel The Fellowship of the Ring, the first volume of J. R. R. Tolkien\'s The Lord of the Rings. The film is the first installment in the Lord of the Rings trilogy. It was produced by Barrie M. Osborne, Jackson, Fran Walsh and Tim Sanders, and written by Walsh, Philippa Boyens and Jackson.The film features an ensemble cast including Elijah Wood, Ian McKellen, Liv Tyler, Viggo Mortensen, Sean Astin, Cate Blanchett, John Rhys-Davies, Billy Boyd, Dominic Monaghan, Orlando Bloom, Christopher Lee, Hugo Weaving, Sean Bean, Ian Holm, and Andy Serkis. It was followed in 2002 by The Two Towers and in 2003 by The Return of the King.The Fellowship of the Ring was cofinanced and distributed by American studio New Line Cinema, but filmed and edited entirely in Jackson\'s native New Zealand, concurrently with the other two parts of the trilogy. It premiered on 10 December 2001 at the Odeon Leicester Square in London and was theatrically released worldwide on 19 December 2001.The film was highly acclaimed by critics and fans alike, who considered it to be a landmark in filmmaking and an achievement in the fantasy film genre. It received high praise for its visual effects, performances, Jackson\'s direction, screenplay, and faithfulness to the source material. It grossed $880 million worldwide in its initial release, making it the second highest-grossing film of 2001 and the fifth highest-grossing film of all time at the time of its release. Following subsequent reissues, it has as of 2021 grossed over $897 million.\r\nAn ancient Ring thought lost for centuries has been found, and through a strange twist of fate has been given to a small Hobbit named Frodo.When Gandalf discovers the Ring is in fact the One Ring of the Dark Lord Sauron, Frodo must make an epic quest to the Cracks of Doom in order to destroy it. However, he does not go alone. He is joined by Gandalf, Legolas the elf, Gimli the Dwarf, Aragorn, Boromir, and his three Hobbit friends Merry, Pippin, and Samwise.Through mountains, snow, darkness, forests, rivers and plains, facing evil and danger at every corner the Fellowship of the Ring must go. Their quest to destroy the One Ring is the only hope for the end of the Dark Lords reign.', '     <iframe style =\" width:800px; height:353px\" src=\"https://www.youtube.com/embed/V75dMMIW2B4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n	<iframe style =\" width:800px; height:353px\" src=\"https://www.youtube.com/embed/cKEGZ-CvWHk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Download Links: \r\n<a href = \"https://movie-grabber.com/lord-of-the-rings-the-fellowship-of-the-ring-free-movie\" target=\"_blank\"> Link 1 </a> &nbsp; <a href = \"https://www.1377x.to/search/the%20lord%20of%20the%20rings%20the%20fellowship%20of%20the%20ring/1/\" target=\"_blank\"> Link 2 </a>\r\n\r\nStreaming Links: \r\n<a href = \"https://filmisub.com/filmi/6787-the-lord-of-the-rings-the-fellowship-of-the-ring-vlastelint-na-prstenite-zadrugata-na-prstena-2001.html\" target=\"_blank\"> Link 3 </a> &nbsp; <a href = \"https://kinofen.net/filmi/6787-the-lord-of-the-rings-the-fellowship-of-the-ring-vlastelint-na-prstenite-zadrugata-na-prstena-2001.html\" target=\"_blank\"> Link 4 </a>\r\n\r\nPrice Links:    ', ''),
(2, 1, '../Main/Images/LOTR The Two Towers.jpg', 'The Lord of the Rings: The Two Towers', '', 2002, '', '', '', '', '', ''),
(3, 1, '../Main/Images/LOTR The Return of the King.jpg', 'The Lord of the Rings: The Return of the King', '', 2003, '', '', '', '', '', ''),
(4, 1, '../Main/Images/The Conjuring.jpg', 'The Conjuring', '', 2013, '', '', '', '', '', ''),
(5, 1, '../Main/Images/The Conjuring 2.jpg', 'The Conjuring 2', '', 2016, '', '', '', '', '', ''),
(6, 1, '../Main/Images/The Conjuring 3.jpg', 'The Conjuring 3', '', 2021, '', '', '', '', '', ''),
(7, 1, '../Main/Images/Pride and Prejudice.jpg', 'Pride & Prejudice', '', 2005, '', '', '', '', '', ''),
(8, 1, '../Main/Images/After.jpg', 'After', '', 2019, '', '', '', '', '', ''),
(9, 1, '../Main/Images/After We Collided.jpg', 'After We Collided', '', 2020, '', '', '', '', '', ''),
(10, 1, '../Main/Images/After We Fell.jpg', 'After We Fell', '', 2021, '', '', '', '', '', ''),
(11, 1, '../Main/Images/Oxygen.jpg', 'Oxigen', '', 2021, '', '', '', '', '', ''),
(12, 1, '../Main/Images/7500.jpg', '7500', '', 2019, '', '', '', '', '', ''),
(13, 1, '../Main/Images/I Care A Lot.jpg', 'I Care A Lot', '', 2020, '', '', '', '', '', ''),
(14, 1, '../Main/Images/MA.jpg', 'MA', '', 2019, '', '', '', '', '', ''),
(15, 1, '../Main/Images/Joker.jpg', 'Joker', '', 2019, '', '', '', '', '', ''),
(16, 1, '../Main/Images/EL CAMINO.jpg', 'EL CAMINO', '', 2019, '', '', '', '', '', ''),
(17, 1, '../Main/Images/Extremely Wicked.jpg', 'Extremely Wicked', '', 2019, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура на таблица `product_information`
--

CREATE TABLE `product_information` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `product_information`
--

INSERT INTO `product_information` (`ID`, `Name`) VALUES
(1, 'Year:'),
(2, 'Producer:'),
(3, 'Company:'),
(4, 'Author:'),
(5, 'User Rating:'),
(6, 'Description'),
(7, 'Trailers'),
(8, 'Links'),
(9, 'Download Links'),
(10, 'Streaming Links'),
(11, 'Reading Links'),
(12, 'Performance'),
(13, 'Prices');

-- --------------------------------------------------------

--
-- Структура на таблица `product_information_per_category`
--

CREATE TABLE `product_information_per_category` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Category_ID` bigint(20) UNSIGNED NOT NULL,
  `Product_Information_ID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `product_information_per_category`
--

INSERT INTO `product_information_per_category` (`ID`, `Category_ID`, `Product_Information_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10),
(9, 1, 13),
(10, 2, 1),
(11, 2, 2),
(12, 2, 5),
(13, 2, 6),
(14, 2, 7),
(15, 2, 8),
(16, 2, 9),
(17, 2, 10),
(18, 2, 13),
(19, 3, 1),
(20, 3, 3),
(21, 3, 5),
(22, 3, 6),
(23, 3, 8),
(24, 3, 9),
(25, 3, 13),
(26, 4, 1),
(27, 4, 4),
(28, 4, 5),
(29, 4, 6),
(30, 4, 8),
(31, 4, 9),
(32, 4, 11),
(33, 4, 13),
(34, 5, 1),
(35, 5, 3),
(36, 5, 5),
(37, 5, 6),
(38, 5, 8),
(39, 5, 12),
(40, 5, 13);

-- --------------------------------------------------------

--
-- Структура на таблица `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Product_ID` bigint(20) NOT NULL,
  `Subcategory_ID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `product_subcategory`
--

INSERT INTO `product_subcategory` (`ID`, `Product_ID`, `Subcategory_ID`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 2),
(4, 2, 3),
(5, 3, 2),
(6, 3, 3),
(7, 4, 10),
(8, 4, 11),
(9, 5, 10),
(10, 5, 11),
(11, 6, 10),
(12, 6, 11),
(13, 7, 6),
(14, 7, 7),
(15, 8, 6),
(16, 8, 7),
(17, 9, 6),
(18, 9, 7),
(19, 10, 6),
(20, 10, 7),
(21, 11, 1),
(22, 11, 9),
(23, 11, 10),
(24, 12, 7),
(25, 12, 10),
(26, 13, 8),
(27, 13, 10),
(28, 14, 10),
(29, 14, 11),
(30, 15, 5),
(31, 15, 7),
(32, 16, 5),
(33, 16, 7),
(34, 17, 5),
(35, 17, 7);

-- --------------------------------------------------------

--
-- Структура на таблица `subcategories`
--

CREATE TABLE `subcategories` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Header_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `subcategories`
--

INSERT INTO `subcategories` (`ID`, `Name`, `Header_Name`) VALUES
(1, 'Sci-fi', 'Sci-fi'),
(2, 'Fantasy', 'Fantasy'),
(3, 'Adventure', 'Adventure'),
(4, 'Action', 'Action'),
(5, 'Criminal', 'Criminal'),
(6, 'Romantic', 'Romantic'),
(7, 'Drama', 'Drama'),
(8, 'Comedy', 'Comedy'),
(9, 'Mystery', 'Mystery'),
(10, 'Thriller', 'Thriller'),
(11, 'Horror', 'Horror'),
(12, 'Spiritual', 'Spiritual'),
(13, 'RPG(Role-Play)', 'RPG(Role-Play)'),
(14, 'MMORPG', 'MMORPG'),
(15, 'Strategy', 'Strategy'),
(16, 'PC', 'PC'),
(17, 'Laptop', 'Laptop'),
(18, 'Tablet', 'Tablet'),
(19, 'Textbook', 'Textbook'),
(20, 'Smartphone', 'Smartphone'),
(21, 'IPhone', 'IPhone'),
(22, 'IPad', 'IPad'),
(23, 'Playstation', 'Playstation'),
(24, 'Xbox', 'Xbox');

-- --------------------------------------------------------

--
-- Структура на таблица `subcategories_of_categories`
--

CREATE TABLE `subcategories_of_categories` (
  `ID` bigint(20) NOT NULL,
  `Category_ID` bigint(20) UNSIGNED NOT NULL,
  `Subcategory_Name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `subcategories_of_categories`
--

INSERT INTO `subcategories_of_categories` (`ID`, `Category_ID`, `Subcategory_Name`) VALUES
(1, 1, 'Sci-fi'),
(2, 1, 'Fantasy'),
(3, 1, 'Adventure'),
(4, 1, 'Action'),
(5, 1, 'Criminal'),
(6, 1, 'Romantic'),
(7, 1, 'Drama'),
(8, 1, 'Comedy'),
(9, 1, 'Mystery'),
(10, 1, 'Thriller'),
(11, 1, 'Horror'),
(12, 1, 'Spiritual'),
(13, 2, 'Sci-fi'),
(14, 2, 'Fantasy'),
(15, 2, 'Adventure'),
(16, 2, 'Action'),
(17, 2, 'Criminal'),
(18, 2, 'Romantic'),
(19, 2, 'Drama'),
(20, 2, 'Comedy'),
(21, 2, 'Mystery'),
(22, 2, 'Thriller'),
(23, 2, 'Horror'),
(24, 3, 'Sci-fi'),
(25, 3, 'Fantasy'),
(26, 3, 'Adventure'),
(27, 3, 'Action'),
(28, 3, 'Criminal'),
(29, 3, 'Horror'),
(30, 3, 'RPG(Role-Play)'),
(31, 3, 'MMORPG'),
(32, 3, 'Strategy'),
(33, 4, 'Sci-fi'),
(34, 4, 'Fantasy'),
(35, 4, 'Adventure'),
(36, 4, 'Criminal'),
(37, 4, 'Romantic'),
(38, 4, 'Comedy'),
(39, 4, 'Mystery'),
(40, 4, 'Thriller'),
(41, 4, 'Horror'),
(42, 4, 'Spiritual'),
(43, 5, 'PC'),
(44, 5, 'Laptop'),
(45, 5, 'Tablet'),
(46, 5, 'Textbook'),
(47, 5, 'Smartphone'),
(48, 5, 'IPhone'),
(49, 5, 'IPad'),
(50, 5, 'Playstation'),
(51, 5, 'Xbox');

-- --------------------------------------------------------

--
-- Структура на таблица `user_data`
--

CREATE TABLE `user_data` (
  `ID` bigint(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Code` mediumint(50) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `user_data`
--

INSERT INTO `user_data` (`ID`, `Email`, `Username`, `Password`, `Code`, `Status`) VALUES
(3, 'ivelinkarayanev@abv.bg', 'admin_ivo', '$2y$10$fTZ9xEOxqiEqr5vvbTF1ce8QKopGWiylCtkKB7zTp.sUeJat4dCyq', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_category_header` (`Header_ID`);

--
-- Индекси за таблица `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_header_name` (`Name`);

--
-- Индекси за таблица `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`ID`);

--
-- Индекси за таблица `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_category_product` (`Category_ID`);

--
-- Индекси за таблица `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`ID`);

--
-- Индекси за таблица `product_information_per_category`
--
ALTER TABLE `product_information_per_category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_product_information` (`Product_Information_ID`) USING BTREE,
  ADD KEY `FK_product_information_category` (`Category_ID`);

--
-- Индекси за таблица `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_subcategory` (`Subcategory_ID`),
  ADD KEY `FK_subcategory_product` (`Product_ID`) USING BTREE;

--
-- Индекси за таблица `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_subcategory_header` (`Header_Name`),
  ADD KEY `Name` (`Name`);

--
-- Индекси за таблица `subcategories_of_categories`
--
ALTER TABLE `subcategories_of_categories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_subcategory_category` (`Category_ID`),
  ADD KEY `FK_subcategory_name` (`Subcategory_Name`);

--
-- Индекси за таблица `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_information`
--
ALTER TABLE `product_information`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_information_per_category`
--
ALTER TABLE `product_information_per_category`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subcategories_of_categories`
--
ALTER TABLE `subcategories_of_categories`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_category_header` FOREIGN KEY (`Header_ID`) REFERENCES `header` (`ID`);

--
-- Ограничения за таблица `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_category_product` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`ID`);

--
-- Ограничения за таблица `product_information_per_category`
--
ALTER TABLE `product_information_per_category`
  ADD CONSTRAINT `FK_product_information` FOREIGN KEY (`Product_Information_ID`) REFERENCES `product_information` (`ID`),
  ADD CONSTRAINT `FK_product_information_category` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`ID`);

--
-- Ограничения за таблица `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD CONSTRAINT `FK_subcategory` FOREIGN KEY (`Subcategory_ID`) REFERENCES `subcategories` (`ID`),
  ADD CONSTRAINT `FK_subcategory_product` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`ID`);

--
-- Ограничения за таблица `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `FK_subcategory_header` FOREIGN KEY (`Header_Name`) REFERENCES `header` (`Name`);

--
-- Ограничения за таблица `subcategories_of_categories`
--
ALTER TABLE `subcategories_of_categories`
  ADD CONSTRAINT `FK_subcategory_category` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `FK_subcategory_name` FOREIGN KEY (`Subcategory_Name`) REFERENCES `subcategories` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 31, 2020 at 10:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Web`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Id` int(10) UNSIGNED NOT NULL,
  `cover_picture` varchar(512) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `subtitle` varchar(64) DEFAULT NULL,
  `msg_for_us` varchar(1024) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `select_option` varchar(32) DEFAULT NULL,
  `first_picture` varchar(512) DEFAULT NULL,
  `first_description_picture` varchar(1024) DEFAULT NULL,
  `second_picture` varchar(512) DEFAULT NULL,
  `second_description_picture` varchar(1024) DEFAULT NULL,
  `third_picture` varchar(512) DEFAULT NULL,
  `third_descritpion_picture` varchar(1024) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  `google` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Id`, `cover_picture`, `title`, `subtitle`, `msg_for_us`, `phone`, `location`, `select_option`, `first_picture`, `first_description_picture`, `second_picture`, `second_description_picture`, `third_picture`, `third_descritpion_picture`, `description`, `instagram`, `facebook`, `twitter`, `google`) VALUES
(98, 'https://miro.medium.com/max/3840/1*encF5EeouyEH8YTANng4Aw.png', 'Universume', 'Planets', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3333-4534-132', 'North Pole', 'Сервиси', 'https://www.innovationnewsnetwork.com/wp-content/uploads/2020/05/Earth-like-planet-696x392.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://media.nature.com/lw800/magazine-assets/d41586-020-01905-5/d41586-020-01905-5_18118008.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTK6mQugDz3Jbs5gGn-5zTBXT7mp-3cDVChfg&usqp=CAU', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(99, 'https://b.fssta.com/uploads/application/soccer/team-logos/juventus.vresize.350.350.medium.0.png', 'Juventus', 'Old lady', 'Juventus Football Club (from Latin: iuventūs, \"youth\"; Italian pronunciation: [juˈvɛntus]), colloquially known as Juve (pronounced [ˈjuːve]),[3] is an Italian professional association football club based in Turin, Piedmont. Founded in 1897 by a group of Torinese students.', '222-2222-2222', 'Torino', 'Продукти', 'https://cdn.vox-cdn.com/thumbor/i05IFh8KKemyy7WSdBsS4kjJJwM=/0x0:3543x2362/1200x800/filters:focal(1489x898:2055x1464)/cdn.vox-cdn.com/uploads/chorus_image/image/67215712/1263241513.jpg.0.jpg', 'Juventus Football Club (from Latin: iuventūs, \"youth\"; Italian pronunciation: [juˈvɛntus]), colloquially known as Juve (pronounced [ˈjuːve]),[3] is an Italian professional association football club based in Turin, Piedmont. Founded in 1897 by a group of Torinese students.', 'https://i.ytimg.com/vi/7Ki3YM-uOrs/maxresdefault.jpg', 'Juventus Football Club (from Latin: iuventūs, \"youth\"; Italian pronunciation: [juˈvɛntus]), colloquially known as Juve (pronounced [ˈjuːve]),[3] is an Italian professional association football club based in Turin, Piedmont. Founded in 1897 by a group of Torinese students.', 'https://i.insider.com/5f36969ee89ebf001f04487b?width=1100&format=jpeg&auto=webp', 'Juventus Football Club (from Latin: iuventūs, \"youth\"; Italian pronunciation: [juˈvɛntus]), colloquially known as Juve (pronounced [ˈjuːve]),[3] is an Italian professional association football club based in Turin, Piedmont. Founded in 1897 by a group of Torinese students.', 'Juventus Football Club (from Latin: iuventūs, \"youth\"; Italian pronunciation: [juˈvɛntus]), colloquially known as Juve (pronounced [ˈjuːve]),[3] is an Italian professional association football club based in Turin, Piedmont. Founded in 1897 by a group of Torinese students.', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(100, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Hopetoun_falls.jpg/1200px-Hopetoun_falls.jpg', 'Nature', 'Nature is green', 'Nature is a British weekly scientific journal founded and based in London, England. As a multidisciplinary publication, Nature features peer-reviewed research from a variety of academic disciplines, mainly in science, technology, and the natural sciences.', '345 678', 'New York', 'Сервиси', 'https://scx1.b-cdn.net/csz/news/800/2019/2-nature.jpg', 'Nature is a British weekly scientific journal founded and based in London, England. As a multidisciplinary publication, Nature features peer-reviewed research from a variety of academic disciplines, mainly in science, technology, and the natural sciences.', 'https://think.kera.org/wp-content/uploads/2020/05/shutterstock_750703924-800x500.jpg', 'Nature is a British weekly scientific journal founded and based in London, England. As a multidisciplinary publication, Nature features peer-reviewed research from a variety of academic disciplines, mainly in science, technology, and the natural sciences.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQSe_Fi55uMzU7Us8mkH6eVcOc2FtEM2aL5FA&usqp=CAU', 'Nature is a British weekly scientific journal founded and based in London, England. As a multidisciplinary publication, Nature features peer-reviewed research from a variety of academic disciplines, mainly in science, technology, and the natural sciences.', 'Nature is a British weekly scientific journal founded and based in London, England. As a multidisciplinary publication, Nature features peer-reviewed research from a variety of academic disciplines, mainly in science, technology, and the natural sciences.', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(149, 'https://ichef.bbci.co.uk/news/976/cpsprodpb/692A/production/_112922962_apple.jpg', 'Apple', 'apple inc', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops and sells consumer electronics, computer software, and online services. It is considered one of the Big Tech technology companies, alongside Amazon, Google, Microsoft, and Facebook.[', '555-5-555-555', 'New York', 'Сервиси', 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops and sells consumer electronics, computer software, and online services. It is considered one of the Big Tech technology companies, alongside Amazon, Google, Microsoft, and Facebook.[', 'https://cdn.vox-cdn.com/thumbor/d_3Ytz7_h-wwHpy1C0yCbes6jIw=/0x0:2040x1360/1400x933/filters:focal(857x517:1183x843):no_upscale()/cdn.vox-cdn.com/uploads/chorus_image/image/67298385/acastro_20200818_1777_epicApple_0004.0.0.jpg', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops and sells consumer electronics, computer software, and online services. It is considered one of the Big Tech technology companies, alongside Amazon, Google, Microsoft, and Facebook.[', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQqe7KMScUoht6aStz-4misS-CwxN6wA3wMtA&usqp=CAU', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops and sells consumer electronics, computer software, and online services. It is considered one of the Big Tech technology companies, alongside Amazon, Google, Microsoft, and Facebook.[', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops and sells consumer electronics, computer software, and online services. It is considered one of the Big Tech technology companies, alongside Amazon, Google, Microsoft, and Facebook.[', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(151, 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'Nikola', 'Vasilkovski', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4ketgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', '4444444', 'Veles ', 'Продукти', 'https://i.pinimg.com/originals/9e/e6/b0/9ee6b0d57758a958f3bbf30b78ea82e5.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(152, 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'Nikola', 'Vasilkovski', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4ketgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', '4444444', 'Veles ', 'Продукти', 'https://i.pinimg.com/originals/9e/e6/b0/9ee6b0d57758a958f3bbf30b78ea82e5.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://image.shutterstock.com/image-photo/bright-spring-view-cameo-island-260nw-1048185397.jpg', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'etgertgertgertgertherthehetheyh45yj4567j467j467jk67k4k', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(153, 'https://movies.mxdwn.com/wp-content/uploads/2020/05/Disney.jpg', 'Disney World', 'For All Children', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', '345 678', 'Paris', 'Сервиси', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQVyPozN2TftqnJDbEGLyH-q5TxIGPCvZU_mQ&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSYubfFPXn5E5vP4q00hXt0iV8N00pZJzF-5Q&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTN9Rpzcp0oBjrHzUe-dWWYb855ASswGxincQ&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/'),
(154, 'https://movies.mxdwn.com/wp-content/uploads/2020/05/Disney.jpg', 'Disney World', 'For All Children', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', '345 678', 'Paris', 'Сервиси', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQVyPozN2TftqnJDbEGLyH-q5TxIGPCvZU_mQ&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSYubfFPXn5E5vP4q00hXt0iV8N00pZJzF-5Q&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTN9Rpzcp0oBjrHzUe-dWWYb855ASswGxincQ&usqp=CAU', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'The Walt Disney Company, commonly known as Disney, is an American diversified multinational mass media and entertainment conglomerate headquartered at the Walt Disney Studios complex in Burbank, California', 'https://www.instagram.com/?hl=entw', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://www.google.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

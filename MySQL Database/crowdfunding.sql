-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 05:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowdfunding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminUsername` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminUsername`, `adminPassword`) VALUES
('JFR', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `projectlaunchrequest`
--

CREATE TABLE `projectlaunchrequest` (
  `id` int(11) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `ownerAddress` varchar(1000) NOT NULL,
  `projectTitle` varchar(100) NOT NULL,
  `projectCategory` varchar(100) NOT NULL,
  `projectStory` varchar(1000) NOT NULL,
  `projectPhotoDir` varchar(1000) NOT NULL,
  `fundingGoal` double NOT NULL,
  `campaignDuration` int(11) NOT NULL,
  `projectLaunchPending` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectlaunchrequest`
--

INSERT INTO `projectlaunchrequest` (`id`, `ownerName`, `ownerAddress`, `projectTitle`, `projectCategory`, `projectStory`, `projectPhotoDir`, `fundingGoal`, `campaignDuration`, `projectLaunchPending`) VALUES
(35, 'Christopher Henry', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'NO FUTURE a cyberpunk graphic novel by Corbeyran and Jef', 'comics', 'Flying cars, robot butlers, and universal freedom for everyone to do as they please. A dream of the future, right? Not this future. The tipping point between Utopia and Dystopia is subjective and invisible, and civilization can’t help but blindly trample that line underfoot on a regular basis.  Far-left and far-right-leaning politics wrap completely around to the opposite ends of the spectrum, and the cycle of ideological struggle continues in a funhouse mirror reflection of itself.\r\n\r\nNO FUTURE is a highspeed cyberpunk vision of tomorrow written by prolific screenwriter CORBEYRAN and painted in vivid retro-nostalgic brushstrokes by fan-favorite illustrator JEF. This neo-noir blockbuster graphic novel recaptures the energy and aesthetic of classic sci-fi masters such as MOEBIUS, BILAL, JUAN GIMENEZ, and LADRONN with a modern flair. \r\n\r\n', 'projectPhotos/NO FUTURE a cyberpunk graphic novel by Corbeyran and Jef.jpg', 30, 10, 0),
(36, 'Djamila Knopf', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Luminescence', 'art', 'Inside the book, you’ll also find multiple tutorials and studies, as well as brand-new artwork, some of which was made exclusively for Luminescence. I will cover topics such as why you should make art, finding your artistic voice, and magic realism, making sure to pose some guiding questions along the way. \r\n\r\n', 'projectPhotos/Luminescence.jpg', 10, 6, 0),
(37, 'Christopher Henry', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Happy', 'art', 'lkjlkjlkjl', 'projectPhotos/Happy.jpg', 30, 7, 0),
(38, 'Abraham Lincoln ', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Happy', 'art', 'kjhkjhk', 'projectPhotos/Happy.jpg', 40, 7, 0),
(39, 'Abraham Lincoln ', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Remembering Leopards', 'design', 'sdasdfas', 'projectPhotos/Remembering Leopards.jpg', 40, 7, 0),
(40, 'Abraham Lincoln ', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Remembering Leopards', 'design', 'habijabi', 'projectPhotos/Remembering Leopards.jpg', 50, 5, 0),
(41, 'Jean Lincoln', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Smiling Widow', 'design', 'skjflskdf', 'projectPhotos/Smiling Widow.jpg', 120, 25, 0),
(42, 'Jack Reaper', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Flame Buster', 'photography', 'sfasdfad', 'projectPhotos/Flame Buster.jpg', 20, 3, 0),
(43, 'Jean Lincoln', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Remembering Leopards', 'food', 'sfsksjf', 'projectPhotos/Remembering Leopards.jpg', 49, 7, 0),
(44, 'Portgas D Ace', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Flame Buster', 'photography', 'Hellow', 'projectPhotos/Flame Buster.jpg', 20, 7, 0),
(45, 'Portgas D Ace', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Smiling Widow', 'food', 'Hello', 'projectPhotos/Smiling Widow.jpg', 40, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `ownerName` varchar(100) NOT NULL,
  `ownerAddress` varchar(1000) NOT NULL,
  `projectTitle` varchar(200) NOT NULL,
  `projectCategory` varchar(200) NOT NULL,
  `projectStory` varchar(1000) NOT NULL,
  `projectPhotoDir` varchar(500) NOT NULL,
  `fundingGoal` double NOT NULL,
  `projectStartTime` varchar(1000) NOT NULL,
  `projectEndTime` varchar(1000) NOT NULL,
  `projectStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `ownerName`, `ownerAddress`, `projectTitle`, `projectCategory`, `projectStory`, `projectPhotoDir`, `fundingGoal`, `projectStartTime`, `projectEndTime`, `projectStatus`) VALUES
(33, 'Christopher Henry', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'NO FUTURE a cyberpunk graphic novel by Corbeyran and Jef', 'comics', 'Flying cars, robot butlers, and universal freedom for everyone to do as they please. A dream of the future, right? Not this future. The tipping point between Utopia and Dystopia is subjective and invisible, and civilization can’t help but blindly trample that line underfoot on a regular basis.  Far-left and far-right-leaning politics wrap completely around to the opposite ends of the spectrum, and the cycle of ideological struggle continues in a funhouse mirror reflection of itself.\r\n\r\nNO FUTURE is a highspeed cyberpunk vision of tomorrow written by prolific screenwriter CORBEYRAN and painted in vivid retro-nostalgic brushstrokes by fan-favorite illustrator JEF. This neo-noir blockbuster graphic novel recaptures the energy and aesthetic of classic sci-fi masters such as MOEBIUS, BILAL, JUAN GIMENEZ, and LADRONN with a modern flair. \r\n\r\n', 'projectPhotos/NO FUTURE a cyberpunk graphic novel by Corbeyran and Jef.jpg', 30, '1705583062', '1705583662', 1),
(34, 'Djamila Knopf', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Luminescence', 'art', 'Inside the book, you’ll also find multiple tutorials and studies, as well as brand-new artwork, some of which was made exclusively for Luminescence. I will cover topics such as why you should make art, finding your artistic voice, and magic realism, making sure to pose some guiding questions along the way. \r\n\r\n', 'projectPhotos/Luminescence.jpg', 10, '1705584201', '1705584561', 1),
(35, 'Christopher Henry', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Happy', 'art', 'lkjlkjlkjl', 'projectPhotos/Happy.jpg', 30, '1705840378', '1705840798', 1),
(36, 'Abraham Lincoln ', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Happy', 'art', 'kjhkjhk', 'projectPhotos/Happy.jpg', 40, '1705841143', '1705841563', 1),
(37, 'Abraham Lincoln ', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Remembering Leopards', 'design', 'sdasdfas', 'projectPhotos/Remembering Leopards.jpg', 40, '1705844831', '1705845251', 0),
(38, 'Abraham Lincoln ', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Remembering Leopards', 'design', 'habijabi', 'projectPhotos/Remembering Leopards.jpg', 50, '1705845612', '1705845912', 1),
(39, 'Jean Lincoln', '0xD8eb16Cd7395aaA7Bf202DD4aF3022AC119FAE99', 'Smiling Widow', 'design', 'skjflskdf', 'projectPhotos/Smiling Widow.jpg', 120, '1705846328', '1705847828', 1),
(40, 'Jack Reaper', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Flame Buster', 'photography', 'sfasdfad', 'projectPhotos/Flame Buster.jpg', 20, '1705846995', '1705847175', 1),
(41, 'Jean Lincoln', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Remembering Leopards', 'food', 'sfsksjf', 'projectPhotos/Remembering Leopards.jpg', 49, '1705848499', '1705848919', 1),
(42, 'Portgas D Ace', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Flame Buster', 'photography', 'Hellow', 'projectPhotos/Flame Buster.jpg', 20, '1705849883', '1705850303', 1),
(43, 'Portgas D Ace', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Smiling Widow', 'food', 'Hello', 'projectPhotos/Smiling Widow.jpg', 40, '1705851783', '1705852203', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminUsername`);

--
-- Indexes for table `projectlaunchrequest`
--
ALTER TABLE `projectlaunchrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projectlaunchrequest`
--
ALTER TABLE `projectlaunchrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

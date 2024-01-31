-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 12:21 PM
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
('JFR-Anindita', '1234');

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
(1, 'Monolith', '0x615F16df51C875F476dC20c7427A60c0BCfa87E9', 'Conan by Monolith Red Nails Expansion and Versus Mode', 'game', 'Conan is a miniature-based board game for 1 to 5 players that takes you through the lands of the Hyborian Age for adventures that can be played in around 1 hour as you pit your wits, daring and tactical cunning against your opponent.\r\n\r\nThe genre classic is back with 4 brand new boxes filled with new stories and adventures, new settings, and of course, new miniatures!\r\n\r\nThere are now a total of 3 ways of playing the game: Solo/Cooperative, Adventure, and the brand new Versus Mode.\r\n\r\nIt is also the occasion to welcome new recruits to the Conan community with the return of the best version of the core box: the King Pledge for only 99€!\r\n\r\nThose who wish to wet their swords for the first time and veterans from previous campaigns shall join ranks and heed the call of Conan!\r\n', 'projectPhotos/1 - Conan by Monolith Red Nails Expansion and Versus Mode.jpg', 10, 1000, 0),
(2, 'Monolith', '0x615F16df51C875F476dC20c7427A60c0BCfa87E9', 'Zombie Fun Run', 'game', 'Theyre coming and we need your help! Zombies have taken over the world and only the Zombie Fun Runners can save the day! Join IRA, Crossing Guard Robot 2nd class, as he joins the Run circuit and becomes a hero!\r\n\r\nI have an immense love for zombies. You can tell by the many, many, MANY instances of zombies showing up in our games, all the way back with Molly the Werezompire being part zombie, through Cosmic Star Heroine having a certain police station parody sidequest, all the way up to our most recent game, This Way Madness Lies which somehow managed to fit zombies into a Shakespeare-themed magical girl game.\r\n\r\n', 'projectPhotos/2 - Zombie Fun Run.jpg', 7, 600, 0),
(3, 'Mo', '0x615F16df51C875F476dC20c7427A60c0BCfa87E9', 'Blood Throne The Tower of Sacrifice', 'game', 'Blood Throne is a cooperative, dark fantasy board game for 1-7 players. It features innovative mechanics, beautiful miniatures sculpted by the masters at creature caster, pop-up 3D terrain and a persistent, narratively driven campaign.', 'projectPhotos/3 - Blood Throne The Tower of Sacrifice.jpg', 40, 10, -1),
(4, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'The Leftover Taco Co The Tastiest Tacos Make', 'food', 'Its a lazy Sunday evening, cooking seemed like a chore, but creativity (and our stomachs!) beckoned... in a eureka moment, we decided to transform fresh leftovers into something extraordinary using tacos as our canvas.\r\n\r\nOne bite, and we were hooked. Before we knew it, we had made (and eaten) 10... \r\n...which then became a line out of the door of our apartment where over 50 strangers ate over 100 tacos just FOUR DAYS LATER.\r\n\r\nWe knew instantly that we had stumbled upon something unique and dear to us, but we wanted to figure out a way to bring these tacos to more people, outside of our Brooklyn neighborhood.\r\n\r\nTheyre the best tasting tacos you will ever have. \r\n\r\nDelivered fresh or frozen, our tacos are packed with flavor, are highly nutritious, and the perfect convenient meal after a long-days work. Just grab and go!', 'projectPhotos/4 - The Leftover Taco Co The Tastiest Tacos Make.jpg', 4, 10, 0),
(5, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Bloom Bistro and Grocery', 'food', 'A café: Bloom Bistro will serve fresh baked bagels & breads, housemade shmears (cream cheeses & other spreads), and made to order breakfast and lunch meals including sandwiches, salads and soups. The drink program will feature specialty coffee sourced from a local roastery and fresh squeezed juices. \r\n\r\nA neighborhood grocery: The grocery side will host many different locally sourced products and drinks including kombucha, ginger beer, ice cream, eggs, pastries, cured meats, cheeses, pickles, hot sauces, and fresh produce from local farms. All the food items will either be made in house or sourced locally from small businesses in the Pacific Northwest. Household items such as toilet paper, sanitary items, fresh flowers and greeting cards will also be part of the grocery. \r\n\r\nA community hub: We aim to create a space for our neighbors to gather and socialize, and build a community around genuine & delicious food. ', 'projectPhotos/5 - Bloom Bistro and Grocery.jpg', 8, 1000, 0),
(6, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'The Radical Beet Rad Vegan Eats', 'food', 'By coming together over shared meals, we hope to inspire positive change within our neighborhood and beyond. Our mission is to create a vibrant, and thriving hub entirely designed with YOU in mind. We are disruptors- we do things different here! We challenge the narrative that the food industry has to be a toxic work place environment. We challenge the idea that restaurants are not responsible for bettering their communities. We believe in recreating the Third Place that have been slowly stripped away from our communities. We are here to redefine the concept of a restaurant for the better, by providing a space for those who crave a slower, more intentional way of creating community, regardless of whether youre Vegan or Omnivore, Radical or just dipping your toes into community development!\r\n\r\n Lets make it happen together!', 'projectPhotos/6 - The Radical Beet Rad Vegan Eats.jpg', 6, 15, 0),
(7, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Two in One Tech Pouch', 'design', 'At Orbitkey, our goal is to make organization simple, yet versatile.\r\n\r\nThat’s why we designed the 2-in-1 Tech Pouch - allowing you to keep everything together when needed, and separate when you need more flexibility.\r\n\r\nA clever twin pouch organization system that says no to desk clutter and yes to storing your essentials with ease.\r\n\r\nThe detachable inner storage serves as a separate desk pouch for your most-used items. This allows quick access to your high-use items and the ability to keep lesser-used items off your desk, but not too far away.\r\n\r\n', 'projectPhotos/7 - Two in One Tech Pouch.jpg', 6, 10, 0),
(8, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Nova Titanium Pocket Pen', 'design', 'The Nova Pocket is a smaller version of our popular Nova pen. It features the same clean, minimalist design and titanium construction, but now comes in a smaller, more pocket-friendly format. \r\n\r\nWhen closed, it is very compact and perfect as an everyday carry pen. Once open, with the cap posted on the back of the pen, it becomes a full-size pen that is comfortable for extended writing sessions. \r\n\r\nTitanium needs no introduction. It is tough, lightweight, and its characteristic matte grey appearance complements the bullet-shaped Nova Pocket perfectly. The Nova Pocket is precision-machined from solid bars of Grade 5 titanium, which is one of the hardest grades available.\r\n\r\n', 'projectPhotos/8 - Nova Titanium Pocket Pen.jpg', 20, 490, 0),
(9, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Stepping Stones', 'design', 'Your feet are not just for walking. Feet, are the body’s foundation -  every part of the sole affects and controls your vital organs! Wearing just shoes that don’t fit properly or genetics affiliated with feet issues, feet pain is becoming a larger everyday problem. \r\n\r\nOn top of regular injuries and genetic disorders, your feet are prone to more harmful accidents in the long run that impact your mobility. Problems with foot condition increase as one ages, and one in three people has foot pain, stiffness or aching feet! Treating your body well is not just about body health checks when there is a recurring problem - Your health is in your hands by taking care of your feet. \r\n\r\nStepping Stones provides all the benefits of massaging and re-calibrating insoles with 3 interchangeable soles and 1 pair of sandals! Lightweight and quick dry, they are easy to bring to the office or take out for a casual daily stroll. They are suitable for all weathers, providing temperature moderation, anti-sli', 'projectPhotos/9 - Stepping Stones.jpg', 12, 20, 0),
(10, 'Serpyra', '0x7a7e8aB2061D1b61fCAe3c5AC235B65e807837D4', 'Vindicaris Book Three', 'comics', 'Vindicaris is a sci-fi/action webcomic about Periodica: soldiers of the Periodic Elements. It has been ongoing since 2018.\r\n\r\nThe story follows Ces and Sel: two rogue Periodica on their quest for revenge against their own creators. Along the way, they must combat gangs, other Periodica, and their own moral conflicts.\r\n\r\nVindicaris is rated 16+ for violence, blood, and occasional strong language. ', 'projectPhotos/10 - Vindicaris Book Three.jpg', 9, 50, 0),
(11, 'Jean Lincoln', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Beauty of the Jurassic World', 'art', 'This is a story about the beautiful Jurassic world and the art displays that properly, please fund it.', 'projectPhotos/11 - Beauty of the Jurassic World.jpg', 13, 6, 0),
(12, 'Christopher Henry', '0xB1D0A81d505E40dCc9553A6113661B03b7A9d99c', 'Flame Buster', 'art', 'This is an ancient style art. Please support it. I would be really grateful.', 'projectPhotos/12 - Flame Buster.jpg', 7, 10, 0);

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
(1, 'Monolith', '0x615F16df51C875F476dC20c7427A60c0BCfa87E9', 'Conan by Monolith Red Nails Expansion and Versus Mode', 'game', 'Conan is a miniature-based board game for 1 to 5 players that takes you through the lands of the Hyborian Age for adventures that can be played in around 1 hour as you pit your wits, daring and tactical cunning against your opponent.\r\n\r\nThe genre classic is back with 4 brand new boxes filled with new stories and adventures, new settings, and of course, new miniatures!\r\n\r\nThere are now a total of 3 ways of playing the game: Solo/Cooperative, Adventure, and the brand new Versus Mode.\r\n\r\nIt is also the occasion to welcome new recruits to the Conan community with the return of the best version of the core box: the King Pledge for only 99€!\r\n\r\nThose who wish to wet their swords for the first time and veterans from previous campaigns shall join ranks and heed the call of Conan!\r\n', 'projectPhotos/1 - Conan by Monolith Red Nails Expansion and Versus Mode.jpg', 10, '1706125611', '1706185611', 1),
(2, 'Monolith', '0x615F16df51C875F476dC20c7427A60c0BCfa87E9', 'Zombie Fun Run', 'game', 'Theyre coming and we need your help! Zombies have taken over the world and only the Zombie Fun Runners can save the day! Join IRA, Crossing Guard Robot 2nd class, as he joins the Run circuit and becomes a hero!\r\n\r\nI have an immense love for zombies. You can tell by the many, many, MANY instances of zombies showing up in our games, all the way back with Molly the Werezompire being part zombie, through Cosmic Star Heroine having a certain police station parody sidequest, all the way up to our most recent game, This Way Madness Lies which somehow managed to fit zombies into a Shakespeare-themed magical girl game.\r\n\r\n', 'projectPhotos/2 - Zombie Fun Run.jpg', 7, '1706126212', '1706162212', 1),
(3, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'The Leftover Taco Co The Tastiest Tacos Make', 'food', 'Its a lazy Sunday evening, cooking seemed like a chore, but creativity (and our stomachs!) beckoned... in a eureka moment, we decided to transform fresh leftovers into something extraordinary using tacos as our canvas.\r\n\r\nOne bite, and we were hooked. Before we knew it, we had made (and eaten) 10... \r\n...which then became a line out of the door of our apartment where over 50 strangers ate over 100 tacos just FOUR DAYS LATER.\r\n\r\nWe knew instantly that we had stumbled upon something unique and dear to us, but we wanted to figure out a way to bring these tacos to more people, outside of our Brooklyn neighborhood.\r\n\r\nTheyre the best tasting tacos you will ever have. \r\n\r\nDelivered fresh or frozen, our tacos are packed with flavor, are highly nutritious, and the perfect convenient meal after a long-days work. Just grab and go!', 'projectPhotos/4 - The Leftover Taco Co The Tastiest Tacos Make.jpg', 4, '1706127199', '1706127799', 1),
(4, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Bloom Bistro and Grocery', 'food', 'A café: Bloom Bistro will serve fresh baked bagels & breads, housemade shmears (cream cheeses & other spreads), and made to order breakfast and lunch meals including sandwiches, salads and soups. The drink program will feature specialty coffee sourced from a local roastery and fresh squeezed juices. \r\n\r\nA neighborhood grocery: The grocery side will host many different locally sourced products and drinks including kombucha, ginger beer, ice cream, eggs, pastries, cured meats, cheeses, pickles, hot sauces, and fresh produce from local farms. All the food items will either be made in house or sourced locally from small businesses in the Pacific Northwest. Household items such as toilet paper, sanitary items, fresh flowers and greeting cards will also be part of the grocery. \r\n\r\nA community hub: We aim to create a space for our neighbors to gather and socialize, and build a community around genuine & delicious food. ', 'projectPhotos/5 - Bloom Bistro and Grocery.jpg', 8, '1706127204', '1706187204', 1),
(5, 'Ejaaz Yasmin', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'The Radical Beet Rad Vegan Eats', 'food', 'By coming together over shared meals, we hope to inspire positive change within our neighborhood and beyond. Our mission is to create a vibrant, and thriving hub entirely designed with YOU in mind. We are disruptors- we do things different here! We challenge the narrative that the food industry has to be a toxic work place environment. We challenge the idea that restaurants are not responsible for bettering their communities. We believe in recreating the Third Place that have been slowly stripped away from our communities. We are here to redefine the concept of a restaurant for the better, by providing a space for those who crave a slower, more intentional way of creating community, regardless of whether youre Vegan or Omnivore, Radical or just dipping your toes into community development!\r\n\r\n Lets make it happen together!', 'projectPhotos/6 - The Radical Beet Rad Vegan Eats.jpg', 6, '1706127209', '1706128109', 1),
(6, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Two in One Tech Pouch', 'design', 'At Orbitkey, our goal is to make organization simple, yet versatile.\r\n\r\nThat’s why we designed the 2-in-1 Tech Pouch - allowing you to keep everything together when needed, and separate when you need more flexibility.\r\n\r\nA clever twin pouch organization system that says no to desk clutter and yes to storing your essentials with ease.\r\n\r\nThe detachable inner storage serves as a separate desk pouch for your most-used items. This allows quick access to your high-use items and the ability to keep lesser-used items off your desk, but not too far away.\r\n\r\n', 'projectPhotos/7 - Two in One Tech Pouch.jpg', 6, '1706128417', '1706129017', 1),
(7, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Nova Titanium Pocket Pen', 'design', 'The Nova Pocket is a smaller version of our popular Nova pen. It features the same clean, minimalist design and titanium construction, but now comes in a smaller, more pocket-friendly format. \r\n\r\nWhen closed, it is very compact and perfect as an everyday carry pen. Once open, with the cap posted on the back of the pen, it becomes a full-size pen that is comfortable for extended writing sessions. \r\n\r\nTitanium needs no introduction. It is tough, lightweight, and its characteristic matte grey appearance complements the bullet-shaped Nova Pocket perfectly. The Nova Pocket is precision-machined from solid bars of Grade 5 titanium, which is one of the hardest grades available.\r\n\r\n', 'projectPhotos/8 - Nova Titanium Pocket Pen.jpg', 20, '1706128421', '1706157821', 1),
(8, 'Orbitkey', '0x90B7391f409b65390b08613B9306AD5fff6ac227', 'Stepping Stones', 'design', 'Your feet are not just for walking. Feet, are the body’s foundation -  every part of the sole affects and controls your vital organs! Wearing just shoes that don’t fit properly or genetics affiliated with feet issues, feet pain is becoming a larger everyday problem. \r\n\r\nOn top of regular injuries and genetic disorders, your feet are prone to more harmful accidents in the long run that impact your mobility. Problems with foot condition increase as one ages, and one in three people has foot pain, stiffness or aching feet! Treating your body well is not just about body health checks when there is a recurring problem - Your health is in your hands by taking care of your feet. \r\n\r\nStepping Stones provides all the benefits of massaging and re-calibrating insoles with 3 interchangeable soles and 1 pair of sandals! Lightweight and quick dry, they are easy to bring to the office or take out for a casual daily stroll. They are suitable for all weathers, providing temperature moderation, anti-sli', 'projectPhotos/9 - Stepping Stones.jpg', 12, '1706128425', '1706129625', 1),
(9, 'Serpyra', '0x7a7e8aB2061D1b61fCAe3c5AC235B65e807837D4', 'Vindicaris Book Three', 'comics', 'Vindicaris is a sci-fi/action webcomic about Periodica: soldiers of the Periodic Elements. It has been ongoing since 2018.\r\n\r\nThe story follows Ces and Sel: two rogue Periodica on their quest for revenge against their own creators. Along the way, they must combat gangs, other Periodica, and their own moral conflicts.\r\n\r\nVindicaris is rated 16+ for violence, blood, and occasional strong language. ', 'projectPhotos/10 - Vindicaris Book Three.jpg', 9, '1706133351', '1706136351', 1),
(10, 'Jean Lincoln', '0xA40dD432D27Fb3097209B2c3B14E79E2FD6FbE4d', 'Beauty of the Jurassic World', 'art', 'This is a story about the beautiful Jurassic world and the art displays that properly, please fund it.', 'projectPhotos/11 - Beauty of the Jurassic World.jpg', 13, '1706152083', '1706152443', 1),
(11, 'Christopher Henry', '0xB1D0A81d505E40dCc9553A6113661B03b7A9d99c', 'Flame Buster', 'art', 'This is an ancient style art. Please support it. I would be really grateful.', 'projectPhotos/12 - Flame Buster.jpg', 7, '1706152719', '1706153319', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

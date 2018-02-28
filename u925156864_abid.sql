-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2018 at 04:48 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u925156864_abid`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(5) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_quote` text,
  `article_image` varchar(50) DEFAULT NULL,
  `category_id` int(3) NOT NULL,
  `author_id` int(3) NOT NULL,
  `article_date` datetime NOT NULL,
  `article_status` enum('0','1') NOT NULL,
  `article_tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_content`, `article_quote`, `article_image`, `category_id`, `author_id`, `article_date`, `article_status`, `article_tags`) VALUES
(11, 'Quisque luctus, urna id suscipit euismod, ante quam feugiat nisl', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc justo eros, sodales faucibus dui id, varius porttitor dui. Praesent egestas, ligula convallis tincidunt facilisis, odio ex semper sem, nec egestas nulla velit in ipsum. Mauris elit nisl, luctus vel semper eget, varius et leo. Sed ut elementum ipsum, eget tincidunt leo. Sed tristique mauris nibh, in efficitur magna semper et. Nam quis sapien ut augue condimentum auctor ac eu sapien. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc eget lorem et purus ultricies volutpat. Curabitur nibh neque, dignissim in condimentum in, suscipit ac massa. Pellentesque tincidunt, nisi eu imperdiet vehicula, justo ante sagittis metus, ut blandit quam risus eu libero. Nulla interdum turpis quam, tincidunt porta nibh malesuada eu.</p>\r\n\r\n<p>Proin porta ex et turpis scelerisque, non placerat urna dignissim. Vestibulum laoreet nisl eget neque posuere, ac imperdiet nulla ultricies. Quisque iaculis euismod dolor, at suscipit turpis condimentum vel. Quisque imperdiet, purus vitae dignissim lobortis, ex neque egestas lorem, a porta nisi dolor sed dui. Suspendisse mattis ex lectus, eu rutrum est rhoncus in. In malesuada purus felis, ut dignissim nibh posuere ut. Quisque luctus, urna id suscipit euismod, ante quam feugiat nisl, id rutrum turpis felis ornare orci. Nulla hendrerit sem at odio vulputate, eu fermentum nibh congue. In at nisi quam. Vestibulum vitae accumsan turpis, eget vulputate enim.</p>\r\n\r\n<p>Nullam tempus commodo diam, a eleifend lectus rutrum malesuada. Sed id sem tincidunt, commodo ante quis, cursus tortor. Etiam varius odio vitae semper pellentesque. Donec vulputate auctor diam venenatis malesuada. Aenean tempus lorem a mi rhoncus fermentum. Duis imperdiet ante mauris, sit amet placerat diam viverra in. Mauris ultrices pretium eros nec placerat. Aliquam erat volutpat. Proin nisi purus, venenatis id vulputate id, maximus non nisi. Praesent in est sed metus lobortis porttitor eu volutpat tellus. Fusce nec blandit justo, id scelerisque erat. Nulla orci quam, accumsan eget mattis in, finibus ac sem. Phasellus et sollicitudin mauris, ac gravida orci. Nulla non bibendum mauris, ornare facilisis lectus. Nullam nec faucibus ante.</p>\r\n\r\n<p>Mauris non malesuada sapien. Ut dignissim quam quis ex vehicula semper. Donec sit amet feugiat risus. Proin in enim auctor, euismod massa sit amet, cursus nibh. Phasellus lacinia vel nisi et feugiat. Proin dictum turpis et mauris feugiat porta. Praesent vel ipsum arcu. Pellentesque rhoncus suscipit metus non laoreet. Morbi lacinia mauris nibh, eu convallis metus congue vitae. Vestibulum porta, ex id tempor mollis, ante libero molestie dui, eu congue nisi turpis hendrerit est. Etiam odio tortor, dignissim venenatis ornare sit amet, placerat eu nisi. Phasellus interdum erat tristique ultricies dignissim. Nunc sit amet fringilla sem. Sed tristique, metus at efficitur consequat, purus dui dignissim felis, id luctus nibh odio in urna. Mauris rhoncus augue at erat commodo bibendum vel vel erat. Sed eu tincidunt augue.</p>\r\n\r\n<p>Phasellus id condimentum lorem. Morbi vel iaculis tellus. Donec sed lectus quis eros suscipit rhoncus. Mauris venenatis auctor quam et sollicitudin. Quisque fermentum auctor malesuada. Donec et convallis mauris, suscipit pulvinar sapien. Nam at feugiat libero. Quisque nec justo non dui malesuada tempor. In hac habitasse platea dictumst. Duis maximus justo id elementum accumsan. Donec vehicula ultrices nibh, a rutrum magna suscipit a.</p>\r\n', 'Sed id sem tincidunt, commodo ante quis, cursus tortor. Etiam varius odio vitae semper pellentesque', '94841.PNG', 6, 1, '2018-02-26 16:10:53', '1', 'tempus,commodo ,eleifend '),
(13, 'Curabitur a risus vitae erat scelerisque rutrum a sit amet odio', '<p>Fusce posuere dui a lorem laoreet laoreet. Mauris eleifend bibendum diam, vel facilisis mauris mollis ut. Maecenas vitae ante lectus. Etiam non diam tristique, convallis massa ac, rutrum odio. Donec rhoncus et urna a bibendum. Curabitur vitae elit nec nisi efficitur ullamcorper. Pellentesque neque velit, hendrerit a metus ut, tempus tincidunt nunc.</p>\r\n\r\n<p>Nulla eget orci risus. Suspendisse feugiat mauris libero, nec condimentum eros blandit et. Pellentesque nec commodo eros. Nullam malesuada aliquam sapien, lobortis faucibus sapien vehicula id. Mauris risus enim, semper eu sem nec, congue maximus tortor. Aenean mattis magna justo, a pretium quam interdum eget. Cras risus tortor, fringilla ac urna at, efficitur suscipit mi. Nullam aliquam, metus sed tempus fringilla, mauris purus suscipit risus, sed mattis lectus est et leo. Nulla gravida aliquet leo, et dapibus orci feugiat at. Proin quis mollis velit. Pellentesque sollicitudin, ligula quis blandit condimentum, augue leo tempus ipsum, vel luctus ex libero id ante. Nunc tempus efficitur enim nec posuere. Fusce venenatis tincidunt justo vel elementum. Aliquam vehicula leo id neque semper, vitae facilisis tellus semper. Pellentesque egestas ipsum ac hendrerit blandit. Nunc pulvinar neque vitae dignissim aliquet.</p>\r\n\r\n<p>Aliquam et metus in turpis varius tristique. Cras mattis orci non finibus venenatis. Praesent suscipit neque ac interdum porta. Maecenas mollis, diam et dignissim gravida, nisi neque eleifend nisi, sodales facilisis nisi nulla quis purus. Donec sed neque est. In neque lorem, sodales ut vehicula vitae, finibus sit amet magna. Nunc auctor est vel nisi sollicitudin tincidunt. Mauris pharetra nibh et magna dignissim feugiat. Donec ac purus leo. Fusce non vulputate mi, et eleifend felis. Aliquam pharetra cursus purus, vel rutrum nulla vehicula sit amet. Nam vehicula, nisl vitae convallis aliquam, massa est volutpat augue, nec pharetra mauris tellus eu eros. Morbi ornare tellus et cursus tempus. Morbi a neque nec odio dictum laoreet. Ut quam dui, fermentum in sagittis interdum, dapibus vel lacus.</p>\r\n\r\n<p>Curabitur sit amet lacinia tortor. Vivamus ligula mi, dictum sit amet faucibus vel, elementum vel diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin finibus lacus arcu, et iaculis enim venenatis a. Donec odio quam, tristique id purus nec, bibendum pulvinar risus. Curabitur sed sem quis augue tincidunt commodo sit amet ac erat. Proin luctus viverra libero sit amet pharetra. Proin laoreet purus quis justo viverra, pharetra gravida turpis varius. Morbi condimentum risus non est pulvinar, vitae egestas mi porttitor. Cras a nisl metus. Nam varius enim quis velit viverra pharetra. Etiam suscipit purus risus, quis elementum ex sagittis ac. Fusce leo libero, condimentum ut felis ut, aliquam tempus lorem.</p>\r\n\r\n<p>Curabitur a risus vitae erat scelerisque rutrum a sit amet odio. Aenean et rhoncus nisi. Nullam nisi erat, euismod a gravida non, tempus eget nulla. Nullam fermentum neque eu felis tempor convallis. Etiam sed iaculis lectus. Etiam fermentum quam tortor, volutpat posuere ante semper non. Sed vel tempor purus. Phasellus nec aliquam felis, ut tempus est. Ut interdum cursus mi vel imperdiet. Integer ut euismod sapien. Curabitur tempor ac nunc sit amet vulputate. Integer ut purus sagittis, efficitur purus et, blandit dui. Phasellus dapibus ex ipsum, vel egestas metus facilisis ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer eleifend sit amet tellus eget rhoncus. Aenean eleifend neque at placerat sodales.</p>\r\n', 'Ut interdum cursus mi vel imperdiet.', '80395.jpg', 3, 1, '2018-02-26 17:01:32', '1', 'Aenean ,rhoncus ,Integer ,euismod ,ipsum '),
(14, 'Suscipit purus risus', '<p>Fusce posuere dui a lorem laoreet laoreet. Mauris eleifend bibendum diam, vel facilisis mauris mollis ut. Maecenas vitae ante lectus. Etiam non diam tristique, convallis massa ac, rutrum odio. Donec rhoncus et urna a bibendum. Curabitur vitae elit nec nisi efficitur ullamcorper. Pellentesque neque velit, hendrerit a metus ut, tempus tincidunt nunc.</p>\r\n\r\n<p>Nulla eget orci risus. Suspendisse feugiat mauris libero, nec condimentum eros blandit et. Pellentesque nec commodo eros. Nullam malesuada aliquam sapien, lobortis faucibus sapien vehicula id. Mauris risus enim, semper eu sem nec, congue maximus tortor. Aenean mattis magna justo, a pretium quam interdum eget. Cras risus tortor, fringilla ac urna at, efficitur suscipit mi. Nullam aliquam, metus sed tempus fringilla, mauris purus suscipit risus, sed mattis lectus est et leo. Nulla gravida aliquet leo, et dapibus orci feugiat at. Proin quis mollis velit. Pellentesque sollicitudin, ligula quis blandit condimentum, augue leo tempus ipsum, vel luctus ex libero id ante. Nunc tempus efficitur enim nec posuere. Fusce venenatis tincidunt justo vel elementum. Aliquam vehicula leo id neque semper, vitae facilisis tellus semper. Pellentesque egestas ipsum ac hendrerit blandit. Nunc pulvinar neque vitae dignissim aliquet.</p>\r\n\r\n<p>Aliquam et metus in turpis varius tristique. Cras mattis orci non finibus venenatis. Praesent suscipit neque ac interdum porta. Maecenas mollis, diam et dignissim gravida, nisi neque eleifend nisi, sodales facilisis nisi nulla quis purus. Donec sed neque est. In neque lorem, sodales ut vehicula vitae, finibus sit amet magna. Nunc auctor est vel nisi sollicitudin tincidunt. Mauris pharetra nibh et magna dignissim feugiat. Donec ac purus leo. Fusce non vulputate mi, et eleifend felis. Aliquam pharetra cursus purus, vel rutrum nulla vehicula sit amet. Nam vehicula, nisl vitae convallis aliquam, massa est volutpat augue, nec pharetra mauris tellus eu eros. Morbi ornare tellus et cursus tempus. Morbi a neque nec odio dictum laoreet. Ut quam dui, fermentum in sagittis interdum, dapibus vel lacus.</p>\r\n\r\n<p>Curabitur sit amet lacinia tortor. Vivamus ligula mi, dictum sit amet faucibus vel, elementum vel diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin finibus lacus arcu, et iaculis enim venenatis a. Donec odio quam, tristique id purus nec, bibendum pulvinar risus. Curabitur sed sem quis augue tincidunt commodo sit amet ac erat. Proin luctus viverra libero sit amet pharetra. Proin laoreet purus quis justo viverra, pharetra gravida turpis varius. Morbi condimentum risus non est pulvinar, vitae egestas mi porttitor. Cras a nisl metus. Nam varius enim quis velit viverra pharetra. Etiam suscipit purus risus, quis elementum ex sagittis ac. Fusce leo libero, condimentum ut felis ut, aliquam tempus lorem.</p>\r\n\r\n<p>Curabitur a risus vitae erat scelerisque rutrum a sit amet odio. Aenean et rhoncus nisi. Nullam nisi erat, euismod a gravida non, tempus eget nulla. Nullam fermentum neque eu felis tempor convallis. Etiam sed iaculis lectus. Etiam fermentum quam tortor, volutpat posuere ante semper non. Sed vel tempor purus. Phasellus nec aliquam felis, ut tempus est. Ut interdum cursus mi vel imperdiet. Integer ut euismod sapien. Curabitur tempor ac nunc sit amet vulputate. Integer ut purus sagittis, efficitur purus et, blandit dui. Phasellus dapibus ex ipsum, vel egestas metus facilisis ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer eleifend sit amet tellus eget rhoncus. Aenean eleifend neque at placerat sodales.</p>\r\n', 'quis elementum ex sagittis ac. Fusce leo libero, condimentum ut felis ut, aliquam tempus lorem.', '68884.jpg', 5, 1, '2018-02-26 17:20:02', '1', 'sagittis ,Fusce '),
(15, 'Mencintai Ustadz', '<p>I Love U</p>\r\n\r\n<p>Ustadz</p>\r\n', 'Mencintai dalam diam', '12738.png', 7, 3, '2018-02-28 21:11:48', '1', 'cinta, ustadz');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(3) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL,
  `author_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_email`, `author_pass`) VALUES
(1, 'Abitruce', 'de@jacetre.com', 'kucrux30'),
(2, 'Abid Khairy', 'abid.khairy.ak@gmail.com', 'kcurux30'),
(3, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(3, 'Story'),
(4, 'Picture'),
(5, 'News'),
(6, 'Article'),
(7, 'Announcement');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(3) NOT NULL,
  `people_id` int(4) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `article_id` int(5) NOT NULL,
  `comment_reply` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `people_id`, `comment_content`, `comment_date`, `article_id`, `comment_reply`) VALUES
(2, 3, '<p>Duis maximus justo id elementum accumsan. Donec vehicula ultrices nibh, a rutrum magna suscipit a.</p>\r\n', '2018-02-26 16:11:54', 11, NULL),
(3, 4, '<p>ante libero molestie dui, eu congue nisi turpis hendrerit est. Etiam odio tortor, dignissim venenatis ornare sit amet, placerat eu nisi.</p>\r\n', '2018-02-26 16:14:17', 11, NULL),
(4, 5, '<p>Proin porta ex et turpis scelerisque, non placerat urna dignissim. Vestibulum laoreet nisl eget neque posuere, ac imperdiet nulla ultricies. Quisque iaculis euismod dolor, at suscipit turpis condimentum vel. Quisque imperdiet, purus vitae dignissim lobortis, ex neque egestas lorem, a porta nisi dolor sed dui.</p>\r\n', '2018-02-26 16:15:25', 11, NULL),
(5, 6, '<p>Cras mattis orci non finibus venenatis. Praesent suscipit neque ac interdum porta. Maecenas mollis, diam et dignissim gravida, nisi neque eleifend nisi, sodales facilisis ?</p>\r\n', '2018-02-26 17:06:09', 13, NULL),
(6, 7, '<p>eleifend sit amet tellus eget rhoncus,&nbsp;Aenean eleifend neque at placerat sodales</p>\r\n', '2018-02-26 17:21:38', 14, NULL),
(7, 8, '<p>Cras a nisl metus?</p>\r\n', '2018-02-26 17:22:13', 14, NULL),
(8, 9, '<p>lobortis faucibus sapien vehicula id. Mauris risus enim, semper eu sem nec, congue maximus tortor... (T_T)</p>\r\n', '2018-02-26 17:22:54', 14, NULL),
(9, 10, '<p>Cuma Ngetes...</p>\r\n', '2018-02-26 20:12:19', 14, NULL),
(10, 12, '<p>Pertamax bung</p>\r\n', '2018-02-26 22:11:22', 14, NULL),
(12, 14, 'abid', '2018-02-27 17:12:19', 14, NULL),
(13, 15, 'awdiogbesiugfwe', '2018-02-27 17:13:44', 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `people_id` int(4) NOT NULL,
  `people_name` varchar(100) NOT NULL,
  `people_email` varchar(100) NOT NULL,
  `people_phone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`people_id`, `people_name`, `people_email`, `people_phone`) VALUES
(1, 'Abitruce', 'de@jacetre.com', NULL),
(2, 'Abid Khairy', 'abid.khairy.ak@gmail.com', NULL),
(3, 'dictumst', 'dictumst@rutrum.com', '081243567883'),
(4, 'molestie ', 'molestie@eu.com', '026760889323'),
(5, 'Quisque ', 'Quisque@ax.com', '089123654856'),
(6, 'Maecenas ', 'Maecenas@email.com', '6289765439894'),
(7, 'rhoncus', 'Aenean@aa.com', '084331178424'),
(8, 'Cras', 'Cras@kk.com', '084671825749'),
(9, 'Mauris', 'Mauris@aa', '937940765579'),
(10, 'tes', 'tes@email', '882637891030'),
(11, 'admin', 'admin@gmail.com', NULL),
(12, 'Abang pertamax', 'pertamax@abang', '081555276461'),
(13, ' ??', 'Kurae@bakayarou.com', '8136746100'),
(14, 'khairy', 'dot@aa', '082347905543'),
(15, 'eaefhew8f', 'fhneiowfgweio@Aawfawf', '129123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `people_id` (`people_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`people_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `people_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`people_id`) REFERENCES `people` (`people_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

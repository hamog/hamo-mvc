-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 11:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `visible`) VALUES
(1, 'کامپیوتر', 1),
(3, 'پوشاک', 1),
(4, 'لوازم تزئینی', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `ts` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `dbsession`
--

CREATE TABLE IF NOT EXISTS `dbsession` (
  `id` char(32) COLLATE utf8_bin NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dbsession`
--

INSERT INTO `dbsession` (`id`, `expire`, `data`) VALUES
('iojflqkeaf1uco1e48psa34rk2', 1396695641, 0x64584e6c636d356862575638637a6f324f694a746232687a5a5734694f773d3d),
('r3jpc62bvhbdmku6efsto10c83', 1396695324, 0x6447567a644878704f6a55794e7a4d334e444d3764584e6c636d356862575638637a6f7a4f694a6862476b694f773d3d);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `pic` varchar(100) COLLATE utf8_bin NOT NULL,
  `ts` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `cat_id`, `title`, `body`, `pic`, `ts`, `visible`) VALUES
(4, 3, 1, 'قوچان‌نژاد: شايد روزي به ليگ ايران آمدم', 'رضا قوچان نژاد در گفت‌وگو با ایسنا، به سوالاتی درباره شرایط خودش و تیم الکویت و نیز انتظارات از تیم ملی در جام ملت‌های آسیا پاسخ داد که در زیر می‌آید:', 'public/images/post_imgs/logo.jpg', 1417942038, 1),
(5, 3, 3, 'فریمورک', 'اولین فریمورک خودم را با موفقیت پیاده سازی کردم.', 'public/images/post_imgs/images.jpg', 1421755386, 1),
(6, 3, 1, 'تست', ' تست تست  تست تست تست تست تست تست', 'public/images/post_imgs/php.png', 1421757752, 1),
(7, 3, 3, 'لباس', 'لباس های جین از قدیم در ایران استفاده می شدند. بهترین نوع این لباس ها از کشور ترکیه وارد می شوند.', '106', 1421778582, 0),
(8, 3, 1, 'gdfhgf', 'بیطلیبلبالبالتلا سبیلباgfdfrghthdtyjutyur', '106', 1421778719, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  `pass` char(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `pass`) VALUES
(1, 'علیرضا محمدی', 'alireza', '161684f95a698c663b29bce6e8514f24'),
(2, 'مریم کیانی', 'maryam', 'dd73bfdb2c321603cec1144ba9db6290'),
(3, 'علی علوی', 'ali', 'c126b27ac33078fe7406e9360f8aef43'),
(4, 'مهدی رجبی', 'mehdi', 'ad614cb18c9c6742d2e2f3b0492da601'),
(6, 'محمد مهدی معصومی', 'mmm', 'b6530450f1816f323e5192007b1fe92a'),
(11, 'مینا تاجیک', 'mino', '82fb0a33e61d101b5cf0a59acea7068f'),
(17, 'فرهاد رحمتی اصل', 'farhad', 'edd849ab7282d2f388fc2d69927e4a20'),
(18, 'مهسا محمدی', 'mahsa', 'c88ee6dd3b15d2cca65747bf1018f6ef'),
(19, 'مهرداد پولادی', 'mehrdad', '92231bab73bab0e23c7473a96238f749');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `dbsession`
--
ALTER TABLE `dbsession`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_comment_parent` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_post_category` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

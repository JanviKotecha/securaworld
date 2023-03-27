-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 06:17 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `host_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `detail`) VALUES
(1, '<p>We are a nascent venture into water tank cleaning.We clean a types of drinking water &nbsp;including overhead,underground,sintax,Cemen tanks etc for homes as well as institutational requirments.</p>\n<p>Our USP is the use of advance machinery for better clening of tank.The tank-clening process is desceibed in short below</p>\n<ul><li>Sunk out all water , mud and other particles water pump.</li><li>Clening trnk walls and floor manually using <strong>Anyway cleaner</strong> Which is bio degradable and safe even if consumed.</li><li><strong>High Pressure-spraying</strong> tank surface with water to remove any remaning dust and dirt.</li><li>Using <strong>UV light</strong> to kill any micro-organic that might be residing in the tank.</li></ul>\n<p>Good quality and quick services is our guarantee.We also send pictures of thanks before and after cleaning for you to gauge the difference.</p>\n<p>We would like to offer you our services on yearly,half-yearly,quartrrly or one-time basis as required.if you have any requirements,kindly let us know.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cate`
--

CREATE TABLE IF NOT EXISTS `blog_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `blog_cate`
--

INSERT INTO `blog_cate` (`id`, `cate`) VALUES
(1, 'General'),
(2, 'Travel'),
(4, 'Life Style'),
(5, 'Design'),
(6, 'Creative '),
(7, 'Eduction');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `cate` int(11) NOT NULL,
  `tit` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `srtdes` text CHARACTER SET utf8mb4 NOT NULL,
  `lngdes` text CHARACTER SET utf8mb4 NOT NULL,
  `dt` date NOT NULL,
  `updt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `img`, `cate`, `tit`, `srtdes`, `lngdes`, `dt`, `updt`) VALUES
(3, '1624599772.jpg', 1, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia abc def ghi', 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta.\r\n', '<p>Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta. Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro perferendis dolore.Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.</p>\r\n', '2021-06-25', '2021-06-26'),
(5, '1624601957.jpg', 1, 'Nisi magni odit consequatur autem nulla dolorem abc def ghi', 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam. Ad impedit qui officiis est in non aliquid veniam laborum. Id ipsum qui aut. Sit aliquam et quia molestias laboriosam. Tempora nam odit omnis eum corrupti qui aliquid excepturi molestiae. Facilis et sint quos sed voluptas. Maxime sed tempore enim omnis non alias odio quos distinctio.', '<p>Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.</p>\r\n', '2021-06-25', '2021-06-26'),
(6, '1624603807.jpg', 2, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.abc def ghi', 'Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.', '<p>Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. Quam quia nesciunt qui aut est non omnis. Inventore occaecati et quaerat magni itaque nam voluptas. Voluptatem ducimus sint id earum ut nesciunt sed corrupti nemo.</p>\r\n\r\n<p>Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim tenetur sunt omnis. Doloremque est saepe laborum aut. Ipsa cupiditate ex harum at recusandae nesciunt. Ut dolores velit.</p>\r\n', '2021-06-25', '2021-06-26'),
(8, '1624680569.jpg', 5, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi eaque iste omnis a qui. Quia sed sunt. Ea asperiores expedita et et delectus voluptates rerum. Id saepe ut itaque quod qui voluptas nobis porro rerum. ', '<p>Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel. Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.</p>\r\n\r\n<p>Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores.</p>\r\n', '2021-06-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(256) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `sub` text NOT NULL,
  `msg` varchar(500) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nm`, `eml`, `mob`, `sub`, `msg`, `dt`) VALUES
(5, 'abcd', 'abc@gmail.com', '9876543210', 'no', 'no', '2021-06-16 17:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(250) NOT NULL,
  `desi` varchar(250) NOT NULL,
  `rev` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nm`, `desi`, `rev`) VALUES
(1, 'xyz', 'developers', 'We visited this place for breakfast product. The place is very conveniently located. The food at definitely worth the price. Good quantity served per portion. Service as also good.s\r\n'),
(4, 'abc', 'xyz', 'We visited this place for breakfast product. The place is very conveniently located. The food at definitely worth the price. Good quantity served per portion. Service as also good.'),
(6, 'softpad', 'developer', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `image`) VALUES
(3, 1, '1624083357.jpg'),
(4, 2, '1623906615.jpg'),
(7, 2, '1623906699.jpg'),
(12, 4, '1623929709.jpg'),
(13, 4, '1623929732.jpg'),
(15, 3, '1623930363.jpg'),
(23, 1, '1623990877.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE IF NOT EXISTS `gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `category`) VALUES
(1, 'Temple'),
(2, 'Hospital'),
(3, 'School'),
(4, 'collagee');

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE IF NOT EXISTS `icon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `img`, `link`) VALUES
(2, '1624343143.png', '---'),
(3, '1624343154.png', '---'),
(4, '1624361206.jpg', '----'),
(5, '1624343178.png', '----'),
(6, '1624343192.png', '---- '),
(7, '1624343205.png', '----'),
(8, '1624343230.jpg', '----'),
(9, '1624343246.jpg', '----'),
(10, '1624343261.jpg', '----'),
(11, '1624360393.jpg', '----');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `tit` varchar(250) NOT NULL,
  `imgcat` enum('1','2','3') NOT NULL COMMENT '1=app,2=card,3=web',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `img`, `tit`, `imgcat`) VALUES
(1, '1624442418.jpg', 'Bajri ', '1'),
(6, '1624446666.jpg', 'Bajri Garlic', '2'),
(7, '1624446990.jpg', ' bngvjk', '3'),
(8, '1624448791.jpg', 'abcd', '1'),
(9, '1624448807.jpg', 'efgh', '1'),
(10, '1624448824.jpg', 'ijk', '2'),
(11, '1624448851.jpg', 'mnop', '2'),
(12, '1624448875.jpg', 'manali', '3'),
(13, '1624448911.jpg', 'fvdfg', '3'),
(14, '1624451774.jpg', 'hhh', '1'),
(15, '1624526899.jpeg', 'pre', '2');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `dt`) VALUES
(1, 'admin', 'admin', '2021-06-16 04:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(250) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `addr` varchar(2000) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`eml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nm`, `eml`, `mob`, `addr`, `img`) VALUES
(1, 'Sanket Mahesh Gorvadkar gfhg', 'alfacleningservices@gmail.com', '+91-9881148955', 'Nashikk', '1624086394.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recent_update`
--

CREATE TABLE IF NOT EXISTS `recent_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hdin` varchar(250) NOT NULL,
  `tit` varchar(250) NOT NULL,
  `des` varchar(250) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recent_update`
--

INSERT INTO `recent_update` (`id`, `hdin`, `tit`, `des`, `img`) VALUES
(2, 'ghgf', 'hhhfg', 'dvc cf vf gh', '1624354662.jpg'),
(3, 'gtdhghh', ' bngvjk', 'hfghfhfhgfhhffh htyfhn hhtnfbn', '1624356976.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `tit` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `des` text CHARACTER SET utf8mb4 NOT NULL,
  `link` varchar(250) NOT NULL,
  `lintyp` enum('Inner','Outer') NOT NULL DEFAULT 'Inner',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `img`, `tit`, `des`, `link`, `lintyp`) VALUES
(8, '1624007908.jpg', 'xyz', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendiEt harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendiEt harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi', '*****', 'Outer');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(250) NOT NULL,
  `tit` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `des` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `link` varchar(250) NOT NULL,
  `lintyp` enum('Inner','Outer') NOT NULL DEFAULT 'Inner',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `tit`, `des`, `link`, `lintyp`) VALUES
(1, '1624099915.jpg', 'Welcome to Village', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'javascript:void(0)', 'Inner'),
(2, '1624099964.jpg', 'Lorem Ipsum Dolor', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.', 'javascript:void(0)', 'Inner'),
(3, '1624100007.jpg', 'Sequi ea ut et est quaerat', 'Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.\r\n', 'javascript:void(0)', 'Inner');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insta` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `youtb` varchar(250) NOT NULL,
  `twit` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `insta`, `fb`, `youtb`, `twit`) VALUES
(1, '---', '--', '--', '--');

-- --------------------------------------------------------

--
-- Table structure for table `social_team`
--

CREATE TABLE IF NOT EXISTS `social_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `nm` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `desig` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `post` text CHARACTER SET utf8mb4 NOT NULL,
  `ins` text NOT NULL,
  `fb` text NOT NULL,
  `eml` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `social_team`
--

INSERT INTO `social_team` (`id`, `img`, `nm`, `desig`, `post`, `ins`, `fb`, `eml`) VALUES
(1, '1624428002.jpg', 'Walter White', 'Chief Executive Officer', 'Explicabo voluptatem mollitia et repellat', '----', '--------------', 'W@gmail.com'),
(2, '1624420862.jpg', 'Sarah Jhonson', 'Product Manager', 'Aut maiores voluptates amet et quis vhtjn ghgfg fgbgdf ggh gdfg ', '*****', '**********', 'TYO@gmail.com'),
(3, '1624420913.jpg', 'William Anderson', 'CTO', 'Quisquam facilis cum velit laborum corrupti', '===', '====', 'RTO@gmail.com'),
(4, '1624428020.jpg', 'Amanda Jepson', 'Accountant', 'Dolorum tempora officiis odit laborum officiis', '---', '=======', 'IO@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

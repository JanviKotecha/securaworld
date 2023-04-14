-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2023 at 07:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securaworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `a_desc` text NOT NULL,
  `v_cont` text NOT NULL,
  `m_cont` text NOT NULL,
  `v_img` varchar(250) NOT NULL,
  `m_img` varchar(250) NOT NULL,
  `mi_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `a_desc`, `v_cont`, `m_cont`, `v_img`, `m_img`, `mi_img`) VALUES
(1, '<p>Secura is a pioneer in the Indian Electronic Surveillance Industry with widest CCTV deployment pan India. Our biggest goal is to bring you peace of mind, through state-of-the-art surveillance solutions that are consistently strengthened through innovation. The quality of our offerings reflects in our diverse clientele, ranging from high-profile government and public sector departments to numerous private sector clients and homeowners. Secura products are made in India, using indigenous R&amp;D and manufacturing processes, ensuring 100% data security.</p>\r\n\r\n<p>In 2018, Secura emerged as one of the leading technology solution provider for various Smart City missions across India. With continued R&amp;D investments in Video analytics, patent applications, and talented workforce, Secura is poised to dominate the video analytics vertical in India and expand in to international markets.</p>\r\n\r\n<p>Our commitment goes beyond offering the most advanced surveillance solutions, to creating employment opportunities and contributing to the growth of the Indian economy.</p>\r\n', '<li>To establish lookman as an undisputed leader in security technology</li>\r\n<li>To create a safe world through ground-breaking surveillance technology</li>\r\n\r\n', '<p>To ensure the highest security standards across homes and offices by consistently delivering cutting-edge surveillance systems.</p>\r\n', 'vission.png', 'mission.png', 'Group 67.png');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cate`
--

CREATE TABLE `blog_cate` (
  `id` int(11) NOT NULL,
  `cate` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog_cate`
--

INSERT INTO `blog_cate` (`id`, `cate`) VALUES
(1, 'General'),
(2, 'Travel'),
(4, 'Life Style'),
(5, 'Design'),
(6, 'Creative '),
(7, 'Eduction'),
(8, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `cate` int(11) NOT NULL,
  `tit` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `srtdes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lngdes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dt` date NOT NULL,
  `updt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nm` varchar(256) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nm`, `eml`, `mob`, `msg`, `dt`) VALUES
(5, 'abcd', 'abc@gmail.com', '9876543210', 'no', '2021-06-16 17:17:54'),
(6, 'demo', 'demo@gmail.com', '9876543210ff', 'dmnfb', '2023-03-28 17:08:35'),
(7, 'd', 'hs@gmail.com', '982-573-9845', 'wsdf', '2023-03-28 17:52:36'),
(8, 'd', 'hs@gmail.com', '982-573-9845', 'wsdf', '2023-03-28 17:52:37'),
(9, 'd', 'hs@gmail.com', '982-573-9845', 'wsdf', '2023-03-28 17:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `dt`) VALUES
(1, 'admin', 'admin@123', '2021-06-16 04:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nm` varchar(250) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `addr` varchar(2000) NOT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nm`, `eml`, `mob`, `addr`, `img`) VALUES
(1, 'demo', 'demo@gmail.com', '+91 44 6622 2222', 'New No. 15, Old No. 9, 2nd Street Extn, 3rd Main Road, CIT Nagar, Nandanam, Chennai- 600 035, Tamil Nadu', '1624086394.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `insta` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `youtb` varchar(250) NOT NULL,
  `twit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `insta`, `fb`, `youtb`, `twit`) VALUES
(1, '---', '--', '--', '--');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `tit` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ldesc` text NOT NULL,
  `dt` date NOT NULL,
  `updt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`id`, `img`, `tit`, `des`, `ldesc`, `dt`, `updt`) VALUES
(9, '1680064942.png', ' Camera Tampering Detection ', 'Camera Tampering Detection Camera Tampering Detection is an Advanced Video based analytic which can be coupled up with any of the SECURA’s Video Analytics. ', '<ul>\r\n	<li>Camera Tampering Detection is an Advanced Video based analytic which can be coupled up with any of the SECURA&rsquo;s Video Analytics. It further strengthens the SECURA&rsquo;s video solution by continuously monitoring the video feed from the camera.</li>\r\n	<li>Camera tampering event will be generated whenever a camera is moved, partially covered, severely defocused, paint sprayed etc. This feature is available onboard Secura?s smart camera series at edge.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(10, '1679895728.png', 'People / Object counting', 'People / Object Counting Counts the people in exhibitions to avoid Over crowding Helps in better Staff planning by', '<ul>\r\n	<li>Counts the people in exhibitions to avoid Over crowding</li>\r\n	<li>Helps in better Staff planning by getting people flow statistics.</li>\r\n	<li>Helps in estimating the better ways to evacuate any building by knowing the total people count in advance.</li>\r\n	<li>Helps in getting the routing information as the cameras not only count people, but they can also sense the direction of movement to determine the route people take inside the store.</li>\r\n	<li>Useful in knowing the Average dwell time of people inside any building.</li>\r\n	<li>For extremely large crowds more than 500, Secura pioneers in accurate crowd estimation algorithms that are most reliable for administration and security of important events.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(11, '1679895828.jpg', 'Helmet detection on two wheelers', 'Helmet detection on two wheelers The Secura Analytics software can detect helmet on bike riders and flag a no', '<ul>\r\n	<li>The Secura Analytics software can detect helmet on bike riders and flag a no helmet worn violation alert along with Vehicle License Plate number.</li>\r\n	<li>The system integrates with e-Challan Application to issue e-Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n	<li>Apart from no helmet violation, the software can also be used to detect no helmet for pillion riders and triple riding on a bike.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(12, '1679897140.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(13, '1679897149.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(14, '1679897150.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(15, '1679897150.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(16, '1679897150.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(17, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(18, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(19, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(20, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(21, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(22, '1679897151.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(23, '1679897152.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(24, '1679897152.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(25, '1679897152.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(26, '1679897153.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(27, '1679897153.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(28, '1679897153.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(29, '1679897153.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00'),
(30, '1679897154.jpg', 'Speed Violation Detection', 'Speed Violation Detection The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set ', '<ul>\r\n	<li>The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</li>\r\n	<li>It also captures License plate of the violating vehicle.</li>\r\n	<li>It can be integrated with e-Challan Application to issue e- Challan to the violator.</li>\r\n	<li>Based on sizeable data collected over time, statistical analysis to predict patterns or violation probability in an area can be provided.</li>\r\n</ul>\r\n', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_cate`
--
ALTER TABLE `blog_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`eml`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_cate`
--
ALTER TABLE `blog_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

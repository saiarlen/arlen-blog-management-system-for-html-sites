-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 07:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `ar_admin`
--

CREATE TABLE `ar_admin` (
  `ar_userid` int(11) NOT NULL,
  `ar_username` varchar(255) NOT NULL,
  `ar_authemail` varchar(255) NOT NULL,
  `ar_password` varchar(255) NOT NULL,
  `ar_authorname` varchar(255) NOT NULL,
  `ar_company` varchar(255) NOT NULL,
  `ar_avatar` varchar(255) NOT NULL,
  `ar_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_admin`
--

INSERT INTO `ar_admin` (`ar_userid`, `ar_username`, `ar_authemail`, `ar_password`, `ar_authorname`, `ar_company`, `ar_avatar`, `ar_role`) VALUES
(1, 'saiarlen', 'saiprasad431431@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Sai Prasad', 'Digitalozone India', 'http://localhost/blog/admin/deps/img/no-photo.jpg', 'superadmin'),
(26, 'arjun', 'km234@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Arjun', 'cisco', 'http://localhost/blog/admin/deps/img/no-photo.jpg', 'author');

-- --------------------------------------------------------

--
-- Table structure for table `ar_categories`
--

CREATE TABLE `ar_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_slug` varchar(255) DEFAULT NULL,
  `cat_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_categories`
--

INSERT INTO `ar_categories` (`cat_id`, `cat_name`, `cat_slug`, `cat_count`) VALUES
(80, 'Technology News', 'technology-news', NULL),
(81, 'Information', 'information', NULL),
(83, 'Personal', 'personal', NULL),
(84, 'Assistive', 'assistive', NULL),
(85, 'World one', 'world-one', NULL),
(116, 'blog one', 'blog-one', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ar_meta`
--

CREATE TABLE `ar_meta` (
  `id` int(11) NOT NULL,
  `dashboard` varchar(255) NOT NULL,
  `frontend` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `apkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_meta`
--

INSERT INTO `ar_meta` (`id`, `dashboard`, `frontend`, `mail`, `apkey`) VALUES
(1, '{\"iconlogo\":\"\",\"txtlogo\":\"\",\"favic\":\"\",\"titlepfx\":\"\",\"dashbpl\":\"5\",\"disqusurl\":\"https://saiarlen.disqus.com/embed.js\",\"htab\":\"1\",\"rssurl\":\"\"}', '{\"frontpl\":\"5\",\"disqusurlf\":\"\",\"fpsorder\":\"DESC\",\"fcomments\":\"1\"}', '{\"smtptype\":\"google\",\"smtpuser\":\"\",\"smtppass\":\"\",\"smtpfrom\":\"\",\"smtphost\":\"\",\"smtpsec\":\"\",\"smtpport\":\"\"}', '');

-- --------------------------------------------------------

--
-- Table structure for table `ar_posts`
--

CREATE TABLE `ar_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_url` varchar(255) DEFAULT NULL,
  `post_category` varchar(255) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_kws` varchar(255) DEFAULT NULL,
  `post_des` text DEFAULT NULL,
  `post_date` varchar(24) DEFAULT NULL,
  `post_content` longtext DEFAULT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `post_exp` varchar(255) DEFAULT NULL,
  `post_imgalt` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_posts`
--

INSERT INTO `ar_posts` (`post_id`, `post_title`, `post_url`, `post_category`, `post_tags`, `post_kws`, `post_des`, `post_date`, `post_content`, `post_img`, `post_exp`, `post_imgalt`, `post_author`) VALUES
(1, 'What is the meaning of lorem ipsum aluma', 'what-is-the-meaning-of-lorem-ipsum-aluma', '84, 83, 81', '9, 8', 'Lorem, ipsm, article', 'Lorem ipsum is the most popular form of dummy content or placeholder text. It is a pseudo-Latin word originated from Cicero\'s De Finibus Bonorum et Malorum.', '15-08-2020 20:40:54', '<p>Saiarlen Enim nisi sit officia laboris tempor ad eu fugiat. Lorem ullamco culpa ullamco minim. Veniam nisi in quis sunt. Quis nostrud velit sit deserunt consequat reprehenderit Lorem commodo.</p>\r\n\r\n<p>Fugiat aliquip exercitation dolor amet do. Lorem ea cillum excepteur duis. Dolore excepteur tempor cillum laborum reprehenderit nulla.</p>\r\n\r\n<p>Consequat anim id amet occaecat amet. Dolore incididunt labore aliqua adipisicing labore enim officia occaecat culpa. Esse adipisicing nisi dolore elit pariatur cillum est mollit. Commodo qui ut sint quis.</p>\r\n\r\n<p>Excepteur sunt eiusmod reprehenderit pariatur duis. Magna nostrud nulla anim amet ad sit aliquip excepteur. Voluptate labore esse veniam nostrud mollit. Ex veniam Lorem in id id aute.</p>\r\n\r\n<p>Sit reprehenderit culpa do eu nulla. Adipisicing commodo duis proident magna nulla incididunt sint. Reprehenderit ipsum ut est sunt Lorem mollit. Quis ipsum velit ut mollit dolore tempor dolor velit. Culpa minim laborum in adipisicing nisi duis ea minim.</p>\r\n', '/blog/admin/deps/fileman/Uploads/blog1.jpg', 'Enim nisi sit officia laboris tempor ad eu fugiat. Lorem ullamco culpa ullamco minim. Veniam nisi in quis sunt.', 'Blog Image', 'Sai Prasad'),
(2, 'Sunt proident irure proident eiusmod culpa est sint aliquip ut', 'sunt-proident-irure-proident-eiusmod-culpa-est-sint-aliquip-ut', '81, 80', '9, 7, 4', '', '', '15-08-2020 16:11:17', '<p>Eiusmod adipisicing eu pariatur officia et deserunt elit incididunt esse. <strong>Aliquip ea ea in proident officia nostrud reprehenderit eiusmod ullamco</strong>. Qui est labore nisi anim veniam excepteur consequat voluptate velit. <em>Ut elit consectetur qui laborum commodo</em> dolore aute adipisicing occaecat. Consectetur in dolor dolore excepteur laborum do occaecat id Lorem. Ad dolor voluptate enim cillum id id labore non irure. Ea aliqua laboris magna occaecat consectetur labore officia et sunt. Ullamco aute ea enim ullamco irure proident sint velit cillum. Sunt proident irure proident eiusmod culpa est sint aliquip ut.</p>\r\n\r\n<p><span style=\"color:#1abc9c\">Cillum mollit non aliqua non nostrud ut</span> commodo consectetur anim. <a href=\"http://saiarlen.com\" target=\"_blank\">Esse Lorem minim irure tempor</a> eu minim ullamco qui mollit. Incididunt exercitation sit minim qui commodo cillum ad magna exercitation. Culpa irure ad cupidatat anim dolor aute consectetur quis deserunt. Dolor minim culpa ea excepteur sunt irure dolor pariatur do. Fugiat aliquip deserunt cupidatat duis consectetur aliquip culpa velit non. Sunt sint proident commodo sunt ipsum adipisicing labore esse fugiat. Laboris consequat fugiat ullamco elit sint ex eu deserunt nulla. Officia mollit minim ea voluptate fugiat do fugiat aliquip sunt. Quis irure cillum minim excepteur elit dolor eu ea cupidatat.</p>\r\n\r\n<p>Cillum irure dolor quis commodo eiusmod tempor amet elit aliquip. Eiusmod ad nostrud laborum eu veniam sit sit cillum incididunt. Do dolor ex cillum excepteur officia laboris est ut incididunt. Laboris magna adipisicing elit mollit ad occaecat sint eu ea.</p>\r\n\r\n<p>Reprehenderit minim qui in ex aute incididunt aliqua quis exercitation. Amet occaecat magna ullamco fugiat sint cupidatat consequat adipisicing aliquip. Ex mollit sit qui proident consequat nostrud excepteur eiusmod deserunt. Adipisicing do qui consequat quis velit sit amet laborum cupidatat. Ea quis et esse et non elit cillum voluptate ipsum. Laborum fugiat nisi velit dolor deserunt fugiat excepteur cillum Lorem. Non irure laborum esse laboris exercitation fugiat reprehenderit id sunt. Aliquip id minim quis labore non et duis in sint. Ea culpa esse ipsum incididunt aliqua occaecat reprehenderit dolor quis. Laboris adipisicing est nostrud quis sit dolor esse esse ex.</p>\r\n\r\n<p>Sit ad sit incididunt dolore ut pariatur aute laborum aliqua. Sit consectetur proident mollit sit do occaecat id ex cupidatat. Occaecat cupidatat dolore deserunt ad labore reprehenderit adipisicing consectetur enim.</p>\r\n', '/blog/admin/deps/fileman/Uploads/blog2.jpg', 'Please add Some Excerpt to see content here.', 'Blog Image', 'Sai Prasad'),
(3, 'Magna esse laboris ullamco ut sint eiusmod labore fugiatm', 'magna-esse-laboris-ullamco-ut-sint-eiusmod-labore-fugiatm', '85, 84, 83, 81, 80', '10, 9, 7', '', '', '15-08-2020 20:02:27', '<p>Excepteur cillum veniam incididunt in mollit anim elit nisi sit. Adipisicing ut nisi officia sunt id labore sint nulla. Aute aute commodo eu aute est cupidatat.</p>\r\n\r\n<p>Ipsum nisi et est velit id irure ullamco exercitation. Veniam voluptate pariatur ullamco ullamco ut ut adipisicing. Quis elit nisi ullamco pariatur aute cupidatat Lorem non culpa. Occaecat dolore elit non quis dolore sint eiusmod anim.</p>\r\n\r\n<p>Magna fugiat aliquip excepteur eu id aliqua sit. Eu in fugiat laboris ad sint eiusmod. Sint occaecat aliqua ipsum magna velit qui nulla sint id. Exercitation nisi Lorem ea minim veniam dolore anim. Eiusmod aliquip aute ad tempor magna quis sint in. Enim et amet ad irure velit elit aliqua.</p>\r\n\r\n<p>Do velit et ex Lorem reprehenderit ex et nostrud. Exercitation id irure commodo proident do minim elit ex do. Excepteur incididunt sunt cupidatat commodo cillum mollit aliqua. Exercitation non id amet elit ex magna enim est.</p>\r\n\r\n<p>Magna tempor minim excepteur commodo ex tempor. Magna esse laboris ullamco ut sint eiusmod labore fugiat. Exercitation nostrud esse mollit ut laboris esse laborum non cupidatat. Do aute occaecat duis dolor qui deserunt nostrud consectetur nulla.</p>\r\n', '/blog/admin/deps/fileman/Uploads/blog3.jpg', 'Please add Some Excerpt to see content here.', 'Blog Image', 'Arjun'),
(4, 'Proident voluptate cupidatat nulla', 'proident-voluptate-cupidatat-nulla', '84', '9', 'Blog', '', '15-08-2020 18:27:59', '<p>Excepteur incididunt ut nostrud do laborum irure voluptate mollit laborum. Ipsum incididunt excepteur minim nisi irure duis sit eu fugiat. Amet nostrud enim sit nulla reprehenderit nostrud non excepteur cupidatat. Lorem mollit enim excepteur eu enim dolor non dolore mollit. Labore ullamco ad ex nisi sit proident non minim sit. Officia dolor laborum eu in amet tempor mollit qui dolor. Proident eiusmod culpa reprehenderit laboris sit officia ullamco duis non.</p>\r\n\r\n<p>Proident voluptate cupidatat nulla est sunt mollit consequat qui amet. Aliqua Lorem est laborum fugiat cillum eu pariatur amet dolore. Mollit esse ad duis consectetur consectetur amet non fugiat mollit. Id incididunt dolor ullamco culpa quis mollit anim ullamco ea. Elit aliquip do dolor voluptate ut eu nulla adipisicing eu. Tempor mollit enim ipsum anim irure ullamco commodo pariatur ad. Dolore commodo in laboris aliquip duis cillum eiusmod magna occaecat. Amet sit ipsum laborum sit aliqua voluptate irure nulla tempor.</p>\r\n\r\n<p>Officia id proident cillum sit cillum eu aute est elit. Aute exercitation labore voluptate velit dolore pariatur occaecat adipisicing sunt. Et reprehenderit dolore reprehenderit deserunt voluptate proident sit consequat cillum. Duis enim do officia laboris ut do consectetur quis minim. In et dolore qui aliquip velit sint elit laboris excepteur.</p>\r\n\r\n<p>Amet voluptate aute sit est ipsum dolore nostrud aliqua excepteur. Officia qui ipsum nostrud reprehenderit do do sunt nisi ipsum. Excepteur veniam voluptate labore consectetur labore consectetur adipisicing do anim.</p>\r\n\r\n<p>Veniam aute aliquip adipisicing ea consequat consequat sunt nostrud sit. Nisi aliqua excepteur sit eu nisi quis enim nostrud fugiat. Occaecat elit incididunt exercitation aliquip enim irure est ipsum occaecat.</p>\r\n', '/blog/admin/deps/fileman/Uploads/blog4.jpg', 'Please add Some Excerpt to see content here.', 'Blog Image', 'Sai Prasad');

-- --------------------------------------------------------

--
-- Table structure for table `ar_tags`
--

CREATE TABLE `ar_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  `tag_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_tags`
--

INSERT INTO `ar_tags` (`tag_id`, `tag_name`, `tag_count`) VALUES
(4, 'Blog', NULL),
(7, 'Web', NULL),
(8, 'Learn', NULL),
(9, 'Course', NULL),
(10, 'Arlen', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ar_visits`
--

CREATE TABLE `ar_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_views` int(10) UNSIGNED NOT NULL,
  `unique_views` mediumint(255) NOT NULL,
  `visitor_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ar_visits`
--

INSERT INTO `ar_visits` (`id`, `total_views`, `unique_views`, `visitor_ip`) VALUES
(2, 50, 2, '::1'),
(3, 1, 1, '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ar_admin`
--
ALTER TABLE `ar_admin`
  ADD PRIMARY KEY (`ar_userid`);

--
-- Indexes for table `ar_categories`
--
ALTER TABLE `ar_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ar_meta`
--
ALTER TABLE `ar_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ar_posts`
--
ALTER TABLE `ar_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `ar_tags`
--
ALTER TABLE `ar_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `ar_visits`
--
ALTER TABLE `ar_visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ar_admin`
--
ALTER TABLE `ar_admin`
  MODIFY `ar_userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ar_categories`
--
ALTER TABLE `ar_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `ar_meta`
--
ALTER TABLE `ar_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ar_posts`
--
ALTER TABLE `ar_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `ar_tags`
--
ALTER TABLE `ar_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ar_visits`
--
ALTER TABLE `ar_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

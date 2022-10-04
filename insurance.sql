-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 09:43 AM
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
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cause` varchar(255) NOT NULL,
  `when` date NOT NULL,
  `where` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `insure_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `type`, `cause`, `when`, `where`, `level`, `picture`, `status`, `insure_no`) VALUES
(1, 'dsfdsf', 'sdfdsf', '2022-09-30', 'dsfdsf', 'Severe', '', 1, 'VI-647875060'),
(2, 'dsfdsf', 'dsfdsfds', '2022-09-21', 'sfsdfdsfdsf', 'Serious', '', 0, 'VI-647875060'),
(3, 'gdfgdf', 'sdfdf', '2022-09-08', 'sdfdsf', 'Serious', '', 1, 'VI-647875060'),
(4, 'gdfg', 'df', '2022-09-22', 'sdfdsf', 'Serious', '', 0, 'VI-647875060'),
(6, 'fire', 'fire', '2022-09-22', 'tamale', 'Serious', '', 0, 'VI-296847298');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `Man_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `dri_name` varchar(255) NOT NULL,
  `dri_linc` varchar(255) NOT NULL,
  `dri_dis` varchar(255) NOT NULL,
  `insure_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `comp_name`, `Man_name`, `location`, `dri_name`, `dri_linc`, `dri_dis`, `insure_no`, `email`) VALUES
(1, 'sdfsdf', 'dsfdsf', 'dsffsd', 'sfdsfds', 'fdsfdsf', 'driDis', 'VI-268721696', 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(15) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `email`, `code`, `date`) VALUES
(5, 'abdulmars1102@gmail.com', '22575', '2022-09-06'),
(6, 'abdulmars1102@gmail.com', '808375', '2022-09-06'),
(7, 'harunainusah402@gmail.com', '251740', '2022-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `insured`
--

CREATE TABLE `insured` (
  `id` int(11) NOT NULL,
  `accident` varchar(255) NOT NULL,
  `calamity` varchar(255) NOT NULL,
  `fire` varchar(255) NOT NULL,
  `theft` varchar(255) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `exp_date` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1,
  `monthly` tinyint(4) NOT NULL DEFAULT 1,
  `current_month` varchar(255) NOT NULL,
  `insure_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insured`
--

INSERT INTO `insured` (`id`, `accident`, `calamity`, `fire`, `theft`, `start_date`, `exp_date`, `status`, `monthly`, `current_month`, `insure_no`) VALUES
(2, '0', '1', '1', '0', '2021-09-02', '2022-09-02', 1, 1, '0000-00-00', 'VI-723831399'),
(7, '1', '0', '1', '0', '2022-09-02', '2023-09-13', 1, 1, '09', 'VI-647875060'),
(14, '1', '1', '1', '1', '2021-09-13', '2022-09-13', 1, 1, '09', 'VI-482802523'),
(15, '1', '1', '1', '1', '2022-09-14', '2023-09-14', 1, 1, '09', 'VI-296847298'),
(16, '1', '1', '0', '0', '2022-09-21', '2023-09-21', 1, 1, '09', 'VI-732995373');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `firstname`, `lastname`, `email`, `phone`, `gender`, `token`, `password`, `role`, `date_created`) VALUES
(7, 'two trsy', 'test', 'test2@gmail.com', 145236, 'Female', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-01 17:36:59'),
(11, 'dhfjh,hj', 'vbvbc', 'test3@gmail.com', 2147483647, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-02 14:01:38'),
(12, 'test ', 'five', 'test5@gmail.com', 9652350, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-03 12:25:08'),
(13, 'test ', 'six', 'test6@gmail.com', 4543654, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-04 08:13:51'),
(18, 'add admin', 'testing one', 'admin@admin.com', 345345454, 'Female', '', '601f1889667efaebb33b8c12572835da3f027f78', 1, '2022-09-04 14:17:48'),
(19, 'add admin', 'testing two', 'admin2@admin.com', 3466458, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 1, '2022-09-04 14:19:40'),
(21, 'test ', 'seven', 'test7@gmail.com', 45345, 'Female', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-05 21:13:20'),
(22, 'Abdul Rashid', 'Mustapha', 'abdulmars1102@gmail.com', 249393898, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-06 15:48:20'),
(23, 'test ', 'ten', 'test8@gmail.com', 1343455, 'Male', '', '381664f19845e3d57c071007c0139a428bf459d4', 0, '2022-09-13 11:59:24'),
(24, 'haruna', 'inusah', 'harunainusah402@gmail.com', 258963, 'Male', '123123', '', 0, '2022-09-13 12:07:43'),
(25, 'one', 'user', 'user@user.com', 21547836, 'Male', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-20 19:21:06'),
(26, 'two', 'user', 'user2@user.com', 2147483647, 'Female', '', '601f1889667efaebb33b8c12572835da3f027f78', 0, '2022-09-21 21:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `email`, `name`, `msg`, `date_sent`) VALUES
(1, 'test2@gmail.com', 'test two', 'message one', '2022-09-03 20:45:40'),
(2, 'test2@gmail.com', 'test two', 'test 2', '2022-09-03 20:46:28'),
(3, 'test3@gmail.com', 'vbvbc dhfjh,hj', 'test three Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Veritatis, dolore quaerat itaque, consequatur tempora placeat quasi vero iste fugit? Pariatur, ratione, non? Ea hic nulla quibusdam architecto explicabo blanditiis debitis quasi cumque! Ratione consequatur voluptatem blanditiis est nihil, dolorem, ipsa dolor natus accusamus qui. Esse, totam numquam et distinctio magni vitae nostrum modi ducimus, repellat quam saepe doloribus obcaecati nam quas ipsam reprehenderit officia aspernatur, nesciunt vero. Doloribus soluta cum vel vitae et debitis, dignissimos quas placeat quo voluptas possimus consequatur alias, odit eius in cumque eaque ducimus, explicabo culpa consectetur repellendus. Natus laborum, aut ipsum est unde voluptate sequi.', '2022-09-03 20:47:33'),
(4, 'test3@gmail.com', 'vbvbc dhfjh,hj', 'nulla quibusdam architecto explicabo blanditiis debitis quasi cumque! Ratione consequatur voluptatem blanditiis est nihil, dolorem, ipsa dolor natus accusamus qui. Esse, totam numquam et distinctio magni vitae nostrum modi ducimus, repellat quam saepe doloribus obcaecati nam quas ipsam reprehenderit officia aspernatur, nesciunt vero. Doloribus', '2022-09-03 20:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `person_id` int(11) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `kin` varchar(255) NOT NULL,
  `rel_kin` varchar(255) NOT NULL,
  `licence` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `insure_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`person_id`, `house_no`, `kin`, `rel_kin`, `licence`, `occupation`, `disability`, `picture`, `insure_no`, `email`) VALUES
(1, 'j 34 bkl b', 'user test', 'brother', 'D-09465', 'driver', 'None', '', 'VI-722490959', 'test1@gmail.com'),
(2, '234ds', 'dfdfdfs', 'sdfdsf', 'sdsdss4', 'sdfdsfds', 'visual', '', 'VI-704655610', 'test1@gmail.com'),
(8, 'dsfdsf', 'dgdg', 'dsfdsfd', 'sdfdsf', 'dsfdsf', 'None', '', 'VI-723831399', 'test3@gmail.com'),
(9, 'xcvcxvc', 'cxvcxvxc', 'vcvc', 'cxvcxvcxv', 'cvcxv', 'None', 'img/63134f3284b57.jpg', 'VI-647875060', 'test2@gmail.com'),
(13, 'fdsfds', 'dsfd', 'dfdfds', 'sdfs', 'dsfdsf', 'None', 'img/63134f3284b57.jpg', 'VI-208277012', 'test5@gmail.com'),
(14, 'dsfds', 'dsfdsfdsf', 'dsfdsf', 'fdfsdf', 'dsfds', 'None', 'img/63134f7c0aab4.jpg', 'VI-208277012', 'test5@gmail.com'),
(15, 'dfdsfdsf', 'dsfdsf', 'dsfdsfd', 'dsfdsfdsf', 'dsfdsf', 'None', 'img/63134fee18bac.jpg', 'VI-208277012', 'test5@gmail.com'),
(18, 'fgdfgfgdfgfd', 'fgdfg', 'dfgdfg', 'dfgdfgdf', 'gdfgdfg', 'None', 'img/63162083a0e15.jpg', '', 'admin@admin.com'),
(19, 'k 254a', 'test 7 kin', 'father', 'd4535', 'driver', 'None', 'img/6316679307a95.jpg', 'VI-958647231', 'test7@gmail.com'),
(21, 'gfhgf', 'kiin test', 'father', '3453f', 'fgdfg', 'None', 'img/632070e68734a.png', 'VI-482802523', 'test8@gmail.com'),
(22, 'jhj.3565', 'jutytrdhg', 'ujghv', 'hfg', 'njg', 'None', 'img/632072a725cd4.jpg', 'VI-534539364', 'harunainusah402@gmail.com'),
(23, 'n 67k', 'user kin', 'father', '345673', 'driver', 'None', 'img/632a12ee57408.png', 'VI-319156150', 'user@user.com'),
(24, 'h 45', 'user 2 king', 'mother', 'k354', 'driver', 'None', 'img/632b7ece0fe1c.jpg', 'VI-732995373', 'user2@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_title`, `service_info`) VALUES
(1, 'accident', 'Accident', 'Been in a car accident? Keep calm, we cover damages your car sustains in an accident. '),
(2, 'Natural calamities', 'Natural calamities', 'Calamities can wreak havoc and your car is not immune to them, but your finances are!'),
(3, 'Fire', 'Fire', 'We won\'t let a fire or an explosion burn your finances to ashes, be rest assured your car. '),
(4, 'Theft', 'Theft', 'Your car getting stolen could be your worst nightmare come true, but we ensure your peace. ');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `seat_capa` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `insure_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `name`, `model`, `type`, `plate_no`, `color`, `seat_capa`, `img`, `insure_no`) VALUES
(3, 'Mecedes Benz', 'Benz 49', 'Benz 49', 'sd45446', 'blue', 6, '', 'VI-723831399'),
(10, 'benz', 'Benz 49', 'Benz 49', 'Gh 8211 N', 'ash', 4, 'img/63145e6050cac.png', 'VI-427685279'),
(11, 'sdfdsf', 'dsfdfdsfdf', 'dsfdsfsf', 'dsfddsf', 'dfdsfdsf', 45, 'img/6316208cdef50.png', ''),
(12, 'toyota', 'totato 46', 'toyota', 'kd543', 'black', 74, 'img/631667d42010e.png', 'VI-958647231'),
(13, 'dgdgf', 'Benz 49', 'tydf', 'dfgdg5345', '', 25, 'img/6320711bc7a2b.png', 'VI-482802523'),
(14, 'hdg', 'bmw', '56fhhg', 'ghgf', 'hjghf', 25, 'img/632072c2884b1.png', 'VI-534539364'),
(15, 'ffd', 'bjhjh', 'fyghg', 'ghgg', 'jhjjh', 10, 'img/6320b1e66c24e.png', 'VI-647875060'),
(16, 'Mecedes Benz', 'Benz 49', 'Benz 49', 'gh 908 N', 'Black', 5, 'img/632a136f6a558.png', 'VI-319156150'),
(17, 'Toyota', 'toyota 4', 'toyota', 'gh 34', 'red', 10, 'img/632b7efc89ba1.png', 'VI-732995373');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insured`
--
ALTER TABLE `insured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insured`
--
ALTER TABLE `insured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

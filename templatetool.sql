-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2020 at 12:32 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `templatetool`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_customer`
--

CREATE TABLE `add_customer` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_customer`
--

INSERT INTO `add_customer` (`id`, `login_id`, `name`, `mobile`, `email`, `website`, `img`, `status`) VALUES
(27, '29', 'GoBikes', '9770599354', 'gobike@gmail.com', 'Go Bikes', '1601619586_milkman1.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `role` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `role`, `username`, `password`, `status`) VALUES
(1, 'superadmin', 'admin', '123', 0),
(29, 'admin', 'UID80', '80', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tc_about`
--

CREATE TABLE `tc_about` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_about`
--

INSERT INTO `tc_about` (`id`, `login_id`, `image`, `description`, `date_time`, `date`) VALUES
(1, '29', '1601554275_billing.png', 'Product research is the key strength of our organization. Our R&amp;amp;D team studies a business segment, analyses its requirements, checks market feasibility and develop specialized software product that help making lives of number of businessmen easier and better. As a result we have completely automated such root level trades where nobody can even think about computerization like Fruits and vegetable market, milk dairies, laundries etc.  \r\n\r\n\r\nProduct research is the key strength of our organization. Our R&amp;amp;D team studies a business segment, analyses its requirements, checks market feasibility and develop specialized software product that help making lives of number of businessmen easier and better. As a result we have completely automated such root level trades where nobody can even think about computerization like Fruits and vegetable market, milk dairies, laundries etc.  ', 'Oct 02, 2020 12:07:11', '2020-10-02'),
(2, '29', '1601620672_app.png', 'Product research is the key strength of our organization. Our R&amp;amp;D team studies a business segment, analyses its requirements, checks market feasibility and develop specialized software product that help making lives of number of businessmen easier and better. As a result we have completely automated such root level trades where nobody can even think about computerization like Fruits and vegetable market, milk dairies, laundries etc.  ', 'Oct 02, 2020 12:07:52', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tc_banner`
--

CREATE TABLE `tc_banner` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `altname` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_banner`
--

INSERT INTO `tc_banner` (`id`, `login_id`, `altname`, `image`, `date_time`, `date`) VALUES
(7, '29', 'gobikes', '1601549190_app2.jpg', 'Oct 01, 2020 16:16:30', '2020-10-01'),
(8, '29', 'gobikes', '1601549237_slider2.jpg', 'Oct 01, 2020 16:17:17', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tc_contact`
--

CREATE TABLE `tc_contact` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `youtube` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_contact`
--

INSERT INTO `tc_contact` (`id`, `login_id`, `name`, `email`, `mobile`, `phone`, `youtube`, `facebook`, `address`, `logo`, `date_time`, `date`) VALUES
(2, '29', 'GoBikes', 'gobikes@gmail.com', '9770599354', '321321', 'https://youtube.com', 'https://facebook.com', 'Tiwari Complex Near Shiv Takies, Bilaspur C.G', '1601547899_favicon-32x32.png', 'Oct 01, 2020 17:15:51', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tc_enquiry`
--

CREATE TABLE `tc_enquiry` (
  `id` int(11) NOT NULL,
  `domain_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_enquiry`
--

INSERT INTO `tc_enquiry` (`id`, `domain_id`, `name`, `mobile`, `email`, `msg`, `date_time`, `date`) VALUES
(2, '29', 'Test user', '1235647899', 'fsdf@edgssd.fghgfh', 'jhgkgkghk', 'Oct 02, 2020 13:42:59', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tc_feedback`
--

CREATE TABLE `tc_feedback` (
  `id` int(11) NOT NULL,
  `domain_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `msg` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) COLLATE utf8mb4_general_ci NOT NULL,
  `date` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_feedback`
--

INSERT INTO `tc_feedback` (`id`, `domain_id`, `name`, `mobile`, `email`, `msg`, `date_time`, `date`) VALUES
(1, '', 'fgd', '1234567899', 'fsdf@edgssd.fghgfh', 'dsgsg', 'Oct 02, 2020 13:32:30', '2020-10-02'),
(2, '29', 'fgd', '1234567899', 'fsdf@edgssd.fghgfh', 'dsgsg', 'Oct 02, 2020 13:37:43', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tc_officetime`
--

CREATE TABLE `tc_officetime` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tc_news` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_officetime`
--

INSERT INTO `tc_officetime` (`id`, `login_id`, `tc_news`, `date_time`, `date`) VALUES
(3, '29', 'Monday - 09:30am to 7:00pm', 'Oct 01, 2020 17:07:09', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tc_product`
--

CREATE TABLE `tc_product` (
  `id` int(11) NOT NULL,
  `login_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(555) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_product`
--

INSERT INTO `tc_product` (`id`, `login_id`, `title`, `link`, `image`, `description`, `date_time`, `date`) VALUES
(17, '29', 'Product 1', 'http://myerpsoftware.com/updates/OnePlus_Setup.exe', '1601550399_student1.png', '', 'Oct 01, 2020 16:36:39', '2020-10-01'),
(18, '29', 'Product 2', 'http://myerpsoftware.com/updates/OnePlus_Setup.exe', '1601550837_smartclinic1.png', 'ERP Software for Jewellery Shops with Stock Management, Girvi management, Tag Printing, Today Rates, Ordering manage, Sale ', 'Oct 01, 2020 16:43:57', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tc_productenquery`
--

CREATE TABLE `tc_productenquery` (
  `id` int(11) NOT NULL,
  `domain_id` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `productid` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc_productenquery`
--

INSERT INTO `tc_productenquery` (`id`, `domain_id`, `userId`, `productid`, `date_time`, `date`) VALUES
(3, '29', '4', '17', 'Oct 02, 2020 14:53:23', '2020-10-02'),
(4, '29', '4', '18', 'Oct 02, 2020 14:56:54', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `domain_id` varchar(333) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(333) COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` varchar(555) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `domain_id`, `name`, `email`, `mobile`, `password`, `date_time`, `date`) VALUES
(1, '', 'Admin Panel', 'fsdf@edgssd.fghgfhds', '74574', '45refdydsfg', 'Oct 02, 2020 12:25:25', '2020-10-02'),
(2, '', '', '', '', '', 'Oct 02, 2020 12:25:44', '2020-10-02'),
(3, '', 'fghd', '', '5445', 'dfhdfsh', 'Oct 02, 2020 12:26:15', '2020-10-02'),
(4, '', 'Admin Panel', 'gobikes@gmail.com', '1234567899', '123456', 'Oct 02, 2020 12:38:57', '2020-10-02'),
(5, '', 'Admin Panel', 'niceA@fgmail.com', '1234567898', 'vcncv', 'Oct 02, 2020 12:40:25', '2020-10-02'),
(6, '', 'Admin Panel', '', '1234567897', '1', 'Oct 02, 2020 12:43:05', '2020-10-02'),
(7, '', 'Admin Panel', '', '123', '123', 'Oct 02, 2020 12:45:10', '2020-10-02'),
(8, '29', 'Test user', '', '1478523698', '123456', 'Oct 02, 2020 13:45:14', '2020-10-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_customer`
--
ALTER TABLE `add_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_about`
--
ALTER TABLE `tc_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_banner`
--
ALTER TABLE `tc_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_contact`
--
ALTER TABLE `tc_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_enquiry`
--
ALTER TABLE `tc_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_feedback`
--
ALTER TABLE `tc_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_officetime`
--
ALTER TABLE `tc_officetime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_product`
--
ALTER TABLE `tc_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_productenquery`
--
ALTER TABLE `tc_productenquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_customer`
--
ALTER TABLE `add_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tc_about`
--
ALTER TABLE `tc_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tc_banner`
--
ALTER TABLE `tc_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tc_contact`
--
ALTER TABLE `tc_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tc_enquiry`
--
ALTER TABLE `tc_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tc_feedback`
--
ALTER TABLE `tc_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tc_officetime`
--
ALTER TABLE `tc_officetime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tc_product`
--
ALTER TABLE `tc_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tc_productenquery`
--
ALTER TABLE `tc_productenquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

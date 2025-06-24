-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 07:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory3`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(14) NOT NULL,
  `brand_name` varchar(128) DEFAULT NULL,
  `brand_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(14) NOT NULL,
  `cat_name` varchar(64) DEFAULT NULL,
  `cat_status` enum('ACTIVE','INACTIVE') DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(2, 'CM', 'ACTIVE'),
(3, 'EE', 'ACTIVE'),
(4, 'EJ', 'ACTIVE'),
(5, 'ME', 'ACTIVE'),
(6, 'CE', 'ACTIVE'),
(7, 'Librarian', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(14) NOT NULL,
  `color_name` varchar(64) DEFAULT NULL,
  `color_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(14) NOT NULL,
  `group_name` varchar(128) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `comment_id` varchar(64) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `note_image` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` varchar(128) DEFAULT NULL,
  `notification_status` enum('seen','unseen') NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `cat_id` int(14) DEFAULT NULL,
  `subcat_id` int(14) DEFAULT NULL,
  `brand_id` int(14) DEFAULT NULL,
  `pro_sku` varchar(64) DEFAULT NULL,
  `pro_name` varchar(256) DEFAULT NULL,
  `pro_price` varchar(64) DEFAULT NULL,
  `selling_price` varchar(64) DEFAULT NULL,
  `discount` varchar(64) DEFAULT NULL,
  `discount_starts` varchar(64) DEFAULT NULL,
  `discount_end` varchar(64) DEFAULT NULL,
  `pro_image` varchar(64) DEFAULT NULL,
  `pro_image1` varchar(128) DEFAULT NULL,
  `pro_image2` varchar(128) DEFAULT NULL,
  `pro_image3` varchar(128) DEFAULT NULL,
  `pro_summery` varchar(512) DEFAULT NULL,
  `pro_details` varchar(1024) DEFAULT NULL,
  `quantity` varchar(64) DEFAULT NULL,
  `requested_by` varchar(255) DEFAULT NULL,
  `req_quantity` varchar(11) DEFAULT NULL,
  `request_status` enum('1','0') NOT NULL DEFAULT '0',
  `principal_approval` enum('Approved','Pending','Cencel') NOT NULL DEFAULT 'Pending',
  `Hod_Approval` enum('Approved','Pending','Cencel') NOT NULL DEFAULT 'Pending',
  `WS_Approval` enum('Approved','Pending','Cencel') NOT NULL DEFAULT 'Pending',
  `Storekeeper_Approval` enum('Approved','Pending','Cancel') NOT NULL DEFAULT 'Pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pro_id`, `cat_id`, `subcat_id`, `brand_id`, `pro_sku`, `pro_name`, `pro_price`, `selling_price`, `discount`, `discount_starts`, `discount_end`, `pro_image`, `pro_image1`, `pro_image2`, `pro_image3`, `pro_summery`, `pro_details`, `quantity`, `requested_by`, `req_quantity`, `request_status`, `principal_approval`, `Hod_Approval`, `WS_Approval`, `Storekeeper_Approval`, `date`) VALUES
(4, 'P347', 2, 2, NULL, '123456', '1)	Language Lab with relevant software and Computer system', '500', '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'Dr. K.L.Bawankule', '7800', '1', 'Approved', 'Approved', 'Approved', 'Approved', '2023-04-19 16:27:57'),
(6, 'P426', 2, 2, NULL, 'Viru1111', 'Random Access Memory (RAM). Read-Only Memory (ROM), Graphic cards. ', '22222', '222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', 'Dr. K.L.Bawankule', '200', '1', 'Approved', 'Approved', 'Pending', 'Pending', '2023-04-19 16:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `color_id` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(128) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `size_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `system_email` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `system_email`, `address`) VALUES
(1, 'Steller-logo-white.png', 'Codeigniter crud with ajax for admin and product management', 'Codeigniter crud with ajax for admin and product management site or any other site', 'madCoderz', '324324234234', 'USD', '$', 'hello@demo.com', 'Makon lake view 3234');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(14) NOT NULL,
  `size_name` varchar(64) DEFAULT NULL,
  `size_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_link`
--

CREATE TABLE `social_link` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `google_plus` varchar(256) DEFAULT NULL,
  `skype` varchar(256) DEFAULT NULL,
  `flicker` varchar(256) DEFAULT NULL,
  `youtube` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcat_id` int(14) NOT NULL,
  `cat_id` int(14) DEFAULT NULL,
  `subcat_name` varchar(64) DEFAULT NULL,
  `subcat_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcat_id`, `cat_id`, `subcat_name`, `subcat_status`) VALUES
(2, 2, 'English  22101', 'ACTIVE'),
(3, 2, ' BASIC SCIENCE  22102', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id` int(14) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `to_dodata` varchar(256) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `value` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(14) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `ip_address` varchar(512) DEFAULT NULL,
  `forgotten_code` varchar(512) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `dob` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL DEFAULT 'MALE',
  `country` varchar(128) DEFAULT NULL,
  `created_on` varchar(128) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `user_type` enum('User','Admin','Mech','Computer','Civil','Electrical','Electronics','Workshop_Supertendent','Store_keeper','Librarian') NOT NULL DEFAULT 'User',
  `confirm_code` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `full_name`, `department`, `position`, `email`, `password`, `ip_address`, `forgotten_code`, `address`, `dob`, `image`, `contact`, `gender`, `country`, `created_on`, `status`, `user_type`, `confirm_code`) VALUES
(10, 'U36', 'Mr. S.P.Lambhade', 'College', 'Principal', 'splambhade@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '::1', 'bfc958008879d88d8075e76e188e44ee', 'C- 201, Ganesh Appts., Khamla Chowk,  Ring Road, Nagpur', '1968-04-20', 'U36.jpeg', '9423433588', 'MALE', 'India', '10/27/2017', 'ACTIVE', 'Admin', '1660'),
(22, 'U825', 'V. B. Khobragade', 'Computer', 'Hod', 'vform29@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'At Sendurwafa Tah. Sakoli Dist. Bhandara', '1982-09-29', 'U825.jpeg', '9766953403', 'MALE', 'India', '2023-04-18', 'ACTIVE', '', NULL),
(23, 'U623', 'Dr.V.G.Kondekar', 'Civil', 'Hod', 'vijaykondekar@rediffmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'A2/102, Pioneer Daffodils,  Jaitala, Nagpur', '1995-09-07', 'U623.png', '7387721252', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(24, 'U665', 'B.S. Vaikunte', 'Mech', 'Hod', 'bsvaikunte@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, ' Sakoli, Sendurwafa, Bhandara', '1963-08-04', 'U665.jpg', '9423113387', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(25, 'U808', ' A. A. Ali', 'Electronics', 'Hod', 'ayyubaali@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Flat no. 301, Meera height,  Gupta colony, Sakoli', '1966-07-01', 'U808.jpeg', '9422906257', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(26, 'U965', ' V.A.Wararkar', 'Electrical', 'Hod', 'vijuwararkar@rediffmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1982-01-01', 'U965.png', '7020082208', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(27, 'U570', 'Mr.P.P.Jamnik', 'Workshop', 'Workshop', 'prashant.j87@gov.in', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1987-09-07', 'U570.png', '9850541641', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(28, 'U611', 'Lekhram Kolte', 'Librarian', 'Librarian', 'lekhramkolte@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1988-07-03', 'U611.jpeg', '9604230942', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(29, 'U933', 'S. D. Gawali', 'Store', 'Store', 'gawali@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1991-10-08', 'U933.png', '9423553740', 'MALE', 'India', '2023-04-18', 'ACTIVE', 'User', NULL),
(41, 'U759', 'Dr. K.L.Bawankule', NULL, 'Computer_Teacher', 'kamalakant.bawankule@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1982-09-29', 'U759.jpeg', '9673754121', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(42, 'U937', 'Dr. U. B. Aher', NULL, 'Computer_Teacher', 'ujjwalaaher@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, ' E4/14 Vyankatesh nagar Beside KDK Engg College , Nandanvan Nagpur', '1978-01-29', 'U937.jpeg', '9423633413', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(43, 'U803', 'Mr. A.A Bajpayee', NULL, 'Computer_Teacher', 'abhijeet.bajpayee@gov.in', '7cfa476c7823bcf4bdef381361232525e4bf9ead', NULL, NULL, 'Shri Sharada Nagar, Ring Road  Gondia ', '1987-09-09', 'U803.jpeg', '7276405509', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(44, 'U927', 'Mrs.D.A.Khandare', NULL, 'Civil_Teacher', 'dishakhandare@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1982-05-16', 'U927.png', '9422819119', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(45, 'U977', 'Mrs. M. V. Bobade', NULL, 'Civil_Teacher', 'medhavibobade@yahoo.com', '6c3d93e0b04e834d435de10d95f7be98c882a8b2', NULL, NULL, 'Sakoli', '1989-07-09', 'U977.png', '9130346355', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(46, 'U630', 'Mr. L. P. Sakharwade', NULL, 'Civil_Teacher', 'sakharwade.lilesh@gmail.com', '61a5bbfb3f040560840cd97cbb8e413390e1e9c6', NULL, NULL, 'Sakoli', '1978-02-14', 'U630.png', '9923255355', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(47, 'U862', 'Mr. R.S. Khobragade', NULL, 'Mech_Teacher', 'rskhobragade@yahoo.com', '613c20894a50313769034900005681a5f672a865', NULL, NULL, 'Sakoli', '1966-05-21', 'U862.jpg', '9423620517', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(48, 'U563', 'Mr. S.A. Dhankute', NULL, 'Mech_Teacher', 'sharaddhankute@gmail.com', 'a30da06e5c1be615de1cc6d5d2bf75ed5bf416be', NULL, NULL, 'Sakoli', '1965-11-14', 'U563.jpeg', '9420118742', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(49, 'U797', 'Mr. A.B. Abhyankar', NULL, 'Mech_Teacher', 'ashishabhyankar@rediffmail.com', 'c05c1fd8abebe7cdf7740db4c781d21e91a85625', NULL, NULL, 'Plot No 31,  Panchdeep Hsg  Society,Jaiprakash  Nagar,Khamla,  Nagpur', '1978-08-07', 'U797.jpeg', '9175809832', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(50, 'U716', 'Dr. D. J. Ghode', NULL, 'Mech_Teacher', 'djghode@gmail.com', '44e46d4871f0fc99be8365e038c16328500c3a34', NULL, NULL, 'Sakoli', '1985-01-11', 'U716.jpeg', '8668532312', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(51, 'U619', 'Mr. S. M. Bante', NULL, 'Mech_Teacher', 'shrikant.bante769@gmail.com', '6d122ee39469e3741071ef201d2912e8199bfafb', NULL, NULL, 'Plot No-20,New friends Colony, shradhaapeth, khat road bhandara', '1986-03-17', 'U619.jpeg', '8007832786', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(52, 'U860', 'Mrs. K.P. Thaware', NULL, 'Mech_Teacher', 'karunathaware@gmail.com', 'bcac4a23a177be0b6811fb8eccb49e4d8fda3c15', NULL, NULL, 'Sakoli', '1985-07-03', 'U860.jpg', '8600013881', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(53, 'U875', 'Mr.C.Y.Shende', NULL, 'Mech_Teacher', 'bcs_99@rediffmail.com', '16126685f33fc4b8b351b735ee34595542c83048', NULL, NULL, '-NEAR NAVNEET APARTMENT,BAMNI BALLARSHAH,DIST-CHANDRAPUR', '1990-08-29', 'U875.jpg', '9284481744', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(54, 'U880', 'Mr. D. A. Brahmankar', NULL, 'Electronics_Teacher', 'dabrahmankar@rediffmail.com', 'd4cccbb76bad1a3797f14230c51445719dec4303', NULL, NULL, 'Sakoli', '1964-03-05', 'U880.jpeg', '9011018986', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(55, 'U672', 'Mr. R. V. Sakhare', NULL, 'Electronics_Teacher', 'Rajsakhare74@gmail.com', 'c4cf4087a75ad6b556abe82a0ef11be910584dc1', NULL, NULL, 'Sakoli', '1974-10-01', 'U672.jpeg', '9404214553', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(56, 'U792', 'Mrs. P. H. Mohokar', NULL, 'Electronics_Teacher', 'pratikshagopal_16@rediffmail.com', 'c739ecf95777f97af053613a9de1aa7b40bf8128', NULL, NULL, 'Sakoli', '1986-11-16', 'U792.jpeg', '8421679773', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(57, 'U803', 'Mrs. V.V. Tekam', NULL, 'Electronics_Teacher', 'nitnawarevaishali@gmail.com', '7080c4e074cc1e8880b13d6319a6711e5aef8ed8', NULL, NULL, 'Sakoli', '1975-11-24', 'U8031.jpeg', '9421715170', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(58, 'U873', 'Mrs. R.R. Vairagade', NULL, 'Electronics_Teacher', 'rekhadange73@gmail.com', '734edb59c6425b2ac30f42329b992f1fe8352772', NULL, NULL, 'Sakoli', '1986-03-17', 'U873.jpeg', '7020645449', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(59, 'U529', 'Mrs. P.P. Kotangale', NULL, 'Electronics_Teacher', 'pdorliker1@gmail.com', '076b0d17de64f9d00d463c979d2c60811182b449', NULL, NULL, 'Sakoli', '1982-09-29', 'U529.jpeg', '9403329239', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(60, 'U893', 'Mr. R.B. Sathe', NULL, 'Electronics_Teacher', 'ravindrab.sathe@gov.in', 'f492264babf2cbc190cc42e6c24d90deee78abf6', NULL, NULL, 'Sakoli', '1984-09-27', 'U893.jpeg', '9975626527', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(61, 'U585', 'Mrs. K. M. Gaidhane', NULL, 'Electrical_Teacher', 'kumudgaidhane@gmail.com', 'c149309794c56d136ee545ad8e5d1531757fa6a2', NULL, NULL, 'Sakoli', '1963-12-10', 'U585.png', '9970076839', 'FEMALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(62, 'U749', 'Mr. K. N. Potode', NULL, 'Electrical_Teacher', 'knpotode10@gmail.com', '804990ea5fc889f54ab3e2dce6769dc51cb5b635', NULL, NULL, 'Sakoli', '1966-05-24', 'U749.png', '9404932755', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(63, 'U603', 'Mr. N. H. Adkine', NULL, 'Electrical_Teacher', 'nhadkine@rediffmail.com', '9a6025b4265b4cf2f17ad52adb347222e0834b3f', NULL, NULL, 'Sakoli', '1981-07-01', 'U603.png', '9175123564', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(64, 'U811', 'Mr. S. H. Sute', NULL, 'Electrical_Teacher', 'swapnilsute.123@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', NULL, NULL, 'Sakoli', '1987-11-23', 'U811.png', '8830152129', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(65, 'U909', 'Mr. P. V. Kamble', NULL, 'Electrical_Teacher', 'kpratik33@gmail.com', '3b2a49a236dca908d6adeea1a61920fb9eec26f1', NULL, NULL, 'Sakoli', '1990-01-21', 'U909.png', '7972205196', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(66, 'U1000', 'Mr. R. S. Dhabarde', NULL, 'Electrical_Teacher', 'rohit.dhabarde@gmail.com', '88acdcc2cc44d3e706df60214e1d5fbfb866323a', NULL, NULL, 'Sakoli', '1988-11-09', 'U1000.png', '8407928010', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(67, 'U886', 'Mr. S. R. Ahirkar', NULL, 'Electrical_Teacher', 'shubhamahirkar11@gmail.com', '081ac8fcc9a404215066debb90c736c3f2771b87', NULL, NULL, 'Sakoli', '1995-11-21', 'U886.png', '8087464656', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL),
(70, 'U871', 'Virendra', NULL, 'Electrical_Teacher', 'virendrameshram60000@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 'Tumsar', '2023-04-19', 'U871.png', '9766947586', 'MALE', 'India', '2023-04-19', 'ACTIVE', 'User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `group_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `social_link`
--
ALTER TABLE `social_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_link`
--
ALTER TABLE `social_link`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcat_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 01:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarabun`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_department`) VALUES
(1, 'งานทะเบียน'),
(2, 'สำนักคอม');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_book_number` varchar(30) NOT NULL,
  `doc_date` varchar(15) NOT NULL,
  `doc_time` varchar(10) NOT NULL,
  `doc_from` varchar(30) NOT NULL,
  `doc_topic` varchar(150) NOT NULL,
  `doc_refer_to` varchar(30) NOT NULL,
  `doc_attach` varchar(20) NOT NULL,
  `doc_handle` varchar(30) NOT NULL,
  `doc_action` varchar(30) NOT NULL,
  `doc_urgency` varchar(50) NOT NULL,
  `doc_status` varchar(20) NOT NULL,
  `doc_traffic_id` int(11) NOT NULL,
  `doc_des` varchar(255) NOT NULL,
  `doc_to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `doc_type_id`, `user_id`, `doc_book_number`, `doc_date`, `doc_time`, `doc_from`, `doc_topic`, `doc_refer_to`, `doc_attach`, `doc_handle`, `doc_action`, `doc_urgency`, `doc_status`, `doc_traffic_id`, `doc_des`, `doc_to`) VALUES
(15, 1, 6, 'กยศ 1', '2022-05-03', '15:50', 'aa', 'aaa', 'aaa', 'aa', 'saas', 'aaa', 'urgen_normal', '1', 0, '', 'test002'),
(20, 1, 1, 'a', '2022-05-29', '04:16', 'a', 'a', 'a', 'a', 'a', 'a', 'urgen_normal', '2', 1, 'sss', 'test002');

-- --------------------------------------------------------

--
-- Table structure for table `doc_status`
--

CREATE TABLE `doc_status` (
  `doc_status_id` int(10) NOT NULL,
  `doc_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_status`
--

INSERT INTO `doc_status` (`doc_status_id`, `doc_status`) VALUES
(1, 'ยังไม่ได้อ่าน'),
(2, 'อ่านแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `doc_traffic`
--

CREATE TABLE `doc_traffic` (
  `doc_traffic_id` int(11) NOT NULL,
  `doc_traffic_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `doc_type_id` int(11) NOT NULL,
  `doc_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`doc_type_id`, `doc_type`) VALUES
(1, 'หมวดอนุมัติจัดซื้อ'),
(2, 'หมวดงบประมาณการเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `doc_user_file`
--

CREATE TABLE `doc_user_file` (
  `doc_user_file_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `doc_user_file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_user_file`
--

INSERT INTO `doc_user_file` (`doc_user_file_id`, `doc_id`, `doc_user_file_name`) VALUES
(1, 1, 'ตัวอย่าง.pdf'),
(2, 1, 'ตัวอย่าง.pdf'),
(3, 1, 'ตัวอย่าง.pdf'),
(4, 1, 'Final_CAD.pdf'),
(5, 4, 'ตัวอย่าง.pdf'),
(6, 4, 'Final_CAD.pdf'),
(7, 5, 'Final_CAD.pdf'),
(8, 5, 'TCT-อนุวัชร.pdf'),
(9, 8, 'TCT-อนุวัชร.pdf'),
(10, 16, 'icons8-add-user-male-100.png'),
(11, 16, 'icons8-send-email-100.png'),
(12, 16, 'icons8-admin-settings-male-50.png'),
(13, 16, 'icons8-delete-96.png'),
(14, 16, 'icons8-logout-96.png'),
(15, 16, 'icons8-search-50.png'),
(16, 16, 'icons8-download-100.png'),
(17, 16, 'icons8-email-send-48.png'),
(18, 17, 'icons8-add-user-male-100.png'),
(19, 17, 'icons8-send-email-100.png'),
(20, 17, 'icons8-admin-settings-male-50.png'),
(21, 18, 'icons8-add-user-male-100.png'),
(22, 18, 'icons8-send-email-100.png'),
(23, 18, 'icons8-admin-settings-male-50.png'),
(24, 19, 'icons8-add-user-male-100.png'),
(25, 19, 'icons8-send-email-100.png'),
(26, 19, 'icons8-admin-settings-male-50.png'),
(27, 20, 'icons8-edit-50.png'),
(28, 20, 'icons8-folder-50.png');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `post_id` int(11) NOT NULL,
  `post_rank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`post_id`, `post_rank`) VALUES
(1, 'เจ้าหน้าที่ คอบ.'),
(2, 'อาจารย์');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_lineid` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `post_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_lineid`, `user_email`, `user_tel`, `post_id`, `dept_id`, `level_id`) VALUES
(1, 'admin', '1234', 'Anuwat ตันสงวน', '#', 's6302041510171@email.kmutnb.ac.th', '0822189618', 1, 1, 1),
(2, 'test002', 'test002', 'veeeeee', '#', '#@e', '#', 1, 1, 2),
(5, 'test003', 'test003', 'test003', '#', '03@t', '1231231231', 1, 2, 2),
(6, 'test004', 'test004', 'test005', 'anuwat', '004@t', '0812391823', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_id` int(11) NOT NULL,
  `level_rank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_id`, `level_rank`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `doc_status`
--
ALTER TABLE `doc_status`
  ADD PRIMARY KEY (`doc_status_id`);

--
-- Indexes for table `doc_traffic`
--
ALTER TABLE `doc_traffic`
  ADD PRIMARY KEY (`doc_traffic_id`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`doc_type_id`);

--
-- Indexes for table `doc_user_file`
--
ALTER TABLE `doc_user_file`
  ADD PRIMARY KEY (`doc_user_file_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doc_status`
--
ALTER TABLE `doc_status`
  MODIFY `doc_status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doc_traffic`
--
ALTER TABLE `doc_traffic`
  MODIFY `doc_traffic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `doc_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doc_user_file`
--
ALTER TABLE `doc_user_file`
  MODIFY `doc_user_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

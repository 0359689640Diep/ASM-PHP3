-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2024 at 03:04 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'tên danh mục',
  `description` text COMMENT 'mô tả danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='lưu trữ danh mục của các khóa học';

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `course_id` int DEFAULT NULL COMMENT 'lưu trữ các khóa học ở trong 1 lớp',
  `name` varchar(100) NOT NULL COMMENT 'Tên lớp',
  `start_date` date DEFAULT NULL COMMENT 'thời gian bắt đầu',
  `end_date` date DEFAULT NULL COMMENT 'thời gian kết thúc',
  `schedule` varchar(100) DEFAULT NULL COMMENT 'lộ trình',
  `location` varchar(100) DEFAULT NULL COMMENT 'vị trí'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Lưu trữ các lớp học';

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL COMMENT 'thuộc danh mục',
  `users_id` int DEFAULT NULL COMMENT 'thông tin giảng viên',
  `status_id` int NOT NULL COMMENT 'Trạng thái của khóa học',
  `title` varchar(100) NOT NULL COMMENT 'tiêu đề khóa học',
  `description` text COMMENT 'Mô tả ',
  `price` decimal(10,2) NOT NULL COMMENT 'giá',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='lưu trữ khóa học';

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL COMMENT 'người đăng ký',
  `class_id` int DEFAULT NULL COMMENT 'lớp đăng ký',
  `status_id` int NOT NULL COMMENT 'Trạng thái',
  `enrollment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Lưu trữ thông tin khóa học của học viên';

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int NOT NULL COMMENT 'Khóa chính của bảng Permission',
  `role` varchar(100) NOT NULL COMMENT 'Quyền của người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Bảng lưu trữ quyền người dùng';

-- --------------------------------------------------------

--
-- Table structure for table `playments`
--

CREATE TABLE `playments` (
  `id` int NOT NULL COMMENT 'Khóa chính của bảng Playments',
  `enrollment_id` int NOT NULL COMMENT 'Lưu trữ khóa học cần thanh toán',
  `status_id` int NOT NULL COMMENT 'Trạng thái của thanh toán',
  `amount` decimal(10,2) NOT NULL COMMENT 'Tiền cần thanh toán',
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Bảng lưu trữ thông tin thanh toán';

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int NOT NULL,
  `status_id` int NOT NULL COMMENT 'Trạng thái của khuyến mại',
  `code` varchar(50) NOT NULL COMMENT 'Mã khuyến mại',
  `discount` decimal(5,2) DEFAULT NULL COMMENT 'giảm giá bao nhiêu',
  `start_date` date DEFAULT NULL COMMENT 'Thời gian bắn đầu',
  `end_date` date DEFAULT NULL COMMENT 'Thời gian kết thúc',
  `description` text COMMENT 'mô tả'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL COMMENT 'Người bình luận',
  `course_id` int DEFAULT NULL COMMENT 'Bình luận cho khóa học',
  `status_id` int NOT NULL COMMENT 'Trạng thái của bình luận',
  `rating` int DEFAULT NULL COMMENT 'Đánh giá',
  `comment` text COMMENT 'Nội dung',
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'thời gian bình luận'
) ;

-- --------------------------------------------------------

--
-- Table structure for table `stauts`
--

CREATE TABLE `stauts` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'tên trạng thái',
  `color` varchar(100) NOT NULL COMMENT 'màu của trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Lưu trữ trạng thái của toàn bộ hệ thống';

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int NOT NULL COMMENT 'Khóa chính của bảng token',
  `users_id` int NOT NULL COMMENT 'Token cho từng tài khoản',
  `token` varchar(100) NOT NULL COMMENT 'Tên đầy đủ của người dùng',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian tạo token',
  `expries_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian hết hạn token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Bảng lưu trữ token người dùng';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT 'Khóa chính của bảng Users',
  `status_id` int NOT NULL COMMENT 'Trạng thái của người dùng',
  `permission_id` int NOT NULL COMMENT 'Quyền cho từng tài khoản',
  `name` varchar(100) NOT NULL COMMENT 'Tên đầy đủ của người dùng',
  `email` varchar(100) NOT NULL COMMENT 'Email của người dùng',
  `password` varchar(100) NOT NULL COMMENT 'Mật khẩu của người dùng',
  `expertise` varchar(100) DEFAULT NULL COMMENT 'Chuyên môn của giảng viên, chỉ dành cho tài khoản đăng ký giảng viên',
  `description` text COMMENT 'Mô tả thêm về người dùng',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian tạo tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Bảng lưu trữ thông tin người dùng, bao gồm học viên, giảng viên và các loại người dùng khác';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playments`
--
ALTER TABLE `playments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stauts`
--
ALTER TABLE `stauts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) COMMENT 'Email phải là duy nhất trong bảng';

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính của bảng Permission';

--
-- AUTO_INCREMENT for table `playments`
--
ALTER TABLE `playments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính của bảng Playments';

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stauts`
--
ALTER TABLE `stauts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính của bảng token';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Khóa chính của bảng Users';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

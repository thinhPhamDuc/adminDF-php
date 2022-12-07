-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defaultlearning_admindf_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `stock`, `images`, `created_at`) VALUES
(2, 'áo xinh', 100, '../../../../public/backend/assets/images/product/6243d0808c576.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `link_product_tag`
--

CREATE TABLE `link_product_tag` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link_product_tag`
--

INSERT INTO `link_product_tag` (`id`, `product_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 5, 1),
(9, 5, 2),
(10, 6, 2),
(11, 7, 1),
(12, 7, 2),
(13, 8, 1),
(14, 8, 2),
(15, 12, 4),
(16, 12, 1),
(18, 13, 1),
(19, 14, 1),
(20, 14, 2),
(21, 15, 1),
(22, 15, 2),
(23, 16, 1),
(24, 17, 1),
(25, 17, 2),
(26, 18, 1),
(27, 19, 1),
(28, 19, 2),
(29, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `link_role_permission`
--

CREATE TABLE `link_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link_role_permission`
--

INSERT INTO `link_role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(19, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 3, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'product_view', 'Xem sản phẩm\r\n', '2022-03-13 08:30:08', '2022-03-13 14:36:03'),
(2, 'product_add', 'Thêm sản phẩm', '2022-03-13 08:30:08', '2022-03-13 14:36:08'),
(3, 'product_edit', 'Sửa sản phẩm', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(4, 'product_delete', 'Xóa sản phẩm', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(5, 'post_view', 'Xem bài viết\r\n', '2022-03-13 08:30:08', '2022-03-13 14:36:15'),
(6, 'post_add', 'Thêm bài viết', '2022-03-13 08:30:08', '2022-03-13 14:36:19'),
(7, 'post_edit', 'Sửa bài viết', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(8, 'post_delete', 'Xóa bài viết', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(9, 'role_view', 'Xem phân quyền\r\n', '2022-03-13 08:30:08', '2022-03-13 14:33:59'),
(10, 'role_add', 'Thêm phân quyền', '2022-03-13 08:30:08', '2022-03-13 14:33:59'),
(11, 'role_edit', 'Sửa phân quyền', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(12, 'role_delete', 'Xóa phân quyền', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(13, 'user_view', 'Xem người dùng\r\n', '2022-03-13 08:30:08', '2022-03-13 14:35:44'),
(14, 'user_add', 'Thêm người dùng', '2022-03-13 08:30:08', '2022-03-13 14:35:53'),
(15, 'user_edit', 'Sửa người dùng', '2022-03-13 08:31:10', '2022-03-13 08:31:10'),
(16, 'user_delete', 'Xóa người dùng', '2022-03-13 08:31:10', '2022-03-13 08:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `images`, `name`, `description`, `category_id`, `price`, `status`, `created_at`, `seller_id`) VALUES
(13, '../../../../public/backend/assets/images/product/6243d0808c576.jpg', 'áo xinh', 'áo xịn', 3, 2147483647, 1, '2022-01-13 09:18:21', 5),
(14, '../../../../public/backend/assets/images/product/6243d08a58012.jpg', 'Sản phẩm tuyệt vời', 'áo xịn', 3, 22222, 1, '2022-01-14 09:03:32', 5),
(15, '../../../../public/backend/assets/images/product/6243d093e3319.jpg', 'áo xinh', 'áo xịn', 3, 22222, 1, '2022-01-14 09:06:22', 6),
(16, '../../../../public/backend/assets/images/product/6243d09d3fb73.jpg', 'áo xinh', 'áo xịn', 5, 2147483647, 1, '2022-01-15 10:18:47', 5),
(18, '../../../../public/backend/assets/images/product/61e23d7016bcb.jpg', 'áo xinh', 'áo xịn', 10, 11111111, 1, '2022-01-15 10:20:16', 5),
(19, '../../../../public/backend/assets/images/product/62482152c6454.jpg', 'sự thật về màu đen', 'màu đen là màu đen', 11, 10000, 1, '2022-04-02 17:11:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Áo nam', 0),
(2, 'Áo nữ', 0),
(3, 'Áo nam dài tay', 1),
(4, 'Áo nữ dài tay', 2),
(5, 'Áo nam dài tay mát', 3),
(6, 'Áo nam dài tay ấm\r\n', 3),
(7, 'Áo nũ dài tay mát', 4),
(8, 'Áo nữ dài tay ấm\r\n', 4),
(9, 'Áo Nam Rộng', 6),
(10, 'Áo da dài', 1),
(11, 'áo siêu bền', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`id`, `name`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(5, 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'người-viết-bai-1', 'người viết bài 1', '2022-03-13 08:20:14', '2022-03-13 08:20:14'),
(2, 'admin', 'admin', '2022-03-13 08:20:14', '2022-03-13 08:20:14'),
(3, 'ng??ời-kiểm-thử', 'người kiểm thử', '2022-03-15 08:19:28', '2022-03-15 08:19:28'),
(9, 'nhan-vien-hanh-chinh', 'nhân viên hành chính', '2022-03-24 10:04:09', '2022-03-24 10:04:09'),
(10, 'người-sửa', 'người sửa', '2022-03-28 10:58:31', '2022-03-28 10:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `images`, `lastname`, `firstname`, `email`, `password`, `created_at`, `active`, `is_active`, `status`, `role_id`, `phone`, `address`) VALUES
(5, '../../../../public/backend/assets/images/user/61e243d58cfe7.jpg', 'Thinh', 'pham', 'phamducthinhbeo@gmail.com', '164d5fdfd02634293161afac4cf47299', '2021-12-30 14:05:46', 1, 1, 0, 1, 329060633, 'Hà Nội'),
(6, '../../../../public/backend/assets/images/user/61e2e14c8f4d2.jpg', 'Duc Thinh', 'Pham', 'phamducthinh.dev@gmail.com', '164d5fdfd02634293161afac4cf47299', '2021-12-30 14:05:46', 1, 1, 0, 3, 329060633, 'Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_product_tag`
--
ALTER TABLE `link_product_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_role_permission`
--
ALTER TABLE `link_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `link_product_tag`
--
ALTER TABLE `link_product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `link_role_permission`
--
ALTER TABLE `link_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

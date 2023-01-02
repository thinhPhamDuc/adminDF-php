-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 02:41 PM
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
-- Database: `defaultlearning_admindf_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`) VALUES
(1, 'Armani', '1900-01-27 22:52:40'),
(2, 'Louis Vuition', '1900-01-27 22:52:48'),
(3, 'Gucci', '1900-01-27 22:52:56'),
(4, 'GenViet', '1900-01-27 22:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(155) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `phone` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `password`, `created_at`, `phone`, `address`) VALUES
(1, 'thinh', '1c783a3cbe9820783fa54f98ca5bbce3', '2022-11-22 08:59:34', 329060633, 'Hà Nội'),
(2, 'thinh', '1c783a3cbe9820783fa54f98ca5bbce3', '2022-12-04 15:19:38', 2147483647, 'Hà Nội'),
(3, 'thinh', '1c783a3cbe9820783fa54f98ca5bbce3', '2022-12-04 15:27:37', 2147483647, 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `stock`, `images`, `created_at`, `product_id`, `price`) VALUES
(24, 'Áo len nam', 15, '../../../../public/backend/assets/images/product/63822c3461c3d.jpg', '2022-12-04 21:35:27', 40, 100),
(25, 'Áo Len Dài Tay Nữ', 0, '../../../../public/backend/assets/images/product/63822c897d96a.jpg', '2022-12-06 20:59:46', 41, 100),
(26, 'Váy Len Mỏng Dài Tay', 30, '../../../../public/backend/assets/images/product/63822cf5dcfe5.jpg', '2022-12-04 00:03:52', 42, 100),
(27, 'Áo Khoác nam mặc nhà', 30, '../../../../public/backend/assets/images/product/63822d1e26415.jpg', '2022-12-04 00:03:52', 43, 100),
(28, 'Áo nỉ nữ in hình', 30, '../../../../public/backend/assets/images/product/63822d3ca8a8c.jpg', '2022-12-04 00:03:52', 44, 100),
(29, 'Quần nỉ nam thể thao', 30, '../../../../public/backend/assets/images/product/63822d5bad48a.jpg', '2022-12-04 00:03:52', 45, 100),
(30, 'Áo sơ mi trắng nữ', 30, '../../../../public/backend/assets/images/product/63822d735cf40.jpg', '2022-12-04 00:03:52', 46, 100),
(31, 'Áo nỉ nữ in hình màu sắc', 30, '../../../../public/backend/assets/images/product/63822d8ac2e93.jpg', '2022-12-04 00:03:52', 47, 100),
(32, 'Váy thời trang ngắn', 30, '../../../../public/backend/assets/images/product/63822da973b2e.jpg', '2022-12-10 11:17:49', 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_new_tag`
--

CREATE TABLE `link_new_tag` (
  `id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(111, 48, 2),
(112, 47, 2),
(113, 46, 2),
(114, 46, 5),
(115, 45, 1),
(116, 45, 5),
(117, 44, 2),
(118, 44, 5),
(119, 43, 1),
(120, 43, 5),
(121, 42, 2),
(122, 41, 2),
(123, 40, 1),
(124, 40, 5);

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
-- Table structure for table `new`
--

CREATE TABLE `new` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `main_images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_tag`
--

CREATE TABLE `new_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `external_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `description` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `external_id`, `created_at`, `deleted_at`, `total`, `description`) VALUES
(214, '#8892', '2022-12-04 00:14:14', '0000-00-00 00:00:00', 300, NULL),
(215, '#4549', '2022-12-04 00:23:24', '0000-00-00 00:00:00', 200, NULL),
(216, '#3395', '2022-12-04 00:28:23', '0000-00-00 00:00:00', 200, NULL),
(217, '#2825', '2022-12-04 11:13:28', '0000-00-00 00:00:00', 200, NULL),
(218, '#3968', '2022-12-04 21:35:27', '0000-00-00 00:00:00', 200, NULL),
(219, '#4925', '2022-12-06 20:54:20', '0000-00-00 00:00:00', 500, NULL),
(220, '#2953', '2022-12-06 20:55:32', '0000-00-00 00:00:00', 500, NULL),
(221, '#8794', '2022-12-06 20:55:49', '0000-00-00 00:00:00', 500, NULL),
(222, '#1307', '2022-12-06 20:56:50', '0000-00-00 00:00:00', 300, NULL),
(223, '#3208', '2022-12-06 20:57:32', '0000-00-00 00:00:00', 300, NULL),
(224, '#7639', '2022-12-06 20:58:17', '0000-00-00 00:00:00', 300, NULL),
(225, '#7432', '2022-12-06 20:58:37', '0000-00-00 00:00:00', 300, NULL),
(226, '#8832', '2022-12-06 20:59:20', '0000-00-00 00:00:00', 300, NULL),
(227, '#7533', '2022-12-06 20:59:35', '0000-00-00 00:00:00', 300, NULL),
(228, '#6641', '2022-12-06 20:59:46', '0000-00-00 00:00:00', 300, NULL),
(229, '#1451', '2022-12-06 21:35:16', '0000-00-00 00:00:00', 900, NULL),
(230, '#9586', '2022-12-06 22:08:54', '0000-00-00 00:00:00', 300, NULL),
(231, '#6801', '2022-12-13 09:38:39', '0000-00-00 00:00:00', 200, NULL),
(232, '#3757', '2022-12-13 09:52:09', '0000-00-00 00:00:00', 200, NULL),
(233, '#9150', '2022-12-13 10:01:03', '0000-00-00 00:00:00', 300, NULL),
(234, '#8886', '2022-12-13 14:29:31', '0000-00-00 00:00:00', 400, NULL),
(235, '#2753', '2022-12-13 14:39:50', '0000-00-00 00:00:00', 400, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_info_location`
--

CREATE TABLE `orders_info_location` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `stock` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `address_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `stock`, `item_price`, `total`, `client_id`) VALUES
(217, 214, 41, 2, 100, 200, 1),
(218, 214, 40, 1, 100, 100, 1),
(219, 215, 40, 2, 100, 200, 1),
(220, 216, 40, 2, 100, 200, 1),
(221, 217, 40, 2, 100, 200, 1),
(222, 218, 40, 2, 100, 200, 1),
(223, 219, 40, 2, 100, 200, 0),
(224, 219, 41, 3, 100, 300, 0),
(225, 220, 40, 2, 100, 200, 1),
(226, 220, 41, 3, 100, 300, 1),
(227, 221, 40, 2, 100, 200, 1),
(228, 221, 41, 3, 100, 300, 1),
(229, 222, 41, 3, 100, 300, 1),
(230, 223, 41, 3, 100, 300, 1),
(231, 224, 41, 3, 100, 300, 1),
(232, 225, 41, 3, 100, 300, 1),
(233, 226, 41, 3, 100, 300, 1),
(234, 227, 41, 3, 100, 300, 1),
(235, 228, 41, 3, 100, 300, 1),
(236, 229, 40, 2, 100, 200, 1),
(237, 229, 42, 7, 100, 700, 1),
(238, 230, 43, 3, 100, 300, 1),
(239, 231, 40, 2, 100, 200, 1),
(240, 232, 42, 2, 100, 200, 1),
(241, 233, 42, 3, 100, 300, 1),
(242, 234, 43, 2, 100, 200, 1),
(243, 234, 44, 2, 100, 200, 1),
(244, 235, 40, 2, 100, 200, 1),
(245, 235, 42, 2, 100, 200, 1);

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
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `images`, `name`, `description`, `category_id`, `price`, `status`, `created_at`, `seller_id`, `brand_id`, `slug`) VALUES
(40, '../../../../public/backend/assets/images/product/63822c3461c3d.jpg', 'Áo len nam', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 20, 100, 1, '2022-11-26 22:09:40', 5, 2, 'ao-len-nam'),
(41, '../../../../public/backend/assets/images/product/63822c897d96a.jpg', 'Áo Len Dài Tay Nữ', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 15, 100, 1, '2022-11-26 22:11:05', 5, 2, 'ao-len-dai-tay-nu'),
(42, '../../../../public/backend/assets/images/product/63822cf5dcfe5.jpg', 'Váy Len Mỏng Dài Tay', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 15, 100, 1, '2022-11-26 22:12:53', 5, 2, 'vay-len-mong-dai-tay'),
(43, '../../../../public/backend/assets/images/product/63822d1e26415.jpg', 'Áo Khoác nam mặc nhà', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 15, 100, 1, '2022-11-26 22:13:34', 5, 2, 'ao-khoac-nam-mac-nha'),
(44, '../../../../public/backend/assets/images/product/63822d3ca8a8c.jpg', 'Áo nỉ nữ in hình', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 20, 100, 1, '2022-11-26 22:14:04', 5, 2, 'ao-ni-nu-in-hinh'),
(45, '../../../../public/backend/assets/images/product/63822d5bad48a.jpg', 'Quần nỉ nam thể thao', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 20, 100, 1, '2022-11-26 22:14:35', 5, 2, 'quan-ni-nam-the-thao'),
(46, '../../../../public/backend/assets/images/product/63822d735cf40.jpg', 'Áo sơ mi trắng nữ', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 20, 100, 1, '2022-11-26 22:14:59', 5, 2, 'ao-so-mi-trang-nu'),
(47, '../../../../public/backend/assets/images/product/63822d8ac2e93.jpg', 'Áo nỉ nữ in hình màu sắc', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                            ', 20, 100, 1, '2022-11-26 22:15:22', 5, 2, 'ao-ni-nu-in-hinh-mau-sac'),
(48, '../../../../public/backend/assets/images/product/63822da973b2e.jpg', 'Váy thời trang ngắn', 'Áo bị lỗi nhẹ như trên hình do bị móc sút chỉ nên tl lại giá rẻ ạ . Len chỉ Nhậttttttttttttttttttttttt                                                                        0 results                                ', 21, 1, 1, '2022-11-26 22:15:53', 5, 2, 'vay-thoi-trang-ngan');

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
(13, 'Nam', 0),
(15, 'Áo khoác', 13),
(20, 'Áo Khoác 1 lớp', 13),
(21, 'Áo khoác 2 lớp', 13),
(23, 'Nữ', 0),
(24, 'nữ 1', 23);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`) VALUES
(78, '48', '../../../../public/backend/assets/images/product/63974b5e6737f.jpg'),
(79, '48', '../../../../public/backend/assets/images/product/63974b5e67de1.jpg'),
(80, '47', '../../../../public/backend/assets/images/product/63974b6d41942.jpg'),
(81, '47', '../../../../public/backend/assets/images/product/63974b6d41e0d.jpg'),
(82, '46', '../../../../public/backend/assets/images/product/63974b75192d0.jpg'),
(83, '46', '../../../../public/backend/assets/images/product/63974b75197f8.jpg'),
(84, '45', '../../../../public/backend/assets/images/product/63974b81cb361.jpg'),
(85, '45', '../../../../public/backend/assets/images/product/63974b81cb8d6.jpg'),
(86, '44', '../../../../public/backend/assets/images/product/63974b9019dcb.jpg'),
(87, '44', '../../../../public/backend/assets/images/product/63974b901a244.jpg'),
(88, '43', '../../../../public/backend/assets/images/product/63974b996df30.jpg'),
(89, '43', '../../../../public/backend/assets/images/product/63974b996e31b.jpg'),
(90, '42', '../../../../public/backend/assets/images/product/63974ba287ac6.jpg'),
(91, '42', '../../../../public/backend/assets/images/product/63974ba287fc4.jpg'),
(92, '41', '../../../../public/backend/assets/images/product/63974baadd367.jpg'),
(93, '41', '../../../../public/backend/assets/images/product/63974baaddadc.jpg'),
(94, '40', '../../../../public/backend/assets/images/product/63974bb1d48f3.jpg'),
(95, '40', '../../../../public/backend/assets/images/product/63974bb1d4cf7.jpg');

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
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`) VALUES
(1, 'S', '2022-11-28 15:32:05'),
(2, 'M', '2022-11-28 15:32:05'),
(3, 'L', '2022-11-28 15:32:13'),
(4, 'XL', '2022-11-28 15:32:13'),
(5, 'XL', '2022-11-28 15:32:22'),
(6, 'XXL', '2022-11-28 15:32:22');

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
(5, '../../../../public/backend/assets/images/user/637c7b90921a7.jpg', 'Thinh', 'pham', 'phamducthinhbeo@gmail.com', '1c783a3cbe9820783fa54f98ca5bbce3', '2021-12-30 14:05:46', 1, 1, 0, 1, 329060633, 'Hà Nội'),
(6, '../../../../public/backend/assets/images/user/635361d635932.jpg', 'Duc Thinh', 'Pham', 'phamducthinh.dev@gmail.com', '164d5fdfd02634293161afac4cf47299', '2021-12-30 14:05:46', 1, 1, 0, 3, 329060633, 'Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_new_tag`
--
ALTER TABLE `link_new_tag`
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
-- Indexes for table `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_tag`
--
ALTER TABLE `new_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_info_location`
--
ALTER TABLE `orders_info_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `link_new_tag`
--
ALTER TABLE `link_new_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_product_tag`
--
ALTER TABLE `link_product_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `link_role_permission`
--
ALTER TABLE `link_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `new`
--
ALTER TABLE `new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_tag`
--
ALTER TABLE `new_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `orders_info_location`
--
ALTER TABLE `orders_info_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

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
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

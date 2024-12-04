-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 03:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_images` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_images`, `created_at`, `updated_at`) VALUES
(5, 'banners\\September2024\\9DpZCd82YugwEw7wyiVD.jpg', '2024-09-02 00:59:36', '2024-09-02 00:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `Brand_logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `Brand_logo`, `created_at`, `updated_at`) VALUES
(1, '[\"brands\\\\July2024\\\\2z1sUGLIvbIQ0Y0ARnlk.png\",\"brands\\\\July2024\\\\qidoHrzAv2QDjre7p4YL.png\",\"brands\\\\July2024\\\\wXNr8PWeDLnaYrDMFHGC.png\",\"brands\\\\July2024\\\\G10Z5XJv37HaM51ks5x5.png\"]', '2024-07-03 01:18:07', '2024-07-03 01:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_column` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `category_column`, `slug`) VALUES
(10, 'Coats', '2024-06-22 00:21:59', '2024-06-22 00:21:59', 0, 'coats'),
(13, 'Gillets', '2024-06-26 00:29:26', '2024-06-26 00:29:26', 0, 'gillets'),
(14, 'Hoodie', '2024-06-26 00:29:40', '2024-06-26 00:29:40', 0, 'hoodie'),
(15, 'Jackets', '2024-06-26 00:29:46', '2024-06-26 00:29:46', 0, 'jackets'),
(16, 'Blouses', '2024-06-26 00:30:00', '2024-06-26 00:30:00', 0, 'blouses'),
(17, 'Cardigans', '2024-06-26 00:30:08', '2024-06-26 00:30:08', 0, 'cardigans'),
(18, 'Dresses', '2024-06-26 00:30:19', '2024-06-26 00:30:19', 0, 'dresses'),
(19, 'Bottoms', '2024-06-26 00:30:25', '2024-06-26 00:30:25', 0, 'bottoms'),
(20, 'CO-ORDS', '2024-06-26 00:30:00', '2024-06-26 00:31:03', 1, 'co-ords'),
(21, 'Locenge Wear', '2024-06-26 00:31:26', '2024-06-26 00:31:26', 1, 'locenge-wear'),
(22, 'Skirts', '2024-06-26 00:31:47', '2024-06-26 00:31:47', 1, 'skirts'),
(23, 'Leggings', '2024-06-26 00:31:54', '2024-06-26 00:31:54', 1, 'leggings'),
(24, 'Basics', '2024-06-26 00:32:15', '2024-06-26 00:32:15', 1, 'basics'),
(25, 'Blazers', '2024-06-26 00:32:27', '2024-06-26 00:32:27', 1, 'blazers'),
(26, 'Jumpsuits', '2024-06-26 00:32:34', '2024-06-26 00:32:34', 1, 'jumpsuits'),
(27, 'Tops', '2024-06-26 00:32:40', '2024-06-26 00:32:40', 1, 'tops');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'banner_images', 'image', 'Banner Image', 1, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(25, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(26, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(27, 6, 'category_name', 'text', 'Category Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(28, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(29, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(30, 6, 'category_column', 'radio_btn', 'Category Column', 1, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"First column\",\"1\":\"Second column\"}}', 3),
(31, 6, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"category_name\",\"forceUpdate\":true}}', 4),
(32, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(33, 7, 'product_name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(34, 7, 'product_description', 'text_area', 'Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(35, 7, 'product_price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 4),
(36, 7, 'product_stock', 'checkbox', 'Available in stock?', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"true\"}', 6),
(37, 7, 'category_name', 'select_dropdown', 'Category', 1, 1, 1, 1, 1, 1, '{}', 7),
(39, 7, 'product_images', 'multiple_images', 'Images', 1, 1, 1, 1, 1, 1, '{}', 8),
(40, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 21),
(41, 7, 'updated_at', 'timestamp', 'Updated At', 0, 1, 1, 0, 0, 0, '{}', 22),
(42, 7, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"product_name\",\"forceUpdate\":true}}', 20),
(43, 7, 'product_size', 'tags', 'Sizes', 1, 1, 1, 1, 1, 1, '{}', 15),
(44, 7, 'product_color', 'tags', 'Colors', 1, 1, 1, 1, 1, 1, '{}', 16),
(45, 7, 'featured', 'checkbox', 'Is Featured/Trending?', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"false\"}', 18),
(46, 7, 'special', 'checkbox', 'Is Special?', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"false\"}', 19),
(47, 7, 'product_cut_price', 'number', 'Cut Price', 0, 1, 1, 1, 1, 1, '{}', 5),
(48, 7, 'product_star_rating', 'select_dropdown', 'Star Rating', 0, 1, 1, 1, 1, 1, '{\"options\":{\"1\":\"1-Star\",\"2\":\"2-Star\",\"3\":\"3-Star\",\"4\":\"4-Star\",\"5\":\"5-Star\"}}', 17),
(49, 7, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_name\",\"key\":\"category_name\",\"label\":\"category_name\",\"pivot_table\":\"banners\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(53, 7, 'accessories', 'checkbox', 'Add to \"Accessories\"?', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"true\"}', 14),
(54, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(55, 9, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(56, 9, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 4),
(57, 9, 'phone', 'text', 'Phone', 1, 1, 1, 1, 1, 1, '{}', 5),
(58, 9, 'address', 'text', 'Address', 1, 1, 1, 1, 1, 1, '{}', 6),
(59, 9, 'city', 'text', 'City', 1, 1, 1, 1, 1, 1, '{}', 7),
(60, 9, 'zip', 'text', 'Zip', 1, 1, 1, 1, 1, 1, '{}', 8),
(61, 9, 'total_amount', 'number', 'Total Amount', 1, 1, 1, 1, 1, 1, '{}', 9),
(62, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(63, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(64, 9, 'product_details', 'text', 'Product Details', 1, 1, 1, 1, 1, 1, '{}', 10),
(66, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(67, 11, 'Brand_logo', 'multiple_images', 'Brand Logos', 0, 1, 1, 1, 1, 1, '{}', 2),
(68, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(69, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(70, 7, 'product_quantity', 'number', 'Quantity', 1, 1, 1, 1, 1, 1, '{}', 9),
(71, 7, 'men', 'checkbox', 'Men', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"true\"}', 17),
(72, 7, 'women', 'checkbox', 'Women', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"true\"}', 18),
(73, 7, 'kids', 'checkbox', 'Kids', 1, 1, 1, 1, 1, 1, '{\"off\":\"No\",\"on\":\"Yes\",\"checked\":\"true\"}', 19);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_name_singular` varchar(255) NOT NULL,
  `display_name_plural` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(4, 'banners', 'banners', 'Banner', 'Banners', 'voyager-photos', 'App\\Banner', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-06-21 08:59:00', '2024-07-30 06:50:45'),
(6, 'categories', 'categories', 'Category', 'Categories', 'voyager-list', 'App\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-06-22 00:16:32', '2024-06-22 00:21:38'),
(7, 'products', 'products', 'Product', 'Products', 'voyager-basket', 'App\\Models\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-06-22 01:38:49', '2024-10-17 03:29:36'),
(9, 'orders', 'orders', 'Order', 'Orders', 'voyager-dollar', 'App\\Models\\Order', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-07-02 00:45:14', '2024-07-03 00:30:24'),
(11, 'brands', 'brands', 'Brand', 'Brands', 'voyager-bag', 'App\\Brand', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2024-07-03 01:12:26', '2024-07-03 01:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-06-21 08:47:47', '2024-06-21 08:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2024-06-21 08:47:47', '2024-06-21 08:47:47', 'voyager.dashboard', NULL),
(3, 1, 'Admins', '', '_self', 'voyager-person', '#000000', NULL, 2, '2024-06-21 08:47:47', '2024-07-03 01:15:51', 'voyager.users.index', 'null'),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 5, '2024-06-21 08:47:47', '2024-07-03 01:15:54', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2024-06-21 08:47:47', '2024-06-25 00:38:46', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2024-06-21 08:47:47', '2024-06-25 00:38:46', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2024-06-21 08:47:47', '2024-06-25 00:38:46', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2024-06-21 08:47:47', '2024-06-25 00:38:46', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 6, '2024-06-21 08:47:47', '2024-07-03 01:15:54', 'voyager.settings.index', NULL),
(11, 1, 'Banners', '', '_self', 'voyager-photos', '#000000', 14, 1, '2024-06-21 08:59:00', '2024-06-25 00:39:07', 'voyager.banners.index', 'null'),
(12, 1, 'Categories', '', '_self', 'voyager-list', NULL, 14, 2, '2024-06-22 00:16:32', '2024-06-25 00:39:10', 'voyager.categories.index', NULL),
(13, 1, 'Products', '', '_self', 'voyager-basket', NULL, 14, 3, '2024-06-22 01:38:49', '2024-06-25 00:39:13', 'voyager.products.index', NULL),
(14, 1, 'PoshMark Shop', '', '_self', 'voyager-shop', '#000000', NULL, 3, '2024-06-25 00:38:31', '2024-07-03 01:15:51', NULL, ''),
(15, 1, 'Orders', '', '_self', 'voyager-dollar', NULL, NULL, 4, '2024-07-02 00:45:14', '2024-07-03 01:15:51', 'voyager.orders.index', NULL),
(16, 1, 'Brands', '', '_self', 'voyager-bag', '#000000', 14, 4, '2024-07-03 01:12:26', '2024-07-03 01:16:07', 'voyager.brands.index', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2024_07_01_065653_create_orders_table', 2),
(30, '2024_07_01_065710_create_order_items_table', 2),
(31, '2019_05_03_000001_create_customer_columns', 3),
(32, '2019_05_03_000002_create_subscriptions_table', 3),
(33, '2019_05_03_000003_create_subscription_items_table', 3),
(34, '2024_07_02_065621_create_payments_table', 4),
(35, '2024_07_02_092813_add_product_details_to_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(2, 'browse_bread', NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(3, 'browse_database', NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(4, 'browse_media', NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(5, 'browse_compass', NULL, '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(6, 'browse_menus', 'menus', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(7, 'read_menus', 'menus', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(8, 'edit_menus', 'menus', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(9, 'add_menus', 'menus', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(10, 'delete_menus', 'menus', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(11, 'browse_roles', 'roles', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(12, 'read_roles', 'roles', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(13, 'edit_roles', 'roles', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(14, 'add_roles', 'roles', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(15, 'delete_roles', 'roles', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(16, 'browse_users', 'users', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(17, 'read_users', 'users', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(18, 'edit_users', 'users', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(19, 'add_users', 'users', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(20, 'delete_users', 'users', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(21, 'browse_settings', 'settings', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(22, 'read_settings', 'settings', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(23, 'edit_settings', 'settings', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(24, 'add_settings', 'settings', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(25, 'delete_settings', 'settings', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(26, 'browse_banners', 'banners', '2024-06-21 08:59:00', '2024-06-21 08:59:00'),
(27, 'read_banners', 'banners', '2024-06-21 08:59:00', '2024-06-21 08:59:00'),
(28, 'edit_banners', 'banners', '2024-06-21 08:59:00', '2024-06-21 08:59:00'),
(29, 'add_banners', 'banners', '2024-06-21 08:59:00', '2024-06-21 08:59:00'),
(30, 'delete_banners', 'banners', '2024-06-21 08:59:00', '2024-06-21 08:59:00'),
(31, 'browse_categories', 'categories', '2024-06-22 00:16:32', '2024-06-22 00:16:32'),
(32, 'read_categories', 'categories', '2024-06-22 00:16:32', '2024-06-22 00:16:32'),
(33, 'edit_categories', 'categories', '2024-06-22 00:16:32', '2024-06-22 00:16:32'),
(34, 'add_categories', 'categories', '2024-06-22 00:16:32', '2024-06-22 00:16:32'),
(35, 'delete_categories', 'categories', '2024-06-22 00:16:32', '2024-06-22 00:16:32'),
(36, 'browse_products', 'products', '2024-06-22 01:38:49', '2024-06-22 01:38:49'),
(37, 'read_products', 'products', '2024-06-22 01:38:49', '2024-06-22 01:38:49'),
(38, 'edit_products', 'products', '2024-06-22 01:38:49', '2024-06-22 01:38:49'),
(39, 'add_products', 'products', '2024-06-22 01:38:49', '2024-06-22 01:38:49'),
(40, 'delete_products', 'products', '2024-06-22 01:38:49', '2024-06-22 01:38:49'),
(41, 'browse_orders', 'orders', '2024-07-02 00:45:14', '2024-07-02 00:45:14'),
(42, 'read_orders', 'orders', '2024-07-02 00:45:14', '2024-07-02 00:45:14'),
(43, 'edit_orders', 'orders', '2024-07-02 00:45:14', '2024-07-02 00:45:14'),
(44, 'add_orders', 'orders', '2024-07-02 00:45:14', '2024-07-02 00:45:14'),
(45, 'delete_orders', 'orders', '2024-07-02 00:45:14', '2024-07-02 00:45:14'),
(46, 'browse_brands', 'brands', '2024-07-03 01:12:26', '2024-07-03 01:12:26'),
(47, 'read_brands', 'brands', '2024-07-03 01:12:26', '2024-07-03 01:12:26'),
(48, 'edit_brands', 'brands', '2024-07-03 01:12:26', '2024-07-03 01:12:26'),
(49, 'add_brands', 'brands', '2024-07-03 01:12:26', '2024-07-03 01:12:26'),
(50, 'delete_brands', 'brands', '2024-07-03 01:12:26', '2024-07-03 01:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'Mountain', '<p>This is the body of the lorem ipsum post.</p>\r\n<p>Loremasdmsds In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'DRAFT', 0, '2024-04-03 05:57:08', '2024-04-05 23:40:29'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\r\n<h2>We can use all kinds of format!</h2>\r\n<p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'DRAFT', 0, '2024-04-03 05:57:08', '2024-04-03 06:20:40'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'DRAFT', 0, '2024-04-03 05:57:08', '2024-04-03 05:57:08'),
(5, 0, NULL, 'Everything About US', NULL, 'This is a demo blog', '<p><strong>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</strong></p>\r\n<p>&nbsp;</p>\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available. No production usage.</p>', 'posts\\April2024\\UVq8LzdRwjmpKtD5qZfP.jpg', 'everything-about-us', NULL, NULL, 'DRAFT', 0, '2024-04-05 23:54:17', '2024-05-08 00:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` int(10) UNSIGNED NOT NULL,
  `product_stock` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `category_name` varchar(50) NOT NULL,
  `product_images` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `product_size` varchar(40) NOT NULL,
  `product_color` varchar(80) NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `special` tinyint(4) NOT NULL DEFAULT 0,
  `product_cut_price` int(11) DEFAULT NULL,
  `product_star_rating` varchar(20) DEFAULT NULL,
  `men` tinyint(4) NOT NULL DEFAULT 0,
  `women` tinyint(4) NOT NULL DEFAULT 0,
  `kids` tinyint(4) NOT NULL DEFAULT 0,
  `accessories` tinyint(4) NOT NULL DEFAULT 0,
  `product_quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_stock`, `category_name`, `product_images`, `created_at`, `updated_at`, `slug`, `product_size`, `product_color`, `featured`, `special`, `product_cut_price`, `product_star_rating`, `men`, `women`, `kids`, `accessories`, `product_quantity`) VALUES
(8, 'Summer Essentials', 'A cool and light dress for summers', 17, 1, 'Basics', '[\"products\\\\June2024\\\\DA1zAP2vjE2tuTAcOdz8.jpeg\",\"products\\\\June2024\\\\JUhtodByOPtWwCkh7ZUU.jpeg\"]', '2024-06-26 00:38:39', '2024-09-04 01:04:27', 'summer-essentials', '[\"Small\",\"Large\",\"2XL\"]', '[\"Light Green\",\"Dark Green\"]', 1, 1, 25, '3', 0, 0, 0, 0, 5),
(9, 'Long Dress', 'Stylish and comfy', 25, 0, 'Dresses', '[\"products\\\\June2024\\\\IcB78HfxIWHSw4TBT9IZ.jpg\"]', '2024-06-26 00:56:13', '2024-07-06 03:00:07', 'long-dress', '[\"34\",\"36\",\"38\"]', '[\"Black\",\"Grey\"]', 1, 1, NULL, '4', 0, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2024-06-21 08:47:47', '2024-06-21 08:47:47'),
(2, 'user', 'Normal User', '2024-06-21 08:47:47', '2024-06-21 08:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\June2024\\61Ba53TGrw15s8ghbFGN.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'PretWear', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to PretWear Admin Panel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\June2024\\bnjKbR4HC8CW6y5yntYa.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2024-04-03 05:57:09', '2024-04-03 05:57:09'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2024-04-03 05:57:09', '2024-04-03 05:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `settings` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 1, 'superadmin', 'super@admin.com', 'users/default.png', NULL, '$2y$10$ZGS2WmCR9bUhvECkBSTc3u3QLxGwwlGAKGyjZDeSeJ/KDKm6jjZcy', NULL, NULL, '2024-06-21 08:49:28', '2024-06-21 08:49:28', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 11:55 AM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rli-bagisto`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int UNSIGNED NOT NULL,
  `address_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_address_id` int UNSIGNED DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL COMMENT 'null if guest checkout',
  `cart_id` int UNSIGNED DEFAULT NULL COMMENT 'only for cart_addresses',
  `order_id` int UNSIGNED DEFAULT NULL COMMENT 'only for order_addresses',
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'only for customer_addresses',
  `use_for_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address_type`, `parent_address_id`, `customer_id`, `cart_id`, `order_id`, `first_name`, `last_name`, `gender`, `company_name`, `address`, `city`, `state`, `country`, `postcode`, `email`, `phone`, `vat_id`, `default_address`, `use_for_shipping`, `additional`, `created_at`, `updated_at`) VALUES
(3, 'order_shipping', NULL, NULL, NULL, 1, 'Amena', 'Rojas', NULL, 'Mathis and Estes Trading', 'Proident corrupti', 'Itaque neque eum est', 'UP', 'IN', '201301', 'lizin@mailinator.com', '123456789', NULL, 0, 0, NULL, '2024-04-19 12:20:31', '2024-04-19 12:20:31'),
(4, 'order_billing', NULL, NULL, NULL, 1, 'Amena', 'Rojas', NULL, 'Mathis and Estes Trading', 'Proident corrupti', 'Itaque neque eum est', 'UP', 'IN', '201301', 'lizin@mailinator.com', '123456789', NULL, 0, 0, NULL, '2024-04-19 12:20:31', '2024-04-19 12:20:31'),
(5, 'customer', NULL, 2, NULL, NULL, 'Amena', 'Rojas', NULL, 'Mathis and Estes Trading', 'Proident corrupti', 'Itaque neque eum est', 'UP', 'IN', '201301', 'lizin@mailinator.com', '123456789', NULL, 0, 0, NULL, '2024-04-19 12:21:30', '2024-04-19 12:21:30'),
(10, 'order_shipping', NULL, NULL, NULL, 2, 'Amena', 'Rojas', NULL, 'Mathis and Estes Trading', 'Proident corrupti', 'Itaque neque eum est', 'UP', 'IN', '201301', 'lizin@mailinator.com', '123456789', NULL, 0, 0, NULL, '2024-04-19 12:22:43', '2024-04-19 12:22:43'),
(11, 'order_billing', NULL, NULL, NULL, 2, 'Amena', 'Rojas', NULL, 'Mathis and Estes Trading', 'Proident corrupti', 'Itaque neque eum est', 'UP', 'IN', '201301', 'lizin@mailinator.com', '123456789', NULL, 0, 0, NULL, '2024-04-19 12:22:43', '2024-04-19 12:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` int UNSIGNED NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `api_token`, `status`, `role_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Example', 'admin@example.com', '$2y$10$MFpdL5dfunzRd7PuMaFagedXVmWcpOXSFIReRJAMwp2MRS9FoKbCm', 'Pvi04o0yNlik6ZlVjOZEO2HaAQewj1hY0Z583fIwlZ1LUM6mPG9AfA6DNL4sMulXwfd1vZkZDXbCpda8', 1, 1, NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `swatch_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regex` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_unique` tinyint(1) NOT NULL DEFAULT '0',
  `is_filterable` tinyint(1) NOT NULL DEFAULT '0',
  `is_comparable` tinyint(1) NOT NULL DEFAULT '0',
  `is_configurable` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `is_visible_on_front` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_locale` tinyint(1) NOT NULL DEFAULT '0',
  `value_per_channel` tinyint(1) NOT NULL DEFAULT '0',
  `default_value` int DEFAULT NULL,
  `enable_wysiwyg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `code`, `admin_name`, `type`, `swatch_type`, `validation`, `regex`, `position`, `is_required`, `is_unique`, `is_filterable`, `is_comparable`, `is_configurable`, `is_user_defined`, `is_visible_on_front`, `value_per_locale`, `value_per_channel`, `default_value`, `enable_wysiwyg`, `created_at`, `updated_at`) VALUES
(1, 'sku', 'SKU', 'text', NULL, NULL, NULL, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(2, 'name', 'Name', 'text', NULL, NULL, NULL, 3, 1, 0, 0, 1, 0, 0, 0, 1, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(3, 'url_key', 'URL Key', 'text', NULL, NULL, NULL, 4, 1, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(4, 'tax_category_id', 'Tax Category', 'select', NULL, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(5, 'new', 'New', 'boolean', NULL, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(6, 'featured', 'Featured', 'boolean', NULL, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(7, 'visible_individually', 'Visible Individually', 'boolean', NULL, NULL, NULL, 9, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(8, 'status', 'Status', 'boolean', NULL, NULL, NULL, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(9, 'short_description', 'Short Description', 'textarea', NULL, NULL, NULL, 11, 1, 0, 0, 0, 0, 0, 0, 1, 1, NULL, 1, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(10, 'description', 'Description', 'textarea', NULL, NULL, NULL, 12, 1, 0, 0, 1, 0, 0, 0, 1, 1, NULL, 1, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(11, 'price', 'Price', 'price', NULL, 'decimal', NULL, 13, 1, 0, 1, 1, 0, 0, 0, 1, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(12, 'cost', 'Cost', 'price', NULL, 'decimal', NULL, 14, 0, 0, 0, 0, 0, 1, 0, 0, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(13, 'special_price', 'Special Price', 'price', NULL, 'decimal', NULL, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(14, 'special_price_from', 'Special Price From', 'date', NULL, NULL, NULL, 16, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(15, 'special_price_to', 'Special Price To', 'date', NULL, NULL, NULL, 17, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(16, 'meta_title', 'Meta Title', 'textarea', NULL, NULL, NULL, 18, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(17, 'meta_keywords', 'Meta Keywords', 'textarea', NULL, NULL, NULL, 20, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(18, 'meta_description', 'Meta Description', 'textarea', NULL, NULL, NULL, 21, 0, 0, 0, 0, 0, 1, 0, 1, 1, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(19, 'length', 'Length', 'text', NULL, 'decimal', NULL, 22, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(20, 'width', 'Width', 'text', NULL, 'decimal', NULL, 23, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(21, 'height', 'Height', 'text', NULL, 'decimal', NULL, 24, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(22, 'weight', 'Weight', 'text', NULL, 'decimal', NULL, 25, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(23, 'color', 'Color', 'select', 'color', NULL, NULL, 26, 0, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-05-23 11:19:41'),
(24, 'size', 'Size', 'select', NULL, NULL, NULL, 27, 0, 0, 1, 0, 1, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(25, 'brand', 'Brand', 'select', NULL, NULL, NULL, 28, 0, 0, 1, 0, 0, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(26, 'guest_checkout', 'Guest Checkout', 'boolean', NULL, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(27, 'product_number', 'Product Number', 'text', NULL, NULL, NULL, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(28, 'manage_stock', 'Manage Stock', 'boolean', NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(50, 'processing_fee', 'Processing Fee', 'price', NULL, 'decimal', NULL, NULL, 1, 0, 1, 1, 0, 0, 0, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(51, 'location', 'Location', 'select', 'dropdown', NULL, NULL, NULL, 0, 0, 1, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-07 11:16:05'),
(52, 'floor_area', 'Floor Area (sqm)', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(53, 'lot_area', 'Lot Area (sqm)', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(54, 'finished', 'Finish', 'select', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(55, 'veranda', 'Veranda', 'select', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(56, 'end_unit', 'End Unit', 'select', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(57, 'ground_floor', 'Ground Floor', 'select', 'dropdown', NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-13 09:14:17'),
(58, 'bedrooms', 'Bedrooms', 'text', NULL, NULL, '0', NULL, 0, 0, 0, 1, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-29 05:22:06'),
(59, 't_and_b', 'Bathroom', 'text', NULL, NULL, '0', NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-29 05:39:01'),
(60, 'carports', 'Carports', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(61, 'parking', 'Parking', 'text', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(62, 'inventory_sources', 'Inventory Sources', 'text', NULL, NULL, '0', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-07 11:36:12'),
(63, 'style', 'Style', 'select', 'dropdown', NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-30 10:25:33'),
(64, 'balcony', 'Balcony', 'select', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-04-19 10:53:35'),
(65, 'unit_type', 'Carport', 'select', 'dropdown', NULL, NULL, NULL, 0, 0, 0, 1, 1, 1, 1, 0, 0, NULL, 0, '2024-04-19 10:53:35', '2024-05-23 11:40:01'),
(66, 'button_text', 'Button Text', 'text', NULL, NULL, '', NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-22 05:49:18', '2024-04-22 05:49:18'),
(67, 'button_color_text', 'Button color text', 'text', NULL, NULL, '', NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-22 05:54:48', '2024-04-22 05:54:48'),
(68, 'button_border_color', 'Button Border Color', 'text', NULL, NULL, '', NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-22 06:07:47', '2024-04-22 06:07:47'),
(69, 'button_background_color', 'Button Background Color', 'text', NULL, NULL, '', NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2024-04-22 06:08:22', '2024-04-22 06:08:22'),
(70, 'button_information', 'Button Information', 'textarea', NULL, NULL, '', NULL, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2024-04-22 06:09:03', '2024-04-22 06:09:03'),
(71, 'first_floor', '1st Floor', 'select', 'dropdown', NULL, '', NULL, 0, 0, 0, 0, 0, 1, 1, 0, 0, NULL, 0, '2024-05-10 07:09:53', '2024-05-10 07:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_families`
--

CREATE TABLE `attribute_families` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_families`
--

INSERT INTO `attribute_families` (`id`, `code`, `name`, `status`, `is_user_defined`) VALUES
(1, 'default', 'Default', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_groups`
--

CREATE TABLE `attribute_groups` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_family_id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column` int NOT NULL DEFAULT '1',
  `position` int NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_groups`
--

INSERT INTO `attribute_groups` (`id`, `code`, `attribute_family_id`, `name`, `column`, `position`, `is_user_defined`) VALUES
(1, 'general', 1, 'General', 1, 1, 0),
(2, 'description', 1, 'Description', 1, 3, 0),
(3, 'meta_description', 1, 'Meta Description', 1, 4, 0),
(4, 'price', 1, 'Price', 2, 1, 0),
(5, 'shipping', 1, 'Shipping', 2, 2, 0),
(6, 'settings', 1, 'Settings', 2, 3, 0),
(7, 'inventories', 1, 'Inventories', 2, 4, 0),
(50, 'add_to_card_button_setting', 1, 'Add To Card Button Setting', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group_mappings`
--

CREATE TABLE `attribute_group_mappings` (
  `attribute_id` int UNSIGNED NOT NULL,
  `attribute_group_id` int UNSIGNED NOT NULL,
  `position` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_group_mappings`
--

INSERT INTO `attribute_group_mappings` (`attribute_id`, `attribute_group_id`, `position`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 6, 1),
(6, 6, 2),
(7, 6, 3),
(8, 6, 4),
(9, 2, 1),
(10, 2, 2),
(11, 4, 18),
(12, 4, 19),
(13, 4, 20),
(14, 4, 21),
(15, 4, 22),
(16, 3, 1),
(17, 3, 2),
(18, 3, 3),
(19, 5, 1),
(20, 5, 2),
(21, 5, 3),
(22, 5, 4),
(23, 1, 6),
(24, 1, 7),
(25, 1, 8),
(26, 6, 5),
(27, 1, 2),
(28, 7, 1),
(50, 4, 17),
(51, 4, 13),
(52, 4, 16),
(53, 4, 15),
(54, 4, 14),
(55, 4, 8),
(56, 4, 12),
(57, 4, 11),
(58, 4, 10),
(59, 4, 9),
(60, 4, 2),
(61, 4, 7),
(62, 4, 6),
(63, 4, 5),
(64, 4, 3),
(65, 4, 4),
(66, 50, 5),
(67, 50, 4),
(68, 50, 1),
(69, 50, 3),
(70, 50, 2),
(71, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL,
  `admin_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int DEFAULT NULL,
  `swatch_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`id`, `attribute_id`, `admin_name`, `sort_order`, `swatch_value`) VALUES
(1, 23, 'Red', 4, '#ec0909'),
(2, 23, 'Hopefull Green', 0, '#377642'),
(3, 23, 'Joyful Yellow', 3, '#e1e401'),
(4, 23, 'Black', 5, '#050505'),
(5, 23, 'White', 6, '#ffffff'),
(6, 24, 'S', 1, NULL),
(7, 24, 'M', 2, NULL),
(8, 24, 'L', 3, NULL),
(9, 24, 'XL', 4, NULL),
(30, 51, 'Laguna', 0, NULL),
(31, 51, 'Cavite', 1, NULL),
(32, 51, 'Rizal', 2, NULL),
(33, 51, 'Bulacan', 3, NULL),
(34, 54, 'Bare', 1, NULL),
(35, 54, 'Fitted', 2, NULL),
(36, 55, 'Present', 1, NULL),
(37, 55, 'Absent', 2, NULL),
(38, 56, 'Yes', 1, NULL),
(39, 56, 'No', 2, NULL),
(40, 64, 'Yes', 1, NULL),
(41, 64, 'No', 2, NULL),
(42, 63, 'Slant', 0, NULL),
(43, 63, 'Flat', 2, NULL),
(44, 63, 'House & Lot', 1, NULL),
(45, 63, 'Condominium', 3, NULL),
(46, 23, 'Nostalgic Purple', 1, '#4f0183'),
(47, 23, 'Graceful Pink', 2, '#f600fa'),
(48, 71, 'Yes', 0, NULL),
(49, 71, 'No', 1, NULL),
(50, 65, 'Yes', 0, NULL),
(51, 65, 'No', 1, NULL),
(52, 57, 'Yes', 0, NULL),
(53, 57, 'No', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option_translations`
--

CREATE TABLE `attribute_option_translations` (
  `id` int UNSIGNED NOT NULL,
  `attribute_option_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_option_translations`
--

INSERT INTO `attribute_option_translations` (`id`, `attribute_option_id`, `locale`, `label`) VALUES
(120, 1, 'en', 'Red'),
(121, 2, 'en', 'Hopefull Green'),
(122, 3, 'en', 'Joyful Yellow'),
(123, 4, 'en', 'Black'),
(124, 5, 'en', 'White'),
(125, 6, 'en', 'S'),
(126, 7, 'en', 'M'),
(127, 8, 'en', 'L'),
(128, 9, 'en', 'XL'),
(129, 30, 'en', 'Laguna'),
(130, 31, 'en', 'Cavite'),
(131, 32, 'en', 'Rizal'),
(132, 33, 'en', 'Bulacan'),
(133, 34, 'en', 'Bare'),
(134, 35, 'en', 'Fitted'),
(135, 36, 'en', 'Present'),
(136, 37, 'en', 'Absent'),
(137, 38, 'en', 'Yes'),
(138, 39, 'en', 'No'),
(139, 40, 'en', '64'),
(140, 41, 'en', '64'),
(141, 42, 'en', 'Slant'),
(142, 43, 'en', 'Flat'),
(143, 44, 'en', 'House & Lot'),
(144, 45, 'en', 'Condominium'),
(145, 46, 'en', 'Nostalgic Purple'),
(146, 47, 'en', 'Graceful Pink'),
(147, 48, 'en', 'Yes'),
(148, 49, 'en', 'No'),
(149, 50, 'en', 'Yes'),
(150, 51, 'en', 'No'),
(151, 52, 'en', 'Yes'),
(152, 53, 'en', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `name`) VALUES
(50, 50, 'en', 'Processing Fee'),
(51, 51, 'en', 'Location'),
(52, 52, 'en', 'Floor Area (sqm)'),
(53, 53, 'en', 'Lot Area (sqm)'),
(54, 54, 'en', 'Finished'),
(55, 55, 'en', 'Veranda'),
(56, 56, 'en', 'End Unit'),
(57, 57, 'en', 'Ground Floor'),
(58, 58, 'en', 'Bedrooms'),
(59, 59, 'en', 'Bathroom'),
(60, 60, 'en', 'Carports'),
(61, 61, 'en', 'Parking'),
(62, 62, 'en', 'Inventory Sources'),
(63, 63, 'en', 'Style'),
(64, 64, 'en', 'Balcony'),
(65, 65, 'en', 'Carport'),
(154, 1, 'en', 'SKU'),
(155, 2, 'en', 'Name'),
(156, 3, 'en', 'URL Key'),
(157, 4, 'en', 'Tax Category'),
(158, 5, 'en', 'New'),
(159, 6, 'en', 'Featured'),
(160, 7, 'en', 'Visible Individually'),
(161, 8, 'en', 'Status'),
(162, 9, 'en', 'Short Description'),
(163, 10, 'en', 'Description'),
(164, 11, 'en', 'Price'),
(165, 12, 'en', 'Cost'),
(166, 13, 'en', 'Special Price'),
(167, 14, 'en', 'Special Price From'),
(168, 15, 'en', 'Special Price To'),
(169, 16, 'en', 'Meta Title'),
(170, 17, 'en', 'Meta Keywords'),
(171, 18, 'en', 'Meta Description'),
(172, 19, 'en', 'Length'),
(173, 20, 'en', 'Width'),
(174, 21, 'en', 'Height'),
(175, 22, 'en', 'Weight'),
(176, 23, 'en', 'Color'),
(177, 24, 'en', 'Size'),
(178, 25, 'en', 'Brand'),
(179, 26, 'en', 'Guest Checkout'),
(180, 27, 'en', 'Product Number'),
(181, 28, 'en', 'Manage Stock'),
(182, 66, 'en', ''),
(183, 67, 'en', ''),
(184, 68, 'en', 'Button Border Color'),
(185, 69, 'en', 'Button Background Color'),
(186, 70, 'en', 'Button Information'),
(187, 71, 'en', '1st Floor');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channels` bigint UNSIGNED NOT NULL,
  `default_category` bigint UNSIGNED NOT NULL,
  `categorys` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `src` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `allow_comments` tinyint(1) NOT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `short_description`, `description`, `channels`, `default_category`, `categorys`, `tags`, `author`, `author_id`, `src`, `locale`, `status`, `allow_comments`, `meta_title`, `meta_description`, `meta_keywords`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'Lucian Mccormick', 'lucian-mccormick', 'Quo cum in sint odio', '<p>asdasdasd</p>', 1, 0, NULL, '', 'Example', 1, '{\"src\":\"\"}', 'en', 0, 0, 'Dolorum at dicta qui', 'Odit sed necessitati', 'Ullam nesciunt maio', '2024-02-01 00:00:00', '2024-05-02 11:56:03', '2024-05-29 04:45:47', NULL),
(18, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 0, NULL, '', 'Example', 1, 'blog-images/18/mPQCrcGReaxty9sKL7ckimF26FDGvtOLervAI7W4.webp', 'en', 1, 0, 'Ea occaecat dolorem', 'Labore nostrum a lor', 'Id a natus alias ess', '2024-08-01 00:00:00', '2024-05-02 12:08:19', '2024-05-07 04:52:00', NULL),
(19, 'Abraham Acosta', 'abraham-acosta', 'Ut aut unde quis eli', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, 'blog-images/19/YQtB3ny3MmwFEagmySYkjDZGvxeJGSSZgd9uhYT3.webp', 'en', 1, 0, 'Commodi ullam elit', 'Corporis velit aut', 'Excepturi molestias', '2024-05-07 00:00:00', '2024-05-07 05:31:49', '2024-05-07 05:31:49', NULL),
(20, 'Fuller Waters', 'fuller-waters', 'Rerum explicabo Des', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, 'blog-images/20/nTzZkxexCaLxrnNEXPJ2irYmuQxQQkwFBNrZoowM.webp', 'en', 1, 0, 'Ut voluptate id vita', 'Quis vel at debitis', 'Illo reprehenderit', '2024-05-07 00:00:00', '2024-05-07 05:32:09', '2024-05-07 05:32:09', NULL),
(21, 'Michelle Schroeder', 'michelle-schroeder', 'Aliquam officia qui', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Sed voluptatem Aut', 'Ut in sint enim eaq', 'Qui corrupti deseru', '2024-05-07 00:00:00', '2024-05-07 05:32:22', '2024-05-07 05:32:22', NULL),
(22, 'Galena Rice', 'galena-rice', 'Reprehenderit consec', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Dolore iusto delectu', 'Unde ullam minus mol', 'Laborum ipsum nisi u', '2024-05-07 00:00:00', '2024-05-07 05:32:36', '2024-05-07 05:32:36', NULL),
(23, 'Colette Benjamin', 'colette-benjamin', 'Dolor reprehenderit', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Iste veniam sed eaq', 'Odit et dolore quae', 'At omnis et deleniti', '2024-05-07 00:00:00', '2024-05-07 05:32:55', '2024-05-07 05:32:55', NULL),
(24, 'Whoopi Knapp', 'whoopi-knapp', 'Facere sit dignissi', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Dolorum a sapiente d', 'Et autem facere culp', 'Incididunt qui lorem', '2024-05-07 00:00:00', '2024-05-07 05:33:08', '2024-05-07 05:33:08', NULL),
(25, 'Jordan Ellis', 'jordan-ellis', 'Obcaecati anim facil', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Corporis sit adipisi', 'Voluptate irure irur', 'Deserunt rerum in re', '2024-05-07 00:00:00', '2024-05-07 05:33:20', '2024-05-07 05:33:20', NULL),
(26, 'Grady Rocha', 'grady-rocha', 'Dolorum qui est off', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 1, 0, 'Sit incidunt aut e', 'Sed minus tempore q', 'Sit qui harum sint r', '2024-05-07 00:00:00', '2024-05-07 05:33:33', '2024-05-07 05:33:33', NULL),
(27, 'Channing Mann', 'channing-mann', 'Irure qui maiores en', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 1, 0, NULL, '', 'Example', 1, '', 'en', 0, 0, 'Irure optio sit qui', 'Atque dolorum quam i', 'Illum corporis illu', '2024-05-07 00:00:00', '2024-05-07 05:33:47', '2024-05-29 04:44:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `parent_id`, `locale`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Election', 'election', '<p>Election</p>', '', 1, 0, 'en', 'Election', 'Election', 'Election', '2024-04-10 12:31:51', '2024-04-10 12:33:52', NULL),
(5, 'Election 2024', 'election-2024', '<p>Election 2024</p>', 'blog-category/5/ANWxUy3tHCi4xpqYzdEhBnOcccg2F3Fq0FsqJnQo.webp', 1, 4, 'en', 'Election 2024', 'Election 2024', 'Election 2024', '2024-04-10 12:33:48', '2024-04-10 12:33:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `author` bigint UNSIGNED NOT NULL,
  `post` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`, `slug`, `description`, `status`, `locale`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'India', 'india', '<p>India</p>', 1, 'en', 'India', 'India', 'India', '2024-04-10 12:31:35', '2024-04-10 12:31:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulk_product_importers`
--

CREATE TABLE `bulk_product_importers` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_family_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bulk_product_importers`
--

INSERT INTO `bulk_product_importers` (`id`, `name`, `locale_code`, `attribute_family_id`, `created_at`, `updated_at`) VALUES
(3, 'Vikas', 'en', 1, '2024-04-19 11:15:26', '2024-05-14 10:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int UNSIGNED NOT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `items_count` int DEFAULT NULL,
  `items_qty` decimal(12,4) DEFAULT NULL,
  `exchange_rate` decimal(12,4) DEFAULT NULL,
  `global_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `property_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `tax_total` decimal(12,4) DEFAULT '0.0000',
  `base_tax_total` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `checkout_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `applied_cart_rule_ids` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_email`, `customer_first_name`, `customer_last_name`, `shipping_method`, `coupon_code`, `is_gift`, `items_count`, `items_qty`, `exchange_rate`, `global_currency_code`, `base_currency_code`, `channel_currency_code`, `cart_currency_code`, `grand_total`, `base_grand_total`, `processing_fee`, `property_code`, `sub_total`, `base_sub_total`, `tax_total`, `base_tax_total`, `discount_amount`, `base_discount_amount`, `checkout_method`, `is_guest`, `is_active`, `applied_cart_rule_ids`, `customer_id`, `channel_id`, `created_at`, `updated_at`) VALUES
(17, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2920000.0000', '2920000.0000', '20000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-19 11:25:56', '2024-04-19 11:26:34'),
(18, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2920000.0000', '2920000.0000', '20000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-19 11:26:34', '2024-04-19 12:14:27'),
(23, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2920000.0000', '2920000.0000', '20000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-22 06:27:24', '2024-04-22 08:34:33'),
(29, 'lizin@mailinator.com', 'Amena', 'Rojas', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', '0.0000', '0.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 0, 0, NULL, 3, 1, '2024-04-29 07:55:12', '2024-04-29 07:55:12'),
(30, 'lizin1@mailinator.com', 'Amena', 'Rojas', NULL, NULL, 0, NULL, NULL, NULL, 'USD', 'USD', 'USD', 'USD', '0.0000', '0.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 0, 0, NULL, 4, 1, '2024-04-29 08:20:37', '2024-04-29 08:20:37'),
(31, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:27:45', '2024-04-30 11:28:49'),
(32, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:28:49', '2024-04-30 11:35:16'),
(33, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:35:16', '2024-04-30 11:35:58'),
(34, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:35:58', '2024-04-30 11:36:04'),
(35, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:36:04', '2024-04-30 11:36:09'),
(36, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2910000.0000', '2910000.0000', '10000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:36:09', '2024-04-30 11:48:43'),
(37, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-30 11:46:23', '2024-04-30 11:46:23'),
(38, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-30 11:46:40', '2024-04-30 11:46:40'),
(39, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-30 11:46:57', '2024-04-30 11:46:57'),
(40, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-04-30 11:48:43', '2024-04-30 12:04:35'),
(44, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-04-30 12:38:39', '2024-04-30 13:48:22'),
(45, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-05-02 11:01:14', '2024-05-02 11:01:42'),
(46, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 0, NULL, NULL, 1, '2024-05-06 06:27:19', '2024-05-06 06:41:18'),
(47, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', 'AGM-01-028-024', '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-05-06 06:41:18', '2024-05-10 09:45:45'),
(48, 'vikas@example.com', 'Vikas', 'Vikas', NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 0, 0, NULL, 2, 1, '2024-05-07 10:15:12', '2024-05-07 11:53:36'),
(49, 'vikas@example.com', 'Vikas', 'Vikas', NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 0, 1, NULL, 2, 1, '2024-05-07 11:53:36', '2024-05-09 13:40:44'),
(50, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-05-14 09:59:50', '2024-05-14 10:26:58'),
(52, NULL, NULL, NULL, NULL, NULL, 0, 1, '1.0000', NULL, 'USD', 'USD', 'USD', 'USD', '2915000.0000', '2915000.0000', '15000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', NULL, 1, 1, NULL, NULL, 1, '2024-05-22 05:08:18', '2024-05-22 05:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '0',
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_weight` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `price` decimal(12,4) NOT NULL DEFAULT '1.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `custom_price` decimal(12,4) DEFAULT NULL,
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `cart_id` int UNSIGNED NOT NULL,
  `tax_category_id` int UNSIGNED DEFAULT NULL,
  `applied_cart_rule_ids` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_inventories`
--

CREATE TABLE `cart_item_inventories` (
  `id` int UNSIGNED NOT NULL,
  `qty` int UNSIGNED NOT NULL DEFAULT '0',
  `inventory_source_id` int UNSIGNED DEFAULT NULL,
  `cart_item_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_payment`
--

CREATE TABLE `cart_payment` (
  `id` int UNSIGNED NOT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rules`
--

CREATE TABLE `cart_rules` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `coupon_type` int NOT NULL DEFAULT '1',
  `use_auto_generation` tinyint(1) NOT NULL DEFAULT '0',
  `usage_per_customer` int NOT NULL DEFAULT '0',
  `uses_per_coupon` int NOT NULL DEFAULT '0',
  `times_used` int UNSIGNED NOT NULL DEFAULT '0',
  `condition_type` tinyint(1) NOT NULL DEFAULT '1',
  `conditions` json DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `uses_attribute_conditions` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_quantity` int NOT NULL DEFAULT '1',
  `discount_step` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `apply_to_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_channels`
--

CREATE TABLE `cart_rule_channels` (
  `cart_rule_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_coupons`
--

CREATE TABLE `cart_rule_coupons` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usage_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `usage_per_customer` int UNSIGNED NOT NULL DEFAULT '0',
  `times_used` int UNSIGNED NOT NULL DEFAULT '0',
  `type` int UNSIGNED NOT NULL DEFAULT '0',
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `expired_at` date DEFAULT NULL,
  `cart_rule_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_coupon_usage`
--

CREATE TABLE `cart_rule_coupon_usage` (
  `id` int UNSIGNED NOT NULL,
  `times_used` int NOT NULL DEFAULT '0',
  `cart_rule_coupon_id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_customers`
--

CREATE TABLE `cart_rule_customers` (
  `id` int UNSIGNED NOT NULL,
  `times_used` bigint UNSIGNED NOT NULL DEFAULT '0',
  `customer_id` int UNSIGNED NOT NULL,
  `cart_rule_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_customer_groups`
--

CREATE TABLE `cart_rule_customer_groups` (
  `cart_rule_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_rule_translations`
--

CREATE TABLE `cart_rule_translations` (
  `id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cart_rule_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cart_shipping_rates`
--

CREATE TABLE `cart_shipping_rates` (
  `id` int UNSIGNED NOT NULL,
  `carrier` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT '0',
  `base_price` double DEFAULT '0',
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `is_calculate_tax` tinyint(1) NOT NULL DEFAULT '1',
  `cart_address_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart_shipping_rates`
--

INSERT INTO `cart_shipping_rates` (`id`, `carrier`, `carrier_title`, `method`, `method_title`, `method_description`, `price`, `base_price`, `discount_amount`, `base_discount_amount`, `is_calculate_tax`, `cart_address_id`, `created_at`, `updated_at`) VALUES
(3, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 10, 10, '0.0000', '0.0000', 1, 2, '2024-04-19 12:20:29', '2024-04-19 12:20:29'),
(4, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, '0.0000', '0.0000', 1, 2, '2024-04-19 12:20:29', '2024-04-19 12:20:29'),
(9, 'flatrate', 'Flat Rate', 'flatrate_flatrate', 'Flat Rate', 'Flat Rate Shipping', 10, 10, '0.0000', '0.0000', 1, 9, '2024-04-19 12:22:40', '2024-04-19 12:22:40'),
(10, 'free', 'Free Shipping', 'free_free', 'Free Shipping', 'Free Shipping', 0, 0, '0.0000', '0.0000', 1, 9, '2024-04-19 12:22:40', '2024-04-19 12:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rules`
--

CREATE TABLE `catalog_rules` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_from` date DEFAULT NULL,
  `ends_till` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `condition_type` tinyint(1) NOT NULL DEFAULT '1',
  `conditions` json DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_channels`
--

CREATE TABLE `catalog_rule_channels` (
  `catalog_rule_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_customer_groups`
--

CREATE TABLE `catalog_rule_customer_groups` (
  `catalog_rule_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_products`
--

CREATE TABLE `catalog_rule_products` (
  `id` int UNSIGNED NOT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `end_other_rules` tinyint(1) NOT NULL DEFAULT '0',
  `action_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `product_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED NOT NULL,
  `catalog_rule_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_rule_product_prices`
--

CREATE TABLE `catalog_rule_product_prices` (
  `id` int UNSIGNED NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `rule_date` date NOT NULL,
  `starts_from` datetime DEFAULT NULL,
  `ends_till` datetime DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED NOT NULL,
  `catalog_rule_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `logo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `display_mode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'products_and_description',
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `banner_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `communities_status` tinyint(1) DEFAULT '0',
  `community_banner_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int UNSIGNED NOT NULL DEFAULT '0',
  `btn_border_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_background_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `position`, `logo_path`, `status`, `display_mode`, `_lft`, `_rgt`, `parent_id`, `additional`, `banner_path`, `communities_status`, `community_banner_path`, `btn_text`, `sort`, `btn_border_color`, `btn_background_color`, `btn_color`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'products_and_description', 1, 24, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2024-04-19 10:53:46', '2024-04-19 10:53:46'),
(2, 1, 'category/2/nLBi1L5RCmcY2fXGCCL0nX0e0wftDB1Xes6eWr04.webp', 1, 'products_and_description', 14, 15, 1, NULL, 'category/2/qRTN5gvf1r25LmghIADiLTvSlXmp6T7qms2GizC8.webp', NULL, 'category/2/community_banner_path/51sNpZfAEQ0vZlNahU4PJ6tznovqN0SOlrom3JEf.webp', 'Elanvital', 1, '#B99470', '#B99470', '#322C2B', '2024-04-19 10:53:46', '2024-04-29 12:18:18'),
(3, 3, NULL, 1, 'products_and_description', 16, 17, 1, NULL, NULL, 1, NULL, 'Everyhome', 3, '#ed9455', '#ed9455', '#322c2b', '2024-04-19 10:53:46', '2024-05-20 06:22:48'),
(4, 4, NULL, 1, 'products_and_description', 24, 25, 1, NULL, NULL, 1, NULL, 'Extraordinary', 2, '#ed9455', '#ed9455', '#322c2b', '2024-04-19 10:53:46', '2024-05-20 06:22:41'),
(5, 5, 'category/5/uBuylo2E836d5BFiLLN4X9vU45iuftRHdPzc3mhD.webp', 1, 'products_and_description', 26, 27, 1, NULL, NULL, 1, NULL, 'Everglow', 1, '#eb0089', '#f7f7f7', '#eb0089', '2024-04-19 10:53:46', '2024-05-22 10:15:00'),
(8, 1, NULL, 1, 'products_and_description', 18, 19, 1, NULL, NULL, 1, 'category/8/6pY5NWwuMfAcx1yRmmgsJnnnieoz5Vj2N0vrAHxV.webp', 'Agapeya', 1, '#030202', '#de0404', '#ebdfe4', '2024-04-29 06:50:35', '2024-05-20 06:22:30'),
(9, 1, 'category/9/sUv6LYu7lZP4gKVm7VqZYSWTf7T4jqVHV73CFbR2.webp', 1, 'products_and_description', 20, 21, 1, NULL, 'category/9/oRsK2v11pnPOT4BgMiZn38uDRjgCcV13geu89Qjs.webp', 1, 'category/9/N6KqyTwjy88NOd8cG2LgRusDEzSUYKz4tW0YFEbs.webp', 'Zaya', 1, '#030202', '#de0404', '#ededed', '2024-04-29 06:51:14', '2024-05-15 12:34:00'),
(23, 1, NULL, 0, 'products_and_description', 22, 23, 1, NULL, NULL, 0, NULL, 'All', 1, '#ad9494', '#454545', '#d10000', '2024-05-20 07:59:20', '2024-05-20 07:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories_assets`
--

CREATE TABLE `categories_assets` (
  `id` bigint UNSIGNED NOT NULL,
  `btn_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_background` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_border_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int UNSIGNED NOT NULL DEFAULT '0',
  `category_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `categories_assets`
--

INSERT INTO `categories_assets` (`id`, `btn_color`, `btn_background`, `btn_border_color`, `sort`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '#ebdfe4', '#CC035C', '#CC035C', 1, 5, '2024-04-16 11:41:51', '2024-04-16 11:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `category_filterable_attributes`
--

CREATE TABLE `category_filterable_attributes` (
  `category_id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category_filterable_attributes`
--

INSERT INTO `category_filterable_attributes` (`category_id`, `attribute_id`) VALUES
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(8, 11),
(8, 23),
(9, 11),
(9, 23),
(23, 11),
(23, 23),
(23, 24),
(23, 25),
(23, 50),
(23, 51);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `locale_id` int UNSIGNED DEFAULT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `slug`, `url_path`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `locale_id`, `locale`) VALUES
(30, 1, 'Root', 'root', '', 'Root Category Description', '', '', '', NULL, 'en'),
(31, 2, 'Elanvital', 'elanvital', 'elanvital', '<h2><strong>Where does it come from?</strong></h2>\r\n<p><br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p><br><br><br>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '', '', '', 1, 'en'),
(32, 3, 'Everyhome', 'everyhome', 'everyhome', '<p><span lang=\"en-US\">Everyhome</span></p>', '', '', '', 1, 'en'),
(33, 4, 'Extraordinary', 'extraordinary', 'extraordinary', '<p><span lang=\"en-US\">Extraordinary</span></p>', '', '', '', 1, 'en'),
(34, 5, 'Everglow', 'everglow', 'everglow', '<p><span lang=\"en-US\">Everglow</span></p>', '', '', '', 1, 'en'),
(35, 8, 'Agapeya', 'agapeya', '', '<p>Agapeya</p>', 'Agapeya', 'Agapeya', 'Agapeya', 1, 'en'),
(36, 9, 'Zaya', 'zaya', '', '<p>Zaya</p>', 'Zaya', 'Zaya', 'Zaya', 1, 'en'),
(50, 23, 'All', 'all', '', '<p>All</p>', '', '', '', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_seo` json DEFAULT NULL,
  `is_maintenance_on` tinyint(1) NOT NULL DEFAULT '0',
  `allowed_ips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `root_category_id` int UNSIGNED DEFAULT NULL,
  `default_locale_id` int UNSIGNED NOT NULL,
  `base_currency_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `code`, `timezone`, `theme`, `hostname`, `logo`, `footer_logo`, `favicon`, `home_seo`, `is_maintenance_on`, `allowed_ips`, `root_category_id`, `default_locale_id`, `base_currency_id`, `created_at`, `updated_at`) VALUES
(1, 'default', NULL, 'enclaves', 'http://192.168.15.214/bagisto/public', 'channel/1/go2ZqYdR4iiC8atVlRjiJphaAnH5hq6iFE6S1QdQ.png', 'channel/1/I2BzyMomnjHOO5CVXZai7eQBcgWXD2oGeQ4RD47w.png', 'channel/1/MxLOcNyHSByHUahRgdpDrdPDqOvtLhjWKWraTvFK.png', NULL, 0, '', 1, 1, 1, '2024-04-19 10:18:24', '2024-05-23 10:55:18'),
(3, 'demo', NULL, 'enclaves', '', 'channel/3/JnY917Oq13WyKV1TsdJW8RJpTYOh4xNd3oggqPDo.webp', NULL, NULL, NULL, 0, '', 1, 1, 1, '2024-05-16 12:36:12', '2024-05-16 12:36:12'),
(4, 'demo1', NULL, 'enclaves', '', 'channel/4/a8HuuJv0vGmcLRLNE4EHxkhhFRjYSvCMYnYErp2L.webp', 'channel/4/obwsnRKcNpItjCfBm05s7IS65QNdNWr6PEtZt0NS.png', 'channel/4/41LnsPAIDgiWmPkKwxRAwHr4ri7X8CeqkHuM2SDQ.webp', NULL, 0, '', 1, 1, 1, '2024-05-16 12:37:23', '2024-05-16 12:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `channel_currencies`
--

CREATE TABLE `channel_currencies` (
  `channel_id` int UNSIGNED NOT NULL,
  `currency_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `channel_currencies`
--

INSERT INTO `channel_currencies` (`channel_id`, `currency_id`) VALUES
(1, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_inventory_sources`
--

CREATE TABLE `channel_inventory_sources` (
  `channel_id` int UNSIGNED NOT NULL,
  `inventory_source_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `channel_inventory_sources`
--

INSERT INTO `channel_inventory_sources` (`channel_id`, `inventory_source_id`) VALUES
(1, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_locales`
--

CREATE TABLE `channel_locales` (
  `channel_id` int UNSIGNED NOT NULL,
  `locale_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `channel_locales`
--

INSERT INTO `channel_locales` (`channel_id`, `locale_id`) VALUES
(1, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `channel_translations`
--

CREATE TABLE `channel_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `maintenance_mode_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `home_seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `channel_translations`
--

INSERT INTO `channel_translations` (`id`, `channel_id`, `locale`, `name`, `description`, `maintenance_mode_text`, `home_seo`, `created_at`, `updated_at`) VALUES
(8, 1, 'en', 'Default', NULL, '', '{\"meta_title\": \"Demo store\", \"meta_keywords\": \"Demo store meta keyword\", \"meta_description\": \"Demo store meta description\"}', NULL, '2024-05-23 10:55:18'),
(10, 3, 'en', 'demo', 'demo', '', '{\"meta_title\": \"demo\", \"meta_keywords\": \"demo\", \"meta_description\": \"demo\"}', '2024-05-16 12:36:12', '2024-05-16 12:36:12'),
(11, 4, 'en', 'demo1', 'demo1', '', '{\"meta_title\": \"demo1\", \"meta_keywords\": \"demo1\", \"meta_description\": \"demo1\"}', '2024-05-16 12:37:23', '2024-05-16 12:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int UNSIGNED NOT NULL,
  `layout` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `layout`, `created_at`, `updated_at`) VALUES
(1, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(2, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(3, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(4, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(5, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(6, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(7, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(8, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(9, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(10, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(11, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_channels`
--

CREATE TABLE `cms_page_channels` (
  `cms_page_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `cms_page_translations`
--

CREATE TABLE `cms_page_translations` (
  `id` int UNSIGNED NOT NULL,
  `page_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `html_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_page_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cms_page_translations`
--

INSERT INTO `cms_page_translations` (`id`, `page_title`, `url_key`, `html_content`, `meta_title`, `meta_description`, `meta_keywords`, `locale`, `cms_page_id`) VALUES
(34, 'About Us', 'about-us', '<div class=\"static-container\"><div class=\"mb-5\">About Us Page Content</div></div>', 'about us', '', 'aboutus', 'en', 1),
(35, 'Return Policy', 'return-policy', '<div class=\"static-container\"><div class=\"mb-5\">Return Policy Page Content</div></div>', 'return policy', '', 'return, policy', 'en', 2),
(36, 'Refund Policy', 'refund-policy', '<div class=\"static-container\"><div class=\"mb-5\">Refund Policy Page Content</div></div>', 'Refund policy', '', 'refund, policy', 'en', 3),
(37, 'Terms & Conditions', 'terms-conditions', '<div class=\"static-container\"><div class=\"mb-5\">Terms & Conditions Page Content</div></div>', 'Terms & Conditions', '', 'term, conditions', 'en', 4),
(38, 'Terms of Use', 'terms-of-use', '<div class=\"static-container\"><div class=\"mb-5\">Terms of Use Page Content</div></div>', 'Terms of use', '', 'term, use', 'en', 5),
(39, 'Contact Us', 'contact-us', '<div class=\"static-container\"><div class=\"mb-5\">Contact Us Page Content</div></div>', 'Contact Us', '', 'contact, us', 'en', 6),
(40, 'Customer Service', 'customer-service', '<div class=\"static-container\"><div class=\"mb-5\">Customer Service Page Content</div></div>', 'Customer Service', '', 'customer, service', 'en', 7),
(41, 'What\'s New', 'whats-new', '<div class=\"static-container\"><div class=\"mb-5\">What\'s New page content</div></div>', 'What\'s New', '', 'new', 'en', 8),
(42, 'Payment Policy', 'payment-policy', '<div class=\"static-container\"><div class=\"mb-5\">Payment Policy Page Content</div></div>', 'Payment Policy', '', 'payment, policy', 'en', 9),
(43, 'Shipping Policy', 'shipping-policy', '<div class=\"static-container\"><div class=\"mb-5\">Shipping Policy Page Content</div></div>', 'Shipping Policy', '', 'shipping, policy', 'en', 10),
(44, 'Privacy Policy', 'privacy-policy', '<div class=\"static-container\"><div class=\"mb-5\">Privacy Policy Page Content</div></div>', 'Privacy Policy', '', 'privacy, policy', 'en', 11);

-- --------------------------------------------------------

--
-- Table structure for table `compare_items`
--

CREATE TABLE `compare_items` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `core_config`
--

CREATE TABLE `core_config` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `core_config`
--

INSERT INTO `core_config` (`id`, `code`, `value`, `channel_code`, `locale_code`, `created_at`, `updated_at`) VALUES
(1, 'catalog.products.guest_checkout.allow_guest_checkout', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(2, 'emails.general.notifications.emails.general.notifications.verification', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(3, 'emails.general.notifications.emails.general.notifications.registration', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(4, 'emails.general.notifications.emails.general.notifications.customer', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(5, 'emails.general.notifications.emails.general.notifications.new_order', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(6, 'emails.general.notifications.emails.general.notifications.new_admin', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(7, 'emails.general.notifications.emails.general.notifications.new_invoice', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(8, 'emails.general.notifications.emails.general.notifications.new_refund', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(9, 'emails.general.notifications.emails.general.notifications.new_shipment', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(10, 'emails.general.notifications.emails.general.notifications.new_inventory_source', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(11, 'emails.general.notifications.emails.general.notifications.cancel_order', '1', NULL, NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(72, 'customer.settings.social_login.enable_facebook', '1', 'default', NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(73, 'customer.settings.social_login.enable_twitter', '1', 'default', NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(74, 'customer.settings.social_login.enable_google', '1', 'default', NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(75, 'customer.settings.social_login.enable_linkedin', '1', 'default', NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(76, 'customer.settings.social_login.enable_github', '1', 'default', NULL, '2024-04-19 10:18:24', '2024-04-19 10:18:24'),
(77, 'general.content.shop.compare_option', '0', 'default', 'en', '2024-04-24 06:19:26', '2024-04-24 06:19:26'),
(78, 'general.content.shop.wishlist_option', '0', 'default', 'en', '2024-04-24 06:19:26', '2024-04-24 06:19:26'),
(79, 'general.content.shop.image_search', '0', 'default', 'en', '2024-04-24 06:19:26', '2024-04-24 06:19:26'),
(80, 'general.content.custom_scripts.custom_css', '', 'default', NULL, '2024-04-24 06:19:26', '2024-04-24 06:19:26'),
(81, 'general.content.custom_scripts.custom_javascript', '', 'default', NULL, '2024-04-24 06:19:26', '2024-04-24 06:19:26'),
(82, 'general.design.admin_logo.logo_image', 'configuration/DYRwSWoP0J8yZ7Ple76SWRWr8zgHvJfk0LwufoLT.png', NULL, NULL, '2024-04-24 10:53:48', '2024-04-24 10:53:48'),
(83, 'general.design.admin_logo.favicon', 'configuration/GN1UmvtwdWcmJNAoD1Q8c4VOjIOIpEeh07hRU5Wv.png', NULL, NULL, '2024-04-24 10:53:48', '2024-04-24 10:53:48'),
(84, 'catalog.products.product_view_page.no_of_related_products', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(85, 'catalog.products.product_view_page.no_of_up_sells_products', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(86, 'catalog.products.cart_view_page.no_of_cross_sells_products', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(87, 'catalog.products.storefront.search_mode', 'database', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(88, 'catalog.products.storefront.mode', 'grid', 'default', NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(89, 'catalog.products.storefront.products_per_page', '6,10,15', 'default', NULL, '2024-04-24 13:30:12', '2024-05-22 09:33:41'),
(90, 'catalog.products.storefront.sort_by', 'name-asc', 'default', NULL, '2024-04-24 13:30:12', '2024-05-22 09:41:34'),
(91, 'catalog.products.storefront.buy_now_button_display', '1', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(92, 'catalog.products.cache_small_image.width', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(93, 'catalog.products.cache_small_image.height', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(94, 'catalog.products.cache_medium_image.width', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(95, 'catalog.products.cache_medium_image.height', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(96, 'catalog.products.cache_large_image.width', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(97, 'catalog.products.cache_large_image.height', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(98, 'catalog.products.review.guest_review', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(99, 'catalog.products.attribute.image_attribute_upload_size', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(100, 'catalog.products.attribute.file_attribute_upload_size', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(101, 'catalog.products.social_share.enabled', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(102, 'catalog.products.social_share.facebook', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(103, 'catalog.products.social_share.twitter', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(104, 'catalog.products.social_share.pinterest', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(105, 'catalog.products.social_share.whatsapp', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(106, 'catalog.products.social_share.linkedin', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(107, 'catalog.products.social_share.email', '0', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(108, 'catalog.products.social_share.share_message', '', NULL, NULL, '2024-04-24 13:30:12', '2024-04-24 13:30:12'),
(109, 'blog.settings.general.blog::app.config.settings.general.title', '1', 'default', NULL, '2024-05-02 12:31:03', '2024-05-02 12:34:17'),
(110, 'blog.settings.general.status', '1', 'default', NULL, '2024-05-02 12:47:52', '2024-05-08 08:34:27'),
(111, 'bulkUpload.settings.general.status', '1', 'default', NULL, '2024-05-02 12:54:28', '2024-05-02 13:04:23'),
(112, '_token', 'rwmPOaQnpFtQceZYdH7pWDh1bmvEzEUBTkkOVNJD', NULL, NULL, '2024-05-02 13:07:19', '2024-05-07 09:42:55'),
(113, 'blog_post_per_page', '', NULL, NULL, '2024-05-02 13:07:19', '2024-05-07 09:42:55'),
(114, 'blog_post_maximum_related', '0', NULL, NULL, '2024-05-02 13:07:19', '2024-05-02 14:01:52'),
(115, 'blog_seo_meta_title', 'fggfasdasd', NULL, NULL, '2024-05-02 13:07:19', '2024-05-02 13:10:51'),
(116, 'blog_seo_meta_keywords', 'dsfdsasdasd', NULL, NULL, '2024-05-02 13:07:19', '2024-05-02 13:10:53'),
(117, 'blog_seo_meta_description', 'asdasd', NULL, NULL, '2024-05-02 13:07:19', '2024-05-02 13:07:19'),
(118, 'sales.invoice_settings.invoice_number.invoice_number_prefix', '', 'default', 'en', '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(119, 'sales.invoice_settings.invoice_number.invoice_number_length', '', 'default', 'en', '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(120, 'sales.invoice_settings.invoice_number.invoice_number_suffix', '', 'default', 'en', '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(121, 'sales.invoice_settings.invoice_number.invoice_number_generator_class', '', 'default', 'en', '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(122, 'sales.invoice_settings.payment_terms.due_duration', '', 'default', NULL, '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(123, 'sales.invoice_settings.invoice_reminders.reminders_limit', '', 'default', NULL, '2024-05-09 08:06:41', '2024-05-09 08:06:41'),
(124, 'sales.invoice_settings.invoice_slip_design.logo', 'configuration/Ki9F7jGzOr8hyNo5XgUiEZFOjGwU96pkwQJydD39.png', 'default', NULL, '2024-05-09 08:06:41', '2024-05-09 08:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua & Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AC', 'Ascension Island'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia & Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BR', 'Brazil'),
(32, 'IO', 'British Indian Ocean Territory'),
(33, 'VG', 'British Virgin Islands'),
(34, 'BN', 'Brunei'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'IC', 'Canary Islands'),
(42, 'CV', 'Cape Verde'),
(43, 'BQ', 'Caribbean Netherlands'),
(44, 'KY', 'Cayman Islands'),
(45, 'CF', 'Central African Republic'),
(46, 'EA', 'Ceuta & Melilla'),
(47, 'TD', 'Chad'),
(48, 'CL', 'Chile'),
(49, 'CN', 'China'),
(50, 'CX', 'Christmas Island'),
(51, 'CC', 'Cocos (Keeling) Islands'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoros'),
(54, 'CG', 'Congo - Brazzaville'),
(55, 'CD', 'Congo - Kinshasa'),
(56, 'CK', 'Cook Islands'),
(57, 'CR', 'Costa Rica'),
(58, 'CI', 'Côte d’Ivoire'),
(59, 'HR', 'Croatia'),
(60, 'CU', 'Cuba'),
(61, 'CW', 'Curaçao'),
(62, 'CY', 'Cyprus'),
(63, 'CZ', 'Czechia'),
(64, 'DK', 'Denmark'),
(65, 'DG', 'Diego Garcia'),
(66, 'DJ', 'Djibouti'),
(67, 'DM', 'Dominica'),
(68, 'DO', 'Dominican Republic'),
(69, 'EC', 'Ecuador'),
(70, 'EG', 'Egypt'),
(71, 'SV', 'El Salvador'),
(72, 'GQ', 'Equatorial Guinea'),
(73, 'ER', 'Eritrea'),
(74, 'EE', 'Estonia'),
(75, 'ET', 'Ethiopia'),
(76, 'EZ', 'Eurozone'),
(77, 'FK', 'Falkland Islands'),
(78, 'FO', 'Faroe Islands'),
(79, 'FJ', 'Fiji'),
(80, 'FI', 'Finland'),
(81, 'FR', 'France'),
(82, 'GF', 'French Guiana'),
(83, 'PF', 'French Polynesia'),
(84, 'TF', 'French Southern Territories'),
(85, 'GA', 'Gabon'),
(86, 'GM', 'Gambia'),
(87, 'GE', 'Georgia'),
(88, 'DE', 'Germany'),
(89, 'GH', 'Ghana'),
(90, 'GI', 'Gibraltar'),
(91, 'GR', 'Greece'),
(92, 'GL', 'Greenland'),
(93, 'GD', 'Grenada'),
(94, 'GP', 'Guadeloupe'),
(95, 'GU', 'Guam'),
(96, 'GT', 'Guatemala'),
(97, 'GG', 'Guernsey'),
(98, 'GN', 'Guinea'),
(99, 'GW', 'Guinea-Bissau'),
(100, 'GY', 'Guyana'),
(101, 'HT', 'Haiti'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong SAR China'),
(104, 'HU', 'Hungary'),
(105, 'IS', 'Iceland'),
(106, 'IN', 'India'),
(107, 'ID', 'Indonesia'),
(108, 'IR', 'Iran'),
(109, 'IQ', 'Iraq'),
(110, 'IE', 'Ireland'),
(111, 'IM', 'Isle of Man'),
(112, 'IL', 'Israel'),
(113, 'IT', 'Italy'),
(114, 'JM', 'Jamaica'),
(115, 'JP', 'Japan'),
(116, 'JE', 'Jersey'),
(117, 'JO', 'Jordan'),
(118, 'KZ', 'Kazakhstan'),
(119, 'KE', 'Kenya'),
(120, 'KI', 'Kiribati'),
(121, 'XK', 'Kosovo'),
(122, 'KW', 'Kuwait'),
(123, 'KG', 'Kyrgyzstan'),
(124, 'LA', 'Laos'),
(125, 'LV', 'Latvia'),
(126, 'LB', 'Lebanon'),
(127, 'LS', 'Lesotho'),
(128, 'LR', 'Liberia'),
(129, 'LY', 'Libya'),
(130, 'LI', 'Liechtenstein'),
(131, 'LT', 'Lithuania'),
(132, 'LU', 'Luxembourg'),
(133, 'MO', 'Macau SAR China'),
(134, 'MK', 'Macedonia'),
(135, 'MG', 'Madagascar'),
(136, 'MW', 'Malawi'),
(137, 'MY', 'Malaysia'),
(138, 'MV', 'Maldives'),
(139, 'ML', 'Mali'),
(140, 'MT', 'Malta'),
(141, 'MH', 'Marshall Islands'),
(142, 'MQ', 'Martinique'),
(143, 'MR', 'Mauritania'),
(144, 'MU', 'Mauritius'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'Mexico'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldova'),
(149, 'MC', 'Monaco'),
(150, 'MN', 'Mongolia'),
(151, 'ME', 'Montenegro'),
(152, 'MS', 'Montserrat'),
(153, 'MA', 'Morocco'),
(154, 'MZ', 'Mozambique'),
(155, 'MM', 'Myanmar (Burma)'),
(156, 'NA', 'Namibia'),
(157, 'NR', 'Nauru'),
(158, 'NP', 'Nepal'),
(159, 'NL', 'Netherlands'),
(160, 'NC', 'New Caledonia'),
(161, 'NZ', 'New Zealand'),
(162, 'NI', 'Nicaragua'),
(163, 'NE', 'Niger'),
(164, 'NG', 'Nigeria'),
(165, 'NU', 'Niue'),
(166, 'NF', 'Norfolk Island'),
(167, 'KP', 'North Korea'),
(168, 'MP', 'Northern Mariana Islands'),
(169, 'NO', 'Norway'),
(170, 'OM', 'Oman'),
(171, 'PK', 'Pakistan'),
(172, 'PW', 'Palau'),
(173, 'PS', 'Palestinian Territories'),
(174, 'PA', 'Panama'),
(175, 'PG', 'Papua New Guinea'),
(176, 'PY', 'Paraguay'),
(177, 'PE', 'Peru'),
(178, 'PH', 'Philippines'),
(179, 'PN', 'Pitcairn Islands'),
(180, 'PL', 'Poland'),
(181, 'PT', 'Portugal'),
(182, 'PR', 'Puerto Rico'),
(183, 'QA', 'Qatar'),
(184, 'RE', 'Réunion'),
(185, 'RO', 'Romania'),
(186, 'RU', 'Russia'),
(187, 'RW', 'Rwanda'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'São Tomé & Príncipe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SX', 'Sint Maarten'),
(198, 'SK', 'Slovakia'),
(199, 'SI', 'Slovenia'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia & South Sandwich Islands'),
(204, 'KR', 'South Korea'),
(205, 'SS', 'South Sudan'),
(206, 'ES', 'Spain'),
(207, 'LK', 'Sri Lanka'),
(208, 'BL', 'St. Barthélemy'),
(209, 'SH', 'St. Helena'),
(210, 'KN', 'St. Kitts & Nevis'),
(211, 'LC', 'St. Lucia'),
(212, 'MF', 'St. Martin'),
(213, 'PM', 'St. Pierre & Miquelon'),
(214, 'VC', 'St. Vincent & Grenadines'),
(215, 'SD', 'Sudan'),
(216, 'SR', 'Suriname'),
(217, 'SJ', 'Svalbard & Jan Mayen'),
(218, 'SZ', 'Swaziland'),
(219, 'SE', 'Sweden'),
(220, 'CH', 'Switzerland'),
(221, 'SY', 'Syria'),
(222, 'TW', 'Taiwan'),
(223, 'TJ', 'Tajikistan'),
(224, 'TZ', 'Tanzania'),
(225, 'TH', 'Thailand'),
(226, 'TL', 'Timor-Leste'),
(227, 'TG', 'Togo'),
(228, 'TK', 'Tokelau'),
(229, 'TO', 'Tonga'),
(230, 'TT', 'Trinidad & Tobago'),
(231, 'TA', 'Tristan da Cunha'),
(232, 'TN', 'Tunisia'),
(233, 'TR', 'Turkey'),
(234, 'TM', 'Turkmenistan'),
(235, 'TC', 'Turks & Caicos Islands'),
(236, 'TV', 'Tuvalu'),
(237, 'UM', 'U.S. Outlying Islands'),
(238, 'VI', 'U.S. Virgin Islands'),
(239, 'UG', 'Uganda'),
(240, 'UA', 'Ukraine'),
(241, 'AE', 'United Arab Emirates'),
(242, 'GB', 'United Kingdom'),
(243, 'UN', 'United Nations'),
(244, 'US', 'United States'),
(245, 'UY', 'Uruguay'),
(246, 'UZ', 'Uzbekistan'),
(247, 'VU', 'Vanuatu'),
(248, 'VA', 'Vatican City'),
(249, 'VE', 'Venezuela'),
(250, 'VN', 'Vietnam'),
(251, 'WF', 'Wallis & Futuna'),
(252, 'EH', 'Western Sahara'),
(253, 'YE', 'Yemen'),
(254, 'ZM', 'Zambia'),
(255, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `country_states`
--

CREATE TABLE `country_states` (
  `id` int UNSIGNED NOT NULL,
  `country_id` int UNSIGNED DEFAULT NULL,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `country_states`
--

INSERT INTO `country_states` (`id`, `country_id`, `country_code`, `code`, `default_name`) VALUES
(1, 244, 'US', 'AL', 'Alabama'),
(2, 244, 'US', 'AK', 'Alaska'),
(3, 244, 'US', 'AS', 'American Samoa'),
(4, 244, 'US', 'AZ', 'Arizona'),
(5, 244, 'US', 'AR', 'Arkansas'),
(6, 244, 'US', 'AE', 'Armed Forces Africa'),
(7, 244, 'US', 'AA', 'Armed Forces Americas'),
(8, 244, 'US', 'AE', 'Armed Forces Canada'),
(9, 244, 'US', 'AE', 'Armed Forces Europe'),
(10, 244, 'US', 'AE', 'Armed Forces Middle East'),
(11, 244, 'US', 'AP', 'Armed Forces Pacific'),
(12, 244, 'US', 'CA', 'California'),
(13, 244, 'US', 'CO', 'Colorado'),
(14, 244, 'US', 'CT', 'Connecticut'),
(15, 244, 'US', 'DE', 'Delaware'),
(16, 244, 'US', 'DC', 'District of Columbia'),
(17, 244, 'US', 'FM', 'Federated States Of Micronesia'),
(18, 244, 'US', 'FL', 'Florida'),
(19, 244, 'US', 'GA', 'Georgia'),
(20, 244, 'US', 'GU', 'Guam'),
(21, 244, 'US', 'HI', 'Hawaii'),
(22, 244, 'US', 'ID', 'Idaho'),
(23, 244, 'US', 'IL', 'Illinois'),
(24, 244, 'US', 'IN', 'Indiana'),
(25, 244, 'US', 'IA', 'Iowa'),
(26, 244, 'US', 'KS', 'Kansas'),
(27, 244, 'US', 'KY', 'Kentucky'),
(28, 244, 'US', 'LA', 'Louisiana'),
(29, 244, 'US', 'ME', 'Maine'),
(30, 244, 'US', 'MH', 'Marshall Islands'),
(31, 244, 'US', 'MD', 'Maryland'),
(32, 244, 'US', 'MA', 'Massachusetts'),
(33, 244, 'US', 'MI', 'Michigan'),
(34, 244, 'US', 'MN', 'Minnesota'),
(35, 244, 'US', 'MS', 'Mississippi'),
(36, 244, 'US', 'MO', 'Missouri'),
(37, 244, 'US', 'MT', 'Montana'),
(38, 244, 'US', 'NE', 'Nebraska'),
(39, 244, 'US', 'NV', 'Nevada'),
(40, 244, 'US', 'NH', 'New Hampshire'),
(41, 244, 'US', 'NJ', 'New Jersey'),
(42, 244, 'US', 'NM', 'New Mexico'),
(43, 244, 'US', 'NY', 'New York'),
(44, 244, 'US', 'NC', 'North Carolina'),
(45, 244, 'US', 'ND', 'North Dakota'),
(46, 244, 'US', 'MP', 'Northern Mariana Islands'),
(47, 244, 'US', 'OH', 'Ohio'),
(48, 244, 'US', 'OK', 'Oklahoma'),
(49, 244, 'US', 'OR', 'Oregon'),
(50, 244, 'US', 'PW', 'Palau'),
(51, 244, 'US', 'PA', 'Pennsylvania'),
(52, 244, 'US', 'PR', 'Puerto Rico'),
(53, 244, 'US', 'RI', 'Rhode Island'),
(54, 244, 'US', 'SC', 'South Carolina'),
(55, 244, 'US', 'SD', 'South Dakota'),
(56, 244, 'US', 'TN', 'Tennessee'),
(57, 244, 'US', 'TX', 'Texas'),
(58, 244, 'US', 'UT', 'Utah'),
(59, 244, 'US', 'VT', 'Vermont'),
(60, 244, 'US', 'VI', 'Virgin Islands'),
(61, 244, 'US', 'VA', 'Virginia'),
(62, 244, 'US', 'WA', 'Washington'),
(63, 244, 'US', 'WV', 'West Virginia'),
(64, 244, 'US', 'WI', 'Wisconsin'),
(65, 244, 'US', 'WY', 'Wyoming'),
(66, 40, 'CA', 'AB', 'Alberta'),
(67, 40, 'CA', 'BC', 'British Columbia'),
(68, 40, 'CA', 'MB', 'Manitoba'),
(69, 40, 'CA', 'NL', 'Newfoundland and Labrador'),
(70, 40, 'CA', 'NB', 'New Brunswick'),
(71, 40, 'CA', 'NS', 'Nova Scotia'),
(72, 40, 'CA', 'NT', 'Northwest Territories'),
(73, 40, 'CA', 'NU', 'Nunavut'),
(74, 40, 'CA', 'ON', 'Ontario'),
(75, 40, 'CA', 'PE', 'Prince Edward Island'),
(76, 40, 'CA', 'QC', 'Quebec'),
(77, 40, 'CA', 'SK', 'Saskatchewan'),
(78, 40, 'CA', 'YT', 'Yukon Territory'),
(79, 88, 'DE', 'NDS', 'Niedersachsen'),
(80, 88, 'DE', 'BAW', 'Baden-Württemberg'),
(81, 88, 'DE', 'BAY', 'Bayern'),
(82, 88, 'DE', 'BER', 'Berlin'),
(83, 88, 'DE', 'BRG', 'Brandenburg'),
(84, 88, 'DE', 'BRE', 'Bremen'),
(85, 88, 'DE', 'HAM', 'Hamburg'),
(86, 88, 'DE', 'HES', 'Hessen'),
(87, 88, 'DE', 'MEC', 'Mecklenburg-Vorpommern'),
(88, 88, 'DE', 'NRW', 'Nordrhein-Westfalen'),
(89, 88, 'DE', 'RHE', 'Rheinland-Pfalz'),
(90, 88, 'DE', 'SAR', 'Saarland'),
(91, 88, 'DE', 'SAS', 'Sachsen'),
(92, 88, 'DE', 'SAC', 'Sachsen-Anhalt'),
(93, 88, 'DE', 'SCN', 'Schleswig-Holstein'),
(94, 88, 'DE', 'THE', 'Thüringen'),
(95, 16, 'AT', 'WI', 'Wien'),
(96, 16, 'AT', 'NO', 'Niederösterreich'),
(97, 16, 'AT', 'OO', 'Oberösterreich'),
(98, 16, 'AT', 'SB', 'Salzburg'),
(99, 16, 'AT', 'KN', 'Kärnten'),
(100, 16, 'AT', 'ST', 'Steiermark'),
(101, 16, 'AT', 'TI', 'Tirol'),
(102, 16, 'AT', 'BL', 'Burgenland'),
(103, 16, 'AT', 'VB', 'Vorarlberg'),
(104, 220, 'CH', 'AG', 'Aargau'),
(105, 220, 'CH', 'AI', 'Appenzell Innerrhoden'),
(106, 220, 'CH', 'AR', 'Appenzell Ausserrhoden'),
(107, 220, 'CH', 'BE', 'Bern'),
(108, 220, 'CH', 'BL', 'Basel-Landschaft'),
(109, 220, 'CH', 'BS', 'Basel-Stadt'),
(110, 220, 'CH', 'FR', 'Freiburg'),
(111, 220, 'CH', 'GE', 'Genf'),
(112, 220, 'CH', 'GL', 'Glarus'),
(113, 220, 'CH', 'GR', 'Graubünden'),
(114, 220, 'CH', 'JU', 'Jura'),
(115, 220, 'CH', 'LU', 'Luzern'),
(116, 220, 'CH', 'NE', 'Neuenburg'),
(117, 220, 'CH', 'NW', 'Nidwalden'),
(118, 220, 'CH', 'OW', 'Obwalden'),
(119, 220, 'CH', 'SG', 'St. Gallen'),
(120, 220, 'CH', 'SH', 'Schaffhausen'),
(121, 220, 'CH', 'SO', 'Solothurn'),
(122, 220, 'CH', 'SZ', 'Schwyz'),
(123, 220, 'CH', 'TG', 'Thurgau'),
(124, 220, 'CH', 'TI', 'Tessin'),
(125, 220, 'CH', 'UR', 'Uri'),
(126, 220, 'CH', 'VD', 'Waadt'),
(127, 220, 'CH', 'VS', 'Wallis'),
(128, 220, 'CH', 'ZG', 'Zug'),
(129, 220, 'CH', 'ZH', 'Zürich'),
(130, 206, 'ES', 'A Coruсa', 'A Coruña'),
(131, 206, 'ES', 'Alava', 'Alava'),
(132, 206, 'ES', 'Albacete', 'Albacete'),
(133, 206, 'ES', 'Alicante', 'Alicante'),
(134, 206, 'ES', 'Almeria', 'Almeria'),
(135, 206, 'ES', 'Asturias', 'Asturias'),
(136, 206, 'ES', 'Avila', 'Avila'),
(137, 206, 'ES', 'Badajoz', 'Badajoz'),
(138, 206, 'ES', 'Baleares', 'Baleares'),
(139, 206, 'ES', 'Barcelona', 'Barcelona'),
(140, 206, 'ES', 'Burgos', 'Burgos'),
(141, 206, 'ES', 'Caceres', 'Caceres'),
(142, 206, 'ES', 'Cadiz', 'Cadiz'),
(143, 206, 'ES', 'Cantabria', 'Cantabria'),
(144, 206, 'ES', 'Castellon', 'Castellon'),
(145, 206, 'ES', 'Ceuta', 'Ceuta'),
(146, 206, 'ES', 'Ciudad Real', 'Ciudad Real'),
(147, 206, 'ES', 'Cordoba', 'Cordoba'),
(148, 206, 'ES', 'Cuenca', 'Cuenca'),
(149, 206, 'ES', 'Girona', 'Girona'),
(150, 206, 'ES', 'Granada', 'Granada'),
(151, 206, 'ES', 'Guadalajara', 'Guadalajara'),
(152, 206, 'ES', 'Guipuzcoa', 'Guipuzcoa'),
(153, 206, 'ES', 'Huelva', 'Huelva'),
(154, 206, 'ES', 'Huesca', 'Huesca'),
(155, 206, 'ES', 'Jaen', 'Jaen'),
(156, 206, 'ES', 'La Rioja', 'La Rioja'),
(157, 206, 'ES', 'Las Palmas', 'Las Palmas'),
(158, 206, 'ES', 'Leon', 'Leon'),
(159, 206, 'ES', 'Lleida', 'Lleida'),
(160, 206, 'ES', 'Lugo', 'Lugo'),
(161, 206, 'ES', 'Madrid', 'Madrid'),
(162, 206, 'ES', 'Malaga', 'Malaga'),
(163, 206, 'ES', 'Melilla', 'Melilla'),
(164, 206, 'ES', 'Murcia', 'Murcia'),
(165, 206, 'ES', 'Navarra', 'Navarra'),
(166, 206, 'ES', 'Ourense', 'Ourense'),
(167, 206, 'ES', 'Palencia', 'Palencia'),
(168, 206, 'ES', 'Pontevedra', 'Pontevedra'),
(169, 206, 'ES', 'Salamanca', 'Salamanca'),
(170, 206, 'ES', 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 206, 'ES', 'Segovia', 'Segovia'),
(172, 206, 'ES', 'Sevilla', 'Sevilla'),
(173, 206, 'ES', 'Soria', 'Soria'),
(174, 206, 'ES', 'Tarragona', 'Tarragona'),
(175, 206, 'ES', 'Teruel', 'Teruel'),
(176, 206, 'ES', 'Toledo', 'Toledo'),
(177, 206, 'ES', 'Valencia', 'Valencia'),
(178, 206, 'ES', 'Valladolid', 'Valladolid'),
(179, 206, 'ES', 'Vizcaya', 'Vizcaya'),
(180, 206, 'ES', 'Zamora', 'Zamora'),
(181, 206, 'ES', 'Zaragoza', 'Zaragoza'),
(182, 81, 'FR', '1', 'Ain'),
(183, 81, 'FR', '2', 'Aisne'),
(184, 81, 'FR', '3', 'Allier'),
(185, 81, 'FR', '4', 'Alpes-de-Haute-Provence'),
(186, 81, 'FR', '5', 'Hautes-Alpes'),
(187, 81, 'FR', '6', 'Alpes-Maritimes'),
(188, 81, 'FR', '7', 'Ardèche'),
(189, 81, 'FR', '8', 'Ardennes'),
(190, 81, 'FR', '9', 'Ariège'),
(191, 81, 'FR', '10', 'Aube'),
(192, 81, 'FR', '11', 'Aude'),
(193, 81, 'FR', '12', 'Aveyron'),
(194, 81, 'FR', '13', 'Bouches-du-Rhône'),
(195, 81, 'FR', '14', 'Calvados'),
(196, 81, 'FR', '15', 'Cantal'),
(197, 81, 'FR', '16', 'Charente'),
(198, 81, 'FR', '17', 'Charente-Maritime'),
(199, 81, 'FR', '18', 'Cher'),
(200, 81, 'FR', '19', 'Corrèze'),
(201, 81, 'FR', '2A', 'Corse-du-Sud'),
(202, 81, 'FR', '2B', 'Haute-Corse'),
(203, 81, 'FR', '21', 'Côte-d\'Or'),
(204, 81, 'FR', '22', 'Côtes-d\'Armor'),
(205, 81, 'FR', '23', 'Creuse'),
(206, 81, 'FR', '24', 'Dordogne'),
(207, 81, 'FR', '25', 'Doubs'),
(208, 81, 'FR', '26', 'Drôme'),
(209, 81, 'FR', '27', 'Eure'),
(210, 81, 'FR', '28', 'Eure-et-Loir'),
(211, 81, 'FR', '29', 'Finistère'),
(212, 81, 'FR', '30', 'Gard'),
(213, 81, 'FR', '31', 'Haute-Garonne'),
(214, 81, 'FR', '32', 'Gers'),
(215, 81, 'FR', '33', 'Gironde'),
(216, 81, 'FR', '34', 'Hérault'),
(217, 81, 'FR', '35', 'Ille-et-Vilaine'),
(218, 81, 'FR', '36', 'Indre'),
(219, 81, 'FR', '37', 'Indre-et-Loire'),
(220, 81, 'FR', '38', 'Isère'),
(221, 81, 'FR', '39', 'Jura'),
(222, 81, 'FR', '40', 'Landes'),
(223, 81, 'FR', '41', 'Loir-et-Cher'),
(224, 81, 'FR', '42', 'Loire'),
(225, 81, 'FR', '43', 'Haute-Loire'),
(226, 81, 'FR', '44', 'Loire-Atlantique'),
(227, 81, 'FR', '45', 'Loiret'),
(228, 81, 'FR', '46', 'Lot'),
(229, 81, 'FR', '47', 'Lot-et-Garonne'),
(230, 81, 'FR', '48', 'Lozère'),
(231, 81, 'FR', '49', 'Maine-et-Loire'),
(232, 81, 'FR', '50', 'Manche'),
(233, 81, 'FR', '51', 'Marne'),
(234, 81, 'FR', '52', 'Haute-Marne'),
(235, 81, 'FR', '53', 'Mayenne'),
(236, 81, 'FR', '54', 'Meurthe-et-Moselle'),
(237, 81, 'FR', '55', 'Meuse'),
(238, 81, 'FR', '56', 'Morbihan'),
(239, 81, 'FR', '57', 'Moselle'),
(240, 81, 'FR', '58', 'Nièvre'),
(241, 81, 'FR', '59', 'Nord'),
(242, 81, 'FR', '60', 'Oise'),
(243, 81, 'FR', '61', 'Orne'),
(244, 81, 'FR', '62', 'Pas-de-Calais'),
(245, 81, 'FR', '63', 'Puy-de-Dôme'),
(246, 81, 'FR', '64', 'Pyrénées-Atlantiques'),
(247, 81, 'FR', '65', 'Hautes-Pyrénées'),
(248, 81, 'FR', '66', 'Pyrénées-Orientales'),
(249, 81, 'FR', '67', 'Bas-Rhin'),
(250, 81, 'FR', '68', 'Haut-Rhin'),
(251, 81, 'FR', '69', 'Rhône'),
(252, 81, 'FR', '70', 'Haute-Saône'),
(253, 81, 'FR', '71', 'Saône-et-Loire'),
(254, 81, 'FR', '72', 'Sarthe'),
(255, 81, 'FR', '73', 'Savoie'),
(256, 81, 'FR', '74', 'Haute-Savoie'),
(257, 81, 'FR', '75', 'Paris'),
(258, 81, 'FR', '76', 'Seine-Maritime'),
(259, 81, 'FR', '77', 'Seine-et-Marne'),
(260, 81, 'FR', '78', 'Yvelines'),
(261, 81, 'FR', '79', 'Deux-Sèvres'),
(262, 81, 'FR', '80', 'Somme'),
(263, 81, 'FR', '81', 'Tarn'),
(264, 81, 'FR', '82', 'Tarn-et-Garonne'),
(265, 81, 'FR', '83', 'Var'),
(266, 81, 'FR', '84', 'Vaucluse'),
(267, 81, 'FR', '85', 'Vendée'),
(268, 81, 'FR', '86', 'Vienne'),
(269, 81, 'FR', '87', 'Haute-Vienne'),
(270, 81, 'FR', '88', 'Vosges'),
(271, 81, 'FR', '89', 'Yonne'),
(272, 81, 'FR', '90', 'Territoire-de-Belfort'),
(273, 81, 'FR', '91', 'Essonne'),
(274, 81, 'FR', '92', 'Hauts-de-Seine'),
(275, 81, 'FR', '93', 'Seine-Saint-Denis'),
(276, 81, 'FR', '94', 'Val-de-Marne'),
(277, 81, 'FR', '95', 'Val-d\'Oise'),
(278, 185, 'RO', 'AB', 'Alba'),
(279, 185, 'RO', 'AR', 'Arad'),
(280, 185, 'RO', 'AG', 'Argeş'),
(281, 185, 'RO', 'BC', 'Bacău'),
(282, 185, 'RO', 'BH', 'Bihor'),
(283, 185, 'RO', 'BN', 'Bistriţa-Năsăud'),
(284, 185, 'RO', 'BT', 'Botoşani'),
(285, 185, 'RO', 'BV', 'Braşov'),
(286, 185, 'RO', 'BR', 'Brăila'),
(287, 185, 'RO', 'B', 'Bucureşti'),
(288, 185, 'RO', 'BZ', 'Buzău'),
(289, 185, 'RO', 'CS', 'Caraş-Severin'),
(290, 185, 'RO', 'CL', 'Călăraşi'),
(291, 185, 'RO', 'CJ', 'Cluj'),
(292, 185, 'RO', 'CT', 'Constanţa'),
(293, 185, 'RO', 'CV', 'Covasna'),
(294, 185, 'RO', 'DB', 'Dâmboviţa'),
(295, 185, 'RO', 'DJ', 'Dolj'),
(296, 185, 'RO', 'GL', 'Galaţi'),
(297, 185, 'RO', 'GR', 'Giurgiu'),
(298, 185, 'RO', 'GJ', 'Gorj'),
(299, 185, 'RO', 'HR', 'Harghita'),
(300, 185, 'RO', 'HD', 'Hunedoara'),
(301, 185, 'RO', 'IL', 'Ialomiţa'),
(302, 185, 'RO', 'IS', 'Iaşi'),
(303, 185, 'RO', 'IF', 'Ilfov'),
(304, 185, 'RO', 'MM', 'Maramureş'),
(305, 185, 'RO', 'MH', 'Mehedinţi'),
(306, 185, 'RO', 'MS', 'Mureş'),
(307, 185, 'RO', 'NT', 'Neamţ'),
(308, 185, 'RO', 'OT', 'Olt'),
(309, 185, 'RO', 'PH', 'Prahova'),
(310, 185, 'RO', 'SM', 'Satu-Mare'),
(311, 185, 'RO', 'SJ', 'Sălaj'),
(312, 185, 'RO', 'SB', 'Sibiu'),
(313, 185, 'RO', 'SV', 'Suceava'),
(314, 185, 'RO', 'TR', 'Teleorman'),
(315, 185, 'RO', 'TM', 'Timiş'),
(316, 185, 'RO', 'TL', 'Tulcea'),
(317, 185, 'RO', 'VS', 'Vaslui'),
(318, 185, 'RO', 'VL', 'Vâlcea'),
(319, 185, 'RO', 'VN', 'Vrancea'),
(320, 80, 'FI', 'Lappi', 'Lappi'),
(321, 80, 'FI', 'Pohjois-Pohjanmaa', 'Pohjois-Pohjanmaa'),
(322, 80, 'FI', 'Kainuu', 'Kainuu'),
(323, 80, 'FI', 'Pohjois-Karjala', 'Pohjois-Karjala'),
(324, 80, 'FI', 'Pohjois-Savo', 'Pohjois-Savo'),
(325, 80, 'FI', 'Etelä-Savo', 'Etelä-Savo'),
(326, 80, 'FI', 'Etelä-Pohjanmaa', 'Etelä-Pohjanmaa'),
(327, 80, 'FI', 'Pohjanmaa', 'Pohjanmaa'),
(328, 80, 'FI', 'Pirkanmaa', 'Pirkanmaa'),
(329, 80, 'FI', 'Satakunta', 'Satakunta'),
(330, 80, 'FI', 'Keski-Pohjanmaa', 'Keski-Pohjanmaa'),
(331, 80, 'FI', 'Keski-Suomi', 'Keski-Suomi'),
(332, 80, 'FI', 'Varsinais-Suomi', 'Varsinais-Suomi'),
(333, 80, 'FI', 'Etelä-Karjala', 'Etelä-Karjala'),
(334, 80, 'FI', 'Päijät-Häme', 'Päijät-Häme'),
(335, 80, 'FI', 'Kanta-Häme', 'Kanta-Häme'),
(336, 80, 'FI', 'Uusimaa', 'Uusimaa'),
(337, 80, 'FI', 'Itä-Uusimaa', 'Itä-Uusimaa'),
(338, 80, 'FI', 'Kymenlaakso', 'Kymenlaakso'),
(339, 80, 'FI', 'Ahvenanmaa', 'Ahvenanmaa'),
(340, 74, 'EE', 'EE-37', 'Harjumaa'),
(341, 74, 'EE', 'EE-39', 'Hiiumaa'),
(342, 74, 'EE', 'EE-44', 'Ida-Virumaa'),
(343, 74, 'EE', 'EE-49', 'Jõgevamaa'),
(344, 74, 'EE', 'EE-51', 'Järvamaa'),
(345, 74, 'EE', 'EE-57', 'Läänemaa'),
(346, 74, 'EE', 'EE-59', 'Lääne-Virumaa'),
(347, 74, 'EE', 'EE-65', 'Põlvamaa'),
(348, 74, 'EE', 'EE-67', 'Pärnumaa'),
(349, 74, 'EE', 'EE-70', 'Raplamaa'),
(350, 74, 'EE', 'EE-74', 'Saaremaa'),
(351, 74, 'EE', 'EE-78', 'Tartumaa'),
(352, 74, 'EE', 'EE-82', 'Valgamaa'),
(353, 74, 'EE', 'EE-84', 'Viljandimaa'),
(354, 74, 'EE', 'EE-86', 'Võrumaa'),
(355, 125, 'LV', 'LV-DGV', 'Daugavpils'),
(356, 125, 'LV', 'LV-JEL', 'Jelgava'),
(357, 125, 'LV', 'Jēkabpils', 'Jēkabpils'),
(358, 125, 'LV', 'LV-JUR', 'Jūrmala'),
(359, 125, 'LV', 'LV-LPX', 'Liepāja'),
(360, 125, 'LV', 'LV-LE', 'Liepājas novads'),
(361, 125, 'LV', 'LV-REZ', 'Rēzekne'),
(362, 125, 'LV', 'LV-RIX', 'Rīga'),
(363, 125, 'LV', 'LV-RI', 'Rīgas novads'),
(364, 125, 'LV', 'Valmiera', 'Valmiera'),
(365, 125, 'LV', 'LV-VEN', 'Ventspils'),
(366, 125, 'LV', 'Aglonas novads', 'Aglonas novads'),
(367, 125, 'LV', 'LV-AI', 'Aizkraukles novads'),
(368, 125, 'LV', 'Aizputes novads', 'Aizputes novads'),
(369, 125, 'LV', 'Aknīstes novads', 'Aknīstes novads'),
(370, 125, 'LV', 'Alojas novads', 'Alojas novads'),
(371, 125, 'LV', 'Alsungas novads', 'Alsungas novads'),
(372, 125, 'LV', 'LV-AL', 'Alūksnes novads'),
(373, 125, 'LV', 'Amatas novads', 'Amatas novads'),
(374, 125, 'LV', 'Apes novads', 'Apes novads'),
(375, 125, 'LV', 'Auces novads', 'Auces novads'),
(376, 125, 'LV', 'Babītes novads', 'Babītes novads'),
(377, 125, 'LV', 'Baldones novads', 'Baldones novads'),
(378, 125, 'LV', 'Baltinavas novads', 'Baltinavas novads'),
(379, 125, 'LV', 'LV-BL', 'Balvu novads'),
(380, 125, 'LV', 'LV-BU', 'Bauskas novads'),
(381, 125, 'LV', 'Beverīnas novads', 'Beverīnas novads'),
(382, 125, 'LV', 'Brocēnu novads', 'Brocēnu novads'),
(383, 125, 'LV', 'Burtnieku novads', 'Burtnieku novads'),
(384, 125, 'LV', 'Carnikavas novads', 'Carnikavas novads'),
(385, 125, 'LV', 'Cesvaines novads', 'Cesvaines novads'),
(386, 125, 'LV', 'Ciblas novads', 'Ciblas novads'),
(387, 125, 'LV', 'LV-CE', 'Cēsu novads'),
(388, 125, 'LV', 'Dagdas novads', 'Dagdas novads'),
(389, 125, 'LV', 'LV-DA', 'Daugavpils novads'),
(390, 125, 'LV', 'LV-DO', 'Dobeles novads'),
(391, 125, 'LV', 'Dundagas novads', 'Dundagas novads'),
(392, 125, 'LV', 'Durbes novads', 'Durbes novads'),
(393, 125, 'LV', 'Engures novads', 'Engures novads'),
(394, 125, 'LV', 'Garkalnes novads', 'Garkalnes novads'),
(395, 125, 'LV', 'Grobiņas novads', 'Grobiņas novads'),
(396, 125, 'LV', 'LV-GU', 'Gulbenes novads'),
(397, 125, 'LV', 'Iecavas novads', 'Iecavas novads'),
(398, 125, 'LV', 'Ikšķiles novads', 'Ikšķiles novads'),
(399, 125, 'LV', 'Ilūkstes novads', 'Ilūkstes novads'),
(400, 125, 'LV', 'Inčukalna novads', 'Inčukalna novads'),
(401, 125, 'LV', 'Jaunjelgavas novads', 'Jaunjelgavas novads'),
(402, 125, 'LV', 'Jaunpiebalgas novads', 'Jaunpiebalgas novads'),
(403, 125, 'LV', 'Jaunpils novads', 'Jaunpils novads'),
(404, 125, 'LV', 'LV-JL', 'Jelgavas novads'),
(405, 125, 'LV', 'LV-JK', 'Jēkabpils novads'),
(406, 125, 'LV', 'Kandavas novads', 'Kandavas novads'),
(407, 125, 'LV', 'Kokneses novads', 'Kokneses novads'),
(408, 125, 'LV', 'Krimuldas novads', 'Krimuldas novads'),
(409, 125, 'LV', 'Krustpils novads', 'Krustpils novads'),
(410, 125, 'LV', 'LV-KR', 'Krāslavas novads'),
(411, 125, 'LV', 'LV-KU', 'Kuldīgas novads'),
(412, 125, 'LV', 'Kārsavas novads', 'Kārsavas novads'),
(413, 125, 'LV', 'Lielvārdes novads', 'Lielvārdes novads'),
(414, 125, 'LV', 'LV-LM', 'Limbažu novads'),
(415, 125, 'LV', 'Lubānas novads', 'Lubānas novads'),
(416, 125, 'LV', 'LV-LU', 'Ludzas novads'),
(417, 125, 'LV', 'Līgatnes novads', 'Līgatnes novads'),
(418, 125, 'LV', 'Līvānu novads', 'Līvānu novads'),
(419, 125, 'LV', 'LV-MA', 'Madonas novads'),
(420, 125, 'LV', 'Mazsalacas novads', 'Mazsalacas novads'),
(421, 125, 'LV', 'Mālpils novads', 'Mālpils novads'),
(422, 125, 'LV', 'Mārupes novads', 'Mārupes novads'),
(423, 125, 'LV', 'Naukšēnu novads', 'Naukšēnu novads'),
(424, 125, 'LV', 'Neretas novads', 'Neretas novads'),
(425, 125, 'LV', 'Nīcas novads', 'Nīcas novads'),
(426, 125, 'LV', 'LV-OG', 'Ogres novads'),
(427, 125, 'LV', 'Olaines novads', 'Olaines novads'),
(428, 125, 'LV', 'Ozolnieku novads', 'Ozolnieku novads'),
(429, 125, 'LV', 'LV-PR', 'Preiļu novads'),
(430, 125, 'LV', 'Priekules novads', 'Priekules novads'),
(431, 125, 'LV', 'Priekuļu novads', 'Priekuļu novads'),
(432, 125, 'LV', 'Pārgaujas novads', 'Pārgaujas novads'),
(433, 125, 'LV', 'Pāvilostas novads', 'Pāvilostas novads'),
(434, 125, 'LV', 'Pļaviņu novads', 'Pļaviņu novads'),
(435, 125, 'LV', 'Raunas novads', 'Raunas novads'),
(436, 125, 'LV', 'Riebiņu novads', 'Riebiņu novads'),
(437, 125, 'LV', 'Rojas novads', 'Rojas novads'),
(438, 125, 'LV', 'Ropažu novads', 'Ropažu novads'),
(439, 125, 'LV', 'Rucavas novads', 'Rucavas novads'),
(440, 125, 'LV', 'Rugāju novads', 'Rugāju novads'),
(441, 125, 'LV', 'Rundāles novads', 'Rundāles novads'),
(442, 125, 'LV', 'LV-RE', 'Rēzeknes novads'),
(443, 125, 'LV', 'Rūjienas novads', 'Rūjienas novads'),
(444, 125, 'LV', 'Salacgrīvas novads', 'Salacgrīvas novads'),
(445, 125, 'LV', 'Salas novads', 'Salas novads'),
(446, 125, 'LV', 'Salaspils novads', 'Salaspils novads'),
(447, 125, 'LV', 'LV-SA', 'Saldus novads'),
(448, 125, 'LV', 'Saulkrastu novads', 'Saulkrastu novads'),
(449, 125, 'LV', 'Siguldas novads', 'Siguldas novads'),
(450, 125, 'LV', 'Skrundas novads', 'Skrundas novads'),
(451, 125, 'LV', 'Skrīveru novads', 'Skrīveru novads'),
(452, 125, 'LV', 'Smiltenes novads', 'Smiltenes novads'),
(453, 125, 'LV', 'Stopiņu novads', 'Stopiņu novads'),
(454, 125, 'LV', 'Strenču novads', 'Strenču novads'),
(455, 125, 'LV', 'Sējas novads', 'Sējas novads'),
(456, 125, 'LV', 'LV-TA', 'Talsu novads'),
(457, 125, 'LV', 'LV-TU', 'Tukuma novads'),
(458, 125, 'LV', 'Tērvetes novads', 'Tērvetes novads'),
(459, 125, 'LV', 'Vaiņodes novads', 'Vaiņodes novads'),
(460, 125, 'LV', 'LV-VK', 'Valkas novads'),
(461, 125, 'LV', 'LV-VM', 'Valmieras novads'),
(462, 125, 'LV', 'Varakļānu novads', 'Varakļānu novads'),
(463, 125, 'LV', 'Vecpiebalgas novads', 'Vecpiebalgas novads'),
(464, 125, 'LV', 'Vecumnieku novads', 'Vecumnieku novads'),
(465, 125, 'LV', 'LV-VE', 'Ventspils novads'),
(466, 125, 'LV', 'Viesītes novads', 'Viesītes novads'),
(467, 125, 'LV', 'Viļakas novads', 'Viļakas novads'),
(468, 125, 'LV', 'Viļānu novads', 'Viļānu novads'),
(469, 125, 'LV', 'Vārkavas novads', 'Vārkavas novads'),
(470, 125, 'LV', 'Zilupes novads', 'Zilupes novads'),
(471, 125, 'LV', 'Ādažu novads', 'Ādažu novads'),
(472, 125, 'LV', 'Ērgļu novads', 'Ērgļu novads'),
(473, 125, 'LV', 'Ķeguma novads', 'Ķeguma novads'),
(474, 125, 'LV', 'Ķekavas novads', 'Ķekavas novads'),
(475, 131, 'LT', 'LT-AL', 'Alytaus Apskritis'),
(476, 131, 'LT', 'LT-KU', 'Kauno Apskritis'),
(477, 131, 'LT', 'LT-KL', 'Klaipėdos Apskritis'),
(478, 131, 'LT', 'LT-MR', 'Marijampolės Apskritis'),
(479, 131, 'LT', 'LT-PN', 'Panevėžio Apskritis'),
(480, 131, 'LT', 'LT-SA', 'Šiaulių Apskritis'),
(481, 131, 'LT', 'LT-TA', 'Tauragės Apskritis'),
(482, 131, 'LT', 'LT-TE', 'Telšių Apskritis'),
(483, 131, 'LT', 'LT-UT', 'Utenos Apskritis'),
(484, 131, 'LT', 'LT-VL', 'Vilniaus Apskritis'),
(485, 31, 'BR', 'AC', 'Acre'),
(486, 31, 'BR', 'AL', 'Alagoas'),
(487, 31, 'BR', 'AP', 'Amapá'),
(488, 31, 'BR', 'AM', 'Amazonas'),
(489, 31, 'BR', 'BA', 'Bahia'),
(490, 31, 'BR', 'CE', 'Ceará'),
(491, 31, 'BR', 'ES', 'Espírito Santo'),
(492, 31, 'BR', 'GO', 'Goiás'),
(493, 31, 'BR', 'MA', 'Maranhão'),
(494, 31, 'BR', 'MT', 'Mato Grosso'),
(495, 31, 'BR', 'MS', 'Mato Grosso do Sul'),
(496, 31, 'BR', 'MG', 'Minas Gerais'),
(497, 31, 'BR', 'PA', 'Pará'),
(498, 31, 'BR', 'PB', 'Paraíba'),
(499, 31, 'BR', 'PR', 'Paraná'),
(500, 31, 'BR', 'PE', 'Pernambuco'),
(501, 31, 'BR', 'PI', 'Piauí'),
(502, 31, 'BR', 'RJ', 'Rio de Janeiro'),
(503, 31, 'BR', 'RN', 'Rio Grande do Norte'),
(504, 31, 'BR', 'RS', 'Rio Grande do Sul'),
(505, 31, 'BR', 'RO', 'Rondônia'),
(506, 31, 'BR', 'RR', 'Roraima'),
(507, 31, 'BR', 'SC', 'Santa Catarina'),
(508, 31, 'BR', 'SP', 'São Paulo'),
(509, 31, 'BR', 'SE', 'Sergipe'),
(510, 31, 'BR', 'TO', 'Tocantins'),
(511, 31, 'BR', 'DF', 'Distrito Federal'),
(512, 59, 'HR', 'HR-01', 'Zagrebačka županija'),
(513, 59, 'HR', 'HR-02', 'Krapinsko-zagorska županija'),
(514, 59, 'HR', 'HR-03', 'Sisačko-moslavačka županija'),
(515, 59, 'HR', 'HR-04', 'Karlovačka županija'),
(516, 59, 'HR', 'HR-05', 'Varaždinska županija'),
(517, 59, 'HR', 'HR-06', 'Koprivničko-križevačka županija'),
(518, 59, 'HR', 'HR-07', 'Bjelovarsko-bilogorska županija'),
(519, 59, 'HR', 'HR-08', 'Primorsko-goranska županija'),
(520, 59, 'HR', 'HR-09', 'Ličko-senjska županija'),
(521, 59, 'HR', 'HR-10', 'Virovitičko-podravska županija'),
(522, 59, 'HR', 'HR-11', 'Požeško-slavonska županija'),
(523, 59, 'HR', 'HR-12', 'Brodsko-posavska županija'),
(524, 59, 'HR', 'HR-13', 'Zadarska županija'),
(525, 59, 'HR', 'HR-14', 'Osječko-baranjska županija'),
(526, 59, 'HR', 'HR-15', 'Šibensko-kninska županija'),
(527, 59, 'HR', 'HR-16', 'Vukovarsko-srijemska županija'),
(528, 59, 'HR', 'HR-17', 'Splitsko-dalmatinska županija'),
(529, 59, 'HR', 'HR-18', 'Istarska županija'),
(530, 59, 'HR', 'HR-19', 'Dubrovačko-neretvanska županija'),
(531, 59, 'HR', 'HR-20', 'Međimurska županija'),
(532, 59, 'HR', 'HR-21', 'Grad Zagreb'),
(533, 106, 'IN', 'AN', 'Andaman and Nicobar Islands'),
(534, 106, 'IN', 'AP', 'Andhra Pradesh'),
(535, 106, 'IN', 'AR', 'Arunachal Pradesh'),
(536, 106, 'IN', 'AS', 'Assam'),
(537, 106, 'IN', 'BR', 'Bihar'),
(538, 106, 'IN', 'CH', 'Chandigarh'),
(539, 106, 'IN', 'CT', 'Chhattisgarh'),
(540, 106, 'IN', 'DN', 'Dadra and Nagar Haveli'),
(541, 106, 'IN', 'DD', 'Daman and Diu'),
(542, 106, 'IN', 'DL', 'Delhi'),
(543, 106, 'IN', 'GA', 'Goa'),
(544, 106, 'IN', 'GJ', 'Gujarat'),
(545, 106, 'IN', 'HR', 'Haryana'),
(546, 106, 'IN', 'HP', 'Himachal Pradesh'),
(547, 106, 'IN', 'JK', 'Jammu and Kashmir'),
(548, 106, 'IN', 'JH', 'Jharkhand'),
(549, 106, 'IN', 'KA', 'Karnataka'),
(550, 106, 'IN', 'KL', 'Kerala'),
(551, 106, 'IN', 'LD', 'Lakshadweep'),
(552, 106, 'IN', 'MP', 'Madhya Pradesh'),
(553, 106, 'IN', 'MH', 'Maharashtra'),
(554, 106, 'IN', 'MN', 'Manipur'),
(555, 106, 'IN', 'ML', 'Meghalaya'),
(556, 106, 'IN', 'MZ', 'Mizoram'),
(557, 106, 'IN', 'NL', 'Nagaland'),
(558, 106, 'IN', 'OR', 'Odisha'),
(559, 106, 'IN', 'PY', 'Puducherry'),
(560, 106, 'IN', 'PB', 'Punjab'),
(561, 106, 'IN', 'RJ', 'Rajasthan'),
(562, 106, 'IN', 'SK', 'Sikkim'),
(563, 106, 'IN', 'TN', 'Tamil Nadu'),
(564, 106, 'IN', 'TG', 'Telangana'),
(565, 106, 'IN', 'TR', 'Tripura'),
(566, 106, 'IN', 'UP', 'Uttar Pradesh'),
(567, 106, 'IN', 'UT', 'Uttarakhand'),
(568, 106, 'IN', 'WB', 'West Bengal'),
(569, 176, 'PY', 'PY-16', 'Alto Paraguay'),
(570, 176, 'PY', 'PY-10', 'Alto Paraná'),
(571, 176, 'PY', 'PY-13', 'Amambay'),
(572, 176, 'PY', 'PY-ASU', 'Asunción'),
(573, 176, 'PY', 'PY-19', 'Boquerón'),
(574, 176, 'PY', 'PY-5', 'Caaguazú'),
(575, 176, 'PY', 'PY-6', 'Caazapá'),
(576, 176, 'PY', 'PY-14', 'Canindeyú'),
(577, 176, 'PY', 'PY-11', 'Central'),
(578, 176, 'PY', 'PY-1', 'Concepción'),
(579, 176, 'PY', 'PY-3', 'Cordillera'),
(580, 176, 'PY', 'PY-4', 'Guairá'),
(581, 176, 'PY', 'PY-7', 'Itapúa'),
(582, 176, 'PY', 'PY-8', 'Misiones'),
(583, 176, 'PY', 'PY-9', 'Paraguarí'),
(584, 176, 'PY', 'PY-15', 'Presidente Hayes'),
(585, 176, 'PY', 'PY-2', 'San Pedro'),
(586, 176, 'PY', 'PY-12', 'Ñeembucú');

-- --------------------------------------------------------

--
-- Table structure for table `country_state_translations`
--

CREATE TABLE `country_state_translations` (
  `id` int UNSIGNED NOT NULL,
  `country_state_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `id` int UNSIGNED NOT NULL,
  `country_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimal` int UNSIGNED NOT NULL DEFAULT '2',
  `group_separator` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ',',
  `decimal_separator` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '.',
  `currency_position` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `decimal`, `group_separator`, `decimal_separator`, `currency_position`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'US Dollar', '$', 2, ',', '.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currency_exchange_rates`
--

CREATE TABLE `currency_exchange_rates` (
  `id` int UNSIGNED NOT NULL,
  `rate` decimal(24,12) NOT NULL,
  `target_currency` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` smallint UNSIGNED NOT NULL DEFAULT '0',
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_group_id` int UNSIGNED DEFAULT NULL,
  `subscribed_to_news_letter` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_kyc_verified` int NOT NULL DEFAULT '0',
  `is_suspended` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `first_name`, `middle_name`, `last_name`, `gender`, `citizenship`, `suffix`, `country_code`, `marital_status`, `date_of_birth`, `email`, `email_type`, `address`, `phone`, `phone_type`, `image`, `status`, `password`, `api_token`, `customer_group_id`, `subscribed_to_news_letter`, `is_verified`, `is_kyc_verified`, `is_suspended`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Vikas', NULL, 'Vishwakarma', 'Male', '', '', '', 0, '1973-04-20', 'vikas@example.com', NULL, NULL, NULL, NULL, 'customer/2/wprvv.webp', 1, '$2y$10$9qj2Lzz/XImtN7yqBtPYuOpPsIGkIGD.JprHb.ndexLvTOmpsCrJ.', 'hfemfEMK6iiHpw9LYt2TjWDY8V7MCuq3xfb1IRFxefZyOOMNm9JJ7u833YYhuUPkMZSKg5JfE0c7wK19', 2, 0, 1, 0, 0, '95464733f3fdc1c3f7860c3aaa8b28e3', NULL, '2024-04-19 12:19:28', '2024-05-10 09:45:45'),
(3, NULL, 'Amena', NULL, 'Rojas', 'Female', '', '', '', 0, '2024-04-08', 'lizin@mailinator.com', NULL, NULL, '123456789', NULL, NULL, 1, '$2y$10$EowRD1jldgHxd1kwZR17fu0zguwig9EeYJ95jYa7Fj0Y4X1tzrdxC', NULL, 2, 0, 1, 0, 0, NULL, NULL, '2024-04-29 07:55:12', '2024-04-29 07:55:12'),
(4, NULL, 'Amena', NULL, 'Rojas', 'Male', '', '', '', 0, '2024-04-15', 'lizin1@mailinator.com', NULL, NULL, '1234567891', NULL, NULL, 1, '$2y$10$I3jlrDDaquexhtYAJw8Zu.yClignLUb8OH0Iup.u.iC6u0isbrbRq', NULL, 2, 0, 1, 0, 0, NULL, NULL, '2024-04-29 08:20:37', '2024-04-29 08:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_attributes`
--

CREATE TABLE `customer_attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `form_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int UNSIGNED DEFAULT NULL,
  `is_required` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer_attributes`
--

INSERT INTO `customer_attributes` (`id`, `name`, `code`, `type`, `form_type`, `position`, `is_required`, `created_at`, `updated_at`) VALUES
(1, 'Full Name', 'full_name', 'text', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(2, 'Date of Birth', 'dob', 'date', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(3, 'Email', 'email', 'text', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(4, 'Phone', 'phone', 'text', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(5, 'Lot / Unit number', 'lot_unit_number', 'text', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(6, 'Civil Status', 'civil_status', 'select', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(7, 'Gender', 'gender', 'checkbox', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(8, 'Address 1', 'address_1', 'text', 'personal_details', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(9, 'Employment Type', 'employment_type', 'select', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(10, 'Gross Income', 'gross_income', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(11, 'Nationality', 'nationality', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(12, 'Work Industry', 'work_industry', 'select', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(13, 'Employment Status', 'employment_status', 'select', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(14, 'Current Position', 'current_position', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(15, 'Employer Name', 'employer_name', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(16, 'Employer Contact Number', 'employer_contact_number', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(17, 'Employer Address', 'employer_address', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(18, 'Tax Identification Number', 'tax_identification_number', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(19, 'PAG IBIG Number', 'PAG_IBIG_number', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(20, 'SSS-GSIS Number', 'SSS_GSIS_number', 'text', 'employment_type', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(21, 'Secondary Home Address', 'secondary_home_address', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(22, 'Civil Status', 'civil_status', 'select', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(23, 'Gender', 'gender', 'checkbox', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(24, 'Date of Birth', 'dob', 'date', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(25, 'Primary Email Address', 'primary_email_address', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(26, 'Primary Mobile Number', 'primary_mobile_number', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(27, 'Work Industry', 'work_industry', 'select', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(28, 'Gross Income', 'gross_income', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(29, 'Nationality', 'nationality', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(30, 'Employment Type', 'employment_type', 'select', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(31, 'Employment Status', 'employment_status', 'select', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(32, 'Current Position', 'current_position', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(33, 'Employer Name', 'employer_name', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(34, 'Employer Contact Number', 'employer_contact_number', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(35, 'Employer Address', 'employer_address', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(36, 'Tax Identification Number', 'tax_identification_number', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(37, 'PAG IBIG Number', 'PAG_IBIG_number', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(38, 'SSS GSIS Number', 'SSS_GSIS_number', 'text', 'borrower_data', 1, 0, '2024-05-03 07:00:40', '2024-05-03 07:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `customer_attribute_options`
--

CREATE TABLE `customer_attribute_options` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_attribute_id` bigint UNSIGNED DEFAULT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer_attribute_options`
--

INSERT INTO `customer_attribute_options` (`id`, `customer_attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(283, 6, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(284, 6, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(285, 6, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(286, 7, 'Male', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(287, 7, 'Female', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(288, 7, 'Other', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(289, 9, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(290, 9, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(291, 9, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(292, 12, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(293, 12, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(294, 12, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(295, 13, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(296, 13, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(297, 13, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(298, 22, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(299, 22, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(300, 22, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(301, 23, 'Male', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(302, 23, 'Female', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(303, 23, 'Other', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(304, 27, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(305, 27, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(306, 27, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(307, 30, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(308, 30, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(309, 30, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(310, 31, 'option 1', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(311, 31, 'option 2', '2024-05-03 07:00:40', '2024-05-03 07:00:40'),
(312, 31, 'option 3', '2024-05-03 07:00:40', '2024-05-03 07:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `customer_attribute_values`
--

CREATE TABLE `customer_attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `form_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `attribute_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer_attribute_values`
--

INSERT INTO `customer_attribute_values` (`id`, `name`, `value`, `form_type`, `customer_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(78, 'full_name', 'alert(\'asd\')', 'personal_details', 2, 1, '2024-05-03 10:46:19', '2024-05-03 11:32:34'),
(79, 'phone', '123456789', 'personal_details', 2, 4, '2024-05-03 10:46:19', '2024-05-03 10:46:19'),
(80, 'email', 'lizin@mailinator.com', 'personal_details', 2, 3, '2024-05-03 10:46:19', '2024-05-03 10:46:19'),
(81, 'address_1', 'Proident corrupti', 'personal_details', 2, 8, '2024-05-03 10:46:19', '2024-05-03 10:46:19'),
(82, 'lot_unit_number', '16789', 'personal_details', 2, 5, '2024-05-03 10:46:23', '2024-05-03 10:46:23'),
(83, 'civil_status', 'option 1', 'personal_details', 2, 6, '2024-05-03 10:46:24', '2024-05-03 10:46:24'),
(84, 'gender', 'female', 'personal_details', 2, 7, '2024-05-03 10:46:27', '2024-05-03 11:42:40'),
(85, 'employment_type', 'option 1', 'employment_type', 2, 9, '2024-05-03 10:46:35', '2024-05-03 10:46:35'),
(86, 'gross_income', 'asdfasd', 'employment_type', 2, 10, '2024-05-03 10:46:37', '2024-05-03 10:46:37'),
(87, 'nationality', 'asdasdasd', 'employment_type', 2, 11, '2024-05-03 10:46:38', '2024-05-03 10:46:38'),
(88, 'work_industry', 'option 1', 'employment_type', 2, 12, '2024-05-03 10:46:39', '2024-05-03 10:46:39'),
(89, 'employment_status', 'option 1', 'employment_type', 2, 13, '2024-05-03 10:46:41', '2024-05-03 10:46:41'),
(90, 'current_position', 'asdasd', 'employment_type', 2, 14, '2024-05-03 10:46:42', '2024-05-03 10:46:42'),
(91, 'employer_name', 'asdasd', 'employment_type', 2, 15, '2024-05-03 10:46:43', '2024-05-03 10:46:43'),
(92, 'employer_contact_number', 'asdasd', 'employment_type', 2, 16, '2024-05-03 10:46:45', '2024-05-03 10:46:45'),
(93, 'employer_address', 'asdasd', 'employment_type', 2, 17, '2024-05-03 10:46:45', '2024-05-03 10:46:45'),
(94, 'tax_identification_number', 'asdas', 'employment_type', 2, 18, '2024-05-03 10:46:47', '2024-05-03 10:46:47'),
(95, 'PAG_IBIG_number', 'asd', 'employment_type', 2, 19, '2024-05-03 10:46:47', '2024-05-03 10:46:47'),
(96, 'SSS_GSIS_number', 'sdfdsfdsf', 'employment_type', 2, 20, '2024-05-03 10:47:00', '2024-05-03 10:47:00'),
(97, 'secondary_home_address', 'fgdfgd', 'borrower_data', 2, 21, '2024-05-03 10:47:05', '2024-05-03 10:47:05'),
(98, 'civil_status', 'option 3', 'borrower_data', 2, 22, '2024-05-03 10:47:05', '2024-05-03 10:47:05'),
(99, 'gender', 'female', 'borrower_data', 2, 23, '2024-05-03 10:47:07', '2024-05-03 10:47:07'),
(100, 'dob', '2010-02-28', 'borrower_data', 2, 24, '2024-05-03 10:47:09', '2024-05-03 10:47:30'),
(101, 'primary_email_address', 'fdsfdsf', 'borrower_data', 2, 25, '2024-05-03 10:47:32', '2024-05-03 10:47:32'),
(102, 'primary_mobile_number', 'sdf', 'borrower_data', 2, 26, '2024-05-03 10:47:33', '2024-05-03 10:47:33'),
(103, 'work_industry', 'option 2', 'borrower_data', 2, 27, '2024-05-03 10:47:34', '2024-05-03 10:47:34'),
(104, 'gross_income', 'sdfdsfdsf', 'borrower_data', 2, 28, '2024-05-03 10:47:36', '2024-05-03 10:47:36'),
(105, 'nationality', 'sdfdsf', 'borrower_data', 2, 29, '2024-05-03 10:47:37', '2024-05-03 10:47:37'),
(106, 'employment_type', 'option 1', 'borrower_data', 2, 30, '2024-05-03 10:47:38', '2024-05-03 10:47:38'),
(107, 'employment_status', 'option 1', 'borrower_data', 2, 31, '2024-05-03 10:47:39', '2024-05-03 10:47:39'),
(108, 'current_position', 'sdfdsfdsf', 'borrower_data', 2, 32, '2024-05-03 10:47:41', '2024-05-03 10:47:41'),
(109, 'employer_name', 'sdfdsf', 'borrower_data', 2, 33, '2024-05-03 10:47:41', '2024-05-03 10:47:41'),
(110, 'employer_contact_number', 'dsfdsf', 'borrower_data', 2, 34, '2024-05-03 10:47:43', '2024-05-03 10:47:43'),
(111, 'employer_address', 'sdfds', 'borrower_data', 2, 35, '2024-05-03 10:47:44', '2024-05-03 10:47:44'),
(112, 'tax_identification_number', 'sdfdsf', 'borrower_data', 2, 36, '2024-05-03 10:47:45', '2024-05-03 10:47:45'),
(113, 'PAG_IBIG_number', 'sdfdsf', 'borrower_data', 2, 37, '2024-05-03 10:47:46', '2024-05-03 10:47:46'),
(114, 'dob', '2024-05-03', 'personal_details', 2, 2, '2024-05-03 11:00:32', '2024-05-03 11:00:32'),
(115, 'full_name', 'gsdfds', 'personal_details', 4, 1, '2024-05-22 10:22:50', '2024-05-22 10:22:50'),
(116, 'dob', '2024-05-22', 'personal_details', 4, 2, '2024-05-22 10:22:51', '2024-05-22 10:22:51'),
(117, 'email', 'dsf@xfx.dfgdf', 'personal_details', 4, 3, '2024-05-22 10:22:56', '2024-05-22 10:22:56'),
(118, 'employment_type', 'option 1', 'employment_type', 4, 9, '2024-05-22 10:23:16', '2024-05-22 10:23:16'),
(119, 'gross_income', 'sdfs', 'employment_type', 4, 10, '2024-05-22 10:23:17', '2024-05-22 10:23:17'),
(120, 'nationality', 'sdfds', 'employment_type', 4, 11, '2024-05-22 10:23:18', '2024-05-22 10:23:18'),
(121, 'work_industry', 'option 2', 'employment_type', 4, 12, '2024-05-22 10:23:19', '2024-05-22 10:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `code`, `name`, `is_user_defined`, `created_at`, `updated_at`) VALUES
(1, 'guest', 'Guest', 0, NULL, NULL),
(2, 'general', 'General', 0, NULL, NULL),
(3, 'wholesale', 'Wholesale', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_notes`
--

CREATE TABLE `customer_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `customer_password_resets`
--

CREATE TABLE `customer_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `customer_social_accounts`
--

CREATE TABLE `customer_social_accounts` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `provider_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `downloadable_link_purchased`
--

CREATE TABLE `downloadable_link_purchased` (
  `id` int UNSIGNED NOT NULL,
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_bought` int NOT NULL DEFAULT '0',
  `download_used` int NOT NULL DEFAULT '0',
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `order_item_id` int UNSIGNED NOT NULL,
  `download_canceled` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ekyc_verifications`
--

CREATE TABLE `ekyc_verifications` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ekyc_verifications`
--

INSERT INTO `ekyc_verifications` (`id`, `cart_id`, `transaction_id`, `password`, `sku`, `status`, `payload`, `created_at`, `updated_at`) VALUES
(1, '3', 'eyJpdiI6IkdBcTk0czJ2bmw4bWQ4bUZnc1BZZnc9PSIsInZhbHVlIjoibTNoYXdXU1poSGwvSklVSVNNK0o0Zz09IiwibWFjIjoiNmEyZTY0YzgyMWFhNmFiZTgzMzlkZTQzZjY5YjY0Y2Y1NWEwYmMwNzZhZDgwOWNiNmMwNDE1Nzc0YjkzZTBjZSIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"3\"}', '2024-04-03 04:53:38', '2024-04-03 04:53:38'),
(2, '4', 'eyJpdiI6Inp4d1RKU2M1ZzJqbDArK0lKdWxTQUE9PSIsInZhbHVlIjoibzdNVEJHZVQzZ3ZMQkNsKzd1dWlVdz09IiwibWFjIjoiMWMyN2RmZDg4MTQ3NTRlYzI0ZWIxZDdmZGYxYmYxM2IzMTcwYjJlNWU1YzIzNjFiZTgwNGZjNjM2NDM1NDNhZSIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"4\"}', '2024-04-03 09:30:05', '2024-04-03 09:30:05'),
(3, '6', 'eyJpdiI6IjZ2eW90OVk5aitmY2FDR3kzNCtBUXc9PSIsInZhbHVlIjoiQjZENWVicWluTnVCVFZCV1kydU9xZz09IiwibWFjIjoiM2U0YTEyYzgxYWRhNTg1ODM4ZGUyN2ZmODlkNDQ4MDY1Zjg0ZDI5ODA4ODA4ZGYwYzY4OGJjMDMxMzJmNzkyOSIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"6\"}', '2024-04-03 10:38:19', '2024-04-03 10:38:19'),
(4, '7', 'eyJpdiI6IlhNMEgrSFFSRFkzc3Uxcm9INmFZOVE9PSIsInZhbHVlIjoiMXFRYWN0Mmd1OWRUc3JvbjkrZUtKQT09IiwibWFjIjoiNTc1YjAwZTU3Nzk5NGI4MTA1ZjU2MzA2MWE0MjM0NTkwYzNjNmJhNDVkNWNlOTYxNWYxN2I5MDIxNDI2YmZmMCIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"7\"}', '2024-04-03 10:41:32', '2024-04-03 10:49:12'),
(5, '8', 'eyJpdiI6ImlEc3IyZlNUYnZMdDZMbURWK05CREE9PSIsInZhbHVlIjoibGsxdjNYbTBoSlhEeFNzUXA4andZUT09IiwibWFjIjoiZmEwN2FiNGRmYzdhZGM1MjAzYWM1ZDY5MmFiN2EzNDI5MTc3YTQyMGFhMWY4Yzg2N2M3NWMwZTEyOGEyZTYyYyIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"8\"}', '2024-04-03 11:06:50', '2024-04-03 11:06:50'),
(6, '9', 'eyJpdiI6IkVIU1hRcHRuR1NOaFFXTUl1cGtndUE9PSIsInZhbHVlIjoiSDBPZzhEUUFMdGV3aTJVazg3REhqUT09IiwibWFjIjoiZjdjYWRiNTNmMGRkNWMzMGJkMmQxMGVkYTA4ZDY4Y2E2YTRmNmI3NzY5YzZmOTk4OWUwMDAwZmVlYzRlODlkZSIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 1, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"9\"}', '2024-04-03 11:07:09', '2024-04-03 11:07:09'),
(7, '10', 'eyJpdiI6IlVINm45WjdjdDhyUE03aVhwSVVzcnc9PSIsInZhbHVlIjoiM1hzL2RLRllTb3IvcnhDZ0tWbSt4Zz09IiwibWFjIjoiZTJjMDRkNjVhMmNjYzE0NzRlZTVmMDc5OWYzYWNhOWM1ZDE3NzVjNzM2MjBhZjdjMzkwYTNiY2IxM2U4NTk2NyIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"10\"}', '2024-04-03 11:45:06', '2024-04-03 11:45:06'),
(8, '12', 'eyJpdiI6IjJMZEJlbjBOTHBRSFo4cktRZ3JkTFE9PSIsInZhbHVlIjoiRnVFQUt6M3NlM1pwZjZGVVEwcWRzdz09IiwibWFjIjoiYTY4MjMxZmI3Mjc4NTZkM2U3MTVmNGNkOGY2ZWE0MTZiOWM3NWM3OWVlYzIxNmJkNWI5ZmQzOWVkNTQ4YzkxMiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-flat-green\", \"cartId\": \"12\"}', '2024-04-04 12:30:12', '2024-04-04 12:30:12'),
(9, '13', 'eyJpdiI6IkNhU0tOTi81TWtMWjhEODZubCtSOHc9PSIsInZhbHVlIjoiY0plZjVzclpQQTJ3bkovSEZKMlZjZz09IiwibWFjIjoiZDA5YzZkZDY4M2FhMDk5M2Y3OWFiOGQ3MWJhNTMzNDQzNzk3OGMxNDgzNWQzNDRjNThlMzM3MDUxZDNhNWM4YSIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-flat-green\", \"cartId\": \"13\"}', '2024-04-04 12:52:18', '2024-04-04 12:52:18'),
(10, '14', 'eyJpdiI6IkhpS0x1SSs5VTdvRWc2Z0xRR2wwQWc9PSIsInZhbHVlIjoidmtvRFZlWnBiamg1Q0tMdlRQZUkxQT09IiwibWFjIjoiZTFhZDJlZGQwMGZhY2Q5NWE4ZGQzNGMzMzY0NjM2MjZmNTY0MmE4OWVjZjY2OTM4ODdhYTMzOTRlNjI2NDNkMCIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-PIN', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-flat-pink\", \"cartId\": \"14\"}', '2024-04-05 05:14:24', '2024-04-05 05:14:24'),
(11, '15', 'eyJpdiI6ImJHbS9adHNLZGpnemExOGZnNVdNN1E9PSIsInZhbHVlIjoiVThFUVh3YksxOGNma0YrVVNTeWt6dz09IiwibWFjIjoiNDE1OWM3ZjNlMDA3YTFjYjAwYTA1MzM1MDliYjJjMzlmN2QxOTVmOWI2YWU2OTUyZTAxZDBlYzI5OGE2NGU2ZCIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDU', 0, '{\"slug\": \"agapeya-duplex-house-and-lot\", \"cartId\": \"15\"}', '2024-04-05 13:17:38', '2024-04-05 13:17:38'),
(12, '16', 'eyJpdiI6Ik14WjY0M1BkNzBBMGVuQkhuSUhVbGc9PSIsInZhbHVlIjoid0t1NkwycnB6dnBYZWFSdSt4aXg3Zz09IiwibWFjIjoiN2Q0Y2FiYTRlYjc5NDNlNWZhYTZmNzkyNWVkYWM3NTljZWY0MDIyMjM1NDE3MDdlN2I1OTM0ZGUwNmY5NDM4YiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-flat-green\", \"cartId\": \"16\"}', '2024-04-15 10:43:57', '2024-04-15 10:43:57'),
(13, '17', 'eyJpdiI6InFjR1pOYnRrTFQyaGVENFFwVWtBc3c9PSIsInZhbHVlIjoiL3hGcmpnL0UrT1ZNRm9Gc0syMXZRUT09IiwibWFjIjoiYWMzZTdlMTc0ZjU1ZmI5MjVjZTEwNzE0OTZmNzcwOTZkMjU0Y2I1NTQ3MjA2MjBkYzRlNGVjYmU1MjM3YmMyZiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-PUR', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-slant-purple\", \"cartId\": \"17\"}', '2024-04-19 11:25:58', '2024-04-19 11:25:58'),
(14, '18', 'eyJpdiI6IjBCV2ZtMWUwQmFyaWJGaEFpVFVsU2c9PSIsInZhbHVlIjoic0puSExVbTlMMGVpbE8zRHozQTlWZz09IiwibWFjIjoiMWZhZTcyMDg3YTA4OWM1ZWJhMzk3ZDk3MTIxZjFiNGQ4ZGY1NWRhNjBmZDk2MWQ3YjlmZDI2ZTgwYTAwYjk4MyIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-PUR', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-slant-purple\", \"cartId\": \"18\"}', '2024-04-19 11:29:16', '2024-04-19 11:29:16'),
(15, '28', 'eyJpdiI6IkhSVFVqZjFyOCtLaXlDQjJ6Ly9vM0E9PSIsInZhbHVlIjoiUndVRjZhR0lneU5UbFNyN3ZaaXFkQT09IiwibWFjIjoiNDVjMmU2MTljNjM5MzYzMWJlOTQ3N2FhMzAxMDEwZGIzZDVhN2E4YWU1MTIwNzc5N2IwY2Y1NGY5MjJjYTRjYiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-GRN', 0, '{\"slug\": \"agapeya-duplex-house-and-lot-slant-green\", \"cartId\": \"28\"}', '2024-04-22 12:08:23', '2024-04-22 12:08:23'),
(16, '40', 'eyJpdiI6IlNsRVdseDFOaDZMUGVoVk5UdmJiTnc9PSIsInZhbHVlIjoiamVqOHJxc1Q5VVNOOTFPY3JSQzBxUT09IiwibWFjIjoiZjFhZDc3NGM2NGE4MGRjMzllNjE0ZmU4YTI0MDQ1ZGQ2MmRiMDE4ZGMxMmEwMTVjNDQwZjNhNzkxZjE4OThkMyIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-slant\", \"cartId\": \"40\"}', '2024-04-30 12:01:23', '2024-04-30 12:01:23'),
(17, '41', 'eyJpdiI6ImR2SjhYbmE0dmVMZVlhSVN0WjNtZEE9PSIsInZhbHVlIjoiQ3UvYmtuTTdPYnNWbjFEYW1RbkJZUT09IiwibWFjIjoiM2YwZDkwODUyMjlkYzAwNWE0ZjQyM2Q2NTMxOWI0NWY2Y2MzNTA0OTY0MTc0OGJkMGI0NDNhZDYxNmI0MWM4MiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-flat\", \"cartId\": \"41\"}', '2024-04-30 12:04:39', '2024-04-30 12:04:39'),
(18, '43', 'eyJpdiI6Im8xOXRINzRWZ2ZwTXE3MzYzZ1Jwc1E9PSIsInZhbHVlIjoiWkJSOE5NQ1dQWU5JaFBGeWdMZkkxdz09IiwibWFjIjoiMmFkNzJkNTBiMmI0NzQ5NjBkZDdiM2JhMDU2YmVlOTE3NzViNzgwMmNlMzAxMDMwZjk3MTZmMmI4NjNmOTQ2MCIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-slant\", \"cartId\": \"43\"}', '2024-04-30 12:35:23', '2024-04-30 12:35:23'),
(19, '44', 'eyJpdiI6IlRCeC9GYjUyRGJkb1ZydFNxdVN2MVE9PSIsInZhbHVlIjoiNzIrUCtJQmpOcnAwWGpqSmp3QTdhQT09IiwibWFjIjoiY2Y5ZjJkNjMyMWY1Yzk0MmM0YjVjNmJhMTgzMWFkZjIwMjk4N2E0ODk2Y2FkMTU2NmZiZWYxN2JmNmM3ZmU4YiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-slant\", \"cartId\": \"44\"}', '2024-04-30 12:38:42', '2024-04-30 12:38:42'),
(20, '45', 'eyJpdiI6IjU2OWFGejJITUtYaGc3ZlBrZEFNQlE9PSIsInZhbHVlIjoib05ZY2xvSkNKOXVvMTV6TGtXek85QT09IiwibWFjIjoiMDFiNmNiNDIyYmYwMjlhNWFjOWI5MzcwNDJiNDE4YTc2OGZkYjc3NGZhYzYxMjI5MWZkMDFlNTFhNGEzMDVlNiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-flat\", \"cartId\": \"45\"}', '2024-05-02 11:01:16', '2024-05-02 11:01:16'),
(21, '46', 'eyJpdiI6ImhIdEVsZ0YwYnBzVEx1VjhTUGhZS0E9PSIsInZhbHVlIjoiRTY4aTg0N0txdWtyU0VjTUpvVnlVdz09IiwibWFjIjoiZjI0YmNkMWIwNmYzMWNiOTg2OTIwYTEyMDNhNjFkMDNjMTI1ZmViNGI3YWE1NDdkMTU0NTU4ODNkNzI4YTlkZiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-flat\", \"cartId\": \"46\"}', '2024-05-06 06:27:22', '2024-05-06 06:27:22'),
(22, '47', 'eyJpdiI6Imtud25keDdUeTFSd2UyanJNRC84WFE9PSIsInZhbHVlIjoiS2lCV0hWVWwrdDNYb2tUMzR1MTFFZz09IiwibWFjIjoiZjFlY2E2ZjcxMTI1N2RlNzYzMzA2OTYzMjllN2I3MzQxNjM1ZmU0MDY0Mzc0YWE3OWIwMzk4YTJmZmQxYzM0MiIsInRhZyI6IiJ9', 'eyJpdiI6InhoSHlzR2FkS1JaNTdsS3M3TGdRR1E9PSIsInZhbHVlIjoieHNIZmVnQjVZUkdhQTMvZDZSaGwxVWp5NWhVUVJ5MVA2N2czSHFYTTk2bz0iLCJtYWMiOiI5YjIxYTNjYjg2MTVhZmI4Mzc1M2MyNGYwOTUxMWI4NjNmMDllYzNlZDRiNzJlMjE3NWEyZGE3MDNkZGU0ODA5IiwidGFnIjoiIn0=', 'JN-AGM-CL-HLDUS-GRN', 1, '{\"payload\": {\"order\": {\"buyer\": {\"name\": \"Vikas Vishwakarma\", \"email\": \"vikas@example.com\", \"mobile\": null, \"address\": \"1 BARANGAY POBLACION CURRIMAO ILOCOS NORTE\", \"id_type\": \"phl_dl\", \"birthdate\": \"20-04-1973\", \"id_number\": \"N01-87-049586\", \"id_mark_url\": null, \"id_image_url\": null, \"selfie_image_url\": null}, \"seller\": {\"name\": \"John Doe\", \"email\": \"seller_001@enclaves.ph\"}, \"product\": {\"sku\": \"JN-AGM-CL-HLDUS-GRN\", \"name\": \"Agapeya Towns Hopefull Green (Slant)\", \"processing_fee\": 11231212}, \"dp_months\": 18, \"dp_percent\": 12, \"property_code\": \"AGM-01-028-024\", \"transaction_id\": \"eyJpdiI6Imtud25keDdUeTFSd2UyanJNRC84WFE9PSIsInZhbHVlIjoiS2lCV0hWVWwrdDNYb2tUMzR1MTFFZz09IiwibWFjIjoiZjFlY2E2ZjcxMTI1N2RlNzYzMzA2OTYzMjllN2I3MzQxNjM1ZmU0MDY0Mzc0YWE3OWIwMzk4YTJmZmQxYzM0MiIsInRhZyI6IiJ9\"}, \"reference_code\": \"JN-LES537\"}, \"entity_type\": \"checkout.property.kyc.authenticate.after\"}', '2024-05-06 06:41:20', '2024-05-10 09:45:45'),
(23, '49', 'eyJpdiI6IisvK2Rnb0JrVjNUZ2d4amZZclRpcUE9PSIsInZhbHVlIjoiMWpEZGhpQ1h5U3lSUWpScHg1MkRpUT09IiwibWFjIjoiZTZkN2QwNzMzZDI3YmJjNGVlZTJiZDQwYTY2Y2U4ZmQxNmNmMGJiMTA0ZTUwMzE5MWJkYzQwYTYyODVlZjE1ZiIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUF-GRN', 0, '{\"slug\": \"agapeya-towns-hopefull-green-flat\", \"cartId\": \"49\"}', '2024-05-07 11:53:38', '2024-05-07 11:53:38'),
(24, '51', 'eyJpdiI6ImFLYXNYMVZkVy9MKzFsZEtxcE9iK1E9PSIsInZhbHVlIjoiZVMyRUJGWlJESHF5TUZvT002bG5HZz09IiwibWFjIjoiNjc5ZjhkMDRjOTk2NTM2NWFhNTNlYWQ3MTU5MDk2ZmQ1NzQ4OWVjMTc1YjA3ZDE5Y2RkZTg4MjVlMzA5N2I1MyIsInRhZyI6IiJ9', NULL, 'JN-AGM-CL-HLDUS-YEL', 0, '{\"slug\": \"agapeya-towns-joyful-yellow-slant\", \"cartId\": \"51\"}', '2024-05-15 06:08:29', '2024-05-15 06:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int UNSIGNED NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `process_in_queue` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_strategy` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed_errors` int NOT NULL DEFAULT '0',
  `processed_rows_count` int NOT NULL DEFAULT '0',
  `invalid_rows_count` int NOT NULL DEFAULT '0',
  `errors_count` int NOT NULL DEFAULT '0',
  `errors` json DEFAULT NULL,
  `field_separator` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_directory_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_file_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` json DEFAULT NULL,
  `started_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `import_batches`
--

CREATE TABLE `import_batches` (
  `id` int UNSIGNED NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `data` json NOT NULL,
  `summary` json DEFAULT NULL,
  `import_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `import_products`
--

CREATE TABLE `import_products` (
  `id` int UNSIGNED NOT NULL,
  `is_downloadable` tinyint(1) NOT NULL DEFAULT '0',
  `upload_link_files` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_links_have_samples` tinyint(1) NOT NULL DEFAULT '0',
  `upload_link_sample_files` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_samples_available` tinyint(1) NOT NULL DEFAULT '0',
  `upload_sample_files` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `attribute_family_id` int UNSIGNED NOT NULL,
  `bulk_product_importer_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `import_products`
--

INSERT INTO `import_products` (`id`, `is_downloadable`, `upload_link_files`, `is_links_have_samples`, `upload_link_sample_files`, `is_samples_available`, `upload_sample_files`, `file_name`, `file_path`, `image_path`, `status`, `attribute_family_id`, `bulk_product_importer_id`, `created_at`, `updated_at`) VALUES
(8, 0, '', 0, '', 0, '', 'configurable-product-upload.xlsx', 'imported-products/admin/files/66225270d3222.xlsx', '', 1, 1, 3, '2024-04-19 11:16:00', '2024-04-19 11:16:00'),
(9, 0, '', 0, '', 0, '', 'bulk_uploader.xlsx', 'imported-products/admin/files/662f274b8be3d.xlsx', '', 1, 1, 3, '2024-04-29 04:51:23', '2024-04-29 04:51:23'),
(10, 0, '', 0, '', 0, '', 'bulk_uploader.xlsx', 'imported-products/admin/files/662f397bac1d5.xlsx', '', 1, 1, 3, '2024-04-29 06:08:59', '2024-04-29 06:08:59'),
(11, 0, '', 0, '', 0, '', 'bulk_uploader.xlsx', 'imported-products/admin/files/662f3d2d34ec8.xlsx', '', 1, 1, 3, '2024-04-29 06:24:45', '2024-04-29 06:24:45'),
(12, 0, '', 0, '', 0, '', 'bulk_uploader.xlsx', 'imported-products/admin/files/6630b942c9c56.xlsx', '', 1, 1, 3, '2024-04-30 09:26:26', '2024-04-30 09:26:26'),
(13, 0, '', 0, '', 0, '', 'bulk_uploader (3).xlsx', 'imported-products/admin/files/663deb482db7f.xlsx', '', 1, 1, 3, '2024-05-10 09:39:20', '2024-05-10 09:39:20'),
(14, 0, '', 0, '', 0, '', 'bulk_uploader (3).xlsx', 'imported-products/admin/files/663e1d6ca0b65.xlsx', '', 1, 1, 3, '2024-05-10 13:13:16', '2024-05-10 13:13:16'),
(15, 0, '', 0, '', 0, '', 'bulk_uploader_4.xlsx', 'imported-products/admin/files/664f16e0039c2.xlsx', '', 1, 1, 3, '2024-05-23 10:13:52', '2024-05-23 10:13:52'),
(16, 0, '', 0, '', 0, '', 'bulk_uploader_4.xlsx', 'imported-products/admin/files/6656ab78afe77.xlsx', '', 1, 1, 3, '2024-05-29 04:13:44', '2024-05-29 04:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sources`
--

CREATE TABLE `inventory_sources` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_fax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `latitude` decimal(10,5) DEFAULT NULL,
  `longitude` decimal(10,5) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `inventory_sources`
--

INSERT INTO `inventory_sources` (`id`, `code`, `name`, `description`, `contact_name`, `contact_email`, `contact_number`, `contact_fax`, `country`, `state`, `city`, `street`, `postcode`, `priority`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Default', NULL, 'Default', 'warehouse@example.com', '1234567899', NULL, 'US', 'MI', 'Detroit', '12th Street', '48127', 0, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int UNSIGNED NOT NULL,
  `increment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `total_qty` int DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `order_id` int UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminders` int NOT NULL DEFAULT '0',
  `next_reminder_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `increment_id`, `state`, `email_sent`, `total_qty`, `base_currency_code`, `channel_currency_code`, `order_currency_code`, `sub_total`, `base_sub_total`, `grand_total`, `base_grand_total`, `processing_fee`, `shipping_amount`, `base_shipping_amount`, `tax_amount`, `base_tax_amount`, `discount_amount`, `base_discount_amount`, `order_id`, `transaction_id`, `reminders`, `next_reminder_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'paid', 1, 1, 'USD', 'USD', 'USD', '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', '20000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 2, NULL, 0, NULL, '2024-04-19 12:23:08', '2024-04-19 12:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int UNSIGNED DEFAULT NULL,
  `invoice_id` int UNSIGNED DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `parent_id`, `name`, `description`, `sku`, `qty`, `price`, `base_price`, `total`, `base_total`, `processing_fee`, `tax_amount`, `base_tax_amount`, `discount_percent`, `discount_amount`, `base_discount_amount`, `product_id`, `product_type`, `order_item_id`, `invoice_id`, `additional`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Agapeya Duplex House and Lot Flat Yellow', NULL, 'JN-AGM-CL-HLDUF-YEL', 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 65, 'Webkul\\Product\\Models\\Product', 2, 1, '{\"locale\": \"en\", \"quantity\": 1, \"product_id\": \"65\"}', '2024-04-19 12:23:08', '2024-04-19 12:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(2852, 'broadcastable', '{\"uuid\":\"f299783a-748a-4560-ab72-4468e7fdb307\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1713529231, 1713529231),
(2856, 'broadcastable', '{\"uuid\":\"01680aa5-8b7f-4e29-b70d-3e9c38c14919\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\CreateOrderNotification\\\":0:{}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1713529363, 1713529363),
(2859, 'broadcastable', '{\"uuid\":\"fd98fd0f-75e6-48de-a4ea-29742151193e\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:2;s:6:\\\"status\\\";s:10:\\\"processing\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1713529388, 1713529388),
(2864, 'broadcastable', '{\"uuid\":\"e49eab9f-f734-4bf7-bbc6-034c5de5c070\",\"displayName\":\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:50:\\\"Webkul\\\\Notification\\\\Events\\\\UpdateOrderNotification\\\":1:{s:7:\\\"\\u0000*\\u0000data\\\";a:2:{s:2:\\\"id\\\";i:2;s:6:\\\"status\\\";s:9:\\\"completed\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1713529397, 1713529397),
(11763, 'default', '{\"uuid\":\"58d85955-a683-42b7-bd95-50eb0055ba0e\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6ImloSG5IeDErUGJUTUxTOVRrVHZPYVE9PSIsInZhbHVlIjoiY0xJTlNLclBVN0RSaUM4SUJ2SVdzcm9kOHBMNmZKUjIwYkFFN3k0TXAxblBCVXI3cHlGUTVoRTVBRjU3UnMwbGw2NVRQdTdRQVlwdnV2Q01hV0lCSjFkQnZXdWNwdC94VGhjNlZrMG84ckhJU1Facmo5Z1h1b095ajRKZTlnV1giLCJtYWMiOiIwNzkwYWNhOGNjNTQ2YTRmZTA1YmI0NDFkOTdjNDZiNjM4NGEzNDViNDM3OWNkNzE3NzYzYWI4N2VmOGU2ZWYzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlAxTXhGSUJNMS94c1FDS2hnallqZFE9PSIsInZhbHVlIjoicjlVVnVrVkpBRFlPdkZpOVp4dGNRQU9vam9uK3p0dDFEM0d6UmtkMkQ4cjNNMmVrcUFSTHQrYkI3Wm1lYmRuRmJBTHQ0YWhVKzg2MHpIYXQ1SEdnK1lTZXpEb05FNU5NeWN2MDQ4ZXhEU3ZWRXgyNWlqVHJlMks3N3NJbEM5MnIiLCJtYWMiOiI4Y2Y3NWZkZTRhOGZmZWU5Nzk4N2ZkNzhkODJkY2UzYTk3Njg1NmY2OGU0MWZhZTAwYTlkYzRkOWNmZTg5YWI3IiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716960920, 1716960920),
(11764, 'default', '{\"uuid\":\"8df1885b-d1e5-4e36-b7d0-bb6f7288989c\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6ImUxRS9INENiVzJMcHZjNlVuMEdIUHc9PSIsInZhbHVlIjoidnVzT1hqY3hKQk5XN2xNSHpiUjVlNmc3V3hQYWJ1YUFCdGZUbzd6RDJNY3hoK0t0MmdUYlQ2dnIxUXFnaUQ1bkdtRTVHYVViVHhVYjlQZ3JaK202S2dvdlpYLzlZOGJmZFVDWGJKbEkreXI4VEtvQ3Y1Tll4Sy9MTVhKR1I2TnUiLCJtYWMiOiJkMDVjZWNjN2FmMWI1MmE4OTg1MDQzMTVmNDhjMjU3ZDliYzAxYjQ0NjY1MTIyOGYwMzI3MmVjMDQzYjJmYmQ2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjY2MDREc283NVE5QXFNV1FDcWFSZWc9PSIsInZhbHVlIjoid1ZnVXRrSDlGQVFwQnRCa0pzc25rWk5UbXVZdUJFSlRLdmhxb2JtM3lCdGptOVRGeFlhZUQ3TDlaQVJoYklXUVpVWlhOSy8xalpzVWJaRGNHSDZxRUo2Q0pGR0I2dzQ3MzhmMlhvb2xNSS9SSzV6d2RCOGUzL0lFOU9IOUtwbkUiLCJtYWMiOiI0NDEzODhkNmI0NDlmMjNiNTA3NmZhNDFhNjA5NmI3M2EyMzdkZGJiMzA5YjExNGFkZTZmN2RmNjhiN2QxMmFiIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961050, 1716961050),
(11765, 'default', '{\"uuid\":\"644d3d5d-63a4-4a29-8a81-7370560bf069\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:11:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:6:\\\"pragma\\\";a:1:{i:0;s:8:\\\"no-cache\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:8:\\\"no-cache\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6Ii9IbVIySVk4c1cxOEJNL3A0d0lVK1E9PSIsInZhbHVlIjoibjlrUEViT0d4NW9ENWZuVWxRVTB3ZWovYU9vUGtrTmdTU2RSVUZyT1dtRFEzbWxPZ2JXT2VrTTBpcDdQYzRPalVBS2dpTVA0Z0ExWGk0Sk9Gc3BpdlZGdDhQNjRCMDZ4YnlubWNPYmg4ZGl5U2xxdVJHY1g1ZVRlT0ZrNHlLVnciLCJtYWMiOiJkNGZhNDM5NDlhZGJlZjM5NDU2YjA3YjhmZjg2ZDVlMTE2NTVlYmVjM2U3OTQ0YzdhYzQ2ZjZiMGRkNDdhY2JmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlFPMmNqbWpFcGJYd0tlQ2J3b3Fqbmc9PSIsInZhbHVlIjoiNTJqOEo1SmV1dU5qT0NncU5nVGFIanY4WFY0NE5nNk1YTzB3RXJqN2U5emlxaVJMcE95STRVU3FPOHptTGhIUW1uTEtpZVFsNnF3NnNqR1FsUWh2Y0ZIVlJGeUNpZm5qZmxDRFVtZks2bzI5MDE2YStKQ2I5aFoyMVZIbHV6ekQiLCJtYWMiOiI5MDMwZTQ1NDEzY2U3Mzk3ZWM0ZWMzMjJkNWY3MDM2M2ZiMjg1NWUxYWQxOWRiNDdkOTQ4NmFkZTY4M2JjZGU2IiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961055, 1716961055),
(11766, 'default', '{\"uuid\":\"385ee4b7-4fa3-4518-b327-f288642d0421\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IklIR2FOc2Q5K0JMN3pFSWZ1MTBidkE9PSIsInZhbHVlIjoicG5tZ3p3czBURytYdXQ0K0NMNWxGODFWTXBWUmpHWlJTT3ZCYXNsVEdDa2hrRUpkWmNGTUE4WmVxL3RXRFVHczZSWE51TTVldXJVWWlCUVB5MUUzSTNEQXJBMkt0V2NWZXRFYzN1OVNBaXVBMjF4SXpUVklmVTV5NU16ZDdEL20iLCJtYWMiOiI4M2Y4Njg1ZWVhM2I5NjNmNDdiYTM0MzQ2YjM2N2Q3YzMyZWQ5MTFhZDU1YzAwZTljZDMwNzNjMjYzODUyMmQ5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5hWDk3Y0pOZDRIOTZiejF1S25BVVE9PSIsInZhbHVlIjoiV0p4QWVoZXFidWtMdjlHSCtBL21kZVlwZjNTSVVBeGswdzJsSld0TmZ6N2c3WndTWFJHNU1uUzVldmJNd0hlVUl1Nkh0ZEhSVVl1T0lBRzE0a0lxdURJc3hMWHB6Z2JnVTVsSVVXdXFQNFJyWklFbnAwWFROalVtc1ZRTGdYUnIiLCJtYWMiOiJkYmUyNGExOWM3YTUxMzdjMDVkZmU5ZTIwZGM2ZTNhMzBhNGZiNjNmYzA0NDJlMWUxMDVlZTE4MzE5NjcxMjRlIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961112, 1716961112),
(11767, 'default', '{\"uuid\":\"5ae5a0e4-3a94-4931-ba3e-13bf6b94fd53\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IlREVDA2U2s0dUdBaU0ydHBuc1FYOEE9PSIsInZhbHVlIjoiYjVLRFh3L04xZkRMcjlpYjVLNUtMdDRCYkNvemRrd3VxTkhNc2J2bmdZRFdUbXVST0dSaldyZ0Q5ZHB0K1pyYmsyWlZvWjl0eG5oVWdYaGIreWx2OTdxeVg1L1QxdlNZcS9RWU9SZG0xQUVKVW9HTW8zSU9YVW9xK3hrOXN5cDgiLCJtYWMiOiJlNDA4NmUwMDdiYmU2Yzc3MmJmZTliMzI5NzRmMzNkYmRhYTAwMmU3MmI0MmJiNTE0YmI4Mjk4ZjdiZDdmMjM0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImhsM0U2OWhYNWU4Qk5qbzNWV1NRUVE9PSIsInZhbHVlIjoiKysvRU5ZdUt2c0ltRmorWXQwUklzdHVaOUR3YmpHYi9LRERSMHRYejZxL2VleHF6aGc4TUs0U1RQeVF1V1ZXWE92a2dqUGFTTnpKcXFlRTRiRjRaSUFhdUNpaTJ3cHNlT1RudDR6ZHEzOUxMRCtXNG5KV0dVTzl4VDJmaWNaUTciLCJtYWMiOiJiZTVjNTA2Mzk3ZTE0YWQwZGZjYmIwY2NiMzQ0MzZmMzMwYWFlZTNlNTFhNzU1ZjE3MGE1NzBmMjA0NDY1MjhlIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961162, 1716961162),
(11768, 'default', '{\"uuid\":\"77fcd32c-c02c-4a58-8eb9-e625f7f7b5e7\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":2:{s:8:\\\"\\u0000*\\u0000model\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:29:\\\"Webkul\\\\Product\\\\Models\\\\Product\\\";s:2:\\\"id\\\";i:612;s:9:\\\"relations\\\";a:2:{i:0;s:16:\\\"attribute_family\\\";i:1;s:16:\\\"attribute_values\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:54:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns\\\";s:7:\\\"referer\\\";s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:72:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6InBKdWpPRThwS1pDYk1pd0FXaFBTVXc9PSIsInZhbHVlIjoiZURqR0JqOFE5M1JXSDV1QzdHTXh5RkRUZEdiWVF5VUVXK2w0T2hRT1BJL0ZYdFFONHI4dUhKV3dzNUpDN1VDY0NyRXpqdnJ5TVNzbEU2YWQza1JnUXUrdTJGcHVpMVU0czVuWDYraDNGWkVLRGlsekpaejh0SXNiNjBjRFVwTnIiLCJtYWMiOiIwMjRhM2VhMzlhOGNlMjY5NTYxODgwYzk5MjJjNTUxYTFjYzRkNDVkOTFkOWQ1YzczMjljMjk3YzUyNDIzM2FlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Inc3K0JjVHU5b0R6ckFTVktsa0hmWlE9PSIsInZhbHVlIjoidGcyT1AzZStzSVdrYzJKdGNsV3pKbjNuNEV0SVhSL3FmOTBDQ0o1blQzZzdJb25PZGdPUjU2SUZ2d29IcjdnM2dNblJiQjZPa1JuTG8xdlRhMVhqQzhIQ0phYi9NaEwyelh1VjJTdTErTk5HNTE0VG1yVHRjSUVLYjVORWR4anciLCJtYWMiOiIwZjQ0ZGRiOTY5YWI0YmE1YzM2ZWVjZDY0MmJkN2Y4N2Y1NTZjNzcwYTgyNDE4YWMyNWY0N2JhYzNhNDRlMWIzIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961218, 1716961218),
(11769, 'default', '{\"uuid\":\"ca60ef20-4aa6-4dc5-b02a-6acedf21282a\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:9:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6Ik5aWDUwcGpNRlJxTS9wSlhkRENTckE9PSIsInZhbHVlIjoiTUZTQ3E4WWpRYlNsY0VXN0o2NkxiSFdOS29UaCt1S2cxR3lEQUxXNmpxSlR5MTh2RWxlREZZZEs0SWVQSXpQTjMyZGkxeUppamE0SU51cVZtMiszbU9KcDB4cllHaTVqcGc0cnN4SUdjRDVOekxGaUExYlNYVHgvZUs1VUpPRDgiLCJtYWMiOiI2ODBiNzE5MjNiMGY1YmVjZDZhYzY4ZTk4OTVjZDE1YTgzMDJiYmU4Nzg3ZDZhMWFlMjg5Zjc0NGMzNzRmMzk2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InZqNFZ3cXZ6ODZoMzRMeG5CL25US3c9PSIsInZhbHVlIjoiUzhqRDdmZ3FxTnhSOWV0Wnk0QjdqbGlUWXc4ck54cldhdFJXOXhwZTUzbm5CTXlWU2M4SndlOTlnUUpxS1hkckljY2FnMjN6bENzQ0ZTNGEzazdiemR0WHlZQlRMZVVmYTlxY3RCWnBxZFFxOVJBejh1ZnlvcXh3T3pLdzRKSE4iLCJtYWMiOiJjOTQ2YmZmZmEwNjc0NWM2YzM0MTM1Njc2OTdjMjQzYWIzNWY5NDNiYTFmNzAwZmNkYTMzZjE2YWJhMDE2YmRlIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961602, 1716961602),
(11770, 'default', '{\"uuid\":\"008513bf-fb02-46ba-a464-eb631ae58458\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6Iit1WnpHOGF6UVQ5M0tHa2wvelV4dHc9PSIsInZhbHVlIjoiVTR1aUkvWDJ6bXlVOGo4TnBPTnlZTGxnNUFRNjhRZ1hkMk02VlRRbmNKVVZBLzhjUDE0WG5HNUN3WEtkV3hHVlg3azZJLzc5L2VwNlFmUEJZWlRjYUdLSTBNWXhwYVpxQ1A5WmgrSmZWUVlkK0NMUkdGMktBdG5qTDV3RHF0YXoiLCJtYWMiOiI3MzQyYjg0ZWI1YzY5MmY3ODRhNzQ3OTFlYTE0MzFmYzE3MmU1N2E1MzBiODIwNThlYmM4MWI3OWFhYjAxOTI3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlhGekJlTFVjNXVJa0xCTENuNmRBa0E9PSIsInZhbHVlIjoidHg4ZGRvSnc5eS9idzJGeVF4bm1aa200VHU3UkZNNWpoWjZ6WjBOcVR6MXBSS1FmK3drc3VkYjNEUDhaUkxyb080RnBBcGpMVVJxdVFIVzBvcUhtc1FKYlRBTzE0a0REbzFQa2ZBL0tyTEU0SmxHV1g2WVBZTzc4UTRlVnhaNDMiLCJtYWMiOiI0NjA1ZjVlY2FhMDBlMDUxMTc2ZjE2YTA0ZWNkM2Q4Yjk5OWNkZDI4NjlkMGJiZWQ3YWU4ZGU2NzY4YzZmMjY2IiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961643, 1716961643),
(11771, 'default', '{\"uuid\":\"686e1a06-1c6a-4131-8493-97aed7712f64\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:65:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/attributes\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6Imp5dWJVL08vSmRONUU2OGJpMTBGUVE9PSIsInZhbHVlIjoiMHZBN1F5TTVMaVQ4S1NsVEw2akxveEpUbWZ6dy81cXhYUFRHa1BWVG8zK1N2WW9INm9OcElBL2xiNTcxeHlTMGlKdkhlWC9Bcm8yYXk2cFVFaTR2NkdmeCtvSk5VeFVlRVFiemcrNWYvUXduSjgyanJkaWJoNjd3VmNicWNiYnAiLCJtYWMiOiI2NmI1MTEyZDc2YzAzZTQ5NDBlYjE1YzA5OGFhNTA1NDZiM2JjM2ZjNGQ4MWMwYzVlNGU1MjI1NmZhYzEzZGNkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikk3RHVwaDZUcHRWSTNrUEpHZ2VzWlE9PSIsInZhbHVlIjoieUpCanVwSVFvemtCTUtCR1FsT2FGT2V3czVjNzVsdTlmdjExNlhmL24xWlFKYnowcHo0blpRVnVYcGFGaCtaRFFtcWtvQndHS0ZLSzhpR0ZCVy9pSHpiYVhyME5aa2lmZVpnd2YrbDExQUJQOWdmbWhrY1hYOVAzWmxBdmhTSVgiLCJtYWMiOiIzY2I0MGY3ZjI3YmQ0YzE5OTcwOTM2NjhkZjJlMmM5NDUyOTBmYjRlYjY1Y2M1NDdkZGIxYTk4OTRmYjA1MGUyIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961687, 1716961687),
(11772, 'default', '{\"uuid\":\"7ed1e1ca-e874-4223-a239-850bfcfaed3d\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IjZ6TUgxcmRDb3ViKzd2VUwrZEJDVXc9PSIsInZhbHVlIjoiYTVlMGMwWVFVWWh5RDNDVXFBNHA2M01iWDYrYW05OWtDYzJHWHFpcWdDZzJ6b1BGZzlRSjBXQzhMWTliMWdZS1kyMXpmcWlBQm1qOWNjK240Q01YQmVOWjRpTzhGeUUzaEJQRVF1bHNhNTNRbFQ0TGg3MTFDMitJbllMOWQwVVIiLCJtYWMiOiIyNmJhZWVjOWIyYjU3MGM2NmQwNWUwZGIxYzljZTNjZWY2ODIzZTA2NzhkNjA4N2EzZmIyZGEyZWI4NmYwZGQwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ilo3YXg3eUxCY2JkZ0NtV2pwS3lMcFE9PSIsInZhbHVlIjoiQkxVNmprUXVvRWhUSHo5NmE2c09xbEpXOEZ0NkFjRUk0NzMrZ3U2VStWZWM5RE5qTHZTeVprVzdkNzZXWDRnUlgxSm85UlJZRXJ0OE9GZUFsZVZqM2ZFcFBPWTYwZlAzcVJmZnRHYmtLMnNPZHdiVWJUbGpqWnUzdnR4M3hoYkkiLCJtYWMiOiJhMzEyMWJjZjEyN2ZmZWJhNmQzMTRjNjg3MTI3ODdiYTFkYTE3YzUzODUzNDU5YTYwNDAwM2I2YWYwNGJhNzgwIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961691, 1716961691),
(11773, 'default', '{\"uuid\":\"1bc28455-a254-4a85-bbcb-24920e59a639\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6ImNSekNmQ0ROTlFadzRWcFV5aW5OckE9PSIsInZhbHVlIjoiTnFPY21ZOTJTbjRVTi9mcWptT3g1UlZmVktMSGNVUTNYU2wwemZIVC9XYzhnaXRMd0lzaVViQSt3cWp0bzdPcWFudzMyV2VTVFg5eWZ2SzlkZW5uMjhRYm9DTnJOVnpDNnN2T0NQRlVGNVd1VFhORkJxcHd1RnJaazV1UkEyUS8iLCJtYWMiOiIyMjgwODc4ZWQ4ODE0YWQ2NjcwNmNhNWEyMGU0YTFiNWRmYTRkOTdkMjc2NTZjYzZkNWRkNTRiYjA5YmIzYTc3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlV5a2VzR09qR1NGOHZQZUZhUi84MFE9PSIsInZhbHVlIjoibmRHdy9GSnpqQkZFUm1XN2crb3JheDM5a1kralZJaUlQVENhQnNDSUlyK3RnODFOZXQ0Y0RmWENkU0VZMXNkU2NBdUlqRXlwQVdhdEN6NUVpa1pCc045SmtxTGZBVithbURybXZqbGx6L1hyRHJPZ0JBa2NSTWVHOGc3RGFGVCsiLCJtYWMiOiI0ZmI4N2FjMjAwNjUxN2FmOTZjMzBlYmU5ZjgyYzE5ZDA2YzE0ZWU5ZGVhNThlZmNhMjY4M2Y5NWNkMTEwMmFmIiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961729, 1716961729),
(11774, 'default', '{\"uuid\":\"bc329f8b-6f11-4ab6-be01-327d5581609c\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:131:\\\"Mozilla\\/5.0 (Linux; Android 6.0; Nexus 5 Build\\/MRA58N) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Mobile Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:131:\\\"Mozilla\\/5.0 (Linux; Android 6.0; Nexus 5 Build\\/MRA58N) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Mobile Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IlFoYlhuNUE3dzBmZ3k4d3cza0QyeGc9PSIsInZhbHVlIjoiVlAxT2Jib09HSW5PVFVpK09LWVJaTk5mbXFaMGlFdGdUdThKMDJoVlBHSWtTcitzZTJJVHBLckpzbVRtYW5rclRRb0NCandCcWFxbjhQMUh1cVJDeXo1RnBKbTVPaW1LTFpRTlNkZDhhdTQrTkFLUnlPYzJjdU9BeWp6VU9mZ2ciLCJtYWMiOiI2NWE5MThjMGQ3NDMwMzdlNDA5YjBiMjk0MDIxYjZkMjQ4NjYwMzE0OTg0ZGFmZmJiYWQ4YzcwZDIzMDZhMGExIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlRHUHRuc21qMmpjcEEyVEVaOW9aYVE9PSIsInZhbHVlIjoiMmZLRHFVaHpUVzBkVVdINDRncFBDYWp4MGo4VFB2amlHZ3VpaEhXVmNsSnlrSHpFL1pFTjdWTGNodzc5YW14Z21wTytYMS9oTmpUNmRGQm9xL3htSU9vVzFvTlhtZXN1MXZsV3g2RUU4RmFzSk5LbzBVWVVhT25kTlZneDZHZzQiLCJtYWMiOiIxYmRmMWMxZGRlYzQ0ODU0NzI1YzU5NzdlMTIzZjFmOWQ4YjY2MmZkY2UyMDE1YjUxZmNiZWNlNmI0ODI2Mzg5IiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:5:\\\"Nexus\\\";s:8:\\\"platform\\\";s:9:\\\"AndroidOS\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961739, 1716961739),
(11775, 'default', '{\"uuid\":\"23ba3abf-3ed8-47b5-95c5-2416fe8936ac\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";s:7:\\\"headers\\\";a:10:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:13:\\\"cache-control\\\";a:1:{i:0;s:9:\\\"max-age=0\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:101:\\\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IjBqaytaajhmdFFpU2NkanErTERSWWc9PSIsInZhbHVlIjoiYW4vV0thblRpdXFiQ3BFR0E1eE4xTnlES2lRR2F3bHhRL1c4WVQvbWZlZTl0NGFJSHlrVlhGZnVoY2IyVURzZnJDaVRab2g5MTVSLzJBVGoyUmJNT1V3UjlMWjVZdWxIUGZkS1NnQW1WV0NJaGVIVnRPMEo2QnNBQ2d4cVZZNjAiLCJtYWMiOiI3NTE1YmE5ZDFjNDdhOTY0Y2Y2ODMyZjIxMjI1MmNmYjBkOWE5YjFjNTRiZmE0ODJhMDBmNTc4ODBhZDcwYjQ5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFqN25qQkM0NUh6QkVEaDBpNDFnR0E9PSIsInZhbHVlIjoiVkxKWjU1NzRyWVFaVnVpTE9jTGNYczFMZFE2Q0wyWGZBVDduNkJlbzJUSzFsTDZFTW9wSEEvMGZDNnkyajhsQUlxNUlCUE5TZmMxZ0NNMEFxbndBbXgzYnZpRWZYdCsyazNIeDQ0aGVmaEpBZmpjbzM2UjFqWWRGak1ZLzNBWWsiLCJtYWMiOiJhZTUwZWRkMTA3M2NjYzE1OGM4MzJjODdkZDRlMWQxMDk3Y2UwMTZlZjM5MjI5NDIyMGNmNjEwMjcwZTE5ZWU0IiwidGFnIjoiIn0%3D\\\";}}s:6:\\\"device\\\";s:6:\\\"WebKit\\\";s:8:\\\"platform\\\";s:5:\\\"Linux\\\";s:7:\\\"browser\\\";s:6:\\\"Chrome\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961792, 1716961792),
(11776, 'default', '{\"uuid\":\"979eff41-fb8c-4b82-b295-85aee87223d3\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:139:\\\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/603.1.30 (KHTML, like Gecko) Version\\/12.0.0 Mobile\\/15A5370a Safari\\/602.1\\\";s:7:\\\"headers\\\";a:12:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:139:\\\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit\\/603.1.30 (KHTML, like Gecko) Version\\/12.0.0 Mobile\\/15A5370a Safari\\/602.1\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IkdLWVI1cU1XWEhXK3Bjb0VHRllRWnc9PSIsInZhbHVlIjoiUTNpVUpISEgzWm03Qnp1S0Z2c2JSS0JJcUtWT3c3Y3pJTTAxR1ljTW5qeXlMREJ5b1YzKzRRTjh1dWhkR0c0bGxZcjdZYkY3UWR2SnBqcFVKODhyTFRjUlMrMlloL1VJL1VKNkNyWjZGZVdSZURBeGJUKzRiUnVFSXFuRGo0U3kiLCJtYWMiOiIzYzgxNjc3MmY3MTNmMDQxZTcwZGMwODUxMjkwMWI0NTFlZTllNjQ2NGVlNjg0YjAzYzExYzBiMzg1YTQyNDAzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Imt0VnpFYlpwMFM2RFJxNkFFVThLUXc9PSIsInZhbHVlIjoiYitSL1lHbFNwM3RwcGRvdE83STkybGtkYlhySURYcXNLV0JTVUNsZEtxdEp2cUEzYkhMYWtJMHM1dmtycUF5a2ZTMlhKWWJMWUErRGh3dUcvN1UxcFVPVy9PYWJtNHN2WWJjVHdPZkhzSnJneGZ0c2NrM3MvR3BKTTFIdmVhZG4iLCJtYWMiOiI3MzM1ZWNmM2Y3NWVhN2E0NzQwM2UyZTUyMDU3OWExYmU0MjE2MDU3NWIwZDFjMGZiMTBlNGNkZGU5NTljYjExIiwidGFnIjoiIn0%3D\\\";}s:16:\\\"sec-ch-ua-mobile\\\";a:1:{i:0;s:2:\\\"?1\\\";}s:14:\\\"sec-fetch-dest\\\";a:1:{i:0;s:8:\\\"document\\\";}s:18:\\\"sec-ch-ua-platform\\\";a:1:{i:0;s:3:\\\"iOS\\\";}}s:6:\\\"device\\\";s:6:\\\"iPhone\\\";s:8:\\\"platform\\\";s:3:\\\"iOS\\\";s:7:\\\"browser\\\";s:6:\\\"Safari\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961959, 1716961959);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(11777, 'default', '{\"uuid\":\"79b495f2-efc1-4478-8c56-0564bdb76e52\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:119:\\\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0.1 Safari\\/605.1.15\\\";s:7:\\\"headers\\\";a:12:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:119:\\\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/14.0.1 Safari\\/605.1.15\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6InZVUGxTK3RFUjk1UStzVlhma29kd0E9PSIsInZhbHVlIjoid3NPYkt4dzJnVjRTSno5MjIycFMvTWhNMTR4ZWxjdWhGWjZiZzcrK1dSQktWZFV3dHBOcWNXVWtQVnJ3Um5sV1RnekpkVjRDdnRrTzlkSHNXdERZemloaTFiQzJVdFZCNVVYZytLZXhHSGR4SER2ejN6c2g4dU8zdFRwTHdHVXAiLCJtYWMiOiIzMzYxZWFjMDJkNzcwZGViNWEzYTM1MTVkODk2NTM0MTg1NGVjYWY1ODc1ZWRlNTNmMTFiM2ZhM2UyNTEyYjY3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IitTRGFYSm5HVGZkaXBKSFg4UUpTMUE9PSIsInZhbHVlIjoibjNiWGJwbk5TNi9nQWJvWlBYTjdzQ0tLemZ1dkVNUng4L2Z0QVpvZEFHQ0dPUFRROTVoL3luQUs4RDBNU2Q3elkyWDFZTzRjK095L1g1NFN4SFBxVHlMaGtrc2JwdnkxZnlLU1NTcVZSa25heUF5d2lIYWRuV3VnOGswUEdoL0MiLCJtYWMiOiI0NDI5NGNjZDg5OWU3ZmI4NDI0NDY5MTEwNmI0YzA0MDYxOGFlNGZlZjA4Y2IyZDIyNGRmMmRmMTA0MmI2MDY3IiwidGFnIjoiIn0%3D\\\";}s:16:\\\"sec-ch-ua-mobile\\\";a:1:{i:0;s:2:\\\"?0\\\";}s:14:\\\"sec-fetch-dest\\\";a:1:{i:0;s:8:\\\"document\\\";}s:18:\\\"sec-ch-ua-platform\\\";a:1:{i:0;s:5:\\\"macOS\\\";}}s:6:\\\"device\\\";s:9:\\\"Macintosh\\\";s:8:\\\"platform\\\";s:4:\\\"OS X\\\";s:7:\\\"browser\\\";s:6:\\\"Safari\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961968, 1716961968),
(11778, 'default', '{\"uuid\":\"ce8aae3c-50ec-4fde-91a4-8b5541b3cab5\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:128:\\\"Mozilla\\/5.0 (iPad; CPU OS 14_0 like Mac OS X) AppleWebKit\\/537.51.1 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15A5341f Safari\\/604.1\\\";s:7:\\\"headers\\\";a:12:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:128:\\\"Mozilla\\/5.0 (iPad; CPU OS 14_0 like Mac OS X) AppleWebKit\\/537.51.1 (KHTML, like Gecko) Version\\/14.0 Mobile\\/15A5341f Safari\\/604.1\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IjFBUDlTS25TVmFWNTZ2M2d4QzlxclE9PSIsInZhbHVlIjoidHpiSWpSVUFWK3VjYTFXVlRIY0FJREt4NnJWZDhQbHJyaUh0dmlzM2NQR2trZnA5TjMvbFFoWGVKZWdCcExJZm55L0dXd0xnaENpY2UrenU4T01iaGRTVTBUVVdxU3A2VXhyLzZPazlDTElvWlRZYjZURkdhYXdRSTZvMVNQWFUiLCJtYWMiOiJhYjg5NzY1Zjk1NTY3OWZkNjRkMWE1ZWM0MGI4ZmQ3MTg1YjAzNzkyOTk5MTZmNThmM2VjZDM2ZjJlMTZhOWY2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImtSVGIzQTNDRXZ4dm13NVpmSzE1dmc9PSIsInZhbHVlIjoiKzVKQks1RXdkQVZxUkxydXhzTndIWlZYRkNKMGk5SUhKUndReGRKY3NQYTVYRmVwd2M3MndvTE44M0lRVS9JNnEzYXdzWm5GUU1qU3lHYnVGYVZ0Y25uKzc1RnEwS3V6ZHYrek9RL1VxSW1jTlFiNXI4N0U2Ymh3MHF5NFdBSm8iLCJtYWMiOiJlZTBkODQ5MzE2M2Y3NzI3NGYyN2Y0NWYwMzhjZDRmZjFhZjk1MzYwNzFkMDgzODMyODFjOTVhN2Y3ODNkZjgzIiwidGFnIjoiIn0%3D\\\";}s:16:\\\"sec-ch-ua-mobile\\\";a:1:{i:0;s:2:\\\"?1\\\";}s:14:\\\"sec-fetch-dest\\\";a:1:{i:0;s:8:\\\"document\\\";}s:18:\\\"sec-ch-ua-platform\\\";a:1:{i:0;s:6:\\\"iPadOS\\\";}}s:6:\\\"device\\\";s:4:\\\"iPad\\\";s:8:\\\"platform\\\";s:3:\\\"iOS\\\";s:7:\\\"browser\\\";s:6:\\\"Safari\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961982, 1716961982),
(11779, 'default', '{\"uuid\":\"3db3a1d1-3a5f-4bb8-a760-633d9cd57a79\",\"displayName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\",\"command\":\"O:39:\\\"Webkul\\\\Core\\\\Jobs\\\\UpdateCreateVisitIndex\\\":1:{s:6:\\\"\\u0000*\\u0000log\\\";a:13:{s:6:\\\"method\\\";s:3:\\\"GET\\\";s:7:\\\"request\\\";a:0:{}s:3:\\\"url\\\";s:40:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\\";s:7:\\\"referer\\\";s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";s:9:\\\"languages\\\";a:3:{i:0;s:5:\\\"en-gb\\\";i:1;s:5:\\\"en-us\\\";i:2;s:2:\\\"en\\\";}s:9:\\\"useragent\\\";s:139:\\\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit\\/603.1.30 (KHTML, like Gecko) Version\\/12.0.0 Mobile\\/15A5370a Safari\\/602.1\\\";s:7:\\\"headers\\\";a:12:{s:4:\\\"host\\\";a:1:{i:0;s:14:\\\"192.168.15.214\\\";}s:10:\\\"connection\\\";a:1:{i:0;s:10:\\\"keep-alive\\\";}s:25:\\\"upgrade-insecure-requests\\\";a:1:{i:0;s:1:\\\"1\\\";}s:10:\\\"user-agent\\\";a:1:{i:0;s:139:\\\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit\\/603.1.30 (KHTML, like Gecko) Version\\/12.0.0 Mobile\\/15A5370a Safari\\/602.1\\\";}s:6:\\\"accept\\\";a:1:{i:0;s:135:\\\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\\\";}s:7:\\\"referer\\\";a:1:{i:0;s:41:\\\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\\\";}s:15:\\\"accept-encoding\\\";a:1:{i:0;s:13:\\\"gzip, deflate\\\";}s:15:\\\"accept-language\\\";a:1:{i:0;s:26:\\\"en-GB,en-US;q=0.9,en;q=0.8\\\";}s:6:\\\"cookie\\\";a:1:{i:0;s:759:\\\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IllTRTdKTEIyY3JRaUhFbTRGUUtEWVE9PSIsInZhbHVlIjoiY2dGT25nRlNqcGZNSkFyeVdIakt4YjA3WmF4Z3JxSEZqSERVV005Wmo5QTFEVXBCemFHM1c5SjQ4bFFkVVVuVzZscU13VzB3UVNkb2VnMmNWVWtFS1p5WmVhakhuekRqblJLWWJBMVcrM3MvSkxhQ3k4VFZhaG1UUW56UUVkUy8iLCJtYWMiOiJlMzczY2E1OTM3YmExYWNjZWI2ODQ1MGZmZTk4ZDNjMDMwMWQ2ZDQwOTc4MGJjMDQ3ZDVhYmViMGFkYTJjMTk0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5GbVJVa2VJOGpHT2pVcyt4VEc0VHc9PSIsInZhbHVlIjoiQVdjQ2NsY24zRnZWbUdENUdCYVI5MmYvRUw0Q0NIQk83YjdOTEQzZHpHMHNrYTV0UU5mTEhsYSt0ZkNDTU9EU1VTelEwMEduZ1B6eFl3bE94YmV2R1lNbDNnNDVjbVZkOXQxbkMvbWFvZTkxOGZLOFQyaVFaVTFJa0VpSkttVjkiLCJtYWMiOiI4YjQyYTU1YmM2OTIyOTA3NThhZTFmYWM0YmFjZmZkNmMwOWQxNjI4ZTA3MWY0MzZkMmE2ZGE3ZTk3NzRmNGUyIiwidGFnIjoiIn0%3D\\\";}s:16:\\\"sec-ch-ua-mobile\\\";a:1:{i:0;s:2:\\\"?1\\\";}s:14:\\\"sec-fetch-dest\\\";a:1:{i:0;s:8:\\\"document\\\";}s:18:\\\"sec-ch-ua-platform\\\";a:1:{i:0;s:3:\\\"iOS\\\";}}s:6:\\\"device\\\";s:6:\\\"iPhone\\\";s:8:\\\"platform\\\";s:3:\\\"iOS\\\";s:7:\\\"browser\\\";s:6:\\\"Safari\\\";s:2:\\\"ip\\\";s:14:\\\"192.168.15.214\\\";s:10:\\\"visitor_id\\\";N;s:12:\\\"visitor_type\\\";N;}}\"}}', 0, NULL, 1716961987, 1716961987);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `job_batches`
--

INSERT INTO `job_batches` (`id`, `name`, `total_jobs`, `pending_jobs`, `failed_jobs`, `failed_job_ids`, `options`, `cancelled_at`, `created_at`, `finished_at`) VALUES
('9b9dd9c1-5152-482c-8632-0296aa1ef9ff', '', 1, 1, 1, '[\"f8c3e518-c896-456f-8553-af8e7597a4e4\"]', 'a:0:{}', 1711022666, 1711022654, 1711022666),
('9b9ddc11-4a05-46d1-981c-0227903a9672', '', 1, 1, 1, '[\"29e1ed31-1720-446d-b3a1-4f373bfd4911\"]', 'a:0:{}', 1711023044, 1711023042, 1711023044),
('9b9ddc3e-40e3-4c80-a4ac-639ccab8e1ab', '', 1, 1, 1, '[\"e2dbf432-2ee2-43a8-afcd-0c3a960503aa\"]', 'a:0:{}', 1711023075, 1711023072, 1711023075),
('9b9ddc9c-72e4-4647-aa4b-1275bf1e8a5a', '', 1, 1, 1, '[\"364c2fa6-b820-429e-84e4-8bf677bab294\"]', 'a:0:{}', 1711023136, 1711023134, 1711023136),
('9b9ddcf7-bfa0-4fdd-b234-ade3df51454e', '', 1, 1, 1, '[\"2033a40a-99b6-4efa-bacc-a0a793e9284e\"]', 'a:0:{}', 1711023286, 1711023193, 1711023286),
('9b9ddf0e-4dff-43a7-b942-70ff6f5d87f4', '', 1, 1, 0, '[]', 'a:0:{}', NULL, 1711023544, NULL),
('9b9ddf45-68b0-446c-90f4-57e783915d1c', '', 1, 1, 1, '[\"df2c1fa7-4cdb-4583-88fd-84aa5c641439\"]', 'a:0:{}', 1711023580, 1711023580, 1711023580),
('9b9ddfcb-59dc-49cc-b931-fc24670d2d6f', '', 1, 1, 1, '[\"e8eec663-9641-405d-aefe-33bf784f3472\"]', 'a:0:{}', 1711023761, 1711023668, 1711023761),
('9b9de046-0ff6-48a3-9397-5bcef9b5412e', '', 1, 1, 1, '[\"129da322-fa5c-4a6e-a6c7-2f79f57b87ad\"]', 'a:0:{}', 1711023751, 1711023748, 1711023751),
('9b9de0d2-54b6-4336-ab9e-6b5e706f4816', '', 1, 1, 1, '[\"89bbe94d-31a4-45f2-ac7c-a62cc3b3a3a1\"]', 'a:0:{}', 1711023841, 1711023840, 1711023841),
('9b9de138-f10c-4c15-aaf4-34f7ffe88db7', '', 1, 1, 1, '[\"69a4664f-ce51-45a5-b241-f1d47e046807\"]', 'a:0:{}', 1711023998, 1711023907, 1711023998),
('9b9de1b7-4ffc-4ff5-8b5d-775819d8c6da', '', 1, 1, 1, '[\"b7a0cc2b-e875-46d5-b8c5-a3c462d97878\"]', 'a:0:{}', 1711024081, 1711023990, 1711024081),
('9b9de60e-9af7-42da-bf17-0630f94505d8', '', 1, 1, 1, '[\"3860f6df-c433-4a12-b2fa-313782e08c08\"]', 'a:0:{}', 1711024721, 1711024718, 1711024721),
('9b9de62f-0a34-4ddf-b9cb-9e30ecffa34c', '', 1, 1, 1, '[\"ee4d3ed5-c08c-4021-bf0b-d91923c8cfec\"]', 'a:0:{}', 1711024832, 1711024740, 1711024832),
('9b9de677-6de5-4d05-9613-67f4ebf9838b', '', 1, 1, 1, '[\"225aa8f0-ced8-49d0-b604-50d37a91b9ae\"]', 'a:0:{}', 1711024789, 1711024787, 1711024789),
('9b9de6ee-be5a-476a-ad72-7e73bf3bd419', '', 1, 1, 1, '[\"f6366eaf-5701-45cb-a9f5-7295bc1c7936\"]', 'a:0:{}', 1711024867, 1711024865, 1711024867),
('9b9de722-900f-42a7-9c82-66eada4a57ee', '', 1, 1, 1, '[\"eea27916-effc-48a0-8100-6a1b34a81f28\"]', 'a:0:{}', 1711024901, 1711024899, 1711024901),
('9bb9742d-d36b-4245-a203-938206fe86b3', '', 1, 1, 1, '[\"69331a42-2b00-4762-8a34-28ba0bf23f9f\"]', 'a:0:{}', 1712208298, 1712208204, 1712208298),
('9bb9746e-a762-4443-a028-e7d2a8905995', '', 1, 1, 1, '[\"708230f7-6525-4581-a466-803d69467a33\"]', 'a:0:{}', 1712208249, 1712208246, 1712208249),
('9bb975ab-5905-4e6f-aa7a-ebebc476a149', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1712208454, 1712208459),
('9bb9784a-8d28-4bfd-af6a-4e9dc56d274e', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1712208894, 1712208898),
('9bb979b9-b1b5-4698-81c7-c52b84d24086', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1712209134, 1712209140),
('9bb97ac3-e9af-43f3-8149-ffc743467711', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1712209309, 1712209312),
('9bd812e7-24a1-40f9-8615-cdd5c786c34f', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523323, NULL),
('9bd812fc-79b8-468e-a549-4efc8e01f839', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523337, NULL),
('9bd8135b-4ec1-4224-8623-5d61f3b6f0a7', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523399, NULL),
('9bd813a0-c4a4-4d25-b805-5381e32fa252', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523445, NULL),
('9bd813bc-7f96-4af6-aa75-ca7d7ef53cdf', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523463, NULL),
('9bd813e8-e98d-4e4a-9636-90232bbcad84', '', 0, 0, 0, '[]', 'a:0:{}', NULL, 1713523492, NULL),
('9bd815b8-9f53-4033-8922-ee6774677729', '', 1, 1, 0, '[]', 'a:0:{}', NULL, 1713523796, NULL),
('9bd815e8-6244-4d72-bd92-ec9a4fe757f0', '', 1, 1, 0, '[]', 'a:0:{}', NULL, 1713523827, NULL),
('9bd81f28-3f19-4681-b695-d5205439a375', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1713525379, 1713525386),
('9bebb3c2-945b-4cc5-8f6d-96ba6b7a2a52', '', 1, 1, 1, '[\"7afc9d1d-f9b1-4c85-b096-b70de8c32ae5\"]', 'a:0:{}', 1714366358, 1714366354, 1714366358),
('9bebb794-2693-4ef8-b915-2667dd89d44d', '', 1, 1, 1, '[\"66235bfe-104b-4d0e-97a5-77c987fcb1d9\"]', 'a:0:{}', 1714371482, 1714366995, 1714371482),
('9bebb80b-5f45-4c18-bfd0-48b19aec4d1e', '', 1, 1, 1, '[\"d7c6d829-7db9-40a4-a5e9-b7a5c191bdac\"]', 'a:0:{}', 1714371412, 1714367073, 1714371412),
('9bebbc91-3601-432b-bdc4-582d3dd1ccf7', '', 1, 1, 1, '[\"c9313824-9a44-43f7-91ad-2a703403e7de\"]', 'a:0:{}', 1714371412, 1714367832, 1714371412),
('9bebbd94-592c-478b-ab4a-73893756f2e5', '', 1, 1, 1, '[\"ef145575-2dd6-45f9-b0ae-4f208af279b7\"]', 'a:0:{}', 1714371412, 1714368002, 1714371412),
('9bebbe0f-5639-4641-b624-54b5d634e8fd', '', 1, 1, 1, '[\"dd625cd2-5515-4f13-b836-3cc3053b1760\"]', 'a:0:{}', 1714371412, 1714368082, 1714371412),
('9bebbfc5-2cc7-46bd-a425-670160fdf0b5', '', 1, 1, 1, '[\"db3e9824-682d-4f45-8690-891482e19aa2\"]', 'a:0:{}', 1714371412, 1714368369, 1714371412),
('9bebc17f-85ed-485d-a2a1-3272e331c197', '', 1, 1, 1, '[\"3ed177e8-36e1-4ac7-bf12-b0abc60be6db\"]', 'a:0:{}', 1714371412, 1714368659, 1714371412),
('9bebc217-aea7-4e0e-b150-b059f5796bbc', '', 1, 1, 1, '[\"3e0a50fc-a275-4dd6-8a0c-b8bf8b68b0c5\"]', 'a:0:{}', 1714371412, 1714368759, 1714371412),
('9bebc24b-bcc8-45c3-be62-7f00ce969729', '', 1, 1, 1, '[\"693b887a-3695-463b-b81c-3053930db13f\"]', 'a:0:{}', 1714371412, 1714368793, 1714371412),
('9bebcf94-8b33-4477-812b-00b951368489', '', 1, 1, 1, '[\"d66af3b4-442e-414d-9387-3d799fc97c2b\"]', 'a:0:{}', 1714371412, 1714371022, 1714371412),
('9bebcfc7-958d-4774-9550-62e8e44fb3eb', '', 1, 1, 1, '[\"ae510fc2-69f1-41e9-a375-ac11bbc13c68\"]', 'a:0:{}', 1714371412, 1714371055, 1714371412),
('9bebd0a6-ab09-41e5-8604-833877c3c1e6', '', 1, 1, 1, '[\"cb318afa-efa8-43f1-a724-ccdb92727735\"]', 'a:0:{}', 1714371413, 1714371202, 1714371413),
('9bebd132-1515-439c-b8f9-8374ac178e11', '', 1, 1, 1, '[\"efd36171-f77c-4817-b9ce-7e4af5bedac2\"]', 'a:0:{}', 1714371413, 1714371293, 1714371413),
('9bebd1a0-add3-4728-bd9d-5ea7dc1628bd', '', 1, 1, 1, '[\"025afc10-3821-4322-b261-c54430878e1d\"]', 'a:0:{}', 1714371413, 1714371365, 1714371413),
('9bebd246-ea4f-43e8-a0b9-758daf4cb867', '', 1, 1, 1, '[\"430d3116-2576-47a7-9c56-ba430a7517e3\"]', 'a:0:{}', 1714371476, 1714371474, 1714371476),
('9bebd299-a12c-4550-861c-241431860e63', '', 1, 1, 1, '[\"1b31b9a3-6cb3-4d95-8c95-3a2195abc865\"]', 'a:0:{}', 1714371530, 1714371529, 1714371530),
('9bebd344-c6f5-440f-8896-d0955daf4a47', '', 1, 1, 1, '[\"27cac7a4-d43a-430a-bbfc-690a92ebaff4\"]', 'a:0:{}', 1714371641, 1714371641, 1714371641),
('9bebd429-7ebb-4d4b-b615-1ff015465f82', '', 1, 1, 1, '[\"96926f05-100a-4166-a2aa-6ced14a83a28\"]', 'a:0:{}', 1714371792, 1714371791, 1714371792),
('9bebd4dc-7172-4c6e-82c0-1ad89005c9da', '', 1, 1, 1, '[\"d2d87954-abd7-4e6b-b1c0-d74228f9cdbf\"]', 'a:0:{}', 1714371909, 1714371908, 1714371909),
('9bebd502-2356-4941-bcbb-574fcf7f1373', '', 1, 1, 1, '[\"1b84b150-a550-484d-8b32-4ced92900276\"]', 'a:0:{}', 1714371934, 1714371933, 1714371934),
('9bebd62b-49de-4278-bb70-8ed8548d1bc1', '', 1, 1, 1, '[\"8c86b8b9-3d18-474c-875c-3ee795514d69\"]', 'a:0:{}', 1714372129, 1714372127, 1714372129),
('9bebde9f-8116-490c-a28b-70aba2059f9d', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714373546, 1714373550),
('9bebdf1c-4ca6-459a-aa03-5cfca25094ab', '', 1, 1, 1, '[\"0fbb18e0-2fb5-4f5c-920b-ab8a47cca10c\"]', 'a:0:{}', 1714373630, 1714373627, 1714373630),
('9bebdf86-caf2-4680-87eb-6c1bcd11f72a', '', 1, 1, 1, '[\"c6ac560b-45bc-4838-829d-d3e2a1024160\"]', 'a:0:{}', 1714373699, 1714373697, 1714373699),
('9bebe079-9fff-4b9e-b5ab-9c1e68de302a', '', 1, 1, 1, '[\"e4e6c2f7-adf5-464e-ba05-75ece1591dcf\"]', 'a:0:{}', 1714373857, 1714373856, 1714373857),
('9bebe0bf-9f5c-47c5-9847-410895ec2177', '', 1, 1, 1, '[\"b70a8520-752d-4cf1-9791-c457e25e6ebf\"]', 'a:0:{}', 1714373994, 1714373902, 1714373994),
('9bebe13c-66f7-44b4-ad0d-871076a4e481', '', 1, 1, 1, '[\"197883bb-74c6-4cca-9ab6-820b9eb21c59\"]', 'a:0:{}', 1714373985, 1714373984, 1714373985),
('9bebe2af-f513-43f6-a2bf-580630ce3b62', '', 1, 1, 1, '[\"92236535-6679-433f-a536-ec619202595d\"]', 'a:0:{}', 1714374229, 1714374228, 1714374229),
('9bebe368-9db7-4847-a52d-8b78acd0aee1', '', 1, 1, 1, '[\"59678be7-223d-4a90-b47e-874d5b551038\"]', 'a:0:{}', 1714374349, 1714374349, 1714374349),
('9bebe3cf-d490-4dca-b9bf-94b001fabe94', '', 1, 1, 1, '[\"fbbac4d1-8cf6-4da1-9406-252386a18baf\"]', 'a:0:{}', 1714374418, 1714374416, 1714374418),
('9bebe472-3352-4b5d-bc19-f267dbaec801', '', 1, 1, 1, '[\"180a5b7b-0a26-4de4-83ac-468eb88b017c\"]', 'a:0:{}', 1714374613, 1714374523, 1714374613),
('9bebe4e1-feb2-45b8-9bc0-9a4ef2ba210e', '', 1, 1, 1, '[\"56e7126c-8403-4bf4-837e-e8d270bfca5d\"]', 'a:0:{}', 1714374686, 1714374596, 1714374686),
('9bebe70c-859a-478e-a875-90d507fe3f87', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714374959, 1714374966),
('9bee0a2c-5af3-4321-b84e-d1c0c9afc784', '', 1, 1, 0, '[]', 'a:0:{}', NULL, 1714466752, NULL),
('9bee0a8a-0c49-4b5d-ae9e-21721cf4ea88', '', 1, 1, 1, '[\"6698d2d4-ca4a-4222-a9ed-b184c38f66d1\"]', 'a:0:{}', 1714466907, 1714466813, 1714466907),
('9bee13d8-ed68-402b-93ed-1fa5862020e0', '', 1, 1, 1, '[\"28033d5f-bbc2-4289-802b-02c3b740481f\"]', 'a:0:{}', 1714468467, 1714468375, 1714468467),
('9bee1461-e69c-4399-abdb-9ceb2a3ea0cb', '', 1, 1, 1, '[\"5f60ad64-8782-4cbd-a298-38cdf141744b\"]', 'a:0:{}', 1714468556, 1714468464, 1714468556),
('9bee1540-5661-4c1d-b536-c6ea109109a9', '', 1, 1, 1, '[\"8c935a28-1271-4070-b437-434d4ea7a09f\"]', 'a:0:{}', 1714468760, 1714468610, 1714468760),
('9bee1655-98a6-4742-b347-5904591e78a4', '', 1, 1, 1, '[\"f4844861-4273-4f92-afdf-8f97c709ee6c\"]', 'a:0:{}', 1714468885, 1714468792, 1714468885),
('9bee18f5-2030-4bdd-9760-5d168240fbfa', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714469232, 1714469239),
('9bee1f1b-f1f9-4e9b-aa3f-37f82af52b8a', '', 1, 1, 1, '[\"a4277c96-dd6c-459f-a36b-3a7afc1da1a6\"]', 'a:0:{}', 1714470360, 1714470264, 1714470360),
('9bee20cd-7b7b-449a-97b9-e8119c4004a4', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714470548, 1714470553),
('9bee21a7-d284-4c9f-ab6f-5611861e6cd5', '', 1, 1, 1, '[\"7d55b42a-b632-48ce-aec8-34328a08bbe1\"]', 'a:0:{}', 1714470784, 1714470691, 1714470784),
('9bee22ae-b231-4dd0-8427-9af7fa43c003', '', 1, 1, 1, '[\"d6b8c8c6-9b90-45c1-9a1d-af11fc55c0a4\"]', 'a:0:{}', 1714470866, 1714470863, 1714470866),
('9bee2340-71ed-48db-b6ec-b9958825310e', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714470959, 1714470966),
('9bee248c-6c43-4ee8-b996-2758c1489fe7', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714471177, 1714471181),
('9bee55e2-87b1-4364-985d-ba1734d8a156', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714479454, 1714479487),
('9bee56c5-efc6-421c-90e3-002c70806b66', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714479603, 1714479608),
('9bee5b41-04f1-4e7b-9400-71b65d884171', '', 1, 1, 1, '[\"f5d6b821-f63d-4915-a00d-4a555401d9dc\"]', 'a:0:{}', 1714480446, 1714480355, 1714480446),
('9bee5ba7-3a41-4da2-b50d-30d11a81dbef', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714480422, 1714480428),
('9bee5d3f-316f-421c-a68e-3facce04c583', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1714480689, 1714480695),
('9c024348-056c-4ea2-aa0f-1c7e3f840051', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715335326, 1715335332),
('9c02466b-68bc-4939-9b9a-cd04983bb046', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715335853, 1715335860),
('9c024695-f733-4591-a80d-b938893236e1', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715335881, 1715335891),
('9c0248af-cc1b-43d4-8a85-5137679f3b70', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715336233, 1715336237),
('9c024ac8-7993-4880-b8b6-d123ea575ac2', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715336585, 1715336592),
('9c026b12-2b26-4e88-9247-72a8c6ea0ab9', '', 1, 1, 1, '[\"ae9bab7e-9d55-4a9a-b756-010d379bff93\"]', 'a:0:{}', 1715342233, 1715342002, 1715342233),
('9c026d27-9647-4020-95d3-87e8d6b740e3', '', 1, 1, 1, '[\"3114e6e6-d3f0-465d-95e2-22262d4ef914\"]', 'a:0:{}', 1715342442, 1715342351, 1715342442),
('9c026e86-ffe3-46f4-8682-48b1b4e23950', '', 1, 1, 1, '[\"76d4dd79-cc22-401f-ac90-e3a4e5bcbc44\"]', 'a:0:{}', 1715342672, 1715342582, 1715342672),
('9c02701a-525d-4a54-a3ed-7ad19b64a97f', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715342846, 1715342854),
('9c02718e-aaa7-458c-a119-2b7f65ef8c6d', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343090, 1715343095),
('9c0272a6-f894-409b-9061-fc41fa49cc9c', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343274, 1715343279),
('9c0273a6-15a4-44b2-836c-0a20a8fbea09', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343441, 1715343449),
('9c027478-6c39-49a6-8146-8ed830ec3575', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343579, 1715343585),
('9c0274ea-b9ec-4ef4-bf08-1b769c4e5fc9', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343654, 1715343659),
('9c0276fa-6e4e-43e5-887b-aec9f7cfaf74', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715343999, 1715344006),
('9c027e3f-0218-4e40-b862-ba8806f72d3d', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715345219, 1715345224),
('9c027eb0-0564-4883-b866-165396cbac5f', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715345293, 1715345295),
('9c027eec-6f65-44c3-832e-b7f3b359638f', '', 1, 1, 1, '[\"4d2a56cd-4421-45e0-bc7c-0a53113a6e9e\"]', 'a:0:{}', 1715345445, 1715345332, 1715345445),
('9c027f0b-bcc5-4b90-a78b-b33c5679d354', '', 1, 0, 0, '[]', 'a:0:{}', NULL, 1715345353, 1715345444),
('9c028236-a66b-4c0f-ac1d-e9e60528e223', '', 2, 1, 1, '[\"967fc57b-a770-4254-8e4c-d76a09e25fb9\"]', 'a:0:{}', 1715345982, 1715345884, 1715345982),
('9c0282ed-2e50-48f5-b3e3-aa697f3cc4ae', '', 2, 1, 0, '[]', 'a:0:{}', NULL, 1715346004, NULL),
('9c0284d7-cbe1-4459-918a-dd91418902b8', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715346326, 1715346416),
('9c028b10-bdd5-411c-802b-d81429857a30', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715347369, 1715347462),
('9c028bfe-017c-4e8d-8453-1a1a4c06a778', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715347525, 1715347617),
('9c028d75-c90e-4c1b-9c66-d4a31dc7a8e4', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715347771, 1715347865),
('9c07fd62-d21a-4ee9-a41b-716fcd4df69d', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715581298, 1715581399),
('9c080477-785e-47a8-93dc-0edd3d9f4393', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1715582486, 1715582582),
('9c1c6f16-dead-4a70-a74d-dedadb2aa2f8', '', 2, 1, 1, '[\"0b0c5739-9f49-42da-a52f-92c0bb931b54\"]', 'a:0:{}', 1716459423, 1716459367, 1716459423),
('9c1c703d-84e9-4bfb-90da-8208c4a5353a', '', 2, 1, 1, '[\"54ff2b06-fc5f-4777-8330-ec86d64f5cbf\"]', 'a:0:{}', 1716459658, 1716459560, 1716459658),
('9c1c713e-e9a9-4b84-ae96-8c3f2b9d3728', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716459729, 1716459820),
('9c1c72fb-5cf2-4f28-8fd2-9373cadc0319', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716460020, 1716460110),
('9c1c7c49-f8e9-4545-bfb3-7ea115767291', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716461582, 1716461700),
('9c1c85e7-0108-4605-bf9c-7fbe4daa44d3', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716463195, 1716463291),
('9c27ffac-f469-495f-8caf-490352d855c4', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716956071, 1716956176),
('9c280c2a-0da7-4c4e-aa68-f0bcabdc7444', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716958167, 1716958261),
('9c280dfd-c2da-4ad9-8134-2003e499b216', '', 2, 0, 0, '[]', 'a:0:{}', NULL, 1716958473, 1716958575);

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` enum('ltr','rtl') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `logo_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `code`, `name`, `direction`, `logo_path`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'ltr', 'locales/ZZEtjldhqrNUMO5Di1x4J3JjECljgVNAHtuUUPzy.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_campaigns`
--

CREATE TABLE `marketing_campaigns` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_to` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spooling` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int UNSIGNED DEFAULT NULL,
  `customer_group_id` int UNSIGNED DEFAULT NULL,
  `marketing_template_id` int UNSIGNED DEFAULT NULL,
  `marketing_event_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `marketing_events`
--

CREATE TABLE `marketing_events` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `marketing_events`
--

INSERT INTO `marketing_events` (`id`, `name`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Birthday', 'Birthday', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marketing_templates`
--

CREATE TABLE `marketing_templates` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_admin_password_resets_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_06_12_111907_create_admins_table', 1),
(5, '2018_06_13_055341_create_roles_table', 1),
(6, '2018_07_05_130148_create_attributes_table', 1),
(7, '2018_07_05_132854_create_attribute_translations_table', 1),
(8, '2018_07_05_135150_create_attribute_families_table', 1),
(9, '2018_07_05_135152_create_attribute_groups_table', 1),
(10, '2018_07_05_140832_create_attribute_options_table', 1),
(11, '2018_07_05_140856_create_attribute_option_translations_table', 1),
(12, '2018_07_05_142820_create_categories_table', 1),
(13, '2018_07_10_055143_create_locales_table', 1),
(14, '2018_07_20_054426_create_countries_table', 1),
(15, '2018_07_20_054502_create_currencies_table', 1),
(16, '2018_07_20_054542_create_currency_exchange_rates_table', 1),
(17, '2018_07_20_064849_create_channels_table', 1),
(18, '2018_07_21_142836_create_category_translations_table', 1),
(19, '2018_07_23_110040_create_inventory_sources_table', 1),
(20, '2018_07_24_082635_create_customer_groups_table', 1),
(21, '2018_07_24_082930_create_customers_table', 1),
(22, '2018_07_27_065727_create_products_table', 1),
(23, '2018_07_27_070011_create_product_attribute_values_table', 1),
(24, '2018_07_27_092623_create_product_reviews_table', 1),
(25, '2018_07_27_113941_create_product_images_table', 1),
(26, '2018_07_27_113956_create_product_inventories_table', 1),
(27, '2018_08_30_064755_create_tax_categories_table', 1),
(28, '2018_08_30_065042_create_tax_rates_table', 1),
(29, '2018_08_30_065840_create_tax_mappings_table', 1),
(30, '2018_09_05_150444_create_cart_table', 1),
(31, '2018_09_05_150915_create_cart_items_table', 1),
(32, '2018_09_11_064045_customer_password_resets', 1),
(33, '2018_09_19_093453_create_cart_payment', 1),
(34, '2018_09_19_093508_create_cart_shipping_rates_table', 1),
(35, '2018_09_20_060658_create_core_config_table', 1),
(36, '2018_09_27_113154_create_orders_table', 1),
(37, '2018_09_27_113207_create_order_items_table', 1),
(38, '2018_09_27_115022_create_shipments_table', 1),
(39, '2018_09_27_115029_create_shipment_items_table', 1),
(40, '2018_09_27_115135_create_invoices_table', 1),
(41, '2018_09_27_115144_create_invoice_items_table', 1),
(42, '2018_10_01_095504_create_order_payment_table', 1),
(43, '2018_10_03_025230_create_wishlist_table', 1),
(44, '2018_10_12_101803_create_country_translations_table', 1),
(45, '2018_10_12_101913_create_country_states_table', 1),
(46, '2018_10_12_101923_create_country_state_translations_table', 1),
(47, '2018_11_16_173504_create_subscribers_list_table', 1),
(48, '2018_11_21_144411_create_cart_item_inventories_table', 1),
(49, '2018_12_06_185202_create_product_flat_table', 1),
(50, '2018_12_24_123812_create_channel_inventory_sources_table', 1),
(51, '2018_12_26_165327_create_product_ordered_inventories_table', 1),
(52, '2019_05_13_024321_create_cart_rules_table', 1),
(53, '2019_05_13_024322_create_cart_rule_channels_table', 1),
(54, '2019_05_13_024323_create_cart_rule_customer_groups_table', 1),
(55, '2019_05_13_024324_create_cart_rule_translations_table', 1),
(56, '2019_05_13_024325_create_cart_rule_customers_table', 1),
(57, '2019_05_13_024326_create_cart_rule_coupons_table', 1),
(58, '2019_05_13_024327_create_cart_rule_coupon_usage_table', 1),
(59, '2019_06_17_180258_create_product_downloadable_samples_table', 1),
(60, '2019_06_17_180314_create_product_downloadable_sample_translations_table', 1),
(61, '2019_06_17_180325_create_product_downloadable_links_table', 1),
(62, '2019_06_17_180346_create_product_downloadable_link_translations_table', 1),
(63, '2019_06_21_202249_create_downloadable_link_purchased_table', 1),
(64, '2019_07_30_153530_create_cms_pages_table', 1),
(65, '2019_07_31_143339_create_category_filterable_attributes_table', 1),
(66, '2019_08_02_105320_create_product_grouped_products_table', 1),
(67, '2019_08_20_170510_create_product_bundle_options_table', 1),
(68, '2019_08_20_170520_create_product_bundle_option_translations_table', 1),
(69, '2019_08_20_170528_create_product_bundle_option_products_table', 1),
(70, '2019_09_11_184511_create_refunds_table', 1),
(71, '2019_09_11_184519_create_refund_items_table', 1),
(72, '2019_12_03_184613_create_catalog_rules_table', 1),
(73, '2019_12_03_184651_create_catalog_rule_channels_table', 1),
(74, '2019_12_03_184732_create_catalog_rule_customer_groups_table', 1),
(75, '2019_12_06_101110_create_catalog_rule_products_table', 1),
(76, '2019_12_06_110507_create_catalog_rule_product_prices_table', 1),
(77, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(78, '2020_01_14_191854_create_cms_page_translations_table', 1),
(79, '2020_01_15_130209_create_cms_page_channels_table', 1),
(80, '2020_04_16_185147_add_table_addresses', 1),
(81, '2020_05_06_171638_create_order_comments_table', 1),
(82, '2020_05_21_171500_create_product_customer_group_prices_table', 1),
(83, '2020_06_25_162154_create_customer_social_accounts_table', 1),
(84, '2020_11_19_112228_create_product_videos_table', 1),
(85, '2020_11_26_141455_create_marketing_templates_table', 1),
(86, '2020_11_26_150534_create_marketing_events_table', 1),
(87, '2020_11_26_150644_create_marketing_campaigns_table', 1),
(88, '2020_12_21_000200_create_channel_translations_table', 1),
(89, '2020_12_27_121950_create_jobs_table', 1),
(90, '2021_03_11_212124_create_order_transactions_table', 1),
(91, '2021_04_07_132010_create_product_review_images_table', 1),
(92, '2021_12_15_104544_notifications', 1),
(93, '2022_03_15_160510_create_failed_jobs_table', 1),
(94, '2022_04_01_094622_create_sitemaps_table', 1),
(95, '2022_10_03_144232_create_product_price_indices_table', 1),
(96, '2022_10_04_144444_create_job_batches_table', 1),
(97, '2022_10_08_134150_create_product_inventory_indices_table', 1),
(98, '2023_05_26_213105_create_wishlist_items_table', 1),
(99, '2023_05_26_213120_create_compare_items_table', 1),
(100, '2023_06_27_163529_rename_product_review_images_to_product_review_attachments', 1),
(101, '2023_07_06_140013_add_logo_path_column_to_locales', 1),
(102, '2023_07_10_184256_create_theme_customizations_table', 1),
(103, '2023_07_12_181722_remove_home_page_and_footer_content_column_from_channel_translations_table', 1),
(104, '2023_07_20_185324_add_column_column_in_attribute_groups_table', 1),
(105, '2023_07_25_145943_add_regex_column_in_attributes_table', 1),
(106, '2023_07_25_165945_drop_notes_column_from_customers_table', 1),
(107, '2023_07_25_171058_create_customer_notes_table', 1),
(108, '2023_07_31_125232_rename_image_and_category_banner_columns_from_categories_table', 1),
(109, '2023_09_15_170053_create_theme_customization_translations_table', 1),
(110, '2023_09_20_102031_add_default_value_column_in_attributes_table', 1),
(111, '2023_09_20_102635_add_inventories_group_in_attribute_groups_table', 1),
(112, '2023_09_20_170448_create_bulk_product_importers_table', 1),
(113, '2023_09_20_173705_create_import_products_table', 1),
(114, '2023_10_12_090446_add_tax_category_id_column_in_order_items_table', 1),
(115, '2024_01_03_125832_create_visits_table', 1),
(116, '2024_01_03_125833_create_webhook_calls_table', 1),
(117, '2024_01_04_163327_create_product_properties_table', 1),
(118, '2024_01_04_163401_create_product_property_flats', 1),
(119, '2024_01_19_173118_add_processing_fee_column_in_cart_table', 1),
(120, '2024_01_24_181620_create_ekyc_verfication_table', 1),
(121, '2024_02_07_114530_add_colum_in_ekyc_verifications', 1),
(122, '2024_02_13_153601_add_column_in_customers_table', 1),
(123, '2024_02_21_151013_create_tickets_table', 1),
(124, '2024_02_21_151531_create_ticket_reasons_table', 1),
(125, '2024_02_21_151544_create_ticket_files_table', 1),
(126, '2024_02_21_152926_create_ticket_status_table', 1),
(127, '2024_03_05_124005_create_customer_attribute_values_table', 1),
(128, '2024_03_05_155005_create_customer_attributes_table', 1),
(129, '2024_03_05_155145_create_customer_attribute_options_table', 1),
(130, '2023_03_21_172616_create_blogs_table', 2),
(131, '2023_03_21_175157_create_blog_categories_table', 2),
(132, '2023_03_21_175231_create_blog_tags_table', 2),
(133, '2023_03_21_175251_create_blog_comments_table', 2),
(136, '2024_04_16_172946_alter_categories_table', 3),
(137, '2024_04_17_100703_update_categories_table', 4),
(138, '2023_09_26_155709_add_columns_to_currencies', 5),
(139, '2023_11_08_054614_add_code_column_in_attribute_groups_table', 5),
(140, '2023_11_08_140116_create_search_terms_table', 5),
(141, '2023_11_09_162805_create_url_rewrites_table', 5),
(142, '2023_11_17_150401_create_search_synonyms_table', 5),
(143, '2023_12_11_054614_add_channel_id_column_in_product_price_indices_table', 5),
(144, '2024_01_11_154640_create_imports_table', 5),
(145, '2024_01_11_154741_create_import_batches_table', 5),
(146, '2024_01_19_170350_add_unique_id_column_in_product_attribute_values_table', 5),
(147, '2024_01_19_170350_add_unique_id_column_in_product_customer_group_prices_table', 5),
(148, '2024_01_22_170814_add_unique_index_in_mapping_tables', 5),
(149, '2024_02_26_153000_add_columns_to_addresses_table', 5),
(150, '2024_03_07_193421_rename_address1_column_in_addresses_table', 5),
(152, '2024_04_23_115642_create_ticket_faqs_table', 6),
(153, '2024_04_29_154950_alter_categories_table', 7),
(154, '2024_05_03_113758_alter_customer_attributes_colum_name', 8),
(155, '2024_05_03_145234_add_column_in_customer_attribute_values_table', 9),
(156, '2024_05_08_175658_add_communities_status_column_in_categories_table', 10),
(161, '2024_05_14_154620_alter_colum_communities_status_in_categories_table', 11),
(162, '2024_05_16_144442_add_colunm_in_channels_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `order_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `read`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'order', 1, 1, '2024-04-19 12:20:31', '2024-05-06 09:27:55'),
(2, 'order', 1, 2, '2024-04-19 12:22:43', '2024-05-06 09:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `increment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) DEFAULT NULL,
  `customer_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gift` tinyint(1) NOT NULL DEFAULT '0',
  `total_item_count` int DEFAULT NULL,
  `total_qty_ordered` int DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `property_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_invoiced` decimal(12,4) DEFAULT '0.0000',
  `sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total_refunded` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_invoiced` decimal(12,4) DEFAULT '0.0000',
  `shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_refunded` decimal(12,4) DEFAULT '0.0000',
  `shipping_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `customer_id` int UNSIGNED DEFAULT NULL,
  `customer_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_id` int UNSIGNED DEFAULT NULL,
  `channel_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  `applied_cart_rule_ids` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `increment_id`, `status`, `channel_name`, `is_guest`, `customer_email`, `customer_first_name`, `customer_last_name`, `shipping_method`, `shipping_title`, `shipping_description`, `coupon_code`, `is_gift`, `total_item_count`, `total_qty_ordered`, `base_currency_code`, `channel_currency_code`, `order_currency_code`, `grand_total`, `base_grand_total`, `processing_fee`, `property_code`, `grand_total_invoiced`, `base_grand_total_invoiced`, `grand_total_refunded`, `base_grand_total_refunded`, `sub_total`, `base_sub_total`, `sub_total_invoiced`, `base_sub_total_invoiced`, `sub_total_refunded`, `base_sub_total_refunded`, `discount_percent`, `discount_amount`, `base_discount_amount`, `discount_invoiced`, `base_discount_invoiced`, `discount_refunded`, `base_discount_refunded`, `tax_amount`, `base_tax_amount`, `tax_amount_invoiced`, `base_tax_amount_invoiced`, `tax_amount_refunded`, `base_tax_amount_refunded`, `shipping_amount`, `base_shipping_amount`, `shipping_invoiced`, `base_shipping_invoiced`, `shipping_refunded`, `base_shipping_refunded`, `shipping_discount_amount`, `base_shipping_discount_amount`, `customer_id`, `customer_type`, `channel_id`, `channel_type`, `cart_id`, `applied_cart_rule_ids`, `created_at`, `updated_at`) VALUES
(1, '1', 'pending', 'Default', 0, 'vikas@example.com', 'Vikas', 'Vikas', 'free_free', 'Free Shipping - Free Shipping', 'Free Shipping', NULL, 0, 1, 1, 'USD', 'USD', 'USD', '2920000.0000', '2920000.0000', '20000.0000', NULL, '0.0000', '0.0000', '0.0000', '0.0000', '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 2, 'Webkul\\Customer\\Models\\Customer', 1, 'Webkul\\Core\\Models\\Channel', 19, NULL, '2024-04-19 12:20:31', '2024-04-19 12:20:31'),
(2, '2', 'completed', 'Default', 0, 'vikas@example.com', 'Vikas', 'Vikas', 'free_free', 'Free Shipping - Free Shipping', 'Free Shipping', NULL, 0, 1, 1, 'USD', 'USD', 'USD', '2920000.0000', '2920000.0000', '20000.0000', NULL, '2900000.0000', '2900000.0000', '0.0000', '0.0000', '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 2, 'Webkul\\Customer\\Models\\Customer', 1, 'Webkul\\Core\\Models\\Channel', 21, NULL, '2024-04-19 12:22:42', '2024-04-19 12:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_comments`
--

CREATE TABLE `order_comments` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int UNSIGNED NOT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT '0.0000',
  `total_weight` decimal(12,4) DEFAULT '0.0000',
  `qty_ordered` int DEFAULT '0',
  `qty_shipped` int DEFAULT '0',
  `qty_invoiced` int DEFAULT '0',
  `qty_canceled` int DEFAULT '0',
  `qty_refunded` int DEFAULT '0',
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total_invoiced` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_amount_refunded` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_discount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_discount_refunded` decimal(12,4) DEFAULT '0.0000',
  `tax_percent` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_invoiced` decimal(12,4) DEFAULT '0.0000',
  `tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount_refunded` decimal(12,4) DEFAULT '0.0000',
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `tax_category_id` int UNSIGNED DEFAULT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `sku`, `type`, `name`, `coupon_code`, `weight`, `total_weight`, `qty_ordered`, `qty_shipped`, `qty_invoiced`, `qty_canceled`, `qty_refunded`, `price`, `base_price`, `total`, `processing_fee`, `base_total`, `total_invoiced`, `base_total_invoiced`, `amount_refunded`, `base_amount_refunded`, `discount_percent`, `discount_amount`, `base_discount_amount`, `discount_invoiced`, `base_discount_invoiced`, `discount_refunded`, `base_discount_refunded`, `tax_percent`, `tax_amount`, `base_tax_amount`, `tax_amount_invoiced`, `base_tax_amount_invoiced`, `tax_amount_refunded`, `base_tax_amount_refunded`, `product_id`, `product_type`, `order_id`, `tax_category_id`, `parent_id`, `additional`, `created_at`, `updated_at`) VALUES
(1, 'JN-AGM-CL-HLDUF-YEL', 'simple', 'Agapeya Duplex House and Lot Flat Yellow', NULL, '1.0000', '1.0000', 1, 0, 0, 0, 0, '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 65, 'Webkul\\Product\\Models\\Product', 1, NULL, NULL, '{\"locale\": \"en\", \"quantity\": 1, \"product_id\": \"65\"}', '2024-04-19 12:20:31', '2024-04-19 12:20:31'),
(2, 'JN-AGM-CL-HLDUF-YEL', 'simple', 'Agapeya Duplex House and Lot Flat Yellow', NULL, '1.0000', '1.0000', 1, 1, 1, 0, 0, '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', 65, 'Webkul\\Product\\Models\\Product', 2, NULL, NULL, '{\"locale\": \"en\", \"quantity\": 1, \"product_id\": \"65\"}', '2024-04-19 12:22:43', '2024-04-19 12:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_payment`
--

CREATE TABLE `order_payment` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED DEFAULT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_payment`
--

INSERT INTO `order_payment` (`id`, `order_id`, `method`, `method_title`, `additional`, `created_at`, `updated_at`) VALUES
(1, 1, 'cashondelivery', 'Cash On Delivery', NULL, '2024-04-19 12:20:31', '2024-04-19 12:20:31'),
(2, 2, 'cashondelivery', 'Cash On Delivery', NULL, '2024-04-19 12:22:42', '2024-04-19 12:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` int UNSIGNED NOT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(12,4) DEFAULT '0.0000',
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json DEFAULT NULL,
  `invoice_id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_transactions`
--

INSERT INTO `order_transactions` (`id`, `transaction_id`, `status`, `type`, `amount`, `payment_method`, `data`, `invoice_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'd3c49c9c1abebd80ff6c85326f30d7d9', 'paid', 'cashondelivery', '2900000.0000', 'cashondelivery', NULL, 1, 2, '2024-04-19 12:23:08', '2024-04-19 12:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `attribute_family_id` int UNSIGNED DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `type`, `parent_id`, `attribute_family_id`, `additional`, `created_at`, `updated_at`) VALUES
(612, 'JN-AGM-CL-HLDU', 'configurable', NULL, 1, NULL, '2024-05-23 10:27:01', '2024-05-23 10:27:01'),
(621, 'JN-ZYA-SRL-C', 'configurable', NULL, 1, NULL, '2024-05-23 10:27:03', '2024-05-23 10:27:03'),
(684, 'JN-AGM-CL-HLDUS-GRN', 'simple', 612, 1, NULL, '2024-05-29 04:54:35', '2024-05-29 04:54:35'),
(685, 'JN-AGM-CL-HLDUS-PUR', 'simple', 612, 1, NULL, '2024-05-29 04:54:35', '2024-05-29 04:54:35'),
(686, 'JN-AGM-CL-HLDUS-PIN', 'simple', 612, 1, NULL, '2024-05-29 04:54:35', '2024-05-29 04:54:36'),
(687, 'JN-AGM-CL-HLDUS-YEL', 'simple', 612, 1, NULL, '2024-05-29 04:54:36', '2024-05-29 04:54:36'),
(688, 'JN-AGM-CL-HLDUF-GRN', 'simple', 612, 1, NULL, '2024-05-29 04:54:36', '2024-05-29 04:54:36'),
(689, 'JN-AGM-CL-HLDUF-PUR', 'simple', 612, 1, NULL, '2024-05-29 04:54:36', '2024-05-29 04:54:36'),
(690, 'JN-AGM-CL-HLDUF-PIN', 'simple', 612, 1, NULL, '2024-05-29 04:54:37', '2024-05-29 04:54:37'),
(691, 'JN-AGM-CL-HLDUF-YEL', 'simple', 612, 1, NULL, '2024-05-29 04:54:37', '2024-05-29 04:54:37'),
(692, 'JN-ZYA-SRL-CB-SEU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:37', '2024-05-29 04:54:37'),
(693, 'JN-ZYA-SRL-CB-SIU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:38', '2024-05-29 04:54:38'),
(694, 'JN-ZYA-SRL-CS-SEU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:38', '2024-05-29 04:54:38'),
(695, 'JN-ZYA-SRL-CS-SIU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:38', '2024-05-29 04:54:38'),
(696, 'JN-ZYA-SRL-CV-SEU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:38', '2024-05-29 04:54:39'),
(697, 'JN-ZYA-SRL-CV-SIU-R', 'simple', 621, 1, NULL, '2024-05-29 04:54:39', '2024-05-29 04:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `boolean_value` tinyint(1) DEFAULT NULL,
  `integer_value` int DEFAULT NULL,
  `float_value` decimal(12,4) DEFAULT NULL,
  `datetime_value` datetime DEFAULT NULL,
  `date_value` date DEFAULT NULL,
  `json_value` json DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL,
  `unique_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `locale`, `channel`, `text_value`, `boolean_value`, `integer_value`, `float_value`, `datetime_value`, `date_value`, `json_value`, `product_id`, `attribute_id`, `unique_id`) VALUES
(14842, 'en', 'default', 'Agapeya Duplex House and Lot Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 612, 9, 'default|en|612|9'),
(14843, 'en', 'default', 'Agapeya Duplex House and Lot Description', NULL, NULL, NULL, NULL, NULL, NULL, 612, 10, 'default|en|612|10'),
(14844, NULL, NULL, 'JN-AGM-CL-HLDU', NULL, NULL, NULL, NULL, NULL, NULL, 612, 1, 'default|en|612|1'),
(14845, 'en', 'default', 'Agapeya Towns', NULL, NULL, NULL, NULL, NULL, NULL, 612, 2, 'default|en|612|2'),
(14846, NULL, NULL, 'agapeya-towns', NULL, NULL, NULL, NULL, NULL, NULL, 612, 3, 'default|en|612|3'),
(14847, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 612, 27, 'default|en|612|27'),
(14848, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 612, 28, 'default|en|612|28'),
(14849, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 612, 51, 'default|en|612|51'),
(14850, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 612, 62, 'default|en|612|62'),
(14851, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 612, 5, 'default|en|612|5'),
(14852, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 612, 6, 'default|en|612|6'),
(14853, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 612, 7, 'default|en|612|7'),
(14854, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 612, 8, 'default|en|612|8'),
(14855, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 612, 26, 'default|en|612|26'),
(14856, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 612, 22, 'default|en|612|22'),
(15057, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 621, 9, 'default|en|621|9'),
(15058, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 621, 10, 'default|en|621|10'),
(15059, NULL, NULL, 'JN-ZYA-SRL-C', NULL, NULL, NULL, NULL, NULL, NULL, 621, 1, 'default|en|621|1'),
(15060, 'en', 'default', 'Zaya Studio Condominium', NULL, NULL, NULL, NULL, NULL, NULL, 621, 2, 'default|en|621|2'),
(15061, NULL, NULL, 'zaya-studio-condominium', NULL, NULL, NULL, NULL, NULL, NULL, 621, 3, 'default|en|621|3'),
(15062, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, 621, 27, 'default|en|621|27'),
(15063, NULL, 'default', NULL, 0, NULL, NULL, NULL, NULL, NULL, 621, 28, 'default|en|621|28'),
(15064, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 621, 51, 'default|en|621|51'),
(15065, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 621, 62, 'default|en|621|62'),
(15066, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 621, 5, 'default|en|621|5'),
(15067, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 621, 6, 'default|en|621|6'),
(15068, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 621, 7, 'default|en|621|7'),
(15069, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 621, 8, 'default|en|621|8'),
(15070, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 621, 26, 'default|en|621|26'),
(15071, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 621, 22, 'default|en|621|22'),
(16693, 'en', 'default', 'Agapeya Duplex House and Lot Slant Green Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 684, 9, 'default|en|684|9'),
(16694, 'en', 'default', 'Agapeya Duplex House and Lot Slant Green Description', NULL, NULL, NULL, NULL, NULL, NULL, 684, 10, 'default|en|684|10'),
(16695, NULL, NULL, 'JN-AGM-CL-HLDUS-GRN', NULL, NULL, NULL, NULL, NULL, NULL, 684, 1, 'default|en|684|1'),
(16696, 'en', 'default', 'Agapeya Towns Hopeful Green (Slant)', NULL, NULL, NULL, NULL, NULL, NULL, 684, 2, 'default|en|684|2'),
(16697, NULL, NULL, 'agapeya-towns-hopeful-green-slant', NULL, NULL, NULL, NULL, NULL, NULL, 684, 3, 'default|en|684|3'),
(16698, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 684, 23, 'default|en|684|23'),
(16699, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, 684, 27, 'default|en|684|27'),
(16700, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 684, 28, 'default|en|684|28'),
(16701, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 684, 11, 'default|en|684|11'),
(16702, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 684, 50, 'default|en|684|50'),
(16703, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 684, 51, 'default|en|684|51'),
(16704, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 684, 52, 'default|en|684|52'),
(16705, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 684, 53, 'default|en|684|53'),
(16706, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 684, 54, 'default|en|684|54'),
(16707, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 684, 57, 'default|en|684|57'),
(16708, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 684, 58, 'default|en|684|58'),
(16709, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 684, 59, 'default|en|684|59'),
(16710, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 684, 61, 'default|en|684|61'),
(16711, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 684, 62, 'default|en|684|62'),
(16712, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, 684, 63, 'default|en|684|63'),
(16713, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 684, 5, 'default|en|684|5'),
(16714, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 684, 6, 'default|en|684|6'),
(16715, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 684, 7, 'default|en|684|7'),
(16716, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 684, 8, 'default|en|684|8'),
(16717, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 684, 26, 'default|en|684|26'),
(16718, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 684, 22, 'default|en|684|22'),
(16719, 'en', 'default', 'Agapeya Duplex House and Lot Slant Purple Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 685, 9, 'default|en|685|9'),
(16720, 'en', 'default', 'Agapeya Duplex House and Lot Slant Purple Description', NULL, NULL, NULL, NULL, NULL, NULL, 685, 10, 'default|en|685|10'),
(16721, NULL, NULL, 'JN-AGM-CL-HLDUS-PUR', NULL, NULL, NULL, NULL, NULL, NULL, 685, 1, 'default|en|685|1'),
(16722, 'en', 'default', 'Agapeya Towns Nostalgic Purple (Slant)', NULL, NULL, NULL, NULL, NULL, NULL, 685, 2, 'default|en|685|2'),
(16723, NULL, NULL, 'agapeya-towns-nostalgic-purple-slant', NULL, NULL, NULL, NULL, NULL, NULL, 685, 3, 'default|en|685|3'),
(16724, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, NULL, 685, 23, 'default|en|685|23'),
(16725, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, 685, 27, 'default|en|685|27'),
(16726, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 685, 28, 'default|en|685|28'),
(16727, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 685, 11, 'default|en|685|11'),
(16728, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 685, 50, 'default|en|685|50'),
(16729, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 685, 51, 'default|en|685|51'),
(16730, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 685, 52, 'default|en|685|52'),
(16731, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 685, 53, 'default|en|685|53'),
(16732, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 685, 54, 'default|en|685|54'),
(16733, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 685, 57, 'default|en|685|57'),
(16734, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 685, 58, 'default|en|685|58'),
(16735, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 685, 59, 'default|en|685|59'),
(16736, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 685, 61, 'default|en|685|61'),
(16737, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 685, 62, 'default|en|685|62'),
(16738, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, 685, 63, 'default|en|685|63'),
(16739, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 685, 5, 'default|en|685|5'),
(16740, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 685, 6, 'default|en|685|6'),
(16741, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 685, 7, 'default|en|685|7'),
(16742, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 685, 8, 'default|en|685|8'),
(16743, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 685, 26, 'default|en|685|26'),
(16744, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 685, 22, 'default|en|685|22'),
(16745, 'en', 'default', 'Agapeya Duplex House and Lot Slant Pink Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 686, 9, 'default|en|686|9'),
(16746, 'en', 'default', 'Agapeya Duplex House and Lot Slant Pink Description', NULL, NULL, NULL, NULL, NULL, NULL, 686, 10, 'default|en|686|10'),
(16747, NULL, NULL, 'JN-AGM-CL-HLDUS-PIN', NULL, NULL, NULL, NULL, NULL, NULL, 686, 1, 'default|en|686|1'),
(16748, 'en', 'default', 'Agapeya Towns Graceful Pink (Slant)', NULL, NULL, NULL, NULL, NULL, NULL, 686, 2, 'default|en|686|2'),
(16749, NULL, NULL, 'agapeya-towns-graceful-pink-slant', NULL, NULL, NULL, NULL, NULL, NULL, 686, 3, 'default|en|686|3'),
(16750, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, 686, 23, 'default|en|686|23'),
(16751, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, 686, 27, 'default|en|686|27'),
(16752, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 686, 28, 'default|en|686|28'),
(16753, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 686, 11, 'default|en|686|11'),
(16754, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 686, 50, 'default|en|686|50'),
(16755, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 686, 51, 'default|en|686|51'),
(16756, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 686, 52, 'default|en|686|52'),
(16757, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 686, 53, 'default|en|686|53'),
(16758, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 686, 54, 'default|en|686|54'),
(16759, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 686, 57, 'default|en|686|57'),
(16760, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 686, 58, 'default|en|686|58'),
(16761, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 686, 59, 'default|en|686|59'),
(16762, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 686, 61, 'default|en|686|61'),
(16763, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 686, 62, 'default|en|686|62'),
(16764, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, 686, 63, 'default|en|686|63'),
(16765, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 686, 5, 'default|en|686|5'),
(16766, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 686, 6, 'default|en|686|6'),
(16767, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 686, 7, 'default|en|686|7'),
(16768, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 686, 8, 'default|en|686|8'),
(16769, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 686, 26, 'default|en|686|26'),
(16770, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 686, 22, 'default|en|686|22'),
(16771, 'en', 'default', 'Agapeya Duplex House and Lot Slant Yellow Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 687, 9, 'default|en|687|9'),
(16772, 'en', 'default', 'Agapeya Duplex House and Lot Slant Yellow Description', NULL, NULL, NULL, NULL, NULL, NULL, 687, 10, 'default|en|687|10'),
(16773, NULL, NULL, 'JN-AGM-CL-HLDUS-YEL', NULL, NULL, NULL, NULL, NULL, NULL, 687, 1, 'default|en|687|1'),
(16774, 'en', 'default', 'Agapeya Towns Joyful Yellow (Slant)', NULL, NULL, NULL, NULL, NULL, NULL, 687, 2, 'default|en|687|2'),
(16775, NULL, NULL, 'agapeya-towns-joyful-yellow-slant', NULL, NULL, NULL, NULL, NULL, NULL, 687, 3, 'default|en|687|3'),
(16776, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 687, 23, 'default|en|687|23'),
(16777, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, 687, 27, 'default|en|687|27'),
(16778, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 687, 28, 'default|en|687|28'),
(16779, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 687, 11, 'default|en|687|11'),
(16780, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 687, 50, 'default|en|687|50'),
(16781, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 687, 51, 'default|en|687|51'),
(16782, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 687, 52, 'default|en|687|52'),
(16783, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 687, 53, 'default|en|687|53'),
(16784, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 687, 54, 'default|en|687|54'),
(16785, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 687, 57, 'default|en|687|57'),
(16786, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 687, 58, 'default|en|687|58'),
(16787, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 687, 59, 'default|en|687|59'),
(16788, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 687, 61, 'default|en|687|61'),
(16789, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 687, 62, 'default|en|687|62'),
(16790, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, 687, 63, 'default|en|687|63'),
(16791, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 687, 5, 'default|en|687|5'),
(16792, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 687, 6, 'default|en|687|6'),
(16793, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 687, 7, 'default|en|687|7'),
(16794, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 687, 8, 'default|en|687|8'),
(16795, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 687, 26, 'default|en|687|26'),
(16796, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 687, 22, 'default|en|687|22'),
(16797, 'en', 'default', 'Agapeya Duplex House and Lot Flat Green Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 688, 9, 'default|en|688|9'),
(16798, 'en', 'default', 'Agapeya Duplex House and Lot Flat Green Description', NULL, NULL, NULL, NULL, NULL, NULL, 688, 10, 'default|en|688|10'),
(16799, NULL, NULL, 'JN-AGM-CL-HLDUF-GRN', NULL, NULL, NULL, NULL, NULL, NULL, 688, 1, 'default|en|688|1'),
(16800, 'en', 'default', 'Agapeya Towns Hopeful Green (Flat)', NULL, NULL, NULL, NULL, NULL, NULL, 688, 2, 'default|en|688|2'),
(16801, NULL, NULL, 'agapeya-towns-hopeful-green-flat', NULL, NULL, NULL, NULL, NULL, NULL, 688, 3, 'default|en|688|3'),
(16802, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 688, 23, 'default|en|688|23'),
(16803, NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, 688, 27, 'default|en|688|27'),
(16804, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 688, 28, 'default|en|688|28'),
(16805, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 688, 11, 'default|en|688|11'),
(16806, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 688, 50, 'default|en|688|50'),
(16807, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 688, 51, 'default|en|688|51'),
(16808, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 688, 52, 'default|en|688|52'),
(16809, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 688, 53, 'default|en|688|53'),
(16810, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 688, 54, 'default|en|688|54'),
(16811, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 688, 57, 'default|en|688|57'),
(16812, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 688, 58, 'default|en|688|58'),
(16813, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 688, 59, 'default|en|688|59'),
(16814, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 688, 61, 'default|en|688|61'),
(16815, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 688, 62, 'default|en|688|62'),
(16816, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, 688, 63, 'default|en|688|63'),
(16817, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 688, 5, 'default|en|688|5'),
(16818, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 688, 6, 'default|en|688|6'),
(16819, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 688, 7, 'default|en|688|7'),
(16820, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 688, 8, 'default|en|688|8'),
(16821, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 688, 26, 'default|en|688|26'),
(16822, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 688, 22, 'default|en|688|22'),
(16823, 'en', 'default', 'Agapeya Duplex House and Lot Flat Purple Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 689, 9, 'default|en|689|9'),
(16824, 'en', 'default', 'Agapeya Duplex House and Lot Flat Purple Description', NULL, NULL, NULL, NULL, NULL, NULL, 689, 10, 'default|en|689|10'),
(16825, NULL, NULL, 'JN-AGM-CL-HLDUF-PUR', NULL, NULL, NULL, NULL, NULL, NULL, 689, 1, 'default|en|689|1'),
(16826, 'en', 'default', 'Agapeya Towns Nostalgic Purple (Flat)', NULL, NULL, NULL, NULL, NULL, NULL, 689, 2, 'default|en|689|2'),
(16827, NULL, NULL, 'agapeya-towns-nostalgic-purple-flat', NULL, NULL, NULL, NULL, NULL, NULL, 689, 3, 'default|en|689|3'),
(16828, NULL, NULL, NULL, NULL, 46, NULL, NULL, NULL, NULL, 689, 23, 'default|en|689|23'),
(16829, NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, NULL, 689, 27, 'default|en|689|27'),
(16830, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 689, 28, 'default|en|689|28'),
(16831, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 689, 11, 'default|en|689|11'),
(16832, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 689, 50, 'default|en|689|50'),
(16833, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 689, 51, 'default|en|689|51'),
(16834, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 689, 52, 'default|en|689|52'),
(16835, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 689, 53, 'default|en|689|53'),
(16836, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 689, 54, 'default|en|689|54'),
(16837, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 689, 57, 'default|en|689|57'),
(16838, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 689, 58, 'default|en|689|58'),
(16839, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 689, 59, 'default|en|689|59'),
(16840, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 689, 61, 'default|en|689|61'),
(16841, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 689, 62, 'default|en|689|62'),
(16842, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, 689, 63, 'default|en|689|63'),
(16843, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 689, 5, 'default|en|689|5'),
(16844, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 689, 6, 'default|en|689|6'),
(16845, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 689, 7, 'default|en|689|7'),
(16846, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 689, 8, 'default|en|689|8'),
(16847, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 689, 26, 'default|en|689|26'),
(16848, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 689, 22, 'default|en|689|22'),
(16849, 'en', 'default', 'Agapeya Duplex House and Lot Flat Pink Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 690, 9, 'default|en|690|9'),
(16850, 'en', 'default', 'Agapeya Duplex House and Lot Flat Pink Description', NULL, NULL, NULL, NULL, NULL, NULL, 690, 10, 'default|en|690|10'),
(16851, NULL, NULL, 'JN-AGM-CL-HLDUF-PIN', NULL, NULL, NULL, NULL, NULL, NULL, 690, 1, 'default|en|690|1'),
(16852, 'en', 'default', 'Agapeya Towns Graceful Pink (Flat)', NULL, NULL, NULL, NULL, NULL, NULL, 690, 2, 'default|en|690|2'),
(16853, NULL, NULL, 'agapeya-towns-graceful-pink-flat', NULL, NULL, NULL, NULL, NULL, NULL, 690, 3, 'default|en|690|3'),
(16854, NULL, NULL, NULL, NULL, 47, NULL, NULL, NULL, NULL, 690, 23, 'default|en|690|23'),
(16855, NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL, 690, 27, 'default|en|690|27'),
(16856, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 690, 28, 'default|en|690|28'),
(16857, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 690, 11, 'default|en|690|11'),
(16858, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 690, 50, 'default|en|690|50'),
(16859, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 690, 51, 'default|en|690|51'),
(16860, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 690, 52, 'default|en|690|52'),
(16861, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 690, 53, 'default|en|690|53'),
(16862, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 690, 54, 'default|en|690|54'),
(16863, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 690, 57, 'default|en|690|57'),
(16864, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 690, 58, 'default|en|690|58'),
(16865, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 690, 59, 'default|en|690|59'),
(16866, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 690, 61, 'default|en|690|61'),
(16867, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 690, 62, 'default|en|690|62'),
(16868, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, 690, 63, 'default|en|690|63'),
(16869, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 690, 5, 'default|en|690|5'),
(16870, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 690, 6, 'default|en|690|6'),
(16871, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 690, 7, 'default|en|690|7'),
(16872, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 690, 8, 'default|en|690|8'),
(16873, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 690, 26, 'default|en|690|26'),
(16874, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 690, 22, 'default|en|690|22'),
(16875, 'en', 'default', 'Agapeya Duplex House and Lot Flat Yellow Short Description', NULL, NULL, NULL, NULL, NULL, NULL, 691, 9, 'default|en|691|9'),
(16876, 'en', 'default', 'Agapeya Duplex House and Lot Flat Yellow Description', NULL, NULL, NULL, NULL, NULL, NULL, 691, 10, 'default|en|691|10'),
(16877, NULL, NULL, 'JN-AGM-CL-HLDUF-YEL', NULL, NULL, NULL, NULL, NULL, NULL, 691, 1, 'default|en|691|1'),
(16878, 'en', 'default', 'Agapeya Towns Joyful Yellow (Flat)', NULL, NULL, NULL, NULL, NULL, NULL, 691, 2, 'default|en|691|2'),
(16879, NULL, NULL, 'agapeya-towns-joyful-yellow-flat', NULL, NULL, NULL, NULL, NULL, NULL, 691, 3, 'default|en|691|3'),
(16880, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 691, 23, 'default|en|691|23'),
(16881, NULL, NULL, '9', NULL, NULL, NULL, NULL, NULL, NULL, 691, 27, 'default|en|691|27'),
(16882, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 691, 28, 'default|en|691|28'),
(16883, 'en', 'default', NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, 691, 11, 'default|en|691|11'),
(16884, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, 691, 50, 'default|en|691|50'),
(16885, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 691, 51, 'default|en|691|51'),
(16886, NULL, NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, 691, 52, 'default|en|691|52'),
(16887, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, NULL, 691, 53, 'default|en|691|53'),
(16888, NULL, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, 691, 54, 'default|en|691|54'),
(16889, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 691, 57, 'default|en|691|57'),
(16890, NULL, NULL, 'Provision for 3', NULL, NULL, NULL, NULL, NULL, NULL, 691, 58, 'default|en|691|58'),
(16891, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 691, 59, 'default|en|691|59'),
(16892, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 691, 61, 'default|en|691|61'),
(16893, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 691, 62, 'default|en|691|62'),
(16894, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, 691, 63, 'default|en|691|63'),
(16895, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 691, 5, 'default|en|691|5'),
(16896, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 691, 6, 'default|en|691|6'),
(16897, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 691, 7, 'default|en|691|7'),
(16898, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 691, 8, 'default|en|691|8'),
(16899, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 691, 26, 'default|en|691|26'),
(16900, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 691, 22, 'default|en|691|22'),
(16901, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 692, 9, 'default|en|692|9'),
(16902, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 692, 10, 'default|en|692|10'),
(16903, NULL, NULL, 'JN-ZYA-SRL-CB-SEU-R', NULL, NULL, NULL, NULL, NULL, NULL, 692, 1, 'default|en|692|1'),
(16904, 'en', 'default', 'Zaya Studio Condominium with Balcony End Unit', NULL, NULL, NULL, NULL, NULL, NULL, 692, 2, 'default|en|692|2'),
(16905, NULL, NULL, 'zaya-studio-condominium-with-balcony-end-unit', NULL, NULL, NULL, NULL, NULL, NULL, 692, 3, 'default|en|692|3'),
(16906, NULL, NULL, '11', NULL, NULL, NULL, NULL, NULL, NULL, 692, 27, 'default|en|692|27'),
(16907, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 692, 28, 'default|en|692|28'),
(16908, 'en', 'default', NULL, NULL, NULL, '3100000.0000', NULL, NULL, NULL, 692, 11, 'default|en|692|11'),
(16909, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 692, 50, 'default|en|692|50'),
(16910, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 692, 51, 'default|en|692|51'),
(16911, NULL, NULL, '25.8', NULL, NULL, NULL, NULL, NULL, NULL, 692, 52, 'default|en|692|52'),
(16912, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 692, 54, 'default|en|692|54'),
(16913, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, 692, 55, 'default|en|692|55'),
(16914, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, 692, 56, 'default|en|692|56'),
(16915, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, 692, 57, 'default|en|692|57'),
(16916, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 692, 58, 'default|en|692|58'),
(16917, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 692, 59, 'default|en|692|59'),
(16918, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 692, 61, 'default|en|692|61'),
(16919, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 692, 62, 'default|en|692|62'),
(16920, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, 692, 64, 'default|en|692|64'),
(16921, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 692, 5, 'default|en|692|5'),
(16922, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 692, 6, 'default|en|692|6'),
(16923, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 692, 7, 'default|en|692|7'),
(16924, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 692, 8, 'default|en|692|8'),
(16925, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 692, 26, 'default|en|692|26'),
(16926, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 692, 22, 'default|en|692|22'),
(16927, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 693, 9, 'default|en|693|9'),
(16928, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 693, 10, 'default|en|693|10'),
(16929, NULL, NULL, 'JN-ZYA-SRL-CB-SIU-R', NULL, NULL, NULL, NULL, NULL, NULL, 693, 1, 'default|en|693|1'),
(16930, 'en', 'default', 'Zaya Studio Condominium with Balcony Inner Unit', NULL, NULL, NULL, NULL, NULL, NULL, 693, 2, 'default|en|693|2'),
(16931, NULL, NULL, 'zaya-studio-condominium-with-balcony-inner-unit', NULL, NULL, NULL, NULL, NULL, NULL, 693, 3, 'default|en|693|3'),
(16932, NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, 693, 27, 'default|en|693|27'),
(16933, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 693, 28, 'default|en|693|28'),
(16934, 'en', 'default', NULL, NULL, NULL, '3000000.0000', NULL, NULL, NULL, 693, 11, 'default|en|693|11'),
(16935, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 693, 50, 'default|en|693|50'),
(16936, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 693, 51, 'default|en|693|51'),
(16937, NULL, NULL, '25.8', NULL, NULL, NULL, NULL, NULL, NULL, 693, 52, 'default|en|693|52'),
(16938, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 693, 54, 'default|en|693|54'),
(16939, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, 693, 55, 'default|en|693|55'),
(16940, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, 693, 56, 'default|en|693|56'),
(16941, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, 693, 57, 'default|en|693|57'),
(16942, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 693, 58, 'default|en|693|58'),
(16943, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 693, 59, 'default|en|693|59'),
(16944, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 693, 61, 'default|en|693|61'),
(16945, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 693, 62, 'default|en|693|62'),
(16946, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, 693, 64, 'default|en|693|64'),
(16947, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 693, 5, 'default|en|693|5'),
(16948, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 693, 6, 'default|en|693|6'),
(16949, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 693, 7, 'default|en|693|7'),
(16950, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 693, 8, 'default|en|693|8'),
(16951, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 693, 26, 'default|en|693|26'),
(16952, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 693, 22, 'default|en|693|22'),
(16953, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 694, 9, 'default|en|694|9'),
(16954, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 694, 10, 'default|en|694|10'),
(16955, NULL, NULL, 'JN-ZYA-SRL-CS-SEU-R', NULL, NULL, NULL, NULL, NULL, NULL, 694, 1, 'default|en|694|1'),
(16956, 'en', 'default', 'Zaya Studio Condominium Standard End Unit', NULL, NULL, NULL, NULL, NULL, NULL, 694, 2, 'default|en|694|2'),
(16957, NULL, NULL, 'zaya-studio-condominium-standard-end-unit', NULL, NULL, NULL, NULL, NULL, NULL, 694, 3, 'default|en|694|3'),
(16958, NULL, NULL, '13', NULL, NULL, NULL, NULL, NULL, NULL, 694, 27, 'default|en|694|27'),
(16959, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 694, 28, 'default|en|694|28'),
(16960, 'en', 'default', NULL, NULL, NULL, '2850000.0000', NULL, NULL, NULL, 694, 11, 'default|en|694|11'),
(16961, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 694, 50, 'default|en|694|50'),
(16962, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 694, 51, 'default|en|694|51'),
(16963, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, 694, 52, 'default|en|694|52'),
(16964, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 694, 54, 'default|en|694|54'),
(16965, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, 694, 55, 'default|en|694|55'),
(16966, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, 694, 56, 'default|en|694|56'),
(16967, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, 694, 57, 'default|en|694|57'),
(16968, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 694, 58, 'default|en|694|58'),
(16969, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 694, 59, 'default|en|694|59'),
(16970, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 694, 61, 'default|en|694|61'),
(16971, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 694, 62, 'default|en|694|62'),
(16972, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 694, 64, 'default|en|694|64'),
(16973, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 694, 5, 'default|en|694|5'),
(16974, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 694, 6, 'default|en|694|6'),
(16975, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 694, 7, 'default|en|694|7'),
(16976, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 694, 8, 'default|en|694|8'),
(16977, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 694, 26, 'default|en|694|26'),
(16978, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 694, 22, 'default|en|694|22'),
(16979, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 695, 9, 'default|en|695|9'),
(16980, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 695, 10, 'default|en|695|10'),
(16981, NULL, NULL, 'JN-ZYA-SRL-CS-SIU-R', NULL, NULL, NULL, NULL, NULL, NULL, 695, 1, 'default|en|695|1'),
(16982, 'en', 'default', 'Zaya Studio Condominium Standard Inner Unit', NULL, NULL, NULL, NULL, NULL, NULL, 695, 2, 'default|en|695|2'),
(16983, NULL, NULL, 'zaya-studio-condominium-standard-inner-unit', NULL, NULL, NULL, NULL, NULL, NULL, 695, 3, 'default|en|695|3'),
(16984, NULL, NULL, '14', NULL, NULL, NULL, NULL, NULL, NULL, 695, 27, 'default|en|695|27'),
(16985, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 695, 28, 'default|en|695|28'),
(16986, 'en', 'default', NULL, NULL, NULL, '2700000.0000', NULL, NULL, NULL, 695, 11, 'default|en|695|11'),
(16987, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 695, 50, 'default|en|695|50'),
(16988, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 695, 51, 'default|en|695|51'),
(16989, NULL, NULL, '24', NULL, NULL, NULL, NULL, NULL, NULL, 695, 52, 'default|en|695|52'),
(16990, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 695, 54, 'default|en|695|54'),
(16991, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, 695, 55, 'default|en|695|55'),
(16992, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, 695, 56, 'default|en|695|56'),
(16993, NULL, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, 695, 57, 'default|en|695|57'),
(16994, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 695, 58, 'default|en|695|58'),
(16995, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 695, 59, 'default|en|695|59'),
(16996, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 695, 61, 'default|en|695|61'),
(16997, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 695, 62, 'default|en|695|62'),
(16998, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 695, 64, 'default|en|695|64'),
(16999, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 695, 5, 'default|en|695|5'),
(17000, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 695, 6, 'default|en|695|6'),
(17001, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 695, 7, 'default|en|695|7'),
(17002, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 695, 8, 'default|en|695|8'),
(17003, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 695, 26, 'default|en|695|26'),
(17004, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 695, 22, 'default|en|695|22'),
(17005, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 696, 9, 'default|en|696|9'),
(17006, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 696, 10, 'default|en|696|10'),
(17007, NULL, NULL, 'JN-ZYA-SRL-CV-SEU-R', NULL, NULL, NULL, NULL, NULL, NULL, 696, 1, 'default|en|696|1'),
(17008, 'en', 'default', 'Zaya Studio Condominium with Veranda End Unit', NULL, NULL, NULL, NULL, NULL, NULL, 696, 2, 'default|en|696|2'),
(17009, NULL, NULL, 'zaya-studio-condominium-with-veranda-end-unit', NULL, NULL, NULL, NULL, NULL, NULL, 696, 3, 'default|en|696|3'),
(17010, NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, 696, 27, 'default|en|696|27'),
(17011, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 696, 28, 'default|en|696|28'),
(17012, 'en', 'default', NULL, NULL, NULL, '3350000.0000', NULL, NULL, NULL, 696, 11, 'default|en|696|11'),
(17013, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 696, 50, 'default|en|696|50'),
(17014, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 696, 51, 'default|en|696|51'),
(17015, NULL, NULL, '28', NULL, NULL, NULL, NULL, NULL, NULL, 696, 52, 'default|en|696|52'),
(17016, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 696, 54, 'default|en|696|54'),
(17017, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL, 696, 55, 'default|en|696|55'),
(17018, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, 696, 56, 'default|en|696|56'),
(17019, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 696, 57, 'default|en|696|57'),
(17020, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 696, 58, 'default|en|696|58'),
(17021, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 696, 59, 'default|en|696|59'),
(17022, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 696, 61, 'default|en|696|61'),
(17023, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 696, 62, 'default|en|696|62'),
(17024, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 696, 64, 'default|en|696|64'),
(17025, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 696, 5, 'default|en|696|5'),
(17026, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 696, 6, 'default|en|696|6'),
(17027, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 696, 7, 'default|en|696|7'),
(17028, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 696, 8, 'default|en|696|8'),
(17029, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 696, 26, 'default|en|696|26'),
(17030, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 696, 22, 'default|en|696|22'),
(17031, 'en', 'default', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', NULL, NULL, NULL, NULL, NULL, NULL, 697, 9, 'default|en|697|9'),
(17032, 'en', 'default', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', NULL, NULL, NULL, NULL, NULL, NULL, 697, 10, 'default|en|697|10'),
(17033, NULL, NULL, 'JN-ZYA-SRL-CV-SIU-R', NULL, NULL, NULL, NULL, NULL, NULL, 697, 1, 'default|en|697|1'),
(17034, 'en', 'default', 'Zaya Studio Condominium with Veranda Inner Unit', NULL, NULL, NULL, NULL, NULL, NULL, 697, 2, 'default|en|697|2'),
(17035, NULL, NULL, 'zaya-studio-condominium-with-veranda-inner-unit', NULL, NULL, NULL, NULL, NULL, NULL, 697, 3, 'default|en|697|3'),
(17036, NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, NULL, 697, 27, 'default|en|697|27'),
(17037, NULL, 'default', NULL, 1, NULL, NULL, NULL, NULL, NULL, 697, 28, 'default|en|697|28'),
(17038, 'en', 'default', NULL, NULL, NULL, '3200000.0000', NULL, NULL, NULL, 697, 11, 'default|en|697|11'),
(17039, NULL, NULL, NULL, NULL, NULL, '10000.0000', NULL, NULL, NULL, 697, 50, 'default|en|697|50'),
(17040, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, 697, 51, 'default|en|697|51'),
(17041, NULL, NULL, '28', NULL, NULL, NULL, NULL, NULL, NULL, 697, 52, 'default|en|697|52'),
(17042, NULL, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, 697, 54, 'default|en|697|54'),
(17043, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL, 697, 55, 'default|en|697|55'),
(17044, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, 697, 56, 'default|en|697|56'),
(17045, NULL, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, 697, 57, 'default|en|697|57'),
(17046, NULL, NULL, 'Studio', NULL, NULL, NULL, NULL, NULL, NULL, 697, 58, 'default|en|697|58'),
(17047, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 697, 59, 'default|en|697|59'),
(17048, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 697, 61, 'default|en|697|61'),
(17049, NULL, NULL, 'default', NULL, NULL, NULL, NULL, NULL, NULL, 697, 62, 'default|en|697|62'),
(17050, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 697, 64, 'default|en|697|64'),
(17051, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 697, 5, 'default|en|697|5'),
(17052, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 697, 6, 'default|en|697|6'),
(17053, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 697, 7, 'default|en|697|7'),
(17054, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 697, 8, 'default|en|697|8'),
(17055, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 697, 26, 'default|en|697|26'),
(17056, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 697, 22, 'default|en|697|22');

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_options`
--

CREATE TABLE `product_bundle_options` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_option_products`
--

CREATE TABLE `product_bundle_option_products` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `product_bundle_option_id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `is_user_defined` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_bundle_option_translations`
--

CREATE TABLE `product_bundle_option_translations` (
  `id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_bundle_option_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(612, 2),
(612, 8),
(621, 2),
(621, 9),
(684, 2),
(684, 8),
(685, 2),
(685, 8),
(686, 2),
(686, 8),
(687, 2),
(687, 8),
(688, 2),
(688, 8),
(689, 2),
(689, 8),
(690, 2),
(690, 8),
(691, 2),
(691, 8),
(692, 2),
(692, 9),
(693, 2),
(693, 9),
(694, 2),
(694, 9),
(695, 2),
(695, 9),
(696, 2),
(696, 9),
(697, 2),
(697, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_cross_sells`
--

CREATE TABLE `product_cross_sells` (
  `parent_id` int UNSIGNED NOT NULL,
  `child_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_customer_group_prices`
--

CREATE TABLE `product_customer_group_prices` (
  `id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `value_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `product_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_links`
--

CREATE TABLE `product_downloadable_links` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `sample_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloads` int NOT NULL DEFAULT '0',
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_link_translations`
--

CREATE TABLE `product_downloadable_link_translations` (
  `id` int UNSIGNED NOT NULL,
  `product_downloadable_link_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_samples`
--

CREATE TABLE `product_downloadable_samples` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_downloadable_sample_translations`
--

CREATE TABLE `product_downloadable_sample_translations` (
  `id` int UNSIGNED NOT NULL,
  `product_downloadable_sample_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_flat`
--

CREATE TABLE `product_flat` (
  `id` int UNSIGNED NOT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,4) DEFAULT NULL,
  `special_price` decimal(12,4) DEFAULT NULL,
  `special_price_from` date DEFAULT NULL,
  `special_price_to` date DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_family_id` int UNSIGNED DEFAULT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `visible_individually` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_flat`
--

INSERT INTO `product_flat` (`id`, `sku`, `type`, `product_number`, `name`, `short_description`, `description`, `url_key`, `new`, `featured`, `status`, `meta_title`, `meta_keywords`, `meta_description`, `price`, `special_price`, `special_price_from`, `special_price_to`, `weight`, `created_at`, `locale`, `channel`, `attribute_family_id`, `product_id`, `updated_at`, `parent_id`, `visible_individually`) VALUES
(610, 'JN-AGM-CL-HLDU', 'configurable', '1', 'Agapeya Towns', 'Agapeya Duplex House and Lot Short Description', 'Agapeya Duplex House and Lot Description', 'agapeya-towns', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.0000', '2024-05-23 15:57:01', 'en', 'default', 1, 612, '2024-05-29 10:24:35', NULL, 1),
(619, 'JN-ZYA-SRL-C', 'configurable', '10', 'Zaya Studio Condominium', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.0000', '2024-05-23 15:57:03', 'en', 'default', 1, 621, '2024-05-29 10:24:37', NULL, 1),
(682, 'JN-AGM-CL-HLDUS-GRN', 'simple', '2', 'Agapeya Towns Hopeful Green (Slant)', 'Agapeya Duplex House and Lot Slant Green Short Description', 'Agapeya Duplex House and Lot Slant Green Description', 'agapeya-towns-hopeful-green-slant', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:35', 'en', 'default', 1, 684, '2024-05-29 10:24:35', NULL, 0),
(683, 'JN-AGM-CL-HLDUS-PUR', 'simple', '3', 'Agapeya Towns Nostalgic Purple (Slant)', 'Agapeya Duplex House and Lot Slant Purple Short Description', 'Agapeya Duplex House and Lot Slant Purple Description', 'agapeya-towns-nostalgic-purple-slant', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:35', 'en', 'default', 1, 685, '2024-05-29 10:24:35', NULL, 0),
(684, 'JN-AGM-CL-HLDUS-PIN', 'simple', '4', 'Agapeya Towns Graceful Pink (Slant)', 'Agapeya Duplex House and Lot Slant Pink Short Description', 'Agapeya Duplex House and Lot Slant Pink Description', 'agapeya-towns-graceful-pink-slant', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:36', 'en', 'default', 1, 686, '2024-05-29 10:24:36', NULL, 0),
(685, 'JN-AGM-CL-HLDUS-YEL', 'simple', '5', 'Agapeya Towns Joyful Yellow (Slant)', 'Agapeya Duplex House and Lot Slant Yellow Short Description', 'Agapeya Duplex House and Lot Slant Yellow Description', 'agapeya-towns-joyful-yellow-slant', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:36', 'en', 'default', 1, 687, '2024-05-29 10:24:36', NULL, 0),
(686, 'JN-AGM-CL-HLDUF-GRN', 'simple', '6', 'Agapeya Towns Hopeful Green (Flat)', 'Agapeya Duplex House and Lot Flat Green Short Description', 'Agapeya Duplex House and Lot Flat Green Description', 'agapeya-towns-hopeful-green-flat', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:36', 'en', 'default', 1, 688, '2024-05-29 10:24:36', NULL, 0),
(687, 'JN-AGM-CL-HLDUF-PUR', 'simple', '7', 'Agapeya Towns Nostalgic Purple (Flat)', 'Agapeya Duplex House and Lot Flat Purple Short Description', 'Agapeya Duplex House and Lot Flat Purple Description', 'agapeya-towns-nostalgic-purple-flat', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:36', 'en', 'default', 1, 689, '2024-05-29 10:24:37', NULL, 0),
(688, 'JN-AGM-CL-HLDUF-PIN', 'simple', '8', 'Agapeya Towns Graceful Pink (Flat)', 'Agapeya Duplex House and Lot Flat Pink Short Description', 'Agapeya Duplex House and Lot Flat Pink Description', 'agapeya-towns-graceful-pink-flat', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:37', 'en', 'default', 1, 690, '2024-05-29 10:24:37', NULL, 0),
(689, 'JN-AGM-CL-HLDUF-YEL', 'simple', '9', 'Agapeya Towns Joyful Yellow (Flat)', 'Agapeya Duplex House and Lot Flat Yellow Short Description', 'Agapeya Duplex House and Lot Flat Yellow Description', 'agapeya-towns-joyful-yellow-flat', 1, 1, 1, NULL, NULL, NULL, '2900000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:37', 'en', 'default', 1, 691, '2024-05-29 10:24:37', NULL, 0),
(690, 'JN-ZYA-SRL-CB-SEU-R', 'simple', '11', 'Zaya Studio Condominium with Balcony End Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-with-balcony-end-unit', 1, 1, 1, NULL, NULL, NULL, '3100000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:37', 'en', 'default', 1, 692, '2024-05-29 10:24:38', NULL, 0),
(691, 'JN-ZYA-SRL-CB-SIU-R', 'simple', '12', 'Zaya Studio Condominium with Balcony Inner Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-with-balcony-inner-unit', 1, 1, 1, NULL, NULL, NULL, '3000000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:38', 'en', 'default', 1, 693, '2024-05-29 10:24:38', NULL, 0),
(692, 'JN-ZYA-SRL-CS-SEU-R', 'simple', '13', 'Zaya Studio Condominium Standard End Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-standard-end-unit', 1, 1, 1, NULL, NULL, NULL, '2850000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:38', 'en', 'default', 1, 694, '2024-05-29 10:24:38', NULL, 0),
(693, 'JN-ZYA-SRL-CS-SIU-R', 'simple', '14', 'Zaya Studio Condominium Standard Inner Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-standard-inner-unit', 1, 1, 1, NULL, NULL, NULL, '2700000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:38', 'en', 'default', 1, 695, '2024-05-29 10:24:38', NULL, 0),
(694, 'JN-ZYA-SRL-CV-SEU-R', 'simple', '15', 'Zaya Studio Condominium with Veranda End Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-with-veranda-end-unit', 1, 1, 1, NULL, NULL, NULL, '3350000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:38', 'en', 'default', 1, 696, '2024-05-29 10:24:39', NULL, 0),
(695, 'JN-ZYA-SRL-CV-SIU-R', 'simple', '16', 'Zaya Studio Condominium with Veranda Inner Unit', ' Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa', 'From the Filipino word masaya meaning happy, Zaya is the first project of Elanvital Enclaves in the city of Sta. Rosa that offers an excellent home fit for young professionals as they strive towards their lifelong dreams.', 'zaya-studio-condominium-with-veranda-inner-unit', 1, 1, 1, NULL, NULL, NULL, '3200000.0000', NULL, NULL, NULL, '1.0000', '2024-05-29 10:24:39', 'en', 'default', 1, 697, '2024-05-29 10:24:39', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_grouped_products`
--

CREATE TABLE `product_grouped_products` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `associated_product_id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `position` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `type`, `path`, `product_id`, `position`) VALUES
(2485, NULL, 'product/612/jw7FlAo6g6v4VGo9dZLj70v4SDb1PrSxJuxnaLuc.webp', 612, 0),
(2486, NULL, 'product/612/fKyUZaMoHcjYiS0kMzOonkt1wTdTlPi3LXDrT58O.webp', 612, 0),
(2487, NULL, 'product/612/CO54G7MNTruJbmggkgmCdg2X6danMTrjSkKQMLVE.webp', 612, 0),
(2488, NULL, 'product/612/Prf4HUN4aWc5mVWHmcE3r0JjUhRKIqunrTJbwl68.webp', 612, 0),
(2489, NULL, 'product/612/fvhEAdBgllm8b06hkQGrawi93E04jHgVw4e5jeIt.webp', 612, 0),
(2490, NULL, 'product/684/1y1fx9hgGYG699cH6W7WoYF7cHlqIwLVBesMnDeH.webp', 684, 0),
(2491, NULL, 'product/684/A5OZ4DRsgshcXR9mj7V6Dz2nRw1QcqbcAdARKM4l.webp', 684, 0),
(2492, NULL, 'product/684/Zrf87ramH2VgqvZ5Byeuw4QYJPsagNrVczdPA9B5.webp', 684, 0),
(2493, NULL, 'product/684/mCCaPdKTL3KRyNpI0qCWFMbkIiL75L8sKB5ShVQj.webp', 684, 0),
(2494, NULL, 'product/684/hrmgCxrajwJE8hwHfrdMGCuHeVsqigFd1ZPoB6Er.webp', 684, 0),
(2495, NULL, 'product/685/UF5STsejN3HIUmqvGsr7noNfCWHZC8zo0cSGQ0VS.webp', 685, 0),
(2496, NULL, 'product/685/IsNrZfBbEeVYit0moDO4UCu4yveToxXI4Bb65lo5.webp', 685, 0),
(2497, NULL, 'product/685/AyKaqJa6W39k9FdXEaeKtjof0U2TXyAfOrBUrp7x.webp', 685, 0),
(2498, NULL, 'product/685/VPH9E8tLNwgtQEH2QdzQIKTuziA7jL1WOWdWlopR.webp', 685, 0),
(2499, NULL, 'product/685/Hm1EzVEXwYtuGN1aIb6ieWhyUtZzlPXMxrGCkRgJ.webp', 685, 0),
(2500, NULL, 'product/686/dz5y5lz1Pb47EW81diGhRc8jclC7RxAs1VPwyjpB.webp', 686, 0),
(2501, NULL, 'product/686/sL8zb2fGeRoRJvM8rtb70cyMncCP0V37RpCKQI3B.webp', 686, 0),
(2502, NULL, 'product/686/1bKDYUHmJq9KfL5y25gfO52POeg5dLo0tfzi9FFE.webp', 686, 0),
(2503, NULL, 'product/686/Tk3PGi4PTsQPssFwIGQ1vbxPLXRU1g6AHSCD3qHk.webp', 686, 0),
(2504, NULL, 'product/686/B7CoFWTI5kwrYOnBvRfnF9ylCTU28xWhmNwqAcnP.webp', 686, 0),
(2505, NULL, 'product/687/UmpzgBqt9vLBzvUFW8xpkmR57l8haIjHDYqGQnNL.webp', 687, 0),
(2506, NULL, 'product/687/qN2klwCbv0NFFZOOAJUdtt8wDiKYMOBNdNyZm9yx.webp', 687, 0),
(2507, NULL, 'product/687/OuRpgiE3ZhbCdoLtvKKhbCHosqX4tkAN1bHsTddG.webp', 687, 0),
(2508, NULL, 'product/687/A414GxueqfweDjO0mT26OkKHLT7b2WUcoT6GMnKg.webp', 687, 0),
(2509, NULL, 'product/687/XttQBiet8MeY4voWG2oRYBYxBv2YiwBrWcX58WCb.webp', 687, 0),
(2510, NULL, 'product/688/KHHIXaNN1OsGgAePYT7ylr7qEyPKoIEzWFiBPeoZ.webp', 688, 0),
(2511, NULL, 'product/688/A0Rt93JbxjJBntHwXHawgD3m4lQktG2elmqCTqxA.webp', 688, 0),
(2512, NULL, 'product/688/WKaNX0oZnDSIikPeycXjopZ63I3T3r7Qyrjsl6x3.webp', 688, 0),
(2513, NULL, 'product/688/DyR6VhYsbHOr7FpRgsZVs94NqKwPC0xEQ0mVtHlK.webp', 688, 0),
(2514, NULL, 'product/688/Mewnhu6wJeWbuBB2yUKdaAFxt6c6y1yOO35kkHC1.webp', 688, 0),
(2515, NULL, 'product/689/Oizpehg5hXHCqqN6VI5Ob1AIpFR4HvlHYApfUZ79.webp', 689, 0),
(2516, NULL, 'product/689/0YFuPmtfwpeQuRDQpWSdyaZ17in8GNC6xVMx0ecf.webp', 689, 0),
(2517, NULL, 'product/689/IXRg2w1HEmbYiWFiWGioeOOKy1xh0cc9zOcVAtlW.webp', 689, 0),
(2518, NULL, 'product/689/RDZ31BK9E9z2RrrxJTDPDn5uw5ikUcA1i1IQj71D.webp', 689, 0),
(2519, NULL, 'product/689/mRBX73M1wbuKByDsMN0SDe1R815CVqOMmoybSNyf.webp', 689, 0),
(2520, NULL, 'product/690/mro147mFcDBODkEs1ybluqeW4RbiYqgjaEkt8lie.webp', 690, 0),
(2521, NULL, 'product/690/Y3OsFYRe5UMi0J1MN84QmAGmVB3rcGPVNQScPcER.webp', 690, 0),
(2522, NULL, 'product/690/QgpW4TmP2e2I77DnpNfXsciIXmOdYdN7GES9LaM7.webp', 690, 0),
(2523, NULL, 'product/690/WVoyOWaqYr2RrhSbuShsgdJC7SAe4xngROOzf6tg.webp', 690, 0),
(2524, NULL, 'product/690/PMNs1YiY6EgnlfxpXXW2M3xImlUxCGGUuYRQx0fY.webp', 690, 0),
(2525, NULL, 'product/691/u5irNgZX9CxaEiFErBgqty6IQoxAHs03ypa16oHC.webp', 691, 0),
(2526, NULL, 'product/691/zU5kxsK43AFwAYJumMeToDkQt2D3KnXrjb1zSv5F.webp', 691, 0),
(2527, NULL, 'product/691/Ky8uP2DUYAcur09JIItqbBlY4NYdjWy0aqcuEtC9.webp', 691, 0),
(2528, NULL, 'product/691/MRmEv0cNYsJslI2oBYuYelV4geAoJ5UhAs9ImNXo.webp', 691, 0),
(2529, NULL, 'product/691/42wnZ6LmiLGXEPDV9zHOCDlV1PzNZciDaKoQkgRx.webp', 691, 0),
(2530, NULL, 'product/621/Yi34UNYCoVDatrD5t3P6PzCpqsGy7shiPwH4iqnP.webp', 621, 0),
(2531, NULL, 'product/621/KIeswwLIO2wmy1Q1loVOaei62ib5ikqh40vplNki.webp', 621, 0),
(2532, NULL, 'product/621/9c3CUzjHbUQZNE5SXG0lmVUhERMbXGRaWbLSEXYr.webp', 621, 0),
(2533, NULL, 'product/621/ipaezXT3odOSK4v6G7JhrzrRspiLgKe24tvVpaUc.webp', 621, 0),
(2534, NULL, 'product/621/9V8LpjthHWAxP25QzvJeEN5M5NzvZqeiQz2mj321.webp', 621, 0),
(2535, NULL, 'product/692/lrQM6b4EhlIrcz8H2FkIOamuVA5KDYWneEQurdon.webp', 692, 0),
(2536, NULL, 'product/692/EYj7re6CZVR3bYgNdfJR9P9kp7Dabmn1bCVcfp54.webp', 692, 0),
(2537, NULL, 'product/692/WqlgX8cAIvOKlaeOHGTyy4DqHrbXUprgy5w7uzOQ.webp', 692, 0),
(2538, NULL, 'product/692/ef3fxTnOFpFpoKB1T0Y8sjNTLLUF34m0Ibib8t7X.webp', 692, 0),
(2539, NULL, 'product/692/hFDmaaw8JIIkpPhDSo6mCrse8NG7RZ7unKhiAeWo.webp', 692, 0),
(2540, NULL, 'product/693/QXsmSsNxW1t16Db2XqV6OHrpRtVM8SJKNcd3MOCt.webp', 693, 0),
(2541, NULL, 'product/693/okmW5L1TgxclB3cd50GnnPjBp8rHdY7ymmqZE9ok.webp', 693, 0),
(2542, NULL, 'product/693/Qqisy92NCpX5f1lVNuGNsZ6PIcL6V4bMj19fnQkg.webp', 693, 0),
(2543, NULL, 'product/693/NkxgPIrvOTFhcUsIeziwsVo4eGFS3T55oijsBul2.webp', 693, 0),
(2544, NULL, 'product/693/Sx6KBK8Aljs6qTb0KTyAWAlU2VxWa2nvN6q3mRhV.webp', 693, 0),
(2545, NULL, 'product/694/qVNJmd8MLrebSJWPPNFt7TQIUUgF7iy9SYZpDXQt.webp', 694, 0),
(2546, NULL, 'product/694/0DEPnnPso0wCxntlzWYvBUqftC5qZUmQpW1sK1GY.webp', 694, 0),
(2547, NULL, 'product/694/kdKpIiDR1E7dRvWpiKRxQEZX9bQkerUDQp1efgF9.webp', 694, 0),
(2548, NULL, 'product/694/4y20GlyueRIATr4KUKRdNEjlDCpa5smf1V7hlyxt.webp', 694, 0),
(2549, NULL, 'product/694/6daqcBoCuSd9QxoL4JrhSdlEPVINSdMjGaV201Tu.webp', 694, 0),
(2550, NULL, 'product/695/e26qKtP2E0JFzMOMQcj19Ex5WQqulIePVI4EUUwC.webp', 695, 0),
(2551, NULL, 'product/695/jXx5nCvDGu3zDi1QdfyX7Mu7U2q67xr9B1pXW9Mi.webp', 695, 0),
(2552, NULL, 'product/695/ru8Qs6T0702o7cr41MXNFVtC3kBjUf86OShDYmkG.webp', 695, 0),
(2553, NULL, 'product/695/QqbuCqPUGVl6odMwk8zfqqVglDbVjDgtn7o4io3y.webp', 695, 0),
(2554, NULL, 'product/695/FpmkyEtLiB6r1FMLdN0eZYsoA2iQ1Gm7u8VlH4KY.webp', 695, 0),
(2555, NULL, 'product/696/Aoi4SGqPLcNKvsZgth2o1LvMDneZiE7lj1U9MzhM.webp', 696, 0),
(2556, NULL, 'product/696/cjN9zhqNPpzeZdRN1MEOBqGcGwFz1r7QHuQ2nI9U.webp', 696, 0),
(2557, NULL, 'product/696/QcYar0a4xupWTZSjaqYFk88PoumkgHW6LAIh2LjT.webp', 696, 0),
(2558, NULL, 'product/696/XVBAPkK1NpgLJaLPx2R9SyOGKoa5cEuMMLDHY95E.webp', 696, 0),
(2559, NULL, 'product/696/8QK1RlXY1eusNR2qtQl67aF4wHqwITnNEFCx0MAh.webp', 696, 0),
(2560, NULL, 'product/697/OllFTRl6V8j3e0QqLZsCw7X79szieKygJkyTrpb6.webp', 697, 0),
(2561, NULL, 'product/697/XMd3BqagB8uQQrN5a8Gfu9KAFbXYswesfmpTpWhL.webp', 697, 0),
(2562, NULL, 'product/697/L7uHmuXLOaSbgwIQqRdDInf0Q7LGf5gKCC7gFmiP.webp', 697, 0),
(2563, NULL, 'product/697/0j364rTLLUwXXXjY8T6fIIoeRhXqBwTeZbgti8f7.webp', 697, 0),
(2564, NULL, 'product/697/dfVL7mHcqhpb6NejHnCxhw3k1RleeUPcWfJkZ6Vi.webp', 697, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventories`
--

CREATE TABLE `product_inventories` (
  `id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int UNSIGNED NOT NULL,
  `vendor_id` int NOT NULL DEFAULT '0',
  `inventory_source_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_inventories`
--

INSERT INTO `product_inventories` (`id`, `qty`, `product_id`, `vendor_id`, `inventory_source_id`) VALUES
(587, 0, 612, 0, 1),
(596, 0, 621, 0, 1),
(659, 1, 684, 0, 1),
(660, 1, 685, 0, 1),
(661, 1, 686, 0, 1),
(662, 1, 687, 0, 1),
(663, 1, 688, 0, 1),
(664, 1, 689, 0, 1),
(665, 1, 690, 0, 1),
(666, 1, 691, 0, 1),
(667, 1, 692, 0, 1),
(668, 1, 693, 0, 1),
(669, 1, 694, 0, 1),
(670, 1, 695, 0, 1),
(671, 1, 696, 0, 1),
(672, 1, 697, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory_indices`
--

CREATE TABLE `product_inventory_indices` (
  `id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_inventory_indices`
--

INSERT INTO `product_inventory_indices` (`id`, `qty`, `product_id`, `channel_id`, `created_at`, `updated_at`) VALUES
(680, 0, 612, 1, NULL, NULL),
(681, 0, 612, 3, NULL, NULL),
(682, 0, 612, 4, NULL, NULL),
(707, 0, 621, 1, NULL, NULL),
(708, 0, 621, 3, NULL, NULL),
(709, 0, 621, 4, NULL, NULL),
(896, 1, 684, 1, NULL, NULL),
(897, 1, 684, 3, NULL, NULL),
(898, 1, 684, 4, NULL, NULL),
(899, 1, 685, 1, NULL, NULL),
(900, 1, 685, 3, NULL, NULL),
(901, 1, 685, 4, NULL, NULL),
(902, 1, 686, 1, NULL, NULL),
(903, 1, 686, 3, NULL, NULL),
(904, 1, 686, 4, NULL, NULL),
(905, 1, 687, 1, NULL, NULL),
(906, 1, 687, 3, NULL, NULL),
(907, 1, 687, 4, NULL, NULL),
(908, 1, 688, 1, NULL, NULL),
(909, 1, 688, 3, NULL, NULL),
(910, 1, 688, 4, NULL, NULL),
(911, 1, 689, 1, NULL, NULL),
(912, 1, 689, 3, NULL, NULL),
(913, 1, 689, 4, NULL, NULL),
(914, 1, 690, 1, NULL, NULL),
(915, 1, 690, 3, NULL, NULL),
(916, 1, 690, 4, NULL, NULL),
(917, 1, 691, 1, NULL, NULL),
(918, 1, 691, 3, NULL, NULL),
(919, 1, 691, 4, NULL, NULL),
(920, 1, 692, 1, NULL, NULL),
(921, 1, 692, 3, NULL, NULL),
(922, 1, 692, 4, NULL, NULL),
(923, 1, 693, 1, NULL, NULL),
(924, 1, 693, 3, NULL, NULL),
(925, 1, 693, 4, NULL, NULL),
(926, 1, 694, 1, NULL, NULL),
(927, 1, 694, 3, NULL, NULL),
(928, 1, 694, 4, NULL, NULL),
(929, 1, 695, 1, NULL, NULL),
(930, 1, 695, 3, NULL, NULL),
(931, 1, 695, 4, NULL, NULL),
(932, 1, 696, 1, NULL, NULL),
(933, 1, 696, 3, NULL, NULL),
(934, 1, 696, 4, NULL, NULL),
(935, 1, 697, 1, NULL, NULL),
(936, 1, 697, 3, NULL, NULL),
(937, 1, 697, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_ordered_inventories`
--

CREATE TABLE `product_ordered_inventories` (
  `id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `product_id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_price_indices`
--

CREATE TABLE `product_price_indices` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_group_id` int UNSIGNED DEFAULT NULL,
  `channel_id` int UNSIGNED NOT NULL DEFAULT '1',
  `min_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `regular_min_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `max_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `regular_max_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_price_indices`
--

INSERT INTO `product_price_indices` (`id`, `product_id`, `customer_group_id`, `channel_id`, `min_price`, `regular_min_price`, `max_price`, `regular_max_price`, `created_at`, `updated_at`) VALUES
(2008, 612, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2009, 612, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2010, 612, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2011, 612, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2012, 612, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2013, 612, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2014, 612, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2015, 612, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2016, 612, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2089, 621, 1, 1, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2090, 621, 2, 1, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2091, 621, 3, 1, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2092, 621, 1, 3, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2093, 621, 2, 3, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2094, 621, 3, 3, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2095, 621, 1, 4, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2096, 621, 2, 4, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2097, 621, 3, 4, '2700000.0000', '2700000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2656, 684, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2657, 684, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2658, 684, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2659, 684, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2660, 684, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2661, 684, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2662, 684, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2663, 684, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2664, 684, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2665, 685, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2666, 685, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2667, 685, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2668, 685, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2669, 685, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2670, 685, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2671, 685, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2672, 685, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2673, 685, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2674, 686, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2675, 686, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2676, 686, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2677, 686, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2678, 686, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2679, 686, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2680, 686, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2681, 686, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2682, 686, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2683, 687, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2684, 687, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2685, 687, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2686, 687, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2687, 687, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2688, 687, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2689, 687, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2690, 687, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2691, 687, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2692, 688, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2693, 688, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2694, 688, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2695, 688, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2696, 688, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2697, 688, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2698, 688, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2699, 688, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2700, 688, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2701, 689, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2702, 689, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2703, 689, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2704, 689, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2705, 689, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2706, 689, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2707, 689, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2708, 689, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2709, 689, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2710, 690, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2711, 690, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2712, 690, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2713, 690, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2714, 690, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2715, 690, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2716, 690, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2717, 690, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2718, 690, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2719, 691, 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2720, 691, 2, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2721, 691, 3, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2722, 691, 1, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2723, 691, 2, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2724, 691, 3, 3, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2725, 691, 1, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2726, 691, 2, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2727, 691, 3, 4, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', NULL, NULL),
(2728, 692, 1, 1, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2729, 692, 2, 1, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2730, 692, 3, 1, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2731, 692, 1, 3, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2732, 692, 2, 3, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2733, 692, 3, 3, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2734, 692, 1, 4, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2735, 692, 2, 4, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2736, 692, 3, 4, '3100000.0000', '3100000.0000', '3100000.0000', '3100000.0000', NULL, NULL),
(2737, 693, 1, 1, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2738, 693, 2, 1, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2739, 693, 3, 1, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2740, 693, 1, 3, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2741, 693, 2, 3, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2742, 693, 3, 3, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2743, 693, 1, 4, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2744, 693, 2, 4, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2745, 693, 3, 4, '3000000.0000', '3000000.0000', '3000000.0000', '3000000.0000', NULL, NULL),
(2746, 694, 1, 1, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2747, 694, 2, 1, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2748, 694, 3, 1, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2749, 694, 1, 3, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2750, 694, 2, 3, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2751, 694, 3, 3, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2752, 694, 1, 4, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2753, 694, 2, 4, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2754, 694, 3, 4, '2850000.0000', '2850000.0000', '2850000.0000', '2850000.0000', NULL, NULL),
(2755, 695, 1, 1, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2756, 695, 2, 1, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2757, 695, 3, 1, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2758, 695, 1, 3, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2759, 695, 2, 3, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2760, 695, 3, 3, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2761, 695, 1, 4, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2762, 695, 2, 4, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2763, 695, 3, 4, '2700000.0000', '2700000.0000', '2700000.0000', '2700000.0000', NULL, NULL),
(2764, 696, 1, 1, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2765, 696, 2, 1, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2766, 696, 3, 1, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2767, 696, 1, 3, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2768, 696, 2, 3, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2769, 696, 3, 3, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2770, 696, 1, 4, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2771, 696, 2, 4, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2772, 696, 3, 4, '3350000.0000', '3350000.0000', '3350000.0000', '3350000.0000', NULL, NULL),
(2773, 697, 1, 1, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2774, 697, 2, 1, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2775, 697, 3, 1, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2776, 697, 1, 3, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2777, 697, 2, 3, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2778, 697, 3, 3, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2779, 697, 1, 4, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2780, 697, 2, 4, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL),
(2781, 697, 3, 4, '3200000.0000', '3200000.0000', '3200000.0000', '3200000.0000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_properties`
--

CREATE TABLE `product_properties` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `image_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_property_flats`
--

CREATE TABLE `product_property_flats` (
  `id` bigint UNSIGNED NOT NULL,
  `slot_id` int NOT NULL,
  `property_id` int NOT NULL,
  `flat_numbers` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_coordinate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `y_coordinate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_relations`
--

CREATE TABLE `product_relations` (
  `parent_id` int UNSIGNED NOT NULL,
  `child_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_review_attachments`
--

CREATE TABLE `product_review_attachments` (
  `id` int UNSIGNED NOT NULL,
  `review_id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `mime_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_super_attributes`
--

CREATE TABLE `product_super_attributes` (
  `product_id` int UNSIGNED NOT NULL,
  `attribute_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_super_attributes`
--

INSERT INTO `product_super_attributes` (`product_id`, `attribute_id`) VALUES
(612, 23),
(612, 63),
(621, 55),
(621, 56),
(621, 64);

-- --------------------------------------------------------

--
-- Table structure for table `product_up_sells`
--

CREATE TABLE `product_up_sells` (
  `parent_id` int UNSIGNED NOT NULL,
  `child_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `product_videos`
--

CREATE TABLE `product_videos` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` int UNSIGNED NOT NULL,
  `increment_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `total_qty` int DEFAULT NULL,
  `base_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjustment_refund` decimal(12,4) DEFAULT '0.0000',
  `base_adjustment_refund` decimal(12,4) DEFAULT '0.0000',
  `adjustment_fee` decimal(12,4) DEFAULT '0.0000',
  `base_adjustment_fee` decimal(12,4) DEFAULT '0.0000',
  `sub_total` decimal(12,4) DEFAULT '0.0000',
  `base_sub_total` decimal(12,4) DEFAULT '0.0000',
  `grand_total` decimal(12,4) DEFAULT '0.0000',
  `base_grand_total` decimal(12,4) DEFAULT '0.0000',
  `shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `base_shipping_amount` decimal(12,4) DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `order_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `refund_items`
--

CREATE TABLE `refund_items` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `base_total` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `tax_amount` decimal(12,4) DEFAULT '0.0000',
  `base_tax_amount` decimal(12,4) DEFAULT '0.0000',
  `discount_percent` decimal(12,4) DEFAULT '0.0000',
  `discount_amount` decimal(12,4) DEFAULT '0.0000',
  `base_discount_amount` decimal(12,4) DEFAULT '0.0000',
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int UNSIGNED DEFAULT NULL,
  `refund_id` int UNSIGNED DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permission_type`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'This role users will have all the access', 'all', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_synonyms`
--

CREATE TABLE `search_synonyms` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `search_terms`
--

CREATE TABLE `search_terms` (
  `id` int UNSIGNED NOT NULL,
  `term` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` int NOT NULL DEFAULT '0',
  `uses` int NOT NULL DEFAULT '0',
  `redirect_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_in_suggested_terms` tinyint(1) NOT NULL DEFAULT '0',
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int UNSIGNED NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` int DEFAULT NULL,
  `total_weight` int DEFAULT NULL,
  `carrier_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrier_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_sent` tinyint(1) NOT NULL DEFAULT '0',
  `customer_id` int UNSIGNED DEFAULT NULL,
  `customer_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `order_address_id` int UNSIGNED DEFAULT NULL,
  `inventory_source_id` int UNSIGNED DEFAULT NULL,
  `inventory_source_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `status`, `total_qty`, `total_weight`, `carrier_code`, `carrier_title`, `track_number`, `email_sent`, `customer_id`, `customer_type`, `order_id`, `order_address_id`, `inventory_source_id`, `inventory_source_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, NULL, '1sad', 'asdas', 1, 2, 'Webkul\\Customer\\Models\\Customer', 2, 10, 1, 'Default', '2024-04-19 12:23:17', '2024-04-19 12:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_items`
--

CREATE TABLE `shipment_items` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `price` decimal(12,4) DEFAULT '0.0000',
  `base_price` decimal(12,4) DEFAULT '0.0000',
  `total` decimal(12,4) DEFAULT '0.0000',
  `base_total` decimal(12,4) DEFAULT '0.0000',
  `processing_fee` decimal(12,4) DEFAULT '0.0000',
  `product_id` int UNSIGNED DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item_id` int UNSIGNED DEFAULT NULL,
  `shipment_id` int UNSIGNED NOT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shipment_items`
--

INSERT INTO `shipment_items` (`id`, `name`, `description`, `sku`, `qty`, `weight`, `price`, `base_price`, `total`, `base_total`, `processing_fee`, `product_id`, `product_type`, `order_item_id`, `shipment_id`, `additional`, `created_at`, `updated_at`) VALUES
(1, 'Agapeya Duplex House and Lot Flat Yellow', NULL, 'JN-AGM-CL-HLDUF-YEL', 1, 1, '2900000.0000', '2900000.0000', '2900000.0000', '2900000.0000', '0.0000', 65, 'Webkul\\Product\\Models\\Product', 2, 1, '{\"locale\": \"en\", \"quantity\": 1, \"product_id\": \"65\"}', '2024-04-19 12:23:17', '2024-04-19 12:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` int UNSIGNED NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_list`
--

CREATE TABLE `subscribers_list` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tax_categories`
--

CREATE TABLE `tax_categories` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tax_categories_tax_rates`
--

CREATE TABLE `tax_categories_tax_rates` (
  `id` int UNSIGNED NOT NULL,
  `tax_category_id` int UNSIGNED NOT NULL,
  `tax_rate_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int UNSIGNED NOT NULL,
  `identifier` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_zip` tinyint(1) NOT NULL DEFAULT '0',
  `zip_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_from` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_to` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` decimal(12,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `theme_customizations`
--

CREATE TABLE `theme_customizations` (
  `id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL DEFAULT '1',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `theme_customizations`
--

INSERT INTO `theme_customizations` (`id`, `channel_id`, `type`, `name`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'image_carousel', 'Image Carousel', 1, 1, '2024-04-19 10:18:24', '2024-05-09 12:51:15'),
(3, 1, 'category_carousel', 'Our Newest Communities', 5, 1, '2024-04-19 10:18:24', '2024-05-21 12:16:36'),
(9, 1, 'product_carousel', 'All Products', 4, 1, '2024-04-19 10:18:24', '2024-05-21 12:16:39'),
(11, 1, 'footer_links', 'Footer Links', 11, 1, '2024-04-19 10:18:24', '2024-05-03 13:32:27'),
(18, 1, 'static_content', 'Steps', 2, 1, '2024-05-20 09:42:45', '2024-05-27 12:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `theme_customization_translations`
--

CREATE TABLE `theme_customization_translations` (
  `id` int UNSIGNED NOT NULL,
  `theme_customization_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `theme_customization_translations`
--

INSERT INTO `theme_customization_translations` (`id`, `theme_customization_id`, `locale`, `options`) VALUES
(41, 1, 'en', '{\"images\": [{\"link\": \"http://192.168.15.214/rli-bagisto/public/elanvital\", \"image\": \"storage/theme/1/KQaGPp0x9LLNqQrJAEv5KTPJMoBSAdwN2YlRkdVt.webp\", \"isUsingCDN\": true, \"button_text\": \"Elanvital Enclaves\", \"slider_syntax\": \"Family Moments for a Lifetime\", \"image_cdn_link\": \"https://jn-img.enclaves.ph/LandingPage/elanvital-enclaves-banner.jpg?updatedAt=1710918952111\"}, {\"link\": \"http://192.168.15.214/rli-bagisto/public/everyhome\", \"image\": \"storage/theme/1/ri1NKyRkTBABio4aSPYmowfrQweCcLJIdyDvQyQr.webp\", \"isUsingCDN\": true, \"button_text\": \"Everyhome Enclaves\", \"slider_syntax\": \"Galak na Umaasenso\", \"image_cdn_link\": \"https://jn-img.enclaves.ph/LandingPage/everyhome-enclaves-banner.jpg\"}, {\"link\": \"http://192.168.15.214/rli-bagisto/public/extraordinary\", \"image\": \"storage/theme/1/BtgV88bO9P7Wt0mWY3HpARk2Z0naCgwrAXDQAswf.webp\", \"isUsingCDN\": true, \"button_text\": \"Extraordinary Enclaves\", \"slider_syntax\": \"Tagumpay na Nagniningning\", \"image_cdn_link\": \"https://jn-img.enclaves.ph/LandingPage/extraordinary-enclaves-banner.jpg\"}]}'),
(43, 3, 'en', '{\"filters\": {\"sort\": \"asc\", \"limit\": \"10\", \"parent_id\": \"1\"}}'),
(49, 9, 'en', '{\"title\": \"All Products\", \"filters\": {\"sort\": \"name-asc\", \"limit\": \"6\"}}'),
(51, 11, 'en', '{\"column_2\": [{\"url\": \"http://192.168.15.214/bagisto/public/page/shipping-policy\", \"title\": \"Shipping Policy\", \"sort_order\": \"3\"}, {\"url\": \"http://192.168.15.214/bagisto/public/page/refund-policy\", \"title\": \"Refund Policy\", \"sort_order\": \"4\"}, {\"url\": \"http://192.168.15.214/bagisto/public/page/return-policy\", \"title\": \"Return Policy\", \"sort_order\": \"5\"}, {\"url\": \"http://192.168.15.214/rli-bagisto/public/blogs\", \"title\": \"Blogs\", \"sort_order\": \"1\"}], \"column_3\": [{\"url\": \"http://192.168.15.214/rli-bagisto/public/facebook\", \"title\": \"Facebook\", \"sort_order\": \"1\"}, {\"url\": \"http://192.168.15.214/rli-bagisto/public/instagram\", \"title\": \"Instagram\", \"sort_order\": \"2\"}, {\"url\": \"http://192.168.15.214/rli-bagisto/public/youtube\", \"title\": \"Youtube\", \"sort_order\": \"3\"}, {\"url\": \"http://192.168.15.214/rli-bagisto/public/tiktok1\", \"title\": \"Tiktok\", \"sort_order\": \"4\"}]}'),
(53, 18, 'en', '{\"css\": \"@media only screen and (max-width: 600px) {\\r\\n    .image-side {\\r\\n        display: none !important;\\r\\n    }\\r\\n    .content-heading {\\r\\n        font-size: 20px !important;\\r\\n    }\\r\\n    .count-text {\\r\\n        font-size: 16px !important;\\r\\n    }\\r\\n    .content-step-count {\\r\\n        width: 50% !important;\\r\\n    }\\r\\n    .content-steps {\\r\\n        overflow: auto;\\r\\n        display:flex;\\r\\n        gap:10px;\\r\\n    }\\r\\n    .content-steps-content {\\r\\n        min-width: 276px;\\r\\n    }\\r\\n    .mobile-text {\\r\\n        display:block !important;\\r\\n        font-size: 12px !important;\\r\\n        font-weight: 400;\\r\\n        margin-top: 20px;\\r\\n    }\\r\\n    .read-more {\\r\\n        display:block flex !important;\\r\\n        min-width: 100%;\\r\\n        background-image: linear-gradient(268.1deg, #fbf6f9 7.47%, #b7b7b7 98.92%);\\r\\n        gap: 10px;\\r\\n        align-items: center;\\r\\n        justify-content: center;\\r\\n        border-radius: 40px;\\r\\n    }\\r\\n    .read-more-text {\\r\\n        color: #CC035C;\\r\\n        font-size: 16px;\\r\\n        text-decoration-line:underline;\\r\\n    }\\r\\n}\\r\\n.step-home {\\r\\n    gap: 10px;\\r\\n    width: 100%;\\r\\n    margin-right: auto;\\r\\n    margin-left: auto;\\r\\n    margin-top: 100px;\\r\\n}\\r\\n.image-side {\\r\\n    background: url(https://jn-img.enclaves.ph/Bagisto/Step%20by%20Step/image%2034.png?updatedAt=1707976008533) no-repeat center;\\r\\n    background-size: 460px;\\r\\n    background-position: 80% 0%;\\r\\n    width: 100%;\\r\\n    height: 530px;\\r\\n    display: flex;\\r\\n    justify-content:center;\\r\\n    padding-top: 45px;\\r\\n}\\r\\n.step-image {\\r\\n    height: 70%;\\r\\n}\\r\\n.content-side {\\r\\n    margin-top: 60px;\\r\\n}\\r\\n.content-steps {\\r\\n    list-style-type: none;\\r\\n    margin-top: 30px;\\r\\n}\\r\\n.content-steps-content {\\r\\n    display:flex;\\r\\n    margin-bottom: 50px;\\r\\n    font-size: 18px;\\r\\n    font-weight: 500;\\r\\n}\\r\\n.content-step-count {\\r\\n    background-color: #CC035C;\\r\\n    color: white;\\r\\n    height: 50px !IMPORTANT;\\r\\n    border-radius: 50%;\\r\\n    font-weight: 700;\\r\\n    margin-right: 10px;\\r\\n    align-items: center;\\r\\n    display: flex;\\r\\n    justify-content: center;\\r\\n    min-width: 50px !IMPORTANT;\\r\\n    max-width: 50px;\\r\\n}\\r\\n.count-text {\\r\\n    font-size: 25px;\\r\\n}\\r\\n.content-heading {\\r\\n    font-size: 40px;\\r\\n    font-weight: 700;\\r\\n}\", \"html\": \"<div class=\\\"container grid grid-cols-2 max-lg:grid-cols-1 py-[20px] max-lg:px-[32px]\\\">\\r\\n    <div class=\\\"image-side\\\">\\r\\n        <img class=\\\"step-image\\\" src=\\\"https://jn-img.enclaves.ph/Bagisto/Step%20by%20Step/bouncing_house.gif?updatedAt=1707980528078\\\" alt=\\\"\\\" />\\r\\n    </div>\\r\\n    <div class=\\\"content-side\\\">\\r\\n        <p class=\\\"content-heading\\\">How to own your dream\\r\\n            <sapn style=\\\"color:#FCB115\\\">Home</span>\\r\\n        </p>\\r\\n        <ul class=\\\"content-steps scrollbar-hide scroll-smooth\\\">\\r\\n            <li class=\\\"content-steps-content\\\">\\t<span class=\\\"content-step-count\\\">1</span>\\r\\n\\t<span class=\\\"count-text\\\">Explore our catalogue to find your dream home\\r\\n               <p class=\\\"mobile-text\\\" style=\\\"display:none;\\\">First and foremost, you need to know the purpose of the property you plan to buy. Will it be a place for your family to stay, a vacation house, for your business, or investment?</p>\\r\\n              </span>\\r\\n\\r\\n            </li>\\r\\n            <li class=\\\"content-steps-content\\\">\\t<span class=\\\"content-step-count\\\">2</span>\\r\\n\\t<span class=\\\"count-text\\\">Allow us to help you with the details of the home package\\r\\n\\r\\n  <p class=\\\"mobile-text\\\" style=\\\"display:none;\\\">Estimate a move-in date. Do you need a place that’s ready for occupancy, or can you wait for a couple more years and settle with pre-selling properties instead?</p>\\r\\n  </span>\\r\\n\\r\\n            </li>\\r\\n            <li class=\\\"content-steps-content\\\">\\t<span class=\\\"content-step-count\\\">3</span>\\r\\n\\t<span class=\\\"count-text\\\">Upload your documents and makes reservation!\\r\\n              <p class=\\\"mobile-text\\\" style=\\\"display:none;\\\">In the Philippine setting, property developers have a roster of brokers or agent to sell properties on their behalf.</p>\\r\\n              </span>\\r\\n\\r\\n            </li>\\r\\n            <li class=\\\"read-more\\\" style=\\\"display:none;\\\"> <span class=\\\"read-more-text\\\">Read More</span>\\r\\n\\r\\n            </li>\\r\\n        </ul>\\r\\n    </div>\\r\\n</div>\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `ticket_reason_id` bigint UNSIGNED NOT NULL,
  `ticket_status_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `customer_id`, `ticket_reason_id`, `ticket_status_id`, `comment`, `created_at`, `updated_at`) VALUES
(65, 2, 2, 2, 'Example: Mouse Pointer Position Change To see the difference in mouse pointer position from one click event to the next we can subtract the old x-position from the new x-position. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nExample: Mouse Pointer Position Change To see the difference in mouse pointer position from one click event to the next we can subtract the old x-position from the new x-position. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2024-04-24 06:57:45', '2024-04-24 07:01:47'),
(66, 2, 1, 1, 'asdasdasd', '2024-04-24 12:46:15', '2024-04-24 12:46:15'),
(67, 2, 1, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-05-02 09:38:41', '2024-05-02 09:38:41'),
(68, 2, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:39:11', '2024-05-02 09:39:11'),
(69, 2, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:39:42', '2024-05-02 09:39:42'),
(70, 2, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:40:14', '2024-05-02 09:40:14'),
(71, 2, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:40:25', '2024-05-02 09:40:25'),
(72, 2, 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:40:43', '2024-05-02 09:40:43'),
(73, 2, 1, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:40:53', '2024-05-02 09:40:53'),
(74, 2, 2, 2, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2024-05-02 09:41:04', '2024-05-02 09:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_faqs`
--

CREATE TABLE `ticket_faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED DEFAULT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_faqs`
--

INSERT INTO `ticket_faqs` (`id`, `customer_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'asd', 'asd', 1, '2024-04-23 07:38:42', '2024-05-09 05:24:39'),
(2, 2, 'Is it safe to buy or rent property online?', 'Lorem ipsum dolor sit amet', 1, '2024-04-23 07:43:02', '2024-05-09 05:24:06'),
(5, 2, 'fgsd fdsfdas f..', 'das fdasfffds', 1, '2024-04-23 10:46:39', '2024-05-09 05:24:33'),
(6, NULL, 'asdasdas', 'dasdasdasdas', 1, '2024-04-23 11:32:58', '2024-05-09 05:24:30'),
(7, NULL, 'dfsgdfsgdfsgdfsgdfg dgsfdfg sdfgsdg dsfg dfg', 'dsfgd gdfg dfsgdg dfgdfg dsgggdsgdsfgdfsg dfsg sdfgdfs gdfs gdfsgdfsgdfsgdfs dsfgd gdfg dfsgdg dfgdfg dsgggdsgdsfgdfsg dfsg sdfgdfs gdfs gdfsgdfsgdfsgdfsdsfgd gdfg dfsgdg dfgdfg dsgggdsgdsfgdfsg dfsg sdfgdfs gdfs gdfsgdfsgdfsgdfs', 1, '2024-05-09 05:24:59', '2024-05-09 05:25:04'),
(8, NULL, 'das asd asdgf asdfdsf', 'dasfdas fads fdasf dasfdasf dsfds fdasf dasfads f', 1, '2024-05-09 05:25:11', '2024-05-09 05:25:34'),
(9, NULL, 'asda adf dfg sdfg sdgdf gdfsg dfs', 'dsf gdsfg dfsgdsg dfsg dfgdfsg dfsgdfsgdfg', 1, '2024-05-09 05:25:43', '2024-05-09 05:26:43'),
(10, NULL, 'dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds', 'dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds dasfasd fdf sdf adfads fsf dasf asdf dasfdasf asf sdf dasfasdfds', 1, '2024-05-09 05:27:05', '2024-05-09 05:27:11'),
(11, NULL, 'dsgf sdgdfs gdfs gdfs', 'dfs gdfsgdfs gdfsgdfsgdfg', 1, '2024-05-09 05:27:17', '2024-05-09 05:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_files`
--

INSERT INTO `ticket_files` (`id`, `name`, `path`, `ticket_id`) VALUES
(30, 'pV1HI.webp', 'tickets/66/pV1HI.webp', 66),
(31, 'WaaDj_0.webp', 'tickets/67/WaaDj_0.webp', 67),
(32, 'No0wg_0.webp', 'tickets/68/No0wg_0.webp', 68),
(33, 'NcCKK_0.webp', 'tickets/69/NcCKK_0.webp', 69),
(34, 'y8P9m_0.webp', 'tickets/70/y8P9m_0.webp', 70),
(35, '7AfMB_0.webp', 'tickets/71/7AfMB_0.webp', 71),
(36, 'DtCqf_0.webp', 'tickets/72/DtCqf_0.webp', 72),
(37, 'nDvPK_0.webp', 'tickets/73/nDvPK_0.webp', 73),
(38, 'ABRJU_0.webp', 'tickets/74/ABRJU_0.webp', 74),
(39, 'AAtkR_0.webp', 'tickets/74/AAtkR_0.webp', 74);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reasons`
--

CREATE TABLE `ticket_reasons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_reasons`
--

INSERT INTO `ticket_reasons` (`id`, `name`) VALUES
(1, 'Reservation Fee'),
(2, 'Reservation Fee 1'),
(3, 'Reservation Fee 2');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status`
--

CREATE TABLE `ticket_status` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ticket_status`
--

INSERT INTO `ticket_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Resolved', NULL, NULL),
(2, 'Pending', NULL, NULL),
(3, 'Rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `url_rewrites`
--

CREATE TABLE `url_rewrites` (
  `id` int UNSIGNED NOT NULL,
  `entity_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `url_rewrites`
--

INSERT INTO `url_rewrites` (`id`, `entity_type`, `request_path`, `target_path`, `redirect_type`, `locale`, `created_at`, `updated_at`) VALUES
(2, 'product', 'agapeya-duplex-house-and-lot-slant-green', 'agapeya-towns-hopefull-green-slant', '301', 'en', '2024-04-30 11:58:24', '2024-04-30 11:58:24'),
(3, 'product', 'agapeya-duplex-house-and-lot-slant-purple', 'agapeya-towns-nostalgic-purple-slant', '301', 'en', '2024-04-30 11:58:35', '2024-04-30 11:58:35'),
(4, 'product', 'agapeya-duplex-house-and-lot-slant-pink', 'agapeya-towns-graceful-pink-slant', '301', 'en', '2024-04-30 11:58:47', '2024-04-30 11:58:47'),
(5, 'product', 'agapeya-duplex-house-and-lot-slant-yellow', 'agapeya-towns-joyful-yellow-slant', '301', 'en', '2024-04-30 11:58:59', '2024-04-30 11:58:59'),
(6, 'product', 'agapeya-duplex-house-and-lot-flat-green', 'agapeya-towns-hopefull-green-flat', '301', 'en', '2024-04-30 11:59:13', '2024-04-30 11:59:13'),
(7, 'product', 'agapeya-duplex-house-and-lot-flat-purple', 'agapeya-towns-nostalgic-purple-flat', '301', 'en', '2024-04-30 11:59:22', '2024-04-30 11:59:22'),
(8, 'product', 'agapeya-duplex-house-and-lot-flat-pink', 'agapeya-towns-graceful-pink-flat', '301', 'en', '2024-04-30 11:59:33', '2024-04-30 11:59:33'),
(9, 'product', 'agapeya-duplex-house-and-lot-flat-yellow', 'agapeya-towns-joyful-yellow-flat', '301', 'en', '2024-04-30 11:59:42', '2024-04-30 11:59:42'),
(10, 'product', 'zaya-studio-condominium-with-balcony-end_unit', 'zaya-studio-condominium-with-balcony-end-unit', '301', 'en', '2024-04-30 12:00:04', '2024-04-30 12:00:04'),
(11, 'product', 'zaya-studio-condominium-with-balcony-inner_unit', 'zaya-studio-condominium-with-balcony-inner-unit', '301', 'en', '2024-04-30 12:00:10', '2024-04-30 12:00:10'),
(12, 'product', 'zaya-studio-condominium-standard-end_unit', 'zaya-studio-condominium-standard-end-unit', '301', 'en', '2024-04-30 12:00:17', '2024-04-30 12:00:17'),
(13, 'product', 'zaya-studio-condominium-standard-inner_unit', 'zaya-studio-condominium-standard-inner-unit', '301', 'en', '2024-04-30 12:00:24', '2024-04-30 12:00:24'),
(14, 'product', 'zaya-studio-condominium-with-veranda-end_unit', 'zaya-studio-condominium-with-veranda-end-unit', '301', 'en', '2024-04-30 12:00:32', '2024-04-30 12:00:32'),
(15, 'product', 'zaya-studio-condominium-with-veranda-inner_unit', 'zaya-studio-condominium-with-veranda-inner-unit', '301', 'en', '2024-04-30 12:00:38', '2024-04-30 12:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint UNSIGNED NOT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `referer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `languages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `useragent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `headers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `device` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `platform` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `browser` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitable_id` bigint UNSIGNED DEFAULT NULL,
  `visitor_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(1, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/zaya-studio-condominium-standard-inner', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"cache-control\":[\"max-age=0\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/zaya-studio-condominium-standard-inner\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImM3cDM4Z0RINGlsNWw3ekRua2R1aHc9PSIsInZhbHVlIjoiRTRzbFpKbm8vaEljS3hseExBcGN6NFRkMHFIMjhWRXU1akdoSzgyWmlOU1J3TkFNNDY2cTFibGlHamxOL3phMzlneWZmK0NyMjZJdURpNUx0NExzVXdNTjMwZDBDbjZaOW45N05QZCtsNGl3cXdYTXF2T1FSU0luTWlaYTR5Y3oiLCJtYWMiOiI4M2M5NGY1MzNjMDMyYjYyYzRkN2MyZDI2YjAyNDBhZDlhMzYxNzVkNGVlZmJhMjI0NmY1MTliNzdkNGNhMzBmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkdwdjhvMHBhNEpRUjJWQkNUenpDREE9PSIsInZhbHVlIjoiTTdTV2NZcGFheG5ETGVzait5cHVqRGZkQlY1akszeEU1bk5nNjMzSnJTKzBVaHF4clVMVFdOU0Q5ZC82Tk9EbW1MUW9VRHpVdEt5eVJVZlM4NkZTL2toRktCUlltN2o1RGRPWnMwZXJKdDhpVmRHQnlCTXF4dS9VWk9ReWFVVEYiLCJtYWMiOiJhNTYwMzg0MzJhMGMzYmE2M2FlZDI1YmVhNzQ0N2E3M2ZlNzJlYWU2MTA4YzVkNTZjM2Y4YmFhYTdkNTFhYWFiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:07', '2024-03-21 12:04:07'),
(2, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/1.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImlLdlplcHRFVHhRS28wYzJmR0hoQkE9PSIsInZhbHVlIjoiQkFTTEZhU3QxMWZ2TDNicXFEZ3JVTTAwWnRXTVUwd01SaTViOWpCU1RmakJTdnIwdGN6WUt2S0VlMTc5bTlFRzA1NXJ1MG9ZNzZPdEh2OGNiZnBkNG55RTgyQ1hvbzFYb1Z3dWU5MExia25zVXJaK3FYL3o5em9yQnRVQWhUY3kiLCJtYWMiOiI5NTIyNTEyNzYyYjAzZDE2NGQ3OTkyMGQzODVmMzVjOWQ0Nzg1MjNiMTA4ZDE1MWIyNmQyMjE3NmZjNWY0ZGMyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkZhY0s3OFVxcXhvU3pPaklxaEJMclE9PSIsInZhbHVlIjoiRjZGTG5vVThoOGR3bDJGczhBWFdSL3Zza0NDSy84NS9wck5QQnJJajludEhORFlhVmpiZmoraFMzQ0FobUphajZJRjNhc0lQbXkva2R1YTdPUHdQQ1pzdXgzSllLWVJKOVVFVk9IaFlvWTZDM0JJQlpORnAzcG9uanV6NmdseFUiLCJtYWMiOiJmMTMyNDRiZTJlZTFkNmI1MTY4MjBjZWVjYjI3NmVlZWIwMzg0M2I4NDdmMjYxNWI1OGQzNWM2Y2VkMDk1ZjEyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:07', '2024-03-21 12:04:07'),
(3, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/2.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IjluOE5qdlA1bnZWWDZ6Sm1DdG1xSWc9PSIsInZhbHVlIjoiYS9sWUU3QTZtcm9DeDN0c1BsdFo4cjV2SUlYVEE2Vmd3d2RQQ201MFNzcCtEZ1dJd1VvNlA2N1Q3SlozWTBzVHBaeXY3eGJyL0pwZEFXN3ZSaUVSai9FMWxSWVh4a2Ezclk4UXF2UkMrTWdRSTV3Z1gydHU3VlEwSzF4L0x3N2UiLCJtYWMiOiI5MTYwMjhlYzhmNDQ5MmQ3YjY3NjY3N2QwZGI1Njg5ZTBjZjA4YTg2MjViZTVlY2U4ODdhZWI0MTRmYTg2OWEwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlRjN2RGU2tBOEUyYW4zN1BtUlRMV0E9PSIsInZhbHVlIjoibnJqd3R0eXZrbWlyK2U5V1FuZnlYalJRK01jaE5GcUYxZWFjWm1aTXBjc1UvRkFQYmUyWGJFenNQOW5OTHczdExKZDZGN0ZkakNxVU9ycXNMd2FDVHMzVFlkV2h2V3hiY080eldabWJxM1FGa3ROaVZsMVYrU0IvYk9RdEF4elYiLCJtYWMiOiIwN2U5ZGY2ZjNiMDg5YTU1NWQ0OTk2ZDk1ODE3NWY3MTE0MzkwNWZjNjVkYzVhZDhlZmNhODkwN2Y1YTQwNGE5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:08', '2024-03-21 12:04:08'),
(4, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/3.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImJ2eW5CeDkzK0FOVktGVndSc3hmbVE9PSIsInZhbHVlIjoib2JMdXJlNS9jR0xlYmlBY3ZsQ1g2M2VoaFVicEl1WmNSQTNldStDaWl3Z09mN3lNNUQzTEFWenl2dDN5WkdUR3lGR2hMK1VYcHVURDhqM1p3c2Y5dHFIWlQ4c21hVjlERzZmeXhOM2hYSHpWUmtISUt6THJWSmFnNStjYW84cEIiLCJtYWMiOiIyYmNhZGFhNWEwM2QwOTM5MmQxMjMxZDZjMzUyZWU2M2QxNWJmZWQ2NGQyMWUxZjI3MzUwYTVhYTg2NDRjMDJkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkZRaGtWaWhZbVBhdnZWT1I5YjY2L1E9PSIsInZhbHVlIjoiVEpDbHhmMTd0ZVlRcVNDMVRCMFV0cmNkR0xxU0gxRGh1T2ZlUmsyNm1BaE9aNTR3eURZN0U0aTdUNkZ6MjJRYStXa1RCbTY3Z3ptb0M2NExCU0dwQmtkV2xWZGtUbVV3ZlVrTGtnNm1pVnR2SkpXck1EKzNNUk15aEQ3Qy8rV1QiLCJtYWMiOiIyYzFhNDU1Mzk4YzE3NmY4YWJhYTZiZTc2NDg3YTY2NDNmMWQ2NDYwZjYzMDRmMDE2ZGIxMjI2NWZiMzE0MmJjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:08', '2024-03-21 12:04:08'),
(5, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/4.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkRVdVFQRVdKMStzR0dKa0JRVm5GcVE9PSIsInZhbHVlIjoiQ3M0MVVNaVhxMmpLVk91NDJsN1laSjl3aEVXUUxIaG9xODlFTzJQN1VIK0RtWllMUmhkS1NORDQ2eTljbXVGV3RDUzc1U3hJMzRnL0NhZlNmQi81SEROQzJaZnhsTTJjNThtc0ozVllKMFpaSHpkM2xBL1MwY0JxSlAydlNIVWQiLCJtYWMiOiIxZDlkOTdlNzhhODY4OWE4NzliYWQxM2Q4OGQxNzQ4MzVjODVlODJkMDExOTIyMTdjNmMzNjIwNWUwZmM1MDVlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkorRE5yZ0twS3hmaVNwd3J4dm54K0E9PSIsInZhbHVlIjoidUFmcHVBeW1LSWlNNWVlZTFhYzBNMDNUa3NzTUREY0dkTEt1TXU3V3dycFdYTFFoRGNjNCttcnBFalArakwweFRlWmZFaXdpY3RhQVlwd3I2WFJQUkx1SHFqdUJVaFU2d0YrNUQ1T0tGK0wxN0RBSFlSR2hpVnBaUTNEZDg3YWEiLCJtYWMiOiJhM2VkMDgwZTcwYWU3YWMzZDljZDI4NTQ0NTNjMTNhNzZhZWUyMTlmNTJkMGU1M2JiMTQxMTE3MzRmNGM5MDNlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:08', '2024-03-21 12:04:08'),
(6, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/2.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlNGUktKa1FGcytyZjF2ekFRQjhvcmc9PSIsInZhbHVlIjoidDNwTXFCdjZDWFM3WlV5bzFZdzNJWVdxUzcybkN6WHdRZ1RORkZoUDA4MTJKRnEydXlZUG02ZVFod2YxSi85UWdrbWRnZE1KeVROSitRMHR6dk5rTTVGalNWSEpxTGd1V2xPRFU2V0FZbTBqTlhwTFhsdDVFZjFqUWFHYjFYdGYiLCJtYWMiOiI5OTAzNmViZDZkN2Q0YjRlMDIxN2Q4NjA2ZTdiMDlhOTg2ZGZkZjk4ZDhiZDE4ZDlhZWIwMDZjY2YyY2Q1Y2NhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InRoN1Ntell1NEk0RXEzcktFU3ROcUE9PSIsInZhbHVlIjoiNUpDQTRaUzYzT3MyTlBRVnhTcG05ZmpSWnNwVjhoY2FOanVEbDNyMksyZXhvMjhoa01MTVBDa2d2Vk9zUHUySmxVYkI2dWtTaVpMM1BwbFJpS2tGbzZYZDNPVUxQc3NOYUZJZ0FhNVlva2dwd0pnam9aYUFSakxmdktBT2krakIiLCJtYWMiOiI4YTFjNDgxYzY3NDFhMDU3NjUyYjIzMjY3MTFmMjA4OTliNWU0ZDYzY2VjZmFhODJjNTU1YjRhYzNjZGM4MDZhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:09', '2024-03-21 12:04:09'),
(7, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/1.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlNGUktKa1FGcytyZjF2ekFRQjhvcmc9PSIsInZhbHVlIjoidDNwTXFCdjZDWFM3WlV5bzFZdzNJWVdxUzcybkN6WHdRZ1RORkZoUDA4MTJKRnEydXlZUG02ZVFod2YxSi85UWdrbWRnZE1KeVROSitRMHR6dk5rTTVGalNWSEpxTGd1V2xPRFU2V0FZbTBqTlhwTFhsdDVFZjFqUWFHYjFYdGYiLCJtYWMiOiI5OTAzNmViZDZkN2Q0YjRlMDIxN2Q4NjA2ZTdiMDlhOTg2ZGZkZjk4ZDhiZDE4ZDlhZWIwMDZjY2YyY2Q1Y2NhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InRoN1Ntell1NEk0RXEzcktFU3ROcUE9PSIsInZhbHVlIjoiNUpDQTRaUzYzT3MyTlBRVnhTcG05ZmpSWnNwVjhoY2FOanVEbDNyMksyZXhvMjhoa01MTVBDa2d2Vk9zUHUySmxVYkI2dWtTaVpMM1BwbFJpS2tGbzZYZDNPVUxQc3NOYUZJZ0FhNVlva2dwd0pnam9aYUFSakxmdktBT2krakIiLCJtYWMiOiI4YTFjNDgxYzY3NDFhMDU3NjUyYjIzMjY3MTFmMjA4OTliNWU0ZDYzY2VjZmFhODJjNTU1YjRhYzNjZGM4MDZhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:09', '2024-03-21 12:04:09'),
(8, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/6/1.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6Iis0ay8yTE9oSWs5ZmxObGt4Qlk0ZFE9PSIsInZhbHVlIjoiK1kxL0hOTnpHcElEQkc4QmRZWll0OWJCZ2RFRmowMmt3SHphZHUrbnpBY3RaQUVnUzJySmwzQUZzK0xvMEV1WSt0TVo4YTFSWEc5SW9ESGxSQkN3RFVhbUZhbXpySXRzendES1ZpdVdrQmlIeC9GSVNmTzlJSUZFdDNXUW03RDMiLCJtYWMiOiIyYjA1ZTdmYTA2MjFmMTU5Zjg1YjVjNjJjNTRmYTc1MTZjMTdlYzgzZDEwOWUyZTA1YzJiOWI4MzViZjFhNzZjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5EZStiSjZCcjVkMzlwZ1NrQ2hCWkE9PSIsInZhbHVlIjoiN3BwYjIyeVFUcGY1M1Bud0NiK01aazNEQkpIaks3RExEUUgyNzRiUkowNjJySDNWeWM1RkVxQXVnUmRhY2pYVjNPSzBnZTlkcm1aT1p1OVdlMGVzOEdSRXJpZS9PSFZVTGlGYWpmYVFwRTg2ZDBhOFhCaUpQVXVESFZVZlB6TVIiLCJtYWMiOiJiZjRiMmMzNTc3MDY3MTZjOTlhOGZmMDcwZTIwYTcxYzVlYzk0ZDFmOTY0OTg0ZGJkMTJjMGRkMDRjZWI1YmFiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:11', '2024-03-21 12:04:11'),
(9, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public//storage/theme/5/1.webp', 'http://192.168.15.214/rli-bagisto/public/admin/settings/themes/edit/5', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/settings\\/themes\\/edit\\/5\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6Im5OTk93V21OSkI5SDJUSTBUeUpPcHc9PSIsInZhbHVlIjoiZ3dDQ2FIeWJlZHdLU0tzQjdOWURna3pRdFNDNEYyWERNZVBYdk1Cak0xVUpIdm1NWmpGRkZpdGNmUjhHSDRmNU1PNkZJM3BRRXRZQU9SWS8wbFRCY3RncFZ0YnJNb3BhNzBIQUJqOWNteDh0dnRyemNRUXc2QXJCWVpGa0FWc0YiLCJtYWMiOiIyZTc2MzgxZGYyYjExNDM1MWJhNDUyM2E2ZDE4YWNlMDE5ZmYwOWZjY2Y1OTVmOWU4NDBkZTBiZWI2ZTk3YzRmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNMYXVYU25HbXdJMzZhZ3c2Q3IydkE9PSIsInZhbHVlIjoic0tjN0dubWw5SDZZV3kzUEFUd1JWZU1IU2RjekNrOHM4dmhkQW82VE40Rit6UTE4V2pjTW8wUXZIZ1kra24zT0Q1N00rdFFkQ3pSd1Faci9wamYwTVBySVFQMUN0UDZRdnA4djJ3NEJwd0gzUys3UHZKcjdadGhIcVlweUVaZGciLCJtYWMiOiIzMWEwNGNkMTcyZmJjYjFkYTkxNGVkNDVlYTBmNzg0NDVjNzg4ZjU5ZjFmMDM1YjZhYzBlNDVlZDM0YTk4NmViIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:14', '2024-03-21 12:04:14'),
(10, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public//storage/theme/5/2.webp', 'http://192.168.15.214/rli-bagisto/public/admin/settings/themes/edit/5', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/settings\\/themes\\/edit\\/5\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6Im5OTk93V21OSkI5SDJUSTBUeUpPcHc9PSIsInZhbHVlIjoiZ3dDQ2FIeWJlZHdLU0tzQjdOWURna3pRdFNDNEYyWERNZVBYdk1Cak0xVUpIdm1NWmpGRkZpdGNmUjhHSDRmNU1PNkZJM3BRRXRZQU9SWS8wbFRCY3RncFZ0YnJNb3BhNzBIQUJqOWNteDh0dnRyemNRUXc2QXJCWVpGa0FWc0YiLCJtYWMiOiIyZTc2MzgxZGYyYjExNDM1MWJhNDUyM2E2ZDE4YWNlMDE5ZmYwOWZjY2Y1OTVmOWU4NDBkZTBiZWI2ZTk3YzRmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNMYXVYU25HbXdJMzZhZ3c2Q3IydkE9PSIsInZhbHVlIjoic0tjN0dubWw5SDZZV3kzUEFUd1JWZU1IU2RjekNrOHM4dmhkQW82VE40Rit6UTE4V2pjTW8wUXZIZ1kra24zT0Q1N00rdFFkQ3pSd1Faci9wamYwTVBySVFQMUN0UDZRdnA4djJ3NEJwd0gzUys3UHZKcjdadGhIcVlweUVaZGciLCJtYWMiOiIzMWEwNGNkMTcyZmJjYjFkYTkxNGVkNDVlYTBmNzg0NDVjNzg4ZjU5ZjFmMDM1YjZhYzBlNDVlZDM0YTk4NmViIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:14', '2024-03-21 12:04:14'),
(11, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public//storage/theme/8/2.webp', 'http://192.168.15.214/rli-bagisto/public/admin/settings/themes/edit/8', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/settings\\/themes\\/edit\\/8\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkNaNXdIZ0ROalp5b0Z1bEd2NkFYOUE9PSIsInZhbHVlIjoiN0tTQURZUHh1VjlqSmhGNjBDdFJ3OW9zVktDRkh6R2czTTRuTjQ1MXBBT3hDeFFab01Kby9Mc3o1eDRrSlp2UVI0V0lGaW50Q0FXck9uWTdOS1doQ21NSW1XU1hzVWpXUjV5L3k0aTRLRk8xUFY2WStrdmNkVS8rQzlQOUsxRmwiLCJtYWMiOiI2YjNlNDYwYjkwZTA0MjA5YWY3ZWZlZjA0ZDNiZTI0ZWQ1OGRhZDcxNGVmODVjYmE3MWM0MDc0ZGY0OTExZmYxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5ibFVVcXd0MFBuTkphTUcxV042OFE9PSIsInZhbHVlIjoialhLeGJIdFZiZTV0L05jc2dEWE1VOVJtWG92d2g5Z0M4Rlh2VFhKbkk4SjhFajVhOFFoVkF6SjBuTitrdHZFb2E2WXJMZmVsUVBZelZQeU8vUWJIVU1peDBZRnc0SlhVNFQrZnpWbEtXb0lDVUtMYks2VWJNeWFnSUNhLzZqU1oiLCJtYWMiOiI2NWNmODQ4MWQxMzc2NmViODFiMDUzMTE0OThiOGU0ZDZlZjM3N2YwZGNlOGU0OTk2MTFmZTgwY2FiNWI0ZWM0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:14', '2024-03-21 12:04:14'),
(12, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public//storage/theme/8/1.webp', 'http://192.168.15.214/rli-bagisto/public/admin/settings/themes/edit/8', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/settings\\/themes\\/edit\\/8\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkNaNXdIZ0ROalp5b0Z1bEd2NkFYOUE9PSIsInZhbHVlIjoiN0tTQURZUHh1VjlqSmhGNjBDdFJ3OW9zVktDRkh6R2czTTRuTjQ1MXBBT3hDeFFab01Kby9Mc3o1eDRrSlp2UVI0V0lGaW50Q0FXck9uWTdOS1doQ21NSW1XU1hzVWpXUjV5L3k0aTRLRk8xUFY2WStrdmNkVS8rQzlQOUsxRmwiLCJtYWMiOiI2YjNlNDYwYjkwZTA0MjA5YWY3ZWZlZjA0ZDNiZTI0ZWQ1OGRhZDcxNGVmODVjYmE3MWM0MDc0ZGY0OTExZmYxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5ibFVVcXd0MFBuTkphTUcxV042OFE9PSIsInZhbHVlIjoialhLeGJIdFZiZTV0L05jc2dEWE1VOVJtWG92d2g5Z0M4Rlh2VFhKbkk4SjhFajVhOFFoVkF6SjBuTitrdHZFb2E2WXJMZmVsUVBZelZQeU8vUWJIVU1peDBZRnc0SlhVNFQrZnpWbEtXb0lDVUtMYks2VWJNeWFnSUNhLzZqU1oiLCJtYWMiOiI2NWNmODQ4MWQxMzc2NmViODFiMDUzMTE0OThiOGU0ZDZlZjM3N2YwZGNlOGU0OTk2MTFmZTgwY2FiNWI0ZWM0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-03-21 12:04:15', '2024-03-21 12:04:15'),
(13, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImhoY255OXBrZWU5Y2FYUWhwLzg2YWc9PSIsInZhbHVlIjoiblE1WWEwZm05cyt5VTJseDF1YVd5S3YrRWsvcUxRTFo4QW05ZU80MzdUSzJnaWtMaXNqM2RBOXk5Ui85Y0JFd3BmUFVIckQ2Z25GWXV1OWJYR21RUWMvU0Vwa3RQMkFRWStqNDlJcSt0R0k0dVEzS3lwYXI2akE2bkY3RjFpMlUiLCJtYWMiOiJkNjRhMDg1MjE1OGI4YTBjYzcxMjVjMDQyY2E2ZGJjZmM2MTFlMTVhYTdlNzU3MzhiY2ExOTllMDZkOTVjOThhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlJGSTQ4YkdsN1pMcFp4YzhPaHl5Tmc9PSIsInZhbHVlIjoiMjZ3OFM3am96STdtTEIwSFFrVHFJdkFJQVFCOEJpVFg3SnVNYWE1VkVPbmdiMU1mRnVuR3pFaVptdEdBMThhSFVBUmlncGVOZlBtUEpueHYvZ0QySnpPOTkycWhQOUdqS0JFUFdwekViRnlQUTZNRzlobTlSRXAzQzczSWNPZ1ciLCJtYWMiOiJiZTQxMWEzMTdiYzIyMzM4MDU0NThhODE4ZTViZjMxNDY3ZDMxZWMyNWVlOTZiZWY0Y2ZkZGM1MjRiMjdhNjJlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-03-21 12:46:04', '2024-03-21 12:46:04'),
(14, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/everyhome', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6Ikp1eXdhRkdmTElFWHM5dUd4NXg2VGc9PSIsInZhbHVlIjoic1JNNVhUK21TVGtnOG5WQXBwNERtL3dJQ2NJSktCdFVLMU0vMUhMSGlkb2lZZW1RTk9hNXBHOWV6cEYwUnhLeGhKSytKWVpYTGphOTVYeVFxTmg0S3BoZTljd0Vza2g3Z0J0RzlwanZiTHpXcTJmWFhWMU1iK21vWmRmeGJ0UnQiLCJtYWMiOiJjNTdiOGZhZjlmOTY4NGZhYzZhYzM2MzViODY1NWZkYWI1OTM4ZDI1ZTk4OTY4MDY3MTlhOTI0ZWM1NWZhNWNjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkhTMGVYZ3ZveHB6M3E2a1NjSGFTOUE9PSIsInZhbHVlIjoicU4wNmpKb3E4aHhqSWUwRHJQeHNXNk85TDhyUU9RR0ZoQnBLK3lraVNvb1RDNzM1VjZ6Zk9tdis3SDcrNyticTdocjlzbEhxLzJndVBZVUczM0IrQ0tmYU85YWxDS2pkcjhxeUZUcXZsNFZ0L090Y0g0N0pWTzZGcmhaQSsyc1IiLCJtYWMiOiI3ODA5ZDQwODBhZTQ1ZDRiMzBmZmY0NmFjNGUxZTY2ZTdhNjA1NDlkYWM2MzE3M2VlZGJjZDY4MGE4ZjMyMjZjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 3, NULL, NULL, '2024-03-21 12:46:10', '2024-03-21 12:46:10'),
(15, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/extraordinary', 'http://192.168.15.214/rli-bagisto/public/everyhome?sort=price-desc&limit=12&mode=grid', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/everyhome?sort=price-desc&limit=12&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IjQxRHB5bFZwV2xRTFYreDhkbXR6WVE9PSIsInZhbHVlIjoiZ3FBZUtoakJsdkprNmFSWTR1VWgrdHZXblZadTlheWdEZ05tcU9sUytTUGU4ZEJNTXppbWQ3MmV0VUFSbWNLYklzd3JlTktrcVo4aHFpTnpIMm1YaEYzam5IdjNzNDAreTZKK1loRlMrK1lVNmRORjU2aEJEQ2tYdHMyVGVvMUsiLCJtYWMiOiJhMGYxNmZkYzk1MTQ0ODFkZjYwN2JkZTFhNzJlNTFjOGIwOTQwZGYxZjljMTAxNzc2ZmM2MjAyYzNiNTBmZTM1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik5HZ0RMdDVoNXoza0J6cmhrTUFiNnc9PSIsInZhbHVlIjoiSXBEaWhrL0hDbWpQdjVwRzU0MHFjQXV5M1VvaDcxTkFqYVVCbzE1TVM0V2VXZDRjRmxuSnBnUjVWbDF2TmpYNVI1aU1IZkl6ak5vTDY1S1ZsZTR5UitOeDdiZ2UxUGpyWitrMExONmdPcytUT1h1WTlSYnJvWlRoZjF4a1YzVXIiLCJtYWMiOiJhMWY0ZWEyMzliYWM3M2JkOTIxZTNkYTI3ZmMxYTYyZTViNzgyY2Y5MDczYWY2MDYzYTljMDRlNGJmNDYwODI4IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 4, NULL, NULL, '2024-03-21 12:47:05', '2024-03-21 12:47:05'),
(16, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6InU0SEFqUEJUbU9oVTZwOUMxY2w3c0E9PSIsInZhbHVlIjoiRmRacTFsckVoMlJYOWhmNHR4ZUh4UGFYZ25RdmNNMjQrTjNocTMwWFJGSkVpQ2hGK1lJWWNMY2dGUGRpK01lbzN5Q2oxYm1ZaVFab25hcUt5YTRnTXZwWnhKR2Y4bjFHR0IwcXloQU0zc0VJL09JbldtTUxsUlRDQ2FxRG82bXYiLCJtYWMiOiIzOThhMGUwZTc4NzY4ZGVkOGNjYzUwZTZkNWNjNzViNTdiOTlmODEyZGIxMGZjZTA3ZjE2YjRiOWVkMzIzZDRjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkQxamxsbHBRa00yY0s0eTlGZGsvV2c9PSIsInZhbHVlIjoiMmI1eHd1ZlNTaTMzOW5KQjhrRGlCSmlhWGxkaFgxM3FPYUY3TXphYm5SVEErZE1sU0NmQ3pUd0E1OXFGeUF1QTFjTEEzKzc2NlBIcEpka2dkS1hvdERCbVQ4VlgxZGVyTG1NZC9QTEwwQlhlQkVESnFPbzZKdVk2VUtOOFBWZUwiLCJtYWMiOiI4N2I2YjgxZWJiZGIyYWRjYmEzMDMyZDE3MmM0NTA5NGUxMGQ4Zjc3NmY2MTNlNTBjZTNjMTkwZmM2ZWIxMTRjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-03-21 13:13:50', '2024-03-21 13:13:50'),
(17, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6Ik9ydkpvU05BVjdBSlMyM3Nkd3Ztd3c9PSIsInZhbHVlIjoiK2xnWXM4RUIvZDhOMzJjMnEvbWxCOElKRklLTG1FeGRJdVQyR1lXRFphdmR4WkRNR0xEOVBUQUJBaWU1VlV3dmdQb0RweTNhWCtJaFBnd0htU0dlYmVUdkdBbXBXc1BoZXBpb0lueldMRVdlMDFmaERDTmhuby9TMGhpRFZBRTUiLCJtYWMiOiIwNjA3ZjJkYjFkZDkyZDcyMGJmYmVmYTUxODRiZTZlMjE5Mzc4ZTRkN2E4NWM3MmYxMzY2NjYzMWIzZmI2NzM4IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Inp4ZmRrZ0FVMmt0TElTVmM4R1BsdFE9PSIsInZhbHVlIjoib3dycDYvN3M4MUhqT1daaE1oekczNHZpd0ZLUlpKOHE4L25vU1kzQUpTc243dHh2TWxlWGJuTHZBT3draEIwQ0RCTTB6STYvVnRYcE0rRHJOelY0THloZVloQ1dTM2cyQ2NzSHhDM3gwSEJVVUxkODNDTWVaSEQ4SkNYUTVSS0giLCJtYWMiOiI5Mzg2OTI5ZmRkMDgzZmFhMzIwZTU5ZWEyODU5MWI3MDczOWE5MjcwMzdhMGM1ZThhOGVkY2RiOTlkMmJlNWQ3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, 'Webkul\\Customer\\Models\\Customer', 1, '2024-03-21 13:14:35', '2024-03-21 13:14:35'),
(18, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-16', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=price-desc&limit=12&mode=grid', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=price-desc&limit=12&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlMwd1Z0NlUzUUNKazJrUEU3dmNMa2c9PSIsInZhbHVlIjoiK2gyMGloZVY5cXlVYnA3anFaRm5EMFhmMzQrcWR3cHowd0x6dXlKSy9ydUVxWjNYVFZnU3hhT1dPenEvazhrNEQ0QndZTlBaeWJrSWl1SENKakozSU5XRFRCZmZoZjNVeTZ0ZENZSUkrb0ZmMHVDV0RHaHBFWUozbUFBZ1J4RjciLCJtYWMiOiJkYTcxY2IxZmEzZmFhOThiZTljYzdhOWNkMzA5MjBjNjg1MWNiMjA0ZGM1YTRiNGJiNzg3YjFiY2Q4NTVmM2Y0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IndmWjRnVVBOQy9TYTkxT1VFTFhjYkE9PSIsInZhbHVlIjoiNDExOU9ucUNFSWRZdHZBODBlSENSSXgzUXBqMkQ0NGFoVmYwcUkzOGtOdDh6QWVQL1AwS0Y3SWRDWkozdjBCa2RTOXZuUU0xbXhqN3lHYzdaWFZXeHc1QmlDWU94dXNHWHRhcHpHYmpvNGhITHh5dDA5eDlQU05SMlZZek0rZUoiLCJtYWMiOiI5NmU5MzgzZjFhNjE3YWI4NzZmNWIwYWJkMzBjMjdmOTQ3MjliZjk0N2IxYmQwZjdkYmMwZTFlODg5MzYxNDMzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-03-21 13:14:39', '2024-03-21 13:14:39'),
(19, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-17', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-16', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/JN-AGM-CL-HLDU-variant-10-15-16\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImdvWW1PajlEb3FGMG9yRVQ3aDRobGc9PSIsInZhbHVlIjoiZDhWcm1WYkkxRXloNmtkV3JXK2p4Y2svZmZ0YWdSYmJldTFVT2F6YXlMM1VTbUY5dWxUUk8vZStUcUtRQ1E3YmJwd2ZZb2k1dVhLMkgyUTFra2daemlmQXN5cDRBRU9iYUNGQkUxcFVkNUFKQVNhWUFPUVNvMHM0NE10WVlkMFYiLCJtYWMiOiJkMGNkYzA4MGE4NDUzMGM1NTQ5NzEyNTI5MDc0MDJmMmYyNmEwODE5ZTg5MDQyYzg4MjU3MDkxZGUxZDFkYzk0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkRMTUdSOGhTcVZPc1VTZEVQZVhYSGc9PSIsInZhbHVlIjoieGY0dURWNDBIbzBTNFgwNHZTUlVnV1FXbXliLzYyampnWjFQVHRha01QbU5lYWkwNHAxL1ZtaFp1TEdQaHVTR1UyZ0V1WUVRNDg4TjByNy8vYys3bFNUL3BKR1RvQmx3ME1aa0c1dkFTUEhGRW9NbjU2VitqMGU1Q1ZPSXhiaUIiLCJtYWMiOiI2MmFiYjgzZWZlZTgwNGM4Y2ExMTRjNzQ4M2ZiN2I0OTU0ZGVkODBlMTk5OTNmOTdhOTNkMzc1ZWViNDRkODBkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-03-21 13:14:46', '2024-03-21 13:14:46'),
(20, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-17', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/JN-AGM-CL-HLDU-variant-10-15-17\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"solum_crm_session=eyJpdiI6IngranR2NEVRVDYzSDV4NXZGVU5vRlE9PSIsInZhbHVlIjoiVEpRczVEMU56TXlSb2h0eHVkWEEwNm82TzFPVnVqbzJJTGl4ckJPUnR2TkIyQjhCenZyVWdJS3FLaStpakpqODlLR0J6b1c0VHFiQVEwdHBlc2pINHh2WG92bHVCUXBRWjdLdnFNZDN4NFBkdnJUdlZxVlZNdEoxSnErb2RPNjciLCJtYWMiOiIxM2M2YjFkYTJjYjYxOWM4NDNkZTY5MzI5MDQ1YmFhY2UxNWE2MmJhYmFlZmNkNzhhZWQ2ZGU4OGIxMGFlYWYyIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkF0NWpEYkl1WkR5Zy85Zm1xdUZYY3c9PSIsInZhbHVlIjoiUWhMUzdWTDNoMmZVeURGK2dJaW1YeVpaSDV1SGxtUEhOeWpNRFNEUnRCSTlTZnJJTk9JSjM0USs3eVVLWFBmbUNodEQzYkRmeHlMd2NHOWJxQU5IMjZ1K1hrTE5QNTFEVTJZK3JJK2huYlBWS01FMDgyVFBjV05WU2ZsYVBGOFoiLCJtYWMiOiIzNWYzMTgzMWY3ODI1OTk4ODM3MzNlZGE1NWFlOTQzMjEyYjhiMTdmY2ZmYjEzNDcyNmM2Mzc3NzgyMjJhYmJmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ijl6eEh0S2VqcytxcHdEYzVnQUhJUXc9PSIsInZhbHVlIjoiOE5DNXQwTk42dEV6QVlBNm8rVGJ1VXdxYUdyRGhFZWtNSjBSVnRkRHNGTFJzWGZjS1RRMkJESXNVc0VnbzBMeC9mL0RNL3E4bG9NZkNQdmJ3R0JjNU1pNzRqNE5xclVLWTVtekRiMHhPczNGWTN0UzlMeWFmWTczNlcyMmhsUFMiLCJtYWMiOiIwZmFhMzBhMTg1YmRhZGMyZDk3NzA4MDg0N2I3NGY4NThiY2I0MjU4MzJhMmE0ODA1MGU1NjJiNWU0NmJhNzdjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 15, 'Webkul\\Customer\\Models\\Customer', 1, '2024-03-21 13:14:50', '2024-03-21 13:14:50'),
(21, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkJoYWhjdVlYRkNEWlVZZ2hpL2ZyQnc9PSIsInZhbHVlIjoiM3V0emphUXVDV3VhdERtMlRuQStxeE5oTXdhZ09OSTFuVDRSOGRsQ25VRUM3T2xXTEl6MXRPUWZKN2lMbFdIQjl2TWZIMXB5ZnRhMHpXQy85UEloakZkVG9XdHE1YzV0MTVMNXNxUGV0Y1cvd0tmYm96MStVOXM5aG5adlYzQkYiLCJtYWMiOiJlNDU3MDkxYzA0MmYxZWJlZTA3MDhkYTE2ZjQ3OWE1ZmQ1NGU3Njg1YjA5MjRkZmZmZDg2NzhjMWZmY2NjYTMxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InhXdzZkcGFGdlB0Tkd6NGY5R2JSeEE9PSIsInZhbHVlIjoiQTdKSzVFdG9SL3JNeCswU2tEeGVCWVowOFVjK1N5K05VdXFrWEN5Y3B6SGY4VUZqUjZIR2pJSU9FdW5yRnh0aTR6TnRhcjdoN2JVMFhGQXNUc3Z6WnZkbkJZSHBpbzdCaTU5QzVyN1BxMkdBTC91K2pyMWZ1NEpWZ21DcUF6L0UiLCJtYWMiOiI5M2IyZjUzNzhmYWU5NzM1ODMyOWI5ZWI5ODcyNjE3ZDg3N2ZlMDkwM2E0ZWY0ZDM5ODZmZDBiNWYxODM0NzUxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:13:25', '2024-04-04 05:13:25'),
(22, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/admin/inquiries/view/bagisto_asset(\'images/product-placeholders/front.svg\')%20%7D%7D', 'http://192.168.15.214/rli-bagisto/public/admin/inquiries/view/25', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/inquiries\\/view\\/25\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6IkV3bGtQMWg3ZzJ2eEt2SkUrS1ZITGc9PSIsInZhbHVlIjoibWxEMStPckgrczNGUVA4VkM2UFVnQ25MZ1NBdlpJcHlUdHh5MEM5cXZjN1pXOEZPUzFyM2JPcm1PbnV5OFluK1NJdzlYbGcvd1dReElBeXp3ZlVGTkNWaXltcjlVY0RkZHg0bjZ1eFRYRkFVMFFUd3dleTBjOEZjY1lZTDBENzYiLCJtYWMiOiI4ZjMxMDQ3ODU0Zjg4Y2I0MDczYTI5YjRhYTY3MDk3M2E3M2RjYmQwNTBiYmNjYzhkZmQyZWE3ODdhNjE4Nzc2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNOME9SaXVUV21yR2gxZHJFcThKREE9PSIsInZhbHVlIjoicllWdGU3T2ZoUzVUT1EwSWN1dmh3U1hzdDlZQWFQSlEzMW02UkU4MkdoMWJ1Y2ZnSWxWNXZmbHlOMStPYzdPWEsxT1JNVmhoNmJOc1kyMnVnZlpVMDJJVDhMRWx2clJuVklQZS92amJKK2tyUEdHZVNnVWlCaWs3U1BFNXE4RHEiLCJtYWMiOiI2OGZlZjI2M2ZhYzZhYTRiZmI5MDVlNTZmY2UxNGNhNzI5ZTg4MDRmZWIxMTg5OTQ4YTU1ZDAyNGQ3N2UxOWUxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-04 05:13:25', '2024-04-04 05:13:25'),
(23, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=1; adminer_version=4.8.1; XSRF-TOKEN=eyJpdiI6InM4MDRETk1CRjNjVkFxUnhWYjhLU0E9PSIsInZhbHVlIjoiOVMydjJVS2RKZWJ2OXNzRGhtRUtNckRSREtNdGtQZ1R2aEZXUmhvMUxiSjlyVXFJa3hUOTJPc1YwZEZ1REVpbFVwaWZiTk9FV2l0SGprZ240bHhlZ09nV2Rva1lOYm1qQXlhY1FldUx3ZGljRldUN2JZNnBheUxWL3FKN21Ba2siLCJtYWMiOiIzNTNkYmU2MjYxNzgxZWVmYTNlZDJiMzdmOTE1MDJlOTg4MWRlYjQ1OWJiNTI3OWM2MzU3YTZhMDI2MGRlYzY4IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImxFcUV1SlpxT25SUWRqNlRUK1V4Z1E9PSIsInZhbHVlIjoicGNhcDFSSjFOREU3Mm9XdlBoM05Kb2hqUUdJKzhBMDZoSDByQ3lzSjNkaGdtVXBiQkoyTFl0TEo1eHkyWXV4OVhFNGlYU3M2azFaaXd0bnVURTBxTDM3a0xlU01WYmxIZkk0cUhVVEpoWEpqUUZsOFd4cTBVWFNFa3AzMDEzT0siLCJtYWMiOiJhZWVhMmQ5OTRmMGUyYmQ2NDI4MzlkYTQ1NmQ1YmRlNzIyZDc2NDk1NDVjZDQ4NTc5YjQ5MTY2MmYzMGRmOWIzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-04-04 05:13:49', '2024-04-04 05:13:49'),
(24, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-16', 'http://192.168.15.214/rli-bagisto/public/elanvital?mode=grid&sort=price-desc&limit=12', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?mode=grid&sort=price-desc&limit=12\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=1; adminer_version=4.8.1; XSRF-TOKEN=eyJpdiI6ImFqMTJncThuV3ZBcHpXeGlVTlFNTkE9PSIsInZhbHVlIjoiRnQreS9oamRFaG5sZ00xV3lqQjJqVXc3TXBVUGJSU2NKdW80UzlkeG12RFNPdVpDVzJvbWVYdnBwYkp5L3djRzJPZEpsdVFZSWZtZ0kvZ2VKaHY3eFh4a0J6YU9zSHI3UDdqekI2MWlTZGJXQXBSQ0RFeFdGZ3pjVDJ6UWxqRlMiLCJtYWMiOiI1OGQ4NzNjY2VkYmNjZDg0OTE3NjBjZWM4MjMzODAwODUyNTM5MjkyZjgxNWViYjVlY2I2ZTg5YTI5Yzk3MDI2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImtFSnBSeEp5YkRFSXlSTEUzRDdmaFE9PSIsInZhbHVlIjoiVCtkTkErMWRsKy9Xc1crd0FNWC9xbmFzZTVhTFpZekI1ZlBVMjFHQUd0NGttVi9aa2tHMDFteHNEWU9wNXpDOWtUTGZvUzkzOWRmMlV6NkNCWEQ1elB2TUJuekpBQzFzZUNyUEtRWVBhaHVwc2pORzZZQjlqWG81WlBYaTJBQjIiLCJtYWMiOiI5NTQyOTRiNTdkMGMzNTI4YzIzOWZkNGU1YWEzNDlkODJlODQyYzdlZTYwMGExMzczYmI0YTU5OWI1NjYxY2I2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:13:55', '2024-04-04 05:13:55');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(25, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/JN-AGM-CL-HLDU-variant-10-15-17', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=1; adminer_version=4.8.1; XSRF-TOKEN=eyJpdiI6InBXRGRTWEVZWXIyTVlDNEFPdUxuU2c9PSIsInZhbHVlIjoiZjkxNElTNzVGQzVCb0RXVldQS1lJc2F5eGJLQWptSEZpL2RIR2l3ZGUrWkFDRTZaK1krV2V0ZnMzTW9UR3pyT01vUExvclNJbHYvdE1YeDYySUNlYlFqL2VIdE9aNmpCd1hiZ2VxamFVQnU1OXFRK1N6KzIvN2xMYUZoekRaQnAiLCJtYWMiOiJkMTk3MjRjZjIwYTkwMGEwYTIwOTI2NzI5YmZhZmY1M2JhMGI3MDZmMzQwOGNlZjNjOTJkNjAxODgyNWM4MjFjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkhGdXYvM04ybU1oZk4vZEx5UWF5bFE9PSIsInZhbHVlIjoiK1lGWlZtdWZ3Nk1lRzNBRUYwT1BCN1pjWmpyaFRJMTZXdjhraFJKWHg0TE5YWmdVVmtROGZzN3pSRUdaZE05Yzk4V1FnUGVhc0ROWVZQek1SVXRHWmJwMmN4UE9GNFdxMDVZUllnRXlvSnF3MFF4YkorTG1XNEk5RmR1Zit3WDAiLCJtYWMiOiIyZWNkMzFlMmNjZTMwZGVhMDIzZDcxZDYzYjA1OTJkNGQ0ODViODcwZmMxNmVmMWZhMjNiYWJkY2E4ZDcwMTY1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:14:02', '2024-04-04 05:14:02'),
(26, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/everyhome', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/122.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=1; adminer_version=4.8.1; XSRF-TOKEN=eyJpdiI6IjNySzRiajUrWDFQbm5XRlExdTU3a1E9PSIsInZhbHVlIjoiWTUvdUlSaXdQOFpuQy82Vjhad3o5aE03N3JNTHc0U0tFdnhhbmxSNGlNaDhPOWxmQWxVZzcycUJlR0t5OGxvdWc3QjdZZUVmYXh1SlpUYXRDaGZaYkMxTHNISTZ1Q3N2YnpCYStBcmxLOVRnKzFsT3BERDlpUW9wVEtTcWNMMXAiLCJtYWMiOiI2Y2VmOGVlYWY3YmMxMWNhNWE1MDcwNWQxYjJhNDkwZjViMzI2YTU4NmY0MmJmMzZmMGRlMzlhNzBiZWNmN2Y2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImhxZm4wZDhmTnpDWVh0RWVjQWo4Ymc9PSIsInZhbHVlIjoiSnBaeVNCeWM0NHI0UU1XTEtncmc2b0ljRGZwTzA5QkxOdWNPME83Q216OTRjVjdtUDBHV1JaYTdsZjgrOXAyaGJIcTNoZEt3WEVCdzBHQlFJVEZZRGcwcy9xZ2VPcFJNUEx1eHJFYlZCY0pUWE0wM3pRRDREcXN5YTlxZnFReEEiLCJtYWMiOiIzNGRmZjYyMjQzMDljN2ZlNzA5ZmU0Nzk0ZjM4NzE2Zjg3YzVlOWYyM2FhZGU5YTA5OWVmNTExZjUxYTMxMzQyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 3, NULL, NULL, '2024-04-04 05:14:03', '2024-04-04 05:14:03'),
(27, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/checkout/ekyc/agapeya-duplex-house-and-lot/book-dev.enclaves.ph/edit-order/JN-A2XAWC/403', 'http://192.168.15.214/rli-bagisto/public/checkout/ekyc/agapeya-duplex-house-and-lot/3', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/checkout\\/ekyc\\/agapeya-duplex-house-and-lot\\/3\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6IldieEdGbUc1ZzBscUxZNFE1dkF3UHc9PSIsInZhbHVlIjoiaUF0QUo2dmJEWVhYb2RFT284eFhVM3NmcDZySzU0R2ZQZmhIY3U2ZUtIZVRaK09YOFlWWWFQckJxRFRCRUZrbWdOVGIwNmthMVl0bTJjSGxiTEJHTnMxUWpZVmhmK3RLWEFoNStkS0ZRQmVZTld4ZGVnSGhMaEJ4SmorNXd4cm0iLCJtYWMiOiJkMWE0OTBhZTczYzI2YzUxMGJmZDMwZTU1NDYwOTQzMmZlNmM5NjdjOGYwNTVlZjIxYjNkNzRlNjE0Njc3ZGZjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjErTGFGSHN0Nm1aYVQwZnJRclFvVGc9PSIsInZhbHVlIjoiT1Zrb2FLTm40QnFqeEYwa2NySjE2TmZndksyMzh0UFlGQ2JkaDFGNksrdDVOL2xsT04yOFR4eStYSDR3VnNGUDhDaGszYkpMME1YUiszN280Yms1eUlpbGE0ZXllTlpJVlJITk5DK3VPSGlZWG1RS0MyU1pvYjZ3bUFPSmEyU0giLCJtYWMiOiJjN2ExZjAzZTY0MzE0YjIzNzlmNWFiZjA1ODY3Y2VmODFkYmY3ZWVlZTA1MWIwYWEwNDZjMGY2ZDFiNGE5MjNjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:14:15', '2024-04-04 05:14:15'),
(28, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=price-desc&limit=12&mode=grid', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=price-desc&limit=12&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImlhM1ErUHlVZWRUNXk0M3p3a3BjZEE9PSIsInZhbHVlIjoibC8wVVNYYjluQ1ZhSmwyMmRFSDF0UE9ldVNPVXVuZzJodms0d0haMHBEL1BzMjZNUis4YTFDOEV6UkZUQzE0RFd6NER1VzJoNWcva3NDVUtkSnRPdFg3QmFkT2Q3b2pTQ004TWt5dFoyb0k0dWo1a1hyRTRJZXNSYVBrc2s1ZGoiLCJtYWMiOiI0YjBlOWYwNDQ2YjM0YTM3YWI4NjVjYmMxNWMyODczM2I1NDM4MjZiODdmY2Q2Njk0OGU5YzVlYzJiOTkwYWNmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjZlRUpqd1VHcldDWEtYei9CVGJBNnc9PSIsInZhbHVlIjoiQXgrdW5jWWlEUDZiN083NzRab0tWSmtCSXNLeFozR1BvV1p1THhmdjh5dnQyMWdjeTBGSmF5RktUOEw4bFh4bHBramlTTWtJT2ovajVNYmxnTXJmS0w4d3gzSHlqQTd0Q2NqYzg5Ym44Q1A0eEZ0VW5nUm1jU0NsbzVxeVRmOFkiLCJtYWMiOiI5MGUwZTA5ZWFiMjhlZGFmMmQ4YjFhMDIxOTExYWE4NTM5YTczNzIzMTZjZGY0N2JhOGQ4YmIwNTcwNDNhNjRhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 19, NULL, NULL, '2024-04-04 05:28:53', '2024-04-04 05:28:53'),
(29, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/43/JN-AGM-CL-HLDUF-PIN_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:39:00 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"\\\"1c875-6153ec195ec99\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:16', '2024-04-04 05:42:16'),
(30, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/42/JN-AGM-CL-HLDUF-PUR_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:59 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"W\\/\\\"1c875-6153ec1902fd8\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:17', '2024-04-04 05:42:17'),
(31, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/41/JN-AGM-CL-HLDUF-GRN_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:59 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"W\\/\\\"1c875-6153ec18b1ef7\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:17', '2024-04-04 05:42:17'),
(32, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/44/JN-AGM-CL-HLDUF-YEL_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:39:00 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"W\\/\\\"1c875-6153ec19b2c5a\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:17', '2024-04-04 05:42:17'),
(33, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/38/JN-AGM-CL-HLDUS-PUR_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:58 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"\\\"1c875-6153ec17ae2b4\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:18', '2024-04-04 05:42:18'),
(34, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/37/JN-AGM-CL-HLDUS-GRN_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:58 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"W\\/\\\"1c875-6153ec1759353\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:18', '2024-04-04 05:42:18'),
(35, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/39/JN-AGM-CL-HLDUS-PIN_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:58 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"\\\"1c875-6153ec17fd455\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:18', '2024-04-04 05:42:18'),
(36, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/40/JN-AGM-CL-HLDUS-YEL_floorPlan.jpg', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"if-modified-since\":[\"Thu, 04 Apr 2024 05:38:59 GMT\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"if-none-match\":[\"\\\"1c875-6153ec1862d56\\\"\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijk1ODJqRVo4UE9JTjYydFNSaDlaQVE9PSIsInZhbHVlIjoiT0tLNlhNSGRhWWI2ZWFvZmVBMzBuNHNOR1Z4b2djZjlWMnp4SGZ4U2VyTW51eU1NVFVXOU1xbVlOc3VaYWRxU1d3UlZ4b2t6anhiWVBkWEhZMDlVRnlGbEJheEkxbnZQbFpSdCtycVdEOGlqc3BXd04vUFE0VVp6SytUYTE5a0giLCJtYWMiOiIzZDY3MDE1ZjNhZTE4MmY1YWY1MWFhZGE3MjBlMTQwMzIxMWFkZGE2YTYxYjZhNDk5YmJiNDQ1OTRmM2ZhNTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFrQ040QUFadDFoTHMzKzcyNkVlbHc9PSIsInZhbHVlIjoic0RKQW9zRjE1VWt6RzZVdzdTYTBlRHJ5TVpoTzVWVTN3ZWZ1cUEzK0JBKzFFVWV2V29CcllGL1NQWFVRK0l1aytyanlvdmRjYVZ5VlRRelVCSExxMnkxd1oyQ1l3Nkw3VnhCRysra2tXdzlPZE1XTVlNVkl2VkMzUEpOQ1NpeS8iLCJtYWMiOiI0MTBkMmE0YzcyNjAwY2RjZDYyOGMwZTk5ZjQzYmE0ZmQ5ZDgzOGRmYmZmNzM3OGI3ZmI1Y2EyNmE3YmE1ZDdmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-04 05:42:19', '2024-04-04 05:42:19'),
(37, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot-slant-green', 'http://192.168.15.214/rli-bagisto/public/everyhome?mode=grid&sort=price-desc&limit=12', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/everyhome?mode=grid&sort=price-desc&limit=12\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlU0cXVqVnpoai9aVEpQMDFROHlISVE9PSIsInZhbHVlIjoiRnVmWGlUVWs4bVJVdnRvaHR6aVlZNWxxT3ZCanRTNHF6RkVVY05DdVlMRncxQm1jMUxZWi9DMkdUMjByK2l6NzdkcllBUzdZbWQ5YitERVlVOXQ1WWhLekNlaVMyUkF1QzZmbUxqcmRobml3ckk2dWw2QnNESEJoWkxyOGdLTGoiLCJtYWMiOiIzMzhmMDRhZGJiNjU5ODFlOTM1ZmEyMWQ3YmM3ZGQwOTcyMWU5Nzg3YjkwNTJiNjFjZTk0Yjc5NjRhY2NjOTExIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjMyQ3hhSVVlTXRBMjRCaVp1azI3d2c9PSIsInZhbHVlIjoiV0dhUHpVSm1NTGlra3FaZm1aQzNRTmR2NnovMU1Ga0ZHM0p1czFTeGpLcWw1T2x1U2dyN3VKSFlLVHBoV0dxNGQxMHpiYndlS3I2TmFISTJlbE1CKzhKcjFJSGkwaVgrcjh4WldCZUszRlRmZWh1NmFoQVhaK2w3UzJnOEQ5YkIiLCJtYWMiOiI0ZjA2MjEzZjViYTM2MDZmNWU3MzdiZWRjMWYzYzFmNDBlY2FkMDhmNGVjZGY2ZWQ1ZDdmZThhM2NkYjM4OTJkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 45, NULL, NULL, '2024-04-04 05:44:28', '2024-04-04 05:44:28'),
(38, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/blogs', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/blogs\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjZqVkpMN2R5Q09ZdExQR2Y2cVc1Qnc9PSIsInZhbHVlIjoiaTA0M1pyTkdLc0xRQS9EVTBObnNyYU4zOSttczhxYXpmeE1SaGI2TmFGaTFCeUV5VE5uTUNpUlZEUWtTNEtzdnRDcFF0dUE3OHJjd1haSW5BRElmZlNxV2EwK2hXMXJ5K0pWejduZmF0ZlNLUXRxRlp6Ykptb3ovcHFvR3JCQzciLCJtYWMiOiIyZDY0N2Q5OTg3YzAyN2ZkMDIyM2VhNGY0OWExZDg0YWFhMjdhOGU3MjA1MDUwNWNiOTIzZmI0NDFmNzU5NmE3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImQwNnZSeTJZTTN5VDFlQTg4VzFMbXc9PSIsInZhbHVlIjoic2JQRmVDdEtyWGNOaGRuS2dibUkwTHp3d2t4dlhyNHg5QTNLbFJVVTR1VjdsVmtNTHVxTXVITkNIa0w5TEo1UzE0UU1HM3VkTFJ2alg5VjQrTjlYTFFybXNWSTNhL2M1aXQxMmQ4aHpPOUd6cmw5d1hFejNFdFVOTHFiUnd2RmUiLCJtYWMiOiI2ZGM4MWJlMGFhNzA1NDgxZTgzYjY5ZWZjYjdkMmQ2YzUzM2VhMGNlMTA5MTAyMmRmZjRmZTI0ZGIzNzIyNGUyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:07', '2024-04-19 10:15:07'),
(39, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/nMfXzjPvIDxsFYhpIjwd4qSwSTOWePlO3FTs5c06.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlhQNmR0MUpWZVgrT2ZwNzJNTEtjdUE9PSIsInZhbHVlIjoiVUpuSnl0UVdmNUlwdHcyWDM5TnJNNFhBMVNTVVJvWnMxdXE4NVArMDU3VkpEZEE0NTNOZTA2azZ4aHc1WU5GRElDWHV5M0pPNFQyM0lMYVBWaW1PT0I5NXNZUlNQMlNUQ3AvVlV6NFFmMVVEb1RybDZCb3doK1Y2VTM5MDRmaGoiLCJtYWMiOiJjNmNiNDQ2MDRmNDFjNmYxODMwMzJhODk3YjM0MDNlMWFhODk5ZWVmNjZlZjUwMzkxODc5MzdmOThhZjM4ZTZlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlB1RnJHejBEVjArMERLaHg3VnFyUmc9PSIsInZhbHVlIjoiQlMrYzlwNnAvSTRpa05TNlNOMitQY1ZKV3UyOXlZdGpwNXhPdGNRQ3pBaFIwc2hZeVhhZWU3R1p2azZXa041UHBFQ2pMWGhYTGxXSzJVaW0wcHJNSXNDSVliajNGQTB1UDZzOVhNOXNuNTNvNEZrTHNnZ3NqMDRwTWRZd3Q5ZXQiLCJtYWMiOiJhMzQzN2Q4NTRjYWZhOGRmZTI5ZjM4OGJmMDhhNjhkODVlNTc4ZTA3ZWI4MDMwZGIyOWRhOGIzMGU0MjlmZTc0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(40, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/cLUOsFWv2kgMz0uH5XtIeFXIHLsAcLoJ0WQG5B5n.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjZWY0FwYzkwWG9qMmw2LzloUktaUnc9PSIsInZhbHVlIjoiOWgzWUVxOFRMVFlPZXNqbDNub3FZZVA4Znp3TWJVRW5zUnVwMDNNcUpzZW45UlBaZEFyT2VXY1FUZG1jVEFiajlMUUwvS3NiSFRhNm9uUVdrM043aE5xZSt6NVkxSnk1TFJ2dnBaMzErZUdsaC9WQ3FBYXRzWUVKU3RZMHI2SWEiLCJtYWMiOiIwMmI5NDg5ZDIwMmQ5OWM4NmRlZWU2MmQ3YzY3OGZhYzMzOWFhZDlkNmZkNjliYWZiYmZiZjg2ZjdiYTU0MmU3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im9DNzUwT0Z4eWJ5a2VnTmhtMUYzZ3c9PSIsInZhbHVlIjoiVHdFMHdIcEpPWkt3a0tNMllYVFNBN1NNNWllU2UrRW15c2o5eENPajJZeEdtdkc5WlJrOWtycWVxajd4Wlh2WEJvQ1NUVU9rK1dBRDV3RXVvc1pJNkgxdW5TL3VOY2VFWUdyQmcra0NSaEE5OVNELy80NXB5MXFmNHFhc0RxYW4iLCJtYWMiOiIxYTk2NTIzYWY5NzA0MzBmOTNiNjdmYjc4YWMwM2JiNWY1NTAzYjNjMjE3ODAzNWVhOWY1OGE2MzY3OThkMjQxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(41, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/wS0i7mYqnvhd0YIjJakxEFk73I017bsgwWHbfnpa.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjZWY0FwYzkwWG9qMmw2LzloUktaUnc9PSIsInZhbHVlIjoiOWgzWUVxOFRMVFlPZXNqbDNub3FZZVA4Znp3TWJVRW5zUnVwMDNNcUpzZW45UlBaZEFyT2VXY1FUZG1jVEFiajlMUUwvS3NiSFRhNm9uUVdrM043aE5xZSt6NVkxSnk1TFJ2dnBaMzErZUdsaC9WQ3FBYXRzWUVKU3RZMHI2SWEiLCJtYWMiOiIwMmI5NDg5ZDIwMmQ5OWM4NmRlZWU2MmQ3YzY3OGZhYzMzOWFhZDlkNmZkNjliYWZiYmZiZjg2ZjdiYTU0MmU3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im9DNzUwT0Z4eWJ5a2VnTmhtMUYzZ3c9PSIsInZhbHVlIjoiVHdFMHdIcEpPWkt3a0tNMllYVFNBN1NNNWllU2UrRW15c2o5eENPajJZeEdtdkc5WlJrOWtycWVxajd4Wlh2WEJvQ1NUVU9rK1dBRDV3RXVvc1pJNkgxdW5TL3VOY2VFWUdyQmcra0NSaEE5OVNELy80NXB5MXFmNHFhc0RxYW4iLCJtYWMiOiIxYTk2NTIzYWY5NzA0MzBmOTNiNjdmYjc4YWMwM2JiNWY1NTAzYjNjMjE3ODAzNWVhOWY1OGE2MzY3OThkMjQxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(42, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/SIAa9yEte7hmsKEEBlAgiZJO5ny5VsVsvIDYTYBp.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ilh3MWZPYjRJRFNXNEl5YXJHQ1o5amc9PSIsInZhbHVlIjoiaDdlNnNsS2FCOUR3TFNjVWZnazRyWUY3cFQyQ3ZSNlBFeTh2Y3JkLzlZNjZPTGlMYzJqaVdvUnMyQnNORGhyQS9qVDV2bmh5cXFOVUtFSDZReTJzTEdpWHJ1QnNFNEwySzNzOHBadzZ4WlhuUmcrLzB6Y1dxV2ZpV3dKQVFnWFgiLCJtYWMiOiI2MGVlZDMzNDUyYWJiYjBjZGQ2OTQ4MWQxNWU2YjEyZDQxMTA2NzJkY2NkYzkzMzA0ZjM2NjYzZTRmNTJiZjkxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImxGTnUzSnNxaEViTURPWVh2L2I1aGc9PSIsInZhbHVlIjoicTJNVGJEUVdHNFNtQ0VYajlJdFIxSVZnUXkzYy90QlNTVDZweUdzR2dvc25VMk5YTkk3b0tFSUVMSmRsMFptanZFZFg3QWYxdTJ0UlFPSWNyNXdpdTJwc1c5YTFYN1VnTHdXSG5ZWTVtSUJaeEQ5RGlCVXM1UWxmdnd4NnhiSE0iLCJtYWMiOiJlMWZlYTE2ZTllN2UyMDMxN2YyNDQ3NzczN2JhYjM0ZTliNzg2YjEyYTM1ZTEyMzhiNWUxZDMyZTgwNjNjZWFjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(43, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/IWLHMzegO4XSpjhXmWTtRvHDu69RgtV1v8569o4O.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkFMUEVhQy93RDFablkveWhkMnNlaWc9PSIsInZhbHVlIjoiSTRHWS9aQ2ZUNWQvUHoyTWovbDROSVNPeVJ2WFZWQjJOdHJLZ0F5NFZLOEZRNWt2eDJkb0phaXRwSXRKb28yMExkUXBOcUt5RWwzZjN3VUY1bElvZzdYNW5hdENKTU93VmpQdjB2QWYwazNXb1lwZ2w1WnFOWkVUQ3c4eDI1QmIiLCJtYWMiOiI1ZTRkMzc4YjNmZWI2YjQ3ZmJiYTIyZDk1OTlhY2ZlNDdhOTdkYjkzZGU2ZGFmYWE5OGIzYzE1MmY0NGM4Nzc5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjRGYTNMREFPeHhWbWxIa3ZoSkZXa1E9PSIsInZhbHVlIjoibzhZWUxFRnF2TDJRU3lKalhPUnZyVzlsczJkQmxGYWw0QVJNSjBQQlJNVEhKd3FOYUVCYjlOME8rSjBLMURWSEdJQzBiZ3lRWUlLd3J2Y09XV2RSV0djZU5LOGt1MzBHZ1hJcllLNXY1cEMwUTFobHVGK2ptVzVTM1Fra1JuV0UiLCJtYWMiOiJiNjMwYmZmYjA2ZTJiY2YwNmM5ZGU0OTc3MTRiMmE0MjNkNjc1NmRiOTdkODJmZTczMWFhZjgxYTYxOWQxNzA5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(44, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/ShLtluZhETiLNEgu2vQEdFA857R1IFoNISpkexMO.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkFMUEVhQy93RDFablkveWhkMnNlaWc9PSIsInZhbHVlIjoiSTRHWS9aQ2ZUNWQvUHoyTWovbDROSVNPeVJ2WFZWQjJOdHJLZ0F5NFZLOEZRNWt2eDJkb0phaXRwSXRKb28yMExkUXBOcUt5RWwzZjN3VUY1bElvZzdYNW5hdENKTU93VmpQdjB2QWYwazNXb1lwZ2w1WnFOWkVUQ3c4eDI1QmIiLCJtYWMiOiI1ZTRkMzc4YjNmZWI2YjQ3ZmJiYTIyZDk1OTlhY2ZlNDdhOTdkYjkzZGU2ZGFmYWE5OGIzYzE1MmY0NGM4Nzc5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjRGYTNMREFPeHhWbWxIa3ZoSkZXa1E9PSIsInZhbHVlIjoibzhZWUxFRnF2TDJRU3lKalhPUnZyVzlsczJkQmxGYWw0QVJNSjBQQlJNVEhKd3FOYUVCYjlOME8rSjBLMURWSEdJQzBiZ3lRWUlLd3J2Y09XV2RSV0djZU5LOGt1MzBHZ1hJcllLNXY1cEMwUTFobHVGK2ptVzVTM1Fra1JuV0UiLCJtYWMiOiJiNjMwYmZmYjA2ZTJiY2YwNmM5ZGU0OTc3MTRiMmE0MjNkNjc1NmRiOTdkODJmZTczMWFhZjgxYTYxOWQxNzA5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:35', '2024-04-19 10:15:35'),
(45, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/ZOUtRCgpqgcqlPdkZ2Ts2Op32Ya8fXXUsZ1hVfOT.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjNDMk44ZmpMSXhlTFZXM01jdzA1VkE9PSIsInZhbHVlIjoiQmpsUlJzRjhOSEFST3pkcnY1T0dublkxT1dDWndpZGJpWC8rZmU2Nk5ScmpQcXR6eW1JVStxTTdWMmIrRUl2TEpkcE42c3owUE1sV2xnc1FOZVdjNU5TOVRkVkplZ2JpWVU0OVF3a0VuSk9vVXFnNVdzR3VQSFhaZ1FjSkx0T0QiLCJtYWMiOiIwYjg2NGE5NGFlZGQ4NmQ5YTcxYjI5OWFlMmQwY2JkM2Y1MTFmZjM0YTIzZmVlNWIxNTdmOTYzMzAwZGI5ZThiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ilh1akd6OVQ2M29ydjArSnZKai8wb3c9PSIsInZhbHVlIjoiM1g2RUpVWkg1THExMm9KQXMxR2tDU253OEdPbXlaSG4veHU1QmUvalU0TkFjQTE2SG15T3R6UEFVOERiS29QNEp4b0Y5blN3a0ZBTGtHRHlLMm1wRklFbjF6bWExWTY1Q2JJeVJ0SHBWOCtTQXVtRE1zc1lwK3BOcU1heklHMUYiLCJtYWMiOiIxMWM0MWIxYWRjZTFmOGMxNTdjZjRlNzE3MjJlMGFmMGNlNTk3ZDljZjY1MTc0NDAwOWMyMjNlYTNlMzUyNGNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:37', '2024-04-19 10:15:37'),
(46, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/BRxYwmR3qmkYuK9nDp1rtAskUNkZiMaBOWAzKBwa.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjNDMk44ZmpMSXhlTFZXM01jdzA1VkE9PSIsInZhbHVlIjoiQmpsUlJzRjhOSEFST3pkcnY1T0dublkxT1dDWndpZGJpWC8rZmU2Nk5ScmpQcXR6eW1JVStxTTdWMmIrRUl2TEpkcE42c3owUE1sV2xnc1FOZVdjNU5TOVRkVkplZ2JpWVU0OVF3a0VuSk9vVXFnNVdzR3VQSFhaZ1FjSkx0T0QiLCJtYWMiOiIwYjg2NGE5NGFlZGQ4NmQ5YTcxYjI5OWFlMmQwY2JkM2Y1MTFmZjM0YTIzZmVlNWIxNTdmOTYzMzAwZGI5ZThiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ilh1akd6OVQ2M29ydjArSnZKai8wb3c9PSIsInZhbHVlIjoiM1g2RUpVWkg1THExMm9KQXMxR2tDU253OEdPbXlaSG4veHU1QmUvalU0TkFjQTE2SG15T3R6UEFVOERiS29QNEp4b0Y5blN3a0ZBTGtHRHlLMm1wRklFbjF6bWExWTY1Q2JJeVJ0SHBWOCtTQXVtRE1zc1lwK3BOcU1heklHMUYiLCJtYWMiOiIxMWM0MWIxYWRjZTFmOGMxNTdjZjRlNzE3MjJlMGFmMGNlNTk3ZDljZjY1MTc0NDAwOWMyMjNlYTNlMzUyNGNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:37', '2024-04-19 10:15:37'),
(47, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/CkpTB9fs2gPY2i7HSyonqKICpZ4Mq0tjnv835DBI.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjNDMk44ZmpMSXhlTFZXM01jdzA1VkE9PSIsInZhbHVlIjoiQmpsUlJzRjhOSEFST3pkcnY1T0dublkxT1dDWndpZGJpWC8rZmU2Nk5ScmpQcXR6eW1JVStxTTdWMmIrRUl2TEpkcE42c3owUE1sV2xnc1FOZVdjNU5TOVRkVkplZ2JpWVU0OVF3a0VuSk9vVXFnNVdzR3VQSFhaZ1FjSkx0T0QiLCJtYWMiOiIwYjg2NGE5NGFlZGQ4NmQ5YTcxYjI5OWFlMmQwY2JkM2Y1MTFmZjM0YTIzZmVlNWIxNTdmOTYzMzAwZGI5ZThiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ilh1akd6OVQ2M29ydjArSnZKai8wb3c9PSIsInZhbHVlIjoiM1g2RUpVWkg1THExMm9KQXMxR2tDU253OEdPbXlaSG4veHU1QmUvalU0TkFjQTE2SG15T3R6UEFVOERiS29QNEp4b0Y5blN3a0ZBTGtHRHlLMm1wRklFbjF6bWExWTY1Q2JJeVJ0SHBWOCtTQXVtRE1zc1lwK3BOcU1heklHMUYiLCJtYWMiOiIxMWM0MWIxYWRjZTFmOGMxNTdjZjRlNzE3MjJlMGFmMGNlNTk3ZDljZjY1MTc0NDAwOWMyMjNlYTNlMzUyNGNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:38', '2024-04-19 10:15:38'),
(48, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/8nIt2OBNeQxOFR8M2XczJPiF0l1lVq3MVMEdjA2e.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjNDMk44ZmpMSXhlTFZXM01jdzA1VkE9PSIsInZhbHVlIjoiQmpsUlJzRjhOSEFST3pkcnY1T0dublkxT1dDWndpZGJpWC8rZmU2Nk5ScmpQcXR6eW1JVStxTTdWMmIrRUl2TEpkcE42c3owUE1sV2xnc1FOZVdjNU5TOVRkVkplZ2JpWVU0OVF3a0VuSk9vVXFnNVdzR3VQSFhaZ1FjSkx0T0QiLCJtYWMiOiIwYjg2NGE5NGFlZGQ4NmQ5YTcxYjI5OWFlMmQwY2JkM2Y1MTFmZjM0YTIzZmVlNWIxNTdmOTYzMzAwZGI5ZThiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ilh1akd6OVQ2M29ydjArSnZKai8wb3c9PSIsInZhbHVlIjoiM1g2RUpVWkg1THExMm9KQXMxR2tDU253OEdPbXlaSG4veHU1QmUvalU0TkFjQTE2SG15T3R6UEFVOERiS29QNEp4b0Y5blN3a0ZBTGtHRHlLMm1wRklFbjF6bWExWTY1Q2JJeVJ0SHBWOCtTQXVtRE1zc1lwK3BOcU1heklHMUYiLCJtYWMiOiIxMWM0MWIxYWRjZTFmOGMxNTdjZjRlNzE3MjJlMGFmMGNlNTk3ZDljZjY1MTc0NDAwOWMyMjNlYTNlMzUyNGNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:38', '2024-04-19 10:15:38'),
(49, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/6/iQNhi16hqdLoO5B5Y995PeZAMy52RYsGRq97tJYc.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ik55NEQrejErMEhrSTI0OXp6TXZsalE9PSIsInZhbHVlIjoid1NFTWJ2aHAwZHlOSDJ2a0V2YTJDQXhOVHJiU2NFOEpWT0R3cC8wT3RMQ21uTzVRN3VoWGNMOTlVbDJoWWRweTFRZkIxV3hVNEg1eVllUkJIK0pRWk1ZRXlMS2dONnpUTU9FS3M0bk5EM3l3N1pQd1ZsREUvTUNVbWdpb0U3TlIiLCJtYWMiOiJiMTZjODA2NjY2NzAxYzk0NjNjOWUxODllODZkZjI4ZWMyM2VlMTJlZjBlNDE0M2JiNTNiMmE2ZWU4ZTk4NjQ1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkZJVDErTnJVNUJGK0Q3YWc4Nm40Zmc9PSIsInZhbHVlIjoiSGlKb3RFNVVNTGNKbkg0cDA3aTBoM1RTSHhwbHdkUDhQTThlblZ1U1doU2FqWS94QWxHVHhJK2JZQlBYY09xRDN4WkgxMnQ2cXJKQ1VUT3ArbmMyelpFYWIwNUlmWndNcU1naTlzYVhsZXJmOHVpeXNJQVNvNUhMN3Y4NVBFZUwiLCJtYWMiOiI4ZGFhYWU1NGNlY2I2NGQwMzkyZDgxMTc1NzZjMDhkMDBiMDE2MGE0YWU5MmE5OGZkZDdhNDU4ZWM0Y2Q3YjFiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:38', '2024-04-19 10:15:38'),
(50, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/MQX2oMFW4PXFvsks55S6PXwXaSV1NCpWZAN63Tv1.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImprdStxYWZyK3JpRWNmOWdvcHBvVGc9PSIsInZhbHVlIjoiaEtab2dienlGSGEyMlh4aVl1N1JnNTZ0RG9TVzMrQThaNStIUEpRaGM2Yi9wRjlBWTJJQTRzQjFkeTJzUTU2bEptWUZMeXFxMUxKeXdBMW5uN2xBajQzTlVDSmNMWUFqZ25BeVI1TUNISVJtdmN6NGhHS28yV0hkMzQwZ3FuWWciLCJtYWMiOiJhNGFmOGY3MWFlZjE3NTNkZWVkNWRhMjhlZWFiOGEzNTcyNDE2OTNmN2RlYWYyYzE2YjIwY2NlNmRlZDY1OTMzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im1Fdk1UTStza1FkNmcyU1krdkFEb3c9PSIsInZhbHVlIjoib2FkNGlpekwvUS9WVmFaOUttUkFTZ0xMU0xBRVdGbXFxSDJrWG1VU256YkgrSHU5RDdjVXNWUVlFekJhZEVZVW9xQ1dMVERTZTMvU2hsSzJkTC90K0tqYW5TZjBjRUp3NDlpUG55bUZzVEMraHEwR25ORlZoaUhjSEYyY1g3bEMiLCJtYWMiOiI1ZDFiZDI3MTQyMTUwYzAxZTAwOWIwMGVkMzk0NjViNTcwYzg1MjUwOWZiYmE4NDk1ODc3MDg5YjZlMDEyM2MyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:38', '2024-04-19 10:15:38'),
(51, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/ZdGNiLvgWNMU4SvBDJCuWP2tdlXiiMuXymIX5u0T.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImprdStxYWZyK3JpRWNmOWdvcHBvVGc9PSIsInZhbHVlIjoiaEtab2dienlGSGEyMlh4aVl1N1JnNTZ0RG9TVzMrQThaNStIUEpRaGM2Yi9wRjlBWTJJQTRzQjFkeTJzUTU2bEptWUZMeXFxMUxKeXdBMW5uN2xBajQzTlVDSmNMWUFqZ25BeVI1TUNISVJtdmN6NGhHS28yV0hkMzQwZ3FuWWciLCJtYWMiOiJhNGFmOGY3MWFlZjE3NTNkZWVkNWRhMjhlZWFiOGEzNTcyNDE2OTNmN2RlYWYyYzE2YjIwY2NlNmRlZDY1OTMzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im1Fdk1UTStza1FkNmcyU1krdkFEb3c9PSIsInZhbHVlIjoib2FkNGlpekwvUS9WVmFaOUttUkFTZ0xMU0xBRVdGbXFxSDJrWG1VU256YkgrSHU5RDdjVXNWUVlFekJhZEVZVW9xQ1dMVERTZTMvU2hsSzJkTC90K0tqYW5TZjBjRUp3NDlpUG55bUZzVEMraHEwR25ORlZoaUhjSEYyY1g3bEMiLCJtYWMiOiI1ZDFiZDI3MTQyMTUwYzAxZTAwOWIwMGVkMzk0NjViNTcwYzg1MjUwOWZiYmE4NDk1ODc3MDg5YjZlMDEyM2MyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:39', '2024-04-19 10:15:39'),
(52, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/10/u0fOLAYck8H0S35ggg44lnsGyUT9UNsZYle1nK1S.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InI2blA4OE1ONVRLcVF1cit6a0RGa1E9PSIsInZhbHVlIjoiQzBoTGpXNXVrM2JhTmdVVGllOGd2eUoxSWFSUm1rKzhhT3ZtTWdyTWh5L256N1hxT29Hd1dCSTdaMXBnZ3FCUTNEbFBUM2JTWm9BL3BHYWREanhZZ1UxR0hiY1JYQ3VkMFEvUmJVMnQzNlcvVlBGU0Z4Y2JjNThvZ3ZqaTNsS0ciLCJtYWMiOiI2MDA4N2M1MzM5NzM2NjhiMmViM2NlZGQ3ZWI2MWY5MjVhYjBjYjQwNmRjMzE5YjI3ODU3MjhiNWE0MzljNjkyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjNUUlNJekNxNDA0ekI5TFZLZU5JMlE9PSIsInZhbHVlIjoiRzVpVzNYTEtYRXoxa3ZBSE0vQVduTnM3WU5DcUZvdTNiaE5wN2xLZk93eExDTmM1NWtOUWttMXBlTEVJMFowdUhxcjZJanhvQkpuMkdoa0lzNzVwd0cvd29rVTlVUW1zb1A2bWVueDM2bmFoQTl5dlMvbDNOczJmSHl0NVUycFIiLCJtYWMiOiI0YTAxZjY0NGU3ZmNiOWJkMTg2ZTVkMWUwMzk0MTljMmFlMzQ5MTUxOWY3MzhiZDY0MmM2ZTc1ZjgwYjBiNmQ3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:15:39', '2024-04-19 10:15:39');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(53, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/g1zIdLhqyru9Z05QYmIVvSuBiBITEmg8TaTK1OAs.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRMRi9VRHYzVVN1QlN2c0h2aVA1UUE9PSIsInZhbHVlIjoicjY3ZUVHK0VCbkdQK0NNOHR1M0lWQk5teU92UnlTNFQzcy9aZXB5V045MDRaMFloVDBpWk83MFdoMFNvY055Y2ZDeTFtSkFYSCtINmlPL3FDUy92amFJb0dkWU16OFVoaGllSHFRRnA0SGFEU1BncGlBcWpscDFCeEJuSVcvOUoiLCJtYWMiOiI2ODJmNjU1YmU4NDkyNTJmMjJkZTllOTRiY2E5ZDY3YWYwZTc3MTcwM2FlZjk4YTJkMDhhNGQ2M2Y5NzdmYjYxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InpqSWUrMzJGaGNSejJTQVhqcHZ1RVE9PSIsInZhbHVlIjoidHkramNhVExrWWtYVFRFRWdEUTF0UFJHQVFIelRHSm9ZenJjalFCWFV4QWJhaTRDbk0xdUNvc3c1ekpzWk1YMExyVkZWOHhlMXNyYklRS3RDSnJUeDBINnlXc0NSbzhuTWMyWSs2RWpvd1BwVDhFeEg3TzFFYzQxM0l5SkwrdjEiLCJtYWMiOiI5YTMyYzFlNTMyYzI5NTY4MTNiZmRhNGE4NjBiNDYzYTg2ODExOWIzYmFhMGFlNDhjYjk1NmYwZTk3MjgyODNhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:25', '2024-04-19 10:17:25'),
(54, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/nQYdcpKQQcxBXNUEBRJmFAatX8xCbo3q673T1gkC.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InozRll0MGliMzdSYmFTMHAxRVUrN1E9PSIsInZhbHVlIjoieFB5TTYzajQ1azluNlpRNVY2RFNUVXhRcFhGQzVWbm1LZUpjL3c4RGZ0VzUyWVlLZnJONG8rcWpDQ2JBTldHeUluQ2JHWlJ6dlhiUVFvcVFhelljSlEvRFVjQzBRQkI0QlVPc2VSQWNveHA3c1BpdWhqc3gxNkNIcmRTRXZrcE8iLCJtYWMiOiIwODEwYWUwNmYwN2Y4OWFhYjY1YjJkYzUyZTFkOGU4MWU4NTQxMzUzNWIzNTg3YzA0NGIwYzBlNzlhOTA1MzRhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InVTYXNqdEJIK3gxWVhrdzdXZ1FoeVE9PSIsInZhbHVlIjoiVTc3WW1BMU8vQlNjakxucGg4SFRYODd3TzF6bTB0ZFpZWGpUQXZkaGVUWlNCT01SSitwZWFCd0YzbUZMY2hYMnMxTFJyMGczL0hNNzdSN2Z1Yzcwd1ovdWhNb3NzRmk4eFRMNVFsWStwY0p4OFdsbElzbXozY3hmSVcwM0M4QVgiLCJtYWMiOiIxZDNhOGE4MGJmZmVjYjUzOWE3MzBhMjdlOTYzMTQyZmZmMDQyYmVjYTMwMTc1N2Q0NDMyNDliNmU5ZmY2YzllIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:25', '2024-04-19 10:17:25'),
(55, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/l1690OJTdtYPTAp2gT7uMvRP4X79tHZMJXOJi21W.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InRMRi9VRHYzVVN1QlN2c0h2aVA1UUE9PSIsInZhbHVlIjoicjY3ZUVHK0VCbkdQK0NNOHR1M0lWQk5teU92UnlTNFQzcy9aZXB5V045MDRaMFloVDBpWk83MFdoMFNvY055Y2ZDeTFtSkFYSCtINmlPL3FDUy92amFJb0dkWU16OFVoaGllSHFRRnA0SGFEU1BncGlBcWpscDFCeEJuSVcvOUoiLCJtYWMiOiI2ODJmNjU1YmU4NDkyNTJmMjJkZTllOTRiY2E5ZDY3YWYwZTc3MTcwM2FlZjk4YTJkMDhhNGQ2M2Y5NzdmYjYxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InpqSWUrMzJGaGNSejJTQVhqcHZ1RVE9PSIsInZhbHVlIjoidHkramNhVExrWWtYVFRFRWdEUTF0UFJHQVFIelRHSm9ZenJjalFCWFV4QWJhaTRDbk0xdUNvc3c1ekpzWk1YMExyVkZWOHhlMXNyYklRS3RDSnJUeDBINnlXc0NSbzhuTWMyWSs2RWpvd1BwVDhFeEg3TzFFYzQxM0l5SkwrdjEiLCJtYWMiOiI5YTMyYzFlNTMyYzI5NTY4MTNiZmRhNGE4NjBiNDYzYTg2ODExOWIzYmFhMGFlNDhjYjk1NmYwZTk3MjgyODNhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:25', '2024-04-19 10:17:25'),
(56, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/EjMk24JdYrWzMtiRBD9BlV3M9fsIWw3sYIHv0ahC.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjNubWdaVy9mZC9paHpURkNERG45QXc9PSIsInZhbHVlIjoiZXVySytja2dlT3p1cS92YXdtekhGNTlMSGM1VjAySi9aUzlwWU5DTVpxbDUzV0hpUnlOYkdnbjB6ZGRzdzZoS3o5OTB4Q0UwY3BzbXA5VUdMeGQ4MStDSjM4S3NodEdjQnVjbStnUnFvK0ExY3REUEN2K3JDZWMxY1kvc1E3ZmsiLCJtYWMiOiJhZTcyMjJlYzE1MzQxZGQ5Nzk5ZDlkMjFhMjJmODY3MmRiN2RiMGRkMGVkNzVmZTJhNjRmYzkxYzBlOGFhYTAxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5HVjRyY0tqcEJCeGJjZzN0UFFXTUE9PSIsInZhbHVlIjoiSXZ5aWkvMm41WFNKSjhEUTVaMEJPMDFDOGtSN3RzNGNvTGYxT3JTNm9oZ054emlMb0ZmR0pFSWNGOHFBRWZsbnhtc0xNcThQUUIxQzd4QnIrQ0JOaE5yZFZxS29SMjk4eE1nMkEyZ3RHbGw1TjZVNDgxR3hTVVBzTk9CTkMzU0IiLCJtYWMiOiJhYjhmYjUyM2UyYzljN2Q1MzRlZDMxZjQ4YTU4N2E2M2QyNmEwZjcwMzJlNzhjNDBmY2FlOTNkNzkwM2FkYjA0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:26', '2024-04-19 10:17:26'),
(57, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/10/N36R9mSD33jX4KA4XXgmG11tmW1xnHqIpyNNWn87.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjFvSWI2TDd3V1UzaVRBZjA5RjNQZHc9PSIsInZhbHVlIjoiUGhnWjdWZ2xjdDR2ZWRtcjFpTnlsWGQ4dWQvS3dpM1NUa3ZmMzdWWDhTbER1R2ZxTVlDYXR6a2tNYUhLeU9oc216ZVRDQ3JoQk1GUHBOcHB0U1JOaWR6dUliRmtGTm1WWVhvUUpOY3NWemxPSXE5QmlnaHhEV21ZQjhSNDV0MGoiLCJtYWMiOiIxMDFhNjM0MzVkYmY2NjM4NmQxMDRiNWQzNGY3MDRlMjlmMzA1MjYyNzFkNGMyMGExMjQ4M2NjZmZhY2Y5Y2YzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IklFU3N2SmFVdXJIeXEvSzlYQXRtWmc9PSIsInZhbHVlIjoiUDNwR3E0OUUxRHpSalFMZE8ycXE5RlF6MnpZd2RMbmt6a2xpc2t6bjZxS3d0b0NMSHVTcFU2WHVVZWZCcEJXSzlON2dXUlJtYU9YTmE4UjJrSzBQQTc4VkRDL0RsRmFXMitLRkVqc21TejdwdG5LTCtHRkV6ZE1BZys0YW9rUUIiLCJtYWMiOiI3MjFiMTEyYjM2ZjkyODQ1NTBjNzI3YjlhMTcxYTM4NTUxYjQxMjgzMzI5NTU3MzRjNTVlZDhhMzZiMjZhNTM1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:26', '2024-04-19 10:17:26'),
(58, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/5IR73aDjUSMdNUK4Q0ZJvokSRIyMA3EFqkJN8qoI.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjcyMXhmUTRCTmRDTkIyallZYXNjZVE9PSIsInZhbHVlIjoiak5KZ1hlaGdTQTlibmx2TUxPWWdsSnBGRG5IOTRGRjhicnN3VnA3Yk14NzlQQ0doZEl0dGUvcVNZT2ZyQllhYUZ5Q2J3anBnZEg1d1l2ZFRkT0RzWTlQMXZWQ2hNelcvcDQ3RGRYVE1VZE5hWTludVk5UlhmU21GRWJuQlN0Ti8iLCJtYWMiOiJkNjE1MWZmMzQyNDFhZjM0MzU4NWExYTZkODIzMTk1M2UwZTk4MDlhMDUwOGU2NDY0YjJhMDQ0YjUyMTQ4MTc0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IktDNFNsdHNCRGdRT2tVZEg1eG4remc9PSIsInZhbHVlIjoiZWdKTFpTTzBrZk1Hc1RaNEc5RGl2MGVQRkllY0YyREdPN1ZGbzJNNkU4THl2Z1ZXZEh3YkVnTXdzTGpuaHlMZUpjYXp4YlJGM1p5YTlBVEErTDh0bkM5ZmF4enZZMkFsRXRVeDV5bDRqVG1oS2RBdGs1dGZTbFIxYXpXNTBoZzYiLCJtYWMiOiJiYzMzY2IzODZiNjk1YjUwNDkwMjJjYTc5NzVmNjVkNDk2NDY0Yjg3ODI5Zjc4OWI3MjRmYjA1OGMyZDYwOTFmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:26', '2024-04-19 10:17:26'),
(59, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/Y6IKyCWGlwtA1TtKXqJIybbUx6u8HHnrQDfw7doK.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImhZdFExbXJQN0cwckwxZEVRTHFsMGc9PSIsInZhbHVlIjoiQzJBZ2cxWExGQ2gwRHlMSExpTnZOZWc1YzY0WC9YMnhkZ2l4OVZaN3Z3UVpxZjRza3RBcm9RNmI4cmVIa2srK1pSYjhEQmFTejV3WmFzbUhKYXNYekxHMnJwRS8rUzJsRTBjelBkeDhUdjlVNWJ5azVOYWV0TERrbkp5QWl3M1EiLCJtYWMiOiJiZjA0NzkxZjJlZGQ2ZTIxNGVhODFhMDJlZTY5ZGMxMGQzY2U2MGE0YzZlNTQyYjRjNjcwZmQ5MjZlMmVmMDk2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InNwZHVWWVZzVks3NGZFK2tZT1EvMXc9PSIsInZhbHVlIjoiWVdQaEtZTytCcU9oUFkyZWVxYVhtZzRoZGZ2d0crT1JrVnJlZFpsWW9yOURKSHMzS1IyTDJiZUlwd29FRzhldWtBMUVyb3g1b0k4cGN4aUg3eDVUQ0VkbVBNM21KTENYaTRyQVZ0SGp1VDdtbDVJVDBRZ0tBeUx2U09rTEpmZDMiLCJtYWMiOiI1OGM0Yzc0MjIwNjA0OWRiMmFkYmMwYjBlNmIwMzc0ZWViZmI0MGM3YmZlMDgxNjkwNGExOGYyNGI1ZWVhZDc0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:26', '2024-04-19 10:17:26'),
(60, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/6/OB9aGYmMbaor0Fil3y4eCEtaFbFE699b7pH8KGCR.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImkwaGIyRThla0UzSk5tM1ZPcHIxd1E9PSIsInZhbHVlIjoibWVTRkd3YTNkaVdOM0wwRVptRWMyS0VNcS9Ldnc1THVJbUh6SlJKVzVnSzA1Mlg2Ym9Cc3luWUdRaVZDT3BwWU54R3JBOWNFVmVMUGFlRUVPZWFrWjIzVHpvbnF3bTREOHhQRFlCRy9HeUVaQ2pQZUVCODNUSkpYZ2pSYTQ5cHAiLCJtYWMiOiI4MTQxMDllNzRlZWNmMzY5MjBjNTMyMDEyNzU1NmQ2ZDQ4MTdlMjFmZWZmZDNhOTYwZTAwYWQzNTQyNzhlMzU1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik5ad3U1b0Z3VzVkaW1yTFBCSVNkY3c9PSIsInZhbHVlIjoib28xK2o5OXduR1Z0RWFZNnNBSzkxaDlnbXVrc2kwekhnR2FWZCsvamJUUXYxMnR0VWF3V3Q5U1RmOUlrNnp1VXNwT25IZUcyVTIxbGVmNTZNRnZIZmd3WnhSbU04eXFOQmgzS2htV21sZXJiWHFJSVVxc2tRR2MzZiszSXBDMlgiLCJtYWMiOiIxN2M0NmExZjliN2Q5MjRhNDU1YmM1Yjg4OWJlYTVlOTdlZTc4YzliMDZkYzEzYzI2ZDA3YWQ5OTcxM2RiNjhlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:27', '2024-04-19 10:17:27'),
(61, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/waDOTEZcVap5bl1l1krRDyDLBnNLlcx0kvfMwz4f.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ikg3a2Ria1VvRjBDcENJdWx4WVRXamc9PSIsInZhbHVlIjoidVNNRW8vT0d2YnFBRDBLK2tDd3FoUGVXaWtMZjdwVkZCaWdxWDFweXk2V3pCV0xnaXg2K0JUaWc4TnhxaUNraHRmaEFNdlNuQ1RIcGIxdnZVU2VPc1hXNUoydCtaakk0NE9GTHdpZVpsY0Q3VmV5SmdFV2hudG9tMDd4WFlYb1kiLCJtYWMiOiJjMjk2NzA5NjgzMzE1NmFjNjBjZmQyMzE1YTc0NTMzOTZhMTRmZjVlNmZlM2I4MDI3NWM4ZDc3MWFiYTZkY2FlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNtMlZiNndzSURNOEhVN1dzZUJSZ2c9PSIsInZhbHVlIjoiN1BTYVRiOFp3dWVvdWl4UnRzYm9qT3dpWGdGWmdGeHcxb0RNYU44dWNNc2JOUFNkYW10cXpxN1o3SUZlUEY0cU1yZnRVYnRGN0NPbS9vRGZZN1d5VmU5ZUViSkdsYlBKYk5UMXljU1lqREp3dVpTSXZCMy9GbXhqTnBxRHNLcUciLCJtYWMiOiJkZmIxYWEzZTJjMTY2YmYwMWQ0MzU2YjczYjA5ODc3Mjk3MmVjNWE0MzFiOThlNzcxOWViNGViZjIxMzY5YTg1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:27', '2024-04-19 10:17:27'),
(62, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/2NXF6QZFFu6Qf2ZzRKgPMRiuJec3Qj458Ozh5vgB.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ikg3a2Ria1VvRjBDcENJdWx4WVRXamc9PSIsInZhbHVlIjoidVNNRW8vT0d2YnFBRDBLK2tDd3FoUGVXaWtMZjdwVkZCaWdxWDFweXk2V3pCV0xnaXg2K0JUaWc4TnhxaUNraHRmaEFNdlNuQ1RIcGIxdnZVU2VPc1hXNUoydCtaakk0NE9GTHdpZVpsY0Q3VmV5SmdFV2hudG9tMDd4WFlYb1kiLCJtYWMiOiJjMjk2NzA5NjgzMzE1NmFjNjBjZmQyMzE1YTc0NTMzOTZhMTRmZjVlNmZlM2I4MDI3NWM4ZDc3MWFiYTZkY2FlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNtMlZiNndzSURNOEhVN1dzZUJSZ2c9PSIsInZhbHVlIjoiN1BTYVRiOFp3dWVvdWl4UnRzYm9qT3dpWGdGWmdGeHcxb0RNYU44dWNNc2JOUFNkYW10cXpxN1o3SUZlUEY0cU1yZnRVYnRGN0NPbS9vRGZZN1d5VmU5ZUViSkdsYlBKYk5UMXljU1lqREp3dVpTSXZCMy9GbXhqTnBxRHNLcUciLCJtYWMiOiJkZmIxYWEzZTJjMTY2YmYwMWQ0MzU2YjczYjA5ODc3Mjk3MmVjNWE0MzFiOThlNzcxOWViNGViZjIxMzY5YTg1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:27', '2024-04-19 10:17:27'),
(63, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/iIwXqKKelXDRawiM9DQnOgN5LQ2FSHwWWDypYgtB.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY0bDlONVlUNDBQRW1laWp5WFZYaFE9PSIsInZhbHVlIjoiUGkwSzJCRTV2K1hLemc0TVM4SEJ1WFZGbzhwY00wNTZkL2NpajdraEtSL1N4M09VQ1l3c0xsTGxjL0cyQzF6ZS9FUmFwYmlaOUMrbE1MZjFIL3E1UXZkR2pkYzZvM2EwZnd3TTd2WUlnRXQ3WXJJbVlhYW0rUHI4eG0xZmtpVjIiLCJtYWMiOiJjODM0YjA0YmEwZjdmZmNlN2MwZDg3MGU1MWQ5MDk4NGRmZjA0YTZlMmRhNzIyMTExMTkzNzI5MjdlYmIxMGU2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Inlzd2NFbzhOaTRFL0dqWks2b0JJT3c9PSIsInZhbHVlIjoiTHZDU3hFRzJXTjRuSTgwRDNoUi9za2FoN2lxa1RQZnEvMjl0SyttRXhDaDc1c0NWbnhkRVphWU0zUmJxYmJIejJQL1ZUS1IvSnZoYUh3emtGY2FsaWR3SStDL0g0UTEwRVlFa1p3TUY4aDI0Vk9Yb0tLS1JPZko2bGUvTnZUVEIiLCJtYWMiOiI1NjY1ZTQ5N2JjNGE4NWI4ZDJkOGIxZmVkYWYwZWM4YjZlYzhiMDVmZWVhNzQxMjljYzJkZTcwZmRjNjEwMTI0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:28', '2024-04-19 10:17:28'),
(64, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/B8l7JRE7IbZv9yG3Wy1uy8cTtGlyJ369kFvWDpBu.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY0bDlONVlUNDBQRW1laWp5WFZYaFE9PSIsInZhbHVlIjoiUGkwSzJCRTV2K1hLemc0TVM4SEJ1WFZGbzhwY00wNTZkL2NpajdraEtSL1N4M09VQ1l3c0xsTGxjL0cyQzF6ZS9FUmFwYmlaOUMrbE1MZjFIL3E1UXZkR2pkYzZvM2EwZnd3TTd2WUlnRXQ3WXJJbVlhYW0rUHI4eG0xZmtpVjIiLCJtYWMiOiJjODM0YjA0YmEwZjdmZmNlN2MwZDg3MGU1MWQ5MDk4NGRmZjA0YTZlMmRhNzIyMTExMTkzNzI5MjdlYmIxMGU2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Inlzd2NFbzhOaTRFL0dqWks2b0JJT3c9PSIsInZhbHVlIjoiTHZDU3hFRzJXTjRuSTgwRDNoUi9za2FoN2lxa1RQZnEvMjl0SyttRXhDaDc1c0NWbnhkRVphWU0zUmJxYmJIejJQL1ZUS1IvSnZoYUh3emtGY2FsaWR3SStDL0g0UTEwRVlFa1p3TUY4aDI0Vk9Yb0tLS1JPZko2bGUvTnZUVEIiLCJtYWMiOiI1NjY1ZTQ5N2JjNGE4NWI4ZDJkOGIxZmVkYWYwZWM4YjZlYzhiMDVmZWVhNzQxMjljYzJkZTcwZmRjNjEwMTI0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:28', '2024-04-19 10:17:28'),
(65, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/sDLN6sRI85PXR8nLjnycwVEx0C1RfZzKHiqIcgkn.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImFGNjRJMzdFcVNwaFhHZ2hkNG1yZ2c9PSIsInZhbHVlIjoidnN6RjBWdEd4SXZhNlhEYmJUYmJZUFVSSW9Tb0hHUW1pL2czVTkzWEVqejdWSXlPVi9Pc3FnODROSHNRVWkzN1ZySFZCUk16L1ZNRjAyOVdRVUhpOFRicm00akJkcEhmV2tSYkZHbTVJOTQ3c3BNYjJsUGdCampZa3ZjUG54ZTEiLCJtYWMiOiIyZWZhNzdhOTdjMDQ1MTg0OTRmOWEwOGU1MGM4MDljOGI2NTg4ODkwMDY4ZTc3M2Q2ZTE3NGJlYWMzMzZmZjNkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InA4ZWZUTTJxVkhlcVVYUWF6aThwUHc9PSIsInZhbHVlIjoiKzUzclh6M3o1M2tCWk1CZjI4RStMVTlHa2hSN0Q5SXBQVEdweUNrdzRNcS9xaiszd2tGS2lWdUZ3amZKVXladGs4OWhtOFV6YjNZMVNoUUt3bGptZkNzaWthQ1NFanRCZ2pBZUNTSnFacnlySFhyTWZMTUh5YWVZRmJuNHV0NHYiLCJtYWMiOiJjYTU0YzA0YTFkMTY3NDI0YmYyYjM2ZmUyNjA1MDc2YmI4NGFiMGZmZjQzNGU1ODljZjQ4ZGIzOTc1ODU1ZTZkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:28', '2024-04-19 10:17:28'),
(66, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/Uzl6jHa1hQePLlaSOlLejOOafrgtytD5LRTMn22z.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImFGNjRJMzdFcVNwaFhHZ2hkNG1yZ2c9PSIsInZhbHVlIjoidnN6RjBWdEd4SXZhNlhEYmJUYmJZUFVSSW9Tb0hHUW1pL2czVTkzWEVqejdWSXlPVi9Pc3FnODROSHNRVWkzN1ZySFZCUk16L1ZNRjAyOVdRVUhpOFRicm00akJkcEhmV2tSYkZHbTVJOTQ3c3BNYjJsUGdCampZa3ZjUG54ZTEiLCJtYWMiOiIyZWZhNzdhOTdjMDQ1MTg0OTRmOWEwOGU1MGM4MDljOGI2NTg4ODkwMDY4ZTc3M2Q2ZTE3NGJlYWMzMzZmZjNkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InA4ZWZUTTJxVkhlcVVYUWF6aThwUHc9PSIsInZhbHVlIjoiKzUzclh6M3o1M2tCWk1CZjI4RStMVTlHa2hSN0Q5SXBQVEdweUNrdzRNcS9xaiszd2tGS2lWdUZ3amZKVXladGs4OWhtOFV6YjNZMVNoUUt3bGptZkNzaWthQ1NFanRCZ2pBZUNTSnFacnlySFhyTWZMTUh5YWVZRmJuNHV0NHYiLCJtYWMiOiJjYTU0YzA0YTFkMTY3NDI0YmYyYjM2ZmUyNjA1MDc2YmI4NGFiMGZmZjQzNGU1ODljZjQ4ZGIzOTc1ODU1ZTZkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:28', '2024-04-19 10:17:28'),
(67, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImJhaXVVbXFsd1ZzWVFCc29SUVptMUE9PSIsInZhbHVlIjoiUXFRTXlKRDJXaVU5TTVQSmpVcW5JYnhUY1diM1ZveEwzNEl1dFgzK1dhWlMvUEI3Wkw0TlVjdHJoYU1ILzdqTkZxTlp2TTRubEowU2ZEa1ZrMldpdXpNcE1xNW5NblFIR3NMRDFzSmJWNGwzZm5SN3lKWFF3dzdka1haRnpHMWgiLCJtYWMiOiJhNmNmMzNiMTU2YTI0ZWY4ZTAxYzRiNmQwZDNhMWRmMTJmMjcyYjI5NDZjMjc5ZDRlODdlOTRlNzA4ZmY1OTgxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImUxdkRBYjY0cnlOYnpZUXpkdVdPOVE9PSIsInZhbHVlIjoiUllmYlVzaFJ0QnNMemdFdGhPKzkxdzdXdHVFbFBIcnJtQXVUeVc2OXBkSjZDNDUzSEZITms0bWVkL21sYTJyTmIyTGVNN1d1MG40a0kwc1ZuN0lUdkp6b1RIM0M0QjJ1elpPSmlieTBCUDV6NGJzMEdyTnk5R0RtWFRqa1BjTVUiLCJtYWMiOiIxZmFkOTkzNzIyMWM2ZDQ2MDM4YmU4MzFjY2EzNmY3ODljZDY2NjdhY2QyNDM5YzQwZWJmMmMwZTY5ODhkZjA3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 28, 'Webkul\\Customer\\Models\\Customer', 1, '2024-04-19 10:17:33', '2024-04-19 10:17:33'),
(68, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/blogs', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"cache-control\":[\"max-age=0\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/blogs\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ikx4ckc4alBBOXVobWRsQUVXYkpkc3c9PSIsInZhbHVlIjoiQ3JnQmE3Z2pRVEdETlpUeVduNHVKOVNnTkJOK05xbGpOR2FKdkVycXoxWnRpK1ROcWJNRUY3aUhqdkplc09scW42MVFIRVc5NCtyMGNpTTJ0V2wveEtvdDYxRWR1c3RLS3NIektVbFpQVkVFSSt5YWVHZUhmZnRvQlpuTVM5VWgiLCJtYWMiOiI2YzRjNDA4MDgzMTNlM2MyOTA4MWNjZTZhOTRjMDA0OTk2YmE5NjQyYTlmYzgyZjNhNTlkOWFiMDU3ZDgyMTAwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik9oemV1VFo5WklqSjc4dTM4R2paemc9PSIsInZhbHVlIjoiRXZvWktOeGNpTXhDbEUwemsxUmtVTjRYRGt4NGNCeFphU2ZJVmRNZzRyL2U1WTNkWmhvbVF1clI2N2NIWkV5NDJvT0RVTDJVWGFpQkxxQWk5RlJWckFyYk5LcXcwbk5ES1BYamZaL0RockRadGJXNkNDbkREcWN2dnQ4aTZ0SHMiLCJtYWMiOiIyMjkzMWUzMjI1ZWZjM2U2M2FiYjk2ZjVkZTQzYjkyZWY3MWNjZTY4ODE5ZWUwNWEyZTIwNzg5NDM5NDkxMTYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:19:58', '2024-04-19 10:19:58'),
(69, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/hxNJUhHUjlq6KuHVj2TsSehz0XPCzsBDHlCnWJsX.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5ZOWhBNUZaSlpNOUtSRzNuRVlQZlE9PSIsInZhbHVlIjoiVi9sSFIyTmtSajh2VGRtdFE0UWRTTjZmeU9pYmsydUFSSVg3anNXMkNWYjdqaFk2bENTaklhTWs0NE5Uek1VbVQ2SXpscEYyTXdaT1krUG9QR0l0SXN4K1NCajk4OEZUYjNKWGEzK3k2RDRYMUlMZmxsbmxBY3MrMlhPSnpWNmQiLCJtYWMiOiIzNjUyYmNlYzZhNDI4ZDY4NDNmZWMzNjA5YjI2NGVlZGUxZjAyZTIwODQ5ODdlMmZlZmJjMjhjZTI1YjFkMDgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikg3YmpmSG1oNjJUZ2hxNDlJVlJ0MUE9PSIsInZhbHVlIjoiSDBHeGx4d0tXaitVMllnRWhjVFE5bFk0c2dhSm1xZDkvWVpkK0xtUkQ5ZFB3ZTdEaVhna2hpYnJXZWZGeThGZGt4VkE0WmdLazhJUCtYQ0JPK0VhRkRMdVczZ01BZnYyei9hdVNLWkVJS2ljK0tLTXV6dm5pbUwzdFhhQkFzS1kiLCJtYWMiOiIwZjNhZWQwNzNmMzE3OWIzNmMwMGFmOTg0Njg0MmE4ZTZhZmE3YjU4OWFiNTRmYjJlMjFhNTMxNWJjNTRhYmJjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(70, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/gf4PDgAGNvYcV2AS87nw17uP9fQBdvSU0P1AlWwe.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5ZOWhBNUZaSlpNOUtSRzNuRVlQZlE9PSIsInZhbHVlIjoiVi9sSFIyTmtSajh2VGRtdFE0UWRTTjZmeU9pYmsydUFSSVg3anNXMkNWYjdqaFk2bENTaklhTWs0NE5Uek1VbVQ2SXpscEYyTXdaT1krUG9QR0l0SXN4K1NCajk4OEZUYjNKWGEzK3k2RDRYMUlMZmxsbmxBY3MrMlhPSnpWNmQiLCJtYWMiOiIzNjUyYmNlYzZhNDI4ZDY4NDNmZWMzNjA5YjI2NGVlZGUxZjAyZTIwODQ5ODdlMmZlZmJjMjhjZTI1YjFkMDgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikg3YmpmSG1oNjJUZ2hxNDlJVlJ0MUE9PSIsInZhbHVlIjoiSDBHeGx4d0tXaitVMllnRWhjVFE5bFk0c2dhSm1xZDkvWVpkK0xtUkQ5ZFB3ZTdEaVhna2hpYnJXZWZGeThGZGt4VkE0WmdLazhJUCtYQ0JPK0VhRkRMdVczZ01BZnYyei9hdVNLWkVJS2ljK0tLTXV6dm5pbUwzdFhhQkFzS1kiLCJtYWMiOiIwZjNhZWQwNzNmMzE3OWIzNmMwMGFmOTg0Njg0MmE4ZTZhZmE3YjU4OWFiNTRmYjJlMjFhNTMxNWJjNTRhYmJjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(71, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/sd1UGZyw3SKgtzhKJ6z9GPkEN73McCiUbKUqXz2m.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5ZOWhBNUZaSlpNOUtSRzNuRVlQZlE9PSIsInZhbHVlIjoiVi9sSFIyTmtSajh2VGRtdFE0UWRTTjZmeU9pYmsydUFSSVg3anNXMkNWYjdqaFk2bENTaklhTWs0NE5Uek1VbVQ2SXpscEYyTXdaT1krUG9QR0l0SXN4K1NCajk4OEZUYjNKWGEzK3k2RDRYMUlMZmxsbmxBY3MrMlhPSnpWNmQiLCJtYWMiOiIzNjUyYmNlYzZhNDI4ZDY4NDNmZWMzNjA5YjI2NGVlZGUxZjAyZTIwODQ5ODdlMmZlZmJjMjhjZTI1YjFkMDgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikg3YmpmSG1oNjJUZ2hxNDlJVlJ0MUE9PSIsInZhbHVlIjoiSDBHeGx4d0tXaitVMllnRWhjVFE5bFk0c2dhSm1xZDkvWVpkK0xtUkQ5ZFB3ZTdEaVhna2hpYnJXZWZGeThGZGt4VkE0WmdLazhJUCtYQ0JPK0VhRkRMdVczZ01BZnYyei9hdVNLWkVJS2ljK0tLTXV6dm5pbUwzdFhhQkFzS1kiLCJtYWMiOiIwZjNhZWQwNzNmMzE3OWIzNmMwMGFmOTg0Njg0MmE4ZTZhZmE3YjU4OWFiNTRmYjJlMjFhNTMxNWJjNTRhYmJjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(72, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/Kor6d1VUUvV5GDgmtFQmtwW1o3aNkgrj98eHmJYG.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5ZOWhBNUZaSlpNOUtSRzNuRVlQZlE9PSIsInZhbHVlIjoiVi9sSFIyTmtSajh2VGRtdFE0UWRTTjZmeU9pYmsydUFSSVg3anNXMkNWYjdqaFk2bENTaklhTWs0NE5Uek1VbVQ2SXpscEYyTXdaT1krUG9QR0l0SXN4K1NCajk4OEZUYjNKWGEzK3k2RDRYMUlMZmxsbmxBY3MrMlhPSnpWNmQiLCJtYWMiOiIzNjUyYmNlYzZhNDI4ZDY4NDNmZWMzNjA5YjI2NGVlZGUxZjAyZTIwODQ5ODdlMmZlZmJjMjhjZTI1YjFkMDgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikg3YmpmSG1oNjJUZ2hxNDlJVlJ0MUE9PSIsInZhbHVlIjoiSDBHeGx4d0tXaitVMllnRWhjVFE5bFk0c2dhSm1xZDkvWVpkK0xtUkQ5ZFB3ZTdEaVhna2hpYnJXZWZGeThGZGt4VkE0WmdLazhJUCtYQ0JPK0VhRkRMdVczZ01BZnYyei9hdVNLWkVJS2ljK0tLTXV6dm5pbUwzdFhhQkFzS1kiLCJtYWMiOiIwZjNhZWQwNzNmMzE3OWIzNmMwMGFmOTg0Njg0MmE4ZTZhZmE3YjU4OWFiNTRmYjJlMjFhNTMxNWJjNTRhYmJjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(73, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/Godhl9jiXOD9eBRH4ibDhIaJDVmBqeKBm9a9bnd6.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(74, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/5ufEEyl2nNyNod0sFgxubTQxvWp0UyZMrVAKugnh.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(75, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/xvE1F4KvhN2SSDJePYMwPNT0GULIr0xa28NKbLTm.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(76, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/Sh1jytV7wRsW5QEIWZGK7N0K2LXbrLR4TfdQxfDv.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(77, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/sXSZbsLYJctkhMUDW6GJANX4XH6r5jbJ87jtTjgp.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(78, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/5/oD9AYLtXbYgTPIo1PIC6OC5hf0nidd32iEnYKbFH.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkY3U0J1VFBiWnMrTi9kaUlTb0l2NGc9PSIsInZhbHVlIjoiTVdNeDZoNXo1MXVXVHBnQWtaN0hHSVFMUlhoRHYyeE5RM3RzS203Q3pXeGFQeit4T1FiNk5PMlIzeHRQVXd4NUl1N1VKTlNLV3ljTUhFY0hHZC96NDg3RG5qOFlaN1Q4bjE1WGZQc0tac1BJQ0xPOVBNWDE3N1FjbzI3NU5BaS8iLCJtYWMiOiIzNWMwOTY4OTI2MDIxYWNlMGUwYjM3Zjc2MTExM2Y1OWQzZWJhMDI2ZDc4N2VjZjk1ZGE5YTllNDYxZmYwMDUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNnYUQ2Z290WnVGTDZubmxaOUFyeXc9PSIsInZhbHVlIjoiaEpSRjN1Q0kzVzJJamQ2aGhwU2lUUU9MTVlmTjU5U2o1RVlVQjFJU1VEUHRBTStTTGJhc21ROVRTRmJqcUVWTFRER3J1cW9XNXNTeGFrTjFZOEhqeEJ3UDBtOHI4ZUdhemVsd0lxbDFQcmtzeVE4STBQeENmM01Jakg3RGpqS3YiLCJtYWMiOiI5MDRjYTJiMTk3MjllYzcxMWUwMmVlYzRiOTBhNjUyNWQxY2JkYjY4MWFhMDBhMGVjYTIxMzA0MDI4NDUwMjYzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:12', '2024-04-19 10:20:12'),
(79, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/6/58QijtAZckHlugbbVtU05YGEaGtwzYRz436zXk6u.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ik5LVlhjaXk4TnhLWW52ZFR0dmp6VFE9PSIsInZhbHVlIjoibVJOdnRteUdiMU5lRFpjdVRjT3NUQVV4SXE1d1RzS05nZHdHYVlDbFpFaE5hNjVmM0hSSXBqWEc5aGlmWFdEcnR0dnNaa3pvdXpnQkhWZFZhN3VDdlovdk9oeVFHT3hsSUFzeEZ1N1lLWldCZDViajN5WFFlQk0yNG1JS3kxdTQiLCJtYWMiOiI5YTIxMGU2NWRiMjk3Y2I1MTE0OTJkOGNhYzgyYjY4MmYxNTQwZWE3MWRkOWQ3Y2JjM2Y2ZTk5ZWUzMGVmZjc3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjdwUE5YQ01SRUh1Y1pETmpkS0k3dFE9PSIsInZhbHVlIjoiV3V3WjZCem45dGx5ckJJOU5CdWU2TVJCNDQ5RDFSWFRQWlpqUUlpbTdmV0xxUEpISkF2eTdEVnYrb01Ddmc3U3ZiSFEvVTFkem8xWldvTnJOQnJUSlQra1VaSjM2RWoyY0dpMGhpUU9Ga3lKUEJPMGIyVk9Qd256VVowQVlCcmsiLCJtYWMiOiJhNzU2NzQwMDRiMTJiYTQ0YzlmZTdiNTQ1YmUxYTkwODE5ZWQ0YzI2Mjc0NTAyYTUzOWY3ZDFkYmRhODVlNTQ3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:13', '2024-04-19 10:20:13'),
(80, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/DaQMZ126vx4zqukVfg4BwN86DqcCDUr4ulHvIs5C.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkRKa0ZiS1huN1ZQOW1RalcyZUR5Z1E9PSIsInZhbHVlIjoiM1RSZ0ZJKzR1dlNYSndVOHY2VzNsWkRsNlJXdVBneFV3NG1yVGpGUm14dWJYYXlhWnd6NytnNkdFNDUydks4SDBoQTFWREdJZVN5d3BWU0RTSWxCMDk3Tmlhc1VjMzZPWUhodS84eEozY3FMU1lzcWZ3eXBWb1VvcSt6Wjhidm8iLCJtYWMiOiJmYzRlNzE1NWI4MDAyNjczMTJjMzlhMmUzOGE5NDY3MTVlMzc2ODFlOTMzNDQ3MjA3NWIwNjUyNzMxMzdhMjJmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlIrQzRSMGgrcENCTzBCUEMvcjVsdGc9PSIsInZhbHVlIjoiMHlScU42dXlCUDEwdlV5YWJLT0lhUTBHZTdqMS95bWhnMlZCZ3ZleWF6TFlsYkxTaU9sVjN0Zkc3Ni80czlweXhJZlJTU1FMVjRPVDd4dUJLVU5CaGlLazlRMVhaZjRRR0FRSmEzVWhNc29sU2s5M2puSXpPUnplSFpSSUhNWDYiLCJtYWMiOiJjOTQ0NmNlOGExM2Q5ZDdhMmMyOTlkYjBmNmY1MWQ1YzI4NGQxNzNiMWZlYjVkYThmMmI1NDEwYWJlZDVjYWExIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:13', '2024-04-19 10:20:13'),
(81, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/8/qkhEBdtKcPcuAnXS78a6MP2wSrtEORFNlB45IF1l.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InFsRVVUTUxidE91bG80QjkvdE10TUE9PSIsInZhbHVlIjoiMUMvUjdVWmE2Q3NUa3dpUk8vbzJxdlZQRnRWeENabDhiYUZiZWRMTHRUVXRJVml6d1A0Vm5ROFpzZmtXWm5CNUUzc2N2WWh6Q1g2NlFibkhkd3ViUFJicC9wOFpmbXhQUW91OWJGSWJzVElOR3dzN1NQSnBMREtGSTZ5Qk5TNWIiLCJtYWMiOiI1ZDJmODJlNDM1ZmNjNGJkZDg4MGE4YmJlODhjYjA5ODBjNWJhOTVjNjI3N2M1YTgzOTdkNTk4MmJlY2EzNjczIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IndNZnVkWWZkN2tMcFFja1pFbUF0RUE9PSIsInZhbHVlIjoiMmV6Y0ZQTjc2ZnRQZkhqZzlzQVBhMHZUbHhEcjNIQUYrOFVWMGxOMUE3eDdTMkdtNzFyR0x5S29BeGNGUXJwNlVxZlJJQ1l0c09RaXE1ZDNDeHlYMUpwdjlZLytwaTcvM3djZkNiZWl3OWlreEpoOFVyek4vS2RSQ2xWZEN1NmciLCJtYWMiOiJlYmI1OGFjYmMxMmY0OTQyMjY4M2FjMGMzM2NiNDYyMTVhOGE3YTE1NGQ4Yzc4NDZiNTA4NTY3YTRmOWZjMGQzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:13', '2024-04-19 10:20:13');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(82, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/10/iTvRQznjsFzLFfGBHblR75ySgB7yPT9SYhQeyKio.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6InFsRVVUTUxidE91bG80QjkvdE10TUE9PSIsInZhbHVlIjoiMUMvUjdVWmE2Q3NUa3dpUk8vbzJxdlZQRnRWeENabDhiYUZiZWRMTHRUVXRJVml6d1A0Vm5ROFpzZmtXWm5CNUUzc2N2WWh6Q1g2NlFibkhkd3ViUFJicC9wOFpmbXhQUW91OWJGSWJzVElOR3dzN1NQSnBMREtGSTZ5Qk5TNWIiLCJtYWMiOiI1ZDJmODJlNDM1ZmNjNGJkZDg4MGE4YmJlODhjYjA5ODBjNWJhOTVjNjI3N2M1YTgzOTdkNTk4MmJlY2EzNjczIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IndNZnVkWWZkN2tMcFFja1pFbUF0RUE9PSIsInZhbHVlIjoiMmV6Y0ZQTjc2ZnRQZkhqZzlzQVBhMHZUbHhEcjNIQUYrOFVWMGxOMUE3eDdTMkdtNzFyR0x5S29BeGNGUXJwNlVxZlJJQ1l0c09RaXE1ZDNDeHlYMUpwdjlZLytwaTcvM3djZkNiZWl3OWlreEpoOFVyek4vS2RSQ2xWZEN1NmciLCJtYWMiOiJlYmI1OGFjYmMxMmY0OTQyMjY4M2FjMGMzM2NiNDYyMTVhOGE3YTE1NGQ4Yzc4NDZiNTA4NTY3YTRmOWZjMGQzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:20:14', '2024-04-19 10:20:14'),
(83, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/gU4oZSUCZe9x2DT3UQLX1sjpoSJDqm1D0pISIZEk.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ik9vellLcWZPRkh0MmRpMmlGSmJ3V1E9PSIsInZhbHVlIjoiNURpMlovMm9MVjhBbjNFVlpSbUliVkFJVnM3dVBtajZmOUF5ZkFXR09mbVJxdUVZZ2pONDIyRjNGeW5CaG1aTmx6eDd6c0tXY21yRDFwTDV4T0owN0FFalNPcTRDTTd2bzFGa1FIaVRKM213QmRuUk9mblFKdnV6c05jb1pCV2siLCJtYWMiOiIyMzcyZTdhYjlmZjQ2N2RmNWVmNTM1N2E4M2E3ZDMxM2E0OWU4ZGFlOWI2Y2YzNTU4NGE2ZGVlMWNkZjk3ZTk5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im1peW96Y09VKzFBbStVcmFSR2czaEE9PSIsInZhbHVlIjoidHJ1Y0R4U2o1Sll2djRmaUUxUldBamR4YjlTSUlUdGVsYklSWEtGWW5sNU9VR0lKYUNaOCs3VXBuRVFMRVNuR1NGQzBTY1d5T1p3ZDlMS0lyL3VZTndSOXlad3NHWm5nRHEzWGg0WkxXUVBsZjV1Y1NpSTFZZmF3ZGdORHFpc2oiLCJtYWMiOiIxNDdiMDk5YzM3YWM0ZDU3MjdhZDdhNjg1ZjRmMTMwNzA2MThlM2Y3ZDNiZmQ5NTJlNGE5ZDM1NjU1ZWY3ODlmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:35:07', '2024-04-19 10:35:07'),
(84, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/j1UoKGPAtRkn8RlDKJJiVC3Noe00PYExvXPJyBHz.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ik9vellLcWZPRkh0MmRpMmlGSmJ3V1E9PSIsInZhbHVlIjoiNURpMlovMm9MVjhBbjNFVlpSbUliVkFJVnM3dVBtajZmOUF5ZkFXR09mbVJxdUVZZ2pONDIyRjNGeW5CaG1aTmx6eDd6c0tXY21yRDFwTDV4T0owN0FFalNPcTRDTTd2bzFGa1FIaVRKM213QmRuUk9mblFKdnV6c05jb1pCV2siLCJtYWMiOiIyMzcyZTdhYjlmZjQ2N2RmNWVmNTM1N2E4M2E3ZDMxM2E0OWU4ZGFlOWI2Y2YzNTU4NGE2ZGVlMWNkZjk3ZTk5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im1peW96Y09VKzFBbStVcmFSR2czaEE9PSIsInZhbHVlIjoidHJ1Y0R4U2o1Sll2djRmaUUxUldBamR4YjlTSUlUdGVsYklSWEtGWW5sNU9VR0lKYUNaOCs3VXBuRVFMRVNuR1NGQzBTY1d5T1p3ZDlMS0lyL3VZTndSOXlad3NHWm5nRHEzWGg0WkxXUVBsZjV1Y1NpSTFZZmF3ZGdORHFpc2oiLCJtYWMiOiIxNDdiMDk5YzM3YWM0ZDU3MjdhZDdhNjg1ZjRmMTMwNzA2MThlM2Y3ZDNiZmQ5NTJlNGE5ZDM1NjU1ZWY3ODlmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:35:07', '2024-04-19 10:35:07'),
(85, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/I1MvWv2bLa3Tk88q0oPl7DRX1viJERzpePjqgidu.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ik9vellLcWZPRkh0MmRpMmlGSmJ3V1E9PSIsInZhbHVlIjoiNURpMlovMm9MVjhBbjNFVlpSbUliVkFJVnM3dVBtajZmOUF5ZkFXR09mbVJxdUVZZ2pONDIyRjNGeW5CaG1aTmx6eDd6c0tXY21yRDFwTDV4T0owN0FFalNPcTRDTTd2bzFGa1FIaVRKM213QmRuUk9mblFKdnV6c05jb1pCV2siLCJtYWMiOiIyMzcyZTdhYjlmZjQ2N2RmNWVmNTM1N2E4M2E3ZDMxM2E0OWU4ZGFlOWI2Y2YzNTU4NGE2ZGVlMWNkZjk3ZTk5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im1peW96Y09VKzFBbStVcmFSR2czaEE9PSIsInZhbHVlIjoidHJ1Y0R4U2o1Sll2djRmaUUxUldBamR4YjlTSUlUdGVsYklSWEtGWW5sNU9VR0lKYUNaOCs3VXBuRVFMRVNuR1NGQzBTY1d5T1p3ZDlMS0lyL3VZTndSOXlad3NHWm5nRHEzWGg0WkxXUVBsZjV1Y1NpSTFZZmF3ZGdORHFpc2oiLCJtYWMiOiIxNDdiMDk5YzM3YWM0ZDU3MjdhZDdhNjg1ZjRmMTMwNzA2MThlM2Y3ZDNiZmQ5NTJlNGE5ZDM1NjU1ZWY3ODlmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:35:07', '2024-04-19 10:35:07'),
(86, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/veVIk48pflYZrBkCjtttYcL94mgZrDStiIxypmUp.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlBEOUROUVpnR0diR2crL2cwalAxYnc9PSIsInZhbHVlIjoiQ1JKZTQ3aml2bkV5aXJGL3JKelRZUWx1YjFOcko3YmhWWlVsOGNKWjV3SUVrcjFzZFA3L3VDeTVrdS8vZ3Z6emhFQUFtUjNycG85TTg2SlNpRFdHRXFWbzlUdWdWN2NTT05ISXRyTzR2OWhwSEdrTkNQcDFJejZ5QURGTWJ4YVEiLCJtYWMiOiJlNWRiYzExMGM1MjEzODIwYzQzYjc3MWNlZWUyYWE2ZjIyY2M3OTE5MzAzY2FiODQ1N2VmNzc3OWNjNDhkODJhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjZhYXo1T1pEd1E1b2RYNE1NcDlXaHc9PSIsInZhbHVlIjoiOXRPWUdWWnhEWDF6RWhCc2N6c0NINzlMdm92M0VISXVJMkJTWkRIbW4zZWhkaXc2R3JmcnoyeStST3JVMno1YXNyd0w3L3M1NUUwYjY2VjUrN2pDMjN2UmwzdER1dVlYcTV6UU1CaHF3OElvWXpZSGR6aUpDUkhBcXlkQjFTaE0iLCJtYWMiOiJmZThjNTA0M2I1MTEzMjRkMmVlY2E4MmMxOWEyYTc4NDA3NWM2N2ViMGJhMjExNzE4MmZjYjUxOTg1NjhkNzRkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:38:12', '2024-04-19 10:38:12'),
(87, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/EzWYhwlq4a4KxGJA5cWbQPyMToDLM5BTUkuB0jm7.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkdRWlVETjI0YXNzYlM1L2tTRHFVMFE9PSIsInZhbHVlIjoickdHaVNQQ2RLUllrYXNvMmg3N3cxUzFaSTJjS2xpaE1DdzJtVWJNNlhlc2RuT0NvRDlyZEVhSEpwOFFsUVR1OXFwa0hFR0MwRllDUlptMWJ1eml6M0p5cWtIdFNkams5WWVaY00yMm9sdk5jek1OakxPVGxObVU4TzdvK2tPa3kiLCJtYWMiOiJkYzA5MGIxMDQ5NWU3NTJiNmNmZWNhMTQ0MDgzODNkZjM3NGU1YzU2OTM0YWFhNzAyYzIwZDhhMGFkOWI1MTFmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im9DTCsvNFg2aUhURUkrdDdTZ3ZtOXc9PSIsInZhbHVlIjoiMUlPN2h3cE1rZUdoaDZpd282Nks1MzUwVDNFOWgxaGVIeFY0WnBteDFUZmZMS04rQTFhSDdtSHRaNW5vL1dMb0ZuN2kvZVprNzVock5kYWtDMXdWbmwrdFdEa24wSURJbFJiblJaajRWYzNHT1VGK3R5ZHVVdWtRZFhCTmk2WE0iLCJtYWMiOiJiMDg0MzIzYzhkMGU3ZGMzZDQwNzk4MDA5ODM0NDFkOGQzMDFkMGM1Y2RlZDZkZDc5YzE5NzRmZjI5YTI1MGMyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:38:12', '2024-04-19 10:38:12'),
(88, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/theme/1/rXGR29i5xbpHv054L7mQdG57THD9UTv6b8LYxsTl.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjA1V2FwdURqSHBPV3I2SmdiM1VlUmc9PSIsInZhbHVlIjoiQmZYbVFEb0ljZ2lEWER2bWtHMUdvZnBpSFQ0Wm1KY2JHeDVyNVUrQk41VjlyOHhrcW1CRjRiTU45Qkl0UHN3aGtueG80Yi9ZeGdFZS92QWtoSXh1YVVHY1ZlUkpzSmo1dEZHYW9vNTZvK1NwZDk0U2dWdlZ6SVBTTllNaXdrQW0iLCJtYWMiOiIyMWQyZWM0MzM5YWJmNmFmNDE5ZTkyOGQxNTJkMTY3NjAxNjQ4ZTYwODU4M2RlOTUzNTBjNzhlODAxMDVlNDI2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ino0VzYydXJMMmZDVkZBVnNDWTBVc3c9PSIsInZhbHVlIjoiWjczWE0xYVNMbEh5M3k4U0NNMy9XalZ5VzZUVWh5bkU0cFN0cUNOaHR3TWRDK0piRHd2MXpjbnN1cWhTQTBhTjN2M0Y3S29IcVpReExlTWNOTjRxVkswa3JqaGR4bTY0QTUzOWIzNnpWWHFzWXNGd2c5WGRnSmZhWnFsRzArUzYiLCJtYWMiOiIwMmRiYTZkOGUzZmY4NWUwZWNjZjM1ZTdhOGQ4ZWNkOWYwNzM1ZTYxMTlhMDE0ZjFjNzZhNjdjMmI5ODVjMTNkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:38:12', '2024-04-19 10:38:12'),
(89, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-us\",\"en\",\"hi\",\"it\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.9,hi;q=0.8,it;q=0.7\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjFIemdzOHNNWjFGcWdVWHl0WXI4R2c9PSIsInZhbHVlIjoia1M2UXoyM3Y2WVVmMEFnQytCU1pRMTd0WGhWdGIzWkNuR3hzb2ZpSVNuUEM3akI5SUlzbHBCRDJRTWFvcE1uYTBpS2hiSXNqekIxN0I3WTVSSGl5Sll1NXZGbDRQU085YitXblZxNFBuL21zc3ZtU3BhN1VWaHVKeXlYOHZtS1kiLCJtYWMiOiJmYTU2ZmY3NDhhNzU5MjliZjFmYTQ2ODI1ZGEzYjI5MTgzNjhjNTllYWJjZjdhNDcwZDcyYTVkNTMxODY3NWQxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlPTFd6azA2TjhWV1RwaWFjcFhoUlE9PSIsInZhbHVlIjoiY0hmR091azBQTnlqbWZmNUZ0QjUwcjVpQ0k5b2x4Rjh3U1BROXpuMjBTNU5VYlFGbDdSVGVzR0NzS25LazhCVkVnMVJRdEVYM3pIMXAzQUgxcDZiei8wdjNLUFByU0RsRENmeXBXRmtWQWE1aWdmenlTTlZRRVZLT1c1MjluWG0iLCJtYWMiOiJlYjZlZWU3NGU1ZTZjOGE3OGYwYzZhNmU2ZjQ1NTdkYmI3MThjNGUxNTYyNTFjNzcyMTNkYWQ1Zjg3MWVjNmM1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.195', NULL, NULL, NULL, NULL, '2024-04-19 10:50:55', '2024-04-19 10:50:55'),
(90, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36 OPR/109.0.0.0', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36 OPR\\/109.0.0.0\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-US,en;q=0.9\"]}', 'WebKit', 'Linux', 'Opera', '192.168.25.25', NULL, NULL, NULL, NULL, '2024-04-19 10:52:15', '2024-04-19 10:52:15'),
(91, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.25.224', NULL, NULL, NULL, NULL, '2024-04-19 10:52:15', '2024-04-19 10:52:15'),
(92, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.114', NULL, NULL, NULL, NULL, '2024-04-19 10:52:15', '2024-04-19 10:52:15'),
(93, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/BLOG', NULL, '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6IlpNQTFFVDZBSTY1V0svRmY5Z0ErT1E9PSIsInZhbHVlIjoiQXpUMTl6dTZmZ3hVK0lKdWR1QTRLbDJ2R3ovb2taZ3kzSWtPL0dkMitObnhQRHR5Wm1iYnR6REE0WCsxQm03NGFqcDVzV1Fua2liZ2xzSjdBOWgwQnJNNC9DZlFUUUkvNWw3eUEzd296dUhEV1NseE9oVmxMbytlS2VZQkVWd3AiLCJtYWMiOiIxY2E4NDY1NDMwNTkwMmQ3NDA5ODI3Zjc5NzAyZWE4OGQ3ZTg1Y2VkMzRjNjkyNjBmNWExMmZjNzZhOTYxOGFhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Imtzdm51ZzZ4UGRXT210R09ERG5JaEE9PSIsInZhbHVlIjoiNk1oS1Nxd3crVjdqMEhwSTVtM3UvbktjQmpGdEx1bGNaVFdYdEZXYk01M2JnaS9MSHo3S0RBTUF0YmdxU3BzZ2lnQzUrMW9IT0FnVzB3VFRtWFZGQ2U4eTFFQi9DMFV4dWxvTzREQ3YzWG0rc1diMHRUWjZSV1p4ZXVQL1RReEgiLCJtYWMiOiIxMzlhNWQ1MTA5N2ZhMzgwZmVmMGM3MzNiN2ViMGE2NTczOTJlZTdhNjM2YWVkY2U5NGM5N2Y5ZjEyZTNjZWVkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:16', '2024-04-19 10:52:16'),
(94, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/blog-images/4/gIdzDSc6YQToeXxHA5geXL9dXHb3f6KniPI0KEZY.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6Im1OZWtVdDlOc0FNcmg4U3RobnFOUnc9PSIsInZhbHVlIjoiMDBYcGhIcEpta2thcm9IN0NXVHhabDlqT1Q2ejRmc1JNVlJlYkcrMGhxOU1mbzVORzZNT1FzZjBiajVQRi9MbjJBSjY0TjljWG8rZ3BpTHZxUU9LdzRUc3ZNTFZhSkttR1ZCSVd1eG5zZVJrakl4OW5McEpsMWZLRkVGTFllbnIiLCJtYWMiOiIwOTlhM2Q4MWYxMjJkMTBmNWU0ZjYyMjUwYzhlZDUxNjM2ZjViZmIzMmNjNmQxZDI0OGFiNTNiNGE4NTljOTgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InI0d1ZpL1kycXFFZTZycG1taCtrWlE9PSIsInZhbHVlIjoiQi9pU2podHZMbHFxOEZ6c1NXUDVNa1RZVUhreDY3T0RFT0NxNVVkTkdHYUhpSUxKNDQvY1hUMUQwclBXQXRZdGkrRXFNQk9NMHROV3ZTc08rMlBrUjQ2M2oySzY0WTc4S3JRbFgySDB5ZzNRZ293RExCaEZzZ29vNU9OZzIwS2oiLCJtYWMiOiIzZDFjZjA2NTUzZjQ5NTM1OTJjOTI4NzU3MzA1MDU1NWZlZDkxODUyOWEwMTJmMmJiNWI2NjZmMjIyOWQ2YjA3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:25', '2024-04-19 10:52:25'),
(95, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/blog-images/5/QDUNuq2MbbChEmzqw7VodOzlErTOfQtDigs8lyrc.webp', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6Im1OZWtVdDlOc0FNcmg4U3RobnFOUnc9PSIsInZhbHVlIjoiMDBYcGhIcEpta2thcm9IN0NXVHhabDlqT1Q2ejRmc1JNVlJlYkcrMGhxOU1mbzVORzZNT1FzZjBiajVQRi9MbjJBSjY0TjljWG8rZ3BpTHZxUU9LdzRUc3ZNTFZhSkttR1ZCSVd1eG5zZVJrakl4OW5McEpsMWZLRkVGTFllbnIiLCJtYWMiOiIwOTlhM2Q4MWYxMjJkMTBmNWU0ZjYyMjUwYzhlZDUxNjM2ZjViZmIzMmNjNmQxZDI0OGFiNTNiNGE4NTljOTgyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InI0d1ZpL1kycXFFZTZycG1taCtrWlE9PSIsInZhbHVlIjoiQi9pU2podHZMbHFxOEZ6c1NXUDVNa1RZVUhreDY3T0RFT0NxNVVkTkdHYUhpSUxKNDQvY1hUMUQwclBXQXRZdGkrRXFNQk9NMHROV3ZTc08rMlBrUjQ2M2oySzY0WTc4S3JRbFgySDB5ZzNRZ293RExCaEZzZ29vNU9OZzIwS2oiLCJtYWMiOiIzZDFjZjA2NTUzZjQ5NTM1OTJjOTI4NzU3MzA1MDU1NWZlZDkxODUyOWEwMTJmMmJiNWI2NjZmMjIyOWQ2YjA3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:25', '2024-04-19 10:52:25'),
(96, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/placeholder-thumb.jpg', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; solum_crm_session=eyJpdiI6IlpyL0VDQlJrTFBJMjlOSXZQdlozTGc9PSIsInZhbHVlIjoiLzVadUpic1RtcXhJbmIvRXlFRVdXblJYQlUxOHRCcytMTmdKWi81Q2YzaHlRcnNTa290V21sMnBHcW93ZUMzdWZZSkluSjF2a0lucGJNckRuNXVRN3RncjFvb09KSU13anpIVFlSMnpSa1dRaUc3c3p4cHRrMlJXZlNXTllMZ24iLCJtYWMiOiJhNDgxNjE3ZDdlMTNlZDg1NTAxOThjMzJjNjkxOWUyYzFhMTMwOThmYWYwNzNjNjIyZjVjNzIwNmU2Yjg5ODE3IiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IjNHVjIxdUVpMEw5elBnYjJrRG81UFE9PSIsInZhbHVlIjoiQzloOG9kZngrRkV4aW9YSkFjYWRXN3Vjd1B6Rk51NEZmV1VDY3VOcXJJVlhrWjk5RnkxMHN1Z2tUQ3h6R1ljVUFucU9sTlVNc29WNXRETWRPT2tEWUJXQVRzeUxOUGtuekM3U2VwbDhqbGFwajA5ZTRRUG1iU2E2UGxaQTNxaEsiLCJtYWMiOiJhODBmY2NjNmFhODRmMTAyYTFhOTgxNWU0NmY5MzgxZWM1YWEzMDk4NGM1NzBhNzgwZGQzOTYzOGMxYjU3YjA3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkgwSm5yVlBTNC9ZQ3ZPRjFLR1U1dWc9PSIsInZhbHVlIjoiOXlQMk85Ujg5VTNpVUNRQzlEWHhONE5GUVRBaFhVK2JLb1ZDV2R0U052ZnIxQ2pFQ0V3djBqbzVVWXpBcHhvbFNCN2E0M3hYaHVyNG5nK0xkRngwK2U3MGdpQUpvMlZCZUdWN05Vd1ZGT1hTYnBpK3Q1Q3JvQzZ5RTcwSXBqYUciLCJtYWMiOiIwMDA2M2FhZDZhNjI3OTcyYTFmOWIxNjhmOTg4ZTVlNjNmYWI2YmRlNzU2ZTg3MTIzMWVmZjYxMzQwMzU5MWI1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:27', '2024-04-19 10:52:27'),
(97, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/themes/blog/default/build/images/hero-bg.png', 'http://192.168.15.214/rli-bagisto/public/themes/blog/default/build/assets/app-9f7d5a7f.css', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/themes\\/blog\\/default\\/build\\/assets\\/app-9f7d5a7f.css\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6IkcraWdWSys1akZMdVloR1NTbzd6OFE9PSIsInZhbHVlIjoiT216Z0x6UUpEZkRid0hmRU5GTVJlNmVqbkdQTVZXakttQUFNUDJuTHBLSkN3eGhQTlhteDdPMDRCYTdHRHlxTllWNEJwYUpsY1Q5L3NPWWJ6SnZkdExvM3l3dXdybEFDZHlqbEFXS1dZVHBvNmRodU1YVmNUVWg2cjFwMVJiRTIiLCJtYWMiOiJiMmY2MjhmMDE2ZWJmMWNjYjliYmU1MzYyODkxMWZhYWJhZWY3ZWUwMWIxYjNiNDIwYzBjMDBiNjkwM2FmNGQ0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InNaVGE1T0ZjbkVHakcvOEhTN0gvU2c9PSIsInZhbHVlIjoiVk5XdHVWNk1rVllqU2t4eFVybThCOTRuakxDcGRWeXQ2MFNaaWQyYUE1MkpkRSs2eTc2YVRZRkpJQmQ5SmczZEppdXB1QmVWaldtRVA0and4UkhUakdDNnhNV3NwTWIwTTgxZjNmRXpRWVo0cUxUWnBwa0pJZEpTVDREdVRVU2wiLCJtYWMiOiI5NjNhMGI2OTBjNmM4NGUwZDNmNDBmY2NlZTljZjhkZDEwODBhNzUzZTg5NGVkMzI1NjMzMDY3NTU4Y2NiZTFmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:37', '2024-04-19 10:52:37'),
(98, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/themes/blog/default/build/assets/blog-app-9ef8d2ee.css', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/css,*\\/*;q=0.1\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"dark_mode=0; XSRF-TOKEN=eyJpdiI6IndoM3UvNWxyVjZRU1ozcWIwQkJjQ0E9PSIsInZhbHVlIjoiRGh1c3ROM1BDOVFITWpDNUpQZ0puNmZUZHRkZ3BydzZHcm9SYk5KS0VlYmtuM2dDN1kyM254WUdsbWQ4Uk0vZkdoa0ZvVDJvWnJ2WmFsS3MxTkpjcWdHV2Y5eVlsNk9JSkwrVVN1VEJFVERnR291bURaQ2pPRCtMRlVFajNVZVQiLCJtYWMiOiI3ZmRiZmUzMzQxYTFlMTRhNWNmOTczNmNiZjU0ZTkyZTYwNmRiZmQyZTVmMGI0ZjMxMmM2ODI4NDNjYjY0ZDhkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImFRSkpsdlRzRCtTaGlVVFpOeDhsb1E9PSIsInZhbHVlIjoiWS8xOTdyU3F3dFE0c2VTczFpYXUyNjlhLys0elRxbkpJQVErNmtObjVMaStaMGtaSEV6dHRWc2V5bmdPbTFnVDIvRGlBYjc5VytrN002WExpQmJUbkFIUTVuSUlhQkxzcDd0WUdrZStnQzR6QldBWDRyL05vNkQ5NFFocE9VU0wiLCJtYWMiOiJhNTYxNDY5ZThkYTYyMTEyZDljYTEzZmMyODAxZDkzMGE3NmRiNGEyNjIyNjFkMDcyM2JmZTNhOTUzOWVhYjMzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-19 10:52:54', '2024-04-19 10:52:54'),
(99, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ilg2WEZ4VlI3dmlqRENMU3lUam9abXc9PSIsInZhbHVlIjoiYVVQcExKWVN3S1BPd2U2bEMvYlc0Z3BBN1E4ckdpSDJFNXd2VXFmMUp5MWV6OFZ5MmozU3JVejY5Z0NZZGY2T3had0N4RzI0alczM2crTndaZWpEWTdxRUN0dGFENXR0ajQvNXJjK04rNUtaN3NXUDRaQkphUldkMmVKM1RlUk8iLCJtYWMiOiJjMWU1NTVmM2I1ZDI5MTA1YjIwMGQ1YzFlOTEyNWQ5NjRjZWM1Mjk4YTBlM2JiN2YyMmJiMDhkZjBlOTI5ZWY0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkJ5VEd1V04yVkQ5QU11dFp4UW9JN0E9PSIsInZhbHVlIjoibXhmS2VUVDNRQ0lGdkgwT3VGYUVCcDdrRkZqM1JMUDM1d2YyV0g0WGZ3TUgwQm1hMkg2VTlFRXdNMlFPS1VtdVc2NkdTakFoN253N1BIb2djelRMVkdFNWV6SUJ3R09FTWt1UzVQc1FIOE1vdDZJOTVMV0VSWEdOa1dMNXBVZ2YiLCJtYWMiOiI0MGRhYTFlOTE2Mzc2OWUyMGJiOWZjYTNlMjQwMDBhODRiOGVmYjcxNThhZTNjZmI5ODA1Y2Y0ZDUzNTc0N2M4IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-04-19 11:25:33', '2024-04-19 11:25:33'),
(100, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=price-desc&limit=12&mode=grid', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=price-desc&limit=12&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlJDNUJlRGc0ZkJVNVN0QUV1cDFKVXc9PSIsInZhbHVlIjoia0JaSTJSM0FUYjliR0JuN2RlQlM0R1hiRGd3bWFJQ0ZGTmc2eXpmQ2gxa2J3Q1ZrS0REOHY3Q0dkK0w4S2YveTRWSW1tdTRjRW56UThFdUhvVEpLTzh2OGREV3VXaXUralphcENkbTlXbldKVGdkNFUyWUtjaTczZVpZRGlSdDEiLCJtYWMiOiIxNjY0ODNiYmM3YjQ1N2M3NjU5YmE4NmEyMWMxNGJlOGQyNzlmMGZlNTQ4YWYzNGMwMzY4MTIzMTFlYzZkMjAxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkRRZW9Cd0hraFNVb01RT1JEWFUvdmc9PSIsInZhbHVlIjoiNEdiYmZJcjZVMnR5U1hNYVdPSW1kS2FtanF1eWxoWDcrK2FvQXlWeTZ2Um5Oci8rcDBZK2NjbS93Ykwxb0U1U1JaQ1I1a2NVRHlSakR2THY5MlNrbjFtTk1pb3QyWDVnSCtxUGJqeUs3ZXpxMmhQMDRjckg2S2RIZEp5bFRQTVYiLCJtYWMiOiI2MDVhNjYxY2I3YWQ5ZTA4OWRkNTA2M2RjNGU2ODJkMTA0MWRkMmQ4Y2FlM2MwZTc2Mjk2OTVmZTZmNTlhNGRmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 57, NULL, NULL, '2024-04-19 11:25:46', '2024-04-19 11:25:46'),
(101, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot-slant-purple', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=price-desc&limit=12&mode=grid', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=price-desc&limit=12&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImRTOUgrNDdNWG42cU9RQndVMFBiRkE9PSIsInZhbHVlIjoidWRvRWRidGpEYk1TdUsrRGZRUngzVFR6eUpmcXZOK1BmRGttN0szTzRYekxBdUtZUEluckNZbDdTNGNsNlZFS01qSzBwSjlWdk9RNlhqbHRzdnQrRXVyRmI1TWFiUVAwOEErekVVQ0ExMDBpVzdoVnVGaUNmakFLanR3WnJCbVQiLCJtYWMiOiIwNTY5Y2IyNGIzZjA5MjcyYzNhY2FmYWJkMzAwMjgyMzhlODcxMWVlMTUxMDQ2ZTAxOGRiNGVkNGRmY2UyNTlhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkVtdGZYNktKY0g0TG51UjhoaStoQVE9PSIsInZhbHVlIjoiOFY0ZndzeEl1MzBwenhMUTRGSnNmZ1d5b1lFYkFIOWxlT0s1RExldmQ1STkxcUkrRkJQdnpkYUFROFZZeFZ1NEJIcHdqekJLTk9mVE0xVWI2YUx5K3Q3QjM1Wi9GVmNSTEc2UndaUnJXWjhaOTJ5ak1CRnlOeVk4dnlYWGp2QXoiLCJtYWMiOiJlOTA3YzFkZmQ0NTk2NjVmZDQ4NDc2ZGE3YWRkZDU1YTE3NzQ1YjdhMzI2OTkzZmM0OTQxN2NhZmYwODUyNDJhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 59, NULL, NULL, '2024-04-19 11:25:56', '2024-04-19 11:25:56'),
(102, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/admin/dashboard', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/dashboard\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Ild2RjM5a3NJdzFodkpuOC9qU25CdHc9PSIsInZhbHVlIjoiWkg5T0NVK1dvR0o5Q2wvbC9jTnJLMThqK0pLWUQvZkFDTWJEeHcrM29xOUFjL2tPdHl4eXZnUmM2VEVRT2ZFMm9rcGplTU5rQ1NnNkhucGZSRkE0ajZtbXRtVHZMZFRYVndBbHg3QzRORzIvZVVHcFJlZlA0UnJuQ2NZUlA0RUUiLCJtYWMiOiIxMTM5ZTNmNzNhYWE3ZDYzN2UxM2E0MDJkZDk3Yjc0OTliMzBhODYxOGVjZDQ3NjUwMjI4MDZlNDQzOWEzZWQ1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlpTSnFaNkFtbEVaSFVpaFVFRDBVU0E9PSIsInZhbHVlIjoiQlR4RzdCWUxoNjA5ODdMRFBSVHNiYkZwSUpZVFZnQUxNVTEwRUdEQSt2VFJBYktmN1dhTFBodFVGd0hEZXMwaWdmcysvb0V0MEtMQ2VsdXJVcUFpVG1tL0ZUNjVZWG0wU1hFeVZmazVKYmkrRGZBaFVoTnkxa2VEUEErdUk4WXoiLCJtYWMiOiI2ZjU0MTRiOTQ2ZDc1YWFjOTg3MzJlOWFjODNkMGY4Yjc4MzllZGQwNjJlYTVlYTk2Y2ZjNTk1NmI2OTVkN2FhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-29 07:17:41', '2024-04-29 07:17:41'),
(103, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IkE4L2FqVURzRUdDNjV5K3hod2ZXTFE9PSIsInZhbHVlIjoiSTVub2pGQXdVWk96b2FZRkhuendwcDdxZWRZL05ncVh5QTBBeEVJRy9mZDhXVWRMamlVaW5VS1JGTzdyUVZ1UTZGNXc0WVBmekk2S2RRSFpVc2htQXZWNUY3VVI4WWw0UEIzNktKL1kyMGpMVVk0N2IyN0hEclIzb3M3L2d4aHAiLCJtYWMiOiI1MDMwNDlkM2IwOWUyYzMxZTc2ODI5YjYxMjI3OWM0MmI3OTc4YTUyMzE1NTI3MDYxMmNmZmU3NDUyODQwYWExIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Imo4Tk9XVlBPeTJrN1hUSUplSy90RHc9PSIsInZhbHVlIjoiQ0hKRlg2YitGNDJ4VTg1SmdILy93OWtTam1KQ1lwMERDQlpMdHpaOGxYUUZBRktMbk1XMjE2RVFaeDJNbjJ1a1dDY3RPc2Y3U004OGRjaVNNZmwxQTZxK0dzQUNmck5VN2hndVUvMlYyR29VdFU4a3BoTFB3TVp1cXlCMnZJbWciLCJtYWMiOiI3ZTU0OTJkMjc3ZjA1NDE5YzYyNzFlZTAxMmE4NTY2MGNjZmNmNTI1ZWVhMDNjNzgxZGRhNTk0NGRjNzQxMGUzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 8, NULL, NULL, '2024-04-29 07:17:45', '2024-04-29 07:17:45'),
(104, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/customer/login', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"cache-control\":[\"max-age=0\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/login\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6ImZVVHR1QlIzQlR5Z1ZCbU1uUnNZYXc9PSIsInZhbHVlIjoiWVQzR2syYUlnU0JFTElQRU9jcExkckd0eVZZbm5QVldNZWFHSllQU2xYUG1aT0hBUCtsaUFpbVFSMU5OVzBmR1hONjNwOGhUT2VrNnFFK0Nra1AwcG5SL2VPNEdESHc0RkdHN2NEd3JYVHRQOGlmOFp5eHVzQTBXVTV5WTZvdmEiLCJtYWMiOiIwM2YzNmNhZjcwNDBhMmNjZDJiY2IxMjQ5NGI3MjBiMzBhYjMxMTZiNzY3ZDgyYTZkZDNiYjk5MjgzNWRjNjFmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InhIZitPZlVINnM2cXZaeDh2TVVaL1E9PSIsInZhbHVlIjoiZkw0bU1XN0wzY044SFVUcisyUlNnRjAzZkdiOFVlUlVmY0c1MTNjWFdPdGxSV0tVeTFNZ3F3dFlOUUwzajZwaklYUDViK2VVR1pxNUlIWVZSUWVPMFBLL2l4SytJWk1IQnZXTVZwTVZRYjdwa0J6WnVVWmFYb3NmQWIxTFp3b3UiLCJtYWMiOiI3NGZhNjdmZmMyNDVkYWUwZTFmNTQwYWM1MjM0OWQxMTdhZDE5NDhlNjAwYWUzOGFiNzVmNDMzMjFiNzk2NDYwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 2, '2024-04-29 07:53:50', '2024-04-29 07:53:50'),
(105, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/customer/login', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"cache-control\":[\"max-age=0\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/login\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IlNIWmd1dXZFS1YxU3lQSmM0UHJnMmc9PSIsInZhbHVlIjoiTUFSUy9KOHhYV05jUzdWM2d3bzRBV0s2T2M2Zml0UFhOcGdlT2dvZDY1M1JxRjgweFA1aUJ2cFNOajVxMHNkaS9TQzlMZzBsbmVVaDNOTUJkUlMzTDVOdWhTc09FUE9STVIrcTIwVWx2RVI0Q0hhcDgzSFNtRkZLcFJwemIvVU8iLCJtYWMiOiI0MmZmMWFlYjA0N2UzZGFlMzNlZmM4NTkzYzMxZDI0ZjM4YTVjYTZkYzQ4ZmRkY2ZjNDhjZGM2MDY0YzMxMGQyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlVkZ3g5RTBaN1JOa1owYkx4TkJwT0E9PSIsInZhbHVlIjoiMERyd0Z5QVpHWFZkckxpSTBtQnhLaVl3WTh4cXpMc1M4L3IzTWx6SDdMcFJTVmNBTUQ3Skl1UGh5UGd0Y1paM1p1NHpnR3F3ZlM0cnRreGNwL3A3WEFCUzhwNldpK0svdXIxeCtQckJiWWhqTS9kR1lpem1SNzZLSHpoNnFTYkIiLCJtYWMiOiIwMjNkNjdiMmMxNDZjYjZjYmY5Zjk2NDc3M2U2Y2IyZWIyOWNmZmI5YzZkYzhkYThjOGQzMWM1ZmVhNDE2YjQ2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-29 08:21:01', '2024-04-29 08:21:01'),
(106, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/categories/edit/9', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/categories\\/edit\\/9\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Im5Tdi90N2dZeU8zeEdFdllhN2tPMlE9PSIsInZhbHVlIjoiUkU2RHJsdDFrUWQzTGhPTVhaMzJhWFFWeFVjSkNEQnpNTW9Yc0N6UGFVZVRZS0YxVjI3RVQrb3JLdmNoSFN2ZHQ1T2tVRTNtZ21pZU5SSEZuKy9XUlRheTB3QkVKalVIcU9VNGFKRUkwMDFCZmhhNVNPaXBCNlRreFYyT3ZNZGoiLCJtYWMiOiJlZjlhMDY4YzZhY2U0NDllZmJlNWFlZGYyZjQzMTFiMmQ4ZGEwZGY4NDk1YjBmNzQyNGFhOGY3MzY5YTdiYjVmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImpTMHBBdmljK1A2VS93bWlBOXRFVlE9PSIsInZhbHVlIjoiSkNSSXFaOU15VlVpelVlaWFrOXZIY2pQRlAvNXVUZTVtc3hIa3kwZmNrQzIydWhFUXk0UlBkQkZzOUU0cUxHZTV2dWllRmtFQkhGNHRqOXdDWXJuMWR5bHIzdUNNU3cyQ09hYmlsWGhoK0N4VXVsRXZkVmhGcWxRSXNXNjJ1QWMiLCJtYWMiOiI2ZWM5OTlkYWE0NWZiOGRmZTc0ZmVjODRhMDlhNzBjOTE0YjJlNzNmMGI0NmQ1N2Q2MmIzODljNWMxMDJkZDIyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:37', '2024-04-30 08:45:37'),
(107, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/categories/edit/category/9/community_banner_path/XwemDZjfqxWM3i1OUk769E5DtbQyU6p5BXPqTxYY.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/categories/edit/9', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/categories\\/edit\\/9\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Im16clJndkxKb1ZuTVkxWUtWRXRua0E9PSIsInZhbHVlIjoid1ZOZzRrY3NtUyt4S3RWa3ZUM3lOUzZEQUgydVVNa0szbTJONTVHLzF5ZjRQS0dXYU5iNSttNEVuNXQvdHJkTWx1VUV6OUpOWVM2S2d1eG55TjhkWSt5cysyc1BEc2x0Nnh0djFLOHNEYlpFM0MreU9hT3N2VjFRS2lZZDRHT3QiLCJtYWMiOiIxM2YxYmM3NjdlNjVkMDJmZDlhNWExNmU4ZjdjYjc1MzIzMTczMjEzZjg4MDQzMjk2NTEzZTMwOGFjMmQ3ODE0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InM1eFd1YTMvMXA4bGw5bzErdkJXVmc9PSIsInZhbHVlIjoiK0dPQitxcHlPQldmejZsT00wNks5VDVOOER1RzVmMDkrRUIzRWV4b296eTJBNEVscEFTNlRkVm5ncCtBMlF4djY1MWxESThaR2ZTVFMzU0ZhOTZjOUkyclNndGl6aVdINnFzcnMzVVhZOFlBWnRMKzk5YmRnbEVjNWhoSDR4ZW0iLCJtYWMiOiI1Yjc3NWMyY2JkZjliZWFkMzA3MjU2OTkzZDA5NDU4OGNjZWRhMmRkOGY1MDkwZWNmZjUwZGJkZjU0YTAzOTBlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:45', '2024-04-30 08:45:45'),
(108, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp', NULL, '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"cache-control\":[\"max-age=0\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IlB1Zm5saHkvRjFpN0tzckx5aG1LVXc9PSIsInZhbHVlIjoiWUtnLytRZWJScUpyOUdwbWFhZkROUTRrMjRhK2xiWW5yUW5HWTYwcWdYTUJrU2FJV3ZFNU9SaVBad1lvcEdwT0xwVWFTRlAxTkE4Y29SUzlqSGovVTJ5azExTEc4N1pGK2s4L2dmamIxY2tiVytHekZlOW9qL0hTa1dxRnNRMGIiLCJtYWMiOiJiMGY0ZDZlZWYxYWQ3OTFlZTgxYzU3Zjc3Y2U3OGM1YmExYjE0OGRjZjJhMGM1MzJkOTdhMTZhZDViMjAxMjI2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5QaVp3N3M0TVBZM1JJd2lqaEIrZ1E9PSIsInZhbHVlIjoiVjFiRzh6MEMrYTFzQ0xOb0JZOUJhZnV0RmRrc3g0U05pWVV3RXNjVmx3Y2JaMDNLd2V6RVpCemNZd2NVcW1VUXRIR21hc0RLbG03NHlpMFF6TWFYdDVuaWhta09ybjhhTmdUQnhKZUEyR0lIc0VobGJhVEVwbzJhUitWV3h1OWQiLCJtYWMiOiIxYjg2NTRmYTg1OGUxMTQ0ZTBlYWFmYzhjMDE4ZGIyNDBjOGYxYzIxNjdiOTYwNDE0NmUyZTUzYTJlMzJkMGQ5IiwidGFnIjoiIn0%3D\"],\"if-none-match\":[\"\\\"61e6-6173a4b727c2b\\\"\"],\"if-modified-since\":[\"Mon, 29 Apr 2024 11:10:01 GMT\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:48', '2024-04-30 08:45:48'),
(109, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/storage/theme/1/veVIk48pflYZrBkCjtttYcL94mgZrDStiIxypmUp.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/9\\/community_banner_path\\/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Ikd5TWkwVXpsZ1o0WUF1VEsyS1pzMnc9PSIsInZhbHVlIjoiekFoU1lETHZudUZmMjRKcE1wN2FVNkYyeFFBY0F0WXhHNTBUYzlDNVBRTTdsaDhkVk9uU3hkRkxJQ1R5U0VTWUYxeWg3S1FKbkdvMnJiamcvR0dxMDF4UkZpWHhSN2xQRWd5Nm15RWNDTTRPSzhnK1ZlWkdrOVU4Zy9QTU5uK1UiLCJtYWMiOiJhYjg3NWZlMTA5MjI4M2NmZTg0NDcwNmM2ZTg0M2Q1YTFlMzBjOGMwZjQ3MzU2N2NiZjc3ZTEyYmQ3ODFkZWQyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkM4bi9HRHBMZ2lyb21nUVFHK3lMVkE9PSIsInZhbHVlIjoia3VWUXBVZG00VkQ2ZjlGZ3RtV0VPN1Q3QWx6V3ltbFJ2akMyT2dzUEYzM0p3c2JEYWZ3Vk00R2xqbTQ2ZC9tZjcxVEZaR0tNbjZtU2ZYNkN5ZFBWOVNxaUlDRFl5RitYR21sMThPUWI3ekp2a2RSZnFMUVZTSjNkMUpEK3d6VDAiLCJtYWMiOiJkOTc0YTgwYmFjNWQzN2U4YmY2OWE1Njc5YjliZjJiODI1MDk5MGNmYWExZjAzZGI5MzFkNDNhOTM5NGY4NTI5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:48', '2024-04-30 08:45:48'),
(110, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/storage/theme/1/EzWYhwlq4a4KxGJA5cWbQPyMToDLM5BTUkuB0jm7.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/9\\/community_banner_path\\/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Ikd5TWkwVXpsZ1o0WUF1VEsyS1pzMnc9PSIsInZhbHVlIjoiekFoU1lETHZudUZmMjRKcE1wN2FVNkYyeFFBY0F0WXhHNTBUYzlDNVBRTTdsaDhkVk9uU3hkRkxJQ1R5U0VTWUYxeWg3S1FKbkdvMnJiamcvR0dxMDF4UkZpWHhSN2xQRWd5Nm15RWNDTTRPSzhnK1ZlWkdrOVU4Zy9QTU5uK1UiLCJtYWMiOiJhYjg3NWZlMTA5MjI4M2NmZTg0NDcwNmM2ZTg0M2Q1YTFlMzBjOGMwZjQ3MzU2N2NiZjc3ZTEyYmQ3ODFkZWQyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkM4bi9HRHBMZ2lyb21nUVFHK3lMVkE9PSIsInZhbHVlIjoia3VWUXBVZG00VkQ2ZjlGZ3RtV0VPN1Q3QWx6V3ltbFJ2akMyT2dzUEYzM0p3c2JEYWZ3Vk00R2xqbTQ2ZC9tZjcxVEZaR0tNbjZtU2ZYNkN5ZFBWOVNxaUlDRFl5RitYR21sMThPUWI3ekp2a2RSZnFMUVZTSjNkMUpEK3d6VDAiLCJtYWMiOiJkOTc0YTgwYmFjNWQzN2U4YmY2OWE1Njc5YjliZjJiODI1MDk5MGNmYWExZjAzZGI5MzFkNDNhOTM5NGY4NTI5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:49', '2024-04-30 08:45:49'),
(111, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/storage/theme/1/rXGR29i5xbpHv054L7mQdG57THD9UTv6b8LYxsTl.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/9/community_banner_path/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/9\\/community_banner_path\\/2W3I9QPL5zvfherLJ4WvgRSDfXNmzxM6PigWvfBc.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6InF6NlVkYk9rWTdQcEdJUzB5UnQ1VUE9PSIsInZhbHVlIjoiMjY1WFpTQXdzeEFRc3FMeDdBZUlnQ1RkWmpTL2k3MVdMN1R6QUJJYUwvVG5MVjVlWmV5cVcveWhVRlIvSFNidWFHQVNTZVBIOGdRd2NSN3V2MW5HM2U2VDVpZUtRZlplM21yUU1RR05QbUdOaTJUTERyd1kzcERZaXVhSVZaN1giLCJtYWMiOiIzYzNhOTdhYzFlNDE0MzQzZGI3Mzk4MTE0ODQyZjdmMDE1OTdiN2I0MWY0NjExY2JmNGFiMDRmMGQxZDViYzUxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImFwTGNYbjdKUDN0ZThvV05UdjVwbnc9PSIsInZhbHVlIjoiNkJGU2M3ajZ1amhmVUpzWTN0RWd6SWFSZmtTSy93Q3JYRE5rdmw0NjBXL0h0THdOTEkrbzN1cWhlRlZzOXNTMWpnaVhNWXR1MEJxVG1ZbTNHdk9sSjQvQ2t6WkQ4WEpLYkZDQVFpN2NFdVNtM3JCVGh5czZiaE1vMURYSEZnb3YiLCJtYWMiOiIyZTAxZDZiZjMzMWUyZGVlYzE2Y2E4ODA2YmJhYjkwZGQ3ZmQ1OWVjN2UwNDcxYzRiOTJlNTY0N2QyNjc2MWUwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:45:49', '2024-04-30 08:45:49');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(112, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp', NULL, '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Im8vdURBcmx1alRjOFdOWTIyVzRJRGc9PSIsInZhbHVlIjoicXQxMEdzQm5HZmxNMGdLbWZVMitWOFFQd3Rrek9RWVpwS3EvQmV5NE5STDkreExoRnN2UkZtM21wQVJYTEVSempOUERMU29XN3FLWlFZMWE0NjZPMk5MT3VrbGdySHVyZnJDdkYrTWc5enl1OWluNjA0NzJUUDdibGkyYmlxTkMiLCJtYWMiOiIyYWFmODEyOTRhODg2OTg1ZDVhNzk1MTc2MmM2MTQ5YzAyZjMzNmFiZTY3MjE5ZDc5MjVlNzE2MzEyOTJkZjczIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkVlRUFWYUlRbTVNMG52Q3lYbzY4K0E9PSIsInZhbHVlIjoiZFpxbFh3cnFMNFUvT2M1RGNHa3UyQnFmWjZZR0s5U2Z1SDVkL1ZHb1RNY0Y2TTNINk9nWUJ6dFFDcmdmb2ErVkVORUg4eTVqcnpmWE5BZDVVR05xcjI2TFFEY2pMMGpILzVQSXhDbTJNNjlYcHU1c3AxSEVVOVBPN0ZETXFadlkiLCJtYWMiOiI0ODg0OGM0OTBiODQ4NDgyYjM5ZTM5N2Q0ZmE0NDFiYmRhZjRjN2QyNWRkNGE1YjNiODYwMGNhMDBlODA3ZTIxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:00', '2024-04-30 08:46:00'),
(113, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/storage/theme/1/veVIk48pflYZrBkCjtttYcL94mgZrDStiIxypmUp.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/2\\/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Im5wSHpya1l6RUR6bnJLRmd3MHpsYmc9PSIsInZhbHVlIjoiVjdpc1VSMDNxVHdoS3lGaW5pNllTcDhkbnpLOVNxK3lzMm5paUF6elJBZkhFSVRxOS84aG8xNkgrSFJtZHI0SzA4blh4KzhIUTNGb1RWQU01dnR1SFVSWDFQWnR3M2V2djJyLy96RlYvMGNjNmdUNGxsMzRtdFZnRGJweG9acU4iLCJtYWMiOiJkNDJhNzUxOTRjZjQ5ZTI5ZmVmODNhYzgwYjM5NGQ1YzU3MDA0NWZjYmFkNGNmYzdjYmIzODhkYTU2M2YxMWY3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlpDdWV4RGdKQ1JOUEE2dzNmdW5mSEE9PSIsInZhbHVlIjoiUENIK1VIeDkyQi9UYWtNdlI5UE5Fd3NleEpRY042T1R3Vi9ZZFRVaFJhbnZjY01Gbzl3dENHZWlrdUtXQW5qWFFpUGdMYzEwdGErQzZTNjVTSUJuUjN0VDloVUdiVWVjOFNhVUZBSkI3M1B1S0h3SFllY1ZITmh1SERPd2tKMWoiLCJtYWMiOiI5ODJiMzM3OGEyZjY4NmIzNmRlOTBkMmMzYWU2YmFkOWMwZTBlZWJlZWZlMDk2MzgyMjUzZDUzYWFmMGE1MzUwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:00', '2024-04-30 08:46:00'),
(114, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/storage/theme/1/EzWYhwlq4a4KxGJA5cWbQPyMToDLM5BTUkuB0jm7.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/2\\/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6ImcrQ2pqamd5TzJmbDFDR055azlRM1E9PSIsInZhbHVlIjoiN0QwMlJvVnl1WVczbk5iRUtkNnBpcWVxUzhmMC9ZZi8zRjJqY0tZVE5NUXc2SmtkZzNTQ3I4N1pzbVNZUlRUNFB4akVpWXhnaU02YTN3clc3QjBoQnVJdHFkcUxaOVR3alhlcnBhRXhpZXlUWDF3bzZwbmdpTmF5am5XcjVxNVQiLCJtYWMiOiJjMzVlNzBmMzQ4OTg0ZDFjOWI3YzAzNThjZTA4MTg1OWY5MTUxOTE5OGY0MjJlMGFiZTZlNTY4MDBhYmQ2NWViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlYNy9IK1ZsTytVV2Y0YlhwOStScEE9PSIsInZhbHVlIjoiWTdWQ3BiSVZPMWdqU016Nm9YMmxKU0hVZnlkY1FVdFB0ZE00b2N2YUNqUnRRK1phNGIwWVF3L24rVHRuYlBHNk9ZTE5XeU9GNCtLVnNCeTZydzRaRW1HQzd4ZVhKMVFPUzFCcS91N05ZSnBkb3hrZ3I3UUVxeWxNZGNTZFJITFkiLCJtYWMiOiI2NGUxOWMyNmEwZjE2OTllZTRjMjdlOWQ4OTkzZTU5YWRjM2RiMTViMDBkM2E5ZDA1YjNiYzZiMDI1ZmM4ZmY3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:00', '2024-04-30 08:46:00'),
(115, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/storage/theme/1/rXGR29i5xbpHv054L7mQdG57THD9UTv6b8LYxsTl.webp', 'http://192.168.15.214/rli-bagisto/public/storage/category/2/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/storage\\/category\\/2\\/LcZyNsaHOhBdXzAYAol871N386ibK1NV2q6TzgEv.webp\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6ImcrQ2pqamd5TzJmbDFDR055azlRM1E9PSIsInZhbHVlIjoiN0QwMlJvVnl1WVczbk5iRUtkNnBpcWVxUzhmMC9ZZi8zRjJqY0tZVE5NUXc2SmtkZzNTQ3I4N1pzbVNZUlRUNFB4akVpWXhnaU02YTN3clc3QjBoQnVJdHFkcUxaOVR3alhlcnBhRXhpZXlUWDF3bzZwbmdpTmF5am5XcjVxNVQiLCJtYWMiOiJjMzVlNzBmMzQ4OTg0ZDFjOWI3YzAzNThjZTA4MTg1OWY5MTUxOTE5OGY0MjJlMGFiZTZlNTY4MDBhYmQ2NWViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlYNy9IK1ZsTytVV2Y0YlhwOStScEE9PSIsInZhbHVlIjoiWTdWQ3BiSVZPMWdqU016Nm9YMmxKU0hVZnlkY1FVdFB0ZE00b2N2YUNqUnRRK1phNGIwWVF3L24rVHRuYlBHNk9ZTE5XeU9GNCtLVnNCeTZydzRaRW1HQzd4ZVhKMVFPUzFCcS91N05ZSnBkb3hrZ3I3UUVxeWxNZGNTZFJITFkiLCJtYWMiOiI2NGUxOWMyNmEwZjE2OTllZTRjMjdlOWQ4OTkzZTU5YWRjM2RiMTViMDBkM2E5ZDA1YjNiYzZiMDI1ZmM4ZmY3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:01', '2024-04-30 08:46:01'),
(116, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/placeholder-banner.jpg', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6InM3RUwvNjMra0NKdE81OGdqZ0hJRnc9PSIsInZhbHVlIjoiVUFYTXlJb0EzRFI3TElMNTdHNlhMTkxOOWJiTnp4U253dnNmeGVxb1Y2eWJ1QllOVUZra3AyYUlWdWE3RGJoZlQ3NTYzay9XdnNHRXp2eFVvSkJVQWRqZnllb3JUdExHZDRBc0R5eS9lSHVCclhraTVDV0l3T0hCSzJZSnB0OTAiLCJtYWMiOiJhYzA5YWZiMjEwYzdmNzkxMjcxZTYyMjNiNWJmNzI2YjMyMWQ1NmMxNGI3YzI5YjhlMjhkNTgzNDRiOWNjYjI1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InM1SXVWZTc3eXNTSko5MGd3Nk9NUVE9PSIsInZhbHVlIjoicUJaek51RTR1RUh2NzBBOWVRZFBOeUVVTFBUeXNRUjg4VXlLSTlyTGM2WFJiazVCQ25qQ0Y0S3UzVmsyWWU5ekpRZVpMa2dCRERJMzk4aGwyTjNkU3FjMERBSTMrWnAvMUZQbTc4ZW1rM3Rtb0o1T1JtLzRXeUx6K1Rady9kUEEiLCJtYWMiOiI5ZTA4NmNkZmM4OGQxODBkY2I1OGQ1ZGFlN2ZhMzI5ZTVhMGVhNTk1MWRlODM2MDZhZDc1YTk0NDAzYTUxYzIwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:06', '2024-04-30 08:46:06'),
(117, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/placeholder-banner.jpg', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IndCOVkxVU5DYXFzUm9BaHlWemNrMlE9PSIsInZhbHVlIjoiL2lEb1hoVDhXL3YzMTYvVENIU2Y1TG42VG5NV1ZiRUZzRlZmQXlhYURiTGlpU1J6YVRtUmpIZUhmU29rUExQL0dqT2R3elkwRERnc3lJeEdRS2p3ZlpyR2lBL1dVZy9NVy9EeCt5TnV3R2dmSzBxVGhQSWwvT3c2ZytUVGNPekkiLCJtYWMiOiI5NGQ3NmUyNWZmMGFiZTc1MDc1YmNmMTgxN2UwZjJlMjE2NjgzYzYwMGExYjE3NmY0NWFlY2NjNDJmMWY5MjE1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjE2NE1aY2tVMzRFUU9Ga3UzUXdMRUE9PSIsInZhbHVlIjoiUGZuaWpac2ZNeVZzenkycXE3d1FqdW9yMXRnK3h6RDl2dkMyZmFCbHNGN0R0aVhiN0NUZ3dTeEtLb1JHK21JR3VrZURwTW5Gb0EweERjcCs3MXdIYnBxZVErTFB6T0d6OEtzczd3aFJaVlc0WjQyQ0g4R1FqS3REYUx6YTF1U0QiLCJtYWMiOiJmMmJhYjdlMmU1NjRjYWZhZWI4ODJiN2NiNjBiMzNlOGU4OTI3MjQ2MDkwNGVjNjI3ZmUzMmE3ZjM5ZDU0M2I3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:09', '2024-04-30 08:46:09'),
(118, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/images/empty-placeholders/default.svg', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Ik83RlUvTFJNai9YZzR1NTNHTDJtTkE9PSIsInZhbHVlIjoia05nUkRBejl6eG81eWJIa1RYdVBQU0ZYb3VSQ0JqSFloTmFKSCtVNzFQU093Smo4Y1ZNbmhtSU5XelNYQ2lnbzliZ29aUHZzcEJRN1FiQmlmdWVYa0o4NTVQMHBkTTB0QjN5cVc0WXZ0c2Jzb0VteTJGRDhhUHNrSWhFbnd6YkIiLCJtYWMiOiI5NTI3N2FlM2JiODgwMDdiNzdjMTA1NzdhZDBkZDhlNzFlOWE5ZWM4YjE4MzM5NjU0ODhiNDFmNmI0ZjEzZGJmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikd1WEg5U05FQWp1enBWQXNXaEovOFE9PSIsInZhbHVlIjoiZTE5VnJRT0h5U0Vva2JiN004RTZJb05MY3VuOG9SK2JNdXJSVjFHOWtLTnl1UksyZUFncytma1BST0l3aUNVQ3pMM3hENUZ5cTI2UmZWczVrb1ZIMktWeFBjOEtTN2pZT1VXSTFydER6cUhlN3lBNDZxakw1M09ZWFNKdmZpWVgiLCJtYWMiOiJkZTM2N2JjY2U5ODI4OGM0NmI3MjI3YmRmOTYwMDQzMmU5MWVlNTk1Njg3NTg3MjFhNThiYTgzYzlmMmRhYWY1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:10', '2024-04-30 08:46:10'),
(119, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IkJJU1I4QndrL01BSDB0SmVzOXRCdXc9PSIsInZhbHVlIjoiTVFzWnYrRjNQdlRiUXN3dXZQQk5FancrM0kraWFLRFBrekNWZUtNUkNONnNTSytwcVNTdzRjWUlsWnFaS1lxSWJLTVB2dWpMUEZyY003Z2RlWjhkTW9oZGM4TGMzaklSaitSQytSTGQ5S0RjVmtjYXFLallNNHJKR0VQUWloblQiLCJtYWMiOiI4NDBkZmM0MjliN2QwYWY1Yzc4NzUxZGJlM2E4YmFmZjViYmE1NGMyYmNkODA2ZTRkOGE0ODljZjdlYjExZmFjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InQ3d3pCVjZiNEVDWnB3R3Nsb0F3bGc9PSIsInZhbHVlIjoiRFpXUEdZUWJjcmlXU0pHMmlnckk1ZnBDU2lHQTdGR2t2cTJYV0tKaC9QUWxmUmRadGtUeW1tODlsYnoxaWVVejRGY1NsSE1DWEJKVmZSUW1XZGhIOUJSUGttaFhvN1h6aUFnZGpDZ1N2S2l3WTFaWjhnKzkzdGR2ZDJ6bU1jcGsiLCJtYWMiOiIyYzI4YTgyZTk1MDNjYTc4OWUzODJjOWY0MjMwYzUzOTRjMjRlODY4OTQ2NjYzY2NiMzlhMzM3NWIzMDhlYjhjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, 'Webkul\\Customer\\Models\\Customer', 4, '2024-04-30 08:46:15', '2024-04-30 08:46:15'),
(120, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/146', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/146\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6InQvaFhFQjcxUzQ2V1B2YStMU2dIM3c9PSIsInZhbHVlIjoiOEZHSXNYczU5OE1YRzhTWUh0Q1o0S0ErYTdxZWFKdEtudnI4OFFON3JWaEZmQ1B3ZXk1QWlGc1l0WkQzMzhCdVZpeU9mQXcvV2lqT05BYVFVbHN2aHZLcXlhbkIvV2JYZUV0YTdZekl1ZjVjcTJ1ZVNyRUZBSUVpdjJBREdHSzAiLCJtYWMiOiI3ODU4N2NjOTk0ZjgzZDJlZWY1ZDJkNGUzMDA3MDdiZGU3OTQ4OGE0MTU5OThjNTU5YzgzOWY2M2Y2NWRmODFjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImRQd0VFci84MVRlUHowTlZkanBoK0E9PSIsInZhbHVlIjoiS2plMG13b2VFcTBvcWdZNzY3TFdoMytrWG82ZXRWYXhCNmxTdzkxdHRxbHRCSXJpcnpWUllUdjZuWEwzb0luS3d5dkNla2VscFltNnkrblRDMkJpRDc2TU1HMFRJeUxzQ3ZDNUZleGhjcUpsbEZlemtzSko2dlFUY0VrWW1aTTMiLCJtYWMiOiJkYmVlYjk0ZWIwYjc3YmZkNWY3MzEyZWE3YjcwYzlmNDdiOWFlNmQ2ZmVlZjU3NDYwYjhkYzRmNjA2NjM3Yjk3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 146, NULL, NULL, '2024-04-30 10:00:04', '2024-04-30 10:00:04'),
(121, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-duplex-house-and-lot\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6ImNqR1dPWE1MN0pMZVl1VG5XYlk4cGc9PSIsInZhbHVlIjoiUWJ0d3hHTjdPRFdPZTlnaytQUkNHSytodFIvL2F0RnAxZE01RFVtWHhsR0YwTUNndTdUaGtvYnFITFFicW5EM3FNNlQra2MwSkxpQUtLRmJNNnlVVVI0bTBhQmltTHk2VXFIZEM4NDQwUGp0SXJTdW1aY3Y5c0l0bXdoaFl0MEkiLCJtYWMiOiIyZDYxNTI4ZTVjMzU1Y2Q5MjhkMzlhZThkY2FmYTFiM2UzOTdiNGU5YjFjNzI4YjJkZDEzNjI3N2QzZmIzYWQyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkNVZ3RZaUxhLzlPaFpqeHczeGJJUHc9PSIsInZhbHVlIjoiQk1YUUYwbDJWOUx2MEYzYWwyVkJuWG9UMDNSbnVrajByZzZaclhQTUpQSC9JYVRvUVdsSWdKWXJrb0IrRFVWY2lxZXFvNU9iVENNSXR6UzQ2bDA2eHA1WXpRekNSYkptTFIzRnhTZWVlQzRpRkhFOE5tcUZDTjlxa1BKWDcwYjQiLCJtYWMiOiJjYjNkMmY3YmE3NzZmMTY1Njg2YmFkMzJlZmM0MzUzZGQzNjYwNjRhMjY3OGE4YzJlM2M3YWNkNDZlZmU2OGFkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-04-30 12:17:43', '2024-04-30 12:17:43'),
(122, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6Ijc3YzJwRnVOaDltWTFwaVQ0VzYzZkE9PSIsInZhbHVlIjoiM1pUOWFCMmNZcDJuTVhJT1BEeERZTHhJNkwvREw3KzFuVjY5NmxMaWg4RVVxRzZGUytkclpSTCtMQm5ZMWl2MnkvMkhCVFVJblF0YTNVcHJ2ZVlJSUlTTjY1clZ3YWhoaWNBL1BNeGNaYmUzSVlnTkNkN2svTFhySmgyUmtidVQiLCJtYWMiOiI2YWUxODBhZDk3NWZhODMzNTU1OGU0YjhmYmQxNTU2M2Y0ZTYwOWUwMzQyNzI4OWRjMzE0ZjZhNzM0MDYxNmNjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFUZjJIQ1V6S3pYMjJtMmVaTUoxbkE9PSIsInZhbHVlIjoidis0K2ZMRzFkelFDY1p4RmhJQ1p2VHdqT1RseWlzRUV1ZmR4dTNHZ1h0MFE0SWJkWUpaQzVoQ2hLS0RFV0VHZ29KYllGM052cEdpekE5WENGMVZJQS9pdld5amt3bm5yWGJTSXNpd21iTDNFQTlMcEhab0FURjNISktCMVlFdlAiLCJtYWMiOiJiOTJiOGU0NDI2ZTNjYzNlN2NhMTE0YjE1Mzg1Yzk3Njc3MWE1OTA1MDE5MDZkYjZlNTBiYzBlMzVlM2ViNmVjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-04-30 12:17:44', '2024-04-30 12:17:44'),
(123, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/zaya', 'http://192.168.15.214/rli-bagisto/public/agapeya-duplex-house-and-lot-flat-green', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-duplex-house-and-lot-flat-green\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6InpIeXNmcm5RYjdGa0F4d1VSZkV4RUE9PSIsInZhbHVlIjoiZFhtbEFLemtER2JDQ0NIdnQ2Ym1MelRGRVR2VWU5WDFPZXNGUUtFNk82YjcyNHFSSWtWeHVldjlacWFEbEMvYjRMclRoRXlHOHI4YU5PV0FmZTcrUTYzMTFKUUN2U0xNVWNJVFR1MW51aW15T1hyMWhhajhya1lOVnJBSEFjTVYiLCJtYWMiOiJjM2ZiZjEzYmRhNzk3NGE5OGRmZTM1MzA2YTM5M2U5M2RiODljOGI4N2Y4OTljYThkNjc5ZGI0MWU2MmZiZjQxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InJxcGhuZmtxcnI1QXZEbm1mMU5ySHc9PSIsInZhbHVlIjoiSDJSRzFnUEtUTEQ1YUdaQm9RTUQrMzFFYjkrVndXZEszd1Vuc3JVRml0TzduUzhVWnc4YTJPM0IrM3VDYzJsK2V0d3NuMjRkQnFVbVVMSDVTYUZGd3M2aDlmNkpLWlRKdlUxS0FEck0zek5DSFZxRE5UZXlWcWl3Y0NVMi9Xc0ciLCJtYWMiOiI1OTU3ZWQ4YThhNmFlMDYwYTI2YTg5ODRmZTE4Y2IwNWJmYzVhYjhkMDc0ZjA1OWZkZWVkOGFlYzBjMjRjNDkzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 9, NULL, NULL, '2024-04-30 12:17:47', '2024-04-30 12:17:47'),
(124, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IkpmQ3RtcHZBNTdiRzV5RkNEWld6WVE9PSIsInZhbHVlIjoiOWw5VnVpUjRQTmZJVVhWY3NZa2VWa2FJRUhFaXJpc0c5MEF2Z2tsQVdQUmpab3pITkJvTm9LaURZa1MvWTBHZExMWVp3RTNpNlFhbm8weUxlOWhJcGQyOEk3MEdaQVNLTFhxZ3h4UUxnczEyUkg1WnNtZHRkdnhPNUdaMHVCSisiLCJtYWMiOiI4MTRkMDE2ZWRkZmRmOTcwNGEwZTc3NWJjZTdlY2VmYjM1NDEzMzQ0NDg0MTg0NjQ5MDgxMGNmOTVlOWJmNDNlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlNDUVcweFo1bmcvNGtxRmNLc0xQSlE9PSIsInZhbHVlIjoia096RzQrRWpPbHN6OXlaL3VaU3U4S3Z4dk85U1V6NElkOFp2OWR6emxKL2QrdzBxM3dUdWkvUlI0Q2tsYTRiQmxkZGcxZ3pydTVUN1dxZ3VFb3lZaE9FbDJteTI3bWwyM0JOSnZNOGVTQU1yQ1VSdU95UVE3MitnTVhSVHNjUGYiLCJtYWMiOiJhMDllZGFhM2M1YjQwYzE1NzM3NzIxMjIwNjVhYTc1YTg5OGQ1NGE5NTY5OGEzY2FkMDMzNjI3MGUwMjFmZGRmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 8, NULL, NULL, '2024-04-30 12:18:02', '2024-04-30 12:18:02'),
(125, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/178', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/178\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IlZyK2pBMmdtcCt6dW56TW5RZlpwenc9PSIsInZhbHVlIjoiM1BEZjJUSWZNMUd0R1NiaHNFZEtJUUhMUnVUbXZzL0FnbVVqUFFJYzI2YTFnT3lNODlhMjVaWVhvajN2bkdJZ0pkV1pKeHlabW1leTVNSEl0d2RnTTZFNlkweUJUWDJKUjBzTW9LQndhd2ZEaVdSYWZMYWhuTzEzN3hrWWgzTDMiLCJtYWMiOiJhZjAwNjNjZTRkYTI1ZTk4OTU1ZmJiYjEzMzgyNDhiZjUyNTNiZDcwOGJlMGQ4YzgzYTA2MzY1Yjk2ODNhNDdkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlJCM3crL1J2TEFMOUpzdEJXMzU4ZUE9PSIsInZhbHVlIjoib290VDZRdXptOXBRZUNSeDZXMWwxN0FBajN1d1oyK092VDBMZWl6TjdDUi9nVFQvOVlZd3RJOEFXNUZ4azdPWEdQeVIrWEljWnM2RDl1VE9sRUc2TWsyTnQvWVJlc29FQUExSHk5SDNNT2ZQY0pDTVc2U0pwdXNsSm9hYW1NZ0wiLCJtYWMiOiJmNDI1ZDJjOThkNzg5OGVjYzU4ZTllMjc1NzVlMTY5ZGNlYzllNDY4MjY1ZjhlM2IzM2Q3MGJlYjA3YWUwNTBiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 178, NULL, NULL, '2024-04-30 12:35:16', '2024-04-30 12:35:16'),
(126, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/blogs', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/blogs\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6IjRrUGROcjBJS2Y4c3N4RkNUay94S2c9PSIsInZhbHVlIjoiQys0QlRSL3pwaVN2cm5ZNU8vQnhTMEFKRldzZGJLRS9LZFRGczVOeEE4TEUwUkpqRnhORTVjR2s2eHJuVTJyUGZMSSt0clVnMmtBNnZtNlp4S3VzWGUrbDZNam12Q3Z4UE5ORmx2eS9KMHQ4eG9HNVVDT2NGRTdGOHUzdy9aUnMiLCJtYWMiOiI5ZWQwZDc1NWQ3ODVmMDYxMmFlNmI5M2E4ZjE1NDA3NGNjYjQ3YjEwMjY1YWVhMjk2Y2ZmZDNjOTY5NzkzMTlhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlZvMXRxYVNkTlF4SCtEajJPKzhVVXc9PSIsInZhbHVlIjoieVp2czJkemJNM2ppUE1OTi9RSlE2bHNyOHA4YXBXMEVEb3FRRk5iQ3dDM1ppd0JpaktuZEF5RkMveHFRdnRqL3NZZEpPVDFqWjczS2RUMzZieGM1OVh6MStaTjZKQkRmdVY4dFFDZVMzTTNsL01kc2hhU3ZYaVFWVlU2MndSZlMiLCJtYWMiOiJhODMwMDhiY2MzM2I1YTI3NTQ0MmZiNDA2NWJjMmMyYTUyNDI3ZTI0NjZkODIyOGUyZGM4M2I2OWYyMjA4YTY5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-05-10 09:42:54', '2024-05-10 09:42:54'),
(127, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/admin/blog/posts', '[\"en-gb\",\"en\",\"hi\",\"en-us\",\"es\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/blog\\/posts\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en;q=0.9,hi;q=0.8,en-US;q=0.7,es;q=0.6\"],\"cookie\":[\"sidebar_collapsed=0; XSRF-TOKEN=eyJpdiI6InBZZ0hXSTNQU0NXUzZHVmVEUk4xWWc9PSIsInZhbHVlIjoiWjkwcXlPQVRpdGpvc2g5dFhiS2tZRGhxWUh4MVpsRGpvTVFoWkN6R2duZkdrMUtsNmFIVHJoTXgvZDV2b1M4eWZXRFpqVW9qTW5oUEZpTW84S0tuT05nTmVDNk1ETmFkUGtLK3Y0ZUF0cXlKYXhFN1RtNENWOUdVTzJ0aWhFSUsiLCJtYWMiOiI5YzQ4OWE2M2JlM2E3NDc1N2RlZDQ1ZTA1YmY1ODlhNTVmZjIzOWY5YjhiMzE2ZmQ5ZDk2MjA4Y2FiMTM1NWVkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkZEdlB6L2dXZmV0U2xZdndFSi9SUXc9PSIsInZhbHVlIjoiY1FIdStwdlkreVJYSzBXSlRkUEI4aWMyZXNIejNsZlN0Vk9QOURrczFPQjZKbFQyVi9xdlNSUVhmemJUYnY5MUdFaGUrT0ZPU1ZwVTNSOWdQZTFUdDRHTGRhYzUrdkcrckZodnRpQlVDVmR5cXJOOE1lQzFvM2gvU1IyMGNITjYiLCJtYWMiOiJjMjRlNDYxZTkyMjMzMGRiNjFhZmJlMjE2MjdjNzg5NzljNTgxNzk1ODczZDk5MWYyMDliMTBmMGFkODE3YzA0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 09:42:55', '2024-05-10 09:42:55'),
(128, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/customer/account/inquiries/tickets', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/account\\/inquiries\\/tickets\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.295430974.1714566590; XSRF-TOKEN=eyJpdiI6Im5ZVWh4L0xWanlnYXZ5ODI2YjVub1E9PSIsInZhbHVlIjoidDQwRW5PWHk1VDFaNXM3WHFweWkvdXM2Mk9JTVlWSmlnZ1pLZkd3TzdMRnA1KzBPUzNocy9JcXNRekZCMTRQTVUxZDFEN2RLY3pvRGVxWEJsbWdsTnNON0dMWGI2N1QxMVVYRDVEK2tMOEVxMWt4T24xaWxwSHg5eG9hNGVZM1ciLCJtYWMiOiI2M2QwMTNlODJjMTZlYjc2NTBmZmMxZDhkNDg5NDFhYzIxNTQxOTk4OGYyOGI0MGY2YjMzOGVlODc2N2M1N2Y2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik92SUJQL01rNUVFUllSR2VRMmkxWGc9PSIsInZhbHVlIjoiUnMvK0RsakVMWkFodU9WclAvU1Ewdlcrd01CWXBTWmRhYTkxTHYxN2s1Vm82K0lubkhjVUF0aWp5cmJ4RXdYcGMrNm9KeGpyM3RLQzQyZXZRcGRyUU5RelB2ckl3R1d6UEdWMVk5M3dHc0FrbFgwNXVTWFIxZHAvaEdndzN1T3QiLCJtYWMiOiJjOTI3MGI4Y2VjNGY4OTRjMTUyZDM2MzNjY2YzMGI4OGFjMDFjODg1ZWU0ZDExMmM5YTk3MmM2YjIxN2E1YWQ1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:20', '2024-05-10 09:45:20'),
(129, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/customer/account/inquiries/tickets', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/account\\/inquiries\\/tickets\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.295430974.1714566590; XSRF-TOKEN=eyJpdiI6IkIzTXB3SXVNZ1hhNmtjMW5GZzd4cVE9PSIsInZhbHVlIjoiampibnk2elpIaVg3eEtmc3BZZFE1SHluaUFUMmQ0eE9QaFRaSVdXZ0RhMkhiUEl6VFNzTEpqd2loQ3Ywak10aXRLSEFWZDVGZjJ1R2VVc091MHBXRzhQVlN5WklEOStRWGx3cFNCLzhUR2RuSWRnZFlyVUZLVjVPb2JQdGptNjAiLCJtYWMiOiJkN2QxYWQwYTk2M2JmMDZkNDgyMjllN2NhOWQzZTg4N2JmY2UzM2QzN2VjN2E3OGM5ODA3NmU1NjU3YjIzNjEyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkVLU0ltaGpRcDh6UEN4amZuZkg5bGc9PSIsInZhbHVlIjoiRmU1TmVuYkZGTzBXb2J2UCtwdjdKZ2dXWHNzV2JYaXhaSWJtdlh3WG16WGlWMStRb2ZJSXhJSDdNQlZ4VmpVRnNsaSthQVNKWGVDOE1TNVRveG1yL0Q4cVRuV1JFTjdJY0d3TCtFaXd2aUxHSGZmeTZTL1dkODJOTUxpM0hhZXAiLCJtYWMiOiI0YzZhODZhZDc2NDczZGFiZmQ4NDBmMWMzYWQ0Y2NhOGQxMWY5Y2EyY2RlNzIwNWJkMmMzMTNiZDM3N2NkNjc2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:20', '2024-05-10 09:45:20'),
(130, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/extraordinary', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.295430974.1714566590; XSRF-TOKEN=eyJpdiI6ImRiWTRlMWdSWHd6QmYwQ09PR09xVXc9PSIsInZhbHVlIjoiT0t5cVRzcjRraVVqUEtGZGRMSFgvUWFLb0VjOW9GN29SeWsxekpETjEzbDZSWVpPY3VuRTRHeXMrcTJheC9PR0F4Ky8vT3VuYUZqZWFZMitmczdFNTIrb2lEVGpveGlMbStrS0E3bGMxLzhKSnFUZGtucEZtRXlqV3A3K2lmeTMiLCJtYWMiOiIzMzBhM2ZjZmFlMzdjOWUwNzdiYWZlZWE1MGU2ZDczMzM3YjNhZDMyNWYwZGIyNDk5NmUwYzdkYTJhODMwMTA4IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkVUd2Y0KzA0OWR2REtZZ1VxZVdxSnc9PSIsInZhbHVlIjoieFNXQytoL2pNajQ4VEgvVUF2WGZhSTJBelc0UUNJNGk0eHF4Y3JOb2U2R2lyZ20zdU9LaDJjUGRhSDI0Q2svR2ErVkRnSE5rMGdkVTl6TkRvVExiSCtKTTNwdnRNWjNsejZrcVFKc29XOXVwWWdRR3RjTWx2ZDVJNHBOb2RzSDMiLCJtYWMiOiIxNTQzY2NiYzM5MDM1MDU0Y2I1Y2M3ZjQ4M2I1MDQxMmQ0ZWM3MGUyNTEzYzkxYzY3OGU2NGNkMTU5ZDhhNmIwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 4, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:22', '2024-05-10 09:45:22'),
(131, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.25.224', NULL, NULL, NULL, NULL, '2024-05-10 09:45:22', '2024-05-10 09:45:22'),
(132, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns-graceful-pink-flat', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya-towns-graceful-pink-flat\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImE2SUZJTGZLOGQzZVVDdWx5aDZHb2c9PSIsInZhbHVlIjoiejRkeU83dk5sVmFLKzhFaGlBZ0FqQ0lBSi9Zekhia3VsUFExcUt3RHQ0WERlZWdjaFo0QlplZFRYRFJLVEg4eWZ2cmpLT3VyRnNvQkVEVjV4a3VkeWI0TVQ5MlFZajJqYUtwODhJM3VwR2VDTXA4QStVWkpSa1RScTI5U3NFSCsiLCJtYWMiOiI1NDkyMWQ3OTM5MTMxNTgxNzEzMjhiN2U2Y2E3N2E5YTUwNzM5ODQwNDE0YjU3M2ZkZGU5MjdhZWEyNjVhODc1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlpsRHVjMUo1UFBiTGNjNUtOd1k3T3c9PSIsInZhbHVlIjoiRlowMGRYekNGcVI2Z2JFQnFOSnBndTk4MG0wR08wVnBWUmQvaU5aWFFyVVREQ3Rac0hySWxkQnlQL0RsV2tBakhvTk9DeHFZZTVkMzd3eU9LcTUxeFg3STRjeWdZMnovVnkzRnBMa3ltU2RUTVIzalNUU05kNEpvc3Fwamd5cVciLCJtYWMiOiIzNWE0NGE3OGFmNGVjMWViNzhlZmM1N2E3NmE4MTA5MjdmZjQ3ZTFiZGMzMDFjM2FkOTQ1N2JlNzY5ZGI2Y2E2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.25.224', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-05-10 09:45:23', '2024-05-10 09:45:23'),
(133, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/vendor/webkul/ui/assets/fonts/Hind/Hind-Regular.ttf', NULL, '[]', 'Dompdf/2.0.4 https://github.com/dompdf/dompdf', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"close\"],\"user-agent\":[\"Dompdf\\/2.0.4 https:\\/\\/github.com\\/dompdf\\/dompdf\"]}', '', '', '', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 09:45:23', '2024-05-10 09:45:23'),
(134, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/vendor/webkul/ui/assets/fonts/Noto/NotoSans-Regular.ttf', NULL, '[]', 'Dompdf/2.0.4 https://github.com/dompdf/dompdf', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"close\"],\"user-agent\":[\"Dompdf\\/2.0.4 https:\\/\\/github.com\\/dompdf\\/dompdf\"]}', '', '', '', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 09:45:23', '2024-05-10 09:45:23'),
(135, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/customer/account/transactions/view/2', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/account\\/transactions\\/view\\/2\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IjhVREFmZlNlRXVhc3R3endyZzdKeVE9PSIsInZhbHVlIjoiUlY5TXRIUi9PUmxOT1N6SkNTd1NkQWhQaHdVdWE2QmV0STFTMFdzeUN0ZmttT0VCaDV1eG5wdUxjbHlSamhvUTgxd1BYVXc3azlZT1k0MGlPcktzQXFGR1k4d1RUNUFLWGlUeWN5enpPanlxam9Od0ZMYkFuRXdLQVhBNGYrZzQiLCJtYWMiOiJkOWU0ZGIwNDM2YjRlODcxMTNiZTA0MjNiMzkzMjc3NWRhMTc0MmEwZjIwNTg4ZjUxOWIwODA3MDdhNjYxNDcwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkFpM1hnMHFKN2ZJNDJUTVVHZ0U4clE9PSIsInZhbHVlIjoiNjNwcW5BdmNIbjFPNDRmcGxjQ3RJWG5tWjFoT3lIdU9PSnVUZ3F5SFZaa3kyV01jdTU3YXVnT1dPdTRxNFNjVFBQWVpBdnM4VS9mOUV4RWRFRkswWTAzTWtOTHFRVU4vTm1UNnVUZzVQWFo5MkVLa3lyMWhFS0pEaXNOeW82dFAiLCJtYWMiOiIyZWQ2YThmYzY0MGJkNDYwZjhjNzIzMjJiN2I3YjRlOGRmMzhmOTlkM2ZhZDRiNDNlMzc4MThlODJkZTNiMDZiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.25.224', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:23', '2024-05-10 09:45:23'),
(136, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ii90REk0ZnFsTE1OWmdDbVRUa0xleHc9PSIsInZhbHVlIjoiRUhMNWk5QjZQeG5rYnkreTUzeFN3K3dTd0JhSVpoZXIyRTZDL3JUdzdzQUoxTHpvR28xTW5zTTVyclZkODF3TG5UdzVLckVjMElza0Y4MHhaTllFRzVLL3lSaWh6ajJUSGFoWEJLRGx3SmJ6UTIyTDEzb3ljVEZTMW41L1p3MUEiLCJtYWMiOiIwNzQ0NzUyMjEyODk4NTI2ZWFiODk3ZWFkZWNhOWVjMWNhNDUwYjQzYWUxZWRiMWNiNDYwYTAwYjI4NGUyZDJlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik1lektOdlNkL05VWEVDVi9tSDV1K0E9PSIsInZhbHVlIjoiQW5rUjR5bkdZSmtIYUFSRGdxenM5bldmNFhPUkZiMmFyaW5lSW44cmU5QzZOUEJGeWkyZVpsWWFwMTNXR3UzaXZka0lLUUxycCszTmsvWk1aWWl0QW1UWFVRRnNSZ2tyS3ZGNkV4MlZWTDFaRjYzVDkzSDdSREM1TEx3VlROQXIiLCJtYWMiOiI5MzYxZTM4ZTYzMzVkYzA5OTU2NjJjMTIwMjMzZDgyZmY0N2NmZmRiZTE0ZmQ5MWZkMmE2ZjVkZThjMzM2N2U1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.25.224', 'Webkul\\Category\\Models\\Category', 2, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:23', '2024-05-10 09:45:23'),
(137, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/blog/bagisto_asset(\'images/medium-product-placeholder.webp\',%20\'shop\')', 'http://192.168.15.214/rli-bagisto/public/blog/lucian-mccormick', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/blog\\/lucian-mccormick\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; XSRF-TOKEN=eyJpdiI6InRCWVR0MWV3ZTNRQ0h5U3hLc0I2ZGc9PSIsInZhbHVlIjoic0RFdnRUZjNJdlE4Z3JLeGFWeXVhS2NZUDZBbGNlMnpucFJqUzdJOTlJTERtMmV2YmxzYVFaTEZ6eE1Dc0xsTkFlN3V5TU1xSzNWTDhySnd0MTZKNG9lVUdvV1lMV0Vmd0pON3JaQzNWWWhYem9HOVczQmd5a0kxb09VTkVVeFciLCJtYWMiOiIwZWQ4NDI2NGRmZjI0ODZmZjg5YzAxZDBjODU4NDM0MDQzMTRlNzIzNjRmMzVhMWU0NTNkODFhOGJhZThiMDhjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlYremFZRHBHOXBRSytLQ2QzT3dFR3c9PSIsInZhbHVlIjoiWEJCS2plazZCM1ZhNFgrWHdlSGtNSGF4Z0VYeU5WUWZNd21wZTBUQXExdGVwZGsyZ3JYZDNJQjd1NkFjYmx4bER2ZnpVUmZpSVU1NXJOczBQaGNEUndTT0NMOThtdzI1cDVnQ2pTN2tJZHlnSmhqVC9Ib3JXbWU3WEF0YUFvWFYiLCJtYWMiOiI2OTA4ZTg5MWM3YTkxYzRlMWMwN2NmY2E5Mjc3MGJhNjQyOTIyMDczMGY4ZWVlZDNjMWFmYzA1ZTM4M2I1NDMyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:26', '2024-05-10 09:45:26'),
(138, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; XSRF-TOKEN=eyJpdiI6ImtqVkFTZ0l6K0xrQkVSREFOeStqeGc9PSIsInZhbHVlIjoiUmVFREw2NytwRkxZZk5Yb1ZLdlMvZ1dsVWxyNzI0WGVJdkVyZzR3dElFTGx3b3c1QjQ0SFFNKzR4R3EvN1hEcElFZUkvS2V5WkUwNXVxbVovKzRDejRUNlE1MnlROVRmbFl1Y3ZnZWl1b1FDZ3N3SzZ5a21ZT0llVmJTRXRjcGMiLCJtYWMiOiI0MjM1OWRiYTdkNjVmOGQ2MDA4MzM0Nzg1ZDFiMjFlYWU0MWJiYjkzODlkYzMwYmNmYzcyZDdhN2RiZGY1MmU2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikd0blVBWk5yRm5SRFlid05YVTYzQmc9PSIsInZhbHVlIjoiMHhqUW5Dd3pHVkYvMEx3Y3VYWjNDUXAweVdPSXU1cHEyclhrekwzNkpDSi85WGRPbHlYRWJNek9lcnNKSkRYdyszVWRDWkJJV2hmcGk2SjAxQjBRblJLMk9kb3RGUFZDUWtEdk9UK1doV1Y5bXBHQVd1WCs3RHZnaHEyaXlkbzciLCJtYWMiOiIzZGVmNWRhNDZjYmU1YWQzMzAyYzM5ZmMyNGVjNWJkYzczNzFkN2M5NzdkOTcyOTQ3ZjAxMDgzZjZmNmI3ZTY2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 8, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:26', '2024-05-10 09:45:26'),
(139, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/zaya', 'http://192.168.15.214/rli-bagisto/public/agapeya?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/agapeya?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.1667411411.1714713412; XSRF-TOKEN=eyJpdiI6ImtXYlo3eWlsMkhpSE9MNUJSWVdFWmc9PSIsInZhbHVlIjoiN3ZkMDV2QmNUNHA5YUk3dFBDQ0xqTnZOaTNkWkN4VG52SUt4cXd2eVRGNEF5S1YzOUNNVEg4eldxKzdXeU85L3FuWHNreDVFc0RNV01LSnhLeFhpRXB2bXBJbnV6TE1rcUJhQ2dKUWpqVUhBQzBETm5rY29mQlg2eXhLNndrUGgiLCJtYWMiOiI4NDdmYTg3NzU4YjhhZTJkM2JmY2VlMzViNDMzYjUwNzQxYmIwMGE1OWE4YjAwODI1MDgzZTE2MzU0NzNkNjk4IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjNaQzR3N0daSDR1OEY5Ym9Tc0c3MVE9PSIsInZhbHVlIjoibFI5bU1hM215bFB1VC9Ua0dyMnVIczI1bmo1Sm9uZ2M0UmMxK3QrdTF0RUdtSlBXa1FFRml3S08rUEhqMzlIT0xuTUhRR2ZxbjkzKzhOTjdpK2V3eTlvMHVseS9lTzJyMmVjVHo0VjZMdjhscHRkWUFDVXo3Sk8xQy9lWVBIcVoiLCJtYWMiOiJjMGIwOTEwNjhjMzU0NDIyNTdmYjcxZjc3MWZhMGZkOWIwMDcwZmVkZGJlNzBiMGEyYmQ1ZTg4Mzk0NWVlZDFjIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 9, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:33', '2024-05-10 09:45:33'),
(140, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/extraordinary', 'http://192.168.15.214/rli-bagisto/public/elanvital?mode=grid&sort=name-asc&limit=6', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?mode=grid&sort=name-asc&limit=6\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6ImdNQXJNanVONkhzOGFEMkdkSzJiQ0E9PSIsInZhbHVlIjoiSnNEMjMyNEEzVlNzVlZia0FzWmdQc0RjOXFkUHdGVzdYVnNoekxJemU3VUd0MmhWdy9VTkFyVFRyN2JtWEpUSGlsaTZJczEvTlpNOXpDRFZyWDA3eDlZekhyMGtEOXFjM0wyRWZ6RnBOTUZocFZLNU4vKzJqZk1NV0Q1eC9LUlUiLCJtYWMiOiJkZDUxM2ZmOTM0M2QwMmFkNjcxOGZhYWNlZWNjMThlNTQ3Y2QwOWYzZDNiODM2ZTI2ZDZlMjA0MTAzOWI1M2YzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImNBQlYvcWxMaFJWUHNOOVUzYVdEdWc9PSIsInZhbHVlIjoiWDVNcGQ4NTFXbXFtVEd3UXdWN1NOOWdiMmdCNTFPakRndEU2UVRvUVcwdHpSaHdIKy9nQmNaZEsvZElpZXM5S3Y1WTVBUEw0czJzM21FaXhZbld2bUdsZDdMaXBPK2ZIYXF0RGZ3V0lRSWlnTzNidTd4dWtUV3ZFR1I4cGF6bXEiLCJtYWMiOiI5OTNmMGUzZjcwZGIwM2NhZjBjNWViNjkyY2IyMTQ2ODA4MzRiMDE5Yjk2ZDY2NWM0ZjUxZmExYzM2N2E3YjAzIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 4, NULL, NULL, '2024-05-10 09:45:44', '2024-05-10 09:45:44');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(141, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/everyhome', 'http://192.168.15.214/rli-bagisto/public/extraordinary?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/extraordinary?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6IlREd3c2c0NCTi9CMkM5NlJ4LzRpc2c9PSIsInZhbHVlIjoibTVMRGhYRnNQQzQwaWVQY1lIZmF6dkVKRzNkZmR3aTFTL0s4K3hXdlZMSkFOVllLM0o4VFBjaW9vSWhVTWZBWEtLR0FZZVMvWjduQVArTGQvOGZLUnc0NUVINmF3VzhKSGg4YVJuWXNza0toUitnbFZUaCtMY3ZlZ1hoOXpVMnkiLCJtYWMiOiI3NWRlNDlkOTRlMmM2YjA0OWFhZjUxZTY1NDMxMGQyOTRkYjRlZDllODZiZjY1ZTExNzA1ZjFhZTdiZTcxNjA4IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik5vL0lkQzc2OHJBQUREQUhJV1NRYkE9PSIsInZhbHVlIjoiWnFxWmgzcm12ZmtpSi9yMTJYcnFoV2MyQVIrUGdCaG5HVmR1cXE3d2JUclZ2Mk91dFdZV2xOem5hOUUwK3NqNGxRVUxPOHVLZkluUWh1Nk9UdmtFd3hYZld3b2FES2xjS3kvakFVVjlLb1cwUW94eEUyeWpBY3hVaGw4YzVhWHgiLCJtYWMiOiIyYTVkY2IzNGZiZDI1ZjhmNjFhNTlkZjMzMWE4ZjI2ZTRkZTY3Y2ViZGM3OTJmOTZmYzAzZTZmODIwZTFmMzY5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 3, NULL, NULL, '2024-05-10 09:45:44', '2024-05-10 09:45:44'),
(142, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/zaya', 'http://192.168.15.214/rli-bagisto/public/extraordinary?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/extraordinary?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6IkdzNHgzWVFTOXIrQm9DRlN4S2RPYnc9PSIsInZhbHVlIjoiMSt6Z3k2bTUwamxZWXhabzFaOVNyazJmeWdFZWdHTmsrOElVQlVaZ3ZWMjBlQVhCTXBlUURxeWxmakF1eFJYMTBkVkszTHFvZjJJVHRaUy9pc21TV3FQNXErOE1tU2hvODFIcEZVRTF4Y1BiWHg3TW5OajlvaUR0Q3ZVMGpvcjQiLCJtYWMiOiI1NTc2M2MwMzc0MTRlYmUzZWNlYTdkN2M0Y2NhOTQzMGY4Yjg5MmM0ZjgyOWI1ZWVlYzExYjZmNzk0ZTc0OGZlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImpZbjFPQmFTRFFzTk0zMWRTT3d5VUE9PSIsInZhbHVlIjoiODRFZVZZWUlMOHJ5VVFaajFWV2lBTnRmQTM5dFlpa1RNek1Yc2lPbURHenYxS1A2UndyNGF1ZXd4REx4WGNRQXFpTkUvdWxaZDZHTU5wV045NkczekVMaHNQb1QwaHk5S01IYlhUeHRZbkVDclVSbVpLTWVXTVBRZVJjQkloZjAiLCJtYWMiOiIzMGU0YTRjMDU5NDdkNWUxNjU2NDlkMDQxZmU2YzY4YWMxNDA1ODJhZjZjNzA0YTIzMmYwNDQzMTM4YzllMTJiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 9, NULL, NULL, '2024-05-10 09:45:45', '2024-05-10 09:45:45'),
(143, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya', 'http://192.168.15.214/rli-bagisto/public/zaya?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/zaya?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6IkdUbVNJWUJwd0phSWhwRUxBZ2tDQkE9PSIsInZhbHVlIjoiUEFtbi9JWk1PcmtJeTN3NU1Zc2hrL2pYRlJBK3gwR3VKTXhqR0V5RXNtei9hQmhhVnpEcTlVc2cxWXVRMFkrbjFpdlBiM3Y2R0RPMlFVd1BpYjBIVFNlSmNwRDc1L0hKekhnRzFaS1BiYS92Tm1vbnAxVmpwODJNV2pWdHp3TXUiLCJtYWMiOiJkNzNiY2EzMTlkM2FkNDU3YjBmZjg5YTUzYWJhMDg1ODE2YzBhNWFjNzExMGNjMWE1MjZmYzdkOGJmYmU1Y2M2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkZBdmxnUU1YMk5wd0NBLytSeUpWekE9PSIsInZhbHVlIjoiNW5zWWs1MUFHcXBmM1h3SzV5a3g0bXFaR01DdGlNN3g4NENnbjZ5alJFcDBPREQxb1BXQUdKb1V2RjRDYXNEd0NFUGpmaXpRaGZIN0wzYy9GS2drZW5yMzdEWENwVkxNNERxSHpJUzJDZmk5bTRaY2ZBdnY5WkhSSEs4RHJ3RjAiLCJtYWMiOiIwMjhmYWI1NmM1YTU3OWRkYmVhYjllOWQ2NDMxZTQyMmNhMTUwMTQyYzA5OTRmZWZjYjkwMDZmMTY1YzYwNGMyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 8, NULL, NULL, '2024-05-10 09:45:45', '2024-05-10 09:45:45'),
(144, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/checkout/ekyc/agapeya-towns-hopefull-green-slant/47', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/checkout\\/ekyc\\/agapeya-towns-hopefull-green-slant\\/47\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6IlNFYjBBUHB1VmtiRGZLa1U0NG9iNWc9PSIsInZhbHVlIjoiSStDWk16R1dMcC83OG5Ld2prTFFpb1pKTXVHRVlxVmYveER0MmF1d2Zia1BsYlhybFdaL2o1b3VNVU9tWFVRVEpyUGxYNWp1Mk1jZEVXMythaXpNZGh0UHNZMTk3QVhiVDE3NTlwNkdkRGN3ejZSY1VXVVNlRTVYZUtQbCtleEgiLCJtYWMiOiIwNDIyZGEwYTU1ZmI4YWI4ZDc2ZjVkMzljZTM3NWNlYWEyYWYzNGNjYTM5MWZjMTcwYmI2NDNlODMwOWQ4NmQ5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkRTbUt0TXorWXBXZ2FKdFlSYjVNRXc9PSIsInZhbHVlIjoiUExYRHVxclN2a3BabG1kYkI4bi9Kdy9xcXhiSTE2Q3dadVhJczB0NHpWWjFtNWl2SlUvdi8zRy82eUJyb1NRdU0xN1NaVDhLY3I5aDQ2NUJ2U29VMDhBNGh1c1NGOUFmSlJqdE8yWHFVWmlhTExWM1hicHJzMU9yNEZ4WXp2RWwiLCJtYWMiOiI5MGY4NWQwNzMwYzM2MzI4YTg5ODFjMDkwYjRiOWE0NjdhMjZjODg0MDNhMTViZTg5MGZiZDcyMjU5ZDBjMWRlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-05-10 09:45:45', '2024-05-10 09:45:45'),
(145, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/extraordinary', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6IkRGdWNJQkhrMytEbXJyNzZLZ0kyRnc9PSIsInZhbHVlIjoieHZ0a0sxSUJiTEFTYW9SeGowVTZFM3dXTGczYVQxeXFuSVk2Vm53cXRQaFpYeFRSSmxoMUNyOHFBN2pXYUphQVJzK3ZTdlFpNVNqckRlek82WHpERTBETzg1TTYzTlU2R2hCUlArZXN3ODRxM2FKcFB1UkFtdGRnNjlURjVWRlciLCJtYWMiOiI0ZmU4MjkxNTBlZGFlMGQ2YjFiZGNlYzE4NDg3YTI1YTljNjM4OGQ1YmUwNzUyMmQ5MmMwYjMxNWE1YWEwNzc3IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Inc0ZEk0MEl5WER4U3Y1SUVhV1lPckE9PSIsInZhbHVlIjoiZ0dKbWEvL3o0VzR6SWJuVGZqd2NDc0tWVVliZ1RuRU9TNnlPWnN5dFNhSHZFa2dQV00rOUxOTG1sNTZTOGNuS0hnc0h1U05rREM1RUhKbk0yV1ZmZGs0bFJGaEZkRXRlVjJzNTBTRS9sRDNjS1ZrVXY0WlFwcnJDQUh3elZCdjgiLCJtYWMiOiJmNWFkYTEzNDQyZmI3YTI1YjRlMzdjOWEwNzA2MTlhZDc2ZWIzZTQxZTY3ZjMxYzkwYjM2ZWI0ZDgwODJlZTcwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 4, 'Webkul\\Customer\\Models\\Customer', 4, '2024-05-10 09:45:45', '2024-05-10 09:45:45'),
(146, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/[%7B%7D]', 'http://192.168.15.214/rli-bagisto/public/customer/account/news-updates', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/account\\/news-updates\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; _gid=GA1.1.773724285.1714976686; XSRF-TOKEN=eyJpdiI6InJ6TE9lbHNVc3hPSjkvYThvOFNmNHc9PSIsInZhbHVlIjoiZGxFZGQyQzB4WXJabms1eWJ4ai9RR2JZUWwwSkIvQ2R1Tm8wL0ZQQkRlcjdxRU9PR3VNOTVBK3lLZ3VXdTUySFVDcHJkZllFU3o0aTh6VDRkYXdDcDVCQkJMNHVKY2x2U3BSWHkrZVRuN2FNVm91aW5kd3EzZ1RETnBOQ2hYN0EiLCJtYWMiOiIwZGU2MjM2MDlmMzM2YWQzNmVjMDFkZDY5OGMyNjhlNDljOGMxYjE0YjMzMzEzYThhOWMxMGQ1N2JiZmRjNjQ2IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InRld0RBdWoyZzNQOFEvQ21mMFl5SHc9PSIsInZhbHVlIjoiQ25hNEluNGRFZVZvUndWNzNyVThXbVd3UFcyOFU5Z0kvZnVZazlXNmlPM2ZjUG9IMDFCVEVBRG9MQVEzQ2cxazVEY3hneGJLV0tXbDRjQzZicVJ4ZmtYTzJJd29ZalV3Z0swK1hqN2UwaDl4RCtxNElLSWNoVStqSmsyY1paQkMiLCJtYWMiOiI1MzNlZjYzNWNhM2Q1N2RmZTg5NWMxMzAzOTZjZjU3ZDljZmM0NzY1NGRlM2VjYWFiMmZjNzhiYjNmNTAxZGM1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:47', '2024-05-10 09:45:47'),
(147, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/everyhome', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (Linux; Android 6.0; Nexus 5 Build\\/MRA58N) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Mobile Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=1; XSRF-TOKEN=eyJpdiI6ImRveEdXNWFidnphdkt0YmM3NjR3R1E9PSIsInZhbHVlIjoiNjBOZkY3Rit3RTczeWNCUmtYdlJEZm1KclVOaTNqQ3ZCVUJNdW1MTlZIWVNlVWJwa2cxNWVsc0YzUExldWV5SzBxWmZlWW5WWTNMZ3FZc3JzaEZVSTVhRlcxQm5IcGNJRS9sRFREUUx5dnM5VTZTc1J3TVoybTN5M1VmMm02eEkiLCJtYWMiOiI2Mzk1MTZiNzk5NDZkNWEyNzM4ZWFkY2Y3MzIzNTA2MzMwNDg1OWNmYzZmYWUwMTZiMjRlN2I4YTZiYmYwYTRiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IndxQ2JvaWVYQ0thQjVzU0FNa2x4Qnc9PSIsInZhbHVlIjoiVDhLVmQ0eFpTL0h1d0ZzQ1Z0RktSWXNhbDFKQkt2ck5wdHVDU01ZWng1V3o0OGpZTHVvZTVvbEJnck9nQnI5N2RwdE0vTVgva0J3TDExZ1A4RHRlS2JUVWsrUGhyZVk2b0VnYzllTXI0RXR5WkNCSUxBREJlVXRYYW9FMUFmN04iLCJtYWMiOiIxNTA2ZjA5NTBmN2ViNWM3YzQzNTlmMzgyNzc3ZWY2YzVkNzUzNmM2MjIxODY1NTgzYTQ5ZGE1YzAyZDBjYmE1IiwidGFnIjoiIn0%3D\"]}', 'Nexus', 'AndroidOS', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 3, 'Webkul\\Customer\\Models\\Customer', 2, '2024-05-10 09:45:50', '2024-05-10 09:45:50'),
(148, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/313/dVgb6h5xFbOmE11mLrsEwp0lhzh4ftCWUgdomPV5.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkorZ3FkUitLRDRQdnBzOE12Syt1d1E9PSIsInZhbHVlIjoibXNwSUx2bjNEd3NwUnlPa0FUdGswcGFGN0FKeHJoTFFXKy9iWWUyQnhSVXpnemkyeGs5TXgrbTRXSmRJaVFlZGZ6VHV0R2crVnlLYUZBUTRHWUdSSGp3d3dCbzZodEJldVFDWmg5aFFMeVNwQmgwU0tDalMzUXpWblB0SDk1MUciLCJtYWMiOiI0NDE5OGEyM2E5MWFlMzlhNGU2YzRhNmYwZjgwNDFjYmMwM2U0ZjJmZTQzNjFkNzhmNTEyNGVlOGU1NTY2ZDZmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjM0aG5qRjI3QitUVlFKUDZ1QzFuckE9PSIsInZhbHVlIjoiMnFEUUcwWmQvaDdtTXpCaUoxbTlDYWMwK0JQL0M3NlhGckViS3FRVmh4ZWVydEZKbmFJTnlmMGlWK2c2MGZCa21MdEJmMGtsOGxiYUtEUUMrczMyODV6T1BkeGFlNlVITGRFYlhQNEI5UW9MQVFYSDZKc1FQRDJOaDRSNGdGTEQiLCJtYWMiOiJhNTU5Yzk0ZWU5NzYzYjY2NWVjNWQ3ZWYyMzdjNGQ3YWZjMjM2NTEyYjk3OTUzNzIzNzQ0YjMyZTFjMGU0Nzg5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:58', '2024-05-10 12:07:58'),
(149, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/314/OS1PYRZwa402EQnlEioLUsw3A2jZdRUIUhFWKiT8.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkorZ3FkUitLRDRQdnBzOE12Syt1d1E9PSIsInZhbHVlIjoibXNwSUx2bjNEd3NwUnlPa0FUdGswcGFGN0FKeHJoTFFXKy9iWWUyQnhSVXpnemkyeGs5TXgrbTRXSmRJaVFlZGZ6VHV0R2crVnlLYUZBUTRHWUdSSGp3d3dCbzZodEJldVFDWmg5aFFMeVNwQmgwU0tDalMzUXpWblB0SDk1MUciLCJtYWMiOiI0NDE5OGEyM2E5MWFlMzlhNGU2YzRhNmYwZjgwNDFjYmMwM2U0ZjJmZTQzNjFkNzhmNTEyNGVlOGU1NTY2ZDZmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjM0aG5qRjI3QitUVlFKUDZ1QzFuckE9PSIsInZhbHVlIjoiMnFEUUcwWmQvaDdtTXpCaUoxbTlDYWMwK0JQL0M3NlhGckViS3FRVmh4ZWVydEZKbmFJTnlmMGlWK2c2MGZCa21MdEJmMGtsOGxiYUtEUUMrczMyODV6T1BkeGFlNlVITGRFYlhQNEI5UW9MQVFYSDZKc1FQRDJOaDRSNGdGTEQiLCJtYWMiOiJhNTU5Yzk0ZWU5NzYzYjY2NWVjNWQ3ZWYyMzdjNGQ3YWZjMjM2NTEyYjk3OTUzNzIzNzQ0YjMyZTFjMGU0Nzg5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:58', '2024-05-10 12:07:58'),
(150, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/315/EKX8OrdXk71gC86bwmVWPCrVDS4qfL9A6lpOoPeV.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkorZ3FkUitLRDRQdnBzOE12Syt1d1E9PSIsInZhbHVlIjoibXNwSUx2bjNEd3NwUnlPa0FUdGswcGFGN0FKeHJoTFFXKy9iWWUyQnhSVXpnemkyeGs5TXgrbTRXSmRJaVFlZGZ6VHV0R2crVnlLYUZBUTRHWUdSSGp3d3dCbzZodEJldVFDWmg5aFFMeVNwQmgwU0tDalMzUXpWblB0SDk1MUciLCJtYWMiOiI0NDE5OGEyM2E5MWFlMzlhNGU2YzRhNmYwZjgwNDFjYmMwM2U0ZjJmZTQzNjFkNzhmNTEyNGVlOGU1NTY2ZDZmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjM0aG5qRjI3QitUVlFKUDZ1QzFuckE9PSIsInZhbHVlIjoiMnFEUUcwWmQvaDdtTXpCaUoxbTlDYWMwK0JQL0M3NlhGckViS3FRVmh4ZWVydEZKbmFJTnlmMGlWK2c2MGZCa21MdEJmMGtsOGxiYUtEUUMrczMyODV6T1BkeGFlNlVITGRFYlhQNEI5UW9MQVFYSDZKc1FQRDJOaDRSNGdGTEQiLCJtYWMiOiJhNTU5Yzk0ZWU5NzYzYjY2NWVjNWQ3ZWYyMzdjNGQ3YWZjMjM2NTEyYjk3OTUzNzIzNzQ0YjMyZTFjMGU0Nzg5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:58', '2024-05-10 12:07:58'),
(151, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/312/aEHRnUUOSUgNyluUdJRlzJTx6twEW8puIKO6OXZg.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6Im5qa0M1aC9LN1BESVQxZkdJd0dCNHc9PSIsInZhbHVlIjoieG4zR3N2b1ZzK0E0V3R0WGFLSzJGVGkzQTJMcnhKeWNGZFhscjNRNE1Kamc4UGloeTZkVXNJenVBT0NLcHRFdThPb1hSdUhyVTdmeGFmaFp5aWF1TzkyOHYyd0hXdWxadGNkY292MUdnWjNaalRsa0hEYlhMa1ZGR3RMYWtxVzQiLCJtYWMiOiIzNGVlN2E3YWU5NTQyM2Y5ZDAwMzZjNzI4NGFiYzk2ZTNlMjhkYWU3MjdjYzdhNWZlMTdkZDI1YzdjODMyMmVjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Imd1eGxKZ2FCcFBmZk9aUHRWSy9Fd1E9PSIsInZhbHVlIjoiRFZhZ3VqM3hNa2RKWmxSWGZzbVZlMFFGSGpyZkV6Z2orRlRjRmhGaTdmcE9MSzRLWlpTZllJWkUrVzM2RDBySDdOcDBCdDNxMzVQS1FVWkNVNmY3bHRLb0pJTm9VY2pOTjVHYU10ZldtYnh1N0p5SktrelRTVVdHamtsMy9LVWYiLCJtYWMiOiI2NGM2MzM3ZDQwMDZhNzkzN2MxZTI4NWMxY2ExZGI4NWI3OGQ3Yzg1YWViODUyZjQ1ZTA3NDRjMjgwYjFiMGNlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:58', '2024-05-10 12:07:58'),
(152, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/311/WFLILssGJCU3UIP8NE0KcBqcABf4wWRhObePuAQS.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6Ilp6WTUzU0IxYU0xM3lvNVZaTnVmdnc9PSIsInZhbHVlIjoiSFo2cGZlSkREQjY5b0RDNUFiOW8rUFF3ZFNvUkpjdi9VWVMrZXhNNHBJbU5HNVVzREQ1c3UwcHl0d3JOTU1obE9mOHNVaWRwWUtuaGtlSWNWSWhNejcwK2VUUDJZSjRwK3FZNlhlcE05bU9iempQVnZWQTY0MGt6YTBNeXcxRkYiLCJtYWMiOiJkYWJiM2UzNDgwNjE1M2RlMDEzMmQyYzlmZDVjZDNjMzNhOTA5NGY1MzJmYTIzMGI0MWFhOWNiYWQ5NmI2ZTY5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjN4cXhaN0pibkpmUC9iMkwvWEVpT3c9PSIsInZhbHVlIjoiRGRkNkxCbFAyVzN2eDU3OHRlSjlWbUlIemdPK2RDUGg0MmdpZUhmSmExdHlyUmdoS0NrY0JKb0Vqb21jRmV1bUxjRXBzbFA3ZU9wMXZFWVJabFBMZWNXa0ZnUnZuUmtBZjRqQ3NqKzlXeDNCVUNHMTM2K25xMDcxd3pkZmFrZGwiLCJtYWMiOiIyZGQ1YWM4ZjY2MjZlMmZiNGUyMjQzMDM4ZmFlODQ5ODAzZDc2YTMzY2Y5NDEyZjMxNTkxMzZhNjkwMjQ2OTNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(153, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/310/5cIuCWTpIdDmtMjgUzrg2jpA3VFrkS53vDa2VZoz.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6Ilp6WTUzU0IxYU0xM3lvNVZaTnVmdnc9PSIsInZhbHVlIjoiSFo2cGZlSkREQjY5b0RDNUFiOW8rUFF3ZFNvUkpjdi9VWVMrZXhNNHBJbU5HNVVzREQ1c3UwcHl0d3JOTU1obE9mOHNVaWRwWUtuaGtlSWNWSWhNejcwK2VUUDJZSjRwK3FZNlhlcE05bU9iempQVnZWQTY0MGt6YTBNeXcxRkYiLCJtYWMiOiJkYWJiM2UzNDgwNjE1M2RlMDEzMmQyYzlmZDVjZDNjMzNhOTA5NGY1MzJmYTIzMGI0MWFhOWNiYWQ5NmI2ZTY5IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjN4cXhaN0pibkpmUC9iMkwvWEVpT3c9PSIsInZhbHVlIjoiRGRkNkxCbFAyVzN2eDU3OHRlSjlWbUlIemdPK2RDUGg0MmdpZUhmSmExdHlyUmdoS0NrY0JKb0Vqb21jRmV1bUxjRXBzbFA3ZU9wMXZFWVJabFBMZWNXa0ZnUnZuUmtBZjRqQ3NqKzlXeDNCVUNHMTM2K25xMDcxd3pkZmFrZGwiLCJtYWMiOiIyZGQ1YWM4ZjY2MjZlMmZiNGUyMjQzMDM4ZmFlODQ5ODAzZDc2YTMzY2Y5NDEyZjMxNTkxMzZhNjkwMjQ2OTNiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(154, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/309/dUKF4mbWpD9AepuqqfrvLBgIVRP83JXN4IXOV8sV.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6InRNeVEwQkRoaWl4TTNhMCtGbUlqV1E9PSIsInZhbHVlIjoiZ0JpSFhsSjA4ak5BVXJhbmtHbFFrY0RPR3hrcXhNdFFDY1k4NEhCWFBPVVlobDhMWi9XaG44TmM4d2tZRUR0REtqY1kxMWI4VnB4YnV5SWdFK3gvWmU4Ni9SQlZNU2xob1M1enQ5ZDlZOThsMWpTZk5rMG90Tyt0bGhjNkhpZEciLCJtYWMiOiI4OTMyMDhkNDliODBjMjU4MWFjNmU4MjI2ZjBkY2E3MWYyNzc1MGY0ZTUzZTY2YTdkODBkZDM1NDcwNDNlMTMyIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkQwRW5VbWlmeXQ4dkorVVBrckZiK0E9PSIsInZhbHVlIjoic1pZMitsTXlJN1pXbjUrL1p5V1hUTFV4aE9YbVc1bVJRbnhoUDBNV0JzV0Jzck95eEZYaDJlc0k1eDZYUXE2U01ETWtTamJKRzd3Z2xuRVA1UVZkZjFuVzNIekRCZnowTnhpbEFPQ3dMZnNKR285U3JYMlBrM21zQzJPeXRvUnkiLCJtYWMiOiIzYTZmMzYyMjFkZDRmMzYxOTdjMmVmNzliZGZkODgzMjMzYzU3YmZhYzg2MjcwYmViYTRiNjAxYmMxOTcwN2RiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(155, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/308/5p58zWuEBGwVf3kDemznQEGaFRzQUC95Ie1iW3Gk.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6InplUmFxMzYzZHpvMHpMa3lFVlZ2aUE9PSIsInZhbHVlIjoidW94MzZMU1l4QWNKU2k2RXZsZ1FvN1JFNU9aU2M4Mm51eXBGbTlaUFZsbkNBanpiL2cvNGRIbHBYQWZucGxOVlE3bXlEQ1JZZThCYnhrcjVoZEtLdHljNGlhbDg5djhwNDJybzdzQmdyaldhell1aDI0YXlLTWZaRm5icWNwdWwiLCJtYWMiOiIwNjc3MzIzZmMzMmFkN2EzM2Q3MDU4NWJkYWQ2YjdiZjg4NzEwNzZlNjU1NzUwOTNlNGJmNWZjYjRkZmQ5NzNmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjJOaEJXZnZweEY2dkpDYmNjYitYdXc9PSIsInZhbHVlIjoid2R3bDA5QmVRSTNSbjhjUzFDNjZnZk8yNXNLR0VEMzU4VTZzTHRrS1YyQWhNOVdSR212dEpVL3pGbWp0MElFTjgwYk5rdnFmejRVK2JjWUlmTXBKUHhDREM1ekFrVFY1djE4WVh6ZHdHcXoxRkp1VGR0QktzSjMwK3R5dlVPSSsiLCJtYWMiOiJjMjM2NWQyOGMwNjYyYTI2MTkyNjdjMjNlNjE4NjI1NWQ5YTg0NjU1OTUwMTU1NWY5MTFiMjIwYmUzNjQ2N2NkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(156, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/307/MwVY628XwLx5TPTT4rgXD7RvmnnrlPHiHJna8Yw5.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6InplUmFxMzYzZHpvMHpMa3lFVlZ2aUE9PSIsInZhbHVlIjoidW94MzZMU1l4QWNKU2k2RXZsZ1FvN1JFNU9aU2M4Mm51eXBGbTlaUFZsbkNBanpiL2cvNGRIbHBYQWZucGxOVlE3bXlEQ1JZZThCYnhrcjVoZEtLdHljNGlhbDg5djhwNDJybzdzQmdyaldhell1aDI0YXlLTWZaRm5icWNwdWwiLCJtYWMiOiIwNjc3MzIzZmMzMmFkN2EzM2Q3MDU4NWJkYWQ2YjdiZjg4NzEwNzZlNjU1NzUwOTNlNGJmNWZjYjRkZmQ5NzNmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjJOaEJXZnZweEY2dkpDYmNjYitYdXc9PSIsInZhbHVlIjoid2R3bDA5QmVRSTNSbjhjUzFDNjZnZk8yNXNLR0VEMzU4VTZzTHRrS1YyQWhNOVdSR212dEpVL3pGbWp0MElFTjgwYk5rdnFmejRVK2JjWUlmTXBKUHhDREM1ekFrVFY1djE4WVh6ZHdHcXoxRkp1VGR0QktzSjMwK3R5dlVPSSsiLCJtYWMiOiJjMjM2NWQyOGMwNjYyYTI2MTkyNjdjMjNlNjE4NjI1NWQ5YTg0NjU1OTUwMTU1NWY5MTFiMjIwYmUzNjQ2N2NkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(157, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/dJPP1qvqV6oXvGa9g68QeuDAKfcSzRAW0tS2C94B.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkRhVzd4RWhRVDJtWWlTak1IdEp0d0E9PSIsInZhbHVlIjoiLzZxRkJJTHRuaGRGYkdldDBIN1ppOVBOWndHRjVZVUdyd0h4eS9iTkh2SkdONU5yVGc5YW5ra0ZPVkdMMkpEMUN6T1ExUWwvN1dyN051MnhPTWExbEpha3FKbFlDQjRWNjhYMDB4cURmdkpQeFhYQy9TWkNvc0ZOZnZYSTF5TjgiLCJtYWMiOiI4ZTZkZDg5ZmM3N2VlMjMzNGI3ZjUzNGVhNTQ1OTc5ZDkyODc4NGIxZGY0ZjQ5Nzc5ODdjMjUyNmQwYzI1MTBjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjZveWFJSzN1dU45ZXVFcWg1QUNBNlE9PSIsInZhbHVlIjoiWlZwZXdvb0pXY2xVRkFqa3BHc085eWFaUFJ2Sy9DVHRxR0hwdVFIeFE2RmhlamdnblpMN3ZWSmZpczFxTXBoa08vYlJiY2hIbzV1WWNQZFptWW5NQTFsMjA1VWdzN21TcEF3UEphV0s1TU9nS2p1eGhjQjJManV2ZEMraXNNdjUiLCJtYWMiOiIyMzdmOWM1NjM0YmNjNzMzYWM3ZmMzYzdjMTYyMjk3MjkzZWQwNmQ3ZGE3ZWI1YjI4ZmZhYTNhMDAxZDgwYjgxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:07:59', '2024-05-10 12:07:59'),
(158, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/s1ODkHd6X6RHVdMHboY1EqSwmZRXkHKXK5fLPzDR.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkgzbmZRTkVJcEFoN21nZXZRTkRjQmc9PSIsInZhbHVlIjoidENXMEF0Wk9VVUZFeW4rSWZub2NDeGMxVE54VHgzVG1DOTl0MTZjbzJrSWZmb3NqYVp3M1ZWbEMzM2podzFZTVpRRDF3Y1gvR1lRQVFXcDVhZGZLZkJRYkF2aXVQdkZ5Lzl4NHMxdnF4bUM5eVJGMDdUcGVLcHRPRzhPZndRMzIiLCJtYWMiOiJiMjg5ZmUzZTdlOTA1MzllZDkwZjkzOGRjMTUzYjdhNmQ1YjUxMjUzYTE0YzM1MDBiZDBjODQ2N2VkNmI5ZDljIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlAvZklDdEJDbEJ6alRsdHpzckFqeUE9PSIsInZhbHVlIjoiazF3K0l5ZUFCRGk0Zm5uZjc5aG5BeFYya0l0bTBVeHA3b1BvV1VDQVFUa1FhNkJkdUY3TjZTRnJTdXdPOWtYL1pocUVJYUFDL1JlV3dxb0RENEZ5UEpCY1FlUVVFcWFFMHdBSHZ0dGFwaThlRzJCOVNWQ1hJWGh2bzB2QTdYaEUiLCJtYWMiOiI5Njk4MDg1YWY1ZmZkMDFkNDU0MDIzNzBjMTFhODZiODM1Yzk4MWNiNWI3MjNkMDIzYzdhNmU2ZjU3YTZlYTc2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:06', '2024-05-10 12:08:06'),
(159, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/P3PmHwyPlIvjmoypnTGjtZD9V5Q7MGNALhfZsEL0.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkgzbmZRTkVJcEFoN21nZXZRTkRjQmc9PSIsInZhbHVlIjoidENXMEF0Wk9VVUZFeW4rSWZub2NDeGMxVE54VHgzVG1DOTl0MTZjbzJrSWZmb3NqYVp3M1ZWbEMzM2podzFZTVpRRDF3Y1gvR1lRQVFXcDVhZGZLZkJRYkF2aXVQdkZ5Lzl4NHMxdnF4bUM5eVJGMDdUcGVLcHRPRzhPZndRMzIiLCJtYWMiOiJiMjg5ZmUzZTdlOTA1MzllZDkwZjkzOGRjMTUzYjdhNmQ1YjUxMjUzYTE0YzM1MDBiZDBjODQ2N2VkNmI5ZDljIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlAvZklDdEJDbEJ6alRsdHpzckFqeUE9PSIsInZhbHVlIjoiazF3K0l5ZUFCRGk0Zm5uZjc5aG5BeFYya0l0bTBVeHA3b1BvV1VDQVFUa1FhNkJkdUY3TjZTRnJTdXdPOWtYL1pocUVJYUFDL1JlV3dxb0RENEZ5UEpCY1FlUVVFcWFFMHdBSHZ0dGFwaThlRzJCOVNWQ1hJWGh2bzB2QTdYaEUiLCJtYWMiOiI5Njk4MDg1YWY1ZmZkMDFkNDU0MDIzNzBjMTFhODZiODM1Yzk4MWNiNWI3MjNkMDIzYzdhNmU2ZjU3YTZlYTc2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:06', '2024-05-10 12:08:06'),
(160, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/C9GKb4bTOgoVnVOoMrxLv3U1SQsUzbJno6KIW07o.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6ImhtRzg0NzIzdGUxZExvRCtsa1ZReXc9PSIsInZhbHVlIjoiWkFxZzRRaU0xams3WE9FMnBLNkx6ZFZKZHdRMi9VN09keGlvWmQzNEdWZkxMNE9mVWpzYVdLT20xY254dmxNY0JLZUZDK1JtdHJRdGxxTlVCUkdzSitOZ0tUd1dNbU0zWkdnMW8weGQ3Um03Wmx2MGJNcGtXMmNuaEM2TWlpMU0iLCJtYWMiOiJmYWI2YTczZWE0N2Y0MzUzN2EwNTE2ZmI4NmYwOWUyYmUwNmZiNjhmOTM0NzFhYmI1MjIyNmMyZWJkMDJhZWRlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjBzTSswekEwc3pjSDRDTnd5SllTZ1E9PSIsInZhbHVlIjoibGZNbmFuQkE1UHNyN0NPWjYramJWWU00eWo1OFFsUUxhNUdTQXEybXo3YUozYUhiMldpVGt1dUcxeTE0MUN3bjRUZEsxVkpuR3NuU1BEcnhuTkcrQlNNWFdLNFc1YlIveXdWRVpNakN1T1h6N0hSM2Y4THREWFZUMDVIalFLeU0iLCJtYWMiOiJiNTEwOTc2ZmVjZmIwZmFiYWE2YjdiODcyZjVlYzFhMTc5NmU5NzBmZmFmY2VmNWYxMjE0YzhkMjNlYjFhNDlhIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:07', '2024-05-10 12:08:07'),
(161, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/xSSUEWDZX6yC1S2IFExIimqpr2um5q7KRTign5jL.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkgzbmZRTkVJcEFoN21nZXZRTkRjQmc9PSIsInZhbHVlIjoidENXMEF0Wk9VVUZFeW4rSWZub2NDeGMxVE54VHgzVG1DOTl0MTZjbzJrSWZmb3NqYVp3M1ZWbEMzM2podzFZTVpRRDF3Y1gvR1lRQVFXcDVhZGZLZkJRYkF2aXVQdkZ5Lzl4NHMxdnF4bUM5eVJGMDdUcGVLcHRPRzhPZndRMzIiLCJtYWMiOiJiMjg5ZmUzZTdlOTA1MzllZDkwZjkzOGRjMTUzYjdhNmQ1YjUxMjUzYTE0YzM1MDBiZDBjODQ2N2VkNmI5ZDljIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IlAvZklDdEJDbEJ6alRsdHpzckFqeUE9PSIsInZhbHVlIjoiazF3K0l5ZUFCRGk0Zm5uZjc5aG5BeFYya0l0bTBVeHA3b1BvV1VDQVFUa1FhNkJkdUY3TjZTRnJTdXdPOWtYL1pocUVJYUFDL1JlV3dxb0RENEZ5UEpCY1FlUVVFcWFFMHdBSHZ0dGFwaThlRzJCOVNWQ1hJWGh2bzB2QTdYaEUiLCJtYWMiOiI5Njk4MDg1YWY1ZmZkMDFkNDU0MDIzNzBjMTFhODZiODM1Yzk4MWNiNWI3MjNkMDIzYzdhNmU2ZjU3YTZlYTc2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:07', '2024-05-10 12:08:07'),
(162, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/XT221nRTbestH4idYZBK2rsU7mV8UvAgJQsj0UKS.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkxUd2R1WWFmUUVOY2ltcFRzTWdvdEE9PSIsInZhbHVlIjoidmNUbUlmLzJiT1drUWc0YkUxb1VDNHNJQ1dJdGNOOWlzNGwxaXZObmxoQzc1L2pkVUVLNDI2SlZyOU4vRytBUWl0T3BzV2p3Q1ZyMmc1b2R2OFhLSW8ydDRiM1kwQndmdnJQczJDWG5NalFKNTFNcjgzQkFnNG9MMUpTZHJvZVUiLCJtYWMiOiJhZDcwOWI2MTVlZDdkY2Q2MmM1NmYwOTE0YWU4YjBhYWFhZjFkZDk0YWE5MjhkYjk1NWIxZGFlZjg4ODUyMTQ0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjVLNCtsTkF5UTR2Q3RiNmtCRmQ4a3c9PSIsInZhbHVlIjoiaTVWQjkzc0dkQ3hiSEtxejdFaUxoYkVydC9XRnZ5bnFvelNqc0gzTzhkZDFycmhtTkY5SzlEY09MT2Z3MlFhbFE0SVZvZUd4V0wzVW1RY1RBcUFKUzdFcXpidnpQeE4xdTJWV1hEaFduY2ZQVkZ5a3A0QldtSW12emtoemsrWEYiLCJtYWMiOiJiMDVmZDM0MDg2NzA2YjdjYzIyMmFhNDc0NjU2YjY5YzcxOTZiOTQ2N2Q3ODkwMmMwNDMyZGZmZjFlY2MyMTg3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:07', '2024-05-10 12:08:07'),
(163, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/uOUj1i2fWDtT9HlEZHH3rle6sa9LvHK4zmxKE4WD.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkxUd2R1WWFmUUVOY2ltcFRzTWdvdEE9PSIsInZhbHVlIjoidmNUbUlmLzJiT1drUWc0YkUxb1VDNHNJQ1dJdGNOOWlzNGwxaXZObmxoQzc1L2pkVUVLNDI2SlZyOU4vRytBUWl0T3BzV2p3Q1ZyMmc1b2R2OFhLSW8ydDRiM1kwQndmdnJQczJDWG5NalFKNTFNcjgzQkFnNG9MMUpTZHJvZVUiLCJtYWMiOiJhZDcwOWI2MTVlZDdkY2Q2MmM1NmYwOTE0YWU4YjBhYWFhZjFkZDk0YWE5MjhkYjk1NWIxZGFlZjg4ODUyMTQ0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjVLNCtsTkF5UTR2Q3RiNmtCRmQ4a3c9PSIsInZhbHVlIjoiaTVWQjkzc0dkQ3hiSEtxejdFaUxoYkVydC9XRnZ5bnFvelNqc0gzTzhkZDFycmhtTkY5SzlEY09MT2Z3MlFhbFE0SVZvZUd4V0wzVW1RY1RBcUFKUzdFcXpidnpQeE4xdTJWV1hEaFduY2ZQVkZ5a3A0QldtSW12emtoemsrWEYiLCJtYWMiOiJiMDVmZDM0MDg2NzA2YjdjYzIyMmFhNDc0NjU2YjY5YzcxOTZiOTQ2N2Q3ODkwMmMwNDMyZGZmZjFlY2MyMTg3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:07', '2024-05-10 12:08:07'),
(164, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/HcLqGzh7sPOqYk3hLNRBo5ESeWwH00FTlSpuamay.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkxUd2R1WWFmUUVOY2ltcFRzTWdvdEE9PSIsInZhbHVlIjoidmNUbUlmLzJiT1drUWc0YkUxb1VDNHNJQ1dJdGNOOWlzNGwxaXZObmxoQzc1L2pkVUVLNDI2SlZyOU4vRytBUWl0T3BzV2p3Q1ZyMmc1b2R2OFhLSW8ydDRiM1kwQndmdnJQczJDWG5NalFKNTFNcjgzQkFnNG9MMUpTZHJvZVUiLCJtYWMiOiJhZDcwOWI2MTVlZDdkY2Q2MmM1NmYwOTE0YWU4YjBhYWFhZjFkZDk0YWE5MjhkYjk1NWIxZGFlZjg4ODUyMTQ0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjVLNCtsTkF5UTR2Q3RiNmtCRmQ4a3c9PSIsInZhbHVlIjoiaTVWQjkzc0dkQ3hiSEtxejdFaUxoYkVydC9XRnZ5bnFvelNqc0gzTzhkZDFycmhtTkY5SzlEY09MT2Z3MlFhbFE0SVZvZUd4V0wzVW1RY1RBcUFKUzdFcXpidnpQeE4xdTJWV1hEaFduY2ZQVkZ5a3A0QldtSW12emtoemsrWEYiLCJtYWMiOiJiMDVmZDM0MDg2NzA2YjdjYzIyMmFhNDc0NjU2YjY5YzcxOTZiOTQ2N2Q3ODkwMmMwNDMyZGZmZjFlY2MyMTg3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:07', '2024-05-10 12:08:07'),
(165, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/LOVuzS06wpYAFCKfn3N1RTneQRw8WyHPGi3TJNYU.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6ImticTJkQkVWRDZFYmxQditUOXJjeHc9PSIsInZhbHVlIjoiR1EzdTJsbndEbExOa0ZGdllNbzl5OHJkLzk4Y0l0SUZNUHN4eGRTQkR0L2lkbmhxNHd6alc2MEZMc21YOEJ2Y0psQlM1NEhxQXAweWhNZlFadVBoSDN4MytQZUMxNWRQZWF2LzJ3UkJKTFJtTFNHMlRFNnZEWDZ0K1pZZ3ZDY1MiLCJtYWMiOiJlNzk2ODUyMzBmNDhkM2MxMGViMzNkYThiMWVhODNiN2JhNDFkYWRmMjAxZDNlOTliODRkM2MxMmYxNDg4YTBhIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjNYZ0h2cjhNeGJKUmkwc1JiQzd5a0E9PSIsInZhbHVlIjoiUVBXSGhxRTlxZ1Y4cktUWDFnUFMwcVZIMHZQSkl5UElPbUxJMFRvUnVvQzBlTUVRbStTTGE3SVYyOHR6Sm90UkdzQjBDMno1Z3IrY2pNNlc2S1orbVo1NzJKQ0dsYXQ2MXh6aEd6amljcm1xS0ZkNlUrVG4yZkF3YzI5Ukg1VWEiLCJtYWMiOiI4YjMzYzhiNTQ2NDg5MTVhMGIzMGMzYjFmNTAwYzFjODg0ZTUyNzlmNzM0NTgyYmRlODBjNTkwZjVjZTdkNGZkIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:08', '2024-05-10 12:08:08'),
(166, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/306/bIDWR553mnuRlAduozIbRZ5MRtviEpFZH7H6fAkf.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/306', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/306\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IlRabVBoUm4xKy8rbWp3ZFpXMkpmY2c9PSIsInZhbHVlIjoiQ3lNKzFBOWlmS3hialA5M1VVQ01LbGdWaVQvODFlRVM0N3VlMUN1ckxMMkNMNDZKRjVKVkNmdVdZMGErT0JTTkorNE80RzhMWVQwbDRGaDdmLzlsTWR3bytKZ1hvV1pMaWRWU2RZV0JWOHczemNURG0wczZobG1FaFRZMGh6cloiLCJtYWMiOiI2MzE2NmM3MzhkMTdjNjRiMmE1NTZkMzFjMDU3YTlkZDcxOWJjMTU1ODg4MGU5Mzg1NDA2MGIxMjFkMzFmYmEwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InRRZFVPd3I0NU11ZG90N3hndEh6aFE9PSIsInZhbHVlIjoiaU5XVXlEZy9EWnF6UUM5dzlWanFXbUhoNGNhUDlOS2lJYmh0VXJpbS9aMGE3ZkI5RXJYWVlCSXV4c0RjenA5NEMxSHZ4UFRXZUtabDF5SjA5aTNrRVR0dWNyLy9Vc2lMYVJMMTFFdnVIbmhFdUtRVWMvQ0owSUYyRXFlYm96SCsiLCJtYWMiOiI0YTgzZjk3NjRhMDk4MWM1NjNhODFkNDMzY2Q1Nzg2MjI4NjhlNjc1NGE2N2JhYmE3Njk2ZmJiNDMyZTkwZWE3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:08:08', '2024-05-10 12:08:08'),
(167, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/302/c9yHJD7FRfa5hgFqO4nL4BzHxk5ZXzafaYmayV5v.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:11', '2024-05-10 12:09:11'),
(168, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/304/iQ6RgUbknEzYy5vrvWJwrbmpS23jcxKcWcBPGG7D.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:11', '2024-05-10 12:09:11');
INSERT INTO `visits` (`id`, `method`, `request`, `url`, `referer`, `languages`, `useragent`, `headers`, `device`, `platform`, `browser`, `ip`, `visitable_type`, `visitable_id`, `visitor_type`, `visitor_id`, `created_at`, `updated_at`) VALUES
(169, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/303/QuxJjKf43bN1Qkwkqt1ZNknorbXfam3jam7NYi0s.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:11', '2024-05-10 12:09:11'),
(170, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/305/4R7TiI1LToM15y67hplA3PZau0GAhj1SCA9edJGp.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:11', '2024-05-10 12:09:11'),
(171, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/301/D0gVrqKVA5KtUvX4s1tHIveMd1kEHJjYUWINqabo.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:12', '2024-05-10 12:09:12'),
(172, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/300/aWqykBbliuiIo5St7TClYe8wwkQT76IUtN18fMmd.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkFNOXVFR0FiNHRZejRNOU9rZVFMR2c9PSIsInZhbHVlIjoiditCL2RzSDh0Z3pPLzFWcXBta0lGRzlrb3BpYitRVU1lY0dCRnJkWUcyd0lCZlhObG50RFpFMmZCbUR5eW5wOGM0K3hNam85dHQ0L0xTVU5VSm92THM5QWNrNlZVc2RtbSswRHRKU3l6N0hVbmRMUnRISUlhR1d1RlZ4L2J5ekwiLCJtYWMiOiIyZjdmYjc4MTU2ODhmOWI1YWQ4M2UzNmI5NTlkYTA3MmM0ZTlkODc3YjU0NWY1NmNkOGM1YTk3NzcwYmVmNzMwIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlQeXVWZ1hlK1VjQWVDdTVwTnRWa1E9PSIsInZhbHVlIjoiU3hQME56RkVad0pKY0RuZzNNR3g5bE1KNzh6M3JPRTBYend1dFc1eW1jOUR6WU4xTy9kbGNiWVJrelhjLzY3ZXZFa011U3ROWTY3L3RPdU5nR0czMmgvWm9RbGJrajVnNUc3T2xkVEV5Njk2Z1pTclptMHhSRi96QnVVcld3c0oiLCJtYWMiOiJiMGYyYTgzZGFiOWIxZGRiYzQxMzc3YTI1MzY3ZGE3NDM4NjY4YjU2MjRhY2FhNjg1YTZkYTcwZWI1YWVmYzNmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:09:12', '2024-05-10 12:09:12'),
(173, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/359/ZKqqDnqexfw9obVVCs6hE7aKpq0zzyyMH8Ftm7XB.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IlNXVEVHeWZQWjQ2cWVLZmkwenZ0WWc9PSIsInZhbHVlIjoiWTFtdVlOOTh3M3oxbnRKQ3NVSThNay84QXU4UzF3RFVmVnNhOTk4SXBMc2xRVHlhY0dBQnpDUEFvS0VhZGNES0VFWVZlUHFuaEgxdTJ4eWVqQjBGNCtjN2RnamtyUlZIQ0JIVy9lMHhWZWoxZzMvaDhIWFJESG50cXdMT1diTUMiLCJtYWMiOiI4NWU4MzNlMDFjMDAzZDNmNDMwMDA3OTVlYzc2MjQzNjI2MjQ3ZDk2ZDUwNzdjMTdjODdhOGI1MzNkYTc3OTViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImJDRjFHWUNnWXZOYjA5Wmt2cEJtS1E9PSIsInZhbHVlIjoiR3JWYWNXeU5jVzFtV3djVXhHblBhRjJ3S1llVVRaTHp5Q0dSL3NsZDc1dDc4N25mZTd2c2dyUEV5U2ZaclNtWXNYbDdKU1V5Sk0vT2JLNDBNbDA3MGpYM1BWSHNBKzhxaElSeVd6alVOUlFJcGdQZ2cyTVNwLzFaZ3QvazVwODEiLCJtYWMiOiIzYjViYjNjZjRkOTc1ODg1MzM5NDRjZmI5OWIxN2JkZDc1MGZjYzZhYTIyZWI0NjczZDRmNzA3YWY0MWQwM2QwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:19:46', '2024-05-10 12:19:46'),
(174, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/358/vMtIo9EmxCXIg3MVPHHchxxYUmlHILsa7FkrwDpW.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IlNXVEVHeWZQWjQ2cWVLZmkwenZ0WWc9PSIsInZhbHVlIjoiWTFtdVlOOTh3M3oxbnRKQ3NVSThNay84QXU4UzF3RFVmVnNhOTk4SXBMc2xRVHlhY0dBQnpDUEFvS0VhZGNES0VFWVZlUHFuaEgxdTJ4eWVqQjBGNCtjN2RnamtyUlZIQ0JIVy9lMHhWZWoxZzMvaDhIWFJESG50cXdMT1diTUMiLCJtYWMiOiI4NWU4MzNlMDFjMDAzZDNmNDMwMDA3OTVlYzc2MjQzNjI2MjQ3ZDk2ZDUwNzdjMTdjODdhOGI1MzNkYTc3OTViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImJDRjFHWUNnWXZOYjA5Wmt2cEJtS1E9PSIsInZhbHVlIjoiR3JWYWNXeU5jVzFtV3djVXhHblBhRjJ3S1llVVRaTHp5Q0dSL3NsZDc1dDc4N25mZTd2c2dyUEV5U2ZaclNtWXNYbDdKU1V5Sk0vT2JLNDBNbDA3MGpYM1BWSHNBKzhxaElSeVd6alVOUlFJcGdQZ2cyTVNwLzFaZ3QvazVwODEiLCJtYWMiOiIzYjViYjNjZjRkOTc1ODg1MzM5NDRjZmI5OWIxN2JkZDc1MGZjYzZhYTIyZWI0NjczZDRmNzA3YWY0MWQwM2QwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:19:46', '2024-05-10 12:19:46'),
(175, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/356/5Pfu50fZjkVhM6l2wr11qlYZ9d9r0Aa9DiATTBSt.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IlNXVEVHeWZQWjQ2cWVLZmkwenZ0WWc9PSIsInZhbHVlIjoiWTFtdVlOOTh3M3oxbnRKQ3NVSThNay84QXU4UzF3RFVmVnNhOTk4SXBMc2xRVHlhY0dBQnpDUEFvS0VhZGNES0VFWVZlUHFuaEgxdTJ4eWVqQjBGNCtjN2RnamtyUlZIQ0JIVy9lMHhWZWoxZzMvaDhIWFJESG50cXdMT1diTUMiLCJtYWMiOiI4NWU4MzNlMDFjMDAzZDNmNDMwMDA3OTVlYzc2MjQzNjI2MjQ3ZDk2ZDUwNzdjMTdjODdhOGI1MzNkYTc3OTViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImJDRjFHWUNnWXZOYjA5Wmt2cEJtS1E9PSIsInZhbHVlIjoiR3JWYWNXeU5jVzFtV3djVXhHblBhRjJ3S1llVVRaTHp5Q0dSL3NsZDc1dDc4N25mZTd2c2dyUEV5U2ZaclNtWXNYbDdKU1V5Sk0vT2JLNDBNbDA3MGpYM1BWSHNBKzhxaElSeVd6alVOUlFJcGdQZ2cyTVNwLzFaZ3QvazVwODEiLCJtYWMiOiIzYjViYjNjZjRkOTc1ODg1MzM5NDRjZmI5OWIxN2JkZDc1MGZjYzZhYTIyZWI0NjczZDRmNzA3YWY0MWQwM2QwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:19:46', '2024-05-10 12:19:46'),
(176, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/storage/product/357/09rwzzqyEDCpXi224D4KNKXZ6SyYoCCdGtE0Rkpg.webp', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"image\\/avif,image\\/webp,image\\/apng,image\\/svg+xml,image\\/*,*\\/*;q=0.8\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IlNXVEVHeWZQWjQ2cWVLZmkwenZ0WWc9PSIsInZhbHVlIjoiWTFtdVlOOTh3M3oxbnRKQ3NVSThNay84QXU4UzF3RFVmVnNhOTk4SXBMc2xRVHlhY0dBQnpDUEFvS0VhZGNES0VFWVZlUHFuaEgxdTJ4eWVqQjBGNCtjN2RnamtyUlZIQ0JIVy9lMHhWZWoxZzMvaDhIWFJESG50cXdMT1diTUMiLCJtYWMiOiI4NWU4MzNlMDFjMDAzZDNmNDMwMDA3OTVlYzc2MjQzNjI2MjQ3ZDk2ZDUwNzdjMTdjODdhOGI1MzNkYTc3OTViIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImJDRjFHWUNnWXZOYjA5Wmt2cEJtS1E9PSIsInZhbHVlIjoiR3JWYWNXeU5jVzFtV3djVXhHblBhRjJ3S1llVVRaTHp5Q0dSL3NsZDc1dDc4N25mZTd2c2dyUEV5U2ZaclNtWXNYbDdKU1V5Sk0vT2JLNDBNbDA3MGpYM1BWSHNBKzhxaElSeVd6alVOUlFJcGdQZ2cyTVNwLzFaZ3QvazVwODEiLCJtYWMiOiIzYjViYjNjZjRkOTc1ODg1MzM5NDRjZmI5OWIxN2JkZDc1MGZjYzZhYTIyZWI0NjczZDRmNzA3YWY0MWQwM2QwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-10 12:19:46', '2024-05-10 12:19:46'),
(177, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/474', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/474\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1025182635.1714566590; dark_mode=0; _gid=GA1.1.1537647630.1715329327; XSRF-TOKEN=eyJpdiI6IkNuQUgwclZKdjNWVzYvZWJmWFM4bUE9PSIsInZhbHVlIjoiZHFTWW02QzZPMWJtbnZLemIvQ2t3MXNqc2twRXdvSWh3dFNENFJpTklUcUhSWWpEYlo2SkgvTUxPLytPRENyNGFFZllWeDVtTXcycWsyeVpUdlMwQjF5TnRHTFJSRHlWTXN2WHdXcW1KVVQ0Y1htS29jYUloV0xoTDdTbjdMRFMiLCJtYWMiOiJkZTdjMzE1YjJjYmI3ZmFmZmU2ZTcyMjI0MmJlYWExNmQ0YWJiYjY2OTA3MmRiZjNkN2QxM2MxYTYzM2ZjY2NmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImJrbk90YytsZnMvTlQvaXdyZ0hIa3c9PSIsInZhbHVlIjoiVXNwZ0NwNm5RRzZqZktNeVhkd2dCb0Q1UXMvNlVzeGt5V3I1UnVXL1U2cVBQWnhqV1FQWWtIb2d1R04xQ3RlN3JGeThFSFJGcVVkMjRUSHpqeVpQL0EzVkVyanpmYldsV1IrSFhaeTAxSnNUdXJKcjN1TmhlSERlTzZRNXRZdTciLCJtYWMiOiI2YjRhNDAwMGY1ZGVkZGI2OTgwZTliMzdmYTRkZmY5OTk3MGMxZDhlN2FkNDliODNkNTc3ZjFmNDE4YTEzNjExIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 474, NULL, NULL, '2024-05-10 13:07:25', '2024-05-10 13:07:25'),
(178, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im5ldjdzUXdibWZiUlNPRUZyTjVZWUE9PSIsInZhbHVlIjoiUkdmK2x4emMrVUlQR2ZLcWJjT2pBRTNJLzFJeWRkWmU2OWcxS21JamZ1bXJna1IvanhoZExWWDBBZWxscG11RXV2QjV0Uk4zR2JwR0hKOE9UVkR2S2orZzJwRXYxNVh0am5hR3d0eW5LTkNNWkFpenJTZGVQN1JycTBBQUpqdzYiLCJtYWMiOiIyNDJiMjBmMWY0ZGY4MWNhZTliODZjZGEwMGI1NmYxMWM4NDViNTUyYmFmOTFiNTdhODQxYmIyYTVhYjdhM2QxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik92UVVGOXJ4T2J6ZGxWOTFoMXU1dGc9PSIsInZhbHVlIjoiRFBiM3BneUhmNXBHQXhPR29NdVc5Y2wwZjdaYnVUY3phdlBPRHlQQTBRZkE0QlFzNFVvN2VqaVJUZlBFU2I3UDJOcHpUVmdtVEdSRGZ3R01VYnQxbCtQbDlWSGlWdmQzeTYzbTk3M1BiT2hwM3FrVExrWXVRU0hmbEwyajcwQVUiLCJtYWMiOiI2MDY5MDk5MmI1OGVlODYyM2JhYjUxNGVmYjE5MTRiMmIxMzljNmY1ZWU1MTFlOTk4NTBkNDA1YWMzYTQ3NTAwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-13 06:21:14', '2024-05-13 06:21:14'),
(179, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/everyhome', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImVsdjJoak9lbU80WG41aDYyRU42VlE9PSIsInZhbHVlIjoiSlhnMHI1aDlPNkZ4MGlhbWlsK1JEUDBwajN4SXBCVjBMeVpBSE4zYXVoSDVnV2JpKzh1MGRCVC9yNlBWaldad2p6V29nTTlVVnBaT0NYYW9ZM3g1dE14c2tnZEExbERSeUYyL1BZK3VTczFkNUc3TklEUHFlS2pHVE8zc1BXN3giLCJtYWMiOiJlZTc1YzQzMTdlYWVjMTZjZjE1ODdhNjBhNWI1YTMwNzRmNjc0MTZkMDNmY2JhMDdhNzc1ZTEzNWVkNzNjMDQxIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjkvMExCeFI4TzdjNUswaHYxeUpHYnc9PSIsInZhbHVlIjoiOTgrQnZYN3NjRzl0STJUUXpnaWIwVWQ5aDR1S2cwV2lHNVNkQkJiVlFxTTAyOGg4SVJPWmdVVWVYS2lxVDlFWG1CRGZ6MDcvcThWeDRMUzk5MEVGQmxBKzVTWTlwaWRvdERwVXlnckVJc21SQUZRSHZ4dGZJL3ltVE1BUlZ4RGMiLCJtYWMiOiJlNjk0ZjI1N2NkMjI4MjhlNTNmNDhjMmU0N2I2ZDVhYzkwNWRhZTczZTI0OTI0MzYyZGI5ZjliNzcyOTVhZWQ0IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 3, NULL, NULL, '2024-05-13 06:21:15', '2024-05-13 06:21:15'),
(180, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/everyhome?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/everyhome?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Im9aR0xTUFFUaGdacDVkWG1mZGtnYkE9PSIsInZhbHVlIjoibVVhTGVXMnRKWGNYam80M3lHbFJNai9iSmY2OEQ4M3krbCswM3U2QjBRQkdyMnNjbC9LZDhQV0t6NVNWV2NDY1FxSTFZM2ptWFYwOUtwVVJlTVYvdGF1UlkrWkl4eU5UR3JveVZuQzQydzhUUkZRYytDWTUrV0Z2QTFMalpENXgiLCJtYWMiOiI2ZWViNzVhNTcyYWU4YWJlNDRjN2E0OTQ1ZTNjNWU4NmU2OWE1NzI3NTA0N2M5ZTAxMzU5ZGFmYjQwMDM4ODVmIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InlueExicUZXMnpYZXY1SkRVNStHVlE9PSIsInZhbHVlIjoieWZxL1pWNWVrblZGNFRKZlI4R2d6VXZzZjkrV2ZKd2JWbTRZdExnUXpXTHAvd2puYlQxR3NJVHVjZDhRRlNIeFdxZExGR2daaTNVSmNlczluYlVlUEQxQTZOU2F5a2c5bUpRMDlMYVRXS1JqZVlCcnUwM3UyblZFaUpISGtQQTgiLCJtYWMiOiI1NTU5ZTcwNzgzZDdlNjRkNzYwZGNkZDkxNzA2OGY3MTExOWU5ZWZiNWRmYmU4NGE0MTE0MzUzNWVmNmVkZjk5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-05-13 06:21:15', '2024-05-13 06:21:15'),
(181, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkdGZjRweVF2ZHJRRHZCTnFQZHBRQ3c9PSIsInZhbHVlIjoiMDFWVitWdGZzVFJOM1hiNVY2cVJQdm9YT1FNME00bEJ3Z1ZPT1RDK25lVzVmaDhFU2NKOG5ETTRRYnVGdkRCSFlwNXFBZHNRUE13MnlwWHNGMUpnazNBcmgrV0UydDFCRjhmc2xlUVVEVUJ3TXV0SHZ5bTUzSnFyMWNVNjNMazkiLCJtYWMiOiI3ZjZjZmJmZWY5N2NiNWUzMWZkYmY1ODllY2M4ZWEzNDE4NzFkMjBlMDU4MDhlNTRlZjg4YzE5NTM4MTI2NDVkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik5xaFpaWVhQRC9OTDQ1M0IwL3dpOGc9PSIsInZhbHVlIjoiVDdGUUhKd2ZCdjNmc0xlbFVHOFg3b3FxNlBWTlo3MUJSdEF6T2gzNDhRKzlCc2g2TmJLRzhyaEpQbDdWb3NqQ0QxVGNOT3JGemwrYXhFVjRicWR3UUlITnJwUEE2b01wRGljaUxiRjZWYkY1WlZ5a1B5ME9NRE13YW54UFRPT3YiLCJtYWMiOiI1ZTY4NjVhMWVjMzhjYTQ2NzdlOTgyY2FjNTM4NmViZDdjODg5ODg2MzY2NDI0NTc0NmQxYzdhOTI1NDQ5YzhiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 520, NULL, NULL, '2024-05-13 06:21:16', '2024-05-13 06:21:16'),
(182, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6Ijd4ZGJtYWFnTHc4WVU5RnBjNlBqYVE9PSIsInZhbHVlIjoickFTQlNDODIwT1hvRDd6OWN1RS95Y1RGZ0NuMWMzMUhpZC9heDBLWlhieTZ1eEx1VDN5OXdRWXFtUzdCV2FyenQ2NWwrSUI0WVRQenRWYXBnQ3c1UldzWnF3aVpjQmhPNjdZSGhiZVg5VktQeVlRaFpqSGVhQVRUN25HYkRFRSsiLCJtYWMiOiI0NGY0OWZlN2M2NWI5Yjc5MTc4MjA5YjhhZjhiMDg3MDViZjg5ZDA4NmEyNGI0NTMzZTY4NjUzOWJjYzM0ZTllIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ikp6dk1XWitnZWpMMUc2SnZmSXFTR1E9PSIsInZhbHVlIjoiYzQ1TWVzMXloNnlpakpvWXVJM3ZNNXBMYlMxWDNnTXdvYWFxQUFNY2M0WUYydS9lZ1lCcGV3ZDBlWlZXcXExalpnUmRxTkpjakdJWE5UQ2xEMTlRZjFZSStteFQydUJ1ZzBGRWtiandnUTA5K0JWWnk5MWxhS1FRY1pSVGYrNFkiLCJtYWMiOiI0YjUzZDgyODQxY2IwZDhiNmM5Y2Q4M2M3M2UyNTkyNWQ4YTBlYTNjNTU3MjZmMTkyNzIwMDQ4NjhmMWUyMjQxIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 8, NULL, NULL, '2024-05-13 09:09:44', '2024-05-13 09:09:44'),
(183, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns-hopefull-green-slant', 'http://192.168.15.214/rli-bagisto/public/elanvital?mode=grid&sort=name-asc&limit=6', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?mode=grid&sort=name-asc&limit=6\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IlJCTEtncDVrOGl2NE10QWpEZHV6ZXc9PSIsInZhbHVlIjoid0lwUWsreFJUa2pwbG5BcDFvRStyenZqaWRlazVaT1hoM2ZydWZTRTR5RG5CZDAzS1VmWFB5ZjR0UFZpQVYxV2dCN3hyb1FOVCtXR2RBd0pRcGJXR3hYckFlUkRwNjdUTTZiTE4wY055RUJRUHhkSFZQUm0ySlBYNVl6NWV1a3MiLCJtYWMiOiJjNjJlNjlmMmJiYzQ3NWFkZmViYmJjZmU2NWEzYTdhYjQ1MTNlMWJlZWQwNDVkMWZkMGNhYWVlYTlmZjg4NTNiIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InFScktvUmdXU0xWMUtDdlM2UHNyRkE9PSIsInZhbHVlIjoicGVqRVcwVHdHSjNHQ3g1a3FkUS8vemtqeXM0MnlsM3pxRkFuSCtYOXFHeS9GYnRiWklkdUNtb08zbmppOHFKQ0hTMndFcmpkcE1hcGd5R2xQY2F4clZXSFFLb1hOQis4Zk9Va2pYcGhzZy8xbHVSM1ZkRmxJNnNWc3V0RTBYbGoiLCJtYWMiOiI4NjViNjU4ZjM2MzkzOTkzNGYzYzAyNTFjM2EwZWFlZTQ0MDY3ODA3MDc0OTA5YzYwYzhmZjQyNDkwZDhlYWY1IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 551, NULL, NULL, '2024-05-13 09:10:03', '2024-05-13 09:10:03'),
(184, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6ImtvL0prL0M2anpUVEh2Qk5SYzJyNUE9PSIsInZhbHVlIjoid0dVUkRwajd6TnFqT2ZlS1hNcEVDR1ljWG15dFhyY1pjZHF6d3pTdUp5OW5YYXRwb3VFQytmMnl2dDBhQllEYnM2Z2RzaitpODg0OGVGUUQ5M0NtU0FmZmcrREU4U2hrMnFPbnh3U0MxTGNlY3RzWThGMS9rb09SclNnbExIYXYiLCJtYWMiOiJlNDJmOWM5ZGVjMjM4NjM2OGMwMzcwNjk0N2E5ODc1ZjZlNjM4MTQ4ZmEyMGJkYTZlOTIwN2ZmYjM1NDllNTkzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkM3UFRyQkU2djk5RHptaWluN3FMOHc9PSIsInZhbHVlIjoiREU3WEdRaEZwTkMwU3h2RVpuQWRWckp3REV0eVlvam5ZOFN0d0xTd1hER1V5L1QrUXlPdCs0NS9qOENpeVNiYXFlNll6UW1Xb01zc25jT1lmK0NXUGNqVUhXcTdVMjZQdU9NT2lLR2dscEhJemJHenQwL0lGZTZrR29kdEIwczciLCJtYWMiOiJjM2ZmNmVlZThjOGU5OGM3MDVlYzNkYjYzZjBjOWQyZjk0OTczMzdlYmJjZjliNTVlM2M5NzQ2M2U2OTQ0MWFmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-22 08:14:28', '2024-05-22 08:14:28'),
(185, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"XSRF-TOKEN=eyJpdiI6IkRoclZGQVN6UVFNQ0piaDBtUFpteUE9PSIsInZhbHVlIjoiQktHY3RnamhaR09SU3pJelYxNEdaM00rMzNPdk5XZnVTUGhkSGc2amVQQVZ0TUxncUZackVURlRDK2hhN05ibkxGWWV3SVh0aUVhdEdxTmluZHluZDdRRGt2Y3QvRXUvVGJqYmwrcGEvd0dzbld5YU1LSDUydHA4Y254RGFSOUQiLCJtYWMiOiJkY2RjMGNmNTFlMzgxMjA3N2IwZDk1NmQ2YTMyYmQxNDg0OTBjYTk2YWIyOGIzZjNlM2Q1ZWU1ZmVjNjIzNjA1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6ImljVlhLTUhPcExOTlBRaXQ0ekVjSkE9PSIsInZhbHVlIjoiSGx2dU81ZFJSeHZVSGJJbURQdklUQmtmTE1YdFl3NnN0ay9FcU42d2NOV3NkYjNBRjZ6dXNWekJzTE5xQ2lERld2cGFMYnN6bUZPYjJJT20rYWRMbDdneHlJbzJVU1FWTEhDODRFSXBRdFpCRXJJZ1FDUmVzWlJFZEZ6UXRIYksiLCJtYWMiOiJmZWRiOWEyMjM4YmM4ZWE0MmYyNTE3MWJkYWYyMTQyZmZmOGY5YjdmMTczODkzYzJkMDNkMThhYzU0ZmM2M2QyIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 550, NULL, NULL, '2024-05-22 08:14:29', '2024-05-22 08:14:29'),
(186, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/zaya-studio-condominium-with-balcony-end-unit', 'http://192.168.15.214/rli-bagisto/public/elanvital?sort=name-asc&limit=6&mode=grid', '[\"en-gb\",\"en-us\",\"en\",\"hi\",\"bho\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"pragma\":[\"no-cache\"],\"cache-control\":[\"no-cache\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?sort=name-asc&limit=6&mode=grid\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7,bho;q=0.6\"],\"cookie\":[\"bagisto_session=eyJpdiI6IlpmcUh4TkFkNk92TEpQOUxXaTZhdnc9PSIsInZhbHVlIjoiQWQxKzlTNVJ2ajAyeVdkVUlkZW1FWVYvNWxrYjAxUXhNY2FnbGJiY3V1SS9yeWJDd3BFbDFMMStiamJzSWpCcWJqMTBVeFVJNkdQUCswYVhpdnBMNGFnWmlSR0JqY1d1MFBLdXQrOTRpNWxlQ0h3TTMzY3RrTDBsNFlQcVRobTEiLCJtYWMiOiJmNTFkYTc0NmI1ZTQyNmIzNzQxMWFkMmMwZWIyZjZmMTYxNjA2MmZkZDUwY2Q2YzhlODQ3MmM0NTYwMTk3YTY1IiwidGFnIjoiIn0%3D; _dd_s=logs=1&id=c8492495-cdb2-4700-9042-9d32203ac234&created=1716366096562&expire=1716366996562\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.143', 'Webkul\\Product\\Models\\Product', 560, NULL, NULL, '2024-05-23 10:14:14', '2024-05-23 10:14:14'),
(187, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_customization_session=eyJpdiI6IlFOZ014THozWVpUM0FsSVFZQ2Y1V3c9PSIsInZhbHVlIjoiYXUrRVpPb0ZRMlhiSU1ublJyWWNtdC9uaTF1ZDkrWkJ0dTdpMmtOQ1FiWTY0aU1QRzM1dHNVUEFmRStlL0xGR2s3TnV5RElQRWNWYURSMTN2U2RSdVpJbDJLRnF2aFNMR3h6MVNWTVVWdm1HQWFCY3hRamQ0Zm44R25uZUhhR3UiLCJtYWMiOiI3NTQ1YjBiOWU2NjBmMWUyZTVmZmU3OTQ0NjJlNTE3YjIxMDdmZjA1OGFjNjIwMjg2MWU0MDA0ZGFhYWYyNjBkIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IkxheDZEU25SL1ROb0g2ejlHaWFrNVE9PSIsInZhbHVlIjoiTWV2alhGZ1BYa29VZnJMbmFCK3JGNlM1a3FNUVZvdXZPZnNIVkI0Qml3RjBOY1pYQ3Z3V1JWYmh6dWh0VXoveFMzYWxBNjZmU091UCt6dkhwbW4xZVVQdFlYTmd4Yk5TamFJeTluZm9PSmpOTjNtbmd4UUxrV2RBM3ZnYnk5VXUiLCJtYWMiOiI0YTA2N2NhZWIzZjkwZDkxYTllZWZjOGM3NzdkZDBhZjBkMTgwODMxZDVkZDM1NjA0MDA1Yjg3MTE2YWYxZmM0IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6InliT1lsdDVkR1FiOE53UlJZNjlsT3c9PSIsInZhbHVlIjoiZUJZZFRLb3VqWmp0eEY3TDdGeEhacVhWSzh5czYrcUJOQUhKeXhYT1ZsVUY0SWh1dVVJUnhVdDRoa1JrOVAwM0lvak5xZDB4R0w5c084dzZZZWQ0ZHNFQzU0QUhZTVNDbWZjTU16RGxMc0RaZmY4OXZHQmY5bURBM0Z2MzR2MnYiLCJtYWMiOiI0MTg2YzQ0MTc3YTQzYjk5ODYwMWU0MWFkYjYzNDM2NmQ3MGIxMDdlZDRhY2ZlZGU0NDQ5NzUyNzFmYThkMjM3IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-23 10:29:05', '2024-05-23 10:29:05'),
(188, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/elanvital', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_customization_session=eyJpdiI6IlFOZ014THozWVpUM0FsSVFZQ2Y1V3c9PSIsInZhbHVlIjoiYXUrRVpPb0ZRMlhiSU1ublJyWWNtdC9uaTF1ZDkrWkJ0dTdpMmtOQ1FiWTY0aU1QRzM1dHNVUEFmRStlL0xGR2s3TnV5RElQRWNWYURSMTN2U2RSdVpJbDJLRnF2aFNMR3h6MVNWTVVWdm1HQWFCY3hRamQ0Zm44R25uZUhhR3UiLCJtYWMiOiI3NTQ1YjBiOWU2NjBmMWUyZTVmZmU3OTQ0NjJlNTE3YjIxMDdmZjA1OGFjNjIwMjg2MWU0MDA0ZGFhYWYyNjBkIiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6IlovNWFvY0JXMGNjQVRzWTd5VU5yRUE9PSIsInZhbHVlIjoiV1VRYWJWVkYxRllwUzc4SkFpcmxpeTgya2dCRE1kMTBSZ1VvSVI0SUpWTi95WjNZYzNJTUl1ekFGakVINENwQmF4dm92UC8wd3VLc2cxL1JvbmxRTE9WUDlDV1ZPM3k2dmkydEVocmVndGlDZEhRZUUzNlVuRGFzejAxMkp2TDYiLCJtYWMiOiIwOTlkOGE4ZTk5M2M3MmJjMDE1ODgxMDI3YjA4YWMzZjFlZjRiYjBjYmJjYzA1ZmVjOTg4ZWIwMGI0NmQyZGQzIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IjM5aDU4RkZsUGQranJjL1JGWVdEaGc9PSIsInZhbHVlIjoiQzVQZW0yZVUvOG9sQWtRMno5RU1KN0dRNG5HdnFSZWRnb1VVNjg5cGI1bGdxdzZlSmhZdS8wQnVVMElZMjlENDlMKytkZXQrZXJaa2E3cU1POWhiM0Q2d2JRcW1PVkhzVzduUzhVMXB3cEV2LzdzdXNBdUYzMFdQQmY0cmFScHEiLCJtYWMiOiIxZDU2YzhlNDNhZmFlZGU2NjE2Mjc2YTRkNDFmOTQ3ZWY1MzBhMzJiNWNiNzk5OGE3YWI2ZTdkMzY1NTA0YjQ2IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Category\\Models\\Category', 2, NULL, NULL, '2024-05-23 10:53:05', '2024-05-23 10:53:05'),
(189, 'GET', '[]', 'http://192.168.15.214/rli/rli-bagisto/public', 'http://192.168.15.214/rli/rli-bagisto/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli\\/rli-bagisto\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_customization_session=eyJpdiI6IlFOZ014THozWVpUM0FsSVFZQ2Y1V3c9PSIsInZhbHVlIjoiYXUrRVpPb0ZRMlhiSU1ublJyWWNtdC9uaTF1ZDkrWkJ0dTdpMmtOQ1FiWTY0aU1QRzM1dHNVUEFmRStlL0xGR2s3TnV5RElQRWNWYURSMTN2U2RSdVpJbDJLRnF2aFNMR3h6MVNWTVVWdm1HQWFCY3hRamQ0Zm44R25uZUhhR3UiLCJtYWMiOiI3NTQ1YjBiOWU2NjBmMWUyZTVmZmU3OTQ0NjJlNTE3YjIxMDdmZjA1OGFjNjIwMjg2MWU0MDA0ZGFhYWYyNjBkIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik9IVGwxWUJaY0FMQzJXL2dUNGc1akE9PSIsInZhbHVlIjoiMnhPb2ZoQ21yWlZ2S0xKdGtiRXVoUzltSlhDenhLR2FHV1lGQ0tKWlErRGk0alFSTE9wbUhHMzQ3bVhzMjdiWXdHNy9sNEpMM1lRTWxuVmFZdmszZ0tRb3QvZTVmSnJSNkNFK1lXVlFEeVJTcUdNeVlnN2NaMzJ1dFpnVjU1Yk0iLCJtYWMiOiIxM2I2YzExYzE3ODQyN2I2ZGJjMmVkZGY0ZjhiZjU0Mjg1MGUwYWE4MDFiZjVmMjAwMjQ4OGVjY2I1Yjc2OGU3IiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6ImQxb3BOVE5lVC8wZ2tUckdQTkJQYWc9PSIsInZhbHVlIjoicnF0OXpwV2lKc21iU1VFd1FpV1M0VzlrRmc1eHdhc20ySTBmNHBicG5zQjZPYzIwYVUxTWlxYWNiRHJKUGlacGV5SEw1dWdhd250ZENwWW9DZDNyemIzZUFQTHFTQTBzcWJSckFhRFJMblJwM2RTdUxUZldEdGoyYldqM3liWVIiLCJtYWMiOiI5MjY0YzI5YTJiMmM4MjA4M2E5NzQ2NjZhMzQ3YTE4MGM2MTU4YTM3MTI4NzdjYWVlMmNmZjQ4Y2IwNjFlZTcyIiwidGFnIjoiIn0%3D; krayin_crm_session=eyJpdiI6Ik5acVNUaEVGZFBNSEZCSVRuMVNNUWc9PSIsInZhbHVlIjoiN0FKQTE2OXZDVFhOZDcvbFJiRWxnUFZOc2dXQlplMTZKUU9wTDl1MFpsZHNrUlZvbUNzaitGVHQxRklNYkhCUzAvbER6ak00L0VMekp4UjYrUjJDUWwzUFZWanQ1Sy85di9mUC9NWWN5MWI0UlB2d3ozMzlDM29YRTVTdFp1L1giLCJtYWMiOiI4ZjljMTRiNDQ3N2NjN2FiZmRkNGM0ZDhlYjU2MDMzNDAwMGZiZjBjNTFlYTc0MTYzNjY5ODg5ZTIzYzBkODg5IiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-23 10:53:07', '2024-05-23 10:53:07'),
(190, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/elanvital?mode=grid&sort=name-asc&limit=6', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/elanvital?mode=grid&sort=name-asc&limit=6\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_customization_session=eyJpdiI6IlFOZ014THozWVpUM0FsSVFZQ2Y1V3c9PSIsInZhbHVlIjoiYXUrRVpPb0ZRMlhiSU1ublJyWWNtdC9uaTF1ZDkrWkJ0dTdpMmtOQ1FiWTY0aU1QRzM1dHNVUEFmRStlL0xGR2s3TnV5RElQRWNWYURSMTN2U2RSdVpJbDJLRnF2aFNMR3h6MVNWTVVWdm1HQWFCY3hRamQ0Zm44R25uZUhhR3UiLCJtYWMiOiI3NTQ1YjBiOWU2NjBmMWUyZTVmZmU3OTQ0NjJlNTE3YjIxMDdmZjA1OGFjNjIwMjg2MWU0MDA0ZGFhYWYyNjBkIiwidGFnIjoiIn0%3D; krayin_crm_session=eyJpdiI6IndaeWp6YllFbmxXZXZDaWh5b3dWMUE9PSIsInZhbHVlIjoiaVVLVk5VTi9QbUtZcmZiVUNRR1RFNkFXcmEzcjArQjU4RnlMMVZUMThzMkhhRkM1NXJ6SS9ENVBNZ0VFME9QYi9XVk5saXhSaFpNZ2JFK1UzSGx2WWRZTWNJTnJvcWw5U1U4alFuc3RheHhtYWhjajBVYVJ1aUU1L1FPVVVNU1giLCJtYWMiOiJmZTdjM2MyZjVhNDQxZDUzOWJiMDdiZjM0MmZkZjczMjVlMzBjNzAxMTZjMTgyOWE3MmFkOTRjOWRmZTIyNWU2IiwidGFnIjoiIn0%3D; XSRF-TOKEN=eyJpdiI6InRQMnpsREVpYmN1djEwejM5YWd2ZWc9PSIsInZhbHVlIjoiajNac3dxSGo2Z2JPblRLc3VTbStmYW0yRU1HVXBGZXB6TURTZVExOVJlK2FiWUZvUmhCbjN2Q1dMMUZjWHQvaDEyOWJ5Z3FHMmJyMHRjb0Q1OEFsaXRzUGxhbjlxZFM1UTlRZlBCVml3b3NkMHpISWRrVE4zUnFaZXZqQzVLYlciLCJtYWMiOiJhM2QxZDUyYWFiOWI2MmMwMTk4MDZmMDIwZTQ2NDUxZTA4NTBmN2MwNDUwN2U4NDFhZWRlYzY4ZWQ1ZTM4MTljIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IndtSXl4KyswZndxN1M4Tnp1Uk0xRHc9PSIsInZhbHVlIjoiajgxWEtVYkI5VXJ2VEJod1RZM1dHOEhhM21QMUdBc3RmODBjVnJoL2duRWZmZkdTaHpRZXdCS3FqQUdST0tPZm9jUG5RNGxGVkJubURWTUZodHZGNDZBRnNPMjVBYll5STBtOXBaV2loRzRoWmRibGVwSkl5Qmo1WjFXSVRUQVEiLCJtYWMiOiJjODFkMDVkMGIwYzhiN2JkZWY1NWYwMGQzZDZkMjJhNjkwNmRjNzA2ZjNmZmU1NTdlODQ2MzY3MDMwNGJkYjFlIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 612, NULL, NULL, '2024-05-23 11:20:02', '2024-05-23 11:20:02'),
(191, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', 'http://192.168.15.214/rli-bagisto/public/customer/account/inquiries', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/customer\\/account\\/inquiries\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_session=eyJpdiI6IndaeWp6YllFbmxXZXZDaWh5b3dWMUE9PSIsInZhbHVlIjoiaVVLVk5VTi9QbUtZcmZiVUNRR1RFNkFXcmEzcjArQjU4RnlMMVZUMThzMkhhRkM1NXJ6SS9ENVBNZ0VFME9QYi9XVk5saXhSaFpNZ2JFK1UzSGx2WWRZTWNJTnJvcWw5U1U4alFuc3RheHhtYWhjajBVYVJ1aUU1L1FPVVVNU1giLCJtYWMiOiJmZTdjM2MyZjVhNDQxZDUzOWJiMDdiZjM0MmZkZjczMjVlMzBjNzAxMTZjMTgyOWE3MmFkOTRjOWRmZTIyNWU2IiwidGFnIjoiIn0%3D; dark_mode=1; XSRF-TOKEN=eyJpdiI6IjdyRENETEJMK25tL0ROV05rSm1ENmc9PSIsInZhbHVlIjoiV2NwRlRPamtqa3ZEdXFVemVMVlJtcFRvMmdNM1FqRjhaTjF6d1k3bnpndEpQZkN4QnhISXpUVSttUHFPeVJtWE85THBOTDZ5Tkc5OGlHdC9nQld1WFRCN2dhY3cvYlNuNXRuMm53UlZ4eTBwZjI0VzdBZHZDdG9tM1hlcGFVS1giLCJtYWMiOiIwYjY1MTY3ZTdiNGEwY2ZkZGI2ZjRhMjUxNTE4NDQ5ODZhZmFlZTc2ZGViNGRiMmRhMmI0YmY1ODg4OTI1MjM1IiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Im5JV1pQZmNhWVlFUVd0akJGSTJJU1E9PSIsInZhbHVlIjoiY3VnZlo3Q09VMDFVM05sN244VFlERHhJQUF3MytBNWhlZmhRYnVkMXhob0ZSTVdhTHJhMlBDeENmUzdCR2JpZXp5eFNUdEIvT1VET0xyZVZSMmpOYkkyYTNTTzhBNVFGa2tkNjBFTmV2bzh5b3JnYVdPM3UzY2NZZFZQK3pFRVgiLCJtYWMiOiJlN2ZhYjQ1MzVhNWE5NDdkMzI0MzdkMGZlYTg5Zjc5NjZjYjllNmI2ZWJmMTE4M2RiNjVhZjc2NmQ0ZGMzYzdiIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, 'Webkul\\Customer\\Models\\Customer', 4, '2024-05-29 04:14:18', '2024-05-29 04:14:18'),
(192, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; krayin_crm_session=eyJpdiI6IndaeWp6YllFbmxXZXZDaWh5b3dWMUE9PSIsInZhbHVlIjoiaVVLVk5VTi9QbUtZcmZiVUNRR1RFNkFXcmEzcjArQjU4RnlMMVZUMThzMkhhRkM1NXJ6SS9ENVBNZ0VFME9QYi9XVk5saXhSaFpNZ2JFK1UzSGx2WWRZTWNJTnJvcWw5U1U4alFuc3RheHhtYWhjajBVYVJ1aUU1L1FPVVVNU1giLCJtYWMiOiJmZTdjM2MyZjVhNDQxZDUzOWJiMDdiZjM0MmZkZjczMjVlMzBjNzAxMTZjMTgyOWE3MmFkOTRjOWRmZTIyNWU2IiwidGFnIjoiIn0%3D; dark_mode=1; XSRF-TOKEN=eyJpdiI6ImZiN2liVUEyUFUxSEJ5enR6V0ZucXc9PSIsInZhbHVlIjoiaVdBQVExY1prYkoyRytkYlFMS2VwRGRiNDZPODN1L3VVOWJuR2VaTCtpM3R1U1ptL1lXSjFnQjUyUE9iMFpTM3ZhVXpSOWNlOXZIUElwYXlnQ2FhdEJzNXlRcDgyQ1A1d0d1NEFOUVN5UW16RXl6ajBUcDNoL2d1Vnhkcko1TDEiLCJtYWMiOiI0NGE1ZDkyMjlhYTE3ZDQ3NTY1Y2RhNzI1ZjY2ZjFjZWQ2NzRhOWY5MTI3MTgxZWM1ZTZhYjk4ZTA5MWFjZjBjIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6IkJFcUR5UWlNWGdPTUJWdnVTQjQvM1E9PSIsInZhbHVlIjoia3pUN2VkcjBLR1ZHaGl3a3FFL2JicGJaVnZOUlNjQitVeUJjQTFneVNPY3YxaGd2VzE4V3JVY3R4eW0zMDM5UlNIelFrMERaM0YwTXpReWFLN1RnWHE5QjNqTkRBRVVObGJHYmJ3aGxadXA1cGlFQW0waml3VWN1WEQvcS83b0siLCJtYWMiOiJhN2ZiNTZlMThlMGQzNDA2ZGE1MmNhYWRjNTUzYzAyNTQ5YWQ1YzBhYjkyOTM3ODFmYTdjZTMyMTRjY2Y1NGZmIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 612, 'Webkul\\Customer\\Models\\Customer', 4, '2024-05-29 04:14:18', '2024-05-29 04:14:18'),
(193, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-gb\",\"en-us\",\"en\",\"hi\",\"bho\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/124.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7,bho;q=0.6\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.143', NULL, NULL, NULL, NULL, '2024-05-29 04:14:19', '2024-05-29 04:14:19'),
(194, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public', NULL, '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; dark_mode=1\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', NULL, NULL, NULL, NULL, '2024-05-29 04:49:20', '2024-05-29 04:49:20'),
(195, 'GET', '[]', 'http://192.168.15.214/rli-bagisto/public/agapeya-towns', 'http://192.168.15.214/rli-bagisto/public/admin/catalog/products/edit/612', '[\"en-gb\",\"en-us\",\"en\"]', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', '{\"host\":[\"192.168.15.214\"],\"connection\":[\"keep-alive\"],\"upgrade-insecure-requests\":[\"1\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/125.0.0.0 Safari\\/537.36\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,image\\/avif,image\\/webp,image\\/apng,*\\/*;q=0.8,application\\/signed-exchange;v=b3;q=0.7\"],\"referer\":[\"http:\\/\\/192.168.15.214\\/rli-bagisto\\/public\\/admin\\/catalog\\/products\\/edit\\/612\"],\"accept-encoding\":[\"gzip, deflate\"],\"accept-language\":[\"en-GB,en-US;q=0.9,en;q=0.8\"],\"cookie\":[\"_ga=GA1.1.1572457479.1715929695; dark_mode=1; XSRF-TOKEN=eyJpdiI6IjZCSnlOSWVtaVM4SkhHQklJTkRsMFE9PSIsInZhbHVlIjoid29CdUhBbHJTU1pVRWMxeUtXeVpVSW9rTUswQS9QaWFVV0MrbVlMRHYvUzFNZ2FGU0hJMTl4cWNtcFZySkRDNDVkZEZscFJwTEtjZzhnZzF4THVCcVhoeFJrNWttTmM0cm5iM0ZBSnFtZkgvR1ZuRGpqSWlNREhXdVVlR1pvTGMiLCJtYWMiOiI2MGNkOGI0MTM4Y2U1NmIwMWVhOGZlMDBhZTA4ZWY3NTk1NGVlNDJmNTk2ZTM5YTg0MjdkYjBjZWIxMTk0MGJlIiwidGFnIjoiIn0%3D; bagisto_session=eyJpdiI6Ik96d2pJeXZPUDNGenAyaG4zYkpvY2c9PSIsInZhbHVlIjoiV3JOTGZzeTJ2K0Z5ZUwzdnIrMHZEUmhDN0ZzNE42R2dKUFJ3MmFaWmd2RnhreWF2S3M0K2hFN0tObzMyd2MzRTdCUVNtSlk3THU4K3d5dUh0Q0hYZVpPY1dyUVhERW9LdHRaMzRwRWJ1Qk1UckoycVJjeFVlTmU3UExkZEk0MDYiLCJtYWMiOiJjMDE3YWYyNjY2ODM5Y2VhMjNhNmJmMWRhZGNlNGIxODkwZGRmZmE3MzdhMmE3MmVkN2ExNjUwNjM4MzgyYWEwIiwidGFnIjoiIn0%3D\"]}', 'WebKit', 'Linux', 'Chrome', '192.168.15.214', 'Webkul\\Product\\Models\\Product', 612, NULL, NULL, '2024-05-29 05:20:02', '2024-05-29 05:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `webhook_calls`
--

CREATE TABLE `webhook_calls` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` json DEFAULT NULL,
  `payload` json DEFAULT NULL,
  `exception` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `webhook_calls`
--

INSERT INTO `webhook_calls` (`id`, `name`, `url`, `headers`, `payload`, `exception`, `created_at`, `updated_at`) VALUES
(1, 'default', 'http://192.168.15.214/rli-bagisto/public/kyc-authenticate/webhooks', '[]', '{\"payload\": {\"order\": {\"buyer\": {\"name\": \"Vikas Vishwakarma\", \"email\": \"vikas@example.com\", \"mobile\": null, \"address\": \"1 BARANGAY POBLACION CURRIMAO ILOCOS NORTE\", \"id_type\": \"phl_dl\", \"birthdate\": \"20-04-1973\", \"id_number\": \"N01-87-049586\", \"id_mark_url\": null, \"id_image_url\": null, \"selfie_image_url\": null}, \"seller\": {\"name\": \"John Doe\", \"email\": \"seller_001@enclaves.ph\"}, \"product\": {\"sku\": \"JN-AGM-CL-HLDUS-GRN\", \"name\": \"Agapeya Towns Hopefull Green (Slant)\", \"processing_fee\": 11231212}, \"dp_months\": 18, \"dp_percent\": 12, \"property_code\": \"AGM-01-028-024\", \"transaction_id\": \"eyJpdiI6Imtud25keDdUeTFSd2UyanJNRC84WFE9PSIsInZhbHVlIjoiS2lCV0hWVWwrdDNYb2tUMzR1MTFFZz09IiwibWFjIjoiZjFlY2E2ZjcxMTI1N2RlNzYzMzA2OTYzMjllN2I3MzQxNjM1ZmU0MDY0Mzc0YWE3OWIwMzk4YTJmZmQxYzM0MiIsInRhZyI6IiJ9\"}, \"reference_code\": \"JN-LES537\"}, \"entity_type\": \"checkout.property.kyc.authenticate.after\"}', NULL, '2024-05-06 06:57:09', '2024-05-06 06:57:09'),
(2, 'default', 'http://192.168.15.214/rli-bagisto/public/kyc-authenticate/webhooks', '[]', '{\"payload\": {\"order\": {\"buyer\": {\"name\": \"Vikas Vishwakarma\", \"email\": \"vikas@example.com\", \"mobile\": null, \"address\": \"1 BARANGAY POBLACION CURRIMAO ILOCOS NORTE\", \"id_type\": \"phl_dl\", \"birthdate\": \"20-04-1973\", \"id_number\": \"N01-87-049586\", \"id_mark_url\": null, \"id_image_url\": null, \"selfie_image_url\": null}, \"seller\": {\"name\": \"John Doe\", \"email\": \"seller_001@enclaves.ph\"}, \"product\": {\"sku\": \"JN-AGM-CL-HLDUS-GRN\", \"name\": \"Agapeya Towns Hopefull Green (Slant)\", \"processing_fee\": 11231212}, \"dp_months\": 18, \"dp_percent\": 12, \"property_code\": \"AGM-01-028-024\", \"transaction_id\": \"eyJpdiI6Imtud25keDdUeTFSd2UyanJNRC84WFE9PSIsInZhbHVlIjoiS2lCV0hWVWwrdDNYb2tUMzR1MTFFZz09IiwibWFjIjoiZjFlY2E2ZjcxMTI1N2RlNzYzMzA2OTYzMjllN2I3MzQxNjM1ZmU0MDY0Mzc0YWE3OWIwMzk4YTJmZmQxYzM0MiIsInRhZyI6IiJ9\"}, \"reference_code\": \"JN-LES537\"}, \"entity_type\": \"checkout.property.kyc.authenticate.after\"}', NULL, '2024-05-06 06:59:02', '2024-05-06 06:59:02'),
(3, 'default', 'http://192.168.15.214/rli-bagisto/public/kyc-authenticate/webhooks', '[]', '{\"payload\": {\"order\": {\"buyer\": {\"name\": \"Vikas Vishwakarma\", \"email\": \"vikas@example.com\", \"mobile\": null, \"address\": \"1 BARANGAY POBLACION CURRIMAO ILOCOS NORTE\", \"id_type\": \"phl_dl\", \"birthdate\": \"20-04-1973\", \"id_number\": \"N01-87-049586\", \"id_mark_url\": null, \"id_image_url\": null, \"selfie_image_url\": null}, \"seller\": {\"name\": \"John Doe\", \"email\": \"seller_001@enclaves.ph\"}, \"product\": {\"sku\": \"JN-AGM-CL-HLDUS-GRN\", \"name\": \"Agapeya Towns Hopefull Green (Slant)\", \"processing_fee\": 11231212}, \"dp_months\": 18, \"dp_percent\": 12, \"property_code\": \"AGM-01-028-024\", \"transaction_id\": \"eyJpdiI6Imtud25keDdUeTFSd2UyanJNRC84WFE9PSIsInZhbHVlIjoiS2lCV0hWVWwrdDNYb2tUMzR1MTFFZz09IiwibWFjIjoiZjFlY2E2ZjcxMTI1N2RlNzYzMzA2OTYzMjllN2I3MzQxNjM1ZmU0MDY0Mzc0YWE3OWIwMzk4YTJmZmQxYzM0MiIsInRhZyI6IiJ9\"}, \"reference_code\": \"JN-LES537\"}, \"entity_type\": \"checkout.property.kyc.authenticate.after\"}', NULL, '2024-05-06 06:59:26', '2024-05-06 06:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `item_options` json DEFAULT NULL,
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `time_of_moving` date DEFAULT NULL,
  `additional` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `id` int UNSIGNED NOT NULL,
  `channel_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `customer_id` int UNSIGNED NOT NULL,
  `additional` json DEFAULT NULL,
  `moved_to_cart` date DEFAULT NULL,
  `shared` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`),
  ADD KEY `addresses_cart_id_foreign` (`cart_id`),
  ADD KEY `addresses_order_id_foreign` (`order_id`),
  ADD KEY `addresses_parent_address_id_foreign` (`parent_address_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_api_token_unique` (`api_token`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_code_unique` (`code`);

--
-- Indexes for table `attribute_families`
--
ALTER TABLE `attribute_families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_groups_attribute_family_id_name_unique` (`attribute_family_id`,`name`);

--
-- Indexes for table `attribute_group_mappings`
--
ALTER TABLE `attribute_group_mappings`
  ADD PRIMARY KEY (`attribute_id`,`attribute_group_id`),
  ADD KEY `attribute_group_mappings_attribute_group_id_foreign` (`attribute_group_id`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_options_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_option_translations_attribute_option_id_locale_unique` (`attribute_option_id`,`locale`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_product_importers`
--
ALTER TABLE `bulk_product_importers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bulk_product_importers_attribute_family_id_foreign` (`attribute_family_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_customer_id_foreign` (`customer_id`),
  ADD KEY `cart_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_parent_id_foreign` (`parent_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_tax_category_id_foreign` (`tax_category_id`);

--
-- Indexes for table `cart_item_inventories`
--
ALTER TABLE `cart_item_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_payment`
--
ALTER TABLE `cart_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_payment_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `cart_rules`
--
ALTER TABLE `cart_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_rule_channels`
--
ALTER TABLE `cart_rule_channels`
  ADD PRIMARY KEY (`cart_rule_id`,`channel_id`),
  ADD KEY `cart_rule_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_coupons_cart_rule_id_foreign` (`cart_rule_id`);

--
-- Indexes for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` (`cart_rule_coupon_id`),
  ADD KEY `cart_rule_coupon_usage_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_rule_customers_cart_rule_id_foreign` (`cart_rule_id`),
  ADD KEY `cart_rule_customers_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cart_rule_customer_groups`
--
ALTER TABLE `cart_rule_customer_groups`
  ADD PRIMARY KEY (`cart_rule_id`,`customer_group_id`),
  ADD KEY `cart_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_rule_translations_cart_rule_id_locale_unique` (`cart_rule_id`,`locale`);

--
-- Indexes for table `cart_shipping_rates`
--
ALTER TABLE `cart_shipping_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_rules`
--
ALTER TABLE `catalog_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog_rule_channels`
--
ALTER TABLE `catalog_rule_channels`
  ADD PRIMARY KEY (`catalog_rule_id`,`channel_id`),
  ADD KEY `catalog_rule_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `catalog_rule_customer_groups`
--
ALTER TABLE `catalog_rule_customer_groups`
  ADD PRIMARY KEY (`catalog_rule_id`,`customer_group_id`),
  ADD KEY `catalog_rule_customer_groups_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_rule_products_product_id_foreign` (`product_id`),
  ADD KEY `catalog_rule_products_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `catalog_rule_products_catalog_rule_id_foreign` (`catalog_rule_id`),
  ADD KEY `catalog_rule_products_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_rule_product_prices_product_id_foreign` (`product_id`),
  ADD KEY `catalog_rule_product_prices_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `catalog_rule_product_prices_catalog_rule_id_foreign` (`catalog_rule_id`),
  ADD KEY `catalog_rule_product_prices_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_assets`
--
ALTER TABLE `categories_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_filterable_attributes`
--
ALTER TABLE `category_filterable_attributes`
  ADD KEY `category_filterable_attributes_category_id_foreign` (`category_id`),
  ADD KEY `category_filterable_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_slug_locale_unique` (`category_id`,`slug`,`locale`),
  ADD KEY `category_translations_locale_id_foreign` (`locale_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channels_root_category_id_foreign` (`root_category_id`),
  ADD KEY `channels_default_locale_id_foreign` (`default_locale_id`),
  ADD KEY `channels_base_currency_id_foreign` (`base_currency_id`);

--
-- Indexes for table `channel_currencies`
--
ALTER TABLE `channel_currencies`
  ADD PRIMARY KEY (`channel_id`,`currency_id`),
  ADD KEY `channel_currencies_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `channel_inventory_sources`
--
ALTER TABLE `channel_inventory_sources`
  ADD UNIQUE KEY `channel_inventory_sources_channel_id_inventory_source_id_unique` (`channel_id`,`inventory_source_id`),
  ADD KEY `channel_inventory_sources_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `channel_locales`
--
ALTER TABLE `channel_locales`
  ADD PRIMARY KEY (`channel_id`,`locale_id`),
  ADD KEY `channel_locales_locale_id_foreign` (`locale_id`);

--
-- Indexes for table `channel_translations`
--
ALTER TABLE `channel_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `channel_translations_channel_id_locale_unique` (`channel_id`,`locale`),
  ADD KEY `channel_translations_locale_index` (`locale`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_page_channels`
--
ALTER TABLE `cms_page_channels`
  ADD UNIQUE KEY `cms_page_channels_cms_page_id_channel_id_unique` (`cms_page_id`,`channel_id`),
  ADD KEY `cms_page_channels_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_page_translations_cms_page_id_url_key_locale_unique` (`cms_page_id`,`url_key`,`locale`);

--
-- Indexes for table `compare_items`
--
ALTER TABLE `compare_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compare_items_product_id_foreign` (`product_id`),
  ADD KEY `compare_items_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `core_config`
--
ALTER TABLE `core_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_states`
--
ALTER TABLE `country_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_states_country_id_foreign` (`country_id`);

--
-- Indexes for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_state_translations_country_state_id_foreign` (`country_state_id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_translations_country_id_foreign` (`country_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currency_exchange_rates_target_currency_unique` (`target_currency`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_api_token_unique` (`api_token`),
  ADD KEY `customers_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `customer_attributes`
--
ALTER TABLE `customer_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_attribute_options`
--
ALTER TABLE `customer_attribute_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_attribute_values`
--
ALTER TABLE `customer_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_attribute_values_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_groups_code_unique` (`code`);

--
-- Indexes for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_notes_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_password_resets`
--
ALTER TABLE `customer_password_resets`
  ADD KEY `customer_password_resets_email_index` (`email`);

--
-- Indexes for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_social_accounts_provider_id_unique` (`provider_id`),
  ADD KEY `customer_social_accounts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloadable_link_purchased_customer_id_foreign` (`customer_id`),
  ADD KEY `downloadable_link_purchased_order_id_foreign` (`order_id`),
  ADD KEY `downloadable_link_purchased_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `ekyc_verifications`
--
ALTER TABLE `ekyc_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_batches`
--
ALTER TABLE `import_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `import_batches_import_id_foreign` (`import_id`);

--
-- Indexes for table `import_products`
--
ALTER TABLE `import_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `import_products_attribute_family_id_foreign` (`attribute_family_id`),
  ADD KEY `import_products_bulk_product_importer_id_foreign` (`bulk_product_importer_id`);

--
-- Indexes for table `inventory_sources`
--
ALTER TABLE `inventory_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_sources_code_unique` (`code`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locales_code_unique` (`code`);

--
-- Indexes for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketing_campaigns_channel_id_foreign` (`channel_id`),
  ADD KEY `marketing_campaigns_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `marketing_campaigns_marketing_template_id_foreign` (`marketing_template_id`),
  ADD KEY `marketing_campaigns_marketing_event_id_foreign` (`marketing_event_id`);

--
-- Indexes for table `marketing_events`
--
ALTER TABLE `marketing_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing_templates`
--
ALTER TABLE `marketing_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_increment_id_unique` (`increment_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_comments_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_parent_id_foreign` (`parent_id`),
  ADD KEY `order_items_tax_category_id_foreign` (`tax_category_id`);

--
-- Indexes for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_payment_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_attribute_family_id_foreign` (`attribute_family_id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chanel_locale_attribute_value_index_unique` (`channel`,`locale`,`attribute_id`,`product_id`),
  ADD UNIQUE KEY `product_attribute_values_unique_id_unique` (`unique_id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_bundle_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bundle_option_products_product_id_bundle_option_id_unique` (`product_id`,`product_bundle_option_id`),
  ADD KEY `product_bundle_option_products_product_id_foreign` (`product_id`),
  ADD KEY `product_bundle_option_products_product_bundle_option_id_foreign` (`product_bundle_option_id`);

--
-- Indexes for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_bundle_option_translations_option_id_locale_unique` (`product_bundle_option_id`,`locale`),
  ADD UNIQUE KEY `bundle_option_translations_locale_label_bundle_option_id_unique` (`locale`,`label`,`product_bundle_option_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD UNIQUE KEY `product_categories_product_id_category_id_unique` (`product_id`,`category_id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_cross_sells`
--
ALTER TABLE `product_cross_sells`
  ADD UNIQUE KEY `product_cross_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_cross_sells_parent_id_foreign` (`parent_id`),
  ADD KEY `product_cross_sells_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_customer_group_prices_unique_id_unique` (`unique_id`),
  ADD KEY `product_customer_group_prices_product_id_foreign` (`product_id`),
  ADD KEY `product_customer_group_prices_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_downloadable_links_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_translations_link_id_foreign` (`product_downloadable_link_id`);

--
-- Indexes for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_downloadable_samples_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sample_translations_sample_id_foreign` (`product_downloadable_sample_id`);

--
-- Indexes for table `product_flat`
--
ALTER TABLE `product_flat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_flat_unique_index` (`product_id`,`channel`,`locale`),
  ADD KEY `product_flat_attribute_family_id_foreign` (`attribute_family_id`),
  ADD KEY `product_flat_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_grouped_products_product_id_associated_product_id_unique` (`product_id`,`associated_product_id`),
  ADD KEY `product_grouped_products_product_id_foreign` (`product_id`),
  ADD KEY `product_grouped_products_associated_product_id_foreign` (`associated_product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_source_vendor_index_unique` (`product_id`,`inventory_source_id`,`vendor_id`),
  ADD KEY `product_inventories_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_inventory_indices_product_id_channel_id_unique` (`product_id`,`channel_id`),
  ADD KEY `product_inventory_indices_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_ordered_inventories_product_id_channel_id_unique` (`product_id`,`channel_id`),
  ADD KEY `product_ordered_inventories_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price_indices_product_id_customer_group_id_channel_id_unique` (`product_id`,`customer_group_id`,`channel_id`),
  ADD KEY `product_price_indices_customer_group_id_foreign` (`customer_group_id`),
  ADD KEY `product_price_indices_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `product_properties`
--
ALTER TABLE `product_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_property_flats`
--
ALTER TABLE `product_property_flats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_relations`
--
ALTER TABLE `product_relations`
  ADD UNIQUE KEY `product_relations_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_relations_parent_id_foreign` (`parent_id`),
  ADD KEY `product_relations_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_images_review_id_foreign` (`review_id`);

--
-- Indexes for table `product_super_attributes`
--
ALTER TABLE `product_super_attributes`
  ADD UNIQUE KEY `product_super_attributes_product_id_attribute_id_unique` (`product_id`,`attribute_id`),
  ADD KEY `product_super_attributes_product_id_foreign` (`product_id`),
  ADD KEY `product_super_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_up_sells`
--
ALTER TABLE `product_up_sells`
  ADD UNIQUE KEY `product_up_sells_parent_id_child_id_unique` (`parent_id`,`child_id`),
  ADD KEY `product_up_sells_parent_id_foreign` (`parent_id`),
  ADD KEY `product_up_sells_child_id_foreign` (`child_id`);

--
-- Indexes for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_videos_product_id_foreign` (`product_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_order_id_foreign` (`order_id`);

--
-- Indexes for table `refund_items`
--
ALTER TABLE `refund_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refund_items_parent_id_foreign` (`parent_id`),
  ADD KEY `refund_items_order_item_id_foreign` (`order_item_id`),
  ADD KEY `refund_items_refund_id_foreign` (`refund_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_synonyms`
--
ALTER TABLE `search_synonyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `search_terms_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`),
  ADD KEY `shipments_inventory_source_id_foreign` (`inventory_source_id`);

--
-- Indexes for table `shipment_items`
--
ALTER TABLE `shipment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipment_items_shipment_id_foreign` (`shipment_id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_list_customer_id_foreign` (`customer_id`),
  ADD KEY `subscribers_list_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `tax_categories`
--
ALTER TABLE `tax_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_categories_code_unique` (`code`);

--
-- Indexes for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_map_index_unique` (`tax_category_id`,`tax_rate_id`),
  ADD KEY `tax_categories_tax_rates_tax_rate_id_foreign` (`tax_rate_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_rates_identifier_unique` (`identifier`);

--
-- Indexes for table `theme_customizations`
--
ALTER TABLE `theme_customizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_customization_translations_theme_customization_id_foreign` (`theme_customization_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_faqs`
--
ALTER TABLE `ticket_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_faqs_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_files_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_status`
--
ALTER TABLE `ticket_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_rewrites`
--
ALTER TABLE `url_rewrites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  ADD KEY `visits_visitor_type_visitor_id_index` (`visitor_type`,`visitor_id`);

--
-- Indexes for table `webhook_calls`
--
ALTER TABLE `webhook_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_channel_id_foreign` (`channel_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`),
  ADD KEY `wishlist_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_items_channel_id_foreign` (`channel_id`),
  ADD KEY `wishlist_items_product_id_foreign` (`product_id`),
  ADD KEY `wishlist_items_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `attribute_families`
--
ALTER TABLE `attribute_families`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bulk_product_importers`
--
ALTER TABLE `bulk_product_importers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cart_item_inventories`
--
ALTER TABLE `cart_item_inventories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_payment`
--
ALTER TABLE `cart_payment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_rules`
--
ALTER TABLE `cart_rules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_shipping_rates`
--
ALTER TABLE `cart_shipping_rates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `catalog_rules`
--
ALTER TABLE `catalog_rules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories_assets`
--
ALTER TABLE `categories_assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `channel_translations`
--
ALTER TABLE `channel_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `compare_items`
--
ALTER TABLE `compare_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_config`
--
ALTER TABLE `core_config`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `country_states`
--
ALTER TABLE `country_states`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- AUTO_INCREMENT for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2291;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_attributes`
--
ALTER TABLE `customer_attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `customer_attribute_options`
--
ALTER TABLE `customer_attribute_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `customer_attribute_values`
--
ALTER TABLE `customer_attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekyc_verifications`
--
ALTER TABLE `ekyc_verifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_batches`
--
ALTER TABLE `import_batches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_products`
--
ALTER TABLE `import_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inventory_sources`
--
ALTER TABLE `inventory_sources`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11780;

--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing_events`
--
ALTER TABLE `marketing_events`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing_templates`
--
ALTER TABLE `marketing_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_comments`
--
ALTER TABLE `order_comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=698;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17057;

--
-- AUTO_INCREMENT for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_flat`
--
ALTER TABLE `product_flat`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=696;

--
-- AUTO_INCREMENT for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2565;

--
-- AUTO_INCREMENT for table `product_inventories`
--
ALTER TABLE `product_inventories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=938;

--
-- AUTO_INCREMENT for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2782;

--
-- AUTO_INCREMENT for table `product_properties`
--
ALTER TABLE `product_properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_property_flats`
--
ALTER TABLE `product_property_flats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_items`
--
ALTER TABLE `refund_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `search_synonyms`
--
ALTER TABLE `search_synonyms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `search_terms`
--
ALTER TABLE `search_terms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipment_items`
--
ALTER TABLE `shipment_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_categories`
--
ALTER TABLE `tax_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme_customizations`
--
ALTER TABLE `theme_customizations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ticket_faqs`
--
ALTER TABLE `ticket_faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ticket_reasons`
--
ALTER TABLE `ticket_reasons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_status`
--
ALTER TABLE `ticket_status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `url_rewrites`
--
ALTER TABLE `url_rewrites`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `webhook_calls`
--
ALTER TABLE `webhook_calls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addresses_parent_address_id_foreign` FOREIGN KEY (`parent_address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `attribute_groups`
--
ALTER TABLE `attribute_groups`
  ADD CONSTRAINT `attribute_groups_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_group_mappings`
--
ALTER TABLE `attribute_group_mappings`
  ADD CONSTRAINT `attribute_group_mappings_attribute_group_id_foreign` FOREIGN KEY (`attribute_group_id`) REFERENCES `attribute_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_group_mappings_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD CONSTRAINT `attribute_options_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_option_translations`
--
ALTER TABLE `attribute_option_translations`
  ADD CONSTRAINT `attribute_option_translations_attribute_option_id_foreign` FOREIGN KEY (`attribute_option_id`) REFERENCES `attribute_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD CONSTRAINT `attribute_translations_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bulk_product_importers`
--
ALTER TABLE `bulk_product_importers`
  ADD CONSTRAINT `bulk_product_importers_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cart_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`);

--
-- Constraints for table `cart_payment`
--
ALTER TABLE `cart_payment`
  ADD CONSTRAINT `cart_payment_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_channels`
--
ALTER TABLE `cart_rule_channels`
  ADD CONSTRAINT `cart_rule_channels_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_coupons`
--
ALTER TABLE `cart_rule_coupons`
  ADD CONSTRAINT `cart_rule_coupons_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_coupon_usage`
--
ALTER TABLE `cart_rule_coupon_usage`
  ADD CONSTRAINT `cart_rule_coupon_usage_cart_rule_coupon_id_foreign` FOREIGN KEY (`cart_rule_coupon_id`) REFERENCES `cart_rule_coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_coupon_usage_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_customers`
--
ALTER TABLE `cart_rule_customers`
  ADD CONSTRAINT `cart_rule_customers_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_customer_groups`
--
ALTER TABLE `cart_rule_customer_groups`
  ADD CONSTRAINT `cart_rule_customer_groups_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_rule_translations`
--
ALTER TABLE `cart_rule_translations`
  ADD CONSTRAINT `cart_rule_translations_cart_rule_id_foreign` FOREIGN KEY (`cart_rule_id`) REFERENCES `cart_rules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_channels`
--
ALTER TABLE `catalog_rule_channels`
  ADD CONSTRAINT `catalog_rule_channels_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_customer_groups`
--
ALTER TABLE `catalog_rule_customer_groups`
  ADD CONSTRAINT `catalog_rule_customer_groups_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_products`
--
ALTER TABLE `catalog_rule_products`
  ADD CONSTRAINT `catalog_rule_products_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `catalog_rule_product_prices`
--
ALTER TABLE `catalog_rule_product_prices`
  ADD CONSTRAINT `catalog_rule_product_prices_catalog_rule_id_foreign` FOREIGN KEY (`catalog_rule_id`) REFERENCES `catalog_rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `catalog_rule_product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_filterable_attributes`
--
ALTER TABLE `category_filterable_attributes`
  ADD CONSTRAINT `category_filterable_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_filterable_attributes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_base_currency_id_foreign` FOREIGN KEY (`base_currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `channels_default_locale_id_foreign` FOREIGN KEY (`default_locale_id`) REFERENCES `locales` (`id`),
  ADD CONSTRAINT `channels_root_category_id_foreign` FOREIGN KEY (`root_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `channel_currencies`
--
ALTER TABLE `channel_currencies`
  ADD CONSTRAINT `channel_currencies_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_currencies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_inventory_sources`
--
ALTER TABLE `channel_inventory_sources`
  ADD CONSTRAINT `channel_inventory_sources_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_inventory_sources_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_locales`
--
ALTER TABLE `channel_locales`
  ADD CONSTRAINT `channel_locales_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_locales_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `channel_translations`
--
ALTER TABLE `channel_translations`
  ADD CONSTRAINT `channel_translations_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_page_channels`
--
ALTER TABLE `cms_page_channels`
  ADD CONSTRAINT `cms_page_channels_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_page_channels_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_page_translations`
--
ALTER TABLE `cms_page_translations`
  ADD CONSTRAINT `cms_page_translations_cms_page_id_foreign` FOREIGN KEY (`cms_page_id`) REFERENCES `cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `compare_items`
--
ALTER TABLE `compare_items`
  ADD CONSTRAINT `compare_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compare_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country_states`
--
ALTER TABLE `country_states`
  ADD CONSTRAINT `country_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_state_translations`
--
ALTER TABLE `country_state_translations`
  ADD CONSTRAINT `country_state_translations_country_state_id_foreign` FOREIGN KEY (`country_state_id`) REFERENCES `country_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currency_exchange_rates`
--
ALTER TABLE `currency_exchange_rates`
  ADD CONSTRAINT `currency_exchange_rates_target_currency_foreign` FOREIGN KEY (`target_currency`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `customer_attribute_values`
--
ALTER TABLE `customer_attribute_values`
  ADD CONSTRAINT `customer_attribute_values_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD CONSTRAINT `customer_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_social_accounts`
--
ALTER TABLE `customer_social_accounts`
  ADD CONSTRAINT `customer_social_accounts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `downloadable_link_purchased`
--
ALTER TABLE `downloadable_link_purchased`
  ADD CONSTRAINT `downloadable_link_purchased_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloadable_link_purchased_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloadable_link_purchased_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `import_batches`
--
ALTER TABLE `import_batches`
  ADD CONSTRAINT `import_batches_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `import_products`
--
ALTER TABLE `import_products`
  ADD CONSTRAINT `import_products_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `import_products_bulk_product_importer_id_foreign` FOREIGN KEY (`bulk_product_importer_id`) REFERENCES `bulk_product_importers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `invoice_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marketing_campaigns`
--
ALTER TABLE `marketing_campaigns`
  ADD CONSTRAINT `marketing_campaigns_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_marketing_event_id_foreign` FOREIGN KEY (`marketing_event_id`) REFERENCES `marketing_events` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marketing_campaigns_marketing_template_id_foreign` FOREIGN KEY (`marketing_template_id`) REFERENCES `marketing_templates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_comments`
--
ALTER TABLE `order_comments`
  ADD CONSTRAINT `order_comments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`);

--
-- Constraints for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD CONSTRAINT `order_payment_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD CONSTRAINT `order_transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `products_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_options`
--
ALTER TABLE `product_bundle_options`
  ADD CONSTRAINT `product_bundle_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_option_products`
--
ALTER TABLE `product_bundle_option_products`
  ADD CONSTRAINT `product_bundle_option_products_product_bundle_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_bundle_option_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_bundle_option_translations`
--
ALTER TABLE `product_bundle_option_translations`
  ADD CONSTRAINT `product_bundle_option_translations_option_id_foreign` FOREIGN KEY (`product_bundle_option_id`) REFERENCES `product_bundle_options` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_cross_sells`
--
ALTER TABLE `product_cross_sells`
  ADD CONSTRAINT `product_cross_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_cross_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_customer_group_prices`
--
ALTER TABLE `product_customer_group_prices`
  ADD CONSTRAINT `product_customer_group_prices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_customer_group_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_links`
--
ALTER TABLE `product_downloadable_links`
  ADD CONSTRAINT `product_downloadable_links_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_link_translations`
--
ALTER TABLE `product_downloadable_link_translations`
  ADD CONSTRAINT `link_translations_link_id_foreign` FOREIGN KEY (`product_downloadable_link_id`) REFERENCES `product_downloadable_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_samples`
--
ALTER TABLE `product_downloadable_samples`
  ADD CONSTRAINT `product_downloadable_samples_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_downloadable_sample_translations`
--
ALTER TABLE `product_downloadable_sample_translations`
  ADD CONSTRAINT `sample_translations_sample_id_foreign` FOREIGN KEY (`product_downloadable_sample_id`) REFERENCES `product_downloadable_samples` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_flat`
--
ALTER TABLE `product_flat`
  ADD CONSTRAINT `product_flat_attribute_family_id_foreign` FOREIGN KEY (`attribute_family_id`) REFERENCES `attribute_families` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `product_flat_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_flat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_flat_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_grouped_products`
--
ALTER TABLE `product_grouped_products`
  ADD CONSTRAINT `product_grouped_products_associated_product_id_foreign` FOREIGN KEY (`associated_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_grouped_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventories`
--
ALTER TABLE `product_inventories`
  ADD CONSTRAINT `product_inventories_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_inventory_indices`
--
ALTER TABLE `product_inventory_indices`
  ADD CONSTRAINT `product_inventory_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_inventory_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_ordered_inventories`
--
ALTER TABLE `product_ordered_inventories`
  ADD CONSTRAINT `product_ordered_inventories_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ordered_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_price_indices`
--
ALTER TABLE `product_price_indices`
  ADD CONSTRAINT `product_price_indices_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_price_indices_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_price_indices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_relations`
--
ALTER TABLE `product_relations`
  ADD CONSTRAINT `product_relations_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_relations_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_review_attachments`
--
ALTER TABLE `product_review_attachments`
  ADD CONSTRAINT `product_review_images_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `product_reviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_super_attributes`
--
ALTER TABLE `product_super_attributes`
  ADD CONSTRAINT `product_super_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `product_super_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_up_sells`
--
ALTER TABLE `product_up_sells`
  ADD CONSTRAINT `product_up_sells_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_up_sells_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `product_videos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refund_items`
--
ALTER TABLE `refund_items`
  ADD CONSTRAINT `refund_items_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refund_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `refund_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `refund_items_refund_id_foreign` FOREIGN KEY (`refund_id`) REFERENCES `refunds` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD CONSTRAINT `search_terms_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_inventory_source_id_foreign` FOREIGN KEY (`inventory_source_id`) REFERENCES `inventory_sources` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipment_items`
--
ALTER TABLE `shipment_items`
  ADD CONSTRAINT `shipment_items_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD CONSTRAINT `subscribers_list_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribers_list_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tax_categories_tax_rates`
--
ALTER TABLE `tax_categories_tax_rates`
  ADD CONSTRAINT `tax_categories_tax_rates_tax_category_id_foreign` FOREIGN KEY (`tax_category_id`) REFERENCES `tax_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tax_categories_tax_rates_tax_rate_id_foreign` FOREIGN KEY (`tax_rate_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theme_customization_translations`
--
ALTER TABLE `theme_customization_translations`
  ADD CONSTRAINT `theme_customization_translations_theme_customization_id_foreign` FOREIGN KEY (`theme_customization_id`) REFERENCES `theme_customizations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_faqs`
--
ALTER TABLE `ticket_faqs`
  ADD CONSTRAINT `ticket_faqs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `ticket_files_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `wishlist_items_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

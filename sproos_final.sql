-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 01:19 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sproos_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `class_id`, `user_id`, `name`, `description`, `created_at`) VALUES
(1, 1, 1, 'Account Created', 'You created your account', '2017-06-17 12:34:20'),
(2, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 12:34:45'),
(3, 2, 1, 'Add product', 'You added item 1 to your products', '2017-06-17 12:37:56'),
(4, 1, 1, 'Update profile', 'You updated your profile', '2017-06-17 12:39:38'),
(5, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 12:47:39'),
(6, 1, 1, 'Change profile picture', 'You changed your profile picture', '2017-06-17 12:48:35'),
(7, 1, 2, 'Account Created', 'You created your account', '2017-06-17 12:50:56'),
(8, 2, 2, 'Add to cart', 'Item 1 added to cart', '2017-06-17 13:12:03'),
(9, 2, 2, 'Remove from cart', 'You removed item from cart', '2017-06-17 13:49:01'),
(10, 2, 2, 'Add to cart', 'Item 1 added to cart', '2017-06-17 13:51:09'),
(11, 2, 2, 'Remove from cart', 'You removed item from cart', '2017-06-17 13:51:14'),
(12, 2, 2, 'Add to cart', 'Item 1 added to cart', '2017-06-17 13:51:52'),
(13, 2, 2, 'Remove from cart', 'You removed item from cart', '2017-06-17 13:52:19'),
(14, 2, 2, 'Add to cart', 'Item 1 added to cart', '2017-06-17 13:53:07'),
(15, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-17 14:38:31'),
(16, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-17 14:41:36'),
(17, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-17 14:44:01'),
(18, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 5', '2017-06-17 14:44:06'),
(19, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-17 14:44:10'),
(20, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-17 14:44:12'),
(21, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-17 14:44:15'),
(22, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 1', '2017-06-17 14:44:16'),
(23, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-17 14:44:20'),
(24, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-17 14:44:22'),
(25, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-17 14:44:23'),
(26, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 5', '2017-06-17 14:44:25'),
(27, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 14:58:00'),
(28, 2, 1, 'Add product', 'You added item 2 to your products', '2017-06-17 15:00:23'),
(29, 2, 1, 'Add product', 'You added item 3 to your products', '2017-06-17 15:02:14'),
(30, 2, 1, 'Delete product', 'You deleted product 2', '2017-06-17 15:04:16'),
(31, 2, 1, 'Delete product', 'You deleted product 3', '2017-06-17 15:11:16'),
(32, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 15:13:42'),
(33, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 15:16:58'),
(34, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 15:20:24'),
(35, 2, 0, 'Add to cart', 'Item 3 added to cart', '2017-06-17 15:20:52'),
(36, 2, 0, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-17 15:22:18'),
(37, 2, 0, 'Add to cart', 'Item 1 added to cart', '2017-06-17 15:29:26'),
(38, 2, 0, 'Add to cart', 'Item 3 added to cart', '2017-06-17 15:31:07'),
(39, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 15:51:10'),
(40, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 15:57:56'),
(41, 1, 1, 'Log in', 'You logged into your account', '2017-06-17 16:00:30'),
(42, 1, 2, 'Log in', 'You logged into your account', '2017-06-17 21:11:27'),
(43, 2, 2, 'Add to cart', 'Item 3 added to cart', '2017-06-17 21:12:33'),
(44, 1, 2, 'Update profile', 'You updated your profile', '2017-06-17 23:17:02'),
(45, 2, 2, 'Remove from cart', 'You removed item from cart', '2017-06-17 23:17:55'),
(46, 2, 2, 'Add product', 'You added item 4 to your products', '2017-06-19 07:23:32'),
(47, 2, 2, 'Add product', 'You added item 5 to your products', '2017-06-19 07:27:07'),
(48, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-19 07:31:45'),
(49, 1, 1, 'Log in', 'You logged into your account', '2017-06-19 16:23:45'),
(50, 2, 1, 'Delete product', 'You deleted product 3', '2017-06-20 06:34:53'),
(51, 2, 0, 'Discount item', 'Item 1 marked down', '2017-06-20 11:01:38'),
(52, 2, 0, 'Discount item', 'Item 2 marked down', '2017-06-20 11:09:52'),
(53, 2, 1, 'Discount item', 'Item 2 marked down', '2017-06-20 11:20:28'),
(54, 2, 1, 'Add to cart', 'Item 1 added to cart', '2017-06-20 11:56:16'),
(55, 2, 1, 'Add to cart', 'Item 5 added to cart', '2017-06-20 16:51:24'),
(56, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-20 18:46:59'),
(57, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-20 18:47:00'),
(58, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-20 18:47:01'),
(59, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-20 18:47:03'),
(60, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-20 18:48:01'),
(61, 1, 1, 'Log in', 'You logged into your account', '2017-06-20 18:49:34'),
(62, 2, 1, 'Add product', 'You added item 6 to your products', '2017-06-20 21:44:17'),
(63, 2, 1, 'Add product', 'You added item 6 to your products', '2017-06-20 21:49:32'),
(64, 2, 1, 'Add product', 'You added item 7 to your products', '2017-06-20 21:59:50'),
(65, 2, 1, 'Add product', 'You added item 8 to your products', '2017-06-20 22:04:49'),
(66, 2, 1, 'Add product', 'You added item 9 to your products', '2017-06-20 22:08:32'),
(67, 2, 1, 'Add product', 'You added item 10 to your products', '2017-06-20 22:17:34'),
(68, 1, 2, 'Log in', 'You logged into your account', '2017-06-20 22:19:01'),
(69, 2, 2, 'Add product', 'You added item 11 to your products', '2017-06-20 22:26:48'),
(70, 2, 2, 'Add product', 'You added item 12 to your products', '2017-06-20 22:35:22'),
(71, 2, 2, 'Add product', 'You added item 13 to your products', '2017-06-20 22:39:13'),
(72, 2, 2, 'Add product', 'You added item 14 to your products', '2017-06-20 22:42:40'),
(73, 2, 2, 'Discount item', 'Item 16 marked down', '2017-06-20 22:49:50'),
(74, 2, 2, 'Discount item', 'Item 15 marked down', '2017-06-20 22:51:09'),
(75, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 09:27:12'),
(76, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 09:37:55'),
(77, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 10:30:08'),
(78, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 10:44:19'),
(79, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 10:52:04'),
(80, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 10:58:06'),
(81, 1, 1, 'Log in', 'You logged into your account', '2017-06-23 11:07:01'),
(82, 1, 3, 'Account Created', 'You created your account', '2017-06-26 06:15:11'),
(83, 2, 3, 'Add to cart', 'Item 11 added to cart', '2017-06-26 06:20:44'),
(84, 2, 3, 'Add to cart', 'Item 10 added to cart', '2017-06-26 06:20:45'),
(85, 2, 3, 'Add to cart', 'Item 8 added to cart', '2017-06-26 06:20:50'),
(86, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-26 06:21:02'),
(87, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-26 06:21:27'),
(88, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-26 06:21:27'),
(89, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-26 06:21:28'),
(90, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 5', '2017-06-26 06:21:28'),
(91, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-26 06:21:41'),
(92, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-06-26 06:29:21'),
(93, 2, 3, 'Add to cart', 'Item 17 added to cart', '2017-06-26 06:36:31'),
(94, 1, 3, 'Update profile', 'You updated your profile', '2017-06-26 06:55:21'),
(95, 2, 3, 'Add to cart', 'Item 14 added to cart', '2017-06-26 06:55:55'),
(96, 2, 3, 'Add to cart', 'Item 1 added to cart', '2017-06-26 08:21:25'),
(97, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-06-26 08:24:43'),
(98, 2, 3, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-06-26 08:24:44'),
(99, 2, 3, 'Remove from cart', 'You removed item from cart', '2017-06-26 08:25:19'),
(100, 2, 3, 'Remove from cart', 'You removed item from cart', '2017-06-26 08:25:21'),
(101, 2, 3, 'Add to cart', 'Item 12 added to cart', '2017-06-27 03:40:45'),
(102, 2, 3, 'Clear products', 'You cleared all your products', '2017-06-27 10:29:23'),
(103, 1, 3, 'Change password', 'You changed your password', '2017-06-27 10:41:21'),
(104, 1, 3, 'Change password', 'You changed your password', '2017-06-27 10:41:53'),
(105, 2, 1, 'Discount item', 'Item 17 marked down', '2017-07-01 06:19:52'),
(106, 2, 1, 'Add to cart', 'Item 15 added to cart', '2017-07-05 20:45:03'),
(107, 2, 1, 'Add to cart', 'Item 12 added to cart', '2017-07-06 08:52:49'),
(108, 2, 1, 'Add to cart', 'Item 15 added to cart', '2017-07-06 08:52:55'),
(109, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-06 08:52:58'),
(110, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-06 08:52:59'),
(111, 2, 1, 'Add to cart', 'Item 17 added to cart', '2017-07-06 08:53:55'),
(112, 2, 1, 'Add to cart', 'Item 17 added to cart', '2017-07-06 09:21:14'),
(113, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-06 09:21:21'),
(114, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-06 09:21:22'),
(115, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-06 10:58:12'),
(116, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-06 10:59:39'),
(117, 3, 1, 'Address Confirmed', 'Address confirmed for order AE1000200', '2017-07-06 12:25:38'),
(118, 2, 1, 'Product ordered', '3 units of product 17 have been ordered', '2017-07-06 12:47:19'),
(119, 3, 1, 'Address Confirmed', 'Address confirmed for order AE1000200', '2017-07-06 12:47:19'),
(120, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-06 12:51:58'),
(121, 2, 1, 'Add to cart', 'Item 17 added to cart', '2017-07-06 12:55:26'),
(122, 2, 1, 'Add to cart', 'Item 14 added to cart', '2017-07-06 12:57:34'),
(123, 2, 1, 'Remove from cart', 'You removed item from cart', '2017-07-06 12:57:39'),
(124, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-06 12:57:42'),
(125, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-06 12:57:42'),
(126, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-06 12:57:44'),
(127, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-06 12:57:46'),
(128, 2, 1, 'Product ordered', '3 units of product 14 have been ordered', '2017-07-06 13:08:02'),
(129, 3, 1, 'Address Confirmed', 'Address confirmed for order AE1000200', '2017-07-06 13:08:03'),
(130, 2, 1, 'Add to cart', 'Item 13 added to cart', '2017-07-10 06:27:58'),
(131, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-10 06:28:01'),
(132, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-10 06:28:04'),
(133, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-10 06:28:13'),
(134, 2, 1, 'Add to cart', 'Item 12 added to cart', '2017-07-10 06:28:48'),
(135, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-10 06:28:54'),
(136, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-10 06:28:58'),
(137, 2, 1, 'Add to cart', 'Item 17 added to cart', '2017-07-10 06:36:05'),
(138, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-10 06:36:16'),
(139, 1, 1, 'Log in', 'You logged into your account', '2017-07-10 14:32:36'),
(140, 2, 1, 'Add to cart', 'Item 17 added to cart', '2017-07-10 17:43:06'),
(141, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-10 17:43:32'),
(142, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-10 17:46:26'),
(143, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-10 17:48:20'),
(144, 2, 1, 'Add product', 'You added item 17 to your products', '2017-07-10 18:25:31'),
(145, 2, 1, 'Edit Product', 'You editted your product', '2017-07-10 18:48:26'),
(146, 2, 1, 'Edit Product', 'You editted your product', '2017-07-10 18:52:50'),
(147, 2, 1, 'Add product', 'You added item 18 to your products', '2017-07-10 18:55:50'),
(148, 2, 1, 'Edit Product', 'You editted your product', '2017-07-10 19:00:03'),
(149, 1, 2, 'Log in', 'You logged into your account', '2017-07-10 19:01:40'),
(150, 1, 1, 'Log in', 'You logged into your account', '2017-07-10 19:02:01'),
(151, 2, 1, 'Edit Product', 'You editted your product', '2017-07-10 19:02:45'),
(152, 2, 0, 'Add to cart', 'Item 19 added to cart', '2017-07-10 19:03:56'),
(153, 1, 1, 'Log in', 'You logged into your account', '2017-07-10 19:04:29'),
(154, 2, 1, 'Edit Product', 'You editted your product', '2017-07-10 19:16:29'),
(155, 2, 1, 'Delete product', 'You deleted product 18', '2017-07-10 19:17:00'),
(156, 2, 1, 'Delete product', 'You deleted product 19', '2017-07-10 19:17:05'),
(157, 2, 1, 'Add product', 'You added item 19 to your products', '2017-07-10 19:19:37'),
(158, 1, 1, 'Log in', 'You logged into your account', '2017-07-12 06:29:48'),
(159, 2, 1, 'Add to cart', 'Item 12 added to cart', '2017-07-12 06:31:42'),
(160, 2, 1, 'Discount item', 'Item 11 marked down', '2017-07-12 06:32:35'),
(161, 2, 1, 'Add to cart', 'Item 15 added to cart', '2017-07-12 06:32:47'),
(162, 2, 1, 'Add to cart', 'Item 14 added to cart', '2017-07-12 06:33:20'),
(163, 2, 1, 'Add to cart', 'Item 13 added to cart', '2017-07-12 06:33:22'),
(164, 2, 1, 'Add to cart', 'Item 16 added to cart', '2017-07-12 06:33:38'),
(165, 2, 1, 'Edit Product', 'You editted your product', '2017-07-12 06:34:41'),
(166, 3, 1, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-12 06:35:19'),
(167, 3, 1, 'Payment Confirmed', 'Payment confirmed for order AE1000200', '2017-07-12 06:35:54'),
(168, 2, 1, 'Product ordered', 'You have ordered 1 units of product 12', '2017-07-12 06:36:23'),
(169, 2, 2, 'Product ordered', '1 units of your product 12 have been ordered', '2017-07-12 06:36:23'),
(170, 2, 1, 'Product ordered', 'You have ordered 1 units of product 15', '2017-07-12 06:36:23'),
(171, 2, 2, 'Product ordered', '1 units of your product 15 have been ordered', '2017-07-12 06:36:23'),
(172, 2, 1, 'Product ordered', 'You have ordered 1 units of product 14', '2017-07-12 06:36:23'),
(173, 2, 2, 'Product ordered', '1 units of your product 14 have been ordered', '2017-07-12 06:36:23'),
(174, 2, 1, 'Product ordered', 'You have ordered 1 units of product 13', '2017-07-12 06:36:23'),
(175, 2, 2, 'Product ordered', '1 units of your product 13 have been ordered', '2017-07-12 06:36:23'),
(176, 2, 1, 'Product ordered', 'You have ordered 1 units of product 16', '2017-07-12 06:36:23'),
(177, 2, 2, 'Product ordered', '1 units of your product 16 have been ordered', '2017-07-12 06:36:23'),
(178, 3, 1, 'Address Confirmed', 'Address confirmed for order AE1000200', '2017-07-12 06:36:23'),
(179, 1, 2, 'Log in', 'You logged into your account', '2017-07-12 06:37:38'),
(180, 3, 2, 'Order Confirmed', 'You confirmed order AE1000200', '2017-07-12 06:38:52'),
(181, 2, 2, 'Add to cart', 'Item 17 added to cart', '2017-07-12 06:54:58'),
(182, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-12 06:55:04'),
(183, 3, 2, 'Order Confirmed', 'You confirmed order L6DK0CTCH8', '2017-07-12 06:55:06'),
(184, 2, 1, 'Add to cart', 'Item 16 added to cart', '2017-07-14 20:32:35'),
(185, 3, 1, 'Order Confirmed', 'You confirmed order 1C06WSHG24', '2017-07-14 20:32:40'),
(186, 3, 1, 'Payment Confirmed', 'Payment confirmed for order 1C06WSHG24', '2017-07-14 20:32:52'),
(187, 1, 1, 'Update profile', 'You updated your profile', '2017-07-14 21:48:24'),
(188, 1, 1, 'Change profile picture', 'You changed your profile picture', '2017-07-17 08:49:37'),
(189, 1, 1, 'Log in', 'You logged into your account', '2017-07-17 08:50:35'),
(190, 1, 2, 'Log in', 'You logged into your account', '2017-07-17 08:51:14'),
(191, 2, 2, 'Add to cart', 'Item 17 added to cart', '2017-07-17 09:10:32'),
(192, 2, 2, 'Delete product', 'You deleted product 5', '2017-07-17 09:30:29'),
(193, 2, 2, 'Delete product', 'You deleted product 4', '2017-07-17 09:31:16'),
(194, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-17 09:49:21'),
(195, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-17 09:49:23'),
(196, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-17 09:49:27'),
(197, 2, 2, 'Change cart item quantity', 'You changed cart item quantity to 1', '2017-07-17 09:49:29'),
(198, 2, 2, 'Remove from cart', 'You removed item from cart', '2017-07-17 09:54:20'),
(199, 1, 1, 'Log in', 'You logged into your account', '2017-07-17 10:15:49'),
(200, 2, 1, 'Add to cart', 'Item 10 added to cart', '2017-07-17 10:15:57'),
(201, 2, 1, 'Discount item', 'Item 11 marked down', '2017-07-17 10:19:14'),
(202, 3, 1, 'Order Confirmed', 'You confirmed order G5SP9CSFSJ', '2017-07-17 17:50:49'),
(203, 3, 1, 'Payment Confirmed', 'Payment confirmed for order G5SP9CSFSJ', '2017-07-17 17:51:08'),
(204, 3, 1, 'Order Confirmed', 'You confirmed order A8AYUK7CUA', '2017-07-17 17:53:01'),
(205, 2, 1, 'Add to cart', 'Item 16 added to cart', '2017-07-17 18:04:58'),
(206, 3, 1, 'Order Confirmed', 'You confirmed order EYDS564DW7', '2017-07-17 18:05:01'),
(207, 3, 1, 'Payment Confirmed', 'Payment confirmed for order EYDS564DW7', '2017-07-17 18:07:56'),
(208, 2, 1, 'Add to cart', 'Item 16 added to cart', '2017-07-18 07:09:55'),
(209, 3, 1, 'Order Confirmed', 'You confirmed order EOO96IAR5P', '2017-07-18 07:10:02'),
(210, 3, 1, 'Payment Confirmed', 'Payment confirmed for order EOO96IAR5P', '2017-07-18 07:10:11'),
(211, 2, 1, 'Add to cart', 'Item 11 added to cart', '2017-07-18 07:11:14'),
(212, 3, 1, 'Order Confirmed', 'You confirmed order 14DW4HS4BK', '2017-07-18 07:11:22'),
(213, 1, 1, 'Log in', 'You logged into your account', '2017-07-18 07:43:31'),
(214, 1, 1, 'Log in', 'You logged into your account', '2017-07-18 12:15:27'),
(215, 2, 1, 'Add to cart', 'Item 12 added to cart', '2017-07-18 12:32:26'),
(216, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-18 12:32:29'),
(217, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-18 12:32:29'),
(218, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-07-18 12:32:29'),
(219, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 5', '2017-07-18 12:32:30'),
(220, 3, 1, 'Order Confirmed', 'You confirmed order BQSTLD3PI5', '2017-07-18 12:32:35'),
(221, 3, 1, 'Payment Confirmed', 'Payment confirmed for order BQSTLD3PI5', '2017-07-18 12:33:45'),
(222, 2, 1, 'Product ordered', 'You have ordered 5 units of product 12', '2017-07-18 12:34:03'),
(223, 2, 2, 'Product ordered', '5 units of your product 12 have been ordered', '2017-07-18 12:34:03'),
(224, 3, 1, 'Address Confirmed', 'Address confirmed for order BQSTLD3PI5', '2017-07-18 12:34:03'),
(225, 2, 1, 'Add to cart', 'Item 15 added to cart', '2017-07-18 12:48:17'),
(226, 2, 1, 'Discount item', 'Item 1 marked down', '2017-07-18 12:49:59'),
(227, 1, 1, 'Log in', 'You logged into your account', '2017-07-20 11:49:29'),
(228, 2, 1, 'Add to cart', 'Item 16 added to cart', '2017-07-20 11:52:43'),
(229, 1, 1, 'Update profile', 'You updated your profile', '2017-07-20 11:57:28'),
(230, 1, 1, 'Log in', 'You logged into your account', '2017-07-20 11:58:06'),
(231, 3, 1, 'Order Confirmed', 'You confirmed order E8OVL7L7VA', '2017-07-20 11:58:54'),
(232, 3, 1, 'Order Confirmed', 'You confirmed order SAE6DB0AGJ', '2017-07-20 11:58:54'),
(233, 3, 1, 'Order Confirmed', 'You confirmed order JN9Y081D91', '2017-07-20 11:59:02'),
(234, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 2', '2017-07-20 11:59:13'),
(235, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 3', '2017-07-20 11:59:14'),
(236, 2, 1, 'Change cart item quantity', 'You changed cart item quantity to 4', '2017-07-20 11:59:16'),
(237, 3, 1, 'Order Confirmed', 'You confirmed order Y34UFNJR5G', '2017-07-20 11:59:21'),
(238, 3, 1, 'Payment Confirmed', 'Payment confirmed for order Y34UFNJR5G', '2017-07-20 12:01:10'),
(239, 3, 1, 'Address Confirmed', 'Address confirmed for order Y34UFNJR5G', '2017-07-20 12:01:33'),
(240, 2, 1, 'Add product', 'You added item 20 to your products', '2017-07-20 12:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'humphrey luchetu', 'humluchetu@gmail.com', '$2y$10$l4jRWP6moGTNK8kG5z6HoekKDSBzL.0X28nobGmH0BzyEPMrZuDz.', 'tnM53xvPwk6iCl32RKS76B8DktL6WpAfTq2kaqSf2BWOWDLqIrOoPWi6S9di', '2017-09-11 21:00:00', '2017-09-11 21:00:00'),
(2, 'ian', 'ian@admin.com', '$2y$10$KC6KNcZuLlxeAs5V6DX8iufxSa5aByqfv7sRy5TnNG3W.k76VEHNe', '', '2017-09-06 09:17:02', '2017-09-06 09:17:02'),
(3, 'Admin', 'admin@sproos.com', '$2y$10$7.Pch/cPsQnb53elr5u0C.K0jpIFbQgbxyEwGZbCzvYtLAqbH/VNW', 'pe7GzujISq0suhYcVIeZieQDwLHMQqwGBjKOF5dRahGZfOdTiSyXUpzjpVPi', '2017-09-06 16:22:11', '2017-09-06 16:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`, `created_at`, `updated_at`) VALUES
(5, 'banners/banner.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT '1',
  `cancelled` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `cancelled`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '2017-06-17 13:49:01', '0000-00-00 00:00:00'),
(2, 1, 2, 1, 1, '2017-06-17 13:51:14', '0000-00-00 00:00:00'),
(3, 1, 2, 1, 1, '2017-06-17 13:52:19', '0000-00-00 00:00:00'),
(4, 1, 2, 4, 1, '2017-07-12 06:38:52', '0000-00-00 00:00:00'),
(6, 1, 0, 1, 0, '2017-06-17 15:29:26', '0000-00-00 00:00:00'),
(7, 3, 0, 1, 0, '2017-06-17 15:31:06', '0000-00-00 00:00:00'),
(8, 3, 2, 1, 1, '2017-06-17 23:17:55', '0000-00-00 00:00:00'),
(9, 1, 1, 3, 1, '2017-07-05 18:18:32', '0000-00-00 00:00:00'),
(10, 5, 1, 2, 1, '2017-07-05 18:18:32', '0000-00-00 00:00:00'),
(11, 11, 3, 3, 0, '2017-07-05 18:10:02', '0000-00-00 00:00:00'),
(12, 10, 3, 4, 0, '2017-06-26 06:29:21', '0000-00-00 00:00:00'),
(13, 8, 3, 1, 0, '2017-06-26 06:20:50', '0000-00-00 00:00:00'),
(14, 17, 3, 1, 0, '2017-07-05 18:10:02', '0000-00-00 00:00:00'),
(15, 14, 3, 1, 0, '2017-06-26 06:55:55', '0000-00-00 00:00:00'),
(16, 1, 3, 3, 0, '2017-06-26 08:24:44', '0000-00-00 00:00:00'),
(17, 12, 3, 1, 0, '2017-06-27 03:40:45', '0000-00-00 00:00:00'),
(18, 15, 1, 1, 1, '2017-07-05 20:48:31', '0000-00-00 00:00:00'),
(19, 12, 1, 3, 1, '2017-07-06 08:53:06', '0000-00-00 00:00:00'),
(20, 15, 1, 1, 1, '2017-07-06 08:53:06', '0000-00-00 00:00:00'),
(21, 17, 1, 1, 1, '2017-07-06 08:54:01', '0000-00-00 00:00:00'),
(22, 17, 1, 3, 1, '2017-07-06 09:21:24', '0000-00-00 00:00:00'),
(23, 17, 1, 1, 1, '2017-07-06 12:57:39', '0000-00-00 00:00:00'),
(24, 14, 1, 3, 1, '2017-07-06 12:57:44', '0000-00-00 00:00:00'),
(25, 13, 1, 3, 1, '2017-07-10 06:28:13', '0000-00-00 00:00:00'),
(26, 12, 1, 2, 1, '2017-07-10 06:28:57', '0000-00-00 00:00:00'),
(27, 17, 1, 1, 1, '2017-07-10 06:36:16', '0000-00-00 00:00:00'),
(28, 17, 1, 1, 1, '2017-07-10 17:43:32', '0000-00-00 00:00:00'),
(29, 19, 0, 1, 0, '2017-07-10 19:03:56', '0000-00-00 00:00:00'),
(30, 12, 1, 1, 1, '2017-07-12 06:35:19', '0000-00-00 00:00:00'),
(31, 15, 1, 1, 1, '2017-07-12 06:35:19', '0000-00-00 00:00:00'),
(32, 14, 1, 1, 1, '2017-07-12 06:35:19', '0000-00-00 00:00:00'),
(33, 13, 1, 1, 1, '2017-07-12 06:35:19', '0000-00-00 00:00:00'),
(34, 16, 1, 1, 1, '2017-07-12 06:35:19', '0000-00-00 00:00:00'),
(35, 17, 2, 2, 1, '2017-07-12 06:55:06', '0000-00-00 00:00:00'),
(36, 16, 1, 1, 1, '2017-07-14 20:32:40', '0000-00-00 00:00:00'),
(37, 17, 2, 1, 1, '2017-07-17 09:54:19', '0000-00-00 00:00:00'),
(38, 10, 1, 1, 1, '2017-07-17 17:50:49', '0000-00-00 00:00:00'),
(39, 16, 1, 1, 1, '2017-07-17 18:05:01', '0000-00-00 00:00:00'),
(40, 16, 1, 1, 1, '2017-07-18 07:10:02', '0000-00-00 00:00:00'),
(41, 11, 1, 1, 1, '2017-07-18 07:11:22', '0000-00-00 00:00:00'),
(42, 12, 1, 5, 1, '2017-07-18 12:32:34', '0000-00-00 00:00:00'),
(43, 15, 1, 4, 1, '2017-07-20 11:59:15', '0000-00-00 00:00:00'),
(44, 16, 1, 1, 1, '2017-07-20 11:58:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'categories/2kuBMZHTKG0fgZGbc1ioYd9cGSyp8kw7IRo1LjrQ.jpeg', 'Fantastic Men\'s Wear.', NULL, '2017-09-05 13:23:16', '2017-09-08 11:32:27'),
(2, 'Ladies', 'categories/wgykXqzMTuS2ACHKaRmf7PVKcYjlHsBpztzcCdp4.jpeg', 'Stylish Lady Wear and Products', NULL, '2017-09-05 13:23:28', '2017-09-08 12:57:20'),
(3, 'Children', 'categories/x4I6usFnQnDcl2O1EKXDmXzVw5TBsbsQyo6gF8MK.jpeg', 'Children stuff. Browse to view great discounts!', NULL, '2017-09-05 13:23:42', '2017-09-08 11:38:45'),
(4, 'African Wear', 'categories/yg8FNa6DkrK5D2OFKUND0LebsX6elbQq4f36M4rE.jpeg', 'Designs for Africa', NULL, '2017-09-06 12:29:36', '2017-09-08 12:55:52'),
(5, 'Local Designers', 'categories/vKXrD7kiIQsIrMe1qUAMNMILz9jtdqwIzdyvVj9O.jpeg', 'Affordable designs from your local designer', NULL, NULL, '2017-09-08 12:22:20'),
(6, 'Used Products', 'categories/XMV53YuMeoL6ZVI4MCeXmUHyH18pHBxWJGP1d0iw.jpeg', 'Cheap, affordabe and used products. Shop here', NULL, NULL, '2017-09-08 11:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) NOT NULL,
  `discount_name` varchar(70) NOT NULL,
  `discount_code` varchar(30) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `new_price` float NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount_name`, `discount_code`, `product_id`, `new_price`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(10, 'Name', 'Code', 11, 7800, '2017-07-17 10:20:00', '2017-07-31 10:16:00', '2017-07-17 10:19:14', '2017-07-17 10:19:14'),
(11, 'Name', 'Code', 1, 5000, '2017-07-18 12:50:00', '2017-07-31 12:49:00', '2017-07-18 12:49:59', '2017-07-18 12:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `unique_order_id` varchar(300) NOT NULL,
  `transaction_id` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `price` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `tax` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`unique_order_id`, `transaction_id`, `product_id`, `total_price`, `status`, `price`, `user_id`, `total_quantity`, `seller_id`, `tax`, `created_at`, `updated_at`) VALUES
('FDC9A2C721', 'PESAPALCWOBLQ0TB1EOE4V', 4, '19,000.00', 2, '15,000.00', 1, 1, 2, '3,040.00', '2017-09-15 09:42:23', '2017-09-15 09:42:23'),
('FDC9A2C721', 'PESAPALCWOBLQ0TB1EOE4V', 7, '19,000.00', 2, '4,000.00', 1, 1, 3, '3,040.00', '2017-09-15 09:42:23', '2017-09-15 09:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `details_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_order_id` varchar(300) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `user_id`, `unique_order_id`, `product_id`, `payment_method`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'FDC9A2C721', 4, NULL, 2, '2017-09-15 06:42:23', '2017-09-15 06:42:23'),
(2, 1, 'FDC9A2C721', 7, NULL, 3, '2017-09-15 06:42:23', '2017-09-15 06:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `price` float NOT NULL,
  `seller_id` int(11) NOT NULL,
  `stock` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `name`, `description`, `image`, `image2`, `image3`, `image4`, `slug`, `price`, `seller_id`, `stock`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, 'Men Slim Shirts', 'Embrace a smart silhouette with men’s slim fit shirts. The plain styles are your best go-to for any occasion. Smarten up in blue and', 'products/BPG4tSOS8oAPVxVcWQT4MkpmperARO4E0nLglIoh.jpeg', 'products/IRiEDrEPWpdCe6l9OYKC8vF0YZrTsgdaYy6hUjw9.jpeg', 'products/saA0ZaxFghm5GVaiqdcI7esvtNdkjhePszvkpw5F.jpeg', 'products/vByXbzX1iKhgXMwggBdkDFDErmMcqCGMcn1fkT6w.jpeg', '-', 15000, 2, 36, '2017-09-08 21:22:07', '2017-09-09 17:44:21'),
(7, 1, NULL, 'Sneakers', 'black', 'products/one_1505228994jpg', 'products/two_1505228995jpg', 'products/three_1505228995jpg', 'products/four_1505228994jpg', '-', 4000, 3, 5, '2017-09-12 15:09:55', '2017-09-12 15:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `first_name`, `last_name`, `phonenumber`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ian', 'Too', '0703778198', 'ianktoo@gmail.com', '$2y$10$jqzMzPFjPSpkCbtIXmIzauVSGRAF.G6SdtgKs1hTn/CNw1JS.AZvK', 'IoTZ7wYJEH4oeqDRxWka3yDvGJftC8OeznTuvRFxdvz3IkvecxN1RZ1DdthT', '2017-09-06 06:33:14', '2017-09-06 06:33:14'),
(3, 'HUmphrey', 'Luchetu', '0702092083', 'humluchetu@gmail.com', '$2y$10$vYxGu.87ubIM2Q7X0vgLPeTDY5tOFmehTF0FR6VwzVhK8Az3OzcWq', 'j3rvZTjdhZUKE2XRkS0ViWe8FVJ4WsgYpe8cICVkozT3BGgi2B6HNslC0USA', '2017-09-12 15:04:26', '2017-09-12 15:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `shipings`
--

CREATE TABLE `shipings` (
  `id` int(11) NOT NULL,
  `delivery_instructions` text NOT NULL,
  `delivery_time` varchar(200) NOT NULL,
  `delivery_date` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipings`
--

INSERT INTO `shipings` (`id`, `delivery_instructions`, `delivery_time`, `delivery_date`, `phone_number`, `created_at`, `updated_at`) VALUES
(11, '8/9/2017', '9.30', '8/9/2017', '67676767', '2017-09-14 17:44:23', '2017-09-14 17:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phonenumber`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'humphrey luchetu', '', 'humluchetu@gmail.com', 67676767, '$2y$10$l4jRWP6moGTNK8kG5z6HoekKDSBzL.0X28nobGmH0BzyEPMrZuDz.', 'AowZ5wXNHOHfDdkaLp5FXP1hp2a7n1VxROPjoAqb8M6ncj3mNR32GIqSTi3Z', '2017-09-05 06:15:45', '2017-09-05 06:15:45'),
(2, 'Ian', 'Too', 'iantoo@sproos.com', 703778198, '$2y$10$htIsA/PtaiAn.O/H3ERJNev4DLdUgs5sx2SKvMuBNytQ/OfAPMXLe', 'B5XZp6vQ0xoqHqjv0hbePLrR0j9xlnq9TwQtkDg0yVw3rD1VJUoArA61cUjU', '2017-09-06 07:15:00', '2017-09-06 07:15:00'),
(3, 'Ian', 'Too', 'test@test.com', 700121212, '$2y$10$aLr76otslvIUbzDZgUZs3.qs237mFhxOKT0gZtogDhudEIjEDLqVu', 'yn8sISTkOQQWjaVdisV1NWUKIkWUT55ezSInqdgBQ6d2A6icB9XppqZXhzzw', '2017-09-06 07:49:15', '2017-09-06 07:49:15'),
(4, 'Ian', 'Too', 'iantoo@icloud.com', 70378198, '$2y$10$xqwDHhoQbRYau/OGJAXMReFrQ1GTILpH0GQOdj.yGQUo.gXkV5g.W', 'MoQMuRCRFgmXxvZV3ieiPQzd4EjSL11a1ZnmPUKNo5Fa1vJpc6MEaDeaqmdq', '2017-09-07 08:23:02', '2017-09-07 08:23:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `shipings`
--
ALTER TABLE `shipings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipings`
--
ALTER TABLE `shipings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

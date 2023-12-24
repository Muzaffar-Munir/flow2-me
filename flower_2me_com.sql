-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 01:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_2me.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, '2023-10-10 09:20:45', '2023-10-10 09:20:45'),
(3, NULL, 1, '2023-10-10 09:21:38', '2023-10-10 09:21:38'),
(4, NULL, 2, '2023-10-10 09:23:40', '2023-10-10 09:23:40'),
(5, NULL, 2, '2023-10-10 09:33:10', '2023-10-10 09:33:10'),
(6, NULL, 1, '2023-10-10 09:33:19', '2023-10-10 09:33:19'),
(7, NULL, 2, '2023-10-10 09:33:31', '2023-10-10 09:33:31'),
(89, 3, 4, '2023-10-13 00:15:44', '2023-10-13 00:15:44');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(11, '2023_05_04_095558_create_permission_tables', 2),
(12, '2023_05_04_101616_update_add_lastname_to_users_table', 2),
(13, '2023_05_08_060635_add_new_column_in_users_table', 2),
(16, '2023_10_07_065941_create_user_products_table', 2),
(17, '2023_10_09_095239_update_status_column_in_users_table', 2),
(18, '2023_05_26_073142_create_userdetails_table', 3),
(19, '2023_05_12_073841_create_products_table', 4),
(22, '2014_10_12_000000_create_users_table', 5),
(23, '2023_10_09_111535_add_new_column_in_users_table', 6),
(24, '2023_10_09_123108_create_carts_table', 7),
(26, '2023_10_11_114856_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0047b4adb54302c6671571cac3fb1a13f125fd6a9df6ba7771eb45133571818e33bbcba9c240d9f4', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:42:55', '2023-10-09 12:42:55', '2024-10-09 17:42:55'),
('02f27e8fb2647ab375a26d6145e3fcc8dd29cd64e9424a53fb635885be11b48744a79e923c9a03e5', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:41:23', '2023-10-09 12:41:23', '2024-10-09 17:41:23'),
('051176ef28ba303deedbb2456531d9160d0faa76dbe366614aacb1ed2e6dbd0e766783669a2d3c6e', 4, 1, 'Loothoot', '[]', 0, '2023-10-12 04:42:14', '2023-10-12 04:42:14', '2024-10-12 09:42:14'),
('0a51d2a53b4ce945452bb6246045eee4526f0f41147fbcc7a104034819125d6c58f401418a432cb1', 1, 1, 'Loothoot', '[]', 0, '2023-10-10 09:22:51', '2023-10-10 09:22:51', '2024-10-10 14:22:51'),
('0cce0ed3d9b81f6bd4dadab050f240ad276e7ab7c0006f5e318af5cf714483ba64511273dc0d8869', 1, 1, 'Loothoot', '[]', 0, '2023-10-11 02:05:29', '2023-10-11 02:05:30', '2024-10-11 07:05:29'),
('12172bfaf88f1fbea882937c6c88245a8efde8ad0a1c03550c401f29385f6ce7964914142256240c', 3, 1, 'Loothoot', '[]', 0, '2023-10-12 08:01:44', '2023-10-12 08:01:44', '2024-10-12 13:01:44'),
('16b381d180e64e388e43ffbdb35964de839f75839dcd127487bf505a44eff262dd743109e0f01005', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:27:35', '2023-10-09 12:27:35', '2024-10-09 17:27:35'),
('181681d36bb1e977fbce8295ccdf808c064fc68b1cf661d1c90c344f4de254c97f5e6222324217ad', 5, 1, 'Loothoot', '[]', 0, '2023-10-09 05:53:38', '2023-10-09 05:53:38', '2024-10-09 10:53:38'),
('1b18eed1546dc3b81714406f240b98b26b9d8543be8029b7496110376050a4846e109f6637457618', 4, 1, 'Loothoot', '[]', 0, '2023-10-11 05:58:59', '2023-10-11 05:59:00', '2024-10-11 10:58:59'),
('2103f27ec61cbb077416b3e062e0405cebef4406675f8b5b4a716733379dab1d85bcb47c96a17fca', 4, 1, 'Loothoot', '[]', 0, '2023-10-09 05:30:56', '2023-10-09 05:30:56', '2024-10-09 10:30:56'),
('273d5bce1cf6344c699d6224dd4c097a16a603e4801e651dc915ad16ff6ab1e0c909a386646afdf2', 1, 1, 'Loothoot', '[]', 0, '2023-10-11 07:37:40', '2023-10-11 07:37:40', '2024-10-11 12:37:40'),
('306fe50e9a792dbff06955263075ff79e41fea44246c238da34e950fb34668aa611a606c3ff0103b', 3, 1, 'Loothoot', '[]', 0, '2023-10-13 02:18:21', '2023-10-13 02:18:21', '2024-10-13 07:18:21'),
('45395eba5e7ddd6d40fc64091ab2c0ce526006acd61f577d46feea40efc65cd737ef1f78b402da34', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 00:40:52', '2023-10-11 00:40:52', '2024-10-11 05:40:52'),
('4ba870e7755b5521607b60a118aef4ff1d672b1394b08d97f78fa9921cd78ab340ba2286b3b9aad0', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 00:41:52', '2023-10-11 00:41:52', '2024-10-11 05:41:52'),
('5394988544a99080b022cf68a0dd5aca40640a71e41515b267e80b7631b638a8a61cfd5f79ff7448', 3, 1, 'Loothoot', '[]', 0, '2023-10-12 02:32:30', '2023-10-12 02:32:31', '2024-10-12 07:32:30'),
('552a03394d111e0d0d1803743917a0df5483a77dd7583b6b3d79f7e18503e21c0298a8c45602ffa5', 5, 1, 'Loothoot', '[]', 0, '2023-10-09 05:53:17', '2023-10-09 05:53:17', '2024-10-09 10:53:17'),
('55d552649a0bd13975f1619f12c18120e50b4915a11c4fc52f202ebf655074760eaa34059a89aec6', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:29:15', '2023-10-09 12:29:15', '2024-10-09 17:29:15'),
('57e416c36450d0cea128a026d53d5a3129a5105b00c3e75d3b9d295506a8d13a7b8efed260977ab1', 2, 1, 'Loothoot', '[]', 0, '2023-10-09 05:30:22', '2023-10-09 05:30:22', '2024-10-09 10:30:22'),
('61bc1f89f63855c0d479f241921daa3a228cc9d03d8203537769ae0b5184faba9c45cb3185fa2a3d', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 07:24:06', '2023-10-11 07:24:06', '2024-10-11 12:24:06'),
('636452d509e8c1a380e778dc053de9c7ad514a67ea97b3cc33dc0ce1b741da353cd034445e40fac6', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:27:07', '2023-10-09 12:27:07', '2024-10-09 17:27:07'),
('656f429842cfb00e33adfc01bae4e0addf5ee0bee26ddf6f2d74b64238ddeba9f906361dbeadbb0b', 3, 1, 'Loothoot', '[]', 0, '2023-10-10 08:33:20', '2023-10-10 08:33:20', '2024-10-10 13:33:20'),
('69e92d6d791c0dcec6cab4c22738d6da95c75e5f69b0585b7b89f9e659005e11a1be3cf758e8b48a', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 06:18:40', '2023-10-09 06:18:40', '2024-10-09 11:18:40'),
('6bb14586a4be169a3cc251a68f68ca2b6b062cefd562007a33ddefce54b1ebc52cdab00eaa744fd2', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 12:03:35', '2023-10-11 12:03:36', '2024-10-11 17:03:35'),
('6cea9941e207cf293f1b750075b8720ca69bf63cb7fc967b2347f2d024e2666e55ea852295a955b9', 1, 1, 'Loothoot', '[]', 0, '2023-10-12 02:33:06', '2023-10-12 02:33:06', '2024-10-12 07:33:06'),
('82e0122951547673682c0691eff35f04eda34822e6222d207ca0b79a62fafdba91ff7a52b57d8330', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:43:27', '2023-10-09 12:43:27', '2024-10-09 17:43:27'),
('845711d77b36509d0e7b83edd8f8c662929cc47248b856e819fb2b91eea0f05268cdcb2f5f53dfdc', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 08:23:16', '2023-10-11 08:23:16', '2024-10-11 13:23:16'),
('8b60e938a94aacfe27cf3944bb362a0a4ebbf723614a1ced35cdadfa42f5d365be48e1b2c21d0773', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:46:33', '2023-10-09 12:46:33', '2024-10-09 17:46:33'),
('8dc4f3a1a66f6977166ef13a71090447b1938ed733b1a5a832633af8c176591e8569d5cb93a1d4f7', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 07:36:13', '2023-10-09 07:36:13', '2024-10-09 12:36:13'),
('93d633a7e15465949d0a14aeab203ad0df2a39211dbb1e5156c3f3a4ebcc3eb7dd86274c20c008f6', 3, 1, 'Loothoot', '[]', 0, '2023-10-10 05:24:28', '2023-10-10 05:24:28', '2024-10-10 10:24:28'),
('987eccb997fbe106f8afd9a3c2c51f33a6a1f8c6a47c9e9aa794f9bb86ac2600784a951de55f1d42', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 05:24:23', '2023-10-11 05:24:24', '2024-10-11 10:24:23'),
('9b4213603fbcd81e2400c696f407122df420eeca48cc0113293c24982f3549c956f1790ae81c52f4', 3, 1, 'Loothoot', '[]', 0, '2023-10-13 00:15:14', '2023-10-13 00:15:15', '2024-10-13 05:15:14'),
('a90ab7e03a0e381272dea6286f903c17fadebe3bc8c5baa2d6d0e25bd7a83750c255e90d782a352f', 4, 1, 'Loothoot', '[]', 0, '2023-10-11 06:47:52', '2023-10-11 06:47:52', '2024-10-11 11:47:52'),
('bbf5d0e5fd4b0e971d89c884a9da55ae25e9cc887d820f96b0d930bd7eaa2e60459abcb9617a6d94', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:29:54', '2023-10-09 12:29:54', '2024-10-09 17:29:54'),
('beddf30393690f5c3e1bd6dcc8edd40d8b071dc88987d3c4e4871c51d9b10f407aa24a37d2de8f8f', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:54:16', '2023-10-09 12:54:16', '2024-10-09 17:54:16'),
('ca340a4b45d9b3e591ff476813cccec03ceb7b655e2e85073e3fb945e1fb53ecee2b6127bc780cd2', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:45:12', '2023-10-09 12:45:12', '2024-10-09 17:45:12'),
('da2735f1c353a49bb4f2b588bb5e61055ebd969cfbfdf9c6a44988f69ae736702980d1ef92f207ab', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 07:24:37', '2023-10-11 07:24:37', '2024-10-11 12:24:37'),
('db067d1dee09f497005e1c49e505b81be8d2e6e18c71e2547bcea2eedaa4d7972ed72863fe0f7096', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 12:47:04', '2023-10-09 12:47:04', '2024-10-09 17:47:04'),
('deb171c692fc381f2c53473cec2dcdf45e9c5dc8be802aca6b127e483f36667497b4b8135b153549', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:28:25', '2023-10-09 12:28:25', '2024-10-09 17:28:25'),
('e0201b03751a8927eec24f46dc82cf936d614cad97615045aad236e5441205be0b8f131eac052ff0', 3, 1, 'Loothoot', '[]', 0, '2023-10-13 13:55:16', '2023-10-13 13:55:16', '2024-10-13 18:55:16'),
('e1ea522f6e5d44f5856ac89839d7eb014d0985e601c0eb3b028547eb7e4e0a973f4b2a28aeca9a01', 2, 1, 'Loothoot', '[]', 0, '2023-10-09 05:29:24', '2023-10-09 05:29:24', '2024-10-09 10:29:24'),
('e90606ba5f7dbd2bca254c5f7a79b92bec6c5ddeb2dfd4c360efbf6dc6d9879291841b1ba5761098', 1, 1, 'Loothoot', '[]', 0, '2023-10-11 13:59:10', '2023-10-11 13:59:10', '2024-10-11 18:59:10'),
('ed277ba1ceb01d0d6760d0d5b1d1033c6a9b4d55f5ef76d28a565e50539c2642ac7feac21fa93adc', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 12:53:44', '2023-10-09 12:53:44', '2024-10-09 17:53:44'),
('f0a5968d827fd8996c6c4ce92f642dfa5aed762c98c9a9b719244b18881dc6552e3531bbd8762c36', 4, 1, 'Loothoot', '[]', 0, '2023-10-11 02:06:13', '2023-10-11 02:06:13', '2024-10-11 07:06:13'),
('f437df6b9e6c90d37b40adb16fe632157acee160d14a4c99afd89d9ed7ed447bd66bfbd2db495971', 1, 1, 'Loothoot', '[]', 0, '2023-10-09 13:00:23', '2023-10-09 13:00:23', '2024-10-09 18:00:23'),
('f5d6199ecf3349ce10cafc52e7bd73f0e1d60452be236f8bfba561fece4b2db4d759feb60d479ad9', 3, 1, 'Loothoot', '[]', 0, '2023-10-09 06:29:54', '2023-10-09 06:29:54', '2024-10-09 11:29:54'),
('f698a3619f45ef2dbbdec7676140efd54e5cd98de5245bfdb4b201d319670d1740c99e0b2d8a3d86', 3, 1, 'Loothoot', '[]', 0, '2023-10-11 13:58:38', '2023-10-11 13:58:38', '2024-10-11 18:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '9BFgurfavWYPqIlyNVlyn2EKs0Q1nKqgtbQggPxB', NULL, 'http://localhost', 1, 0, 0, '2023-10-09 05:28:11', '2023-10-09 05:28:11'),
(2, NULL, 'Laravel Password Grant Client', 'TAEqi1KgssxQUX4SKcrpdXiQQdWDVzmdKSipB4nd', 'users', 'http://localhost', 0, 1, 0, '2023-10-09 05:28:11', '2023-10-09 05:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-10-09 05:28:11', '2023-10-09 05:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `uon` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `uon`, `status`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL, 'lahore', NULL, '2023-10-11 13:45:15', '2023-10-11 13:45:15'),
(2, 3, 2, NULL, NULL, 'lahore', NULL, '2023-10-11 13:45:15', '2023-10-11 13:45:15'),
(3, 3, 1, NULL, NULL, 'Model town lahore', '032121321', '2023-10-11 13:46:34', '2023-10-11 13:46:34'),
(4, 3, 2, NULL, NULL, 'Model town lahore', '032121321', '2023-10-11 13:46:34', '2023-10-11 13:46:34'),
(5, 3, 1, NULL, 'approved', NULL, NULL, '2023-10-11 13:49:06', '2023-10-11 13:49:06'),
(6, 3, 2, NULL, 'approved', NULL, NULL, '2023-10-11 13:49:06', '2023-10-11 13:49:06'),
(7, 3, 1, NULL, 'approved', NULL, NULL, '2023-10-11 13:52:50', '2023-10-11 13:52:50'),
(8, 3, 2, NULL, 'approved', NULL, NULL, '2023-10-11 13:52:50', '2023-10-11 13:52:50'),
(9, 3, 1, NULL, 'approved', 'johar town lahore', '032121321', '2023-10-11 13:57:26', '2023-10-11 13:57:26'),
(10, 3, 2, NULL, 'approved', 'johar town lahore', '032121321', '2023-10-11 13:57:26', '2023-10-11 13:57:26'),
(11, 3, 5, 11113328, 'approved', 'lahore', '032121321', '2023-10-12 04:39:51', '2023-10-12 04:39:51'),
(12, 3, 2, 11113328, 'approved', 'lahore', '032121321', '2023-10-12 04:39:51', '2023-10-12 04:39:51'),
(13, 3, 1, 87288353, 'approved', 'lahore', '032121321', '2023-10-12 04:41:42', '2023-10-12 04:41:42'),
(14, 3, 6, 87288353, 'approved', 'lahore', '032121321', '2023-10-12 04:41:42', '2023-10-12 04:41:42'),
(15, 3, 3, 87288353, 'approved', 'lahore', '032121321', '2023-10-12 04:41:42', '2023-10-12 04:41:42'),
(16, 4, 1, 79504493, 'approved', 'lahore', '03323123123123', '2023-10-12 04:43:03', '2023-10-12 04:43:03'),
(17, 4, 1, 67520002, 'approved', 'dfasfas', '03213123123', '2023-10-12 04:43:48', '2023-10-12 04:43:48'),
(18, 4, 1, 67520002, 'approved', 'dfasfas', '03213123123', '2023-10-12 04:43:48', '2023-10-12 04:43:48'),
(19, 4, 1, 76850015, 'approved', 'lahore', '0312313a', '2023-10-12 04:45:04', '2023-10-12 04:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'boxCategory_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(2, 'boxCategory_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(3, 'boxCategory_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(4, 'product_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(5, 'product_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(6, 'product_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(7, 'brand_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(8, 'brand_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(9, 'brand_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(10, 'box_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(11, 'box_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(12, 'box_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(13, 'box_images_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(14, 'box_images_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(15, 'box_images_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(16, 'box_background_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(17, 'box_background_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(18, 'box_background_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(19, 'manage_admin_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(20, 'manage_admin_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(21, 'manage_admin_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(22, 'role_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(23, 'role_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(24, 'role_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(25, 'permission_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(26, 'permission_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(27, 'permission_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(28, 'contact_us_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(29, 'contact_us_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(30, 'contact_us_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(31, 'faq_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(32, 'faq_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(33, 'faq_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(34, 'provably_fair_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(35, 'provably_fair_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(36, 'provably_fair_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(37, 'cookie_policy_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(38, 'cookie_policy_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(39, 'cookie_policy_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(40, 'term_condition_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(41, 'term_condition_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(42, 'term_condition_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(43, 'aml_policy_create', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(44, 'aml_policy_update', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(45, 'aml_policy_delete', 'web', '2023-10-09 06:16:31', '2023-10-09 06:16:31'),
(46, 'privacy_statement_create', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(47, 'privacy_statement_update', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(48, 'privacy_statement_delete', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(49, 'battle_content_create', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(50, 'battle_content_update', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(51, 'battle_content_delete', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(52, 'footer_logo_create', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(53, 'footer_logo_update', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(54, 'footer_logo_delete', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(55, 'footer_icon_create', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(56, 'footer_icon_update', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(57, 'footer_icon_delete', 'web', '2023-10-09 06:16:32', '2023-10-09 06:16:32');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', '20.00', 'test', 'images/product/1697050824.png', 4, 1, '2023-10-09 05:46:24', '2023-10-12 04:42:27'),
(2, 'new product', '20.00', 'its priduct', 'images/product/1697050815.png', 3, 1, '2023-10-10 09:23:28', '2023-10-11 14:00:15'),
(3, 'latest product', '30.00', 'latest', 'images/product/1697050805.png', 3, 1, '2023-10-11 02:06:53', '2023-10-11 14:00:05'),
(4, 'user product', '70.00', 'user product', 'images/product/1697050791.png', 3, 1, '2023-10-11 02:07:18', '2023-10-11 13:59:51'),
(5, 'Super', '100.00', 'ali', 'images/product/1697096039.png', 3, 1, '2023-10-12 02:33:59', '2023-10-12 02:33:59'),
(6, 'fasdfsadf', '0.00', 'fasdfsdaf', 'images/product/1697096078.png', 3, 1, '2023-10-12 02:34:38', '2023-10-12 02:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'web', '2023-10-09 06:16:30', '2023-10-09 06:16:30'),
(3, 'user', 'web', '2023-10-09 06:16:30', '2023-10-09 06:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address_1` longtext DEFAULT NULL,
  `address_2` longtext DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `username`, `address_1`, `address_2`, `postal_code`, `state`, `city`, `country`, `phone_number`, `avatar`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, 3, '2023-10-09 06:28:17', '2023-10-09 06:28:17'),
(5, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, 4, '2023-10-11 02:05:47', '2023-10-11 02:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `social_media` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `token`, `last_login`, `status`, `social_media`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mubashar', 'Munir', 'admin@gmail.com', NULL, '$2y$10$Wc6wtcy/fmpq47oLVYuFAuJx/ikFQrOe6RGAwbzCYjoVm7HR2FNea', NULL, '2023-10-09 11:16:32', 1, NULL, NULL, '2023-10-09 06:16:32', '2023-10-09 06:16:32'),
(3, 'ali', 'raza', 'ali@gmail.com', NULL, '$2y$10$tE1O2cQXv5/qVwNhXC8lNec9E1vey3oHLVv9Ph6oBd5OfXE/pTwQ2', '35696854b4aaf2d0b60f9840059d0b9f', '2023-10-09 11:24:11', 1, 'ali@gmail.com', NULL, '2023-10-09 06:24:11', '2023-10-09 06:29:34'),
(4, 'Mubashar', 'munir', 'mubashar@gmail.com', NULL, '$2y$10$sM5.DS5SUR9ttIcY7zePqOLo49yVe6K5tgn3O15tMLA4XXdh7zgIK', '2f9572d43f4b5b4ad8f4ba21f8d1fb49', '2023-10-11 07:04:45', 1, NULL, NULL, '2023-10-11 02:04:45', '2023-10-11 02:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userdetails_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

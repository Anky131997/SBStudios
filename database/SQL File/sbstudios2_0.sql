-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 05:01 AM
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
-- Database: `sbstudios2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_jobs`
--

CREATE TABLE `approved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_to_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approved_jobs`
--

INSERT INTO `approved_jobs` (`id`, `job_id`, `approved_by_id`, `assigned_to_id`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Kaj kor banchot', '2024-11-17 03:21:30', '2024-11-17 03:21:30'),
(2, 2, 1, 2, 'Do it carefully', '2024-11-17 23:24:59', '2024-11-17 23:24:59'),
(3, 4, 1, 2, 'Kaj kor khanki', '2024-11-17 23:37:13', '2024-11-17 23:37:13'),
(4, 3, 1, 2, 'acaxa', '2024-11-24 10:42:09', '2024-11-24 10:42:09'),
(5, 7, 1, 2, 'Do it bitch', '2024-11-24 10:42:26', '2024-11-24 10:42:26'),
(6, 47, 1, 2, 'bacaixana', '2024-11-24 10:43:59', '2024-11-24 10:43:59'),
(7, 49, 1, 2, 'Kaj kor khanki', '2024-11-24 10:58:40', '2024-11-24 10:58:40'),
(8, 50, 1, 2, 'Kaj kor khankir chele', '2024-11-24 12:24:37', '2024-11-24 12:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1731827256),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1731827256;', 1731827256),
('ankanpolley0@gmail.com|127.0.0.1', 'i:1;', 1732457697),
('ankanpolley0@gmail.com|127.0.0.1:timer', 'i:1732457697;', 1732457697),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1731833517),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1731833517;', 1731833517);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `canceled_jobs`
--

CREATE TABLE `canceled_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `canceled_by_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `number`, `created_at`, `updated_at`) VALUES
(1, 'Ankan Polley', 'ankanpolley0@gmail.com', 8420667334, '2024-11-17 03:16:52', '2024-11-17 03:16:52'),
(2, 'Arnab Sen', 'arnab3041999@gmail.com', 1236547890, '2024-11-17 03:17:27', '2024-11-17 03:17:27'),
(3, 'Sumit Ghosh', 'sumit@ghosh.com', 1478523690, '2024-11-17 03:18:48', '2024-11-17 03:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `daily_updates`
--

CREATE TABLE `daily_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `update` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_updates`
--

INSERT INTO `daily_updates` (`id`, `job_id`, `update`, `status`, `created_at`, `updated_at`) VALUES
(24, 1, 'Chilling', 'edited', '2024-11-17 05:14:13', '2024-11-17 05:14:29'),
(25, 1, 'Chilling with niggas', 'edited', '2024-11-17 05:14:13', '2024-11-17 06:05:31'),
(26, 1, 'Chilling with my niggas', 'deleted', '2024-11-17 06:05:11', '2024-11-17 07:37:45'),
(27, 1, 'Chilling with niggas in my house', 'edited', '2024-11-17 05:14:13', '2024-11-17 06:20:48'),
(28, 1, 'Chilling with niggas in my house eating pizza', 'deleted', '2024-11-17 05:14:13', '2024-11-17 07:34:51'),
(29, 1, 'Working on this', 'edited', '2024-11-17 07:36:17', '2024-11-17 07:36:34'),
(30, 1, 'Working on this, will update', 'current', '2024-11-17 07:36:17', '2024-11-17 07:36:34');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"18c96d8b-6260-459c-af0a-75c8e9e632cf\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":2:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:47;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"faeb2d85-a6f7-44ef-be41-cb37833dfa50\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:216:\\\"[{ {\\\"service_id\\\":\\\"6\\\",\\\"job_code\\\":\\\"AV-3\\\",\\\"desc\\\":\\\"have fun\\\",\\\"status\\\":\\\"pending\\\",\\\"customer_id\\\":1,\\\"updated_at\\\":\\\"2024-11-24T13:28:21.000000Z\\\",\\\"created_at\\\":\\\"2024-11-24T13:28:21.000000Z\\\",\\\"id\\\":47}->job_code }] has been created\\\";s:7:\\\"message\\\";s:26:\\\"There is a new job request\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732454901, 1732454901),
(2, 'default', '{\"uuid\":\"766d64c3-8de2-46a2-af16-0cac126bade1\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":2:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:48;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:2:\\\"id\\\";s:36:\\\"f12d8b1a-13fc-414d-bc00-56c7f47e685d\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:23:\\\"[VS-1] has been created\\\";s:7:\\\"message\\\";s:26:\\\"There is a new job request\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732456981, 1732456981),
(3, 'default', '{\"uuid\":\"5f637b89-66be-440b-965f-4b6320abc485\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":3:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:49;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:7:\\\"message\\\";s:49:\\\"Ankan Polley has requested for a new job on UI\\/UX\\\";s:2:\\\"id\\\";s:36:\\\"c9f83eef-9a4d-4f69-a174-1b0befb59770\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:23:\\\"[UI-2] has been created\\\";s:7:\\\"message\\\";s:49:\\\"Ankan Polley has requested for a new job on UI\\/UX\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732461009, 1732461009),
(4, 'default', '{\"uuid\":\"6f673ca8-2817-4015-8a29-edfecf97fb7d\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\ApprovedJob\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:31:\\\"[AV-1] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";s:2:\\\"id\\\";s:36:\\\"991630de-bb31-4e3c-8f06-1cf1564715e0\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:31:\\\"[AV-1] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732464729, 1732464729),
(5, 'default', '{\"uuid\":\"719b8486-37d5-41d4-9961-4da53de38eae\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\ApprovedJob\\\";s:2:\\\"id\\\";i:5;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:31:\\\"[AV-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";s:2:\\\"id\\\";s:36:\\\"6b542f44-34f8-41fb-80bc-c7a80391b112\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:31:\\\"[AV-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732464746, 1732464746),
(6, 'default', '{\"uuid\":\"75ece8d6-4a41-4230-bc22-e25cbbb3f52d\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\ApprovedJob\\\";s:2:\\\"id\\\";i:6;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:31:\\\"[AV-3] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";s:2:\\\"id\\\";s:36:\\\"e1ae890c-71c6-44c2-87ba-f8cd67252b72\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:31:\\\"[AV-3] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732464839, 1732464839),
(7, 'default', '{\"uuid\":\"241a72e9-8964-48b1-af96-784ae8a34366\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:50;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:23:\\\"[VS-2] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Virtual Staging\\\";s:2:\\\"id\\\";s:36:\\\"25d479ba-98b6-4d22-b80f-1234fa1d4ddd\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:23:\\\"[VS-2] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Virtual Staging\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732465675, 1732465675),
(8, 'default', '{\"uuid\":\"9a2b972f-a4f5-4bd1-9226-9228fcc3e4c5\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\ApprovedJob\\\";s:2:\\\"id\\\";i:7;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:31:\\\"[UI-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";s:2:\\\"id\\\";s:36:\\\"d8a5f905-3ae1-4a3a-968c-7792d22c63e7\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:31:\\\"[UI-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732465720, 1732465720),
(9, 'default', '{\"uuid\":\"806ecf8e-1200-452c-b60a-9d9c404a44c5\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:51;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[CART-4] has been created\\\";s:7:\\\"message\\\";s:55:\\\"Ankan Polley has requested for a new job on Concept Art\\\";s:2:\\\"id\\\";s:36:\\\"d5bf93ff-2697-40ed-b4d5-bd831e08e176\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[CART-4] has been created\\\";s:7:\\\"message\\\";s:55:\\\"Ankan Polley has requested for a new job on Concept Art\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732470784, 1732470784),
(10, 'default', '{\"uuid\":\"cb00b189-3eae-4298-a0bf-a9b52a4f09c2\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:2;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\ApprovedJob\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:31:\\\"[VS-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";s:2:\\\"id\\\";s:36:\\\"70be6487-88a8-440a-aaa7-c0c92b0261a4\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:31:\\\"[VS-2] has been assigned to you\\\";s:7:\\\"message\\\";s:31:\\\"Admin has assigned you to a job\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732470877, 1732470877),
(11, 'default', '{\"uuid\":\"46d93e29-9949-4999-a615-ae44da46f5b2\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:52;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[WDES-2] has been created\\\";s:7:\\\"message\\\";s:54:\\\"Ankan Polley has requested for a new job on Web Design\\\";s:2:\\\"id\\\";s:36:\\\"bf0573a8-56b2-4095-ab97-ccdd0ccfb8e9\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[WDES-2] has been created\\\";s:7:\\\"message\\\";s:54:\\\"Ankan Polley has requested for a new job on Web Design\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732597723, 1732597723),
(12, 'default', '{\"uuid\":\"79e14613-8f16-4de5-8ce2-c5faa1acbc77\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:53;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[WDEV-4] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Web Development\\\";s:2:\\\"id\\\";s:36:\\\"f43ea871-28f5-4538-858a-1b3d48983d1d\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[WDEV-4] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Web Development\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732598068, 1732598068),
(13, 'default', '{\"uuid\":\"6539c7b4-b8f5-4e90-b52c-adf5e8599723\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:54;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[WDEV-5] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Web Development\\\";s:2:\\\"id\\\";s:36:\\\"cd26b7aa-4eed-4c2c-a868-308654f21bc8\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[WDEV-5] has been created\\\";s:7:\\\"message\\\";s:59:\\\"Ankan Polley has requested for a new job on Web Development\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732599365, 1732599365),
(14, 'default', '{\"uuid\":\"e6b30c48-1140-4157-bdfd-bf4368201c9f\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:55;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[GDES-2] has been created\\\";s:7:\\\"message\\\";s:55:\\\"Ankan Polley has requested for a new job on Game Design\\\";s:2:\\\"id\\\";s:36:\\\"464ec6be-49ea-44c5-a79c-df75ae19b97f\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[GDES-2] has been created\\\";s:7:\\\"message\\\";s:55:\\\"Ankan Polley has requested for a new job on Game Design\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732599532, 1732599532),
(15, 'default', '{\"uuid\":\"52c831bb-8650-41c4-b38a-1521ef115a20\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:56;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[WDES-3] has been created\\\";s:7:\\\"message\\\";s:54:\\\"Ankan Polley has requested for a new job on Web Design\\\";s:2:\\\"id\\\";s:36:\\\"c9586e44-4ca5-4e1d-a55a-9486ce0d8a38\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[WDES-3] has been created\\\";s:7:\\\"message\\\";s:54:\\\"Ankan Polley has requested for a new job on Web Design\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732599757, 1732599757),
(16, 'default', '{\"uuid\":\"7c32c513-cce3-4f3d-ae87-cd1a1805bf36\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:57;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:24:\\\"[CGI-1] has been created\\\";s:7:\\\"message\\\";s:61:\\\"Ankan Polley has requested for a new job on CGI Advertisement\\\";s:2:\\\"id\\\";s:36:\\\"9c2c752c-30db-4d16-b338-b5be1216fa50\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:24:\\\"[CGI-1] has been created\\\";s:7:\\\"message\\\";s:61:\\\"Ankan Polley has requested for a new job on CGI Advertisement\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732600319, 1732600319),
(17, 'default', '{\"uuid\":\"c466016b-8a99-4a39-96e6-6191e0b5bc93\",\"displayName\":\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:60:\\\"Illuminate\\\\Notifications\\\\Events\\\\BroadcastNotificationCreated\\\":3:{s:10:\\\"notifiable\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:12:\\\"notification\\\";O:33:\\\"App\\\\Notifications\\\\JobNotification\\\":4:{s:3:\\\"job\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:23:\\\"App\\\\Models\\\\RequestedJob\\\";s:2:\\\"id\\\";i:58;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:6:\\\"header\\\";s:25:\\\"[GDEV-2] has been created\\\";s:7:\\\"message\\\";s:60:\\\"Ankan Polley has requested for a new job on Game Development\\\";s:2:\\\"id\\\";s:36:\\\"d03ec584-2243-4dda-a809-5ed312a0da0e\\\";}s:4:\\\"data\\\";a:2:{s:6:\\\"header\\\";s:25:\\\"[GDEV-2] has been created\\\";s:7:\\\"message\\\";s:60:\\\"Ankan Polley has requested for a new job on Game Development\\\";}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1732602598, 1732602598);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(107, '0001_01_01_000000_create_users_table', 1),
(108, '0001_01_01_000001_create_cache_table', 1),
(109, '0001_01_01_000002_create_jobs_table', 1),
(110, '2024_11_09_091339_create_notes_table', 1),
(111, '2024_11_12_113512_create_services_table', 1),
(112, '2024_11_12_113530_create_customers_table', 1),
(113, '2024_11_12_113555_create_requested_jobs_table', 1),
(114, '2024_11_12_113636_create_approved_jobs_table', 1),
(115, '2024_11_12_113648_create_canceled_jobs_table', 1),
(116, '2024_11_12_113813_create_daily_updates_table', 1),
(117, '2024_11_24_122456_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('25d479ba-98b6-4d22-b80f-1234fa1d4ddd', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[VS-2] has been created\",\"message\":\"Ankan Polley has requested for a new job on Virtual Staging\"}', '2024-11-24 10:58:24', '2024-11-24 10:57:55', '2024-11-24 10:58:24'),
('464ec6be-49ea-44c5-a79c-df75ae19b97f', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[GDES-2] has been created\",\"message\":\"Ankan Polley has requested for a new job on Game Design\"}', NULL, '2024-11-26 00:08:52', '2024-11-26 00:08:52'),
('6b542f44-34f8-41fb-80bc-c7a80391b112', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 2, '{\"header\":\"[AV-2] has been assigned to you\",\"message\":\"Admin has assigned you to a job\"}', '2024-11-24 10:42:45', '2024-11-24 10:42:26', '2024-11-24 10:42:45'),
('70be6487-88a8-440a-aaa7-c0c92b0261a4', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 2, '{\"header\":\"[VS-2] has been assigned to you\",\"message\":\"Admin has assigned you to a job\"}', '2024-11-24 12:24:55', '2024-11-24 12:24:37', '2024-11-24 12:24:55'),
('991630de-bb31-4e3c-8f06-1cf1564715e0', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 2, '{\"header\":\"[AV-1] has been assigned to you\",\"message\":\"Admin has assigned you to a job\"}', '2024-11-24 10:42:53', '2024-11-24 10:42:09', '2024-11-24 10:42:53'),
('9c2c752c-30db-4d16-b338-b5be1216fa50', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[CGI-1] has been created\",\"message\":\"Ankan Polley has requested for a new job on CGI Advertisement\"}', NULL, '2024-11-26 00:21:59', '2024-11-26 00:21:59'),
('bf0573a8-56b2-4095-ab97-ccdd0ccfb8e9', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[WDES-2] has been created\",\"message\":\"Ankan Polley has requested for a new job on Web Design\"}', NULL, '2024-11-25 23:38:43', '2024-11-25 23:38:43'),
('c9586e44-4ca5-4e1d-a55a-9486ce0d8a38', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[WDES-3] has been created\",\"message\":\"Ankan Polley has requested for a new job on Web Design\"}', NULL, '2024-11-26 00:12:37', '2024-11-26 00:12:37'),
('c9f83eef-9a4d-4f69-a174-1b0befb59770', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[UI-2] has been created\",\"message\":\"Ankan Polley has requested for a new job on UI\\/UX\"}', '2024-11-24 09:40:30', '2024-11-24 09:40:09', '2024-11-24 09:40:30'),
('cd26b7aa-4eed-4c2c-a868-308654f21bc8', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[WDEV-5] has been created\",\"message\":\"Ankan Polley has requested for a new job on Web Development\"}', NULL, '2024-11-26 00:06:05', '2024-11-26 00:06:05'),
('d03ec584-2243-4dda-a809-5ed312a0da0e', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[GDEV-2] has been created\",\"message\":\"Ankan Polley has requested for a new job on Game Development\"}', NULL, '2024-11-26 00:59:58', '2024-11-26 00:59:58'),
('d5bf93ff-2697-40ed-b4d5-bd831e08e176', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[CART-4] has been created\",\"message\":\"Ankan Polley has requested for a new job on Concept Art\"}', '2024-11-24 12:23:46', '2024-11-24 12:23:04', '2024-11-24 12:23:46'),
('d8a5f905-3ae1-4a3a-968c-7792d22c63e7', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 2, '{\"header\":\"[UI-2] has been assigned to you\",\"message\":\"Admin has assigned you to a job\"}', '2024-11-24 10:58:56', '2024-11-24 10:58:40', '2024-11-24 10:58:56'),
('e1ae890c-71c6-44c2-87ba-f8cd67252b72', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 2, '{\"header\":\"[AV-3] has been assigned to you\",\"message\":\"Admin has assigned you to a job\"}', '2024-11-24 10:55:20', '2024-11-24 10:43:59', '2024-11-24 10:55:20'),
('f12d8b1a-13fc-414d-bc00-56c7f47e685d', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[VS-1] has been created\",\"message\":\"There is a new job request\"}', '2024-11-24 09:23:44', '2024-11-24 08:33:01', '2024-11-24 09:23:44'),
('f43ea871-28f5-4538-858a-1b3d48983d1d', 'App\\Notifications\\JobNotification', 'App\\Models\\User', 1, '{\"header\":\"[WDEV-4] has been created\",\"message\":\"Ankan Polley has requested for a new job on Web Development\"}', NULL, '2024-11-25 23:44:28', '2024-11-25 23:44:28');

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
-- Table structure for table `requested_jobs`
--

CREATE TABLE `requested_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_code` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `desc` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requested_jobs`
--

INSERT INTO `requested_jobs` (`id`, `job_code`, `customer_id`, `service_id`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GDEV-1', 1, 1, 'Need to create a little game', 'approved', '2024-11-17 03:16:52', '2024-11-17 03:21:30'),
(2, 'CART-1', 2, 4, 'Trying to create a concept art', 'approved', '2024-11-17 03:17:27', '2024-11-17 23:24:59'),
(3, 'AV-1', 3, 6, 'Trying to make a dungeon for my little kids', 'approved', '2024-11-17 03:18:48', '2024-11-24 10:42:09'),
(4, 'WDES-1', 1, 11, 'Need to design a new RPG game', 'approved', '2024-11-17 23:36:54', '2024-11-17 23:37:13'),
(5, 'GRAD-1', 3, 8, 'Need to design a loli fucking graphics', 'pending', '2024-11-18 00:47:24', '2024-11-24 10:40:43'),
(6, 'WDEV-1', 1, 12, 'Looking to create an E-commerce website', 'pending', '2024-11-23 04:35:02', '2024-11-24 10:41:30'),
(7, 'AV-2', 2, 6, 'Nothing much', 'approved', '2024-11-23 04:42:00', '2024-11-24 10:42:26'),
(8, 'CART-2', 1, 4, 'So fun', 'pending', '2024-11-23 04:44:28', '2024-11-23 04:44:28'),
(9, 'UI-1', 1, 5, 'Fun', 'pending', '2024-11-23 04:45:01', '2024-11-23 04:45:01'),
(10, 'GRAD-2', 1, 8, 'why not', 'pending', '2024-11-23 04:48:07', '2024-11-23 04:48:07'),
(40, 'VED-1', 1, 9, 'funnnnyyyyy', 'pending', '2024-11-23 11:17:42', '2024-11-23 11:17:42'),
(41, 'WDEV-2', 1, 12, 'fun fun fun', 'pending', '2024-11-23 11:21:30', '2024-11-23 11:21:30'),
(42, 'GRAD-3', 1, 8, 'Fun fun fun', 'pending', '2024-11-23 11:32:14', '2024-11-23 11:32:14'),
(43, 'GDES-1', 1, 2, 'Designing fun game', 'pending', '2024-11-23 11:36:29', '2024-11-23 11:36:29'),
(44, 'CART-3', 1, 4, 'Nothing not fun', 'pending', '2024-11-23 11:57:43', '2024-11-23 11:57:43'),
(45, 'WDEV-3', 1, 12, 'Developing a new website', 'pending', '2024-11-23 12:10:02', '2024-11-23 12:10:02'),
(47, 'AV-3', 1, 6, 'have fun', 'approved', '2024-11-24 07:58:21', '2024-11-24 10:43:59'),
(48, 'VS-1', 1, 7, 'Having fun', 'pending', '2024-11-24 08:33:01', '2024-11-24 08:33:01'),
(49, 'UI-2', 1, 5, 'Having fun with my niggas', 'approved', '2024-11-24 09:40:09', '2024-11-24 10:58:40'),
(50, 'VS-2', 1, 7, 'Have fun with niggas', 'approved', '2024-11-24 10:57:55', '2024-11-24 12:24:37'),
(51, 'CART-4', 1, 4, 'I wanna make a concept art', 'pending', '2024-11-24 12:23:04', '2024-11-24 12:23:04'),
(52, 'WDES-2', 1, 11, 'Looking to design a little website', 'pending', '2024-11-25 23:38:42', '2024-11-25 23:38:42'),
(53, 'WDEV-4', 1, 12, 'Nothing much', 'pending', '2024-11-25 23:44:28', '2024-11-25 23:44:28'),
(54, 'WDEV-5', 1, 12, 'Have fun niggas', 'pending', '2024-11-26 00:06:05', '2024-11-26 00:06:05'),
(55, 'GDES-2', 1, 2, 'Dhur bal', 'pending', '2024-11-26 00:08:52', '2024-11-26 00:08:52'),
(56, 'WDES-3', 1, 11, 'nothing', 'pending', '2024-11-26 00:12:37', '2024-11-26 00:12:37'),
(57, 'CGI-1', 1, 10, 'Panu banabo', 'pending', '2024-11-26 00:21:59', '2024-11-26 00:21:59'),
(58, 'GDEV-2', 1, 1, 'Panu game banabo', 'pending', '2024-11-26 00:59:58', '2024-11-26 00:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GDEV', 'Game Development', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(2, 'GDES', 'Game Design', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(3, 'GART', 'Game Art (2D and 3D)', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(4, 'CART', 'Concept Art', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(5, 'UI', 'UI/UX', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(6, 'AV', 'Architectural Visualisation', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(7, 'VS', 'Virtual Staging', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(8, 'GRAD', 'Graphic Design', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(9, 'VED', 'Video Editing(short form, Long form)', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(10, 'CGI', 'CGI Advertisement', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(11, 'WDES', 'Web Design', '2024-11-17 01:34:36', '2024-11-17 01:34:36'),
(12, 'WDEV', 'Web Development', '2024-11-17 01:34:36', '2024-11-17 01:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Fin7m8dxoxpf9kQZHLEeHJ79GmGlky6tssiYaceH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDV5RERIaHpxSVZWdTlDU0FabmhkeFVESXFWWFhKZHhEMkRlRGJtdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732679776);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `dob` date NOT NULL,
  `number` bigint(20) NOT NULL,
  `address` longtext NOT NULL,
  `designation` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `dob`, `number`, `address`, `designation`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '2024-11-17 01:36:36', '2024-11-15', 8420667334, 'no', 'developer', 'superadmin', '$2y$12$.ImTxlpjgULLQLvZVtiOVu5gBoYHFnSPdlehIp.2eLu/4Qh7QCGHm', 'HoLFDHYOGrr1Aht3Amrl1CdfaNBSruIo6GGGuM35obiFmC8IhhutzlKyIHpe', '2024-11-17 01:36:10', '2024-11-17 01:36:36'),
(2, 'Hodol Kutkut', 'hodol@hodol.com', '2024-11-17 03:20:57', '2024-11-10', 9999888822, 'nowhere', 'developer', 'worker', '$2y$12$Wn7NFGT5X2ojTzL29rwufOGukvQj7EF3Q4lRY/.rygkiIFifCoUa6', NULL, '2024-11-17 03:20:30', '2024-11-17 03:20:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_jobs`
--
ALTER TABLE `approved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_jobs_job_id_foreign` (`job_id`),
  ADD KEY `approved_jobs_approved_by_id_foreign` (`approved_by_id`),
  ADD KEY `approved_jobs_assigned_to_id_foreign` (`assigned_to_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `canceled_jobs`
--
ALTER TABLE `canceled_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canceled_jobs_job_id_foreign` (`job_id`),
  ADD KEY `canceled_jobs_canceled_by_id_foreign` (`canceled_by_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `daily_updates`
--
ALTER TABLE `daily_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_updates_job_id_foreign` (`job_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `requested_jobs`
--
ALTER TABLE `requested_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requested_jobs_customer_id_foreign` (`customer_id`),
  ADD KEY `requested_jobs_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `approved_jobs`
--
ALTER TABLE `approved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `canceled_jobs`
--
ALTER TABLE `canceled_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_updates`
--
ALTER TABLE `daily_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_jobs`
--
ALTER TABLE `requested_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approved_jobs`
--
ALTER TABLE `approved_jobs`
  ADD CONSTRAINT `approved_jobs_approved_by_id_foreign` FOREIGN KEY (`approved_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `approved_jobs_assigned_to_id_foreign` FOREIGN KEY (`assigned_to_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `approved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `requested_jobs` (`id`);

--
-- Constraints for table `canceled_jobs`
--
ALTER TABLE `canceled_jobs`
  ADD CONSTRAINT `canceled_jobs_canceled_by_id_foreign` FOREIGN KEY (`canceled_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `canceled_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `requested_jobs` (`id`);

--
-- Constraints for table `daily_updates`
--
ALTER TABLE `daily_updates`
  ADD CONSTRAINT `daily_updates_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `approved_jobs` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requested_jobs`
--
ALTER TABLE `requested_jobs`
  ADD CONSTRAINT `requested_jobs_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `requested_jobs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizy`
--

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `choice_id`, `exam_id`, `question_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'make_computer_run_faster', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 2, 1, 1, 'store_and_manage_data', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(3, 3, 1, 1, 'for_searching_data', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(4, 4, 1, 1, 'connect_to_internet', '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Intro_to_Programming', 1, 1, '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 'Intro_to_Database', 1, 1, '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `doing_exams`
--

INSERT INTO `doing_exams` (`id`, `exam_id`, `course_id`, `user_id`, `role_type_id`, `grade`, `begin_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, NULL, NULL, '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `enrollcourses`
--

INSERT INTO `enrollcourses` (`id`, `course_id`, `user_id`, `role_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 1, 4, 3, '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(3, 1, 5, 3, '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `user_id`, `allow_time`, `duration_min`, `created_at`, `updated_at`) VALUES
(1, 'Midterm', 2, NULL, 60, '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_id`, `exam_id`, `answer_choice_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Database_is_used_to', '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `role_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 2, 2, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(3, 3, 3, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(4, 3, 3, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(5, 4, 3, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(6, 5, 3, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `role_types`
--

INSERT INTO `role_types` (`id`, `name`, `description`, `authority_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 1, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 'lecturer', NULL, 1, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(3, 'student', NULL, 1, '1', '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `teachings`
--

INSERT INTO `teachings` (`id`, `course_id`, `user_id`, `role_type_id`, `teaching_role`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'main', '2020-10-18 22:53:11', '2020-10-18 22:53:11');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Joe', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(2, 'Minh', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(3, 'Liem', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(4, 'Tuan', '2020-10-18 22:53:11', '2020-10-18 22:53:11'),
(5, 'Thu', '2020-10-18 22:53:11', '2020-10-18 22:53:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

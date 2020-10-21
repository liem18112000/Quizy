-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 05:11 PM
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

INSERT INTO `choices` (`id`, `choice_id`, `exam_id`, `question_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'The relationship between one continuous dependent and one continuous independent variable   ', '1', NULL, NULL),
(2, 2, 1, 1, 'The relationship between one categorical dependent and one continuous independent variable', '1', NULL, NULL),
(3, 3, 1, 1, 'The relationship between one continuous dependent and one categorical independent variable', '1', NULL, NULL),
(4, 4, 1, 1, 'The relationship between one continuous dependent and one dichotomous variable', '1', NULL, NULL),
(5, 5, 1, 2, 'Regression with one dummy variable (predictor) corresponds directly to an independent analysis of variance (ANOVA) ', '1', NULL, NULL),
(6, 6, 1, 2, 'Regression with more than one dummy variable including a covariate corresponds directly to an independent analysis of covariance (ANCOVA)    ', '1', NULL, NULL),
(7, 7, 1, 2, 'Regression with more than one dummy variable (predictor) corresponds directly to an independent analysis of variance (ANOVA) ', '1', NULL, NULL),
(8, 8, 1, 2, 'Regression with one dummy variable (predictor) corresponds directly to an independent t-test     ', '1', NULL, NULL),
(9, 9, 2, 3, 'Changing the reference group ', '1', NULL, NULL),
(10, 10, 2, 3, 'Linear combination', '1', NULL, NULL),
(11, 11, 2, 3, 'Standardization     ', '1', NULL, NULL),
(12, 12, 2, 3, 'Not possible      ', '1', NULL, NULL),
(13, 13, 2, 4, 'To avoid the model misspecification      ', '1', NULL, NULL),
(14, 14, 2, 4, 'To increase the R-squared value', '1', NULL, NULL),
(15, 15, 2, 4, 'To avoid the situation of perfect multicollinearity', '1', NULL, NULL),
(16, 16, 2, 4, 'To control for other variables in the model      ', '1', NULL, NULL);

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `admin_id`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Programming', 1, 1, '1', NULL, NULL),
(2, 'Computer Network', 1, 1, '1', NULL, NULL);

--
-- Dumping data for table `enrollcourses`
--

INSERT INTO `enrollcourses` (`id`, `course_id`, `user_id`, `role_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 3, '1', NULL, NULL),
(2, 1, 5, 3, '1', NULL, NULL),
(3, 1, 6, 3, '1', NULL, NULL),
(4, 1, 7, 2, '1', NULL, NULL),
(5, 2, 4, 2, '1', NULL, NULL),
(6, 2, 5, 2, '1', NULL, NULL);

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `user_id`, `allow_time`, `duration_min`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quiz 1', 3, NULL, 15, '1', NULL, NULL),
(2, 'Midterm', 2, NULL, 60, '1', NULL, NULL);

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_id`, `exam_id`, `answer_choice_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'What does a dummy-variable regression analysis examine?', '1', NULL, NULL),
(2, 2, 1, 3, 'Which of the following is incorrect?', '1', NULL, NULL),
(3, 3, 2, 1, 'Which of the following procedures can be used to compare the means of the included groups in a dummy-variable regression model?', '1', NULL, NULL),
(4, 4, 2, 3, 'Why is the number of dummy variables to be entered into the regression model always equal to the number of groups (g) minus 1 (g-1)?', '1', NULL, NULL);

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `role_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', NULL, NULL),
(2, 2, 2, '1', NULL, NULL),
(3, 3, 2, '1', NULL, NULL),
(4, 4, 3, '1', NULL, NULL),
(5, 5, 3, '1', NULL, NULL),
(6, 6, 3, '1', NULL, NULL),
(7, 7, 3, '1', NULL, NULL);

--
-- Dumping data for table `role_types`
--

INSERT INTO `role_types` (`id`, `name`, `description`, `authority_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin can create and manage room, invite student and teacher to that room.', 1, '1', NULL, NULL),
(2, 'lecturer', 'lecturer can teach many class and make exam for that class', 2, '1', NULL, NULL),
(3, 'student ', 'student can enroll many classes and do exam in the class. ', 3, '1', NULL, NULL);

--
-- Dumping data for table `teachings`
--

INSERT INTO `teachings` (`id`, `course_id`, `user_id`, `role_type_id`, `teaching_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'main', '1', NULL, NULL),
(2, 1, 3, 2, 'assist', '1', NULL, NULL),
(3, 2, 2, 2, 'main', '1', NULL, NULL);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoa', 'hoajoe2000@gmail.com', '2020-10-21 14:07:37', '123456', 'Google', '1', '123456', NULL, NULL),
(2, 'Liem', 'liem@gmail.com', NULL, '123456', 'Google', '1', '123456', NULL, NULL),
(3, 'Minh', 'minh@gmail.com', NULL, '123456', 'Google', '1', '123456', NULL, NULL),
(4, 'Thu', 'thu@gmail.com', NULL, '123456', NULL, '1', NULL, NULL, NULL),
(5, 'Tuan', 'tuan@gmail.com', NULL, '123456', NULL, '1', NULL, NULL, NULL),
(6, 'Vu', 'vu@gmail.com', NULL, '123456', NULL, '1', NULL, NULL, NULL),
(7, 'Hoang', 'hoang@gmail.com', NULL, '123456', NULL, '1', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 08:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `kusenga`
--
CREATE DATABASE IF NOT EXISTS `kusenga` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kusenga`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `author_surname` varchar(50) NOT NULL,
  `author_description` varchar(2083) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_surname`, `author_description`, `created_date`, `updated_date`) VALUES
(1, 'John', 'Doe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat.', '2019-02-04 12:04:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_heading` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_org_name` varchar(255) DEFAULT NULL,
  `news_org_url` varchar(2083) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `news_posted_date` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_heading`, `news_content`, `news_org_name`, `news_org_url`, `user_id`, `news_posted_date`, `created_date`, `updated_date`) VALUES
(1, 'What Data Scientists Do at takealot.com, Zoona, JUMO and Curately', '<p>The term “data scientist” has only been around for a few years: Apparently, it was coined in 2008 by either D.J. Patil or Jeff Hammerbacher - the then respective leads of data and analytics at LinkedIn and Facebook. Since then, data scientists have swiftly won in influence.</p>                            <p>Only four years later, the Harvard Business Review called data science the sexiest job of the 21st century. A recent report by IBM (The Quant Crunch) now predicts that the demand of data science skills in the US will grow by 28% by 2020.</p>                            <p>But despite the growing need for data scientists, there is no direct path to follow to become one. It is also not that easy to understand what exactly they do in different companies. What is the difference between business intelligence, data analysis and data science, for example? What is the unique contribution of a data science team in a company? What do companies look for when hiring data scientists?</p>                            <p>To answer these questions, we talked to Jaco du Toit - an accidental data scientist who was introduced to machine learning while pursuing his Master’s Degree in Computer Science. Earlier this year, he joined Curately as Lead Data Scientist and is also busy with a PhD focused on Probabilistic Graphical Models.</p>                           <p>In addition, data scientists from takealot.com (Luyolo Magangane and Michel Halmes), Zoona (Morne van der Westhuizen) and JUMO (Paul Kotze and Liam Furman) contributed to this article by giving an in-depth explanation of the work they do at these companies.</p>', 'Offerzen', 'https://www.offerzen.com/blog/what-data-scientists-do-at-takealot-com-zoona-jumo-and-curately', 3, '2019-02-04 12:00:49', '2019-02-04 11:24:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_author`
--

DROP TABLE IF EXISTS `news_author`;
CREATE TABLE `news_author` (
  `news_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_author`
--

INSERT INTO `news_author` (`news_id`, `author_id`, `created_date`, `updated_date`) VALUES
(1, 1, '2019-02-04 12:04:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_contact` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_username`, `user_password`, `user_contact`, `user_email`, `created_date`, `updated_date`) VALUES
(1, 'Johan', 'Havenga', 'johan.havenga', '8c9f07d8d46cbc268cc57dcbdf3612b8b32d0dec', '', 'johan.havenga@gmail.com', '2018-12-12 05:23:07', '2019-01-23 04:19:29'),
(2, 'Lwazi', 'Mrwetyana', 'lwazi.mrwetyana', '46ac4ab5ff159b0fe67a9479c1341228a9f2cf2a', '0611611847', 'Lwazi@kusenga.com', '2018-12-12 06:29:58', NULL),
(3, 'Morne', 'van der Westhuizen', NULL, NULL, NULL, NULL, '2019-02-04 11:57:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_author`
--
ALTER TABLE `news_author`
  ADD PRIMARY KEY (`news_id`,`author_id`),
  ADD UNIQUE KEY `news_id` (`news_id`,`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `u_user_pass` (`user_username`,`user_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

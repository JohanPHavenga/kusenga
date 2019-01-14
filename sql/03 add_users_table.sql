SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+02:00";

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_contact` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `users` ADD UNIQUE `u_user_pass` (`user_username`, `user_password`);
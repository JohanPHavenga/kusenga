SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+02:00";

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_heading` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `news` ADD PRIMARY KEY (`news_id`);
ALTER TABLE `news` MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
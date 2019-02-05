CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO `status` (`status_id`, `status_name`, `created_date`, `updated_date`) VALUES (NULL, 'Published', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000'), (NULL, 'Unpublished', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');

ALTER TABLE `news` ADD `news_status` TINYINT(2) NOT NULL DEFAULT '2' AFTER `user_id`;
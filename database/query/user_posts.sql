CREATE TABLE `user_posts` (
  `id` int NOT NULL,
  `bio` longtext NOT NULL,
  `avatar` varchar(1024) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dob` date NOT NULL,
  `instagram` varchar(1024) NULL,
  `facebook` varchar(1024) NULL
);

-- This is i alter to join the foreigin key from the user_data

ALTER TABLE `user_posts`
CHANGE `id` `id` tinyint(4) NOT NULL FIRST,
CHANGE `bio` `bio` longtext NOT NULL AFTER `id`,
CHANGE `avatar` `avatar` varchar(1024) NOT NULL AFTER `bio`,
CHANGE `firstname` `firstname` text NOT NULL AFTER `avatar`,
CHANGE `lastname` `lastname` text NOT NULL AFTER `firstname`,
CHANGE `instagram` `instagram` varchar(1024) NULL AFTER `dob`,
CHANGE `facebook` `facebook` varchar(1024) NULL AFTER `instagram`,
ADD FOREIGN KEY (`id`) REFERENCES `user_data` (`id`);

<?php

include 'DB_class.php';


$migration = new DB();


$migration->insert('
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `link_post` text NOT NULL,
  `text_post` text NOT NULL,
  `img_post` text NOT NULL,
  `video_post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;');


$migration->insert('CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `link_post` text NOT NULL,
  `text_post` text NOT NULL,
  `img_post` text NOT NULL,
  `video_post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;');






$migration->insert('CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `userpp` text NOT NULL,
  `banner` text NOT NULL,
  `description` text NOT NULL,
  `theme` int(11) NOT NULL DEFAULT 0,
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
');


?>
<?php

include 'DB.php';

$migration = new DB();

$migration->insert('CREATE TABLE `chat` (
    id INT AUTO_INCREMENT PRIMARY KEY,  
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `link_post` text NOT NULL,
  `text_post` text NOT NULL,
  `img_post` text NOT NULL,
  `video_post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;');

$migration->insert('CREATE TABLE `comments` (
    id INT AUTO_INCREMENT PRIMARY KEY,  
  `tweet_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `link_post` text NOT NULL,
  `text_post` text NOT NULL,
  `img_post` text NOT NULL,
  `video_post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;');

$migration->insert('CREATE TABLE `users` (
    id INT AUTO_INCREMENT PRIMARY KEY,  
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `userpp` varchar(255) NOT NULL,
  `banner` text NOT NULL,
  `description` text NOT NULL,
  `theme` int(11) NOT NULL DEFAULT 0,
  `user_date` datetime NOT NULL DEFAULT current_timestamp()
) 
');

$migration->insert('CREATE TABLE `follow` (
    id INT AUTO_INCREMENT PRIMARY KEY,  
  `follower_id` int NOT NULL,
  `following_id` int NOT NULL
)');

$migration->insert('CREATE TABLE  `like_post` (
    id INT AUTO_INCREMENT PRIMARY KEY,  
  `ID_user` int NOT NULL,
  `ID_Tweet` int NOT NULL
)');



$migration->insert('CREATE TABLE  `tweet` (
 
 id INT AUTO_INCREMENT PRIMARY KEY,  
  `id_user` int NOT NULL,
  `text_post` text NOT NULL,
  `link_post` text NOT NULL,
  `img_post` text NOT NULL,
  `video_post` text NOT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
)' );




?>



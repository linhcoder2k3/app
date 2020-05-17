<?php
    if(!$Core->sql_fetch_assoc('SELECT * FROM `setting`')){
        $Core->sql_query("CREATE TABLE `setting` (
        `id` int(6) UNSIGNED NOT NULL,
        `domain` varchar(100) NOT NULL,
        `title` varchar(500) NOT NULL,
        `idfb` varchar(50) NOT NULL,
        `phone` varchar(50) NOT NULL,
        `admin` varchar(50) NOT NULL,
        `keyword` text NOT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");   
         $Core->sql_query("INSERT INTO `setting` (`id`, `domain`, `title`, `idfb`, `phone`, `admin`, `keyword`) VALUES
                (1,'LinhCoder.Net', 'VIP Tools', '4', '0353257530', 'Hoàng Văn Lĩnh', 
                'Coder Hoàng Văn Lĩnh');");  
    }
    if(!$Core->sql_fetch_assoc('SELECT * FROM `users`')){
        $Core->sql_query("CREATE TABLE `users` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `email` varchar(100) NOT NULL,
        `username` varchar(100) NOT NULL,
        `password` varchar(100) NOT NULL,
        `sodu` varchar(100) NOT NULL,
        `nap` varchar(100) NOT NULL,
        `tieu` varchar(100) NOT NULL,
        `thanhvien` varchar(100) NOT NULL,
        `login` varchar(100) NOT NULL,
        `reg` varchar(100) NOT NULL
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
    }
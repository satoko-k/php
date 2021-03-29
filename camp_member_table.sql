-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-29 10:16:23
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `camp_plantdb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `camp_member_table`
--

CREATE TABLE `camp_member_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `rank_flg` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '雑草博士みならい',
  `indate` datetime NOT NULL,
  `image_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'profile.jpg',
  `image_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/profile/profile.jpg',
  `updatetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `camp_member_table`
--

INSERT INTO `camp_member_table` (`id`, `u_name`, `u_id`, `u_pw`, `rank_flg`, `indate`, `image_name`, `image_path`, `updatetime`) VALUES
(13, 'おなまえ', 'test10', 'testtest', '雑草博士みならい', '2021-03-25 09:47:10', 'profile.jpg', 'img/profile/profile.jpg', '2021-03-25 09:47:10'),
(23, 'てすとなまえ', 'test000', 'test0123', '雑草博士みならい', '2021-03-25 11:12:00', 'profile.jpg', 'img/profile/20210325060910profile.jpg', '2021-03-25 14:09:10'),
(24, 'てすとなまえ', 'test000', 'test0123', '雑草博士みならい', '2021-03-25 11:13:29', 'profile.jpg', 'img/profile/profile.jpg', '2021-03-25 11:13:29'),
(25, 'てすとなまえ', 'test000', 'test0123', '雑草博士みならい', '2021-03-25 11:14:11', 'profile.jpg', 'img/profile/profile.jpg', '2021-03-25 11:14:11'),
(26, 'なまえ花子', 'test01', 'test0123', '雑草博士の助手', '2021-03-25 14:12:18', 'profile.jpg', 'img/profile/20210329012325profile.jpg', '2021-03-29 08:23:25'),
(27, 'ちばけんはなこ', 'test02', 'test0123', '雑草博士', '2021-03-29 14:45:11', 'profile.jpg', 'img/profile/profile.jpg', '2021-03-29 14:47:06');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `camp_member_table`
--
ALTER TABLE `camp_member_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `camp_member_table`
--
ALTER TABLE `camp_member_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

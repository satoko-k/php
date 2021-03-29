-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-29 10:15:46
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
-- テーブルの構造 `likes_table`
--

CREATE TABLE `likes_table` (
  `id` int(12) NOT NULL,
  `plant_id` int(12) NOT NULL,
  `member_id` int(12) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `likes_table`
--

INSERT INTO `likes_table` (`id`, `plant_id`, `member_id`, `createtime`, `updatetime`) VALUES
(16, 5, 26, '2021-03-29 11:23:22', '0000-00-00 00:00:00'),
(23, 6, 26, '2021-03-29 14:21:09', '0000-00-00 00:00:00'),
(29, 2, 26, '2021-03-29 14:38:30', '0000-00-00 00:00:00'),
(30, 1, 26, '2021-03-29 14:43:28', '0000-00-00 00:00:00'),
(43, 6, 27, '2021-03-29 16:33:03', '0000-00-00 00:00:00'),
(47, 2, 27, '2021-03-29 17:03:02', '0000-00-00 00:00:00'),
(49, 10, 27, '2021-03-29 17:04:03', '0000-00-00 00:00:00'),
(50, 1, 27, '2021-03-29 17:08:12', '0000-00-00 00:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `likes_table`
--
ALTER TABLE `likes_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `likes_table`
--
ALTER TABLE `likes_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

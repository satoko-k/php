-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-29 10:16:52
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
-- テーブルの構造 `camp_plant_table`
--

CREATE TABLE `camp_plant_table` (
  `id` int(12) NOT NULL,
  `p_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `camp_plant_table`
--

INSERT INTO `camp_plant_table` (`id`, `p_name`, `f_name`, `season`, `category`, `comment`, `image`, `likes`) VALUES
(1, 'タンポポ', 'キク科 タンポポ属', '春', '多年草', 'タンポポは春の花のイメージですが、外来種の「セイヨウタンポポ」は春以外でもよく咲いています。日本にもともとあったタンポポは総称して「ニホンタンポポ」と呼びます。\r\nタンポポの綿毛が飛ぶ姿は愛らしいですが、綿毛が根づい生えてしまうとなかなか手強い雑草。その根はかんたんに再生してしまいます。', 'image001.jpg', 0),
(2, 'カタバミ', 'カタバミ科 カタバミ属', '春から夏', '多年草', 'ハートが３つ重なったような葉に、黄色い花が咲く愛らしい姿の雑草。クローバー(マメ科ジャジクソウ属)と見た目が似ているので近縁種に見られがちですが、別の科の雑草ですカタバミの名前の由来は、葉の一部が欠けて見えることからだそう。繁殖力・生命力の強さはピカイチ。\r\n', 'image002.jpg', 0),
(3, 'スギナ', 'トクサ科 トクサ属', '春～夏', '多年草', '春の野草「ツクシ」はスギナの胞子茎でのこと。春を象徴する野草である反面、スギナがいったん生えてしまうと、完全に駆除するのは至難の業。\r\n地下茎を伸ばしてどんどん繁茂し、何度抜いてもかんたんに再生できる能力を持っています。\r\n一説によるとスギナは恐竜の時代から存在してるとか。', 'image003.jpg', 0),
(4, 'ハルジオン', 'キク科 ムカシヨモギ属', '春', '多年草', '明治初期に渡来し、今では各地に広がった帰化植物。ハルジオンと似ていますが、ヒメジオンの方が草丈が高く、花は小さくて数が多く、葉柄はギザギザとしています。', 'image004.jpg', 0),
(5, 'ヒルガオ', 'ヒルガオ科 ヒルガオ属', '夏', '多年草', '日中に花が咲くことからヒルガオと名付けられたとされています。\r\n朝顔は一年草ですが、ヒルガオは多年草です。お庭の花や木に絡みつくように伸びるつる性の雑草です。', 'image005.jpg', 0),
(6, 'エノコログサ', 'イネ科 エノコログサ属', '夏～秋', '一年草', 'いわゆるネコジャラシのことです。可愛らしい見た目ですが、強光、乾燥に強く元気に育ちます。つい刈り込みたくなりますが、刈ると穂から種が落ち、種まきしている状態になります。', 'image006.jpg', 0),
(7, 'スズメノカタビラ', 'イネ科 イチゴツナギ属', '春・夏・秋・冬', '一年草', '日本だけでなく世界中に生息が確認されいる雑草。\r\n\r\n花言葉は「私を踏まないで」ですが、踏まれる程度では枯れ込むことはありません。', 'image007.jpg', 0),
(8, 'ドクダミ', 'ドクダミ科 ドクダミ属', '夏', '多年草', 'いっけん愛らしい清楚な花をさかせますが、独特な臭いと強靭な繁殖力をもつ雑草。ドクダミ茶という名で健康茶として販売されるほど、ドクダミには様々な薬効があるとされてます。', 'image008.jpg', 0),
(9, 'セイタカアワダチソウ', 'キク科 アキノキリンソウ属', '秋', '多年草', 'かつては観賞用として輸入されたものが雑草化し、いまや日本の侵略的外来種ワースト100ともなった植物。根から他の植物を枯らす物質を出し、勢力を広げていきます。すごいです。秋に黄色い花を咲かせます。', 'image009.jpg', 0),
(10, 'ホトケノザ', 'シソ科 オドリコソウ属', '春から初夏', '一年草', '葉に花がつく姿が仏様が座るところの蓮華座に似ていることからこの名がついたとされています。花の奥には蜜がある。春の七草に「ホトケノザ」とありますが、これは別の植物をさしているので、うっかり食べないように。', 'image010.jpg', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `camp_plant_table`
--
ALTER TABLE `camp_plant_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `camp_plant_table`
--
ALTER TABLE `camp_plant_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 5 月 07 日 08:59
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--a
-- データベース: `berry`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `announce_texts`
--

CREATE TABLE `announce_texts` (
  `id` int(11) NOT NULL,
  `announce_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `announce_texts`
--

INSERT INTO `announce_texts` (`id`, `announce_text`, `created_at`, `updated_at`) VALUES
(1, '今月のおすすめ商品は[xxxx]ですaa', '2023-02-02 22:55:56', '2023-04-23 01:35:51'),
(2, '本日の営業時間は午後6時までとなります。aa', '2023-02-02 22:56:17', '2023-04-22 16:08:55'),
(3, 'いらっしゃいませ', '2023-02-05 22:29:42', '2023-02-05 22:29:42'),
(4, '今月のおすすめは[商品名]です', '2023-02-05 22:32:10', '2023-02-05 22:32:10'),
(5, 'announce_text', '2023-04-22 10:36:37', '2023-04-22 10:36:37');

-- --------------------------------------------------------

--
-- テーブルの構造 `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `info1` text COLLATE utf8_unicode_ci,
  `info2` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `group_mapping`
--

CREATE TABLE `group_mapping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'daichi', 'shiinodaichi@gmail.com', 'testtest', 'yeah', '2023-02-02 00:46:43', '2023-02-02 00:53:19'),
(3, 'daichi2', 'shiinodaichi@gmail.com', 'testtest', '', '2023-02-02 22:27:52', NULL),
(4, 'test', 'test@gmail.com', 'testuser', '', '2023-04-15 19:07:21', NULL),
(5, 'test', 'test1@gmail.com', 'test1234', '', '2023-04-15 19:08:18', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `announce_texts`
--
ALTER TABLE `announce_texts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `group_mapping`
--
ALTER TABLE `group_mapping`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `announce_texts`
--
ALTER TABLE `announce_texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `group_mapping`
--
ALTER TABLE `group_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


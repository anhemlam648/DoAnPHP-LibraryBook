-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 23, 2024 lúc 01:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `readbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `author_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storiestype`
--

CREATE TABLE `storiestype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stories_storiestype`
--

CREATE TABLE `stories_storiestype` (
  `story_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`story_id`),
  ADD KEY `story_id` (`story_id`);

--
-- Chỉ mục cho bảng `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `storiestype`
--
ALTER TABLE `storiestype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stories_storiestype`
--
ALTER TABLE `stories_storiestype`
  ADD PRIMARY KEY (`story_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `storiestype`
--
ALTER TABLE `storiestype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);

--
-- Các ràng buộc cho bảng `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `stories_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `storiestype` (`id`);

--
-- Các ràng buộc cho bảng `stories_storiestype`
--
ALTER TABLE `stories_storiestype`
  ADD CONSTRAINT `stories_storiestype_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`),
  ADD CONSTRAINT `stories_storiestype_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `storiestype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

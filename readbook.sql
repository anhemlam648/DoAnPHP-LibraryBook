-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2024 lúc 06:18 AM
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

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `story_id`) VALUES
(17, 'hay\r\n', 46, 42),
(18, 'được', 46, 36),
(19, 'Tuyệt', 46, 36),
(20, 'tạm thôi', 47, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` longblob DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `stories`
--

INSERT INTO `stories` (`id`, `title`, `description`, `image`, `author`, `type_id`, `content`) VALUES
(36, 'TIÊN VÕ ĐẾ HIỆP', 'Thông tin truyện Tiên Võ Đế Tôn\r\nBạn đang theo dõi doctruyên Tiên Võ Đế Tôn của tác giả Lục Giới Tam Đạo rất hấp dẫn và lôi cuốn. Là một truyện được giới thiệu với bạn đọc trên trang đọc truyện chữ online. Đọc truyện bạn đọc sẽ được dẫn dắt vào một thế giới mới lạ, những tình tiết đặc sắc, đọc truyện Huyền Huyễn này để trải nghiệm và cảm nhận bạn nhé.\r\n\r\nChín ngàn năm trước, Tiên Võ Đế Tôn suất lĩnh trăm vạn Thần Tướng đánh vào Thái Cổ Hồng Hoang, lại không một người trở về, chỉ có một tia Chân Hỏa còn sót lại thế gian.', 0x433a2f78616d70702f7068702f7777772f776562646f6374727579656e2f7075626c69632f696d6167652f7469656e2d766f2d64652d746f6e2e6a7067, 'Nghĩa', 2, '“Ngoại môn đệ tử Diệp Thiên, bởi vì đan điền vỡ tan, lại không duyên tiên tu, hiện trục xuất Chính Dương tông, cả đời không phải lại bước vào Chính Dương Linh Sơn nửa bước.”\r\nHùng vĩ trong đại điện, băng lãnh thanh âm như là Thượng Thương tuyên án, tràn đầy không thể ngỗ nghịch uy nghiêm.\r\nPhía dưới, Diệp Thiên lẳng lặng đứng lặng trong điện, thần sắc trắng bệch như tờ giấy, nghe kia vô tình tuyên án, nắm đấm cũng theo đó nắm chặt lên, cố gắng lực đạo quá lớn, móng tay đều cắm vào trong lòng bàn'),
(42, 'TOÀN TRÍ ĐỘC GIẢ', 'Mô tả: Thông tin truyện Tiên Võ Đế Tôn Bạn đang theo dõi doctruyên Tiên Võ Đế Tôn của tác giả Lục Giới Tam Đạo rất hấp dẫn và lôi cuốn. Là một truyện được giới thiệu với bạn đọc trên trang đọc truyện chữ online. Đọc truyện bạn đọc sẽ được dẫn dắt vào một thế giới mới lạ, những tình tiết đặc sắc, đọc truyện Huyền Huyễn này để trải nghiệm và cảm nhận bạn nhé. Chín ngàn năm trước, Tiên Võ Đế Tôn suất lĩnh trăm vạn Thần Tướng đánh vào Thái Cổ Hồng Hoang, lại không một người trở về, chỉ có một tia Chân Hỏa còn sót lại thế gian.', 0x433a2f78616d70702f7068702f7777772f776562646f6374727579656e2f7075626c69632f696d6167652f746f616e2d7472692d646f632d6769612e6a7067, 'Nghĩa Kun', 1, 'Offline mừng sinh nhật Tàng Thư Viện lần thứ 7 ở Vân Triệt ý thức dần dần thức tỉnh.\r\n\r\n\r\n\r\n\r\n\r\nSao thế này...... Chẳng lẽ ta còn không có chết? Ta rõ ràng rơi xuống Tuyệt Vân nhai, như thế nào có thể còn sống ! hơn nữa trên người cư nhiên không có cảm giác đau đớn...... Liên cảm giác khó chịu đều không có? Đây là có chuyện gì?\r\n\r\n\r\n\r\n\r\n\r\nVân Triệt lập tức mở mắt, nhanh chóng đứng dậy ngồi dậy, rõ ràng phát hiện, chính mình lại tại nhất trương mềm mại trên giường lớn, giường phía trên buông xuốn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storiestype`
--

CREATE TABLE `storiestype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `storiestype`
--

INSERT INTO `storiestype` (`id`, `name`) VALUES
(1, 'Hành Động'),
(2, 'Tình Cảm'),
(3, 'Kinh dị');

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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(46, 'DEMO1', '$2y$10$UvLQr8W5InKgura.riNlV.tYST02FpbjkZTO5O/CuTa3r6K3d/C8O', 'VU NGHIA', 'vunghia467@gmail.com'),
(47, 'DEMO2', '$2y$10$dLccB2tGiEB4Ad6aOhsAQO9UT6see1NaBaKeDZzICvgW9OxojT3vG', 'nghia2222', 'anhemlam567@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(11, 46, 1),
(12, 47, 2);

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
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`),
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
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `storiestype`
--
ALTER TABLE `storiestype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Các ràng buộc cho bảng `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `storiestype` (`id`);

--
-- Các ràng buộc cho bảng `stories_storiestype`
--
ALTER TABLE `stories_storiestype`
  ADD CONSTRAINT `stories_storiestype_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`),
  ADD CONSTRAINT `stories_storiestype_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `storiestype` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

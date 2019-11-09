-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2019 at 11:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `user_id`, `product_id`, `note`, `created_at`, `updated_at`) VALUES
(136, 1, 23, 2, '1', 'Thursday, 7:11:2019', '0000-00-00 00:00:00'),
(137, 1, 23, 25, '1', 'Thursday, 7:11:2019', '0000-00-00 00:00:00'),
(138, 1, 23, 31, '1', 'Thursday, 7:11:2019', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_name` text DEFAULT NULL,
  `sell_price` varchar(20) DEFAULT NULL,
  `list_price` varchar(20) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `info_1` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `product_name`, `sell_price`, `list_price`, `status`, `info_1`, `detail`) VALUES
(2, 'img/dishes_2.jpg', 'Mỳ ống', '490000', '490000', 4, 'Món ngon tốt cho sức khoẻ\r\n', 'mỳ ống đc làm từ ống\r\n'),
(3, 'img/dishes_1.jpg', 'Xá xíu trứng', '60000', '700000', 2, 'Món ngon tốt cho sức khoẻ\r\n', 'hfdmbvm fd'),
(25, 'img/dishes_3.jpg', 'Bánh đường', '856000', '2500000', 3, 'Món ngon tốt cho sức khoẻ\r\n', 'jhdj'),
(26, 'img/dishes_5.jpg', 'Bánh 5', '10000', '12000', 4, 'Món ngon tốt cho sức khoẻ\r\n', 'img/san-pham/1543339619.'),
(27, 'img/5bf771e9ef12d.jpg', 'Monkey Juice', '100000', '1000', 2, 'Món ngon tốt cho sức khoẻ', ''),
(28, 'img/slider-1.jpg', 'Thịt quay', '49000', NULL, 3, 'Món ngon tốt cho sức khoẻ', ''),
(29, 'img/5bfaeab25f263.jpg', 'Blood pudding', '1000', '1000', 4, 'Món ngon tốt cho sức khoẻ', 'nhập mô tả'),
(30, 'img/5db26a5dea4b1-gà.jpg', ' Bò xào khổ qua', '100000', '100000', 2, 'Món ngon tốt cho sức khoẻ', 'Nguyên liệu\r\nếch 200g ,bột mỳ 10g ,thơm 50g, cà chua 100g ,hành tây 100g, cà ri bột 5g ,hạt nêm Knorr Thịt thăn, Xương ống & Tủy - Bổ sung Vitamin A 5g, dầu ăn 15g, tiêu 0.2g, ngò rí 5g\r\n1\r\nBước đầu tiên để thực hiện chế biến món ăn này thì chúng ta cần chuẩn bị đầy đủ các nguyên liệu và cần rửa thật sạch. Đối với ếch, để chế biến cho ngon thì tốt nhất bạn nên chặt đầu và lột sạch da. Sau đó tiếp tục loại bỏ luôn hết sạch nội tạng và rửa sạch với nước để khử bớt mùi tanh. Sau đó nên bỏ vào rổ để cho thịt ếch dễ ráo.\r\n2\r\nTiếp theo, chúng ta cũng nên làm sạch các gia vị còn lại. Cà chua, hành tây, ngò rí, thơm cũng nên rửa thật sạch để chế biến món ăn hợp vệ sinh và an toàn thực phẩm hơn. Sau khi rửa sạch thì cũng nên cho vào rổ và để ráo nước.\r\n3\r\nBước kế tiếp, chúng ta lấy thịt ếch đã rửa sạch và ráo nước sau đó đem cắt miếng vừa ăn. Xong sau đó cho ếch và một tô lớn và bắt đầu ướp ếch với hạt nêm Knorr Thịt thăn, Xương ống & Tủy - Bổ sung Vitamin A và cà ri. Rồi đậy nắp, để khoảng 5 phút, sau đó tẩm với 1 chút bột mỳ.\r\n4\r\nTiếp tục, chúng ta nên lấy thơm cắt miếng, cà chua, hành tây bổ cau và bỏ vào tô khác, có thể để chung cà chua, thơm và hành tây chung cũng được.\r\n5\r\nBước tiếp theo, chúng ta cần thực hiện là bắt chảo lên bếp và cho dầu ăn vào làm nóng dầu ăn. Sau đó, tiếp tục cho ếch đã ướp gia vị vào chiên cho vàng. Sau đó, vớt ra và để riêng vào một đĩa.\r\n6\r\nTiếp theo, cho hỗn hợp cà chua, hành tây, thơm vào xào chín rồi nêm với hạt nêm Knorr Thịt thăn, Xương ống & Tủy - Bổ sung Vitamin A. Sau đó cho ếch đã chín vàng vào và tiếp tục đảo đều.\r\n7\r\nBước cuối cùng, chúng ta cho thêm ngò rí đã rửa sạch và tiêu. Tùy theo khẩu vị ăn của mỗi nhà và mỗi người mà bạn có thể nêm nếm thêm sao cho phù hợp với khẩu vị của mình.\r\n8\r\nVà cuối cùng, sau khi đã nêm vừa ăn thì chúng ta bắt đầu tắt bếp, nhắc xuống và dọn ra đĩa rồi ăn kèm với cơm nóng. Để có thêm hương vị thì khi nêm bạn nên cho nhạt một xíu để sau đó ăn kèm với nước mắm tỏi ớt chua ngọt sẽ hấp dẫn hơn.'),
(31, 'img/5db26aef38fa7-5daee154c0ecf-download.jpeg', 'Rùa rang muối', '49000', '49000', 3, 'Món ngon tốt cho sức khoẻ', 'hihi'),
(32, 'img/slider-4.jpg', 'Tender beef', '1000', '1000', 4, 'Món ngon tốt cho sức khoẻ', ''),
(33, 'img/slider-3.jpg', 'Fish cooked ', '1000', '1000', 2, 'Món ngon tốt cho sức khoẻ', ''),
(34, 'img/slider-5.jpg', 'Swamp-eel salad', '1000', '1000', 3, 'Món ngon tốt cho sức khoẻ', 'abchhs'),
(43, 'img/5dae66e7144a4-5bf6b7f52dcee.jpg', 'Thịt chua cay', '123', '11234', 4, 'bánh ngon', 'tốt cho sức khoẻ ngừoi tiêu dùng '),
(44, 'img/5daee13349f3e-chup-san-pham.jpg', 'Bánh cuốn', '123', '1234', 2, 'hihihi', 'hihihi'),
(45, 'img/5daee154c0ecf-download.jpeg', 'Mỳ ống ngon hihih', '123', '1234', 3, 'ff', 'fff'),
(46, 'img/5daee17a351cc-top-15-hinh-anh-mon-an-ngon-viet-nam-khien-ban-khong-the-roi-mat.jpeg', 'aaabcbbc fffff', '123', '1234', 3, '111', 'Here you can change the version of php that is used to run your websites.\r\n'),
(47, 'img/5db6ac3db991d-72483245_483725498880087_2561197493773664256_n.jpg', 'Bánh đa cua', '12000', '20000', 2, 'Bánh ngon', 'Bánh bán');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `password`, `role`, `avatar`) VALUES
(18, 'Nguyễn văn C', 'hà nội', '0998765432', 'chunzz@gmail.com', '$2y$10$53Hc3iqW52eGoKlBsGidY.nNF91PBRe8U64OWWrv0nrq8VYSXFdN2', 1, 'https://www.xahara.vn/wp-content/uploads/h%C3%ACnh-%E1%BA%A3nh-Alaska-%C4%91%E1%BA%B9p-%C4%91%C3%A1ng-y%C3%AAu.jpg'),
(20, 'Hoàng quốc gia', 'hà nội', '0918765432', 'abc@gmail.com', '$2y$10$ievTIT3mQpXbHsUhs7KuiOHVhqM6zvIq0JgaTDKc/b74HoB9cmYpG', 5, 'https://www.xahara.vn/wp-content/uploads/h%C3%ACnh-%E1%BA%A3nh-Alaska-%C4%91%E1%BA%B9p-%C4%91%C3%A1ng-y%C3%AAu.jpg'),
(22, 'Nguyễn văn Nam', 'hà nội', '0398276344', 'nambg@gmail.com', '$2y$10$ulY25Oi.3nmoTU9/DQpY3.q/TC90V4of3bbOERgD5yKVdUpzmpnNu', 5, 'https://www.xahara.vn/wp-content/uploads/h%C3%ACnh-%E1%BA%A3nh-Alaska-%C4%91%E1%BA%B9p-%C4%91%C3%A1ng-y%C3%AAu.jpg'),
(23, 'Hoàng Văn An', 'hà nội', '0837353631', 'hoangan@gmail.com', '$2y$10$e6LkYmSVKhsn1rQvzPJgJu8/IApLqsu3Vzv6mKDbTR6zYUiKvBpqu', 5, 'https://www.xahara.vn/wp-content/uploads/h%C3%ACnh-%E1%BA%A3nh-Alaska-%C4%91%E1%BA%B9p-%C4%91%C3%A1ng-y%C3%AAu.jpg'),
(24, 'chunzzz', '', '', 'abcxyz@gmail.com', '$2y$10$fWnvp8cWPsOqs1aAudUMo.9fZM1nKgasJZ9LnTrTtXt5.2pY1VUm6', 5, '1'),
(25, 'abc', '1', '1', 'xwn@gmail.com', '$2y$10$neb77GHpNVmBcr3x6RhM..yVTXa5cmTZlf.F7iIF5HYdAFToVmoGG', 5, '1'),
(26, 'Nguyễn văn C', '1', '1', 'chunzzaa@gmail.com', '$2y$10$V1/pPVS5dtqsZCSIKgrr4ODboXodVcu/VLtEXFK63eYniAqflt06W', 5, '1'),
(27, 'Nguyễn văn C he he', '1', '1', 'cc@gmail.com', '$2y$10$yxI9FXpG9vHCM9VtCQaymezINnizpBNsNkJTHdHaS.VutNRHOYmNS', 5, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

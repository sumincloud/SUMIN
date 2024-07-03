-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-07-01 13:39
-- 서버 버전: 10.4.22-MariaDB
-- PHP 버전: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `shop`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `no` int(6) NOT NULL,
  `mb_id` varchar(20) NOT NULL,
  `mb_name` varchar(30) NOT NULL,
  `mb_password` varchar(255) NOT NULL,
  `mb_email` varchar(255) NOT NULL,
  `mb_address` varchar(255) NOT NULL,
  `mb_phone` varchar(11) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`no`, `mb_id`, `mb_name`, `mb_password`, `mb_email`, `mb_address`, `mb_phone`, `datetime`) VALUES
(3, '1111', '이순신', '$2y$10$PBBgwti/TeDnmHi6sr6.D.pOLX.ajAEehEpCQw4V2hmHbvM7hm4QO', '1111@naver.com', '1111', '1111', '2024-06-28 19:04:28'),
(4, 'admin', '관리자', '$2y$10$GIVDqIL17ckp333EfRm2KewnnNURnEW/3bJvrGuuldxRZEcTKDwaK', 'admin@naver.com', '1234', '1234', '2024-07-01 09:44:30'),
(5, 'guest1', 'guest1', '$2y$10$1vCk.f4g6kwOFAISMR.k9e5rOWq3M6Cc44.MQt9KH.ujsaTt1YkCq', 'guest1@naver.com', '서울시 종로구', '01012345678', '2024-07-01 16:49:42');

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_data`
--

CREATE TABLE `shop_data` (
  `no` int(6) NOT NULL,
  `cate` varchar(100) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `parent` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `comment` varchar(500) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `shop_data`
--

INSERT INTO `shop_data` (`no`, `cate`, `img`, `name`, `parent`, `price`, `comment`, `memo`, `datetime`) VALUES
(1, 'cate01', 'product1.jpg', '미끄럼방지매트', '미끄럼방지매트', 10000, '설명2', '메모', '2024-04-09 00:00:00'),
(2, 'cate01', 'product2.jpg', '계단', '계단', 15000, '설명2', '메모', '2024-04-09 00:00:00'),
(3, 'cate01', 'product3.jpg', '침대', '침대', 99000, '설명2', '메모', '2024-04-09 00:00:00'),
(4, 'cate02', 'product3.jpg', '미끄럼방지매트', '미끄럼방지매트', 10000, '설명2', '메모', '2024-04-09 00:00:00'),
(5, 'cate02', 'product1.jpg', '계단', '계단', 15000, '설명2', '메모', '2024-04-09 00:00:00'),
(6, 'cate02', 'product2.jpg', '침대', '침대', 99000, '설명2', '메모', '2024-04-09 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_list`
--

CREATE TABLE `shop_list` (
  `order_no` int(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `shop_list`
--

INSERT INTO `shop_list` (`order_no`, `name`, `email`, `phone`, `address`, `memo`, `total`, `datetime`) VALUES
(1, '상품명', 'abd@naver.com', '0101234567', '서울시 종로구', '메모', 50000, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_temp`
--

CREATE TABLE `shop_temp` (
  `no` int(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `parent` varchar(20) NOT NULL,
  `count` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `money` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `session_id` varchar(10) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `shop_temp`
--

INSERT INTO `shop_temp` (`no`, `name`, `parent`, `count`, `price`, `money`, `img`, `comment`, `session_id`, `datetime`) VALUES
(1, '계단', '계단', '4', 15000, 60000, 'product1.jpg', '설명2', '', '2024-07-01 19:42:49'),
(2, '미끄럼방지매트', '미끄럼방지매트', '12', 10000, 120000, 'product1.jpg', '설명2', '', '2024-07-01 19:51:00'),
(3, '미끄럼방지매트', '미끄럼방지매트', '11', 10000, 110000, 'product1.jpg', '설명2', '', '2024-07-01 19:55:23'),
(4, '미끄럼방지매트', '미끄럼방지매트', '22', 10000, 220000, 'product1.jpg', '설명2', '', '2024-07-01 19:58:20'),
(5, '미끄럼방지매트', '미끄럼방지매트', '12', 10000, 120000, 'product1.jpg', '설명2', 'guest1', '2024-07-01 20:03:35'),
(6, '미끄럼방지매트', '미끄럼방지매트', '3', 10000, 30000, 'product3.jpg', '설명2', 'guest1', '2024-07-01 20:04:11'),
(7, '계단', '계단', '22', 15000, 330000, 'product2.jpg', '설명2', 'guest1', '2024-07-01 20:37:26');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `shop_data`
--
ALTER TABLE `shop_data`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`order_no`);

--
-- 테이블의 인덱스 `shop_temp`
--
ALTER TABLE `shop_temp`
  ADD PRIMARY KEY (`no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `shop_data`
--
ALTER TABLE `shop_data`
  MODIFY `no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 테이블의 AUTO_INCREMENT `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `order_no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `shop_temp`
--
ALTER TABLE `shop_temp`
  MODIFY `no` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

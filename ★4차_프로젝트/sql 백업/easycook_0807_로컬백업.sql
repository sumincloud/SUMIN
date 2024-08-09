-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-08-07 09:19
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `easycook`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `academy_info`
--

CREATE TABLE `academy_info` (
  `no` int(11) NOT NULL,
  `category1` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  `price` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `academy_info`
--

INSERT INTO `academy_info` (`no`, `category1`, `code`, `price`, `datetime`) VALUES
(1, '한식조리기능사', '20240710A01', '140000', '2024-07-01 00:00:00'),
(2, '양식조리기능사', '20240710A02', '150000', '2024-07-01 00:00:00'),
(3, '일식조리기능사', '20240710A03', '160000', '2024-07-01 00:00:00'),
(4, '중식조리기능사', '20240710A04', '170000', '2024-07-01 00:00:00'),
(5, '베이커리', '20240710A05', '350000', '2024-07-01 00:00:00'),
(6, '바리스타', '20240710A06', '240000', '2024-07-01 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `academy_list`
--

CREATE TABLE `academy_list` (
  `class_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  `category1` varchar(255) NOT NULL DEFAULT '',
  `category2` varchar(255) NOT NULL DEFAULT '',
  `category3` varchar(255) NOT NULL DEFAULT '',
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `teacher` varchar(255) NOT NULL DEFAULT '',
  `place` varchar(255) NOT NULL DEFAULT '',
  `phone` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL DEFAULT '',
  `member_num` int(11) NOT NULL,
  `nth` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `class_status` varchar(10) NOT NULL DEFAULT '',
  `thumnail_img` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `detail` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `academy_list`
--

INSERT INTO `academy_list` (`class_no`, `name`, `code`, `category1`, `category2`, `category3`, `teacher_code`, `teacher`, `place`, `phone`, `grade`, `member_num`, `nth`, `start_date`, `end_date`, `start_time`, `end_time`, `class_status`, `thumnail_img`, `img`, `detail`, `datetime`) VALUES
(1, '내일배움카드 재직자반 한식조리', '20240710A01', '한식조리기능사', '국비', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-07-29', '2024-08-02', '08:00:00', '17:00:00', '현재강의', '20240710A01.png', '20240710A01_1.png', '', '2024-08-02 18:07:42'),
(2, '중식의 전문가가 되자!', '20240710A04', '중식조리기능사', '일반', '주말', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-05', '2024-08-09', '08:00:00', '17:00:00', '예정강의', '20240710A04.png', '20240710A04_1.png', '', '2024-08-02 18:22:40'),
(3, '나도 바리스타!', '20240710A06', '바리스타', '취미', '주말', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '중', 10, 1, '2024-08-12', '2024-08-16', '08:00:00', '17:00:00', '예정강의', '20240710A06.png', '20240710A06_1.png', '', '2024-08-02 18:24:37'),
(4, '꿈빛 파티시엘', '20240710A05', '제과제빵', '자격증', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-05', '2024-08-09', '08:00:00', '17:00:00', '현재강의', '20240710A05.png', '20240710A05_1.png', '꿈빛 파티시엘이 되어보자!', '2024-08-02 18:27:52'),
(5, '신나는 요리시간★', '20240710A03', '일식조리기능사', '창업', '주말', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '중', 10, 1, '2024-07-22', '2024-07-26', '08:00:00', '17:00:00', '지난강의', '20240710A03.png', '20240710A03_1.png', '', '2024-08-02 18:29:18'),
(6, '내일배움카드 재직자반 한식조리', '20240710A01', '한식조리기능사', '국비', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-30', '2024-10-11', '08:00:00', '17:00:00', '현재강의', '20240710A01.png', '20240710A01_1.png', '', '2024-08-02 18:07:42'),
(7, '내일배움카드 재직자반 한식조리', '20240710A01', '한식조리기능사', '국비', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-30', '2024-10-11', '08:00:00', '17:00:00', '현재강의', '20240710A01.png', '20240710A01_1.png', '', '2024-08-02 18:07:42'),
(8, '내일배움카드 재직자반 한식조리', '20240710A01', '한식조리기능사', '국비', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-30', '2024-10-11', '08:00:00', '17:00:00', '현재강의', '20240710A01.png', '20240710A01_1.png', '', '2024-08-02 18:07:42'),
(9, '내일배움카드 재직자반 한식조리', '20240710A01', '한식조리기능사', '국비', '평일', '202406EC01', '김선생', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 10, 1, '2024-08-30', '2024-10-11', '08:00:00', '17:00:00', '현재강의', '20240710A01.png', '20240710A01_1.png', '', '2024-08-02 18:07:42');

-- --------------------------------------------------------

--
-- 테이블 구조 `attendance`
--

CREATE TABLE `attendance` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `attendance`
--

INSERT INTO `attendance` (`no`, `class_no`, `id`, `name`, `teacher_code`, `datetime`) VALUES
(1, 2, 'student1', '이학생', '', '2024-08-05 11:06:52'),
(2, 4, 'student1', '이학생', '', '2024-08-05 11:13:34'),
(3, 2, 'student1', '이학생', '', '2024-08-01 08:00:52'),
(4, 2, 'student1', '이학생', '', '2024-08-06 12:44:57'),
(5, 4, 'student1', '이학생', '', '2024-08-06 12:45:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `memo` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`no`, `class_no`, `title`, `memo`, `id`, `datetime`) VALUES
(1, 1, '휴강일 안내', '8월 15일 광복절 16일 학원 휴일로 수업 없습니다.', 'teacher', '2024-10-10 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `id` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `cart`
--

INSERT INTO `cart` (`no`, `class_no`, `id`, `datetime`) VALUES
(2, 2, 'student1', '2024-08-02 18:27:54'),
(5, 4, 'student1', '2024-08-02 20:38:56'),
(7, 3, 'student1', '2024-08-06 18:09:35');

-- --------------------------------------------------------

--
-- 테이블 구조 `ec_notice`
--

CREATE TABLE `ec_notice` (
  `no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `memo` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `ec_notice`
--

INSERT INTO `ec_notice` (`no`, `title`, `memo`, `datetime`) VALUES
(1, '[행정] 신규 입사자 소개', '신규 입사자 \'나선생\'님 축하드립니다.', '2024-07-16 00:00:00'),
(2, '[휴가] 여름휴가 안내', '여름 휴가 이신분들은 2024.07.30까지 휴가계 내주십시오.', '2024-07-16 00:00:00'),
(3, '[휴가] 학생들에게 휴가 공지해주세요', '학생들에게 휴가 공지해주세요. 여름 휴가 이신분들은 2024.07.30까지 휴가계 내주십시...', '2024-07-16 00:00:00'),
(4, '[행정] 공가 신청 안내 ', '공가 신청 안내드립니다.', '2024-07-16 00:00:00'),
(5, '[행정] 경조사 신청 안내 ', '경조사 신청 안내드립니다.', '2024-07-16 00:00:00'),
(6, '[행정] 여름휴가 콘도 신청 안내 ', '여름휴가 콘도 신청 안내드립니다.', '2024-07-16 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `order`
--

CREATE TABLE `order` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `student_status` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `order`
--

INSERT INTO `order` (`no`, `class_no`, `teacher_code`, `id`, `name`, `student_status`, `datetime`) VALUES
(1, 2, '202406EC01', 'student1', '이학생', '수강중', '2024-08-02 18:28:03'),
(2, 4, '202406EC01', 'student1', '이학생', '수강중', '2024-08-02 18:28:26'),
(3, 3, '202406EC01', 'student1', '이학생', '수강중', '2024-08-02 18:56:08'),
(4, 2, '202406EC01', 'student2', '이초보', '수강중', '2024-08-02 19:28:58'),
(5, 4, '202406EC01', 'student2', '이초보', '수강중', '2024-08-02 19:29:09'),
(6, 5, '202406EC01', 'student1', '이학생', '수강중', '2024-07-01 18:28:26');

-- --------------------------------------------------------

--
-- 테이블 구조 `question`
--

CREATE TABLE `question` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `question_id` varchar(255) NOT NULL DEFAULT '',
  `question` varchar(255) NOT NULL DEFAULT '',
  `question_memo` varchar(255) NOT NULL DEFAULT '',
  `question_time` datetime NOT NULL DEFAULT current_timestamp(),
  `answer_id` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `answer_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `register`
--

CREATE TABLE `register` (
  `no` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `register`
--

INSERT INTO `register` (`no`, `profile`, `id`, `password`, `name`, `phone`, `email`, `teacher_code`, `datetime`) VALUES
(1, 'profile01.png', 'teacher', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김선생', '01012341234', 'green1@green.com', '202406EC01', '2024-06-01 00:00:00'),
(2, 'profile02.png', 'teacher2', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '나교수', '01012341235', 'green2@green.com', '202406EC02', '2024-06-02 00:00:00'),
(3, 'profile03.png', 'teacher3', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '박선생', '01012341236', 'green3@green.com', '202406EC03', '2024-06-03 00:00:00'),
(4, 'profile04.png', 'teacher4', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '홍박사', '01012341237', 'green4@green.com', '202406EC04', '2024-06-04 00:00:00'),
(5, '66acada4d198c_IMG_6143.gif', 'student1', '$2y$10$AJTLiBPtl8UpuNor1I2EquuTEUfXkXzg13816iaWJWJyIVAjYmeaa', '이학생', '01012341238', 'green5@green.com', '', '2024-06-05 00:00:00'),
(6, '66acb3bd69b63_IMG_5822.jpeg', 'student2', '$2y$10$fu1LkIemMzmTgCc6bJLV0OGKRZwqXO83f.Z6oLi/Sh/o0mA6.1DM2', '이초보', '01012341239', 'green6@green.com', '', '2024-06-06 00:00:00'),
(7, 'profile07.png', 'student3', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '이프로', '01012341240', 'green7@green.com', '', '2024-06-07 00:00:00'),
(8, 'profile08.png', 'student4', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김초보', '01012341241', 'green8@green.com', '', '2024-06-08 00:00:00'),
(9, 'profile09.png', 'student5', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김프로', '01012341242', 'green9@green.com', '', '2024-06-09 00:00:00'),
(10, 'profile10.png', 'student6', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '박프로', '01012341243', 'green10@green.com', '', '2024-06-10 00:00:00'),
(11, 'profile11.png', 'student7', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '박초보', '01012341244', 'green11@green.com', '', '2024-06-11 00:00:00'),
(12, 'profile12.png', 'student8', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김박사', '01012341245', 'green12@green.com', '', '2024-06-12 00:00:00'),
(13, 'profile13.png', 'student9', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김학생', '01012341246', 'green13@green.com', '', '2024-06-13 00:00:00'),
(14, 'profile14.png', 'student10', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '나학생', '01012341247', 'green14@green.com', '', '2024-06-14 00:00:00'),
(15, 'profile15.png', 'student11', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '양학생', '01012341248', 'green15@green.com', '', '2024-06-15 00:00:00'),
(16, 'profile16.png', 'student12', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '채학생', '01012341249', 'green16@green.com', '', '2024-06-16 00:00:00'),
(17, 'profile17.png', 'student13', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '채프로', '01012341250', 'green17@green.com', '', '2024-06-17 00:00:00'),
(18, 'profile18.png', 'student14', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '김요리', '01012341251', 'green18@green.com', '', '2024-06-18 00:00:00'),
(19, 'profile19.png', 'student15', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '나천재', '01012341252', 'green19@green.com', '', '2024-06-19 00:00:00'),
(20, 'profile20.png', 'student16', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '최초보', '01012341253', 'green20@green.com', '', '2024-06-20 00:00:00'),
(21, 'profile21.png', 'student17', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '최프로', '01012341254', 'green21@green.com', '', '2024-06-21 00:00:00'),
(22, 'profile22.png', 'student18', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '최천재', '01012341255', 'green22@green.com', '', '2024-06-22 00:00:00'),
(23, 'profile23.png', 'student19', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '양천채', '01012341256', 'green23@green.com', '', '2024-06-23 00:00:00'),
(24, 'profile24.png', 'student20', '$2y$10$ZAIY6gMxbPoJNNx0J3KIk.CQEK0GtVelwKbb2gTgiuaLluaWj/4q2', '하초보', '01012341257', 'green24@green.com', '', '2024-06-24 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `code` varchar(255) NOT NULL DEFAULT '',
  `star` int(11) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `review` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`no`, `class_no`, `code`, `star`, `img`, `review`, `id`, `name`, `datetime`) VALUES
(1, 5, '20240710A03', 4, '66b0728a8539a_76e45f393fa41.jpg,66b0728a8565f_5ce35f4f62adc.jpg', '일식을 너무 좋아해가지고 제대로 배워보고싶어서 했어요 강사님들도 다 친절하시고 일본식 된장국 좋아하는데 이번에 배워서 좋았어요 강추합니다.', 'student1', '이학생', '2024-08-05 15:34:50');

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE `room` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `room` varchar(255) NOT NULL DEFAULT '',
  `room_date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `room`
--

INSERT INTO `room` (`no`, `class_no`, `room`, `room_date`, `start`, `end`, `id`, `name`, `datetime`) VALUES
(1, 2, '101', '2024-08-05', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 15:57:24'),
(5, 2, '101', '2024-08-05', '16:00:00', '17:00:00', 'student1', '이학생', '2024-08-05 17:05:49'),
(6, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:16'),
(4, 2, '101', '2024-08-05', '08:00:00', '09:00:00', 'student1', '이학생', '2024-08-05 16:39:38'),
(7, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:23'),
(8, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:31'),
(9, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:37'),
(10, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:43'),
(11, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:47'),
(12, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:26:52'),
(13, 2, '101', '2024-08-06', '10:00:00', '11:00:00', 'student1', '이학생', '2024-08-05 17:27:00'),
(14, 2, '101', '2024-08-06', '12:00:00', '13:00:00', 'student1', '이학생', '2024-08-05 17:31:18'),
(15, 2, '101', '2024-08-06', '13:00:00', '14:00:00', 'student1', '이학생', '2024-08-06 12:43:54'),
(16, 2, '101', '2024-08-06', '13:00:00', '14:00:00', 'student1', '이학생', '2024-08-06 12:44:27');

-- --------------------------------------------------------

--
-- 테이블 구조 `teacher_list`
--

CREATE TABLE `teacher_list` (
  `no` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL DEFAULT '',
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `profile` varchar(255) NOT NULL DEFAULT '',
  `birth` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `carrer` varchar(255) NOT NULL DEFAULT '',
  `license` varchar(255) NOT NULL DEFAULT '',
  `award` varchar(255) NOT NULL DEFAULT '',
  `in_date` datetime NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `teacher_list`
--

INSERT INTO `teacher_list` (`no`, `teacher_name`, `teacher_code`, `profile`, `birth`, `email`, `phone`, `address`, `carrer`, `license`, `award`, `in_date`, `datetime`) VALUES
(1, '김선생', '202406EC01', '../../images/common/profile.png', '1988-12-31', 'green1@green.com', '01012341234', '서울시 종로구', '現 (사)식생활제과협회 이사\n前 한국예술직업전문학교 제과제빵 팀장\n前 하나원 제과제빵 전임강사\n前 군포 평생학습원 제과제빵 전임강사\n前 한국장애인고용공단 제과제빵 전임강사\n前 까레몽과자점', '제과기능사\n제빵기능사\n제과마스터, 제빵마스터\n초코릿마스터(1급)\n케익디자이너(1급)\n샌드위치마스터', '2017 코리아푸드트렌드페어 심사위원\n2015 코리아푸드트랜드페어 제빵부분 금상\n2010 경기제과제빵패스티벌 제과부분 대상', '2024-06-01 00:00:00', '2024-06-01 00:00:00'),
(2, '나교수', '202406EC02', 'profile02.png', '1989-01-01', 'green2@green.com', '01012341235', '서울시 종로구', '(現) 코리아교육그룹 코리아요리아트아카데미 교육부 학과장\n(前) 조선호텔 한식당 ‘셔블’ 실습\n(前) 양지요리학원 교육부 전임강사\n(前) 뚜레본요리학원 요리부장\n2020/2021/2022 월드푸드트렌드페어 심사위원\n2023 대한민국 국제요리&제과경연대회 심사위원\n2023 월드푸드트렌드페어 심사위원\n2023 골목창업학교 예비창업자 출강\n2024 브런치예비창업자 출강 (서울창업허브_창동)', '한식조리기능사\n양식조리기능사\n중식조리기능사\n일식조리기능사\n떡제조기능사\n복어조리기능사\n아동요리지도사 1급\n직업훈련교사 3급 (조리)\n교원자격증 (실기교사)\n국가직무능력표준 NCS 훈련강사', '2021 대한민국 챌린지컵 국제요리경연대회 금상', '2024-06-01 00:00:00', '2024-06-02 00:00:00'),
(3, '박선생', '202406EC03', 'profile03.png', '1989-01-02', 'green3@green.com', '01012341236', '서울시 종로구', '2020 센톤코리아 한국식품산업클러스터진흥원 의뢰 한지커피필터 향미분석 전문위원\n2020 Global Coffee Championship Beverage Creator 우수지도자상\n2021 Global Coffee School Roasting Challange 심사위원\n2022 Global Coffee School Sensory Challange 심사위원\n원', 'Sentone Coffee Flavorist Lv2\nGlobal Coffee School Instructor\nGCS Barista Basic\nGCS Barista Advanced\nGCS Brewing Basic\nGCS Brewing Advanced\nGCS Classifier Basic\nGCS Classifier Advanced\nGCS Classifier master\n조주기능사\nKCL (Korea Coffee Laboratory) 공인트레이너', '2023 Global Coffee Championship Signature Coffee 2위', '2024-06-01 00:00:00', '2024-06-03 00:00:00'),
(4, '홍박사', '202406EC04', 'profile04.png', '1989-01-03', 'green4@green.com', '01012341237', '서울시 종로구', '(前) 알고리즘 압구정에 위치한 재패니즈 다이닝수쉐프. 2023 년 및2024 년 미쉐린 등재\n(前) 일식조리기술원 강사 겸 교육프로그램 연구팀장.\n(前) 西野屋 是是 오사카 난바 소재 갓포요리 전문점\n(前) 寿司三崎丸 도쿄 신주쿠구 위치한 카운터식 스시 전문점', '한식조리기능사\n양식조리기능사\n일식조리기능사\n사케소믈리에 (키키자케시)\n일본 조리사 면허\n일본 복어 취급자 면허', '', '2024-06-01 00:00:00', '2024-06-04 00:00:00');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `academy_info`
--
ALTER TABLE `academy_info`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `academy_list`
--
ALTER TABLE `academy_list`
  ADD PRIMARY KEY (`class_no`),
  ADD UNIQUE KEY `class_no` (`class_no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `ec_notice`
--
ALTER TABLE `ec_notice`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `teacher_list`
--
ALTER TABLE `teacher_list`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `teacher_code` (`teacher_code`),
  ADD KEY `datetime` (`datetime`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `academy_info`
--
ALTER TABLE `academy_info`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `academy_list`
--
ALTER TABLE `academy_list`
  MODIFY `class_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 테이블의 AUTO_INCREMENT `attendance`
--
ALTER TABLE `attendance`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `ec_notice`
--
ALTER TABLE `ec_notice`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `register`
--
ALTER TABLE `register`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

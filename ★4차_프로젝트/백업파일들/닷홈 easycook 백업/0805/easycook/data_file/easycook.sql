-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 24-07-10 05:05
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
(1, '한식조리기능사', '20240710A01', '140000', '2024-07-09 00:00:00');

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
  `nth` int(10) NOT NULL,
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

INSERT INTO `academy_list` (`class_no`, `name`, `category1`, `category2`, `category3`, `teacher_code`, `teacher`, `place`, `phone`, `grade`, `member_num`, `nth`, `start_date`, `end_date`, `start_time`, `end_time`, `class_status`, `thumnail_img`, `img`, `detail`, `datetime`) VALUES
(1, '나도 할 수 있다! 한식조리기능사 자격증반', '한식조리기능사', '자격증', '평일', '202406EC01', '나프로', '서울시 강남구 00로 00빌딩 3층, 이지쿡', 1012341234, '상', 20, 1, '2024-07-08', '2024-08-08', '09:00:00', '18:00:00', '현재강의', 'cooking_academy5_3.png', 'cooking_academy5_3_3.png', '상세설명', '2024-07-09 00:00:00'),
(2, '[6회차]양식 조리산업기사 자격증 취득반', '양식조리기능사', '자격증', '평일', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '중하', 20, 6, '2024-08-01', '2024-09-30', '00:00:09', '00:00:18', '현재강의', 'cooking_academy5_1.png', 'cooking_academy5_1_1.png', '양식조리산업기사 자격증취득반 상세설명', '2024-07-18 00:00:00'),
(3, '[8회차] 떡 제조 기능사 자격증 취득반', '한식조리기능사', '자격증', '주말', '202406EC01', '나프로', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '중', 10, 8, '2024-07-21', '2024-09-30', '00:00:09', '00:00:18', '지난강의', 'cooking_academy5_2.png', 'cooking_academy5_2_2.png', '떡제조기능사자격증취득반 상세설명', '2024-07-18 00:00:00'),
(4, '[6회차] 원데이 클래스 까페 브런치 샌드위치 만들기', '양식조리기능사', '일반', '원데이', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '하', 10, 6, '2024-08-01', '2024-08-01', '00:00:09', '00:00:18', '현재강의', 'cooking_academy2_1.png', 'cooking_academy2_1_1.png', '원데이 클래스 까페브런치 샌드위치 만들기 상세설명', '2024-07-18 00:00:00'),
(5, '[4회차] 중식 조리산업기사 자격증 취득반', '중식조리기능사', '자격증', '평일', '202406EC03', '이강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1032324545, '중하', 20, 3, '2024-08-01', '2024-09-30', '00:00:09', '00:00:18', '현재강의', 'cooking_academy5_3.png', 'cooking_academy5_3_3.png', '중식조리기능사 자격증취득반 상세설명', '2024-07-18 00:00:00'),
(6, '[5회차]일식 조리 기능사 자격증 취득반', '일식조리기능사', '국비', '평일', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '상', 20, 5, '2024-09-01', '2024-11-30', '00:00:09', '00:00:18', '보류강의', 'cooking_academy1_1.png', 'cooking_academy1_1_1.png', '일식조리기능사 자격증취득반 상세설명', '2024-07-18 00:00:00'),
(7, '[여름방학] 국내 바리스타 자격증 취득반', '바리스타', '자격증', '여름학기', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '중하', 15, 8, '2024-08-01', '2024-09-30', '00:00:09', '00:00:18', '현재강의', 'coffee_academy5_1.png', 'coffee_academy5_1_1.png', '바리스타 자격증취득반 상세설명', '2024-07-18 00:00:00'),
(8, '[2회차] 국제커피협회 바리스타스킬 프로그램', '바리스타', '일반', '주말', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '중하', 12, 2, '2024-08-01', '2024-09-05', '00:00:09', '00:00:18', '현재강의', 'coffee_academy2_1.png', 'coffee_academy2_1_1.png', '국제커피협회 바리스타 스킬 프로그램', '2024-07-18 00:00:00'),
(9, '[8회차] 바리스타 실무과정 - 까페음료 제조과정', '바리스타', '일반', '주말', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '하', 15, 8, '2024-08-01', '2024-09-01', '00:00:09', '00:00:18', '현재강의', 'coffee_academy2_2.png', 'coffee_academy2_2_2.png', '바리스타 실수 까페음료 제조과정', '2024-07-18 00:00:00'),
(10, '[4회차] 국제커피협회 로스팅 프로그램', '바리스타', '창업', '주말', '202406EC02', '나강사', '서울시 강남구 00로 00빌딩 1층,이지쿡', 1023234545, '상중', 15, 4, '2024-09-01', '2024-11-01', '00:00:09', '00:00:18', '현재강의', 'coffee_academy3_1.png', 'coffee_academy3_1_1.png', '로스팅 프로그램 사진이름 바꿈 카테고리 국비에서 창업으로 바꿈', '2024-07-18 00:00:00');

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

INSERT INTO `attendance` (`no`, `class_no`, `id`, `datetime`,'teacher_code','name') VALUES
(1, 1, 'student1', '2024-07-09 00:00:00','202406EC01','김학생'),
(2, 1, 'student2', '2024-07-09 00:00:00','202406EC01','나학생'),
(3, 1, 'student3', '2024-07-09 00:00:00','202406EC01','박학생'),
(4, 1, 'student4', '2024-07-09 00:00:00','202406EC01','이학생'),
(5, 1, 'student5', '2024-07-09 00:00:00','202406EC01','양학생'),
(6, 1, 'student6', '2024-07-09 00:00:00','202406EC01','정학생'),
(7, 1, 'student7', '2024-07-09 00:00:00','202406EC01','홍학생'),
(8, 1, 'student8', '2024-07-09 00:00:00','202406EC01','임학생'),
(9, 1, 'student9', '2024-07-09 00:00:00','202406EC01','채학생'),
(10, 1, 'student10', '2024-07-09 00:00:00','202406EC01','손학생'),
(11, 1, 'student1', '2024-07-10 00:00:00','202406EC01','김학생'),
(12, 1, 'student2', '2024-07-10 00:00:00','202406EC01','나학생'),
(13, 1, 'student3', '2024-07-10 00:00:00','202406EC01','박학생'),
(14, 1, 'student4', '2024-07-10 00:00:00','202406EC01','이학생'),
(15, 1, 'student5', '2024-07-10 00:00:00','202406EC01','양학생'),
(16, 1, 'student6', '2024-07-10 00:00:00','202406EC01','정학생'),
(17, 1, 'student7', '2024-07-10 00:00:00','202406EC01','홍학생'),
(18, 1, 'student8', '2024-07-10 00:00:00','202406EC01','임학생'),
(19, 1, 'student9', '2024-07-10 00:00:00','202406EC01','채학생'),
(20, 1, 'student1', '2024-07-11 00:00:00','202406EC01','김학생'),
(21, 1, 'student2', '2024-07-11 00:00:00','202406EC01','나학생'),
(22, 1, 'student3', '2024-07-11 00:00:00','202406EC01','박학생'),
(23, 1, 'student4', '2024-07-11 00:00:00','202406EC01','이학생'),
(24, 1, 'student5', '2024-07-11 00:00:00','202406EC01','양학생'),
(25, 1, 'student6', '2024-07-11 00:00:00','202406EC01','정학생'),
(26, 1, 'student7', '2024-07-11 00:00:00','202406EC01','홍학생'),
(27, 1, 'student8', '2024-07-11 00:00:00','202406EC01','임학생'),
(28, 1, 'student9', '2024-07-11 00:00:00','202406EC01','채학생'),
(29, 1, 'student10', '2024-07-1 00:00:00','202406EC01','손학생'),
(30, 2, 'student1', '2024-07-09 00:00:00','202406EC02','김학생'),
(31, 2, 'student2', '2024-07-09 00:00:00','202406EC02','나학생'),
(32, 2, 'student3', '2024-07-09 00:00:00','202406EC02','박학생'),
(33, 2, 'student4', '2024-07-09 00:00:00','202406EC02','이학생'),
(34, 2, 'student5', '2024-07-09 00:00:00','202406EC02','양학생'),
(35, 2, 'student6', '2024-07-09 00:00:00','202406EC02','정학생'),
(36, 2, 'student7', '2024-07-09 00:00:00','202406EC02','홍학생'),
(37, 2, 'student8', '2024-07-09 00:00:00','202406EC02','임학생'),
(38, 2, 'student9', '2024-07-09 00:00:00','202406EC02','채학생'),
(39, 2, 'student10', '2024-07-09 00:00:00','202406EC02','손학생'),
(40, 2, 'student1', '2024-07-10 00:00:00','202406EC02','김학생'),
(41, 2, 'student2', '2024-07-10 00:00:00','202406EC02','나학생'),
(42, 2, 'student3', '2024-07-10 00:00:00','202406EC02','박학생'),
(43, 2, 'student4', '2024-07-10 00:00:00','202406EC02','이학생'),
(44, 2, 'student5', '2024-07-10 00:00:00','202406EC02','양학생'),
(45, 2, 'student6', '2024-07-10 00:00:00','202406EC02','정학생'),
(46, 2, 'student7', '2024-07-10 00:00:00','202406EC02','홍학생'),
(47, 2, 'student8', '2024-07-10 00:00:00','202406EC02','임학생'),
(48, 2, 'student9', '2024-07-10 00:00:00','202406EC02','채학생'),
(49, 2, 'student1', '2024-07-11 00:00:00','202406EC02','김학생'),
(50, 2, 'student2', '2024-07-11 00:00:00','202406EC02','나학생'),
(51, 2, 'student3', '2024-07-11 00:00:00','202406EC02','박학생'),
(52, 2, 'student4', '2024-07-11 00:00:00','202406EC02','이학생'),
(53, 2, 'student5', '2024-07-11 00:00:00','202406EC02','양학생'),
(54, 2, 'student6', '2024-07-11 00:00:00','202406EC02','정학생'),
(55, 2, 'student7', '2024-07-11 00:00:00','202406EC02','홍학생'),
(56, 2, 'student8', '2024-07-11 00:00:00','202406EC02','임학생'),
(57, 2, 'student9', '2024-07-11 00:00:00','202406EC02','채학생'),
(58, 2, 'student10', '2024-07-1 00:00:00','202406EC02','손학생')

--
-- 테이블의 덤프 데이터 `attendance`
--

INSERT INTO `attendance` (`no`, `class_no`, `id`, `datetime`) VALUES
(1, 1, 'student1', '2024-07-09 00:00:00');

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
    `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`no`, `class_no`, `title`, `memo`, `id`, `datetime`) VALUES
(1, 1, '', '', 'professor', '2024-07-09 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE `cart` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL DEFAULT '',
    `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `order`
--

CREATE TABLE `order` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

--
-- 테이블의 덤프 데이터 `question`
--

INSERT INTO `question` (`no`, `class_no`, `question_id`, `question`, `question_memo`, `question_time`, `answer_id`, `answer`, `answer_time`) VALUES
(1, 1, 'student1', '안녕하세요', '안녕하세요.창업을 해보려고 하는데, 제가 베이킹이 완전 처음이라 혹시 선수학습이 필요할까요? 또 재료비는 따로 제출해야 하나요?', '2024-07-08 00:00:00', 'professor', '답변내용', '2024-07-09 00:00:00');

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

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `no` int(11) NOT NULL,
  `class_no` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  `star` int(11) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `review` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(255) NOT NULL DEFAULT '',
   `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE `room` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `room_date` datetime NOT NULL,
  `room_time` time NOT NULL,
  `id` varchar(255) NOT NULL DEFAULT '',
    `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `student_list`
--

CREATE TABLE `student_list` (
  `no` int(11) NOT NULL,
  `class_no` int(11) NOT NULL,
  `teacher_code` varchar(255) NOT NULL DEFAULT '',
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `student_status` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 테이블의 덤프 데이터 `student_list`
--

INSERT INTO `student_list` (`no`, `class_no`, `id`, `student_status`, `datetime`) VALUES
(1, 1, 'student1', '수강중', '2024-07-09 00:00:00');

INSERT INTO register (`id`, `password`, `name`, `phone`,`email`,`teacher`,`teacher_code`,`datetime`) VALUES
('student1', 'student1','나초보','phone','email','','', '2024-07-16 00:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `teacher_list`
--

CREATE TABLE `teacher_list` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
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
(1, '나선생', '202406EC01', 'free-icon-teacher-1995574.png', '1991-10-01', 'green@naver.com', '01012341234', '서울시 서울1구', '(現) 코리아교육그룹 코리아요리아트아카데미 교육부 전임강사\r\n(現) 온라인 강의 따즈아 촬영(일식조리기능사,일본가정식,일식조리기능사 필기)\r\n(前) 한국조리예술학원 교육부 전임강사\r\n(前) Michelin 2 Star 정식당 Chef\r\n(前) 주 아르헨티나 대사관 Chef\r\n(前) Park Hyatt Seoul Chef\r\n', '복어조리산업기사\r\n한식조리산업기사\r\n한식조리기능사\r\n양식조리기능사\r\n중식조리기능사\r\n일식조리기능사\r\n복어조리기능사\r\n교원자격증(실기교사)', '2018 Battle of the chef KCAA팀 코치\r\n월드트렌드페어 라이브 은상\r\n2011 국제요리경연대회 3코스 전시 은메달\r\n2010 인천광역시 바른 먹거리 간식 대회 최우수상', '2024-06-30 00:00:00', '2024-07-09 00:00:00'),
(2, '김선생', '202406EC02', 'free-icon-teacher-4202854.png', '1991-10-01', 'green@naver.com', '01012341234', '서울시 서울1구', '\r\n(現) 코리아교육그룹 코리아요리아트아카데미 교육부 전임강사<br>\r\n(現) 온라인 강의 따즈아 촬영(일식조리기능사,일본가정식,일식조리기능사 필기)<br>\r\n(前) 한국조리예술학원 교육부 전임강사<br>\r\n(前) Michelin 2 Star 정식당 Chef<br>\r\n(前) 주 아르헨티나 대사관 Chef<br>\r\n(前) Park Hyatt Seoul Chef<br>\r\n', '\r\n복어조리산업기사<br>\r\n한식조리산업기사<br>\r\n한식조리기능사<br>\r\n양식조리기능사<br>\r\n중식조리기능사<br>\r\n일식조리기능사<br>\r\n복어조리기능사<br>\r\n교원자격증(실기교사)<br>\r\n', '\r\n2018 Battle of the chef KCAA팀 코치<br>\r\n월드트렌드페어 라이브 은상<br>\r\n2011 국제요리경연대회 3코스 전시 은메달<br>\r\n2010 인천광역시 바른 먹거리 간식 대회 최우수상<br>\r\n', '2024-06-30 00:00:00', '2024-07-09 00:00:00'),
(3, '이선생', '202406EC03', 'free-icon-teacher-3373452.png', '1991-10-01', 'green@naver.com', '01012341234', '서울시 서울1구', '\r\n(現) 코리아교육그룹 코리아요리아트아카데미 교육부 전임강사<br>\r\n(現) 온라인 강의 따즈아 촬영(일식조리기능사,일본가정식,일식조리기능사 필기)<br>\r\n(前) 한국조리예술학원 교육부 전임강사<br>\r\n(前) Michelin 2 Star 정식당 Chef<br>\r\n(前) 주 아르헨티나 대사관 Chef<br>\r\n(前) Park Hyatt Seoul Chef<br>\r\n', '\r\n복어조리산업기사<br>\r\n한식조리산업기사<br>\r\n한식조리기능사<br>\r\n양식조리기능사<br>\r\n중식조리기능사<br>\r\n일식조리기능사<br>\r\n복어조리기능사<br>\r\n교원자격증(실기교사)<br>\r\n', '\r\n2018 Battle of the chef KCAA팀 코치<br>\r\n월드트렌드페어 라이브 은상<br>\r\n2011 국제요리경연대회 3코스 전시 은메달<br>\r\n2010 인천광역시 바른 먹거리 간식 대회 최우수상<br>\r\n', '2024-06-30 00:00:00', '2024-07-09 00:00:00');

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
-- 테이블의 인덱스 `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`no`),
  ADD KEY `datetime` (`datetime`);

--
-- 테이블의 인덱스 `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`no`),
  ADD KEY `answer_time` (`answer_time`);

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
-- 테이블의 인덱스 `student_list`
--
ALTER TABLE `student_list`
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
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `academy_list`
--
ALTER TABLE `academy_list`
  MODIFY `class_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `attendance`
--
ALTER TABLE `attendance`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `my_order`
--
ALTER TABLE `order`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `register`
--
ALTER TABLE `register`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `student_list`
--
ALTER TABLE `student_list`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `teacher_list`
--
ALTER TABLE `teacher_list`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

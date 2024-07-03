--
-- 데이터베이스: `product`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `free_board`
--

CREATE TABLE `free_board` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `memo` varchar(255) NOT NULL DEFAULT '',
  `pwd` varchar(255) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL DEFAULT curdate(),
  `ip` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `free_board`
--

INSERT INTO `free_board` (`id`, `subject`, `name`, `memo`, `pwd`, `datetime`, `ip`) VALUES
(1, 'qaweqweq', 'asdfads', 'fasdfasdfasdf', '', '2024-06-03 16:13:52', '::1'),
(2, 'qweqweqwe', 'ASDFASDFASDFASDFA', 'SDFASDFASDFASDFAS', '$2y$10$.g.Y8zWxOsDA1lmXbXvqauCLBiZNlZ4jd/GZECNuGfc9.sMckBmFO', '2024-06-03 16:15:57', '::1'),
(3, 'qwwwwF', 'ASDFASDFADSFADSF', 'AFSDFASDFASDFASDF', '$2y$10$WY9H2lAp0TSM0o0oXqugqeTxIi0Sh8FYeJqCSW2Z0Klg9gspABgFO', '2024-06-03 16:25:10', '::1'),
(4, 'wwwasdf', 'asdfasdfasdf', 'asdfasdfasdfasdadsf', '$2y$10$PAdSkLBvcvKTDv/r/8ShgeOl1Bhxdgtno5MKjl3b3vfUxo9fJfAVC', '2024-06-03 16:27:28', ''),
(5, 'sdfsdfsdf', 'aaa', 'aaa', '$2y$10$rGUv/ofryB38ytPVtGc00Od6/iJZU1B91wMIakC0kb1Hi.54CVdYG', '2024-06-03 16:35:25', '127.0.0.1'),
(6, 'sdfsdfsdf2', '2222', '22222', '$2y$10$V1dtkKFglXP/xiQG3p.2q.ZZhdQwti.GBIMKGWkiCRL9UQqYFfSWm', '2024-06-03 16:52:30', '127.0.0.1');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `free_board`
--
ALTER TABLE `free_board`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `free_board`
--
ALTER TABLE `free_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
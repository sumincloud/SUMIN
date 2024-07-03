<?php
$mysql_host = 'localhost';
$mysql_user = 'allblue0121';
$mysql_password = 'p03010301!';
$mysql_db = 'allblue0121';
// MySQL 데이터베이스 연결
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) { // 연결 오류 발생 시 스크립트 종료
    die("연결 실패: " . mysqli_connect_error());
}

ini_set('display_errors', 'Off');
session_start(); // 세션 시작
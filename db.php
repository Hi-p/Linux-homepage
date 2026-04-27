<?php
session_start(); // 로그인 유지를 위한 세션 시작
$conn = new mysqli('127.0.0.1', 'root', '0728', 'kiera');

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}
?>
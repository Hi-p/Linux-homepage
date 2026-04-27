<?php
session_start();
session_destroy(); // 모든 세션 기록 파기
echo "<script>alert('로그아웃 되었습니다.'); location.href='index.php';</script>";
?>
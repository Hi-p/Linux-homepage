<?php
include 'db.php';

// 로그인 안 한 사람이 강제로 글을 쓰려고 하면 차단
if(!isset($_SESSION['userid'])) {
    die("<script>alert('로그인이 필요합니다.'); location.href='index.php';</script>");
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userid = $_SESSION['userid'];
    $content = $conn->real_escape_string($_POST['content']); // 따옴표 등 에러 방지

    $sql = "INSERT INTO posts (user_id, content) VALUES ('$userid', '$content')";
    if($conn->query($sql)) {
        header("Location: index.php"); // 글 쓰고 다시 메인으로 이동
    } else {
        echo "글쓰기 오류: " . $conn->error;
    }
}
?>
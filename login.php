<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <style>
        body { text-align: center; font-family: sans-serif; padding-top: 50px; background-color: #f4f4f9; }
        .form-box { background: white; width: 300px; margin: 0 auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        input { width: 90%; padding: 10px; margin: 10px 0; }
        button { width: 95%; padding: 10px; background: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>로그인</h2>
        <form method="POST">
            <input type="text" name="userid" placeholder="아이디(kiera)" required>
            <input type="password" name="userpw" placeholder="비밀번호" required>
            <button type="submit">로그인</button>
        </form>
        <p><a href="index.php">돌아가기</a></p>
    </div>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $conn->real_escape_string($_POST['userid']); 
        $pw = $conn->real_escape_string($_POST['userpw']);

        // blogin 테이블에 일치하는 아이디/비번이 있는지 확인
        $sql = "SELECT * FROM blogin WHERE Login_id='$id' AND Login_pw='$pw'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $_SESSION['userid'] = $id; // 인증 성공! 세션 발급
            echo "<script>location.href='index.php';</script>";
        } else { 
            echo "<script>alert('아이디나 비밀번호가 틀렸습니다.');</script>"; 
        }
    }
    ?>
</body>
</html>
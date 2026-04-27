<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <style>
        body { text-align: center; font-family: sans-serif; padding-top: 50px; background-color: #f4f4f9; }
        .form-box { background: white; width: 300px; margin: 0 auto; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        input { width: 90%; padding: 10px; margin: 10px 0; }
        button { width: 95%; padding: 10px; background: #2196F3; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>회원가입</h2>
        <form method="POST">
            <input type="text" name="userid" placeholder="원하는 아이디" required>
            <input type="password" name="userpw" placeholder="사용할 비밀번호" required>
            <button type="submit">가입하기</button>
        </form>
        <p><a href="index.php">돌아가기</a></p>
    </div>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $conn->real_escape_string($_POST['userid']); 
        $pw = $conn->real_escape_string($_POST['userpw']);

        // blogin 테이블에 새 회원 정보 넣기 (created 컬럼에 현재 시간 저장)
        $sql = "INSERT INTO blogin (Login_id, Login_pw, created) VALUES ('$id', '$pw', NOW())";
        
        if($conn->query($sql)){
            echo "<script>alert('가입이 완료되었습니다! 로그인해주세요.'); location.href='login.php';</script>";
        } else {
            echo "<script>alert('가입 오류가 발생했습니다.');</script>";
        }
    }
    ?>
</body>
</html>
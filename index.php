<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Kiera 자유 게시판</title>
    <style>
        body { width: 600px; margin: 50px auto; font-family: 'Malgun Gothic', sans-serif; background-color: #f4f4f9; color: #333; }
        .header { text-align: center; margin-bottom: 20px; }
        .box { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .post { border-bottom: 1px solid #eee; padding: 15px 0; }
        .post:last-child { border-bottom: none; }
        .date { font-size: 0.8em; color: #888; margin-left: 10px; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        button:hover { background: #45a049; }
        a { color: #0066cc; text-decoration: none; }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚀 Kiera 자유 게시판</h1>
    </div>

    <div class="box">
        <?php if(isset($_SESSION['userid'])): ?>
            <p>환영합니다, <b><?=$_SESSION['userid']?></b>님! <a href="logout.php" style="float:right;">로그아웃</a></p>
            <form action="write.php" method="POST">
                <textarea name="content" rows="3" placeholder="여기에 글을 작성하세요..." required></textarea>
                <button type="submit" style="width:100%;">글 등록하기</button>
            </form>
        <?php else: ?>
            <p>현재 <b>읽기 전용</b> 상태입니다. 글을 쓰려면 로그인이 필요합니다.</p>
            <a href="login.php"><button>로그인</button></a>
            <a href="signup.php"><button style="background:#2196F3;">회원가입</button></a>
        <?php endif; ?>
    </div>

    <div class="box">
        <h3>최근 게시글</h3>
        <?php
        // 글 목록 불러오기 (최신글이 위로 오게)
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<b>" . htmlspecialchars($row['user_id']) . "</b>: ";
                echo htmlspecialchars($row['content']);
                echo "<span class='date'>" . $row['created_at'] . "</span>";
                echo "</div>";
            }
        } else {
            echo "<p>아직 등록된 글이 없습니다.</p>";
        }
        ?>
    </div>
</body>
</html>
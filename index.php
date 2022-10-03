<?php 
  session_start();

  $user = isset($_SESSION["user"]) ? $_SESSION["user"] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php if ($user): ?>
    <p><?=$user->name?>님 환영합니다.</p>
    <a href="./logout.php">
      <button>로그아웃</button>
    </a>
  <?php else: ?>
    <a href="./login_form.php">
      <button>로그인</button>
    </a>
    <a href="./register_form.php">
      <button>회원가입</button>
    </a>
  <?php endif; ?>
</body>
</html>
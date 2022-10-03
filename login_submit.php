<?php
  session_start();

  $email = $_POST["email"];
  $pw = $_POST["pw"];

  $userList = file_get_contents("./data/user.json");
  $userList = json_decode($userList);

  $check = false;
  $user = null;

  for($i = 0; $i< sizeof($userList->user); $i++){
    $currentUser = $userList->user[$i];
    if($email === $currentUser->email && $pw === $currentUser->pw){
      $check = true;
      $user = $currentUser;
      break;
    }
  }

  if($check){
    $_SESSION["user"] = $user;
    header("Location: ./index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    이메일 또는 비밀번호가 맞지 않습니다.
  </div>
  <a href="./login_form.php">
    <button>로그인</button>
  </a>
</body>
</html>
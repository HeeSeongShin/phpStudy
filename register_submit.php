<?php
  $email = $_POST["email"];
  $name = $_POST["name"];
  $pw = $_POST["pw"];

  $newUser = array(
    "email" => $email,
    "name" => $name,
    "pw" => $pw
  );

  $userList = file_get_contents("./data/user.json");
  $userList = json_decode($userList);

  $check = true;

  for($i = 0; $i < sizeof($userList->user); $i++){
    if($email == $userList->user[$i]->email){
      $check = false;
      break;
    }else{
      $check = true;
    }
  }

  if($check){
    echo("성공");

    array_push($userList->user, $newUser);
    $jsonUserList = json_encode($userList);
    file_put_contents("./data/user.json", $jsonUserList);
    header("Location: ./login_form.php");
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
    이미 가입된 이메일입니다.
  </div>
  <a href = "./register_form.php">
    <button>회원가입</button>
  </a>
</body>
</html>
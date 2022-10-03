<?php 
  $userList = file_get_contents("./data/user.json");
  $userList = json_decode($userList);
  $userList = $userList->user;
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
  <h2>유저목록</h2>
  <?php for($i=0; $i<sizeof($userList); $i++): ?>
    <div><?=$userList[$i]->name?></div>
  <?php endfor; ?>
  <a href="./index.php">
    <button>홈</button>
  </a>
</body>
</html>
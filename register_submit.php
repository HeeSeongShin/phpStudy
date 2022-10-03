<?php
  $email= $_POST["email"];
  $name= $_POST["name"];
  $pw = $_POST["pw"];

  $newUser = array(
    "email"=>$email,
    "name"=>$name,
    "pw"=>$pw
  );

  $userList=file_get_contents("./data/user.json");
  $userList=json_decode($userList);

  $check =true;
  
  for($i = 0 ; $i< sizeof($userList->user); $i++){
    $currentUser = $userList->user[$i];

    if($email == $currentUser->email){
      $check= false;
      break;
    }else{
      $check= true;
    }
  }

  if($check){
    echo("성공");
    array_push($userList->user, $newUser);
    $jsonUserList = json_encode($userList);
    file_put_contents("./data/user.json", $jsonUserList);
  }else{
    echo("실패");
  }

?>
<?php 

  INCLUDE 'pathing.php';
  INCLUDE $dblogin;

  $username = $_POST['USERNAME'];
  $password = $_POST['PASSWORD'];


  $sql = "SELECT username, password FROM usuarios WHERE username='$username' AND password='$password'";
  $result = mysqli_query(OpenCon(), $sql);
  
  if ($row = mysqli_fetch_assoc($result)) {
    echo "You are logged in!";
    session_start();
    $_SESSION['user'] = $username;
    $_SESSION['online'] = 'true';
    header('Location: '.'/inventariobrand/menu');
    die();

  } else {
    echo "Your username or password is incorrect!";
  }






?>

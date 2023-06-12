<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kogutnik - logowanie</title>
</head>

<body>
  <?php

  echo "<p>Witaj " . $_SESSION['user'];
  echo '<a href="logout.php"> Wyloguj się!</a>';
  echo "" . $_SESSION['user_id'];
  ?>

  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="avatar" accept="image/*">
    <input type="submit" value="Prześlij avatar">
  </form>
  <br>
  <h2>twój avatar:</h2>
  <?php
  require_once "connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
  $name = $_SESSION['user'];
  $sql = "SELECT * FROM `user` WHERE `user_name` = '$name'";
  $result = $polaczenie->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentAvatar = $row['avatar'];
    
  }
  $avatarPath = '/avatars/'.$currentAvatar;
  echo '<img src="' . $avatarPath . '" alt="Avatar" width="200" height="200">';
  $polaczenie->close;
  ?>

</body>

</html>
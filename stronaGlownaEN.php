<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
  header('Location: index.php');
  exit();
}
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kogutnik - logowanie</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="CSS/profilUzytkownika.css">

</head>

<body>

  <nav>
    <a href="https://kogutnik.pl/stronaGlownaEN.php">profile</a>
    <a href="https://kogutnik.pl/indexen.php">main page</a>
    <a href="https://kogutnik.pl/rankings.php">rankings</a>
    <div class="language">
        <a href="https://kogutnik.pl/stronaGlownaPL.php">pl</a>
    </div>

</nav>

<div class="content">

  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input class="button" type="file" name="avatar" accept="image/*">
    <input class="button" type="submit" value="upload an avatar">
  </form>
  <br>
  <form action="logout.php" method="POST" enctype="multipart/form-data">
    <input class="button" type="submit" value="log out">
  </form>
  <p>your avatar</p>
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
  
   $login = $_SESSION['user'];
   $sql = "SELECT user_id FROM user WHERE user_name = '$login'";
   $result = @$polaczenie->query($sql);
   $row = $result->fetch_assoc();	
   $user_id = $row['user_id'];
  
   $sql1 = "SELECT score FROM ox_rankings WHERE user_id = '$user_id'";
   $sql2 = "SELECT score FROM guessnumber_rankings WHERE user_id = '$user_id'";
   $sql3 = "SELECT score FROM hangman_rankings WHERE user_id = '$user_id'";
   $result1 = @$polaczenie->query($sql1);
   $result2 = @$polaczenie->query($sql2);
   $result3 = @$polaczenie->query($sql3);
  $row1 = $result1->fetch_assoc();
  $row2 = $result2->fetch_assoc();
  $row3 = $result3->fetch_assoc();
  
    echo '<a>Tic Tac Toe: '.$row1['score'].'<br>   Guess number: '.$row2['score'].'<br>   Hangman: '.$row3['score'].'</a>';
  $polaczenie->close;
  ?>

</div>
  
  <button onclick="myFunction()" class="switch">light/dark mode</button>

  <script>
  function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");
  }
  </script>

</body>

</html>
<?php
session_start();

if(isset($_SESSION['zalogowany']))
{
  require_once "connect.php";

  $conn = @new mysqli($host, $db_user, $db_password, $db_name);

  if ($conn->connect_errno) {
      die("Connection failed: " . $conn->connect_error);
  }

  $login = $_SESSION['user'];
  $sql = "SELECT user_id FROM user WHERE user_name = '$login'";
  $result = @$conn->query($sql);
  $row = $result->fetch_assoc();
  $user_id = $row["user_id"];
  $sql = "UPDATE guessnumber_rankings SET score = score + 1 WHERE user_id = $user_id";
  $result = @$conn->query($sql);
  

  header('Location: https://kogutnik.pl/guessnumber');

  $conn->close();
} else {
  echo 'User is not log-in';
  header('Location: https://kogutnik.pl');
}
?>
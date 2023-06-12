<?php
session_start();
if(!isset($_SESSION['odzyskiwanie'])){
    header('Location: index.php');
    exit();
}
$teraz_login = $_SESSION['login'];
$is_valid = true;

//sprawdzanie hasla
$haslo1 = $_POST['haslo1'];
$haslo2 = $_POST['haslo2'];

if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
    $is_valid = false;
    $_SESSION['e_haslo'] = "The password must be between 8 and 20 characters long!";
}

if ($haslo1 != $haslo2) {
    $is_valid = false;
    $_SESSION['e_haslo'] = "The passwords provided are not identical!";
}
//haszowanie hasla
$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

//reset hasla

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$sql = "UPDATE `user` SET `password` = '$haslo_hash' WHERE user_name = '$teraz_login'";
if ($is_valid == true) {
if ($polaczenie->query($sql) === TRUE) {
    echo "Resetowanie hasła udane";
  	session_unset();
}
}

$polaczenie->close();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kogutnik - reset password</title>
  
    <link rel="stylesheet" href="CSS/resetowanieHasla.css">
</head>
<body>
  <div class="formularz">
    <form method="POST">
    <p>Enter a new password:</p> <br /> <input class="textbox" type="password" name="haslo1"><br />
		<?php
		if (isset($_SESSION['e_haslo'])) {
			echo '<p class="err">'.$_SESSION['e_haslo'].'</p>';
			unset($_SESSION['e_haslo']);
		}
		?>
		<br />
      <p>Repeat password:</p> <br /> <input class="textbox" type="password" name="haslo2"><br />
		<br />
      <input class="main" type="submit" value="Reset password" />
    </form>
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
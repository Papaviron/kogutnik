<?php 
session_start();
//jesli wszystko jestes juz zalogowany w tej sesji przeniesie cie do strony glownej
if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
    header('Location: https://kogutnik.pl/indexen.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kogutnik</title>
    <link rel="stylesheet" href="CSS/logowanie.css">
</head>
<body>
    <form action="login.php" method="post" class="logowanie">
        <p>Login</p>
        <input type="text" placeholder="LOGIN"  name="login">
        
        <p>Password</p>
        <input type="password" placeholder="PASSWORD" name="haslo">
        <?php
      //wyswietlenie bledu jesli cos login lub haslo jest nieprawidlowy
    if(isset($_SESSION['blad'])){
        echo '<p>Wrong login or password!</p>';
	}
    ?>
        <button type="submit">Log in</button>
    </form>

</body>
</html>
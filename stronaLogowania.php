<?php 
session_start();
//jesli wszystko jestes juz zalogowany w tej sesji przeniesie cie do strony glownej
if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
    header('Location: https://kogutnik.pl');
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
    <form action="zaloguj.php" method="post" class="logowanie">
        <p>Podaj login</p>
        <input type="text" placeholder="LOGIN"  name="login">
        
        <p>podaj hasło</p>
        <input type="password" placeholder="HASŁO" name="haslo">
        <?php
      //wyswietlenie bledu jesli cos login lub haslo jest nieprawidlowy
    if(isset($_SESSION['blad'])){
        echo '<p>Nieprawidłowy login lub hasło!</p>';
	}
    ?>
        <button type="submit">ZALOGUJ</button>
    </form>
  
      <button onclick="myFunction()" class="switch">jasny/ciemny motyw</button>

  <script>
  function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");
  }
  </script>

</body>
</html>
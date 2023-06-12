<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kogutnik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  
  <?php
    	session_start();
    	if(isset($_SESSION['zalogowany'])){
       		echo '<nav>';
      			echo '<a href="https://kogutnik.pl/stronaGlownaPL.php">profil</a>';
      			echo '<a href="https://kogutnik.pl">strona główna</a>';
          		echo '<a href="https://kogutnik.pl/rankingi.php">rankingi</a>';
          		echo '<div class="language">
        			<a href="https://kogutnik.pl/indexen.php">en</a>
    			</div>';
  			echo '</nav>';
        }
  		else{
        	echo '<nav>';
      			echo '<div class="language">
        			<a href="https://kogutnik.pl/indexen.php">en</a>
    			</div>';
  			echo '</nav>';
        }
    ?>

  <div class="powitanie">
    <p class="powitanie1">witamy w kogutniku!</p>
    <?php
    	if(isset($_SESSION['zalogowany'])){
        	echo '<p class="powitanie2">Wybierz grę:</p>';
        } else {
          	echo '<p class="powitanie2">Aby rozpocząć grę:</p>';
        }
    ?>
  </div>

  <div class="przyciski">
	<?php
		if(isset($_SESSION['zalogowany'])){
			echo '<a class="main" href="http://kogutnik.pl/kolkokrzyzyk"><i class="fa-solid fa-gamepad"></i>Kółko i krzyżyk</a>';
			echo '<a class="main" href="http://kogutnik.pl/zgadnijliczbe"><i class="fa-solid fa-gamepad"></i>Zgadnij liczbę</a> ';
			echo '<a class="main" href="http://kogutnik.pl/wisielec"><i class="fa-solid fa-gamepad"></i>Wisielec</a>';
		} else {
			echo '<a class="main" href="stronaLogowania.php"><i class="fa-solid fa-gamepad"></i>zaloguj się</a>';
			echo '<a class="main" href="stronaRejestracji.php"><i class="fa-solid fa-gamepad"></i>zarejestruj się</a>'; 
			echo '<a class="main" href="odzyskiwanieHasla.php"><i class="fa-solid fa-gamepad"></i>odzyskaj hasło</a>';
		}
	?>

  </div>
  
  <button onclick="myFunction()" class="switch">jasny/ciemny motyw</button>
  
  <script>
  function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");
  }
  </script>
    
</body>
</html>
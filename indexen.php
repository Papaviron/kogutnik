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
      			echo '<a href="https://kogutnik.pl/stronaGlownaEN.php">profile</a>';
      			echo '<a href="https://kogutnik.pl/indexen.php">main page</a>';
          		echo '<a href="https://kogutnik.pl/rankings.php">rankings</a>';
          		echo '<div class="language">
        			<a href="https://kogutnik.pl">pl</a>
    			</div>';
  			echo '</nav>';
        }
  		else{
        	echo '<nav>';
      			echo '<div class="language">
        			<a href="https://kogutnik.pl">pl</a>
    			</div>';
  			echo '</nav>';
        }
    ?>


  <div class="powitanie">
    <p class="powitanie1">welcome to kogutnik!</p>
    <?php
    	if(isset($_SESSION['zalogowany'])){
        	echo '<p class="powitanie2">Select game:</p>';
        } else {
          	echo '<p class="powitanie2">To start game:</p>';
        }
    ?>
  </div>

  <div class="przyciski">
	<?php
		if(isset($_SESSION['zalogowany'])){
			echo '<a class="main" href="http://kogutnik.pl/tic_tac"><i class="fa-solid fa-gamepad"></i>Tic Tac Toe</a>';
			echo '<a class="main" href="http://kogutnik.pl/guessnumber"><i class="fa-solid fa-gamepad"></i>Guess number</a> ';
			echo '<a class="main" href="http://kogutnik.pl/hangman"><i class="fa-solid fa-gamepad"></i>Hangman</a>';
		} else {
			echo '<a class="main" href="loginPage.php"><i class="fa-solid fa-gamepad"></i>log in</a>';
			echo '<a class="main" href="registry.php"><i class="fa-solid fa-gamepad"></i>register</a>'; 
			echo '<a class="recoverPassword" href="odzyskiwanieHaslaEN.php"><i class="fa-solid fa-gamepad"></i>recover password</a>';
		}
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
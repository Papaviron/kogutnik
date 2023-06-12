<?php
session_start();

if (isset($_POST['loginrej'])) //sprawdzenie czy form jest wypelniony
{
	$is_valid = true;  //zalozenie walidacji
	$loginrej = $_POST['loginrej'];  //sprawdzanie loginu
	if ((strlen($loginrej) < 3) || (strlen($loginrej) > 20)) {
		$is_valid = false;
		$_SESSION['e_loginrej'] = "Nick musi posiadać od 3 do 20 znaków!";
	}
	if (ctype_alnum($loginrej) == false) {
		$is_valid = false;
		$_SESSION['e_loginrej'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
	}
	//sprawdzanie hasla
	$haslo1 = $_POST['haslo1'];
	$haslo2 = $_POST['haslo2'];

	if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
		$is_valid = false;
		$_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków!";
	}

	if ($haslo1 != $haslo2) {
		$is_valid = false;
		$_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
	}
	//haszowanie hasla
	$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	//sprawdzanie sekretnego pytania
	$sekretne = $_POST['sekretne'];
	if ((strlen($sekretne) < 3) || (strlen($haslo1) > 15)) {
		$is_valid = false;
		$_SESSION['e_sekretne'] = "Hasło musi posiadać od 3 do 15 znaków!";
	}
	//wybor pytania
	$numer_pytania = $_POST['pytania'];

	//zatwierdzenie regulaminu
	if (!isset($_POST['regulamin'])) {
		$is_valid = false;
		$_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu!";
	}

	//Czy nick jest już zarezerwowany?
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	$rezultat = $polaczenie->query("SELECT id FROM user WHERE user_name='$loginrej'");
	$ile_takich_nickow = $rezultat->num_rows;
	if ($ile_takich_nickow > 0) {
		$is_valid = false;
		$_SESSION['e_nick'] = "Istnieje już gracz o takim loginie!.";
	}
	//dodanie do bazy
	if ($is_valid == true) {
		$sql = "INSERT INTO user VALUES (NULL, '$loginrej', '$haslo_hash', '$numer_pytania', '$sekretne' , 'default-pp.png')";
		if ($polaczenie->query($sql) === TRUE) {
			echo "Rejestracja udana";
		}
      	$sql = "INSERT INTO ox_rankings (score) VALUES (0)";
      	$polaczenie->query($sql);
        $sql = "INSERT INTO guessnumber_rankings (score) VALUES (0)";
      	$polaczenie->query($sql);
        $sql = "INSERT INTO hangman_rankings (score) VALUES (0)";
      	$polaczenie->query($sql);
      
	}
	$polaczenie->close();
}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kogutnik - rejestracja</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="CSS/stronaRejestracji.css">
  
</head>

<body>
  <div class="formularz">
    
	<form method="post">
      <div class="left">
      <p>Login:</p> <br /> <input type="text" name="loginrej"><br />
		<?php
		if (isset($_SESSION['e_loginrej'])) {
			echo $_SESSION['e_loginrej'];
			unset($_SESSION['e_loginrej']);
		}
		if (isset($_SESSION['e_nick'])) {
			echo $_SESSION['e_nick'];
			unset($_SESSION['e_nick']);
		}

		?>
		<br />
      <p>Haslo:</p> <br /> <input type="password" name="haslo1"><br />
		<?php
		if (isset($_SESSION['e_haslo'])) {
			echo $_SESSION['e_haslo'];
			unset($_SESSION['e_haslo']);
		}
		?>


		<br />
      <p>Powtorz haslo:</p> <br /> <input type="password" name="haslo2"><br />
		<br />
      
      
      
      <p>Sekretne pytanie:</p> <br /> <input type="text" name="sekretne"><br />
		<select name="pytania">
			<option value="1">Jak sie nazywał twój pierwszy zwierzak?</option>
			<option value="2">Jaka jest twoja ulubiona potrawa?</option>
			<option value="3">Jaki jest twoj ulubiony kolor?</option>
			<option value="4">Jaka jest twoja ulubiona gra?</option>
		</select>
		<br />
		<?php
		if (isset($_SESSION['e_sekretne'])) {
			echo $_SESSION['e_sekretne'];
			unset($_SESSION['e_sekretne']);
		}
		?>
		<br />
		<label>
			<br />
          <input class="checkbox" type="checkbox" name="regulamin" />
          <p>Akceptuję regulamin</p>
			<br />
			<br />
			<a class="regulamin" href="Regulamin-Kogutnika.pdf">Przeczytaj regulamin!</a>
		</label>
		<br />
		<?php
		if (isset($_SESSION['e_regulamin'])) {
			echo $_SESSION['e_regulamin'];
			unset($_SESSION['e_regulamin']);
		}

		?>
		<br />
      </div>
		<input class="main" type="submit" value="Zarejestruj się" />
	</form>
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
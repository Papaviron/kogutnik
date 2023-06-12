<?php
session_start();

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno != 0) {
    echo "Error: " . $polaczenie->connect_errno . "Opis: " . $polaczenie->connect_error;
} else {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    $sql = "SELECT * FROM user where user_name='$login'";

    if ($result = @$polaczenie->query($sql)) {
        $ilu_userow = $result->num_rows;
        if ($ilu_userow > 0) {
          	$wiersz = $result->fetch_assoc();
            
			if (password_verify($haslo, $wiersz['password'])){
            $_SESSION['zalogowany'] = true;
            $_SESSION['user'] = $wiersz['user_name'];

            unset($_SESSION['blad']);
            $result->close();
            header('Location: https://kogutnik.pl/indexen.php');
            }
           else {
            $_SESSION['blad'] = '<span style="color:red"> Nieprawidlowy login lub haslo </span>';
            header('Location: loginPage.php');
        }
        } else {
            $_SESSION['blad'] = '<span style="color:red"> Nieprawidlowy login lub haslo </span>';
            header('Location: loginPage.php');
        }
    }
    $polaczenie->close();
}

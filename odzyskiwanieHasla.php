<?php
session_start();
require_once "connect.php";
//nawiazanie polaczenia
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno != 0) {
    echo "Error: " . $polaczenie->connect_errno . "Opis: " . $polaczenie->connect_error;
} else {
    //tworzenie zmiennych
    $login = $_POST['login'];
    $pytanie = $_POST['sekretne'];
    $numer_pytania = $_POST['pytania'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $pytanie = htmlentities($pytanie, ENT_QUOTES, "UTF-8");
    $numer_pytania = htmlentities($numer_pytania, ENT_QUOTES, "UTF-8");
    #zapytanie
    $sql = "SELECT * FROM user WHERE user_name = '$login' AND question_id = '$numer_pytania' AND answer = '$pytanie'";



    if ($result = $polaczenie->query($sql)) {
        $ile_userow = $result->num_rows;
        if ($ile_userow > 0) {
            $_SESSION['odzyskiwanie'] = true;
            $_SESSION['login'] = $login;


            $result->close();
            unset($_SESSION['blad']);
            header('Location:resetowanieHasla.php');
        }
    } else {
        $_SESSION['blad'] = '<span style="color:red"> Nieprawidlowy login lub odpowiedz</span>';
        header('Location: odzyskiwanieHasla.php');
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
    <title>Kogutnik - Odzyskiwanie hasła</title>
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="CSS/odzyskiwanieHasla.css">
</head>

<body>
    <form class="formularz" method="post">
      <p>Podaj login do swojego konta:</p> <br /> <input type="text" name="login"><br />
        <br />
        <p>Odpowiedz na swoje sekretne pytanie:</p> <br /> <input type="text" name="sekretne"><br />
        <select name="pytania">
            <option value="1">Jak sie nazywał twój pierwszy zwierzak?</option>
            <option value="2">Jaka jest twoja ulubiona potrawa?</option>
            <option value="3">Jaki jest twoj ulubiony kolor?</option>
            <option value="4">Jaka jest twoja ulubiona gra?</option>
        </select>
        <?php
        //wyswietlenie bledu jesli cos login lub odpowiedz jest nieprawidlowy
        if (isset($_SESSION['blad'])) {
            echo $_SESSION['blad'];
            unset($_SESSION['blad']);
        }
        ?>
        <br />
        <input class="recoverPassword" type="submit" value="Odzyskaj haslo" />

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
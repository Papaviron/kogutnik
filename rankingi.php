<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kogutnik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="CSS/rankingi.css">
</head>
<body>
  
  <nav>
    <a href="https://kogutnik.pl/stronaGlownaPL.php">profil</a>
    <a href="https://kogutnik.pl">strona główna</a>
    <div class="language">
        <a href="https://kogutnik.pl/rankings.php">en</a>
    </div>

</nav>

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
    $sql1 = "SELECT score, (SELECT user_name FROM user WHERE user.user_id = ox_rankings.user_id) user_name FROM ox_rankings WHERE score != 0 ORDER BY score DESC";
    $sql2 = "SELECT score, (SELECT user_name FROM user WHERE user.user_id = guessnumber_rankings.user_id) user_name FROM guessnumber_rankings WHERE score != 0 ORDER BY score DESC";
    $sql3 = "SELECT score, (SELECT user_name FROM user WHERE user.user_id = hangman_rankings.user_id) user_name FROM hangman_rankings WHERE score != 0 ORDER BY score DESC";
    $result1 = @$conn->query($sql1);
    $result2 = @$conn->query($sql2);
    $result3 = @$conn->query($sql3);

    echo '<div class="gra1">';

    $s = 1;
    if ($result1->num_rows > 0) {
        echo '<p>Kółko i krzyżyk:<br/></p>';
        // output data of each row
        while( ($row = $result1->fetch_assoc()) && ($s < 11) ) {
        echo $s . '. ' . $row['user_name'] . ' - ' . $row['score'] . '<br/>';
        $s++;
        }
        $s = 1;
    }
    echo '</div>';

    echo '<div class="gra2">';
    if ($result2->num_rows > 0) {
        echo '<p>Zgadnij liczbę:<br/></p>';
        // output data of each row
        while( ($row = $result2->fetch_assoc()) && ($s < 11) ) {
            echo $s . '. ' . $row['user_name'] . ' - ' . $row['score'] . '<br/>';
        $s++;
        }
        $s = 1;
    }
    echo '</div>';

    echo '<div class="gra3">';
    if ($result3->num_rows > 0) {
        echo '<p>Wisielec:<br/></p>';
        // output data of each row
        while( ($row = $result3->fetch_assoc()) && ($s < 11) ) {
        echo $s . '. ' . $row['user_name'] . ' - ' . $row['score'] . '<br/>';
        $s++;
        }
    }
    echo '</div>';

    $conn->close();
    } else {
    echo 'User is not log-in';
    header('Location: https://kogutnik.pl');
    }
    ?>
  
    <button onclick="myFunction()" class="switch">jasny/ciemny motyw</button>

  <script>
  function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");
  }
  </script>
</body>
</html>
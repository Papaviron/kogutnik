<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sprawdź, czy plik został przesłany bez błędów
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar = $_FILES['avatar'];
        
        // Wybierz folder, w którym chcesz zapisać plik avataru
        $uploadDir = __DIR__ . '/avatars/';
        
        // Generuj unikalną nazwę dla pliku, aby uniknąć kolizji
        $avatarName = uniqid('avatar_') . '.' . pathinfo($avatar['name'], PATHINFO_EXTENSION);
        
        // Przenieś plik z tymczasowego katalogu do docelowego folderu
        if (move_uploaded_file($avatar['tmp_name'], $uploadDir . $avatarName)) {
            // Plik został pomyślnie przesłany i zapisany
            echo 'Avatar został pomyślnie przesłany i zapisany';
          	require_once "connect.php";
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno != 0) {
    		echo "Error: " . $polaczenie->connect_errno . "Opis: " . $polaczenie->connect_error;
		} else{
  		$name = $_SESSION['user'];
  		$sql =" UPDATE `user` SET `avatar` = '$avatarName' WHERE `user`.`user_name` = '$name'";
  		// Wykonanie zapytania
        $polaczenie->query($sql);
		if ($polaczenie->query($sql) === TRUE) {
   		 echo "Dane zostały zaktualizowane pomyślnie.";
		} else {
   		 echo "Wystąpił błąd podczas aktualizacji danych: " . $conn->error;
		}
 		 $polaczenie->close;
		}
          	
        } else {
            // Wystąpił błąd podczas przenoszenia pliku
            echo 'Wystąpił błąd podczas przenoszenia pliku.';
        }
    } else {
        // Wystąpił błąd podczas przesyłania pliku
        echo 'Wystąpił błąd podczas przesyłania pliku.';
    }
}
?>

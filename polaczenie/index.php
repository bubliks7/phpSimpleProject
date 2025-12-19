<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rejestracja php</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post">
        <h2>Zarejestruj się</h2>

        <div>
            <label for="login">Login: </label>
            <input type="text" name="login" id="login">
        </div>

        <div>
            <label for="haslo">Hasło: </label>
            <input type="text" name="haslo" id="haslo">
        </div>

        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="imie">Imie: </label>
            <input type="text" name="imie" id="imie">
        </div>

        <div>
            <label for="nazwisko">Nazwisko: </label>
            <input type="text" name="nazwisko" id="nazwisko">
        </div>

        <div>
            <label for="wiek">Wiek: </label>
            <input type="number" name="wiek" id="wiek">
        </div>

        <div>
            <input type="submit" value="Zarejestruj się">
        </div>
    </form>
    <?php 
        $conn = mysqli_connect("localhost","root","","polaczenie");

        if(!$conn){
            die("Blad polaczenia: " . mysqli_connect_error());
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $login = $_POST["login"] ?? '';
            $haslo = $_POST["haslo"] ?? '';
            $email = $_POST["email"] ?? '';
            $imie = $_POST["imie"] ?? '';
            $nazwisko = $_POST["nazwisko"] ?? '';
            $wiek = $_POST["wiek"] ?? '';
            
            if($login !== '' && $haslo !== '' && $email !== '' && $imie !== '' && $nazwisko !== '' && $wiek !== ''){
                $sql = "INSERT INTO polaczenie (login, haslo, email, imie, nazwisko, wiek) VALUES ('$login', '$haslo', '$email', '$imie', '$nazwisko', '$wiek')";

                if(mysqli_query($conn, $sql)){
                    echo"Dodano uzytkownika";
                } else{
                    echo "Błąd: " . mysqli_error($conn);
                }
            } else{
                echo "Uzupelnij wszystkie pola!";
            }
        }
            
    ?>
</body>

</html>

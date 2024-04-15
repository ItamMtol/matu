<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    if($_POST["login"] && $_POST["password1"] && $_POST["password2"] && $_POST["email"] && $_POST["imie"] && $_POST["nazwisko"]) {
        if($_POST["password1"]==$_POST["password2"]){
            $conn = mysqli_connect("localhost","root","","kosma");
            $has = crypt($_POST["password1"],"a32435dfetfg");
            $log = $_POST["login"];
            $e = $_POST["email"];
            $im = $_POST["imie"];
            $naz = $_POST["nazwisko"];
            $zap = mysqli_query($conn,"SELECT  `email`,`login`,`haslo`FROM `klientki` where login like \"$log\" or email like \"$e\";");
            if(mysqli_num_rows($zap) == 0){
            mysqli_query($conn,"INSERT INTO `klientki` (`id`, `email`, `imie`, `nazwisko`, `login`, `haslo`) VALUES (NULL, \"$e\", \"$im\", \"$naz\", \"$log\", \"$has\");");
            header("Location: logowaniek.php");
 
            exit;
            }
            else{
                echo "Login lub email istnieje już w bazie danych";
            }
            mysqli_close($conn);
        }
        else{
            echo "Hasła się nie zgadzają";
        }

    }
    ?>
<br><a href="index.php"><button>Powrót do strony głównej</button></a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script> function tworzenie(){
        document.getElementById("logowanie").style.display="none"
        document.getElementById("tworzenie").style.display="block"
    } </script>
    <?php
    session_start();
    $_SESSION["aaaa"]=1;
    $_SESSION["log"]= null;
    $_SESSION["has"]= null;
    $_SESSION["ckl"]=1;
    ?>
</head>
<body>
    <div id="logowanie">
    <form action="index.php" method="post">
        Podaj login lub email<input type="text" name="login"><br><br>
        Podaj hasło<input type="password" name="password"><br><br>
        <button>Zaloguj</button>
    </form>
    <p>Nie masz konta? Utwórz je!</p>
    <button onclick="tworzenie()">Utwórz konto</button>    </div>
    <div id="tworzenie" style="display:none">
    <form action="tworzenie.php" method="post">
        Podaj login<input type="text" name="login"><br><br>
        Podaj email<input type="email" name="email"><br><br>
        Podaj imie <input type="text" name="imie"><br><br>
        Podaj nazwisko <input type="text" name="nazwisko"><br><br>
        Podaj hasło<input type="password" name="password1"><br><br>
        Powtórz hasło<input type="password" name="password2"><br><br>

        <button>Utwórz!</button>
    </form>
    </div>
    <br><a href="index.php"><button>Powrót do strony głównej</button></a>
</body>
</html>
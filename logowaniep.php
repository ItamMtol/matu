<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    $_SESSION["aaaa"]=1;
    $_SESSION["log"]= null;
    $_SESSION["has"]= null;
    $_SESSION["ckl"]=2;
    ?>
</head>
<body>
<form action="index.php" method="post">
        Podaj login lub email<input type="text" name="login"><br><br>
        Podaj hasło<input type="password" name="password"><br><br>  
        <button>Zaloguj</button>
    </form>
    <br><a href="index.php"><button>Powrót do strony głównej</button></a>
</body>
</html>
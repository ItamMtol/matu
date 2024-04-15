<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
$login = $_SESSION["log"];
$idzab =$_SESSION["idzab"];
$data = $_SESSION["data"];
$conn= mysqli_connect("localhost","root","","kosma");
$aa = mysqli_query($conn,"SELECT id from klientki where login like \"$login\" ");
while($row = mysqli_fetch_array($aa)){
    $login  = $row["id"];
}
if($_POST["spe"]){
    $idkos = $_POST["spe"];
    mysqli_query($conn,"INSERT INTO `wizyty`(`id`, `id_zabiegu`, `czas`, `id_kosmetyczki`, `id_klienta`) VALUES (NULL, \"$idzab\", \"$data\", \"$idkos\", \"$login\");");
    echo "Twoja wizyta została dodana i może zostać zobaczona na stronie głównej<br>";
}

?>
<body>
    <a href="index.php"><button>Powrót do strony głównej</button></a>
</body>
</html>
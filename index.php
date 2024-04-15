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
    //error_reporting(0);
    session_start();
    $conn = mysqli_connect("localhost","root","","kosma");
    $zap = "SELECT  `email`,`login`,`haslo`FROM `kosmetyczki`";
    $zap2 = "SELECT  `email`,`login`,`haslo`FROM `klientki`";
    function przycisk(){
        echo '<div>
        <h1>Witamy w salonie kosmetycznym</h1>
    </div>    <a href="logowaniep.php"><button>Logowanie pracownicy</button></a>
        <a href="logowaniek.php" ><button>Logowanie klienci</button></a>';
    }
    function wizyta(){
       $a =  $_SESSION["log"];
       $_SERVER["wiz"]=1 ;
       $conn = mysqli_connect('localhost','root','','kosma');
    $sql = "SELECT date(`czas`) as tak FROM `wizyty` \n"

    . "INNER JOIN klientki on klientki.id = wizyty.id_klienta\n"

    . "INNER JOIN kosmetyczki on kosmetyczki.id = wizyty.id_kosmetyczki\n"

    . "WHERE kosmetyczki.login like \"$a\" or kosmetyczki.email like \"$a\" or klientki.email like \"$a\" or klientki.login like \"$a\";";
    while( $row = mysqli_fetch_array(mysqli_query($conn, $sql)) ){
        if( $row["tak"] == date("Y-m-d")){
            echo '<script> alert("Dzisiaj masz wizytę!!!")</script>';
        break;}
    }}
    function strona(){
        echo '
        <div>
        <div>
            <h1>Witamy w salonie kosmetycznym</h1>
        </div>
        <div>
            <form action="wizyta.php" method="POST">
                <label for="usluga">Wybierz usługę kosmetyczną lub pakiet:</label>
                <select id="usluga" name="usluga">
                  <optgroup label="Usługi pojedyncze">
                    <option value ="Manicure standardowy">Manicure standardowy (30-45 minut)</option>
                    <option value="Manicure hybrydowy">Manicure hybrydowy (45-60 minut)</option>
                    <option value="Manicure z ozdobami">Manicure z ozdobami (45 minut - 1,5 godziny)</option>
                    <option value="Pedicure standardowy">Pedicure standardowy (45-60 minut)</option>
                    <option value="Pedicure hybrydowy">Pedicure hybrydowy (60-75 minut)</option>
                    <option value="Pedicure z zabiegami pielęgnacyjnymi">Pedicure z zabiegami pielęgnacyjnymi (do 1,5 godziny)</option>
                    <option value="Zabieg na twarz klasyczny">Zabieg na twarz klasyczny (60-75 minut)</option>
                    <option value="Zabiegi na twarz nawilżające, oczyszczające, przeciwstarzeniowe">Zabiegi na twarz nawilżające, oczyszczające, przeciwstarzeniowe (45 minut - 1,5 godziny)</option>
                    <option value="Depilacja woskiem">Depilacja woskiem (15 minut - 1 godzina)</option>
                    <option value="Depilacja laserowa">Depilacja laserowa (kilka minut - 1 godzina)</option>
                    <option value="Masaż relaksacyjny">Masaż relaksacyjny (30 minut - 1 godzina)</option>
                    <option value="Masaż sportowy lub głęboko relaksacyjny">Masaż sportowy lub głęboko relaksacyjny (45 minut - 1,5 godziny)</option>
                    <option value="Strzyżenie">Strzyżenie (30-60 minut)</option>
                    <option value="Koloryzacja lub farbowanie">Koloryzacja lub farbowanie (1-3 godziny)</option>
                    <option value="Trwała ondulacja lub prostowanie">Trwała ondulacja lub prostowanie (1-3 godziny)</option>
                  </optgroup>
                  <optgroup label="Pakiety">
                    <option value="Pakiet relaksacyjny">Pakiet relaksacyjny (manicure, pedicure, masaż) - około 2,5 godziny</option>
                    <option value="Pakiet zabiegów na twarz">Pakiet zabiegów na twarz (oczyszczający, nawilżający) - około 2 godzin</option>
                    <option value="Pakiet wiosenny">Pakiet wiosenny (strzyżenie, koloryzacja, manicure) - około 3 godzin</option>
                  </optgroup>
                </select><br>
                <label for="data">Wybierz dzień ( w godzinach 8-16):</label>
                <input type="datetime-local" id="data" name="data">
                <br><button>Potwierdź</button>
              </form>
        </div>
        <div>
        </div>
    </div>
        ';
    }
    function wizyty(){
        echo "<div>";
        $a  = $_SESSION['log'];
        if($_SESSION["ckl"]!=2){
        $conn = mysqli_connect("localhost","root","","kosma");
        $sql = "SELECT zabiegi.nazwa_zabiegu,zabiegi.opis,kosmetyczki.imie,kosmetyczki.nazwisko,`czas` FROM `wizyty` \n"

    . "INNER JOIN kosmetyczki on kosmetyczki.id = wizyty.id_kosmetyczki\n"

    . "INNER JOIN zabiegi on zabiegi.id = wizyty.id_zabiegu\n"

    . "INNER JOIN klientki on klientki.id = wizyty.id_klienta\n"

    . "WHERE klientki.`login` like \"$a\";";
        $zap  = mysqli_query($conn,$sql);
        echo "<br><table>  <tr>
        <th>Nazwa zabiegu</th>
        <th>Opis</th>
        <th>Kosmetyczka</th>
        <th>Data</th>
      </tr>";
        while($row = mysqli_fetch_assoc($zap)){
            echo "<tr>
            <td>".$row["nazwa_zabiegu"]."</td>
            <td>".$row["opis"]."</td>
            <td>".$row["imie"]." ".$row["nazwisko"]."</td>
            <td>".$row["czas"]."</td>
          </tr>";
        }}
        else{
            $conn = mysqli_connect("localhost","root","","kosma");
            $sql = "SELECT zabiegi.nazwa_zabiegu,zabiegi.opis,klientki.imie,klientki.nazwisko,`czas` FROM `wizyty` \n"

            . "INNER JOIN kosmetyczki on kosmetyczki.id = wizyty.id_kosmetyczki\n"
        
            . "INNER JOIN zabiegi on zabiegi.id = wizyty.id_zabiegu\n"
        
            . "INNER JOIN klientki on klientki.id = wizyty.id_klienta\n"
        
            . "WHERE kosmetyczki.`login` like \"$a\" or kosmetyczki.email like \"$a\";";
            $zap  = mysqli_query($conn,$sql);
        echo "<h1>Twoje klientki</h1><br><table>  <tr>
        <th>Nazwa zabiegu</th>
        <th>Opis</th>
        <th>Klientka</th>
        <th>Data</th>
      </tr>";
        while($row = mysqli_fetch_assoc($zap)){
            echo "<tr>
            <td>".$row["nazwa_zabiegu"]."</td>
            <td>".$row["opis"]."</td>
            <td>".$row["imie"]." ".$row["nazwisko"]."</td>
            <td>".$row["czas"]."</td>
          </tr>";
        }
            
        }}
        echo "</table><br></div>";
if($_SESSION['log']==null && $_SESSION['has']==null){
    error_reporting(0);
    if($_POST["login"] && $_POST["password"]){
     $a = $_POST["login"];
     $b = crypt($_POST["password"],"a32435dfetfg");
     if($_SESSION["ckl"]==2){
     $sql =  mysqli_query($conn,$zap ." where (login  like \"$a\" or email like \"$a\" ) and haslo like \"$b\" ;");   
     if(mysqli_num_rows($sql) > 0){
        $_SESSION["log"]=$a;
        $_SESSION["has"]=$b;
        wizyty();
        wizyta();
        echo '<form action="wylogowanie.php" method="">
    <button>Wyloguj się</button></form>';
     }
     else{
        echo "Nie prawidłowe hasło lub login<br>";
        przycisk();
    }}
     else if($_SESSION["ckl"]==1){
     $sql = mysqli_query($conn,$zap2 . "where (login  like \"$a\" or email like \"$a\" )and haslo like \"$b\" ;");
     if(mysqli_num_rows($sql) > 0){
        $_SESSION["log"]=$a;
        $_SESSION["has"]=$b;
        strona();
        wizyty();
        wizyta();
        echo '<form action="wylogowanie.php" method="">
    <button>Wyloguj się</button></form>';
        }
        else{
            echo "Nie prawidłowe hasło lub login<br>";
            przycisk();
        }
    }
    else{
        echo "Coś poszło nie tak";
    }
    }
   else{
    if($_SESSION["aaaa"]){
    echo "Nie podano loginu lub hasła <br>";}
    przycisk();
   }}
   else{
    if($_SESSION["ckl"]==1){
    strona();}
    echo '<br><form action="wylogowanie.php" method="">
    <button>Wyloguj się</button></form>';
    wizyty();
    wizyta();
   }
    ?>


</body>
</html>
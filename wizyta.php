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
if($_POST["data"] && $_POST["usluga"])
{
   $_SESSION["data"]= $_POST["data"];
   if(substr($_POST["data"],0,10)==date("Y-m-d")){
      if(substr($_POST["data"],11)<=date("H:i")){
      echo "Nie możesz rezerwować wstecz";
      goto a;}   
   }
   if($_POST["data"]>=date("Y-m-d")){
   if(($_POST["data"][12]>=8 && $_POST["data"][11]==0) || ($_POST["data"][12]<6) && $_POST["data"][11]==1){
   $conn =  mysqli_connect("localhost","root","","kosma");
   $sql = "SELECT `nazwa_zabiegu`,`id`,`Specjalizacja`,`trwanie` FROM `zabiegi`;";
   $sql1 = "SELECT `id`,`specjalizacja` FROM `kosmetyczki`;";
   $zap1 = mysqli_query($conn,$sql);
   $zmien = substr($_POST["data"],0,10);
   $godz = substr($_POST["data"],11);
   $zap2 = mysqli_query($conn, "SELECT (hour(czas)*60 +minute(czas ) + trwanie)/60 as liczba , date(czas) as dat, time(czas) as czas, id_kosmetyczki , `Specjalizacja` FROM wizyty\n"
   . "INNER JOIN zabiegi ON zabiegi.id = wizyty.id_zabiegu having dat like \"$zmien\"  ");
   $tabela = [];
   while( $row = mysqli_fetch_assoc($zap1) ){
      if($row["nazwa_zabiegu"] == $_POST["usluga"]){
         $_SESSION["idzab"] = $row["id"];
         if($row["Specjalizacja"]=="Pakiety"){
            $spec = 0 ; 
         }
         else{$spec = $row["Specjalizacja"];}
         $traw = $row["trwanie"];
         break;
      }
   }
   $zap1 = mysqli_query($conn,$sql1);
   while( $row = mysqli_fetch_assoc($zap1) ){
      if( $row["specjalizacja"] == $spec || $spec == 0){
         array_push($tabela,$row["id"]);}
   }
   $czyzajdz = 0;
   while( $row = mysqli_fetch_assoc($zap2) ){
      $czyzajdz = 1;
      $godzzak = substr($row["liczba"],0,2).":".substr($row["liczba"],3,2)/100*60;
      echo "<br>";
      if($row["Specjalizacja"]==$spec){
         if($godz > substr($row["czas"],0,5)){
            if($godz < $godzzak){
                array_splice($tabela , array_search($row["id_kosmetyczki"],$tabela),1);
            }
         }
         else{
            if((substr($row["czas"],0,2)*60 + substr($row["czas"],3,2))-(substr($godz,0,2)*60 + substr($godz,3,2) +$traw)<=0){
               array_splice($tabela , array_search($row["id_kosmetyczki"],$tabela),1);
            }
         }
      }     
   }
   if(count($tabela)!=0){
   if($czyzajdz == 0 ){
      if($spec!=0){
     $zape = mysqli_query($conn, "SELECT id,imie,nazwisko,`specjalizacja` FROM kosmetyczki where `specjalizacja` like \"$spec\"");}
     else{
      $zape = mysqli_query($conn, "SELECT id,imie,nazwisko,`specjalizacja` FROM kosmetyczki");
     }
     echo '<form action = "dodanie.php" method ="POST"> Wybierz wykonawcę <select name = "spe">';
     while( $row = mysqli_fetch_assoc($zape) ){
      $id= $row['id'];
         echo "<option value =\"$id\">".$row["imie"]." ".$row["nazwisko"]." </option>";
      }
      echo "</select><button>Wybierz</button> </form>";

      
   }
   else{
      $zape = mysqli_query($conn ,"SELECT id,imie,nazwisko,`specjalizacja` FROM kosmetyczki WHERE id IN (".implode(',',$tabela).")");
      echo '<form action = "dodanie.php" method ="POST"> Wybierz wykonawcę <select name = "spe">';
      while($row = mysqli_fetch_assoc($zape)){
         $id= $row['id'];
         echo "<option value =\"$id\">".$row["imie"]." ".$row["nazwisko"]." </option>";
      }
      echo "</select><button>Wybierz</button> </form>";
   }}
   else{
      echo "Nie mamy dostępnych pracowników wtedy";
   }
   }
else{
   echo "Nie pracujemy wtedy";
}

}
else{
   echo "zła data";
}

}
else{
   echo "Wypełnij wszystko";
}

a:
   //header("Location: index.php");
   //echo "".$_POST["data"]."<br>";
 //echo $_POST["data"].$_POST["usluga"];
?>
<body>
    <br><a href="index.php"><button>Powrót do strony głównej</button></a>
</body>
</html>
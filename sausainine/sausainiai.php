<?php

$link = mysqli_connect("localhost", "root", "", "duombaze");
    
if (mysqli_errno($link)) {
echo mysqli_error($link);
exit;
}
$galutineKaina = 0;
$suNuolaida = false;
if (isset ($_POST["slapukas_3"])){
     $preke = $_POST["preke"];
     $kiekis = $_POST["kiekis"];

     $sq = "SELECT pavadinimas, kaina FROM items WHERE pavadinimas LIKE '$preke'";
     $rz = mysqli_query($link, $sq);
     
     if ($rz) {
     while ($row = mysqli_fetch_array($rz, MYSQLI_ASSOC)) {
     $sq2 = "INSERT INTO orders VALUES ('".$_COOKIE["vartotojo_vardas"]."', '".$row["pavadinimas"]."', '".$row["kaina"]."', '".$kiekis."')";
     if($kiekis <= 0){
         echo "<h1 style='color: red'>Kiekis negali buti maziau arba lygus nuliui </h1>";    
     }
     else{
         mysqli_query($link, $sq2);
     }
     }
    }
       
}

if (isset ($_POST["slapukas_4"])){
     $sq3 = "SELECT pavadinimas, kaina, kiekis FROM orders WHERE vartotojo_vardas LIKE '".$_COOKIE["vartotojo_vardas"]."'";
     $rz3 = mysqli_query($link, $sq3);
     
     function round_up($number, $precision)
     {
     $fig = (int) str_pad('1', $precision, '0');
     return (ceil($number * $fig) / $fig);
     }
  
     
     if ($rz3) {
     echo "<h1 style='color: red'>uzsakymas</h1>";    
     while ($row3 = mysqli_fetch_array($rz3, MYSQLI_ASSOC)) {
     $galutineKaina += $row3["kaina"] * $row3["kiekis"];
     echo "<pre>";
     echo "<h2 style='color: red;'>" . $row3["pavadinimas"] . " - " . $row3["kaina"] . " eur." . " kiekis - " . $row3["kiekis"] .  "</h2>";
     echo "</pre>";
     }
     if($galutineKaina > 10){
     $galutineKaina = $galutineKaina - ($galutineKaina * (5 / 100));
     $suNuolaida = true;
     }
     if($suNuolaida){
       echo "<h2 style='color: red; font-weight: bold;'>Galutine kaina su nuolaida: " . round_up($galutineKaina, 3) . " eur." . "</h2>" ;
     } else {
       echo "<h2 style='color: red; font-weight: bold;'>Galutine kaina: " . $galutineKaina . " eur." . "</h2>" ;
     }

     }
}

if (isset ($_POST["slapukas_5"])){
    setcookie("vartotojo_vardas", $vartotojoVardas, time() + 0);
    header("Location: prisijungimas.php");
}







?>


<?php 

if (isset($_COOKIE["vartotojo_vardas"])){
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>sausainiai</title>
    </head>
    <body>
        <?php 
        
        $sausainiai = "SELECT * FROM items";
        $rez = mysqli_query($link, $sausainiai);
        
        if ($rez) {
        while ($row = mysqli_fetch_array($rez, MYSQLI_ASSOC)) {
        echo "<h2>" . $row["pavadinimas"] . " - " . $row["kaina"] . " eur." . "</h2>";
        echo "<br>";
        }
        }
        
        ?>
        
        <form action="sausainiai.php" method="POST">
        <label for="preke">Iveskite prekes pavadinima:</label><br><br>   
        <input type="text" name="preke"><br><br>
        <label for="kiekis">Iveskite kieki:</label><br><br>
        <input type="text" name="kiekis"><br><br>
        <input type="submit" name"pateikti" value="Pateikti">
        <input type="hidden" name="slapukas_3">
        </form>
        <br>
        <form action="sausainiai.php" method="POST">
        <input type="submit" name"uzbaigti" value="Užbaigti">
        <input type="hidden" name="slapukas_4">
        </form>
        <br>
        <form action="sausainiai.php" method="POST">
        <input type="submit" name"atsijungti" value="Atsijungti">
        <input type="hidden" name="slapukas_5">
        </form>

    </body>
</html>

<?php } else {
    header("Location: pagrindinis.php");
}
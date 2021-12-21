<?php

  $link = mysqli_connect("localhost", "root", "", "duombaze");
    
  if (mysqli_errno($link)) {
  echo mysqli_error($link);
  exit;
  }

  if (isset($_POST["slapukas"])) { 
      
  $informacija = "INSERT INTO users VALUES ('".$_POST["vardas"]."', '".$_POST["pavarde"]."', '".$_POST["vartotojo_vardas"]."', '".$_POST["slaptazodis"]."', '".$_POST["elpastas"]."')";
  mysqli_query($link, $informacija);
  

  if (mysqli_errno($link)) {
  echo "<h1>Vartotojo vardas užimtas</h1>";
  }
  else
  {
  header("Location: prisijungimas.php");
  }
   
}

if (isset ($_POST["slapukas_2"])){
    $vartotojoVardas = $_POST["vartotojo_vardas"];
    $slaptazodis = $_POST["slaptazodis"];
    
    $sql = "SELECT vartotojo_vardas, slaptazodis FROM users WHERE vartotojo_vardas LIKE '%$vartotojoVardas%' AND slaptazodis LIKE '%$slaptazodis%'";
    $result = mysqli_query($link, $sql);
    
    
    
    if(mysqli_num_rows($result) == 1){
    setcookie("vartotojo_vardas", $vartotojoVardas, time() + 60 * 60 * 24 * 365);
    header("Location: sausainiai.php");
    }
    
    if(mysqli_num_rows($result) == 0){
    echo "<h1>Blogi prisijungimo duomenys</h1>";
    }
    
    
    
}
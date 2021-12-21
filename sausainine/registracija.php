
<?php 
if (isset($_COOKIE["vartotojo_vardas"])){
    header("Location: sausainiai.php");
}    
?>

<!DOCTYPE html>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="peradresavimas.php" method="POST">
          <label for="vardas">Iveskite varda:</label><br>
          <input type="text" name="vardas" required><br><br>
          <label for="pavarde">Iveskite pavarde:</label><br>
          <input type="text" name="pavarde" required><br><br>
          <label for="vartotojo_vardas">Iveskite vartotojo varda:</label><br>
          <input type="text" name="vartotojo_vardas" required><br><br>
          <label for="slaptazodis">Iveskite slaptazodi:</label><br>
          <input type="text" name="slaptazodis" required><br><br>
          <label for="elpastas">Iveskite el pasta:</label><br>
          <input type="text" name="elpastas" required><br><br>
          <input type="hidden" name="slapukas">
          <input type="submit" value="Registruotis">
      </form>

    </body>
</html>

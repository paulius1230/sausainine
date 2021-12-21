
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
          <label for="vartotojo_vardas">Iveskite vartotojo varda:</label><br>
          <input type="text" name="vartotojo_vardas" required><br><br>
          <label for="slaptazodis">Iveskite slaptazodi:</label><br>
          <input type="text" name="slaptazodis" required><br><br>
          <input type="hidden" name="slapukas_2">
          <input type="submit" value="Prisijungti">
      </form>

    </body>
</html>

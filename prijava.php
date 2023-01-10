<?php
$host="localhost";
$user="dostava";
$pass="12345";
$db="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$user,$pass,$db);
if(!empty(filter_input(INPUT_POST, 'k_ime') && filter_input(INPUT_POST, 'k_lozinka1') && filter_input(INPUT_POST, 'k_lozinka2') && filter_input(INPUT_POST, 'adresa_k') && filter_input(INPUT_POST, 'telefon_k'))){

   $k_ime= mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_ime'));
    $k_lozinka1=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_lozinka1'));
    $k_lozinka2=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_lozinka2'));
    $adresa_k=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'adresa_k'));
    $telefon_k=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'telefon_k'));}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DOSTAVA | Prijava</title>
    <link rel="icon" href="pizza.jpg">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="prijava.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
  </head>
  <body>



  <div class="container" id="container">
      <form action="povezivanje.php" method="POST">
          <center><input class = "k_ime" type="text" name="k_ime"  placeholder="Korisničko ime"></center>
          <BR>
          <center><input class ="k_lozinka" type="password" name="k_lozinka" placeholder="Lozinka"></center>
          <BR>
          <center><button type="submit" name="Dalje" value="Prijavi se" class="button" >PRIJAVI SE</button></center>
      </form>
      <BR> </div>

  <div class="container" id="container2">
      <div class="modal-header">
          <span class="close">&times;</span>
          <center><h2>Napravite Vaš Nalog</h2></center>
      </div>
      <form action="registracija.php" method="POST">
          <center><font size ="4">Unesite željeno korisničko ime</font></center>
          <center><input type="text" name="k_ime"  placeholder="Korisničko ime" class="inputPopUp"></center>
          <BR>
          <center><font size ="4">Unesite željenu lozinku </font><BR></center>
          <center><input type="password" name="k_lozinka1"  placeholder="Željena lozina" class="inputPopUp"></center>
          <BR>
          <center><font size ="4">Ponovo unesite lozinku </font><BR></center>
          <center><input type="password" name="k_lozinka2"  placeholder="Ponovite Vašu lozinku" class="inputPopUp"></center>
          <BR>
          <center><font size ="4">Unesite vasu adresu </font><BR></center>
          <center><input type="text" name="adresa_k" required pattern=".{4,}" title="Molimo Vas da unesete svoju adresu" placeholder="Unesite Vašu adresu" class="inputPopUp"></center>
          <BR>
          <center><font size ="4">Unesite vas telefon </font><BR></center>
          <center><input type="text" name="telefon_k" required pattern="[0-9]+" title="Molimo Vas da unesete samo brojeve" placeholder="Unesite Vaš broj telefona" class="inputPopUp"></center>
          <BR>
          <center><button type="submit" name="Dalje" value="Napravi nalog">NAPRAVI NALOG</button></center>
      </form>
      <BR>
  </div>

</body>
</html>

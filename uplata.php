<?php
session_start();
$host = "localhost";
$user = "dostava";
$pass = "12345";
$db = "porucivanje_i_dostava_hrane";
$con = mysqli_connect($host, $user, $pass, $db);
$k_ime = $_SESSION['k_ime'];
$k_lozinka = $_SESSION['k_lozinka'];


print " <ul>
        <li><p class='active'>Korisnik:$k_ime</p></li>
        <li class='odjava'><a href='prijava.html'>Odjava</a></form></li>
        <li class='nazad'><a href='pocetna.php'>Početna</a></li>

    </ul>";


?>
<html>
<head> <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="rez.css">
    <link rel="stylesheet" href="nav_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
</head>
<body>
<form action="uplata_kredita.php" method="POST">
    <center>
        <input type="radio" name="tip" value="1" /> 500din kredita
        <input type="radio" name="tip" value="2" /> 1000din kredita
        <input type="radio" name="tip" value="3" /> 1500din kredita
        <input type="radio" name="tip" value="4" /> 2000din kredita
        <input type="radio" name="tip" value="5" /> 5000din kredita
        <BR>
        <BR>
        <button type="submit" name="uplati"  class="button"> Izaberi i uplati </button>
    </center>
</form>

</body>
</html>








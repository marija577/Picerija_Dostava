<?php
session_start();
$host = "localhost";
$username = "dostava";
$password = "12345";
$db ="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$username,$password,$db);

if(!empty(filter_input(INPUT_POST, 'k_ime') && filter_input(INPUT_POST, 'k_lozinka'))){
    $k_ime=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_ime'));
    $k_lozinka=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_lozinka'));
    $_SESSION['k_ime']=$k_ime;
    $_SESSION['k_lozinka']=$k_lozinka;

    $upit = "SELECT * 
             FROM korisnik
             WHERE k_ime='$k_ime' AND k_lozinka='$k_lozinka'";

    $rez=mysqli_query($con,$upit);

    if(mysqli_num_rows($rez)==1){
        header("Location: pocetna.php");
    }

    else{
        print"<center>Pogrešno ste uneli ime korisnika i/ili lozinku</center>"
            . "<BR>";
    }

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="nav_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <title>Dostava hrane</title>
</head>
<body>

<form action='prijava.php' method='POST'>
    <center><input type='submit' name='nazad' value='Pokusaj ponovo'></center>
</form>
</body>
</html>
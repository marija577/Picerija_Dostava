<?php
session_start();
$host = "localhost";
$username = "dostava";
$password = "12345";
$db ="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$username,$password,$db);

$k_lozinka=$_SESSION['k_lozinka'];
$sifra_jela=$_SESSION['sifra_jela'];

$upit="INSERT INTO porudzbina(k_lozinka,sifra_jela) 
           VALUES ('$k_lozinka','$sifra_jela')";
$rez=mysqli_query($con,$upit);
if($rez){
    echo '<script> alert("Uspešno ste poručili hranu!") </script>';
    header("refresh:0.2, url = pocetna.php");
}


?>

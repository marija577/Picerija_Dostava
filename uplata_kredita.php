<?php
session_start();
$host = "localhost";
$username = "dostava";
$password = "12345";
$db ="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$username,$password,$db);
$id_uplate=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'tip')); //tip uplate
$k_lozinka=$_SESSION['k_lozinka'];
$cena=$_SESSION['cena'];


$upit="INSERT INTO korisik_uplata(k_lozinka,id_uplate) 
           VALUES ('$k_lozinka','$id_uplate')";
    $rez=mysqli_query($con,$upit);
    if($rez){
        echo '<script> alert("Uspešno ste uplatili kredit ") </script>';
        header("refresh:0.2, url = rezervacija1.php");
    }



?>






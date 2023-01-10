<?php

$host="localhost";
$user="dostava";
$pass="12345";
$db="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$user,$pass,$db);
if(!empty(filter_input(INPUT_POST, 'k_ime') && filter_input(INPUT_POST, 'k_lozinka1') && filter_input(INPUT_POST, 'k_lozinka2') && filter_input(INPUT_POST, 'adresa_k') && filter_input(INPUT_POST, 'telefon_k'))){

$k_ime=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_ime'));
    $k_lozinka1=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_lozinka1'));
    $k_lozinka2=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'k_lozinka2'));
    $adresa_k=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'adresa_k'));
    $telefon_k=mysqli_real_escape_string($con,filter_input(INPUT_POST, 'telefon_k'));

    $upit="SELECT * FROM korisnik
              WHERE k_lozinka='$k_lozinka1'";
        $rez=mysqli_query($con,$upit);
        if(mysqli_num_rows($rez)==0){
            $upit1="INSERT INTO korisnik (k_ime,k_lozinka,adresa_k,telefon_k) VALUES ('$k_ime','$k_lozinka1','$adresa_k','$telefon_k')";
            $rez1=mysqli_query($con,$upit1);
            if($rez1){
                echo '<script> alert("Uspešno ste kreirali nalog") </script>';
                header("refresh:0.2, url = prijava.php"); // Pomocu ovog se pomeramo na drugu stranicu posle 1s
            }
        }
        else{print"Unesite drugu lozinku!";}
}
?>




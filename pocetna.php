<?php
session_start();
$host="localhost";
$user="dostava";
$pass="12345";
$db="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$user,$pass,$db);
$k_lozinka=$_SESSION['k_lozinka'];
$k_ime = $_SESSION['k_ime'];


print "
    <ul>
        <li><p class='active'>Korisnik:$k_ime</p></li>
        <li class='odjava'><a href='prijava.php'>Odjava</a></form></li>
 </ul>
";


$upit="SELECT * FROM jelovnik";
$rez=mysqli_query($con,$upit);
if(mysqli_num_rows($rez)>0) {
    print"<form action='rezervacija1.php' method='POST'>";
    print "<table class='menu'>";
    print "<tr>
               . <td align='center' style='font-size: 20px'>NAZIV JELA</td>
                .<td align='center' style='font-size: 20px'>OPIS JELA</td>
                .<td align='center' style='font-size: 20px'>CENA JELA</td>
                .<td align='center' style='font-size: 20px'>*</td>
</tr>";}

    while ($row = mysqli_fetch_array($rez)) {
        $naziv_jela =$row['naziv_jela'];
        $opis_jela =$row['opis_jela'];
        $cena_jela =$row['cena_jela'];
        $sifra_jela =$row['sifra_jela'];
        print"<tr>
                 <td align='center' style='font-size: 30px'>$naziv_jela</td>
                <td align='center' style='font-size: 30px'>$opis_jela</td>
                <td align='center' style='font-size: 30px'>$cena_jela</td> 
                <td align='center' style='font-size: 30px'><input type='checkbox' name='sifra_jela[]' value='$sifra_jela' class='checkmark' id='checkmark'></td> 
                </tr>";


}

    print "</table>";
    print "<HR>";
    print"<center>
    <BR>
    <button type='submit' name='izaberi' value='izaberi'>Izaberi</button>
    </center></form>"

?>

<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="pocetna.css">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="nav_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <title>Dostava hrane</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


<div>
<?php
if(ISSET($_POST['*'])){
    if($rez>0){
        print"<BR>";
        print"<form action='rezervacija1.php' method='POST'>
                        <center><button type='submit' name='izaberii' value='izaberi'>Izaberi</button></center>
                    </form>";
    }
}
?>
</div>
</body>
</html>

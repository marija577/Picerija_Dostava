<?php
session_start();
$host="localhost";
$user="dostava";
$pass="12345";
$db="porucivanje_i_dostava_hrane";
$con = mysqli_connect($host,$user,$pass,$db);
$k_ime = $_SESSION['k_ime'];
$k_lozinka=$_SESSION['k_lozinka'];


$niz=array();

print "
    <ul>
        <li><p class='active'>Korisnik:$k_ime</p></li>
        <li class='odjava'><a href='prijava.php'>Odjava</a></form></li>
        <li class='nazad'><a href='pocetna.php'>Početna</a></li>

    </ul>
";

if(ISSET($_POST['sifra_jela'])) {
    foreach ($_POST['sifra_jela'] as $check) {
             array_push($niz, $check); }
    $_SESSION['$niz'] = $niz;
    $sifra_jela = join(",", $niz);
    $sifra_jela = mysqli_real_escape_string($con, $sifra_jela);
    $_SESSION['sifra_jela'] = $sifra_jela;
    $upit = "SELECT * FROM jelovnik WHERE sifra_jela IN ($sifra_jela) ";
    $rez = mysqli_query($con, $upit);

    if (mysqli_num_rows($rez) > 0) {
        print"<center><table class='menu'>"
            . "<tr>"
            . "<td><center><h4>Naziv jela</h4></center></td>"
            . "<td><center><h4>Cena</h4></center></td>"

            . "</tr>";

        while ($row = mysqli_fetch_array($rez)) {
            $naziv_jela = $row[0];
            $cena_jela = $row[1];
            $sifra_jela = $row[2];
            print"<tr>"
                . "<td>$naziv_jela</td>"
                . "<td>$cena_jela</td>"
                ."<td>$sifra_jela</td>"
                . "</tr>";}

    print"</table></center>";}}


        $ukupno=0;
        $ukupno=$ukupno+ $cena_jela;
        print "ukupno : ". $ukupno;


    $upit = "SELECT * FROM korisik_uplata WHERE k_lozinka='$k_lozinka'";
    $rez = mysqli_query($con, $upit);
    if (mysqli_num_rows($rez) > 0) {
        print "<br>";
        print"Imate dovoljno sredstava na računu";
        print "<form action='porudzbina1.php' method='POST'>
            <BR>
            <button type='submit' name='izaberi' value='izaberi'> Poruci </button>
            </form>";
        print"<form action='uplata.php' method='POST'>
            <BR>
            <button type='submit' name='izaberi' value='izaberi'> Uplati jos</button>
            </form>";
    }
    else {
        print "<br>";
        print "Nemate dovoljno sredstava na računu";
        print"<form action='uplata.php' method='POST'>
            <BR>
            <button type='submit' name='izaberi' value='izaberi'> Uplati </button>
            </form>";
    }

?>
<html>
<head>
    <title> PORUČI</title>
    <link rel="stylesheet" href="stil.css">
      <link rel="stylesheet" href="rez.css">
    <link rel="stylesheet" href="nav_bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
</head>
<body></body>
</html>

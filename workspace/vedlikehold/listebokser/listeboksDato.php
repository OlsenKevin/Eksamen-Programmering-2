<?php

include ("../../database/dbTilkobling.php");

$brukernavn=$_POST["brukernavn"];

$sqlSetning="SELECT * FROM timeinndeling WHERE brukernavn='$brukernavn' ORDER BY dato;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $dato=$rad["dato"];
    $start=$rad["start_tid"];
    $slutt=$rad["slutt_tid"];
    
    print ("<option value='$dato'>$dato, $start-$slutt </option>");
}

?>
<?php

include ("../../database/dbTilkobling.php");

$sqlSetning="SELECT * FROM timer_reservasjon WHERE brukernavn='$innloggetBruker';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg time</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $t_start=$rad["t_start"];
    $dato=$rad["dato"];
    
    print ("<option value='$t_start'>$dato - $t_start</option>");
}

?>
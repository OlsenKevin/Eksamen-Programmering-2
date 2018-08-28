<?php

include ("../../database/dbTilkobling.php");


$sqlSetning="SELECT *FROM arbeidsdag ORDER BY arbeids_id;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg kl. slett</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $arbeids_id=$rad["arbeids_id"];
    $start=$rad["start"];
    $slutt=$rad["slutt"];
    print ("<option value='$arbeids_id'>$start-$slutt </option>");
}

?>
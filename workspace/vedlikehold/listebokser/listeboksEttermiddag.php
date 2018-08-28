<?php

include ("../../database/dbTilkobling.php");

$sqlSetning="SELECT * FROM ettermiddag;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg kl. slett</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $time=$rad["time"];
    
    print ("<option value='$time'>$time</option>");
}

?>
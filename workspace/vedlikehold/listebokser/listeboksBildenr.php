<?php

include ("../../database/dbTilkobling.php");

$sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die("<div class='error'>Ikke mulig å hente fra database</div>");

print("<option></option>");

$antallRader=mysqli_num_rows($sqlResultat) ;
for ($r=1; $r<=$antallRader;$r++) {
    $rad=mysqli_fetch_array($sqlResultat);
    $bildenr=$rad["bildenr"];
    $filnavn=$rad["filnavn"];

    print("<option value='$bildenr'>$bildenr - $filnavn</option>");
}

?>

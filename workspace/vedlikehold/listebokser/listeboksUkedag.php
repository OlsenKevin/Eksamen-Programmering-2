<?php

include ("../../database/dbTilkobling.php");

$behandler=$_POST["behandler"];

$sqlSetning="SELECT * FROM arbeidsdag WHERE behandler_id='$behandler' ORDER BY ukedag;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg ukedag</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $ukedag=$rad["ukedag"];
    
    print ("<option value='$ukedag'>$ukedag</option>");
}

?>
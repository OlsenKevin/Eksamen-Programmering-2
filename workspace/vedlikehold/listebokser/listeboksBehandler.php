<?php

include ("../../database/dbTilkobling.php");

$sqlSetning="SELECT * FROM behandler ORDER BY behandler_id;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg Behandler</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $behandler_id=$rad["behandler_id"];
    $behandlernavn=$rad["behandlernavn"];
    
    print("<option value='$behandler_id'>$behandler_id - $behandlernavn</option>");
}

?>
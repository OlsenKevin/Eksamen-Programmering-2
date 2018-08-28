<?php

include ("../../database/dbTilkobling.php");

   $ukedag = $_POST["ukedag"];
   $behandler = $_POST["behandler"];

$sqlSetning="SELECT * FROM arbeidsdag WHERE behandler_id='$behandler' AND ukedag='$ukedag' ORDER BY start;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $arbeids_id=$rad["arbeids_id"];
    $start=$rad["start"];
    $slutt=$rad["slutt"];
    
    print("<option value='$arbeids_id'>$start - $slutt</option>");
}

?>
<?php

include ("../../database/dbTilkobling.php");


    $behandler = $_POST["behandler"];
    $ukedag = $_POST["ukedag"];

$sqlSetning="SELECT *
                FROM arbeidsdag AS a
                LEFT OUTER JOIN timer_reservasjon ON arbeids_id = time_id
                WHERE a.behandler_id='$behandler' AND a.ukedag='$ukedag'
                ORDER BY arbeids_id;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

print("<option>Velg kl. slett</option>");

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $arbeids_id=$rad["arbeids_id"];
    $time_id=$rad["time_id"];
    $start=$rad["start"];
    $slutt=$rad["slutt"];
    $status=$rad["status"];
    
    print ("<option value='$arbeids_id'>$start-$slutt - $status </option>");
}

?>
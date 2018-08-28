<?php

include ("../../database/dbTilkobling.php");

$sqlSetning="SELECT * FROM yrkesgruppe ORDER BY yrke_id;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1; $r<=$antallRader; $r++) {
    
    $rad=mysqli_fetch_array($sqlResultat);
    $yrke_id=$rad["yrke_id"];
    $yrke_navn=$rad["yrke_navn"];
    
    print ("<option value='$yrke_id'>$yrke_id - $yrke_navn</option>");
}

?>
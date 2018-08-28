
<?php
  include ("../../database/dbTilkobling.php");

$riktigYrkesgruppe=$_POST["yrkesgruppe"];

$sqlSetning="SELECT * FROM behandler WHERE yrke_id = '$riktigYrkesgruppe'  ORDER BY behandler_id;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1; $r<=$antallRader; $r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $behandler_id=$rad["behandler_id"];
    $behandlernavn=$rad["behandlernavn"];
    $yrke_id=$rad["yrke_id"];
    $bildenr=$rad["bildenr"];

    print ("
<tr>
    <td>$behandler_id</td>
    <td>$behandlernavn</td>
    <td>$yrke_id</td>
    <td>$bildenr</td>
    <td><input type='checkbox' name='sjekk[]' value='$behandler_id'/></td>
</tr>
    ");
}

?>
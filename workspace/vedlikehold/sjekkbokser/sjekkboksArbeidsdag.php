

<?php
  include ("../../database/dbTilkobling.php");

$riktigUkedag=$_POST["behandler"];

$sqlSetning="SELECT * FROM arbeidsdag WHERE behandler_id = '$riktigUkedag'  ORDER BY ukedag;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente fra database");
$antallRader=mysqli_num_rows($sqlResultat);

for ($r=1; $r<=$antallRader; $r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $behandler_id=$rad["behandler_id"];
    $ukedag=$rad["ukedag"];

    print ("
<tr>
    <td>$behandler_id</td>
    <td>$ukedag</td>
 
    <td><input type='checkbox' name='sjekk[]' value='$ukedag'/></td>
</tr>
    ");
}

?>
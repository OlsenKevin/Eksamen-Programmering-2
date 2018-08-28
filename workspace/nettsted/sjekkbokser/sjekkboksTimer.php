<?php
include ("../../database/dbTilkobling.php");

$riktigTime = $_POST["reservasjon"];
$sqlSetning = "SELECT * FROM timer_reservasjon WHERE brukernavn='$innloggetBruker';";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("<div class='error'>ikke mulig å henta data fra databasen</div>");
$antallRader = mysqli_num_rows($sqlResultat);

for ($r = 1; $r <= $antallRader; $r++) {
	$rad = mysqli_fetch_array($sqlResultat);
	$reservasjon_id = $rad["reservasjon_id"];
	$brukernavn = $rad["brukernavn"];
	$behandler_id = $rad["behandler_id"];
	$dato = $rad["dato"];
	$dato = $rad["t_start"];
	print ("
<tr>
            <td> $reservasjon_id </td> 
            <td> $brukernavn </a> </td> 
            <td> $behandler_id </td> 
            <td> $dato </td>  
           <td> $dato </td> 
 
    <td><input type='checkbox' name='sjekk[]' value='$reservasjon_id'/></td>
  
</tr>


    ");
}

?>


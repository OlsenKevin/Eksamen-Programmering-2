
<?php
include ("../../database/dbTilkobling.php");

include ("../system/session2.php");

?>

<div class = "box">
        <div class = "box-top">
            <h3>Slette Timebestilling </h3>
        </div>
        <div class = "box-pane">
 <form method="post">
    <table>
            <tbody>
                <tr>
        <th>Reservasjons ID</th> 
        <th>Brukernavn</th> 
        <th>Behandler ID</th> 
        <th>Dato</th>
        <th>Time start</th>
        <th>Mark&oslashr</th>
                </tr>
                
        <?php
include ("../sjekkbokser/sjekkboksTimer.php");
 ?>
        </tbody>
        </table>
        <input type="submit" value="Slett" id="slett" name="slett"/>
<br>
     
        </form>

    
    
<?php
@$slettKnapp = $_POST["slett"];

if ($slettKnapp) {
	$sjekk = $_POST["sjekk"];
	$antall = count($sjekk);
	if ($antall == 0) {
		print ("<div class='error'>Ingen timer er valgt</div>");
	}
	else {
		for ($r = 0; $r < $antall; $r++) {
			$sqlSetning = "DELETE FROM timer_reservasjon WHERE reservasjon_id='$sjekk[$r]';";
			mysqli_query($db, $sqlSetning) or die("<div class='error'>Ikke mulig å slette i database</div>");
		}

		print ("<div class='msg'>Valgte timer er slettet</div>");
	}
}

?>

</div>
</div>
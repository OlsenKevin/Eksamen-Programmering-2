<?php
    include ("../../database/dbTilkobling.php");
    include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class = "box">
	<div class = "box-top">
<h3>Registrer bilde</h3>
	</div>
	<div class = "box-pane">
<form method="post" action="" enctype="multipart/form-data" name="registrerBildeSkjema" id="form" onsubmit = "return omFormTom()">
    
    
    <label for="beskrivelse">Beskrivelse</label>
    <input type="text" id="beskrivelse" name="beskrivelse" ><br/>
    
    <label for="fil">Bilde</label>
    <input type="file" id="fil" name="fil" size="60" ><br/>
    
    <input type="submit" name="fortsett" id="fortsett" value="Last opp bilde"/>
    <input type="reset" name="nullstill" id="nullstill" value="Nullstill"/> <br/>
</form>

<div id = "error"></div>

<?php

if ($_POST) {
	$beskrivelse = $_POST["beskrivelse"];
	$filnavn = $_FILES["fil"]["name"];
	$filtype = $_FILES["fil"]["type"];
	$filstorrelse = $_FILES["fil"]["size"];
	$tmpnavn = $_FILES["fil"]["tmp_name"];
	$nyttnavn = "D:\\Sites\\home.hbv.no\\phptemp\\web-prg11v06/" . $filnavn;
	$date = date("Y-m-d H:i:s");
	
	if (!$beskrivelse || !$filnavn) {
		print ("Alle felt må fylles ut og bilde må velges");
	}
	else {
		
		if ($filtype != "image/gif" && $filtype != "image/jpeg" && $filtype != "image/png") {
			print ("Det er kun tillat &aring laste opp bilder med png/jpeg/gif format");
		}
		else
		
		if ($filstorrelse > 50000000) {
			print ("Bildet er for stort til å kunne lastes opp");
		}
		else {
			$sqlSetning = "SELECT * FROM bilde WHERE filnavn='$filnavn';";
			$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring hente data fra databasen");
			$antallRader = mysqli_num_rows($sqlResultat);
			
			if ($antallRader != 0) {
				print ("Bildet er registrert fra f&oslashr");
			}
			else {
				move_uploaded_file($tmpnavn, $nyttnavn) or die("Ikke mulig &aring laste opp fil");
				$sqlSetning = "INSERT INTO bilde (bildenr,filnavn,opplastningsdato,beskrivelse) VALUES ('$bildenr','$filnavn','$date','$beskrivelse');";
				mysqli_query($db, $sqlSetning) or die("ikke mulig å registrere data i databasen");
				
				print ("F&oslashlgende bilde er n&aring registrert: <br/> beskrivelse: $beskrivelse <br/>");
			}
		}
	}

	//   include("footer.php");

}

?>
</div>
</div>
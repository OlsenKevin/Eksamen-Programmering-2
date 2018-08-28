<?php
    include ("../../database/dbTilkobling.php");
    include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class="box">
   <div class="box-top">
      <h3>Registrer behandler</h3>
   </div>
   <div class="box-pane">
      <form method="post" id="form" name="registreransatt" onsubmit = "return omFormTom()">
       
         <label for="behandlernavn">Behandlernavn</label> 
         <input type="text" id="behandlernavn"  name="behandlernavn" class = "test"/>
         </br>
         <label for="yrkesgruppe">Yrkesgruppe</label> 
         <select id="yrkesgruppe" name="yrkesgruppe" class = "test">
            <option></option>
            <?php include ("../listebokser/listeboksYrkesgruppe.php"); ?>
         </select>
         </br>
         
         <label for="bildenr">Bilde</label> 
         <select name="bildenr" id="bildenr" value="bildenr" class = "test"> 
            <?php include ("../listebokser/listeboksBildenr.php"); ?>
         </select>
         </br>
         <input type="submit" name="fortsett" value="Registrer" />
          <input type="reset" name="nullstill" value="Nullstill" /> <br/>
      </form>
      <div id = "error"></div>

<?php
if (isset($_POST["fortsett"]))
   {

	$behandlernavn = $_POST["behandlernavn"];
	$yrkesgruppe = $_POST["yrkesgruppe"];
	$bildenr = $_POST["bildenr"];
	
	
	
		if (!$behandlernavn ||  !$yrkesgruppe || !$bildenr) {
		print ("<div class='error'>Alle felt m&aring fylles ut</div>");
	}
	        else {
       		    
			$sqlSetning = "SELECT * FROM behandler WHERE bildenr='$bildenr';";
			$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring hente data fra databasen");
			$antallRader = mysqli_num_rows($sqlResultat);
			
			if ($antallRader != 0) {
				print ("<div class = 'error'>Bilde er registrert fra f&oslashr</div>");
			}
       		   
	

	
	
	else {
		$sqlSetning = "INSERT INTO behandler (behandlernavn, yrke_id, bildenr) VALUES ('$behandlernavn', '$yrkesgruppe','$bildenr');";
		mysqli_query($db, $sqlSetning) or die("<div class='msg'>Ikke mulig &aring registrere til database:</div>");
		print ("<div class='msg'>F&oslashlgende behandler er n&aring registrert: $behandlernavn </div>");
	}
}
}
?>
</div>
</div>
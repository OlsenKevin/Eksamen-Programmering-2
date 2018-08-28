<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class = "box">
	<div class = "box-top">
<h3>Registrer Time</h3>
</div>
<div class = "box-pane">
<form method="post" id="form" onsubmit = "return omFormTom()">
    
    <label for="brukernavn">Behandler</label>
    <select id="brukernavn" name="brukernavn">
        <option></option>
        <?php include ("../listebokser/listeboksBehandler.php") ?>
    </select>
    </br>
    
    Dato <input type="text" name="dato" id="dato"/>
    </br>
    
    Start <input type="text" name="start" id="slutt"/>
    </br>
    
    Slutt <input type="text" name="slutt" id="slutt"/>
    </br>
    
    
    
    <input type="submit" value="Registrer" id="registrer" name="registrer"/>
    </br>
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/>
</form>

<div id = "error"></div>

<?php

if (isset($_POST["registrer"]))
   {
    
    $brukernavn=$_POST["brukernavn"];
    $dato=$_POST["dato"];
    $start=$_POST["start"];
    $slutt=$_POST["slutt"];
    
    if (!$brukernavn || !$dato || !$start || !$slutt) {
        
        print ("<div class='error'>Alle felt må fylles ut</div>");
    }
    
    else {
        
        $sqlSetning ="INSERT INTO timeinndeling VALUES ('$brukernavn' , '$dato' , '$start' , '$slutt');";
        mysqli_query($db, $sqlSetning) or die ("<div class='error'>Kan ikke registrere til database</div>");
        
        print ("<div class='msg'>Timen $dato $start $slutt hos behandler $brukernavn er nå registrert</div>");
        
    }
    
    
    
}


?>
</div>
</div>
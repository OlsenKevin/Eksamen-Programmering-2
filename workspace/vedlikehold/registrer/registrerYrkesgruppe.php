<?php
    include ("../../database/dbTilkobling.php");
    include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>


<div class="box">
    <div class="box-top">
<h3>Registrer Yrkesgruppe</h3>
</div>
<div class="box-pane">
<form method="post" id="form" name="registreryrkesgrupper" onsubmit = "return omFormTom()">
   
    <label for="yrkesgruppe">Yrkesgruppe</label> 
    <input type="text" id="yrkesgruppe" name="yrkesgruppe"/><br>

    <input type="submit" value="Registrer" id="registrer" name="registrer"/>
</form>
<div id = "error"></div>

<?php
if (isset($_POST["registrer"]))
   {
    $yrkesgruppe = $_POST["yrkesgruppe"];
    
    if (!$yrkesgruppe) {
        print("<div class='error'>Feltet m&aring fylles ut</div>");
    }
    else {
        $sqlSetning = "INSERT INTO yrkesgruppe (yrke_navn) VALUES ('$yrkesgruppe');";
        mysqli_query($db, $sqlSetning) or die("<div class='error'>Ikke mulig &aring registrere til database:</div>");
        
        print("<div class='msg'>F&oslashlgende yrkesgruppe er n&aring registrert: $yrkesgruppe</div>");
    }
}
?>
<br>
</div>
</div>
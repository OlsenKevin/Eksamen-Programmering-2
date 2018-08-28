<?php
    include ("../../database/dbTilkobling.php");
 include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class = "box">
    <div class = "box-top">
 <h3>Endre Bilde</h3>
 </div>
<div class = "box-pane">
     <form method="post" action="" name="finnBildeSkjema" id="form" onsubmit = "return omFormTom()" >
         <label for="bildenr">Bilde</label>
         <select name="bildenr" id="bilde">
             <?php include("../listebokser/listeboksBildenr.php"); ?>
         </select><br>
         <input type="submit" name="velgBilde" id="velgBilde" value="Fortsett"/>
     </form>
 <div id = "error"></div>


<?php
    if (isset($_POST["velgBilde"]))
    {
    
    $bildenr=$_POST ["bildenr"];
    $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die("<div class='error'>Ikke mulig &aring hente data fra databasen</div>");
    $antallRader=mysqli_num_rows($sqlResultat) ;

    if ($antallRader==0) {
        print("<div class='error'>Angitt bilde er ikke registrert</div> <br/>");
    }
    else {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];
        $beskrivelse=$rad["beskrivelse"];


        print("
        <form method='post' action='' id='endreKlasseSkjema' name='endreKlasseSkjema' onSubmit='return validering2()'>
            <label for='bildenr'>Bildenr</label>
            <input type='text' value='$bildenr' name='bildenr' id='bildenr' readonly /> <br/>
            <label for='filnavn'>Filnavn</label> 
            <input type='text' value='$filnavn' name='filnavn' id='filnavn' readonly  /> <br/>
            <label for='beskrivelse'>Beskrivelse</label> 
            <input type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse' required  /> <br/>
            <input type='submit' value='Endre' name='endreBilde' id='endreBilde' onClick='fjernMelding()'  /> <br/>
        </form>");
    }
}

if (isset($_POST["endreBilde"]))
    {
    
    $filnavn=$_POST ["filnavn"];
    $bildenr=$_POST ["bildenr"];
    $beskrivelse=$_POST ["beskrivelse"];
    
    
    if (!$filnavn || !$bildenr || !$beskrivelse) {
        print("<div class='error'>Alle felt m&aring fyllet ut</div>");
    }
    else {
        $sqlSetning="UPDATE bilde SET filnavn='$filnavn' , bildenr='$bildenr' , beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
        mysqli_query($db, $sqlSetning) or die("<div class='error'>Ikke mulig &aring endre data i databasen</div>");

        print("<div class='msg'>Bilde med bildenr $bildenr og filnavn $filnavn er n&aring endret</div> <br/>");
    }
}
//include("slutt.html");
?>
</div>
</div>


<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");
?>


<script src="../../js/main.js"></script>

<div class = "box">
<div class = "box-top">
<h3>Slett bilde</h3>
</div>
<div class = "box-pane">
 <form method="post" action="" id="slettBildeSkjema" name="slettBildeSkjema" onSubmit="return bekreft()" >
     <label for="bildenr">Bilde</label>
     <select name='bildenr' id='bildenr' value="bildenr">
         <?php include("../listebokser/listeboksBildenr.php"); ?>
     </select> <br>
     <input type="submit" value="Slett" name="slettBilde" id="slettBilde" />
 </form>

<?php
if (isset($_POST["slettBilde"]))
   {
        $bildenr=$_POST['bildenr'];
      
        if (!$bildenr){
            print ("<div class='error'>Det er ikke mulig &aring slette et bilde som ikke finnes.</div>");
        }
        else {
            
            $sqlSetning="SELECT filnavn FROM bilde WHERE bildenr='$bildenr';";
            $sqlResultat=mysqli_query($db, $sqlSetning) or die("<div class='error'>ikke mulig &aring slette data i databasen</div>");
            
            $rad=mysqli_fetch_array($sqlResultat);
            $filnavn=$rad["filnavn"];
            
            $sqlSetning="DELETE FROM bilde WHERE bildenr='$bildenr';";
            mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig &aring slette bilde som tilh&oslashrer en behandler.</div>");
            
            $mappenavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg11v06/" .$filnavn;
            unlink($mappenavn) or die ("<div class='error'>ikke mulig &aring slette bilde p&aring serveren</div>");
            
            print("<div class='msg'>F&oslashlgende bilde med bildenr: ". $bildenr . " og filnavn: " . $filnavn . " er n&aring slettet</div> <br/>");
        }
}

?>
</div>
</div>
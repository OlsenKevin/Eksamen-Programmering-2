<?php
    include ("../../database/dbTilkobling.php");
 include ("../system/session2.php");
?>



<script src="../../js/main.js"></script>

<div class = "box">
        <div class = "box-top">
            <h3>Slette arbeidsdag</h3>
        </div>
        <div class = "box-pane">
            <form method="post">
                <label for="behandler">Behandler</label> 
                <select id="behandler" name="behandler" >
                    <?php include ("../listebokser/listeboksBehandler.php") ?> 
                </select>
                <br>
                <input type="submit" value="Fortsett" id="velgBehandler" name="velgBehandler"/>
                
<?php
    if (isset($_POST["velgBehandler"]))
    {
    
    $behandler=$_POST["behandler"];
    
     print('
       
        </br>');?>
        <table>
            <tbody>
                <tr>
                    <th>behandler_id</th>
                    <th>ukedag</th>
                    <th>Mark&oslashr</th>
                </tr>
        <?php
                
        include ("../sjekkbokser/sjekkboksArbeidsdag.php");

        print ("
        </tbody>
        </table>

        <input type='submit' value='Slett' id='slett' name='slett'/>
        
        <input type='text' value='$behandler' name='behandler' id='hidden'>
       ");
    }


if (isset($_POST["slett"])) {
    
    $behandler=$_POST["behandler"];
    $sjekk=$_POST["sjekk"];
    $antall=count($sjekk);
    

    if ($antall==0){
        print ("<div class='error'>Ingen arbeidsdager er valgt</div>");
    }
     else{
         
        for ($r=0; $r<$antall; $r++) {
            $sqlSetning="DELETE FROM arbeidsdag WHERE behandler_id='$behandler' AND ukedag='$sjekk[$r]';";
         
            mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å slette i database</div>");
        }
        print ("<div class='msg'>Valgte ukedager er slettet</div> ");
    }

}

?>
</form>
</div>
</div>
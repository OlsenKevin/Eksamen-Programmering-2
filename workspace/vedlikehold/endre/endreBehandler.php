<?php
    include ("../../database/dbTilkobling.php");
 include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

    <div class = "box">
        <div class = "box-top">
            <h3>Endre Behandler</h3>
        </div>
        <div class = "box-pane">
            <form method="post" id="form" onsubmit = "return omFormTom()">
                <label for="behandler">Behandler</label> 
                <select id="behandler" name="behandler" value="<?php echo $behandler; ?>">
                    <?php include ("../listebokser/listeboksBehandler.php") ?> 
                </select>
                <br>
                <input type="submit" value="Fortsett" id="velgBehandler" name="velgBehandler"/>
                
            
        


<?php
if (isset($_POST["velgBehandler"]) && ($_POST['behandler'] == 'Velg Behandler') ) {
    
    print '<div id = "error">Venligst velg en behandler</div>';
    
} elseif (isset($_POST["velgBehandler"])) {

    $behandler=$_POST["behandler"];
    $sqlSetning="SELECT * FROM behandler WHERE behandler_id='$behandler';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
    $rad=mysqli_fetch_array($sqlResultat);
    
    $behandler_id=$rad["behandler_id"];
    $behandlernavn=$rad["behandlernavn"];
    $yrke_id=$rad["yrke_id"];
    $bildenr=$rad["bildenr"];
    
?>    
           <br><br>
            
                <label for="$bid">Behandler ID</label>
                <input type='text' id='bid' name='bid' value='<?php echo $behandler_id; ?>' readonly/>
                <br/><br/>
                <label for="bnavn">Behandlernavn</label>
                <input type='text' id='bnavn' name='bnavn' value='<?php echo $behandlernavn; ?>' />
                <br/><br/>
                <label for="ygruppe">Yrkesgruppe</label>
                <select id='ygruppe' name='ygruppe' required>
                    <option> <?php echo $yrke_id ?> </option>
                    <?php include ('../listebokser/listeboksYrkesgruppe.php'); ?>
                </select>
                <br/><br/>
                 <label for="bnr">Bildenr</label>
                 <select id='bnr' name='bnr' required>
                    <option><?php echo  $bildenr ?> </option>
                    
                    <?php include ('../listebokser/listeboksBildenr.php'); ?>
                </select>
                <br/><br/>
                <input type='reset' value='Nullstill' id='nullstill' name='nullstill'/>
                <input type='submit' value='Endre' id='endreBehandler' name='endreBehandler'/>
            </form>
            <br>
    
<?php 
       
   }
        
    if (isset($_POST["endreBehandler"])) {
        
        $bid=$_POST["bid"];
        $bnavn=$_POST["bnavn"];
        $ygruppe=$_POST["ygruppe"];
        $bnr=$_POST["bnr"];
        
        if (!$bid || !$bnavn || !$ygruppe || !$bnr)
        {
            print("<div class = 'error'>Alle verdiene må fylles ut</div>");
        }
        
        else {
       		    
			$sqlSetning = "SELECT * FROM behandler WHERE bildenr='$bnr';";
			$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring hente data fra databasen");
			$antallRader = mysqli_num_rows($sqlResultat);
			
			if ($antallRader != 0) {
				print ("<div class = 'error'>Bilde er registrert fra f&oslashr</div>");
			}
        
        
        
        
        
        else{
            
            $sqlSetning="UPDATE behandler SET behandlernavn='$bnavn', yrke_id='$ygruppe', bildenr='$bnr' WHERE behandler_id='$bid';";
            mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å endre i database</div>");

            print ("<div class='msg'>Behandler med bruker: $bid er endret</div>");
        }
    }
    }
?>
            <div id = "error"></div>
        </div>
    </div>


















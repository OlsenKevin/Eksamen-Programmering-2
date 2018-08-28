<?php
    include ("../../database/dbTilkobling.php");
   include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class ="box">
    <div class ="box-top">
<h3>Registrer arbeidsdag</h3>
    </div>
    <div class ="box-pane">
<form method="post" id="form" name="registrerarbeidsdag" onsubmit = "return omFormTom()">


    <label for="behandler">Behandler</label>
                <select id="behandler" name="behandler" value="<?php echo $behandler;?>" >
                    <?php include ("../listebokser/listeboksBehandler.php") ?>
                </select> 
                </br>


    <h5>Ukedag</h5>
    <label for="ukedag[]">Mandag </label>
    <input type="checkbox" name="ukedag[]" value="mandag"></br>
    <label for="ukedag[]">Tirsdag </label>
    <input type="checkbox" name="ukedag[]" value="tirsdag"></br>
    <label for="ukedag[]">Onsdag </label>
    <input type="checkbox" name="ukedag[]" value="onsdag"></br>
    <label for="ukedag[]">Torsdag </label>
    <input type="checkbox" name="ukedag[]" value="torsdag"></br> 
    <label for="ukedag[]">Fredag </label>
    <input type="checkbox" name="ukedag[]" value="fredag"></br>


    <label for="timestart">Formiddag start</label> 
                <select id="f_start" name="f_start" value="<?php echo $time; ?>">
                    <?php include ("../listebokser/listeboksTime.php") ?> 
                </select> 
                </br>
                
    <label for="timeslutt">Formiddag slutt</label> 
                <select id="f_slutt" name="f_slutt" value="<?php echo $time; ?>">
                    <?php include ("../listebokser/listeboksTime.php") ?> 
                </select> 
                </br>            
            
    <label for="timestart">Ettermiddag start</label> 
                <select id="e_start" name="e_start" value="<?php echo $time; ?>">
                    <?php include ("../listebokser/listeboksEttermiddag.php") ?> 
                </select> 
                </br>
                
    <label for="timeslutt">Ettermiddag slutt</label> 
                <select id="e_slutt" name="e_slutt" value="<?php echo $time; ?>">
                    <?php include ("../listebokser/listeboksEttermiddag.php") ?> 
                </select> 
                </br>   
            
            
            

    <input type="submit" value="Registrer" name="registrer" id="registrer"/>
    <input type="reset" value="Nullstill" name="nullstill" id="nullstill"/>
</form>



<?php

if (isset($_POST["registrer"]))
   {
       $behandler=$_POST["behandler"];
       $checkBox=$_POST["ukedag"];
       
       $f_start=$_POST["f_start"];
       $f_slutt=$_POST["f_slutt"];
       $e_start=$_POST["e_start"];
       $e_slutt=$_POST["e_slutt"];
   

       if (!$behandler || !$checkBox || !$f_start || !$f_slutt || !$e_start || !$e_slutt ) {
           print ("<div class = 'error'>Det m&aring velges minst en checkbox. <br> I tilleg m&aring behandler, start- og slutt-kl.slett fylles ut.</div>");
       }
       
       		else {
       		    for($i = 0; $i < count($checkBox); $i++) {
			$sqlSetning = "SELECT * FROM arbeidsdag WHERE behandler_id='$behandler' AND ukedag='$checkBox[$i]';";
	      
			$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring hente data fra databasen");
			$antallRader = mysqli_num_rows($sqlResultat);
			
       		    }
			if ($antallRader != 0) {
				print ("Arbeidsdag og arbeidstid er registrert fra f&oslashr");
			}
       		    
       		
            
       else {
           for($i = 0; $i < count($checkBox); $i++)
           {
           $sqlSetning="INSERT INTO arbeidsdag (behandler_id, ukedag, f_start, f_slutt, e_start, e_slutt )
           VALUES ('$behandler', '$checkBox[$i]', '$f_start', '$f_slutt', '$e_start', '$e_slutt');";
      
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere til database:");
            
           }
           
           $behandler=$_POST["behandler"];
            print ("</br>Arbeidsdager for bruker: $behandler er nå registrert");
       }
       
       
       
       		}
       
       
       
   }

?>
<div id = "error"></div>
</div>
</div>
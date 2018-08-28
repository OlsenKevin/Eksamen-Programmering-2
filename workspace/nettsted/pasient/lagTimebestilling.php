

<?php
 include ("../../database/dbTilkobling.php");
 include ("../system/session2.php");
 include ("../../js/kalender.php");
 
    //
    // Velg dato fra en datepicker
    // få en oversikt over ledige timer den datoen
    // velg hvilken tid du vil bestille tid
    //

    // må velge en dato som den behandleren jobber.
?>
 
<div class="box">
    <div class="box-top">
        <h3>Bestille Time</h3>
    </div>
    <div class="box-pane">
        <form method="post">
            <label for="behandler_id">Behandler</label>
            <select id="behandler" name="behandler_id">
                <option></option>
                <?php include ( "../../vedlikehold/listebokser/listeboksBehandler.php") ?>
            </select>
            <br><br>
            <label for="datepicker">Dato</label>
            <input type="datepicker" name="dato" id="datepicker" placeholder="klikk her for kalender" />
            <br>

            <br>
            <label for="time">Velg time</label>
            <select id="velg_time" name="time">
                <option>Velg Time</option>
                <?php include ( "../../vedlikehold/listebokser/listeboksEFtime.php") ?>
            </select>
            <br>
            <input type='submit' value='Fortsett' id='fortsett' name='fortsett' />
            </br>

<?php

    // dato er valgt og er 14.06.2017

    // nå må det velges time.

    // finn ut hvilken ukedag datoen er på.
    $dato = $_POST['dato'];
    
    $ukedag = '';
    
    function ukedag($dato){
        $dag = date('D', strtotime($dato));
        
        if ($dag == "Mon") {
            global $ukedag;
            $ukedag = 'mandag';
            //return $ukedag;
        } elseif ($dag == "Tue") {
            global $ukedag;
            $ukedag = 'tirsdag';
            //return $ukedag;
        } elseif ($dag == "Wed") {
            global $ukedag;
            $ukedag = 'onsdag';
            //return $ukedag;
        } elseif ($dag == "Thu") {
            global $ukedag;
            $ukedag = 'torsdag';
            //return $ukedag;
        } elseif ($dag == "Fri") {
            global $ukedag;
            $ukedag = 'fredag';
            //return $ukedag;
        } elseif ($dag == "Sat") {
            global $ukedag;
            $ukedag = 'lørdag';
            //return $ukedag;
        } elseif ($dag == "Sun") {
            global $ukedag;
            $ukedag = 'søndag';
            //return $ukedag;
        }
    }
    
    
    $behandler_id  = $_POST["behandler_id"];
    // gir åå, mm, dd
    //$dato = "14.06.17";
    $valgtTime  = $_POST['time'];
    
    
    if (isset($_POST["fortsett"])) {
    print $dag;
        
        if (!$behandler_id || !$dato || !$valgtTime) {

            print ("<div class='error'>Alle felt må fylles ut</div>");

        } else {
	    
	    ukedag($dato);
	    
	    $sqlQ1 = "SELECT * FROM arbeidsdag WHERE behandler_id ='$behandler_id' AND ukedag='$ukedag';";	
	    
		$sqlR1 = mysqli_query($db, $sqlQ1) or die('<div class ="error">Ingen kontakt med databasen.</div>');
		$antallR1 = mysqli_num_rows($sqlR1);

        
        $rad          = mysqli_fetch_array($sqlR1);
        //$behandler    = $rad["behandlernavn"];
        //$ukedag       = $rad["ukedag"];
        $f_start      = $rad["f_start"];
        $f_slutt      = $rad["f_slutt"];
        $e_start      = $rad["e_start"];
        $e_slutt      = $rad["e_slutt"];
                
    	if ($antallR1 == 0) { // sjekker om dagen finnes i databasen.
    		print '<div class = "error">Behandleren med id: ' . $behandler_id . ' jobber ikke på ' . $ukedag . '</div>';
    		return false;
    	}

            if (($valgtTime >= $f_start && $valgtTime < $f_slutt) ||
            ($valgtTime >= $e_start && $valgtTime < $e_slutt)) {
                
                $sqlSetning = "SELECT * FROM timer_reservasjon WHERE dato='$dato' AND t_start = '$valgtTime';";
                $sqlResultat = mysqli_query($db, $sqlSetning) or die("<div class = 'error'>Ikke mulig å hente data fradatabasen</div>");
                $antallRader = mysqli_num_rows($sqlResultat);
    
                if ($antallRader != 0) {
                    print ("<div class = 'error'>Timen er opptatt </div>");
                } else {
    
                    $sqlSetning ="INSERT INTO timer_reservasjon (brukernavn, behandler_id, dato, t_start) 
                    VALUES ('$innloggetBruker','$behandler_id','$dato','$valgtTime');";
                    mysqli_query($db, $sqlSetning) or die ("<div class='error'>Kan ikke registrere til database</div>");
    
                    print ("<div class='msg'>Timen $ukedag kl $valgtTime hos behandler $behandler_id er nå registrert</div>");
                    
                }
    
            } else {
                print '<div class = "error">Velg en tid som korresponderer med behandles arbeidstid.</div>';
                
            } 
        }
    }
?>
    </form>
 </div>
 </div>

    <div class = "card">
        <div class = "box-top">
    <h4>Behandlers Arbeidsdager</h4>    
    </div>
    <div class = "box-pane">
        <form method="post">
        <label for="behandler_id">Velg Behandler</label><br>
        <select id="behandler" name="behandler_id">
            <option></option>
            <?php include ( "../../vedlikehold/listebokser/listeboksBehandler.php") ?>
        </select>
        <br>
        <input type="submit" name="submit" value="Velg Behandler"/>
        <br>
        <?php
            if (isset($_POST['submit'])){
                
            $behandler_id = $_POST['behandler_id'];
            
            $sqlQ1 = "SELECT * FROM arbeidsdag WHERE behandler_id ='$behandler_id'";	
	    
		    $sqlR1 = mysqli_query($db, $sqlQ1) or die('<div class ="error">Ingen kontakt med databasen.</div>');
		    $antallR1 = mysqli_num_rows($sqlR1);;
        ?>
            <table>
        <?php   

                for ($i=0; $i < $antallR1; $i++){
                
                    $rad          = mysqli_fetch_array($sqlR1);
                    $behandler_id2 = $rad["behandler_id"];
                    $ukedag2       = $rad["ukedag"];
                    $f_start2      = $rad["f_start"];
                    $f_slutt2     = $rad["f_slutt"];
                    $e_start2      = $rad["e_start"];
                    $e_slutt2      = $rad["e_slutt"];
                
                    print "
                    <tr><th>$ukedag2</th></tr>
                    <tr><td>Formiddag fra<br>Kl $f_start2 - $f_slutt2</td></tr>
                    <tr><td>Ettermiddag fra<br>Kl $e_start2 - $e_slutt2</td></tr>
                    
                    ";
                    
                
                }
            }
        ?>
            </table>
        </form>
    </div>
    </div>


 <?php include('../../inc/footerNettsted.php'); ?>
 

<?php
    include ("../../database/dbTilkobling.php");
    include ("../system/session2.php");
    include ("../../js/kalender.php");
?>


<div class = "box">
    <div class = "box-top">
<h3>Endre time</h3>

</div>
<div class = "box-pane">
    
<form method="post" id="form" onsubmit = "return omFormTom()">
    <label for="time">Mine Timer</label>
    <select id="time" name="time">
        <?php include ("../../vedlikehold/listebokser/listeboksRegTimer.php") ?> 
    </select>

    <br><br>

            <label for="behandler_id">Behandler</label>
            <select id="behandler" name="behandler_id">
                <option></option>
                <?php include ( "../../vedlikehold/listebokser/listeboksBehandler.php") ?>
            </select>
            <br>
            <label for="datepicker">Dato</label>
            <input type="datepicker" name="dato" id="datepicker" placeholder="klikk her for kalender" />
            <br>

            <br>
            <label for="time">Velg time</label>
            <select id="velg_time" name="nytime">
                <option>Velg Time</option>
                <?php include ("../../vedlikehold/listebokser/listeboksEFtime.php") ?>
            </select>
            <br>
            <input type='submit' value='Endre' id='endre' name='endre' />
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
    
    $valgtTime=$_POST["time"];
    $behandler_id  = $_POST["behandler_id"];
    // gir åå, mm, dd
    //$dato = "14.06.17";
    $nyTime  = $_POST['nytime'];
    
    
    if (isset($_POST["endre"])) {
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
                
                $sqlSetning = "SELECT * FROM timer_reservasjon WHERE dato='$dato' AND t_start = '$nyTime';";
                $sqlResultat = mysqli_query($db, $sqlSetning) or die("<div class = 'error'>Ikke mulig å hente data fradatabasen</div>");
                $antallRader = mysqli_num_rows($sqlResultat);
    
                 if ($antallRader != 0) {
                    print ("<div class = 'error'>Timen er opptatt </div>");
                } else {
    
                    $sqlSetning ="UPDATE timer_reservasjon SET behandler_id='$behandler_id', dato='$dato', t_start='$nyTime'
                    WHERE t_start='$valgtTime';";
                    mysqli_query($db, $sqlSetning) or die ("<div class='error'>Kan ikke registrere til database</div>");
    
                    print ("<div class='msg'>Timen $ukedag kl $valgtTime hos behandler $behandler_id er nå endret</div>");
                    
                }
    
            } else {
                print '<div class = "error">Velg en tid som korresponderer med behandles arbeidstid.</div>';
                
            } 
        }
    }
?>
    </div>
</div>
 <?php include('../../inc/footerNettsted.php'); ?>
 
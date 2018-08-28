<?php
    include ("../../database/dbTilkobling.php");
    include ("../system/session2.php");
?>


<div class = "box">
    <div class = "box-top">
<h3>Endre time</h3>
</div>
<div class = "box-pane">
<form method="post id="form" onsubmit = "return omFormTom()"">
    
      <label for="brukernavn">Brukernavn</label>
      <select id="brukernavn" name="brukernavn">
        <option></option>
        <?php include ("../listebokser/listeboksUkedag.php") ?>
    </select>
    
    <br><input type="submit" value="Velg behandler" id="velgBehandler" name="velgBehandler"/>
</form>


<?php
if (isset($_POST["velgBehandler"]))
   {
    
    print (" <form method='post'>
    Dato <select name='dato' id='dato'>");
    include ("../listebokser/listeboksDato.php");
    print ("
    </select>
    </br>
    <input type='submit' value='Velg dato' id='velgDato' name='velgDato' />
    </form>
    ");
    
}

if (isset($_POST["velgDato"]))
   {
    
    $dato=$_POST["dato"];
    $sqlSetning="SELECT * FROM timeinndeling WHERE dato='$dato';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra database</div>");
    $rad=mysqli_fetch_array($sqlResultat);
    $brukernavn=$rad["brukernavn"];
    $dato=$rad["dato"];
    $start=$rad["start_tid"];
    $slutt=$rad["slutt_tid"];
    
    print ("<form method='post'>
    <label for='brukernavn'></label>Brukernavn 
    <input type='text' name='brukernavn' id='brukernavn' value='$brukernavn' readonly />
    </br>
    <label for='dato'>Dato</label>
    <input type='text' name='dato' id='dato' value='$dato' readonly />
    </br>
    <label for='start'>Start</label>
    <input type='text' name='start' id='start' value='$start' />
    </br>
    <label for='slutt'>Slutt </label>
    <input type='text' name='slutt' id='slutt' value='$slutt' />
    </br></br>
    
    <input type='submit' value='Endre time' name='endreTime' id='endreTime' />
    </br>
    </form>    ");
}


if (isset($_POST["endreTime"]))
   {
    
    $brukernavn=$_POST["brukernavn"];
    $dato=$_POST["dato"];
    $start=$_POST["start"];
    $slutt=$_POST["slutt"];
    
    if (!$brukernavn || !$dato || !$start || !$slutt) {
        
        print("<div class='error'>Alle feltene må fylles ut</div>");
    }
    else {
        $sqlSetning="UPDATE timeinndeling SET start_tid='$start', slutt_tid='$slutt' WHERE brukernavn='$brukernavn' AND dato='$dato';";
        mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig på endre i datbase</div>");
        
        print ("<div class='msg'>Timen for dato $dato er endret</div>");
    }
}



?>
</div></div>

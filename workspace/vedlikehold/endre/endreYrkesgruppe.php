<?php
    include ("../../database/dbTilkobling.php");
   include ("../system/session2.php");
?>

<div class = "box">
    <div class = "box-top">
<h3>Endre yrkesgruppe</h3>
    </div>
<div class = "box-pane">
<form method="post">
    <label for="yrkesgruppe">Yrkesgruppe</label>
    <select name="yrkesgruppe" id="yrkesgruppe">
        <option>Velg Yrkesgruppe</option>
        <?php include ("../listebokser/listeboksYrkesgruppe.php") ?>
    </select>
    </br>
    <input type="submit" value="Fortsett" id="velgYrkesgruppe" name="velgYrkesgruppe"/>
</form>

<?php


if (isset($_POST["velgYrkesgruppe"]) && ($_POST['yrkesgruppe'] == 'Velg Yrkesgruppe')) {
    
    print"<div class = 'error'>Venligst velg en Yrkesgruppe</div>";
    
} elseif (isset($_POST["velgYrkesgruppe"])) {
    
    $yrkesgruppe=$_POST["yrkesgruppe"];
    $sqlSetning="SELECT * FROM yrkesgruppe WHERE yrke_id='$yrkesgruppe';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra databasen</div>");
    $rad=mysqli_fetch_array($sqlResultat);
    $yrke_id=$rad["yrke_id"];
    $yrke_navn=$rad["yrke_navn"];
    
    print ("
    <form method='post'>
    <label for=y_navn'>Gammelt navn</label>
    <input type='text' id='y_navn' name='y_navn' value='$yrke_navn' readonly/>
    </br>
    <label for=nytt_navn'>Nytt navn</label>
    <input type='text' id='nytt_navn' name='nytt_navn'/>
    </br>
     <input type='submit' value='Endre' id='endreYrkesgruppe' name='endreYrkesgruppe'/>
    
    </form>");
}

if (isset($_POST["endreYrkesgruppe"]))
   {
    
    $y_navn=$_POST["y_navn"];
    $nytt_navn=$_POST["nytt_navn"];
    
    if (!$nytt_navn) {
        print ("<div class='error'>Feltetene m&aring fylles ut</div>");
    }
    else
    {
        $sqlSetning="UPDATE yrkesgruppe SET yrke_navn='$nytt_navn' WHERE yrke_navn='$y_navn';";
        mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å endre i database</div>");

        print ("<div class='msg'>Yrkesgruppe $y_navn er endret til yrkesruppe $nytt_navn</div>");
    }
  }

?>
</div>
</div>
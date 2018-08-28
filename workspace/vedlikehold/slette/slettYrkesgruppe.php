<?php
    include ("../../database/dbTilkobling.php");
include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class = "box">
<div class = "box-top">
<h3> Slett Yrkesgruppe</h3>
</div>
<div class = "box-pane">
<form method="post" id = "form" onsubmit = "return omFormTom()">
    <label for="yrke_id">Yrkenavn</label>
    <select name="yrke_id" id="yrke_id">
        <option></option>
         <?php include("../listebokser/listeboksYrkesgruppe.php");?>
    </select><br/>
        
    <input type="submit" id="slett" name="slett" value="Slett"/>
</form>
<div id = "error"></div>

<?php
if (isset($_POST["slett"]))
   {

    $yrke_id=$_POST["yrke_id"];
    $sqlSetning="DELETE FROM yrkesgruppe WHERE yrke_id = '$yrke_id';";
    mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig &aring slette i databasen</div>");

    print ("<div class='msg'>F&oslashlgende yrkesgruppe er n&aring slettet: $yrke_id</div>");

    }
?>

</div>
</div>

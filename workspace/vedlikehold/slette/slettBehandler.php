<?php
    include ("../../database/dbTilkobling.php");
 include ("../system/session2.php");
?>

<script src="../../js/main.js"></script>

<div class = "box">
<div class = "box-top">
<H3>Slette Behandler</H3>
</div>
<div class = "box-pane">
<form method="post">
    <label for="yrkesgruppe">Yrkesgruppe</label>
    <select id="yrkesgruppe" name="yrkesgruppe" >
        <option></option>
        <?php include("../listebokser/listeboksYrkesgruppe.php");?>
    </select><br>
    <input type="submit" value="Fortsett" id="velgYrkesgruppe" name="velgYrkesgruppe"/>
    </br>
</form>


<?php if (isset($_POST["velgYrkesgruppe"])) 
{
?>
        <form method="post" onSubmit="return bekreft()">
            </br>
            <table>
                <tr>
                    <th>Bruker ID</th>
                    <th>Behandlernavn</th>
                    <th>Bildenr</th>
                    <td>Markør</td>
                </tr>
                <?php include ("../sjekkbokser/sjekkboksBrukernavn.php"); ?>
            </table>
            <input type="submit" id="slett" name="slett" value="Slett"/>
        </form>
        
    <?php
    }
        if (isset($_POST["slett"])) {
            $sjekk=$_POST["sjekk"];
            $antall=count($sjekk);
        
            if ($antall==0){
                print ("<div class='error'>Ingen behandlere er valgt</div>");
            }
            else{
                
                for ($r=0; $r<$antall; $r++) {
                    $sqlSetning="DELETE FROM behandler WHERE behandler_id='$sjekk[$r]';";
                    mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å slette i database</div>");
                }
                print ("<div class='msg'>Valgte behandlere er slettet</div>");
            }
        }
    ?>
    </div>
</div>
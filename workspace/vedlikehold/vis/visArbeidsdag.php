<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");
?>



<div class = "box">
        <div class = "box-top">
            <h3>Vise Arbedsdag</h3>
        </div>
        <div class = "box-pane">
            <form method="post">
                <label for="behandler">Behandler</label> 
                <select id="behandler" name="behandler" value="<?php echo $behandler; ?>">
                    <?php include ("../listebokser/listeboksBehandler.php") ?> 
                </select>
                <br>
           

            <input type='submit' value='Fortsett' id='fortsett' name='fortsett'/>
        </form>
        

<?php

  if (isset($_POST["fortsett"]))
    {
  $behandler=$_POST["behandler"];

    
    
    $sqlSetning="SELECT * FROM arbeidsdag WHERE behandler_id='$behandler';";
    $sqlResultat=mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig å hente fra db</div>");
    $antallRader=mysqli_num_rows($sqlResultat);

    echo "<table>
        <tr>
            
            <th>Behandler id</th>
            <th>Ukedag</th>
            <th>Formiddag Start</th>
            <th>Formiddag Slutt</th>
            <th>Ettermiddag Start</th>
            <th>Ettermiddag Slutt</th>
        </tr>
    ";
    
    
    for($r=1; $r<=$antallRader; $r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $arbeids_id=$rad["arbieds_id"];
        $behandler_id=$rad["behandler_id"];
        $ukedag=$rad["ukedag"];
        $f_start=$rad["f_start"];
        $f_slutt=$rad["f_slutt"];
        $e_start=$rad["e_start"];
        $e_slutt=$rad["e_slutt"];   

        print("
            <tr>
                
                <td>$behandler_id</td>
                <td>$ukedag</td>
                <td>$f_start</td>
                <td>$f_slutt</td>
                <td>$e_start</td>
                <td>$e_slutt</td>

            </tr>");
    }   
}
    echo "</table>";
?>
</div>
</div>
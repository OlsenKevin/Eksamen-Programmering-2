<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");




    
    $sqlSetning="SELECT * FROM timer_reservasjon WHERE brukernavn='$innloggetBruker';";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
?>
    <div class = "box">
    <div class = "box-top">
    <h3>Registerte Timer</h3>
    </div>
    <div class = "box-pane">
    <table>
    <tr>
        <th>Reservasjons ID</th> 
        <th>Brukernavn</th> 
        <th>Behandler ID</th> 
        <th>Dato</th>
        <th>Time Start</th>
    </tr>
    
<?php
    $antallRader=mysqli_num_rows($sqlResultat);
    
    for ($r=1;$r<=$antallRader;$r++) {
        $rad=mysqli_fetch_array($sqlResultat);
        $reservasjon_id=$rad["reservasjon_id"];
        $brukernavn=$rad["brukernavn"];
        $behandler_id=$rad["behandler_id"];
        $dato=$rad["dato"];
        $t_start=$rad["t_start"];
        
        print ("
        <tr> 
            <td> $reservasjon_id </td> 
            <td> $brukernavn </a> </td> 
            <td> $behandler_id </td> 
            <td> $dato </td>  
           <td> $t_start </td> 
        </tr>");
    }
print ("</table>");
//include("slutt.html");

?>
 </div>
 </div>
 
 <?php include('../../inc/footerNettsted.php'); ?>
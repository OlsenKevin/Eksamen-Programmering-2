<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");




    
    $sqlSetning="SELECT * FROM bilde;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
?>
    <div class = "box">
    <div class = "box-top">
    <h3>Registerte bilder</h3>
    </div>
    <div class = "box-pane">
    <table>
    <tr>
        <th>bildenr</th> 
        <th>filnavn</th> 
        <th>Opplastningsdato</th> 
        <th>beskrivelse</th>
        <th>bilde</th>
    </tr>
    
<?php
    $antallRader=mysqli_num_rows($sqlResultat);
    
    for ($r=1;$r<=$antallRader;$r++) {
        $rad=mysqli_fetch_array($sqlResultat);
        $bildenr=$rad["bildenr"];
        $filnavn=$rad["filnavn"];
        $opplastningsdato=$rad["opplastningsdato"];
        $beskrivelse=$rad["beskrivelse"];

        print ("
        <tr> 
            <td> $bildenr </td> 
            <td> <a href='https://home.hbv.no/phptemp/web-prg11v06/$filnavn' target='_blank'>$filnavn </a> </td> 
            <td> $opplastningsdato </td> <td> $beskrivelse </td>  
            <td><img style='height: 65px;' src='D:\\Sites\\home.hbv.no\\phptemp\\web-prg11v06/$filnavn' alt='Bilde Til Behandler-$filnavn'></td>
        </tr>");
    }
print ("</table>");
//include("slutt.html");

?>
</div>
</div>
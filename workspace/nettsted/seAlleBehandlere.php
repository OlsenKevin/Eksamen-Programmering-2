<?php
    include ("../database/dbTilkobling.php");
    include('../inc/headerNettsted2.php');



    $sqlSetning="SELECT behandler_id, behandlernavn, y.yrke_id, yrke_navn, bi.bildenr, filnavn
    FROM behandler AS b
    INNER JOIN yrkesgruppe AS y ON y.yrke_id = b.yrke_id
    INNER JOIN bilde AS bi ON bi.bildenr = b.bildenr;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å hente data fra databasen</div>");
    $antallRader=mysqli_num_rows($sqlResultat);
?>

    <div class = "box">
        <div class = "box-top">
            <h3>Registrerte behandlere </h3>
        </div>
    <div class = "box-pane">
    <table>

    <tr>
        <th>behandlernavn</th> 
        <th>yrkesgruppe</th> 
        <th>bildenr</th>
        <th>bilde</th> 
    </tr>

<?php
    for ($r=1; $r<=$antallRader; $r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $behandler_id     =$rad["behandler_id"];
        $behandlernavn    =$rad["behandlernavn"];
        $yrke_navn        =$rad["yrke_navn"];
        $bildenr          =$rad["bildenr"];
        $filnavn          =$rad["filnavn"];

        print ("
        <tr> 
            <td> $behandlernavn </td> 
            <td> $yrke_navn </td> 
            <td> $bildenr </td>
            <td><img style='height: 65px;' src='https://eksamen2017-ttgmagnus.c9users.io/vedlikehold/bilder/$filnavn' alt='Bilde Til Behandler-$filnavn'></td>
        </tr>");
    }
    print ("</table>");

 ?>
 
 </div>
 </div>
 
 <?php include('../inc/footerNettsted.php'); ?>
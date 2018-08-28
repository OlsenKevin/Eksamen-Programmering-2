<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");



    $sqlSetning="SELECT * FROM yrkesgruppe;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å hente data fra databasen</div>");
    $antallRader=mysqli_num_rows($sqlResultat) ;
?>
    <div class = "box">
    <div class = "box-top">
    <h3>Registrerte yrker </h3>
    </div>
    <div class = "box-pane">
    <table>
    
    <tr>
        <th>yrke id</th> 
        <th>yrke navn</th> 
    </tr>

<?php
    for ($r=1; $r<=$antallRader; $r++)
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $yrke_id    =$rad["yrke_id"];
        $yrke_navn  =$rad["yrke_navn"];

        print ("
        <tr> 
            <td> $yrke_id  </td> 
            <td> $yrke_navn </td>
        </tr>");
    }
    print ("</table>");

?>
</div>
</div>
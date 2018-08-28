<?php
    include ("../../database/dbTilkobling.php");
 include('../../inc/headerNettsted2.php');
?>



<div class="box">
    <div class="box-top">
<h3>Registrer Administrator </h3>
    </div>
    <div class="box-pane">
<form action="" id="form" name="registrerBrukerSkjema" method="post" onsubmit = "return omFormTom()">
    
    <label for="fornavn">Fornavn</label> 
    <input name="fornavn" type="text" id="fornavn"  /> <br />
    
    <label for="etter">Etternavn</label> 
    <input name="etternavn" type="text" id="etternavn"  /> <br />
    
    
    <label for="brukernavn">Brukernavn</label> 
    <input name="brukernavn" type="text" id="brukernavn"  /> <br />
    <label for="passord">Passord</label>
    <input name="passord" type="password" id="passord"  />  <br />
    <input type="submit" name="registrerBrukerKnapp" value="Registrer bruker">
    <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>
<div id = "error"></div>

<?php
    @$registrerBrukerKnapp=$_POST ["registrerBrukerKnapp"];
    if ($registrerBrukerKnapp)
        {
            
             $fornavn=$_POST ["fornavn"];
              $etternavn=$_POST ["etternavn"];
            $brukernavn=$_POST ["brukernavn"];
            $passord=$_POST["passord"];  /* variable gitt verdier fra feltene i HTML-skjemaet */

            if (!$fornavn || !$etternavn|| !$brukernavn || !$passord)  /* brukernavn og passord er ikke fylt ut */
                {
                    print ("Alle felt må fylles ut <br />");
                }
            else
                {
                     $sqlSetning="SELECT * FROM pasient WHERE brukernavn='$brukernavn';";
                     $sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig å hente fra databasen");

                    if (mysqli_num_rows($sqlResultat)!=0)  /* brukernavnet er registrert fra før */
                        {
                            print ("Brukernavnet er registrert fra f&oslash;r <br />");
                        }
                    else
                        {
                            $kryptertPassord=password_hash($passord,PASSWORD_DEFAULT);
                            $sqlSetning="INSERT INTO pasient VALUES ('$brukernavn','$fornavn','$etternavn','$kryptertPassord');";
                            mysqli_query($db,$sqlSetning) or die ("Ikke mulig å registrere til databasen");

                            print ("F&oslash; lgende data er n&aring; registrert: <br /> Brukernavn: $brukernavn <br /> Passord: $passord <br />  <br />");
                        
                        }

                }
        }
        
     
?>
</div>
</div>

 <?php include('../../inc/footerNettsted.php'); ?>
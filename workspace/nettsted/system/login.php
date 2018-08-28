
<?php  /* innlogging  */



   // $nav = "navVedlikehold.php";
    
    include ("../../database/dbTilkobling.php");
    // include ("/inc/session.php");
    // include("../liste.html");
    include("../../inc/headerNettsted2.php");
  
?>

<div class="box">
    <div class="box-top">
        <h3>Innlogging </h3>
    </div>
    <div class="box-pane">
        <form action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
            <label for="brukernavn">Brukernavn</label>
            <input name="brukernavn" type="text" id="brukernavn" required/> 
            <br/>
            <label for="passord">Passord</label> 
            <input name="passord" type="password" id="passord" required/>  
            <br/>
            
            
            
            
            <input type="submit" name="logginnKnapp" value="Logg inn">
            <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> 
            <br/>
        </form>
     <a href="registrerPasient.php">Ny bruker? Registrer deg her</a><br>
    <?php
        if (isset($_POST["logginnKnapp"])) {
            
            $brukernavn=$_POST["brukernavn"];
            $passord=$_POST["passord"];
            
            include("sjekk2.php");
            
            if (!sjekkBrukernavnPassord($brukernavn,$passord))  /* brukernavn og passord er ikke korrekt */
                {
                    print("Feil brukernavn/passord <br />");
                }
            else {
                @session_start();
                $_SESSION["brukernavn"]=$brukernavn;
                print("<meta http-equiv='refresh' content='0;URL=./index.php'>");
            }
        }
    
    ?>
    
    </div>
</div>
 <?php include('../../inc/footerNettsted.php'); ?>
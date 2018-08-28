<?php

   session_start();
   @$innloggetBruker=$_SESSION["brukernavn"];
   if (!isset($_SESSION["brukernavn"])) {
    //  print("<meta http-equiv='refresh' content='0;URL=./index.php'>");
     header('Location: ../../nettsted/index.php');
     
   }

     else
     {
       //ny kode 
        include('../../inc/headerNettsted.php');
        

    ?>    
     
<?php
}
?>
<?php

   session_start();
   if (!isset($_SESSION["brukernavn"])) {
    //  print("<meta http-equiv='refresh' content='0;URL=./index.php'>");
     header('Location: ../../vedlikehold/system/login.php');
     
   }

     else
     {
       //ny kode 
        include('../../inc/headerVedlikehold.php');
        include('../../inc/navVedlikehold.php');
        

    ?>    
     
<?php
}
?>
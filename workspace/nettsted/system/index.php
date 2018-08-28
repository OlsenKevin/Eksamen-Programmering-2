<?php

include ("session2.php");
if ($innloggetBruker){
print("Velkommen til startsiden (du er logget inn som $innloggetBruker) </br> I menyen over finner du ulike funksjoner som denne applikasjonen tilbyr");
}
else {
    
 print("<h3>Velkommen til startsiden </h3> I menyen over finner du ulike funksjoner som denne applikasjonen tilbyr");
  
}
?>

 <?php include('../../inc/footerNettsted.php'); ?>

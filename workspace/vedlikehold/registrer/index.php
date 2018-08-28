<?php

include ("../system/session2.php");
if ($innloggetBruker){
print("<h3>Velkommen til startsiden (du er logget inn som $innloggetBruker) </h3> I menyen over finner du ulike funksjoner som denne applikasjonen tilbyr");
}
else {
 print("<h3>Velkommen til startsiden </h3> I menyen over finner du ulike funksjoner som denne applikasjonen tilbyr");
  
}
?>

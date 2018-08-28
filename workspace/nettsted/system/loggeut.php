<?php  /* utlogging  */
/*
/*  Programmet logger ut en bruker fra applikasjonen
*/
    session_start();
    session_destroy();  /* sesjonen avsluttes */

    print("<meta http-equiv='refresh' content='0;URL=../index.php'>");   /* redirigering tilbake til innloggings-siden (innlogging.php) */
  
?>

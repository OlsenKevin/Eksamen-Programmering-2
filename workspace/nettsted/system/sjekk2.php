<?php  /* sjekk */
/*
/*  Programmet inneholder en funksjon for å sjekke om brukernavn og passord er korrekt
*/

function sjekkBrukernavnPassord($brukernavn,$passord)
{
include ("../../database/dbTilkobling.php");

  $lovligBruker=true;

  $sqlSetning="SELECT * FROM pasient WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db,$sqlSetning);

  if (!$sqlResultat)  /* SQL-setningen ble ikke utført med vellykket resultat */
    {
      $lovligBruker=false;
    }
  else
   {
      $rad=mysqli_fetch_array($sqlResultat);
      $lagretBrukernavn=$rad["brukernavn"];
      $lagretPassord=$rad["passord"];

      $kryptertPassord=password_hash($passord,PASSWORD_DEFAULT);
    
      if($brukernavn !=$lagretBrukernavn || !password_verify($passord,$lagretPassord))
        {
          $lovligBruker=false;
        }
    }
  return $lovligBruker;
}
?>

<?php
    $host="localhost";     
    $user="web-prg11v06";
    $password="78740";   
    $database="web-prg11v06";  
    $db=mysqli_connect($host,$user,$password,$database) 
     or die("<div class = 'error'>Kunne ikke koble til databasen</div>"); 
?>
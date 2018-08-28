<?php
    
    // include ("/inc/session.php");
    //$nav = "navNettsted.php";
    
    include('../database/dbFunksjoner.php');
    //include("../inc/header.php");
    
?>    
    
    <section class = "main-content">
        <?php Legeliste(); ?>
    </section>
    
    <section class = "Yrkeliste">    
        <?php Yrkeliste(); ?>
    </section>
    
    <?php include('../inc/footer.php'); ?>
<?php

    function Legeliste() {
        // trenger bilde, navn, yrke, hvilke dager h*n jobber
        
        include ("../database/dbTilkobling.php");
        
        $sqlSetning="
        SELECT behandler_id, behandlernavn, y.yrke_id, yrke_navn, bi.bildenr, filnavn 
        FROM behandler AS b
        INNER JOIN yrkesgruppe AS y ON y.yrke_id = b.yrke_id
        INNER JOIN bilde AS bi ON bi.bildenr = b.bildenr;";
        $sqlResultat=mysqli_query($db,$sqlSetning) 
            or die ("<div class = 'error'>Ikke mulig å hente data fra databasen<div>");
        $antallRader=mysqli_num_rows($sqlResultat);

        for ($r=1; $r<=$antallRader; $r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $behandlernavn    =$rad["behandlernavn"];
            $yrke_navn        =$rad["yrke_navn"];
            $filnavn          =$rad["filnavn"];
    
            print ("
            <div class = 'row'> 
                <div class = 'element'>
                    <img style='height: 65px;' 
                    src='https://eksamen2017-ttgmagnus.c9users.io/vedlikehold/bilder/$filnavn' 
                    alt='Bilde Til Behandler-$filnavn'>
                </div>
                <div class = 'element'> 
                    Dr. $behandlernavn <br> 
                    $yrke_navn<br>
                    <button type = 'button'>Timetabell</button>
                </div> 
                
                <hr>
            </div>");
        }
    }

    
    function Yrkeliste() { 
        include ("../database/dbTilkobling.php");
        
        $sqlS="SELECT * FROM yrkesgruppe;";
        $sqlR=mysqli_query($db,$sqlS) 
            or die ("<div class = 'error'>Ikke mulig å hente data fra databasen<div>");
        $rader=mysqli_num_rows($sqlR);
        
        for ($r=1;$r<=$rader;$r++) {
            $rad=mysqli_fetch_array($sqlR);
            $yrke=$rad["yrke_navn"];
            
            print ("<p><a href='#'>$yrke</a></p>");
        }
    }
    
    
    
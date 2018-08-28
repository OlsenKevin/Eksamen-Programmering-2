        <nav>
            <ul>
                <li class="left"><a href="/nettsted/system/index.php"><h4>Bjarums Medicals</h4></a></li>
                <li class="dropdown">
                    <a class="dropbtn">inn/ut/registrere</a>
                    <div class="dropdown-content">
                        <a href="/nettsted/system/login.php">Log Inn</a>
                        <a href="/nettsted/system/loggeut.php">Log Ut</a>
                        <a href="/nettsted/system/registrerPasient.php">Registrere ny pasient</a>
                    </div>
                </li>
                
                
                   <li class="dropdown">
                    <a class="dropbtn">Brukernavn: <?php print("$innloggetBruker");  ?></a>
                    <div class="dropdown-content">
                  
                        <a href="/nettsted/pasient/lagTimebestilling.php">Bestille Legetime</a>
                        <a href="/nettsted/pasient/endreTimebestilling.php">Endre Legetime</a>
                        <a href="/nettsted/pasient/sletteTimebestilling.php">Slett Legetime</a>
                        <a href="/nettsted/pasient/seEgenTimebestilling.php">Se Legetime</a>
                   
                    </div>
                </li>
                
                
                
                
                
                
                
                
                <li> <a href="/nettsted/seAlleBehandlere.php">Se Behandlere</a></li>
                <li> <a href="/nettsted/seBehandlersTimetabell.php">Behandleres Arbeidsdager</a></li>
            </ul>
        </nav>

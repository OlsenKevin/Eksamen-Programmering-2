<?php
 include ("../database/dbTilkobling.php");
  include ("../inc/headerNettsted2.php");
  include ("../js/kalender.php");
?>

    <div class = "box">
        <div class = "box-top">
            <h3>Timetabell hos behandler</h3>
        </div>
        <div class = "box-pane">
            <form method="post">
                <label for="behandler_id">Behandler</label> 
                <select id="behandler" name="behandler_id" value="<?php echo $behandler; ?>">
                    <?php include ("../vedlikehold/listebokser/listeboksBehandler.php") ?> 
                </select>
                <br>
                <br>
                <label for="datepicker">Dato</label>
                <input type="datepicker" name="dato" id="datepicker" placeholder="klikk her for kalender" />
                <br>
                <input type='submit' value='Se arbeidsdag' id='fortsett' name='submit'/>
            </form> 
        </div>
    </div>
    
<?php
    
    
    if (isset($_POST["submit"])){
        
        $dato = $_POST['dato'];
        
        $ukedag = '';
        
        function ukedag($dato){
            $dag = date('D', strtotime($dato));
            
            if ($dag == "Mon") {
                global $ukedag;
                $ukedag = 'mandag';
                //return $ukedag;
            } elseif ($dag == "Tue") {
                global $ukedag;
                $ukedag = 'tirsdag';
                //return $ukedag;
            } elseif ($dag == "Wed") {
                global $ukedag;
                $ukedag = 'onsdag';
                //return $ukedag;
            } elseif ($dag == "Thu") {
                global $ukedag;
                $ukedag = 'torsdag';
                //return $ukedag;
            } elseif ($dag == "Fri") {
                global $ukedag;
                $ukedag = 'fredag';
                //return $ukedag;
            } elseif ($dag == "Sat") {
                global $ukedag;
                $ukedag = 'lørdag';
                //return $ukedag;
            } elseif ($dag == "Sun") {
                global $ukedag;
                $ukedag = 'søndag';
                //return $ukedag;
            }
        }
        
        ukedag($dato);
                    
        $behandler_id = $_POST["behandler_id"];
        // $dato = '2017-06-15';
    
       $sqlSetning="SELECT *
        FROM formiddag AS f
        INNER JOIN arbeidsdag AS a
        WHERE a.behandler_id='$behandler_id' AND a.ukedag='$ukedag' AND f.time BETWEEN a.f_start AND a.f_slutt;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
        $antallRader=mysqli_num_rows($sqlResultat);
        
        
        print'<div class = "card">
        <div class = "box-pane">
        <table><th>Timer</th>';
        
        
        for ($r=1;$r<=$antallRader;$r++) {
            
            $rad=mysqli_fetch_array($sqlResultat);
            $formiddag_time=$rad["time"];
            
            $sqlSetning1="SELECT * FROM timer_reservasjon AS t
            INNER JOIN arbeidsdag AS a ON a.behandler_id=t.behandler_id
            WHERE a.behandler_id='$behandler_id' AND t.dato='$dato' AND t_start='$formiddag_time';";
            $sqlResultat1=mysqli_query($db,$sqlSetning1) or die ("<div class='error'>ikke mulig å henta data fra databasen2</div>");
            $antallRader1=mysqli_num_rows($sqlResultat1);
            $rad1=mysqli_fetch_array($sqlResultat1);
            $reservert_time = $rad1['t_start'];
            
            
            if ($reservert_time == $formiddag_time) {
                print '<tr class = "opptatt"><td>'.$formiddag_time. ' den ' . $dato . ' er OPPTATT </td></tr>
                ';
            } else {
                print '<tr class = "ledig"><td>'.$formiddag_time. ' den ' . $dato . ' er LEDIG </td></tr>
                ';
            }
            
        }
        
        
        // $behandler_id = '14';
        // $ukedag = 'torsdag';
        // $dato = '2017-06-15';
    
       $sqlSetning="SELECT *
        FROM ettermiddag AS e
        INNER JOIN arbeidsdag AS a
        WHERE a.behandler_id='$behandler_id' AND a.ukedag='$ukedag' AND e.time BETWEEN a.e_start AND a.e_slutt;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<div class='error'>ikke mulig å henta data fra databasen</div>");
        $antallRader=mysqli_num_rows($sqlResultat);
        
        
        for ($r=1;$r<=$antallRader;$r++) {
            
            $rad=mysqli_fetch_array($sqlResultat);
            $ettermiddag_time=$rad["time"];
            
            $sqlSetning1="SELECT * FROM timer_reservasjon AS t
            INNER JOIN arbeidsdag AS a ON a.behandler_id=t.behandler_id
            WHERE a.behandler_id='$behandler_id' AND t.dato='$dato' AND t_start='$ettermiddag_time';";
            $sqlResultat1=mysqli_query($db,$sqlSetning1) or die ("<div class='error'>ikke mulig å henta data fra databasen2</div>");
            $antallRader1=mysqli_num_rows($sqlResultat1);
            $rad1=mysqli_fetch_array($sqlResultat1);
            $reservert_time = $rad1['t_start'];
            
            
            if ($reservert_time == $ettermiddag_time) {
                print '<tr class = "opptatt"><td>'.$ettermiddag_time . ' den ' . $dato . ' er OPPTATT </td></tr>
                ';
            } else {
                print '<tr class = "ledig"><td>'.$ettermiddag_time . ' den  ' . $dato . ' er LEDIG </td></tr>
                ';
            } 
            
        }
        
        print '
        </table>
        </div>
        </div>';
        
        
    }
    
?>

<?php include('../inc/footerNettsted.php'); ?>
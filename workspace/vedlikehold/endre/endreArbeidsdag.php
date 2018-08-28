<?php
    include ("../../database/dbTilkobling.php");
  include ("../system/session2.php");
?>

<div class="box">
    <div class="box-top">
        <h4>Endre Arbeidsdag</h4>
    </div>
    <div class="box-pane">
<form method="post" id="form" onsubmit = "return omFormTom()">
    <label for="behandler">Behandler</label>
    <select id="behandler" name="behandler" value="<?php echo $behandler_id; ?>">
        <?php include ("../listebokser/listeboksBehandler.php") ?> 
    </select>
    <br>
    
              Ukedag<br>
            <select name='ukedag'>
            <option value='mandag' selected>Mandag</option>
            <option value='tirsdag'>Tirsdag</option>
            <option value='onsdag'>Onsdag</option>
            <option value='torsdag'>Torsdag</option>
            <option value='fredag'>Fredag</option>
            </select>
            <input type='submit' value='Fortsett' id='fortsett' name='fortsett'/>
    
       
<div id="msg"></div>

<?php if (isset($_POST["fortsett"])) 
{       
        $behandler = $_POST["behandler"];
        $ukedag = $_POST["ukedag"];
    
        $sqlResultat="SELECT * FROM arbeidsdag WHERE behandler_id='$behandler' AND ukedag='$ukedag';";
        $sqlResultat=mysqli_query($db, $sqlResultat) or die ("<div class='error'>Ikke mulig &aring hente fra database</div>");
        $rad=mysqli_fetch_array($sqlResultat);
        

  
        
?>

           <br><br/>
            
                <label for="b_id">Behandler ID</label>
                <input type='text' id='b_id' name='b_id' value='<?php echo $behandler_id; ?>' readonly/>
                <br/><br/>
                <label for="udag">Ukedag</label>
                <input type='text' id='udag' name='udag' value='<?php echo $ukedag; ?>' readonly/>
                <br/><br/>
                
                <label for="tstart">Formiddag start</label>
                <select id='f_start' name='f_start' required>
                     <?php include ('../listebokser/listeboksTime.php'); ?>
                </select>
                <br/><br/>
                
                 <label for="f_slutt">Formiddag slutt</label>
                 <select id='f_slutt' name='f_slutt' required>
                      <?php include ('../listebokser/listeboksTime.php'); ?>
                </select>
                <br/><br/>
                
                 <label for="e_start">Ettermiddag slutt</label>
                 <select id='e_start' name='e_start' required>
                      <?php include ('../listebokser/listeboksEttermiddag.php'); ?>
                </select>
                 <br/><br/>
                
                 <label for="e_slutt">Ettermiddag slutt</label>
                 <select id='e_slutt' name='e_slutt' required>
                      <?php include ('../listebokser/listeboksEttermiddag.php'); ?>
                </select>
  
                <br/><br/>
                <input type='reset' value='Nullstill' id='nullstill' name='nullstill'/>
                <input type='submit' value='Endre' id='endreArbeidsdag' name='endreArbeidsdag'/>
                
              
      <?php 
      print(" <input type='text' value='$behandler' name='behandler_id' id='hidden'>
                <input type='text' value='$ukedag' name='ukedag' id='hidden'>
            </form>");
        
}
    
    
    if (isset($_POST["endreArbeidsdag"])) {
        
        $behandler=$_POST["behandler_id"];
        $ukedag=$_POST["ukedag"];
        
        $b_id=$_POST["b_id"];
        $udag=$_POST["udag"];
        $f_start=$_POST["f_start"];
        $f_slutt=$_POST["f_slutt"];
        $e_start=$_POST["e_start"];
        $e_slutt=$_POST["e_slutt"];

        if (!$f_start || !$f_slutt || !$e_start || !$e_slutt ) {
            print("<div class='error'>Alle verdiene m&aring fylles ut</div>");
        }
        else{
            $sqlSetning="UPDATE arbeidsdag SET f_start='$f_start', f_slutt='$f_slutt', e_start='$e_start', e_slutt='$e_slutt'
            WHERE behandler_id='$behandler' AND ukedag='$ukedag';";
            mysqli_query($db, $sqlSetning) or die ("<div class='error'>Ikke mulig &aring endre i database</div>");

            print ("<div class='msg'>$udag er endret for bruker: $b_id</div>");
        }
    }
    
?>

    </div>
</div>
{"filter":false,"title":"listeboksEttermiidag.php","tooltip":"/vedlikehold/listebokser/listeboksEttermiidag.php","undoManager":{"mark":15,"position":15,"stack":[[{"start":{"row":0,"column":0},"end":{"row":18,"column":2},"action":"insert","lines":["<?php","","include (\"../../database/dbTilkobling.php\");","","$sqlSetning=\"SELECT * FROM time;\";","$sqlResultat=mysqli_query($db,$sqlSetning) or die (\"<div class='error'>ikke mulig å henta data fra databasen</div>\");","$antallRader=mysqli_num_rows($sqlResultat);","","print(\"<option>Velg kl. slett</option>\");","","for ($r=1; $r<=$antallRader; $r++) {","    ","    $rad=mysqli_fetch_array($sqlResultat);","    $time=$rad[\"time\"];","    ","    print (\"<option value='$time'>$time</option>\");","}","","?>"],"id":1}],[{"start":{"row":4,"column":30},"end":{"row":4,"column":31},"action":"remove","lines":["e"],"id":2}],[{"start":{"row":4,"column":29},"end":{"row":4,"column":30},"action":"remove","lines":["m"],"id":3}],[{"start":{"row":4,"column":28},"end":{"row":4,"column":29},"action":"remove","lines":["i"],"id":4}],[{"start":{"row":4,"column":27},"end":{"row":4,"column":28},"action":"remove","lines":["t"],"id":5}],[{"start":{"row":4,"column":27},"end":{"row":4,"column":28},"action":"insert","lines":["e"],"id":6}],[{"start":{"row":4,"column":28},"end":{"row":4,"column":29},"action":"insert","lines":["t"],"id":7}],[{"start":{"row":4,"column":29},"end":{"row":4,"column":30},"action":"insert","lines":["t"],"id":8}],[{"start":{"row":4,"column":30},"end":{"row":4,"column":31},"action":"insert","lines":["e"],"id":9}],[{"start":{"row":4,"column":31},"end":{"row":4,"column":32},"action":"insert","lines":["r"],"id":10}],[{"start":{"row":4,"column":32},"end":{"row":4,"column":33},"action":"insert","lines":["m"],"id":11}],[{"start":{"row":4,"column":33},"end":{"row":4,"column":34},"action":"insert","lines":["i"],"id":12}],[{"start":{"row":4,"column":34},"end":{"row":4,"column":35},"action":"insert","lines":["d"],"id":13}],[{"start":{"row":4,"column":35},"end":{"row":4,"column":36},"action":"insert","lines":["d"],"id":14}],[{"start":{"row":4,"column":36},"end":{"row":4,"column":37},"action":"insert","lines":["a"],"id":15}],[{"start":{"row":4,"column":37},"end":{"row":4,"column":38},"action":"insert","lines":["g"],"id":16}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":4,"column":38},"end":{"row":4,"column":38},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1497481743603,"hash":"19f713358d301494be16a3e04130120690227391"}
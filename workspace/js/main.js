function omFormTom() {
    
  // objekt-liste over alle form input felt

    var felt = {
        behandlernavn   : "behandlernavn",
        yrkesgruppe     : "yrkesgruppe",
        behandler       : "behandler",
        beskrivelse     : "beskrivelse",
        bildenr         : "bildenr",
        bilde           : "bilde",
        brukernavn      : "brukernavn",
        dato            : "dato",
        fil             : "fil",
        passord         : "passord",
        slutt           : "slutt",
        yrke_id         : "yrke_id",

    };

  // valideringen skjer gjennom iterasjon av objecter. 
    
    function capitalizeFirstLetter(x) {
        
        return x.charAt(0).toUpperCase() + x.slice(1);
        
    }
    
    var err = '';
    var x;
    
    for (x in felt) {
        
        if (document.getElementById(x)) {
            
            console.log(x + " id finnes i documentet.");
            
            if((document.getElmentById[x].value) == ('Velg' + x)) { 
                
                err = 'Venligst velg' + x;
                document.getElementById('error').innerHTML = err;
                return false;
                
            }
            
            if (!document.forms["form"][x].value) {
                
                err = err  + capitalizeFirstLetter(x) + ' feltet m&aring fylles ut. <br>';
                
            } else {    
                
                return true;
                
            } 
            
        } else {
            
            console.log(x + " id finnes ikke i dokumentet.");
            
        }
        
    } 
    
    document.getElementById('error').innerHTML = err;
    return false;
    
}

function fjernMelding() {
    document.getElementById("melding1").innerHTML = "";
}


function validering() {
    var brukernavn = document.getElementById("brukernavn").value;
    var fornavn = document.getElementById("fornavn").value;
    var etternavn = document.getElementById("etternavn").value;
    var klassekode = document.getElementById("klassekode").value;


    var feilmelding = "";

    if (!brukernavn) {
        feilmelding = feilmelding + "Brukernavn er ikke fylt ut</br>";
    }

    if (!fornavn) {
        feilmelding = feilmelding + "Fornavn er ikke fylt ut</br>";
    }

    if (!etternavn) {
        feilmelding = feilmelding + "Etternavn er ikke fylt ut</br>";
    }

    if (!klassekode) {
        feilmelding = feilmelding + "Klassekode er ikke fylt ut</br>";
    }

    if (brukernavn && fornavn && etternavn && klassekode) {
        return true;
        document.getElementById("melding1").innerHTML = "Alt er riktig fylt ut";
    }

    else {
        document.getElementById("melding1").style.color = "red";
        document.getElementById("melding1").innerHTML = feilmelding;
        return false;
    }
}


function validering1() {

    var klassekode = document.getElementById("klassekode").value;
    var klassenavn = document.getElementById("klassenavn").value;
    console.log(klassekode);


    var p = /([A-ZÆØÅ]){2,}([0-9]){1,}$/;
    var patt = new RegExp(p);
    var test = patt.test(klassekode);
    console.log(test);

    var feilmelding = "";


    if (!klassenavn) {
        feilmelding = feilmelding + "Klassenavn er ikke fylt ut <br />";
    }


    if (!klassekode) {
        feilmelding = feilmelding + "Klassekode er ikke fylt ut <br />";
    }

    if (klassekode && !test) {
        feilmelding = feilmelding + "Klassekode må være minst 2 store bokstaver. Siste tegn må være et tall mellom 0-9 <br/>";
    }


    if (klassekode && klassenavn && test) {
        return true;
    }

    else {
        document.getElementById("melding1").style.color = "red";
        document.getElementById("melding1").innerHTML = feilmelding;
        return false;
    }


}


function validering2() {

    var klassenavn = document.getElementById("klassenavn").value;


    var feilmelding = "";


    if (!klassenavn) {
        feilmelding = feilmelding + "Klassenavn er ikke fylt ut <br />";
    }

    if (klassenavn) {
        return true;
        document.getElementById("melding1").innerHTML = "Alt er riktig fylt ut";


    }
    else {
        document.getElementById("melding1").style.color = "red";
        document.getElementById("melding1").innerHTML = feilmelding;
        return false;
    }
}

function validering3() {
    var brukernavn = document.getElementById("brukernavn").value;

    var feilmelding = "";

    if (brukernavn == 0) {
        feilmelding = feilmelding + "Feltet m&aring fylles ut!</br>";
    }

    else {
        document.getElementById("melding1").style.color = "red";
        document.getElementById("melding1").innerHTML = feilmelding;
        return false;
    }
}




function fjernMelding() {
    document.getElementById("melding").innerHTML = "";
}

function bekreft() {
    return confirm ("Er du sikker?");
}
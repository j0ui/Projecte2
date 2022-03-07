function showNom() {
   document.getElementById('Nom').style.display = "inline";
   document.getElementById('Nom2').style.display = "inline";
   document.getElementById('Telefon').style.display = "none";
   document.getElementById('Telefon2').style.display = "none";
   document.getElementById('Correu').style.display = "none";
   document.getElementById('Correu2').style.display = "none";
   document.getElementById('Cognom').style.display = "none";
   document.getElementById('Cognom2').style.display = "none";
}

function showCognom() {
   document.getElementById('Nom').style.display = "none";
   document.getElementById('Nom2').style.display = "none";
   document.getElementById('Cognom').style.display = "inline";
   document.getElementById('Cognom2').style.display = "inline";
   document.getElementById('Telefon2').style.display = "none";
   document.getElementById('Correu').style.display = "none";
   document.getElementById('Correu2').style.display = "none";
}

function showTel() {
   document.getElementById('Telefon').style.display = "inline";
   document.getElementById('Telefon2').style.display = "inline";
   document.getElementById('Correu').style.display = "none";
   document.getElementById('Correu2').style.display = "none";
   document.getElementById('Nom').style.display = "none";
   document.getElementById('Nom2').style.display = "none";
   document.getElementById('Cognom').style.display = "none";
   document.getElementById('Cognom2').style.display = "none";
}

function showC() {
   document.getElementById('Correu').style.display = "inline";
   document.getElementById('Correu2').style.display = "inline";
   document.getElementById('Nom').style.display = "none";
   document.getElementById('Nom2').style.display = "none";
   document.getElementById('Telefon').style.display = "none";
   document.getElementById('Telefon2').style.display = "none";
   document.getElementById('Cognom').style.display = "none";
   document.getElementById('Cognom2').style.display = "none";
}

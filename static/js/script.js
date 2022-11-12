<<<<<<< Updated upstream
=======
var hp = document.querySelector('.vita');
var attack = document.querySelector('.attacco');
var defense = document.querySelector('.difesa');
var speed = document.querySelector('.velocita');
var specialAttack = document.querySelector('.attacco_spaziale');
var specialDefense = document.querySelector('.difesa_speciale');
var button = document.querySelector('.bottne');

button.addEventListener('click', function() {
    if (checkRequired(hp.value) && checkValue(hp.value) && checkRequired(attack.value) && checkValue(attack.value) && checkRequired(defense.value) && checkValue(defense.value) && checkRequired(speed.value) && checkValue(speed.value) && checkRequired(specialAttack.value) && checkValue(specialAttack.value) && checkRequired(specialDefense.value) && checkValue(specialDefense.value)) {
        alert('ok');
    } else {
        alert('errore');
    }
 });

function checkRequired(value) {
    if (value.trim() === '') {
        return false;
    } else {
        return true;
    }
};

function checkValue(value) {
    if (value < 0 || value > 255) {
        return false;
    } else {
        return true;
    }
};
>>>>>>> Stashed changes

let hp = document.querySelector('.vita');
let attack = document.querySelector('.attacco');
let defense = document.querySelector('.difesa');
let speed = document.querySelector('.velocita');
let specialAttack = document.querySelector('.attacco_spaziale');
let specialDefense = document.querySelector('.difesa_speciale');
let button = document.querySelector('.bottone');

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

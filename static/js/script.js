let form = document.querySelector("#myForm")
let datas = document.querySelectorAll(".datas")

form.addEventListener ("submit", function(event) {
    event.preventDefault();
    let j = 0;
    error = false;
     for (let i = 0; i < datas.length; i++) {
         if (isNaN(datas[i].value)) {
            error = true;
        } else if (datas[i].value > 0 && datas[i].value <= 300) {
            j++;
        } else if (datas[i].value > 300 || datas[i].value < 0) {
            error = true;
        }

        if (j == datas.length && error == false) {
            form.submit();
        }
     }

     if (error) {
        alert("Inserisci un valore valido");
     }
    
})


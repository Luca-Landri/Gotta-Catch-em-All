let form = document.querySelector("#myForm")
let datas = document.querySelectorAll(".datas")
error = false;
console.log(form);

form.addEventListener ("submit", function(event) {
    event.preventDefault();
    let j = 0;
    console.log("ciao");
    console.log(datas.length);
     for (let i = 0; i < datas.length; i++) {
         if (datas[i].value == "" || isNaN(datas[i].value)) {
            error = true;
        } else if (datas[i].value > 0 && datas[i].value <= 300) {
            console.log("ok");
            j++;
        } else if (datas[i].value > 300 || datas[i].value < 0) {
            error = true;
        }

        if (j == datas.length - 1) {
            form.submit();
        }
     }

     if (error) {
        alert("Inserisci un valore valido");
     }
    
})
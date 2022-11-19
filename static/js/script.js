let form = document.querySelector("#myForm")

form.addEventListener("submit", function(e){
    e.preventDefault()

    //let vita = parseInt(document.querySelector("input[name=vita]").value)
    let vita = document.querySelector("input[name=vita]").value

    let attacco = document.querySelector("input[name=attacco]").value

    let difesa = document.querySelector("input[name=difesa]").value
    
    let attspec = document.querySelector("input[name=attspeciale]").value

    let difesapeciale = document.querySelector("input[name=difesapeciale]").value

    let velocita = document.querySelector("input[name=velocita]").value

    if(isNaN(vita) || isNaN(attacco) || isNaN(difesa) || isNaN(attspec) ||  isNaN(difesapeciale) || isNaN(velocita)){
        alert("Errore, i campi devono essere necessariamente numerici")
    }else{
        if(vita > 0 && vita <= 300 && attacco > 0 && attacco <= 300 && difesa > 0 && difesa <= 300 && attspec > 0 && attspec <= 300  && difesapeciale > 0 && difesapeciale <= 300 && velocita > 0 && velocita <= 300){
            console.log("Sto a fuzniona")
            form.submit()
        }
    }
})

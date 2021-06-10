// Contient toutes le javascript

document.getElementById("fieldSearch").style.display = "none";

var affichermasquer = 0;

console.log(affichermasquer);

document.getElementById("buttonSearch").addEventListener("click", function()

    {
        affichermasquer++;
        console.log(affichermasquer);
        if (affichermasquer % 2 == 0) {
            document.getElementById("fieldSearch").style.display = "none";
            document.getElementById("buttonSearch").style.display = "block"
        } else {
            document.getElementById("fieldSearch").style.display = "block";
            document.getElementById("buttonSearch").style.display = "none";
            let search = document.createElement('button');
            search.type = "submit";
            search.id = "buttonregex";
            search.name="buttonregex";
            search.innerHTML = "rechercher";
            document.getElementById("formSearch").appendChild(search)
            document.getElementById("formSearch")
        }
    })
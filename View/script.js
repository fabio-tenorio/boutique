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

document.getElementById("fieldSearch").addEventListener("input", function() {
    xhr = new XMLHttpRequest;
    xhr.onreadystatechange = afficheRecherche;
    xhr.open('GET', '?ControllerProduits/get_all_produits', true);
    xhr.send();
})
function afficheRecherche() {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            console.log(xhr.response);
        } else {
            console.log("error 404 or 500");
            //404 - not found
            //500 internal Server Error
        }
    } else {
        // not ready yet
    }
}
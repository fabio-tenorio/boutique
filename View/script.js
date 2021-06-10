// Contient toutes le javascript

console.log("test");

document.getElementById("fieldSearch").style.display = "none";

var affichermasquer = 0;

console.log(affichermasquer);

document.getElementById("buttonSearch").addEventListener("click", function()

    {
        affichermasquer++;
        console.log(affichermasquer);
        if (affichermasquer % 2 == 0) {
            document.getElementById("fieldSearch").style.display = "none";
        } else {
            document.getElementById("fieldSearch").style.display = "block";
        }
    })
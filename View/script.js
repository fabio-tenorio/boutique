// js de perma

document.getElementById("close_form_contact").addEventListener("click", closeContactForm);
var insideForm = document.getElementById("contact_section");
var contactButtons = document.getElementsByClassName("formcontact")
for (let button=0; button < contactButtons.length; button++) {
    contactButtons[button].addEventListener("click", showContactForm, false);
}

function showContactForm() {
    document.getElementById("contact_section").className = 'contact_section_show';
    // hideIfShown = true;
    // return hideIfShown;
}

function closeContactForm() {
    document.getElementById("contact_section").className = 'contact_section_hide';
    // hideIfShown = false;
    // return hideIfShown;
}

// Contient toutes le javascript

console.log('OK')

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
            search.name = "buttonregex";
            search.innerHTML = "rechercher";
            document.getElementById("formSearch").appendChild(search)
            document.getElementById("formSearch")
        }
    }
)

$(document).on('input', '#fieldSearch', function() {
    let inputVal = $(this).val()
})
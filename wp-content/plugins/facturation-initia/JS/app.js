function show(indice, indice2)
{
    if (document.getElementById(indice).style.display==="none") {	// Si la zone indiqué par indice est est invisible
        document.getElementById(indice).style.display = "block"; // On l'affiche
        document.getElementById(indice2).style.display = "none"; //On efface le lien
    }
    else									// Sinon (elle est donc visible)
        document.getElementById(indice).style.display="none";		//On la rend invisible
}

function showFlex(indice, indice2)
{
    if (document.getElementById(indice).style.display==="none") {	// Si la zone indiqué par indice est est invisible
        document.getElementById(indice).style.display = "flex"; // On l'affiche
        document.getElementById(indice2).style.display = "none"; //On efface le lien
    }
    else									// Sinon (elle est donc visible)
        document.getElementById(indice).style.display="none";		//On la rend invisible
}



function addLigne(idChamp, tarifCarteVoyage)
{
    var conteneur = document.getElementById(idChamp);

    var ligne = document.createElement('form');
        // ligne.setAttribute('action', '?ctrl=CarteVoyage&amp;action=insertCarteVoyage');
        ligne.setAttribute('method', 'post');

    var price = document.createElement('select');
        price.setAttribute('name', 'price');
        for (i=0; i<tarifCarteVoyage.length; i++) {
            option = document.createElement('option');
            option.text = tarifCarteVoyage[i]['tarif_tcv'];
            price.add(option);
        }

    var reference = document.createElement('input');
        reference.setAttribute('type', 'text');
        reference.setAttribute('name', 'reference');

    var date = document.createElement('input');
        date.setAttribute('type', 'date');
        date.setAttribute('name', 'start_date');

    var plus = document.createElement('a');
        plus.textContent = '+';
        plus.setAttribute('href', '#');
        plus.setAttribute('id', 'plus');
        plus.setAttribute('style', 'display:inline-block;');
        plus.setAttribute('onClick', 'addLigne(\'show\', \'tarifCarteVoyage\');');

        console.log(plus);

    var annuler = document.createElement('button');
        annuler.setAttribute('name', 'annuler');
        annuler.setAttribute('class', 'annuler');
        annuler.innerHTML = 'Annuler';
        annuler.setAttribute('onClick', 'show(\'lien\', \'show\'); return false;');


    ligne.appendChild(price);
    ligne.appendChild(reference);
    ligne.appendChild(date);
    ligne.appendChild(plus);
    ligne.appendChild(annuler);
    conteneur.appendChild(ligne);
    $.each($("#plus"), function () {
        $(this).hide();
    })

}

function hide(indice)
{
    if (document.getElementById(indice).style.display==="inline-block") {
        document.getElementById(indice).style.display = "none";
    }


}
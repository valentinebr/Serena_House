function show(indice, indice2, display)
{
    if (document.getElementById(indice).style.display==="none") {	// Si la zone indiqué par indice est est invisible
        if (display === "block") {
            document.getElementById(indice).style.display = "block"; // On l'affiche
        } else if (display === "flex") {
            document.getElementById(indice).style.display = "flex"; // On l'affiche
        } else if (display === "inline-block") {
            document.getElementById(indice).style.display = "inline-block"; //On l'affiche
        }
        document.getElementById(indice2).style.display = "none"; //On efface le lien
    }
    else									// Sinon (elle est donc visible)
        document.getElementById(indice).style.display="none";		//On la rend invisible
}



function addLigne(idChamp, tarifCarteVoyage)
{
    var tarifs;
    var forms = document.getElementById('forms');

    var div = idChamp.split('-');
    var num = parseInt(div[1]) + 1;
    var nomDiv = div[0] + '-' + num;

    if (typeof (tarifCarteVoyage) === "string") {
        tarifCarteVoyage = tarifCarteVoyage.split(',');
    }

    var conteneur = document.createElement('div');
    conteneur.id = nomDiv;

    var ligne = document.createElement('form');
        // ligne.setAttribute('action', '?ctrl=CarteVoyage&amp;action=insertCarteVoyage');
        ligne.setAttribute('method', 'post');

    var price = document.createElement('select');
        price.setAttribute('name', 'price');
        for (i=0; i<tarifCarteVoyage.length; i++) {
            if (div[1] == 1) {
                if (i === 0) {
                    tarifs = [tarifCarteVoyage[i]['tarif_tcv']];
                } else {
                    tarifs.push(tarifCarteVoyage[i]['tarif_tcv']);
                }
            } else {
                tarifs = tarifCarteVoyage;
            }

            option = document.createElement('option');
            option.text = tarifs[i];
            price.add(option);
        }

    var reference = document.createElement('input');
        reference.setAttribute('type', 'text');
        reference.setAttribute('name', 'reference');

    var date = document.createElement('input');
        date.setAttribute('type', 'date');
        date.setAttribute('name', 'start_date');

        var tarifsString = tarifs.join();

    var plus = document.createElement('a');
        plus.textContent = '+';
        plus.setAttribute('href', '#');
        plus.setAttribute('id', 'plus-' + num);
        plus.setAttribute('style', 'display:inline-block;');
        plus.setAttribute('onClick', 'addLigne(\'' + nomDiv + '\', \'' + tarifsString + '\'); hide(\'plus-' + num +'\')');
        console.log(plus);

    var annuler = document.createElement('button');
        annuler.setAttribute('name', 'annuler');
        annuler.setAttribute('class', 'annuler');
        annuler.innerHTML = 'Annuler';
        annuler.setAttribute('onClick', 'show(\'plus-' + div[1] +'\',\''+ nomDiv + '\', \'inline-block\'); return false;');


    ligne.appendChild(price);
    ligne.appendChild(reference);
    ligne.appendChild(date);
    ligne.appendChild(plus);
    ligne.appendChild(annuler);
    conteneur.appendChild(ligne);
    forms.appendChild(conteneur);

}

function hide(indice)
{
    if (document.getElementById(indice).style.display==="inline-block") {
        document.getElementById(indice).style.display = "none";
    }


}
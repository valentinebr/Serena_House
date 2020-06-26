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
    var showPlus = parseInt(div[1]);

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


    var annuler = document.createElement('button');
        annuler.setAttribute('name', 'annuler');
        annuler.setAttribute('class', 'annuler');
        annuler.innerHTML = 'Annuler';
        annuler.setAttribute('onClick', 'deleteLigne(\''+ nomDiv + '\', \'plus-' + showPlus +'\'); return false;');

        console.log(nomDiv);
        console.log(div);
        console.log(plus);
        console.log(annuler);

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

function deleteLigne(indice, indice2)
{
        document.getElementById(indice).remove();
    if (document.getElementById(indice2).style.display==="none"){
        document.getElementById(indice2).style.display = "inline-block";
    }
}

function modifierTiny(modifier, tiny, tinyHouses) {
    /* Efface l'attribut checked des checkboxs */
        var checkboxs = document.getElementsByClassName('tarif');
        Array.prototype.forEach.call(checkboxs, function(element) {element.checked = false});

    /* Affiche le formulaire modifier */
        document.getElementById(modifier).style.display = "block";

        /* Donne les valeurs de la ligne à modifier au formulaire */
        document.getElementById('id-modif').setAttribute('value', tiny['id_tiny']);
        document.getElementById('nom-modif').setAttribute('value', tiny['nom_tiny']);
        document.getElementById('nb-places-modif').setAttribute('value', tiny['nombre_places_tiny']);
        tinyHouses.forEach(function (element) {
            if (element['nom_tiny'] === tiny['nom_tiny']) {
                document.getElementById('tarif-'+element['id_nuitee']).checked = true;
            }
        })

}
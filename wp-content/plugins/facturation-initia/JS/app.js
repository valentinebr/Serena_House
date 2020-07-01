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
        ligne.setAttribute('action', '?ctrl=CarteVoyage&amp;action=insertCarteVoyage');
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

function addLigneTCV(idChamp){
    var formsTCV = document.getElementById('forms-tcv');

    var divTCV = idChamp.split('-');
    var numTCV = parseInt(divTCV[1]) + 1;
    var nomDivTCV = divTCV[0] + '-' + numTCV;
    var showPlusTCV = parseInt(divTCV[1]);

    var conteneurTCV = document.createElement('div');
    conteneurTCV.id = nomDivTCV;

    var ligneTCV = document.createElement('form');
        // ligne.setAttribute('action', '?ctrl=CarteVoyage&amp;action=insertTarifCarteVoyage');
        ligneTCV.setAttribute('method', 'post');

    var labelTCV = document.createElement('label');
        labelTCV.setAttribute('for', 'label');
        labelTCV.innerHTML = 'Tarif : '

    var tarifTCV = document.createElement('input');
        tarifTCV.setAttribute('type', 'number');
        tarifTCV.setAttribute('name', 'tarifTCV');

    var plusTCV = document.createElement('a');
        plusTCV.textContent = '+';
        plusTCV.setAttribute('href', '#');
        plusTCV.setAttribute('id', 'plus-tcv-' + numTCV);
        plusTCV.setAttribute('style', 'display:inline-block;');
        plusTCV.setAttribute('onClick', 'addLigneTCV(\'' + nomDivTCV + '\'); hide(\'plus-tcv-' + numTCV +'\')');

    var annulerTCV = document.createElement('button');
        annulerTCV.setAttribute('name', 'annulerTCV');
        annulerTCV.setAttribute('class', 'annuler');
        annulerTCV.innerHTML = 'Annuler';
        annulerTCV.setAttribute('onClick', 'deleteLigne(\''+ nomDivTCV + '\', \'plus-tcv-' + showPlusTCV +'\'); return false;');


    ligneTCV.appendChild(labelTCV);
    ligneTCV.appendChild(tarifTCV);
    ligneTCV.appendChild(plusTCV);
    ligneTCV.appendChild(annulerTCV);
    conteneurTCV.appendChild(ligneTCV);
    formsTCV.appendChild(conteneurTCV);
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


function affichageFacture(type, tab, value) {

        if (type === 'nuitée') {
            document.getElementById('quantite-nuitee-'+tab['id_nuitee']).textContent = value;

            var prixHT = tab['tarif_nuitee'] * value;
            document.getElementById('tarif-ht-nuitee-'+tab['id_nuitee']).textContent = prixHT;

            var prixTaxe = tab['taux_taxe']*prixHT/100;
            document.getElementById('tarif-taxe-nuitee-'+tab['id_nuitee']).textContent = prixTaxe;            var prixTaxe = tab['taux_taxe']*prixHT/100;

            var prixTTC = prixHT + prixTaxe;
            document.getElementById('tarif-ttc-nuitee-'+tab['id_nuitee']).textContent = prixTTC;

        } else if (type === 'service') {
            document.getElementById('quantite-service-'+tab['id_tsrv']).textContent = value;

            var prixHT = tab['prix_ht_tsrv'] * value;
            document.getElementById('tarif-ht-service-'+tab['id_tsrv']).textContent = prixHT;

            var prixTaxe = tab['taux_taxe']*prixHT/100;
            document.getElementById('tarif-taxe-service-'+tab['id_tsrv']).textContent = prixTaxe;

            var prixTTC = prixHT + prixTaxe;
            document.getElementById('tarif-ttc-service-'+tab['id_tsrv']).textContent = prixTTC;

        }
}


function calculTotal(nth, services) {
        var totalQuantite = 0;
        var totalPrixUnitaireHT = 0;
        var totalTVA = 0;
        var totalPrixTTC = 0;
        nth.foreach(function (element) {
            totalQuantite += document.getElementById('quantite-nuitee-' + element['id_nuitee']).textContent;
            alert(totalQuantite);
        });
}
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

function addLigne(idChamp)
{
    var conteneur = document.getElementById(idChamp);

    var ligne = document.createElement('form');
        // ligne.setAttribute('action', '?ctrl=CarteVoyage&amp;action=insertCarteVoyage');
        ligne.setAttribute('method', 'post');

    var price = document.createElement('select');
        price.setAttribute('name', 'price');

    var reference = document.createElement('input');
        reference.setAttribute('type', 'text');
        reference.setAttribute('name', 'reference');

    var date = document.createElement('input');
        date.setAttribute('type', 'date');
        date.setAttribute('name', 'date');

    var plus = document.createElement('a');
        plus.textContent = '+';
        plus.setAttribute('href', '#')
        plus.setAttribute('id', 'plus');
        plus.setAttribute('onClick', 'addLigne(show);')

    ligne.appendChild(price);
    ligne.appendChild(reference);
    ligne.appendChild(date);
    ligne.appendChild(plus);
    conteneur.appendChild(ligne);
}
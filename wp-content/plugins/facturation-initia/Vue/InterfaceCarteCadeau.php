<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cartes voyage</title>
</head>
<body>

<table>
    <tr>
        <th>Carte</th>
        <th>Référence</th>
        <th>Date de la vente</th>
    </tr>
    <!-- if le + ou le valider est cliqué -->
    <tr>
        <td>50€</td>
        <td>46EO2VO</td>
        <td>02/06/2020</td>
    </tr>
    <!-- if le lien est cliqué -->
    <tr>
        <td>
            <select>
                <option>50€</option>
                <option>100€</option>
                <option>150€</option>
            </select>
        </td>
        <td>
            <input type="text">
        </td>
        <td><input type="date"></td>
        <td><a href="#">+</a></td>
    </tr>

</table>

<a href="#">Ajouter une carte voyage</a>

<input type="submit" value="Valider">
<button type="button">Retour</button>

</body>
</html>


<h1>Tarifs Carte Voyage</h1>

<div class="container">
    <div id="forms-tcv">
        <div id="tcv-1" style="display:none;">
            <form action="" method="post">
                <th><label for="new-tarif">Tarif : </label></th>

                <tr>
                    <td><input type="text" id="new-tarif" name="new-tarif"></td>
                    <td><a href="#" id="plus-tcv-1" style="display:inline-block;" onclick="addLigneTCV('tcv-1'); hide('plus-tcv-1');">+</a></td>
                </tr>

                <input type="submit" value="Valider">
                <button name="annuler-tarif" class="annuler" onclick="show('lien-2', 'tcv-1', 'block'); return false;">Annuler</button>
            </form>
        </div>
    </div>

    <div style="display: flex;">
        <a href="#" id="lien-2" onclick="show('tcv-1', 'lien-2', 'block'); return false;">Ajouter une Carte Voyage</a>
        <button name="retour">Retour</button>
    </div>

</div>


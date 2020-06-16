<?php

?>
    <h1>Gestion de la société</h1>

    <h2>Informations</h2>

    <p>Veuillez renseigner les informations sur votre société</p>

    <form action="?ctrl=Societe&amp;action=updateSociete" method="post">
        <table class="form-table">
            <tr>
                <th><label for="nom_ste">Société</label></th>
                <td><input type="text" name="nom_ste" id="nom_ste" value="<?php echo $societe[0]->nom_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="numero_ste">Numéro Société</label></th>
                <td><input type="text" name="numero_ste" id="numero_ste" value="<?php echo $societe[0]->numero_ste ?>"></td>
            </tr>

            <tr>
                <th><label for="adresse_societe">Adresse société</label></th>
                <td><input type="text" name="adresse_societe" id="adresse_societe" value="<?php echo $societe[0]->adresse_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="code_postal_ste">Code Postal</label></th>
                <td><input type="text" name="code_postal_ste" id="code_postal_ste" value="<?php echo $societe[0]->code_postal_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="ville_ste">Ville</label></th>
                <td><input type="text" name="ville_ste" id="ville_ste" value="<?php echo $societe[0]->ville_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="telephone_ste">Téléphone</label></th>
                <td><input type="text" name="telephone_ste" id="telephone_ste" value="<?php echo $societe[0]->telephone_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="tiny_house_ste">Tiny House</label></th>
                <td><input type="text" name="tiny_house_ste" id="tiny_house_ste" value="<?php echo $societe[0]->tiny_house_ste; ?>"></td>
            </tr>
        </table>
        <?php
        submit_button();
        ?>
    </form>
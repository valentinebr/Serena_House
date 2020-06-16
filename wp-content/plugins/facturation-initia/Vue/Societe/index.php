<?php

?>
    <h1>Gestion de la société</h1>

    <h2>Informations</h2>

    <p>Veuillez renseigner les informations sur votre société</p>

    <form action="" method="post">
        <table class="form-table">
            <tr>
                <th><label for="societe">Société</label></th>
                <td><input type="text" name="societe" id="societe" value="<?php echo $societe[0]->nom_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="numero_societe">Numéro Société</label></th>
                <td><input type="text" name="numero_societe" id="numero_societe" value="<?php echo $societe[0]->numero_ste ?>"></td>
            </tr>

            <tr>
                <th><label for="adresse_societe">Adresse société</label></th>
                <td><input type="text" name="adresse_societe" id="adresse_societe" value="<?php echo $societe[0]->adresse_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="cp">Code Postal</label></th>
                <td><input type="text" name="cp" id="cp" value="<?php echo $societe[0]->code_postal_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="ville">Ville</label></th>
                <td><input type="text" name="ville" id="ville" value="<?php echo $societe[0]->ville_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="numero_tel_societe">Téléphone</label></th>
                <td><input type="text" name="numero_tel_societe" id="numero_tel_societe" value="<?php echo $societe[0]->telephone_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="tiny_house">Tiny House</label></th>
                <td><input type="text" name="tiny_house" id="tiny_house" value="<?php echo $societe[0]->tiny_house_ste; ?>"></td>
            </tr>
        </table>
        <?php
        submit_button();
        ?>
    </form>
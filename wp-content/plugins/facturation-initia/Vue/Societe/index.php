<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlSociete.php';

$titre = 'Ma société';

$current_user = get_current_user_id();
if ($current_user == 0){
    echo 'Pas connecté';
} else {
    echo 'Connecté en tant que '.$current_user;
}

ob_start();
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
                <td><input type="tel" name="telephone_ste" id="telephone_ste" value="<?php echo $societe[0]->telephone_ste; ?>"></td>
            </tr>

            <tr>
                <th><label for="tiny_house_ste">Tiny House</label></th>
                <td>
                    <select name="tiny_house_ste">
                        <?php foreach ($tinyHouse as $t) { ?>
                            <option value="<?php echo $t->id_tiny ?>"
                                <?php if ($t->id_tiny == $societe[0]->id_tiny) {
                                    echo 'selected';
                                } ?>
                            >
                                <?php echo $t->nom_tiny ?>
                            </option>
                        <?php }?>
                    </select>


                </td>
            </tr>
        </table>

        <input type="submit" name="modifier" value="Enregistrer les modifications">
    </form>


    <h2>Ajouter une société</h2>

    <p>Veuillez renseigner les informations sur votre société</p>

    <form action="?ctrl=Societe&amp;action=insertSociete" method="post">
        <table class="form-table">
            <tr>
                <th><label for="nom_ste">Société</label></th>
                <td><input type="text" name="nom_ste" id="nom_ste"></td>
            </tr>

            <tr>
                <th><label for="numero_ste">Numéro Société</label></th>
                <td><input type="text" name="numero_ste" id="numero_ste"></td>
            </tr>

            <tr>
                <th><label for="adresse_societe">Adresse société</label></th>
                <td><input type="text" name="adresse_societe" id="adresse_societe"></td>
            </tr>

            <tr>
                <th><label for="code_postal_ste">Code Postal</label></th>
                <td><input type="text" name="code_postal_ste" id="code_postal_ste"></td>
            </tr>

            <tr>
                <th><label for="ville_ste">Ville</label></th>
                <td><input type="text" name="ville_ste" id="ville_ste"></td>
            </tr>

            <tr>
                <th><label for="telephone_ste">Téléphone</label></th>
                <td><input type="tel" name="telephone_ste" id="telephone_ste"></td>
            </tr>

            <tr>
                <th><label for="tiny_house_ste">Tiny House</label></th>
                <td>
                    <select name="tiny_house_ste">
                        <?php foreach ($tinyHouse as $t) { ?>
                                <option value="<?php echo $t->id_tiny ?>"><?php echo $t->nom_tiny ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
        </table>

        <input type="submit" name="ajouter" value="Ajouter la société">
    </form>


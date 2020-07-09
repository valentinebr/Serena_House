<?php
require_once __ROOT__.'/facturation-initia/Controller/CtrlSociete.php';

$titre = 'Liste des sociétés';

ob_start();

print_r($allSociete[0]);
?>

<h2>Choisissez la société</h2>

<div class="container">
    <form action="?ctrl=Societe&amp;action=societeById" method="get">
            <tr>
                <th><label for="nom_ste">Société</label></th>
                <td>
                    <select name="nom_ste" id="nom_ste">
                            <option value="selection" selected disabled hidden>Sélectionnez la société</option>
                        <?php foreach ($allSociete as $as) { ?>
                            <option value="<?php echo $as->id_ste ?>"><?php echo $as->nom_ste ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

        <div id="infos-societe" style="display: none">
            <table>
                <tr>
                    <th><label for="numero_ste">Numéro Société</label></th>
                    <td><input type="text" name="numero_ste" id="numero_ste"></td>
                </tr>

                <tr>
                    <th><label for="adresse_ste">Adresse société</label></th>
                    <td><input type="text" name="adresse_ste" id="adresse_ste"></td>
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
                        <select name="tiny_house_ste" id="tiny_house_ste">
                                <option></option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>


<script>
    document.getElementById('nom_ste').onchange =
        function(){

            var select = document.getElementById('nom_ste');
            var req = $.ajax({
                type: "GET",
                url: '?ctrl=Societe&action=societeById',
                dataType: 'json',
                data: {id: select.value}
            })
                .done(function (data){
                    document.getElementById('infos-societe').style.display = "block";
                    document.getElementById('numero_ste').value = data.numero_ste;
                    document.getElementById('adresse_ste').value = data.adresse_ste;
                    document.getElementById('code_postal_ste').value = data.code_postal_ste;
                    document.getElementById('ville_ste').value = data.ville_ste;
                    document.getElementById('telephone_ste').value = data.telephone_ste;
                    document.getElementById('tiny_house_ste').value = data.tiny_house_ste;
                })
                .fail(function(){
                    alert("Not working...");
               })
    };
</script>
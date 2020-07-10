<?php
/*
Plugin Name: Facturation initia
Description: Un plugin pour gérer la facturation entre les hôtes et initia
Version: 1.0
Author: Valentine Brunet & Fabien Monnet
 */

define('__ROOT__', dirname(dirname(__FILE__)));

class Facturation
{
    /**
     * Facturation constructor.
     */
    public function __construct()
    {
        register_activation_hook(__FILE__, array('Facturation', 'install'));
        register_uninstall_hook(__FILE__, array('Facturation', 'uninstall'));
        add_action('admin_menu', array($this, 'facturation_initia_menu'));
        add_action('admin_menu', array($this, 'facturation_initia_submenu'));
    }

    //////////CREATION DES TABLES A L'ACTIVATION DU PLUGIN//////////

    public static function install()
    {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_taxe (id_taxe INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                libelle_taxe VARCHAR(50) NOT NULL,
                                                                                taux_taxe FLOAT NOT NULL,
                                                                                archive_taxe BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_societe (id_ste INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nom_ste VARCHAR(50) NOT NULL,
                                                                                adresse_ste VARCHAR(100) NOT NULL,
                                                                                code_postal_ste CHAR(5) NOT NULL,
                                                                                ville_ste VARCHAR(20) NOT NULL,
                                                                                telephone_ste CHAR(10) NOT NULL,
                                                                                numero_ste CHAR(14) NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_tiny_house (id_tiny INT AUTO_INCREMENT PRIMARY KEY,
                                                                                nom_tiny VARCHAR(50) NOT NULL,
                                                                                nombre_places_tiny INT NOT NULL,
                                                                                archive_tiny BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_facture (id_fact INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nom_fact VARCHAR(100) NOT NULL,
                                                                                 date_fact DATETIME NOT NULL,
                                                                                 statut_fact VARCHAR(30));");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_service (id_srv INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nombre_srv INT NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_tarif_service (id_tsrv INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nom_tsrv VARCHAR(100) NOT NULL,
                                                                                reference_tsrv VARCHAR(10) NOT NULL,
                                                                                prix_ht_tsrv FLOAT NOT NULL,
                                                                                archive_tsrv BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_tarif_carte_voyage (id_tcv INT AUTO_INCREMENT PRIMARY KEY,
                                                                                nom_tcv VARCHAR(100) NOT NULL, 
                                                                                tarif_tcv FLOAT NOT NULL,
                                                                                archive_tcv BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_tarif_nuitee (id_nuitee INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nom_nuitee VARCHAR(100) NOT NULL,
                                                                                reference_nuitee VARCHAR(10) NOT NULL,
                                                                                nombre_personnes_nuitee INT NOT NULL,
                                                                                tarif_nuitee FLOAT NOT NULL,
                                                                                archive_nuitee BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_nuitee_tiny_house (id_nth INT AUTO_INCREMENT PRIMARY KEY,
                                                                                archive_nth BOOLEAN NOT NULL);");


        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_service 
                        ADD (id_taxe INT NOT NULL,
                        FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_service 
                        ADD (id_user INT NOT NULL,
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_service 
                        ADD (id_tsrv INT,
                        FOREIGN KEY (id_tsrv) REFERENCES {$wpdb->prefix}fact_tarif_service(id_tsrv));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_service 
                        ADD (id_nuitees INT,
                        FOREIGN KEY (id_nuitees) REFERENCES {$wpdb->prefix}fact_tarif_nuitees(id_nuitees));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_service 
                        ADD (id_fact INT NOT NULL,
                        FOREIGN KEY (id_fact) REFERENCES {$wpdb->prefix}fact_facture(id_fact));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_facture 
                        ADD (id_user INT NOT NULL,
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_societe 
                        ADD (id_user INT NOT NULL,
                        CONSTRAINT societe_unique UNIQUE (id_user, numero_ste),
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_societe 
                        ADD (id_tiny INT NOT NULL,
                        FOREIGN KEY (id_tiny) REFERENCES {$wpdb->prefix}fact_tiny_house(id_tiny));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}dopbsp_coupons 
                        ADD (id_tcv INT NOT NULL,
                        CONSTRAINT fk_coupons_carte_voyage FOREIGN KEY (id_tcv) REFERENCES {$wpdb->prefix}fact_tarif_carte_voyage(id_tcv));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_nuitee
                        ADD (id_taxe INT NOT NULL,
                        FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_nuitee_tiny_house
                        ADD (id_nuitee INT NOT NULL,
                        FOREIGN KEY (id_nuitee) REFERENCES {$wpdb->prefix}fact_tarif_nuitee(id_nuitee));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_nuitee_tiny_house
                        ADD (id_tiny INT NOT NULL,
                        FOREIGN KEY (id_tiny) REFERENCES {$wpdb->prefix}fact_tiny_house(id_tiny));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_carte_voyage
                        ADD (id_taxe INT NOT NULL,
                        FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");
    }

    //////////SUPPRESSION DES TABLES A LA SUPPRESSION DU PLUGIN//////////

    public static function uninstall() {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_facture;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_service;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_tarif_service;");
        $wpdb->query("ALTER TABLE {$wpdb->prefix}dopbsp_coupons DROP COLUMN id_taxe");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_taxe;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_nuitee_tiny_house;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_tiny_house;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_societe");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_tarif_carte_voyage");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_tarif_nuitee;");
    }


    //MENU PLUGIN
    public function facturation_initia_menu(){
        array(
            $page_title = 'Facturation Initia',
            $menu_title = 'Facturation Initia',
            $capability = 'manage_options',
            $menu_slug = 'menu-principal',
            $function = 'facturation_initia_page',
            $icon = 'dashicons-building',
            $position = '3',
            $hookname = add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon, $position)
        );

        $sub_menu_items = $this->facturation_initia_submenu();

        foreach ($sub_menu_items as $menu_item) {
            if ($menu_item['create_submenu']) add_submenu_page('menu-principal', $menu_item['page_title'],
                $menu_item['menu_title'], $menu_item['capability'], $menu_item['menu_slug'], $menu_item['function']);
        }
    }

    public function facturation_initia_submenu(){
        $sub_menu_items = array(
            array(
                'parent_slug'    => 'menu-principal',
                'page_title'     => 'Liste des Sociétés',
                'menu_title'     => 'Admin Sociétés',
                'capability'     => 'administrator',
                'menu_slug'      => 'administration-societe',
                'function'       => array($this, 'indexAdminSociete'),
                'create_submenu' => true,
            ),
            array(
                'parent_slug'    => 'menu-principal',
                'page_title'     => 'Gestion de la Société',
                'menu_title'     => 'Société',
                'capability'     => 'manage_options',
                'menu_slug'      => 'societe',
                'function'       => array($this, 'indexSociete'),
                'create_submenu' => true,
            ),
            array(
                'parent_slug'    => 'menu-principal',
                'page_title'     => 'Carte Voyage',
                'menu_title'     => 'Carte Voyage',
                'capability'     => 'manage_options',
                'menu_slug'      => 'carte-voyage',
                'function'       => array($this, 'indexCarteVoyage'),
                'create_submenu' => true,
            ),
            array(
                'parent_slug'    => 'menu-principal',
                'page_title'     => 'Facture',
                'menu_title'     => 'Facture',
                'capability'     => 'manage_options',
                'menu_slug'      => 'facture',
                'function'       => array($this, 'indexFacture'),
                'create_submenu' => true,
            ),
        );

        return $sub_menu_items;
    }

    function indexAdminSociete(){
        echo '<h1>'.get_admin_page_title().'</h1>';
        echo 'Username : '.wp_get_current_user()->display_name.' | User ID : '.get_current_user_id();

        include 'http://localhost/Serena_House/wp-content/plugins/facturation-initia/index.php?ctrl=Societe&amp;action=listeSociete';
    }

    function indexSociete(){
        //    $fichier = file_get_contents('http://localhost/Serena_House/wp-content/plugins/facturation-initia/index.php?ctrl=Societe');
        include 'http://localhost/Serena_House/wp-content/plugins/facturation-initia/index.php?ctrl=Societe';
    }

    function indexCarteVoyage(){
        include 'http://localhost/Serena_House/wp-content/plugins/facturation-initia/index.php?ctrl=CarteVoyage';
    }

    function indexFacture(){
        include 'http://localhost/Serena_House/wp-content/plugins/facturation-initia/index.php?ctrl=Facture';
    }


    //require_once (__ROOT__.'/facturation-initia/Modele/Societe.php');

    function facturation_initia_page(){
        echo '<h1>'.get_admin_page_title().'</h1>';
    }

}

new Facturation();


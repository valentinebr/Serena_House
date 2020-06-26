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
                                                                                archive_tiny BOOLEAN NOT NULL,
                                                                                CONSTRAINT tiny_house_unique UNIQUE (nom_tiny))");
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
                                                                                tarif_tcv FLOAT NOT NULL,
                                                                                archive_tcv BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_tarif_nuitee (id_nuitee INT AUTO_INCREMENT PRIMARY KEY, 
                                                                                nom_nuitee VARCHAR(100) NOT NULL,
                                                                                nombre_personnes_nuitee INT NOT NULL,
                                                                                tarif_nuitee FLOAT NOT NULL,
                                                                                archive_nuitee BOOLEAN NOT NULL);");
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}fact_nuitee_tiny_house (id_nth INT AUTO_INCREMENT PRIMARY KEY);");


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
                        ADD (id_taxe INT NOT NULL,
                        CONSTRAINT fk_coupons_taxe FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_nuitee
                        ADD (id_taxe INT NOT NULL,
                        FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_nuitee_tiny_house
                        ADD (id_nuitee INT NOT NULL,
                        FOREIGN KEY (id_nuitee) REFERENCES {$wpdb->prefix}fact_tarif_nuitee(id_nuitee));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_nuitee_tiny_house
                        ADD (id_tiny INT NOT NULL,
                        FOREIGN KEY (id_tiny) REFERENCES {$wpdb->prefix}fact_tiny_house(id_tiny));");
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

}

new Facturation();

//MENU PLUGIN
function facturation_initia_menu(){
    add_menu_page(  'Facturation Initia',
        'Facturation Initia',
        'manage_options',
        'menu-principal',
        'facturation_initia_page',
        'dashicons-building',
        '3'
    );
    add_submenu_page(   'menu-principal',
        'Accueil',
        'Accueil',
        'manage_options',
        'menu-principal'
    );
    add_submenu_page(   'menu-principal',
        'Société',
        'Société',
        'manage_options',
        'menu-societe',
        'index'
    );
}

add_action('admin_menu', 'facturation_initia_menu');
require_once (__ROOT__.'/facturation-initia/Modele/Societe.php');


function facturation_initia_page(){
    echo '<h1>'.get_admin_page_title().'</h1>';
}
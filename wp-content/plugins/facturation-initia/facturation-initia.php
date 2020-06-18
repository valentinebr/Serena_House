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
                                                                                numero_ste CHAR(14) NOT NULL,
                                                                                tiny_house_ste VARCHAR(30) NOT NULL);");
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
        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_service 
                        ADD (id_taxe INT NOT NULL,
                        FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_tarif_service 
                        ADD (id_user INT NOT NULL,
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_service 
                        ADD (id_tsrv INT NOT NULL,
                        FOREIGN KEY (id_tsrv) REFERENCES {$wpdb->prefix}fact_tarif_service(id_tsrv));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_service 
                        ADD (id_fact INT NOT NULL,
                        FOREIGN KEY (id_fact) REFERENCES {$wpdb->prefix}fact_facture(id_fact));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_facture 
                        ADD (id_user INT NOT NULL,
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}fact_societe 
                        ADD (id_user INT NOT NULL,
                        FOREIGN KEY (id_user) REFERENCES {$wpdb->prefix}users(id));");

        $wpdb->query("ALTER TABLE {$wpdb->prefix}dopbsp_coupons 
                        ADD (id_taxe INT NOT NULL,
                        CONSTRAINT fk_coupons_taxe FOREIGN KEY (id_taxe) REFERENCES {$wpdb->prefix}fact_taxe(id_taxe));");
    }

    //////////SUPPRESSION DES TABLES A LA SUPPRESSION DU PLUGIN//////////

    public static function uninstall() {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_facture;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_service;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_tarif_service;");
        $wpdb->query("ALTER TABLE {$wpdb->prefix}dopbsp_coupons DROP COLUMN id_taxe");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_taxe;");
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}fact_societe");

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
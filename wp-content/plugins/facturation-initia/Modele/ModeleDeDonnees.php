<?php


class ModeleDeDonnees
{

    protected function executerInsert ($table, $datas, $format) {
        global $wpdb;

        $wpdb->insert( $table, $datas, $format);

        return $wpdb->insert_id;
    }

    protected function executerGetResults ($sql, $datas) {
        global $wpdb;

        $req = $wpdb->prepare($sql, $datas);

        return $wpdb->get_results($req);

    }

    protected function executerUpdate($sql, $datas, $format){
        global $wpdb;

        $wpdb->update($sql, $datas, $format);

        return $wpdb->update_id;

    }


}
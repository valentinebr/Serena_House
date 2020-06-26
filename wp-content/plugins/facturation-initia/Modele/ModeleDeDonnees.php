<?php


class ModeleDeDonnees
{

    protected function executerInsert ($table, $datas) {
        global $wpdb;

        $wpdb->insert($table, $datas);

        return $wpdb->insert_id;
    }

    protected function executerGetResults ($sql, $datas) {
    global $wpdb;

    $req = $wpdb->prepare($sql, $datas);

    return $wpdb->get_results($req);

}

    protected function executerGetRow ($sql) {
        global $wpdb;

        $req = $wpdb->prepare($sql);

        return $wpdb->get_row($req);

    }

    protected function executerUpdate($table, $datas, $where){
        global $wpdb;

        $wpdb->update($table, $datas, $where);

        return $wpdb->update_id;

    }


}
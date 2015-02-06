<?php

class Inicio_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    function get_modulos() {
        $sql = "SELECT mod_id as id,mod_clave as clave, mod_nombre as nombre, mod_url as url,mod_imagen as imagen, mod_imagenhover, mod_icon as icon
FROM acl_modulo
order by mod_orden";
        return $this->db->query($sql)->result_array();
    }

}

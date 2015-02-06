<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acercade extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('acceso_model');
        $data_menu=$this->acceso_model->get_iconModulo('acd');
        $datos['nombre_modulo']=$data_menu['nombre'];
        $datos['icon_modulo']= $data_menu['icon'];
        $datos['contenido'] = $this->load->view('acercade_view', FALSE, TRUE);
        $this->load->view('plantilla', $datos);
    }

}
?>
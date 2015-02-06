<?php

/**
 * Archivo controller inicio contiene funciones en la página de inicio.
 *
 * @package    AdminreWeb
 * @subpackage Inicio
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    function __construct() {
        parent::__construct();
        //validar session
        $clv_sess = $this->config->item('clv_sess');
        $user_id = $this->session->userdata('user_id' . $clv_sess);
         $this->load->model('inicio_model');
        if (!$user_id) {
            redirect('acceso');   
        }
    }

    function index() {
        $this->load->library('ci_acl_framew');
        $this->load->model('acceso_model');
        $clv_sess = $this->config->item('clv_sess');
        $user_id = $this->session->userdata('user_id' . $clv_sess);
         $permisos_db = $this->acceso_model->get_permisosUsuario($user_id);
        $data['modulos']=$this->inicio_model->get_modulos() ;
        $data['permisos']=$this->ci_acl_framew->get_parse_array_permisos($permisos_db) ;
        $datos['contenido'] = $this->load->view('inicio_view', $data, true);
        $this->load->view('plantilla', $datos);
    }

}

?>

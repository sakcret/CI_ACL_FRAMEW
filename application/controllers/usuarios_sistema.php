<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_sistema extends CI_Controller {

    function __construct() {
        parent::__construct();
        $clv_sess = $this->config->item('clv_sess');
        $user_id = $this->session->userdata('user_id' . $clv_sess);
        if (!$user_id) {
            redirect('acceso');
        }
        $this->load->model("usuarios_sistema_model");
    }

    public function index() {
        $this->load->model("acceso_model");
        $data_menu = $this->acceso_model->get_iconModulo('usu');
        $datos['nombre_modulo'] = $data_menu['nombre'];
        $datos['icon_modulo'] = $data_menu['icon'];
        $datos_vista_usuario['modulos'] = $this->parser_modulos();
        $datos['contenido'] = $this->load->view('usuarios_sistema/usuarios_sistema_view', $datos_vista_usuario, true);
        $this->load->view('plantilla', $datos);
    }

    public function datos() {
        $clv_sess = $this->config->item('clv_sess');
        $login = $this->session->userdata('login' . $clv_sess);
        if (!$login) {
            redirect('acceso/acceso_denegado');
        }
        $this->load->model('generico_model');
        $sIndexColumn = "usu_id";
        $aColumns = array($sIndexColumn, 'usu_login', 'CONCAT(COALESCE(usu_nombre,"")," ",COALESCE(usu_apaterno,"")," ",COALESCE(usu_amaterno,""))', 'rol_nombre', 'usu_correo', 'concat("(",usu_lada,") ",usu_telefono)', 'usu_celular', 'case usu_estatuscuenta when 1 then \'Activa\' when 0 then \'Inactiva\' end');
        $sTable = "acl_usuario";

        /* Generar limits con paginacion */
        $sLimit = "";
        $iDisplayStart = $this->input->post('iDisplayStart');
        $iDisplayLength = $this->input->post('iDisplayLength');
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . $this->input->post('iDisplayStart') . ", " .
                    $this->input->post('iDisplayLength');
        }
        /* order */
        $iSortCol_0 = $this->input->post('iSortCol_0');
        if (isset($iSortCol_0)) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($this->input->post('iSortingCols')); $i++) {
                if ($this->input->post('bSortable_' . intval($this->input->post('iSortCol_' . $i))) == "true") {
                    $sOrder .= $aColumns[intval($this->input->post('iSortCol_' . $i))] . "
				 	" . $this->input->post('sSortDir_' . $i) . ", ";
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }
        /* Generar limits con paginacion */
        $sWhere = "";
        if ($this->input->post('sSearch') != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->input->post('sSearch') . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }
        for ($i = 0; $i < count($aColumns); $i++) {
            if ($this->input->post('bSearchable_' . $i) == "true" && $this->input->post('sSearch_' . $i) != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . $this->input->post('sSearch_' . $i) . "%' ";
            }
        }
        $rResult = $this->usuarios_sistema_model->get_datos($aColumns, $sTable, $sWhere, $sOrder, $sLimit);
        $aResultFilterTotal = $this->generico_model->numFilasSQL()->row_array();
        $iFilteredTotal = $aResultFilterTotal['filas'];
        $aResultTotal = $this->generico_model->countResults($sIndexColumn, $sTable)->row_array();
        $iTotal = $aResultTotal['numreg'];
        $sOutput = '{';
        $sOutput .= '"sEcho": ' . intval($this->input->post('sEcho')) . ', ';
        $sOutput .= '"iTotalRecords": ' . $iTotal . ', ';
        $sOutput .= '"iTotalDisplayRecords": ' . $iFilteredTotal . ', ';
        $sOutput .= '"aaData": [ ';
        for ($x = 0; $x < $rResult->num_rows(); $x++) {
            $aRow = $rResult->row_array($x);
            $row = array();
            $row['DT_RowId'] = 'row_' . $aRow[$sIndexColumn];
            $row['DT_RowClass'] = 'class';
            $sOutput .= "[";
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "usu_rol") {
                    $sOutput .= '"' . str_replace('"', '\"', $aRow[$aColumns[$i]]) . '",';
                } else if ($aColumns[$i] != ' ') {
                    $sOutput .= '"' . str_replace('"', '\"', $aRow[$aColumns[$i]]) . '",';
                }
            }
            $det = "<button class='btn btn-success opcdt' title='Ver detalles' onclick='detalles(" . $aRow[$sIndexColumn] . ")'><i class=' fa fa-list-alt'></i></button>";
            $upd = "<button class='btn btn-warning opcdt' title='Modificar usuario' onclick='modifica(" . $aRow[$sIndexColumn] . ")'><i class=' fa fa-edit'></i></button>";
            $del = "<button class='btn btn-danger opcdt' title='Eliminar usuario' onclick='elimina(" . $aRow[$sIndexColumn] . ")'><i class=' fa fa-remove'></i></button>";
            $per = "<button class='btn btn-info opcdt' title='Ver permisos' onclick='ver_permisos(" . $aRow[$sIndexColumn] . ")'><i class=' fa fa-lock'></i></button>";
            $sOutput .= '"' . str_replace('"', '\"', $upd . $del . $det . $per) . '",';
            $sOutput = substr_replace($sOutput, "", -1);
            $sOutput .= "],";
        }//forn for
        $sOutput = substr_replace($sOutput, "", -1);
        $sOutput .= '] }';

        echo $sOutput;
    }

    public function update($id = 0) {
        $datos = array();
        $log = true;
        if ($id != 0) {
            $datos['datos_modifica'] = $this->usuarios_sistema_model->get_datos_modifica($id);
            if ($log) {
                $datos['datos_modifica']->usuagrego = $this->usuarios_sistema_model->get_usuario_name($datos['datos_modifica']->usuarioagrego);
                $datos['datos_modifica']->usumodifico = $this->usuarios_sistema_model->get_usuario_name($datos['datos_modifica']->usuariomodifico);
            }
        } else {
            $datos['datos_modifica'] = false;
        }
        $datos['roles'] = $this->parser_roles();
        $datos['modulos'] = $this->parser_modulos();
        $datos['contenido'] = $this->load->view('usuarios_sistema/usuarios_sistema_update', $datos, true);
        $this->load->view('plantilla', $datos);
    }

    /*
     * {
      1: {modulos: {1: ["1","2","3"],2: ["6"]},nom: "Super Administrador"},
      2: {modulos: {1: ["1","2","3","4","5"],2: ["6"]},nom: "Administrador"}}
     */

    private function parser_roles() {
        $out = array();
        $data_roles = $this->usuarios_sistema_model->get_roles();
        foreach ($data_roles as $rol) {
            if (!array_key_exists($rol['rolid'], $out)) {
                $out[$rol['rolid']] = array();
                $out[$rol['rolid']]['modulos'] = array();
                $out[$rol['rolid']]['nom'] = $rol['rol'];
                $out[$rol['rolid']]['des'] = $rol['des'];
                if (!array_key_exists($rol['moduloid'], $out[$rol['rolid']]['modulos'])) {
                    $out[$rol['rolid']]['modulos'][$rol['moduloid']] = array();
                    array_push($out[$rol['rolid']]['modulos'][$rol['moduloid']], $rol['permisoid']);
                } else {
                    array_push($out[$rol['rolid']]['modulos'][$rol['moduloid']], $rol['permisoid']);
                }
            } else {
                $out[$rol['rolid']]['nom'] = $rol['rol'];
                if (!array_key_exists($rol['moduloid'], $out[$rol['rolid']]['modulos'])) {
                    $out[$rol['rolid']]['modulos'][$rol['moduloid']] = array();
                    array_push($out[$rol['rolid']]['modulos'][$rol['moduloid']], $rol['permisoid']);
                } else {
                    array_push($out[$rol['rolid']]['modulos'][$rol['moduloid']], $rol['permisoid']);
                }
            }
        }
        return $out;
    }

    /*
     * {"4":{"nom":"Reportes","ico":"<\/i>","permisos":[{"pid":"8","pnom":"Solo consulta","pdes":"Solo se puede consultar"},{"pid":"10","pnom":"Impresi\u00f3n","pdes":"Impresion"},{"pid":"11","pnom":"PDF","pdes":null},{"pid":"12","pnom":"Hoja de calculo","pdes":null}]},"1":{"nom":"Usuarios del sistema","ico":"<\/i>","permisos":[{"pid":"1","pnom":"Agregar","pdes":"Agregar datos de usuarios"},{"pid":"2","pnom":"Actualizar","pdes":"Actualizar datos de usuarios"},{"pid":"3","pnom":"Eliminar","pdes":"Eliminar usuarios"},{"pid":"4","pnom":"Deshabilitar cuenta","pdes":"Deshabilitar cuenta de usuario"},{"pid":"5","pnom":"Solo consulta","pdes":"Solo se puede consultar"},{"pid":"9","pnom":"Reportes","pdes":"Reporte de usuarios"}]},"2":{"nom":"Acerca de","ico":"<\/i>","permisos":[{"pid":"6","pnom":"Solo consulta","pdes":"Solo se puede consultar"}]},"3":{"nom":"Ayuda","ico":"<\/i>","permisos":[{"pid":"7","pnom":"Solo consulta","pdes":"Solo se puede consultar"}]}}
     */

    private function parser_modulos() {
        $out = array();
        $data_modulos = $this->usuarios_sistema_model->get_modulos();
        foreach ($data_modulos as $mod) {
            if (!array_key_exists($mod['moduloid'], $out)) {
                $out[$mod['moduloid']] = array();
                $out[$mod['moduloid']]['nom'] = $mod['modulo'];
                $out[$mod['moduloid']]['ico'] = $mod['moduloicono'];
                $out[$mod['moduloid']]['permisos'] = array();
                array_push($out[$mod['moduloid']]['permisos'], array('pid' => $mod['permisoid'], 'pnom' => $mod['permiso'], 'pdes' => $mod['permisodesc']));
            } else {
                array_push($out[$mod['moduloid']]['permisos'], array('pid' => $mod['permisoid'], 'pnom' => $mod['permiso'], 'pdes' => $mod['permisodesc']));
            }
        }
        return $out;
    }

    private function parser_permisos_modulo_usuario($idusuario) {
        $out = array();
        $data_modulos = $this->usuarios_sistema_model->get_permisos_modulo_usuario($idusuario);
        foreach ($data_modulos as $mod) {
            if (!array_key_exists($mod['moduloid'], $out)) {
                $out[$mod['moduloid']] = array();
                $out[$mod['moduloid']]['permisos'] = array();
                array_push($out[$mod['moduloid']]['permisos'],$mod['permisoid']);
            } else {
                array_push($out[$mod['moduloid']]['permisos'],$mod['permisoid']);
            }
        }
        return $out;
    }

    function permisos() {
        $id = $this->input->post('id');
        echo json_encode(array('resp'=>'ok','permisos_usu'=>$this->parser_permisos_modulo_usuario($id)));
    }
    
    function detalles() {
        $id = $this->input->post('id');
        $datos=$this->usuarios_sistema_model->get_detalles_usuario($id);
        $datos['usuagrego'] = $this->usuarios_sistema_model->get_usuario_name($datos['usuarioagrego']);
        $datos['usumodifico'] = $this->usuarios_sistema_model->get_usuario_name($datos['usuariomodifico']);
        echo json_encode(array('resp'=>'ok','detalles'=>$datos));
    }

    function elimina() {
        $id = $this->input->Post("id");
        $sepudo = $this->usuarios_sistema_model->elimina_usuario_sis($id);
        if ($sepudo) {
            $array_out['resp'] = 'ok';
        } else {
            $array_out['resp'] = 'no';
            $array_out['msg'] = "Se produjo un error al eliminar el usuario.";
        }
        echo json_encode($array_out);
    }

    public function getupdate($id = 0) {
        $jsonresp = array();
        $this->load->library('encrypt');
        $this->load->library('ci_acl_framew');
        $clv_sess = $this->config->item('clv_sess');
        $userid = $this->session->userdata('user_id' . $clv_sess);

        $data_insert['usu_login'] = $this->input->post('login');
        $data_insert['usu_nombre'] = $this->input->post('nombre');
        $data_insert['usu_apaterno'] = $this->input->post('apaterno');
        $data_insert['usu_amaterno'] = $this->input->post('amaterno');
        $pass = $this->input->post('password');
        $data_insert['usu_correo'] = $this->input->post('email');
        $data_insert['usu_estatuscuenta'] = $this->input->post('estado');
        $data_insert['usu_lada'] = $this->input->post('lada');
        $data_insert['usu_telefono'] = $this->input->post('telefono');
        $data_insert['usu_celular'] = $this->input->post('celular');
        $data_insert['usu_rol'] = $this->input->post('rol');
        $permisos_post = $this->input->post('permisos');
        $permisos = FALSE;
        if ($permisos != FALSE) {
            
        }
        if ($id != 0) {
            if ($pass != '') {
                $data_insert['usu_password'] = $this->encrypt->encode($pass);
            }
            $data_insert['usu_usuariomodifico'] = $userid;
            $data_insert['usu_fechamodifico'] = date('Y-m-d');
            $sepudo = $this->usuarios_sistema_model->getModifica($id, $data_insert, $permisos);
            if ($sepudo) {
                $jsonresp['resultado'] = 'ok';
                $jsonresp['mensaje'] = 'Se modificó satisfactoriamente al usuario ' . $data_insert['usu_nombre'];
            } else {
                $jsonresp['resultado'] = 'no';
                $jsonresp['mensaje'] = 'Error al modificar el usuario ' . $data_insert['usu_nombre'];
            }
        } else {
            $data_insert['usu_password'] = $this->encrypt->encode($pass);
            $data_insert['usu_usuarioagrego'] = $userid;
            $data_insert['usu_fechaagrego'] = date('Y-m-d');
            $sepudo = $this->usuarios_sistema_model->getAgrega($data_insert, $permisos);
            if ($sepudo) {
                $jsonresp['resultado'] = 'ok';
                $jsonresp['mensaje'] = 'Se agregó satisfactoriamente al usuario ' . $data_insert['usu_nombre'];
            } else {
                $jsonresp['resultado'] = 'no';
                $jsonresp['mensaje'] = 'Error al agregar el usuario ' . $data_insert['usu_nombre'];
            }
        }
        echo json_encode($jsonresp);
    }

}

?>

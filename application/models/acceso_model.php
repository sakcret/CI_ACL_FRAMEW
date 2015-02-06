<?php

if (!defined('BASEPATH'))
    exit('Acceso denegado');

class Acceso_model extends CI_Model {

    function Acceso_model() {
        parent ::__construct();
        $this->load->database();
    }

    function datoslogin($login) {
        $this->db->select('usu_id as id,usu_login as login,usu_password as password,concat(COALESCE(usu_nombre,"")," ",COALESCE(usu_apaterno,"")) as nombre, rol_clave as rol,usu_estatuscuenta as estatus', false);
        $this->db->from('acl_usuario');
        $this->db->join('acl_rol', 'usu_rol=rol_id', 'left');
        $this->db->where('usu_login', $login);
        $this->db->limit(1);
        return $this->db->get();
    }

    function get_permisosUsuario($idusuario) {
        $sql = "SELECT mod_clave as modulo,per_clave as permiso 
FROM acl_permisos_usuario
join acl_permisos on apu_permiso=per_id
join acl_modulo on per_modulo=mod_id
where apu_usuario=$idusuario "
                . "order by mod_clave";
        return $this->db->query($sql)->result_array();
    }
    
    function get_iconModulo($clave_modulo) {
        $icon="<i class=\"fa fa-square\"></i>";
        $nombre='';
        $sql = "SELECT if(mod_icon!='',
    concat('<i class=\"fa ',mod_icon,'\" ></i>'),
    if(mod_imagen!='',
        concat('<img src=\"./images/modulos/',mod_imagen,'\">'),
        '<i class=\"fa fa-square\"></i>'
    )
) as icon, mod_nombre as nombre
FROM acl_modulo where mod_clave='$clave_modulo'";
        $result=$this->db->query($sql);
        if($result->num_rows()>0){
            $icon=$result->row()->icon;
            $nombre=$result->row()->nombre;
        }
        return array('icon'=>$icon,'nombre'=>$nombre);
    }

}

?>
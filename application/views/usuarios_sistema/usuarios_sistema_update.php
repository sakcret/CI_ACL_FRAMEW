
<?php
$accion = 'AGREGAR';
$id = '0';
$selects_vals = $changerol = '';
$login = $nombre = $apaterno = $amaterno = $email = $telefono = $lada = $celular = $rol = $estado = $permisos = "";
if (isset($datos_modifica) && $datos_modifica != false) {
    $id = $datos_modifica->id;
    $login = $datos_modifica->login;
    $nombre = $datos_modifica->nombre;
    $apaterno = $datos_modifica->apaterno;
    $amaterno = $datos_modifica->amaterno;
    $email = $datos_modifica->email;
    $lada = $datos_modifica->lada;
    $telefono = $datos_modifica->telefono;
    $celular = $datos_modifica->celular;
    $rol = $datos_modifica->rol;
    $estado = $datos_modifica->estado;
    //$permisos = $datos_modifica->permisos;
    if (($rol * 1) != 0) {
        $changerol = '$("#rol").change();';
    }
    $selects_vals.="$('#estado').val($estado); $('#rol').val('$rol'); ";
}

if ($id == '0') {
    $accion = 'AGREGAR';
} else {
    $accion = 'MODIFICAR';
}
?>
<style>
    #div_permisos .panel {  margin-top: 15px; }
    .check_radio{
        height: 34px;
        width: 8%;
        font-size: 14px;
        line-height: 1.428571429;
        color: #555555;
        vertical-align: middle;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #cccccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
        transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }
    .head_modulo {padding: 6px !important;background-color: #848484 !important;color: #fff !important;}
    .head_modulo .ico {width: 20px;float: left;}
    .head_modulo .ico i {font-size: 16px;}
    .head_modulo .ico img {width: 16px !important;}
    .permiso_modulo label {font-weight: 300 !important;color: #595959 !important;}
    .permiso_modulo{padding-left: 10px;}
    .conten_modulo{background-color: #F4F4F4;padding: 0px;margin-left: 18px;margin-top: 10px;border: 1px dotted #C0BEBE; }
    
    #ver_permisos_div{margin-top: 20px;}
    .font_btn_bar{font-size: 20px;}
    #lada_div {padding-right: 0px;padding-left: 0px;}
    #des_rol{display: none;}
    .des_rol {padding: 5px;min-height: 50px;}
    #txt_cambia_pass{font-size: 10px;}
</style>
<div id="panel_mensajes" style=" display: none;">
    <div id="alert_resultado" class="alert"></div>
</div>
<div id="panel_update" class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $accion; ?> USUARIO DEL SISTEMA</div>
        <div class="panel-body">
            <form id="form_update" class="" role="form">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="login" >Login*:</label>
                        <input type="text"  value="<?php echo $login; ?>"name="login" id="login" maxlength="15"  class="form-control required" />
                    </div>
                    <?php if ($id != '0') { ?>
                        <div class="col-md-4" id="no_modifica_pass"><div class="alert alert-warning alert-min"><div id="txt_cambia_pass">La contraseña no se cambiará al menos que se proporcione una nueva.</div> <div > <label> <input type="checkbox" value="S" id="cambia_pass"/> Cambiar contraseña</label></div></div></div>
                    <?php } ?>
                    <div class="form-group col-md-2 pass">
                        <label for="password">Password*:</label>
                        <input type="password" name="password" id="password" maxlength="15" class="form-control required passiguales" />
                    </div>
                    <div class="form-group col-md-2 pass">
                        <label for="conf_password">Confirmaci&oacute;n Password*:</label>
                        <input type="password" name="conf_password" id="conf_password" maxlength="15" class="form-control required passiguales" />
                    </div>
                    <div class="form-group col-md-3">
                        <div class="form-group col-md-4" id="lada_div">
                            <label for="lada">Lada:</label>
                            <input type="text"  value="<?php echo $lada; ?>" id="lada" name="lada" maxlength="80" class="form-control number"/>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="telefono">Teléfono:</label>
                            <input type="text"  value="<?php echo $telefono; ?>" id="telefono" name="telefono" maxlength="80" class="form-control number"/>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="celular">Celular:</label>
                        <input type="text"  value="<?php echo $celular; ?>" id="celular" name="celular" maxlength="80" class="form-control number"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="nombre" >Nombre (s)*:</label>
                        <input type="text"  value="<?php echo $nombre; ?>" name="nombre" id="nombre" maxlength="100"  class="form-control required" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="apaterno" >Apellido Paterno:</label>
                        <input type="text"  value="<?php echo $apaterno; ?>" name="apaterno" id="apaterno" maxlength="100"  class="form-control" />
                    </div>
                    <div class="form-group col-md-2">
                        <label for="amaterno" >Apellido Materno:</label>
                        <input type="text"  value="<?php echo $amaterno; ?>" name="amaterno" id="amaterno" maxlength="100"  class="form-control" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email(recomendado):</label>
                        <input type="text"  value="<?php echo $email; ?>" id="email" name="email" maxlength="80"  class="email form-control"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-success margint10">
                        <div class="panel-heading">DEFINIR PERMISOS DE ACCESO</div>
                        <div class="panel-body">
                            <div class="row color_panel">
                                <div class="form-group col-md-4">
                                    <label for="rol">Rol:</label>
                                    <select id="rol" name="rol" class="form-control required">
                                        <option value="">Elegir un rol</option>
                                        <?php
                                        foreach ($roles as $clv => $rol) {
                                            echo '<option data-desc="' . $rol['des'] . '" value="' . $clv . '">' . $rol['nom'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="des_rol" class="form-group col-md-4" ></div>
                                <div class="form-group col-md-2">
                                    <label for="estado">Estado de cuenta:</label>
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="1">Cuenta activa</option>  
                                        <option value="0">Cuenta inactiva</option>  
                                    </select>
                                </div>
                                <div id="ver_permisos_div" class="form-group col-md-2">
                                    <input type="checkbox" id="ver_ocular_permisos" checked  class="check_radio">
                                    <label for="ver_ocular_permisos">Ver permisos</label><br>
                                </div>
                            </div>
                            <div id="div_permisos" class="">
                                <div class="panel panel-info">
                                    <div class="panel-heading">MÓDULOS DEL SISTEMA / PERMISOS</div>
                                    <div class="panel-body"> 
                                        <div class="alert alert-warning alert_permisos_show"><img src="./images/not/info.png">Seleccione un rol para ver los permisos.</div>

                                        <?php
                                        $numod = $count_mod = 0;
                                        $cuantos_modulos = count($modulos);
                                        foreach ($modulos as $idmodulo => $mod) {
                                            if ($count_mod == 0) {
                                                echo '<div class="row">';
                                            }
                                            ?>
                                            <div id="modulo_<?php echo $idmodulo; ?>" class="col-md-2 conten_modulo border_color2">
                                                <div class="head_modulo color2">
                                                    <div class="ico"><?php echo $mod['ico']; ?></div> <div class="nom"><?php echo $mod['nom']; ?></div>
                                                </div>
                                                <?php foreach ($mod['permisos'] as $per) { ?>
                                                    <div class="permiso_modulo" title="<?php echo $per['pdes']; ?>">
                                                        <input type="checkbox" id="prm_<?php echo $idmodulo . '_' . $per['pid']; ?>" name="mod_<?php echo $per['pid']; ?>[]" value="<?php echo $per['pid']; ?>" disabled>
                                                        <label for="<?php echo $idmodulo . '_' . $per['pid']; ?>"><?php echo $per['pnom']; ?></label>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            $count_mod++;
                                            $numod++;
                                            if ($count_mod == 5) {
                                                echo '</div>';
                                                $count_mod = 0;
                                            }
                                            if ($cuantos_modulos == $numod) {
                                                echo '</div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div><!--Fin row  div_permisos-->
                        </div>
                    </div>
                </div>
                <?php
                if (isset($datos_modifica) && $datos_modifica != false) { 
                    ?>
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">LOG</div>
                            <div class="panel-body">
                                <div>
                                    <div class="col-md-3 log_data"><b>Usuario agregó: </b><br><?php echo @$datos_modifica->usuagrego;?></div>
                                    <div class="col-md-3 log_data"><b>Fecha alta: </b><br><?php echo @$datos_modifica->fechaagrego;?></div>
                                    <div class="col-md-3 log_data"><b>Usuario modificó: </b><br><?php echo @$datos_modifica->usumodifico;?></div>
                                    <div class="col-md-3 log_data"><b>Última modificación: </b><br><?php try{ $date = new DateTime($datos_modifica->fechamodifico);echo $date->format('d/m/Y');}catch(Exception $e){} ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </form> 
            <div class="row panel_color">
                <a id="cancelar" class="btn btn-primary col-md-4 col-md-offset-1 font_btn_bar" onclick="redirect_to('usuarios_sistema')">Cancelar</a>
                <a id="actualizar_usuario" class="btn btn-primary col-md-4 col-md-offset-1 font_btn_bar" ><?php echo $accion; ?> usuario del sistema</a>              
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var permisos_rol =<?php echo json_encode($roles); ?>;
    function confirmacionCampo(t1, t2) {
        if (t1 != t2) {
            return false;
        } else {
            return true;
        }
    }

    $.validator.addMethod("passiguales", function(value, element) {
        return (confirmacionCampo($('#password').val(), $('#conf_password').val()));
    }, "Los password no coinciden.");

    $(document).ready(function() {
<?php
if ($id == '0') {
    
} else {
    echo "$('.pass').hide();";
    echo "$('#password').removeClass('required'); ";
    echo "$('#conf_password').removeClass('required');";
}
echo $selects_vals;
?>
        $('.conten_modulo').hide();
        $('#rol').change(function() {
            $('#div_permisos input:checkbox').attr("checked", false);
            var rol = $('#rol').val();
            $('#des_rol').hide().html('');
            if ((rol * 1) !== 0) {
                $('#des_rol').html('<div class="alert alert-info des_rol"><b>Descripción Rol: </b>' + $('#rol option:selected').attr('data-desc') + '</div>').show();
                $('.alert_permisos_show').remove();
                $('.conten_modulo').hide();
                $.each(permisos_rol[rol]['modulos'], function(idmodulo, permisos) {
                    $('#modulo_' + idmodulo).show();
                    $.each(permisos, function(index, idpermiso) {
                        $('#prm_' + idmodulo + '_' + idpermiso).attr("checked", true);
                    });
                });
            } else {
                $('#div_permisos .panel-body').html('<div class="alert alert-warning alert_permisos_show"><img src="./images/not/info.png">Seleccione un rol para ver los permisos.</div>');
            }
        });

        $("#ver_ocular_permisos").click(function() {
            if ($(this).attr("checked")) {
                $('#div_permisos').show();
            } else {
                $('#div_permisos').hide();
            }
        });

        $('#btn_regresar').unbind("click");
        $("#btn_regresar").click(function() {
            redirect_to('usuarios_sistema');
        });

        $('#cambia_pass').click(function() {
            if ($(this).is(":checked")) {
                $('#no_modifica_pass').hide();
                $('.pass').show();
            }
        });

        $("#actualizar_usuario").click(function(e) {
            e.preventDefault();
            if ($('#form_update').validate().form()) {
                $('#panel_update').hide();
                try {
                    var resp = get_object('usuarios_sistema/getupdate/<?php echo $id; ?>', $('#form_update').serialize());
                    if (resp.resultado && resp.resultado == 'ok') {
                        var msg = '';
                        if (resp.mensaje) {
                            msg = resp.mensaje;
                        }
                        $('#alert_resultado').addClass('alert-success');
                        $('#alert_resultado').html('<i class="fa fa-check-circle"></i> ' + msg + ' <button class="btn btn-primary" onclick="redirect_to(\'usuarios_sistema\')"><i class="fa fa-arrow-left"></i> Regresar a lista de usuarios</button>');
                        $('#panel_mensajes').show();
                    } else {
                        var msg = '';
                        if (resp.mensaje) {
                            msg = resp.mensaje;
                        }
                        $('#alert_resultado').addClass('alert-danger');
                        $('#alert_resultado').html('<i class="fa fa-times-circle"></i> Error: ' + msg + ' <button class="btn btn-primary" onclick="redirect_to(\'usuarios_sistema\')"><i class="fa fa-arrow-left"></i> Regresar a lista de usuarios</button>');
                        $('#panel_mensajes').show();
                    }
                } catch (e) {
                    alert(e);
                }
            }
        });
<?php
echo $changerol;
?>
    });
</script>
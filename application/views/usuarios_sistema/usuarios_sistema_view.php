<script type="text/javascript" language="javascript" src="./js/DataTables/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="./js/DataTables/css/table_jui.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="./css/responsive-table.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="./js/modal_bootstrap_extend/js/bootstrap-dialog.js"></script>
<style>
    #body_det{overflow: auto;}
    .foto_div.data_det {width: 100%;border: 1px solid #D7D7D7;border-radius: 4px;min-height: 30px;text-align: center;}
    .foto_div i {font-size: 100px;}
    .nombre.data_det {border: 1px solid #D7D7D7;background-color: #F5F5F5;color: #989898;font-weight: bolder;font-size: 107%;padding: 3px;border-radius: 4px;padding-left: 10px;}
    .button_bar .btn {margin-left: 12px; }
    .button_bar_content{overflow: auto;padding-top: 10px; padding-right: 10px}
    .head_modulo {padding: 6px !important;background-color: #848484 !important;color: #fff !important;}
    .head_modulo .ico {width: 20px;float: left;}
    .head_modulo .ico i {font-size: 16px;}
    .head_modulo .ico img {width: 16px !important;}
    .permiso_modulo label {font-weight: 300 !important;color: #595959 !important;}
    .permiso_modulo{padding-left: 10px;}
    .conten_modulo{background-color: #F4F4F4;padding: 0px;margin-left: 18px;margin-top: 10px;border: 1px dotted #C0BEBE; }
    @media (max-width:767px) { .opcdt{ width: 100%; margin-bottom: 3px; margin-top: 3px} tfoot{display: none}}
</style>
<div id="permisos_modal" class="modal fade">
    <div class="modal-dialog w90">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Permisos de la cuenta</h4>
            </div>
            <div id="div_permisos" class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="detalles_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detalles del usuario</h4>
            </div>
            <div id="body_det" class="modal-body">
                <div id="nom_fot_det" class="col-md-3">
                    <div class="foto_div data_det"></div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 nombre data_det"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 log_data"><b>Usuario agregó: </b><br><span class="usuagrego data_det"></span></div>
                        <div class="col-md-6 log_data"><b>Fecha alta: </b><br><span class="fechaagrego data_det"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 log_data"><b>Usuario modificó: </b><br><span class="usumodifico data_det"></span></div>
                        <div class="col-md-6 log_data"><b>Última modificación: </b><br><span class="fechamodifico data_det"></span></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="span-24" >
    <div class="row" style="margin: 20px;">
        <div class="col-md-12">
            <div class=" button_bar col-md-12" >
                <div class="button_bar_content">
                    <button id="btn_actualiza" class="btn btn-primary col-md-2 col-sm-6 col-xs-12"><i class="fa fa-undo"></i>&nbsp;Actualizar</button>
                    <button id="btn_agregar"  class="btn btn-primary col-md-2 col-sm-6 col-xs-12"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
                    <button id="btn_modificar"  class="btn btn-primary col-md-2 col-sm-6 col-xs-12"><i class="fa fa-pencil"></i>&nbsp;Modificar</button>
                    <button id="btn_eliminar"  class="btn btn-danger col-md-2 col-sm-6 col-xs-12"><i class="fa fa-minus"></i>&nbsp;Eliminar</button>
                </div>
            </div><br><br><br>
            <div class="row">
                <div id="dinamic" class="responsive-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display col-md-12 table-bordered" id="dtusuariossistema">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th width="60">Login</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Celular</th>
                                <th>Est Cnta</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="dataTables_empty">Cargando...</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th width="60">Login</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Celular</th>
                                <th>Est Cnta</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
</div><br>
<script type="text/javascript" charset="utf-8">
    var dt_usuariossistema, data_row_select;
    var row_select = 0, row_select_catedra = 0;

    /* obtener la fila seleccionada */
    function fnGetSelected(oTableLocal) {
        return $('tr.row_selected');
    }

    function elimina(id) {
        BootstrapDialog.show({
            title: 'Borrar usuario',
            message: 'Se borrará el usuario seleccionado.<br>* Los reactivos creados por este usuario tambien serán borrados<br> ¿Deseas continuar?',
            buttons: [{
                    cssClass: 'btn-primary',
                    label: 'Si, Borrar usuario',
                    action: function(dialog) {
                        var datos = "id=" + id,
                                urll = "usuarios_sistema/elimina",
                                respuesta = get_object(urll, datos);
                        if (respuesta.resp == 'ok') {
                            dt_usuariossistema.fnDraw();//recargar los datos del datatable
                            notify_block('Eliminar usuario', 'El usuario de eliminó satisfactoriamente', '', 'success');
                        } else {
                            mensaje_center('Eliminar usuario', 'Error', 'Error al eliminar el usuario. Intente más tarde.', 'error');
                        }
                        dialog.close();
                    }
                }, {
                    label: 'No, Cancelar',
                    action: function(dialog) {
                        dialog.close();
                    }
                }]
        });
    }

    function ver_permisos(id) {
        $('.conten_modulo').hide();
        var datos = "id=" + id,
                urll = "usuarios_sistema/permisos",
                respuesta = get_object(urll, datos);
        if (respuesta.resp == 'ok') {
            $('#div_permisos input:checkbox').attr("checked", false);
            $.each(respuesta.permisos_usu, function(idmodulo, permisos) {
                $('#modulo_' + idmodulo).show();
                $.each(permisos.permisos, function(index, idpermiso) {
                    $('#prm_' + idmodulo + '_' + idpermiso).attr("checked", true);
                });
            });
            $('#permisos_modal').modal('show');
        } else {
            mensaje_center('Consultar permisos de usuario', 'Error', 'Error al consultar permisos', 'error');
        }
    }

    function detalles(id) {
        var datos = "id=" + id,
                urll = "usuarios_sistema/detalles",
                respuesta = get_object(urll, datos);
        $('.data_det').html('');
        if (respuesta.resp == 'ok') {
            $.each(respuesta.detalles, function(index, value) {
                $('.' + index).html(value);
            });
            var foto_html = '';
            if (respuesta.detalles.foto != '') {
                foto_html = '<img class="foto" src="./images/perfil_usuarios_sistema/">';
            } else {
                foto_html = '<i class="fa fa-user"></i>';
            }
            $('.foto_div').html(foto_html);
            $('#detalles_modal').modal('show');
        } else {
            mensaje_center('Consultar permisos de usuario', 'Error', 'Error al consultar permisos', 'error');
        }
    }

    function modifica(id) {
        redirect_to('usuarios_sistema/update/' + id);
    }

    $(document).ready(function() {
        dt_usuariossistema = $('#dtusuariossistema').dataTable({
            "bJQueryUI": true,
            "oLanguage": {
                "sProcessing": "<div class=\"ui-widget-header boxshadowround\"><strong>Procesando...</strong></div>",
                "sLengthMenu": "Mostrar _MENU_ usuarios",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ usuarios",
                "sInfoEmpty": "Mostrando desde 0 hasta 0 de 0 usuarios",
                "sInfoFiltered": "(filtrado de _MAX_ usuarios)",
                "sInfoPostFix": "",
                "sSearch": "Buscar: ",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sPrevious": "Anterior",
                    "sNext": "Siguiente",
                    "sLast": "Último"
                }
            },
            "aoColumns": [
                {"bVisible": false},
                null,
                {"bSortable": true, "bVisible": true},
                null,
                null,
                null,
                null,
                null,
                {"bSortable": false, "bVisible": true}
            ],
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
            "sPaginationType": "full_numbers",
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "index.php/usuarios_sistema/datos",
            "fnServerData": function(sUrl, aoData, fnCallback) {
                $.ajax({
                    "type": 'POST',
                    "dataType": 'json',
                    "url": sUrl,
                    "data": aoData,
                    "success": fnCallback,
                    "cache": false
                });
            }
        });

        /* selecciona una fila del datatable no aplica para server_aside proccessing*/
        $('#dtusuariossistema tbody tr').live('click', function(e) {
            if ($(this).hasClass('row_selected')) {
                $(this).removeClass('row_selected');
                row_select = 0;
                $("#act_select").text('No se ha seleccionado un usuario');
            } else {
                $('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
                var anSelected = fnGetSelected(dt_usuariossistema);
                var datos = dt_usuariossistema.fnGetData(anSelected[0]);
                data_row_select = datos;
                row_select = datos[0];
            }
        });

        //Asigna accion al boton para actualizar datatables
        $("#btn_actualiza").click(function() {
            dt_usuariossistema.fnDraw();
        });

        $("#btn_volver").click(function() {
            redirect_to('gestion');
        });

        $("#btn_agregar").click(function() {
            redirect_to('usuarios_sistema/update');
        });

        $('#btn_modificar').click(function() {
            //se intenta obtener valores de la fila seleccionada en el datatables almacenados en la variable global row_select
            if (row_select != 0) {
                modifica(row_select);
            } else {
                mensaje_center('Selecciona un usuario', 'No se ha seleccionado ning&uacute;n usuario', '<b>Selecciona un usuario a modificar.</b>', 'info');
            }
        });

        $('#btnvolver').click(function() {
            redirect_to('gestion');
        });

        $('#btn_eliminar').click(function() {
            //se intenta obtener valores de la fila seleccionada en el datatables almacenados en la variable global row_select
            if (row_select != 0) {
                elimina(row_select);
            } else {
                mensaje_center('Selecciona un usuario', 'No se ha seleccionado ning&uacute;n usuario', '<b>Selecciona un usuario a eliminar.</b>', 'info');
            }
        });

    });//fin marco jquery
</script>
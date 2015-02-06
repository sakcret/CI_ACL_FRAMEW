<style>
    div#div_sigin {
        background-color: #fafafa;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
        border: 2px solid #E5DDDD;
    }
    button#bt_entrar {
        margin-top: 14px;
    }
    #nav_session{ display: none !important;}
    #page-content{ margin-top: 0px;}
</style>
<div id="div_sigin" class="col-md-4 col-md-offset-4">
    <div id="f_signin" class="col-md-10 col-md-offset-1" role="form">
        <form id="frm_acceso">
            <div class="form-group">
                <label for="usuario" class="col-sm-12 control-label">Usuario</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control required" name="usuario" id="usuario" >
                </div>
            </div>
            <div class="form-group">
                <label for="usuario" class="col-sm-12 control-label">Contrase&ntilde;a</label>
                <div class="col-sm-12">
                    <input type="password" class="form-control required" name="pass" id="pass" >
                </div>
            </div>
        </form>
        <div class="form-group but_formsig ">
            <button id="bt_entrar" class="btn btn-primary col-md-10 col-md-offset-1" type="button">Entrar</button>
        </div>
    </div>
</div>
<script type="text/javascript" charset="UTF-8">
    $(document).keydown(function(tecla) {
        if (tecla.keyCode == 13) {
            $("#bt_entrar").click();
        }
    });

    $(document).ready(function() {
        $("#bt_entrar").click(function(e) {
            e.preventDefault();
            if ($('#frm_acceso').validate().form()) {
                var usuario = $("#usuario"),
                        pass = $("#pass"),
                        tips = $("#msg_acceso"),
                        allFields = $([]).add(usuario).add(pass);
                var respuesta = get_object("acceso/acceso_sistema", "usuario=" + usuario.val() + "&pass=" + pass.val());
                if (respuesta.sientra == 'ok') {
                    redirect('<?php echo $this->config->item('base_url'); ?>');
                } else {
                    if (respuesta.sientra == 'no') {
                        mensaje_center('Error en Accesso', '', respuesta.mensaje, 'error');
                    }
                }
            }
        });
    }); //fin document ready
</script>

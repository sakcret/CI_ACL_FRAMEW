<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <base href= "<?php echo $this->config->item('base_url'); ?>">
        <title> <?php
            if (isset($title) && $title != '') {
                echo $title;
            } else {
                echo $this->config->item('sis_nombre');
            }
            ?> </title>
        <meta name="author" content="CGT">
        <meta http-equiv="content-type" CONTENT="text/html; charset=utf-8">
        <meta name="author" content="José Adrian Ruiz Carmona">
        <link rel="shortcut icon" href="./images/favicon.ico">

        <link href="./css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css" type="text/css"/>   
        <link rel="stylesheet" href="./css/estilo_gral.css" type="text/css"/>
        <!-- javascript-->
        <script type="text/javascript" language="javascript" src="./js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" language="javascript" src="./js/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="./css/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/jquery-validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="./js/jquery-validation/messages_es.js"></script>
        <script type="text/javascript" src="./js/jquery.blockUI.js"></script>
        <script type="text/javascript" language="javascript" src="./js/utilerias.js"></script>

        <?php
        $tooltips = $this->config->item('plg_tooltipster');
        if ($tooltips) {
            ?> 
            <script type="text/javascript" language="javascript" src="./js/tooltipster-master/js/jquery.tooltipster.min.js"></script>
            <link rel="stylesheet" href="./js/tooltipster-master/css/tooltipster.css" type="text/css"/>
        <?php } ?>
        <?php
        ob_flush();
        flush();
        $logueado = false;
        $clv_sess = $this->config->item('clv_sess');
        $user_id = $this->session->userdata('user_id' . $clv_sess);
        (!$user_id) ? $logueado = false : $logueado = true;
        ?>
        <script type="text/javascript">
            var base_url = '<?php echo $this->config->item('base_url'); ?>';
            $(document).ready(function() {
                function callserver() {
                    var remoteURL = base_url + 'index.php/keepsession';
                    $.get(remoteURL);
                }
                setInterval(function() {
                    callserver();
                }, 180000);

                $("#btn_salir").click(function(e) {
                    e.preventDefault();
                    redirect_to('acceso/logout');
                });

                $('#btn_regresar').click(function(e) {
                    e.preventDefault();
                    redirect_to('inicio');
                });
<?php if ($tooltips) { ?>
                    $('[title]').tooltipster({
                        animation: 'fade',
                        delay: 800,
                        touchDevices: false
                    });
<?php } unset($tooltips); ?>
            });
        </script>
    </head>
    <body>
        <?php
        if ($logueado) {
            ?> 

            <div class="navbar navbar-inverse navbar-fixed-top bar_user_sess" role="navigation" id="slide-nav">
                <div class="container_navbar">
                    <div class="navbar_header">
                        <a class="navbar-toggle col-xs-1"> 
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <div class="col-md-2 col-xs-3 col-sm-2" id="div_banner_min"></div>
                        <div class="col-md-4 col-xs-8 col-sm-3" id="div_detail_modulo">
                            <?php
                            if (isset($nombre_modulo)) {
                                ?>
                                <div class="ico_dt"> <?php
                                    if (isset($icon_modulo)) {
                                        echo $icon_modulo;
                                    }
                                    ?>
                                </div>
                                <div class="nom_dt"><?php echo $nombre_modulo; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="slidemenu">
                        <div class="nav navbar_nav">
                            <div id="user_name" class="col-md-3 col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <?php
                                        $foto = $this->session->userdata('foto' . $clv_sess);
                                        if ($foto != '' && $foto != FALSE) {
                                            ?>
                                            <img src="./images/perfil_usuarios_sistema/<?php echo $foto; ?>" alt="" />
                                        <?php } else { ?>
                                            <i class="fa fa-user"></i>
                                        <?php } ?>
                                    </span>
                                    <input type="text" class="form-control " value="<?php echo $this->session->userdata('nombre' . $clv_sess); ?>" disabled>
                                </div>
                            </div>
                            <div id="btns_nav" class="col-md-3 col-sm-4">
                                <button id="btn_regresar" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Regresar</button> 
                                <button id="btn_salir" class="btn btn-primary"><i class="fa fa-sign-out"></i> Salir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?> 
        <div id="page-content" class="">
            <?php
            if (isset($banner_lg) && $banner_lg) {
                ?> 
                <div id="header" class="row">
                    <div id="banner" class="col-md-12"></div>
                </div>
                <?php
            }
            ?>
            <div id="content" class="row">
                <div id="contenidho" class="col-md-12">
                    <?php
                    if (isset($contenido) && ($contenido != '')) {
                        echo $contenido . PHP_EOL;
                    }
                    ?>  
                </div>
            </div>
            <div id="footer" class="row">
                <div class="col-md-12">
                    <?php
                    setlocale(LC_TIME, 'Spanish');
                    echo ' &copy; ' . date("F") . " " . date("Y");
                    ?> 
                    <?php echo $this->config->item('emp_nombre'); ?>. Todos los derechos reservados<br>
                    <?php echo $this->config->item('sis_nombre'); ?> 
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        //stick in the fixed 100% height behind the navbar but don't wrap it
        $('#slide-nav.navbar .container_navbar').append($('<div id="navbar-height-col"></div>'));
        // Enter your ids or classes
        var toggler = '.navbar-toggle';
        var pagewrapper = '#page-content';
        var navigationwrapper = '.navbar_header';
        var menuwidth = '100%'; // the menu inside the slide menu itself
        var slidewidth = '80%';
        var menuneg = '-100%';
        var slideneg = '-80%';
        $("#slide-nav").on("click", toggler, function(e) {
            var selected = $(this).hasClass('slide-active');
            $('#slidemenu').stop().animate({
                left: selected ? menuneg : '0px'
            });

            $('#navbar-height-col').stop().animate({
                left: selected ? slideneg : '0px'
            });

            $(pagewrapper).stop().animate({
                left: selected ? '0px' : slidewidth
            });

            $(navigationwrapper).stop().animate({
                left: selected ? '0px' : slidewidth
            });

            $(this).toggleClass('slide-active', !selected);
            $('#slidemenu').toggleClass('slide-active');

            $('#page-content, .navbar, body, .navbar_header').toggleClass('slide-active');
        });

        var selected = '#slidemenu, #page-content, body, .navbar, .navbar_header';

        $(window).on("resize", function() {
            if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
                $(selected).removeClass('slide-active');
            }
        });
    });
</script>
<style>
    .menu_item .fa { font-size: 50px; color: #1F648C;}
    .lbl_menu {color: #1F648C; font-weight: bold; margin-top: 5px; line-height: 15px;min-height: 32px;}
    .content_menu_item {border: 3px dotted #1F648C;text-align: center;padding: 12px;background-color: white;}
    .menu_item_fa_hover{ color: #16435E !important;}
    .lbl_menu_hover {color: #16435E; font-weight: bold; margin-top: 5px; }
    .content_menu_item_hover {border: 3px dotted #16435E;text-align: center;padding: 12px;background-color: rgb(237, 237, 237);}
    #id_menu{ min-height: 400px;}
    .menu_item {margin-bottom: 15px;}
    #btn_regresar{display: none;}
</style>
<?php
if (isset($permisos)&&isset($modulos)) {
    ?>
    <div id="id_menu" class="row">
        <div id="menu_modules" class="col-md-10 col-md-offset-1">

            <?php
            foreach ($modulos as $mod){
                $clickOn="redirect_to('".$mod['url']."');";
                $icon_tmp=$mod['icon'];
                $img_tmp=$mod['imagen'];
                $icon='<i class="fa fa-square"></i>';
                if($icon_tmp!=''){
                    $icon='<i class="fa '.$icon_tmp.'"></i>';
                }else if($img_tmp!=''){
                    $icon='<img src="./images/'.$img_tmp.'"/>';
                }
                ?>
            <div id="mn_<?php echo $mod['id']; ?>" class="col-md-2 col-sm-6 menu_item" onclick="<?php echo $clickOn; ?>"><div class="content_menu_item"> <?php echo $icon; ?><div class="lbl_menu"><?php echo $mod['nombre']; ?></div></div></div>
                <?php
            }
            ?>
        </div>
    </div> 
        <?php } ?>
<script>
    $(document).ready(function () {
        $('.content_menu_item').hover(function () {
            $(this).addClass("content_menu_item_hover");
            $(this).find('.fa').addClass("menu_item_fa_hover");
            $(this).find('.lbl_menu').addClass("lbl_menu_hover");
        }, function () {
            $(this).removeClass("content_menu_item_hover");
            $(this).find('.fa').removeClass("menu_item_fa_hover");
            $(this).find('.lbl_menu').removeClass("lbl_menu_hover");
        });
    });
</script>
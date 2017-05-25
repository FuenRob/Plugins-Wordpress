
    jQuery(document).ready(function(){
           
        jQuery("li .phoneHide").hover(function(){
            jQuery(this).hide();
            jQuery(this).next().show();
        });
    });




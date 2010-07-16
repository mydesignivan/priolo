var Proveedores = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        $.validator.setting('#form1 .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#txtName').validator({
            v_required  : true
        });

        $('a.jq-image').fancybox();
        
        PictureGallery.initializer({
            sel_iframe     : '#iframe',
            sel_input      : '#txtUploadFile',
            sel_button     : '#btnUpload',
            sel_ajaxloader : '#ajax-loader1',
            sel_form       : '#form1',
            sel_gallery    : '#gallery-image',
            callback       : function(){
                $('a.jq-image').fancybox();
            }
        });

        $("#gallery-image").sortable({
                                stop : function(){
                                    $('a.jq-image').fancybox();
                                }
                           })
                           .disableSelection()
                           .sortable({ handle: '.handle' })

       MessageShowHide(document, _params.status);
    };

    this.save = function(btn){
        $(btn).hide();
        $('#ajax-loader2').show();

        $.validator.validate('#form1 .validate', function(error){
            if( !error && validImage() ){
                var data={};
                data.images_new = PictureGallery.get_images_new();
                if( _params.mode=='edit' ) {
                    data.images_del = PictureGallery.get_images_del();
                    data.images_order = PictureGallery.get_orders();
                }

                $('#json').val(JSON.encode(data));

                $('#form1').attr('action', baseURI+'panel/proveedores/'+_params.mode)
                           .attr('enctype', 'application/x-www-form-urlencoded')
                           .removeAttr('target')
                           .submit();

            }else{
                $(btn).show();
                $('#ajax-loader2').hide();
            }
        });

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _params;

    /* PRIVATE METHODS
     **************************************************************************/
    var validImage = function(){
        if( !$('#gallery-image').is(':visible') ){
            show_error('#txtUploadFile', 'Debe ingresar al menos una im&aacute;gen.');
            return false;
        }else{
            $.validator.hide('#txtUploadFile');
        }
        return true;
    }

})();

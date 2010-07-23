var Obras = new (function(){

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
                                },
                                revert: true,
                                handle : '.handle'
                           }).disableSelection();

       MessageShowHide(document, _params.status);
    };

    this.save = function(){
        $('#btnSave').hide();
        $('#ajax-loader2').show();

        $.validator.validate('#form1 .validate', function(error){
            if( !error ){
                var data={};
                data.images_new = PictureGallery.get_images_new();
                if( _params.mode=='edit' ) {
                    data.images_del = PictureGallery.get_images_del();
                    data.images_order = PictureGallery.get_orders();
                }

                $('#json').val(JSON.encode(data));

                $('#form1').attr('action', baseURI+'panel/obras/'+_params.mode)
                           .attr('enctype', 'application/x-www-form-urlencoded')
                           .removeAttr('target')
                           .submit();

            }else{
                $('#btnSave').show();
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

})();

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

        PictureGallery.initializer({
            sel_iframe     : '#iframe',
            sel_input      : '#txtUploadFile',
            sel_button     : '#btnUpload',
            sel_ajaxloader : '#ajax-loader1',
            sel_form       : '#form1',
            sel_gallery    : '#gallery-image'
        });
    };

    this.save = function(btn){
        $(btn).hide();
        $('#ajax-loader2').show();

        $.validator.validate('#form1 .validate', function(error){
            if( !error ){
                var data = new Array();
                var n=0;
                $('#gallery-image li').each(function(){
                    n++;
                    var dat = $(this).data('au-data');
                    dat.order = n;
                    data.push(dat);
                });
                if( data.length>0 ) $('#json').val(JSON.encode(data));

                $('#form1').attr('action', baseURI+'panel/obras/'+_params.mode)
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

})();

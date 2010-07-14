var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        $.validator.setting('#form1 .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#txtName, #cboCategories, #txtUploadFile').validator({
            v_required  : true
        });

       MessageShowHide(document, _params.status);
    };

    this.save = function(btn){
        $(btn).hide();
        $('#ajax-loader2').show();

        $.validator.validate('#form1 .validate', function(error){
            if( !error ){

                var Params = {
                    name          : $('#txtName').val(),
                    products_id   : $('#products_id').val(),
                    categories_id : $('#cboCategories').val()
                };

                $.post(baseURI+'panel/products/ajax_check_exists', Params, function(data){
                    $(btn).show();
                    $('#ajax-loader2').hide();

                    if( data=="yes" ) show_error('#txtName', 'El producto ya existe.');
                    else $('#form1').submit();
                });

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

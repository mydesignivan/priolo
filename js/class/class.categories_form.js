var Categories = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(_params){
        params = _params;

        $.validator.setting('#form1 .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#txtName').validator({
            v_required  : true
        });
    };

    this.save = function(){
        $.validator.validate('#form1 .validate', function(error){
            if( !error ){
                if( !valid_catalog() ){
                    alert("No se puede crear otro nivel de categoría.");
                    return false;
                }

                $('.ajax-loader').show();

                var mode = $('#categories_id').val()!='' ? 'edit' : 'create';

                $.post(baseURI+'panel/categories/'+mode, $('#form1').serialize(), function(data){
                    $('.ajax-loader').hide();
                    $('#txtName').val('');

                    try{
                        data = JSON.decode(data);

                        if( data.error ) throw true;

                        $(parent.document).find('#table').html(data.result);
                        parent.AeroWindowClose();                   

                    }catch(e){
                        $('div.error').html('Ha ocurrido un error al guardar los datos.');
                        MessageShowHide(document, 'error');
                    }

                });
            }
        });
        return false;
    };

    this.close = function(){
        $('#form1')[0].reset();
        parent.AeroWindowClose();
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var params={};


    /* PRIVATE METHODS
     **************************************************************************/
    var valid_catalog = function(){
        var level = $('#cboParentCat').val();
        if( level!=0 ) {
            var a = level.split("_");
            level = a[1];
        }

        return !(level+1 > params.categorie_max_level);
    };

})();

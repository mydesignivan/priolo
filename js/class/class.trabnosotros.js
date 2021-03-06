var Trabnosotros = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $.validator.setting('#form1 .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });

        $("#txtName, #txtConsult").validator({
            v_required  : true
        });
        $('#txtFileCurri').validator({
            v_required  : true,
            container : '#msgbox-cv'
        });
        $('#txtEmail').validator({
            v_required  : true,
            v_email     : true
        });

    };

    this.send = function(){
        $.validator.validate('#form1 .validate', function(error){
            if( !error ){
                $('#form1').submit();
            }
        });

        return false;
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();

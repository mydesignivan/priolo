var Contact = new (function(){

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

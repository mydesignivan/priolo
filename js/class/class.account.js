var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $.validator.setting('#form1 .validate', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#txtEmail').validator({
            v_required  : true,
            v_email     : true
        });
        $('#txtUser').validator({
            v_required  : true
        });
        $('#txtPssNew').validator({
            v_required  : false,
            v_password  : [8,10]
        });
        $('#txtPssVeri').validator({
            v_required  : false,
            v_compare   : '#txtPssNew'
        });
    };

    this.save = function(){
        $('#imgAL').show();
        $.validator.validate('#form1 .validate', function(error){
            if( !error ){
                if( $('#txtPssCurrent').val().length>0 ){
                    $.post(baseURI+'panel/myaccount/ajax_check_pss', 'pss='+$('#txtPssCurrent').val(), function(data){
                        $('#imgAL').hide();                        
                        if( data!="ok" ) show_error('#txtPssCurrent', 'La contrase&ntilde;a es incorrecta.');
                        else $('#form1').submit();
                    });
                }else $('#form1').submit();
            }
        });

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/


    /* PRIVATE METHODS
     **************************************************************************/

})();

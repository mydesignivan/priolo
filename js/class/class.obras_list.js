var Obras = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        if( $('#sortable').length>0 ){
            var initorder = $('#sortable li.row:first').attr('id').substr(3);

            $("#sortable").sortable({
                                stop : function(){
                                    $("#sortable").sortable( "option", "disabled", true );

                                    $('#sortable li.row').removeClass('row-even');
                                    $('#sortable li.row:even').addClass('row-even');

                                    var arr = $("#sortable").sortable("toArray");
                                    $.post(baseURI+'panel/obras/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
                                        $("#sortable").sortable( "option", "disabled", false );
                                    });
                                }
                           })
                          .disableSelection()
                          .sortable({ handle: '.handle' });
        }
        
       MessageShowHide(document, _params.status);
    };

    this.del = function(id){
        if( confirm('¿Confirma la eliminación?') ){
            location.href = baseURI+'panel/obras/delete/'+id;
        }
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _params;
    var working=false;

    /* PRIVATE METHODS
     **************************************************************************/

})();

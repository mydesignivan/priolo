var Obras = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        $("#sortable").sortable({
                            stop : function(){
                                $('#sortable li.row').removeClass('row-even');
                                $('#sortable li.row:even').addClass('row-even');
                            }
                       })
                      .disableSelection()
                      .sortable({ handle: '.handle' });

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

    /* PRIVATE METHODS
     **************************************************************************/

})();

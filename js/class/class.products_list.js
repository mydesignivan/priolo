var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        if( $('ul.sortable').length>0 ){
            var initorder = $('ul.sortable li.row:first').attr('id').substr(3);

            $("ul.sortable").sortable({
                                stop : function(){
                                    $("ul.sortable").sortable( "option", "disabled", true );

                                    $('ul.sortable li.row').removeClass('row-even');
                                    $('ul.sortable li.row:even').addClass('row-even');

                                    var arr = $(this).sortable("toArray");
                                    $.post(baseURI+'panel/products/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
                                        //alert(data);
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
            location.href = baseURI+'panel/products/delete/'+id;
        }
    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _params;
    var working=false;

    /* PRIVATE METHODS
     **************************************************************************/

})();

var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        var list = $('tbody.sortable');

        if( list.length>0 ){

            list.sortable({
                stop : function(){
                    list.sortable( "option", "disabled", true );
                    $('tbody.sortable tr').removeClass('row-even');
                    $('tbody.sortable tr:even').addClass('row-even');

                    var initorder = $(this).find('tr:first').attr('id').substr(3);
                    var arr = $(this).sortable("toArray");

                    $.post(baseURI+'panel/products/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
                        list.sortable( "option", "disabled", false );
                    });
                },
                handle: '.handle'
            }).disableSelection();
        }
        
       MessageShowHide(document, _params.status);
    };

    this.del = function(id){
        if( confirm('¿Confirma la eliminación?') ){
            location.href = baseURI+'panel/products/delete/'+id;
        }
    };

    this.Delete = function(){
        var arr = Array();
        $('tbody.sortable .cell1 input:checkbox').each(function(){
            if( this.checked ) arr.push(this.value);
        });
        if( arr.length>0 ){
            if( confirm('¿Confirma eliminar los productos seleccionados.?') ){
                location.href = baseURI+'panel/products/delete/'+arr.join('/');
            }
        }
    };

    this.check_all = function(){
        $('tbody.sortable .cell1 input:checkbox').each(function(){
            this.checked = !this.checked;
        });
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _params;
    var working=false;

    /* PRIVATE METHODS
     **************************************************************************/

})();

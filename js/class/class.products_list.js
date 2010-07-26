var Products = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(params){
        _params = params;

        var list = $('tbody.sortable');

        if( list.length>0 ){

            list.sortable({
                stop : function(){
                    _working = true;
                    list.sortable( "option", "disabled", true );

                    var initorder = $(this).find('tr:first').attr('id').substr(3);
                    var arr = $(this).sortable("toArray");

                    var callback = function(){
                        list.sortable( "option", "disabled", false );
                    };

                    _save_order(arr, initorder, callback);
                },
                handle : '.handle'
            }).disableSelection();
        }

        /*$("#txtSearch").autocomplete(baseURI+'panel/products/ajax_search', {
            width: 300,
            dataType: "post",
            multiple: true,
            matchContains: true
	});*/
        
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

    this.order = function(el, direction){
        if( _working ) return false;
        //_working = true;

        var tr = $(el).parent().parent();
        var tr2;

        if( direction=="down" ){
            tr2 = tr.next();
            if( tr2.length>0 ) tr.insertAfter(tr2);
        }else if( direction=="up" ){
            tr2 = tr.prev();
            if( tr2.length>0 ) tr.insertBefore(tr2);
        }

        var initorder;
        var arr = new Array();

        if( tr2.length>0 ){
            tr.parent().find('tr').each(function(){
                arr.push(this.id);
            });

            initorder = tr.parent().find('tr:first').attr('id').substr(3);

            _save_order(arr, initorder);

        }else{

            if( direction=="up" && _params.page.offset>0 ){
                
                location.href = _params.page.base_url+'/'+(_params.page.offset-_params.page.countperpage)+'#'+tr.attr('id');
            }
            
            if( direction=="down" && (_params.page.countperpage+_params.page.offset) <= _params.page.countreg ){
                location.href = _params.page.base_url+'/'+(_params.page.offset+_params.page.countperpage)+'#'+tr.attr('id');
            }
        }

        return false;
    };

    this.show_cat = function(val){
        if( val!=0 ) location.href = baseURI+'panel/products/showcat/'+val;
        else location.href = baseURI+'panel/products/';
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _params;
    var _working=false;

    /* PRIVATE METHODS
     **************************************************************************/
    var _save_order = function(arr, initorder, callback){
        $('tbody.sortable tr').removeClass('row-even');
        $('tbody.sortable tr:even').addClass('row-even');
        $.post(baseURI+'panel/products/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
            _working = false;
            if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
            else {
                if( typeof(callback)=="function" ) callback();
            }
        });
    };


})();

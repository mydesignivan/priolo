var Categories = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var lists = $("ul.sortable");
        if( lists.length>0 ){
            lists.sortable({
                stop : function(){
                    var t = $(this);
                    var initorder = t.find('li:first').attr('id').substr(3);
                    lists.sortable( "option", "disabled", true );

                    var arr = t.sortable("toArray");
                    $.post(baseURI+'panel/categories/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
                        lists.sortable( "option", "disabled", false );
                    });
                },
                handle      : '.handle'
           })
          .disableSelection();
        }

    };

    this.open_popup = function(id){
        var iframe = $('#winIframe');

        if( !id && iframe.attr('src')=="about:blank" ){
            iframe.attr('src', baseURI+'panel/categories/ajax_show_form/');
            title = 'Insertar Categor&iacute;a';
        }
        if( id ){
            iframe.attr('src', baseURI+'panel/categories/ajax_show_form/'+id);
            var title = 'Modificar Categor&iacute;a';
        }
        OpenPopup(title);
    };

    this.del = function(t, countprod, name){
        var msg = '¿Está seguro de eliminar la categoría "'+ name  +'" ?';

        if( confirm(msg) ){
            if( countprod>0 ){
                msg = 'IMPORTANTE: Esta categoría contiene propiedades. '+
                      'Al eliminar la categoría se perderan todas las propiedades asociadas en el.\n\n'+
                      '¿Está seguro de proceder?';
                if( !confirm(msg) ) return false;
            }

            var arr = new Array();
            $(t).parent().parent().find('input:checkbox').each(function(){
                arr.push(this.value);
            });

            location.href = baseURI+'panel/categories/delete/'+arr.join('/');
        }

        return false;
    };

    this.Delete = function(){
        var arr = new Array();
        var existsprod=false;
        $('#table li input:checkbox').each(function(){
            if( this.checked ){
                arr.push(this.value);
                if( !existsprod && parseInt($(this).parent().parent().find('.jq-countprod').html())>0 ) existsprod=true;
            }
        });

        if( arr.length>0 ){
            if( confirm("¿Está seguro de eliminar la(s) categoría(s) seleccionada(s)?") ){
                if( existsprod ){
                    var msg = 'IMPORTANTE: Alunas categorías contienen propiedades. '+
                              'Al eliminar las categorías se perderan todas las propiedades asociadas en el.\n\n'+
                              '¿Está seguro de proceder?';
                    if( !confirm(msg) ) return false;
                }

                location.href = baseURI+'panel/categories/delete/'+arr.join('/');                
            }
        }
        
        return false;
    };

    this.check_all = function(){
        $('#table li input:checkbox').each(function(){
            this.checked = !this.checked;
            this.disabled = !this.disabled;
        });
    };

    this.check = function(t){
        $(t).parent().parent().find('input:checkbox').each(function(){
            if( this!=t ) {
                this.checked = !this.checked;
                this.disabled = !this.disabled;
            }
        });
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/
    var OpenPopup = function(title, callback){
        var div = $('#window');
        
        div.css({
            'left'    : 0,
            'top'     : $(window).scrollTop()+"px"
        });

        div.AeroWindow({
              WindowTitle        :  title,
              WindowPositionTop  :  'center',
              WindowPositionLeft :  'center',
              WindowWidth        :  400,
              WindowHeight       :  170,
              WindowAnimation    :  'easeOutBounce',
              WindowResizable    :  false,
              WindowMaximize     :  false,
              WindowMinimize     :  false,
              callback           :  callback
        });
    };

})();

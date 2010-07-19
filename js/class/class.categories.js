var Categories = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        
    };

    this.open_popup = function(id){
        var params = '';
        if( id ) params = 'id='+id;

        var div = $('#window');
        div.css({
            'left' : 0,
            'top'  : $(window).scrollTop()+"px"
        });
        
        var OpenPopup = function(){
            div.AeroWindow({
                  WindowTitle        :  'Insertar Categor&iacute;a',
                  WindowPositionTop  :  'center',
                  WindowPositionLeft :  'center',
                  WindowWidth        :  400,
                  WindowHeight       :  170,
                  WindowAnimation    :  'easeOutBounce',
                  WindowResizable    :  false,
                  WindowMaximize     :  false,
                  WindowMinimize     :  false
            });            
        };

        if( !id && div.html()=="" ){
            $.post(baseURI+'panel/categories/ajax_show_form/', params, function(data){
                div.html(data);
                OpenPopup();
            });
        }else{
            OpenPopup();
        }
    };

    var save = function(){
        
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/

    /* PRIVATE METHODS
     **************************************************************************/

})();

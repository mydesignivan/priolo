var Pages = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        // Configura el editor
        TinyMCE_init.width = '600px';
        TinyMCE_init.height = '300px';
        tinyMCE.init(TinyMCE_init);
        
    };

    this.save = function(el, pagename, id){
        if( working ) return false;

        var parent = $(el).parent();
        var al = parent.find('.jq-ajaxloader').show();

        var params={
            'pagename' : pagename,
            'content'  : tinyMCE.get(id).getContent(),
            'title'    : parent.find('.jq-title').val()
        };
        working=true;
        $.post(baseURI+'panel/pages/update', params, function(data){
            al.hide();
            working=false;
            MessageShowHide($(el).parent().parent(), data);
        });

        return false;
    };

    this.slideCont = function(el){
        var div = $($(el).attr('href'));

        if( div.is(':hidden') ){
            div.slideDown('slow', function(){
                $(el).parent().find('img.jq-icon').attr('src', 'images/icon_arrow_up2.png');
            });

        }else{
            div.slideUp('slow', function(){
                $(el).parent().find('img.jq-icon').attr('src', 'images/icon_arrow_down2.png');
            });
            div.find('.success, .error').hide();
        }

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var working=false;

    /* PRIVATE METHODS
     **************************************************************************/

};
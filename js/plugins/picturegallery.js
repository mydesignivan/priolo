var PictureGallery = new (function(){

   /* CONSTRUCTOR
    **************************************************************************/
   this.initializer = function(_params){
       params = _params;
       $(params.sel_iframe).bind('load', iframe_load);
   };

  /* PUBLIC METHODS
   **************************************************************************/
   this.upluad = function(){
        if( $(params.sel_input).val() ){
            $(params.sel_button).hide();
            $(params.sel_ajaxloader).show();

            $(params.sel_form).attr('action', baseURI+'ajax_upload')
                              .attr('enctype', 'multipart/form-data')
                              .attr('target', params.sel_iframe.substr(1))
                              .submit();
        }
   };

   /* PRIVATE PROPERTIES
    **************************************************************************/
    var params;

   /* PRIVATE METHODS
    **************************************************************************/
    var iframe_load = function(){
        var content = this.contentDocument || this.contentWindow.document;
            content = content.body.innerHTML;

        if(content=='') return false;

        $(params.sel_button).show();
        $(params.sel_ajaxloader).hide();

        try{
            var data = JSON.decode(content);

        }catch(err){
            alert(content);
        }

        if( typeof(data)!="undefined" ){
            if( !data.error ){
                var ul = $(params.sel_gallery);
                var li = ul.find('li:first');

                if( ul.is(':visible') ) li = li.clone();

                li.find('a.jq-image').attr('href', data.image.full);
                li.find('img:first').attr('src', data.image.thumb);

                var audata = {
                    image_full  : data.image.full,
                    image_thumb : data.image.thumb,
                    image_basename : data.image.basename,
                    image_ext : data.image.ext
                };

                if( !ul.is(':visible') ){
                    li.find('a.jq-removeimg').bind('click', remove_image);
                    li.data('au-data', audata);

                    ul.show();
                }else{
                    ul.find('li:last').after('<li>'+li.html()+'</li>');
                    ul.find('li:last').find('a.jq-removeimg').bind('click', remove_image)
                    ul.find('li:last').data('au-data', audata);
                }

                $(params.sel_input).val('');

            }else alert(data.message);
        }

        return false;
    };

    var remove_image = function(e){
        e.preventDefault();

        if( confirm('¿Está seguro de quitar la imágen?') ){
            var li = $(e.target).parent().parent();

            $.post(baseURI+'ajax_upload/delete', {au_filename_image : li.data('au-data').image_full, au_filename_thumb : li.data('au-data').image_thumb}, function(data){
                if( data=="ok" ){
                    var ul = $(params.sel_gallery);
                    if( ul.find('li').length==1 ){
                        ul.hide();
                    }else li.remove();
                }else alert("ERROR DELETE:\n"+data);
            });
        }

    };


})();
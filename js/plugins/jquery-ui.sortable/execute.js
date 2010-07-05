$(function() {
    $("#sortable").sortable()
                  .disableSelection()
                  .sortable({ handle: '.handle' });
});

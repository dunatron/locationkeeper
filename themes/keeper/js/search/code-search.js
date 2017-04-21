/**
 * Created by admin on 21/04/17.
 */
$(document).ready(function () {
    var CodeSearchBtn = $('#Form_CodeSearchForm_action_searchCode');

    /**
     * Code Search
     */
    $(CodeSearchBtn).on('click', function(e){
        e.preventDefault();

        var browserurl =   window.location.href,
            url = browserurl,
            keyword = $('#Form_CodeSearchForm_keyword').val();

        //alert(url);
        $.ajax({
            type:"POST",
            url: url + '/searchCode',
            //url: url,
            data: {Keyword:keyword},
            success: function (response) {
                $('.search-results-wrapper').html(response);
            },
            complete: function(){

            }
        });
    });

});
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

        // var browserurl =   window.location.href,
        //     url = browserurl,
        //     keyword = $('#Form_CodeSearchForm_keyword').val();
        //
        // //alert(url);
        // $.ajax({
        //     type:"POST",
        //     url: url + '/searchCode',
        //     data: {Keyword:keyword},
        //     success: function (response) {
        //         $('.search-results-wrapper').html(response);
        //     },
        //     complete: function(){
        //
        //     }
        // });

        var url = window.location.href + '/searchCode';
        //var url = window.location.href;


        $.ajax(url)
            .done(function (response) {
                $('.search-results-wrapper').html(response);
            })
            .fail (function (xhr) {
                alert('Error: ' + xhr.responseText);
            });


    });

});
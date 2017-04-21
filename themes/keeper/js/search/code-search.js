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

        var param = '&ajax=1',
            ajaxUrl = (url.indexOf(param) === -1) ?
            url + '&ajax=1' :
                url,
            cleanUrl = url.replace(new RegExp(param+'$'),'');

        //alert(url);
        $.ajax({
            type:"POST",
            url: url + '/searchCode',
            data: {Keyword:keyword},
            success: function (response) {
                $('.search-results-wrapper').html(response);
                window.history.pushState(
                    {url: cleanUrl + '/fuck you'},
                    document.title,
                    cleanUrl
                );
            },
            complete: function(){

            }
        });
    });

});
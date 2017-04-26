/**
 * Created by Heath on 27/04/17.
 */
$( document ).ready(function() {
    var AddCodeBtn  = $('#Form_UploadCodeForm_action_doCreateCode'),
        TitleField = $('#Form_UploadCodeForm_Title'),
        ContentBody = $('.mce-content-body');
    $(AddCodeBtn).on('click', function(e){
        e.preventDefault();
        
        var title = (TitleField).val(),
            html = (ContentBody).html(),
            url = window.location.href;
        
        $.ajax({
            type:"POST",
            url: '/pagefunction/doCreateCode',
            // url: url + '/home/doCreateCode',
            data: {
                Title:title,
                Html:html
            },
            success: function (response) {
                console.log(response);
            },
            complete: function(){

            },
            error: function(){

            }
        });
    });
});
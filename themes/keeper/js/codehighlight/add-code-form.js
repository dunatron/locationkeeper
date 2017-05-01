/**
 * Created by Heath on 27/04/17.
 */
$( document ).ready(function() {
    var AddCodeBtn  = $('#Form_UploadCodeForm_action_doCreateCode'),
        TitleField = $('#Form_UploadCodeForm_Title'),
        ContentBody = $('[data-id="Form_UploadCodeForm_Desc"]');
    $(AddCodeBtn).on('click', function(e){
        e.preventDefault();
        
        var title = $(TitleField).val(),
            html = $('#Form_UploadCodeForm_Desc_ifr')[0].contentDocument.body.innerHTML,
            url = window.location.href;

        //var test = $('#Form_UploadCodeForm_Desc_ifr').clone().wrapAll("<div />").parent().get(0).innerHTML;

        // console.log(tinyMCE.activeEditor.getContent());
        // console.log($('#Form_UploadCodeForm_Desc_ifr')[0].contentDocument.body.innerHTML);
        
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
                $('#Form_UploadCodeForm_error').css('display', 'block');
                $('#Form_UploadCodeForm_error').html(response);
            },
            complete: function(){
        
            },
            error: function(){
        
            }
        });
    });

    tinymce.init({
        selector:'textarea#Form_UploadCodeForm_Desc',
        plugins: "codesample",
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'CSS', value: 'css'},
            {text: 'PHP', value: 'php'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Python', value: 'python'},
            {text: 'Java', value: 'java'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'}
        ],
        content_css : '/themes/keeper/public/css/tinyMCE.css',
        toolbar: "codesample"
    });


    
});
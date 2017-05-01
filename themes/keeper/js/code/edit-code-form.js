/**
 * Created by admin on 28/04/17.
 */
$( document ).ready(function() {
    var EditCodeBtn  = $('#EditCodeBtn'),
        SaveCodeBtn = $('#Form_EditCodeForm_action_doCodeEdit'),
        EditModal = $('#EditCodeModal'),
        TitleField = $('#Form_EditCodeForm_Title'),
        TagField = $('#Form_EditCodeForm_Tags'),
        CodeIDGlobal = '';

    $(document).on('click', "#EditCodeBtn", function (e) {
        e.preventDefault();
        var CodeID = $(this).attr('data-id'),
            ContentBody = $('#Form_EditCodeForm_Desc_ifr');

        CodeIDGlobal = CodeID;

        // Clear content before loading new content
        tinyMCE.activeEditor.setContent('');

        $.ajax({
            type:"POST",
            dataType: "json",
            url: '/codeHolderFunction/doCodeEdit',
            data: {CodeID:CodeID},

            success: function (response) {
                $(TitleField).val(response['Title']);
                tinymce.get("Form_EditCodeForm_Desc").execCommand('mceInsertContent', false, response['Desc']);
                loadCodeTags(response['Tags']);
            },
            complete: function(response){

            },
            error: function(response){

            }
        });
    });

    function loadCodeTags(tagsString) {
        if(tagsString){
            $(TagField).select2("val", tagsString.split(','));
        } else {
            $(TagField).select2("val", '');
        }
    }

    $(SaveCodeBtn).on('click', function(e){
        e.preventDefault();

        var title = $('#Form_EditCodeForm_Title').val(),
            html = $('#Form_EditCodeForm_Desc_ifr')[0].contentDocument.body.innerHTML,
            tags = $('#Form_EditCodeForm_Tags').select2("val");

        $.ajax({
            type:"POST",
            url: '/codeHolderFunction/updateCode',

            data: {
                CodeID:CodeIDGlobal,
                Title:title,
                Html:html,
                Tags:tags
            },

            success: function (response) {
                alert(response);
            },
            complete: function(response){

            },
            error: function(response){

            }
        });
    });

    $(EditModal).on('hidden.bs.modal', function () {
        ClearEditCodeForm('#Form_EditCodeForm_Desc');
    });

    tinymce.init({
        selector:'textarea#Form_EditCodeForm_Desc',
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
        toolbar: "codesample"
    });

    function ClearEditCodeForm()
    {
        $(TagField).select2('val', '');
        $(TitleField).val('');
    }

});
/**
 * Created by admin on 28/04/17.
 */
$( document ).ready(function() {
    var EditCodeBtn  = $('#EditCodeBtn'),
        TitleField = $('#Form_EditCodeForm_Title'),
        TagField = $(''),
        ContentBody = $('[data-id="Form_UploadCodeForm_Desc"]');

    $(document).on('click', "#EditCodeBtn", function (e) {
        e.preventDefault();

        var CodeID = $(this).attr('data-id');

        tinyMCE.activeEditor.setContent('');
        // console.log($('#Form_UploadCodeForm_Desc_ifr')[0].contentDocument.body.innerHTML);

        $.ajax({
            type:"POST",
            dataType: "json",
            url: '/codeHolderFunction/doCodeEdit',
            data: {CodeID:CodeID},

            success: function (response) {
                //console.log(response);
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
        //console.log(tagsString);

        var String = tagsString.split(',');
        var CurrTAGS = [],
            AllTags = [],
            Length = String.length;

        $('select').select2('open');


        for (var i = 0; i < Length; i++)
        {
            CurrTAGS.push(String[i]);
        }

        console.log(CurrTAGS);


        // $('#select2-results__options option').each(function()
        // {
        //     AllTags.push($(this).val());
        // });

        $('#select2-Form_UploadCodeForm_Tags-results li').each(function()
        {
            //AllTags.push($(this).val());
            console.log($(this).text());

            var DropDownItem = $(this);
           // var DropDownItem = $("<div />").append($(this).clone()).html();

            console.log(DropDownItem);

            if(jQuery.inArray( $(this).text(), CurrTAGS ))
            {
                console.log('time to fake the unfakable');
                $(DropDownItem).trigger('click');
            }


        });




    }

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



});
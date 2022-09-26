// function TextAbstract(text, length) {
//     if (text == null) {
//         return "";
//     }
//     if (text.length <= length) {
//         return text;
//     }
//     text = text.substring(0, length);
//     last = text.lastIndexOf(" ");
//     text = text.substring(0, last);
//     return text + "...";
// }


function coverImgUpload() {

    const [file] = ImgInp.files;
    if (file) {
        coverImg.src = URL.createObjectURL(file);
    }
}

function filter_by_genre_dropdown() {
    $(document).ready(function () {

        $("#genres").on('change', function () {

            var genre = $(this).val();
            
            $.ajax({

                url: "/ProiectWeb2/php/storiesFiltered.php",

                type: "POST",

                data: 'request=' + genre,

                success: function (data) {
                    $("#results").html(data);
                }
            });
        });
    });
}

function open_Img_Upload() {

    $(document).ready(function () {

        $("#ImgInp").trigger('click');

    });

}

function log_in_alert() {

    $(document).ready(function () {

        alert('You need to log in to save the story!');
        $(':focus').blur();

    })
}
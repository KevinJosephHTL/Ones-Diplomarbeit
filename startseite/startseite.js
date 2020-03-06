//Funktion zum Finden von anderen Usern
function getUsers(value, user) {
    $.post("../chats/ajax_chats.php", {query:value, userLoggedIn:user}, function(data) {
        $(".results").html(data);
    });
}

$(document).ready(function() {
    var request;

    $("#post_startseite").submit(function(event){
        event.preventDefault();
        if (request) {
            request.abort();
        }
        var $form = $(this);
        var $inputs = $form.find("textarea, #fileToUpload");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "/ones/posts/ajax_posts.php",
            type: "POST",
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR){

            $(".section").load(location.href + " .section");
            $('#post_text4').val("");

        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
    });

    /////////////////////////////////////////////////////////////////////////////////////


    $("#content1-1-o").click(function() {
        $("#content0-1").slideUp("slow", function(){
            $("#content1-1").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });


    $("#content1-1-z").click(function() {
        $("#content1-1").slideUp("slow", function(){
            $("#content0-1").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });

});




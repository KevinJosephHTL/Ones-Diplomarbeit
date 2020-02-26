$(document).ready(function() {

    var source = new EventSource("posts.php");
    var request;

    $("#posters").submit(function(event){
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
            $('#post_text').val("");

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
//////////////////////////////////////////////////////////////////////////////////
    $("#posters2").submit(function(event){
        event.preventDefault();
        if (request) {
            request.abort();
        }
        var $form = $(this);
        var $inputs = $form.find("textarea, #fileToUpload2");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "/ones/posts/ajax_posts.php",
            type: "POST",
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR){
            $(".section2").load(location.href + " .section2");
            $('#post_text2').val("");

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
    /////////////////////////////////////////////////////////////
    $("#posters3").submit(function(event){
        event.preventDefault();
        if (request) {
            request.abort();
        }
        var $form = $(this);
        var $inputs = $form.find("textarea, #fileToUpload3");
        var serializedData = $form.serialize();
        $inputs.prop("disabled", true);
        request = $.ajax({
            url: "/ones/posts/ajax_posts.php",
            type: "POST",
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            //alert("Geschafft");
            //console.log("Hooray, it worked!");
            $(".section3").load(location.href + " .section3");
            $('#post_text3').val("");
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

    //On click signup, hide login and show registration form
    $("#signup").click(function() {
        $("#first").slideUp("slow", function(){
            $("#second").slideDown("slow");
            $(".flex-container").hide();
        });
    });

    //On click signup, hide registration and show login form
    $("#signin").click(function() {
        $("#second").slideUp("slow", function(){
            $("#first").slideDown("slow");
            $(".flex-container").show();
        });
    });

    //On click signup, hide login and show registration form
    $("#signup2").click(function() {
        $("#first2").slideUp("slow", function(){
            $("#second2").slideDown("slow");
            $(".flex-container").hide();
            //
        });
    });

    //On click signup, hide registration and show login form
    $("#signin2").click(function() {
        $("#second2").slideUp("slow", function(){
            $("#first2").slideDown("slow");
            $(".flex-container").show();
        });
    });

    //On click signup, hide login and show registration form
    $("#signup3").click(function() {
        $("#first3").slideUp("slow", function(){
            $("#second3").slideDown("slow");
            $(".flex-container").hide();
        });
    });

    //On click signup, hide registration and show login form
    $("#signin3").click(function() {
        $("#second3").slideUp("slow", function(){
            $("#first3").slideDown("slow");
            $(".flex-container").show();
        });
    });





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




    $("#content2-2-o").click(function() {
        $("#content0-2").slideUp("slow", function(){
            $("#content2-2").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });


    $("#content2-2-z").click(function() {
        $("#content2-2").slideUp("slow", function(){
            $("#content0-2").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });



    $("#content3-3-o").click(function() {
        $("#content0-3").slideUp("slow", function(){
            $("#content3-3").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });


    $("#content3-3-z").click(function() {
        $("#content3-3").slideUp("slow", function(){
            $("#content0-3").slideDown("slow");
            //   $(".flex-container").hide();
        });
    });


});


//Funktion zum Finden von anderen Usern
function getUsers(value, user) {
    $.post("../chats/ajax_chats.php", {query:value, userLoggedIn:user}, function(data) {
        $(".results").html(data);
    });
}


















//Funktion zum Finden von anderen Usern
function getUsers(value, user) {
    $.post("../chats/ajax_chats.php", {query:value, userLoggedIn:user}, function(data) {
        $(".results").html(data);
    });
}
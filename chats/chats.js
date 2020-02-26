$(document).ready(function() {

	var request;
	setInterval(function(){ $(".passt").load(location.href + " .passt"); }, 3000);

	$(".passt").submit(function(event){
		event.preventDefault();
		if (request) {
			request.abort();
		}
		var $form = $(this);
		var $inputs = $form.find("textarea");
		var serializedData = $form.serialize();
		$inputs.prop("disabled", true);
		request = $.ajax({
			url: "/ones/chats/ajax_chats2.php",
			type: "POST",
			data: serializedData
		});

		request.done(function (response, textStatus, jqXHR){

			$(".loaded_messages").load(location.href + " .passt");

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

});
//Funktion zum löschen von Nachrichten
function deleteMessage(messageId, element) {
	$.post("includes/handlers/ajax_delete_message.php", {id:messageId}, function(data) {
		$(element).closest(".message").text("Chat deleted");
	});	
}

//Funktion zum Finden von anderen Usern
function getUsers(value, user) {
	$.post("ajax_chats.php", {query:value, userLoggedIn:user}, function(data) {
		$(".results").html(data);
	});
}

//Alle aktuell gefundenen Usern
function getLiveSearchUsers(value, user) {

	$.post("includes/handlers/ajax_search.php", {query:value, userLoggedIn: user}, function(data) {

		if($(".search_results_footer_empty")[0]) {
			$(".search_results_footer_empty").toggleClass("search_results_footer");
			$(".search_results_footer_empty").toggleClass("search_results_footer_empty");
		}

		$('.search_results').html(data);
		$('.search_results_footer').html("<a href='search.php?q=" + value + "'>See All Results</a>");

		if(data == "") {
			$('.search_results_footer').html("");
			$('.search_results_footer').toggleClass("search_results_footer_empty");
			$('.search_results_footer').toggleClass("search_results_footer");
		}
	});
}














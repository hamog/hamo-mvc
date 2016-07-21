function GetTime() {
	var url = $('#time').data('href');
    $.ajax({
        type: "get",
        url: url,
        success: function(result) {
            $("#time").html(result);
        }
    });
}
$(document).ready(function() {	
    setInterval("GetTime()", 1000);
});
$(document).ready(function(){
// check change event of the text field
$("#tp").keyup(function(){
// get text username text field value
var tp = $("#tp").val();
if(tp == "")
{
$("#tp").html('');
}
// check username name only if length is greater than or equal to 3
if(tp.length >= 0)
{
$("#status3").html('<br> Checking Availability...');
// check username
$.post("seats_check.php", {tp: tp}, function(data, status){
$("#status3").html(data);

});
}
});
});

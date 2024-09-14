$(document).ready(function(){
// check change event of the text field
$("#username2").keyup(function(){
// get text username text field value
var username = $("#username2").val();
if(username == "")
{
$("#status").html('');
}
// check username name only if length is greater than or equal to 3
if(username.length >= 5)
{
$("#status").html('<br> Checking Availability...');
// check username
$.post("username_check.php", {username2: username}, function(data, status){
$("#status").html(data);

});
}
});
});

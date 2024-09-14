$(document).ready(function(){
// check change event of the text field
$("#email").keyup(function(){
// get text username text field value
var email = $("#email").val();
if(email == "")
{
$("#status2").html('');
}
// check username name only if length is greater than or equal to 3
if(email.length >= 5)
{
$("#status2").html('<br> Checking Availability...');
// check username
$.post("email2_check.php", {email: email}, function(data, status){
$("#status2").html(data);

});
}
});
});

$(document).ready(function(){
// check change event of the text field
$("#email2").keyup(function(){
// get text username text field value
var email = $("#email2").val();
if(email == "")
{
$("#status2").html('');
}
// check username name only if length is greater than or equal to 3
if(email.length >= 5)
{
$("#status2").html('<br> Checking Availability...');
// check username
$.post("email_check.php", {email2: email}, function(data, status){
$("#status2").html(data);

});
}
});
});

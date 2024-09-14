$(document).ready(function(){
// check change event of the text field
$("#brgy").keyup(function(){
// get text username text field value
var brgy = $("#brgy").val();
if(brgy == "")
{
$("#status").html('');
}
// check username name only if length is greater than or equal to 3
if(brgy.length >= 1)
{
$("#status").html('<br> Checking Availability...');
// check username
$.post("city_check.php", {brgy: brgy}, function(data, status){
$("#status").html(data);

});
}
});
});

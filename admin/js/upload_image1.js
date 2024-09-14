$(document).ready(function (f) {
// Function to preview image after validation
$(function() {
$("#file1").change(function() {
$("#message1").empty(); // To remove the previous error message
var file1 = this.files[0];
var imagefile1 = file1.type;
var match1= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile1==match1[0]) || (imagefile1==match1[1]) || (imagefile1==match1[2])))
{
$('#previewing1').attr('src','noimage.png');
$("#message1").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader1 = new FileReader();
reader1.onload = imageIsLoaded1;
reader1.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded1(f) {
$("#file1").css("color","green");
$('#image_preview1').css("display", "block");
$('#previewing1').attr('src', f.target.result);
$('#previewing1').attr('width', '300px');
$('#previewing1').attr('height', '99px');
};
});



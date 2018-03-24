$(document).ready(function() {
$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
$("#returnmessage").empty();
if (name == '' || email == '') {
alert("Please Fill Required Fields");
} else {
$.post("contact_form.php", {
name1: name,
email1: email,
message1: message,
}, function(data) {
$("#returnmessage").append(data);
if (data == "Your Query has been received, We will contact you soon.") {
$("#form")[0].reset();
}
});
}
});
});
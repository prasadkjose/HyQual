$(document).ready(function(){
$("#login").click(function(){
var uname = $("#uname").val();
var password = $("#password").val();
// Checking for blank fields.
if( email =='' || password ==''){
$('input[type="text"],input[type="password"]').css("border","2px solid red");
$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
alert("Please fill all fields...!!!!!!");
}
    else if(email=='admin' && password=='admin')
        {
            window.open("https://www.w3schools.com");
        }
    
}
}
